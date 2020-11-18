<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class lmb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lmb");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['bu_combobox'] = $this->model_lmb->bu_combobox();
                $data['trayek_combobox'] = $this->model_lmb->combobox_trayek();
                $data['armada_combobox'] = $this->model_lmb->combobox_armada();
				$data['cabang'] = $this->model_lmb->get_cabang();
				$data['pool'] = [];
				$data['armada'] = [];
				$data['trayek'] = [];
                $this->load->view('lmb/index', $data);
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.lmb.href='javascript:history.back(-1);'</script>";
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

    public function access($id_lmb)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_user'] = $this->model_lmb->combobox_user();
                $data['combobox_komponen'] = $this->model_lmb->combobox_komponen();
                $data['id_lmb'] = $id_lmb;
                $this->load->view('lmb/access', $data);
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
	
	public function teknik($id_lmb)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_user'] = $this->model_lmb->combobox_user();
                $data['combobox_komponen'] = $this->model_lmb->combobox_komponen_teknik();
                $data['id_lmb'] = $id_lmb;
                $this->load->view('lmb/teknik', $data);
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

    

    public function ax_data_lmb($cabang="", $pool="", $armada="", $trayek="", $dt="")
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
				$cabang = empty($cabang) ? "kosong" : $cabang;
				$pool = empty($pool) ? "kosong" : $pool;
				$armada = empty($armada) ? "kosong" : $armada;
				$trayek = empty($trayek) ? "kosong" : $trayek;
				$dt = empty($dt) ? "kosong" : $dt;
				$start = $this->input->post('start');
				$draw = $this->input->post('draw');
				$length = $this->input->post('length');
				$cari = $this->input->post('search', true);
				$data = $this->model_lmb->getAlllmb($length, $start, $cari['value'], $cabang, $pool, $armada, $trayek, $dt)->result_array();
				$count = $this->model_lmb->get_count_lmb($cari['value'], $cabang, $pool, $dt);
				echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.lmb.href='javascript:history.back(-1);'</script>";
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

    public function ax_data_lmb_access($id_lmb)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_lmb->getAlllmbaccess($length, $start, $cari['value'], $id_lmb)->result_array();
            $count = $this->model_lmb->getAlllmbaccess(null, null, $cari['value'], $id_lmb)->num_rows();

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
	
	public function ax_data_lmb_teknik($id_lmb)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_lmb->getAlllmbteknik($length, $start, $cari['value'], $id_lmb)->result_array();
            $count = $this->model_lmb->getAlllmbteknik(null, null, $cari['value'], $id_lmb)->num_rows();

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
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb = $this->input->post('id_lmb');
            $id_bu = $this->input->post('id_bu');
            $nm_lmb = $this->input->post('nm_lmb');
            $active = $this->input->post('active');
            $kd_lmb = $this->input->post('kd_lmb');
    		$penilaian = $this->input->post('penilaian');
    		
    		$session = $this->session->userdata('login');
    		$data = array(
                'id_lmb' => $id_lmb,
                'kd_lmb' => $kd_lmb,
    			'id_bu' => $id_bu,
    			'nm_lmb' => $nm_lmb,
    			'active' => $active,
    			'id_perusahaan' => $session['id_perusahaan']
    		);
    		
    		if(empty($id_lmb)){
    			$data['id_lmb'] = $this->model_lmb->insert_lmb($data);
            }
    		else
            {
    			$data['id_lmb'] = $this->model_lmb->update_lmb($data);
            }
    		
    		echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.lmb.href='javascript:history.back(-1);'</script>";
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
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb = $this->input->post('id_lmb');
            $id_lmb_access = $this->input->post('id_lmb_access');
            $id_komponen = $this->input->post('id_komponen');
            $nilai = $this->input->post('nilai');
            $session = $this->session->userdata('login');
            $data = array(
                'id_lmb' => $id_lmb,
                'id_lmb_access' => $id_lmb_access,
                'id_komponen' => $id_komponen,
                'nilai' => $nilai,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
            if(empty($id_lmb_access))
                $data['id_lmb_access'] = $this->model_lmb->insert_lmb_access($data);
            else
                $data['id_lmb_access'] = $this->model_lmb->update_lmb_access($data);
            
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
	
	public function ax_set_data_teknik()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb = $this->input->post('id_lmb');
            $id_lmb_teknik = $this->input->post('id_lmb_teknik');
            $id_komponen = $this->input->post('id_komponen');
            $nilai = $this->input->post('nilai');
            $session = $this->session->userdata('login');
            $data = array(
                'id_lmb' => $id_lmb,
                'id_lmb_teknik' => $id_lmb_teknik,
                'id_komponen_teknik' => $id_komponen,
                'nilai' => $nilai,
                'id_perusahaan' => $session['id_perusahaan']
            );
            
            if(empty($id_lmb_teknik))
                $data['id_lmb_teknik'] = $this->model_lmb->insert_lmb_teknik($data);
            else
                $data['id_lmb_teknik'] = $this->model_lmb->update_lmb_teknik($data);
            
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
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb = $this->input->post('id_lmb');
    		
    		$data = array('id_lmb' => $id_lmb);
    		
    		if(!empty($id_lmb))
    			$data['id_lmb'] = $this->model_lmb->delete_lmb($data);
    		
    		echo json_encode(array('status' => 'success', 'data' => $data));

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.lmb.href='javascript:history.back(-1);'</script>";
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
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb_access = $this->input->post('id_lmb_access');
            
            $data = array('id_lmb_access' => $id_lmb_access);
            
            if(!empty($id_lmb_access))
                $data['id_lmb_access'] = $this->model_lmb->delete_lmb_access($data);
            
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
	
	public function ax_unset_data_teknik()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb_teknik = $this->input->post('id_lmb_teknik');
            
            $data = array('id_lmb_teknik' => $id_lmb_teknik);
            
            if(!empty($id_lmb_teknik))
                $data['id_lmb_teknik'] = $this->model_lmb->delete_lmb_teknik($data);
            
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
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

    		$id_lmb = $this->input->post('id_lmb');
    		
    		if(empty($id_lmb))
    			$data = array();
    		else
    			$data = $this->model_lmb->get_lmb_by_id($id_lmb);
    		
    		echo json_encode($data);

        } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.lmb.href='javascript:history.back(-1);'</script>";
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
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb_access = $this->input->post('id_lmb_access');
            
            if(empty($id_lmb_access))
                $data = array();
            else
                $data = $this->model_lmb->get_lmb_access_by_id($id_lmb_access);
            
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
	
	public function ax_get_data_teknik_by_id()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_lmb_teknik = $this->input->post('id_lmb_teknik');
            
            if(empty($id_lmb_teknik))
                $data = array();
            else
                $data = $this->model_lmb->get_lmb_teknik_by_id($id_lmb_teknik);
            
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


    public function cetakLmb(){
            $id_lmb = $this->input->post('kode');
            $isi = "";
            $query          = $this->db->query("SELECT * FROM tr_lmb WHERE id_lmb = '$id_lmb'");
            $nm_driver      = $query->row("nm_driver");    
            $kd_armada      = $query->row("kd_armada");    

            $qry = "SELECT * FROM tr_rit WHERE id_lmb = '$id_lmb' AND type_rit != '3'";
            $isi   .= "<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='center' valign='center'> 
                            <span style='font-size:21px;font-weight:bold;valign:center'> D A M R I</span>
                            </td>
                        </tr>
                    </table>
                    <table  width='90%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0'>
                    <tr>
                        <td valign='center' >ID </td>
                        <td valign='center' >: $id_lmb</td>
                    <tr>
                    <tr>
                        <td valign='center' >Armada </td>
                        <td valign='center' >: $kd_armada</td>
                    <tr>
                    <tr>
                        <td valign='center' >Driver </td>
                        <td valign='center' >: $nm_driver</td>
                    <tr>
                    <tr>
                        <td valign='center' > &nbsp; </td>
                        <td valign='center' > &nbsp; </td>
                    <tr>
                    </table>
                    <table  width='90%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='1' align='center'>
                    <tr>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>RIT</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>TRAYEK</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>PNP</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>Harga</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>Total</td>
                    <tr>";
             $sql_kursi = $this->db->query($qry);
             $data_kursi = $sql_kursi->result_array();
             $tot = $totpnp = $totharga =0;
             foreach($data_kursi as $data){
             extract($data);
             $tot=$tot+$total;
             $totpnp=$totpnp+$pnp;
             $totharga=$totharga+$harga;
                $isi    .="
                     <tr>
                    <td align='center'>".$rit."</td>
                    <td align='center'>".$kd_trayek."</td>
                    <td align='center'>".$pnp."</td>
                    <td align='right'>".number_format($harga)."</td>
                    <td align='right'>".number_format($total)."</td>
                    <tr>
                ";
               }

             $isi    .="
                    <tr>
                        <td bgcolor='#c9c9c9' colspan='2'></td>
                        <td bgcolor='#c9c9c9'align='center'>".$totpnp."</td>
                        <td bgcolor='#c9c9c9' align='right'>".number_format($totharga)."</td>
                        <td bgcolor='#c9c9c9'align='right'>".number_format($tot)."</td>
                    <tr>
                ";
            $qry_ = "SELECT * FROM tr_lmb_access a 
                    LEFT JOIN ref_komponen b ON a.id_komponen=b.id_komponen 
                    WHERE id_lmb='$id_lmb'";
            $sql_ = $this->db->query($qry_);
            $data_ = $sql_->result_array();
             foreach($data_ as $data1_){
             extract($data1_);
             if($type_komponen=='MINUS'){
                $tot=$tot-$nilai;
             }else{
                $tot=$tot+$nilai;
             }

              $isi    .="
                    <tr>
                        <td colspan='4' align='left'>$nm_komponen</td>
                        <td align='right'><b>".number_format($nilai)."</b></td>
                    <tr>
                ";
            }
            $isi    .="
                    <tr>
                        <td colspan='4' bgcolor='#c9c9c9' align='center'><b>TOTAL</b></td>
                        <td bgcolor='#c9c9c9' align='right'><b>".number_format($tot)."</b></td>
                    <tr>
                </table>
                ";
           
            $callback = array('data'=>$isi);
            echo json_encode($callback);
    }
	
	public function cetakdetkomponenLmb(){
            $id_lmb = $this->input->post('kode');
            $isi = "";
            $query          = $this->db->query("SELECT nm_driver, kd_armada FROM tr_lmb WHERE id_lmb = '$id_lmb'");
            $nm_driver      = $query->row("nm_driver");    
            $kd_armada      = $query->row("kd_armada");    

            $qry = "select * from (
						select a.kd_trayek, DATE_FORMAT(DATE(a.cdate),'%d-%m-%Y') cdate, c.nm_komponen, c.type_komponen, b.nilai
						from tr_lmb a
						join tr_lmb_access b on a.id_lmb = b.id_lmb
						join ref_komponen c on b.id_komponen = c.id_komponen
						where a.id_lmb = '$id_lmb'
						UNION ALL
						select a.kd_trayek, DATE_FORMAT(DATE(a.cdate),'%d-%m-%Y') cdate, c.nm_komponen_teknik nm_komponen, c.type_komponen_teknik type_komponen, b.nilai
						from tr_lmb a
						join tr_lmb_teknik b on a.id_lmb = b.id_lmb
						join ref_komponen_teknik c on b.id_komponen_teknik = c.id_komponen_teknik
						where a.id_lmb = '$id_lmb'
					) a WHERE type_komponen = 'PLUS' order by type_komponen";
            $isi   .= "<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='center' valign='center'> 
                            <span style='font-size:21px;font-weight:bold;valign:center'> D A M R I</span>
                            </td>
                        </tr>
                    </table>
                    <table  width='90%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0'>
                    <tr>
                        <td valign='center' >ID </td>
                        <td valign='center' >: $id_lmb</td>
                    <tr>
                    <tr>
                        <td valign='center' >Armada </td>
                        <td valign='center' >: $kd_armada</td>
                    <tr>
                    <tr>
                        <td valign='center' >Driver </td>
                        <td valign='center' >: $nm_driver</td>
                    <tr>
                    <tr>
                        <td valign='center' > &nbsp; </td>
                        <td valign='center' > &nbsp; </td>
                    <tr>
                    </table>
					<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='center' valign='center'> 
                            <span style='font-size:21px;valign:center'> PENAMBAHAN</span>
                            </td>
                        </tr>
                    </table>
                    <table  width='90%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='1' align='center'>
                    <tr>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>TRAYEK</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>WAKTU</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>KOMPONEN</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>TIPE</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>NILAI</td>
                    <tr>";
             $sql_plus = $this->db->query($qry);
             $data_plus = $sql_plus->result();
             $totnilai = 0;
             foreach($data_plus as $data){
				$totnilai += $data->nilai;
					$isi    .="
						 <tr>
						<td align='center'>".$data->kd_trayek."</td>
						<td align='center'>".$data->cdate."</td>
						<td align='center'>".$data->nm_komponen."</td>
						<td align='right'>".$data->type_komponen."</td>
						<td align='right'>".number_format($data->nilai)."</td>
						<tr>
					";
               }

             $isi    .="
                    <tr>
                        <td bgcolor='#c9c9c9' colspan='4'>&nbsp;<b>Total</b></td>
                        <td bgcolor='#c9c9c9'align='right'>".number_format($totnilai)."</td>
                    <tr>
                ";
			$isi .= "<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='center' valign='center'> 
                            <span style='font-size:21px;valign:center'> &nbsp;</span>
                            </td>
                        </tr>
                    </table>";
					
			$qry_ = "select * from (
						select a.kd_trayek, DATE_FORMAT(DATE(a.cdate),'%d-%m-%Y') cdate, c.nm_komponen, c.type_komponen, b.nilai
						from tr_lmb a
						join tr_lmb_access b on a.id_lmb = b.id_lmb
						join ref_komponen c on b.id_komponen = c.id_komponen
						where a.id_lmb = '$id_lmb' 
						UNION ALL
						select a.kd_trayek, DATE_FORMAT(DATE(a.cdate),'%d-%m-%Y') cdate, c.nm_komponen_teknik nm_komponen, c.type_komponen_teknik type_komponen, b.nilai
						from tr_lmb a
						join tr_lmb_teknik b on a.id_lmb = b.id_lmb
						join ref_komponen_teknik c on b.id_komponen_teknik = c.id_komponen_teknik
						where a.id_lmb = '$id_lmb'
					) a WHERE type_komponen = 'MINUS' order by type_komponen";
            $isi   .= "<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='center' valign='center'> 
                            <span style='font-size:21px;valign:center'> PENGURANGAN</span>
                            </td>
                        </tr>
                    </table>
                    <table  width='90%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='1' align='center'>
                    <tr>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>TRAYEK</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>WAKTU</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>KOMPONEN</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>TIPE</td>
                        <td align='center' valign='center' bgcolor='#c9c9c9'>NILAI</td>
                    <tr>";
             $sql_min = $this->db->query($qry_);
             $data_min = $sql_min->result();
             $totnilai_ = 0;
             foreach($data_min as $data_){
				$totnilai_ += $data_->nilai;
					$isi    .="
						 <tr>
						<td align='center'>".$data_->kd_trayek."</td>
						<td align='center'>".$data_->cdate."</td>
						<td align='center'>".$data_->nm_komponen."</td>
						<td align='right'>".$data_->type_komponen."</td>
						<td align='right'>".number_format($data_->nilai)."</td>
						<tr>
					";
               }

             $isi    .="
                    <tr>
                        <td bgcolor='#c9c9c9' colspan='4'>&nbsp;<b>Total</b></td>
                        <td bgcolor='#c9c9c9'align='right'>".number_format($totnilai_)."</td>
                    <tr>
                ";
            
			$isi .= "<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='center' valign='center'> 
                            <span style='font-size:21px;valign:center'> &nbsp;</span>
                            </td>
                        </tr>
                    </table>";
			$totfinal =	$totnilai-$totnilai_;
			$isi .= "<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='left' valign='left'> 
								<span style='font-size:16px;valign:left;margin-left:25px;'><b> Total nilai final : ". number_format($totfinal) . "</b> </span>
                            </td>
                        </tr>
                    </table>";
           
            $callback = array('data'=>$isi);
            echo json_encode($callback);
    }
	
	public function get_chain_pool($id){
		$data_id = $this->model_lmb->get_chain_pool($id);
		echo json_encode($data_id);
	}
	
	public function get_chain_armada($id){
		$data_id = $this->model_lmb->get_chain_armada($id);
		echo json_encode($data_id);
	}
	
	public function get_chain_trayek($id){
		$data_id = $this->model_lmb->get_chain_trayek($id);
		echo json_encode($data_id);
	}
	
	public function ax_data_lmb_rit($id_lmb)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            
            $start = $this->input->post('start');
            $draw = $this->input->post('draw');
            $length = $this->input->post('length');
            $cari = $this->input->post('search', true);
            $data = $this->model_lmb->getAlllmbrit($length, $start, $cari['value'], $id_lmb)->result_array();
            $count = $this->model_lmb->getAlllmbrit(null, null, $cari['value'], $id_lmb)->num_rows();

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
	
	public function rit($id_lmb)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_trayek'] = $this->model_lmb->combobox_trayek();
				$data['bu_combobox'] = $this->model_lmb->bu_combobox();
                $data['id_lmb'] = $id_lmb;
                $this->load->view('lmb/rit', $data);
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
	
	public function ax_set_data_rit()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
			if (!empty($access['id_menu_details'])) {
				$session = $this->session->userdata('login');
				$manual = $this->input->post('manual');
				if($manual == 0){
					$id_lmb = $this->input->post('id_lmb');
					$id_rit = $this->input->post('id_rit');
					$type_rit = $this->input->post('type_rit');
					$rit = $this->input->post('rit');
					$kd_trayek = $this->input->post('kd_trayek');
					$penumpang = $this->input->post('penumpang');
					$note = $this->input->post('note');
					
					$data = array(
						'id_lmb' => $id_lmb,
						'id_rit' => $id_rit,
						'type_rit' => $type_rit,
						'rit' => $rit,
						'kd_trayek' => $kd_trayek,
						'pnp' => $penumpang,
						'note' => $note,
						'manual' => $manual,
                        'cuser' => $session['id_user']
					);
				}else{
					$id_lmb = $this->input->post('id_lmb');
					$id_rit = $this->input->post('id_rit');
					$type_rit = $this->input->post('type_rit');
					$penumpang = $this->input->post('penumpang');
					$note = $this->input->post('note');
					$data = array(
						'id_lmb' => $id_lmb,
						'id_rit' => $id_rit,
						'type_rit' => $type_rit,
						'pnp' => $penumpang,
						'note' => $note,
						'manual' => $manual,
                        'cuser' => $session['id_user']
					);
				}

				if(empty($id_rit)){
					$data['id_rit'] = $this->model_lmb->insert_lmb_rit($data);
				}else{
					$data['id_rit'] = $this->model_lmb->update_lmb_rit($data);
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
	
	public function ax_get_data_rit_by_id()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_rit = $this->input->post('id_rit');
            
            if(empty($id_rit))
                $data = array();
            else
                $data = $this->model_lmb->get_lmb_rit_by_id($id_rit);
            
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
	
	public function ax_unset_data_rit()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "T01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

            $id_rit = $this->input->post('id_rit');
            
            $data = array('id_rit' => $id_rit);
            
            if(!empty($id_rit))
                $data['id_rit'] = $this->model_lmb->delete_lmb_rit($data);
            
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

    
}
