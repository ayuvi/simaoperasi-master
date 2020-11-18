<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class armada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_armada");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
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
                
                $this->load->view('armada/index', $data);
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

    

    public function ax_data_armada()
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

    public function ax_data_stnk()
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
            $data = $this->model_armada->getAllarmadastnk($length, $start, $cari['value'], $id_armada)->result_array();
            $count = $this->model_armada->get_count_armadastnk($cari['value'], $id_armada);

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


            $config['upload_path']="./uploads/armada/stnk/"; //path folder file upload
            $config['allowed_types']='jpeg|jpg'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            $config['max_size'] = 150; //enkripsi file name upload
             
            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
     
                $tgl_exp_stnk = $this->input->post('tgl_exp_stnk'); //get judul image
                $id_armada = $this->input->post('id_armadastnk'); //get judul image
                $masa = $this->input->post('masa'); //get judul image
                // $nm_upload = $this->input->post('nm_upload'); //get judul image
                $upload = $data['upload_data']['file_name']; //set file name ke variable image
                $url = './uploads/armada/stnk/'.$upload; 

                $session = $this->session->userdata('login');
                $data = array(
                    'tgl_exp_stnk' => $tgl_exp_stnk,
                    'id_armada' => $id_armada,
                    'attachment' => $upload,
                    'masa' => $masa,
                    'active' => 1,
                    'cuser' => $session['id_user'],
                    'id_perusahaan' => $session['id_perusahaan'],


                );
                // print_r($data);exit();
                 if (file_exists($url)) {
                   $data['id_armada_stnk'] = $this->model_armada->insert_armada_stnk($data);
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

            $id_armada_stnk = $this->input->post('id_armada_stnk');
            
            $data = array('id_armada_stnk' => $id_armada_stnk);
            
            
                $datas = $this->model_armada->get_stnk_by_id($id_armada_stnk);
                $this->load->helper("file");
                $url = './uploads/armada/stnk/'.$datas['attachment'];
                
                if (file_exists($url)) {
                    unlink($url);
                    $data['id_armada_stnk'] = $this->model_armada->delete_stnk($data);
                    echo json_encode(array('status' => 'success', 'data' => $url));
                } else {
                    $data['id_armada_stnk'] = $this->model_armada->delete_stnk($data);
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
