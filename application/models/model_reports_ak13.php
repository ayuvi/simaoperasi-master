<?php
class Model_reports_ak13 extends CI_Model
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
        $query = $this->db->query("select kd_trayek from ref_setoran_detail where id_setoran='$id_setoran' GROUP BY kd_trayek");
        $kd_trayek =array();
        foreach ($query->result() as $row) {
            array_push($kd_trayek, $row->kd_trayek);
        }
        return join(", ",$kd_trayek);
    }
    public function driver1($id_setoran,$armada)
    {
        // $query = $this->db->query("select b.nm_pegawai FROM ref_setoran_detail a LEFT JOIN hris.ref_pegawai b ON a.driver1 = b.id_pegawai where id_setoran=$id_setoran and armada='$armada' GROUP BY b.nm_pegawai");
        $query = $this->db->query("select b.nm_pegawai FROM ref_setoran_detail a LEFT JOIN hris.ref_pegawai b ON a.driver1 = b.id_pegawai where id_setoran='$id_setoran' GROUP BY b.nm_pegawai");
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

    // public function sum_km_trayek($id_setoran)
    // {
    //     $this->db->select("SUM(a.km_trayek) as total_km");
    //     $this->db->from("ref_setoran_detail_pnp a");
    //     $session = $this->session->userdata('login');
    //     $this->db->where("a.id_setoran",$id_setoran);
    //     $this->db->group_by("a.kd_trayek");
    //     return $this->db->get()->row_array()['total_km'];
    // }

   //  public function sum_km_trayek($id_setoran){
   //      $query_cek = $this->db->query("SELECT count(id_setoran_pend) id_setoran_pend FROM ref_setoran_detail_pend where id_setoran='$id_setoran' AND id_jenis=6");
   //      if($query_cek->row("id_setoran_pend")!=0){
   //          $query = $this->db->query("SELECT sum(jumlah) jumlah FROM ref_setoran_detail_pend where id_setoran='$id_setoran' AND id_jenis=6");
   //          return $query->row_array()['jumlah'];
   //      }else{
   //         $query = $this->db->query("SELECT SUM(total_trayek) total_trayek FROM 
   //          (SELECT a.km_trayek as total_trayek, a.kd_trayek FROM ref_setoran_detail_pnp a WHERE a.id_setoran = '$id_setoran' GROUP BY kd_trayek,rit)x");
   //         return $query->row_array()['total_trayek'];
   //     }
   // }

    public function sum_km_trayek123($id_setoran,$id_bu)
    {
        $this->db->select("a.kd_trayek");
        $this->db->from("ref_setoran_detail a");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->group_by('a.kd_trayek,a.id_bu,a.kd_segmen');
        $query = $this->db->get();

        if($query->num_rows()>=1){
            $kd_trayek = array();
            foreach ($query->result() as $row) {
                array_push($kd_trayek, $row->kd_trayek);
            }

            // $this->db->select("COALESCE(a.km_trayek+a.km_empty,0) as total");
            // $this->db->from("ref_trayek a");
            // $this->db->where('a.id_bu', $id_bu);
            // $this->db->where_in('a.kd_trayek', $kd_trayek);
            // $data = $this->db->get();
            // $total = $data->row("total");


            $this->db->select("COALESCE(SUM(x.total),0) as total");
            $this->db->from("(SELECT COALESCE(a.km_trayek+a.km_empty, 0) as total 
                FROM ref_trayek a 
                WHERE a.id_bu = '$id_bu' 
                and a.kd_trayek in (select kd_trayek from ref_setoran_detail WHERE id_setoran='$id_setoran' GROUP BY kd_trayek,id_bu,kd_segmen))x");
            $data = $this->db->get();
            $total = $data->row("total");

            return $total;

        }else{
            return 0;
        }

    }

    public function sum_km_trayek($id_setoran,$id_bu)
    {
        // $this->db->select("a.id_setoran_detail AS id_set, COALESCE ( a.km_trayek, 0 ) AS km_trayek_, COALESCE ( a.km_empty, 0 ) AS km_empty_,
        //     COALESCE((SELECT COUNT(DISTINCT rit) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set),0) as ritase,
        //     COALESCE(((a.km_trayek)*(SELECT COUNT(DISTINCT rit) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set))+(a.km_empty),0) as km_total");
        // $this->db->from("ref_setoran_detail a");
        // $this->db->where('a.id_setoran', $id_setoran);
        // $query = $this->db->get();
        $query = $this->db->query("
            SELECT COALESCE(SUM(km_total),0) as kilometer_total
            from
            (SELECT
            a.id_setoran_detail AS id_set,
            COALESCE ( a.km_trayek, 0 ) AS km_trayek_,
            COALESCE ( a.km_empty, 0 ) AS km_empty_,
            COALESCE ( ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ), 0 ) AS ritase,
            COALESCE (
            ( ( a.km_trayek ) * ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ) ) + ( a.km_empty ),
            0 
            ) AS km_total 
            FROM
            ref_setoran_detail a 
            WHERE
            a.id_setoran = '$id_setoran') root
            ");
        $total = $query->row("kilometer_total");
        return $total;
    }

    public function asuransi_trayek($id_setoran)
    {
        $qry = "(select kd_trayek from ref_setoran_detail where id_setoran='$id_setoran' limit 1)";
        $count = $this->db->query($qry)->num_rows();
        if ($count>0) {
            $this->db->select("COALESCE(SUM(rp_asuransi),0) AS rp_asuransi");
            $this->db->from("ref_trayek");
            $this->db->where("kd_trayek=(select kd_trayek from ref_setoran_detail where id_setoran='$id_setoran' limit 1)");
            $this->db->where("kd_segment=(select kd_segmen from ref_setoran_detail where id_setoran='$id_setoran' limit 1)");
            $this->db->limit(1);
            return $this->db->get()->row("rp_asuransi");
        }else{
            return '0';
        }
    }

    function get_setoran_detail_pendapatan($id_setoran){
        $data_array = array('6', '28','29');

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

    function get_setoran_detail_pendapatan_refund($id_setoran){
        $data_array = array('6', '28','29');

        $this->db->select("COALESCE(SUM(total),0) as total");
        $this->db->from("(SELECT total from ref_setoran_detail_pend where id_setoran='$id_setoran' and id_jenis=29)x");
        $query = $this->db->get();
        return $query->row()->total;
    }

    function get_setoran_detail_beban_1($id_setoran){
        $data_array = array('23', '22', '24');

        $this->db->select("id_komponen, nm_komponen, keterangan, (SELECT COALESCE(SUM(total),0) FROM ref_setoran_detail_beban WHERE id_jenis=id_komponen and id_setoran='$id_setoran') as total");
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
            (SELECT COALESCE(SUM(total),0) FROM ref_setoran_detail_beban WHERE id_jenis=a.id_jenis and id_setoran='$id_setoran') as total");
        $this->db->from("ref_setoran_detail_beban a");
        $this->db->join("ref_komponen b","a.id_jenis=b.id_komponen","left");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where('b.type_komponen', 'MINUS');
        $this->db->where_not_in('b.id_komponen', $data_array);
        $this->db->group_by('a.id_jenis');
        return $this->db->get()->result();
    }
    function get_setoran_detail_beban_3($id_setoran){
        // $data_array = array('23', '22', '24');
        $data_array = array('22', '24');

        $this->db->select("id_komponen, nm_komponen, keterangan, (SELECT COALESCE(SUM(total),0) FROM ref_setoran_detail_beban WHERE id_jenis=id_komponen and id_setoran='$id_setoran') as total");
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
        $this->db->where_in('a.jenis_penjualan_pnp',array(3));
        $query = $this->db->get();

        return $query->row()->total_agen;
    }

    public function sum_sharing_profit($id_setoran){
        $this->db->select("COALESCE((sum(a.jumlah*a.harga)*0.1),0) as sharing_profit");
        $this->db->from("ref_setoran_detail_pnp a");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where_in('a.jenis_penjualan_pnp',array(6));
        $query = $this->db->get();

        return $query->row()->sharing_profit;
    }

    public function udj_pengemudi($id_setoran,$asuransi_trayek,$id_bu,$total_upp_bagasi,$pend_refund)
    {
        $this->db->select("a.id_setoran_detail");
        $this->db->from("ref_setoran_detail a");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where('a.status_udj',1);
        $query = $this->db->get();

        if($query->num_rows()>=1){
            $id_setoran_detail = array();
            foreach ($query->result() as $row) {
                array_push($id_setoran_detail, $row->id_setoran_detail);
            }

            $this->db->select("COALESCE(SUM(a.jumlah*a.harga),0) as total,COALESCE ( SUM( a.jumlah ), 0 ) AS jumlah,,COALESCE ( SUM( a.bagasi_pnp ), 0 ) AS bagasi_pnp ");
        // $this->db->select("COALESCE(SUM(a.total),0) as total,COALESCE ( SUM( a.jumlah ), 0 ) AS jumlah ");
            $this->db->from("ref_setoran_detail_pnp a");
            $this->db->join("ref_setoran_detail b", "a.id_setoran_detail = b.id_setoran_detail AND a.id_setoran = b.id_setoran","left");
            $this->db->where('a.id_setoran', $id_setoran);
            $this->db->where_in('a.id_setoran_detail', $id_setoran_detail);
            $this->db->where('b.status_udj',1);
            $data = $this->db->get();
            $total = $data->row("total");
            $jml_pnp = $data->row("jumlah");
            $bagasi_pnp = $data->row("bagasi_pnp");

            if($total==0){
                $udj_pengemudi = 0;
            }else{
                $jml_biaya_titipan = ($asuransi_trayek*$jml_pnp)+($this->asuransi_dan_biaya_titipan($id_setoran,$id_setoran_detail));

                //khusus pangkal pinang dan banjarmasin
                if ($id_bu ==13 || $id_bu ==18) {
                    $udj_pengemudi = ($total-$jml_biaya_titipan-($this->komisi_agen_pangkal_pinang($id_setoran,$id_bu)))+$pend_refund;
            //khusus Purwokerto
                }else if($id_bu==22){
                    $udj_pengemudi = ($total)+$pend_refund;
                    //khusus Jambi
                }else if($id_bu==9){
                    $udj_pengemudi = ($total+$bagasi_pnp)+$pend_refund;
                }else{
                    $udj_pengemudi = ($total-$jml_biaya_titipan)+$pend_refund;
                }


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

    public function udj_bagasi_agen_pontianak($id_setoran)
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
            $this->db->where('a.jenis_penjualan_pnp',3);
            $data = $this->db->get();
            $total = $data->row("bagasi_pnp");

            $udj_bagasi = $total*0.1;
            return $udj_bagasi;
        }else{
            return 0;
        }
    }

    public function asuransi_dan_biaya_titipan($id_setoran,$id_setoran_detail)
    {
        $data_array = array('23', '22', '24');

        $this->db->select("COALESCE(SUM(a.total),0) as total");
        $this->db->from("ref_setoran_detail_beban a");
        $this->db->join("ref_setoran_detail b", "a.id_setoran_detail = b.id_setoran_detail AND a.id_setoran = b.id_setoran","left");
        $this->db->where('a.id_setoran', $id_setoran);
        $this->db->where_in('a.id_setoran_detail', $id_setoran_detail);
        $this->db->where_in('a.id_jenis', $data_array);
        $this->db->where('b.status_udj',1);
        $this->db->where('a.status_jenis_beban',1);
        $total = $this->db->get()->row("total");
        return $total;
    }

// public function data_setoran_detail_pnp($id_setoran)
// {
//   $this->db->select("a.*,b.nm_point_awal,b.nm_point_akhir,
//      CASE WHEN jenis_penjualan_pnp=1 THEN a.jumlah ELSE '' END AS damri_apps,
//      CASE WHEN jenis_penjualan_pnp=2 THEN a.jumlah ELSE '' END AS ota,
//      CASE WHEN jenis_penjualan_pnp=3 THEN a.jumlah ELSE '' END AS agen,
//      CASE WHEN jenis_penjualan_pnp=4 THEN a.jumlah ELSE '' END AS loket,
//      CASE WHEN jenis_penjualan_pnp=5 THEN a.jumlah ELSE '' END AS awak_bus");
//   $this->db->from("ref_setoran_detail_pnp a");
//   $this->db->join("ref_trayek b","b.kd_trayek=a.kd_trayek","left");
//   $this->db->where('a.id_setoran', $id_setoran);
//   $this->db->order_by('a.id_setoran_detail', 'ASC');
//   $data_setoran_detail_pnp = $this->db->get()->result();
//   return $data_setoran_detail_pnp;
// }

    public function data_setoran_detail_pnp($id_setoran)
    {
      $this->db->select("a.*,b.nm_point as nm_point_awal,c.nm_point as nm_point_akhir,
       CASE WHEN jenis_penjualan_pnp=1 THEN a.jumlah ELSE '' END AS damri_apps,
       CASE WHEN jenis_penjualan_pnp=2 THEN a.jumlah ELSE '' END AS ota,
       CASE WHEN jenis_penjualan_pnp=3 THEN a.jumlah ELSE '' END AS agen,
       CASE WHEN jenis_penjualan_pnp=4 THEN a.jumlah ELSE '' END AS loket,
       CASE WHEN jenis_penjualan_pnp=5 THEN a.jumlah ELSE '' END AS awak_bus,
       CASE WHEN jenis_penjualan_pnp=6 THEN a.jumlah ELSE '' END AS kantor_pemasaran");
      $this->db->from("ref_setoran_detail_pnp a");
      $this->db->join("ref_point b","b.kd_point=a.asal","left");
      $this->db->join("ref_point c","c.kd_point=a.tujuan","left");
      $this->db->where('a.id_setoran', $id_setoran);
      $this->db->order_by('a.rit', 'ASC');
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
    $this->db->where_in("jenis_penjualan_pnp",array(1,2));
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

public function komisi_agen_pangkal_pinang($id_setoran,$id_bu)
{
    $this->db->select("COALESCE((sum(a.jumlah*a.harga)*0.1),0) as total_agen");
    $this->db->from("ref_setoran_detail_pnp a");
    $this->db->join("ref_setoran b","a.id_setoran=b.id_setoran","left");
    $this->db->where('a.id_setoran', $id_setoran);
    $this->db->where('b.id_bu', $id_bu);
    $this->db->where('a.jenis_penjualan_pnp',3);
    $query = $this->db->get();

    return $query->row()->total_agen;
}

}
