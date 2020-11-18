<?php
class Model_report extends CI_Model
{
	public function UpdateUser($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('ref_user', $data);
	}
	
	public function getAlldata_grafik_segmentasi($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.antarkota) as antarkota, sum(x.perintis) as perintis, sum(x.pemadumoda) as pemadumoda, sum(x.aneg) as aneg, sum(x.biskota) as biskota, sum(x.paket) as paket, sum(x.pariwisata) as pariwisata, sum(x.aglomerasi) as aglomerasi");
		$this->db->from("(
			select id_bu, id_segment, count(id_segment) as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '1' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, count(id_segment) as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '2' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, count(id_segment) as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '3' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, count(id_segment) as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '4' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, count(id_segment) as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '5' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, count(id_segment) as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '6' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, count(id_segment) as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '7' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, count(id_segment) as aglomerasi from ref_armada where active = 0 and id_segment = '8' group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->where("(y.nm_bu LIKE '%".$cari."%')");
		$this->db->group_by("x.id_bu");
		$this->db->order_by("y.nm_bu");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}
	
	public function get_count_data_grafik_segmentasi($search = null, $divisi){
		if($divisi == 0 || $divisi == 5){
			$divre = '';
		} else {
			$divre = "where y.id_divre = '$divisi'";
		}
		$count = array();
		$session = $this->session->userdata('login');
		
		$this->db->select("count(cabang) as recordsFiltered");
		$this->db->from("(
			select y.nm_bu as CABANG, sum(x.ANTARKOTA) as ANTARKOTA, sum(x.PERINTIS) as PERINTIS, sum(x.PEMADUMODA) as PEMADUMODA, sum(x.ANEG) as ANEG, sum(x.BISKOTA) as BISKOTA, sum(x.PAKET) as PAKET, sum(x.PARIWISATA) as PARIWISATA, sum(x.AGLOMERASI) as AGLOMERASI from (
				select id_bu, id_segment, count(id_segment) as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '1' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, count(id_segment) as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '2' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, count(id_segment) as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '3' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, count(id_segment) as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '4' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, count(id_segment) as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '5' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, count(id_segment) as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '6' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, count(id_segment) as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '7' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, count(id_segment) as AGLOMERASI from ref_armada where active = 0 and id_segment = '8' group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		
		$this->db->select("count(cabang) as recordsTotal ");
		$this->db->from("(
			select y.nm_bu as CABANG, sum(x.ANTARKOTA) as ANTARKOTA, sum(x.PERINTIS) as PERINTIS, sum(x.PEMADUMODA) as PEMADUMODA, sum(x.ANEG) as ANEG, sum(x.BISKOTA) as BISKOTA, sum(x.PAKET) as PAKET, sum(x.PARIWISATA) as PARIWISATA, sum(x.AGLOMERASI) as AGLOMERASI from (
				select id_bu, id_segment, count(id_segment) as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '1' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, count(id_segment) as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '2' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, count(id_segment) as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '3' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, count(id_segment) as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '4' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, count(id_segment) as BISKOTA, '' as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '5' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, count(id_segment) as PAKET, '' as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '6' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, count(id_segment) as PARIWISATA, '' as AGLOMERASI from ref_armada where active = 0 and id_segment = '7' group by id_bu
				union all
				select id_bu, id_segment, '' as ANTARKOTA, '' as PERINTIS, '' as PEMADUMODA, '' as ANEG, '' as BISKOTA, '' as PAKET, '' as PARIWISATA, count(id_segment) as AGLOMERASI from ref_armada where active = 0 and id_segment = '8' group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		
		return $count;
	}

	public function get_data_grafik_segmentasi($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.antarkota) as antarkota, sum(x.perintis) as perintis, sum(x.pemadumoda) as pemadumoda, sum(x.aneg) as aneg, sum(x.biskota) as biskota, sum(x.paket) as paket, sum(x.pariwisata) as pariwisata, sum(x.aglomerasi) as aglomerasi");
		$this->db->from("(
			select id_bu, id_segment, count(id_segment) as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '1' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, count(id_segment) as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '2' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, count(id_segment) as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '3' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, count(id_segment) as aneg, '' as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '4' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, count(id_segment) as biskota, '' as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '5' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, count(id_segment) as paket, '' as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '6' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, count(id_segment) as pariwisata, '' as aglomerasi from ref_armada where active = 0 and id_segment = '7' group by id_bu
			union all
			select id_bu, id_segment, '' as antarkota, '' as perintis, '' as pemadumoda, '' as aneg, '' as biskota, '' as paket, '' as pariwisata, count(id_segment) as aglomerasi from ref_armada where active = 0 and id_segment = '8' group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->order_by("y.nm_bu");
		return $this->db->get();
	}

	public function getAlldata_grafik_jenis($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.busbesar) as busbesar, sum(x.busgandeng) as busgandeng, sum(x.busmedium) as busmedium, sum(x.microbus) as microbus, sum(x.boxmini) as boxmini, sum(x.boxmedium) as boxmedium, sum(x.boxbesar) as boxbesar");
		$this->db->from("(
			select id_bu, id_ukuran, nm_ukuran, count(id_ukuran) as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '1' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran,'' as busbesar,  count(id_ukuran) as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '2' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng,  count(id_ukuran) as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '3' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium,  count(id_ukuran) as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '4' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus,  count(id_ukuran) as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '5' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini,  count(id_ukuran) as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '11' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium,  count(id_ukuran) as boxbesar from ref_armada where active = 0 and id_ukuran = '12' group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->where("(y.nm_bu LIKE '%".$cari."%')");
		$this->db->group_by("x.id_bu");
		$this->db->order_by("y.nm_bu");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}
	
	public function get_count_data_grafik_jenis($search = null, $divisi){
		if($divisi == 0 || $divisi == 5){
			$divre = '';
		} else {
			$divre = "where y.id_divre = '$divisi'";
		}
		$count = array();
		$session = $this->session->userdata('login');
		
		$this->db->select("count(cabang) as recordsFiltered");
		$this->db->from("(
			select y.nm_bu as cabang, sum(x.busbesar) as busbesar, sum(x.busgandeng) as busgandeng, sum(x.busmedium) as busmedium, sum(x.microbus) as microbus, sum(x.boxmini) as boxmini, sum(x.boxmedium) as boxmedium, sum(x.boxbesar) as boxbesar from (
				select id_bu, id_ukuran, nm_ukuran, count(id_ukuran) as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '1' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran,'' as busbesar,  count(id_ukuran) as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '2' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng,  count(id_ukuran) as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '3' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium,  count(id_ukuran) as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '4' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus,  count(id_ukuran) as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '5' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini,  count(id_ukuran) as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '11' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium,  count(id_ukuran) as boxbesar from ref_armada where active = 0 and id_ukuran = '12' group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		
		$this->db->select("count(cabang) as recordsTotal ");
		$this->db->from("(
			select y.nm_bu as cabang, sum(x.busbesar) as busbesar, sum(x.busgandeng) as busgandeng, sum(x.busmedium) as busmedium, sum(x.microbus) as microbus, sum(x.boxmini) as boxmini, sum(x.boxmedium) as boxmedium, sum(x.boxbesar) as boxbesar from (
				select id_bu, id_ukuran, nm_ukuran, count(id_ukuran) as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '1' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran,'' as busbesar,  count(id_ukuran) as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '2' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng,  count(id_ukuran) as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '3' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium,  count(id_ukuran) as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '4' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus,  count(id_ukuran) as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '5' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini,  count(id_ukuran) as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '11' group by id_bu
				union all
				select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium,  count(id_ukuran) as boxbesar from ref_armada where active = 0 and id_ukuran = '12' group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		
		return $count;
	}

	public function get_data_grafik_jenis($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.busbesar) as busbesar, sum(x.busgandeng) as busgandeng, sum(x.busmedium) as busmedium, sum(x.microbus) as microbus, sum(x.boxmini) as boxmini, sum(x.boxmedium) as boxmedium, sum(x.boxbesar) as boxbesar");
		$this->db->from("(
			select id_bu, id_ukuran, nm_ukuran, count(id_ukuran) as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '1' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran,'' as busbesar,  count(id_ukuran) as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '2' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng,  count(id_ukuran) as busmedium, '' as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '3' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium,  count(id_ukuran) as microbus, '' as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '4' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus,  count(id_ukuran) as boxmini, '' as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '5' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini,  count(id_ukuran) as boxmedium, '' as boxbesar from ref_armada where active = 0 and id_ukuran = '11' group by id_bu
			union all
			select id_bu, id_ukuran, nm_ukuran, '' as busbesar, '' as busgandeng, '' as busmedium, '' as microbus, '' as boxmini, '' as boxmedium,  count(id_ukuran) as boxbesar from ref_armada where active = 0 and id_ukuran = '12' group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->order_by("y.nm_bu");
		return $this->db->get();
	}

	public function getAlldata_grafik_merek($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.beijing) as beijing, sum(x.daihatsu) as daihatsu, sum(x.gdragon) as gdragon, sum(x.hino) as hino, sum(x.hyundai) as hyundai, sum(x.inobus) as inobus, sum(x.isuzu) as isuzu, sum(x.kinglong) as kinglong, sum(x.mercy) as mercy, sum(x.mitsubishi) as mitsubishi, sum(x.nissan) as nissan, sum(x.toyota) as toyota, sum(x.yutoong) as yutoong, sum(x.zhongtong) as zhongtong");
		$this->db->from("(
			select id_bu, id_merek, nm_merek, count(id_merek) as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '1' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, count(id_merek) as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '2' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, count(id_merek) as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '3' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, count(id_merek) as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '4' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, count(id_merek) as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '5' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, count(id_merek) as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '6' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, count(id_merek) as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '7' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, count(id_merek) as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '8' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, count(id_merek) as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '9' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, count(id_merek) as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '10' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, count(id_merek) as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '11' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, count(id_merek) as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '12' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, count(id_merek) as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '13' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, count(id_merek) as zhongtong from ref_armada where active = 0 and id_merek = '14' group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->where("(y.nm_bu LIKE '%".$cari."%')");
		$this->db->group_by("x.id_bu");
		$this->db->order_by("y.nm_bu");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}
	
	public function get_count_data_grafik_merek($search = null, $divisi){
		if($divisi == 0 || $divisi == 5){
			$divre = '';
		} else {
			$divre = "where y.id_divre = '$divisi'";
		}
		$count = array();
		$session = $this->session->userdata('login');
		
		$this->db->select("count(cabang) as recordsFiltered");
		$this->db->from("(
			select y.nm_bu as cabang, sum(x.beijing) as beijing, sum(x.daihatsu) as daihatsu, sum(x.gdragon) as gdragon, sum(x.hino) as hino, sum(x.hyundai) as hyundai, sum(x.inobus) as inobus, sum(x.isuzu) as isuzu, sum(x.kinglong) as kinglong, sum(x.mercy) as mercy, sum(x.mitsubishi) as mitsubishi, sum(x.nissan) as nissan, sum(x.toyota) as toyota, sum(x.yutoong) as yutoong, sum(x.zhongtong) as zhongtong from (
				select id_bu, id_merek, nm_merek, count(id_merek) as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '1' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, count(id_merek) as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '2' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, count(id_merek) as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '3' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, count(id_merek) as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '4' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, count(id_merek) as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '5' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, count(id_merek) as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '6' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, count(id_merek) as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '7' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, count(id_merek) as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '8' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, count(id_merek) as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '9' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, count(id_merek) as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '10' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, count(id_merek) as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '11' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, count(id_merek) as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '12' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, count(id_merek) as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '13' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, count(id_merek) as zhongtong from ref_armada where active = 0 and id_merek = '14' group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		
		$this->db->select("count(cabang) as recordsTotal ");
		$this->db->from("(
			select y.nm_bu as cabang, sum(x.beijing) as beijing, sum(x.daihatsu) as daihatsu, sum(x.gdragon) as gdragon, sum(x.hino) as hino, sum(x.hyundai) as hyundai, sum(x.inobus) as inobus, sum(x.isuzu) as isuzu, sum(x.kinglong) as kinglong, sum(x.mercy) as mercy, sum(x.mitsubishi) as mitsubishi, sum(x.nissan) as nissan, sum(x.toyota) as toyota, sum(x.yutoong) as yutoong, sum(x.zhongtong) as zhongtong from (
				select id_bu, id_merek, nm_merek, count(id_merek) as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '1' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, count(id_merek) as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '2' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, count(id_merek) as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '3' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, count(id_merek) as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '4' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, count(id_merek) as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '5' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, count(id_merek) as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '6' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, count(id_merek) as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '7' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, count(id_merek) as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '8' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, count(id_merek) as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '9' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, count(id_merek) as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '10' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, count(id_merek) as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '11' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, count(id_merek) as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '12' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, count(id_merek) as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '13' group by id_bu
				union all
				select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, count(id_merek) as zhongtong from ref_armada where active = 0 and id_merek = '14' group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		
		return $count;
	}

	public function get_data_grafik_merek($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.beijing) as beijing, sum(x.daihatsu) as daihatsu, sum(x.gdragon) as gdragon, sum(x.hino) as hino, sum(x.hyundai) as hyundai, sum(x.inobus) as inobus, sum(x.isuzu) as isuzu, sum(x.kinglong) as kinglong, sum(x.mercy) as mercy, sum(x.mitsubishi) as mitsubishi, sum(x.nissan) as nissan, sum(x.toyota) as toyota, sum(x.yutoong) as yutoong, sum(x.zhongtong) as zhongtong");
		$this->db->from("(
			select id_bu, id_merek, nm_merek, count(id_merek) as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '1' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, count(id_merek) as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '2' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, count(id_merek) as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '3' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, count(id_merek) as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '4' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, count(id_merek) as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '5' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, count(id_merek) as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '6' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, count(id_merek) as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '7' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, count(id_merek) as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '8' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, count(id_merek) as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '9' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, count(id_merek) as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '10' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, count(id_merek) as nissan, '' as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '11' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, count(id_merek) as toyota, '' as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '12' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, count(id_merek) as yutoong, '' as zhongtong from ref_armada where active = 0 and id_merek = '13' group by id_bu
			union all
			select id_bu, id_merek, nm_merek, '' as beijing, '' as daihatsu, '' as gdragon, '' as hino, '' as hyundai, '' as inobus, '' as isuzu, '' as kinglong, '' as mercy, '' as mitsubishi, '' as nissan, '' as toyota, '' as yutoong, count(id_merek) as zhongtong from ref_armada where active = 0 and id_merek = '14' group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->order_by("y.nm_bu");
		return $this->db->get();
	}

	public function getAlldata_grafik_usia($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.satu) as satu, sum(x.dua) as dua, sum(x.tiga) as tiga, sum(x.empat) as empat, sum(x.lima) as lima");
		$this->db->from("(
			select id_bu, count(kd_armada) as satu, '' as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) < 6 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, count(kd_armada) as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 5 and (year(current_date())-tahun_armada) < 11 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, '' as dua, count(kd_armada) as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 10 and (year(current_date())-tahun_armada) < 16 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, '' as dua, '' as tiga, count(kd_armada) as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 15 and (year(current_date())-tahun_armada) < 21 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, '' as dua, '' as tiga, '' as empat, count(kd_armada) as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 20 and active = 0 group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->where("(y.nm_bu LIKE '%".$cari."%')");
		$this->db->group_by("x.id_bu");
		$this->db->order_by("y.nm_bu");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}
		return $this->db->get();
	}
	
	public function get_count_data_grafik_usia($search = null, $divisi){
		if($divisi == 0 || $divisi == 5){
			$divre = '';
		} else {
			$divre = "where y.id_divre = '$divisi'";
		}
		$count = array();
		$session = $this->session->userdata('login');
		
		$this->db->select("count(cabang) as recordsFiltered");
		$this->db->from("(
			select y.nm_bu as cabang, sum(x.satu) as satu, sum(x.dua) as dua, sum(x.tiga) as tiga, sum(x.empat) as empat, sum(x.lima) as lima from (
				select id_bu, count(kd_armada) as satu, '' as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) < 6 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, count(kd_armada) as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 5 and (year(current_date())-tahun_armada) < 11 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, '' as dua, count(kd_armada) as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 10 and (year(current_date())-tahun_armada) < 16 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, '' as dua, '' as tiga, count(kd_armada) as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 15 and (year(current_date())-tahun_armada) < 21 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, '' as dua, '' as tiga, '' as empat, count(kd_armada) as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 20 and active = 0 group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		
		$this->db->select("count(cabang) as recordsTotal ");
		$this->db->from("(
			select y.nm_bu as cabang, sum(x.satu) as satu, sum(x.dua) as dua, sum(x.tiga) as tiga, sum(x.empat) as empat, sum(x.lima) as lima from (
				select id_bu, count(kd_armada) as satu, '' as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) < 6 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, count(kd_armada) as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 5 and (year(current_date())-tahun_armada) < 11 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, '' as dua, count(kd_armada) as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 10 and (year(current_date())-tahun_armada) < 16 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, '' as dua, '' as tiga, count(kd_armada) as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 15 and (year(current_date())-tahun_armada) < 21 and active = 0 group by id_bu
				union all
				select id_bu, '' as satu, '' as dua, '' as tiga, '' as empat, count(kd_armada) as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 20 and active = 0 group by id_bu
			) x
			left join ref_bu y on x.id_bu = y.id_bu
			$divre
			group by x.id_bu
			order by y.nm_bu
		) a");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		
		return $count;
	}

	public function get_data_grafik_usia($show=null, $start=null, $cari=null, $divisi){
		$this->db->select("y.nm_bu as cabang, sum(x.satu) as satu, sum(x.dua) as dua, sum(x.tiga) as tiga, sum(x.empat) as empat, sum(x.lima) as lima");
		$this->db->from("(
			select id_bu, count(kd_armada) as satu, '' as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) < 6 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, count(kd_armada) as dua, '' as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 5 and (year(current_date())-tahun_armada) < 11 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, '' as dua, count(kd_armada) as tiga, '' as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 10 and (year(current_date())-tahun_armada) < 16 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, '' as dua, '' as tiga, count(kd_armada) as empat, '' as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 15 and (year(current_date())-tahun_armada) < 21 and active = 0 group by id_bu
			union all
			select id_bu, '' as satu, '' as dua, '' as tiga, '' as empat, count(kd_armada) as lima from ref_armada where tahun_armada < year(current_date()) and (year(current_date())-tahun_armada) > 20 and active = 0 group by id_bu
		) x");
		$this->db->join("ref_bu y", 'x.id_bu = y.id_bu', 'left');
		if($divisi == 0 || $divisi == 5){
		}else {
			$this->db->where("y.id_divre = $divisi");
		}
		$this->db->order_by("y.nm_bu");
		return $this->db->get();
	}

	public function countdata()
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_check) as ccheckin ");
		$this->db->from("tr_check");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $session['id_bu']);
		$this->db->where("status = '1' ");

		$count['ccheckin'] = $this->db->get()->row_array()['ccheckin'];

		$this->db->select(" COUNT(id_rd) as cwloading ");
		$this->db->from("tr_rd");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $session['id_bu']);
		$this->db->where("active = '2' and id_card = '0' ");
		$count['cwloading'] = $this->db->get()->row_array()['cwloading'];

		$this->db->select(" COUNT(id_rd) as cloading ");
		$this->db->from("tr_rd");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $session['id_bu']);
		$this->db->where("active = '2' and id_card != 0 ");
		$count['cloading'] = $this->db->get()->row_array()['cloading'];

		$this->db->select(" COUNT(id_rd) as cdelivery ");
		$this->db->from("tr_rd");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $session['id_bu']);
		$this->db->where("active > '2' and active < '5' ");
		$count['cdelivery'] = $this->db->get()->row_array()['cdelivery'];

		$count['recordsTotal'] = $count['ccheckin'] ; 
		$count['recordsFiltered'] = $count['ccheckin'] ;

		return $count;
	}

	public function getdata()
	{
		$this->db->select("b.nm_type_vehicle, count(a.id_check) as jml");
		$this->db->from("tr_check a");
		$this->db->join("ref_vehicle c", 'a.id_card = c.plat_vehicle', 'left');
		$this->db->join("ref_type_vehicle b", 'c.id_type_vehicle = b.id_type_vehicle', 'left');


		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $session['id_bu']);

		$this->db->where("a.status = 1 group by c.id_type_vehicle order by b.nm_type_vehicle ");


		return $this->db->get();
	}

	public function jumResponden(){
		$sql = "SELECT COUNT(id_responden) as jumlah FROM tr_responden";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function reportSetiapPertanyaan($id_cek){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND id_cek = '".$id_cek."'
		GROUP BY b.skors) a";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function getPertanyaan($kode){
		$sql = "SELECT nm_cek FROM ref_cek where id_cek = '".$kode."'";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportUmur($umur1,$umur2){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND (YEAR(CURDATE())-YEAR(a.tgl_lahir)) BETWEEN '".$umur1."' AND '".$umur2."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportUmur2($umur1,$umur2){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND (YEAR(CURDATE())-YEAR(a.tgl_lahir)) BETWEEN '".$umur1."' AND '".$umur2."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportLamaBekerja($tahun1,$tahun2){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND (YEAR(CURDATE())-YEAR(a.tgl_masuk)) BETWEEN '".$tahun1."' AND '".$tahun2."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportLamaBekerja2($tahun1,$tahun2){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND (YEAR(CURDATE())-YEAR(a.tgl_masuk)) BETWEEN '".$tahun1."' AND '".$tahun2."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportStatus($status_pegawai){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.status_pegawai = '".$status_pegawai."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportStatus2($status_pegawai){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.status_pegawai = '".$status_pegawai."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportJenisKelamin($jenis_kelamin){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.jenis_kelamin = '".$jenis_kelamin."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportJenisKelamin2($jenis_kelamin){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.jenis_kelamin = '".$jenis_kelamin."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportPendidikan($id_pendidikan){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_pendidikan = '".$id_pendidikan."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportPendidikan2($id_pendidikan){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_pendidikan = '".$id_pendidikan."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function getPendidikan($kode){
		$sql = "SELECT nm_pendidikan FROM ref_pendidikan where id_pendidikan = '".$kode."'";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportPosisi($id_posisi){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_posisi = '".$id_posisi."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportPosisi2($id_posisi){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_posisi = '".$id_posisi."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function getPosisi($kode){
		$sql = "SELECT nm_posisi FROM ref_posisi where id_posisi = '".$kode."'";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportLokasi($id_bu){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_bu = '".$id_bu."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportLokasi2($id_bu){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_bu = '".$id_bu."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function getBu($kode){
		$sql = "SELECT nm_bu FROM ref_bu where id_bu = '".$kode."'";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportGolongan($id_golongan){
		$sql = "SELECT SUM(CASE WHEN skors IN ('1','2','3') THEN jumlah_skor ELSE 0 END )AS satutiga,
		SUM(CASE WHEN skors IN ('4','5') THEN jumlah_skor ELSE 0 END) AS empatlima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_golongan = '".$id_golongan."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function reportGolongan2($id_golongan){
		$sql = "SELECT SUM(CASE WHEN skors = '1' THEN jumlah_skor ELSE 0 END )AS satu,
		SUM(CASE WHEN skors = '2' THEN jumlah_skor ELSE 0 END) AS dua,
		SUM(CASE WHEN skors = '3' THEN jumlah_skor ELSE 0 END) AS tiga,
		SUM(CASE WHEN skors = '4' THEN jumlah_skor ELSE 0 END) AS empat,
		SUM(CASE WHEN skors = '5' THEN jumlah_skor ELSE 0 END) AS lima 
		FROM(
		SELECT b.skors, COUNT(b.skors) jumlah_skor FROM tr_responden a
		JOIN tr_survei_responden b ON a.id_session = b.id_session
		WHERE a.status = 1 AND a.id_golongan = '".$id_golongan."'
		GROUP BY b.skors) a;";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function getGolongan($kode){
		$sql = "SELECT nm_golongan FROM ref_golongan where id_golongan = '".$kode."'";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function get_data_responden($show=null, $start=null, $cari=null, $id_bu="60")
	{
		$session = $this->session->userdata('login');
		$str = "select a.*, b.nm_bu, c.nm_posisi from tr_responden a join ref_bu b on a.id_bu = b.id_bu join ref_posisi c on a.id_posisi = c.id_posisi where status = '1' and ((a.nm_responden  LIKE '%".$cari."%') or (b.nm_bu  LIKE '%".$cari."%'))  order by a.nm_responden ";
		$result = $this->db->query($str);
		$return['data'] = $result->result();
		$return['recordsTotal'] = $result->num_rows();
		return $return;
	}
	
	function get_data_chart_segment(){
		$query = $this->db->query("select nm_segment name,count(id_segment) y from ref_armada GROUP BY id_segment ");
		return $all = $query->result();
	}
	
	function get_data_chart_armada(){
		$query = $this->db->query("select nm_ukuran name, count(id_armada) y from ref_armada where nm_ukuran is not null group by nm_ukuran ");
		return $all = $query->result();
	}
	
	function get_data_chart_merk(){
		$query = $this->db->query("select nm_merek name, count(id_armada) y from ref_armada where nm_merek is not null group by nm_merek ");
		return $all = $query->result();
	}
	
	function get_data_chart_usia(){
		$query = $this->db->query("select (year(now()) - tahun_armada) name, count(id_armada) y from ref_armada where tahun_armada is not null and tahun_armada <= year(now()) group by tahun_armada ");
		return $all = $query->result();
	}

	// start combobox
	public function combobox_segment()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_segment b");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.active', 1);
		return $this->db->get();
	}

	public function combobox_komponen_ak1()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_komponen b");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.type_komponen', 'PLUS');
		$this->db->where('b.active', 1);
		return $this->db->get();
	}

	public function combobox_komponen_ak2()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_komponen b");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.type_komponen', 'MINUS');
		$this->db->where('b.active', 1);
		return $this->db->get();
	}
	// end combobox

}
