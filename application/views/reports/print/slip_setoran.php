<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<?php
	$session = $this->session->userdata('login');
	$id_setoran_detail 		= $this->input->get("id_setoran_detail");
	$id_setoran 			= $this->input->get("id_setoran");
	$armada 		= $this->input->get("armada");
	$kd_segmen 		= $this->input->get("kd_segmen");
	$tgl_setoran 	= $this->input->get("tgl_setoran");
	$kd_trayek 		= $this->input->get("kd_trayek");
	// $jurus_trayek 	= $kd_trayek=="true" ? "jurusan='Pariwisata'" : "jurusan!='Pariwisata'";
	// $kurs 			= $this->input->get("kurs");
	$TANGGAL 		= tgl_indo($tgl_setoran);
	$tahun 			= explode("-",$tgl_setoran)[0];
	$bulan 			= explode("-",$tgl_setoran)[1];
	$no_pol 		= $this->db->get_where("ref_armada",array("kd_armada"=>$armada))->row("plat_armada");

	if($kd_trayek=='0'){
		$query_trayek = "";
	}else if($kd_trayek==''){
		$query_trayek = "";
	}else{
		$query_trayek = "AND kd_trayek='$kd_trayek'";
	}
	$nm_point_awal 	= $this->model_reports->get_info("nm_point_awal","ref_trayek","kd_trayek",$kd_trayek);
	$nm_point_akhir = $this->model_reports->get_info("nm_point_akhir","ref_trayek","kd_trayek",$kd_trayek);

	$query_setoran_detail = $this->db->get_where("ref_setoran_detail",array("id_setoran_detail"=>$id_setoran_detail));
	$query_setoran_detail_pend = $this->db->query("
		select a.id_setoran_pend,a.armada,a.jumlah,a.harga,a.total, a.id_jenis,b.nm_komponen from ref_setoran_detail_pend a
		left join ref_komponen b on b.id_komponen=a.id_jenis where a.id_setoran_detail='$id_setoran_detail'
		");
	$query_setoran_detail_beban = $this->db->query("
		select a.id_setoran_beban,a.armada,a.jumlah,a.harga,a.total, a.id_jenis,b.nm_komponen from ref_setoran_detail_beban a
		left join ref_komponen b on b.id_komponen=a.id_jenis where a.id_setoran_detail='$id_setoran_detail'
		");

	$query_setoran_detail_pnp = $this->db->query("
		select a.id_setoran_pnp,a.rit,a.tanggal,a.armada,a.bagasi_pnp,
		a.kd_trayek,a.jumlah,a.harga,a.total, b.nm_pegawai as driver1, c.nm_pegawai as driver2
		from ref_setoran_detail_pnp a
		left join ref_setoran_detail d on d.id_setoran_detail=a.id_setoran_detail
		left join hris.ref_pegawai b on b.id_pegawai=d.driver1
		left join hris.ref_pegawai c on c.id_pegawai=d.driver2
		where 
		a.id_setoran_detail='$id_setoran_detail'
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
	<title>Slip Setoran <?=$armada?> <?=$kd_segmen?>- <?=$TANGGAL?></title>
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
						$ttd1 = $row["driver1"];
						$ttd2 = $row["driver2"];
						$username = $session['nm_user'];
						$data_trayek = $row["kd_trayek"];
						// $color = $naik==1 ? "blue" : "black";
						// $decor = $agen==1 ? "underline" : "none";
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
						for ($i=0; $i < 5; $i++) { ?>
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
							<td align="center" style="font-weight:bold" colspan="3">UPP KOTOR</td>
							<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($total_upp_kotor,2,',','.')?></td>
						</tr>
						<tr>
							<td colspan="7" style="border-left:2px solid black;border-right:2px solid black"></td>
						</tr>
						<tr>
							<td style="border-left:2px solid black;"></td>
							<td style="border-bottom:1px dotted black">Asuransi</td>
							<td style="border-bottom:1px dotted black" align="right"><?=$kd_segmen=="PAKET"?"":number_format($total_jumlah_pnp,0,',','.')?></td>
							<td style="border-bottom:1px dotted black" align="center">x</td>
							<td style="border-bottom:1px dotted black" align="right">( <?=round($persen_ass_jr)?> x <?=$kd_segmen=="PAKET"?"0":"60"?> )</td>
							<td style="border-bottom:1px dotted black"></td>
							<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black">
								<?=number_format($asuransi= $kd_segmen=="PAKET"?0:($total_jumlah_pnp*60),0,',','.')?>
							</td>
						</tr>
						<tr>
							<td style="border-left:2px solid black"></td>
							<td></td>
							<td></td>
							<td></td>
							<td style="font-weight:bold" colspan="2">UPP BERSIH</td>
							<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($upp_bersih=($total_upp_kotor-$asuransi),0,',','.')?></td>
						</tr>
						<tr>
							<td style="border-left:2px solid black"></td>
							<td></td>
							<td></td>
							<td></td>
							<td style="font-weight:bold" colspan="2">UPP BERSIH + BAGASI</td>
							<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px solid black"><?=number_format($upp_bersih_bagasi=$upp_bersih+$total_bagasi,0,',','.')?></td>
						</tr>
						<tr>
							<td style="border-left:2px solid black"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($upp_bersih,0,',','.')?></td>
						</tr>
						<?php
						$nob = $total_pend_crew = 0;
						foreach($query_setoran_detail_pend->result_array() as $row){
							$nob++;
							$jumlah = $row["jumlah"];
							$harga = $row["harga"];
							$total = $row["total"];
							$nm_komponen = $row["nm_komponen"];
							?>
							<tr>
								<td style="border-left:2px solid black"></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" align="right"><?=$nob?>. <?=$nm_komponen?>* <small>Rp.</small></td>
								<td align="right" style="font-weight:normal;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($total,0,',','.')?></td>
							</tr>
							<?php $total_pend_crew +=$total; } ?>
							<tr>
								<td style="border-left:2px solid black"></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" style="font-weight:bold">PENDAPATAN CREW</td>
								<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px solid black"><?=number_format($total_pend_crew,0,',','.')?></td>
							</tr>
							<tr>
								<td style="font-weight:bold;border-left:2px solid black;color:white"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="font-weight:bold;border-right:2px solid black;color:white" colspan="2">KOMISI</td>
							</tr>
							<tr>
								<td colspan="7" style="border-left:2px solid black;border-right:2px solid black"><b>PENGELUARAN</td>
								</tr>
								<tr>
									<td colspan="4" style="border-left:2px solid black;border-top:2px solid black"></td>
									<td colspan="3" style="border-right:2px solid black;"></td>
								</tr>
								<tr>
									<td colspan="2" style="border-left:2px solid black;">1. Uang Dinas Jalan</td>
									<td colspan="2" align="right"><?=number_format($udj=($total_upp_kotor*7/100),0,',','.')?></td>
									<td colspan="3" align="left" style="border-right:2px solid black;"></td>
								</tr>
								<tr>
									<td colspan="2" style="border-left:2px solid black;">2. Komisi Agen</td>
									<td colspan="2" align="right"><?=number_format(0,0,',','.')?></td>
									<td colspan="3" align="left" style="border-right:2px solid black;"></td>
								</tr>
								<?php
								$no_komp = 2; $total_beban = 0;
								foreach($query_setoran_detail_beban->result_array() as $row){
									$no_komp++;
									$jumlah = $row["jumlah"];
									$harga = $row["harga"];
									$total = $row["total"];
									$nm_komponen = $row["nm_komponen"];

									if($row["id_jenis"]==18) $udj_plus = $total;

									?>
									<tr>
										<td colspan="2" style="border-left:2px solid black;"><?=$no_komp.". ".$nm_komponen;?></td>
										<td colspan="2" align="right"><?=number_format($total,0,',','.')?></td>
										<td colspan="3" align="left" style="border-right:2px solid black;"></td>
									</tr>
									<?php $total_beban+=$total; } ?>

									<?php 
									$total_pengeluaran = 0;
									if($total_bagasi != 0) { 
										$udj_bagasi =($total_bagasi*40/100);
										$total_pengeluaran = $udj+$total_beban+$udj_bagasi;
										?>
										<tr>
											<td colspan="2" style="border-left:2px solid black;"><?=$no_komp+1;?>. UDJ Bagasi</td>
											<td colspan="2" align="right"><?=number_format($udj_bagasi,0,',','.')?></td>
											<td colspan="3" align="left" style="border-right:2px solid black;"></td>
										</tr>
										<tr>
											<td colspan="2" style="border-left:2px solid black;">-</td>
											<td colspan="2" align="right"></td>
											<td colspan="3" align="left" style="border-right:2px solid black;"></td>
										</tr>
										<tr>
											<td colspan="2" style="font-weight:bold;border-left:2px solid black">Total Pengeluaran</td>
											<td colspan="2" align="right" style="font-weight:bold"><?=number_format($total_pengeluaran,0,',','.')?></td>
											<td colspan="3" align="left" style="border-right:2px solid black;"></td>
										</tr>
									<?php } else{ 
										$total_pengeluaran = $udj+$total_beban;
										?>
										<tr>
											<td colspan="2" style="border-left:2px solid black;">-</td>
											<td colspan="2" align="right"></td>
											<td colspan="3" align="left" style="border-right:2px solid black;"></td>
										</tr>
										<tr>
											<td colspan="2" style="font-weight:bold;border-left:2px solid black">Total Pengeluaran</td>
											<td colspan="2" align="right" style="font-weight:bold"><?=number_format($total_pengeluaran,0,',','.')?></td>
											<td colspan="3" align="left" style="border-right:2px solid black;"></td>
										</tr>
									<?php } ?>

									<tr style="height: 25px">
										<td colspan="7" style="border-left:2px solid black;border-right:2px solid black"><font color="white">.</font></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black"></td>
										<td></td>
										<td colspan="4" style="font-weight:bold;border-bottom:1px dotted black">PENDAPATAN BERSIH</td>
										<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($pendapatan_bersih=$upp_bersih-$total_pengeluaran,0,',','.')?></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black"></td>
										<td></td>
										<td  colspan="4" style="border-bottom:1px dotted black">PPh Agen <small style="color:#eee">(<?=$persen_pph_agen?>%)</small></td>
										<?php $pph_agen = 0; ?>
										<td style="border-right:2px solid black;border-bottom:1px dotted black" align="right"><?=number_format($pph_agen,0,',','.')?></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black"></td>
										<td></td>
										<td colspan="4" style="border-bottom:1px dotted black">ASS JR <small style="color:#eee">(Rp 60;)</small></td>
										<td style="border-right:2px solid black;border-bottom:1px dotted black" align="right"><?=number_format(isset($asuransi) ? $asuransi : 0, 0,',','.')?></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black"></td>
										<td></td>
										<td colspan="4" style="border-bottom:1px dotted black">PPH UDJ <small style="color:#eee">(<?=$persen_pph_udj?>%)</small></td>
										<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?=number_format(0, 0,',','.')?></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black"></td>
										<td></td>
										<td colspan="4" style="border-bottom:1px dotted black">TITIPAN</td>
										<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?=number_format(isset($total_upp_kotor) ? $total_upp_kotor : 0, 0,',','.')?></td>
									</tr>


									<?php
									?>
									<tr>
										<td style="border-left:2px solid black">Total UDJ Crew</td>
										<td></td>
										<td colspan="4" style="font-weight:bold;border-bottom:1px dotted black">SETOR</td>
										<?php
										$setoran = $total_pend_crew;
										$setoran += isset($udj_plus) ? $udj_plus : 0;
										?>
										<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($setoran, 0,',','.')?></td>
									</tr>
									<tr>
										<td style="border-left:2px solid black;font-weight:bold" align="right">Rp. <?=number_format($udj, 0,',','.')?></td>
										<td></td>
										<td  colspan="4" style="border-bottom:1px solid black"></td>
											<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px solid black"></td>

									<!-- 	<td  colspan="4" style="border-bottom:1px solid black">Crew - <small>Rp. <?=number_format(0, 0,',','.')?></td>
											<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px solid black"><?=number_format($setoran, 0,',','.')?></td> -->
										</tr>
									</table>


									<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="font-size:10px">
										<tr>
											<td align="center" width="50%" style="border-left:2px solid black">Awak Crew</td>
											<td align="center" width="50%" style="border-right:2px solid black">Penerima Setoran</td>
										</tr>
										<tr>
											<td align="center" style="border-left:2px solid black">&nbsp;</td>
											<td align="center" style="border-right:2px solid black">&nbsp;</td>
										</tr>
										<tr>
											<td align="center" style="border-bottom:2px solid black;border-left:2px solid black;padding:2px"><u>&nbsp;<?=$ttd1?> / <?=$ttd2?>&nbsp;</u></td>
											<?php $username = $username ? $username : $this->session->userdata("nm_user")?>
											<td align="center" style="border-bottom:2px solid black;border-right:2px solid black;padding:2px"><u>&nbsp;<?=$username?>&nbsp;</u></td>
										</tr>
									</table>
									<table style="font-size:4px;font-style:italic">
										<tr>
											<td>1</td>
											<td style="text-decoration:none">pembelian tiket melalui loket</td>
											<td style="text-decoration:underline">pembelian tiket melalui agen</td>
										</tr>
										<tr>
											<td>2</td>
											<td style="color:black">penumpang naik melalui loket</td>
											<td style="color:blue">penumpang naik dijalan</td>
										</tr>
										<tr>
											<td>3</td>
											<td colspan="2" style="color:blue">penumpang naik dijalan & penerimaan dibawa sopir</td>
										</tr>
										<tr>
											<td>4</td>
											<td colspan="2" style="color:black">* Penerimaan / Pengeluaran oleh Crew</td>
										</tr>
										<tr>
											<td>5</td>
											<td colspan="2" style="color:black"><small>-</small></td>
										</tr>
									</table>


								</body>
								</html>