<?php
class Model_lho extends CI_Model
{
	public function getAlllho($show=null, $start=null, $cari=null,$id_cabang,$kd_trayek,$tanggal)
	{
		$this->db->select("a.*,b.nm_point_awal,b.harga,MAX(a.rit) as jumlah_rit,SUM(a.pnp) as penumpang,SUM(a.total) total_pendapatan");
		$this->db->from("tr_rit a");
		$this->db->join("ref_trayek b","a.kd_trayek = b.kd_trayek", 'left');
		$session = $this->session->userdata('login');
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where("(b.nm_point_awal  LIKE '%".$cari."%' ) ");

		if ($id_cabang=='0' && $kd_trayek=='0' && $tanggal=='0') {

		}else if($id_cabang!='0' && $kd_trayek=='0' && $tanggal=='0') {
			$this->db->where('a.id_bu', $id_cabang);
		}else if($id_cabang=='0' && $kd_trayek!='0' && $tanggal=='0') {
			$this->db->where('a.kd_trayek', $kd_trayek);
		}else if($id_cabang=='0' && $kd_trayek=='0' && $tanggal!='0') {
			$this->db->where('a.tgl_lmb', $tanggal);
		}else if($id_cabang!='0' && $kd_trayek!='0' && $tanggal=='0') {
			$this->db->where('a.id_bu', $id_cabang);
			$this->db->where('a.kd_trayek', $kd_trayek);
		}else if($id_cabang!='0' && $kd_trayek=='0' && $tanggal!='0') {
			$this->db->where('a.id_bu', $id_cabang);
			$this->db->where('a.tgl_lmb', $tanggal);
		}else if($id_cabang=='0' && $kd_trayek!='0' && $tanggal!='0') {
			$this->db->where('a.kd_trayek', $kd_trayek);
			$this->db->where('a.tgl_lmb', $tanggal);
		}else if($id_cabang!='0' && $kd_trayek!='0' && $tanggal!='0') {
			$this->db->where('a.id_bu', $id_cabang);
			$this->db->where('a.kd_trayek', $kd_trayek);
			$this->db->where('a.tgl_lmb', $tanggal);
		}
		
		$this->db->group_by('a.kd_trayek');
		
		if ($show == null && $start == null) {
		} else {
			$this->db->limit($show, $start);
		}

		return $this->db->get();
	}

	public function get_count_lho($search = null,$id_cabang,$kd_trayek,$tanggal)
	{
		$count = array();
		$session = $this->session->userdata('login');

		$this->db->select(" COUNT(a.id_rit) as recordsFiltered ");
		$this->db->from("tr_rit a");
		$this->db->join("ref_trayek b","a.kd_trayek = b.kd_trayek", 'left');
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_cabang);
		$this->db->where('a.kd_trayek', $kd_trayek);
		$this->db->where('a.tgl_lmb', $tanggal);
		// $this->db->like("b.nm_point_awal ", $search);
		// $this->db->group_by('a.kd_trayek');
		$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

		$this->db->select(" COUNT(a.id_rit) as recordsTotal ");
		$this->db->from("tr_rit a");
		$this->db->join("ref_trayek b","a.kd_trayek = b.kd_trayek", 'left');
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('a.id_bu', $id_cabang);
		$this->db->where('a.kd_trayek', $kd_trayek);
		$this->db->where('a.tgl_lmb', $tanggal);
		// $this->db->group_by('a.kd_trayek');
		$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

