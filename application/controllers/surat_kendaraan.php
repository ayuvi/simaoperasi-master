<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class surat_kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_surat_kendaraan");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu']        = $this->model_surat_kendaraan->combobox_bu();
                $data['combobox_segmen']    = $this->model_surat_kendaraan->combobox_segmen();
                $this->load->view('surat_kendaraan/index', $data);
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->surat_kendaraan(1) != null) {
                $url = $this->uri->surat_kendaraan(1);
                $url = $url.' '.$this->uri->surat_kendaraan(2);
                $url = $url.' '.$this->uri->surat_kendaraan(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    

    public function ax_data_surat_kendaraan()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_surat_kendaraan->getAllsurat_kendaraan($length, $start, $cari['value'])->result_array();
            $count = $this->model_surat_kendaraan->get_count_surat_kendaraan($cari['value']);

            echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->surat_kendaraan(1) != null) {
                $url = $this->uri->surat_kendaraan(1);
                $url = $url.' '.$this->uri->surat_kendaraan(2);
                $url = $url.' '.$this->uri->surat_kendaraan(3);
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
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_surat_kendaraan = $this->input->post('id_surat_kendaraan');
            $kd_surat_kendaraan = $this->input->post('kd_surat_kendaraan');
            $nm_surat_kendaraan = $this->input->post('nm_surat_kendaraan');
    		$active = $this->input->post('active');
    		$session = $this->session->userdata('login');
    		$data = array(
                'id_surat_kendaraan' => $id_surat_kendaraan,
                'kd_surat_kendaraan' => $kd_surat_kendaraan,
                'nm_surat_kendaraan' => $nm_surat_kendaraan,
    			'active' => $active,
    			'id_perusahaan' => $session['id_perusahaan']
    		);
    		
    		if(empty($id_surat_kendaraan))
    			$data['id_surat_kendaraan'] = $this->model_surat_kendaraan->insert_surat_kendaraan($data);
    		else
    			$data['id_surat_kendaraan'] = $this->model_surat_kendaraan->update_surat_kendaraan($data);
    		
    		echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->surat_kendaraan(1) != null) {
                $url = $this->uri->surat_kendaraan(1);
                $url = $url.' '.$this->uri->surat_kendaraan(2);
                $url = $url.' '.$this->uri->surat_kendaraan(3);
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
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_surat_kendaraan = $this->input->post('id_surat_kendaraan');
    		
    		$data = array('id_surat_kendaraan' => $id_surat_kendaraan);
    		
    		if(!empty($id_surat_kendaraan))
    			$data['id_surat_kendaraan'] = $this->model_surat_kendaraan->delete_surat_kendaraan($data);
    		
    		echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->surat_kendaraan(1) != null) {
                $url = $this->uri->surat_kendaraan(1);
                $url = $url.' '.$this->uri->surat_kendaraan(2);
                $url = $url.' '.$this->uri->surat_kendaraan(3);
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
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

    		$id_surat_kendaraan = $this->input->post('id_surat_kendaraan');
    		
    		if(empty($id_surat_kendaraan))
    			$data = array();
    		else
    			$data = $this->model_surat_kendaraan->get_surat_kendaraan_by_id($id_surat_kendaraan);
    		
    		echo json_encode($data);

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->surat_kendaraan(1) != null) {
                $url = $this->uri->surat_kendaraan(1);
                $url = $url.' '.$this->uri->surat_kendaraan(2);
                $url = $url.' '.$this->uri->surat_kendaraan(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
	}
}
