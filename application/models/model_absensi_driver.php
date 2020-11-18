<?php
class Model_absensi_driver extends CI_Model
{
	
	public function getAllabsensi_driver($show=null, $start=null, $cari=null, $id_bu, $tanggal){
		$this->db->select("a.id_pegawai,a.nik_pegawai,a.nm_pegawai,b.status,b.tgl_absensi,b.keterangan,b.cuser,b.cdate as date_create,b.cnm_user");
		$this->db->from("hris.ref_pegawai a");
		$this->db->join("tr_absensi_driver b", "a.id_bu = b.id_bu AND a.id_pegawai = b.id_pegawai AND b.tgl_absensi = '$tanggal'","left");
		$session = $this->session->userdata('login');
		if($id_bu != ''){
			$this->db->where('a.id_bu', $id_bu);
		}
		$this->db->where('a.id_posisi', 10);
		$this->db->where('a.active', 1);
		$this->db->where_in('a.status_pegawai', array('PKWT','PKWTT','MITRA','OUTSOURCE'));
		$this->db->where("(a.nm_pegawai  LIKE '%".$cari."%' OR  b.tgl_absensi  LIKE '%".$cari."%' OR  b.cuser  LIKE '%".$cari."%') ");
		// $this->db->group_by('a.kd_armada');
		$this->db->order_by('a.nm_pegawai','ASC');
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_absensi_driver($cari = null, $id_bu, $tanggal){
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_pegawai) as recordsFiltered ");
		$this->db->from("hris.ref_pegawai a");
		$this->db->join("tr_absensi_driver b", "a.id_bu = b.id_bu AND a.id_pegawai = b.id_pegawai AND b.tgl_absensi = '$tanggal'","left");
		if($id_bu != ''){
			$this->db->where('a.id_bu', $id_bu);
		}
		$this->db->where('a.id_posisi', 10);
		$this->db->where('a.active', 1);
		$this->db->where_in('a.status_pegawai', array('PKWT','PKWTT','MITRA','OUTSOURCE'));
		$this->db->where("(a.id_pegawai  LIKE '%".$cari."%') ");
		// $this->db->group_by('a.kd_armada');
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_pegawai) as recordsTotal ");
		$this->db->from("hris.ref_pegawai a");
		$this->db->join("tr_absensi_driver b", "a.id_bu = b.id_bu AND a.id_pegawai = b.id_pegawai AND b.tgl_absensi = '$tanggal'","left");
		if($id_bu != ''){
			$this->db->where('a.id_bu', $id_bu);
		}
		$this->db->where('a.id_posisi', 10);
		$this->db->where('a.active', 1);
		$this->db->where_in('a.status_pegawai', array('PKWT','PKWTT','MITRA','OUTSOURCE'));
		// $this->db->group_by('a.kd_armada');
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAllabsensi_driver1($show=null, $start=null, $cari=null, $id_bu, $tanggal)
	{	
		if ($show == null && $start == null) {
			$limit = "";
		} else {
			$limit = "limit $start, $show" ;
		}
		
		if($cari == null){
			$cr = "";
		}else{
			$cr = "and nm_pegawai like '%$cari%'  ";
		}
		
		if($tanggal == null){
			$tgl = "";
			$tgla = "and tgl_absensi = '1991-01-01'";
			$id_bu = "9999";
		}else{
			$tgla = " and tgl_absensi = '$tanggal'  ";
		}
		
		$query = $this->db->query("select id_pegawai, nm_pegawai, tanggal, status, keterangan, petugas, cdate, id_bu
			from (
			select a.id_pegawai, nm_pegawai, tgl_absensi tanggal, status, keterangan, a.cuser petugas, a.cdate, a.id_bu
			from tr_absensi_driver a
			join hris.ref_pegawai on a.id_pegawai = hris.ref_pegawai.id_pegawai
			where hris.ref_pegawai.status_pegawai in ('PKWTT','PKWT','MITRA') AND a.id_bu <> 0 $tgla
			union all
			select id_pegawai, nm_pegawai, '' tanggal, '' status, '' keterangan, '' petugas, '' cdate, id_bu 
			from hris.ref_pegawai 
			where status_pegawai in ('PKWTT','PKWT','MITRA') AND id_posisi = 10 and id_bu <> 0
			) z
			where id_bu = '$id_bu' 
			$cr
			group by id_pegawai $limit");
		if($query->num_rows() > 0){
			return $query;
		}else{
			$querynull = $this->db->query("select id_pegawai, nm_pegawai, tanggal, status, keterangan, petugas, cdate, id_bu
				from (
				select id_pegawai, nm_pegawai, '' tanggal, '' status, '' keterangan, '' petugas, '' cdate, id_bu 
				from hris.ref_pegawai 
				where status_pegawai in ('PKWTT','PKWT','MITRA') AND id_posisi = 10 and id_bu <> 0
				union all
				select a.id_pegawai, nm_pegawai, tgl_absensi tanggal, status, keterangan, a.cuser petugas, a.cdate, a.id_bu
				from tr_absensi_driver a
				join hris.ref_pegawai on a.id_pegawai = hris.ref_pegawai.id_pegawai
				where hris.ref_pegawai.status_pegawai in ('PKWTT','PKWT','MITRA') AND a.id_bu <> 0 $tgla
				) z
				where id_bu = '$id_bu'
				$cr
				group by id_pegawai $limit");
			return $querynull;
		}
		
	}
	
	public function get_count_absensi_driver1($search = null, $id_bu, $tanggal)
	{
		$count = array();			
		if($search == null){
			$cr = "";
		}else{
			$cr = "and nm_pegawai like '%$search%'  ";
		}
		
		if($tanggal == null){
			$tgl = "";
			$tgla = "";
		}else{
			$tgl = " and tanggal = '$tanggal'  ";
			$tgla = " and tgl_absensi = '$tanggal'  ";
		}
		
		$query = $this->db->query("select IFNULL(count(id_pegawai),0) recordsFiltered
			from (
			select id_pegawai, nm_pegawai, '' tanggal, '' status, '' petugas, '' cdate, id_bu 
			from hris.ref_pegawai 
			where status_pegawai in ('PKWTT','PKWT','MITRA') AND id_posisi = 10 and id_bu <> 0
			union all
			select a.id_pegawai, nm_pegawai, tgl_absensi tanggal, status, a.cuser petugas, a.cdate, a.id_bu
			from tr_absensi_driver a
			join hris.ref_pegawai on a.id_pegawai = hris.ref_pegawai.id_pegawai
			where hris.ref_pegawai.status_pegawai in ('PKWTT','PKWT','MITRA') AND a.id_bu <> 0 $tgla
			) z
			where id_bu = '$id_bu' 
			$cr
			");
		
		$count['recordsFiltered'] = $query->row_array()['recordsFiltered'];
		
		
		$query = $this->db->query("select IFNULL(count(id_pegawai),0) recordsTotal
			from (
			select id_pegawai, nm_pegawai, '' tanggal, '' status, '' petugas, '' cdate, id_bu 
			from hris.ref_pegawai 
			where status_pegawai in ('PKWTT','PKWT','MITRA') AND id_posisi = 10 and id_bu <> 0
			union all
			select a.id_pegawai, nm_pegawai, tgl_absensi tanggal, status, a.cuser petugas, a.cdate, a.id_bu
			from tr_absensi_driver a
			join hris.ref_pegawai on a.id_pegawai = hris.ref_pegawai.id_pegawai
			where hris.ref_pegawai.status_pegawai in ('PKWTT','PKWT','MITRA') AND a.id_bu <> 0 $tgla
			) z
			where id_bu = '$id_bu'
			");
		$count['recordsTotal'] = $query->row_array()['recordsTotal'];
		
		return $count;
	}
	
	public function insert_absensi_driver($data)
	{
		$this->db->from('tr_absensi_driver');
		$this->db->where('tgl_absensi', $data['tgl_absensi']);
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$cek = $this->db->get();
		if($cek->num_rows() > 0){
			
			$this->db->where('tgl_absensi', $data['tgl_absensi']);
			$this->db->where('id_pegawai', $data['id_pegawai']);
			$this->db->delete('tr_absensi_driver');
			if($this->db->affected_rows()){
				$this->db->insert('tr_absensi_driver', $data);
				return $this->db->insert_id();
			}
		}else{
			$this->db->insert('tr_absensi_driver', $data);
			return $this->db->insert_id();
		}
	}

	public function delete_absensi_driver($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->delete('tr_absensi_driver');
		return $data['id_pegawai'];
	}
	
	public function get_absensi_driver_by_id($id_pegawai,$id_bu)
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
				from tr_absensi_driver a
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

	function get_pejabat($hasil="",$tabel="",$kolom="",$isi="",$id_bu){
		$session = $this->session->userdata('login');
		if($hasil && $hasil!="*") $this->db->select($hasil);
		$this->db->limit(1);
		$this->db->where("md5($kolom)",md5($isi));
		$this->db->where("id_bu",$id_bu);
		$exec = $this->db->get($tabel);
		return $hasil && $hasil!="*" ? $exec->row($hasil) : $exec;
	}
	function get_info($hasil="",$tabel="",$kolom="",$isi=""){
		if($hasil && $hasil!="*") $this->db->select($hasil);
		$this->db->limit(1);
		$this->db->where("md5($kolom)",md5($isi));
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

		return array(
			"nik_pegawai" => $nik_pegawai,
			"nm_pegawai" => $nm_pegawai
		);
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

	public function copyAbsensiDriver($id_cabang,$tanggal_from,$tanggal_to){
		// $this->db->delete('tr_absensi_driver', array('tgl_absensi' => $tanggal_to,'id_bu' => $id_cabang));
		$sql = "CALL p_copy_absensi_driver('$id_cabang','$tanggal_from','$tanggal_to')";
		$this->db->query($sql);
		return true;
	}

	public function absensi_pengemudi($id_cabang,$bulan,$tahun)
	{
		$sql = "
		SELECT x.nm_pegawai,
		GROUP_CONCAT(tgl1 SEPARATOR '') AS tgl1,
		GROUP_CONCAT(tgl2 SEPARATOR '') AS tgl2,
		GROUP_CONCAT(tgl3 SEPARATOR '') AS tgl3,
		GROUP_CONCAT(tgl4 SEPARATOR '') AS tgl4,
		GROUP_CONCAT(tgl5 SEPARATOR '') AS tgl5,
		GROUP_CONCAT(tgl6 SEPARATOR '') AS tgl6,
		GROUP_CONCAT(tgl7 SEPARATOR '') AS tgl7,
		GROUP_CONCAT(tgl8 SEPARATOR '') AS tgl8,
		GROUP_CONCAT(tgl9 SEPARATOR '') AS tgl9,
		GROUP_CONCAT(tgl10 SEPARATOR '') AS tgl10,
		GROUP_CONCAT(tgl11 SEPARATOR '') AS tgl11,
		GROUP_CONCAT(tgl12 SEPARATOR '') AS tgl12,
		GROUP_CONCAT(tgl13 SEPARATOR '') AS tgl13,
		GROUP_CONCAT(tgl14 SEPARATOR '') AS tgl14,
		GROUP_CONCAT(tgl15 SEPARATOR '') AS tgl15,
		GROUP_CONCAT(tgl16 SEPARATOR '') AS tgl16,
		GROUP_CONCAT(tgl17 SEPARATOR '') AS tgl17,
		GROUP_CONCAT(tgl18 SEPARATOR '') AS tgl18,
		GROUP_CONCAT(tgl19 SEPARATOR '') AS tgl19,
		GROUP_CONCAT(tgl20 SEPARATOR '') AS tgl20,
		GROUP_CONCAT(tgl21 SEPARATOR '') AS tgl21,
		GROUP_CONCAT(tgl22 SEPARATOR '') AS tgl22,
		GROUP_CONCAT(tgl23 SEPARATOR '') AS tgl23,
		GROUP_CONCAT(tgl24 SEPARATOR '') AS tgl24,
		GROUP_CONCAT(tgl25 SEPARATOR '') AS tgl25,
		GROUP_CONCAT(tgl26 SEPARATOR '') AS tgl26,
		GROUP_CONCAT(tgl27 SEPARATOR '') AS tgl27,
		GROUP_CONCAT(tgl28 SEPARATOR '') AS tgl28,
		GROUP_CONCAT(tgl29 SEPARATOR '') AS tgl29,
		GROUP_CONCAT(tgl30 SEPARATOR '') AS tgl30,
		GROUP_CONCAT(tgl31 SEPARATOR '') AS tgl31,
		x.total_hari,
		sum(x.masuk) as masuk,
		sum(x.libur) as libur,
		sum(x.izin) as izin


		from (
		SELECT b.nm_pegawai, a.id_pegawai,
		CASE WHEN DAY(a.tgl_absensi)=01 THEN a.status ELSE '' END AS tgl1,
		CASE WHEN DAY(a.tgl_absensi)=02 THEN a.status ELSE '' END AS tgl2,
		CASE WHEN DAY(a.tgl_absensi)=03 THEN a.status ELSE '' END AS tgl3,
		CASE WHEN DAY(a.tgl_absensi)=04 THEN a.status ELSE '' END AS tgl4,
		CASE WHEN DAY(a.tgl_absensi)=05 THEN a.status ELSE '' END AS tgl5,
		CASE WHEN DAY(a.tgl_absensi)=06 THEN a.status ELSE '' END AS tgl6,
		CASE WHEN DAY(a.tgl_absensi)=07 THEN a.status ELSE '' END AS tgl7,
		CASE WHEN DAY(a.tgl_absensi)=08 THEN a.status ELSE '' END AS tgl8,
		CASE WHEN DAY(a.tgl_absensi)=09 THEN a.status ELSE '' END AS tgl9,
		CASE WHEN DAY(a.tgl_absensi)=10 THEN a.status ELSE '' END AS tgl10,
		CASE WHEN DAY(a.tgl_absensi)=11 THEN a.status ELSE '' END AS tgl11,
		CASE WHEN DAY(a.tgl_absensi)=12 THEN a.status ELSE '' END AS tgl12,
		CASE WHEN DAY(a.tgl_absensi)=13 THEN a.status ELSE '' END AS tgl13,
		CASE WHEN DAY(a.tgl_absensi)=14 THEN a.status ELSE '' END AS tgl14,
		CASE WHEN DAY(a.tgl_absensi)=15 THEN a.status ELSE '' END AS tgl15,
		CASE WHEN DAY(a.tgl_absensi)=16 THEN a.status ELSE '' END AS tgl16,
		CASE WHEN DAY(a.tgl_absensi)=17 THEN a.status ELSE '' END AS tgl17,
		CASE WHEN DAY(a.tgl_absensi)=18 THEN a.status ELSE '' END AS tgl18,
		CASE WHEN DAY(a.tgl_absensi)=19 THEN a.status ELSE '' END AS tgl19,
		CASE WHEN DAY(a.tgl_absensi)=20 THEN a.status ELSE '' END AS tgl20,
		CASE WHEN DAY(a.tgl_absensi)=21 THEN a.status ELSE '' END AS tgl21,
		CASE WHEN DAY(a.tgl_absensi)=22 THEN a.status ELSE '' END AS tgl22,
		CASE WHEN DAY(a.tgl_absensi)=23 THEN a.status ELSE '' END AS tgl23,
		CASE WHEN DAY(a.tgl_absensi)=24 THEN a.status ELSE '' END AS tgl24,
		CASE WHEN DAY(a.tgl_absensi)=25 THEN a.status ELSE '' END AS tgl25,
		CASE WHEN DAY(a.tgl_absensi)=26 THEN a.status ELSE '' END AS tgl26,
		CASE WHEN DAY(a.tgl_absensi)=27 THEN a.status ELSE '' END AS tgl27,
		CASE WHEN DAY(a.tgl_absensi)=28 THEN a.status ELSE '' END AS tgl28,
		CASE WHEN DAY(a.tgl_absensi)=29 THEN a.status ELSE '' END AS tgl29,
		CASE WHEN DAY(a.tgl_absensi)=30 THEN a.status ELSE '' END AS tgl30,
		CASE WHEN DAY(a.tgl_absensi)=31 THEN a.status ELSE '' END AS tgl31,

		DAY(LAST_DAY(a.tgl_absensi)) as total_hari,
		CASE WHEN a.status in ('SD','D') THEN COUNT(a.status) ELSE '' END as masuk,
		CASE WHEN a.status in ('L') THEN COUNT(a.status) ELSE '' END as libur,
		CASE WHEN a.status in ('S','C','I') THEN COUNT(a.status) ELSE '' END as izin
		from tr_absensi_driver a
		LEFT JOIN hris.ref_pegawai b on a.id_pegawai=b.id_pegawai
		where MONTH(a.tgl_absensi)=".$bulan." 
		AND YEAR(a.tgl_absensi)=".$tahun."
		AND b.id_bu=".$id_cabang."
		GROUP BY a.tgl_absensi,a.id_pegawai
		) x 
		GROUP BY x.id_pegawai
		ORDER BY x.nm_pegawai
		";

		$data = $this->db->query($sql);
		return $data->result();
	}

}