		return $count;
	}

	public function insert_lho($data)
	{
		$this->db->insert('ref_lho', $data);
		return $this->db->insert_id();
	}

	public function delete_lho($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_lho', $data['id_lho']);
		$this->db->update('ref_lho', array('active' => '2'));
		return $data['id_lho'];
	}

	public function update_lho($data)
	{
		$session = $this->session->userdata('login');
		$this->db->where('id_perusahaan', $session['id_perusahaan']);
		$this->db->where('id_lho', $data['id_lho']);
		$this->db->where("active != '2' ");
		$this->db->update('ref_lho', $data);
		return $data['id_lho'];
	}

	public function get_lho_by_id($id_lho)
	{
		if(empty($id_lho))
		{
			return array();
		}
		else
		{
			$session = $this->session->userdata('login');
			$this->db->from("ref_lho a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where('a.id_lho', $id_lho);
			$this->db->where("a.active != '2' ");
			return $this->db->get()->row_array();
		}
	}

	public function combobox_bu()
	{
		$session = $this->session->userdata('login');
		$this->db->from("ref_bu_access b");
		$this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
            //$this->db->where('b.id_perusahaan', $session['id_perusahaan']);
		$this->db->where('b.id_user', $session['id_user']);
		$this->db->where('b.active', 1);
		return $this->db->get();
	}

	public function list_trayek($id_cabang){
           // $session = $this->session->userdata('login');
		$this->db->from("ref_trayek a");
		$this->db->where('a.id_bu', $id_cabang);
		return $this->db->get();
	}

	public function get_cabang($id_bu){
		$this->db->from("ref_bu a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.active', 1);
		$query = $this->db->get();

		return $query->row();
	}

	public function general_manager($id_bu){
		$this->db->select("a.nm_pegawai");
		$this->db->from("hris.ref_pegawai a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_posisi', 1);
		$query = $this->db->get();

		return $query->row()->nm_pegawai;
	}

	public function asmen_pelayan_jasa($id_bu){
		$this->db->select("a.nm_pegawai");
		$this->db->from("hris.ref_pegawai a");
		$this->db->where('a.id_bu', $id_bu);
		$this->db->where('a.id_posisi', 5);
		$query = $this->db->get();

		return $query->row()->nm_pegawai;
	}

	public function print_laporan_lho($id_cabang,$kd_trayek,$tanggal)
	{
		$this->db->select("a.*,b.nm_point_awal,b.harga,MAX(a.rit) as jumlah_rit,SUM(a.pnp) as penumpang,SUM(a.total) total_pendapatan");
		$this->db->from("tr_rit a");
		$this->db->join("ref_trayek b","a.kd_trayek = b.kd_trayek", 'left');
		$session = $this->session->userdata('login');
		$this->db->where('b.id_perusahaan', $session['id_perusahaan']);

		if ($id_cabang=='0' && $kd_trayek=='0' && $tanggal=='0') {

		}else if($id_cabang!='0' && $kd_trayek=='0' && $tanggal=='0') {
			$this->db->where('a.id_bu', $id_cabang);
		}else if($id_cabang=='0' && $kd_trayek!='0' && $tanggal=='0') {
			$this->db->where('a.kd_trayek', $kd_trayek);
		}else if($id_cabang=='0' && $kd_trayek=='0' && $tanggal!='0') {
			$this->db->where('a.tgl_lmb', $tanggal);
		}else if($id_cabang!='0' && $kd_trayek!='0' && $tanggal=='0') {
			$this->db->where('a.id_bu', $id_cabang);
			$this->db->where('a.kd_trayek', $kd_trayek);
		}else if($id_cabang!='0' && $kd_trayek=='0' && $tanggal!='0') {
			$this->db->where('a.id_bu', $id_cabang);
			$this->db->where('a.tgl_lmb', $tanggal);
		}else if($id_cabang=='0' && $kd_trayek!='0' && $tanggal!='0') {
			$this->db->where('a.kd_trayek', $kd_trayek);
			$this->db->where('a.tgl_lmb', $tanggal);
		}else if($id_cabang!='0' && $kd_trayek!='0' && $tanggal!='0') {
			$this->db->where('a.id_bu', $id_cabang);
			$this->db->where('a.kd_trayek', $kd_trayek);
			$this->db->where('a.tgl_lmb', $tanggal);
		}
		$this->db->group_by('a.kd_trayek');
		return $this->db->get();
	}

}
