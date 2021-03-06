<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$session = $this->session->userdata('login');
	$id_setoran  = $this->input->get('id_setoran');
	$tgl_setoran = $this->input->get('tgl_setoran');
	$armada      = $this->input->get('armada');
	$id_bu       = $this->input->get('id_bu');

	$TANGGAL 		= tgl_indo($tgl_setoran);
	$tahun 			= explode("-",$tgl_setoran)[0];
	$bulan 			= explode("-",$tgl_setoran)[1];
	$no_pol 		= $this->model_reports_ak13->no_pol($armada);
	$kd_trayek 		= $this->model_reports_ak13->kode_trayek($id_setoran);
	$kd_segmen 		= $this->model_reports_ak13->kode_segment($id_setoran);
	$asuransi_trayek 	= $this->model_reports_ak13->asuransi_trayek($id_setoran);
	$sum_km_trayek   	= $this->model_reports_ak13->sum_km_trayek($id_setoran,$id_bu);
	$driver1 			= $this->model_reports_ak13->driver1($id_setoran,$armada);
	$pend_refund     	= $this->model_reports_ak13->get_setoran_detail_pendapatan_refund($id_setoran);

	if($kd_trayek=='0'){
		$query_trayek = "";
	}else if($kd_trayek==''){
		$query_trayek = "";
	}else{
		$query_trayek = "AND kd_trayek='$kd_trayek'";
	}
	if($kd_trayek != ""){
		$nm_point_awal 	= $this->model_reports->get_info("nm_point_awal","ref_trayek","kd_trayek",$kd_trayek);
		$nm_point_akhir = $this->model_reports->get_info("nm_point_akhir","ref_trayek","kd_trayek",$kd_trayek);
	}else{
		$nm_point_awal 	= $nm_point_akhir ="";
	}

	$query_setoran_detail_pnp = $this->db->query("
		select a.id_setoran_pnp,a.rit,a.bagasi_pnp,
		a.kd_trayek,a.jumlah,a.harga,a.total
		from ref_setoran_detail_pnp a
		where a.id_setoran='$id_setoran'
		order by a.id_setoran_detail ASC
		");

	$penumpang = $crew_pendapatan = $komisi_nilai = 0;
	$ttd1 = $ttd2 = $username = "";
	$titipan = $upp_udj = 0;
	$persen_komisi = $kd_segmen=="PAKET" ? 5 : 10;
	$plus_slip = $kd_segmen=="PEMADUMODA" ? 5 : 8;

#perse pajak
	$persen_pph_agen = 2;
	$persen_pph_udj = 2;
	$persen_ass_jr = 0;
	?>
	<title>Slip Setoran</title>
	<script>
		window.print();
		setTimeout(window.close,0);
	</script>
</head>
<body>
	<table cellspacing="0" cellpadding="0" width="100%" align="center" style="font-size:7px">
		<tr>
			<td colspan="7" align="center" style="border-left:2px solid black;border-right:2px solid black;border-top:2px solid black;font-size:12px;font-weight:bold">
				<small><?=$kd_segmen?></small> - (<?=$nm_point_awal." - ".$nm_point_akhir;?>)
			</td>
		</tr>
		<tr>
			<td  style="border-left:2px solid black">Tanggal
				<td style="border-right:2px solid black" colspan="6"><?=$TANGGAL?></td></tr>
				<tr>
					<td  style="border-left:2px solid black;border-bottom:2px solid black">Kode</td>
					<td colspan="6" style="border-right:2px solid black;border-bottom:2px solid black"><?=$no_pol?> / <?=$armada?></td>
				</tr>
				<tr>
					<td colspan="7" style="border-left:2px solid black;border-right:2px solid black;"><b>PENDAPATAN</td>
				</tr>
				<?php
				$nob = $total_jumlah_pnp = $total_upp_kotor = $total_upp_kotor_dan_bagasi = $total_bagasi = 0;
				foreach($query_setoran_detail_pnp->result_array() as $row){
					$nob++;
					$jumlah_pnp = $row["jumlah"];
					$harga = $row["harga"];
					$total = $row["total"];
					$bagasi_pnp = $row["bagasi_pnp"];
					$data_trayek = $row["kd_trayek"];
					$color = "black";
					$decor = "none";
					?>
					<tr>
						<td align="center" style="color:<?=$color?>;border-left:2px solid black;border-bottom:1px dotted black"><?=$data_trayek?></td>
						<td style="color:<?=$color?>;border-bottom:1px dotted black;text-decoration:<?=$decor?>"><?=$kd_segmen=="PAKET" ? "KODI" : "PNP"?> =</td>
						<td align="right" style="color:<?=$color?>;text-decoration:<?=$decor?>;border-bottom:1px dotted black"><?=number_format($jumlah_pnp,0,',','.')?></td>
						<td align="center" style="color:<?=$color?>;border-bottom:1px dotted black;text-decoration:<?=$decor?>"><?=$kd_segmen=="PAKET" ? "" : "x"?></td>
						<td align="right" style="color:<?=$color?>;border-bottom:1px dotted black"><?=$kd_segmen=="PAKET"?"":number_format($harga,0,',','.')?></td>
						<td align="center" style="color:<?=$color?>;border-bottom:1px dotted black">UPP  = Rp</td>
						<td align="right" style="color:<?=$color?>;border-bottom:1px dotted black;border-right:2px solid black"><?=number_format($jumlah_pnp*$harga,0,',','.')?></td>
					</tr>

					<?php 
					$total_jumlah_pnp += $jumlah_pnp; 		$total_upp_kotor += $jumlah_pnp*$harga;  
					$total_upp_kotor_dan_bagasi +=$total; 	$total_bagasi +=$bagasi_pnp;}
					for ($i=0; $i < 3; $i++) { ?>
					<tr>
						<td align="center" style="color:grey;border-left:2px solid black;border-bottom:1px dotted black"></td>
						<td style="color:grey;border-bottom:1px dotted black;text-decoration:<?=$decor?>"><?=$kd_segmen=="PAKET" ? "KODI" : "PNP"?> =</td>
						<td align="right" style="color:grey?>;text-decoration:<?=$decor?>;border-bottom:1px dotted black"></td>
						<td align="center" style="color:grey;border-bottom:1px dotted black;text-decoration:<?=$decor?>"><?=$kd_segmen=="PAKET" ? "" : "x"?></td>
						<td align="right" style="color:grey;border-bottom:1px dotted black"><?=$kd_segmen=="PAKET" ? "" : number_format(0,0,',','.')?></td>
						<td align="center" style="color:grey;border-bottom:1px dotted black">UPP  = Rp</td>
						<td align="right" style="color:grey;border-bottom:1px dotted black;border-right:2px solid black"></td>
					</tr>
					<?php }?>
					<tr>
						<td style="border-left:2px solid black"></td>
						<td></td>
						<td align="right" style="border:2px solid black"><?=number_format($total_jumlah_pnp,0,',','.')?></td>
						<td style="font-weight:bold" colspan="3" align="center">JUMLAH</td>
						<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px solid black"><?=number_format($total_upp_kotor,2,',','.')?></td>
					</tr>
					<tr>
						<td style="border-left:2px solid black"></td>
						<td></td>
						<td></td>
						<td align="center" style="font-weight:bold" colspan="3">PEND.PENUMPANG</td>
						<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($total_upp_kotor,2,',','.')?></td>
					</tr>
					<tr>
						<td style="border-left:2px solid black"></td>
						<td></td>
						<td></td>
						<td align="center" colspan="3">PEND.BAGASI</td>
						<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($total_bagasi,2,',','.')?></td>
					</tr>

					<?php
					$total_pend = 0;
					$query_setoran_detail_pendapatan = $this->model_reports_ak13->get_setoran_detail_pendapatan($id_setoran);
					foreach($query_setoran_detail_pendapatan->result_array() as $row){
						$keterangan 	= $row["keterangan"];
						$total 			= $row["total"];
						?>
						<tr>
							<td style="border-left:2px solid black"></td>
							<td></td>
							<td></td>
							<td align="center" colspan="3">PEND. <?=strtoupper($row["keterangan"]);?></td>
							<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($row["total"],2,',','.')?></td>
						</tr>
						<?php $total_pend += $row["total"]; 
					}
					$total_upp_kotor_dan_bagasi = $total_upp_kotor_dan_bagasi+$total_pend?>


					<tr>
						<!-- <td style="border-left:2px solid black"></td> -->
						<td style="border-left:2px solid black;height: 10px"></td>
						<td></td>
						<td></td>
						<td align="center" style="font-weight:bold" colspan="3"></td>
						<td align="right" style="font-weight:bold;border-right:2px solid black;"></td>
					</tr>
					<tr>
						<td style="border-left:2px solid black"></td>
						<td></td>
						<td></td>
						<td align="center" style="font-weight:bold" colspan="3">UPP KOTOR</td>
						<td align="right" style="font-weight:bold;border-right:2px solid black;border-top:1px solid black"><?=number_format($total_upp_kotor_dan_bagasi,2,',','.')?></td>
					</tr>
					<tr>
						<td colspan="7" style="border-left:2px solid black;border-right:2px solid black;height: 15px"></td>
					</tr>
					<tr>
						<td colspan="5" style="border-left:2px solid black;" align="left"><b>Pengeluaran</b></td>
						<td colspan="2" style="border-right:2px solid black;" align="right"><b>Asuransi dan Biaya Titipan</b></td>
					</tr>
					<tr>
						<td colspan="2" style="border-left:2px solid black;border-top:2px solid black"></td>
						<td colspan="3"></td>
						<td colspan="2" style="border-right:2px solid black;border-top:2px solid black"></td>
					</tr>
					<tr>
						<td colspan="5" style="border-left:2px solid black;" align="left">
							<?php
							$nomor_beban = $total_beban_2 = $udj_pengemudi = $jml_biaya_langsung = $surplus_minus_operasi = 0;
							$data_setoran_detail_beban_2 = $this->model_reports_ak13->get_setoran_detail_beban_2($id_setoran);
							foreach ($data_setoran_detail_beban_2 as $row_beban) {
								$nomor_beban = $nomor_beban+1; ?>
								<?=$nomor_beban.". ".$row_beban->nm_komponen."&nbsp;=&nbsp;".number_format($row_beban->total,0,",",".")."<br>";?>
								<?php $total_beban_2+=$row_beban->total; 
							}
							
							$udj_pengemudi = ($this->model_reports_ak13->udj_pengemudi($id_setoran,$asuransi_trayek,$id_bu,$total_bagasi,$pend_refund)*0.07);


							 //UDJ PENGEMUDI UNTUK CABANG KORIDOR 1 DAN 8
							if($id_bu==16){
								$udj_pengemudi = 2000*$sum_km_trayek;
							}else{
								$udj_pengemudi = $udj_pengemudi;
							}



							$sharing_profit = $this->model_reports_ak13->sum_sharing_profit($id_setoran);

							if($id_bu==21){
								$komisi_agen = $this->model_reports_ak13->sum_komisi_agen($id_setoran)+$this->model_reports_ak13->udj_bagasi_agen_pontianak($id_setoran);
							}else{
								$komisi_agen = $this->model_reports_ak13->sum_komisi_agen($id_setoran);
							}

							;?>
							<?=($nomor_beban+=1).". Komisi Agen(10%)&nbsp;=&nbsp;".number_format($komisi_agen,0,",",".")."<br>";?>
							<?=($nomor_beban+=1).". Sharing Profit(10%)&nbsp;=&nbsp;".number_format($sharing_profit,0,",",".")."<br>";?>
							<?=($nomor_beban+=1).". UDJ Pengemudi(7%)&nbsp;=&nbsp;".number_format($udj_pengemudi,0,",",".")."<br>";?>
							<?=($nomor_beban+=1).". UDJ Bagasi(10%)&nbsp;=&nbsp;".number_format($udj_bagasi = ($this->model_reports_ak13->udj_bagasi($id_setoran)),0,",",".")."<br><br>";?>
							<?="<b>Total Pengeluaran = ".number_format($total_pengeluaran = ($total_beban_2+$komisi_agen+$udj_pengemudi+$udj_bagasi+$sharing_profit),0,",",".");?>
						</td>

						<td colspan="2" style="border-bottom:1px;border-right:2px solid black">
							1. Asuransi ( <?=number_format($total_jumlah_pnp,0,',','.')?> pnp x <?=$kd_segmen=="PAKET"?"0":$asuransi_trayek?> )&nbsp;=&nbsp;
							<?=number_format($asuransi= $kd_segmen=="PAKET"?0:($total_jumlah_pnp*$asuransi_trayek),0,',','.')?>
							<br>
							<?php
							$nomor_beban_1 = 1;
							$total_beban_1 = $jml_biaya_titipan = $jml_pnp_dan_upp_bus = $jml_upp_kurang_komisi = 0;
							$data_setoran_detail_beban_1 = $this->model_reports_ak13->get_setoran_detail_beban_1($id_setoran);
							foreach ($data_setoran_detail_beban_1 as $row) {
								$nomor_beban_1 = $nomor_beban_1+1; ?>
								<?=$nomor_beban_1.". ".$row->nm_komponen."&nbsp;=&nbsp;".number_format($row->total,0,",",".")."<br>";?>
								<?php
								$total_beban_1+=$row->total; 
							} 
							$total_biaya_titipan = $asuransi+$total_beban_1;
							$total_pengeluaran_dan_titipan = $total_pengeluaran+$total_biaya_titipan;
							?>
							<?="<br><b>Total Biaya Titipan&nbsp;=&nbsp;".number_format($total_biaya_titipan,0,",",".")."<br>";?>
						</td>
						<tr style="height: 25px">
							<td colspan="7" style="border-left:2px solid black;border-right:2px solid black"><font color="white">.</font></td>
						</tr>
						<tr style="height: 25px">
							<td colspan="7" style="border-left:2px solid black;border-right:2px solid black"><font color="white">.</font></td>
						</tr>
						<tr>
							<td style="border-left:2px solid black"></td>
							<td></td>
							<td colspan="4" style="font-weight:bold;border-bottom:1px dotted black">Total Pengeluaran dan Titipan</td>
							<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black">
								<?=number_format($total_pengeluaran_dan_titipan,0,',','.')?></td>
							</tr>
							<tr>
								<td style="border-left:2px solid black"></td>
								<td></td>
								<td colspan="4" style="font-weight:bold;border-bottom:1px dotted black">UPP BERSIH</td>
								<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($upp_bersih=$total_upp_kotor_dan_bagasi-$total_pengeluaran_dan_titipan,0,',','.')?></td>
							</tr>
							<tr>
								<td style="border-left:2px solid black"></td>
								<td></td>
								<td colspan="4" style="border-bottom:1px dotted black">Penerimaan titipan + (Apps, OTA)</td>
								<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?php
									$data_setoran_detail_beban_3 = $this->model_reports_ak13->get_setoran_detail_beban_3($id_setoran);
									$total_beban_3=0;
									foreach ($data_setoran_detail_beban_3 as $row) {
										$total_beban_3+=$row->total;
									}
									$sum_aps_ota_loket = $this->model_reports_ak13->sum_aps_ota_loket($id_setoran);

									$total_biaya_titipan= $total_beban_3+$asuransi;
									echo number_format($penerimaan_kembali_titipan=$total_biaya_titipan+$sum_aps_ota_loket,0,',','.')?></td>
								</tr>
								<tr>
									<td style="border-left:2px solid black"></td>
									<td></td>
									<td colspan="4" style="border-bottom:1px dotted black">PPH Agen (2%)</td>

									<?php
									if($id_bu==21){
										$pph_agen = $this->model_reports_ak13->sum_komisi_agen($id_setoran)*0.02;
									}else{
										$pph_agen = $komisi_agen*0.02;
									}
									?>

									<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?php
										echo number_format($pph_agen,0,',','.')?></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black;height: 10px"></td>
										<td></td>
										<td colspan="4" style="font-weight:bold;border-bottom:1px dotted black"></td>
										<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black;font-weight:bold;height: 10px" align="right"></td>
										<td></td>
										<td colspan="4" style="font-weight:bold;border-bottom:1px solid black">SETOR</td>
										<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px solid black"><?="Rp. ".number_format($setor=($upp_bersih+$total_biaya_titipan+$pph_agen)-$sum_aps_ota_loket,0,',','.')?></td>
									</tr>
									<tr>
										<td colspan="7" style="border-left:2px solid black;border-right:2px solid black;height: 10px"></td>
									</tr>
								</tr>
							</table>

							<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="font-size:8px">
								<tr>
									<td align="center" width="50%" style="border-left:2px solid black">Awak Crew</td>
									<td align="center" width="50%" style="border-right:2px solid black">Penerima Setoran</td>
								</tr>
								<tr>
									<td align="center" style="border-left:2px solid black">&nbsp;</td>
									<td align="center" style="border-right:2px solid black">&nbsp;</td>
								</tr>
								<tr>
									<td align="center" style="border-left:2px solid black">&nbsp;</td>
									<td align="center" style="border-right:2px solid black">&nbsp;</td>
								</tr>
							</table>
							<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="font-size:8px">
								<tr>
									<td align="center" style="border-bottom:2px solid black;border-left:2px solid black;padding:2px"><u><?=$driver1;?></u></td>
									<td align="center" style="border-bottom:2px solid black;border-right:2px solid black;padding:2px"><u><?=$session['nm_user']?></u></td>
								</tr>

							</table>

						</body>
						</html>