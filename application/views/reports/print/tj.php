<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
  <?php
  $tanggal  = $this->input->get("tanggal");
  $id_bu    = $this->input->get("id_bu");
  $id_segment = $this->input->get("id_segment");
  
  $armada   = $this->input->get("armada");

  $tanggal  = $tanggal ? $tanggal : date("Y-m-d");
  $tahun    = explode("-",$tanggal)[0];

  
  

  if($id_segment=='0'){
    $query_segment = "";
    $nm_segment = "SELURUH SEGMEN";
  }else{
    $query_segment = "AND b.kd_segmen='$id_segment'";
    $nm_segment = $this->input->get("id_segment");
  }

  $session = $this->session->userdata('login');


  if($id_bu == 0 || empty($id_bu)){
    $query_id_bu = "";
  }else{
    $query_id_bu = "AND d.id_bu='$id_bu'";
  }

  if($id_bu == 0 || empty($id_bu)){
    $query_armada = "";
  }else{
    $query_armada = "AND a.armada='$armada'";
  }





  $general_manager   = $this->model_reports->general_manager($id_bu);
  $manager_usaha     = $this->model_reports->manager_usaha($id_bu);
  ;?>
  <title>REKAP TJ</title>
  <style>

    .container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
    }

    .item {
      background-color: #ffffff;
      padding: 10px;
      margin: 5px;
      border-radius: 5px;
      display: flex;
      justify-content: center;
    }

    th{
      background : #f5daa9;
    }
  </style>
