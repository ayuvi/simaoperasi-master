<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class layout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_layout");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $this->load->view('layout/index', $data);
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

    

    public function ax_data_layout()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_layout->getAlllayout($length, $start, $cari['value'])->result_array();
            $count = $this->model_layout->get_count_layout($cari['value']);

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

    public function ax_data_layout_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_layout = $this->input->post('id_layout');
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_layout->getAlllayoutdetail($length, $start, $cari['value'],$id_layout)->result_array();
            $count = $this->model_layout->get_count_layoutdetail($cari['value'],$id_layout);

            echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data, 'id_layout' => $id_layout));
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
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_layout = $this->input->post('id_layout');
            $nm_layout = $this->input->post('nm_layout');
    		$active = $this->input->post('active');
    		$session = $this->session->userdata('login');
    		$data = array(
                'id_layout' => $id_layout,
                'nm_layout' => $nm_layout,
    			'active' => $active,
    			'id_perusahaan' => $session['id_perusahaan']
    		);
    		
    		if(empty($id_layout))
    			$data['id_layout'] = $this->model_layout->insert_layout($data);
    		else
    			$data['id_layout'] = $this->model_layout->update_layout($data);
    		
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
	
    public function ax_set_data_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_layout_detail = $this->input->post('id_layout_detail');
            $id_layout = $this->input->post('id_layout');
            $a = $this->input->post('a');
            $b = $this->input->post('b');
            $c = $this->input->post('c');
            $d = $this->input->post('d');
            $e = $this->input->post('e');
            $f = $this->input->post('f');
            $session = $this->session->userdata('login');
            $data = array(
                'id_layout' => $id_layout,
                'id_layout_detail' => $id_layout_detail,
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'd' => $d,
                'e' => $e,
                'f' => $f,
            );
            
            if(empty($id_layout_detail))
                $data['id_layout_detail'] = $this->model_layout->insert_layout_detail($data);
            else
                $data['id_layout_detail'] = $this->model_layout->update_layout_detail($data);
            
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
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_layout = $this->input->post('id_layout');
    		
    		$data = array('id_layout' => $id_layout);
    		
    		if(!empty($id_layout))
    			$data['id_layout'] = $this->model_layout->delete_layout($data);
    		
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

    public function ax_unset_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_layout_detail = $this->input->post('id_layout_detail');
            
            $data = array('id_layout_detail' => $id_layout_detail);
            
            if(!empty($id_layout_detail))
                $data['id_layout_detail'] = $this->model_layout->delete_layout_detail($data);
            
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
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

    		$id_layout = $this->input->post('id_layout');
    		
    		if(empty($id_layout))
    			$data = array();
    		else
    			$data = $this->model_layout->get_layout_by_id($id_layout);
    		
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

    public function ax_get_data_by_layout_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_layout_detail = $this->input->post('id_layout_detail');
            
            if(empty($id_layout_detail))
                $data = array();
            else
                $data = $this->model_layout->get_layout_by_layout_detail($id_layout_detail);
            
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

    public function ax_get_data_by_layout()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S16";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_layout = $this->input->post('id_layout');
            $datas = $this->model_layout->design_layout($id_layout);
            $str ="<table   >";
                foreach ($datas->result() as $rows)
                {
                $str .="<tr>";
                
                if($rows->a != 0){
                $str .="<td><a class='btn btn-block kursi  btn-success' style='margin-bottom: 5px;'><i class='fa fa-user'></i> ".$rows->a." </a></td>";
                }else{
                $str .="<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
                if($rows->b != 0){
                $str .="<td><a class='btn btn-block kursi  btn-success' style='margin-bottom: 5px; margin-left: 2px; '><i class='fa fa-user'></i> ".$rows->b."</a></td>";
                }else{
                $str .="<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
                if($rows->c != 0){
                $str .="<td><a class='btn btn-block kursi btn-success' style='margin-bottom: 5px; margin-left: 4px; '><i class='fa fa-user'></i> ".$rows->c."</a></td>";
                }else{
                $str .="<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
                if($rows->d != 0){
                $str .="<td><a class='btn btn-block kursi  btn-success' style='margin-bottom: 5px; margin-left: 6px; '><i class='fa fa-user'></i> ".$rows->d."</a></td>";
                }else{
                $str .="<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
                if($rows->e != 0){
                $str .="<td><a class='btn btn-block kursi  btn-success' style='margin-bottom: 5px;margin-left: 8px; '><i class='fa fa-user'></i> ".$rows->e."</a></td>";
                }else{
                $str .="<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
                if($rows->f != 0){
                $str .="<td><a class='btn btn-block kursi  btn-success' style='margin-bottom: 5px; margin-left: 10px;'><i class='fa fa-user'></i> ".$rows->f."</a></td>";
                }else{
                $str .="<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                }
                $str .="</tr>";
                }
                $str.="</table><hr>";

                echo json_encode(array('status' => 'success', 'layout' => $str));
            

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

    public function layout($id_layout)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                
                $datas = $this->model_armada->design_layout($id_layout);
                
                
                $this->load->view('armada/layout', $data);
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
