<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
	<title>INVOICE</title>
	<?php
	$session = $this->session->userdata('login');

	$id_setoran_detail  = $this->input->get('id_setoran_detail');
	$id_jadwal  		= $this->input->get('id_jadwal');
	$id_bu  			= $this->input->get('id_bu');

	$sql_bu = "select a.* from ref_bu a where a.id_bu=".$id_bu;
	$bu 	= $this->db->query($sql_bu)->row_array();

	$sql_setoran_detail = "select a.* from ref_setoran_detail a where a.id_setoran_detail=".$id_setoran_detail;
	$setoran_detail = $this->db->query($sql_setoran_detail)->row_array();

	$sql_beban = $this->db->query("select a.*,b.nm_komponen from ref_setoran_detail_beban a 
	left join ref_komponen b on a.id_jenis=b.id_komponen
	where a.id_setoran_detail=".$id_setoran_detail);
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
						<td width="100%" style="text-align:center;"><b>PERUSAHAAN UMUM DAMRI (PERUM DAMRI)</b><br/>KANTOR CABANG : <?=strtoupper($bu['nm_bu']);?><br/><?=strtoupper($bu['kota']);?></td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="100%">
							<b>DETAIL SETORAN</b><br />
							ID Setoran 	: <?=$setoran_detail['id_setoran_detail'];?><br /> 
							Armada 		: <?=$setoran_detail['armada'];?><br/>
							Trayek 		: <?=$setoran_detail['kd_trayek'];?><br/>
							Segmen 		: <?=$setoran_detail['kd_segmen'];?><br/>
							Tgl Jadwal 	: <?=$setoran_detail['tanggal'];?><br/>
							Tgl Setoran : <?=$setoran_detail['tgl_setoran'];?><br/>
						</td>
					</tr>
				</table>
				<br />
				<table width="100%" border="1" cellpadding="5" cellspacing="0" align="center">
					<tr>
						<th width="10%">No.</th>
						<th width="18%">Nama</th>
						<th width="18%">Jumlah</th>
						<th width="18%">Harga</th>
						<th width="18%">Total</th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					<?php 
					$no = $total_bayar = 0;
					foreach ($sql_beban->result() as $row) { ?>
					<tr>
						<td><?=$no+=1;?></td>
						<td align="left"><?=$row->nm_komponen;?></td>
						<td align="right"><?=$row->jumlah;?></td>
						<td align="left"><?=$row->harga;?></td>
						<td align="right"><?=$row->total;?></td>
					</tr>
					<?php 
					$total_bayar += $row->total;
				} ?>

				<tr>
					<td colspan="4"><b>Persekot :</b></td>
					<td align="right"><b><?=number_format($setoran_detail['persekot'],0,',','.');?></b></td>
				</tr>
				<tr>
					<td colspan="4"><b>Total Beban :</b></td>
					<td align="right"><b><?=number_format($total_bayar,0,',','.');?></b></td>
				</tr>
				<tr>
					<td colspan="4"><b>Balance :</b></td>
					<td align="right"><b><?php echo 
					number_format($setoran_detail['persekot']-$total_bayar,0,',','.');?></b></td>
				</tr>
			</table>

		</td>
	</tr>
</table>
</body>
</html>