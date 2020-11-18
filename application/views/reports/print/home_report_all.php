<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$id_bu 			= $this->input->get("id_bu");
	$tanggal_awal 	= $this->input->get("tanggal_awal");
	$tanggal_akhir 	= $this->input->get("tanggal_akhir");
	$id_segment 	= $this->input->get("id_segment");
	$nm_bu 			= $this->model_reports->get_info("nm_bu","ref_bu","id_bu",$id_bu);

	$start 		= new DateTime($tanggal_awal);
	$end 		= new DateTime($tanggal_akhir);
	$jarak 		= $start->diff($end);
	if($tanggal_awal==$tanggal_akhir){
		$jumlah_hari = 1;
	}else{
		$jumlah_hari = $jarak->d;
	}

	if($id_bu == 0){
		$ket_bu ="SELURUH CABANG";
		$query_id_bu = "";
	}else{
		$ket_bu ="Cabang ".$nm_bu;
		$query_id_bu = "AND b.id_bu='$id_bu'";
	}

	if($id_segment == 0){
		$nm_segment = "SELURUH SEGMENT";
	}else{		
		$nm_segment = $this->model_reports->get_info("kd_segment","ref_segment","id_segment",$id_segment);
	}

	if($tanggal_awal==$tanggal_akhir){
		$periode=tgl_indo($tanggal_awal);
	}else{
		$periode=tgl_indo($tanggal_awal)." - ".tgl_indo($tanggal_akhir);
	}




//BUAT FOREACH TANGGAL
	$begin 		= new DateTime($tanggal_awal);
	$end 		= new DateTime($tanggal_akhir);
	$end->add(new DateInterval('P1D'));
	$end 		= $end->format('Y-m-d');
	$end_date 	= new DateTime($end);
	$interval 	= DateInterval::createFromDateString('1 day');
	$period 	= new DatePeriod($begin, $interval, $end_date);


	//JARAK HARI
	$start 		= new DateTime($tanggal_awal);
	$ends 		= new DateTime($tanggal_akhir);
	$jarak 		= $start->diff($ends);
	if($tanggal_awal==$tanggal_akhir){
		$jumlah_hari = 1;
	}else{
		$jumlah_hari = ($jarak->d)+1;
	}

	?>

	<title>REPORT OPERASIONAL SIMAOPERASI</title>
	<style>
		th{
			background : #ccc;
		}
	</style>
