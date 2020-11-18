<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_cetak extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function cetak($folder="",$param=array()){
		$session = $this->session->userdata('login');
        $user = $session['id_user'];
		if(!$user) echo("<i>Gagal menampilkan data, Sesi Login Berakhir</i>");
		$format = $this->input->get("format");
		$format = $format ? $format : "html";
		$judul = $this->input->get("filename");
		$judul = $judul ? $judul : "dokumen";
		$kertas = $this->input->get("uk");
		extract($param);
		switch ($format){
			case "html";
				$this->load->view($folder,$param);
			break;
			case "pdf";
				$html = $this->load->view($folder,$param,true);
				$js = $this->session->userdata("js");
				$this->session->unset_userdata("js");
				$this->mpdf($judul,$html,$kertas,1,"I","aba",$js);
			break;
			case "excell";
				$this->load->view($folder,$param);
				$namafile=str_replace(' ','_',$judul);
				header("Cache-Control: no-cache, no-store, must-revalidate");
				header("Content-Type: application/vnd.ms-excel");
				header("Content-Disposition: attachment; filename=$namafile.xls");
			break;
			case "csv";
				$this->load->view($folder,$param);
				$namafile=str_replace(' ','_',$judul);
				header("Cache-Control: no-cache, no-store, must-revalidate");
				header("Content-Type: application/vnd.ms-excel");
				header("Content-Disposition: attachment; filename=$namafile.csv");
			break;
			case "word";
				$this->load->view($folder,$param);
				$namafile=str_replace(' ','_',$judul);
				header("Cache-Control: no-cache, no-store, must-revalidate");
				header("Content-Type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename=$namafile.doc");
			break;
			default;
				$this->load->view($folder,$param);
				$namafile=str_replace(' ','_',$judul);
				header("Cache-Control: no-cache, no-store, must-revalidate");
				header("Content-Type: $format");
				header("Content-Disposition: attachment; filename=$namafile.$format");
			break;
		}
	}

	function mpdf($judul='',$isi='',$kertas='f4-p',$pageNo=1,$d="I",$pass="aba",$js=""){
		if($this->agent->is_mobile()) { $d = "D"; $pass = "";}
        ini_set("memory_limit","-1");
        ini_set("max_allowed_packet","110M");
		$this->load->library('mpdf');
		if (strtolower($kertas)=='a4-p') $uk_kertas	= array(210,297); #A4 Potrait
		if (strtolower($kertas)=='a4-l') $uk_kertas	= array(297,210); #A4 Landscape
		if (strtolower($kertas)=='f4-p') $uk_kertas	= array(210,330); #F4 Potrait
		if (strtolower($kertas)=='f4-l') $uk_kertas	= array(330,210); #F4 Landscape
		if (strtolower($kertas)=='tiket') $uk_kertas = array(75,87); #kertas tiket before 75 77
		if (strtolower($kertas)=='slip-setoran') $uk_kertas = array(110,215); #kertas tiket
		if (strtolower($kertas)=='slip-setoran') $pageNo = 0;
		#$this->mpdf = new mPDF($judul,'utf-8',$uk_kertas);
		if($kertas=="tiket"){
			$this->mpdf = new mPDF($judul,'utf-8',$uk_kertas,0,"",0,12,0,0,0,0);
			$pageNo = -1;
		}else{
			$this->mpdf = new mPDF($judul,'utf-8',$uk_kertas);
		}
		if($pageNo<=0){
			$this->mpdf->SetFooter(" |");
		}elseif($pageNo>1){
			$this->mpdf->AddPage('','',$pageNo);
			$this->mpdf->SetFooter("printed by SimaOperasi | Halaman {PAGENO}");
		}else{
			$this->mpdf->SetFooter("printed by SimaOperasi | Halaman {PAGENO} dari {nb} ");
		}
		
		if($kertas=="tiket") $this->mpdf->SetFooter("");
		
		$this->mpdf->SetKeywords("peKA");
		$this->mpdf->SetAuthor("Perum DAMRI");
		$this->mpdf->SetHeader("");

		$session = $this->session->userdata('login');
        $user = $session['id_user'];
		if(!$user) $this->mpdf->SetHeader("Gagal menampilkan data, Sesi Login Berakhir");
		$this->mpdf->SetDisplayMode('fullpage');
		if($js) $this->mpdf->SetJs($js);
			if($d=="D" && $pass)
			$this->mpdf->SetProtection(array(),$pass); #jika terdownload, maka file terproteksi:
		$this->mpdf->writeHTML($isi);
		$this->mpdf->Output($judul.'.pdf',$d);
    }
}
