<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$bulan 		= $this->input->get("bulan");
	$id_bu 		= $this->input->get("id_bu");
	$kd_segment = $this->input->get("id_segment");
	$kd_trayek 	= $this->input->get("kd_trayek");
	$tanggal 	= $this->input->get("tanggal");

	if($id_bu == 0 || empty($id_bu)){
		$query_id_bu = "";
		$nm_bu 		= "SELURUH CABANG";
		$kota 		= "";
		$gm_nm_pegawai = $gm_nik_pegawai= $mu_nm_pegawai = $mu_nik_pegawai = "";
	}else if($id_bu == 61){
		$query_id_bu = "AND d.id_divre=1";
		$nm_bu 		= "DIVRE 1";
		$kota			   = $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu);
		$gm_nm_pegawai = $gm_nik_pegawai= $mu_nm_pegawai = $mu_nik_pegawai = "";
	}else if($id_bu == 62){
		$query_id_bu = "AND d.id_divre=2";
		$nm_bu 		= "DIVRE 2";
		$kota			   = $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu);
		$gm_nm_pegawai = $gm_nik_pegawai= $mu_nm_pegawai = $mu_nik_pegawai = "";
	}else if($id_bu == 63){
		$query_id_bu = "AND d.id_divre=3";
		$nm_bu 		= "DIVRE 3";
		$kota			   = $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu);
		$gm_nm_pegawai = $gm_nik_pegawai= $mu_nm_pegawai = $mu_nik_pegawai = "";
	}else if($id_bu == 64){
		$query_id_bu = "AND d.id_divre=4";
		$nm_bu 		= "DIVRE 4";
		$kota			   = $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu);
		$gm_nm_pegawai = $gm_nik_pegawai= $mu_nm_pegawai = $mu_nik_pegawai = "";
	}else{
		$query_id_bu	   = "AND d.id_bu='$id_bu'";
		$nm_bu 			   = $this->model_reports->get_info("nm_bu","ref_bu","id_bu",$id_bu);
		$kota			   = $this->model_reports->get_info("kota","ref_bu","id_bu",$id_bu);
		$general_manager   = $this->model_reports->general_manager($id_bu);
		$manager_usaha     = $this->model_reports->manager_usaha($id_bu);
		$gm_nm_pegawai	   = $general_manager['nm_pegawai'];
		$gm_nik_pegawai	   = $general_manager['nik_pegawai'];
		$mu_nm_pegawai	   = $manager_usaha['nm_pegawai'];
		$mu_nik_pegawai	   = $manager_usaha['nik_pegawai'];
	}

	$tanggal 		= $tanggal ? $tanggal : date("Y-m-d");
	$tahun 			= explode("-",$tanggal)[0];
	$bulan_periode 	= "(month(b.tgl_setoran)='$bulan') AND (YEAR(b.tgl_setoran) = '$tahun')";
	$tPERIODE 		= "Bulan";
	$vPERIODE 		= bulan($bulan)." ".$tahun;

	if($kd_trayek !='0' || $kd_trayek !=''){
		$nm_point_awal 	= $this->model_reports->get_info("nm_point_awal","ref_trayek","kd_trayek",$kd_trayek);
		$nm_point_akhir = $this->model_reports->get_info("nm_point_akhir","ref_trayek","kd_trayek",$kd_trayek);
	}

	if($kd_trayek=='0' || $kd_trayek==''){
		$query_trayek = "";
	}else{
		$query_trayek = "AND b.kd_trayek='$kd_trayek'";
	}

	if($kd_segment=='0'){
		$query_segment = "";
		$nm_segment = "SELURUH SEGMEN";
	}else{
		$query_segment = "AND b.kd_segmen='$kd_segment'";
		$nm_segment 	= $kd_segment;
	}

	;?>
	<title>LPE - <?=strtoupper($nm_segment);?></title>
	<style>
		th{
			background : #6495ED;
		}
	</style>
