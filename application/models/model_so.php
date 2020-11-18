<?php
class Model_so extends CI_Model
{
	public function getAllso($show=null, $start=null, $cari=null)
	{
		$this->db->select("a.*");
		$this->db->from("ref_so a");
		$session = $this->session->userdata('login');
		$this->db->where("(a.nm_relasi LIKE '%".$cari."%') ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}
	
	public function get_count_so($search = null)
	{
		$count = array();
		$session = $this->session->userdata('login');
		
		$this->db->select(" COUNT(id_so) as recordsFiltered ");
		$this->db->from("ref_so");
		$this->db->like("nm_relasi ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		
		$this->db->select(" COUNT(id_so) as recordsTotal ");
		$this->db->from("ref_so");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		
		return $count;
	}

	public function getAlldo($show=null, $start=null, $cari=null,$id_so)
	{
		$this->db->select("a.*");
		$this->db->from("ref_do a");
		$this->db->where("(a.nm_tipe_armada  LIKE '%".$cari."%' ) ");
		$this->db->where("a.id_so",$id_so);
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_do($search = null,$id_so)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_do) as recordsFiltered ");
		$this->db->from("ref_do");
		$this->db->where("id_so",$id_so);
		$this->db->like("nm_tipe_armada ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_do) as recordsTotal ");
		$this->db->from("ref_do");
		$this->db->where("id_so",$id_so);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAlldo_pilih_armada($show=null, $start=null, $cari=null)
	{
		$this->db->select("a.*");
		$this->db->from("ref_do_pilih_armada a");
		$this->db->where("(a.id_rekanan  LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_do_pilih_armada($search = null)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_do_pilih) as recordsFiltered ");
		$this->db->from("ref_do_pilih_armada");
		$this->db->like("nm_rekanan ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_do_pilih) as recordsTotal ");
		$this->db->from("ref_do_pilih_armada");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}
	
	public function insert_so($data)
	{
		$this->db->insert('ref_so', $data);
		return $this->db->insert_id();
	}

	public function delete_so($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_so', $data['id_so']);
		$this->db->delete('ref_so');
		return $data['id_so'];
	}
	
	public function update_so($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_so', $data['id_so']);
		$this->db->update('ref_so', $data);
		return $data['id_so'];
	}
	
	public function get_so_by_id($id_so)
	{
		if(empty($id_so))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_so a");
			$this->db->where('a.id_so', $id_so);
			return $this->db->get()->row_array();
		}
	}

	public function combobox_tipe_armada()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_tipe_armada b");
		$this->db->where('b.active', 1);
		return $this->db->get();
	}
	public function combobox_relasi()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_relasi b");
		$this->db->where('b.active', 1);
		return $this->db->get();
	}
	public function combobox_project()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_project b");
		$this->db->where('b.active', 1);
		return $this->db->get();
	}

	public function combobox_kota()
	{
		$this->db->from("ref_kota b");
		return $this->db->get();
	}


	public function insert_do($data)
	{
		$this->db->insert('ref_do', $data);
		return $this->db->insert_id();
	}

	public function delete_do($data)
	{
		$this->db->where('id_do', $data['id_do']);
		$this->db->delete('ref_do');
		return $data['id_do'];
	}

	public function update_do($data)
	{
		$this->db->where('id_do', $data['id_do']);
		$this->db->update('ref_do', $data);
		return $data['id_do'];
	}

	public function get_do_by_id($id_do)
	{
		if(empty($id_do))
		{
			return array();
		}
		else
		{
			$this->db->from("ref_do a");
			$this->db->where('a.id_do', $id_do);
			return $this->db->get()->row_array();
		}
	}

	public function insert_do_pilih_armada($data)
	{
		$this->db->insert('ref_do_pilih_armada', $data);
		return $this->db->insert_id();
	}

	public function delete_do_pilih_armada($data)
	{
		$this->db->where('id_do_pilih', $data['id_do_pilih']);
		$this->db->delete('ref_do_pilih_armada');
		return $data['id_do_pilih'];
	}

	public function combobox_project_($id_relasi){
		$this->db->from("ref_project a");
		if ($id_relasi!='0') {
			$this->db->where('id_relasi', $id_relasi);
		}
		return $this->db->get();
	}

	public function combobox_rate($id_relasi,$id_project){
		$this->db->from("ref_rate a");
		if ($id_relasi!='0') {
			$this->db->where('id_relasi', $id_relasi);
		}
		if ($id_relasi!='0') {
			$this->db->where('id_project', $id_project);
		}
		return $this->db->get();
	}

	public function combobox_rekanan(){
		$this->db->from("ref_rekanan a");
		$this->db->where("a.active IN (0, 1) ");
		return $this->db->get();
	}

	public function combobox_armada($id_relasi,$id_project,$id_asal,$id_tujuan){
		$this->db->from("ref_rate a");
		$this->db->where('id_relasi', $id_relasi);
		$this->db->where('id_project', $id_project);
		$this->db->where('id_asal', $id_asal);
		$this->db->where('id_tujuan', $id_tujuan);
		return $this->db->get();
	}

	public function combobox_armada_damri($id_bu){
		$this->db->from("ref_armada a");
		$this->db->where('id_bu', $id_bu);
		$this->db->where_in('active', array('0','1'));
		return $this->db->get();
	}

	public function combobox_harga_rate($id_relasi,$id_project,$id_asal,$id_tujuan,$tipe_armada){
		$this->db->from("ref_rate a");
		$this->db->where('id_relasi', $id_relasi);
		$this->db->where('id_project', $id_project);
		$this->db->where('id_asal', $id_asal);
		$this->db->where('id_tujuan', $id_tujuan);
		$this->db->where('tipe_armada', $tipe_armada);
		return $this->db->get()->row_array();
	}

	public function combobox_bu()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu_access b");
		$this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.id_user', $session['id_user']);
		$this->db->where('b.active', 1);
		$this->db->where('b.id_bu', 17);

		return $this->db->get();
	}

}
