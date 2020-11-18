<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class armada_drag extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_armada");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function coba1()
    {
        $getdata = http_build_query(
            array(
                'tanggal'=> '2020-02-01',
                'armada'=> '4937'
            )
        );

        $opts = array('http' =>
           array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($getdata)."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
            'method'  => 'POST',
            'content' => $getdata
        )
       );
        $context  = stream_context_create($opts);
        $result = file_get_contents('http://newtiket.damri.co.id/apps/operasi/dataPenumpang?'.$getdata, false, $context);
        echo json_encode($result);
    }

    public function ax_get_data_api_ticket_old()
    {
        $session = $this->session->userdata('login');
        $data = array(
            'tanggal'=> '2020-02-01',
            'armada'=> '4937'
            // 'tanggal'=> $this->input->post('tanggal'),
            // 'armada'=> $this->input->post('armada')
        );
        $url = 'newtiket.damri.co.id/apps/operasi/dataPenumpang';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $responseJson = curl_exec( $ch );
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            foreach (json_decode($responseJson)->data as $row){

                $data_array = array(
                    'id_setoran_detail' => $this->input->post('id_setoran_detail'),
                    'id_setoran'        => $this->input->post('id_setoran'),
                    'rit'               => 1,
                    'tanggal'           => $this->input->post('tanggal'),
                    // 'tanggal'           => '2020-02-01',
                    'armada'            => $row->armada,
                    'kd_trayek'         => $row->trayek,
                    'jumlah'            => $row->jumlah,
                    'harga'             => $row->harga,
                    'jenis_penjualan_pnp'=> 1,
                    'id_user'           => $session['id_user']
                );
                $data_final [] = $data_array;
            }
            $status = $this->db->insert_batch('ref_setoran_detail_pnp', $data_final);
        }
        echo json_encode(array('status' => $responseJson));
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_armada->combobox_bu();
                $data['combobox_segment'] = $this->model_armada->combobox_segment();
                $data['combobox_merek'] = $this->model_armada->combobox_merek();
                $data['combobox_layanan'] = $this->model_armada->combobox_layanan();
                $data['combobox_ukuran'] = $this->model_armada->combobox_ukuran();
                $data['combobox_warna'] = $this->model_armada->combobox_warna();
                $data['combobox_layout'] = $this->model_armada->combobox_layout();
                
                $this->load->view('armada/armada_drag', $data);
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    

    public function ax_data_armada_drag()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_armada->getAllarmada($length, $start, $cari['value'], $id_bu)->result_array();
                $count = $this->model_armada->get_count_armada($cari['value'], $id_bu);

                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    public function ax_set_data()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_armada = $this->input->post('id_armada');
                $id_layout = $this->input->post('id_layout');
                $kd_armada = $this->input->post('kd_armada');
                $rangka_armada = $this->input->post('rangka_armada');
                $plat_armada = $this->input->post('plat_armada');
                $mesin_armada = $this->input->post('mesin_armada');
                $tahun_armada = $this->input->post('tahun_armada');
                $id_merek = $this->input->post('id_merek');
                $tipe_armada = $this->input->post('tipe_armada');
                $silinder_armada = $this->input->post('silinder_armada');
                $id_ukuran = $this->input->post('id_ukuran');
                $seat_armada = $this->input->post('seat_armada');
                $id_segment = $this->input->post('id_segment');
                $id_warna = $this->input->post('id_warna');
                $id_layanan = $this->input->post('id_layanan');
                $id_segment = $this->input->post('id_segment');
                $status_armada = $this->input->post('status_armada');
                $id_bu = $this->input->post('id_bu');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');
                $data = array(

                    'id_armada' => $id_armada,
                    'id_layout' => $id_layout,
                    'kd_armada' => $kd_armada,
                    'rangka_armada' => $rangka_armada,
                    'plat_armada' => $plat_armada,
                    'mesin_armada' => $mesin_armada,
                    'tahun_armada' => $tahun_armada,
                    'id_merek' => $id_merek,
                    'tipe_armada' => $tipe_armada,
                    'silinder_armada' => $silinder_armada,
                    'id_ukuran' => $id_ukuran,
                    'seat_armada' => $seat_armada,
                    'id_segment' => $id_segment,
                    'id_layanan' => $id_layanan,
                    'id_warna' => $id_warna,
                    'status_armada' => $status_armada,
                    'id_bu' => $id_bu,
                    'active' => $active,
                    'id_perusahaan' => $session['id_perusahaan'],
                    'cuser' => $session['id_user'],

                );

                if($id_armada == 0){
                   $data['id_armada'] = $this->model_armada->insert_armada($data);
               }
               else{
                   $data['id_armada'] = $this->model_armada->update_armada($data);
               }

               echo json_encode(array('status' => 'success', 'data' => $data));

           } else {
            echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
        }
    } else {
        if ($this->uri->segment(1) != null) {
            $url = $this->uri->segment(1);
            $url = $url.' '.$this->uri->segment(2);
            $url = $url.' '.$this->uri->segment(3);
            redirect('welcome/relogin/?url='.$url.'', 'refresh');
        } else {
            redirect('welcome/relogin', 'refresh');
        }
    }
}

