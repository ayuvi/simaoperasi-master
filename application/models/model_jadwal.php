<?php
class Model_jadwal extends CI_Model
{
	public function getAlljadwaldefault($show=null, $start=null, $cari=null, $id_cabang, $kd_segmen, $id_pool){
		$this->db->select("a.*, b.nm_pegawai as nm_driver, c.nm_pegawai as nm_driver2 ");
		$this->db->from("ms_jadwal a");
		$this->db->join("hris.ref_pegawai b","a.driver1 = b.id_pegawai", 'left');
		$this->db->join("hris.ref_pegawai c","a.driver2 = c.id_pegawai", 'left');
		$this->db->where("(a.tanggal = '1901-01-01' )");
		$this->db->where("(a.armada LIKE '%".$cari."%' or b.nm_pegawai LIKE '%".$cari."%' or a.nm_trayek LIKE '%".$cari."%' )");
		$this->db->where('a.id_cabang', $id_cabang);
		$this->db->where('a.id_pool', $id_pool);
		if ($kd_segmen=='0') {
		} else {
			$this->db->where('a.kd_segmen', $kd_segmen);
		}
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}

	public function get_count_jadwaldefault($cari = null, $id_cabang, $kd_segmen, $id_pool){
		$count = array();
		$this->db->select("COUNT(a.id_jadwal) as recordsFiltered ");
		$this->db->from("ms_jadwal a");
		$this->db->join("hris.ref_pegawai b","a.driver1 = b.id_pegawai", 'left');
		$this->db->where("(a.armada LIKE '%".$cari."%' or b.nm_pegawai LIKE '%".$cari."%' or a.nm_trayek LIKE '%".$cari."%'  )");
		$this->db->where("(a.tanggal = '1901-01-01' )");
		$this->db->where('a.id_cabang', $id_cabang);
		$this->db->where('a.id_pool', $id_pool);
		if ($kd_segmen=='0') {
		} else {
			$this->db->where('a.kd_segmen', $kd_segmen);
		}
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		
		$this->db->select(" COUNT(id_jadwal) as recordsTotal ");
		$this->db->from("ms_jadwal");
		$this->db->where("(tanggal = '1901-01-01' )");
		$this->db->where('id_cabang', $id_cabang);
		$this->db->where('id_pool', $id_pool);
		if ($kd_segmen=='0') {
		} else {
			$this->db->where('kd_segmen', $kd_segmen);
		}
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}

	public function getAlljadwalhr($show=null, $start=null, $cari=null, $tanggal, $id_cabang, $kd_segmen, $id_pool){


		$this->db->select("a.*, b.nm_pegawai as nm_driver, c.nm_pegawai as nm_driver2, coalesce((select z.id_lmb from tr_lmb z where z.id_jadwal = a.id_jadwal order by z.id_lmb desc limit 1 ),0) as id_lmb, coalesce((select z.active from tr_lmb z where z.id_jadwal = a.id_jadwal order by z.id_lmb desc limit 1 ),0) as status_lmb, coalesce((select z.rit from tr_lmb z where z.id_jadwal = a.id_jadwal order by z.id_lmb desc limit 1 ),0) as rit, coalesce((select z.tgl_lmb from tr_lmb z where z.id_jadwal = a.id_jadwal order by z.id_lmb desc limit 1 ),0) as tgl_lmb,
			COALESCE ((SELECT COUNT(DISTINCT x.rit) FROM ref_setoran_detail_pnp x LEFT JOIN ref_setoran_detail y on x.id_setoran_detail=y.id_setoran_detail WHERE y.id_jadwal=a.id_jadwal), 0 ) AS rit_pnp");

		$this->db->from("ms_jadwal a");
		$this->db->join("hris.ref_pegawai b","a.driver1 = b.id_pegawai", 'left');
		$this->db->join("hris.ref_pegawai c","a.driver2 = c.id_pegawai", 'left');
		$this->db->where("(a.tanggal = '$tanggal' )");
		$this->db->where("(a.armada LIKE '%".$cari."%' or b.nm_pegawai LIKE '%".$cari."%' or a.nm_trayek LIKE '%".$cari."%' )");
		$this->db->where('a.id_cabang', $id_cabang);

		if ($id_pool=='0' || $id_pool=='' || empty($id_pool) || $id_pool==null) {} else {
			$this->db->where('a.id_pool', $id_pool);
		}
		
		if ($kd_segmen=='0') {
		} else {
			$this->db->where('a.kd_segmen', $kd_segmen);
		}
		// $this->db->order_by('kd_trayek','ASC');
		$this->db->order_by('a.id_jadwal','ASC');
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}

	public function get_count_jadwalhr($cari = null, $tanggal='',$id_cabang, $kd_segmen, $id_pool){


		$count = array();
		$this->db->select("COUNT(a.id_jadwal) as recordsFiltered ");
		$this->db->from("ms_jadwal a");
		$this->db->join("hris.ref_pegawai b","a.driver1 = b.id_pegawai", 'left');
		$this->db->where("(a.armada LIKE '%".$cari."%' or b.nm_pegawai LIKE '%".$cari."%' )");
		$this->db->where("(a.tanggal = '$tanggal' )");
		$this->db->where('a.id_cabang', $id_cabang);

		if ($id_pool=='0' || $id_pool=='' || empty($id_pool) || $id_pool==null) {} else {
			$this->db->where('a.id_pool', $id_pool);
		}

		// $this->db->where('a.id_pool', $id_pool);
		
		if ($kd_segmen=='0') {
		} else {
			$this->db->where('a.kd_segmen', $kd_segmen);
		}
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_jadwal) as recordsTotal ");
		$this->db->from("ms_jadwal");
		$this->db->where("(tanggal = '$tanggal' )");
		$this->db->where('id_cabang', $id_cabang);
		$this->db->where('id_pool', $id_pool);
		if ($kd_segmen=='0') {
		} else {
			$this->db->where('kd_segmen', $kd_segmen);
		}

		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}

