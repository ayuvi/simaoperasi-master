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
			<th width="5%">RIT</th>
			<th width="10%">KM</th>
			<th width="10%">PNP</th>
			<th width="10%">UPP</th>
			<th width="10%">Biaya OP</th>
			<th width="10%">Surplus</th>
		</tr>
		<?php
		$query = "
		SELECT
		b.tanggal,
		b.id_bu,
		d.nm_bu,
		b.kd_segmen,
		COUNT( DISTINCT a.rit ) rit,
		COALESCE ( SUM( b.km_trayek + b.km_empty ), 0 ) km,
		COALESCE ( SUM( a.jumlah ), 0 ) pnp,
		COALESCE ( SUM( ( a.jumlah * a.harga ) + a.bagasi_pnp ), 0 ) pendapatan,
		COALESCE ( SUM(e.total), 0 ) beban
		FROM
		ref_setoran_detail_pnp a
		LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
		LEFT JOIN ref_armada c ON b.armada = c.kd_armada AND b.kd_segmen = c.kd_segment AND c.active IN ( 0, 1 )
		LEFT JOIN ref_bu d ON b.id_bu = d.id_bu 
		JOIN ref_setoran_detail_beban e ON e.id_setoran_detail = b.id_setoran_detail
		WHERE 
		b.tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' $query_id_bu
		GROUP BY b.tanggal,b.id_bu,b.kd_segmen
		";
		$sql = $this->db->query($query);
		$exec = $sql->result_array();
		$no= $total_sgo= $total_so= $total_rit= $total_km= $total_pnp= $total_pend= $total_biaya= $total_surplus = 0;
		foreach($exec as $data){
			$no+=1;
			extract($data);
			?>

			<tr>
				<td style="font-size:12px;text-align:center;"><?=$no;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tanggal;?></td>
				<td style="font-size:12px;text-align:center;"><?=$nm_bu;?></td>
				<td style="font-size:12px;text-align:center;"><?=$kd_segmen;?></td>
				<td style="font-size:12px;text-align:center;">0</td>
				<td style="font-size:12px;text-align:center;">0</td>
				<td style="font-size:12px;text-align:center;"><?=$rit;?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($km,2,'.',',');?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($pnp,2,'.',',');?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($pendapatan,2,'.',',');?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($beban,2,'.',',');?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($surplus=$pendapatan-$beban,2,'.',',');?></td>
			</tr>

			<?php 
			$total_sgo= 0;
			$total_so= 0;
			$total_rit +=$rit;
			$total_km +=$km;
			$total_pnp +=$pnp;
			$total_pend +=$pendapatan;
			$total_biaya +=$beban;
			$total_surplus +=$surplus;
		} ?>
		<tr>
				<td style="font-size:12px;text-align:center;" colspan="4"><b>TOTAL</b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_sgo,0,'.',',')?></b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_so,2,'.',',')?></b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_rit,0,'.',',')?></b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_km,2,'.',',')?></b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_pnp,0,'.',',')?></b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_pend,2,'.',',')?></b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_biaya,2,'.',',')?></b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_surplus,2,'.',',')?></b></td>
			</tr>
		</table>

	</body>
	<html>