public function ax_unset_data()
{
  if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_armada = $this->input->post('id_armada');

                $data = array('id_armada' => $id_armada);

                if(!empty($id_armada))
                   $data['id_armada'] = $this->model_armada->delete_armada($data);

               echo json_encode(array('status' => 'success', 'data' => $data));

           } else {
            echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
        }
    } else {
        if ($this->uri->segment(1) != null) {
            $url = $this->uri->segment(1);
            $url = $url.' '.$this->uri->segment(2);
            $url = $url.' '.$this->uri->segment(3);
            redirect('welcome/relogin/?url='.$url.'', 'refresh');
        } else {
            redirect('welcome/relogin', 'refresh');
        }
    }
}



public function ax_get_data_by_id()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_armada = $this->input->post('id_armada');

              if(empty($id_armada))
               $data = array();
           else
               $data = $this->model_armada->get_armada_by_id($id_armada);

           echo json_encode($data);

       } else {
        echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
    }
} else {
    if ($this->uri->segment(1) != null) {
        $url = $this->uri->segment(1);
        $url = $url.' '.$this->uri->segment(2);
        $url = $url.' '.$this->uri->segment(3);
        redirect('welcome/relogin/?url='.$url.'', 'refresh');
    } else {
        redirect('welcome/relogin', 'refresh');
    }
}
}


public function ax_data_foto()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_armada = $this->input->post('id_armada');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_armada->getAllarmadafoto($length, $start, $cari['value'], $id_armada)->result_array();
                $count = $this->model_armada->get_count_armadafoto($cari['value'], $id_armada);

                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    public function ax_upload_data_foto()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


            $config['upload_path']="./uploads/armada/foto/"; //path folder file upload
            $config['allowed_types']='jpeg|jpg'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            $config['max_size'] = 150; //enkripsi file name upload

            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

                $nm_armada_foto = $this->input->post('nm_armada_foto'); //get judul image
                $id_armada = $this->input->post('id_armada'); //get judul image
                // $nm_upload = $this->input->post('nm_upload'); //get judul image
                $upload = $data['upload_data']['file_name']; //set file name ke variable image
                $url = './uploads/armada/foto/'.$upload; 

                $session = $this->session->userdata('login');
                $data = array(
                    'nm_armada_foto' => $nm_armada_foto,
                    'id_armada' => $id_armada,
                    'attachment' => $upload,
                    'active' => 1,
                    'cuser' => $session['id_user'],
                    'id_perusahaan' => $session['id_perusahaan'],


                );
                // print_r($data);exit();
                if (file_exists($url)) {
                   $data['id_armada_foto'] = $this->model_armada->insert_armada_foto($data);
                   echo json_encode(array('status' => 'success', 'data' => $data));
               } 

                // echo json_encode(array('status' => 'success', 'data' => $data));
           }

       } else {
        echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
    }
} else {
    if ($this->uri->segment(1) != null) {
        $url = $this->uri->segment(1);
        $url = $url.' '.$this->uri->segment(2);
        $url = $url.' '.$this->uri->segment(3);
        redirect('welcome/relogin/?url='.$url.'', 'refresh');
    } else {
        redirect('welcome/relogin', 'refresh');
    }
}
}

