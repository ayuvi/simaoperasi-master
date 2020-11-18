<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$divre = $this->input->get("divre");
	$tanggal_awal = $this->input->get("tanggal_awal");
	$tanggal_akhir = $this->input->get("tanggal_akhir");
	$id_segment 	= $this->input->get("id_segment");

	$start 		= new DateTime($tanggal_awal);
	$end 		= new DateTime($tanggal_akhir);
	$jarak 		= $start->diff($end);
	if($tanggal_awal==$tanggal_akhir){
		$jumlah_hari = 1;
	}else{
		$jumlah_hari = ($jarak->d)+1;
	}

	if($divre == 0){
		$dvr = "";
		$ket_divre="SELURUH DIVRE";
	}else{
		$dvr = "and id_divre = '$divre'";
		$ket_divre="DIVRE ".$divre;
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

	<title>REPORT MONITORING SIMAOPERASI</title>
	<style>
		th{
			background : #ccc;
		}
	</style>
</head>
<body>
	<h3 align="center">
		<span>REPORT MONITORING</span>
		<br/>
	</h3>
	<table width="100%" style="font-size:14px">
		<tr>
			<td style="font-weight:bold;width:10%">DIVRE</td>
			<td style="font-weight:bold;width:1%">:</td>
			<td style="font-weight:bold;width:90%"><?=$ket_divre?></td>
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
			<th width="10%">CABANG</th>
			<th width="5%">DIVRE</th>
			<th width="5%">SGO</th>
			<th width="5%">SO</th>
			<th width="10%">HJ</th>
			<th width="5%">RIT</th>
			<th width="10%">KM</th>
			<th width="10%">PENUMPANG</th>
			<th width="10%">PENDAPATAN</th>
			<th width="10%">BIAYA OPERASIONAL</th>
			<th width="10%">SURPLUS OPERASI</th>
		</tr>
		<?php
		
		$qry_bu = "select * from ref_bu where id_bu not between 60 and 65 and id_bu !=25 $dvr order by id_divre,id_bu asc";
		$sql_bu = $this->db->query($qry_bu);
		$exec_bu = $sql_bu->result_array();
		$no=$kosong=0;
		$total_sgo=$total_hj=$total_so=$total_rit=$total_km=$total_pnp=$total_pend=$total_biaya=$total_surplus=0;
		foreach($exec_bu as $data_bu){
			$no+=1;
			extract($data_bu);
			?>
			<tr>
				<?php
				//SGO
				$this->db->select("COUNT(status) as sgo");
				$this->db->from("tr_absensi_armada");
				$this->db->where_in('status', array(1,2));
				$this->db->where('id_bu', $id_bu);
				if($id_segment == 0 || empty($id_segment)){}else{
					$this->db->where('id_segment', $id_segment);
				}
				$this->db->where("tgl_absensi  BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'  ");
				$jumlah_sgo = $this->db->get()->row_array()['sgo'];
				$sgo = $jumlah_sgo/$jumlah_hari;


				//HARI JALAN
				$this->db->select("COUNT(status) as hj");
				$this->db->from("tr_absensi_armada");
				$this->db->where('status', 2);
				$this->db->where('id_bu', $id_bu);
				if($id_segment == 0 || empty($id_segment)){}else{
					$this->db->where('id_segment', $id_segment);
				}
				$this->db->where("tgl_absensi BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' ");
				$jumlah_hj = $this->db->get()->row_array()['hj'];
				$hj = $jumlah_hj;
				$so = $jumlah_hj/$jumlah_hari;


				//JUMLAH PENUMPANG
				if($id_segment == 0 || empty($id_segment)){$pnp_segment = ""; }else{
					$pnp_segment = "AND c.id_segment='$id_segment'";
				}
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
					b.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND b.id_bu='$id_bu' $pnp_segment
					UNION ALL
					SELECT
					COALESCE(sum(a.jum_penumpang),0) pnp 
					FROM
					ms_jadwal_borongan a
					LEFT JOIN ref_bu b ON a.id_cabang = b.id_bu
					LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
					LEFT JOIN ref_setoran_borongan d ON a.id_jadwal = d.id_jadwal
					WHERE a.status=1
					and d.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND b.id_bu='$id_bu' $pnp_segment
					)x
					");
				$pnp = $penumpang->row_array()['pnp'];

				


				//PENDAPATAN
				if($id_segment == 0 || empty($id_segment)){$pend_segment = "";}else{
					$pend_segment = "AND c.id_segment='$id_segment'";
				}
				$pendapatan = $this->db->query("SELECT SUM(pendapatan) as pendapatan from (
					SELECT
					sum(a.total) pendapatan 
					FROM
					ref_setoran_detail_pnp a
					LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
					LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
					WHERE
					b.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND b.id_bu='$id_bu' $pend_segment
					UNION ALL
					SELECT
					sum(a.total) pendapatan 
					FROM
					ref_setoran_detail_pend a
					LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
					LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
					WHERE
					b.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND b.id_bu='$id_bu' $pend_segment
					UNION ALL		
					SELECT
					COALESCE(sum(a.total_pend),0) pendapatan 
					FROM
					ref_setoran_borongan a
					LEFT JOIN ref_bu b ON a.id_bu = b.id_bu
					LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
					WHERE
					a.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND b.id_bu='$id_bu' $pend_segment
					)x");
				$upp = $pendapatan->row_array()['pendapatan'];


				//PENGELUARAN
				if($id_segment == 0 || empty($id_segment)){$pengeluaran_segment = "";}else{
					$pengeluaran_segment = "AND c.id_segment='$id_segment'";
				}
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
					AND b.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND b.id_bu='$id_bu' $pengeluaran_segment
					UNION ALL
					SELECT
					COALESCE(sum(a.total),0) pengeluaran 
					FROM
					ref_setoran_borongan_beban a
					LEFT JOIN ref_setoran_borongan b ON a.id_setoran = b.id_setoran
					LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
					WHERE
					b.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND b.id_bu='$id_bu' $pengeluaran_segment
					)x");
				$pengeluaran = $pengeluaran->row_array()['pengeluaran'];

				//KILOMETER
				if($id_segment == 0 || empty($id_segment)){$km_segment = "";}else{
					$km_segment = "AND b.id_segment='$id_segment'";
				}
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
					a.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND a.id_bu='$id_bu' $km_segment
					) x");
				$km 	= $kilometer->row_array()['kilometer_total'];
				$rit 	= $kilometer->row_array()['ritase'];

				if($id_segment == 0 || empty($id_segment)){$km_segment_bor = "";}else{
					$km_segment_bor = "AND c.id_segment='$id_segment'";
				}
				$kilometer_borongan = $this->db->query("
					SELECT COALESCE(SUM(target)) as ritase_borongan, COALESCE(SUM(km_total)) as km_total_borongan, COALESCE(SUM(seat_armada)/COUNT(seat_armada)) as seat_armada, COALESCE (SUM(lf)/COUNT(lf),0) AS load_factor
					FROM
					(SELECT b.target,b.km_tempuh, (b.target*b.km_tempuh) km_total, b.seat_armada, (b.seat_armada/b.seat_armada) lf
					FROM ref_setoran_borongan a 
					LEFT JOIN ms_jadwal_borongan b ON a.id_jadwal = b.id_jadwal 
					LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
					WHERE a.tanggal BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' AND a.id_bu='$id_bu' $km_segment_bor
					)x ");
				$km_borongan 			= $kilometer_borongan->row_array()['km_total_borongan'];
				$rit_borongan 			= $kilometer_borongan->row_array()['ritase_borongan'];

				$tot_km 			= $km+$km_borongan;
				$tot_rit 			= $rit+$rit_borongan;
				?>



				<td style="font-size:12px;text-align:center;"><?=$no;?></td>
				<td style="font-size:12px;text-align:left;"><?=$nm_bu;?></td>
				<td style="font-size:12px;text-align:center;"><?=$id_divre;?></td>
			<td style="font-size:12px;text-align:center;"><?=number_format($sgo,2,',','.')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($so,2,',','.')?></td>
				<td style="font-size:12px;text-align:center;"><?=$hj;?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($tot_rit,2,',','.')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($tot_km,2,',','.')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($pnp,2,',','.')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($upp,2,',','.')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($pengeluaran,2,',','.')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($surplus=($upp-$pengeluaran),2,',','.')?></td>
			</tr>
			<?php 
			$total_sgo 	+= $sgo;
			$total_so 	+= $so;
			$total_hj 	+= $hj;
			$total_rit 	+= $tot_rit;
			$total_km 	+= $tot_km;
			$total_pnp 	+= $pnp;
			$total_pend += $upp;
			$total_biaya += $pengeluaran;
			$total_surplus += $surplus;
		} ?>
		<tr>
			<td style="font-size:12px;text-align:center;" colspan="3"><b>TOTAL</b></td>
			<td style="font-size:12px;text-align:center;"><b><?=number_format($total_sgo,2,'.',',')?></b></td>
			<td style="font-size:12px;text-align:center;"><b><?=number_format($total_so,2,'.',',')?></b></td>
			<td style="font-size:12px;text-align:center;"><b><?=number_format($total_hj,0,'.',',')?></b></td>
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