<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$combo 		= $this->input->get('combo');
	$kode 		= $combo==1 || $combo==2 ? $this->input->get("pengeluaran") : "";

	$tanggal 	= $this->input->get("tanggal");
	$kontrol 	= $this->input->get("kontrol");
	$kontrol 	= $kontrol ? $kontrol : $tanggal;
	$bulan_periode 	= " (a.tgl_setoran between '$tanggal' and '$kontrol')";

	$id_segment = $this->input->get("id_segment");
	$kd_segment = $this->model_reports->get_info("kd_segment","ref_segment","id_segment",$id_segment);
	$nm_segment = $this->model_reports->get_info("nm_segment","ref_segment","id_segment",$id_segment);

	$kd_trayek 	= $this->input->get("kd_trayek");
	// $kd_trayek 	= $combo==1 ? "" : $kd_trayek;

	$pengeluaran = $this->input->get("pengeluaran");
	$id_segment = $this->input->get("id_segment");
	$tahun 		= explode("-",$tanggal)[0];
	$bulan 		= explode("-",$tanggal)[1];
	$hari 		= explode("-",$tanggal)[2];
	$nomor 		= $hari." / ".$kd_segment;

	if(!$tanggal) exit("<script>setTimeout(window.close,0)</script>");

	if($kd_trayek=='0'){
		$query_trayek = "";
	}else if($kd_trayek==''){
		$query_trayek = "";
	}else{
		$query_trayek = "AND a.kd_trayek='$kd_trayek'";
	}

	$session = $this->session->userdata('login');
	if($session['id_bu']=='60'){
		$query_id_bu = "";
	}else{
		$query_id_bu = "AND a.id_bu=".$session['id_bu'];
	}

	$general_manager   = $this->model_reports->general_manager($session['id_bu']);
	$manager_usaha     = $this->model_reports->manager_usaha($session['id_bu']);
	;?>
	<title>REPORT AK/2-<?=strtoupper($nm_segment)." (".tgl_indo($tanggal).")";?> </title>
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
			<span style="text-decoration:underline">DAFTAR PEMBAYARAN BIAYA OPERASIONAL BUS <?=strtoupper($nm_segment);?></span>
			<br/><?=ucwords($cabang_kota).", ".tgl_indo($this->input->get("tanggal"))?>
		</h3>
		<b>PERUM DAMRI CABANG <?=strtoupper($cabang_nama);?></b>
		<table width="100%" rules="all" border="1" cellpadding="0" cellspacing="0" style="font-size:12px">
			<tr>
				<th>NO</th>
				<th>KODE</th>
				<th>BBM</th>
				<th>UANG MAKAN</th>
				<th>UDJ</th>
				<th>BONUS</th>
				<th>TPR</th>
				<th>KOMISI</th>
				<th>CUCI</th>
				<th>SNACK</th>
				<th>TOL</th>
				<th>Boarding Pass</th>
				<th>Bongkar Muat</th>
				<th>Uang Ritase</th>
				<th>TOTAL</th>
			</tr>
			<tr>
				<th width="4%">1</th>
				<th width="6%">2</th>
				<th width="7%">3</th>
				<th width="7%">4</th>
				<th width="7%">5</th>
				<th width="7%">6</th>
				<th width="7%">7</th>
				<th width="7%">8</th>
				<th width="7%">9</th>
				<th width="7%">10</th>
				<th width="7%">11</th>
				<th width="7%">12</th>
				<th width="7%">13</th>
				<th width="7%">14</th>
				<th width="7%">15</th>
			</tr>
			<?php 
			$no=0;
			$query = "select a.id_setoran_detail,a.armada,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=7)bbm,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=14)uang_makan,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=18)udj,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=8)bonus,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=13)tpr,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=15)komisi,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=9)cuci,

			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=10)snack,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=12)tol,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=19)boarding_pass,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=16)bongkar_muat,
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=21)uang_ritase,
			(
			(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=7)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=14)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=18)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=8)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=13)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=15)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=9)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=10)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=12)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=19)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=16)+(select COALESCE(sum(total),0) AS total from ref_setoran_detail_beban where id_setoran_detail=a.id_setoran_detail and id_jenis=21)
			)total_all
			from ref_setoran_detail a
			where 
			$bulan_periode 
			AND a.kd_segmen='$kd_segment'
			$query_trayek $query_id_bu
			";
			$jml_bbm = $jml_uang_makan = $jml_udj = $jml_bonus = $jml_tpr = $jml_komisi = $jml_cuci = $jml_snack = $jml_tol = $jml_boarding_pass = $jml_bongkar_muat = $jml_uang_ritase = $jml_total_all = 0;
			$sql = $this->db->query($query);
			foreach($sql->result() as $row) {
				?>
				<tr>
					<td align="center"><?=$no+=1?></td>
					<td align="center"><?=$row->armada?></td>
					<td align="right"><?=number_format($bbm = $row->bbm,0,',','.')?></td>
					<td align="right"><?=number_format($uang_makan = $row->uang_makan,0,',','.')?></td>
					<td align="right"><?=number_format($udj = $row->udj,0,',','.')?></td>
					<td align="right"><?=number_format($bonus = $row->bonus,0,',','.')?></td>
					<td align="right"><?=number_format($tpr = $row->tpr,0,',','.')?></td>
					<td align="right"><?=number_format($komisi = $row->komisi,0,',','.')?></td>
					<td align="right"><?=number_format($cuci = $row->cuci,0,',','.')?></td>
					<td align="right"><?=number_format($snack = $row->snack,0,',','.')?></td>
					<td align="right"><?=number_format($tol = $row->tol,0,',','.')?></td>
					<td align="right"><?=number_format($boarding_pass = $row->boarding_pass,0,',','.')?></td>
					<td align="right"><?=number_format($bongkar_muat = $row->bongkar_muat,0,',','.')?></td>
					<td align="right"><?=number_format($uang_ritase = $row->uang_ritase,0,',','.')?></td>
					<td align="right"><?=number_format($total_all = $row->total_all,0,',','.')?></td>
				</tr>
				<?php 
				$jml_bbm += $row->bbm; 			$jml_uang_makan += $row->uang_makan;
				$jml_udj += $row->udj; 			$jml_bonus += $row->bonus;
				$jml_tpr += $row->tpr; 			$jml_komisi += $row->komisi;
				$jml_cuci += $row->cuci; 		$jml_snack += $row->snack;
				$jml_tol += $row->tol; 			$jml_boarding_pass += $row->boarding_pass;
				$jml_bongkar_muat += $row->bongkar_muat; 	$jml_uang_ritase += $row->uang_ritase;
				$jml_total_all += $row->total_all;
			} ?>
			<tr>
				<th align="center" colspan="2">JUMLAH</th>
				<th align="right"><?=number_format($jml_bbm,0,',','.');?></th>
				<th align="right"><?=number_format($jml_uang_makan,0,',','.');?></th>
				<th align="right"><?=number_format($jml_udj,0,',','.');?></th>
				<th align="right"><?=number_format($jml_bonus,0,',','.');?></th>
				<th align="right"><?=number_format($jml_tpr,0,',','.');?></th>
				<th align="right"><?=number_format($jml_komisi,0,',','.');?></th>
				<th align="right"><?=number_format($jml_cuci,0,',','.');?></th>
				<th align="right"><?=number_format($jml_snack,0,',','.');?></th>
				<th align="right"><?=number_format($jml_tol,0,',','.');?></th>
				<th align="right"><?=number_format($jml_boarding_pass,0,',','.');?></th>
				<th align="right"><?=number_format($jml_bongkar_muat,0,',','.');?></th>
				<th align="right"><?=number_format($jml_uang_ritase,0,',','.');?></th>
				<th align="right"><?=number_format($jml_total_all,0,',','.');?></th>
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
		$pengeluaran 	= $this->input->get("pengeluaran");
		$ket_komponen 	= $this->model_reports->get_info("keterangan","ref_komponen","id_komponen",$pengeluaran);

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

		$query = "select sum(a.total) as total from ref_setoran_detail_beban a
		left join ref_setoran_detail b on b.id_setoran_detail=a.id_setoran_detail
		where a.id_jenis='$pengeluaran' AND b.kd_segmen='$kd_segment' AND b.tgl_setoran='$tanggal' AND b.id_bu='".$session['id_bu']."' $query_trayek";
		$total_pendapatan = $this->db->query($query)->row("total");
		?>
		<div class="box">
			<div class="box-header">
				<div class="box-header-vertikal">
					<div class="vertical-text">
						<h3>PERUSAHAAN UMUM DAMRI</h3>
						<h3>(PERUM DAMRI)</h3>
						<p style="font-size: 14px;">CABANG <?=strtoupper($cabang_nama);?></p>
						<p><?=strtoupper($cabang_kota);?></p>
					</div>
				</div>
			</div>
			<div class="box-body">
				<h2 style="text-align: center; margin-bottom: 15px;">BUKTI KAS PENGGANTI KWITANSI (BKPK)</h2>
				<table style="margin-left:0">
					<tr>
						<td width="100" align="left"> </td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							/ CAB&nbsp;&nbsp;/&nbsp;&nbsp;<?=strtoupper($cabang_nama);?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$this->model_reports->bulan_romawi($bulan)?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$tahun;?></td>
						</tr>
					</div>
					<div align ="right"> AK-2 &nbsp;&nbsp; </div>
					<tr>
						<td>Terima Dari</td>
						<td>:</td>
						<td>PERUM DAMRI CABANG <?=strtoupper($cabang_nama);?></td>
					</tr>
					<tr>
						<td align="left">Sejumlah</td>
						<td>:</td>
						<td style="background:#37b9df"><?=terbilang($total_pendapatan);?> Rupiah</td>
					</tr>
					<tr>
						<td>Untuk</td>
						<td>:</td>
						<td><?=$ket_komponen." ".strtoupper($nm_segment)." (data terlampir)";?></td>
					</tr>
				</table>
				<div class="box-persetujuan">
					<div>TELAH DIUJI DAN SETUJU DIBAYAR</div>
					<div style="margin-bottom: 20px;">General Manager</div>
					<div style="text-decoration: underline;"><?=ucwords($general_manager['nm_pegawai']);?></div>
					<div>NIK. <?=$general_manager['nik_pegawai'];?></div>
				</div>
				<div class="box-harga">
					<table class="table-harga">
						<tr>
							<td style="border-right: 1px solid #fff;">Terbilang:</td>
							<td align="right">Rp <?=number_format($total_pendapatan,0,',','.')?></td>
							<!-- <td colspan="2" style="font-weight:bold" align="center">LUNAS</td> -->
						</tr>
						<tr>
							<td style="border: 1px solid #fff; border-right: 1px solid #000"></td>
							<td align="left">PP &nbsp;: &nbsp;&nbsp;&nbsp;</td>
							<!-- <td width="50px">Kasir</td>
								<td width="50px">&nbsp;</td> -->
							</tr>
						</table>
						<br/><label style="color:grey">*telah di bukukan kasir  dengan nomor urut  pada notice kasir</label>
					</div>
					<div class="box-pengurus">
						<td align="center"><?=ucwords($cabang_kota).", ".tgl_indo($tanggal);?></td>
						<div style="margin-bottom: 20px;">Yang Mengurus</div><br>
						<div>
							<u><?=$session['nm_user']?></u>
							<br>NIK. <?=$session['username']?></div>
						</div>
					</div>
				<?php } ?>
			</body>
			<html>