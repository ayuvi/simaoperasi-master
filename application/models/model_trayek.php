<?php
class Model_trayek extends CI_Model
{
    public function getAlltrayek($show=null, $start=null, $cari=null, $id_bu)
    {
        $this->db->select("a.*, b.id_point, b.nm_point as nm_point_awal, a.km_trayek, c.nm_point as nm_point_akhir, d.nm_bu, a.harga");
        $this->db->from("ref_trayek a");
        $this->db->join("ref_point b","a.id_point_awal = b.id_point","left");
        $this->db->join("ref_point c","a.id_point_akhir = c.id_point","left");
        $this->db->join("ref_bu d","a.id_bu = d.id_bu","left");
        $session = $this->session->userdata('login');
        $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
        $this->db->where('a.id_bu', $id_bu);
            // $this->db->where("(b.nm_point  LIKE '%".$cari."%' or c.nm_point  LIKE '%".$cari."%' ) ");
        $this->db->where("(a.nm_point_awal  LIKE '%".$cari."%' or a.nm_point_akhir  LIKE '%".$cari."%' or a.kd_trayek  LIKE '%".$cari."%') ");
        $this->db->where("a.active IN (0, 1) ");
        if ($show == null && $start == null) {
        } else {
            $this->db->limit($show, $start);
        }

        return $this->db->get();
    }

    public function get_count_trayek($cari = null, $id_bu)
    {
     $count = array();
     $session = $this->session->userdata('login');

     $this->db->select(" COUNT(a.id_trayek) as recordsFiltered ");
     $this->db->from("ref_trayek a");
     $this->db->join("ref_point b","a.id_point_awal = b.id_point","left");
     $this->db->join("ref_point c","a.id_point_akhir = c.id_point","left");
     $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
     $this->db->where('a.id_bu', $id_bu);
     $this->db->where("a.active != '2' ");
     $this->db->where("(b.nm_point  LIKE '%".$cari."%' or c.nm_point  LIKE '%".$cari."%' ) ");
     $count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

     $this->db->select(" COUNT(id_trayek) as recordsTotal ");
     $this->db->from("ref_trayek");
     $this->db->where('id_perusahaan', $session['id_perusahaan']);
     $this->db->where('id_bu', $id_bu);
     $this->db->where("active != '2' ");
     $count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

     return $count;
 }

 public function getAlltrayek_detail($show=null, $start=null, $cari=null, $id_trayek,$layanan)
 {
    $this->db->select("a.*");
    $this->db->from("ref_trayek_detail a");
    $session = $this->session->userdata('login');
    $this->db->where('a.id_trayek', $id_trayek);
    if($layanan!=0){
        $this->db->where('a.layanan', $layanan);
    }
            // $this->db->where("(b.nm_point  LIKE '%".$cari."%' or c.nm_point  LIKE '%".$cari."%' ) ");
    $this->db->where("(a.kd_trayek  LIKE '%".$cari."%' or a.nm_point_awal  LIKE '%".$cari."%' or a.nm_point_akhir LIKE '%".$cari."%') ");

    $this->db->where("a.active IN (0, 1) ");
    $this->db->order_by("
        CASE
        WHEN layanan='1' THEN 1
        WHEN layanan='2' THEN 2
        WHEN layanan='3' THEN 3
        ELSE 4
        END
        ,
        CASE
        WHEN mata_uang='IDR' THEN 1
        WHEN mata_uang='MYR' THEN 2
        WHEN mata_uang='BND' THEN 3
        ELSE 4
        END");
    if ($show == null && $start == null) {
    } else {
        $this->db->limit($show, $start);
    }

    return $this->db->get();
}

public function get_count_trayek_detail($cari = null, $id_trayek,$layanan)
{
    $count = array();
    $session = $this->session->userdata('login');

    $this->db->select(" COUNT(id_trayek_detail) as recordsFiltered ");
    $this->db->from("ref_trayek_detail");
    $this->db->where('id_trayek', $id_trayek);
    if($layanan!=0){
        $this->db->where('layanan', $layanan);
    }
    $this->db->where("(kd_trayek  LIKE '%".$cari."%' or nm_point_awal  LIKE '%".$cari."%' or nm_point_akhir LIKE '%".$cari."%') ");
    $count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];

    $this->db->select(" COUNT(id_trayek_detail) as recordsTotal ");
    $this->db->from("ref_trayek_detail");
    $this->db->where('id_trayek', $id_trayek);
    if($layanan!=0){
        $this->db->where('layanan', $layanan);
    }
    $count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];

    return $count;
}

