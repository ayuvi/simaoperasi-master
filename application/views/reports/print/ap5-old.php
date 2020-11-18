<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$combo 		= $this->input->get('combo');
	$tanggal 	= $this->input->get("tanggal");
	$id_bu 		= $this->input->get("id_bu");

	$tanggal 	= $tanggal ? $tanggal : date("Y-m-d");

	if($combo==2){
		$bulan 			= $this->input->get("bulan");
		// $bulan_periode 	= "(month(a.tanggal)='$bulan')";
		$bulan_periode 	= "(month(a.tgl_setoran)='$bulan')";
		$tahun 			= explode("-",$tanggal)[0];
		$tPERIODE 		= "Bulan";
		$vPERIODE 		= bulan($bulan)." ".$tahun;
	}elseif($combo==1){
		$periode_awal 	= $this->input->get("periode_awal");
		$periode_akhir 	= $this->input->get("periode_akhir");
		// $bulan_periode 	= " (a.tanggal between '$periode_awal' and '$periode_akhir')";
		$bulan_periode 	= " (a.tgl_setoran between '$periode_awal' and '$periode_akhir')";
		$tPERIODE 		= "Periode";
		$vPERIODE 		= tgl_indo($periode_awal)." s/d ".tgl_indo($periode_akhir);
	}
	$id_segment = $this->input->get("id_segment");
	// $nm_segment = $this->model_reports->get_info("nm_segment","ref_segment","id_segment",$id_segment);
	
	$kd_trayek 	= $this->input->get("kd_trayek");
	$tryk 		= $this->input->get("kd_trayek");

	if($kd_trayek !='0' || $kd_trayek !=''){
		$nm_point_awal 	= $this->model_reports->get_info("nm_point_awal","ref_trayek","kd_trayek",$kd_trayek);
		$nm_point_akhir = $this->model_reports->get_info("nm_point_akhir","ref_trayek","kd_trayek",$kd_trayek);
		$km_trayek 		= $this->model_reports->get_info("km_trayek","ref_trayek","kd_trayek",$kd_trayek);
	}

	if($kd_trayek=='0'){
		$query_trayek = "";
	}else if($kd_trayek==''){
		$query_trayek = "";
	}else{
		// $query_trayek = "AND a.kd_trayek='$kd_trayek'";
		$query_trayek = "AND b.kd_trayek='$kd_trayek'";
	}


	if($id_segment=='0'){
		$query_segment = "";
		$nm_segment = "SELURUH SEGMEN";
	}else{
		$query_segment = "AND b.kd_segmen='$id_segment'";
		$nm_segment = $this->input->get("id_segment");
	}

	$session = $this->session->userdata('login');
	// if($session['id_bu']=='60'){
	// 	$query_id_bu = "";
	// }else{
	// 	$query_id_bu = "AND b.id_bu=".$session['id_bu'];
	// }

	// if($id_bu == 0 || empty($id_bu)){
	// 	$query_id_bu = "";
	// }else if($id_bu == 61){
	// 	$query_id_bu = "AND c.id_bu in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17)";
	// }else if($id_bu == 62){
	// 	$query_id_bu = "AND c.id_bu in (18,19,20,21,22,23,24,25,26,27,28)";
	// }else if($id_bu == 63){
	// 	$query_id_bu = "AND c.id_bu in (29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,50)";
	// }else if($id_bu == 64){
	// 	$query_id_bu = "AND c.id_bu in (45,46,48,49,51,52,53,54,55,56,57,58,59)";
	// }else{
	// 	$query_id_bu = "AND c.id_bu='$id_bu'";
	// }

	if($id_bu == 0 || empty($id_bu)){
		$query_id_bu = "";
	}else if($id_bu == 61){
		$query_id_bu = "AND c.id_divre=1";
	}else if($id_bu == 62){
		$query_id_bu = "AND c.id_divre=2";
	}else if($id_bu == 63){
		$query_id_bu = "AND c.id_divre=3";
	}else if($id_bu == 64){
		$query_id_bu = "AND c.id_divre=4";
	}else{
		$query_id_bu = "AND c.id_bu='$id_bu'";
	}



	$general_manager   = $this->model_reports->general_manager($session['id_bu']);
	$manager_usaha     = $this->model_reports->manager_usaha($session['id_bu']);
	;?>
	<title>AP/5 - <?=strtoupper($nm_segment);?> (usaha)</title>
	<style>
		th{
			background : #6495ED;
		}
	</style>
