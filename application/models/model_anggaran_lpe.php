<?php
class Model_anggaran_lpe extends CI_Model
{


  public function getAllanggaran_lpe($show=null, $start=null, $cari=null, $id_bu, $tahun)
  {
    if($tahun == null){
      $this->db->select("a.*, b.nm_bu, c.nm_segment");
      $this->db->from("tr_anggaran_lpe a");
      $this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
      $this->db->join("ref_segment c", "c.id_segment = a.kd_segment","left");
      $session = $this->session->userdata('login');
      $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
      $this->db->where('a.id_bu', $id_bu);
      $this->db->where("(a.kd_armada  LIKE '%".$cari."%' ) ");
      if ($show == null && $start == null) {
      } else {
        $this->db->limit($show, $start);
      }
      return $this->db->get();

    }else{
      $this->db->select("a.*, b.nm_bu, c.nm_segment");
      $this->db->from("tr_anggaran_lpe a");
      $this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
      $this->db->join("ref_segment c", "c.id_segment = a.kd_segment","left");
      $session = $this->session->userdata('login');
      $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
      $this->db->where('a.id_bu', $id_bu);
      $this->db->where('a.tahun', $tahun);
      $this->db->where("(a.kd_armada  LIKE '%".$cari."%' ) ");
      if ($show == null && $start == null) {
      } else {
        $this->db->limit($show, $start);
      }
      return $this->db->get();
    }
  }

  public function get_count_anggaran_lpe($search = null, $id_bu, $tahun)
  {
    if ($tahun==null) {
     $count = array();
     $session = $this->session->userdata('login');

     $this->db->select(" COUNT(id_lpe) as recordsFiltered ");
     $this->db->from("tr_anggaran_lpe");
     $this->db->where('id_perusahaan', $session['id_perusahaan']);
     $this->db->where('id_bu', $id_bu);
     $this->db->like("kd_armada ", $search);
     $count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

     $this->db->select(" COUNT(id_lpe) as recordsTotal ");
     $this->db->from("tr_anggaran_lpe");
     $this->db->where('id_perusahaan', $session['id_perusahaan']);
     $this->db->where('id_bu', $id_bu);
     $count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

     return $count;
   }else{
     $count = array();
     $session = $this->session->userdata('login');

     $this->db->select(" COUNT(id_lpe) as recordsFiltered ");
     $this->db->from("tr_anggaran_lpe");
     $this->db->where('id_perusahaan', $session['id_perusahaan']);
     $this->db->where('id_bu', $id_bu);
     $this->db->where('tahun', $tahun);
     $this->db->like("kd_armada ", $search);
     $count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

     $this->db->select(" COUNT(id_lpe) as recordsTotal ");
     $this->db->from("tr_anggaran_lpe");
     $this->db->where('id_perusahaan', $session['id_perusahaan']);
     $this->db->where('id_bu', $id_bu);
     $count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

     return $count;
   }
 }

