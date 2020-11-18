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
		$jumlah_hari = $jarak->d;
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
			<th width="10%">HJ</th>
			<th width="5%">SO</th>
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
		$total_hj=$total_so=$total_rit=$total_km=$total_pnp=$total_pend=$total_biaya=$total_surplus=0;
		foreach($exec_bu as $data_bu){
			$no+=1;
			extract($data_bu);
			?>
			<tr>
				<?php
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


				//JUMLAH PENUMPANG
				$this->db->select("sum(a.jumlah) pnp ");
				$this->db->from("ref_setoran_detail_pnp a");
				$this->db->join("ref_setoran_detail b","a.id_setoran_detail=b.id_setoran_detail", 'left');
				$this->db->join("ref_segment c","b.kd_segmen=c.kd_segment", 'left');
				$this->db->where('b.id_bu', $id_bu);
				if($id_segment == 0 || empty($id_segment)){}else{
					$this->db->where('c.id_segment', $id_segment);
				}
				$this->db->where("b.tgl_setoran BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' ");
				$pnp = $this->db->get()->row_array()['pnp'];
				$jumlah_pnp = $pnp;


				//PENDAPATAN
				$pend_bu = "AND b.id_bu='$id_bu'";
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
					b.tgl_setoran BETWEEN '$tanggal_awal' AND '$tanggal_akhir' $pend_bu $pend_segment
					UNION ALL
					SELECT
					sum(a.total) pendapatan 
					FROM
					ref_setoran_detail_pend a
					LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
					LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
					WHERE
					b.tgl_setoran BETWEEN '$tanggal_awal' AND '$tanggal_akhir' $pend_bu $pend_segment
					)x");
				$upp = $pendapatan->row_array()['pendapatan'];
				$jumlah_upp = $upp;



				//PENGELUARAN
				$this->db->select(" sum( a.total ) pengeluaran");
				$this->db->from("ref_setoran_detail_beban a");
				$this->db->join("ref_setoran_detail b","a.id_setoran_detail=b.id_setoran_detail", 'left');
				$this->db->join("ref_segment c","b.kd_segmen=c.kd_segment", 'left');
				$this->db->where_not_in('a.id_jenis', array('23', '22', '24'));
				$this->db->where('b.id_bu', $id_bu);
				if($id_segment == 0 || empty($id_segment)){}else{
					$this->db->where('c.id_segment', $id_segment);
				}
				$this->db->where("b.tgl_setoran BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."' ");
				$pengeluaran = $this->db->get()->row_array()['pengeluaran'];



				//KILOMETER
				$km_bu = "AND a.id_bu='$id_bu'";
				if($id_segment == 0 || empty($id_segment)){$km_segment = "";}else{
					$km_segment = "AND b.id_segment='$id_segment'";
				}
				$kilometer = $this->db->query("SELECT COALESCE(SUM(km_total),0) as kilometer_total, COALESCE(SUM(ritase)) as ritase,
					COALESCE(SUM(km_total)*seat,0) as km_seat, seat as seat_armada
					from
					(SELECT
					a.id_setoran_detail AS id_set,
					a.seat,
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
					a.tgl_setoran BETWEEN '$tanggal_awal' AND '$tanggal_akhir' $km_bu $km_segment
					) x");
				$km = $kilometer->row_array()['kilometer_total'];
				$rit = $kilometer->row_array()['ritase'];
				?>



				<td style="font-size:12px;text-align:center;"><?=$no;?></td>
				<td style="font-size:12px;text-align:left;"><?=$nm_bu;?></td>
				<td style="font-size:12px;text-align:center;"><?=$id_divre;?></td>
				<td style="font-size:12px;text-align:center;"><?=$jumlah_hj;?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($so=($jumlah_hj/$jumlah_hari),2,'.',',')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($rit,2,'.',',')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($km,2,'.',',')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($jumlah_pnp,2,'.',',')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($jumlah_upp,2,'.',',')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($pengeluaran,2,'.',',')?></td>
				<td style="font-size:12px;text-align:center;"><?=number_format($surplus=($jumlah_upp-$pengeluaran),2,'.',',')?></td>
			</tr>
			<?php 
			$total_hj 	+= $jumlah_hj;
			$total_so 	+= $so;
			$total_rit 	+= $rit;
			$total_km 	+= $km;
			$total_pnp 	+= $jumlah_pnp;
			$total_pend += $jumlah_upp;
			$total_biaya += $pengeluaran;
			$total_surplus += $surplus;
			} ?>
			<tr>
				<td style="font-size:12px;text-align:center;" colspan="3"><b>TOTAL</b></td>
				<td style="font-size:12px;text-align:center;"><b><?=number_format($total_hj,0,'.',',')?></b></td>
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