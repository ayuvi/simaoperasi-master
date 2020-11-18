<?php if (! defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_menu");
		$this->load->model("model_report");
		$this->load->model("model_survei");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
	}
	
	public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $data['nm_user'] = $session['nm_user'];
            $data['id_user'] = $session['id_user'];

            $data['session_level'] = $session['id_level'];
            $data['chartsegment'] = $this->model_report->get_data_chart_segment();
            $data['chartarmada'] = $this->model_report->get_data_chart_armada();
            $data['chartmerk'] = $this->model_report->get_data_chart_merk();
            $data['chartusia'] = $this->model_report->get_data_chart_usia();
			
			$this->load->view('report/index', $data);
        } else {
           redirect('welcome/relogin', 'refresh');
        }
	}

	public function index_()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			$data['pertanyaan_combobox'] = $this->model_survei->pertanyaan_combobox();
			$id_cek = $this->input->post('id_cek');
			if($id_cek == null || $id_cek == 0){
				$st = '1';
			}else{
				$st = $id_cek;
			}
			$rpt = $this->model_report->reportSetiapPertanyaan($st);
			$get = $this->model_report->getPertanyaan($st);
			if($rpt[0]['satu'] == null || empty($rpt[0]['satu'])){ $satu = 0;}else{ $satu =$rpt[0]['satu']; }
			if($rpt[0]['dua'] == null || empty($rpt[0]['dua'])){ $dua = 0;}else{ $dua =$rpt[0]['dua']; }
			if($rpt[0]['tiga'] == null || empty($rpt[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt[0]['tiga']; }
			if($rpt[0]['empat'] == null || empty($rpt[0]['empat'])){ $empat = 0;}else{ $empat =$rpt[0]['empat']; }
			if($rpt[0]['lima'] == null || empty($rpt[0]['lima'])){ $lima = 0;}else{ $lima =$rpt[0]['lima']; }
			// if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $satu + $dua + $tiga + $empat + $lima;
			if($full == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			// $data['status'] = $st;
			$data['status'] = $get[0]['nm_cek'];
			$this->load->view('report/setiappertanyaan', $data);
		} else {
			redirect('welcome/relogin', 'refresh');
		}

	}
	
	public function indexumur()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			
			$umur1 = $this->input->post('umur1');
			$umur2 = $this->input->post('umur2');
			if($umur1 == null || $umur1 == 0 || $umur2 == null || $umur2 == 0){
				$st1 = '20';
				$st2 = '30';
			}else{
				$st1 = $umur1;
				$st2 = $umur2;
			}
			$rpt = $this->model_report->reportUmur($st1,$st2);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
				$data['tidak'] = $tidak;
				$data['setuju'] = $setuju;
			}
			
			$rpt2 = $this->model_report->reportUmur2($st1,$st2);
			if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
			if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
			if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
			if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
			if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
			$full2 = $satu + $dua + $tiga + $empat + $lima;
			if($full2 == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			
			$data['status1'] = $st1;
			$data['status2'] = $st2;
			$this->load->view('report/umur', $data);            
		} else {
			redirect('welcome/relogin', 'refresh');
		}
	}
	
	public function indexposisi()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			$data['posisi_combobox'] = $this->model_survei->posisi_combobox();
			
			$id_posisi = $this->input->post('id_posisi');
			if($id_posisi == null || $id_posisi == 0){
				$st = '8';
			}else{
				$st = $id_posisi;
			}
			$rpt = $this->model_report->reportPosisi($st);
			$get = $this->model_report->getPosisi($st);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
				$data['tidak'] = $tidak;
				$data['setuju'] = $setuju;
			}
			
			$rpt2 = $this->model_report->reportPosisi2($st);
			if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
			if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
			if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
			if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
			if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
			$full2 = $satu + $dua + $tiga + $empat + $lima;
			if($full2 == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			// $data['status'] = $st;
			$data['status'] = $get[0]['nm_posisi'];
			$this->load->view('report/posisi', $data);            
		} else {
			redirect('welcome/relogin', 'refresh');
		}
	}
	
	public function indexresponden()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];
			$data['session_level'] = $session['id_level'];
			$data['bu_combobox'] = $this->model_survei->bu_combobox();
			$this->load->view('report/responden', $data);
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
	
	public function ax_data_responden()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$id_bu = $this->input->post('id_bu');
			$draw = $this->input->post('draw');
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$cari = $this->input->post('search', true);
			$data = $this->model_report->get_data_responden($length, $start, $cari['value'], $id_bu );
            // print_r($data);exit();
			echo json_encode(array('recordsTotal' => $data['recordsTotal'], 'recordsFiltered' => $data['recordsTotal'], 'draw' => $draw, 'search' => $cari, 'data' => $data['data']));
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

	public function ax_data_grafik_jenis(){
		$divisi = $this->input->post('divisi');
		$start = $this->input->post('start');
		$draw = $this->input->post('draw');
		$length = $this->input->post('length');
		$cari = $this->input->post('search', true);
		$data = $this->model_report->getAlldata_grafik_jenis($length, $start, $cari['value'], $divisi)->result_array();
		$count = $this->model_report->get_count_data_grafik_jenis($cari['value'], $divisi);
		$grafik = $this->model_report->get_data_grafik_jenis($length, $start, $cari['value'], $divisi)->result_array();
		$cabang = array();
		$busbesar = array();
		$busgandeng = array();
		$busmedium = array();
		$microbus = array();
		$boxmini = array();
		$boxmedium = array();
		$boxbesar = array();
			foreach($grafik as $row)
			{
				// array_push($cabang,$row['cabang']);
                array_push($busbesar,(int)$row['busbesar']);
				array_push($busgandeng,(int)$row['busgandeng']);
				array_push($busmedium,(int)$row['busmedium']);
				array_push($microbus,(int)$row['microbus']);
				array_push($boxmini,(int)$row['boxmini']);
				array_push($boxmedium,(int)$row['boxmedium']);
				array_push($boxbesar,(int)$row['boxbesar']);
			}
		echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 
		'data' => $data,
		'cabang' => $cabang,
		'busgandeng'=>$busgandeng,
		'busbesar'=>$busbesar,
		'busmedium'=>$busmedium,
		'microbus'=>$microbus,
		'boxmini'=>$boxmini,
		'boxmedium'=>$boxmedium,
		'boxbesar'=>$boxbesar));
	}

	public function ax_data_grafik_merek(){
		$divisi = $this->input->post('divisi');
		$start = $this->input->post('start');
		$draw = $this->input->post('draw');
		$length = $this->input->post('length');
		$cari = $this->input->post('search', true);
		$data = $this->model_report->getAlldata_grafik_merek($length, $start, $cari['value'], $divisi)->result_array();
		$count = $this->model_report->get_count_data_grafik_merek($cari['value'], $divisi);
		$grafik = $this->model_report->get_data_grafik_merek($length, $start, $cari['value'], $divisi)->result_array();
		$cabang = array();
		$beijing = array();
		$daihatsu = array();
		$gdragon = array();
		$hino = array();
		$hyundai = array();
		$inobus = array();
		$isuzu = array();
		$kinglong = array();
		$mercy = array();
		$mitsubishi = array();
		$nissan = array();
		$toyota = array();
		$yutoong = array();
		$zhongtong = array();
			foreach($grafik as $row)
			{
				// array_push($cabang,$row['cabang']);
                array_push($beijing,(int)$row['beijing']);
				array_push($daihatsu,(int)$row['daihatsu']);
				array_push($gdragon,(int)$row['gdragon']);
				array_push($hino,(int)$row['hino']);
				array_push($hyundai,(int)$row['hyundai']);
				array_push($inobus,(int)$row['inobus']);
				array_push($isuzu,(int)$row['isuzu']);
				array_push($kinglong,(int)$row['kinglong']);
				array_push($mercy,(int)$row['mercy']);
				array_push($mitsubishi,(int)$row['mitsubishi']);
				array_push($nissan,(int)$row['nissan']);
				array_push($toyota,(int)$row['toyota']);
				array_push($yutoong,(int)$row['yutoong']);
				array_push($zhongtong,(int)$row['zhongtong']);
			}
		echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 
		'data' => $data,
		'cabang' => $cabang,
		'beijing'=>$beijing,
		'daihatsu'=>$daihatsu,
		'gdragon'=>$gdragon,
		'hino'=>$hino,
		'hyundai'=>$hyundai,
		'inobus'=>$inobus,
		'isuzu'=>$isuzu,
		'kinglong'=>$kinglong,
		'mercy'=>$mercy,
		'mitsubishi'=>$mitsubishi,
		'nissan'=>$nissan,
		'toyota'=>$toyota,
		'yutoong'=>$yutoong,
		'zhongtong'=>$zhongtong,));
	}

	public function ax_data_grafik_usia(){
		$divisi = $this->input->post('divisi');
		$start = $this->input->post('start');
		$draw = $this->input->post('draw');
		$length = $this->input->post('length');
		$cari = $this->input->post('search', true);
		$data = $this->model_report->getAlldata_grafik_usia($length, $start, $cari['value'], $divisi)->result_array();
		$count = $this->model_report->get_count_data_grafik_usia($cari['value'], $divisi);
		$grafik = $this->model_report->get_data_grafik_usia($length, $start, $cari['value'], $divisi)->result_array();
		$cabang = array();
		$satu = array();
		$dua = array();
		$tiga = array();
		$empat = array();
		$lima = array();
			foreach($grafik as $row)
			{
				// array_push($cabang,$row['cabang']);
                array_push($satu,(int)$row['satu']);
				array_push($dua,(int)$row['dua']);
				array_push($tiga,(int)$row['tiga']);
				array_push($empat,(int)$row['empat']);
				array_push($lima,(int)$row['lima']);
			}
		echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 
		'data' => $data,
		'cabang' => $cabang,
		'satu'=>$satu,
		'dua'=>$dua,
		'tiga'=>$tiga,
		'empat'=>$empat,
		'lima'=>$lima,));
	}

	public function ax_data_grafik_segmentasi(){
		$divisi = $this->input->post('divisi');
		$start = $this->input->post('start');
		$draw = $this->input->post('draw');
		$length = $this->input->post('length');
		$cari = $this->input->post('search', true);
		$data = $this->model_report->getAlldata_grafik_segmentasi($length, $start, $cari['value'], $divisi)->result_array();
		$count = $this->model_report->get_count_data_grafik_segmentasi($cari['value'], $divisi);
		$grafik = $this->model_report->get_data_grafik_segmentasi($length, $start, $cari['value'], $divisi)->result_array();
		$cabang = array();
		$antarkota = array();
		$perintis = array();
		$pemadumoda = array();
		$aneg = array();
		$biskota = array();
		$paket = array();
		$pariwisata = array();
		$aglomerasi = array();
			foreach($grafik as $row)
			{
				// array_push($cabang,$row['cabang']);
                array_push($antarkota,(int)$row['antarkota']);
				array_push($perintis,(int)$row['perintis']);
				array_push($pemadumoda,(int)$row['pemadumoda']);
				array_push($aneg,(int)$row['aneg']);
				array_push($biskota,(int)$row['biskota']);
				array_push($paket,(int)$row['paket']);
				array_push($pariwisata,(int)$row['pariwisata']);
				array_push($aglomerasi,(int)$row['aglomerasi']);
			}
		echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 
		'data' => $data,
		'cabang' => $cabang,
		'antarkota'=>$antarkota,
		'perintis'=>$perintis,
		'pemadumoda'=>$pemadumoda,
		'aneg'=>$aneg,
		'biskota'=>$biskota,
		'paket'=>$paket,
		'pariwisata'=>$pariwisata,
		'aglomerasi'=>$aglomerasi));
	}
	
	public function indexlokasi()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			$data['bu_combobox'] = $this->model_survei->bu_combobox();
			
			$id_bu = $this->input->post('id_bu');
			if($id_bu == null || $id_bu == 0){
				$st = '60';
			}else{
				$st = $id_bu;
			}
			$rpt = $this->model_report->reportLokasi($st);
			$get = $this->model_report->getBu($st);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
				$data['tidak'] = $tidak;
				$data['setuju'] = $setuju;
			}
			
			$rpt2 = $this->model_report->reportLokasi2($st);
			if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
			if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
			if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
			if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
			if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
			$full2 = $satu + $dua + $tiga + $empat + $lima;
			if($full2 == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			// $data['status'] = $st;
			$data['status'] = $get[0]['nm_bu'];
			$this->load->view('report/lokasi', $data);            
		} else {
			redirect('welcome/relogin', 'refresh');
		}
	}
	
	public function indexlamabekerja()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			
			$tahun1 = $this->input->post('tahun1');
			$tahun2 = $this->input->post('tahun2');
			if($tahun1 == null || $tahun1 == 0 || $tahun2 == null || $tahun2 == 0){
				$st1 = '1';
				$st2 = '3';
			}else{
				$st1 = $tahun1;
				$st2 = $tahun2;
			}
			$rpt = $this->model_report->reportLamaBekerja($st1,$st2);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
				$data['tidak'] = $tidak;
				$data['setuju'] = $setuju;
			}
			
			$rpt2 = $this->model_report->reportLamaBekerja2($st1,$st2);
			if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
			if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
			if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
			if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
			if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
			$full2 = $satu + $dua + $tiga + $empat + $lima;
			if($full2 == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			
			$data['status1'] = $st1;
			if ($st2==100) $data['status2'] = 'Keatas';
			else $data['status2'] = $st2;
			$this->load->view('report/lamabekerja', $data);            
		} else {
			redirect('welcome/relogin', 'refresh');
		}
	}
	
	public function indexpendidikan()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			$data['pendidikan_combobox'] = $this->model_survei->pendidikan_combobox();
			
			$id_pendidikan = $this->input->post('id_pendidikan');
			if($id_pendidikan == null || $id_pendidikan == 0){
				$st = '8';
			}else{
				$st = $id_pendidikan;
			}
			$rpt = $this->model_report->reportPendidikan($st);
			$get = $this->model_report->getPendidikan($st);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
				$data['tidak'] = $tidak;
				$data['setuju'] = $setuju;
			}
			
			$rpt2 = $this->model_report->reportPendidikan2($st);
			if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
			if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
			if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
			if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
			if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
			$full2 = $satu + $dua + $tiga + $empat + $lima;
			if($full2 == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			// print_r($get[0]['nm_pendidikan']);
			$data['status'] = $get[0]['nm_pendidikan'];
			$this->load->view('report/pendidikan', $data);            
		} else {
			redirect('welcome/relogin', 'refresh');
		}
	}
	
	public function indexstatus()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			$status_pegawai = $this->input->post('status_pegawai');
			if($status_pegawai == null){
				$st = 'Kontrak';
			}else{
				$st = $status_pegawai;
			}
			$rpt = $this->model_report->reportStatus($st);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
				$data['tidak'] = $tidak;
				$data['setuju'] = $setuju;
			}
			$rpt2 = $this->model_report->reportStatus2($st);
			if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
			if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
			if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
			if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
			if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
			$full2 = $satu + $dua + $tiga + $empat + $lima;
			if($full2 == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			
			$data['status'] = $st;
			$this->load->view('report/status', $data);
		} else {
			redirect('welcome/relogin', 'refresh');
		}
	}
	
	public function indexgolongan()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			$data['golongan_combobox'] = $this->model_survei->golongan_combobox();
			
			$id_golongan = $this->input->post('id_golongan');
			if($id_golongan == null || $id_golongan == 0){
				$st = '1';
			}else{
				$st = $id_golongan;
			}
			$rpt = $this->model_report->reportGolongan($st);
			$get = $this->model_report->getGolongan($st);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
				$data['tidak'] = $tidak;
				$data['setuju'] = $setuju;
			}
			$rpt2 = $this->model_report->reportGolongan2($st);
			if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
			if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
			if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
			if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
			if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
			$full2 = $satu + $dua + $tiga + $empat + $lima;
			if($full2 == 0){
				$data['satu'] = 0;
				$data['dua'] = 0;
				$data['tiga'] = 0;
				$data['empat'] = 0;
				$data['lima'] = 0;
			}else{
				$data['satu'] = $satu;
				$data['dua'] = $dua;
				$data['tiga'] = $tiga;
				$data['empat'] = $empat;
				$data['lima'] = $lima;
			}
			// $data['status'] = $st;
			$data['status'] = $get[0]['nm_golongan'];
			$this->load->view('report/golongan', $data);            
		} else {
			redirect('welcome/relogin', 'refresh');
		}
	}
	
	public function indexjeniskelamin()
	{
		if ($this->session->userdata('login')) {
			$session = $this->session->userdata('login');
			$data['nm_user'] = $session['nm_user'];
			$data['id_user'] = $session['id_user'];

			$data['session_level'] = $session['id_level'];
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			if($jenis_kelamin == null){
				$st = '1';
			}else{
				$st = $jenis_kelamin;
			}
			$rpt = $this->model_report->reportJenisKelamin($st);
			if($rpt[0]['empatlima'] == null || empty($rpt[0]['empatlima'])){ $setuju = 0;}else{ $setuju =$rpt[0]['empatlima']; }
			if($rpt[0]['satutiga'] == null || empty($rpt[0]['satutiga'])){ $tidak = 0;}else{ $tidak =$rpt[0]['satutiga']; }
			$full = $tidak + $setuju;
			if($full == 0){
				$data['tidak'] = 0;
				$data['setuju'] = 0;
			}else{
			/* $data['tidak'] = number_format((($tidak / $full) * 100),2);
			$data['setuju'] = number_format((($setuju / $full) * 100),2); */
			$data['tidak'] = $tidak;
			$data['setuju'] = $setuju;
		}
		$rpt2 = $this->model_report->reportJenisKelamin2($st);
		if($rpt2[0]['satu'] == null || empty($rpt2[0]['satu'])){ $satu = 0;}else{ $satu =$rpt2[0]['satu']; }
		if($rpt2[0]['dua'] == null || empty($rpt2[0]['dua'])){ $dua = 0;}else{ $dua =$rpt2[0]['dua']; }
		if($rpt2[0]['tiga'] == null || empty($rpt2[0]['tiga'])){ $tiga = 0;}else{ $tiga =$rpt2[0]['tiga']; }
		if($rpt2[0]['empat'] == null || empty($rpt2[0]['empat'])){ $empat = 0;}else{ $empat =$rpt2[0]['empat']; }
		if($rpt2[0]['lima'] == null || empty($rpt2[0]['lima'])){ $lima = 0;}else{ $lima =$rpt2[0]['lima']; }
		$full2 = $satu + $dua + $tiga + $empat + $lima;
		if($full2 == 0){
			$data['satu'] = 0;
			$data['dua'] = 0;
			$data['tiga'] = 0;
			$data['empat'] = 0;
			$data['lima'] = 0;
		}else{
			// $data['satu'] = number_format((($satu / $full2) * 100),2);
			// $data['dua'] = number_format((($dua / $full2) * 100),2);
			// $data['tiga'] = number_format((($tiga / $full2) * 100),2);
			// $data['empat'] = number_format((($empat / $full2) * 100),2);
			// $data['lima'] = number_format((($lima / $full2) * 100),2);
			$data['satu'] = $satu;
			$data['dua'] = $dua;
			$data['tiga'] = $tiga;
			$data['empat'] = $empat;
			$data['lima'] = $lima;
		}
		$data['status'] = $st;
		$this->load->view('report/jeniskelamin', $data);            
	} else {
		redirect('welcome/relogin', 'refresh');
	}
}

