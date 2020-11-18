<?php
class Model_rkap extends CI_Model
{


	public function getAllrkap($show=null, $start=null, $cari=null, $id_bu)
	{

		$this->db->select("a.*, b.nm_bu, c.nm_coa, d.nm_segment");
		$this->db->from("tr_rkap a");
		$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
		$this->db->join("ref_coa c", "a.id_coa = c.id_coa","left");
		$this->db->join("ref_segment d", "a.id_segment = d.id_segment","left");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("(a.id_coa  LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function getAllrkapCabang($show=null, $start=null, $cari=null, $id_segment,$id_coa)
	{

		$this->db->select("a.*, b.nm_bu, c.nm_coa, d.nm_segment");
		$this->db->from("tr_rkap a");
		$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
		$this->db->join("ref_coa c", "a.id_coa = c.id_coa","left");
		$this->db->join("ref_segment d", "a.id_segment = d.id_segment","left");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $session['id_bu']);

		if($id_segment!=0 && $id_coa==0){
			$this->db->where('a.id_segment', $id_segment);
		}elseif($id_segment==0 && $id_coa!=0){
			$this->db->where('a.id_coa', $id_coa);
		}elseif($id_segment!=0 && $id_coa!=0){
			$this->db->where('a.id_segment', $id_segment);
			$this->db->where('a.id_coa', $id_coa);
		}
		
		$this->db->where("(a.id_coa  LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_rkap($search = null, $id_bu)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_rkap) as recordsFiltered ");
		$this->db->from("tr_rkap");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $id_bu);
		$this->db->like("id_coa ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_rkap) as recordsTotal ");
		$this->db->from("tr_rkap");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $id_bu);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function get_count_rkap_cabang($search = null, $id_segment,$id_coa)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_rkap) as recordsFiltered ");
		$this->db->from("tr_rkap");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $session['id_bu']);

		if($id_segment!=0 && $id_coa==0){
			$this->db->where('id_segment', $id_segment);
		}elseif($id_segment==0 && $id_coa!=0){
			$this->db->where('id_coa', $id_coa);
		}elseif($id_segment!=0 && $id_coa!=0){
			$this->db->where('id_segment', $id_segment);
			$this->db->where('id_coa', $id_coa);
		}

		$this->db->like("id_coa ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_rkap) as recordsTotal ");
		$this->db->from("tr_rkap");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_bu', $session['id_bu']);

		if($id_segment!=0 && $id_coa==0){
			$this->db->where('id_segment', $id_segment);
		}elseif($id_segment==0 && $id_coa!=0){
			$this->db->where('id_coa', $id_coa);
		}elseif($id_segment!=0 && $id_coa!=0){
			$this->db->where('id_segment', $id_segment);
			$this->db->where('id_coa', $id_coa);
		}
		
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function insert_rkap($data)
	{

		$this->db->insert('tr_rkap', $data);
		return $this->db->insert_id();

	}

	public function delete_rkap($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_rkap', $data['id_rkap']);
		$this->db->delete('tr_rkap');
		return $data['id_rkap'];
	}

	public function update_rkap($data,$id_rkap)
	{
		$session = $this->session->userdata('login');


		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_rkap', $id_rkap);
		$this->db->update('tr_rkap', $data);
		return $id_rkap;


	}


	public function get_rkap_by_id($id_rkap)
	{
		if(empty($id_rkap))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->select("a.*, b.nm_bu");
			$this->db->from("tr_rkap a");
			$this->db->join("ref_bu b","a.id_bu = b.id_bu","LEFT");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_rkap', $id_rkap);
			return $this->db->get()->row_array();
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

	public function combobox_akun()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_coa b");
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.active', 1);

		return $this->db->get();
	}


	public function ax_get_satuan($id='')
	{
		$query = $this->db->query("SELECT * FROM ref_coa WHERE id_coa = '$id' ");
		return $kab = $query->result();
	}

	public function get_by_id_bu($id)
	{
		$this->db->from('ref_bu');
		$this->db->where('id_bu',$id);
		$this->db->where('active',1);
		$query = $this->db->get();

		return $query->row();
	}

}
