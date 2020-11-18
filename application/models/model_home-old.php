<?php
class Model_home extends CI_Model
{
	public function UpdateUser($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('ref_user', $data);
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

	public function get_bu($id_bu=0)
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu b");
		$this->db->where('b.id_bu', $id_bu);
		$this->db->where('b.active', 1);

		return $this->db->get()->row_array();
	}

	public function combobox_segmen(){
		$this->db->from ("ref_segment a");
		$this->db->where('a.active', 1);
		return $this->db->get();
	}
	public function countdata($id_bu, $id_segment, $tgl_awal, $tgl_akhir)
	{
		$count 		= array();
		$session 	= $this->session->userdata('login');
		$start 		= new DateTime($tgl_awal);
		$end 		= new DateTime($tgl_akhir);
		$jarak 		= $start->diff($end);

		$bulan = substr($tgl_akhir, 5,2);
		$tahun = substr($tgl_akhir, 0,4);
		// $jumlah_hari = date("t",mktime(0,0,0,$bulan,1,$tahun));
		if($tgl_awal==$tgl_akhir){
			$jumlah_hari = 1;
		}else{
			$jumlah_hari = ($jarak->d)+1;
		}
		$count['hari'] = $jarak->d;



		//SGO
		$this->db->select("COUNT(status) as sgo");
		$this->db->from("tr_absensi_armada");
		$this->db->where_in('status', array(1,2));
		if($id_bu == 0 || empty($id_bu)){

		}else if($id_bu == 61){
			$this->db->where_in('id_bu', array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17));
		}else if($id_bu == 62){
			$this->db->where_in('id_bu', array(18,19,20,21,22,23,24,25,26,27,28));
		}else if($id_bu == 63){
			$this->db->where_in('id_bu', array(29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50));
		}else if($id_bu == 64){
			$this->db->where_in('id_bu', array(45,46,48,49,51,52,53,54,55,56,57,58,59));
		}else{
			$this->db->where('id_bu', $id_bu);
		}

		if($id_segment == 0 || empty($id_segment)){}else{
			$this->db->where('id_segment', $id_segment);
		}
		$this->db->where("tgl_absensi BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ");
		$jumlah_sgo = $this->db->get()->row_array()['sgo'];
		$count['sgo'] = $jumlah_sgo/$jumlah_hari;



