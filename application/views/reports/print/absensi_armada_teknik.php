<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$tanggal = $this->input->get("tanggal");
	$tanggal = $tanggal ? $tanggal : tgl_hari_ini();

	$bulan 			= $this->input->get("bulan");
	$bulan_periode 	= " (month(tgl_absensi)='$bulan')";
	$tahun 			= $this->input->get("tahun");
	$tPERIODE 		= "Bulan";
	$vPERIODE 		= bulan($bulan)." ".$tahun;
	$jumlah_hari 	= date("t",mktime(0,0,0,$bulan,1,$tahun));
	$jumlah_sampai 	= $jumlah_hari;
	$awal_hari 		= 1;

	$id_bu 			= $this->input->get("id_cabang");
	$nm_bu 			= $this->model_reports->get_info("nm_bu","ref_bu","id_bu",$id_bu);
	$kota_bu 		= $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu);
	?>

	<title>Absensi Armada <?=ucwords($nm_bu);?></title>
	<style>
		th{
			background : #ccc;
		}
	</style>
</head>
<body>
	<h3 align="center">
		<span>ABSENSI ARMADA (TEKNIK) <?=strtoupper($nm_bu);?></span>
		<br/>
	</h3>
	<table width="100%" style="font-size:14px">
		<tr>
			<td style="font-weight:bold;width:10%"><?=$tPERIODE?></td>
			<td style="font-weight:bold;width:1%">:</td>
			<td style="font-weight:bold;width:90%"><?=$vPERIODE?></td>
		</tr>
	</table>
	<table border="1" rules="all" width="100%" style="font-size:12px">
		<tr>
			<th rowspan="2" width="3%">No</th>
			<th rowspan="2" width="7%">Armada</th>
			<th rowspan="2" width="9%">Nopol</th>
			<th colspan="<?=$jumlah_hari?>" width="60%">Tanggal</th>
			<th rowspan="2" width="3%">Total</th>
			<th rowspan="2" width="3%">RB</th>
			<th rowspan="2" width="3%">RR</th>
			<th rowspan="2" width="3%">S</th>
			<th rowspan="2" width="3%">SGO</th>
			<th rowspan="2" width="3%">Keterangan</th>
		</tr>
		<tr>
			<?php for($x=$awal_hari;$x<=$jumlah_sampai;$x++){ ?>
			<th width="2%"><?=$x?></th>
			<?php } ?>
		</tr>
		<?php
		$qry_hadir = "select *,day(tgl_absensi)hari from tr_absensi_armada_teknik where $bulan_periode and id_bu=".$id_bu;
		$sql_hadir = $this->db->query($qry_hadir);
		$exec_hadir = $sql_hadir->result_array();
		foreach($exec_hadir as $data_hadir){
			extract($data_hadir);
			$absen[$kd_armada][$hari] = $status;
			$info[$kd_armada][$hari] = $keterangan;
		}
		$qry_armada = "select * from ref_armada where id_bu='$id_bu' and active in (0,1) order by nm_segment asc";
		$sql_armada = $this->db->query($qry_armada);
		$exec_armada = $sql_armada->result_array();
		$urut = 0;
		$total_all_rb = $total_all_rr = $total_all_s = $total_all_sgo = 0;
		foreach($exec_armada as $data_armada){
			$urut++;
			extract($data_armada);
			?>
			<tr>
				<td align="center"><?=$urut?></td>
				<td><?=$kd_armada?></td>
				<td><?=$nm_segment?></td>

				<?php
				$tot[$kd_armada] = $rb[$kd_armada] = $rr[$kd_armada] = $s[$kd_armada]  = $sgo[$kd_armada] = $t_ket[$kd_armada] = 0;
				for($x=$awal_hari;$x<=$jumlah_sampai;$x++){
					$hari = $x;
					$poin = isset($absen[$kd_armada][$hari]) ? $absen[$kd_armada][$hari] : 0;
					if($poin==1){
						$kehadiran = "RB";
						$info_hadir = "RB";
						$rb[$kd_armada] += 1;
					}
					if($poin==2){
						$kehadiran = "RR";
						$info_hadir = "RR";
						$rr[$kd_armada] += 1;
					}
					if($poin==3){
						$kehadiran = "S";
						$info_hadir = "S";
						$s[$kd_armada] += 1;
					}
					if($poin==4){
						$kehadiran = "SGO";
						$info_hadir = "SGO";
						$sgo[$kd_armada] += 1;
					}
					if($poin==0){
						$kehadiran = "-";
						$info_hadir = "Tanpa Keterangan";
						$t_ket[$kd_armada] += 1;
					}

					$tot[$kd_armada] += 1;
					$informasi = isset($info[$kd_armada][$hari]) ? $info[$kd_armada][$hari] : "";
					?>
					<td align=center title="<?=$info_hadir." : ".$informasi?>"><label><?=$kehadiran?></label></td>
					<?php } ?>
					<td align=right><?=$tot[$kd_armada]?></td>
					<td align=right><?=$rb[$kd_armada]?></td>
					<td align=right><?=$rr[$kd_armada]?></td>
					<td align=right><?=$s[$kd_armada]?></td>
					<td align=right><?=$sgo[$kd_armada]?></td>
					<td align=right></td>
					<!-- <td><?=$htp[$kd_armada]?"Cuti ".$htp[$kd_armada]." Hari":""?></td> -->
				</tr>
				<?php
				$total_all_rb +=$rb[$kd_armada];
				$total_all_rr +=$rr[$kd_armada];
				$total_all_s +=$s[$kd_armada];
				$total_all_sgo +=$sgo[$kd_armada];
			}
			?>
			<tr>
				<td></td>
				<td colspan="2" align="center"><b>TOTAL</b></td>
				<td colspan="<?=$jumlah_sampai;?>"></td>
				<td></td>
				<td align=right><b><?=$total_all_rb;?></b></td>
				<td align=right><b><?=$total_all_rr;?></b></td>
				<td align=right><b><?=$total_all_s;?></b></td>
				<td align=right><b><?=$total_all_sgo;?></b></td>
				<td align=right></td>
			</tr>
		</table>
		<table width="100%" align="center"  cellspacing="0">
			<?php
			$session = $this->session->userdata('login');
			$general_manager   = $this->model_reports->general_manager($id_bu);
			$manager_usaha     = $this->model_reports->manager_usaha($id_bu);
			?>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td align="center" valign="top">Mengetahui <br>General Manager</td>
				<td align="center" valign="top">Menyetujui<br><?=$manager_usaha['posisi'];?></td>
				<td align="center" valign="top"><?=$kota_bu;?> Tanggal : <?=tgl_indo($tanggal)?> <br>Pembuat Daftar</td>
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