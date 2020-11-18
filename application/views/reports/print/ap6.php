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
	$bulan_periode = " (month(tanggal)='$bulan')";
	$tahun = explode("-",$tanggal)[0];
	$tPERIODE = "Bulan";
	$vPERIODE = bulan($bulan)." ".$tahun;
	$endDate = date("t",MKtime(0,0,0,$bulan,1,$year));

	$id_segment = $this->input->get("id_segment");
	$nm_segment = $this->model_reports->get_info("nm_segment","ref_segment","id_segment",$id_segment);

	$session = $this->session->userdata('login');
	if($session['id_bu']=='60'){
		$query_id_bu = "a.id_bu=".$session['id_bu'];
	}else{
		$query_id_bu = "a.id_bu=".$session['id_bu'];
	}

	$general_manager   = $this->model_reports->general_manager($session['id_bu']);
	$manager_usaha     = $this->model_reports->manager_usaha($session['id_bu']);
	?>
	<title>Lampiran AP 6 (usaha)</title>
	<style>
		th{
			background : #ccc;
		}
	</style>
</head>
<body>
<h3 align="center">
	<span>JUMLAH KENDARAAN 
		<br/>JUMLAH RIT / HARI
		<br/>TARIP / PNP
	</span>
</h3>
<table width="100%" style="font-size:13px">
	<tr>
		<td style="font-weight:bold;width:10%">Bulan</td>
		<td style="font-weight:bold;width:1%">:</td>
		<td style="font-weight:bold;width:90%"><?=$vPERIODE;?></td>
	</tr>
	<tr>
		<td style="font-weight:bold">Segmen</td>
		<td style="font-weight:bold">:</td>
		<td style="font-weight:bold"><?=$nm_segment;?></td>
	</tr>
</table>
<table border="1" width="100%" rules="all" cellspacing="0" style="font-size:12px">
	<thead>
	<tr>
		<th rowspan="3" width="2%"><b>No</th>
		<th colspan="2" align="center"><b>NOMOR</th>
		<th rowspan="3" align="center"><b>DAYA<br><b>MUAT</th>
		<th rowspan="3" align="center"><b>JENIS PLYN</th>
		<th colspan="31" align="center"><b>TANGGAL</th>
		<th colspan="11" align="center"><b>JUMLAH</th>
		<th rowspan="3" align="center" width="2%"><b>A</th>
		<th rowspan="3" align="center" width="2%"><b>SG</th>
		<th rowspan="3" align="center" width="2%"><b>SGO</th>
		<th rowspan="3" align="center" width="2%"><b>S.O</th>	
	</tr>
	<tr>
		<th rowspan="2" align="center"><b>CODE BUS</th>
		<th rowspan="2" align="center"><b>POLISI</th>
		<th rowspan ="2" align='center'>1</th>
		<th rowspan ="2" align='center'>2</th>
		<th rowspan ="2" align='center'>3</th>
		<th rowspan ="2" align='center'>4</th>
		<th rowspan ="2" align='center'>5</th>
		<th rowspan ="2" align='center'>6</th>
		<th rowspan ="2" align='center'>7</th>
		<th rowspan ="2" align='center'>8</th>
		<th rowspan ="2" align='center'>9</th>
		<th rowspan ="2" align='center'>10</th>
		<th rowspan ="2" align='center'>11</th>
		<th rowspan ="2" align='center'>12</th>
		<th rowspan ="2" align='center'>13</th>
		<th rowspan ="2" align='center'>14</th>
		<th rowspan ="2" align='center'>15</th>
		<th rowspan ="2" align='center'>16</th>
		<th rowspan ="2" align='center'>17</th>
		<th rowspan ="2" align='center'>18</th>
		<th rowspan ="2" align='center'>19</th>
		<th rowspan ="2" align='center'>20</th>
		<th rowspan ="2" align='center'>21</th>
		<th rowspan ="2" align='center'>22</th>
		<th rowspan ="2" align='center'>23</th>
		<th rowspan ="2" align='center'>24</th>
		<th rowspan ="2" align='center'>25</th>
		<th rowspan ="2" align='center'>26</th>
		<th rowspan ="2" align='center'>27</th>
		<th rowspan ="2" align='center'>28</th>
		<th rowspan ="2" align='center'>29</th>
		<th rowspan ="2" align='center'>30</th>
		<th rowspan ="2" align='center'>31</th>
		<th rowspan="2" align="center"><b>KLD</th>
		<th rowspan="2" align="center"><b>HJ</th>
		<th rowspan="2" align="center"><b>UA</th>
		<th colspan="4" align="center"><b>RUSAK</th>
		<th colspan="4" align="center"><b>NON TEKNIK</th>
	</tr>
	<tr>
		<th align="center"><b>S</th>
		<th align="center"><b>RR</th>
		<th align="center"><b>RB</th>
		<th align="center"><b>JML</th>
		<th align="center"><b>HTP</th>
		<th align="center"><b>HTSK</th>
		<th align="center"><b>HthM</th>
		<th align="center"><b>JML</th>
	</tr>
	<?php 
		$no=0;
		$query = "select a.*
		from ref_armada a
		where $query_id_bu 
		order by a.id_armada
		";
		$jml_pnp = $jml_total = $jml_asuransi = $jml_total_asuransi = 0;
		$sql = $this->db->query($query);
		foreach ($sql->result() as $row) { ?>
			<tr>
				<td align="center"><?=$no+=1;?></td>
				<td align="center"><?=$row->kd_armada;?></td>
				<td align="center"><?=$row->plat_armada;?></td>
				<td align="center"><?=$row->seat_armada;?></td>
				<td align="center"><?=$row->nm_layanan;?></td>
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
				<td align="center"></td>
				<td align="center"></td>
				
			</tr>
		<?php
		
	} ?>
	</thead>
</table>
<font size ='2'>Kolom 6 s.d 36(tgl) diisi salah satu dari singkatan dibawah ini :<br>
HJ &nbsp;&nbsp;&nbsp;&nbsp;
<td>:</td> Hari Jalan <br>
UA&nbsp;&nbsp;&nbsp;
<td>:</td> Usul Afkir <br>
S&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<td>:</td> Service <br>
RR &nbsp;&nbsp;&nbsp;
<td>:</td> Rusak Ringan <br>
RB &nbsp;&nbsp;&nbsp;
<td>:</td> Rusak Berat <br>
<i><b>Jumlah Rusak</b></i> <br>
<b><u>Kategori Non Teknik</b></u><br>
HTP &nbsp;
<td>:</td> Hari Tunggu Pnp <br>


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