</head>
<body>
	<table style="border-collapse:collapse;" width="100%" align="center" border="0">
		<tr>
			<td width="33%" align="center" style="font-size:18px;">
				<b>PERUSAHAAN UMUM DAMRI</b><br />
				<b>(PERUM DAMRI)</b><br />
				<b>KANTOR CABANG : <?=strtoupper($nm_bu)?><br />
				</td>
				<td width="33%" align="center" style="font-size:18px;">
					<b>LAPORAN HASIL OPERASONAL</b><br />
					<b>TAHUN : <?=strtoupper($vPERIODE);?></b><br />

				</td>
				<td width="33%" align="right" style="font-size:18px;">
					<img src="<?=base_url('assets/img/logos.png');?>" alt="Perum DAMRI" height="30" width="150">
					<br />
				</td>
			</tr>
		</table><br/>
		<table style="border-collapse:collapse;" width="100%" align="center" border="0">
			<tr>
				<td align="right" style="font-size:14px;">
					<b>LP/E</b><br />
				</td>
			</tr>
		</table>
		<table style="border-collapse:collapse;" border="1" width="100%">
			<thead>
				<tr>
					<td colspan="2" style="font-size:12px;text-align:center;background-color:#d5d5e3;">NOMOR</td>
					<td rowspan="2" style="font-size:12px;text-align:center;background-color:#d5d5e3;">KODE BUS</td>
					<td rowspan="2" style="font-size:12px;text-align:center;background-color:#d5d5e3;">DAYA MUAT</td>
					<td rowspan="2" style="font-size:12px;text-align:center;background-color:#d5d5e3;">JENIS PLYN</td>
					<td rowspan="2" style="font-size:12px;text-align:center;background-color:#d5d5e3;">TRAYEK YANG DILYN</td>
					<td colspan="6" style="font-size:12px;text-align:center;background-color:#d5d5e3;">R E N C A N A</td>
					<td colspan="6" style="font-size:12px;text-align:center;background-color:#d5d5e3;">R E A L I S A S I</td>
					<td colspan="6" style="font-size:12px;text-align:center;background-color:#d5d5e3;">PERSENTASE</td>
				</tr>
				<tr>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">URUT</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">POLISI</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">HJ</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">RIT</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">KM</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PNP</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PNP-KM</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PENDAPATAN</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">HJ</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">RIT</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">KM</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PNP</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PNP-KM</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PENDAPATAN</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">HJ</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">RIT</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">KM</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PNP</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">PNP-KM</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">UPP</td>
				</tr>
				<tr>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">1</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">2</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">3</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">4</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">5</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">6</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">7</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">8</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">9</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">10</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">11</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">12</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">13</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">14</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">15</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">16</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">17</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">18</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">19</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">20</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">21</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">22</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">23</td>
					<td style="font-size:12px;text-align:center;background-color:#d5d5e3;">24</td>
				</tr>
			</thead>
			<?php
			// $this->db->query("
			// 	CREATE TEMPORARY TABLE IF NOT EXISTS detail_pnp_temp AS select 
			// 	a.id_setoran,a.tgl_setoran AS tanggal, a.id_bu,
			// 	COALESCE ( COUNT( DISTINCT e.rit ), 0 ) AS rit,
			// 	COALESCE ( sum( e.km_trayek ), 0 ) AS km_trayek,
			// 	COALESCE ( sum( e.jumlah ), 0 ) AS jumlah,
			// 	COALESCE ( sum( e.harga ), 0 ) AS harga,
			// 	COALESCE ( sum( e.bagasi_pnp ), 0 ) AS bagasi_pnp,
			// 	COALESCE ( sum( e.total ), 0 ) AS total
			// 	from ref_setoran a
			// 	JOIN ref_setoran_detail_pnp e on e.id_setoran=a.id_setoran
			// 	group by a.id_setoran");

			// $query ="select a.id_setoran, a.tgl_setoran AS tanggal, b.kd_trayek, a.id_bu, c.nm_bu, a.armada, d.plat_armada, d.seat_armada, e.rit, e.km_trayek, e.jumlah, e.harga, e.bagasi_pnp, e.total
			// from ref_setoran a
			// join ref_setoran_detail b on a.id_setoran = b.id_setoran
			// left join ref_bu c on a.id_bu = c.id_bu
			// LEFT JOIN ref_armada d ON a.armada = d.kd_armada
			// LEFT JOIN detail_pnp_temp e ON a.id_setoran = e.id_setoran
			// WHERE $bulan_periode $query_trayek $query_id_bu $query_segment
			// GROUP BY a.id_setoran";

			$query99 = "SELECT c.kd_armada,c.plat_armada,c.seat_armada,COUNT(DISTINCT a.rit) rit,COALESCE(SUM(b.km_trayek+b.km_empty),0) km, COALESCE(SUM(a.jumlah),0) pnp,COALESCE(SUM((a.jumlah*a.harga)+a.bagasi_pnp),0) pendapatan, 
			b.armada,c.plat_armada,c.seat_armada,b.nm_layanan,b.kd_trayek as trayek
			FROM ref_setoran_detail_pnp a
			LEFT JOIN ref_setoran_detail b on a.id_setoran_detail=b.id_setoran_detail
			LEFT JOIN ref_armada c on b.armada=c.kd_armada and b.kd_segmen=c. kd_segment and c.active in (0,1)
			LEFT JOIN ref_bu d on b.id_bu=d.id_bu
			WHERE 
			$bulan_periode $query_id_bu $query_id_bu $query_segment $query_trayek
			GROUP BY b.armada,b.kd_trayek";

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

			$query ="
			select a.id_setoran, a.tgl_setoran AS tanggal, b.kd_trayek, b.nm_layanan,a.id_bu, c.nm_bu, a.armada, d.plat_armada, d.seat_armada, e.rit, e.km_trayek, e.jumlah, e.harga, e.bagasi_pnp, e.total
			from ref_setoran a
			join ref_setoran_detail b on a.id_setoran = b.id_setoran
			left join ref_bu c on a.id_bu = c.id_bu
			LEFT JOIN ref_armada d ON a.armada = d.kd_armada
			LEFT JOIN detail_pnp_temp e ON a.id_setoran = e.id_setoran
			WHERE $bulan_periode $query_trayek $query_id_bu $query_segment
			GROUP BY a.id_setoran";
			$no = $jml_rit = $jml_km = $jml_pnp = $jml_total = 0;
			$sql = $this->db->query($query);
			foreach ($sql->result() as $row) { ?>
			<tbody>
				<tr>
					<td style="font-size:12px;text-align:center;"><?=$no+=1;?></td>
					<td style="font-size:12px;text-align:center;"><?=$row->plat_armada;?></td>
					<td style="font-size:12px;text-align:center;"><?=$row->armada;?></td>
					<td style="font-size:12px;text-align:center;"><?=$row->seat_armada;?></td>
					<td style="font-size:12px;text-align:center;"><?=$row->nm_layanan;?></td>
					<td style="font-size:12px;text-align:center;"><?=$row->kd_trayek;?></td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;"><?=$row->rit;?></td>
					<td style="font-size:12px;text-align:center;"><?=$row->rit;?></td>
					<td style="font-size:12px;text-align:center;"><?=$row->km_trayek;?></td>
					<td style="font-size:12px;text-align:center;"><?=number_format($row->jumlah,0,',','.');?></td>
					<td style="font-size:12px;text-align:center;"><?=number_format($row->jumlah,0,',','.');?></td>
					<td style="font-size:12px;text-align:center;"><?=number_format($row->total,0,',','.');?></td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
					<td style="font-size:12px;text-align:center;">0</td>
				</tr>
				<?php
				$jml_rit 		+= $row->rit;
				$jml_km 		+= $row->km_trayek;
				$jml_pnp 		+= $row->jumlah;
				$jml_total 		+= $row->total;
			} ?>
		</tbody>
		<tfoot>
			<tr>
				<td style="font-size:12px;text-align:right;" colspan="12"></td>
				<td style="font-size:12px;text-align:right;"><b><?=$jml_rit;?></b></td>
				<td style="font-size:12px;text-align:right;"><b><?=$jml_rit;?></b></td>
				<td style="font-size:12px;text-align:right;"><b><?=$jml_km;?></b></td>
				<td style="font-size:12px;text-align:right;"><b><?=number_format($jml_pnp,0,',','.');?></b></td>
				<td style="font-size:12px;text-align:right;"><b><?=number_format($jml_pnp,0,',','.');?></b></td>
				<td style="font-size:12px;text-align:right;"><b><?=number_format($jml_total,0,',','.');?></b></td>
				<td style="font-size:12px;text-align:right;"><b></b></td>
				<td style="font-size:12px;text-align:right;"><b></b></td>
				<td style="font-size:12px;text-align:right;"><b></b></td>
				<td style="font-size:12px;text-align:right;"></td>
				<td style="font-size:12px;text-align:right;"></td>
				<td style="font-size:12px;text-align:right;"></td>
			</tfoot>
		</table>

		<br/><table style="border-collapse:collapse;" width="100%" align="center" border="0">
		<tr>
			<td width="50%" align="left" style="font-size:14px;">
				<b>MENGETAHUI :</b>
				<b></br>GENERAL MANAGER</b><br /><br /><br /><br /><br />
				<b><?=$gm_nm_pegawai;?></b></br><?=$gm_nik_pegawai;?>
			</td>
			<td width="50%" align="right" style="font-size:14px;">
				<b><?=$kota.", ".tgl_hari_ini();?></b><br />
				<b>MANAGER USAHA</b><br /><br /><br /><br />
				<b><?=$mu_nm_pegawai;?></b></br><?=$mu_nik_pegawai;?>
			</td>
		</tr>
	</table><br/>
</body>
<html>