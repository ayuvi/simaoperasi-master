<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<title>INVOICE</title>
	<?php
	$session = $this->session->userdata('login');

	$id_jadwal  = $this->input->get('id_jadwal');
	$sql = "select * from ms_jadwal_borongan where id_jadwal=".$id_jadwal;
	$ms_jadwal = $this->db->query($sql)->row_array();

	$sql_sewa = $this->db->query("select * from ms_sewa_borongan where id_jadwal_borongan=".$id_jadwal);
	?>
	<script>
		// window.print();
		// setTimeout(window.close,0);
	</script>
</head>
<body>
	<table width="100%" border="1" align="center">
		<tr>
			<td width="100%">

				<table width="100%" cellpadding="5" align="center">
					<tr>
						<td width="100%" style="text-align:center;"><b>PERUSAHAAN UMUM DAMRI (PERUM DAMRI)</b><br/>KANTOR CABANG : <?=strtoupper($cabang_nama);?><br/><?=strtoupper($cabang_kota);?></td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="80%">
							Kepada,<br />
							<b>PENERIMA</b><br />
							Nama : <?=$ms_jadwal['nama'];?><br /> 
							Alamat : <?=$ms_jadwal['alamat'];?><br/>
							No.Telp : <?=$ms_jadwal['kontak_person'];?><br/>
						</td>
						<td width="50%">
							No. Invoice : 212121<br />
							Tanggal Invoice : <?=$ms_jadwal['tanggal'];?><br />
						</td>
					</tr>
				</table>
				<br />
				<table width="100%" border="1" cellpadding="5" cellspacing="0" align="center">
					<tr>
						<th width="10%">No.</th>
						<th width="45%">Tanggal</th>
						<th width="45%">Bayar</th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					<?php 
					$no=$total_bayar=0;
					foreach ($sql_sewa->result() as $row) { ?>
					<tr>
						<td><?=$no+=1;?></td>
						<td align="left"><?=$row->tanggal;?></td>
						<td align="right"><?=$row->bayar;?></td>
					</tr>
					<?php 
					$total_bayar += $row->bayar;
				} ?>

				<tr>
					<td colspan="2"><b>Invoice Total :</b></td>
					<td align="right"><b><?=number_format($ms_jadwal['upp'],0,',','.');?></b></td>
				</tr>
				<tr>
					<td colspan="2"><b>Amount Paid :</b></td>
					<td align="right"><b><?=number_format($total_bayar,0,',','.');?></b></td>
				</tr>
				<tr>
					<td colspan="2"><b>Balance :</b></td>
					<td align="right"><b><?=number_format($ms_jadwal['upp']-$total_bayar,0,',','.');?></b></td>
				</tr>
			</table>

		</td>
	</tr>
</table>
</body>
</html>