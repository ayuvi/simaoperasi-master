<?php
class Model_order extends CI_Model
{
	public function getAllorder($show=null, $start=null, $cari=null,$id_rate)
	{
		$this->db->select("a.*");
		$this->db->from("ref_order a");
		$this->db->where("a.id_rate ", $id_rate);
		$this->db->where("(a.nm_tipe_armada  LIKE '%".$cari."%' ) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_order($search = null,$id_rate)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_order) as recordsFiltered ");
		$this->db->from("ref_order");
		$this->db->like("nm_tipe_armada ", $search);
		$this->db->where("id_rate ", $id_rate);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_order) as recordsTotal ");
		$this->db->from("ref_order");
		$this->db->where("id_rate ", $id_rate);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function insert_order($data)
	{
		$this->db->insert('ref_order', $data);
		return $this->db->insert_id();
	}

	public function delete_order($data)
	{
		$this->db->where('id_order', $data['id_order']);
		$this->db->delete('ref_order');
		return $data['id_order'];
	}

	public function update_order($data)
	{
		$this->db->where('id_order', $data['id_order']);
		$this->db->update('ref_order', $data);
		return $data['id_order'];
	}

	public function get_order_by_id($id_order)
	{
		if(empty($id_order))
		{
			return array();
		}
		else
		{
			$this->db->from("ref_order a");
			$this->db->where('a.id_order', $id_order);
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

}