 public function insert_anggaran_lpe($data)
 {

  $this->db->insert('tr_anggaran_lpe', $data);
  return $this->db->insert_id();

}

public function delete_anggaran_lpe($data)
{
  $session = $this->session->userdata('login');
  $this->db->where('id_perusahaan', $session['id_perusahaan']);
  $this->db->where('id_lpe', $data['id_lpe']);
  $this->db->delete('tr_anggaran_lpe');
  return $data['id_lpe'];
}

public function update_anggaran_lpe($data,$id_lpe)
{
 $session = $this->session->userdata('login');


 $this->db->where('id_perusahaan', $session['id_perusahaan']);
 $this->db->where('id_lpe', $id_lpe);
 $this->db->update('tr_anggaran_lpe', $data);
 return $id_lpe;


}


public function get_anggaran_lpe_by_id($id_lpe)
{
 if(empty($id_lpe))
 {
  return array();
}
else
{
  $session = $this->session->userdata('login');
  $this->db->select("a.*, b.nm_bu");
  $this->db->from("tr_anggaran_lpe a");
  $this->db->join("ref_bu b","a.id_bu = b.id_bu","LEFT");
  $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
  $this->db->where('a.id_lpe', $id_lpe);
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

public function combobox_armada()
{
  $session = $this->session->userdata('login');
  $this->db->from("ref_armada b");
  $this->db->where('b.id_perusahaan', $session['id_perusahaan']);
  $this->db->where('b.active', 0);

  return $this->db->get();
}

public function combobox_trayek()
{
  $session = $this->session->userdata('login');
  $this->db->from("ref_trayek b");
  $this->db->where('b.id_perusahaan', $session['id_perusahaan']);
  $this->db->where('b.active', 1);

  return $this->db->get();
}

public function list_trayek($id_cabang){
  $this->db->from("ref_trayek a");
  $this->db->where('a.id_bu', $id_cabang);
  $this->db->where('a.active', 1);
  $this->db->order_by('a.id_trayek');
  return $this->db->get();
}

public function list_armada($id_cabang){
  $this->db->from("ref_armada a");
  $this->db->where('a.id_bu', $id_cabang);
  $this->db->where('a.active', 0);
  $this->db->order_by('a.id_armada');
  return $this->db->get();
}

public function getarmadarinci($kd_armada){
  $this->db->from("ref_armada a");
  $this->db->where('a.kd_armada', $kd_armada);
  $query = $this->db->get();
  return $query->row();
}

public function gettrayekrinci($kd_trayek){
  $this->db->from("ref_trayek a");
  $this->db->where('a.kd_trayek', $kd_trayek);
  $query = $this->db->get();
  return $query->row();
}

public function ref_bu($id_bu){
  $this->db->from("ref_bu a");
  $this->db->where('a.id_bu', $id_bu);
  $this->db->where('a.active', 1);
  $query = $this->db->get();

  return $query->row();
}

public function laporan_lpe($id_bu,$tahun)
{
  $sql = "
  SELECT b.plat_armada,a.kd_armada,b.seat_armada,b.nm_layanan,a.kd_trayek, a.hj, a.rit, a.km, a.jml_pnp, a.pendapatan
  FROM tr_anggaran_lpe a
  LEFT JOIN ref_armada b on a.kd_armada=b.kd_armada
  where a.id_bu=".$id_bu."
  and a.tahun=".$tahun;

  $data = $this->db->query($sql);
  return $data;
}

  public function general_manager($id_bu)
  {
    $qry_pegawai = "SELECT a.nik_pegawai, a.nm_pegawai FROM hris.ref_pegawai a 
    WHERE a.id_posisi IN ( '1', '45','47' ) AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' LIMIT 1";
    $query = $this->db->query($qry_pegawai);
    if($query->num_rows()==1){
      $data = $query->row();
      $nik_pegawai = $data->nik_pegawai;
      $nm_pegawai = $data->nm_pegawai;
    }else{
      $nik_pegawai = "";
      $nm_pegawai = "";
    }

    return array(
      "nik_pegawai" => $nik_pegawai,
      "nm_pegawai" => $nm_pegawai
    );
  }

  public function manager_usaha($id_bu)
  {
    //MANAGER USAHA
    $qry_pegawai = "SELECT a.nik_pegawai, a.nm_pegawai FROM hris.ref_pegawai a 
    WHERE a.id_posisi = 4 AND a.id_divisi_sub = 49 AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' LIMIT 1";
    $query = $this->db->query($qry_pegawai);
    
    if($query->num_rows()==1){
      $data = $query->row();
      $nik_pegawai = $data->nik_pegawai;
      $nm_pegawai = $data->nm_pegawai;

      return array(
        "posisi" => "Manager Usaha",
        "nik_pegawai" => $nik_pegawai,
        "nm_pegawai" => $nm_pegawai
      );
    }else{
      //MANAGER TEKNIK
      $qry_pegawai_2 = "SELECT a.nik_pegawai, a.nm_pegawai FROM hris.ref_pegawai a 
      WHERE a.id_posisi = 4 AND a.id_divisi_sub = 57 AND a.status_pegawai IN ( 'PKWT', 'PKWTT' ) AND a.id_bu = '$id_bu' LIMIT 1";
      $query_2 = $this->db->query($qry_pegawai_2);

      if($query_2->num_rows()==1){
        $data = $query_2->row();
        $nik_pegawai = $data->nik_pegawai;
        $nm_pegawai = $data->nm_pegawai;
      }else{
        $nik_pegawai = "";
        $nm_pegawai = "";
      }
      return array(
        "posisi" => "Manager Usaha dan Teknik",
        "nik_pegawai" => $nik_pegawai,
        "nm_pegawai" => $nm_pegawai
      );
    }
  }

}