public function getAlltrayekaccess($show=null, $start=null, $cari=null, $id_trayek)
{
    $this->db->select("a.id_trayek_access, a.id_user, b.nm_user, a.active");
    $this->db->from("ref_trayek_access a");
    $this->db->join("ref_user b", "a.id_user = b.id_user", "left");
    $session = $this->session->userdata('login');
    $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
    $this->db->where('a.id_trayek', $id_trayek);
    $this->db->where("(b.nm_user  LIKE '%".$cari."%' ) ");
    $this->db->where("a.active IN (0, 1) ");
    if ($show == null && $start == null) {
    } else {
        $this->db->limit($show, $start);
    }

    return $this->db->get();
}

public function insert_trayek($data)
{
    $this->db->insert('ref_trayek', $data);
    return $this->db->insert_id();
}

public function insert_trayek_detail($data)
{
    $this->db->insert('ref_trayek_detail', $data);
    return $this->db->insert_id();
}

public function insert_trayek_access($data)
{
    $this->db->insert('ref_trayek_access', $data);
    return $this->db->insert_id();
}

public function delete_trayek($data)
{
    $session = $this->session->userdata('login');
    $this->db->where('id_perusahaan', $session['id_perusahaan']);
    $this->db->where('id_trayek', $data['id_trayek']);
    $this->db->delete('ref_trayek');
    return $data['id_trayek'];
}

public function delete_trayek_detail($data)
{
    $session = $this->session->userdata('login');
    $this->db->where('id_trayek_detail', $data['id_trayek_detail']);
    $this->db->delete('ref_trayek_detail');
    return $data['id_trayek_detail'];
}

public function delete_trayek_access($data)
{
    $session = $this->session->userdata('login');
    $this->db->where('id_perusahaan', $session['id_perusahaan']);
    $this->db->where('id_trayek_access', $data['id_trayek_access']);
    $this->db->delete('ref_trayek_access');
    return $data['id_trayek_access'];
}

public function update_trayek($data)
{
    $session = $this->session->userdata('login');
    $this->db->where('id_perusahaan', $session['id_perusahaan']);
    $this->db->where('id_trayek', $data['id_trayek']);
    $this->db->where("active != '2' ");
    $this->db->update('ref_trayek', $data);
    return $data['id_trayek'];
}

public function update_trayek_detail($data)
{
    $session = $this->session->userdata('login');
    $this->db->where('id_trayek_detail', $data['id_trayek_detail']);
    $this->db->update('ref_trayek_detail', $data);
    return $data['id_trayek_detail'];
}

public function update_trayek_access($data)
{
    $session = $this->session->userdata('login');
    $this->db->where('id_perusahaan', $session['id_perusahaan']);
    $this->db->where('id_trayek_access', $data['id_trayek_access']);
    $this->db->where("active != '2' ");
    $this->db->update('ref_trayek_access', $data);
    return $data['id_trayek_access'];
}

public function get_trayek_by_id($id_trayek)
{
 if(empty($id_trayek))
 {
    return array();
}
else
{
    $session = $this->session->userdata('login');
    $this->db->select("a.*, b.id_point, b.nm_point as nm_point_awal, c.nm_point as nm_point_akhir, d.nm_bu, a.harga");
    $this->db->from("ref_trayek a");
    $this->db->join("ref_point b","a.id_point_awal = b.id_point","left");
    $this->db->join("ref_point c","a.id_point_akhir = c.id_point","left");
    $this->db->join("ref_bu d","a.id_bu = d.id_bu","left");
    $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
    $this->db->where('a.id_trayek', $id_trayek);
    $this->db->where("a.active != '2' ");
    return $this->db->get()->row_array();
}
}

public function get_trayek_by_id_detail($id_trayek_detail)
{
    if(empty($id_trayek_detail))
    {
        return array();
    }
    else
    {
        $session = $this->session->userdata('login');
        $this->db->select("a.*");
        $this->db->from("ref_trayek_detail a");
        $this->db->where('a.id_trayek_detail', $id_trayek_detail);
        return $this->db->get()->row_array();
    }
}

public function combobox_point()
{
    $session = $this->session->userdata('login');
    $this->db->from("ref_point b");
    $this->db->where('b.id_perusahaan', $session['id_perusahaan']);
    $this->db->where('b.active', 1);

    return $this->db->get();
}

public function combobox_user()
{
    $this->db->from("ref_user");
    $session = $this->session->userdata('login');
    $this->db->where('id_perusahaan', $session['id_perusahaan']);
    $this->db->where('active', 1);
    $this->db->where('id_level', 4);
    return $this->db->get();
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
    $this->db->from("ref_segment a");
    $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
    $this->db->where('a.active', 1);
    return $this->db->get();
}



}