</head>
<body>
  <h3 align="center">
    <span>REKAPITULASI KORIDOR 1 DAN 8</span>
  </h3>
  <table width="100%" style="font-size:14px">
    <tr>
      <td style="font-weight:bold;width:10%">Tanggal</td>
      <td style="font-weight:bold;width:1%">:</td>
      <td style="font-weight:bold;width:90%"><?=tgl_indo($tanggal)?></td>
    </tr>
    <tr>
      <td style="font-weight:bold">Segmen</td>
      <td style="font-weight:bold">:</td>
      <td style="font-weight:bold"><?=ucwords($nm_segment);?></td>
    </tr>

  </table>
  


  <?php if($armada != 0) {?>
  <table width="100%" rules="all" border="1" cellpadding="0" cellspacing="0" style="font-size:12px">
    <thead>
      <tr><th align="center" colspan="7">REKAP</th></tr>
      <tr>
        <th rowspan="2">NO BODY</th>
        <th rowspan="2">NO</th>
        <th rowspan="2">JAM</th>
        <th>TRIP / RUTE</th>
        <th rowspan="2">KM BAKU / ISI</th>
        <th rowspan="2">EMPTY</th>
        <th rowspan="2">RUPIAH/KM BAKU</th>
      </tr>
      <tr>
        <th>DAMRI 1 & 8</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=0;

    // AND a.armada IS NOT NULL 

      $query = "
      select a.tanggal, a.armada, a.kd_trayek, c.km_trayek,c.km_empty,c.harga
      from ref_setoran_detail_pnp a 
      left join ref_setoran_detail b on a.id_setoran_detail = b.id_setoran_detail 
      LEFT JOIN ref_trayek c ON a.kd_trayek = c.kd_trayek
      join ref_bu d on b.id_bu = d.id_bu 
      where 
      b.tanggal='$tanggal'
      $query_segment
      $query_id_bu $query_armada
      order by CASE
      WHEN a.rit=1 THEN 1
      WHEN a.rit=2 THEN 2
      WHEN a.rit=3 THEN 3
      WHEN a.rit=4 THEN 4
      WHEN a.rit=5 THEN 5
      WHEN a.rit=6 THEN 6
      WHEN a.rit=7 THEN 7
      WHEN a.rit=8 THEN 8
      WHEN a.rit=9 THEN 9
      WHEN a.rit=10 THEN 10
      WHEN a.rit=11 THEN 11
      WHEN a.rit=12 THEN 12
      WHEN a.rit=13 THEN 13
      WHEN a.rit=14 THEN 14
      WHEN a.rit=15 THEN 15
      WHEN a.rit=16 THEN 16
      WHEN a.rit=17 THEN 17
      WHEN a.rit=18 THEN 18
      WHEN a.rit=19 THEN 19
      WHEN a.rit=20 THEN 20
      ELSE 21
      END, a.id_setoran_pnp ASC
      ";

      $jml_pnp = $jml_km = $jml_total = $jml_empty = 0;
      $sql = $this->db->query($query);

      $count_satu = $sql->num_rows();

      foreach ($sql->result() as $row) { ?>
      <tr>
        <td style="font-size:12px;text-align:center;"><?=$row->armada;?></td>
        <td style="font-size:12px;text-align:center;"><?=$no+=1;?></td>
        <td style="font-size:12px;text-align:center;"></td>
        <td style="font-size:12px;text-align:center;"><?=$row->kd_trayek;?></td>
        <td style="font-size:12px;text-align:center;"><?=number_format($row->km_trayek,0,',','.');?></td>
        <td style="font-size:12px;text-align:center;"><?=number_format($row->km_empty,0,',','.');?></td>
        <td style="font-size:12px;text-align:right;"><?=number_format($row->km_trayek*$row->harga,0,',','.');?></td>
      </tr>
      <?php
      $jml_km += $row->km_trayek;
      $jml_empty += $row->km_empty;
      $jml_total += ($row->km_trayek*$row->harga);
    } ?>
  </tbody>
  <tfoot>
    <tr style="height: 15px">
      <th></th>
      <th align="center" colspan="3">TOTAL</th>
      <th style="font-size:12px;text-align:center;"><?=number_format($jml_km,0,',','.');?></th>
      <?php if($count_satu!=0){ ?>
      <th style="font-size:12px;text-align:center;"><?=number_format(20,0,',','.');?></th>
      <?php }else { ?>
      <th style="font-size:12px;text-align:center;"><?=number_format(0,0,',','.');?></th>
      <?php } ?>
      <th style="font-size:12px;text-align:right;"><?=number_format($jml_total,0,',','.');?></th>
    </tr>
  </tfoot>
</table>

<br>
<br>

<?php } else { ?>

<div class="container">
  <?php
  $nomor_b=0;
  $armada_sbu = $this->model_reports->combobox_armada_sbu();
  foreach ($armada_sbu->result() as $row) { 

    $armada_use = $row->kd_armada;
    ?>
    <div class="item">
      <table width="100%" rules="all" border="1" cellpadding="0" cellspacing="0" style="font-size:12px;">
        <thead>
          <tr><th align="center" colspan="7">REKAP <?=($nomor_b+=1);?></th></tr>
          <tr>
            <th rowspan="2">NO BODY</th>
            <th rowspan="2">NO</th>
            <th rowspan="2">JAM</th>
            <th>TRIP / RUTE</th>
            <th rowspan="2">KM BAKU / ISI</th>
            <th rowspan="2">EMPTY</th>
            <th rowspan="2">RUPIAH/KM BAKU</th>
          </tr>
          <tr>
            <th>DAMRI 1 & 8</th>
          </tr>
        </thead>


        <tbody>
          <tr>
            <td style="font-size:12px;text-align:center;"><b><?=$armada_use;?> (<?=$row->plat_armada;?>)</b></td>
            <td style="font-size:12px;text-align:center;"></td>
            <td style="font-size:12px;text-align:center;"></td>
            <td style="font-size:12px;text-align:center;"></td>
            <td style="font-size:12px;text-align:center;"></td>
            <td style="font-size:12px;text-align:center;"></td>
            <td style="font-size:12px;text-align:center;"></td>
          </tr>

          <?php 
          $nomor=0;
          $query_in = "
          select a.tanggal, a.armada, a.kd_trayek, c.km_trayek,c.km_empty,c.harga
          from ref_setoran_detail_pnp a 
          left join ref_setoran_detail b on a.id_setoran_detail = b.id_setoran_detail 
          LEFT JOIN ref_trayek c ON a.kd_trayek = c.kd_trayek
          join ref_bu d on b.id_bu = d.id_bu 
          where 
          b.tanggal='$tanggal' 
          AND a.armada='$armada_use'
          $query_segment
          $query_id_bu
          order by CASE
          WHEN a.rit=1 THEN 1
          WHEN a.rit=2 THEN 2
          WHEN a.rit=3 THEN 3
          WHEN a.rit=4 THEN 4
          WHEN a.rit=5 THEN 5
          WHEN a.rit=6 THEN 6
          WHEN a.rit=7 THEN 7
          WHEN a.rit=8 THEN 8
          WHEN a.rit=9 THEN 9
          WHEN a.rit=10 THEN 10
          WHEN a.rit=11 THEN 11
          WHEN a.rit=12 THEN 12
          WHEN a.rit=13 THEN 13
          WHEN a.rit=14 THEN 14
          WHEN a.rit=15 THEN 15
          WHEN a.rit=16 THEN 16
          WHEN a.rit=17 THEN 17
          WHEN a.rit=18 THEN 18
          WHEN a.rit=19 THEN 19
          WHEN a.rit=20 THEN 20
          ELSE 21
          END, a.id_setoran_pnp ASC
          ";
          $jml_pnp_2 = $jml_km_2 = $jml_total_2 = $jml_empty_2 = 0;
          $sql_2 = $this->db->query($query_in);

          $count_dua = $sql_2->num_rows();

          foreach ($sql_2->result() as $row_b) { ?>
          <tr>
            <td style="font-size:12px;text-align:center;"></td>
            <td style="font-size:12px;text-align:center;"><?=$nomor+=1;?></td>
            <td style="font-size:12px;text-align:center;"></td>
            <td style="font-size:12px;text-align:center;"><?=$row_b->kd_trayek;?></td>
            <td style="font-size:12px;text-align:center;"><?=number_format($row_b->km_trayek,0,',','.');?></td>
            <td style="font-size:12px;text-align:center;"><?=number_format($row_b->km_empty,0,',','.');?></td>
            <td style="font-size:12px;text-align:right;"><?=number_format($row_b->km_trayek*$row_b->harga,0,',','.');?></td>
          </tr>
          <?php 

          $jml_km_2 += $row_b->km_trayek;
          $jml_empty_2 += $row_b->km_empty;
          $jml_total_2 += ($row_b->km_trayek*$row_b->harga);

        } ?>
        <tr style="height: 15px">
          <th></th>
          <th align="center" colspan="3">TOTAL</th>
          <th style="font-size:12px;text-align:center;"><?=number_format($jml_km_2,0,',','.');?></th>
          <?php if($count_dua!=0){ ?>
          <th style="font-size:12px;text-align:center;"><?=number_format(20,0,',','.');?></th>
          <?php }else { ?>
          <th style="font-size:12px;text-align:center;"><?=number_format(0,0,',','.');?></th>
          <?php } ?>
          <th style="font-size:12px;text-align:right;"><?=number_format($jml_total_2,0,',','.');?></th>
        </tr>

      </tbody>

    </table>
  </div>


  <?php } ?>
</div>

<br>
<br>

<table width="100%" rules="all" border="1" cellpadding="0" cellspacing="0" style="font-size:12px;">
  <tr>
    <th rowspan="2">NO BODY</th>
    <th colspan="3">KM</th>
    <th rowspan="2">TRIP</th>
    <th rowspan="2">RUPIAH</th>
  </tr>
  <tr>
    <th>PRODUKSI</th>
    <th>EMPTY</th>
    <th>TEMPUH</th>
  </tr>

  <?php 
  $query_inn = "
  select a.armada, SUM(c.km_trayek) AS km_trayek,c.km_empty,c.harga,count(distinct a.rit) rit
  from ref_setoran_detail_pnp a 
  left join ref_setoran_detail b on a.id_setoran_detail = b.id_setoran_detail 
  LEFT JOIN ref_trayek c ON a.kd_trayek = c.kd_trayek
  join ref_bu d on b.id_bu = d.id_bu 
  where 
  b.tanggal='$tanggal'
  $query_segment
  $query_id_bu
  GROUP BY a.armada

  ";
  $jml_pnp_3 = $jml_km_3 = $jml_total_3 = $jml_empty_3 = $jml_rit_3 = 0;
  $sql_3 = $this->db->query($query_inn);
  foreach ($sql_3->result() as $row_c) { ?>
  <tr>
    <td style="font-size:12px;text-align:center;"><?=$row_c->armada;?></td>
    <td style="font-size:12px;text-align:center;"><?=number_format($row_c->km_trayek,0,',','.');?></td>
    <td style="font-size:12px;text-align:center;"><?=number_format(20,0,',','.');?></td>
    <td style="font-size:12px;text-align:center;"><?=number_format(($row_c->km_trayek+20),0,',','.');?></td>
    <td style="font-size:12px;text-align:center;"><?=$row_c->rit;?></td>
    <td style="font-size:12px;text-align:right;"><?=number_format(($row_c->km_trayek+20)*$row_c->harga,0,',','.');?></td>
  </tr>
  <?php 

  $jml_km_3     += $row_c->km_trayek;
  $jml_empty_3  += 20;
  $jml_rit_3    += $row_c->rit;
  $jml_total_3  += ($row_c->km_trayek+20)*$row_c->harga;

} ?>

<tr>
  <th style="font-size:12px;text-align:center;">TOTAL</th>
  <th style="font-size:12px;text-align:center;"><?=number_format($jml_km_3,0,',','.');?></th>
  <th style="font-size:12px;text-align:center;"><?=number_format($jml_empty_3,0,',','.');?></th>
  <th style="font-size:12px;text-align:center;"><?=number_format(($jml_km_3+$jml_empty_3),0,',','.');?></th>
  <th style="font-size:12px;text-align:center;"><?=number_format($jml_rit_3,0,',','.');?></th>
  <th style="font-size:12px;text-align:right;"><?=number_format($jml_total_3,0,',','.');?></th>
</tr>

</table>


<?php } ?>


<table width="100%" align="center"  cellspacing="0">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">Mengetahui <br>General Manager</td>
    <td align="center" valign="top">Menyetujui<br><?=$manager_usaha['posisi'];?></td>
    <td align="center" valign="top"><?=ucwords($cabang_kota).", ".tgl_indo($tanggal);?><br>Pembuat Daftar</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><b><?=$general_manager['nm_pegawai'];?></b></u><br>NIK. <?=$general_manager['nik_pegawai'];?></td>
    <td align="center"><u><b><?=$manager_usaha['nm_pegawai'];?></b></u><br>NIK. <?=$manager_usaha['nik_pegawai'];?></td>
    <td align="center"><u><b><?=$session['nm_user'];?></b></u><br>NIK. <?=$session['username'];?></td>
  </tr>
</table>
</body>
<html>