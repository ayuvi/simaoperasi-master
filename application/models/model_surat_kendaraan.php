<?php
class Model_surat_kendaraan extends CI_Model
{
	public function getAllsurat_kendaraan($show=null, $start=null, $cari=null)
	{
		$this->db->select("a.*");
		$this->db->from("ref_surat_kendaraan a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(a.nm_surat_kendaraan  LIKE '%".$cari."%' ) ");
		$this->db->where("a.active IN (0, 1) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_surat_kendaraan($search = null)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_surat_kendaraan) as recordsFiltered ");
		$this->db->from("ref_surat_kendaraan");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("active != '2' ");
		$this->db->like("nm_surat_kendaraan ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_surat_kendaraan) as recordsTotal ");
		$this->db->from("ref_surat_kendaraan");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("active != '2' ");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function insert_surat_kendaraan($data)
	{
		$this->db->insert('ref_surat_kendaraan', $data);
		return $this->db->insert_id();
	}

	public function delete_surat_kendaraan($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_surat_kendaraan', $data['id_surat_kendaraan']);
		$this->db->update('ref_surat_kendaraan', array('active' => '2'));
		return $data['id_surat_kendaraan'];
	}

	public function update_surat_kendaraan($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_surat_kendaraan', $data['id_surat_kendaraan']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_surat_kendaraan', $data);
		return $data['id_surat_kendaraan'];
	}

	public function get_surat_kendaraan_by_id($id_surat_kendaraan)
	{
		if(empty($id_surat_kendaraan))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_surat_kendaraan a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_surat_kendaraan', $id_surat_kendaraan);
			$this->db->where("a.active != '2' ");
			return $this->db->get()->row_array();
		}
	}

	public function combobox_bu()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu_access b");
		$this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
		$this->db->where('b.id_user', $session['id_user']);
		$this->db->where('b.active', 1);
		return $this->db->get();
	}

	public function combobox_segmen(){
		$this->db->from ("ref_segment a");
		return $this->db->get();
	}

}
