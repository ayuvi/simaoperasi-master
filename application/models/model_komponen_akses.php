<?php
class Model_komponen_akses extends CI_Model
{

	var $table = "ref_bu";
	var $select_column = array("ref_bu.id_bu", "ref_bu.kd_bu","ref_bu.nm_bu", "ref_bu.kota");
	var $order_column = array("ref_bu.id_bu", "ref_bu.kd_bu","ref_bu.nm_bu", "ref_bu.kota");
	var $column_search = array("ref_bu.id_bu", "ref_bu.kd_bu","ref_bu.nm_bu", "ref_bu.kota");
	var $default_order = "ref_bu.id_bu";

	function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);

		$i = 0;
		foreach ($this->column_search as $item){
			if($_POST['search']['value']){
				if($i===0){
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i);
			}
			$i++;
		}


		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else{
			$this->db->order_by($this->default_order, 'DESC');
		}
	}

	function make_datatables(){
		$this->make_query();
		if($_POST['length'] != -1){
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function get_filtered_data(){
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_all_data()
	{
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	public function getcabang($show=null, $start=null, $cari=null){
		$this->db->select("a.*");
		$this->db->from("ref_bu a");
		$this->db->where("(a.nm_bu LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_cabang($search = null){
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_bu) as recordsFiltered ");
		$this->db->from("ref_bu a");
		$this->db->like("a.nm_bu ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_bu) as recordsTotal ");
		$this->db->from("ref_bu a");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}


	public function getKomponenAkses ($show=null, $start=null, $cari=null, $id_bu){
		$select_column = array("a.*","b.nm_komponen","b.type_komponen");
		$this->db->select($select_column);
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b","a.id_komponen = b.id_komponen", 'left');
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("(b.nm_komponen LIKE '%".$cari."%' ) ");
		$this->db->order_by("a.active","ASC");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_KomponenAkses($search = null,$id_bu){
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_komponen_akses) as recordsFiltered ");
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b","a.id_komponen = b.id_komponen", 'left');
		$this->db->where('a.id_bu', $id_bu);
		$this->db->like("b.nm_komponen ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_komponen_akses) as recordsTotal ");
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b","a.id_komponen = b.id_komponen", 'left');
		$this->db->where('a.id_bu', $id_bu);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function update_komponen($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_komponen', $data['id_komponen']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_komponen', $data);
		return $data['id_komponen'];
	}

	public function get_komponen_by_id($id_bu)
	{
		$this->db->from("ref_bu a");
		$this->db->where('a.id_bu', $id_bu);
		return $this->db->get()->row_array();		
	}

	public function get_bu_by_id($id_bu)
	{
		if(empty($id_bu))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_bu a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_bu', $id_bu);
			return $this->db->get()->row_array();
		}
	}

	public function change_active($where, $data)
	{
		$this->db->update("ref_komponen_akses", $data, $where);
		return $this->db->affected_rows();
	}

	public function get_bu_komponen($id_bu)
	{
		$select_column = array("b.nm_komponen");
		$this->db->select($select_column);
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b","a.id_komponen = b.id_komponen", 'left');
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.active', 1);
		$query = $this->db->get();

		$data = "";
		// $color_label = "purple";
		$color_label = "purple";
		$no=0;
		foreach ($query->result() as $val) {
			$no+=1;
			$data .= '<span class="label bg-'.$color_label.'">('.$no.') '.$val->nm_komponen.'</span>&nbsp;';
		}

		return $data;
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

	public function getAllkomponen_akses($show=null, $start=null, $cari=null,$id_bu)
	{
		$this->db->select("a.*,b.type_komponen");
		$this->db->from("ref_komponen_akses a");
		$this->db->join("ref_komponen b", "a.id_komponen = b.id_komponen","left");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(a.nm_komponen  LIKE '%".$cari."%' or a.harga LIKE '%".$cari."%' ) ");
		$this->db->where("a.id_bu",$id_bu);
		$this->db->where_not_in("b.id_komponen",array(1,2,3,4,5));
		$this->db->order_by("b.type_komponen","DESC");
		$this->db->order_by("b.id_komponen","ASC");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_komponen_akses($cari = null,$id_bu)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_komponen_akses) as recordsFiltered ");
		$this->db->from("ref_komponen_akses");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(nm_komponen LIKE '%".$cari."%' or harga LIKE '%".$cari."%' ) ");
		$this->db->where("id_bu",$id_bu);
		$this->db->where_not_in("id_komponen",array(1,2,3,4,5));
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_komponen_akses) as recordsTotal ");
		$this->db->from("ref_komponen_akses");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("id_bu",$id_bu);
		$this->db->where_not_in("id_komponen",array(1,2,3,4,5));
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function update_komponen_akses($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_komponen_akses', $data['id_komponen_akses']);
		$this->db->update('ref_komponen_akses', $data);
		return $data['id_komponen_akses'];
	}

	public function get_komponen_akses_by_id($id_komponen_akses)
	{
		if(empty($id_komponen_akses))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_komponen_akses a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_komponen_akses', $id_komponen_akses);
			return $this->db->get()->row_array();
		}
	}



}
