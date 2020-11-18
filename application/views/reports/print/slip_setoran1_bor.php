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
	$id_jadwal   = $this->input->get('id_jadwal');

	$TANGGAL 		= tgl_indo($tgl_setoran);
	$tahun 			= explode("-",$tgl_setoran)[0];
	$bulan 			= explode("-",$tgl_setoran)[1];
	$no_pol 		= $this->model_reports_ak13->no_pol($armada);
	$data_ms_jadwal = $this->model_reports_ak13_bor->ms_jadwal_borongan($id_jadwal);
	$kd_segmen = $data_ms_jadwal['kd_segmen'];

	$this->db->select("a.*");
	$this->db->from("ms_jadwal_borongan a");
	$this->db->where('a.id_jadwal', $id_jadwal);
	$this->db->order_by('a.id_jadwal', 'ASC');
	$query_setoran_detail_pnp = $this->db->get();

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
				<small><?=$kd_segmen?></small> - (<?=$data_ms_jadwal['asal']." - ".$data_ms_jadwal['tujuan'];?>)
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
					$jumlah_pnp = $row["jum_penumpang"];
					$total = $row["upp"];
					$data_trayek = $row["asal"]." - ".$row["tujuan"];
					$color = "black";
					$decor = "none";
					?>
					<tr>
						<td align="center" style="color:<?=$color?>;border-left:2px solid black;border-bottom:1px dotted black"><?=$data_trayek?></td>
						<td style="color:<?=$color?>;border-bottom:1px dotted black;text-decoration:<?=$decor?>"><?=$kd_segmen=="PAKET" ? "KODI" : "PNP"?> =</td>
						<td align="right" style="color:<?=$color?>;text-decoration:<?=$decor?>;border-bottom:1px dotted black"><?=number_format($jumlah_pnp,0,',','.')?></td>
						<td align="center" style="color:<?=$color?>;border-bottom:1px dotted black;text-decoration:<?=$decor?>"></td>
						<td align="right" style="color:<?=$color?>;border-bottom:1px dotted black"></td>
						<td align="center" style="color:<?=$color?>;border-bottom:1px dotted black">UPP  = Rp</td>
						<td align="right" style="color:<?=$color?>;border-bottom:1px dotted black;border-right:2px solid black"><?=number_format($total,0,',','.')?></td>
					</tr>
					<?php 
					$total_jumlah_pnp += $jumlah_pnp;
					$total_upp_kotor += $total; }
					for ($i=0; $i < 3; $i++) { ?>
					<tr>
						<td align="center" style="color:grey;border-left:2px solid black;border-bottom:1px dotted black"></td>
						<td style="color:grey;border-bottom:1px dotted black;text-decoration:<?=$decor?>"><?=$kd_segmen=="PAKET" ? "KODI" : "PNP"?> =</td>
						<td align="right" style="color:grey?>;text-decoration:<?=$decor?>;border-bottom:1px dotted black"></td>
						<td align="center" style="color:grey;border-bottom:1px dotted black;text-decoration:<?=$decor?>"></td>
						<td align="right" style="color:grey;border-bottom:1px dotted black"></td>
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
						<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?=number_format(0,2,',','.')?></td>
					</tr>
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
						<td align="right" style="font-weight:bold;border-right:2px solid black;border-top:1px solid black"><?=number_format($total_upp_kotor,2,',','.')?></td>
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
							$data_setoran_detail_beban_2 = $this->model_reports_ak13_bor->get_setoran_detail_beban_2($id_setoran);
							foreach ($data_setoran_detail_beban_2 as $row_beban) {
								$nomor_beban = $nomor_beban+1; ?>
								<?=$nomor_beban.". ".$row_beban->nm_komponen."&nbsp;=&nbsp;".number_format($row_beban->total,0,",",".")."<br>";?>
								<?php $total_beban_2+=$row_beban->total; 
							}
							$udj_pengemudi = ($this->model_reports_ak13_bor->udj_pengemudi($id_setoran)*0.10);
							;?>
							<?=($nomor_beban+=1).". Komisi Agen(10%)&nbsp;=&nbsp;".number_format(0,0,",",".")."<br>";?>
							<?=($nomor_beban+=1).". UDJ Pengemudi(10%)&nbsp;=&nbsp;".number_format($udj_pengemudi,0,",",".")."<br>";?>
							<?=($nomor_beban+=1).". UDJ Bagasi(10%)&nbsp;=&nbsp;".number_format(0,0,",",".")."<br><br>";?>
							<?="<b>Total Pengeluaran = ".number_format($total_pengeluaran = ($total_beban_2+$udj_pengemudi),0,",",".");?>
						</td>

						<td colspan="2" style="border-bottom:1px;border-right:2px solid black">
							1. Asuransi ( <?=number_format($total_jumlah_pnp,0,',','.')?> pnp x <?=$kd_segmen=="PAKET"?"0":60?> )&nbsp;=&nbsp;
							<?=number_format($asuransi= $kd_segmen=="PAKET"?0:($total_jumlah_pnp*0),0,',','.')?>
							<br>
							<?php
							$nomor_beban_1 = 1;
							$total_beban_1 = $jml_biaya_titipan = $jml_pnp_dan_upp_bus = $jml_upp_kurang_komisi = 0;
							$data_setoran_detail_beban_1 = $this->model_reports_ak13_bor->get_setoran_detail_beban_1($id_setoran);
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
								<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px dotted black"><?=number_format($upp_bersih=$total_upp_kotor-$total_pengeluaran_dan_titipan,0,',','.')?></td>
							</tr>
							<tr>
								<td style="border-left:2px solid black"></td>
								<td></td>
								<td colspan="4" style="border-bottom:1px dotted black">Penerimaan Kembali Titipan</td>
								<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?php
									echo number_format($penerimaan_kembali_titipan=$total_biaya_titipan,0,',','.')?></td>
								</tr>
								<tr>
									<td style="border-left:2px solid black"></td>
									<td></td>
									<td colspan="4" style="border-bottom:1px dotted black">PPH Agen (2%)</td>
									<td align="right" style="border-right:2px solid black;border-bottom:1px dotted black"><?php
										echo number_format($pph_agen=0,0,',','.')?></td>
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
										<td align="right" style="font-weight:bold;border-right:2px solid black;border-bottom:1px solid black"><?="Rp. ".number_format($setor=($upp_bersih+$total_biaya_titipan),0,',','.')?></td>
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
									<td align="center" style="border-bottom:2px solid black;border-left:2px solid black;padding:2px"><u><?=$data_ms_jadwal['pengemudi1']."/".$data_ms_jadwal['pengemudi2'];?></u></td>
									<td align="center" style="border-bottom:2px solid black;border-right:2px solid black;padding:2px"><u><?=$session['nm_user']?></u></td>
								</tr>

							</table>

						</body>
						</html>