public function ax_unset_foto()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_armada_foto = $this->input->post('id_armada_foto');

                $data = array('id_armada_foto' => $id_armada_foto);


                $datas = $this->model_armada->get_foto_by_id($id_armada_foto);
                $this->load->helper("file");
                $url = './uploads/armada/foto/'.$datas['attachment'];
                
                if (file_exists($url)) {
                    unlink($url);
                    $data['id_armada_foto'] = $this->model_armada->delete_foto($data);
                    echo json_encode(array('status' => 'success', 'data' => $url));
                } else {
                    $data['id_armada_foto'] = $this->model_armada->delete_foto($data);
                    echo json_encode(array('status' => 'success', 'data' => $url));
                }
                



            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }


    //Untuk proses upload foto
    function proses_upload(){

        $config['upload_path']="./uploads/armada/foto/"; 
        $config['allowed_types'] = 'jpg|JPG|jpeg';
        $config['encrypt_name'] = TRUE;
        // $config['max_size'] = 150;

        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
            // $gambar = $this->upload->data('file_name');
            $data = array('upload_data' => $this->upload->data());
            $gambar = $data['upload_data']['file_name'];
            // echo json_encode($gambar);
            // exit();

            $session = $this->session->userdata('login');
            $data = array(
                'nm_armada_foto' => 'DEPAN KANAN',
                'id_armada' => $this->input->post('id_armada'),
                'attachment' => $gambar,
                'active' => 1,
                'cuser' => $session['id_user'],
                'id_perusahaan' => $session['id_perusahaan']
            );
            $this->db->insert('ref_armada_foto',$data);
            echo json_encode(array('status' => 'success', 'data' => $data));
        }
    }

    public function ubahSisi()
    {
        $data = array(
            'nm_armada_foto' => $this->input->post('status')
        );
        $this->db->update("ref_armada_foto", $data, array('id_armada_foto' => $this->input->post('id_armada_foto') ));
        echo json_encode(array("status" => TRUE));
    }


    //Untuk menghapus foto
    function remove_foto(){
        //Ambil token foto
        $id_armada = $this->input->post('id_armada');
        $foto  = $this->db->get_where('ref_armada_foto',array('id_armada'=>$id_armada));


        if($foto->num_rows()>0){
            $hasil = $foto->row();
            $nama_foto = $hasil->attachment;
            if(file_exists($file=FCPATH.'/uploads/armada/foto/'.$nama_foto)){
                unlink($file);
            }
            $this->db->delete('ref_armada_foto',array('id_armada'=>$id_armada));

        }
        echo "{}";
    }

    public function ax_data_stnk()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_armada_drag = $this->input->post('id_armada_drag');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_armada->getAllarmada_dragstnk($length, $start, $cari['value'], $id_armada_drag)->result_array();
                $count = $this->model_armada->get_count_armada_dragstnk($cari['value'], $id_armada_drag);

                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    public function ax_upload_data_stnk()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


            $config['upload_path']="./uploads/armada_drag/stnk/"; //path folder file upload
            $config['allowed_types']='jpeg|jpg'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            $config['max_size'] = 150; //enkripsi file name upload

            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

                $tgl_exp_stnk = $this->input->post('tgl_exp_stnk'); //get judul image
                $id_armada_drag = $this->input->post('id_armada_dragstnk'); //get judul image
                $masa = $this->input->post('masa'); //get judul image
                // $nm_upload = $this->input->post('nm_upload'); //get judul image
                $upload = $data['upload_data']['file_name']; //set file name ke variable image
                $url = './uploads/armada_drag/stnk/'.$upload; 

                $session = $this->session->userdata('login');
                $data = array(
                    'tgl_exp_stnk' => $tgl_exp_stnk,
                    'id_armada_drag' => $id_armada_drag,
                    'attachment' => $upload,
                    'masa' => $masa,
                    'active' => 1,
                    'cuser' => $session['id_user'],
                    'id_perusahaan' => $session['id_perusahaan'],


                );
                // print_r($data);exit();
                if (file_exists($url)) {
                   $data['id_armada_drag_stnk'] = $this->model_armada->insert_armada_drag_stnk($data);
                   echo json_encode(array('status' => 'success', 'data' => $data));
               } 

                // echo json_encode(array('status' => 'success', 'data' => $data));
           }

       } else {
        echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
    }
} else {
    if ($this->uri->segment(1) != null) {
        $url = $this->uri->segment(1);
        $url = $url.' '.$this->uri->segment(2);
        $url = $url.' '.$this->uri->segment(3);
        redirect('welcome/relogin/?url='.$url.'', 'refresh');
    } else {
        redirect('welcome/relogin', 'refresh');
    }
}
}

public function ax_unset_stnk()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_armada_drag_stnk = $this->input->post('id_armada_drag_stnk');

                $data = array('id_armada_drag_stnk' => $id_armada_drag_stnk);


                $datas = $this->model_armada->get_stnk_by_id($id_armada_drag_stnk);
                $this->load->helper("file");
                $url = './uploads/armada_drag/stnk/'.$datas['attachment'];
                
                if (file_exists($url)) {
                    unlink($url);
                    $data['id_armada_drag_stnk'] = $this->model_armada->delete_stnk($data);
                    echo json_encode(array('status' => 'success', 'data' => $url));
                } else {
                    $data['id_armada_drag_stnk'] = $this->model_armada->delete_stnk($data);
                    echo json_encode(array('status' => 'success', 'data' => $url));
                }
                



            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }



    

    

}
