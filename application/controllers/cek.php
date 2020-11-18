<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class cek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_cek");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['jenis_combobox'] = $this->model_cek->jenis_combobox();
                $this->load->view('cek/index', $data);
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

    public function nilai($id_cek)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['id_cek'] = $id_cek;
                
                $cek = $this->model_cek->get_cek_by_id($id_cek);
                $data['nm_cek'] = $cek['nm_cek'];
                $data['session_level'] = $session['id_level'];
                $this->load->view('cek/nilai', $data);
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

    public function ax_data_cek()
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
            $data = $this->model_cek->getAllcek($length, $start, $cari['value'])->result_array();
            $count = $this->model_cek->get_count_cek($cari['value']);

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

    public function ax_data_cek_nilai($id_cek)
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
            $data = $this->model_cek->getAllceknilai($length, $start, $cari['value'], $id_cek)->result_array();
            $count = $this->model_cek->get_count_ceknilai($cari['value'], $id_cek);

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
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_cek = $this->input->post('id_cek');
            $id_jenis = $this->input->post('id_jenis');
            $nm_cek = $this->input->post('nm_cek');
            $active = $this->input->post('active');
            $critical = $this->input->post('critical');
            $deskripsi = $this->input->post('deskripsi');
    		$penilaian = $this->input->post('penilaian');
    		
    		$session = $this->session->userdata('login');
    		$data = array(
                'id_cek' => $id_cek,
                'deskripsi' => $deskripsi,
                'penilaian' => $penilaian,
    			'id_jenis' => $id_jenis,
    			'nm_cek' => $nm_cek,
                'active' => $active,
    			'critical' => $critical,
    			'id_perusahaan' => $session['id_perusahaan']
    		);
    		
    		if(empty($id_cek)){
    			$data['id_cek'] = $this->model_cek->insert_cek($data);
            }
    		else
            {
    			$data['id_cek'] = $this->model_cek->update_cek($data);
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

    public function ax_set_data_nilai()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_cek = $this->input->post('id_cek');
            $id_nilai_cek = $this->input->post('id_nilai_cek');
            $nm_nilai_cek = $this->input->post('nm_nilai_cek');
            $skors = $this->input->post('skors');
            $active = $this->input->post('active');
            $skors = $this->input->post('skors');
            
            $session = $this->session->userdata('login');
            $data = array(
                'id_cek' => $id_cek,
                'skors' => $skors,
                'id_nilai_cek' => $id_nilai_cek,
                'nm_nilai_cek' => $nm_nilai_cek,
                'active' => $active,
                'id_perusahaan' => $session['id_perusahaan'],
                'cuser' => $session['id_user'],
            );
            
            if(empty($id_nilai_cek)){
                $data['id_nilai_cek'] = $this->model_cek->insert_cek_nilai($data);
            }else{
                $data['id_nilai_cek'] = $this->model_cek->update_cek_nilai($data);
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
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_cek = $this->input->post('id_cek');
    		
    		$data = array('id_cek' => $id_cek);
    		
    		if(!empty($id_cek))
    			$data['id_cek'] = $this->model_cek->delete_cek($data);
    		
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

    public function ax_unset_data_nilai()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_nilai_cek = $this->input->post('id_nilai_cek');
            
            $data = array('id_nilai_cek' => $id_nilai_cek);
            
            if(!empty($id_nilai_cek))
                $data['id_nilai_cek'] = $this->model_cek->delete_cek_nilai($data);
            
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

    		$id_cek = $this->input->post('id_cek');
    		
    		if(empty($id_cek))
    			$data = array();
    		else
    			$data = $this->model_cek->get_cek_by_id($id_cek);
    		
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

    public function ax_get_data_by_id_nilai()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_nilai_cek = $this->input->post('id_nilai_cek');
            
            if(empty($id_nilai_cek)){
                $data = array();
            }
            else
            {
                $data = $this->model_cek->get_cek_by_id_nilai($id_nilai_cek);
            }
            
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
}
