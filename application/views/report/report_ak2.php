<!DOCTYPE html>
<html>
	<head>
		<?= $this->load->view('head'); ?>
	</head>
	<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">
		<div class="wrapper">
			<?= $this->load->view('nav'); ?>
			<?= $this->load->view('menu_groups'); ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>Laporan AK2</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading">
									<div class="form-group col-md-4">
										<label>Segmen</label>
										<select class="form-control select2 " style="width: 100%;" id="id_segmen" name="id_segmen">
										<option value="0">--Segmen--</option>
										<?php
											foreach ($combobox_segment->result() as $rowmenu) {
										?>
											<option value="<?= $rowmenu->id_segment?>"><?= $rowmenu->nm_segment?></option>
										<?php
											}
										?>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Penerimaan</label>
										<select class="form-control select2 " style="width: 100%;" id="id_segmen" name="id_segmen">
										<option value="0">--Penerimaan--</option>
										<?php
											foreach ($combobox_komponen->result() as $rowmenu) {
										?>
											<option value="<?= $rowmenu->id_komponen?>"><?= $rowmenu->nm_komponen?></option>
										<?php
											}
										?>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label>Jenis Cetakan</label>
										<select class="form-control" style="width: 100%;" id="format" name="format">
										<option value="0">HTML</option>	
										<option value="1">PDF</option>	
										<option value="2">EXCEL</option>	
										</select>
									</div>
									<div class="form-group col-md-2">
										<label>	Cetak</label></br>
										<button class="btn btn-info" onclick='cetakAk2()'>
										<i class='fa fa-print'></i>
										</button>
									</div>
									<!-- <div class="form-group col-md-4">
										<label>Bulan</label>
										<select class="form-control select2 " style="width: 100%;" id="bulan" name="bulan">
										<option value="0">--Bulan--</option>
										<option value="1">Januari</option>
										<option value="2">Februari</option>
										<option value="3">Maret</option>
										<option value="4">April</option>
										<option value="5">Mei</option>
										<option value="6">Juni</option>
										<option value="7">Juli</option>
										<option value="8">Agustus</option>
										<option value="9">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Tahun</label>
										<select class="form-control select2 " style="width: 100%;" id="tahun" name="tahun">
										<option value="0">--Tahun--</option>
										<?php
										$thn_skr = date('Y');
										for ($x = $thn_skr; $x >= 2019; $x--) {
										?>
											<option value="<?php echo $x ?>"><?php echo $x ?></option>
										<?php
										}
										?>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label>	Generate</label></br>
										<button type = "button" class="btn btn-success" id='createNominatif'>
										<i class='fa fa-refresh'> </i>
										</button>
									</div>
									<div class="col-md-12">
									<hr>
									</div> -->
								</div>
						
								<!-- <div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="nominatifTable">
											<thead>
												<tr>
													<th >Option</th>
													<th >Unit</th>
													<th >Bulan</th>
													<th >Tahun</th>
													<th >Nama</th>
													<th >Tempat Lahir</th>
													<th >Tanggal Lahir</th>
													<th >Usia</th>
													<th >Posisi</th>
													<th >Sub Divisi</th>
													<th >Golongan</th>
													<th >Jenis Kelamin</th>
													<th >Agama</th>
													<th >Status</th>
													<th >Segmen</th>
													<th >Anak</th>
													<th >Pendidikan</th>
													<th >Tanggal Masuk</th>
													<th >Nomor CP</th>
													<th >Tanggal CP</th>
													<th >Nomor PP</th>
													<th >Tanggal PP</th>
													<th >Nomor Pangkat</th>
													<th >Tanggal Pangkat</th>
													<th >Nomor KGB</th>
													<th >Tanggal KGB</th>
													<th >Kerja Tahun</th>
													<th >Kerja Bulan</th>
													<th >Pangkat Berikutnya</th>
													<th >KGB Berikutnya</th>
													<th >Tanggal Pensiun</th>
												</tr>
											</thead>
										</table>
									</div>
								</div> -->

							</div>
						</div>
					</div>

				</section>
			</div>
		</div>
		<?= $this->load->view('basic_js'); ?>
		<script type='text/javascript'>
		
			$('#id_segment').select2({
				'allowClear': true
			}).on("change", function (e) {
				// nominatifTable.ajax.reload();
			});
			
			function cetakAk2(){
				if($('#id_segment').val() == '0') {
					alertify.alert("Warning", "Kolom Segment Belum Dipilih, Silahkan Pilih Isian Kolom Segment terlebih dahulu.");
				} else if($('#id_komponen').val() == '0') { 
					alertify.alert("Warning", "Kolom Komponen Penerimaan Belum Dipilih, Silahkan Pilih Isian Kolom Komponen Penerimaan terlebih dahulu.");
				} else {
					var url     = "<?= base_url() ?>report/laporan_ak2/";
					var id_segment = $('#id_segment').val();
					var id_komponen = $('#id_komponen').val();
					var format = $('#format').val();
					window.open(url+"?id_segment="+id_segment+"&id_komponen="+id_komponen+"&format="+format, '_blank');
					window.focus();
				}	
			}

			$('#createNominatif').on('click', function () {
				if($('#id_divre').val() == '0'){
					alertify.alert("Warning", "Kolom Divre Belum Dipilih, Silahkan Pilih Kolom Divre terlebih dahulu.");
				} else if($('#id_bu').val() == '' || $('#id_bu').val() == '0'){
					alertify.alert("Warning", "Kolom Cabang Belum Dipilih, Silahkan Pilih Kolom Cabang terlebih dahulu.");
				} else if($('#bulan').val() == 0){
					alertify.alert("Warning", "Kolom Bulan Belum Dipilih, Silahkan Pilih Kolom Bulan terlebih dahulu.");
				} else if($('#tahun').val() == 0){
					alertify.alert("Warning", "Kolom Tahun Belum Dipilih, Silahkan Pilih Kolom Tahun terlebih dahulu.");
				}
				else
				{
					$(".loader").show();
					var url = '<?=base_url()?>report/ax_generate_laporan_nominatif';
					var data = {
						id_divre : $('#id_divre').val(),
						id_bu : $('#id_bu').val(),
						format : $('#format').val(),
						bulan : $('#bulan').val(),
						tahun : $('#tahun').val(),
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.alert('<h4 style="color:green"> Berhasil !!! </h4>', '<h1 style="color:green">Laporan Nominatif Cabang Berhasil di buat!', function(){
								// alertify.success('Ok');
							});
							
							// alertify.success("Laporan Nominatif Cabang Berhasil di buat.");
							$(".loader").hide();
							// $('#addModalinputkeluarga').modal('hide');
							nominatifTable.ajax.reload();
						} else {
							alertify.alert('<h4 style="color:red"> Gagal !!! </h4>', '<h1 style="color:red"> Laporan Nominatif Untuk Bulan Ini Sudah di buat! </h1>', function(){
								// alertify.success('Ok');
							});
							// alertify.error('Laporan Nominatif Untuk Bulan Ini Sudah di buat.');
							$(".loader").hide();
							nominatifTable.ajax.reload(); 
						}
					});
				}
			});

			function cetakRincianGaji_exc(){
				if($('#id_divre').val() == '0') {
					alertify.alert("Warning", "Kolom Divre Belum Diisi, Silahkan isi Kolom Divre terlebih dahulu.");
				} else if($('#id_bu').val() == '0') { 
					alertify.alert("Warning", "Kolom Cabang Belum Diisi, Silahkan isi Kolom Cabang terlebih dahulu.");
				} else {
					var url     = "<?= base_url() ?>report/cetakRincianGaji_exc/";
					var id_divre = $('#id_divre').val();
					var id_bu = $('#id_bu').val();
					window.open(url+"?id_divre="+id_divre+"&id_bu="+id_bu, '_blank');
					window.focus();
				}
				
			}

			function DeleteData(id_nominatif)
			{
				alert(id_nominatif);
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>report/ax_unset_data_laporan_nominatif';
						var data = {
							id_nominatif: id_nominatif
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							nominatifTable.ajax.reload();
							alertify.error('Data Laporan Nominatif Berhasil Dihapus.');
						});
					},
					function(){ }
				);
			}
		</script>
	</body>
</html>
