<?php
class Model_relasi extends CI_Model
{
	public function getAllrelasi($show=null, $start=null, $cari=null)
	{
		$this->db->select("a.*");
		$this->db->from("ref_relasi a");
		$session = $this->session->userdata('login');
		$this->db->where("(a.nm_relasi LIKE '%".$cari."%') ");
		$this->db->where("a.active IN (0, 1) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}
	
	public function get_count_relasi($search = null)
	{
		$count = array();
		$session = $this->session->userdata('login');
		
		$this->db->select(" COUNT(id_relasi) as recordsFiltered ");
		$this->db->from("ref_relasi");
		$this->db->where("active != '2' ");
		$this->db->like("nm_relasi ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
		
		$this->db->select(" COUNT(id_relasi) as recordsTotal ");
		$this->db->from("ref_relasi");
		$this->db->where("active != '2' ");
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
		
		return $count;
	}

	public function getAllproject($show=null, $start=null, $cari=null,$id_relasi)
	{
		$this->db->select("a.*");
		$this->db->from("ref_project a");
		$this->db->where("(a.nm_project  LIKE '%".$cari."%' ) ");
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("a.id_relasi",$id_relasi);
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_project($search = null,$id_relasi)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_project) as recordsFiltered ");
		$this->db->from("ref_project");
		$this->db->where("active != '2' ");
		$this->db->where("id_relasi",$id_relasi);
		$this->db->like("nm_project ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_project) as recordsTotal ");
		$this->db->from("ref_project");
		$this->db->where("active != '2' ");
		$this->db->where("id_relasi",$id_relasi);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAllrate($show=null, $start=null, $cari=null,$id_project,$id_relasi)
	{
		$this->db->select("a.*,concat(a.asal,'-',a.tujuan) as asal_tujuan");
		$this->db->from("ref_rate a");
		$this->db->where("(a.nm_project  LIKE '%".$cari."%' OR a.nm_relasi  LIKE '%".$cari."%' OR a.asal  LIKE '%".$cari."%' OR a.rate  LIKE '%".$cari."%' OR a.tujuan  LIKE '%".$cari."%') ");
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("a.id_project",$id_project);
		$this->db->where("a.id_relasi",$id_relasi);
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_rate($cari = null,$id_project,$id_relasi)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_rate) as recordsFiltered ");
		$this->db->from("ref_rate");
		$this->db->where("active != '2' ");
		$this->db->where("id_project",$id_project);
		$this->db->where("id_relasi",$id_relasi);
		$this->db->where("(nm_project  LIKE '%".$cari."%' OR nm_relasi  LIKE '%".$cari."%') ");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_rate) as recordsTotal ");
		$this->db->from("ref_rate");
		$this->db->where("active != '2' ");
		$this->db->where("id_project",$id_project);
		$this->db->where("id_relasi",$id_relasi);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}
	
	public function insert_relasi($data)
	{
		$this->db->insert('ref_relasi', $data);
		return $this->db->insert_id();
	}

	public function delete_relasi($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_relasi', $data['id_relasi']);
		$this->db->delete('ref_relasi');
		return $data['id_relasi'];
	}
	
	public function update_relasi($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_relasi', $data['id_relasi']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_relasi', $data);
		return $data['id_relasi'];
	}
	
	public function get_relasi_by_id($id_relasi)
	{
		if(empty($id_relasi))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_relasi a");
			$this->db->where('a.id_relasi', $id_relasi);
			$this->db->where("a.active != '2' ");
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


	public function insert_project($data)
	{
		$this->db->insert('ref_project', $data);
		return $this->db->insert_id();
	}

	public function delete_project($data)
	{
		$this->db->where('id_project', $data['id_project']);
		$this->db->delete('ref_project');
		return $data['id_project'];
	}

	public function update_project($data)
	{
		$this->db->where('id_project', $data['id_project']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_project', $data);
		return $data['id_project'];
	}

	public function get_project_by_id($id_project)
	{
		if(empty($id_project))
		{
			return array();
		}
		else
		{
			$this->db->from("ref_project a");
			$this->db->where('a.id_project', $id_project);
			$this->db->where("a.active != '2' ");
			return $this->db->get()->row_array();
		}
	}


		public function insert_rate($data)
	{
		$this->db->insert('ref_rate', $data);
		return $this->db->insert_id();
	}

	public function delete_rate($data)
	{
		$this->db->where('id_rate', $data['id_rate']);
		$this->db->delete('ref_rate');
		return $data['id_rate'];
	}

	public function update_rate($data)
	{
		$this->db->where('id_rate', $data['id_rate']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_rate', $data);
		return $data['id_rate'];
	}

	public function get_rate_by_id($id_rate)
	{
		if(empty($id_rate))
		{
			return array();
		}
		else
		{
			$this->db->from("ref_rate a");
			$this->db->where('a.id_rate', $id_rate);
			$this->db->where("a.active != '2' ");
			return $this->db->get()->row_array();
		}
	}

}
