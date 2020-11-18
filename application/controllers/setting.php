<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_setting");
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
                $this->load->view('setting/index', $data);
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->setting(1) != null) {
                $url = $this->uri->setting(1);
                $url = $url.' '.$this->uri->setting(2);
                $url = $url.' '.$this->uri->setting(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    

    public function ax_data_setting()
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
            $data = $this->model_setting->getAllsetting($length, $start, $cari['value'])->result_array();
            $count = $this->model_setting->get_count_setting($cari['value']);

            echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->setting(1) != null) {
                $url = $this->uri->setting(1);
                $url = $url.' '.$this->uri->setting(2);
                $url = $url.' '.$this->uri->setting(3);
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

            $id_setting = $this->input->post('id_setting');
            $nama = $this->input->post('nama');
            $nilai = $this->input->post('nilai');
            $active = $this->input->post('active');
            $session = $this->session->userdata('login');
            $data = array(
                'id_setting' => $id_setting,
                'nama' => $nama,
                'nilai' => $nilai,
                'active' => $active,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
            if(empty($id_setting))
                $data['id_setting'] = $this->model_setting->insert_setting($data);
            else
                $data['id_setting'] = $this->model_setting->update_setting($data);
            
            echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->setting(1) != null) {
                $url = $this->uri->setting(1);
                $url = $url.' '.$this->uri->setting(2);
                $url = $url.' '.$this->uri->setting(3);
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

            $id_setting = $this->input->post('id_setting');
            
            $data = array('id_setting' => $id_setting);
            
            if(!empty($id_setting)){
                $data['id_setting'] = $this->model_setting->delete_setting($data);
            }
            echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->setting(1) != null) {
                $url = $this->uri->setting(1);
                $url = $url.' '.$this->uri->setting(2);
                $url = $url.' '.$this->uri->setting(3);
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

            $id_setting = $this->input->post('id_setting');
            
            if(empty($id_setting))
                $data = array();
            else
                $data = $this->model_setting->get_setting_by_id($id_setting);
            
            echo json_encode($data);

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->setting(1) != null) {
                $url = $this->uri->setting(1);
                $url = $url.' '.$this->uri->setting(2);
                $url = $url.' '.$this->uri->setting(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }
}
