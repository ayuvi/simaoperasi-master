<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$tanggal = $this->input->get("tanggal");
	$tanggal = $tanggal ? $tanggal : tgl_hari_ini();

	$bulan 			= $this->input->get("bulan");
	$bulan_periode 	= " (month(tanggal)='$bulan')";
	$tahun 			= $this->input->get("tahun");
	$tPERIODE 		= "Bulan";
	$vPERIODE 		= bulan($bulan)." ".$tahun;
	$jumlah_hari 	= date("t",mktime(0,0,0,$bulan,1,$tahun));
	$jumlah_sampai 	= $jumlah_hari;
	$awal_hari = 1;

	$divre = $this->input->get("divre");
	if($divre == 0){
		$dvr = "";
	}else{
		$dvr = "and b.id_divre = '$divre'";
	}

	?>

	<title>Rekapitulasi Input Jadwal</title>
	<style>
		th{
			background : #ccc;
		}
	</style>
</head>
<body>
	<h3 align="center">
		<span>REKAPITULASI INPUT JADWAL ARMADA</span>
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
			<th rowspan="2" width="10%">Cabang</th>
			<th rowspan="2" width="5%">Divre</th>
			<th colspan="31" width="60%">Tanggal</th>
			<!-- <th rowspan="2" width="3%">Total</th> -->
			<th colspan="2" width="3%">Keterangan</th>
			<th rowspan="2" width="3%">Jumlah</th>
		</tr>
		<tr>
			<th width="2%">1</th>
			<th width="2%">2</th>
			<th width="2%">3</th>
			<th width="2%">4</th>
			<th width="2%">5</th>
			<th width="2%">6</th>
			<th width="2%">7</th>
			<th width="2%">8</th>
			<th width="2%">9</th>
			<th width="2%">10</th>
			<th width="2%">11</th>
			<th width="2%">12</th>
			<th width="2%">13</th>
			<th width="2%">14</th>
			<th width="2%">15</th>
			<th width="2%">16</th>
			<th width="2%">17</th>
			<th width="2%">18</th>
			<th width="2%">19</th>
			<th width="2%">20</th>
			<th width="2%">21</th>
			<th width="2%">22</th>
			<th width="2%">23</th>
			<th width="2%">24</th>
			<th width="2%">25</th>
			<th width="2%">26</th>
			<th width="2%">27</th>
			<th width="2%">28</th>
			<th width="2%">29</th>
			<th width="2%">30</th>
			<th width="2%">31</th>
			<th width="2%">Isi</th>
			<th width="2%">Tdk Isi</th>
		</tr>
		<?php
		$qry_jadwal1 = "
		SELECT
		b.id_bu,
		b.nm_bu,
		b.id_divre,
		SUM(CASE WHEN DAY ( a.tanggal ) = 01 THEN 1 ELSE 0 END) AS tgl1,
		SUM(CASE WHEN DAY ( a.tanggal ) = 02 THEN 1 ELSE 0 END) AS tgl2,
		SUM(CASE WHEN DAY ( a.tanggal ) = 03 THEN 1 ELSE 0 END) AS tgl3,
		SUM(CASE WHEN DAY ( a.tanggal ) = 04 THEN 1 ELSE 0 END) AS tgl4,
		SUM(CASE WHEN DAY ( a.tanggal ) = 05 THEN 1 ELSE 0 END) AS tgl5,
		SUM(CASE WHEN DAY ( a.tanggal ) = 06 THEN 1 ELSE 0 END) AS tgl6,
		SUM(CASE WHEN DAY ( a.tanggal ) = 07 THEN 1 ELSE 0 END) AS tgl7,
		SUM(CASE WHEN DAY ( a.tanggal ) = 08 THEN 1 ELSE 0 END) AS tgl8,
		SUM(CASE WHEN DAY ( a.tanggal ) = 09 THEN 1 ELSE 0 END) AS tgl9,
		SUM(CASE WHEN DAY ( a.tanggal ) = 10 THEN 1 ELSE 0 END) AS tgl10,
		SUM(CASE WHEN DAY ( a.tanggal ) = 11 THEN 1 ELSE 0 END) AS tgl11,
		SUM(CASE WHEN DAY ( a.tanggal ) = 12 THEN 1 ELSE 0 END) AS tgl12,
		SUM(CASE WHEN DAY ( a.tanggal ) = 13 THEN 1 ELSE 0 END) AS tgl13,
		SUM(CASE WHEN DAY ( a.tanggal ) = 14 THEN 1 ELSE 0 END) AS tgl14,
		SUM(CASE WHEN DAY ( a.tanggal ) = 15 THEN 1 ELSE 0 END) AS tgl15,
		SUM(CASE WHEN DAY ( a.tanggal ) = 16 THEN 1 ELSE 0 END) AS tgl16,
		SUM(CASE WHEN DAY ( a.tanggal ) = 17 THEN 1 ELSE 0 END) AS tgl17,
		SUM(CASE WHEN DAY ( a.tanggal ) = 18 THEN 1 ELSE 0 END) AS tgl18,
		SUM(CASE WHEN DAY ( a.tanggal ) = 19 THEN 1 ELSE 0 END) AS tgl19,
		SUM(CASE WHEN DAY ( a.tanggal ) = 20 THEN 1 ELSE 0 END) AS tgl20,
		SUM(CASE WHEN DAY ( a.tanggal ) = 21 THEN 1 ELSE 0 END) AS tgl21,
		SUM(CASE WHEN DAY ( a.tanggal ) = 22 THEN 1 ELSE 0 END) AS tgl22,
		SUM(CASE WHEN DAY ( a.tanggal ) = 23 THEN 1 ELSE 0 END) AS tgl23,
		SUM(CASE WHEN DAY ( a.tanggal ) = 24 THEN 1 ELSE 0 END) AS tgl24,
		SUM(CASE WHEN DAY ( a.tanggal ) = 25 THEN 1 ELSE 0 END) AS tgl25,
		SUM(CASE WHEN DAY ( a.tanggal ) = 26 THEN 1 ELSE 0 END) AS tgl26,
		SUM(CASE WHEN DAY ( a.tanggal ) = 27 THEN 1 ELSE 0 END) AS tgl27,
		SUM(CASE WHEN DAY ( a.tanggal ) = 28 THEN 1 ELSE 0 END) AS tgl28,
		SUM(CASE WHEN DAY ( a.tanggal ) = 29 THEN 1 ELSE 0 END) AS tgl29,
		SUM(CASE WHEN DAY ( a.tanggal ) = 30 THEN 1 ELSE 0 END) AS tgl30,
		SUM(CASE WHEN DAY ( a.tanggal ) = 31 THEN 1 ELSE 0 END) AS tgl31
		FROM
		ref_bu b
		LEFT JOIN (SELECT * from ms_jadwal WHERE MONTH (tanggal) = '$bulan' AND YEAR (tanggal) = '$tahun') a ON a.id_cabang = b.id_bu
		where b.id_bu not between 60 and 65 and b.id_bu !=25
		GROUP BY
		b.id_bu,
		b.nm_bu,
		b.id_divre
		ORDER BY
		b.id_bu";

		$qry_jadwal = "
		SELECT x.id_bu,x.nm_bu, x.id_divre,
		CONVERT ( GROUP_CONCAT( tgl1 SEPARATOR '' ) USING utf8 ) AS tgl1,
		CONVERT ( GROUP_CONCAT( tgl2 SEPARATOR '' ) USING utf8 ) AS tgl2,
		CONVERT ( GROUP_CONCAT( tgl3 SEPARATOR '' ) USING utf8 ) AS tgl3,
		CONVERT ( GROUP_CONCAT( tgl4 SEPARATOR '' ) USING utf8 ) AS tgl4,
		CONVERT ( GROUP_CONCAT( tgl5 SEPARATOR '' ) USING utf8 ) AS tgl5,
		CONVERT ( GROUP_CONCAT( tgl6 SEPARATOR '' ) USING utf8 ) AS tgl6,
		CONVERT ( GROUP_CONCAT( tgl7 SEPARATOR '' ) USING utf8 ) AS tgl7,
		CONVERT ( GROUP_CONCAT( tgl8 SEPARATOR '' ) USING utf8 ) AS tgl8,
		CONVERT ( GROUP_CONCAT( tgl9 SEPARATOR '' ) USING utf8 ) AS tgl9,
		CONVERT ( GROUP_CONCAT( tgl10 SEPARATOR '' ) USING utf8 ) AS tgl10,
		CONVERT ( GROUP_CONCAT( tgl11 SEPARATOR '' ) USING utf8 ) AS tgl11,
		CONVERT ( GROUP_CONCAT( tgl12 SEPARATOR '' ) USING utf8 ) AS tgl12,
		CONVERT ( GROUP_CONCAT( tgl13 SEPARATOR '' ) USING utf8 ) AS tgl13,
		CONVERT ( GROUP_CONCAT( tgl14 SEPARATOR '' ) USING utf8 ) AS tgl14,
		CONVERT ( GROUP_CONCAT( tgl15 SEPARATOR '' ) USING utf8 ) AS tgl15,
		CONVERT ( GROUP_CONCAT( tgl16 SEPARATOR '' ) USING utf8 ) AS tgl16,
		CONVERT ( GROUP_CONCAT( tgl17 SEPARATOR '' ) USING utf8 ) AS tgl17,
		CONVERT ( GROUP_CONCAT( tgl18 SEPARATOR '' ) USING utf8 ) AS tgl18,
		CONVERT ( GROUP_CONCAT( tgl19 SEPARATOR '' ) USING utf8 ) AS tgl19,
		CONVERT ( GROUP_CONCAT( tgl20 SEPARATOR '' ) USING utf8 ) AS tgl20,
		CONVERT ( GROUP_CONCAT( tgl21 SEPARATOR '' ) USING utf8 ) AS tgl21,
		CONVERT ( GROUP_CONCAT( tgl22 SEPARATOR '' ) USING utf8 ) AS tgl22,
		CONVERT ( GROUP_CONCAT( tgl23 SEPARATOR '' ) USING utf8 ) AS tgl23,
		CONVERT ( GROUP_CONCAT( tgl24 SEPARATOR '' ) USING utf8 ) AS tgl24,
		CONVERT ( GROUP_CONCAT( tgl25 SEPARATOR '' ) USING utf8 ) AS tgl25,
		CONVERT ( GROUP_CONCAT( tgl26 SEPARATOR '' ) USING utf8 ) AS tgl26,
		CONVERT ( GROUP_CONCAT( tgl27 SEPARATOR '' ) USING utf8 ) AS tgl27,
		CONVERT ( GROUP_CONCAT( tgl28 SEPARATOR '' ) USING utf8 ) AS tgl28,
		CONVERT ( GROUP_CONCAT( tgl29 SEPARATOR '' ) USING utf8 ) AS tgl29,
		CONVERT ( GROUP_CONCAT( tgl30 SEPARATOR '' ) USING utf8 ) AS tgl30,
		CONVERT ( GROUP_CONCAT( tgl31 SEPARATOR '' ) USING utf8 ) AS tgl31,
		x.total_hari,
		( SELECT COUNT(id_jadwal) FROM ms_jadwal WHERE MONTH (tanggal) = '$bulan' AND YEAR (tanggal) = '$tahun' AND id_cabang = x.id_bu ) AS jadwal
		FROM
		(
		SELECT
		a.id_cabang,
		b.id_bu,
		b.nm_bu,
		b.id_divre,
		CASE WHEN DAY ( a.tanggal ) = 01 THEN count( a.id_jadwal ) ELSE '' END AS tgl1,
		CASE WHEN DAY ( a.tanggal ) = 02 THEN count( a.id_jadwal ) ELSE '' END AS tgl2,
		CASE WHEN DAY ( a.tanggal ) = 03 THEN count( a.id_jadwal ) ELSE '' END AS tgl3,
		CASE WHEN DAY ( a.tanggal ) = 04 THEN count( a.id_jadwal ) ELSE '' END AS tgl4,
		CASE WHEN DAY ( a.tanggal ) = 05 THEN count( a.id_jadwal ) ELSE '' END AS tgl5,
		CASE WHEN DAY ( a.tanggal ) = 06 THEN count( a.id_jadwal ) ELSE '' END AS tgl6,
		CASE WHEN DAY ( a.tanggal ) = 07 THEN count( a.id_jadwal ) ELSE '' END AS tgl7,
		CASE WHEN DAY ( a.tanggal ) = 08 THEN count( a.id_jadwal ) ELSE '' END AS tgl8,
		CASE WHEN DAY ( a.tanggal ) = 09 THEN count( a.id_jadwal ) ELSE '' END AS tgl9,
		CASE WHEN DAY ( a.tanggal ) = 10 THEN count( a.id_jadwal ) ELSE '' END AS tgl10,
		CASE WHEN DAY ( a.tanggal ) = 11 THEN count( a.id_jadwal ) ELSE '' END AS tgl11,
		CASE WHEN DAY ( a.tanggal ) = 12 THEN count( a.id_jadwal ) ELSE '' END AS tgl12,
		CASE WHEN DAY ( a.tanggal ) = 13 THEN count( a.id_jadwal ) ELSE '' END AS tgl13,
		CASE WHEN DAY ( a.tanggal ) = 14 THEN count( a.id_jadwal ) ELSE '' END AS tgl14,
		CASE WHEN DAY ( a.tanggal ) = 15 THEN count( a.id_jadwal ) ELSE '' END AS tgl15,
		CASE WHEN DAY ( a.tanggal ) = 16 THEN count( a.id_jadwal ) ELSE '' END AS tgl16,
		CASE WHEN DAY ( a.tanggal ) = 17 THEN count( a.id_jadwal ) ELSE '' END AS tgl17,
		CASE WHEN DAY ( a.tanggal ) = 18 THEN count( a.id_jadwal ) ELSE '' END AS tgl18,
		CASE WHEN DAY ( a.tanggal ) = 19 THEN count( a.id_jadwal ) ELSE '' END AS tgl19,
		CASE WHEN DAY ( a.tanggal ) = 20 THEN count( a.id_jadwal ) ELSE '' END AS tgl20,
		CASE WHEN DAY ( a.tanggal ) = 21 THEN count( a.id_jadwal ) ELSE '' END AS tgl21,
		CASE WHEN DAY ( a.tanggal ) = 22 THEN count( a.id_jadwal ) ELSE '' END AS tgl22,
		CASE WHEN DAY ( a.tanggal ) = 23 THEN count( a.id_jadwal ) ELSE '' END AS tgl23,
		CASE WHEN DAY ( a.tanggal ) = 24 THEN count( a.id_jadwal ) ELSE '' END AS tgl24,
		CASE WHEN DAY ( a.tanggal ) = 25 THEN count( a.id_jadwal ) ELSE '' END AS tgl25,
		CASE WHEN DAY ( a.tanggal ) = 26 THEN count( a.id_jadwal ) ELSE '' END AS tgl26,
		CASE WHEN DAY ( a.tanggal ) = 27 THEN count( a.id_jadwal ) ELSE '' END AS tgl27,
		CASE WHEN DAY ( a.tanggal ) = 28 THEN count( a.id_jadwal ) ELSE '' END AS tgl28,
		CASE WHEN DAY ( a.tanggal ) = 29 THEN count( a.id_jadwal ) ELSE '' END AS tgl29,
		CASE WHEN DAY ( a.tanggal ) = 30 THEN count( a.id_jadwal ) ELSE '' END AS tgl30,
		CASE WHEN DAY ( a.tanggal ) = 31 THEN count( a.id_jadwal ) ELSE '' END AS tgl31,
		DAY ( LAST_DAY( a.tanggal ) ) AS total_hari 
		FROM
		ref_bu b
		LEFT JOIN (SELECT * from ms_jadwal WHERE MONTH (tanggal) = '$bulan' AND YEAR (tanggal) = '$tahun') a ON a.id_cabang = b.id_bu 
		where b.id_bu not between 60 and 65 and b.id_bu !=25
		GROUP BY
		a.tanggal,
		b.id_bu 
		) x 
		GROUP BY
		x.id_bu
		ORDER BY
		x.id_divre
		";
		$sql_jadwal = $this->db->query($qry_jadwal);
		$exec_jadwal = $sql_jadwal->result_array();
		$no=$kosong=0;
		foreach($exec_jadwal as $data_jadwal){
			$no+=1;
			$kosong=0;
			extract($data_jadwal);
			($tgl1=='') ? $kosong=$kosong+1 :$kosong=$kosong;
			($tgl2=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl3=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl4=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl5=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl6=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl7=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl8=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl9=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl10=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl11=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl12=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl13=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl14=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl15=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl16=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl17=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl18=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl19=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl20=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl21=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl22=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl23=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl24=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl25=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl26=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl27=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl28=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl29=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl30=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			($tgl31=='') ? $kosong=$kosong+1 :$kosong=$kosong ;
			?>
			<?php if($id_divre%2==0){ ?>
			<tr style="background-color: #E8CCC6">
				<?php }else{ ?>
				<tr style="background-color: lightblue">
					<?php }?>
				<td style="font-size:12px;text-align:center;"><?=$no;?></td>
				<td style="font-size:12px;text-align:left;"><?=$nm_bu;?></td>
				<td style="font-size:12px;text-align:center;"><?=$id_divre;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl1;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl2;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl3;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl4;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl5;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl6;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl7;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl8;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl9;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl10;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl11;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl12;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl13;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl14;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl15;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl16;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl17;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl18;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl19;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl20;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl21;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl22;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl23;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl24;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl25;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl26;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl27;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl28;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl29;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl30;?></td>
				<td style="font-size:12px;text-align:center;"><?=$tgl31;?></td>
				<!-- <td style="font-size:12px;text-align:center;"><?=$total_hari;?></td> -->
				<td style="font-size:12px;text-align:center;"><?=(31-$kosong);?></td>
				<td style="font-size:12px;text-align:center;"><?=$kosong;?></td>
				<td style="font-size:12px;text-align:center;"><?=$jadwal;?></td>
			</tr>
			<?php } ?>
			<tr>
				<td></td>
				<td colspan="2" align="center"><b>TOTAL</b></td>
				<td colspan="34"></td>
				<!-- <td align=right></td> -->
			</tr>
		</table>

	</body>
	<html>