		//HARI JALAN
		$this->db->select("COUNT(status) as hj");
		$this->db->from("tr_absensi_armada");
		$this->db->where('status', 2);
		if($id_bu == 0 || empty($id_bu)){

		}else if($id_bu == 61){
			$this->db->where_in('id_bu', array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17));
		}else if($id_bu == 62){
			$this->db->where_in('id_bu', array(18,19,20,21,22,23,24,25,26,27,28));
		}else if($id_bu == 63){
			$this->db->where_in('id_bu', array(29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50));
		}else if($id_bu == 64){
			$this->db->where_in('id_bu', array(45,46,48,49,51,52,53,54,55,56,57,58,59));
		}else{
			$this->db->where('id_bu', $id_bu);
		}

		if($id_segment == 0 || empty($id_segment)){}else{
			$this->db->where('id_segment', $id_segment);
		}
		$this->db->where("tgl_absensi BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ");
		$jumlah_hj = $this->db->get()->row_array()['hj'];
		$count['hj'] = $jumlah_hj;
		$count['so'] = $jumlah_hj/$jumlah_hari;

		if($jumlah_sgo==0){
			$count['hj_per_bus'] = 0;
		}else{
			$count['hj_per_bus'] = ($jumlah_hj/$jumlah_sgo)*$jumlah_hari;
		}



		//JUMLAH PENUMPANG
		if($id_bu == 0 || empty($id_bu)){
			$pnp_bu = "";
		}else if($id_bu == 61){
			$pnp_bu = "AND b.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
		}else if($id_bu == 62){
			$pnp_bu = "AND b.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
		}else if($id_bu == 63){
			$pnp_bu = "AND b.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
		}else if($id_bu == 64){
			$pnp_bu = "AND b.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
		}else{
			$pnp_bu = "AND b.id_bu='$id_bu'";
		}

		if($id_segment == 0 || empty($id_segment)){$pnp_segment = "";}else{
			$pnp_segment = "AND c.id_segment='$id_segment'";
		}
		$penumpang = $this->db->query("
			select SUM(pnp) pnp
			FROM
			(SELECT
			COALESCE(sum(a.jumlah),0) pnp 
			FROM
			ref_setoran_detail_pnp a
			LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
			LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
			WHERE
			b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $pnp_bu $pnp_segment
			UNION ALL
			SELECT
			COALESCE(sum(a.jum_penumpang),0) pnp 
			FROM
			ms_jadwal_borongan a
			LEFT JOIN ref_bu b ON a.id_cabang = b.id_bu
			LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
			LEFT JOIN ref_setoran_borongan d ON a.id_jadwal = d.id_jadwal
			WHERE a.status=1
			and d.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $pnp_bu $pnp_segment
			)x
			");
		$pnp = $penumpang->row_array()['pnp'];
		$count['pnp'] = $pnp;


		//PENDAPATAN
		if($id_bu == 0 || empty($id_bu)){
			$pend_bu = "";
		}else if($id_bu == 61){
			$pend_bu = "AND b.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
		}else if($id_bu == 62){
			$pend_bu = "AND b.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
		}else if($id_bu == 63){
			$pend_bu = "AND b.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
		}else if($id_bu == 64){
			$pend_bu = "AND b.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
		}else{
			$pend_bu = "AND b.id_bu='$id_bu'";
		}

		if($id_segment == 0 || empty($id_segment)){$pend_segment = "";}else{
			$pend_segment = "AND c.id_segment='$id_segment'";
		}
		$pendapatan = $this->db->query("SELECT SUM(pendapatan) as pendapatan from (
			SELECT
			sum(a.total) pendapatan 
			FROM
			ref_setoran_detail_pnp a
			LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
			LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
			WHERE
			b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $pend_bu $pend_segment
			UNION ALL
			SELECT
			sum(a.total) pendapatan 
			FROM
			ref_setoran_detail_pend a
			LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
			LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
			WHERE
			b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $pend_bu $pend_segment
			UNION ALL		
			SELECT
			COALESCE(sum(a.total_pend),0) pendapatan 
			FROM
			ref_setoran_borongan a
			LEFT JOIN ref_bu b ON a.id_bu = b.id_bu
			LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
			WHERE
			a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $pend_bu $pend_segment
			)x");
		$upp = $pendapatan->row_array()['pendapatan'];
		$count['pendapatan'] = $upp;


		//KILOMETER && KM/SEAT && LOAD FACTOR REGULER
		if($id_bu == 0 || empty($id_bu)){
			$km_bu = "";
		}else if($id_bu == 61){
			$km_bu = "AND a.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
		}else if($id_bu == 62){
			$km_bu = "AND a.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
		}else if($id_bu == 63){
			$km_bu = "AND a.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
		}else if($id_bu == 64){
			$km_bu = "AND a.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
		}else{
			$km_bu = "AND a.id_bu='$id_bu'";
		}

		if($id_segment == 0 || empty($id_segment)){$km_segment = "";}else{
			$km_segment = "AND b.id_segment='$id_segment'";
		}

		$kilometer = $this->db->query("SELECT COALESCE(SUM(km_total),0) as kilometer_total, COALESCE(SUM(ritase)) as ritase,
			COALESCE(SUM(km_total)*seat,0) as km_seat, seat as seat_armada
			from
			(SELECT
			a.id_setoran_detail AS id_set,
			a.seat,
			COALESCE ( a.km_trayek, 0 ) AS km_trayek_,
			COALESCE ( a.km_empty, 0 ) AS km_empty_,
			COALESCE ( ( SELECT COUNT(DISTINCT rit) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ), 0 ) AS ritase,
			COALESCE (
			( ( a.km_trayek ) * ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ) ) + ( a.km_empty ),
			0 
			) AS km_total
			FROM
			ref_setoran_detail a 
			LEFT JOIN ref_segment b ON a.kd_segmen = b.kd_segment 
			WHERE
			a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $km_bu $km_segment
			) x");

		$km_seat = $this->db->query("SELECT 
			COALESCE(SUM(km_total)*seat,0) as km_seat
			from
			(SELECT
			a.id_setoran_detail AS id_set,
			a.seat,
			COALESCE ( ( SELECT COUNT(DISTINCT rit) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ), 0 ) AS ritase,
			COALESCE (
			( ( a.km_trayek ) * ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ) ) + ( a.km_empty ),
			0 
			) AS km_total
			FROM
			ref_setoran_detail a 
			LEFT JOIN ref_segment b ON a.kd_segmen = b.kd_segment 
			WHERE
			a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' AND b.id_segment in ('1','4') $km_bu 
			) x");

		$load_factor = $this->db->query("SELECT
			a.id_setoran_detail AS id_set,
			a.seat,
			c.kd_trayek,
			c.harga,
			COALESCE ( ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ), 0 ) AS ritase,
			COALESCE ( ( SELECT SUM(jumlah*harga) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ), 0 ) upp_pnp
			FROM
			ref_setoran_detail a
			LEFT JOIN ref_segment b ON a.kd_segmen = b.kd_segment 
			LEFT JOIN ref_trayek c ON a.kd_trayek = c.kd_trayek AND a.id_bu = c.id_bu AND a.kd_segmen = c.kd_segment
			WHERE
			a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $km_bu $km_segment");

		$km 			= $kilometer->row_array()['kilometer_total'];
		$rit 			= $kilometer->row_array()['ritase'];
		$seat_armada 	= $kilometer->row_array()['seat_armada'];
		$km_seat 		= $km_seat->row_array()['km_seat'];




		//ALL ROMBONGAN
		//KM ROMBONGAN
		if($id_bu == 0 || empty($id_bu)){
			$km_bu_bor = "";
		}else if($id_bu == 61){
			$km_bu_bor = "AND a.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
		}else if($id_bu == 62){
			$km_bu_bor = "AND a.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
		}else if($id_bu == 63){
			$km_bu_bor = "AND a.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
		}else if($id_bu == 64){
			$km_bu_bor = "AND a.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
		}else{
			$km_bu_bor = "AND a.id_bu='$id_bu'";
		}

		if($id_segment == 0 || empty($id_segment)){$km_segment_bor = "";}else{
			$km_segment_bor = "AND c.id_segment='$id_segment'";
		}
		$kilometer_borongan = $this->db->query("
			SELECT COALESCE(SUM(target)) as ritase_borongan, COALESCE(SUM(km_total)) as km_total_borongan, COALESCE(SUM(seat_armada)/COUNT(seat_armada)) as seat_armada, COALESCE (SUM(lf)/COUNT(lf),0) AS load_factor
			FROM
			(SELECT b.target,b.km_tempuh, (b.target*b.km_tempuh) km_total, b.seat_armada, (b.seat_armada/b.seat_armada) lf
			FROM ref_setoran_borongan a 
			LEFT JOIN ms_jadwal_borongan b ON a.id_jadwal = b.id_jadwal 
			LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
			WHERE a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $km_bu_bor $km_segment_bor
			)x ");
		$km_borongan 			= $kilometer_borongan->row_array()['km_total_borongan'];
		$rit_borongan 			= $kilometer_borongan->row_array()['ritase_borongan'];
		$seat_armada_borongan 	= $kilometer_borongan->row_array()['seat_armada'];
		$km_seat_borongan 		= $km_borongan*$seat_armada_borongan;
		$lf_borongan 			= $kilometer_borongan->row_array()['load_factor'];




		//GABUNGAN REGULER DAN BORONGAN
		$km_reg_bor 			= $km+$km_borongan;
		$rit_reg_bor 			= $rit+$rit_borongan;
		$seat_armada_reg_bor 	= $seat_armada+$seat_armada_borongan;
		$km_seat_reg_bor	 	= $km_seat+$km_seat_borongan;


		$count['km'] 			= $km+$km_borongan;
		$count['rit'] 			= $rit+$rit_borongan;
		$count['seat_armada'] 	= $seat_armada+$seat_armada_borongan;
		$count['km_per_seat'] 	= $km_seat+$km_seat_borongan;

		//LOAD FACTOR
		$load_factor_lf = $kosong = 0;
		foreach($load_factor->result_array() as $row) {
			if($row['seat']==0 || $row['harga']==0 || $row['ritase']==0){
				$lf = 0;
			}else{
				$lf = $row['upp_pnp']/($row['seat']*$row['harga']*$row['ritase']);
			}
			$kosong++;
			$load_factor_lf += $lf;
		}

		if($kosong==0){
			$lf_reguler=0;
		}else{
			$lf_reguler=$load_factor_lf/$kosong;
		}
		
		$count['load_factor'] = ($lf_reguler+$lf_borongan)/2;

		if($rit_reg_bor == 0){
			$count['km_per_rit'] 	= 0;
			$count['pnp_per_rit'] 	= 0;
			$count['upp_per_rit'] 	= 0;
		}else{
			$count['pnp_per_rit'] 	= $pnp/$rit_reg_bor;
			$count['km_per_rit'] 	= $km_reg_bor/$rit_reg_bor;
			$count['upp_per_rit'] 	= $upp/$rit_reg_bor;
		}

		if($pnp == 0){
			$count['upp_per_pnp'] = 0;
		}else{
			$count['upp_per_pnp'] = $upp/$pnp;
		}

		if($km_seat_reg_bor==0){
			$count['upp_per_km_seat'] = 0;
		}else{
			$count['upp_per_km_seat'] = $upp/$km_seat_reg_bor;
		}		



		//PENGELUARAN
		if($id_bu == 0 || empty($id_bu)){
			$pengeluaran_bu = "";
		}else if($id_bu == 61){
			$pengeluaran_bu = "AND b.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
		}else if($id_bu == 62){
			$pengeluaran_bu = "AND b.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
		}else if($id_bu == 63){
			$pengeluaran_bu = "AND b.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
		}else if($id_bu == 64){
			$pengeluaran_bu = "AND b.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
		}else{
			$pengeluaran_bu = "AND b.id_bu='$id_bu'";
		}

		if($id_segment == 0 || empty($id_segment)){$pengeluaran_segment = "";}else{
			$pengeluaran_segment = "AND c.id_segment='$id_segment'";
		}
		$pengeluaran = $this->db->query("
			SELECT SUM(pengeluaran) as pengeluaran from (
			SELECT
			COALESCE(sum(a.total),0) pengeluaran 
			FROM
			ref_setoran_detail_beban a
			LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
			LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
			WHERE
			a.id_jenis NOT IN ( '23', '22', '24' ) 
			AND b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $pengeluaran_bu $pengeluaran_segment
			UNION ALL
			SELECT
			COALESCE(sum(a.total),0) pengeluaran 
			FROM
			ref_setoran_borongan_beban a
			LEFT JOIN ref_setoran_borongan b ON a.id_setoran = b.id_setoran
			LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
			WHERE
			b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' $pengeluaran_bu $pengeluaran_segment
			)x");
		$count['pengeluaran'] = $pengeluaran->row_array()['pengeluaran'];

		$count['laba'] = $count['pendapatan'] -  $count['pengeluaran'] ;

		return $count;
	}

	public function getAlldata_not_input_setoran($show=null, $start=null, $cari=null, $tanggal){
		$this->db->select("a.nm_bu");
		$this->db->from("ref_bu a");
		$this->db->join("(SELECT id_bu from ref_setoran WHERE tgl_setoran='$tanggal' GROUP BY id_bu)x", 'a.id_bu=x.id_bu', 'left');
		$this->db->where("x.id_bu is null");
		$this->db->order_by("x.id_bu","ASC");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}

	public function get_count_not_input_setoran($search = null, $tanggal)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_bu) as recordsFiltered ");
		$this->db->from("ref_bu a");
		$this->db->join("(SELECT id_bu from ref_setoran WHERE tgl_setoran='$tanggal' GROUP BY id_bu)x", 'a.id_bu=x.id_bu', 'left');
		$this->db->where("x.id_bu is null");
		$this->db->like("a.nm_bu ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_bu) as recordsTotal ");
		$this->db->from("ref_bu a");
		$this->db->join("(SELECT id_bu from ref_setoran WHERE tgl_setoran='$tanggal' GROUP BY id_bu)x", 'a.id_bu=x.id_bu', 'left');
		$this->db->where("x.id_bu is null");
		$this->db->like("a.nm_bu ", $search);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAlldata_inputan($show=null, $start=null, $cari=null, $divre, $tanggal_awal, $tanggal_akhir){

		if ($show == null && $start == null) {
			$limit = "";
		} else {
			$limit = "limit $start, $show";
		}

		if($cari == null){
			$cr = "";
		}else{
			$cr = "and a.nm_bu like '%$cari%'  ";
		}

		if($divre == 0){
			$dvr = "";
		}else{
			$dvr = "and a.id_divre = '$divre'";
		}

		$query = $this->db->query("
			SELECT 
			x.id_bu,
			a.nm_bu,
			a.id_divre,
			( SELECT COUNT( id_jadwal ) FROM ms_jadwal WHERE tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' AND id_cabang = x.id_bu ) AS jadwal,
			(SELECT COUNT(id_absensi_armada) from tr_absensi_armada WHERE tgl_absensi BETWEEN '$tanggal_awal' and '$tanggal_akhir' and id_bu=x.id_bu and status=1) as HTM,
			(SELECT COUNT(id_absensi_armada) from tr_absensi_armada WHERE tgl_absensi BETWEEN '$tanggal_awal' and '$tanggal_akhir' and id_bu=x.id_bu and status=2) as HJ,
			(SELECT COUNT(a.id_setoran_detail) FROM ref_setoran_detail a
			LEFT JOIN ms_jadwal b on a.id_jadwal=b.id_jadwal
			WHERE a.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' and a.id_bu=x.id_bu) as setor
			FROM
			ref_bu a
			LEFT JOIN (
			SELECT a.id_cabang as id_bu FROM ms_jadwal a WHERE a.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' GROUP BY id_bu
			) x ON a.id_bu = x.id_bu 
			WHERE x.id_bu is not null and a.id_bu not BETWEEN 60 and 65 and a.id_bu != 25
			$dvr $cr
			ORDER BY
			a.id_divre ASC,a.id_bu ASC $limit
			");

		return $query;
	}

	public function get_count_data_inputan($search = null, $divre, $tanggal_awal, $tanggal_akhir)
	{
		$count = array();			
		if($search == null){
			$cr = "";
		}else{
			$cr = "and a.nm_bu like '%$search%'  ";
		}

		if($divre == 0){
			$dvr = "";
		}else{
			$dvr = "and a.id_divre = '$divre'";
		}

		$query = $this->db->query("
			select IFNULL(count(x.id_bu),0) recordsFiltered
			FROM
			ref_bu a
			LEFT JOIN (
			SELECT a.id_cabang as id_bu FROM ms_jadwal a WHERE a.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' GROUP BY id_bu
			) x ON a.id_bu = x.id_bu 
			WHERE x.id_bu is not null and a.id_bu not BETWEEN 60 and 65 and a.id_bu != 25
			$dvr $cr
			ORDER BY
			a.id_divre ASC,a.id_bu ASC
			");
		$count['recordsFiltered'] = $query->row_array()['recordsFiltered'];

		$query = $this->db->query("
			select IFNULL(count(x.id_bu),0) recordsTotal
			FROM
			ref_bu a
			LEFT JOIN (
			SELECT a.id_cabang as id_bu FROM ms_jadwal a WHERE a.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' GROUP BY id_bu
			) x ON a.id_bu = x.id_bu 
			WHERE x.id_bu is not null and a.id_bu not BETWEEN 60 and 65 and a.id_bu != 25
			ORDER BY
			a.id_divre ASC,a.id_bu ASC
			");
		$count['recordsTotal'] = $query->row_array()['recordsTotal'];
		return $count;
	}




	public function getAlldata_not_inputan($show=null, $start=null, $cari=null, $divre, $tanggal_awal, $tanggal_akhir){

		if ($show == null && $start == null) {
			$limit = "";
		} else {
			$limit = "limit $start, $show";
		}

		if($cari == null){
			$cr = "";
		}else{
			$cr = "and a.nm_bu like '%$cari%'  ";
		}

		if($divre == 0){
			$dvr = "";
		}else{
			$dvr = "and a.id_divre = '$divre'";
		}

		$query = $this->db->query("
			SELECT 
			x.id_bu,
			a.nm_bu,
			a.id_divre
			FROM
			ref_bu a
			LEFT JOIN (
			SELECT a.id_cabang as id_bu FROM ms_jadwal a WHERE a.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' GROUP BY id_bu
			) x ON a.id_bu = x.id_bu 
			WHERE x.id_bu is null and a.id_bu not BETWEEN 60 and 65 and a.id_bu != 25
			$dvr $cr
			ORDER BY
			a.id_divre ASC,a.id_bu ASC $limit
			");

		return $query;
	}

	public function get_count_data_not_inputan($search = null, $divre, $tanggal_awal, $tanggal_akhir)
	{
		$count = array();			
		if($search == null){
			$cr = "";
		}else{
			$cr = "and a.nm_bu like '%$search%'  ";
		}

		if($divre == 0){
			$dvr = "";
		}else{
			$dvr = "and a.id_divre = '$divre'";
		}

		$query = $this->db->query("
			select IFNULL(count(a.nm_bu),0) recordsFiltered
			FROM
			ref_bu a
			LEFT JOIN (
			SELECT a.id_cabang as id_bu FROM ms_jadwal a WHERE a.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' GROUP BY id_bu
			) x ON a.id_bu = x.id_bu 
			WHERE x.id_bu is null and a.id_bu not BETWEEN 60 and 65 and a.id_bu != 25
			$dvr $cr
			ORDER BY
			a.id_divre ASC,a.id_bu ASC
			");
		$count['recordsFiltered'] = $query->row_array()['recordsFiltered'];

		$query = $this->db->query("
			select IFNULL(count(a.nm_bu),0) recordsTotal
			FROM
			ref_bu a
			LEFT JOIN (
			SELECT a.id_cabang as id_bu FROM ms_jadwal a WHERE a.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' GROUP BY id_bu
			) x ON a.id_bu = x.id_bu 
			WHERE x.id_bu is null and a.id_bu not BETWEEN 60 and 65 and a.id_bu != 25
			ORDER BY
			a.id_divre ASC,a.id_bu ASC
			");
		$count['recordsTotal'] = $query->row_array()['recordsTotal'];
		return $count;
	}




	public function chart_all($id_bu=null, $tgl_awal="", $tgl_akhir="")
	{
		$session = $this->session->userdata('login');

		//BUAT FOREACH TANGGAL
		$begin 		= new DateTime($tgl_awal);
		$end 		= new DateTime($tgl_akhir);
		$end->add(new DateInterval('P1D'));
		$end 		= $end->format('Y-m-d');
		$end_date 	= new DateTime($end);
		$interval 	= DateInterval::createFromDateString('1 day');
		$period 	= new DatePeriod($begin, $interval, $end_date);

		//ID TABLE PENAMPUNG
		$time 		= DATE("YMDHMS");
		$id_tampung = $time.rand(11,5);

		//JARAK HARI
		$start 		= new DateTime($tgl_awal);
		$end 		= new DateTime($tgl_akhir);
		$jarak 		= $start->diff($end);
		if($tgl_awal==$tgl_akhir){
			$jumlah_hari = 1;
		}else{
			$jumlah_hari = ($jarak->d)+1;
		}
		

		foreach ($period as $dt) {
			$tanggal_setoran = $dt->format("Y-m-d");



			//SGO
			$this->db->select("COUNT(status) as sgo");
			$this->db->from("tr_absensi_armada");
			$this->db->where_in('status', array(1,2));
			if($id_bu == 0 || empty($id_bu)){

			}else if($id_bu == 61){
				$this->db->where_in('id_bu', array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17));
			}else if($id_bu == 62){
				$this->db->where_in('id_bu', array(18,19,20,21,22,23,24,25,26,27,28));
			}else if($id_bu == 63){
				$this->db->where_in('id_bu', array(29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50));
			}else if($id_bu == 64){
				$this->db->where_in('id_bu', array(45,46,48,49,51,52,53,54,55,56,57,58,59));
			}else{
				$this->db->where('id_bu', $id_bu);
			}

			$this->db->where("tgl_absensi = '$tanggal_setoran' ");
			$jumlah_sgo = $this->db->get()->row_array()['sgo'];
			$sgo = $jumlah_sgo/$jumlah_hari;




			//HARI JALAN
			$this->db->select("COUNT(status) as hj");
			$this->db->from("tr_absensi_armada");
			$this->db->where('status', 2);
			if($id_bu == 0 || empty($id_bu)){

			}else if($id_bu == 61){
				$this->db->where_in('id_bu', array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17));
			}else if($id_bu == 62){
				$this->db->where_in('id_bu', array(18,19,20,21,22,23,24,25,26,27,28));
			}else if($id_bu == 63){
				$this->db->where_in('id_bu', array(29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50));
			}else if($id_bu == 64){
				$this->db->where_in('id_bu', array(45,46,48,49,51,52,53,54,55,56,57,58,59));
			}else{
				$this->db->where('id_bu', $id_bu);
			}

			$this->db->where("tgl_absensi = '$tanggal_setoran' ");
			$jumlah_hj = $this->db->get()->row_array()['hj'];
			$hj = $jumlah_hj;
			$so = $jumlah_hj/$jumlah_hari;




			//JUMLAH PENUMPANG
			if($id_bu == 0 || empty($id_bu)){
				$pnp_bu = "";
			}else if($id_bu == 61){
				$pnp_bu = "AND b.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
			}else if($id_bu == 62){
				$pnp_bu = "AND b.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
			}else if($id_bu == 63){
				$pnp_bu = "AND b.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
			}else if($id_bu == 64){
				$pnp_bu = "AND b.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
			}else{
				$pnp_bu = "AND b.id_bu='$id_bu'";
			}

			$penumpang = $this->db->query("
				select SUM(pnp) pnp
				FROM
				(SELECT
				COALESCE(sum(a.jumlah),0) pnp 
				FROM
				ref_setoran_detail_pnp a
				LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
				LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
				WHERE
				b.tgl_setoran = '$tanggal_setoran' $pnp_bu
				UNION ALL
				SELECT
				COALESCE(sum(a.jum_penumpang),0) pnp 
				FROM
				ms_jadwal_borongan a
				LEFT JOIN ref_bu b ON a.id_cabang = b.id_bu
				LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
				LEFT JOIN ref_setoran_borongan d ON a.id_jadwal = d.id_jadwal
				WHERE a.status=1
				and d.tgl_setoran = '$tanggal_setoran' $pnp_bu
				)x
				");
			$pnp = $penumpang->row_array()['pnp'];




		//KILOMETER REGULER
			if($id_bu == 0 || empty($id_bu)){
				$km_bu = "";
			}else if($id_bu == 61){
				$km_bu = "AND a.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
			}else if($id_bu == 62){
				$km_bu = "AND a.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
			}else if($id_bu == 63){
				$km_bu = "AND a.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
			}else if($id_bu == 64){
				$km_bu = "AND a.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
			}else{
				$km_bu = "AND a.id_bu='$id_bu'";
			}

			$kilometer = $this->db->query("SELECT COALESCE(SUM(km_total),0) as kilometer_total, COALESCE(SUM(ritase)) as ritase,
				COALESCE(SUM(km_total)*seat,0) as km_seat, seat as seat_armada
				from
				(SELECT
				a.id_setoran_detail AS id_set,
				a.seat,
				COALESCE ( a.km_trayek, 0 ) AS km_trayek_,
				COALESCE ( a.km_empty, 0 ) AS km_empty_,
				COALESCE ( ( SELECT COUNT(DISTINCT rit) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ), 0 ) AS ritase,
				COALESCE (
				( ( a.km_trayek ) * ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ) ) + ( a.km_empty ),
				0 
				) AS km_total
				FROM
				ref_setoran_detail a 
				LEFT JOIN ref_segment b ON a.kd_segmen = b.kd_segment 
				WHERE
				a.tgl_setoran = '$tanggal_setoran' $km_bu
				) x");

			$km 	= $kilometer->row_array()['kilometer_total'];
			$rit 	= $kilometer->row_array()['ritase'];


			//KM ROMBONGAN
			if($id_bu == 0 || empty($id_bu)){
				$km_bu_bor = "";
			}else if($id_bu == 61){
				$km_bu_bor = "AND a.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
			}else if($id_bu == 62){
				$km_bu_bor = "AND a.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
			}else if($id_bu == 63){
				$km_bu_bor = "AND a.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
			}else if($id_bu == 64){
				$km_bu_bor = "AND a.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
			}else{
				$km_bu_bor = "AND a.id_bu='$id_bu'";
			}

			$kilometer_borongan = $this->db->query("
				SELECT COALESCE(SUM(target)) as ritase_borongan, COALESCE(SUM(km_total)) as km_total_borongan, COALESCE(SUM(seat_armada)/COUNT(seat_armada)) as seat_armada, COALESCE (SUM(lf)/COUNT(lf),0) AS load_factor
				FROM
				(SELECT b.target,b.km_tempuh, (b.target*b.km_tempuh) km_total, b.seat_armada, (b.seat_armada/b.seat_armada) lf
				FROM ref_setoran_borongan a 
				LEFT JOIN ms_jadwal_borongan b ON a.id_jadwal = b.id_jadwal 
				LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
				WHERE a.tgl_setoran = '$tanggal_setoran' $km_bu_bor
				)x ");
			$km_borongan 			= $kilometer_borongan->row_array()['km_total_borongan'];
			$rit_borongan 			= $kilometer_borongan->row_array()['ritase_borongan'];


			//GABUNGAN REGULER DAN BORONGAN
			$km_reg_bor 			= $km+$km_borongan;
			$rit_reg_bor 			= $rit+$rit_borongan;



			//PENDAPATAN
			if($id_bu == 0 || empty($id_bu) || $id_bu == null){
				$pend_bu = "";
			}else if($id_bu == 61){
				$pend_bu = "AND b.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
			}else if($id_bu == 62){
				$pend_bu = "AND b.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
			}else if($id_bu == 63){
				$pend_bu = "AND b.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
			}else if($id_bu == 64){
				$pend_bu = "AND b.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
			}else{
				$pend_bu = "AND b.id_bu='$id_bu'";
			}
			$pendapatan = $this->db->query("
				SELECT SUM(pendapatan) as pendapatan 
				from (
				SELECT sum(a.total) pendapatan 
				FROM
				ref_setoran_detail_pnp a
				LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
				LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
				WHERE b.tgl_setoran = '$tanggal_setoran' $pend_bu
				UNION ALL
				SELECT sum(a.total) pendapatan 
				FROM
				ref_setoran_detail_pend a
				LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
				LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
				WHERE b.tgl_setoran = '$tanggal_setoran' $pend_bu
				UNION ALL		
				SELECT COALESCE(sum(a.total_pend),0) pendapatan 
				FROM
				ref_setoran_borongan a
				LEFT JOIN ref_bu b ON a.id_bu = b.id_bu
				LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
				WHERE a.tgl_setoran = '$tanggal_setoran' $pend_bu
				)x");
			$upp = $pendapatan->row_array()['pendapatan'];



			//PENGELUARAN
			if($id_bu == 0 || empty($id_bu)){
				$pengeluaran_bu = "";
			}else if($id_bu == 61){
				$pengeluaran_bu = "AND b.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
			}else if($id_bu == 62){
				$pengeluaran_bu = "AND b.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
			}else if($id_bu == 63){
				$pengeluaran_bu = "AND b.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
			}else if($id_bu == 64){
				$pengeluaran_bu = "AND b.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
			}else{
				$pengeluaran_bu = "AND b.id_bu='$id_bu'";
			}

			$pengeluaran = $this->db->query("
				SELECT SUM(pengeluaran) as pengeluaran from (
				SELECT
				COALESCE(sum(a.total),0) pengeluaran 
				FROM
				ref_setoran_detail_beban a
				LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
				LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
				WHERE
				a.id_jenis NOT IN ( '23', '22', '24' ) 
				AND b.tgl_setoran = '$tanggal_setoran' $pengeluaran_bu
				UNION ALL
				SELECT
				COALESCE(sum(a.total),0) pengeluaran 
				FROM
				ref_setoran_borongan_beban a
				LEFT JOIN ref_setoran_borongan b ON a.id_setoran = b.id_setoran
				LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
				WHERE
				b.tgl_setoran = '$tanggal_setoran' $pengeluaran_bu
				)x");
			$biaya = $pengeluaran->row_array()['pengeluaran'];




			$this->db->query("
				INSERT INTO tampung_pend (id,tanggal,pendapatan,biaya, hj, so, sgo, pnp, rit, km) VALUES ('$id_tampung','$tanggal_setoran','$upp','$biaya','$hj','$so','$sgo','$pnp','$rit_reg_bor','$km_reg_bor')
				");
		}

		$query_sql	= $this->db->query("SELECT * FROM tampung_pend where id='$id_tampung'");
		// return $sql_temp;
		return array(
			"query_sql" =>  $query_sql,
			"id_tampung" =>  $id_tampung,
			);

		
	}


	public function get_data_upp_divre($tgl_awal, $tgl_akhir)
	{
		$session = $this->session->userdata('login');

		//ID TABLE PENAMPUNG
		$time 		= DATE("YMDHMS");
		$id_tampung = $time.rand(11,5);

		$divre = $this->db->query("SELECT * FROM ref_divre where active=1");

		foreach ($divre->result() as $row) {
			$id_divre = $row->id_divre;
			$nm_divre = $row->nm_divre;

			$pendapatan = $this->db->query("SELECT SUM(pendapatan) as pendapatan from (
				SELECT
				sum(a.total) pendapatan 
				FROM
				ref_setoran_detail_pnp a
				LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
				LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
				LEFT JOIN ref_bu d ON b.id_bu = d.id_bu 
				WHERE
				b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' and d.id_divre='$id_divre'
				UNION ALL
				SELECT
				sum(a.total) pendapatan 
				FROM
				ref_setoran_detail_pend a
				LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
				LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
				LEFT JOIN ref_bu d ON b.id_bu = d.id_bu 
				WHERE
				b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' and d.id_divre='$id_divre'
				UNION ALL		
				SELECT
				COALESCE(sum(a.total_pend),0) pendapatan 
				FROM
				ref_setoran_borongan a
				LEFT JOIN ref_bu b ON a.id_bu = b.id_bu
				LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
				WHERE
				a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' and b.id_divre='$id_divre'
				)x");
			$upp = $pendapatan->row_array()['pendapatan'];

			$this->db->query("
				INSERT INTO tampung_pend_divre (id,nm_divre,pendapatan) VALUES ('$id_tampung','$nm_divre','$upp')
				");

		}

		$query_sql	= $this->db->query("SELECT * FROM tampung_pend_divre where id='$id_tampung'");
		// return $sql_temp;
		return array(
			"query_sql" =>  $query_sql,
			"id_tampung" =>  $id_tampung,
			);
	}

	public function get_data_upp_divre_bu($tgl_awal, $tgl_akhir, $id_divre)
	{
		$session = $this->session->userdata('login');

		$str = "select a.id_bu, a.nm_bu, b.nm_divre,
		COALESCE((select sum(c.pendapatan) from tr_operasional_detail c where c.id_bu = a.id_bu and  c.tgl_operasional BETWEEN '".$tgl_awal."' and '".$tgl_akhir."' ),0) as upp
		from ref_bu a
		left join ref_divre b on a.id_divre = b.id_divre where a.id_divre = '".$id_divre."' order by upp desc
		";

		$result = $this->db->query($str);


		return $result;
	}


	public function get_data_upp_all($tgl_awal, $tgl_akhir)
	{
		$session = $this->session->userdata('login');


		$pendapatan = $this->db->query("SELECT SUM(pendapatan) as pendapatan from (
			SELECT
			sum(a.total) pendapatan 
			FROM
			ref_setoran_detail_pnp a
			LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
			LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
			LEFT JOIN ref_bu d ON b.id_bu = d.id_bu 
			WHERE
			b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir'
			UNION ALL
			SELECT
			sum(a.total) pendapatan 
			FROM
			ref_setoran_detail_pend a
			LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
			LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
			LEFT JOIN ref_bu d ON b.id_bu = d.id_bu 
			WHERE
			b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir'
			UNION ALL		
			SELECT
			COALESCE(sum(a.total_pend),0) pendapatan 
			FROM
			ref_setoran_borongan a
			LEFT JOIN ref_bu b ON a.id_bu = b.id_bu
			LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
			WHERE
			a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir'
			)x");
		$upp = $pendapatan->row_array()['pendapatan'];

		return $upp;
	}

	public function get_data_divre(){
		$session = $this->session->userdata('login');
		$str = "select * from ref_divre where active=1";
		$result = $this->db->query($str);
		return $result;
	}




}
