<?php
class Model_absensi_teknik extends CI_Model
{
	
	
	public function getAllabsensi_teknik($show=null, $start=null, $cari=null, $id_bu,$tanggal,$id_segment)
	{
		$this->db->select("a.*,b.status,b.tgl_absensi,b.keterangan,b.cnm_user,b.cdate as date_create");
		$this->db->from("ref_armada a");
		$this->db->join("tr_absensi_armada_teknik b", "a.id_bu = b.id_bu AND a.kd_armada = b.kd_armada AND b.tgl_absensi = '$tanggal'","left");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("a.id_bu !=''");
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("(a.kd_armada  LIKE '%".$cari."%' OR  b.status  LIKE '%".$cari."%' OR  b.tgl_absensi  LIKE '%".$cari."%') ");
		if($id_segment !=0){
			$this->db->where('a.id_segment', $id_segment);
		}

		$this->db->order_by('a.id_armada','ASC');
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_absensi_teknik($cari = null, $id_bu,$tanggal,$id_segment)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_armada) as recordsFiltered ");
		$this->db->from("ref_armada a");
		$this->db->join("tr_absensi_armada_teknik b", "a.id_bu = b.id_bu AND a.kd_armada = b.kd_armada AND b.tgl_absensi = '$tanggal'","left");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("(a.kd_armada  LIKE '%".$cari."%' OR  b.status  LIKE '%".$cari."%' OR  b.tgl_absensi  LIKE '%".$cari."%') ");
		if($id_segment !=0){
			$this->db->where('a.id_segment', $id_segment);
		}
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_armada) as recordsTotal ");
		$this->db->from("ref_armada a");
		$this->db->join("tr_absensi_armada_teknik b", "a.id_bu = b.id_bu AND a.kd_armada = b.kd_armada AND b.tgl_absensi = '$tanggal'","left");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("a.active IN (0, 1) ");
		if($id_segment !=0){
			$this->db->where('a.id_segment', $id_segment);
		}
		// $this->db->group_by('a.kd_armada');
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}
	
	public function insert_absensi_teknik($data)
	{
		$this->db->from('tr_absensi_armada_teknik');
		$this->db->where('tgl_absensi', $data['tgl_absensi']);
		$this->db->where('kd_armada', $data['kd_armada']);
		$this->db->where('id_bu', $data['id_bu']);
		$cek = $this->db->get();
		if($cek->num_rows() > 0){
			$this->db->where('tgl_absensi', $data['tgl_absensi']);
			$this->db->where('kd_armada', $data['kd_armada']);
			$this->db->where('id_bu', $data['id_bu']);
			$this->db->delete('tr_absensi_armada_teknik');
			if($this->db->affected_rows()){
				$this->db->insert('tr_absensi_armada_teknik', $data);
				return $this->db->insert_id();
			}
		}else{
			$this->db->insert('tr_absensi_armada_teknik', $data);
			return $this->db->insert_id();
		}
	}

	public function delete_absensi_armada($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->delete('tr_absensi_armada_teknik');
		return $data['id_pegawai'];
	}
	
	public function get_absensi_armada_by_id($id_pegawai,$id_bu)
	{
		if(empty($id_pegawai))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$query = $this->db->query("select id_pegawai, nm_pegawai, tanggal, status, petugas, cdate, id_bu
				from (
				select id_pegawai, nm_pegawai, '' tanggal, '' status, '' petugas, '' cdate, id_bu 
				from hris.ref_pegawai 
				where id_posisi = 10 and id_bu <> 0
				union all
				select a.id_pegawai, nm_pegawai, tgl_absensi tanggal, status, a.cuser petugas, a.cdate, a.id_bu
				from tr_absensi_armada_teknik a
				join hris.ref_pegawai on a.id_pegawai = hris.ref_pegawai.id_pegawai
				where a.id_bu <> 0
				) z
				where id_bu = '$id_bu' and id_pegawai = '$id_pegawai' ");
			return $query->row_array();
		}
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

	public function combobox_segment()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_segment b");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.active', 1);
		
		return $this->db->get();
	}

	public function combobox_armada()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_armada b");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.active', 0);
		
		return $this->db->get();
	}
	
	public function combobox_trayek()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_trayek b");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.active', 1);
		
		return $this->db->get();
	}
	
	public function list_trayek($id_cabang){
		$this->db->from("ref_trayek a");
		$this->db->where('a.id_bu', $id_cabang);
		$this->db->where('a.active', 1);
		$this->db->order_by('a.id_trayek');
		return $this->db->get();
	}
	
	public function list_armada($id_cabang){
		$this->db->from("ref_armada a");
		$this->db->where('a.id_bu', $id_cabang);
		$this->db->where('a.active', 0);
		$this->db->order_by('a.id_armada');
		return $this->db->get();
	}

	public function get_cabang($id_bu){
		$this->db->from("ref_bu a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.active', 1);
		$query = $this->db->get();

		return $query->row();
	}

	public function general_manager($id_bu){
		$this->db->select("a.nm_pegawai");
		$this->db->from("hris.ref_pegawai a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_posisi', 1);
		$query = $this->db->get();

		return $query->row()->nm_pegawai;
	}

	public function asmen_pelayan_jasa($id_bu){
		$this->db->select("a.nm_pegawai");
		$this->db->from("hris.ref_pegawai a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_posisi', 5);
		$query = $this->db->get();

		return $query->row()->nm_pegawai;
	}

	public function copyAbsensiArmada($id_cabang,$id_segment,$tanggal_from,$tanggal_to){
		if($id_segment==0){
			$sql = "CALL p_copy_absensi_armada_teknik('$id_cabang','$tanggal_from','$tanggal_to')";
		}else{
			$sql = "CALL p_copy_absensi_armada_teknik_by_segment('$id_cabang','$id_segment','$tanggal_from','$tanggal_to')";
		}
		$this->db->query($sql);
		return true;
	}

}
