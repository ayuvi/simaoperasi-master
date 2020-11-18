<?php if (! defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Reports extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_menu");
		$this->load->model("model_reports");
        $this->load->model("model_reports_ak13");
        $this->load->model("model_reports_ak13_bor");
        $this->load->model("model_cetak");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function slip_setoran()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_segment'] = $this->model_reports->combobox_segment();
                $this->load->view('reports/slip_setoran', $data);
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

    public function ak1()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu']                    = $this->model_reports->combobox_bu();
                $data['combobox_segment']               = $this->model_reports->combobox_segment();
                $data['combobox_komponen_pendapatan']   = $this->model_reports->combobox_komponen_pendapatan();
                $this->load->view('reports/ak1', $data);
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

    public function ak2()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R04";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu']            = $this->model_reports->combobox_bu();
                $data['combobox_segment']       = $this->model_reports->combobox_segment();
                $data['combobox_komponen_pengeluaran'] = $this->model_reports->combobox_komponen_pengeluaran();
                $this->load->view('reports/ak2', $data);
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

    public function ap5()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu']        = $this->model_reports->combobox_bu();
                $data['combobox_segment']   = $this->model_reports->combobox_segment();
                $this->load->view('reports/ap5', $data);
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

    public function lpe()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu']        = $this->model_reports->combobox_bu();
                $data['combobox_segment']   = $this->model_reports->combobox_segment();
                $this->load->view('reports/lpe', $data);
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

    public function ap6()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_segment'] = $this->model_reports->combobox_segment();
                $this->load->view('reports/ap6', $data);
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

    public function ak13()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R07";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_reports->combobox_bu();
                $data['combobox_segment'] = $this->model_reports->combobox_segment();
                $this->load->view('reports/ak13', $data);
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

    public function absensi_pengemudi()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_segment'] = $this->model_reports->combobox_segment();
                $this->load->view('reports/absensi_pengemudi', $data);
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

    public function pendapatan_pengemudi()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_segment'] = $this->model_reports->combobox_segment();
                $this->load->view('reports/pendapatan_pengemudi', $data);
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

    public function lpb1()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R11";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_segment'] = $this->model_reports->combobox_segment();
                $this->load->view('reports/lpb1', $data);
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

    public function tj()
    {
      if ($this->session->userdata('login')) {
       $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level']      = $session['id_level'];
                $data['combobox_bu']        = $this->model_reports->combobox_bu();
                $data['combobox_armada_sbu']        = $this->model_reports->combobox_armada_sbu();
                $data['combobox_segment']   = $this->model_reports->combobox_segment();
                $this->load->view('reports/tj', $data);
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

    public function ax_get_armada()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_segment = $this->input->post('id_segment');
                $data = $this->model_reports->combobox_armada($id_segment);
                $html = "<option value='0'>--Armada--</option>";
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

    public function ax_get_armada_()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $data = $this->model_reports->combobox_armada_($id_bu);
                $html = "<option value='0'>--Armada--</option>";
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

    public function ax_get_armada_ak1_dan_ak2()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu      = $this->input->post('id_bu');
                $id_segment = $this->input->post('id_segment');

                $this->db->from("ref_armada a");
                $this->db->where('active in (0,1)');
                if ($id_bu=='0') {} else { $this->db->where('id_bu', $id_bu); }
                if ($id_segment=='0') {} else { $this->db->where('id_segment', $id_segment); }
                $data = $this->db->get();
                $html = "<option value='0'>--Armada--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->id_armada."'>".$row->kd_armada." - ".$row->plat_armada." (".$row->nm_segment.")</option>"; 
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

    public function ax_get_trayek(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_bu      = $this->input->post('id_bu');
                $kd_segment = $this->input->post('kd_segment');
                $data = $this->model_reports->combobox_trayek($id_bu,$kd_segment);
                $html = "<option value='0'>--All Trayek--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal." - ".$row->nm_point_akhir." (".$row->kd_trayek.")</option>"; 
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


    public function ax_get_trayek_ak1_dan_ak2(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "R03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_bu      = $this->input->post('id_bu');
                $id_segment = $this->input->post('id_segment');

                $this->db->from("ref_trayek a");
                if($id_bu != 0){ $this->db->where('a.id_bu', $id_bu); }
                if($id_segment != '0'){ $this->db->where('a.id_segment', $id_segment); }
                $this->db->order_by('a.id_trayek');
                $data = $this->db->get();

                $html = "<option value='0'>--All Trayek--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal." - ".$row->nm_point_akhir." (".$row->kd_trayek.")</option>"; 
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

    function prints(){
        $folder = "reports/print/".$this->input->get("name");
        $kertas = $this->input->get("uk");
        $session = $this->session->userdata('login');
        $id_bu = $session['id_bu'];

        $data = array(
            "kertas"        => $kertas ? $kertas : "F4-L",
            "nama_user"     => $session['nm_user'],
            "nama_manager"  => $this->model_reports->manager_nama($id_bu),
            "nik_manager"   => $this->model_reports->manager_nik($id_bu,$this->model_reports->manager_nama($id_bu)),
            "cabang"        => $id_bu,
            "cabang_nama"   => $this->model_reports->get_info("nm_bu","ref_bu","id_bu",$id_bu),
            "cabang_kota"   => $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu)
            );
        $this->model_cetak->cetak($folder,$data);
    }

}
