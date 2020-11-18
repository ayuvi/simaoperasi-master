<?php
class Model_reports_ak13_bor extends CI_Model
{
    function bulan_romawi($bln){
        $array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $bulan = $array_bulan[ltrim($bln, '0')];
        return  $bulan;
    }

    public function segmen($id_setoran,$armada)
    {
        $query = $this->db->query("select kd_segmen from ref_setoran_detail where id_setoran=$id_setoran and armada='$armada' GROUP BY kd_segmen");
        $kd_segmen =array();
        foreach ($query->result() as $row) {
            array_push($kd_segmen, $row->kd_segmen);
        }
        return join(", ",$kd_segmen);
    }

    public function jurusan($id_setoran,$armada)
    {
        $query = $this->db->query("select kd_trayek from ref_setoran_detail where id_setoran=$id_setoran and armada='$armada' GROUP BY kd_trayek");
        $kd_trayek =array();
        foreach ($query->result() as $row) {
            array_push($kd_trayek, $row->kd_trayek);
        }
        return join(", ",$kd_trayek);
    }
    public function driver1($id_setoran,$armada)
    {
        $query = $this->db->query("select b.nm_pegawai FROM ref_setoran_detail a LEFT JOIN hris.ref_pegawai b ON a.driver1 = b.id_pegawai where id_setoran=$id_setoran and armada='$armada' GROUP BY b.nm_pegawai");
        $nm_pegawai =array();
        foreach ($query->result() as $row) {
            array_push($nm_pegawai, $row->nm_pegawai);
        }
        return join(", ",$nm_pegawai);
    }
    public function driver2($id_setoran,$armada)
    {
        $query = $this->db->query("select b.nm_pegawai FROM ref_setoran_detail a LEFT JOIN hris.ref_pegawai b ON a.driver2 = b.id_pegawai where id_setoran=$id_setoran and armada='$armada' GROUP BY b.nm_pegawai");
        $nm_pegawai =array();
        foreach ($query->result() as $row) {
            array_push($nm_pegawai, $row->nm_pegawai);
        }
        return join(", ",$nm_pegawai);
    }
    public function sum_km_trayek($id_setoran)
    {
        $this->db->select("SUM(a.km_trayek) as total_km");
        $this->db->from("ref_setoran_detail_pnp a");
        $session = $this->session->userdata('login');
        $this->db->where("a.id_setoran",$id_setoran);
        return $this->db->get()->row_array()['total_km'];
    }

    public function asuransi_trayek($id_setoran)
    {
        $qry = "(select kd_trayek from ref_setoran_detail where id_setoran='$id_setoran' limit 1)";
        $count = $this->db->query($qry)->num_rows();
        if ($count>0) {
            $this->db->select("COALESCE(SUM(rp_asuransi),0) AS rp_asuransi");
            $this->db->from("ref_trayek");
            $this->db->where("kd_trayek=(select kd_trayek from ref_setoran_detail where id_setoran='$id_setoran' limit 1)");
            $this->db->limit(1);
            return $this->db->get()->row("rp_asuransi");
        }else{
            return '0';
        }
    }

