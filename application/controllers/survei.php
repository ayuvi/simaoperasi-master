<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class survei extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_survei");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "P01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_driver'] = $this->model_survei->combobox_driver();
                $data['combobox_kendaraan'] = $this->model_survei->combobox_kendaraan();
                $data['combobox_bu'] = $this->model_survei->combobox_bu();
                $this->load->view('survei/index', $data);
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
	
	public function indexnilai()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
			
            $menu_kd_menu_details = "P02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
            $session_survei = $this->session->userdata('survei');
			if($session_survei) {
				redirect('survei/menilai', 'refresh');
				
			}else{
				$data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
				$data['posisi_combobox'] = $this->model_survei->posisi_combobox();
                $data['combobox_driver'] = $this->model_survei->combobox_driver();
                $data['combobox_kendaraan'] = $this->model_survei->combobox_kendaraan();
                $data['combobox_bu'] = $this->model_survei->combobox_bu();
                $this->load->view('survei/indexnilai', $data);
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
	
	public function menilai()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $session_survei = $this->session->userdata('survei');
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['id_session'] = $session_survei;
                // var_dump($session_survei['id_session']);

                if(empty($session_survei)){
                    echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='".base_url()."survei/indexnilai'</script>";
                }else{
				// print_r($data['id_session']);
                // $data['id_survei'] = $id_survei;
                $this->load->view('survei/isiresponden', $data);}
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
	
	/* public function menilai(){
		if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $session_survei = $this->session->userdata('survei');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['id_session'] = $session_survei['id_session'];
                $data['id_survei'] = $id_survei;
                $this->load->view('survei/isiresponden', $data);
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
	} */
	
	public function access($id_survei)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_user'] = $this->model_survei->combobox_user();
                $data['id_survei'] = $id_survei;
                $this->load->view('survei/access', $data);
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

    public function nilai($id_survei)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['id_survei'] = $id_survei;
                $this->load->view('survei/nilai', $data);
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
	
	public function isinilai($id_survei)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "P02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
				$data['posisi_combobox'] = $this->model_survei->posisi_combobox();
				$data['pendidikan_combobox'] = $this->model_survei->pendidikan_combobox();
				$data['golongan_combobox'] = $this->model_survei->golongan_combobox();
				$data['bu_combobox'] = $this->model_survei->bu_combobox();
                $data['id_survei'] = $id_survei;
                $this->load->view('survei/isinilai', $data);
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
	
	public function simpan() {
		$data = array(
					'id_survei_detail' 	=> $this->input->post('id_survei_detail'),
					'id_posisi'		 	=> $this->input->post('id_posisi'),
					'id_bu'			 	=> $this->input->post('id_bu'),
					'tempat_lahir'	 	=> $this->input->post('tempat_lahir'),
					'tgl_lahir'	 		=> $this->input->post('tgl_lahir'),
					'tgl_masuk'	 		=> $this->input->post('tgl_masuk'),
					'id_pendidikan'	 	=> $this->input->post('id_pendidikan'),
					'status_pegawai' 	=> $this->input->post('status_pegawai'),
					'id_pendidikan' 	=> $this->input->post('id_pendidikan'),
					'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
					// 'status' 			=> '1'
				);
		$id = $this->session->userdata('kode');
		// $id	= $this->input->post('id_vendor');	
		$result = $this->Mvendor->UpdateData($data,$id);
		echo json_encode(array('status' => 'success', 'data' => $result));
	}
	
	public function ax_set_isi_survei()
    {
        if ($this->session->userdata('login')) {
            $id_survei = $this->input->post('id_survei');
            $status = $this->input->post('status');
			$id_session = date('YmdHis');
            
            $session = $this->session->userdata('login');
			$this->session->set_userdata('survei', $id_session);
            $data = array(
                'id_survei' 	=> $this->input->post('id_survei'),
					'id_posisi'		 	=> $this->input->post('id_posisi'),
					'id_session'		=> $id_session,
					'nm_responden'		=> $this->input->post('nm_responden'),
					'nip_responden'		=> $this->input->post('nip_responden'),
					'password'			=> do_hash($this->input->post('password'), 'md5'),
					'id_bu'			 	=> $this->input->post('id_bu'),
					'tempat_lahir'	 	=> $this->input->post('tempat_lahir'),
					'tgl_lahir' 		=> $this->tanggalYMD($this->input->post('tgl_lahir')),
					'tgl_masuk' 		=> $this->tanggalYMD($this->input->post('tgl_masuk')),
					'id_pendidikan'	 	=> $this->input->post('id_pendidikan'),
					'status_pegawai' 	=> $this->input->post('status_pegawai'),
					'id_golongan'	 	=> $this->input->post('id_golongan'),
					'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
            );
            
            
            $data['id_survei'] = $this->model_survei->insert_data_survei($data);
            
            
            echo json_encode(array('status' => 'success', 'data' => $data));
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

    public function ax_data_survei()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_survei->getAllsurvei($length, $start, $cari['value'])->result_array();
            $countfilter = $this->model_survei->getAllsurvei($length, $start, $cari['value'])->num_rows();
            $count = $this->model_survei->getAllsurvei(null, null)->num_rows();

            echo json_encode(array('recordsTotal' => $count, 'recordsFiltered' => $countfilter, 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            
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
	
	public function ax_data_survei_access($id_survei)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_survei->getAllsurveiaccess($length, $start, $cari['value'], $id_survei)->result_array();
            $count = $this->model_survei->getAllsurveiaccess(null, null, $cari['value'], $id_survei)->num_rows();

            echo json_encode(array('recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
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

    public function ax_data_survei_nilai($id_survei) //inibener
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data 	= $this->model_survei->getAllnilai($length, $start, $cari['value'], $id_survei)->result_array();
            $count 	= $this->model_survei->get_count_nilai($length, $start, $cari['value'], $id_survei);
			
			$header = $this->model_survei->get_survei_by_id($id_survei);


            echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data,  'header' => $header));
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
	
	public function ax_data_survei_isi_nilai($id_survei)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_survei->getAllnilai($length, $start, $cari['value'], $id_survei)->result_array();
            $countfilter = $this->model_survei->getAllnilai($length, $start, $cari['value'], $id_survei)->num_rows();
            $count = $this->model_survei->getAllsurvei(null, null, null, $id_survei)->num_rows();
            $total = $this->model_survei->getAlltotalnilai($id_survei);
            $critical = $this->model_survei->getAlltotalcritical($id_survei);
            $header = $this->model_survei->get_survei_by_id($id_survei);


            echo json_encode(array('recordsTotal' => $count, 'recordsFiltered' => $countfilter, 'draw' => $draw, 'search' => $cari['value'], 'data' => $data, 'total' => $total, 'header' => $header, 'critical' => $critical));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.inspeksi.href='javascript:history.back(-1);'</script>";
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
	
	public function ax_data_survei_isi_nilai_responden($id_session) //inibener
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data 	= $this->model_survei->getAllisinilai(null, null, $cari['value'], $id_session)->result_array();
            $count 	= $this->model_survei->get_count_isi_nilai(null, null, $cari['value'], $id_session);
			
			$header = $this->model_survei->get_survei_by_id($id_session);


            echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data,  'header' => $header));
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
	
	/* public function ax_data_survei_isi_nilai_responden($id_session) // inisalah
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_survei->getAllisinilai($length, $start, $cari['value'], $id_session)->result_array();
			$count 	= $this->model_survei->get_count_isi_nilai($length, $start, $cari['value'], $id_session);
            // $countfilter = $this->model_survei->getAllisinilai($length, $start, $cari['value'], $id_session)->num_rows();
            // $count = $this->model_survei->getAllisisurvei(null, null, null, $id_session)->num_rows();
            // $total = $this->model_survei->getAlltotalisinilai($id_session);
            // $critical = $this->model_survei->getAlltotalisicritical($id_session);
            $header = $this->model_survei->get_isi_survei_by_id($id_session);


             echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data,  'header' => $header));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.inspeksi.href='javascript:history.back(-1);'</script>";
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
    } */
	
	public function ax_set_data_isi_nilai()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
			$session_survei = $this->session->userdata('survei');
            
            $id_survei_detail = $this->input->post('id_survei_detail');
            $skors = $this->input->post('skors');
            $id_session = $session_survei;            
            $session = $this->session->userdata('login');
			
			if ($skors == '1'){
				$nm_skors = "Sangat Tidak Setuju";
			} else if($skors == '2'){
				$nm_skors = "Tidak Setuju";
			} else if($skors == '3'){
				$nm_skors = "Kurang Setuju";
			} else if($skors == '4'){
				$nm_skors = "Setuju";
			} else if($skors == '5'){
				$nm_skors = "Sangat Setuju";
			}
			
            $data = array(
                'id_survei_detail' => $id_survei_detail,
                'id_session' => $id_session,
                'skors' => $skors,
                'nm_skors' => $nm_skors,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
                $data['id_session'] = $this->model_survei->update_survei_isi_nilai($data);
            
            
            echo json_encode(array('status' => 'success', 'data' => $data));

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
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_survei = $this->input->post('id_survei');
            $nm_survei = $this->input->post('nm_survei');
			
    		$session = $this->session->userdata('login');
    		$data = array(
                'id_survei' => $id_survei,
                'nm_survei' => $nm_survei,
                'status' => 1,
    			'cuser' => $session['id_user'],
    			'id_perusahaan' => $session['id_perusahaan']
    		);
    		
    		if(empty($id_survei)){
    			$data['id_survei'] = $this->model_survei->insert_survei($data);
            }
    		else
            {
    			$data['id_survei'] = $this->model_survei->update_survei($data);
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
	
	public function ax_set_data_access()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_survei = $this->input->post('id_survei');
            $id_survei_access = $this->input->post('id_survei_access');
            $id_user = $this->input->post('id_user');
            $active = $this->input->post('active');
            $session = $this->session->userdata('login');
            $data = array(
                'id_survei' => $id_survei,
                'id_survei_access' => $id_survei_access,
                'id_user' => $id_user,
                'active' => $active,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
            if(empty($id_survei_access))
                $data['id_survei_access'] = $this->model_survei->insert_survei_access($data);
            else
                $data['id_survei_access'] = $this->model_survei->update_survei_access($data);
            
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

    public function ax_set_data_nilai()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_survei_detail = $this->input->post('id_survei_detail');
            $status = $this->input->post('status');
            
            
            $session = $this->session->userdata('login');
            $data = array(
                'id_survei_detail' => $id_survei_detail,
                'status' => $status,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
            
                $data['id_survei_detail'] = $this->model_survei->update_survei_nilai($data);
            
            
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
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_survei = $this->input->post('id_survei');
    		
    		$data = array('id_survei' => $id_survei);
    		
    		if(!empty($id_survei))
    			$data['id_survei'] = $this->model_survei->delete_survei($data);
    		
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
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

    		$id_survei = $this->input->post('id_survei');
    		
    		if(empty($id_survei))
    			$data = array();
    		else
    			$data = $this->model_survei->get_survei_by_id($id_survei);
    		
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

    public function ax_get_detail_id()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_survei_detail = $this->input->post('id_survei_detail');
            
            if(empty($id_survei_detail)){
                $datas = array();
            }
            else{
                $datas = $this->model_survei->get_survei_detail_id($id_survei_detail);
            }

          
               
               echo json_encode($datas);

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
	
	public function ax_get_cek_by_id()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
			$session_survei = $this->session->userdata('survei');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_cek = $this->input->post('id_cek');
            $id_session = $session_survei;
            
            // if(empty($id_cek)){
            //     $datas = array();
            // }
            // else{
            //     $datas = $this->model_inspeksi->getnilaicek($id_cek);
            // }

            // $data['response'] = 'false';
            // $data.= "<option></option>";
            
            // if($data->num_rows() > 0)
            //    {
            //        foreach($datas->result_array() as $row)
            //        {
            //          $data.= "<option>".$row['nm_nilai_cek']."</option>";
            //        }
            //    }
            //    echo json_encode($data);
                // $data = array();
                $query4 = $this->db->query("SELECT * FROM ref_nilai_cek WHERE id_cek='".$id_cek."'");
                $data= "<option value=''>--Pilih Nilai--</option>";
                if($query4->num_rows() > 0)
                {
                   foreach($query4->result_array() as $row)
                   {
                     $data.= "<option value='".$row['id_nilai_cek']."'>".$row['nm_nilai_cek']."</option>";
                   }
                }
               echo json_encode($data);

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.inspeksi.href='javascript:history.back(-1);'</script>";
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
	
	public function cek_isi_survei()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
			$session_survei = $this->session->userdata('survei');
            $id_session = $this->input->post('id_session');
			
            $data = array(
                'id_session' => $id_session,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
                $count = $this->model_survei->cek_isi_survei($data);
                $counttemplate = $this->model_survei->cek_isi_template($data);
				
				if($count == $counttemplate){
					$datas = array(
					
					'id_session' => $id_session,
					'status' => 1,
                    'ldate' => date('Y-m-d H:i:s') 
					);
				$update = $this->model_survei->update_header_responden($datas);
				if($update == 1){
				$msg = 'success';
				}else{
				$msg = 'Data Gagal Tersimpan';
				}
				}else{
					$msg = 'Data Belum Terisi Semua, Silahkan Lengkapi Terlebih Dahulu';
				}
            
            echo json_encode(array('status' => $msg, 'data' => $data, 'count' => $count));
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
	
	public function cekNIP() {
		$nip_responden = $this->input->post('nip_responden');
		$result = $this->model_survei->cekNIP($nip_responden);
		if($result != null){
			// print_r('if');exit();
			echo json_encode(array('status' => 'success', 'data' => $result));
		} else{
			echo json_encode(array('status' => 'failed', 'data' => $result));
			// print_r('else');exit();
		}
	}
	
	public function cekNomor() {
		$id_bu = $this->input->post('id_bu');
		$nip_responden = $this->input->post('nip_responden');
		$result = $this->model_survei->cekNomor($id_bu,$nip_responden);
		if($result != null){
			// print_r('if');exit();
			echo json_encode(array('status' => 'success', 'data' => $result));
		} else{
			echo json_encode(array('status' => 'failed', 'data' => $result));
			// print_r('else');exit();
		}
	}

    public function cekSurvei() {
        $id_survei = $this->input->post('id_survei');
        $nip_responden = $this->input->post('nip_responden');
        $password = do_hash($this->input->post('password'), 'md5');


        $id_session = $this->model_survei->cekSurvei($id_survei,$nip_responden,$password);
        
        if($id_session != null){
            // print_r('if');exit();
            
            $this->session->set_userdata('survei', $id_session['id_session']);
            echo json_encode(array('status' => 'success', 'data' => $id_session));
        } else{
            echo json_encode(array('status' => 'failed', 'data' => $id_session));
            // print_r('else');exit();
        }
    }
	
	function  tanggalYMD($tgl){
        $tanggal  =  substr($tgl,0,2);
        $bulan  = substr($tgl,3,2);
        $tahun  =  substr($tgl,6,4);
        return  $tahun.'-'.$bulan.'-'.$tanggal;
	}

    
}