public function Update()
{
	if ($this->session->userdata('login')) {
		$session = $this->session->userdata('login');

		$a = $this->input->post('password_lama');
		$b = $this->input->post('password_baru');
		if (empty($a)or empty($b)) {
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		} else {
			$c = do_hash($this->input->post('password_lama'), 'md5');
			$d = $session['password'];
			if ($d != $c) {
				echo "<script>alert('Password Lama Salah');window.location.href='javascript:history.back(-1);'</script>";
			} else {
				$id_user = $session['id_user'];
				$data = array(

					'password' => do_hash($this->input->post('password_baru'), 'md5'),

				);
				$this->model_home->UpdateUser($id_user, $data);
				redirect('welcome/logout');
			}
		}
	} else {
		redirect('welcome/relogin', 'refresh');
	}
}

public function get_data_dashboard()
{

	$count = $this->model_home->countdata();
	$data = $this->model_home->getdata()->result_array();

	echo json_encode(array('ccheckin'=>$count['ccheckin'], 'cwloading'=>$count['cwloading'], 'cloading'=>$count['cloading'], 'cdelivery'=>$count['cdelivery'], 'data' => $data, 'recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => 1, 'search' => ''));
}

public function laporan_ap5() {
	$cRet ='';
	$cRet .= "
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>PERUSAHAAN UMUM DAMRI</b><br />
	<b>(PERUM DAMRI)</b><br />
	<b>SEGMENTASI</b><br />
	<b>KANTOR CABANG : .................<br />
	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>KARTU PENDAPATAN JURUSAN (AP/5)</b><br />

	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>NOMOR :</b><br />
	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"50%\" align=\"left\" style=\"font-size:18px;\">
	<b>AWAL JURUSAN				: .........................</b><br />
	<b>AKHIR JURUSAN			: .........................</b><br />
	<b>PANJANG JURUSAN / TRAYEK	: .........................</b><br />
	</td>
	<td width=\"50%\" align=\"right\" style=\"font-size:18px;\">
	<b>JUMLAH KENDARAAN			: .........................</b><br />
	<b>JUMLAH RIT / HARI		: .........................</b><br />
	<b>TARIP / PNP				: .........................</b><br />
	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td align=\"right\" style=\"font-size:14px;\">
	<b>AP/5</b><br />
	</td>
	</tr>
	</table>
	<table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
	<thead>
	<tr>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NO</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TANGGAL</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">DAYA MUAT (SEAT)</td>
	<td colspan=\"4\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">BANYAKNYA</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">BAGASI COLLY/KG</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TARIF PNP-KM, PNP-ORG/ UMUM/PM</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PENDAPATAN</td>
	<td colspan=\"5\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">ANALISA / RATA - RATA</td>
	</tr>
	<tr>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">POLISI</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">CODE BUS</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JUMLAH</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">BGS</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JUMLAH</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Pnp/Rit</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Km/Rit</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">LPP/Rit</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">UPP/Pnp</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">UPP/Pnp-KM</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-ORG</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-KM</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">1</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">2</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">3</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">4</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">5</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">6</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">7</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">8</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">9</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">10</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">11</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">12</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">13</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">14</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">15</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">16</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">17</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">18</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">19</td>
	</tr>
	</thead>";
		// $sql = $this->db->query("");
	$no = 0;
		// foreach ($sql->result() as $row){
	$no = $no+1;

	$cRet .="
	<tbody>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tbody>";
		// } $no++;
	$cRet.="<tfoot>
	<tr>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	</tfoot>
	</table>

	<br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"50%\" align=\"left\" style=\"font-size:14px;\">
	<b>MENGETAHUI :</b>
	<b></br>GENERAL MANAGER</b><br ?>
	<b></br>(....................................)</b>
	</td>
	<td width=\"50%\" align=\"right\" style=\"font-size:14px;\">
	<b>..................,....................................</b><br />
	<b>PEMBUAT DAFTAR</b><br />
	<b><br />(....................................)</b>
	</td>
	</tr>
	</table><br/>
	";
		// if($format == 0){
	echo $cRet;
		// } else if ($format == 1) {
		// 	$this->_mpdf('',$cRet,10,10,10,'L');
		// } else {
		// 	$data['prev']= $cRet;
		// 	header("Cache-Control: no-cache, no-store, must-revalidate");
		// 	header("Content-Type: application/vnd.ms-excel");
		// 	header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
		// 	$this->load->view('report/excel', $data);
		// }
}

public function laporan_ap6() {
	$cRet ='';
	$cRet .= "
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"33%\" colspan=\"23\" align=\"center\" style=\"font-size:18px;\">
	<b>PERUSAHAAN UMUM DAMRI</b></br>
	<b>(PERUM DAMRI)</b></br>
	<b></br>KANTOR CABANG : ..........</b>
	</td>
	<td width=\"33%\" colspan=\"23\" align=\"center\" style=\"font-size:18px;\">
	<b>DAFTAR ABSENSI KENDARAAN</b></br>
	<b>BULAN : ................</b></br>

	</td>
	<td width=\"33%\" colspan=\"23\" align=\"center\" style=\"font-size:18px;\">
	<b>disini_foto</b></br>
	<b></br>disini_foto</b>
	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td align=\"right\" style=\"font-size:14px;\">
	<b>AP/6</b><br />
	</td>
	</tr>
	</table>
	<table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
	<thead>
	<tr>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KODE BUS</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">DAYA MUAT</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JENIS PLYN</td>
	<td colspan=\"31\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TANGGAL</td>
	<td colspan=\"7\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JUMLAH</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KET</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">URUT</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">POLISI</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">1</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">2</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">3</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">4</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">5</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">6</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">7</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">8</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">9</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">10</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">11</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">12</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">13</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">14</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">15</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">16</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">17</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">18</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">19</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">20</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">21</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">22</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">23</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">24</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">25</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">26</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">27</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">28</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">29</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">30</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">31</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HJ</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HTP</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HTSK</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">S</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RR</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RB</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HTOM</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">1</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">2</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">3</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">4</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">5</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">6</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">7</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">8</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">9</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">10</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">11</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">12</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">13</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">14</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">15</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">16</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">17</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">18</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">19</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">20</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">21</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">22</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">23</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">24</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">25</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">26</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">27</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">28</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">29</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">30</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">31</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">32</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">33</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">34</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">35</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">36</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">37</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">38</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">39</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">40</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">41</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">42</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">43</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">44</td>
	</tr>
	</thead>";
		// $sql = $this->db->query("");
	$no = 0;
		// foreach ($sql->result() as $row){
	$no = $no+1;

	$cRet .="
	<tbody>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tbody>";
		// } $no++;
	$cRet.="<tfoot>
	<tr>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	</tfoot>
	</table>

	<br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"25%\" align=\"left\" style=\"font-size:14px;\">
	<b>KETERANGAN :</b></br>
	<b>HJ</b><br />
	<b>HTP</b><br />
	<b>HTSK</b><br />
	<b>S</b><br />
	<b>RR</b><br />
	<b>RB</b><br />
	<b>HTOM</b><br />
	</td>
	<td width=\"25%\" align=\"left\" style=\"font-size:14px;\">
	<b>MENGETAHUI :</b>
	<b></br>GENERAL MANAGER</b><br ?>
	<b></br>(....................................)</b>
	</td>
	<td width=\"25%\" align=\"left\" style=\"font-size:14px;\">
	<b>MENYETUJUI</b>
	<b></br>MANAGER USAHA</b><br ?>
	<b></br>(....................................)</b>
	</td>
	<td width=\"25%\" align=\"left\" style=\"font-size:14px;\">
	<b>..................,....................................</b><br />
	<b>MENGETAHUI</b>
	<b></br>PEMBUAT DAFTAR</b><br ?>
	<b></br>(....................................)</b>
	</td>
	</tr>
	</table><br/>
	";
		// if($format == 0){
	echo $cRet;
		// } else if ($format == 1) {
		// 	$this->_mpdf('',$cRet,10,10,10,'L');
		// } else {
		// 	$data['prev']= $cRet;
		// 	header("Cache-Control: no-cache, no-store, must-revalidate");
		// 	header("Content-Type: application/vnd.ms-excel");
		// 	header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
		// 	$this->load->view('report/excel', $data);
		// }
}

public function laporan_ak1() {
	$cRet ='';
	$cRet .= "
	<div class=\"box\" style=\"width:auto; overflow:700px;\">
	<div class=\"box-header\" style=\"width: 100px; float:left; margin-right:10px;\">
	<div class=\"box-header-vertikal\" style=\"border:3px solid black; height:300px; border-radius:10px; padding-left:7px;\">
	<div class=\"vertical-text\" style=\"transform: rotate(-90deg); transform-origin: left top 0; text-align: center; margin-top: 300px; width: 300px;\">
	<h3>PERUSAHAAN UMUM DAMRI</h3>
	<h3>(PERUM DAMRI)</h3>
	<p style=\"font-size: 13px;\">CABANG (nama_cabang)</p>
	<p><?=strtoupper(provinsi_cabang)?></p>
	</div>
	</div>
	</div>

	<div class=\"box-body\" style=\"margin-left: 100px;\">
	<h2 style=\"text-align: center; margin-bottom: 15px;\">BUKTI KAS PENGGANTI KWITANSI (BKPK)</h2>
	<table style=\"margin-left:0\">
	<tr>
	<td width=\"100\" align=\"left\"> Bplu </td>
	<td>:</td>
	<td>.............. / CAB. <?=strtoupper(nama_cabang)?>&nbsp;&nbsp;/&nbsp;&nbsp;(bulan)&nbsp;&nbsp;/&nbsp;&nbsp;(tahun)	</td>
	</tr>
	<div align =\"right\"> AK-2 &nbsp;&nbsp; </div>
	<tr>
	<td>Terima Dari</td>
	<td>:</td>
	<td>PERUM DAMRI CABANG (nama_cabang)</td>
	</tr>
	<tr>
	<td align=\"left\">Terbilang</td>
	<td>:</td>
	<td>(terbilang) Rupiah</td>
	</tr>
	<tr>
	<td>Untuk</td>
	<td>:</td>
	<td>(uraian)</td>
	</tr>
	</table>
	<div class=\"box-persetujuan\" style=\"border: 2px solid #000000; font-size: 12px; width: 180px; margin-left: 10px; margin-top: 10px; text-align: center;\">
	<div>TELAH DIUJI DAN SETUJU DIBAYAR</div>
	<div style=\"margin-bottom: 20px;\">General Manager</div>
	<div style=\"text-decoration: underline;\">nama_pegawai</div>
	<div>NIK. (nik_pegawai)</div>
	</div>
	<div class=\"box-harga\">
	<table class=\"table-harga\" style=\"border-collapse: collapse; width: 350px; margin-top: 10px;\" border=\"1px solid black\">
	<tr>
	<td style=\"border-right: 1px solid #fff;\">Sejumlah:</td>
	<td align=\"right\">Rp. (nilai)</td>
	<td colspan=\"2\" style=\"font-weight:bold\" align=\"center\">LUNAS</td>
	</tr>
	<tr>
	<td style=\"border: 1px solid #fff; border-right: 1px solid #000\"></td>
	<td align=\"left\">PP &nbsp;: &nbsp;&nbsp;&nbsp;(kode_pos)</td>
	<td width=\"50px\">Kasir</td>
	<td width=\"50px\">&nbsp;</td>
	</tr>
	</table>
	</div>
	<div class=\"box-pengurus\" style=\"float: right; margin-top: -80px; text-align: center;\">
	<td align=\"center\">(nama_cabang), (tanggal)</td>
	<div style=\"margin-bottom: 20px;\">Yang Menyerahkan</div><br>
	<div style=\"text-decoration: underline;\"><u>(nama_pegawai)</u><br></div>
	</div>

	</div>
	";
		// if($format == 0){
	echo $cRet;
		// } else if ($format == 1) {
		// 	$this->_mpdf('',$cRet,10,10,10,'L');
		// } else {
		// 	$data['prev']= $cRet;
		// 	header("Cache-Control: no-cache, no-store, must-revalidate");
		// 	header("Content-Type: application/vnd.ms-excel");
		// 	header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
		// 	$this->load->view('report/excel', $data);
		// }
}

public function laporan_ak2() {
	$cRet ='';
	$cRet .= "
	<div class=\"box\" style=\"width:auto; overflow:700px;\">
	<div class=\"box-header\" style=\"width: 100px; float:left; margin-right:10px;\">
	<div class=\"box-header-vertikal\" style=\"border:3px solid black; height:300px; border-radius:10px; padding-left:7px;\">
	<div class=\"vertical-text\" style=\"transform: rotate(-90deg); transform-origin: left top 0; text-align: center; margin-top: 300px; width: 300px;\">
	<h3>PERUSAHAAN UMUM DAMRI</h3>
	<h3>(PERUM DAMRI)</h3>
	<p style=\"font-size: 13px;\">CABANG (nama_cabang)</p>
	<p><?=strtoupper(provinsi_cabang)?></p>
	</div>
	</div>
	</div>

	<div class=\"box-body\" style=\"margin-left: 100px;\">
	<h2 style=\"text-align: center; margin-bottom: 15px;\">BUKTI KAS PENGGANTI KWITANSI (BKPK)</h2>
	<table style=\"margin-left:0\">
	<tr>
	<td width=\"100\" align=\"left\"> Bplu </td>
	<td>:</td>
	<td>.............. / CAB. <?=strtoupper(nama_cabang)?>&nbsp;&nbsp;/&nbsp;&nbsp;(bulan)&nbsp;&nbsp;/&nbsp;&nbsp;(tahun)	</td>
	</tr>
	<div align =\"right\"> AK-2 &nbsp;&nbsp; </div>
	<tr>
	<td>Terima Dari</td>
	<td>:</td>
	<td>PERUM DAMRI CABANG (nama_cabang)</td>
	</tr>
	<tr>
	<td align=\"left\">Terbilang</td>
	<td>:</td>
	<td>(terbilang) Rupiah</td>
	</tr>
	<tr>
	<td>Untuk</td>
	<td>:</td>
	<td>(uraian)</td>
	</tr>
	</table>
	<div class=\"box-persetujuan\" style=\"border: 2px solid #000000; font-size: 12px; width: 180px; margin-left: 10px; margin-top: 10px; text-align: center;\">
	<div>TELAH DIUJI DAN SETUJU DIBAYAR</div>
	<div style=\"margin-bottom: 20px;\">General Manager</div>
	<div style=\"text-decoration: underline;\">nama_pegawai</div>
	<div>NIK. (nik_pegawai)</div>
	</div>
	<div class=\"box-harga\">
	<table class=\"table-harga\" style=\"border-collapse: collapse; width: 350px; margin-top: 10px;\" border=\"1px solid black\">
	<tr>
	<td style=\"border-right: 1px solid #fff;\">Sejumlah:</td>
	<td align=\"right\">Rp. (nilai)</td>
	<td colspan=\"2\" style=\"font-weight:bold\" align=\"center\">LUNAS</td>
	</tr>
	<tr>
	<td style=\"border: 1px solid #fff; border-right: 1px solid #000\"></td>
	<td align=\"left\">PP &nbsp;: &nbsp;&nbsp;&nbsp;(kode_pos)</td>
	<td width=\"50px\">Kasir</td>
	<td width=\"50px\">&nbsp;</td>
	</tr>
	</table>
	</div>
	<div class=\"box-pengurus\" style=\"float: right; margin-top: -80px; text-align: center;\">
	<td align=\"center\">(nama_cabang), (tanggal)</td>
	<div style=\"margin-bottom: 20px;\">Yang Menerima</div><br>
	<div style=\"text-decoration: underline;\"><u>(nama_pegawai)</u><br></div>
	</div>

	</div>
	";
		// if($format == 0){
	echo $cRet;
		// } else if ($format == 1) {
		// 	$this->_mpdf('',$cRet,10,10,10,'L');
		// } else {
		// 	$data['prev']= $cRet;
		// 	header("Cache-Control: no-cache, no-store, must-revalidate");
		// 	header("Content-Type: application/vnd.ms-excel");
		// 	header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
		// 	$this->load->view('report/excel', $data);
		// }
}

public function laporan_ak13() {
	$cRet ='';
	$cRet .= "
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>SEGMEN : AKAP/ANEG/PERINTIS/BARANG</b><br />
	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>PERUSAHAAN UMUM DAMRI</b><br />
	<b>(PERUM DAMRI)</b><br />
	<b>KANTOR CABANG : .......................</b><br />

	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>disini_gambar</b><br />
	<b>disini_gambar</b><br />
	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"65%\" align=\"right\" style=\"font-size:18px;\">
	<b>DAFTAR PENJUALAN KARCIS (DPK) AK/13</b><br />
	<b>NOMOR : ...........................</b><br />
	</td>
	<td width=\"35%\" align=\"right\" style=\"font-size:18px;\">
	<b>SERIE : .........................</b><br />
	<b>NOMOR : .........................</b><br />
	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
	<thead>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">Bus Code</td>
	<td rowspan=\"2\" colspan=\"2\" style=\"font-size:12px;text-align:center;\">AP/3 Dari UPT/Agen No.</td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:center;\">Penjualan Karcis Di Perjalanan Oleh Awak Bus</td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">Jurusan</td>
	<td style=\"font-size:12px;text-align:center;\">No. Awal</td>
	<td style=\"font-size:12px;text-align:center;\">No. Akhir</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\">Jml. Lembar</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\">Jml. Rp</td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">Banyaknya Rit</td>
	<td colspan=\"2\"style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">KM Tempuh</td>
	<td colspan=\"2\"style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">Pengemudi</td>
	<td colspan=\"2\"style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">Kondektur</td>
	<td colspan=\"2\"style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">LMB Berangkat No.</td>
	<td colspan=\"2\"style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:left;\">LMB Kembali No.</td>
	<td colspan=\"2\"style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:left;\">NO</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;\">Jurusan</td>
	<td colspan=\"4\" style=\"font-size:12px;text-align:center;\">Karcis di Jual Oleh</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;\">UPP</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;\">Jumlah Pnp Km 4x8</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:left;\">Dari</td>
	<td style=\"font-size:12px;text-align:center;\">Ke</td>
	<td style=\"font-size:12px;text-align:center;\">Km</td>
	<td style=\"font-size:12px;text-align:center;\">Transit</td>
	<td style=\"font-size:12px;text-align:center;\">Agen</td>
	<td style=\"font-size:12px;text-align:center;\">Awak Bus</td>
	<td style=\"font-size:12px;text-align:center;\">Jumlah Karcis</td>
	<td style=\"font-size:12px;text-align:center;\">Pnp</td>
	<td style=\"font-size:12px;text-align:center;\">Bgs</td>
	<td style=\"font-size:12px;text-align:center;\">Jumlah</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">1</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">2</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">3</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">4</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">5</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">6</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">7</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">8</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">9</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">10</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">11</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">12</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">1</td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:center;\"><b>Jumlah Rit I</b></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">1</td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:center;\"><b>Jumlah Rit II</b></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td colspan=\"4\" style=\"font-size:12px;text-align:center;\"><b>Pendapatan Rit I dan Rit II</b></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">1</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Titipan Asuransi Jasa Raharja</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">2</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Biaya Penyebrangan</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">3</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Titipan Biaya Snack</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">4</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Titipan Biaya Selimut</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Jumlah Biaya Titipan</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Jumlah Penumpang dan Km Bus</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Biaya Operasi</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">1</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Komisi yang diterima Agen</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">2</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Komisi Transit</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">3</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Discount/Potongan Harga</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Jumlah Komisi</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Jumlah UPP Setelah dikurangi Komisi</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">1</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Pembayaran Solar</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">2</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Pembayaran TPR</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">3</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Pembayaran Tol</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">4</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Pembayaran Cuci Kendaraan</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">5</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Pembayaran Upah Knek</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">6</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">UDJ Khusus</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">7</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Uang Rit</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">8</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">UDJ 7% dari UPP setelah dikurangi Komisi</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\">9</td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\">Biaya Lain-lain</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Jumlah Biaya Langsung</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Surplus/Minus Operasi</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:left;\"><b>Penerimaan Kembali Titipan</b></td>
	<td colspan=\"5\" style=\"font-size:12px;text-align:left;\"><b>1. Asuransi Jasa Raharja</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:left;\"><b></b></td>
	<td colspan=\"5\" style=\"font-size:12px;text-align:left;\"><b>2. Snack</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:left;\"><b></b></td>
	<td colspan=\"5\" style=\"font-size:12px;text-align:left;\"><b>3. Selimut</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:left;\"><b></b></td>
	<td colspan=\"5\" style=\"font-size:12px;text-align:left;\"><b>4. PPH</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:center;\"><b>Jumlah ..........</b></td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td colspan=\"11\" style=\"font-size:12px;text-align:left;\"><b>Jumlah Yang Di Setorkan Oleh Awak Bos</b></td>
	</tr>
	</thead>";
		// $sql = $this->db->query("");
	$no = 0;
		// foreach ($sql->result() as $row){
	$no = $no+1;

	$cRet .="
	<tbody>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tbody>";
		// } $no++;
	$cRet.="
	</table>

	<br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"33%\" align=\"left\" style=\"font-size:14px;\">
	<b>Sumber Data Dari :</b><br />
	<b>AP/1, AP/2, AP/3, dan AK/16</b><br />
	<b>Dibuat Rangkap 3 (tiga) :</b>
	<b>1. Lembar kesatu untuk Kantor Cabang</b>
	<b>2. Lembar kedua untuk Rekonsiliasi di Kantor Pusat</b>
	<b>3. Lembar ketiga untuk Arsip sesi Usaha</b>
	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:14px;\">
	<b>MENGETAHUI :</b>
	<b></br>GENERAL MANAGER</b><br />
	<b></br>(....................................)</b>
	</td>
	<td width=\"33%\" align=\"right\" style=\"font-size:14px;\">
	<b>..................,....................................</b><br />
	<b>PEMBUAT DAFTAR</b><br />
	<b><br />(....................................)</b>
	</td>
	</tr>
	</table><br/>
	";
		// if($format == 0){
	echo $cRet;
		// } else if ($format == 1) {
		// 	$this->_mpdf('',$cRet,10,10,10,'L');
		// } else {
		// 	$data['prev']= $cRet;
		// 	header("Cache-Control: no-cache, no-store, must-revalidate");
		// 	header("Content-Type: application/vnd.ms-excel");
		// 	header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
		// 	$this->load->view('report/excel', $data);
		// }
}

public function laporan_ak13_v2() {
	$cRet ='';
	$cRet .= "
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"33%\" align=\"left\" style=\"font-size:11px;\">
	SEGMENT BUS KOTA/PEMADU MODA<br /><br/><br /><br/>
	<b>JURUSAN : .................</b><br />
	<b>PANJANG TRAYEK : ...................................<br />
	<b>TANGGAL : .................</b><br />
	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>PERUSAHAAN UMUM DAMRI</b><br />
	<b>(PERUM DAMRI)</b><br />
	<b>KANTOR CABANG : ...................................</b><br />

	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<img src=\"".base_url('assets/img/logos.png')."\" alt=\"Perum DAMRI\" height=\"15\" width=\"100\">
	<p style=\"font-size:12px;text-align:center;\">NOMOR</p>
	<table style=\"border-collapse:collapse;\" align=\"right\" border=\"1\" style=\"font-size:12px;\">
	<tr>
	<td rowspan=\"3\" style=\"font-size:11px;text-align:center;\">JENIS PELAYANAN</td>
	<td colspan=\"3\" style=\"font-size:11px;text-align:center;\">SERIE KARCIS</td>
	</tr>
	<tr>
	<td colspan=\"2\" style=\"font-size:11px;text-align:center;\">NOMOR</td>
	<td rowspan=\"2\" style=\"font-size:11px;text-align:center;\">JUMLAH</td>
	</tr>
	<tr>
	<td style=\"font-size:11px;text-align:center;\">AWAL</td>
	<td style=\"font-size:11px;text-align:center;\">AKHIR</td>
	</tr>
	<tr>
	<td height=\"30\"></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	</table>

	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
	<thead>
	<tr>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NO</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KODE BUS</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR POLISI</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR AP/1 & AP/2</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NAMA</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">BANYAKNYA</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JENIS PENUMPANG</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KARCIS TERJUAL</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">BAGASI COLLY/KG</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TARIF PNP-KM,PNP-ORG/UMUM/PM</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PENDAPATAN</td>
	</tr>
	<tr>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PENGEMUDI</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KONDEKTUR</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">UMUM</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">P.M</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JML</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JUMLAH</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">BGS</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JUMLAH</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">AWAL</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">AKHIR</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">1</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">2</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\"></td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">3</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">4</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">5</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">6</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">7</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">8</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">9</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">10</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">11</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">12</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">13</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">14</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">15</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">16</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">17</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">18</td>
	</tr>
	</thead>";
        // $sql = $this->model_anggaran_lpe->laporan_lpe($id_bu,$tahun);
	$no = 0;
        // foreach ($sql->result() as $row){
	$no = $no+1;

	$cRet .="
	<tbody>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tbody>";
        // } $no++;
	$cRet.="<tfoot>
	<tr>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	</tfoot>
	</table>

	<br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"50%\" align=\"left\" style=\"font-size:14px;\">
	MENGETAHUI :
	</br>MANAGER USAHA<br ?>
	<b></br>(....................................)</b>
	</td>
	<td width=\"50%\" align=\"right\" style=\"font-size:14px;\">
	<br />
	PEMBUAT DAFTAR<br />
	<b><br />(..................................)</b>
	</td>
	</tr>
	</table><br/>
	";

        // if($format == 0){
	echo $cRet;
        // } else if ($format == 1) {
        //  $this->_mpdf('',$cRet,10,10,10,'L');
        // } else {
        //  $data['prev']= $cRet;
        //  header("Cache-Control: no-cache, no-store, must-revalidate");
        //  header("Content-Type: application/vnd.ms-excel");
        //  header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
        //  $this->load->view('report/excel', $data);
        // }
}

public function laporan_lpb() {
	$cRet ='';
	$cRet .= "
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"30%\" align=\"center\" style=\"font-size:15px;\">
	<b>PERUSAHAAN UMUM DAMRI</b><br />
	<b>(PERUM DAMRI)</b><br />
	<b>KANTOR CABANG : .................<br />
	</td>
	<td width=\"30%\" align=\"center\" style=\"font-size:15px;\">
	<b>LAPORAN KONDISI KENDARAAN DINAS OPERASIONAL</b><br />
	<b>BULAN (bulan_tahun)</b><br />
	</td>
	<td width=\"30%\" align=\"center\" style=\"font-size:15px;\">

	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td align=\"right\" style=\"font-size:14px;\">
	<b>LP/B</b><br />
	</td>
	</tr>
	</table>
	<table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
	<thead>
	<tr>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">N</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JENIS KENDARAAN</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">MEREK</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JENIS PLYN</td>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">DAYA MUAT</td>
	<td rowspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HARI JALAN</td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HARI TIDAK JALAN</td>
	<td colspan=\"5\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">SURAT SURAT KENDARAAN SAMPAI DENGAN TANGGAL</td>
	</tr>
	<tr>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">POSISI</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KODE</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TEKNIS</td>
	<td colspan=\"3\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NON TEKNIK</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">STNK</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KEUR</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">IJIN<br />USAHA</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TRAYEK/<br />KPS</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">ASS JASA<br />RAHARJA</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">S</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RR</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RB</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HTP</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HTSK</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HTOM</td>
	</tr>
	</thead>";
		// $sql = $this->db->query("");
	$no = 0;
		// foreach ($sql->result() as $row){
	$no = $no+1;

	$cRet .="
	<tbody>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tbody>";
		// } $no++;
	$cRet.="<tfoot>
	<tr>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	</tfoot>
	</table>

	<br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"50%\" align=\"left\" style=\"font-size:14px;\">
	<b>MENGETAHUI :</b>
	<b></br>GENERAL MANAGER</b><br ?>
	<b></br>(....................................)</b>
	</td>
	<td width=\"50%\" align=\"right\" style=\"font-size:14px;\">
	<b>..................,....................................</b><br />
	<b>MANAGER USAHA</b><br />
	<b><br />(....................................)</b>
	</td>
	</tr>
	</table><br/>
	";
		// if($format == 0){
	echo $cRet;
		// } else if ($format == 1) {
		// 	$this->_mpdf('',$cRet,10,10,10,'L');
		// } else {
		// 	$data['prev']= $cRet;
		// 	header("Cache-Control: no-cache, no-store, must-revalidate");
		// 	header("Content-Type: application/vnd.ms-excel");
		// 	header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
		// 	$this->load->view('report/excel', $data);
		// }
}

public function laporan_lpe() {
	$cRet ='';
	$cRet .= "
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>PERUSAHAAN UMUM DAMRI</b><br />
	<b>(PERUM DAMRI)</b><br />
	<b>KANTOR CABANG : .................<br />
	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>LAPORAN HASIL OPERASONAL</b><br />
	<b>BULAN : ..........................</b><br />

	</td>
	<td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
	<b>disini_gambar</b><br />
	<b>disini_gambar</b><br />
	</td>
	</tr>
	</table><br/>
	<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td align=\"right\" style=\"font-size:14px;\">
	<b>LP/E</b><br />
	</td>
	</tr>
	</table>
	<table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
	<thead>
	<tr>
	<td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KODE BUS</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">DAYA MUAT</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JENIS PLYN</td>
	<td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TRAYEK YANG DILYN</td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">R E N C A N A</td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">R E A L I S A S I</td>
	<td colspan=\"6\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PROSENTASE</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">URUT</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">POLISI</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HJ</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-KM</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PENDAPATAN</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HJ</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-KM</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PENDAPATAN</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HJ</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-KM</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">UPP</td>
	</tr>
	<tr>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">1</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">2</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">3</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">4</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">5</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">6</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">7</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">8</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">9</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">10</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">11</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">12</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">13</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">14</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">15</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">16</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">17</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">18</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">19</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">20</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">21</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">22</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">23</td>
	<td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">24</td>
	</tr>
	</thead>";
		// $sql = $this->model_report->laporan_lpe();
	$no = 0;
		// foreach ($sql->result() as $row){
	$no = $no+1;

	$cRet .="
	<tbody>
	<tr>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	<td style=\"font-size:12px;text-align:center;\"></td>
	</tbody>";
		// } $no++;
	$cRet.="<tfoot>
	<tr>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	<td style=\"font-size:12px;text-align:right;\"></td>
	</tfoot>
	</table>

	<br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
	<tr>
	<td width=\"50%\" align=\"left\" style=\"font-size:14px;\">
	<b>MENGETAHUI :</b>
	<b></br>GENERAL MANAGER</b><br ?>
	<b></br>(....................................)</b>
	</td>
	<td width=\"50%\" align=\"right\" style=\"font-size:14px;\">
	<b>..................,....................................</b><br />
	<b>MANAGER USAHA</b><br />
	<b><br />(....................................)</b>
	</td>
	</tr>
	</table><br/>
	";

		// if($format == 0){
	echo $cRet;
		// } else if ($format == 1) {
		// 	$this->_mpdf('',$cRet,10,10,10,'L');
		// } else {
		// 	$data['prev']= $cRet;
		// 	header("Cache-Control: no-cache, no-store, must-revalidate");
		// 	header("Content-Type: application/vnd.ms-excel");
		// 	header("Content-Disposition: attachment; filename= Rincian_Gaji_".$nm_cabang.".xls");
		// 	$this->load->view('report/excel', $data);
		// }

	}
	
	public function get_data_chart_segment(){
		$data_id = $this->model_report->get_data_chart_segment();
		echo json_encode($data_id,JSON_NUMERIC_CHECK);
	}
	

}


