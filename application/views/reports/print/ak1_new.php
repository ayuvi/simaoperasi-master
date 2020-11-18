<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$session = $this->session->userdata('login');
	$id_bu 		= $this->input->get("id_bu");
	$id_segment = $this->input->get("id_segment");
	$kd_trayek 	= $this->input->get("kd_trayek");
	$tanggal 	= $this->input->get("tanggal");
	$kontrol 	= $this->input->get("kontrol");
	$combo 		= $this->input->get('combo');
	$kode 		= $combo==1 || $combo==2 ? $this->input->get("penerimaan") : "";


	$alamat_bu 	= $this->model_reports->get_info("alamat","ref_bu","id_bu",$id_bu);
	$nama_bu 	= $this->model_reports->get_info("nm_bu","ref_bu","id_bu",$id_bu);
	$kota_bu 	= $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu);
	$telp_bu 	= $this->model_reports->get_info("Telp","ref_bu","id_bu",$id_bu);

	$kontrol 		= $kontrol ? $kontrol : $tanggal;
	$bulan_periode 	= " (a.tanggal between '$tanggal' and '$kontrol')";

	$kd_segment = $this->model_reports->get_info("kd_segment","ref_segment","id_segment",$id_segment);
	$nm_segment = $this->model_reports->get_info("nm_segment","ref_segment","id_segment",$id_segment);

	$tahun 		= explode("-",$tanggal)[0];
	$bulan 		= explode("-",$tanggal)[1];
	$hari 		= explode("-",$tanggal)[2];
	$nomor 		= $hari." / ".$kd_segment;
	$bulan_romawi = $this->model_reports->bulan_romawi($bulan);

	if(!$tanggal) exit("<script>setTimeout(window.close,0)</script>");

	if($kd_trayek=='0'){
		$query_trayek = "";
	}else if($kd_trayek==''){
		$query_trayek = "";
	}else{
		$query_trayek = "AND a.kd_trayek='$kd_trayek'";
	}

	if($id_bu!='0' || $id_bu!='60' || $id_bu!='61' || $id_bu!='62' || $id_bu!='63' || $id_bu!='64' || $id_bu!='65'){
		$query_id_bu = "AND a.id_bu=".$id_bu;
	}else{
		$query_id_bu = "";
	}

	$general_manager   = $this->model_reports->general_manager($id_bu);
	$manager_usaha     = $this->model_reports->manager_usaha($id_bu);

	$kasir   		 = $this->model_reports->kasir($id_bu);
	;?>
	<title>REPORT BKM-<?=strtoupper($nm_segment)." (".tgl_indo($tanggal).")";?> </title>
	<style type="text/css">
		th {
			background : #ccc;
		}
		h1,h2,h3,h4,h5,h6,p {
			margin: 0;
		}
		.box {
			/*outline: 1px solid red;*/
			width: auto;
			overflow: 700px;
		}
		.box-header {
			width: 100px;
			float: left;
			margin-right: 10px;
			/*outline: 1px solid green;*/

		}
		.box-header-vertikal {
			border: 3px solid black;
			height: 300px;
			border-radius: 10px;
			padding-left: 7px;
		}
		.vertical-text {
			transform: rotate(-90deg);
			transform-origin: left top 0;
			text-align: center;
			margin-top: 300px;
			width: 300px;
		}
		.box-body {
			margin-left: 100px;
			/*outline: 1px solid blue;*/
		}
		.box-persetujuan{
			border: 2px solid #000000;
			font-size: 12px;
			width: 180px;
			margin-left: 10px;
			margin-top: 10px;
			text-align: center;
		}
		.box-cetakan{
			border: 2px solid #000000;
			font-size: 12px;
			width: 50px;
			margin-left: 540px;
			margin-top: 10px;
			text-align: center;
		}
		.table-harga {
			border-collapse: collapse;
			width: 350px;
			margin-top: 10px;
		}
		.table-harga,
		.table-harga tr,
		.table-harga td {
			border: 1px solid black;
		}
		.box-pengurus {
			float: right;
			margin-top: -80px;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php if($combo==3){ ?>
	<h3 align="center">
		<span style="text-decoration:underline">REKAP PENERIMAAN UPP. <?=strtoupper($nm_segment);?></span>
		<br/><?=ucwords($nama_bu).", ".tgl_indo($this->input->get("tanggal"))?>
	</h3>
	<b>PERUM DAMRI CABANG <?=strtoupper($nama_bu);?></b>
	<table width="100%" rules="all" border="1" cellpadding="0" cellspacing="0" style="font-size:12px">
		<tr>
			<th colspan="2">NOMOR URUT</th>
			<th rowspan="2">NAMA CREW BUS</th>
			<th rowspan="2">JURUSAN</th>
			<th colspan="2">PNP</th>
			<th rowspan="2">UPP Kotor Sesuai LMB</th>
			<th rowspan="2">As. JRaharja<br/>(PP.____________)</th>
			<th rowspan="2">UPP Bersih <br/>(PP.____________)</th>
			<th rowspan="2">PAKET<br/>(PP.____________)</th>
			<th rowspan="2">Titipan PPh Udj (PP.____________)</th>
			<th rowspan="2">Titipan PPh Agen (PP.____________)</th>
		</tr>
		<tr>
			<th>NO</th>
			<th>KODE</th>
			<th>Dws</th>
			<th>Ank</th>
		</tr>
		<tr>
			<th width="4%">1</th>
			<th width="6%">2</th>
			<th width="15%">3</th>
			<th width="10%">4</th>
			<th width="5%">5</th>
			<th width="5%">6</th>
			<th width="8%">7</th>
			<th width="8%">8</th>
			<th width="8%">9</th>
			<th width="8%">10</th>
			<th width="8%">11</th>
			<th width="8%">11</th>
		</tr>
		<?php 
		$no=0;
		$query = "select a.id_setoran_detail,a.armada, b.nm_pegawai as driver1, c.nm_pegawai as driver2,a.kd_trayek,
		(select sum(jumlah) from ref_setoran_detail_pnp where id_setoran_detail=a.id_setoran_detail)jumlah_pnp,
		(select sum(jumlah*harga) from ref_setoran_detail_pnp where id_setoran_detail=a.id_setoran_detail)total,
		(select sum(bagasi_pnp) from ref_setoran_detail_pnp where id_setoran_detail=a.id_setoran_detail)bagasi_pnp,
		(select sum(jumlah)*60 from ref_setoran_detail_pnp where id_setoran_detail=a.id_setoran_detail)asuransi,
		(select sum(total) from ref_setoran_detail_pend where id_setoran_detail=a.id_setoran_detail and id_jenis=2)pph_udj,
		(select sum(total) from ref_setoran_detail_pend where id_setoran_detail=a.id_setoran_detail and id_jenis=5)pph_agen
		from ref_setoran_detail a
		left join hris.ref_pegawai b on b.id_pegawai=a.driver1
		left join hris.ref_pegawai c on c.id_pegawai=a.driver2
		where 
		$bulan_periode 
		AND a.kd_segmen='$kd_segment'
		$query_trayek $query_id_bu
		";
		$jml_pnp = $jml_upp_lmb = $jml_asuransi = $jml_upp_bersih = $jml_bagasi_pnp = $jml_pph_udj = $jml_pph_agen = 0;
		$sql = $this->db->query($query);
		foreach($sql->result() as $row) {
			?>
			<tr>
				<td align="center"><?=$no+=1?></td>
				<td align="center"><?=$row->armada?></td>
				<td align="center"><?=$row->driver1."/".$row->driver2?></td>
				<td align="center">
					<?php
					$sql_trayek = "SELECT kd_trayek from ref_setoran_detail_pnp where id_setoran_detail =".$row->id_setoran_detail." group by kd_trayek";
					$sql2 = $this->db->query($sql_trayek);
					foreach($sql2->result() as $row2){
						echo $row2->kd_trayek."<br>";
					} ?>
				</td>

				<td align="center"><?=number_format($row->jumlah_pnp,0,',','.')?></td>
				<td align="center"><?=number_format(0,0,',','.')?></td>
				<td align="center"><?=number_format($row->total,0,',','.')?></td>
				<td align="center"><?=number_format($row->asuransi,0,',','.')?></td>
				<td align="center"><?=number_format(($row->total-$row->asuransi),0,',','.')?></td>
				<td align="center"><?=number_format($row->bagasi_pnp,0,',','.')?></td>
				<td align="center"><?=number_format($row->pph_udj,0,',','.')?></td>
				<td align="center"><?=number_format($row->pph_agen,0,',','.')?></td>
			</tr>
			<?php 
			$jml_pnp += $row->jumlah_pnp; 		$jml_upp_lmb += $row->total;
			$jml_asuransi += $row->asuransi; 	$jml_upp_bersih += ($row->total-$row->asuransi);
			$jml_pph_udj += $row->pph_udj; 		$jml_pph_agen += $row->pph_agen;
			$jml_bagasi_pnp += $row->bagasi_pnp;
		} ?>
		<tr>
			<th align="center" colspan="4">JUMLAH</th>
			<th align="right"><?=number_format($jml_pnp,0,',','.')?></th>
			<th align="right"><?=0?></th>
			<th align="right"><?=number_format($jml_upp_lmb,0,',','.')?></th>
			<th align="right"><?=number_format($jml_asuransi,0,',','.')?></th>
			<th align="right"><?=number_format($jml_upp_bersih,0,',','.')?></th>
			<th align="right"><?=number_format($jml_bagasi_pnp,0,',','.')?></th>
			<th align="right"><?=number_format($jml_pph_udj,0,',','.')?></th>
			<th align="right"><?=number_format($jml_pph_agen,0,',','.')?></th>
		</tr>
	</table>
	<table width="100%" align="center"  cellspacing="0"><br>
		<tr>
			<td align="center" valign="top">GENERAL MANAGER</td>
			<td>&nbsp;</td>
			<td align="center" valign="top">PEMBUAT DAFTAR</td>
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
			<td align="center"><u><b><?=ucwords($general_manager['nm_pegawai']);?></b></u><br>NIK. <?=$general_manager['nik_pegawai'];?></td>
			<td>&nbsp;</td>
			<td align="center" ><u><b><?=ucwords($session['nm_user']);?></b></u><br>NIK. <?=$session['username'];?></td>
		</tr>
	</table>


	<?php }else if($combo==1 || $combo==2){ 
		$penerimaan 	= $this->input->get("penerimaan");
		$ket_komponen 	= $this->model_reports->get_info("keterangan","ref_komponen","id_komponen",$penerimaan);

		if($combo==1){
			$query_trayek = "";
		}else{
			if($kd_trayek=='0'){
				$query_trayek = "";
			}else if($kd_trayek==''){
				$query_trayek = "";
			}else{
				$query_trayek = "AND b.kd_trayek='$kd_trayek'";
			}
		}

		if($penerimaan==3){ //Asuransi
			$query = "select (sum(a.jumlah))*60 as total from ref_setoran_detail_pnp a
			left join ref_setoran_detail b on b.id_setoran_detail=a.id_setoran_detail
			where b.kd_segmen='$kd_segment' AND b.tanggal='$tanggal' AND b.id_bu='".$id_bu."' $query_trayek";
		}else if($penerimaan==4){ //Penumpang
			$query = "select sum(a.harga*a.jumlah) as total from ref_setoran_detail_pnp a
			left join ref_setoran_detail b on b.id_setoran_detail=a.id_setoran_detail
			where b.kd_segmen='$kd_segment' AND b.tanggal='$tanggal' AND b.id_bu='".$id_bu."' $query_trayek";
		}else if($penerimaan==1){ //Bagasi
			$query = "select sum(a.bagasi_pnp) as total from ref_setoran_detail_pnp a
			left join ref_setoran_detail b on b.id_setoran_detail=a.id_setoran_detail
			where b.kd_segmen='$kd_segment' AND b.tanggal='$tanggal' AND b.id_bu='".$id_bu."' $query_trayek";
		}else if($penerimaan==5){ //PPH Agen
			$query = "
			select SUM(b.komisi_agen)*0.02 total
			from rpt_udj b
			where b.kd_segmen='$kd_segment' AND b.tanggal='$tanggal' AND b.id_bu='".$id_bu."' $query_trayek";
		}else{			
			$query = "select sum(a.total) as total from ref_setoran_detail_pend a
			left join ref_setoran_detail b on b.id_setoran_detail=a.id_setoran_detail
			where a.id_jenis='$penerimaan' AND b.kd_segmen='$kd_segment' AND b.tanggal='$tanggal' AND b.id_bu='".$id_bu."' $query_trayek";
		}


		$total_pendapatan = $this->db->query($query)->row("total");
		?>

		<div class="box">
			<table style="border-collapse:collapse;" width="100%" align="center" border="0">
				<tr>
					<td width="40%" align="left" style="font-size:14px;text-align: center;border-left:3px solid black;border-top:3px solid black;padding: 7px">
						<img src="<?=base_url('assets/img/logos.png');?>" alt="Perum DAMRI" height="20" width="100"><br/>
						Kantor Cabang <?=$nama_bu;?><br/>
						<?=$alamat_bu;?><br/>
						<?=$telp_bu;?>
					</td>
					<td width="70%" align="left" style="font-size:14px;border-top:3px solid black;border-right:3px solid black">
					</td>
				</tr>
			</table>
			<table style="border-collapse:collapse;" width="100%" align="center" border="0">
				<tr>
					<td width="100%" align="center" style="font-size:16px;border-left:3px solid black;border-right:3px solid black">
						<b>BUKTI KAS MASUK</b><br />
					</td>
				</tr>
				<tr>
					<td width="100%" align="center" style="font-size:16px;border-left:3px solid black;border-right:3px solid black">
						<b>Nomor : .............../ <?=strtoupper($nama_bu);?>/KM/<?=$bulan_romawi;?>-2020</b><br />
					</td>
				</tr>
			</table>
			<table style="border-collapse:collapse;" width="100%" align="center" border="0">
				<tr>
					<td width="15%" align="left" style="font-size:14px;border-left:3px solid black;padding-left: 5px">
						<b>Sejumlah</b><br />
					</td>
					<td width="2%">:</td>
					<td width="83%" align="left" style="font-size:14px;background:#c2fff6;border-right:3px solid black;">
						<?=terbilang($total_pendapatan);?> Rupiah<br/>
					</td>
				</tr>
				<tr>
					<td style="border-left:3px solid black;"></td>
					<td></td>
					<td style="font-size:14px;background:#fcfcfc;border-right:3px solid black"></td>
				</tr>
				<tr>
					<td width="15%" align="left" style="font-size:14px;border-left:3px solid black;padding-left: 5px">
						<b>Terima dari</b><br />
					</td>
					<td width="2%">:</td>
					<td width="83%" align="left" style="font-size:14px;background:#c2fff6;border-right:3px solid black">
						PERUM DAMRI CABANG <?=strtoupper($nama_bu);?><br />
					</td>
				</tr>
				<tr>
					<td style="border-left:3px solid black;padding-left: 5px"></td>
					<td></td>
					<td style="font-size:14px;background:#fcfcfc;border-right:3px solid black"></td>
				</tr>
				<tr>
					<td width="15%" align="left" style="font-size:14px;border-left:3px solid black;padding-left: 5px">
						<b>Perihal</b><br />
					</td>
					<td width="2%">:</td>
					<td width="83%" align="left" style="font-size:14px;background:#c2fff6;border-right:3px solid black">
						<?=$ket_komponen." ".strtoupper($nm_segment)." (data terlampir)";?><br />
					</td>
				</tr>
			</table>
			<table style="border-collapse:collapse;" width="100%" align="center" border="0">
				<tr>
					<td width="25%" align="left" style="font-size:14px;border-left:3px solid black;padding: 5px">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;">
						<b></b><br />
					</td>
					<td width="25%" align="center" style="font-size:14px;border-right:3px solid black">
						<b></b><br />
					</td>
				</tr>
				<tr>
					<td width="25%" align="left" style="font-size:14px;border-left:3px solid black;padding: 5px">
						<b></b><br />
					</td>
					<td width="25%" align="center" style="font-size:14px;">
						Telah diuji dan setujui,<br />
					</td>
					<td width="25%" align="center" style="font-size:14px;border-right:3px solid black">
						<?=ucwords($kota_bu).", ".tgl_indo($tanggal);?><br />
					</td>
				</tr>

				<tr>
					<td width="25%" align="left" style="font-size:14px;border: 1px solid black; border-left:3px solid black;padding-left: 5px">
						<b style="background:#c2fff6;">Rp. <?=number_format($total_pendapatan,0,',','.');?></b><br/>
					</td>
					<td width="25%" align="center" style="font-size:14px;">
						<b>GENERAL MANAGER</b><br />
					</td>
					<td width="25%" align="center" style="font-size:14px;border-right:3px solid black">
						<b><?=$kasir['posisi'];?></b><br />
					</td>
				</tr>
				<tr>
					<td width="25%" align="left" style="font-size:14px;border-left:3px solid black;padding-left: 5px">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;border-right:3px solid black">
						<b></b><br />
					</td>
				</tr>
				<tr>
					<td width="25%" align="left" style="font-size:14px;border-left:3px solid black;padding-left: 5px">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;border-right:3px solid black">
						<b></b><br />
					</td>
				</tr>
				<tr>
					<td width="25%" align="left" style="font-size:14px;border-left:3px solid black;padding-left: 5px">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;border-right:3px solid black">
						<b></b><br />
					</td>
				</tr>
				<tr>
					<td width="25%" align="left" style="font-size:14px;border: 1px solid black;border-left:3px solid black;padding-left: 5px">
						<b></b><br />
					</td>
					<td width="25%" align="center" style="font-size:14px;">
						<b><?=ucwords($general_manager['nm_pegawai']);?></b><br/>
					</td>
					<td width="25%" align="center" style="font-size:14px;border-right:3px solid black">
						<?=$kasir['nm_pegawai']?><br/>
					</td>
				</tr>
				<tr>
					<td width="25%" align="left" style="font-size:14px;border-left:3px solid black;border-bottom:3px solid black;padding-left: 5px">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;border-bottom:3px solid black;">
						<b></b><br />
					</td>
					<td width="25%" align="left" style="font-size:14px;border-bottom:3px solid black;border-right:3px solid black">
						<b></b><br />
					</td>
				</tr>
			</table>
		</div>
		<?php } ?>
	</body>
	<html>