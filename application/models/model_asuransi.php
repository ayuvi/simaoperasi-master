<?php
class Model_asuransi extends CI_Model
{
	public function getAllasuransi($show=null, $start=null, $cari=null)
	{
		$this->db->select("a.*,
			CASE
			WHEN CURDATE() <=a.tgl_expired THEN 1
			ELSE 0
			END AS status_expired
			");
		$this->db->from("ref_asuransi a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(a.no_polis  LIKE '%".$cari."%' or a.tgl_expired  LIKE '%".$cari."%')");
		$this->db->where("a.active IN (0, 1) ");
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_asuransi($cari = null)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_asuransi) as recordsFiltered ");
		$this->db->from("ref_asuransi");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(no_polis  LIKE '%".$cari."%' or tgl_expired  LIKE '%".$cari."%')");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_asuransi) as recordsTotal ");
		$this->db->from("ref_asuransi");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAllasuransiDetail($show=null, $start=null, $cari=null,$id_asuransi)
	{
		$this->db->select("a.*");
		$this->db->from("ref_asuransi_detail a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(a.kd_armada  LIKE '%".$cari."%' ) ");
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("a.id_asuransi",$id_asuransi);
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_asuransi_detail($search = null,$id_asuransi)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_asuransi) as recordsFiltered ");
		$this->db->from("ref_asuransi_detail");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("id_asuransi",$id_asuransi);
		$this->db->like("kd_armada ", $search);
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_asuransi) as recordsTotal ");
		$this->db->from("ref_asuransi_detail");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("id_asuransi",$id_asuransi);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function getAllasuransiDocuments($show=null, $start=null, $cari=null,$id_asuransi)
	{
		$this->db->select("a.*");
		$this->db->from("ref_asuransi_documents a");
		$session = $this->session->userdata('login');
		$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(a.nm_documents  LIKE '%".$cari."%' or a.file  LIKE '%".$cari."%')");
		$this->db->where("a.active IN (0, 1) ");
		$this->db->where("a.id_asuransi",$id_asuransi);
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_asuransi_documents($cari = null,$id_asuransi)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(id_asuransi) as recordsFiltered ");
		$this->db->from("ref_asuransi_documents");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("id_asuransi",$id_asuransi);
		$this->db->where("(nm_documents  LIKE '%".$cari."%' or file  LIKE '%".$cari."%')");
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(id_asuransi) as recordsTotal ");
		$this->db->from("ref_asuransi_documents");
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where("id_asuransi",$id_asuransi);
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function insert_asuransi($data)
	{
		$this->db->insert('ref_asuransi', $data);
		return $this->db->insert_id();
	}

	public function delete_asuransi($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_asuransi', $data['id_asuransi']);
		$this->db->delete('ref_asuransi');
		return $data['id_asuransi'];
	}

	public function update_asuransi($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_asuransi', $data['id_asuransi']);
		$this->db->update('ref_asuransi', $data);
		return $data['id_asuransi'];
	}

	public function insert_asuransi_detail($data)
	{
		$this->db->insert('ref_asuransi_detail', $data);
		return $this->db->insert_id();
	}

	public function delete_asuransi_detail($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_asuransi_detail', $data['id_asuransi_detail']);
		$this->db->delete('ref_asuransi_detail');
		return $data['id_asuransi_detail'];
	}

	public function update_asuransi_detail($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_asuransi_detail', $data['id_asuransi_detail']);
		$this->db->update('ref_asuransi_detail', $data);
		return $data['id_asuransi_detail'];
	}

	public function get_asuransi_by_id($id_asuransi)
	{
		if(empty($id_asuransi))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_asuransi a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_asuransi', $id_asuransi);
			$this->db->where("a.active != '2' ");
			return $this->db->get()->row_array();
		}
	}

	public function get_asuransi_by_id_detail($id_asuransi_detail)
	{
		if(empty($id_asuransi_detail))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_asuransi_detail a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_asuransi_detail', $id_asuransi_detail);
			return $this->db->get()->row_array();
		}
	}

	public function combobox_armada($id_cabang){
		$this->db->from("ref_armada a");
		if ($id_cabang=='0') {
		} else {
			$this->db->where('id_bu', $id_cabang);
		}
		return $this->db->get();
	}

	public function combo_armada(){
		$this->db->from("ref_armada a");
		return $this->db->get();
	}

	public function combobox_cabang()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu_access b");
		$this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
            //$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.id_user', $session['id_user']);
		$this->db->where('b.active', 1);
		return $this->db->get();
	}

	public function insert_documents($data)
	{
		$this->db->insert('ref_asuransi_documents', $data);
		return $this->db->insert_id();
	}

	public function delete_documents($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_asuransi_documents', $data['id_asuransi_documents']);
		$this->db->delete('ref_asuransi_documents');
		return $data['id_asuransi_documents'];
	}

	public function update_documents($where, $data)
	{
		$this->db->update('ref_asuransi_documents', $data, $where);
		return $this->db->affected_rows();
	}
	public function get_barang_by_id_documents($id_asuransi_documents)
	{
		if(empty($id_asuransi_documents))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_asuransi_documents a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_asuransi_documents', $id_asuransi_documents);
			return $this->db->get()->row();
		}
	}

	public function print_laporan()
	{
		$session = $this->session->userdata('login');
		$this->db->select("b.id_asuransi_detail,b.kd_armada,b.plat_armada,a.tgl_expired,datediff(a.tgl_expired,current_date()) as selisih,
			CASE
			WHEN datediff(a.tgl_expired,current_date())>30 and datediff(a.tgl_expired,current_date()) <=60 THEN '2 Bulan Lagi'
			WHEN datediff(a.tgl_expired,current_date())>0 and datediff(a.tgl_expired,current_date()) <=30 THEN '1 Bulan Lagi'
			WHEN datediff(a.tgl_expired,current_date())=0 THEN 'Expired Today'
			WHEN datediff(a.tgl_expired,current_date())<0 THEN 'Expired'
			END AS status_expired
			");
		$this->db->from("ref_asuransi_detail b");
		$this->db->join("ref_asuransi a", "b.id_asuransi = a.id_asuransi", "left");
		$this->db->where('datediff(a.tgl_expired,current_date())>30 and datediff(a.tgl_expired,current_date())<=60
			OR datediff(a.tgl_expired,current_date())>0 and datediff(a.tgl_expired,current_date()) <=30
			OR datediff(a.tgl_expired,current_date())=0
			OR datediff(a.tgl_expired,current_date())<0
			');
		$this->db->order_by('
			CASE
			WHEN datediff(a.tgl_expired,current_date())>30 and datediff(a.tgl_expired,current_date()) <=60 THEN 1
			WHEN datediff(a.tgl_expired,current_date())>0 and datediff(a.tgl_expired,current_date()) <=30 THEN 2
			WHEN datediff(a.tgl_expired,current_date())=0 THEN 3
			WHEN datediff(a.tgl_expired,current_date())<0 THEN 4
			ELSE 5
			END
			');
		return $this->db->get();
	}

}