    function get_setoran_detail_pendapatan($id_setoran){
        $data_array = array('6', '28');

        $this->db->select("a.id_jenis, b.keterangan,
            (SELECT COALESCE(SUM(total),0) FROM ref_setoran_detail_pend WHERE id_jenis=a.id_jenis and id_setoran='$id_setoran') as total");
        $this->db->from("ref_setoran_detail_pend a");
        $this->db->join("ref_komponen b","a.id_jenis=b.id_komponen","left");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where('b.type_komponen', 'PLUS');
        $this->db->where_in('b.id_komponen', $data_array);
        $this->db->group_by('a.id_jenis');
        return $this->db->get();
    }

    function get_setoran_detail_beban_1($id_setoran){
        $data_array = array('23', '22', '24');

        $this->db->select("id_komponen, nm_komponen, keterangan, (SELECT COALESCE(SUM(total),0) FROM ref_setoran_borongan_beban WHERE id_jenis=id_komponen and id_setoran='$id_setoran') as total");
        $this->db->from("ref_komponen");
        $this->db->where_in('id_komponen', $data_array);
        $this->db->order_by("
            CASE
            WHEN id_komponen='23' THEN 1
            WHEN id_komponen='22' THEN 2
            WHEN id_komponen='24' THEN 3
            ELSE 4
            END
            ");
        return $this->db->get()->result();
    }
    function get_setoran_detail_beban_2($id_setoran){
        $data_array = array('23', '22', '24');

        $this->db->select("a.id_jenis, b.nm_komponen,
            (SELECT COALESCE(SUM(total),0) FROM ref_setoran_borongan_beban WHERE id_jenis=a.id_jenis and id_setoran='$id_setoran') as total");
        $this->db->from("ref_setoran_borongan_beban a");
        $this->db->join("ref_komponen b","a.id_jenis=b.id_komponen","left");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where('b.type_komponen', 'MINUS');
        $this->db->where_not_in('b.id_komponen', $data_array);
        $this->db->group_by('a.id_jenis');
        return $this->db->get()->result();
    }
    function get_setoran_detail_beban_3($id_setoran){
        $data_array = array('23', '22', '24');

        $this->db->select("id_komponen, nm_komponen, keterangan, (SELECT COALESCE(SUM(total),0) FROM ref_setoran_borongan_beban WHERE id_jenis=id_komponen and id_setoran='$id_setoran') as total");
        $this->db->from("ref_komponen");
        $this->db->where_in('id_komponen', $data_array);
        $this->db->order_by("
            CASE
            WHEN id_komponen='23' THEN 1
            WHEN id_komponen='22' THEN 2
            WHEN id_komponen='24' THEN 3
            ELSE 4
            END
            ");
        return $this->db->get()->result();
    }

    public function sum_komisi_agen($id_setoran){
        $this->db->select("COALESCE((sum(a.jumlah*a.harga)*0.1),0) as total_agen");
        $this->db->from("ref_setoran_detail_pnp a");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where_in('a.jenis_penjualan_pnp',array(2,3));
        $query = $this->db->get();

        return $query->row()->total_agen;
    }

    public function udj_pengemudi($id_setoran)
    {
        $this->db->select("a.id_jadwal");
        $this->db->from("ref_setoran_borongan a");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where('a.status_udj',1);
        $query = $this->db->get();

        if($query->num_rows()>=1){
            $id_jadwal   = $query->row("id_jadwal");

            $this->db->select("COALESCE(SUM(a.upp),0) as total,COALESCE(SUM(a.jum_penumpang),0) as jumlah");
            $this->db->from("ms_jadwal_borongan a");
            $this->db->where('a.id_jadwal', $id_jadwal);
            $data = $this->db->get();
            $total = $data->row("total");
            $jml_pnp = $data->row("jumlah");

            if($total==0){
                $udj_pengemudi = 0;
            }else{
                $jml_biaya_titipan = (0*$jml_pnp)+($this->asuransi_dan_biaya_titipan($id_setoran));
                $udj_pengemudi = ($total-$jml_biaya_titipan);
            }            
            return $udj_pengemudi;
        }else{
            return 0;
        }
    }

    public function udj_bagasi($id_setoran)
    {
        $this->db->select("a.id_setoran_detail");
        $this->db->from("ref_setoran_detail a");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where('a.status_udj_bagasi',1);
        $query = $this->db->get();

        if($query->num_rows()>=1){
            $id_setoran_detail = array();
            foreach ($query->result() as $row) {
                array_push($id_setoran_detail, $row->id_setoran_detail);
            }

            $this->db->select("COALESCE(SUM(a.bagasi_pnp),0) as bagasi_pnp");
            $this->db->from("ref_setoran_detail_pnp a");
            $this->db->join("ref_setoran_detail b", "a.id_setoran_detail = b.id_setoran_detail AND a.id_setoran = b.id_setoran","left");
            $this->db->where('a.id_setoran', $id_setoran);
            $this->db->where_in('a.id_setoran_detail', $id_setoran_detail);
            $this->db->where('b.status_udj_bagasi',1);
            $data = $this->db->get();
            $total = $data->row("bagasi_pnp");

            $udj_bagasi = $total*0.1;
            return $udj_bagasi;
        }else{
            return 0;
        }
    }

    public function asuransi_dan_biaya_titipan($id_setoran)
    {
        $data_array = array('23', '22', '24');

        $this->db->select("COALESCE(SUM(a.total),0) as total");
        $this->db->from("ref_setoran_borongan_beban a");
        $this->db->join("ref_setoran_borongan b", "a.id_setoran = b.id_setoran","left");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where_in('a.id_jenis', $data_array);
        $this->db->where('b.status_udj',1);
        $this->db->where('a.status_jenis_beban',1);
        $total = $this->db->get()->row("total");
        return $total;
    }

    public function data_setoran_detail_pnp($id_setoran)
    {
      $this->db->select("a.*,b.nm_point_awal,b.nm_point_akhir,
         CASE WHEN jenis_penjualan_pnp=1 THEN a.jumlah ELSE '' END AS damri_apps,
         CASE WHEN jenis_penjualan_pnp=2 THEN a.jumlah ELSE '' END AS ota,
         CASE WHEN jenis_penjualan_pnp=3 THEN a.jumlah ELSE '' END AS agen,
         CASE WHEN jenis_penjualan_pnp=4 THEN a.jumlah ELSE '' END AS loket,
         CASE WHEN jenis_penjualan_pnp=5 THEN a.jumlah ELSE '' END AS awak_bus");
      $this->db->from("ref_setoran_detail_pnp a");
      $this->db->join("ref_trayek b","b.kd_trayek=a.kd_trayek","left");
      $this->db->where('a.id_setoran', $id_setoran);
      $this->db->order_by('a.id_setoran_detail', 'ASC');
      $data_setoran_detail_pnp = $this->db->get()->result();
      return $data_setoran_detail_pnp;
  }
  public function data_setoran_detail_pnp_pertelaan($id_setoran_pnp)
  {
      $this->db->select("a.*");
      $this->db->from("ref_setoran_detail_pnp_pertelaan a");
      $this->db->where('a.id_setoran_pnp', $id_setoran_pnp);
      $this->db->order_by('a.id_setoran_pnp_prt', 'ASC');
      $data_setoran_detail_pnp_prt = $this->db->get()->result_array();
      return $data_setoran_detail_pnp_prt;
  }

  public function sum_aps_ota_loket($id_setoran)
  {
    $this->db->select("COALESCE(SUM(jumlah*harga),0) AS total");
    $this->db->from("ref_setoran_detail_pnp");
    $this->db->where("id_setoran",$id_setoran);
    $this->db->where_in("jenis_penjualan_pnp",array(1,2,4));
    return $this->db->get()->row("total");
}


/*DATA MODEL REPORT SLIP SETORAN*/
public function no_pol($armada)
{
    $query = $this->db->query("select * from ref_armada where kd_armada='$armada' and active!=2 limit 1");
    $no_pol = $query->num_rows()>=1 ? $query->row("plat_armada") : "";
    return $no_pol;
}
public function kode_trayek($id_setoran)
{
    $query = $this->db->query("select kd_trayek from ref_setoran_detail where id_setoran='$id_setoran' limit 1");
    $kd_trayek = $query->num_rows()>=1 ? $query->row("kd_trayek") : "";
    return $kd_trayek;
}
public function kode_segment($id_setoran)
{
    $query = $this->db->query("select kd_segmen from ref_setoran_detail where id_setoran='$id_setoran' limit 1");
    $kd_segmen = $query->num_rows()>=1 ? $query->row("kd_segmen") : "";
    return $kd_segmen;
}


/*DATA MODEL REPORT AK13 BORONGAN*/
public function ms_jadwal_borongan($id_jadwal)
{
    $this->db->select("a.*,b.nm_pegawai as pengemudi1,c.nm_pegawai as pengemudi2");
    $this->db->from("ms_jadwal_borongan a");
    $this->db->join("hris.ref_pegawai b", "a.driver1 = b.id_pegawai", "left");
    $this->db->join("hris.ref_pegawai c", "a.driver2 = c.id_pegawai", "left");
    $this->db->where('a.id_jadwal', $id_jadwal);
    $query = $this->db->get();

    if($query->num_rows()>0){
        $data       = $query->row();
        $armada     = $data->armada;
        $tanggal    = $data->tanggal;
        $kd_segmen  = $data->kd_segmen;
        $asal       = $data->asal;
        $tujuan     = $data->tujuan;
        $driver1    = $data->driver1;
        $driver2    = $data->driver2;
        $target     = $data->target;
        $nm_cabang  = $data->nm_cabang;
        $nm_segmen  = $data->nm_segmen;
        $nama       = $data->nama;
        $kontak_person = $data->kontak_person;
        $alamat     = $data->alamat;
        $no_ktp     = $data->no_ktp;
        $jum_penumpang  = $data->jum_penumpang;
        $keperluan      = $data->keperluan;
        $km_tempuh      = $data->km_tempuh;
        $durasi_sewa    = $data->durasi_sewa;
        $lokasi_pemb    = $data->lokasi_pemb;
        $jam_pemb       = $data->jam_pemb;
        $upp            = $data->upp;
        $pengemudi1     = $data->pengemudi1;
        $pengemudi2     = $data->pengemudi2;
    }else{
        $armada     = "";
        $tanggal    = "";
        $kd_segmen  = "";
        $asal       = "";
        $tujuan     = "";
        $driver1    = "";
        $driver2    = "";
        $target     = "";
        $nm_cabang  = "";
        $nm_segmen  = "";
        $nama       = "";
        $kontak_person = "";
        $alamat     = "";
        $no_ktp     = "";
        $jum_penumpang  = "";
        $keperluan      = "";
        $km_tempuh      = "";
        $durasi_sewa    = "";
        $lokasi_pemb    = "";
        $jam_pemb       = "";
        $upp            = "";
        $pengemudi1     = "";
        $pengemudi2     = "";
    }

    return array(
        "armada"        => $armada,
        "tanggal"       => $tanggal,
        "kd_segmen"     => $kd_segmen,
        "asal"          => $asal,
        "tujuan"        => $tujuan,
        "driver1"       => $driver1,
        "driver2"       => $driver2,
        "target"        => $target,
        "nm_cabang"     => $nm_cabang,
        "nm_segmen"     => $nm_segmen,
        "nama"          => $nama,
        "kontak_person" => $kontak_person,
        "alamat"        => $alamat,
        "no_ktp"        => $no_ktp,
        "jum_penumpang" => $jum_penumpang,
        "keperluan"     => $keperluan,
        "km_tempuh"     => $km_tempuh,
        "durasi_sewa"   => $durasi_sewa,
        "lokasi_pemb"   => $lokasi_pemb,
        "jam_pemb"      => $jam_pemb,
        "upp"           => $upp,
        "pengemudi1"    => $pengemudi1,
        "pengemudi2"    => $pengemudi2
        );
}
}
