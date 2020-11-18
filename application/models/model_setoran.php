<?php
class Model_setoran extends CI_Model
{


	public function getAllsetoran($show=null, $start=null, $cari=null, $id_bu,$id_pool, $tanggal, $active)
	{

		$this->db->select("a.*,b.nm_bu,c.nm_pool");
		$this->db->from("ref_setoran a");
		$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
		$this->db->join("ref_pool c", "a.id_pool = c.id_pool","left");
		$session = $this->session->userdata('login');
            //$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_pool', $id_pool);
		$this->db->where('a.active', $active);
		$this->db->where("(a.armada  LIKE '%".$cari."%' ) ");
		if ($tanggal == '' ) {
		} else {
			$this->db->where('a.tgl_setoran', $tanggal);
		}
		$this->db->order_by("a.tgl_setoran","DESC");
		$this->db->order_by("a.id_setoran","DESC");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_setoran($search = null, $id_bu,$id_pool, $tanggal, $active)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_setoran) as recordsFiltered ");
		$this->db->from("ref_setoran");
		$this->db->where('id_bu', $id_bu);
		$this->db->where('id_pool', $id_pool);
		$this->db->where('active', $active);
		if ($tanggal == '' ) {
		} else {
			$this->db->where('tgl_setoran', $tanggal);
		}
		$this->db->like("armada ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_setoran) as recordsTotal ");
		$this->db->from("ref_setoran");
		$this->db->where('id_bu', $id_bu);
		$this->db->where('id_pool', $id_pool);
		$this->db->where('active', $active);
		if ($tanggal == '' ) {
		} else {
			$this->db->where('tgl_setoran', $tanggal);
		}
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAllsetoran_detail($show=null, $start=null, $cari=null, $id_setoran)
	{

		$this->db->select("a.*, b.id_bu");
		$this->db->from("ref_setoran_detail a");
		$this->db->join("ref_setoran b", "a.id_setoran = b.id_setoran","left");
		$session = $this->session->userdata('login');
            //$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_setoran', $id_setoran);
		$this->db->where("(a.armada  LIKE '%".$cari."%' ) ");
            //$this->db->where("a.active IN (0, 1) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_setoran_detail($search = null, $id_setoran){
		$count = array();
		$session = $this->session->userdata('login');
		$this->db->select(" COUNT(id_setoran) as recordsFiltered ");
		$this->db->from("ref_setoran_detail");
		$this->db->where('id_setoran', $id_setoran);
		$this->db->like("armada ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		$this->db->select(" COUNT(id_setoran) as recordsTotal ");
		$this->db->from("ref_setoran_detail");
		$this->db->where('id_setoran', $id_setoran);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}

	public function getAllsetoran_detail_pnp($show=null, $start=null, $cari=null, $id_setoran,$id_setoran_detail)
	{

		$this->db->select("a.*, if(a.kd_trayek=b.kd_trayek and b.kd_segmen='PEMADUMODA' or b.kd_segmen='BISKOTA' or b.kd_segmen='AGLOMERASI','','switch') keterangan");
		$this->db->from("ref_setoran_detail_pnp a");
		$this->db->join("ref_setoran_detail b", "a.id_setoran_detail = b.id_setoran_detail","left");
		$session = $this->session->userdata('login');
            //$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_setoran', $id_setoran);
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		$this->db->where("(a.armada  LIKE '%".$cari."%' ) ");
		$this->db->order_by("
			CASE
			WHEN a.rit=1 THEN 1
			WHEN a.rit=2 THEN 2
			WHEN a.rit=3 THEN 3
			WHEN a.rit=4 THEN 4
			WHEN a.rit=5 THEN 5
			WHEN a.rit=6 THEN 6
			WHEN a.rit=7 THEN 7
			WHEN a.rit=8 THEN 8
			WHEN a.rit=9 THEN 9
			WHEN a.rit=10 THEN 10
			WHEN a.rit=11 THEN 11
			WHEN a.rit=12 THEN 12
			WHEN a.rit=13 THEN 13
			WHEN a.rit=14 THEN 14
			WHEN a.rit=15 THEN 15
			WHEN a.rit=16 THEN 16
			WHEN a.rit=17 THEN 17
			WHEN a.rit=18 THEN 18
			WHEN a.rit=19 THEN 19
			WHEN a.rit=20 THEN 20
			ELSE 21
			END, a.id_setoran_pnp asc
			");
            //$this->db->where("a.active IN (0, 1) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_setoran_detail_pnp($search = null, $id_setoran,$id_setoran_detail){
		$count = array();
		$session = $this->session->userdata('login');
		$this->db->select(" COUNT(id_setoran) as recordsFiltered ");
		$this->db->from("ref_setoran_detail_pnp");
		$this->db->where('id_setoran', $id_setoran);
		$this->db->where('id_setoran_detail', $id_setoran_detail);
		$this->db->like("armada ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		$this->db->select(" COUNT(id_setoran) as recordsTotal ");
		$this->db->from("ref_setoran_detail_pnp");
		$this->db->where('id_setoran', $id_setoran);
		$this->db->where('id_setoran_detail', $id_setoran_detail);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}

	public function getAllsetoran_detail_pnp_pertelaan($show=null, $start=null, $cari=null, $id_setoran_pnp)
	{

		$this->db->select("a.*");
		$this->db->from("ref_setoran_detail_pnp_pertelaan a");
		$this->db->where('a.id_setoran_pnp', $id_setoran_pnp);
		$this->db->where("(a.kd_trayek  LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_setoran_detail_pnp_pertelaan($cari = null, $id_setoran_pnp){
		$count = array();
		$session = $this->session->userdata('login');
		$this->db->select(" COUNT(id_setoran_pnp_prt) as recordsFiltered ");
		$this->db->from("ref_setoran_detail_pnp_pertelaan");
		$this->db->where('id_setoran_pnp', $id_setoran_pnp);
		$this->db->where("(kd_trayek  LIKE '%".$cari."%' ) ");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_setoran_pnp_prt) as recordsTotal ");
		$this->db->from("ref_setoran_detail_pnp_pertelaan");
		$this->db->where('id_setoran_pnp', $id_setoran_pnp);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}

	public function getAllsetoran_detail_pend($show=null, $start=null, $cari=null, $id_setoran,$id_setoran_detail)
	{

		$this->db->select("a.*,b.nm_komponen,b.keterangan");
		$this->db->from("ref_setoran_detail_pend a");
		$this->db->join("ref_komponen b", "a.id_jenis = b.id_komponen","left");
		$session = $this->session->userdata('login');
            //$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_setoran', $id_setoran);
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		$this->db->where("(a.armada  LIKE '%".$cari."%' ) ");
            //$this->db->where("a.active IN (0, 1) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_setoran_detail_pend($search = null, $id_setoran,$id_setoran_detail){
		$count = array();
		$session = $this->session->userdata('login');
		$this->db->select(" COUNT(id_setoran) as recordsFiltered ");
		$this->db->from("ref_setoran_detail_pend");
		$this->db->where('id_setoran', $id_setoran);
		$this->db->where('id_setoran_detail', $id_setoran_detail);
		$this->db->like("armada ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		$this->db->select(" COUNT(id_setoran) as recordsTotal ");
		$this->db->from("ref_setoran_detail_pend");
		$this->db->where('id_setoran', $id_setoran);
		$this->db->where('id_setoran_detail', $id_setoran_detail);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}


	public function getAllsetoran_detail_beban($show=null, $start=null, $cari=null, $id_setoran,$id_setoran_detail)
	{
		$this->db->select("a.*,b.nm_komponen");
		$this->db->from("ref_setoran_detail_beban a");
		$this->db->join("ref_komponen b", "a.id_jenis = b.id_komponen","left");
		$session = $this->session->userdata('login');
            //$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_setoran', $id_setoran);
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		$this->db->where("(a.armada  LIKE '%".$cari."%' ) ");
            //$this->db->where("a.active IN (0, 1) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_setoran_detail_beban($search = null, $id_setoran,$id_setoran_detail){
		$count = array();
		$session = $this->session->userdata('login');
		$this->db->select(" COUNT(id_setoran) as recordsFiltered ");
		$this->db->from("ref_setoran_detail_pend");
		$this->db->where('id_setoran', $id_setoran);
		$this->db->where('id_setoran_detail', $id_setoran_detail);
		$this->db->like("armada ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		$this->db->select(" COUNT(id_setoran) as recordsTotal ");
		$this->db->from("ref_setoran_detail_pend");
		$this->db->where('id_setoran', $id_setoran);
		$this->db->where('id_setoran_detail', $id_setoran_detail);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		return $count;
	}

	public function insert_setoran($data)
	{
		$this->db->insert('ref_setoran', $data);
			//return $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	function insert_setoran_detail($data){
		$this->db->insert('ref_setoran_detail', $data);
			//return $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	function insert_setoran_detail_pnp($data){
		$this->db->insert('ref_setoran_detail_pnp', $data);
			// return $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	function insert_setoran_detail_pnp_bagasi($data){
		$this->db->insert('ref_setoran_detail_pnp_bagasi', $data);
		return $this->db->insert_id();
	}

	function insert_setoran_detail_pend($data){
		$this->db->insert('ref_setoran_detail_pend', $data);
			//return $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	function insert_setoran_detail_beban($data){
		$this->db->insert('ref_setoran_detail_beban', $data);
			//return $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}
	
	public function delete_setoran_pnp($id){
		$session = $this->session->userdata('login');
		$this->db->where('id_setoran_pnp', $id);
		$this->db->delete('ref_setoran_detail_pnp');

		$this->db->where('id_setoran_pnp', $id);
		$this->db->delete('ref_setoran_detail_pnp_bagasi');
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	public function delete_setoran_pend($id){
		$session = $this->session->userdata('login');
		$this->db->where('id_setoran_pend', $id);
		$this->db->delete('ref_setoran_detail_pend');
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	public function delete_setoran_beban($id){
		$session = $this->session->userdata('login');
		$this->db->where('id_setoran_beban', $id);
		$this->db->delete('ref_setoran_detail_beban');
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	public function delete_setoran_detail($id){
		$session = $this->session->userdata('login');
		$this->db->where('id_setoran_detail', $id);
		$this->db->delete('ref_setoran_detail');
		$this->db->where('id_setoran_detail', $id);
		$this->db->delete('ref_setoran_detail_beban');
		$this->db->where('id_setoran_detail', $id);
		$this->db->delete('ref_setoran_detail_pend');
		$this->db->where('id_setoran_detail', $id);
		$this->db->delete('ref_setoran_detail_pnp');
		$this->db->where('id_setoran_detail', $id);
		$this->db->delete('ref_setoran_detail_pnp_pertelaan');
		if($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '0';
		}
	}

	public function delete_setoran_header($id){
		$session = $this->session->userdata('login');
		$this->db->where('id_setoran', $id);
		$this->db->delete('ref_setoran');
		$this->db->where('id_setoran', $id);
		$this->db->delete('ref_setoran_detail');
		$this->db->where('id_setoran', $id);
		$this->db->delete('ref_setoran_detail_beban');
		$this->db->where('id_setoran', $id);
		$this->db->delete('ref_setoran_detail_pend');
		$this->db->where('id_setoran', $id);
		$this->db->delete('ref_setoran_detail_pnp');
		$this->db->where('id_setoran', $id);
		$this->db->delete('ref_setoran_detail_pnp_pertelaan');
		return $id;
		// if($this->db->affected_rows() > 0){
		// 	return '1';
		// }else{
		// 	return '0';
		// }
	}


	public function delete_setoran($data){
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_setoran', $data['id_setoran']);
		$this->db->update('ref_setoran', array('active' => '2'));
		return $data['id_setoran'];
	}

	public function update_setoran($data){
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_setoran', $data['id_setoran']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_setoran', $data);
		return $data['id_setoran'];
	}


	public function get_setoran_by_id($id_setoran)
	{
		if(empty($id_setoran))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->select("a.*");
			$this->db->from("ref_setoran_detail a");
			$this->db->where('a.id_setoran', $id_setoran);
			return $this->db->get()->row_array();
		}
	}



	public function combobox_bu()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu_access b");
		$this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
            //$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.id_user', $session['id_user']);
		$this->db->where('b.active', 1);
		return $this->db->get();
	}


	public function combobox_armada()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_armada b");
		$this->db->where('b.id_bu', $session['id_bu']);
		return $this->db->get();
	}

	public function combobox_armada_($id_cabang){
		$this->db->from("ref_armada a");
		if ($id_cabang!='0') {
			$this->db->where('id_bu', $id_cabang);
		}
		return $this->db->get();
	}

	function combobox_armada_jadwal($id_bu,$tanggal,$id_pool){
		$this->db->select("a.*");
		$this->db->from("tr_lmb a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_pool', $id_pool);
		// $this->db->where('a.tgl_lmb', $tanggal); 
		$this->db->where('a.active', 2);
		$this->db->where("CONCAT(a.tgl_lmb,a.kd_armada) NOT IN (SELECT CONCAT(tgl_setoran,armada) FROM ref_setoran WHERE tgl_setoran='$tanggal')");
		$this->db->group_by('a.kd_armada');


		return $this->db->get();
	}

	function listJadwal($id_bu,$armada){
		$this->db->select("a.*, concat(b.nm_point_awal,'-',b.nm_point_akhir) as nm_trayek  ");
		$this->db->from("tr_lmb a");
		$this->db->join("ref_trayek b", "a.kd_trayek = b.kd_trayek","left");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.kd_armada', $armada);
		$this->db->where('a.active', 2);
		$this->db->where("CONCAT(a.tgl_lmb,a.kd_armada,a.kd_trayek) NOT IN (SELECT CONCAT(tanggal,armada,kd_trayek) FROM ref_setoran_detail WHERE armada='$armada')");
		$this->db->where('a.tgl_lmb <=CURDATE()');
		$this->db->group_by('a.id_jadwal');
		$this->db->order_by('a.tgl_lmb','DESC');

			//$this->db->group_by(array('a.kd_trayek','a.nm_trayek'));
            //$this->db->order_by('a.kd_trayek');
		return $this->db->get();
	}


	function listTrayek($id_bu,$id_trayek,$layanan){
		// $this->db->select("a.*");
		// $this->db->from("ref_trayek a");
		// $this->db->where('a.id_bu', $id_bu);
		// return $this->db->get();

		$this->db->select("a.*");
		$this->db->from("ref_trayek_detail a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_trayek',$id_trayek);
		$this->db->where('a.layanan',$layanan);
		$this->db->order_by("
			CASE
			WHEN mata_uang='IDR' THEN 1
			WHEN mata_uang='MYR' THEN 2
			WHEN mata_uang='BND' THEN 3
			ELSE 4
			END");
		return $this->db->get();
			//$this->db->group_by(array('a.kd_trayek','a.nm_trayek'));
            //$this->db->order_by('a.kd_trayek');
	}

	function listPointTrayek($id_bu){
		$sql = "Select * FROM (SELECT nm_point_awal as point from ref_trayek where nm_point_awal <>'' and id_bu='$id_bu' GROUP BY nm_point_awal
		UNION ALL
		SELECT nm_point_akhir as point from ref_trayek where nm_point_akhir <>'' and id_bu='$id_bu' GROUP BY nm_point_akhir) x GROUP BY point ORDER BY point ASC";
		return $this->db->query($sql);
	}

	public function hargaTrayek($id_bu,$id_trayek,$kd_trayek,$layanan,$mata_uang)
	{
		if(empty($kd_trayek))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_trayek_detail a");
			$this->db->where('a.id_bu', $id_bu);
			$this->db->where('a.id_trayek', $id_trayek);
			$this->db->where('a.kd_trayek', $kd_trayek);
			$this->db->where('a.layanan', $layanan);
			$this->db->where('a.mata_uang', $mata_uang);
			$this->db->limit('1');
			return $this->db->get()->row_array();
		}
	}

	public function hargaBeban($id_komponen,$id_bu)
	{
		if(empty($id_komponen))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_komponen_akses a");
			$this->db->where('a.id_komponen', $id_komponen);
			$this->db->where('a.id_bu', $id_bu);
			$this->db->limit(1);
			return $this->db->get()->row_array();
		}
	}


	function listJenisPend($id_bu){
		$this->db->select("a.*,b.nm_komponen,b.keterangan");
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b","a.id_komponen=b.id_komponen","left");
		$this->db->where('b.type_komponen', 'PLUS');
		$this->db->where_not_in('b.id_komponen',array('1','2','3','4','5'));
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.active', 1);
			//$this->db->group_by(array('a.kd_trayek','a.nm_trayek'));
            //$this->db->order_by('a.kd_trayek');
		return $this->db->get();
	}

	function listJenisBeban($id_bu){
		$this->db->select("a.*,b.nm_komponen");
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b","a.id_komponen=b.id_komponen","left");
		$this->db->where('b.type_komponen', 'MINUS');
		$this->db->where_not_in('b.id_komponen',array('15','18'));
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.active', 1);
		$this->db->order_by("
			CASE
			WHEN b.id_komponen='23' THEN 1
			WHEN b.id_komponen='22' THEN 2
			WHEN b.id_komponen='24' THEN 3
			ELSE 4
			END
			");
		$this->db->order_by("b.id_komponen","ASC");
			//$this->db->group_by(array('a.kd_trayek','a.nm_trayek'));
		return $this->db->get();
	}

	public function get_jadwal_by_id_setoran_pnp($id=''){
		if(empty($id)){
			return array();
		}
		else
		{
			$this->db->from("ref_setoran_detail_pnp a");
			$this->db->where('a.id_setoran_pnp', $id);
			return $this->db->get()->row_array();
		}
	}
	public function get_jadwal_by_id_setoran_pend($id=''){
		if(empty($id)){
			return array();
		}
		else
		{
			$this->db->from("ref_setoran_detail_pend a");
			$this->db->where('a.id_setoran_pend', $id);
			return $this->db->get()->row_array();
		}
	}

	public function get_jadwal_by_id_setoran_beban($id=''){
		if(empty($id)){
			return array();
		}
		else
		{
			$this->db->from("ref_setoran_detail_beban a");
			$this->db->where('a.id_setoran_beban', $id);
			return $this->db->get()->row_array();
		}
	}

	public function get_data_by_id_setoran_pnp_pertelaan($id=''){
		if(empty($id)){
			return array();
		}
		else
		{
			$this->db->from("ref_setoran_detail_pnp_pertelaan a");
			$this->db->where('a.id_setoran_pnp_prt', $id);
			return $this->db->get()->row_array();
		}
	}

	public function update_setoran_detail_pnp($where, $data){
		$this->db->update('ref_setoran_detail_pnp', $data, $where);
		return $this->db->affected_rows();
	}

	function getidbu($id_bu){
		$this->db->select("a.*");
		$this->db->from("ref_bu a");
		$this->db->where('a.id_bu', $id_bu);
		return $this->db->get();
	}
	public function get_cabang($id_bu){
		$this->db->from("ref_bu a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.active', 1);
		$query = $this->db->get();

		return $query->row();
	}
	public function get_segment($kd_segment){
		$this->db->from("ref_segment a");
		$this->db->where('a.id_segment', $kd_segment);
		$this->db->where('a.active', 1);
		$query = $this->db->get();

		return $query->row();
	}
	public function get_armada($kd_armada){
		$this->db->from("ref_armada a");
		$this->db->where('a.kd_armada', $kd_armada);
		// $this->db->where('a.active', 1);
		$query = $this->db->get();

		return $query->row();
	}
	function get_trayek_row($id_trayek){
		$this->db->select("a.*");
		$this->db->from("ref_trayek a");
		$this->db->where('a.id_trayek', $id_trayek);
		$query = $this->db->get();
		return $query->row();
	}

	function get_trayek($id_bu,$id_segment){
		$this->db->select("a.*");
		$this->db->from("ref_trayek a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_segment', $id_segment);
		return $this->db->get();
	}

	function get_trayek_by_kd_trayek($kd_trayek){
		$this->db->select("a.*");
		$this->db->from("ref_trayek a");
		$this->db->where('a.kd_trayek', $kd_trayek);
		return $this->db->get()->row();
	}

	function get_setoran_detail_pnp($id_setoran_detail){
		$this->db->select("a.*,b.nm_point_awal,b.nm_point_akhir,
			CASE WHEN jenis_penjualan_pnp=1 THEN a.jumlah ELSE '' END AS damri_apps,
			CASE WHEN jenis_penjualan_pnp=2 THEN a.jumlah ELSE '' END AS ota,
			CASE WHEN jenis_penjualan_pnp=3 THEN a.jumlah ELSE '' END AS agen,
			CASE WHEN jenis_penjualan_pnp=4 THEN a.jumlah ELSE '' END AS loket,
			CASE WHEN jenis_penjualan_pnp=5 THEN a.jumlah ELSE '' END AS awak_bus");
		$this->db->from("ref_setoran_detail_pnp a");
		$this->db->join("ref_trayek b","a.kd_trayek=b.kd_trayek","left");
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		// $this->db->order_by('a.rit', "asc");
		return $this->db->get()->result();
	}

	function get_setoran_detail_beban_1($id_setoran_detail){
		// $data_array = array('Titipan Biaya Penyebrangan', 'Titipan Biaya Snack', 'Titipan Biaya Selimut');
		$data_array = array('23', '22', '24');

		$this->db->select("a.*,b.nm_komponen");
		$this->db->from("ref_setoran_detail_beban a");
		$this->db->join("ref_komponen b","a.id_jenis=b.id_komponen","left");
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		$this->db->where_in('b.id_komponen', $data_array);
		$this->db->order_by("
			CASE
			WHEN id_komponen='23' THEN 1
			WHEN id_komponen='10' THEN 2
			WHEN id_komponen='24' THEN 3
			ELSE 4
			END
			");
		return $this->db->get()->result();
	}

	function get_setoran_detail_beban_2($id_setoran_detail){
		// $data_array = array('Titipan Biaya Penyebrangan', 'Titipan Biaya Snack', 'Titipan Biaya Selimut');
		$data_array = array('23', '22', '24');

		$this->db->select("a.*,b.nm_komponen");
		$this->db->from("ref_setoran_detail_beban a");
		$this->db->join("ref_komponen b","a.id_jenis=b.id_komponen","left");
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		$this->db->where('b.type_komponen', 'MINUS');
		$this->db->where_not_in('b.id_komponen', $data_array);
		return $this->db->get()->result();
	}

	function get_setoran_detail_beban_3($id_setoran_detail){
		$data_array = array('Titipan Biaya Snack', 'Titipan Biaya Selimut');

		$this->db->select("a.*,b.nm_komponen");
		$this->db->from("ref_setoran_detail_beban a");
		$this->db->join("ref_komponen b","a.id_jenis=b.id_komponen","left");
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		$this->db->where_in('b.nm_komponen', $data_array);
		$this->db->order_by("
			CASE
			WHEN nm_komponen='Titipan Biaya Snack' THEN 1
			WHEN nm_komponen='Titipan Biaya Selimut' THEN 2
			ELSE 3
			END
			");
		return $this->db->get()->result();
	}

	public function sum_total_agen_setoran_detail_pnp($id_setoran_detail){
		$this->db->select("(sum(a.total)*0.1) as total_agen");
		$this->db->from("ref_setoran_detail_pnp a");
		$this->db->where('a.id_setoran_detail', $id_setoran_detail);
		$this->db->where_in('a.jenis_penjualan_pnp',array(2,3));
		$query = $this->db->get();

		return $query->row()->total_agen;
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

	function get_data_setoran($id_bu,$id_armada,$tanggal){
		$this->db->select("a.*,b.id_jadwal,b.tanggal,b.kd_segmen,b.kd_trayek,LOWER(c.nm_pegawai) as driver1, LOWER(d.nm_pegawai) as driver2,b.id_setoran_detail");
		$this->db->from("ref_setoran a");
		$this->db->join("ref_setoran_detail b","b.id_setoran=a.id_setoran","left");
		$this->db->join("hris.ref_pegawai c","c.id_pegawai=b.driver1","left");
		$this->db->join("hris.ref_pegawai d","d.id_pegawai=b.driver2","left");
		$this->db->where('b.tanggal', $tanggal);
		$this->db->where('a.armada', $id_armada);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	public function sum_setoran_detail_beban($id_setoran,$nm_komponen)
	{
		$sql = "SELECT SUM(a.total) total FROM ref_setoran_detail_beban a LEFT JOIN ref_komponen b ON a.id_jenis=b.id_komponen WHERE id_setoran=".$id_setoran." AND b.nm_komponen='".$nm_komponen."'";
		$data = $this->db->query($sql);
		return $data->row()->total;
	}

	function getjadwalrinci($id_jadwal){
		$this->db->select("a.armada, a.tanggal, a.kd_segmen, a.kd_trayek, a.nm_trayek, IFNULL(a.driver1,'') as driver1, IFNULL(b.nm_pegawai,'') as nm_pegawai1, IFNULL(a.driver2,'') as driver2, IFNULL(c.nm_pegawai,'') as nm_pegawai2,a.layanan,a.nm_layanan");
		$this->db->from("ms_jadwal a");
		$this->db->join("hris.ref_pegawai b", "a.driver1 = b.id_pegawai", "left");
		$this->db->join("hris.ref_pegawai c", "a.driver2 = c.id_pegawai", "left");
		$this->db->where('a.id_jadwal', $id_jadwal);
		return $this->db->get();
	}

	public function change_active($where, $data)
	{
		$this->db->update("ref_setoran", $data, $where);
		return $this->db->affected_rows();
	}

	public function sum_penumpang($id_setoran)
	{
		$sql = "SELECT SUM(jumlah) penumpang FROM ref_setoran_detail_pnp WHERE id_setoran=".$id_setoran;
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function sum_beban($id_setoran)
	{
		$sql = "SELECT SUM(total) beban FROM ref_setoran_detail_beban WHERE id_setoran=".$id_setoran;
		$data = $this->db->query($sql);
		return $data->row();
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

	public function insertSetoranLmb($id_jadwal,$id_setoran,$id_setoran_detail){
		$session = $this->session->userdata('login');
		$user = $session['id_user'];
		$sql = "CALL p_insert_setoran_lmb('$id_jadwal','$id_setoran','$id_setoran_detail','$user')";
		$this->db->query($sql);
		return true;
	}

	public function get_data_lmb ($show=null, $start=null, $cari=null, $id_jadwal){
		$this->db->select("a.tgl_lmb, a.rit, a.kd_trayek, a.kd_armada, a.pnp, a.harga,a.total");
		$this->db->from("tr_rit a");
		$this->db->join("tr_lmb b","a.id_lmb=b.id_lmb", 'left');
		$this->db->join("ref_setoran_detail c","b.id_jadwal=c.id_jadwal", 'left');
		$this->db->where('c.id_jadwal', $id_jadwal);
		$this->db->where("(a.kd_trayek LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_lmb($search = null,$id_jadwal){
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_rit) as recordsFiltered ");
		$this->db->from("tr_rit a");
		$this->db->join("tr_lmb b","a.id_lmb=b.id_lmb", 'left');
		$this->db->join("ref_setoran_detail c","b.id_jadwal=c.id_jadwal", 'left');
		$this->db->where('c.id_jadwal', $id_jadwal);
		$this->db->like("a.kd_trayek ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_rit) as recordsTotal ");
		$this->db->from("tr_rit a");
		$this->db->join("tr_lmb b","a.id_lmb=b.id_lmb", 'left');
		$this->db->join("ref_setoran_detail c","b.id_jadwal=c.id_jadwal", 'left');
		$this->db->where('c.id_jadwal', $id_jadwal);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function laporan_ak13($id_bu,$tanggal)
	{
		$sql = "
		SELECT a.id_setoran,a.tgl_setoran, a.armada, b.plat_armada, (d.nm_pegawai) as driver1, (e.nm_pegawai) as driver2,
		(SELECT count(rit) FROM ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran)rit,
		(SELECT sum(km_trayek) FROM ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran)km_trayek,
		(SELECT SUM(jumlah*harga) FROM ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran)pendapatan_pnp, 
		(SELECT SUM(jumlah*harga) FROM ref_setoran_detail_pend WHERE id_setoran=a.id_setoran and id_jenis=4)bagasi,
		((SELECT SUM(jumlah*harga) FROM ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran)+(SELECT SUM(jumlah*harga) FROM ref_setoran_detail_pend WHERE id_setoran=a.id_setoran and id_jenis=4))total_pendapatan
		from ref_setoran a 
		LEFT JOIN ref_armada b on a.armada=b.kd_armada
		LEFT JOIN ref_setoran_detail c on a.id_setoran=c.id_setoran
		LEFT JOIN hris.ref_pegawai d on c.driver1=d.id_pegawai
		LEFT JOIN hris.ref_pegawai e on c.driver2=e.id_pegawai
		WHERE a.id_bu=".$id_bu."
		and a.tgl_setoran='".$tanggal."'
		";
		$data = $this->db->query($sql);
		return $data;
	}

	public function cek_jumlah_pnp($id_setoran_pnp)
	{
		$sql = "select COALESCE(sum(jumlah),0)jumlah from ref_setoran_detail_pnp_pertelaan where id_setoran_pnp='".$id_setoran_pnp."'";
		$data = $this->db->query($sql);
		return $data->row()->jumlah;
	}

	public function cek_jumlah_total($id_setoran_pnp)
	{
		$sql = "select COALESCE(sum(total),0)total from ref_setoran_detail_pnp_pertelaan where id_setoran_pnp='".$id_setoran_pnp."'";
		$data = $this->db->query($sql);
		return $data->row()->total;
	}

	public function get_button_lmb($id_bu){
		$this->db->select("a.button_lmb");
		$this->db->from("ref_bu a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_bu', $id_bu);
		$this->db->limit(1);
		$query = $this->db->get();
		$button_lmb = $query->num_rows()>=1 ? $query->row("button_lmb") : "0";
		return $button_lmb;
	}





}
