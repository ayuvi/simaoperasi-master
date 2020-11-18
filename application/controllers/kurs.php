<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class kurs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_kurs");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $this->load->view('kurs/index', $data);
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

    

    public function ax_data_kurs()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_kurs->getAllkurs($length, $start, $cari['value'])->result_array();
            $count = $this->model_kurs->get_count_kurs($cari['value']);

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
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kurs = $this->input->post('id_kurs');
            $tanggal = $this->input->post('tanggal');
            $rupiah = $this->input->post('rupiah');
            $ringgit = $this->input->post('ringgit');
            $dollar = $this->input->post('dollar');
    		$active = $this->input->post('active');
    		$session = $this->session->userdata('login');
    		$data = array(
                'id_kurs' => $id_kurs,
                'tanggal' => $tanggal,
                'rupiah' => $rupiah,
                'ringgit' => $ringgit,
                'dollar' => $dollar,
    			'active' => $active,
    			'id_perusahaan' => $session['id_perusahaan'],
                'cuser' => $session['id_user'],
    		);
    		
    		if(empty($id_kurs))
    			$data['id_kurs'] = $this->model_kurs->insert_kurs($data);
    		else
    			$data['id_kurs'] = $this->model_kurs->update_kurs($data);
    		
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
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_kurs = $this->input->post('id_kurs');
    		
    		$data = array('id_kurs' => $id_kurs);
    		
    		if(!empty($id_kurs))
    			$data['id_kurs'] = $this->model_kurs->delete_kurs($data);
    		
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
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

    		$id_kurs = $this->input->post('id_kurs');
    		
    		if(empty($id_kurs))
    			$data = array();
    		else
    			$data = $this->model_kurs->get_kurs_by_id($id_kurs);
    		
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
