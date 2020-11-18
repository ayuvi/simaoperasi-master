<?php if (! defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class absensi_teknik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_absensi_teknik");
		$this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
	}

	public function index()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
            	$data['id_user'] = $session['id_user'];
            	$data['nm_user'] = $session['nm_user'];
            	$data['session_level'] = $session['id_level'];
            	$data['combobox_bu'] = $this->model_absensi_teknik->combobox_bu();
            	$data['combobox_segment'] = $this->model_absensi_teknik->combobox_segment();

            	$this->load->view('absensi_armada/teknik', $data);
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

    

    public function ax_data_absensi_teknik()
    {

    	if ($this->session->userdata('login')) {
    		$session = $this->session->userdata('login');
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            	$id_bu = $this->input->post('id_bu');
            	$id_segment = $this->input->post('id_segment');
            	$tanggal = $this->input->post('tanggal');
            	$start = $this->input->post('start');
            	$draw = $this->input->post('draw');
            	$length = $this->input->post('length');
            	$cari = $this->input->post('search', true);
            	$data = $this->model_absensi_teknik->getAllabsensi_teknik($length, $start, $cari['value'], $id_bu, $tanggal,$id_segment)->result_array();
            	$count = $this->model_absensi_teknik->get_count_absensi_teknik($cari['value'], $id_bu, $tanggal,$id_segment);

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
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            	$session   = $this->session->userdata('login');
            	$kd_armada = $this->input->post('kd_armada');
            	$status    = $this->input->post('status');

            	$data = array(
            		'kd_armada'     => $this->input->post('kd_armada'),
            		'id_bu'         => $this->input->post('id_cabang'),
            		'status'        => $this->input->post('status'),
            		'tgl_absensi'   => $this->input->post('tanggal'),
            		'keterangan'    => $this->input->post('keterangan'),
            		'cuser'         => $session['id_user']
            	);


            	$query = $this->model_absensi_teknik->insert_absensi_teknik($data);

            	if($query){
            		echo json_encode(array('status' => 'success', 'data' => $query));
            	}else{
            		echo json_encode(array('status' => 'fail', 'data' => $query));
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

    public function ax_unset_data()
    {
    	if ($this->session->userdata('login')) {
    		$session = $this->session->userdata('login');
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            	$id_pegawai = $this->input->post('id_pegawai');

            	$data = array('id_pegawai' => $id_pegawai);

            	if(!empty($id_pegawai))
            		$data['id_pegawai'] = $this->model_absensi_teknik->delete_absensi_teknik($data);

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
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            	$id_pegawai = $this->input->post('id_pegawai');
            	$id_bu = $this->input->post('id_bu');

            	if(empty($id_pegawai))
            		$data = array();
            	else
            		$data = $this->model_absensi_teknik->get_absensi_teknik_by_id($id_pegawai,$id_bu);

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

    public function ax_get_trayek(){
    	if ($this->session->userdata('login')) {
    		$session = $this->session->userdata('login');
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
            	$id_cabang = $this->input->post('id_cabang');
            	$data = $this->model_absensi_teknik->list_trayek($id_cabang);
            	$html = "<option value='0'>--Trayek--</option>";
            	foreach ($data->result() as $row) {
            		$html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal." - ".$row->nm_point_akhir."</option>"; 
            	}
            	$callback = array('data_trayek'=>$html);
            	echo json_encode($callback);

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

    public function ax_get_armada(){
    	if ($this->session->userdata('login')) {
    		$session = $this->session->userdata('login');
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
            	$id_cabang = $this->input->post('id_cabang');
            	$data = $this->model_absensi_teknik->list_armada($id_cabang);
            	$html = "<option value='0'>--Trayek--</option>";
            	foreach ($data->result() as $row) {
            		$html .= "<option value='".$row->kd_armada."'>".$row->kd_armada."</option>"; 
            	}
            	$callback = array('data_armada'=>$html);
            	echo json_encode($callback);

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

    public function ax_copy_absensi_teknik()
    {
    	if ($this->session->userdata('login')) {
    		$session = $this->session->userdata('login');
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            	$username   = $session['username'];
            	$id_cabang  = $this->input->post('id_cabang');
            	$id_segment  = $this->input->post('id_segment');
            	$tanggal_from  = $this->input->post('tanggal_from');
            	$tanggal_to    = $this->input->post('tanggal_to');

            	$data = array(
            		'id_cabang' => $id_cabang,
            		'id_segment' => $id_segment,
            		'tanggal'   => $tanggal_from,
            		'tanggal_to' => $tanggal_to,
            	);

            	$status = $this->model_absensi_teknik->copyAbsensiArmada($id_cabang,$id_segment,$tanggal_from,$tanggal_to);
            	echo json_encode(array('status' => 'success', 'tanggal_to' => $tanggal_to));

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

    public function ax_unset_data_all_absent()
    {
    	if ($this->session->userdata('login')) {
    		$session = $this->session->userdata('login');
            $menu_kd_menu_details = "U07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            	$id_bu = $this->input->post('id_bu');
            	$id_segment = $this->input->post('id_segment');
            	$tanggal = $this->input->post('tanggal');
            	
            	if($id_segment==0){
            		$status = $this->db->delete('tr_absensi_armada_teknik', array('tgl_absensi' => $tanggal,'id_bu' => $id_bu));
            	}else{
            		$status = $this->db->delete('tr_absensi_armada_teknik', array('tgl_absensi' => $tanggal,'id_bu' => $id_bu,'id_segment' => $id_segment));
            	}
            	echo json_encode(array('status' => $status));

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
