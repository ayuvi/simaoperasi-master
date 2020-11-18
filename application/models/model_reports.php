<?php
class Model_reports extends CI_Model
{
	function bulan_romawi($bln){
		$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
		$bulan = $array_bulan[ltrim($bln, '0')];
		return  $bulan;
	}

	public function combobox_bu()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu_access b");
		$this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.id_user', $session['id_user']);
		$this->db->where('b.active', 1);
		
		return $this->db->get();
	}
	
	public function combobox_segment(){
		$this->db->select("a.*");
		$this->db->from("ref_segment a");
		$query = $this->db->get();
		return $query;
	}
	public function combobox_armada($id_segment){
		$this->db->from("ref_armada a");
		if ($id_segment=='0') {
		} else {
			$this->db->where('id_segment', $id_segment);
		}
		return $this->db->get();
	}

	public function combobox_armada_($id_bu){
		$this->db->from("ref_armada a");
		$this->db->where('active in (0,1)');
		$this->db->where('id_bu', $id_bu);
		return $this->db->get();
	}

	public function combobox_armada_sbu(){
		$this->db->from("ref_armada a");
		$this->db->where('active in (0,1)');
		$this->db->where('id_bu', 16);
		return $this->db->get();
	}

	public function combobox_trayek($id_bu, $kd_segment){
		$session = $this->session->userdata('login');
		$this->db->from("ref_trayek a");
		if($id_bu != 0){
			$this->db->where('a.id_bu', $id_bu);
		}

		if($kd_segment != '0'){
			$this->db->where('a.kd_segment', $kd_segment);
		}

		$this->db->order_by('a.id_trayek');
		return $this->db->get();
	}

	public function combobox_komponen_pendapatan(){
		$session = $this->session->userdata('login');
		$this->db->select("a.*,b.nm_komponen");
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b", "b.id_komponen = a.id_komponen","left");
		$this->db->where('a.id_bu', $session['id_bu']);
		$this->db->where('b.type_komponen', 'PLUS');
		$this->db->order_by('a.id_komponen');
		return $this->db->get();
	}
	public function combobox_komponen_pengeluaran(){
		$session = $this->session->userdata('login');
		$this->db->select("a.*,b.nm_komponen");
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b", "b.id_komponen = a.id_komponen","left");
		$this->db->where('a.id_bu', $session['id_bu']);
		$this->db->where('b.type_komponen', 'MINUS');
		$this->db->order_by('a.id_komponen');
		return $this->db->get();
	}

	function get_info($hasil="",$tabel="",$kolom="",$isi=""){
		if($hasil && $hasil!="*") $this->db->select($hasil);
		$this->db->limit(1);
		$this->db->where("md5($kolom)",md5($isi));
		$exec = $this->db->get($tabel);
		return $hasil && $hasil!="*" ? $exec->row($hasil) : $exec;
	}
	
	public function manager_nama($id_bu){
		$this->db->select("a.nm_pegawai");
		$this->db->from("hris.ref_pegawai a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_posisi', 4);
		$this->db->limit(1);
		$query = $this->db->get();
		$nm_pegawai = $query->num_rows() ? $query->row("nm_pegawai") : "";
		return $nm_pegawai;
	}
	
	public function manager_nik($id_bu,$nama){
		$this->db->select("a.nik_pegawai");
		$this->db->from("hris.ref_pegawai a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("(a.nm_pegawai  LIKE '%".$nama."%' ) ");
		$this->db->limit(1);
		$query = $this->db->get();
		$nm_pegawai = $query->num_rows() ? $query->row("nik_pegawai") : "";
		return $nm_pegawai;
	}

	function get_pejabat($hasil="",$tabel="",$kolom="",$isi=""){
		$session = $this->session->userdata('login');
		if($hasil && $hasil!="*") $this->db->select($hasil);
		$this->db->limit(1);
		$this->db->where("md5($kolom)",md5($isi));
		$this->db->where("id_bu",$session['id_bu']);
		$exec = $this->db->get($tabel);
		return $hasil && $hasil!="*" ? $exec->row($hasil) : $exec;
	}

	public function general_manager($id_bu)
	{
		$qry_pegawai = "SELECT a.nik_pegawai, a.nm_pegawai FROM hris.ref_pegawai a 
		WHERE a.id_posisi IN ( '1', '45','47' ) AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' LIMIT 1";
		$query = $this->db->query($qry_pegawai);
		if($query->num_rows()==1){
			$data = $query->row();
			$nik_pegawai = $data->nik_pegawai;
			$nm_pegawai = $data->nm_pegawai;
		}else{
			$nik_pegawai = "";
			$nm_pegawai = "";
		}


		if($id_bu==3){
			return array(
				"nik_pegawai" => "68874845",
				"nm_pegawai" => "ISKANDAR, S.Ip"
				);
		}else{
			return array(
				"nik_pegawai" => $nik_pegawai,
				"nm_pegawai" => $nm_pegawai
				);
		}
	}

	public function manager_usaha($id_bu)
	{
		//MANAGER USAHA
		$qry_pegawai = "SELECT a.nik_pegawai, a.nm_pegawai FROM hris.ref_pegawai a 
		WHERE a.id_posisi = 4 AND a.id_divisi_sub = 49 AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' LIMIT 1";
		$query = $this->db->query($qry_pegawai);
		
		if($query->num_rows()==1){
			$data = $query->row();
			$nik_pegawai = $data->nik_pegawai;
			$nm_pegawai = $data->nm_pegawai;

			return array(
				"posisi" => "Manager Usaha",
				"nik_pegawai" => $nik_pegawai,
				"nm_pegawai" => $nm_pegawai
				);
		}else{
			//MANAGER TEKNIK
			$qry_pegawai_2 = "SELECT a.nik_pegawai, a.nm_pegawai FROM hris.ref_pegawai a 
			WHERE a.id_posisi = 4 AND a.id_divisi_sub = 57 AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' LIMIT 1";
			$query_2 = $this->db->query($qry_pegawai_2);

			if($query_2->num_rows()==1){
				$data = $query_2->row();
				$nik_pegawai = $data->nik_pegawai;
				$nm_pegawai = $data->nm_pegawai;
			}else{
				$nik_pegawai = "";
				$nm_pegawai = "";
			}
			return array(
				"posisi" => "Manager Usaha dan Teknik",
				"nik_pegawai" => $nik_pegawai,
				"nm_pegawai" => $nm_pegawai
				);
		}
	}

	public function kasir($id_bu)
	{
		//KASIR
		$qry_pegawai = "SELECT a.nik_pegawai, a.nm_pegawai FROM hris.ref_pegawai a 
		WHERE a.id_posisi = 20 AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' limit 1;";
		$query = $this->db->query($qry_pegawai);
		
		if($query->num_rows()==1){
			$data = $query->row();
			$nik_pegawai = $data->nik_pegawai;
			$nm_pegawai = $data->nm_pegawai;

			return array(
				"posisi" => "Kasir",
				"nik_pegawai" => $nik_pegawai,
				"nm_pegawai" => $nm_pegawai
				);
		}else{
			//MANAGER KEUANGAN
			$qry_pegawai_2 = "SELECT a.nik_pegawai, a.nm_pegawai, a.id_bu FROM hris.ref_pegawai a 
			WHERE a.id_posisi=4 and a.id_divisi_sub = 45 AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' limit 1";
			$query_2 = $this->db->query($qry_pegawai_2);

			if($query_2->num_rows()==1){
				$data = $query_2->row();
				$nik_pegawai = $data->nik_pegawai;
				$nm_pegawai = $data->nm_pegawai;
			}else{
				$nik_pegawai = "";
				$nm_pegawai = "";
			}
			return array(
				"posisi" => "Manager Keuangan, SDM, dan Umum",
				"nik_pegawai" => $nik_pegawai,
				"nm_pegawai" => $nm_pegawai
				);
		}
	}



}
