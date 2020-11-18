<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class kota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_kota");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_prov'] = $this->model_kota->combobox_prov();
                
                $this->load->view('kota/index', $data);
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

    

    public function ax_data_kota()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_prov = $this->input->post('id_prov');
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_kota->getAllkota($length, $start, $cari['value'], $id_prov)->result_array();
            $count = $this->model_kota->get_count_kota($cari['value'], $id_prov);

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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_kota = $this->input->post('id_kota');
                $id_layout = $this->input->post('id_layout');
                $kd_kota = $this->input->post('kd_kota');
                $rangka_kota = $this->input->post('rangka_kota');
                $plat_kota = $this->input->post('plat_kota');
                $mesin_kota = $this->input->post('mesin_kota');
                $tahun_kota = $this->input->post('tahun_kota');
                $id_merek = $this->input->post('id_merek');
                $tipe_kota = $this->input->post('tipe_kota');
                $silinder_kota = $this->input->post('silinder_kota');
                $id_ukuran = $this->input->post('id_ukuran');
                $seat_kota = $this->input->post('seat_kota');
                $id_segment = $this->input->post('id_segment');
                $id_warna = $this->input->post('id_warna');
                $id_layanan = $this->input->post('id_layanan');
                $id_segment = $this->input->post('id_segment');
                $status_kota = $this->input->post('status_kota');
                $id_bu = $this->input->post('id_bu');
                $active = $this->input->post('active');
            $session = $this->session->userdata('login');
            $data = array(

                'id_kota' => $id_kota,
                'id_layout' => $id_layout,
                'kd_kota' => $kd_kota,
                'rangka_kota' => $rangka_kota,
                'plat_kota' => $plat_kota,
                'mesin_kota' => $mesin_kota,
                'tahun_kota' => $tahun_kota,
                'id_merek' => $id_merek,
                'tipe_kota' => $tipe_kota,
                'silinder_kota' => $silinder_kota,
                'id_ukuran' => $id_ukuran,
                'seat_kota' => $seat_kota,
                'id_segment' => $id_segment,
                'id_layanan' => $id_layanan,
                'id_warna' => $id_warna,
                'status_kota' => $status_kota,
                'id_bu' => $id_bu,
                'active' => $active,
                'id_perusahaan' => $session['id_perusahaan'],
                'cuser' => $session['id_user'],

            );
            
            if($id_kota == 0){
                $data['id_kota'] = $this->model_kota->insert_kota($data);
            }
            else{
                $data['id_kota'] = $this->model_kota->update_kota($data);
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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kota = $this->input->post('id_kota');
            
            $data = array('id_kota' => $id_kota);
            
            if(!empty($id_kota))
                $data['id_kota'] = $this->model_kota->delete_kota($data);
            
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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kota = $this->input->post('id_kota');
            
            if(empty($id_kota))
                $data = array();
            else
                $data = $this->model_kota->get_kota_by_id($id_kota);
            
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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kota = $this->input->post('id_kota');
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_kota->getAllkotafoto($length, $start, $cari['value'], $id_kota)->result_array();
            $count = $this->model_kota->get_count_kotafoto($cari['value'], $id_kota);

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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


            $config['upload_path']="./uploads/kota/foto/"; //path folder file upload
            $config['allowed_types']='jpeg|jpg'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            $config['max_size'] = 150; //enkripsi file name upload
             
            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
     
                $nm_kota_foto = $this->input->post('nm_kota_foto'); //get judul image
                $id_kota = $this->input->post('id_kota'); //get judul image
                // $nm_upload = $this->input->post('nm_upload'); //get judul image
                $upload = $data['upload_data']['file_name']; //set file name ke variable image
                $url = './uploads/kota/foto/'.$upload; 

                $session = $this->session->userdata('login');
                $data = array(
                    'nm_kota_foto' => $nm_kota_foto,
                    'id_kota' => $id_kota,
                    'attachment' => $upload,
                    'active' => 1,
                    'cuser' => $session['id_user'],
                    'id_perusahaan' => $session['id_perusahaan'],


                );
                // print_r($data);exit();
                 if (file_exists($url)) {
                   $data['id_kota_foto'] = $this->model_kota->insert_kota_foto($data);
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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kota_foto = $this->input->post('id_kota_foto');
            
            $data = array('id_kota_foto' => $id_kota_foto);
            
            
                $datas = $this->model_kota->get_foto_by_id($id_kota_foto);
                $this->load->helper("file");
                $url = './uploads/kota/foto/'.$datas['attachment'];
                
                if (file_exists($url)) {
                    unlink($url);
                    $data['id_kota_foto'] = $this->model_kota->delete_foto($data);
                    echo json_encode(array('status' => 'success', 'data' => $url));
                } else {
                    $data['id_kota_foto'] = $this->model_kota->delete_foto($data);
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

    public function ax_data_stnk()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kota = $this->input->post('id_kota');
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_kota->getAllkotastnk($length, $start, $cari['value'], $id_kota)->result_array();
            $count = $this->model_kota->get_count_kotastnk($cari['value'], $id_kota);

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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


            $config['upload_path']="./uploads/kota/stnk/"; //path folder file upload
            $config['allowed_types']='jpeg|jpg'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            $config['max_size'] = 150; //enkripsi file name upload
             
            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
     
                $tgl_exp_stnk = $this->input->post('tgl_exp_stnk'); //get judul image
                $id_kota = $this->input->post('id_kotastnk'); //get judul image
                $masa = $this->input->post('masa'); //get judul image
                // $nm_upload = $this->input->post('nm_upload'); //get judul image
                $upload = $data['upload_data']['file_name']; //set file name ke variable image
                $url = './uploads/kota/stnk/'.$upload; 

                $session = $this->session->userdata('login');
                $data = array(
                    'tgl_exp_stnk' => $tgl_exp_stnk,
                    'id_kota' => $id_kota,
                    'attachment' => $upload,
                    'masa' => $masa,
                    'active' => 1,
                    'cuser' => $session['id_user'],
                    'id_perusahaan' => $session['id_perusahaan'],


                );
                // print_r($data);exit();
                 if (file_exists($url)) {
                   $data['id_kota_stnk'] = $this->model_kota->insert_kota_stnk($data);
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
            $menu_kd_menu_details = "S24";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kota_stnk = $this->input->post('id_kota_stnk');
            
            $data = array('id_kota_stnk' => $id_kota_stnk);
            
            
                $datas = $this->model_kota->get_stnk_by_id($id_kota_stnk);
                $this->load->helper("file");
                $url = './uploads/kota/stnk/'.$datas['attachment'];
                
                if (file_exists($url)) {
                    unlink($url);
                    $data['id_kota_stnk'] = $this->model_kota->delete_stnk($data);
                    echo json_encode(array('status' => 'success', 'data' => $url));
                } else {
                    $data['id_kota_stnk'] = $this->model_kota->delete_stnk($data);
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
