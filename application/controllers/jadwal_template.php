<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class jadwal_template extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_jadwal_template");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['bu_combobox'] = $this->model_jadwal_template->bu_combobox();
                $this->load->view('jadwal_template/index', $data);
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.jadwal_template.href='javascript:history.back(-1);'</script>";
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

    public function access($id_jadwal_template)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_user'] = $this->model_jadwal_template->combobox_user();
                $data['id_jadwal_template'] = $id_jadwal_template;
                $this->load->view('jadwal_template/access', $data);
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

    

    public function ax_data_jadwal_template()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_jadwal_template->getAlljadwal_template($length, $start, $cari['value'])->result_array();
            $count = $this->model_jadwal_template->get_count_jadwal_template($cari['value']);

            echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.jadwal_template.href='javascript:history.back(-1);'</script>";
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

    public function ax_data_jadwal_template_access($id_jadwal_template)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_jadwal_template->getAlljadwal_templateaccess($length, $start, $cari['value'], $id_jadwal_template)->result_array();
            $count = $this->model_jadwal_template->getAlljadwal_templateaccess(null, null, $cari['value'], $id_jadwal_template)->num_rows();

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

    

	public function ax_set_data()
	{
		if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_jadwal_template = $this->input->post('id_jadwal_template');
            $id_bu = $this->input->post('id_bu');
            $nm_jadwal_template = $this->input->post('nm_jadwal_template');
            $active = $this->input->post('active');
            $kd_jadwal_template = $this->input->post('kd_jadwal_template');
    		$penilaian = $this->input->post('penilaian');
    		
    		$session = $this->session->userdata('login');
    		$data = array(
                'id_jadwal_template' => $id_jadwal_template,
                'kd_jadwal_template' => $kd_jadwal_template,
    			'id_bu' => $id_bu,
    			'nm_jadwal_template' => $nm_jadwal_template,
    			'active' => $active,
    			'id_perusahaan' => $session['id_perusahaan']
    		);
    		
    		if(empty($id_jadwal_template)){
    			$data['id_jadwal_template'] = $this->model_jadwal_template->insert_jadwal_template($data);
            }
    		else
            {
    			$data['id_jadwal_template'] = $this->model_jadwal_template->update_jadwal_template($data);
            }
    		
    		echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.jadwal_template.href='javascript:history.back(-1);'</script>";
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
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_jadwal_template = $this->input->post('id_jadwal_template');
            $id_jadwal_template_access = $this->input->post('id_jadwal_template_access');
            $id_user = $this->input->post('id_user');
            $active = $this->input->post('active');
            $session = $this->session->userdata('login');
            $data = array(
                'id_jadwal_template' => $id_jadwal_template,
                'id_jadwal_template_access' => $id_jadwal_template_access,
                'id_user' => $id_user,
                'active' => $active,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
            if(empty($id_jadwal_template_access))
                $data['id_jadwal_template_access'] = $this->model_jadwal_template->insert_jadwal_template_access($data);
            else
                $data['id_jadwal_template_access'] = $this->model_jadwal_template->update_jadwal_template_access($data);
            
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
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_jadwal_template = $this->input->post('id_jadwal_template');
    		
    		$data = array('id_jadwal_template' => $id_jadwal_template);
    		
    		if(!empty($id_jadwal_template))
    			$data['id_jadwal_template'] = $this->model_jadwal_template->delete_jadwal_template($data);
    		
    		echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.jadwal_template.href='javascript:history.back(-1);'</script>";
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

    public function ax_unset_data_access()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_jadwal_template_access = $this->input->post('id_jadwal_template_access');
            
            $data = array('id_jadwal_template_access' => $id_jadwal_template_access);
            
            if(!empty($id_jadwal_template_access))
                $data['id_jadwal_template_access'] = $this->model_jadwal_template->delete_jadwal_template_access($data);
            
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
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

    		$id_jadwal_template = $this->input->post('id_jadwal_template');
    		
    		if(empty($id_jadwal_template))
    			$data = array();
    		else
    			$data = $this->model_jadwal_template->get_jadwal_template_by_id($id_jadwal_template);
    		
    		echo json_encode($data);

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.jadwal_template.href='javascript:history.back(-1);'</script>";
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

    public function ax_get_data_access_by_id()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_jadwal_template_access = $this->input->post('id_jadwal_template_access');
            
            if(empty($id_jadwal_template_access))
                $data = array();
            else
                $data = $this->model_jadwal_template->get_jadwal_template_access_by_id($id_jadwal_template_access);
            
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
