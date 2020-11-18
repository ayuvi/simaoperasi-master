<?php
class Model_sim_driver extends CI_Model
{
	public function getAllsim_driver($show=null, $start=null, $cari=null, $id_bu)
	{
		$this->db->select("a.*,b.status,b.tgl_absensi,b.keterangan,b.cnm_user,b.cdate as date_create");
		$this->db->from("ref_armada a");
		$this->db->join("tr_absensi_armada b", "a.id_bu = b.id_bu AND a.kd_armada = b.kd_armada AND b.tgl_absensi = '$tanggal'","left");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("(a.kd_armada  LIKE '%".$cari."%' or b.status  LIKE '%".$cari."%' or b.tgl_absensi LIKE '%".$cari."%')");
		// $this->db->group_by('a.kd_armada');
		if($id_segment !=0){
			$this->db->where('a.id_segment', $id_segment);
		}
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}
	
	public function get_count_sim_driver($search = null, $id_bu)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_armada) as recordsFiltered ");
		$this->db->from("ref_armada a");
		$this->db->join("tr_absensi_armada b", "a.id_bu = b.id_bu AND a.kd_armada = b.kd_armada AND b.tgl_absensi = '$tanggal'","left");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("(a.kd_armada  LIKE '%".$cari."%' or b.status  LIKE '%".$cari."%' or b.tgl_absensi LIKE '%".$cari."%')");
		if($id_segment !=0){
			$this->db->where('a.id_segment', $id_segment);
		}
		// $this->db->group_by('a.kd_armada');
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_armada) as recordsTotal ");
		$this->db->from("ref_armada a");
		$this->db->join("tr_absensi_armada b", "a.id_bu = b.id_bu AND a.kd_armada = b.kd_armada AND b.tgl_absensi = '$tanggal'","left");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where("a.active IN (0, 1) ");
		if($id_segment !=0){
			$this->db->where('a.id_segment', $id_segment);
		}
		// $this->db->group_by('a.kd_armada');
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
	}
	
	public function insert_sim_driver($data)
	{
		$this->db->insert('ref_sim_driver', $data);
		return $this->db->insert_id();
	}

	public function delete_sim_driver($data)
	{
		$this->db->where('id_sim_driver', $data['id_sim_driver']);
		$this->db->delete('ref_sim_driver');
		return $data['id_sim_driver'];
	}
	
	public function update_sim_driver($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_sim_driver', $data['id_sim_driver']);
		$this->db->where("active IN (0, 1) ");
		$this->db->update('ref_sim_driver', $data);
		return $data['id_sim_driver'];
	}
	
	public function get_sim_driver_by_id($id_sim_driver)
	{
		if(empty($id_sim_driver))
		{
			return array();
		}
		else
		{
			$this->db->from("ref_sim_driver a");
			$this->db->where('a.id_sim_driver', $id_sim_driver);
			$this->db->where("a.active IN (0, 1) ");
			return $this->db->get()->row_array();
		}
	}

}