</head>
<body>
	<h3 align="center">
		<span>REPORT OPERASIONAL</span>
		<br/>
	</h3>
	
	<table width="100%" style="font-size:14px">
		<tr>
			<td style="font-weight:bold;width:10%">CABANG</td>
			<td style="font-weight:bold;width:1%">:</td>
			<td style="font-weight:bold;width:90%"><?=$ket_bu?></td>
		</tr>
		<tr>
			<td style="font-weight:bold;width:10%">SEGMENT</td>
			<td style="font-weight:bold;width:1%">:</td>
			<td style="font-weight:bold;width:90%"><?=$nm_segment;?></td>
		</tr>
		<tr>
			<td style="font-weight:bold;width:10%">PERIODE</td>
			<td style="font-weight:bold;width:1%">:</td>
			<td style="font-weight:bold;width:90%"><?=$periode;?></td>
		</tr>
		<tr>
			<td style="font-weight:bold;width:10%"></td>
			<td style="font-weight:bold;width:1%"></td>
			<td style="font-weight:bold;width:90%"></td>
		</tr>
	</table>
	<table border="1" rules="all" width="100%" style="font-size:12px">
		<tr>
			<th width="5%">No</th>
			<th width="7%">TGL</th>
			<th width="10%">CABANG</th>
			<th width="5%">SEGMENT</th>
			<th width="5%">SGO</th>
			<th width="5%">SO</th>
			<th width="5%">HJ</th>
			<th width="5%">RIT</th>
			<th width="10%">KM</th>
			<th width="10%">PNP</th>
			<th width="10%">Pendapatan</th>
			<th width="10%">Biaya OP</th>
			<th width="10%">Surplus</th>
		</tr>
		<?php

		if($id_bu == 0 || empty($id_bu)){
			$where_bu = "";
		}else if($id_bu == 61){
			$where_bu = "AND id_divre=1";
		}else if($id_bu == 62){
			$where_bu = "AND id_divre=2";
		}else if($id_bu == 63){
			$where_bu = "AND id_divre=3";
		}else if($id_bu == 64){
			$where_bu = "AND id_divre=4";
		}else{
			$where_bu = "AND id_bu='$id_bu'";
		}

		if($id_segment == 0 || empty($id_segment)){$where_segment = "";}else{
			$where_segment 	= "AND id_segment='$id_segment'";
		}

		$query_bu = $this->db->query("select id_bu,nm_bu from ref_bu WHERE active=1 and id_bu not BETWEEN 60 and 65 $where_bu");
		$no = $total_sgo = $total_so = $total_hj = $total_rit = $total_km = $total_pnp = $total_upp = $total_biaya_op = $total_surplus = 0;

		foreach ($period as $dt) {
			$tanggal_setoran = $dt->format("Y-m-d");

			foreach ($query_bu->result() as $row) { 

				$query_segment = $this->db->query("select id_segment, kd_segment from ref_segment WHERE active=1 and id_segment not BETWEEN 9 and 11 $where_segment");
				foreach ($query_segment->result() as $row_segment) {
					$cabang_id = $row->id_bu;
					$segment_id = $row_segment->id_segment;


					//SGO
					$this->db->select("COUNT(status) as sgo");
					$this->db->from("tr_absensi_armada");
					$this->db->where_in('status', array(1,2));
					$this->db->where('id_bu', $cabang_id);
					$this->db->where('id_segment', $segment_id);
					$this->db->where("tgl_absensi = '$tanggal_setoran' ");
					$jumlah_sgo = $this->db->get()->row_array()['sgo'];
					$sgo = $jumlah_sgo/$jumlah_hari;

					//HARI JALAN
					$this->db->select("COUNT(status) as hj");
					$this->db->from("tr_absensi_armada");
					$this->db->where('status', 2);
					$this->db->where('id_bu', $row->id_bu);
					$this->db->where('id_segment', $row_segment->id_segment);
					$this->db->where("tgl_absensi = '$tanggal_setoran' ");
					$jumlah_hj = $this->db->get()->row_array()['hj'];
					$hj = $jumlah_hj;
					$so = $jumlah_hj/$jumlah_hari;


					$penumpang = $this->db->query("
						select SUM(pnp) pnp
						FROM
						(SELECT
						COALESCE(sum(a.jumlah),0) pnp 
						FROM
						ref_setoran_detail_pnp a
						LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
						LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
						WHERE
						b.tanggal = '$tanggal_setoran' AND b.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						UNION ALL
						SELECT
						COALESCE(sum(a.jum_penumpang),0) pnp 
						FROM
						ms_jadwal_borongan a
						LEFT JOIN ref_bu b ON a.id_cabang = b.id_bu
						LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
						LEFT JOIN ref_setoran_borongan d ON a.id_jadwal = d.id_jadwal
						WHERE a.status=1
						and d.tanggal = '$tanggal_setoran' AND b.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						)x
						");
					$pnp = $penumpang->row_array()['pnp'];

					$pendapatan = $this->db->query("SELECT SUM(pendapatan) as pendapatan from (
						SELECT
						sum(a.total) pendapatan 
						FROM
						ref_setoran_detail_pnp a
						LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
						LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
						WHERE
						b.tanggal = '$tanggal_setoran' AND b.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						UNION ALL
						SELECT
						sum(a.total) pendapatan 
						FROM
						ref_setoran_detail_pend a
						LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
						LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
						WHERE
						b.tanggal = '$tanggal_setoran' AND b.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						UNION ALL		
						SELECT
						COALESCE(sum(a.total_pend),0) pendapatan 
						FROM
						ref_setoran_borongan a
						LEFT JOIN ref_bu b ON a.id_bu = b.id_bu
						LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
						WHERE
						a.tanggal = '$tanggal_setoran' AND b.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						)x");
					$upp = $pendapatan->row_array()['pendapatan'];


					//PENGELUARAN
					$pengeluaran = $this->db->query("
						SELECT SUM(pengeluaran) as pengeluaran from (
						SELECT
						COALESCE(sum(a.total),0) pengeluaran 
						FROM
						ref_setoran_detail_beban a
						LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
						LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
						WHERE
						a.id_jenis NOT IN ( '23', '22', '24' ) 
						AND b.tanggal = '$tanggal_setoran' AND b.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						UNION ALL
						SELECT
						COALESCE(sum(a.total),0) pengeluaran 
						FROM
						ref_setoran_borongan_beban a
						LEFT JOIN ref_setoran_borongan b ON a.id_setoran = b.id_setoran
						LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
						WHERE
						b.tanggal = '$tanggal_setoran' AND b.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						)x");
					$biaya_op = $pengeluaran->row_array()['pengeluaran'];


					$kilometer = $this->db->query("SELECT COALESCE(SUM(km_total),0) as kilometer_total, COALESCE(SUM(ritase)) as ritase
						from
						(SELECT
						a.id_setoran_detail AS id_set,
						COALESCE ( a.km_trayek, 0 ) AS km_trayek_,
						COALESCE ( a.km_empty, 0 ) AS km_empty_,
						COALESCE ( ( SELECT COUNT(DISTINCT rit) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ), 0 ) AS ritase,
						COALESCE (
						( ( a.km_trayek ) * ( SELECT COUNT( DISTINCT rit ) FROM ref_setoran_detail_pnp WHERE id_setoran_detail = id_set ) ) + ( a.km_empty ),
						0 
						) AS km_total
						FROM
						ref_setoran_detail a 
						LEFT JOIN ref_segment b ON a.kd_segmen = b.kd_segment 
						WHERE
						a.tanggal ='$tanggal_setoran' AND a.id_bu='$cabang_id' AND b.id_segment='$segment_id'
						) x");
					$km 	= $kilometer->row_array()['kilometer_total'];
					$rit 	= $kilometer->row_array()['ritase'];

					//KM ROMBONGAN
					$kilometer_borongan = $this->db->query("
						SELECT COALESCE(SUM(target)) as ritase_borongan, COALESCE(SUM(km_total)) as km_total_borongan
						FROM
						(SELECT b.target,b.km_tempuh, (b.target*b.km_tempuh) km_total
						FROM ref_setoran_borongan a 
						LEFT JOIN ms_jadwal_borongan b ON a.id_jadwal = b.id_jadwal 
						LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
						WHERE a.tanggal ='$tanggal_setoran' AND a.id_bu='$cabang_id' AND c.id_segment='$segment_id'
						)x ");
					$km_borongan 			= $kilometer_borongan->row_array()['km_total_borongan'];
					$rit_borongan 			= $kilometer_borongan->row_array()['ritase_borongan'];

					$km_reg_bor 			= $km+$km_borongan;
					$rit_reg_bor 			= $rit+$rit_borongan;

					?>
					<tr>
						<td style="font-size:12px;text-align:center;"><b><?=$no+=1;?></b></td>
						<td style="font-size:12px;text-align:center;"><?=$tanggal_setoran;?></td>
						<td style="font-size:12px;text-align:left;"><?=$row->nm_bu;?></td>
						<td style="font-size:12px;text-align:center;"><?=$row_segment->kd_segment;?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($sgo,2,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($so,2,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($hj,2,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($rit_reg_bor,2,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($km_reg_bor,2,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($pnp,0,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($upp,0,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($biaya_op,0,",",".");?></td>
						<td style="font-size:12px;text-align:right;"><?=number_format($upp-$biaya_op,0,",",".");?></td>
					</tr>
					<?php 
					$total_sgo +=$sgo;
					$total_so += $so;
					$total_hj += $hj;
					$total_rit += $rit_reg_bor;
					$total_km += $km_reg_bor;
					$total_pnp += $pnp;
					$total_upp += $upp;
					$total_biaya_op += $biaya_op;
					$total_surplus += ($upp-$biaya_op);
				} ?>
				<tr>
					<td style="font-size:12px;text-align:center;" colspan="3"></td>
					<td style="font-size:12px;text-align:center;"><b>TOTAL</b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_sgo,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_so,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_hj,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_rit,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_km,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_pnp,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_upp,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_biaya_op,2,",",".");?></b></td>
					<td style="font-size:12px;text-align:right;"><b><?=number_format($total_surplus,2,",",".");?></b></td>
				</tr>
				<?php } }?>
			</table>

		</body>
		<html>