</head>
<body>
	<h3 align="center">
		<span>JUMLAH KENDARAAN <?=strtoupper($nm_segment);?></span>
		<br/>JUMLAH RIT / HARI
		<br/>TARIP / PNP
	</h3>
	<table width="100%" style="font-size:14px">
		<tr>
			<td style="font-weight:bold;width:10%"><?=$tPERIODE?></td>
			<td style="font-weight:bold;width:1%">:</td>
			<td style="font-weight:bold;width:90%"><?=$vPERIODE?></td>
		</tr>

		<?php if($tryk=="0" || $tryk==""){ ?>
		<tr>
			<td style="font-weight:bold">Segmen</td>
			<td style="font-weight:bold">:</td>
			<td style="font-weight:bold"><?=ucwords($nm_segment);?></td>
		</tr>
		<?php }else{ ?>
		<tr>
			<td style="font-weight:bold">Trayek</td>
			<td style="font-weight:bold">:</td>
			<td style="font-weight:bold"><?=$nm_point_awal." - ".$nm_point_akhir?> (PP)</td>
		</tr>
		<tr>
			<td style="font-weight:bold">Panjang</td>
			<td style="font-weight:bold">:</td>
			<td style="font-weight:bold"><?=$km_trayek?> KM</td>
		</tr>
		<?php } ?>

	</table>
	<table width="100%" rules="all" border="1" cellpadding="0" cellspacing="0" style="font-size:12px">
		<tr>
			<th rowspan="3">NO</th>
			<th rowspan="3">CABANG</th>
			<th rowspan="3">TGL</th>
			<th rowspan="3">TRAYEK</th>
			<th colspan="2">NOMOR</th>
			<th rowspan="3">DAYA MUAT</th>
			<th colspan="3">BANYAKNYA</th>
			<th rowspan="3">TARIF PNP - ORG/UMUM</th>
			<th colspan="3">PENDAPATAN</th>
			<!-- <th rowspan="3">ASURANSI PNP</th> -->
			<th rowspan="3">UPP BERSIH</th>
		</tr>
		<tr>
			<th rowspan="2">CODE BUS</th>
			<th rowspan="2">POLISI</th>
			<th rowspan="2">RIT</th>
			<th rowspan="2">KM</th>
			<th>JUMLAH</th>
			<th rowspan="2">PNP</th>
			<th rowspan="2">BGS</th>
			<th rowspan="2">JUMLAH</th>
		</tr>
		<tr>
			<th>PNP-ORG</th>
		</tr>
		<tr>
			<th width="3%">1</th>
			<th width="7%">2</th>
			<th width="5%">3</th>
			<th width="5%">4</th>
			<th width="5%">5</th>
			<th width="5%">6</th>
			<th width="2%">7</th>
			<th width="2%">8</th>
			<th width="5%">9</th>
			<th width="5%">10</th>
			<th width="10%">11</th>
			<th width="5%">12</th>
			<th width="10%">13</th>
			<th width="5%">13</th>
			<th width="10%">14</th>
		</tr>

		<?php 
		$no=0;
		// $query = "
		// select SUM(a.rit) rit, a.tanggal, a.armada, a.kd_trayek, SUM(a.km_trayek) km_trayek, SUM(a.jumlah) jumlah, a.harga, SUM(a.bagasi_pnp) bagasi_pnp ,SUM(a.total) total, c.plat_armada,c.seat_armada, d.nm_bu
		// from ref_setoran_detail_pnp a 
		// left join ref_setoran_detail b on a.id_setoran_detail = b.id_setoran_detail 
		// left join ref_armada c on a.armada = c.kd_armada 
		// left join ref_bu d on b.id_bu = d.id_bu 
		// where 
		// $bulan_periode 
		// AND a.armada IS NOT NULL AND b.kd_segmen='$nm_segment'
		// $query_trayek $query_id_bu
		// GROUP BY a.tanggal,a.kd_trayek, a.armada

		// order by b.id_bu, a.tanggal, a.armada,  CASE
		// WHEN a.rit='1' THEN 1
		// WHEN a.rit='2' THEN 2
		// WHEN a.rit='3' THEN 3
		// WHEN a.rit='4' THEN 4
		// WHEN a.rit='5' THEN 5
		// WHEN a.rit='6' THEN 6
		// ELSE 7
		// END
		// ";

		// $query1 = "
		// SELECT
		// a.id_setoran,a.tgl_setoran as tanggal, a.id_bu, b.nm_bu, a.armada,c.plat_armada,c.seat_armada,
		// COALESCE ( ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran = a.id_setoran ), 0 ) AS rit,
		// ( SELECT kd_trayek FROM ref_setoran_detail WHERE id_setoran=a.id_setoran limit 1) as kd_trayek,
		// COALESCE ((select sum(km_trayek) from ref_setoran_detail WHERE id_setoran=a.id_setoran),0) km_trayek,
		// COALESCE ((select sum(jumlah) from ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran),0) jumlah,
		// COALESCE ((select harga from ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran limit 1),0) harga,
		// COALESCE ((select SUM(bagasi_pnp) from ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran limit 1),0) bagasi_pnp,
		// COALESCE ((select SUM(total) from ref_setoran_detail_pnp WHERE id_setoran=a.id_setoran limit 1),0) total
		// FROM
		// ref_setoran a
		// left join ref_bu b on b.id_bu = a.id_bu
		// left join ref_armada c on a.armada = c.kd_armada 
		// left join ref_setoran_detail d on d.id_setoran = a.id_setoran
		// WHERE $bulan_periode $query_trayek $query_id_bu $query_segment
		// ";

		$this->db->query("
		CREATE TEMPORARY TABLE IF NOT EXISTS detail_pnp_temp AS select 
		a.id_setoran,a.tgl_setoran AS tanggal, a.id_bu,
		COALESCE ( COUNT( DISTINCT e.rit ), 0 ) AS rit,
		COALESCE ( sum( e.km_trayek ), 0 ) AS km_trayek,
		COALESCE ( sum( e.jumlah ), 0 ) AS jumlah,
		COALESCE ( sum( e.harga ), 0 ) AS harga,
		COALESCE ( sum( e.bagasi_pnp ), 0 ) AS bagasi_pnp,
		COALESCE ( sum( e.total ), 0 ) AS total
		from ref_setoran a
		JOIN ref_setoran_detail_pnp e on e.id_setoran=a.id_setoran
		group by a.id_setoran");

		$query ="select a.id_setoran, a.tgl_setoran AS tanggal, b.kd_trayek, a.id_bu, c.nm_bu, a.armada, d.plat_armada, d.seat_armada, e.rit, e.km_trayek, e.jumlah, e.harga, e.bagasi_pnp, e.total
		from ref_setoran a
		join ref_setoran_detail b on a.id_setoran = b.id_setoran
		left join ref_bu c on a.id_bu = c.id_bu
		LEFT JOIN ref_armada d ON a.armada = d.kd_armada
		LEFT JOIN detail_pnp_temp e ON a.id_setoran = e.id_setoran
		WHERE $bulan_periode $query_trayek $query_id_bu $query_segment
		GROUP BY a.id_setoran";

		$jml_pnp = $jml_pnp_tarif = $jml_bagasi = $jml_total = $jml_asuransi = $jml_total_asuransi = 0;
		$sql = $this->db->query($query);
		foreach ($sql->result() as $row) { ?>
		<tr>
			<td align="center"><?=$no+=1;?></td>
			<td align="center"><?=$row->nm_bu;?></td>
			<td align="center"><?=$row->tanggal;?></td>
			<td align="center"><?=$row->kd_trayek;?></td>
			<td align="center"><?=$row->armada;?></td>
			<td align="center"><?=$row->plat_armada;?></td>
			<td align="right"><?=$row->seat_armada;?></td>
			<td align="right"><?=$row->rit;?></td>
			<td align="right"><?=$row->km_trayek;?></td>
			<td align="right"><?=number_format($row->jumlah,0,',','.');?></td>
			<td align="right"><?=number_format($row->harga,0,',','.');?></td>
			<td align="right"><?=number_format($row->jumlah*$row->harga,0,',','.');?></td>
			<td align="right"><?=number_format($row->bagasi_pnp,0,',','.');?></td>
			<td valign="top" align="right"><?=number_format($row->total,0,',','.');?></td>
			<td valign="top" align="right"><?=number_format($row->total,0,',','.');?></td>
		</tr>
		<?php
		$jml_pnp 		+= $row->jumlah;
		$jml_pnp_tarif 	+= $row->jumlah*$row->harga;
		$jml_bagasi 	+= $row->bagasi_pnp;
		$jml_total 		+= $row->total;
		$jml_asuransi 	+= ($row->jumlah*60);
		$jml_total_asuransi += ($row->total+($row->jumlah*60));
	} ?>
	<tr>
		<td align="center" colspan="7"><b>JUMLAH</b></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="right"><b><?=number_format($jml_pnp,0,',','.');?></b></td>
		<td align="center"></td>
		<td align="right"><b><?=number_format($jml_pnp_tarif,0,',','.');?></b></td>
		<td align="right"><b><?=number_format($jml_bagasi,0,',','.');?></b></td>
		<td valign="top" align="right"><b><?=number_format($jml_total,0,',','.');?></b></td>
		<!-- <td valign="top" align="right"><b><?=number_format($jml_asuransi,0,',','.');?></b></td> -->
		<td valign="top" align="right"><b><?=number_format($jml_total_asuransi,0,',','.');?></b></td>
	</tr>
</table>
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