	public function getAlljadwaldefaultdetail($show=null, $start=null, $cari=null, $unik=null){
		$this->db->select("*");
		$this->db->from("ms_jadwal");
		$this->db->where("(unik = '$unik' )");
		$this->db->where("(tanggal = '1901-01-01' )");
		$this->db->where("(kd_segmen = 'PEMADUMODA' )");
		$this->db->where("(bis LIKE '%".$cari."%' )");

		return $this->db->get();
	}

	public function get_count_jadwaldefaultdetail($search = null,$unik=null){
		$count = array();
		$this->db->select("COUNT(id_jadwal) as recordsFiltered ");
		$this->db->from("ms_jadwal");
		$this->db->where("(unik = '$unik' )");
		$this->db->where("(tanggal = '1901-01-01' )");
		$this->db->where("(kd_segmen = 'PEMADUMODA' )");
		$this->db->like("bis", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		$this->db->select(" COUNT(id_jadwal) as recordsTotal ");
		$this->db->from("ms_jadwal");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}


	public function getritjadwal ($show=null, $start=null, $cari=null, $id_lmb){
		$select_column = array("a.*","b.nm_point_awal","b.nm_point_akhir","c.nm_pegawai");
		$this->db->select($select_column);
		$this->db->from("tr_rit a");
		$this->db->join("ref_trayek b","a.kd_trayek = b.kd_trayek", 'left');
		$this->db->join("hris.ref_pegawai c","a.cuser = c.id_pegawai", 'left');
		$this->db->where('a.id_lmb', $id_lmb);
		$this->db->where("(a.kd_trayek LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_ritjadwal($search = null,$id_lmb){
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_rit) as recordsFiltered ");
		$this->db->from("tr_rit a");
		$this->db->join("ref_trayek b","a.kd_trayek = b.kd_trayek", 'left');
		$this->db->where('a.id_lmb', $id_lmb);
		$this->db->like("a.kd_trayek ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_lmb) as recordsTotal ");
		$this->db->from("tr_rit a");
		$this->db->join("ref_trayek b","a.kd_trayek = b.kd_trayek", 'left');
		$this->db->where('a.id_lmb', $id_lmb);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAllscan_tiket($show=null, $start=null, $cari=null, $id_rit){
		$this->db->select("a.*");
		$this->db->from("tr_rit_scan_tiket a");
		$this->db->where("(a.id_rit = '$id_rit' )");
		$this->db->where("(a.id_rit LIKE '%".$cari."%' or a.kode_tiket LIKE '%".$cari."%')");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}

	public function get_count_scan_tiket($cari = null, $id_rit){

		$count = array();
		$this->db->select("COUNT(a.id_scan) as recordsFiltered ");
		$this->db->from("tr_rit_scan_tiket a");
		$this->db->where("(a.id_rit = '$id_rit' )");
		$this->db->where("(a.id_rit LIKE '%".$cari."%' or a.kode_tiket LIKE '%".$cari."%')");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_scan) as recordsTotal ");
		$this->db->from("tr_rit_scan_tiket");
		$this->db->where("(id_rit = '$id_rit' )");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}


	public function insert_jadwal($data){
		$this->db->insert('ms_jadwal', $data);
		return $this->db->insert_id();
	}

	public function delete_jadwal($data){
		$this->db->where('id_jadwal', $data['id_jadwal']);
		$this->db->delete('ms_jadwal');
		return $data['id_jadwal'];
	}

	public function delete_rit($data){
		$this->db->where('id_rit', $data['id_rit']);
		$this->db->delete('tr_rit');
		return $data['id_rit'];
	}

	public function aturBus($tanggal,$id_cabang,$username){
			// $this->db->query("CREATE TEMPORARY TABLE qwerty12345 as SELECT DISTINCT unik FROM ms_jadwal WHERE tanggal = '1901-01-01' AND id_cabang='$id_cabang'");
		$sql = "DELETE FROM ms_jadwal WHERE tanggal='$tanggal' AND id_cabang='$id_cabang'";
		$this->db->query($sql);
		$sql2 = "INSERT INTO ms_jadwal (id_cabang,bis,tanggal,kd_trayek,kd_segmen,jenis,asal,tujuan,username,armada,driver1,harga, target, jam, jam1, id_pool) 
		SELECT id_cabang,bis,'$tanggal',kd_trayek,kd_segmen,jenis,asal,tujuan,'$username',armada,driver1,harga, target, jam, jam1, id_pool
		FROM ms_jadwal WHERE tanggal='1901-01-01' AND id_cabang='$id_cabang'";
		$this->db->query($sql2);
            // $this->db->where('id_jadwal', $data['id_jadwal']);
            // $this->db->delete('ms_jadwal');
		return true;
	}

	public function setRitase($tanggal,$id_cabang){

		$sql = "CALL p_insert_jadwal('$id_cabang','$tanggal')";
		$this->db->query($sql);
		return true;
	}

	public function setRitasearmada($tanggal,$id_cabang,$armada){
		$session = $this->session->userdata('login');
		$cuser = $session['id_user'];
		// $this->db->delete('tr_absensi_armada', array('tgl_absensi' => $tanggal,'id_bu' => $id_cabang,'kd_armada' => $armada));
		// $this->db->delete('tr_absensi_driver', array('tgl_absensi' => $tanggal,'id_bu' => $id_cabang,'id_pegawai' => $driver1));

		$sql = "CALL p_insert_jadwal_armada('$id_cabang','$tanggal','$armada','$cuser')";
		$this->db->query($sql);
		return true;
	}

	public function nextBus($tanggal,$id_cabang,$username,$unik){
		$qry = "SELECT max(bis) bis FROM ms_jadwal WHERE id_cabang='$id_cabang' AND unik='$unik'";
		$sql = $this->db->query($qry);
		$bis = $sql->row("bis");
		$huruf 		=  $this->urut_bis($bis,$tanggal,$id_cabang);
		if ($huruf==''){
			$bis1	= 'a';
		}else{
			$bis1	= chr(ord($huruf) + 1);
		}
		$baru		= $bis.$bis1;
		$sql2 = "INSERT INTO ms_jadwal (id_cabang,bis,tanggal,jam,jam1,plus,kd_trayek,kd_segmen,jenis,asal,tujuan,harga,username,format) 
		SELECT id_cabang,'$baru','$tanggal',jam,jam1,plus,kd_trayek,kd_segmen,jenis,asal,tujuan,harga,'$username',format 
		FROM ms_jadwal WHERE tanggal='$tanggal' AND id_cabang='$id_cabang' AND unik='$unik'";
		$this->db->query($sql2);

		return true;
	}

	function urut_bis($urut,$tanggal,$id_cabang){
		$qry	= "
		SELECT SUBSTR(max,LENGTH('$urut')+1 ,1)  as hurufBis FROM (
		SELECT MAX(bis) max FROM ms_jadwal WHERE CAST(left(bis,LENGTH('$urut')) as BINARY)='$urut' AND id_cabang='$id_cabang' AND tanggal='$tanggal') a ";
		$sql = $this->db->query($qry);
		return $sql->row("hurufBis");
	}


	public function update_jadwal($data){
		$this->db->where('id_jadwal', $data['id_jadwal']);
		$this->db->update('ms_jadwal', $data);
		return $data['id_jadwal'];
	}

	public function update_rit($where, $data){
		$this->db->update('tr_rit', $data, $where);
		return $this->db->affected_rows();
	}
	public function insert_rit($data){
		$this->db->insert('tr_rit', $data);
		return $this->db->insert_id();
	}

	public function update_lmb($data){
		$this->db->where('id_lmb', $data['id_lmb']);
		$this->db->update('tr_lmb', $data);
		return $data['id_lmb'];
	}

	public function get_jadwal_by_id_detail($unik='',$tanggal=''){
		if(empty($unik)){
			return array();
		}
		else
		{
			$this->db->select("a.*, b.nm_pegawai as nm_driver, c.nm_pegawai as nm_driver2");
			$this->db->from("ms_jadwal a");
			$this->db->join("hris.ref_pegawai b","a.driver1 = b.id_pegawai", 'left');
			$this->db->join("hris.ref_pegawai c","a.driver2 = c.id_pegawai", 'left');
			$this->db->where("(a.tanggal = '$tanggal' )");
			$this->db->where('a.id_jadwal', $unik);
			$this->db->limit(1);
			return $this->db->get()->row_array();
		}
	}

	public function get_jadwal_by_id_detail_rit($id=''){
		if(empty($id)){
			return array();
		}
		else
		{
			$this->db->from("tr_rit a");
			$this->db->where('a.id_rit', $id);
			$this->db->limit(1);
			return $this->db->get()->row_array();
		}
	}



	public function combobox_divisi(){
		$this->db->from("ms_divisi a");
		return $this->db->get();
	}

	public function combobox_cabang($id_cabang){
   //          $this->db->from("ref_bu a");
			// if ($id_cabang=='0') {
   //          } else {
   //               $this->db->where('id_bu', $id_cabang);
   //          }
   //          return $this->db->get();
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu_access b");
		$this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.id_user', $session['id_user']);
		$this->db->where('b.active', 1);

		return $this->db->get();
	}

	public function combobox_armada($id_cabang,$tgl_absensi){
		$this->db->from("tr_absensi_armada a");
		if ($id_cabang=='0') {
		} else {
			$this->db->where('id_bu', $id_cabang);
			$this->db->where('tgl_absensi', $tgl_absensi);
			$this->db->where_in('status', array('1','2'));
			// $this->db->where("CONCAT( tgl_absensi, kd_armada ) NOT IN ( SELECT CONCAT( tanggal, armada ) FROM ms_jadwal WHERE id_cabang = '$id_cabang' AND tanggal = '$tgl_absensi' )");
		}
		return $this->db->get();
	}

	public function combobox_kota(){
		$this->db->from("ms_kota a");
		return $this->db->get();
	}

	public function combobox_lokasi(){
		$this->db->from ("ref_point a");
		$this->db->where('a.active', '1');
		return $this->db->get();
	}

	public function combobox_segmen(){
		$this->db->from ("ref_segment a");
			//$this->db->where('a.kd_segmen', 'PEMADUMODA');
		return $this->db->get();
	}

	public function combobox_format(){
		$this->db->from ("ms_format a");
		return $this->db->get();
	}

	public function list_cabang($id_divisi){
           // $session = $this->session->userdata('login');
		$this->db->from("ms_cabang a");
		$this->db->where('a.id_divisi', $id_divisi);
		$this->db->order_by('a.nm_cabang');
		return $this->db->get();
	}

	function list_lmb_lewat_hari($id_bu,$kd_segmen,$kd_armada,$kd_trayek){
		$this->db->select("a.*");
		$this->db->from("tr_lmb a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.kd_armada', $kd_armada);
		$this->db->where('a.active', 1);
		$this->db->where('a.kd_segmen', $kd_segmen);
		$this->db->where('a.kd_trayek', $kd_trayek);
		$this->db->where('a.tgl_lmb <= CURDATE()');
		// $this->db->where('a.tgl_lmb >= CURDATE() - INTERVAL 30 DAY');
		$this->db->order_by('a.tgl_lmb','DESC');
		return $this->db->get();
	}

	public function combobox_pengemudi($id_cabang,$tgl_absensi){
           // $session = $this->session->userdata('login');
		// $this->db->from("hris.ref_pegawai a");
		// $this->db->where('a.id_bu', $id_cabang);
		// $this->db->where('a.id_posisi', '10');
		// $this->db->order_by('a.id_pegawai');
		// return $this->db->get();

		$this->db->select("a.*,b.nm_pegawai,b.nik_pegawai");
		$this->db->from("tr_absensi_driver a");
		$this->db->join("hris.ref_pegawai b", "a.id_pegawai = b.id_pegawai","left");
		$this->db->where('a.id_bu', $id_cabang);
		$this->db->where('a.tgl_absensi', $tgl_absensi);
		$this->db->where_in('a.status', array('SD','D'));
		return $this->db->get();
	}

	public function list_trayek($id_cabang,$kd_segmen){
           // $session = $this->session->userdata('login');
		$this->db->from("ref_trayek a");
		$this->db->where('a.id_bu', $id_cabang);
		$this->db->where('a.kd_segment', $kd_segmen);
		$this->db->order_by('a.id_trayek');
		return $this->db->get();
	}

	public function get_wilayah($kd_trayek){
           // $session = $this->session->userdata('login');
		$this->db->select("a.*, kd_point_awal as asal, kd_point_akhir as tujuan,nm_point_awal as nm_asal, nm_point_akhir nm_tujuan");
		$this->db->from("ref_trayek a");
		$this->db->where('a.kd_trayek', $kd_trayek);
		return $this->db->get()->row_array();
	}

	public function list_pool($id_cabang)
	{
		$session = $this->session->userdata('login');
		$this->db->select("g.*");
		$this->db->from("ref_pool_access a");
		$this->db->join("ref_pool g","a.id_pool = g.id_pool", 'left');
		$this->db->where('g.id_bu', $id_cabang);
		$this->db->where('a.id_user', $session['id_user']);
		$this->db->order_by('a.id_pool_access');

		return $this->db->get();
	}

	public function copyJadwal($id_cabang,$id_pool,$kd_segmen,$tanggal_from,$tanggal_to){
		$session = $this->session->userdata('login');
		$user = $session['id_user'];
		$sql = "CALL p_copy_jadwal('$id_cabang','$id_pool','$kd_segmen','$tanggal_from','$tanggal_to')";
		$this->db->query($sql);
		return true;
	}
	public function count_absensi_driver($id_pegawai,$id_bu,$tgl_absensi)
	{
		$query = $this->db->query("select * from tr_absensi_driver where id_pegawai=$id_pegawai and id_bu=$id_bu and tgl_absensi='$tgl_absensi' and status in ('SD','D')");
		$count = $query->num_rows();
		if($count>0){
			$data=$query->row();
			$ket_status;
			switch ($data->status) {
				case "I":
				$ket_status= "Ijin";
				break;
				case "S":
				$ket_status= "Sakit";
				break;
				case "C":
				$ket_status= "Cuti";
				break;
				case "SD":
				$ket_status= "Siap Dinas";
				break;
				case "D":
				$ket_status= "Dinas";
				break;
				case "L":
				$ket_status= "Libur";
				break;
				default:
				$ket_status= "Not Found";
			}

			return array(
				"count" => $count,
				"status" => $ket_status
				);
		}else{
			return array(
				"count" => $count,
				"status" => ""
				);
		}
	}

	public function count_absensi_armada($kd_armada,$id_bu,$tgl_absensi)
	{
		$query = $this->db->query("select * from tr_absensi_armada where kd_armada='$kd_armada' and id_bu=$id_bu and tgl_absensi='$tgl_absensi' and status in ('1','2')");
		$count = $query->num_rows();
		if($count>0){
			$data=$query->row();
			$ket_status;
			switch ($data->status) {
				case 1:
				$ket_status= "HTM/HTP";
				break;
				case 2:
				$ket_status= "HJ";
				break;
				case 3:
				$ket_status= "HTSK";
				break;
				default:
				$ket_status= "Not Found";
			}

			return array(
				"count" => $count,
				"status" => $ket_status,
				"kd_armada" => $kd_armada
				);
		}else{
			return array(
				"count" => $count,
				"status" => "",
				"kd_armada" => $kd_armada
				);
		}
	}

	public function get_persekot($id_bu){
		$this->db->select("a.persekot");
		$this->db->from("ref_bu a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_bu', $id_bu);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

}
