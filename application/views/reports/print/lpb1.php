<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$tanggal = $this->input->get("tanggal");
	$tanggal = $tanggal ? $tanggal : date("Y-m-d");
	$year = explode("-",$tanggal)[0];

	$bulan = $this->input->get("bulan");
	$bulan_periode = " (month(tgl_absensi)='$bulan')";
	$tahun = explode("-",$tanggal)[0];
	$tPERIODE = "Bulan";
	$vPERIODE = bulan($bulan)." ".$tahun;
	$endDate = date("t",MKtime(0,0,0,$bulan,1,$year));

	$id_segment = $this->input->get("id_segment");
	$nm_segment = $this->model_reports->get_info("nm_segment","ref_segment","id_segment",$id_segment);
	?>
	<?php
	$day	= date("d");
	$bulancetak = $this->input->get("bulan");
	$tahuncetak = $this->input->get("tahun");
	$endDate = date("t",MKtime(0,0,0,$bulancetak,$day,$tahuncetak));

	$session = $this->session->userdata('login');
	if($session['id_bu']=='60'){
		$query_id_bu = "";
	}else{
		$query_id_bu = "AND a.id_bu=".$session['id_bu'];
	}

	$general_manager   = $this->model_reports->general_manager($session['id_bu']);
	$manager_usaha     = $this->model_reports->manager_usaha($session['id_bu']);
	?>
	<title>Laporan LP/B1 <?=strtoupper($nm_segment);?>(usaha)</title>
	<style>
	th{
		background : #ccc;
	}
</style>
</head>
<body>
	<table width="100%" width="100%" cellpadding="0" cellspacing="0" style="font-size:13px">
		<tr>
			<td width="25%"></td>
			<td width="50%"></td>
			<td width="25%"></td>
		</tr>
		<tr>
			<td style="font-size:15px;font-weight:bold" rowspan="3" align="center">
				PERUSAHAAN UMUM DAMRI
				<br/>(PERUM DAMRI)
				<br/>CABANG : <?=strtoupper($cabang_nama);?>
			</td>
			<td style="font-size:15px;font-weight:bold" align="center">
				LAPORAN KONDISI KENDARAAN DINAS OPERASIONAL
				<br>BULAN <?=strtoupper($vPERIODE)?>
			</td>
			<td align="center">&nbsp;</td>
		</tr>
	</table><br>
<table border="1" width="100%" rules="all" cellspacing="0" style="font-size:12px">
	<thead>
	<tr>
		<th rowspan="3" width="2%"><b>No</th>
		<th rowspan="3" align="center"><b>JENIS<br><b>KENDARAAN</th>
		<th rowspan="3" align="center"><b>MEREK</th>
		<th rowspan="3" align="center"><b>JENIS PELAYANAN</th>
		<th colspan="2" align="center"><b>NOMOR</th>
		<th rowspan="3" align="center"><b>DAYA<br>MUAT</th>
		<th rowspan="3" align="center"><b>HARI<br>JALAN</th>
		<th colspan="6" align="center"><b>HARI TIDAK JALAN</th>
		<th colspan="5" align="center"><b>SURAT SURAT KENDARAAN SAMPAI DENGAN TANGGAL</th>
		
	</tr>
	<tr>
		<th rowspan="2" align="center"><b>POLISI</th>
		<th rowspan="2" align="center"><b>KODE</th>
		<th colspan="3" align="center"><b>TEKNIS</th>
		<th colspan="3" align="center"><b>NON TEKNIK</th>
		<th rowspan="2" align="center"><b>STNK</th>
		<th rowspan="2" align="center"><b>KEUR</th>
		<th rowspan="2" align="center"><b>IJIN USAHA</th>
		<th rowspan="2" align="center"><b>TRAYEK/KPS</th>
		<th rowspan="2" align="center"><b>ASS JASA RAHARJA</th>
		
	</tr>
	<tr>
		<th align="center"><b>S</th>
		<th align="center"><b>RR</th>
		<th align="center"><b>RB</th>
		<th align="center"><b>HTP</th>
		<th align="center"><b>HTSK</th>
		<th align="center"><b>HTOM</th>
	</tr>
	</thead>
	<?php 
	$bulan_plus = $bulancetak+1;
	$qry_armada = "SELECT a.id_armada, a.tahun_armada, a.nm_ukuran, a.id_bu,
	concat( a.nm_merek, ' ', a.tipe_armada ) as merek_tipe, a.nm_layanan, a.plat_armada, a.kd_armada, a.seat_armada, b.tgl_exp_stnk,
(SELECT count(status) from tr_absensi_armada where status=2 and kd_armada=a.kd_armada and id_bu=a.id_bu and $bulan_periode) hj
	 FROM ref_armada a 
	LEFT JOIN ref_armada_stnk b ON a.kd_armada = b.kd_armada 
	AND a.seat_armada > 0 WHERE a.active in ('0','1') AND a.id_segment ='$id_segment' $query_id_bu GROUP BY a.kd_armada";
	$sql_armada = $this->db->query($qry_armada);
	$Jhj = $Jua = $Js = $Jrr = $Jrb = $Jjmlt = $Jhtp = $Jhtsk = $Jhthm = $Jjmlu = $Jsg = $Jsgo = $Jso = $Ja = $jumHJ = 0;
	$b =0;
	foreach($sql_armada->result_array() as $row){
		$b++;
		$id_armada = $row["id_armada"];
						$tahun_armada = $row["tahun_armada"];
						$nm_ukuran = $row["nm_ukuran"];
						$merek_tipe = $row["merek_tipe"];
						$nm_layanan = $row["nm_layanan"];
						$plat_armada = $row["plat_armada"];
						$kd_armada = $row['kd_armada'];
						$seat_armada = $row["seat_armada"];

						$tgl_exp_stnk = $row["tgl_exp_stnk"];
						$hj = $row["hj"];
	?>
	<tr>
		<td align="center"><?=$b?></td>
		<td align="center"><?=$nm_ukuran?></td>
		<td align="center"><?=$merek_tipe?></td>
		<td align="center"><?=$nm_layanan?></td>
		<td align="center"><?=$plat_armada?></td>
		<td align="center"><?=$kd_armada?></td>
		<td align="center"><?=$seat_armada?></td>
		
		<td align="center"><?=$hj?></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
	</tr>
	<?php 
	$jumHJ += $hj;
	} 
	?>
	<tr>
		<td style="border-right:1px dashed #aba"></td>
		<td colspan="5" style="border-left:none"><b>JUMLAH</b></td>
		<td align="center"><b></b></td>
		<td align="center"><b><?=$jumHJ;?></b></td>
		<td align="center"><b></b></td>
		<td align="center"><b></b></td>
		<td align="center"><b></b></td>
		<td align="center"><b></b></td>
		<td align="center"><b></b></td>
		<td align="center"><b></b></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
		<td align="center"></td>
	</tr>
</table><br>
<table style="font-size:12px">
	<tr>
		<td align=left>Sumber Data dari :</td>
	</tr>
	<tr>
		<td align=left>AP/6 (Absen Kendaraan)<br>dan surat-surat kendaraan</td>
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