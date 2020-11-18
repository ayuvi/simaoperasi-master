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
			<?php
			if($this->session->flashdata('msg')==TRUE):
				echo '<div class="alert alert-success" role="alert">';
			echo $this->session->flashdata('msg');
			echo '</div>';
			endif;
			?>
			<section class="content-header">
				<h1>Absensi Driver</h1>
			</section>
			<section class="invoice">
				<div class="row">

					<div class="col-lg-12">
						<div class="panel panel-default">

							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">List Data</a></li>
									<li class="disabled"><a href="#tab_2">Input</a></li>
								</ul>
								<!-- <form action="#" id="form" role="form"> -->
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">

										<div class="panel-body">

											<div class="row">
												<div class="form-group col-md-4">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-home"></i>
														</div>
														<select class="form-control select2" style="width: 100%;" id="id_cabang" name="id_cabang">
															<?php
															foreach ($combobox_bu->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_bu?>">
																	<?= $rowmenu->nm_bu?>
																</option>
																<?php
															}
															?>
														</select>
													</div>

												</div>
												<div class="form-group col-md-3">
													<div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
														<input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Pilih tanggal" autocomplete="off" value="<?php
														date_default_timezone_set("Asia/Jakarta");
														echo date('Y-m-d')?>" />
													</div>
												</div>

												<div class="form-group col-md-5">
													<button class="btn btn-info" title="Copy Absent" onclick='CopyData()'>
														<i class='fa fa-copy'></i> Copy Absent ke Tanggal
													</button>
													<a type="button" class="btn btn-danger" title="Hapus semua data by tanggal" onClick="deleteAllAbsent()" id="btnDeleteAll"><i class="fa fa-trash"></i> </a>
													<div class="btn-group">
														<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i> Print <span class="caret"></span></button>
														<ul class="dropdown-menu">
															<li><a onclick="print_pdf()" id="print_pdf" value="0"><i class="fa fa-print"></i> PDF</a></li>
															<li><a onclick="print_excell()" id="print_excell" value="2"><i class="fa fa-print"></i> Excell</a></li>
														</ul>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-2">
													<small><b>Keterangan</b>
														<ul>
															<li>I : Ijin</li>
															<li>S : Sakit</li>
															<li>C : Cuti</li>
														</ul></small>
													</div>
													<div class="col-md-2">
														<small><p style="height: 10px"></p><ul>
															<li>S : Siap Dinas</li>
															<li>D : Dinas</li>
															<li>L : Libur</li>
														</ul></small>
													</div>
													<div class="col-md-8">
														<p style="height: 20px"></p>
														<code>* Syarat Driver bisa dijadwalkan yaitu Driver diabsensikan dengan status SIAP DINAS</code>
													</div>
												</div>

												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="absenTable">
														<thead>
															<tr>
																<th width="75px">Options</th>
																<th>No</th>
																<th>NIK</th>
																<th>Nama</th>
																<th>Tanggal</th>
																<th>Status</th>
																<th>Keterangan</th>
																<th>Petugas</th>
																<th>Waktu</th>

															</tr>
														</thead>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab_2">

											<div class="modal-content">
												<div class="modal-header">

													<h4 class="Form-add-bu" id="addModalLabel">Form Keterangan</h4>
												</div>
												<div class="modal-body">

													<div class="row">
														<div class="form-group col-lg-6">
															<label>Nama Pegawai</label>
															<input type="hidden" id="id_pegawai" name="id_pegawai" class="form-control" readonly>
															<input type="text" id="nm_pegawai" name="nm_pegawai" class="form-control" placeholder="Nama Pegawai" readonly>
														</div>
														<div class="form-group col-lg-6">
															<label>Status</label>
															<input type="text" id="status" name="status" class="form-control" placeholder="Status" readonly>
														</div>
														<div class="form-group col-lg-6">
															<label>Tanggal</label>
															<input type="text" id="tgl" name="tgl" class="form-control" placeholder="Tanggal" readonly>
														</div>

														<div class="form-group col-lg-6">
															<label>Keterangan</label>
															<textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
														</div>
													</div>
													<!-- </form> -->
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" onclick="kembali();">Kembali</button>
													<button type="button" class="btn btn-primary" id='btnSave'>Save</button>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<div class="row" >
			<div class="col-lg-12">
				<div class="modal fade" id="copyDataModal" tabindex="-1" role="dialog" aria-labelledby="copyModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="Form-add-bu" id="barangModalLabel">Copy Absent ke Tanggal lain</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Dari Tanggal</label>
									<input type="text" id="tanggal_from" name="tanggal_from" class="form-control" placeholder="Dari Tanggal" readonly="readonly">
								</div>
								<div class="form-group">
									<label>Ke Tanggal</label>
									<input type="text" id="tanggal_to" name="tanggal_to" class="form-control" placeholder="Ke Tanggal" value="<?=date('Y-m-d')?>">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" id='btnCopy'>Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?= $this->load->view('basic_js'); ?>
		<script type='text/javascript'>
			var absenTable = $('#absenTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,

				dom: 'Bfrtip',
				lengthMenu: [
				[ 10, 25, 50, 100, 10000 ],
				[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
				],
				buttons: [
					'pageLength', 'copy', 'csv', 'excel', //'pdf', 'print'
					],

					ajax: 
					{
						url: "<?= base_url()?>absensi_driver/ax_data_absensi_driver/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 

								"id_bu": $("#id_cabang").val(),
								"tanggal": $("#tanggal").val()

							});
						}
					},
					columns: 
					[
					{
						data: "id_pegawai", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="absen(' + data + ','+ "'ijin'" +')"><i class="fa fa-calendar-minus-o"></i> Ijin</a></li>';
							str += '<li><a onClick="absen(' + data + ','+ "'sakit'" +')"><i class="fa fa-ambulance"></i> Sakit</a></li>';
							str += '<li><a onClick="absen(' + data + ','+ "'cuti'" +')"><i class="fa fa-calendar-times-o"></i> Cuti</a></li>';
							str += '<li><a onClick="absen(' + data + ','+ "'siapdinas'" +')"><i class="fa fa-check-circle-o"></i> Siap dinas</a></li>';
							str += '<li><a onClick="absen(' + data + ','+ "'libur'" +')"><i class="	fa fa-times-circle-o"></i> Libur</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					{
						data: "id_pegawai",
						render: function(data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						}
					},
					{ class:'intro', data: "nik_pegawai" },
					{ class:'intro', data: "nm_pegawai" },
					{ class:'intro', data: "tgl_absensi" },
					{ class: "intro",data: "status", render: function(data, type, full, meta){
						if(data == 'I'){
							return 'Ijin';
						}else if(data == 'S'){
							return 'Sakit';
						}else if(data == 'C'){
							return 'Cuti';
						}else if(data == 'D'){
							return 'Dinas';
						}else if(data == 'SD'){
							return 'Siap Dinas';
						}else if(data == 'L'){
							return 'Libur';
						}else{
							return '';
						}
					}},
					// { class:'intro', data: "status" },
					{ class:'intro', data: "keterangan" },
					{ class:'intro', data: "cnm_user" },
					{ class:'intro', data: "date_create" },

					]
				});


			$('#btnSave').on('click', function () {
				if($('#id_pegawai').val() == '')
				{
					alertify.alert("Warning", "Data Belum di isi.");
				}
				else
				{
					var url = '<?=base_url()?>absensi_driver/ax_set_data';
				// var data_save = $('#form').serialize();
				var data_save  = {
					id_pegawai	: $("#id_pegawai").val(),
					status		: $("#status").val(),
					id_cabang	: $("#id_cabang").val(),
					tanggal		: $("#tanggal").val(),
					keterangan	: $("#keterangan").val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data_save,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Duplicate");
						}}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.success("Data Disimpan.");
							$('.nav-tabs a[href="#tab_1"]').tab('show');
							absenTable.ajax.reload();
						}else{
							alertify.alert("Data Gagal Disimpan.");
						}
					});
				}
			});

			function kembali(){
				$('.nav-tabs a[href="#tab_1"]').tab('show');
				absenTable.ajax.reload();
			}

			function absen(id_pegawai,status)
			{
				var id_cabang = $("#id_cabang").val();
				var tanggal = $("#tanggal").val();
				var url = '<?=base_url()?>absensi_driver/ax_get_data_by_id';
				var data = {
					id_pegawai: id_pegawai,
					id_bu: id_cabang
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Form keterangan');
					$('#id_pegawai').val(data.id_pegawai);
					$('#nm_pegawai').val(data.nm_pegawai);
					$('#tgl').val(tanggal);
					$('#status').val(status);
					$('#keterangan').val('');

				// var hari = tanggal.substr(8,2);
				var d = new Date(tanggal);
				var hari = d.getDay();
				switch(hari) {
					case 0: hari = "Minggu"; break;
					case 1: hari = "Senin"; break;
					case 2: hari = "Selasa"; break;
					case 3: hari = "Rabu"; break;
					case 4: hari = "Kamis"; break;
					case 5: hari = "Jum'at"; break;
					case 6: hari = "Sabtu"; break;
				}
				
				$('#tgl').val(hari+', '+tanggal);
				$('.nav-tabs a[href="#tab_2"]').tab('show');
			});

			}

			function print_pdf() {
				tanggal = $("#tanggal").val();
				var id_cabang = $("#id_cabang").val();
				var format = 0;
				if (tanggal != '' && id_cabang != '0') {
					var bulan = tanggal.substr(5,2);
					var tahun = tanggal.substr(0,4);
					window.open("<?=site_url()?>absensi_driver/laporan_absen_pengemudi/"+id_cabang+"/"+bulan+"/"+tahun+"/"+format);
				}else{
					alertify.alert("Warning","Silahkan pilih cabang dan isi tanggal terlebih dahulu");
				}
			}

			function print_excell() {
				tanggal = $("#tanggal").val();
				var id_cabang = $("#id_cabang").val();
				var format = 2;
				if (tanggal != '' && id_cabang != '0') {
					var bulan = tanggal.substr(5,2);
					var tahun = tanggal.substr(0,4);
					window.open("<?=site_url()?>absensi_driver/laporan_absen_pengemudi/"+id_cabang+"/"+bulan+"/"+tahun+"/"+format);
				}else{
					alertify.alert("Warning","Silahkan pilih cabang dan isi tanggal terlebih dahulu");
				}
			}

			$(document).ready(function() {

				$( "#tanggal").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd"
				});
				$( "#tanggal_to").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd",
					yearRange: "-100:+20",
					minDate: '0'
				});

				$( "#tanggal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
				$( "#tanggal_to" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
				$( "#tanggal" ).on("change", function (e) {
					absenTable.ajax.reload();

					//show hide delete all button
					var date1 = new Date($('#tanggal').val()); 
					var date2 = new Date(Date.now());
					selisih = (date2.getTime() - date1.getTime())/(1000 * 3600 * 24);
					if (selisih>=1) {
						$('#btnDeleteAll').hide();
					}else{
						$('#btnDeleteAll').show();
					}
		//End show hide delete all button
	});

				$(".justnumber").keydown(function (e) {
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||

						(e.keyCode == 65 && e.ctrlKey === true) ||

						(e.keyCode == 67 && e.ctrlKey === true) ||

						(e.keyCode == 88 && e.ctrlKey === true) ||

						(e.keyCode >= 35 && e.keyCode <= 39)) {

						return;
				}

				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});


			});

			$('#id_cabang').select2({
				'allowClear': true
			}).on("change", function (e) {
				absenTable.ajax.reload();
			}); 
			function deleteAllAbsent(){
				if($('#id_cabang').val() == 0){
					alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
				}
				else if($('#tanggal').val() == ''){
					alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
				}
				else{
					var id_bu 		= $('#id_cabang').val();
					var tanggal 	= $('#tanggal').val();
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus semua data pada tanggal '+tanggal+' ?', 
						function(){
							var url = '<?=base_url()?>absensi_driver/ax_unset_data_all_absent';
							var data = {
								id_bu: id_bu,
								tanggal: tanggal
							};
							$.ajax({
								url: url,
								method: 'POST',
								data: data
							}).done(function(data, textStatus, jqXHR) {

								var data = JSON.parse(data);
								if(data['status'] == "1"){
									alertify.success("Data Berhasil Terhapus.");
									absenTable.ajax.reload();
								}else{
									alertify.error("Data Gagal Terhapus.");
									absenTable.ajax.reload();
								}
							});
						},
						function(){ }
						);
				}
			}

			function CopyData() {
				if($('#id_cabang').val() == 0){
					alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
				}
				else if($('#tanggal').val() == ''){
					alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
				}
				else{
					var tanggal = $('#tanggal').val();
					$('#tanggal_from').val(tanggal);
					$('#copyDataModal').modal('show');
				}
			}

			$('#btnCopy').on('click', function () {
				if($('#tanggal_to').val()==''){
					alertify.alert("Perhatian","Ke Tanggal Tidak Boleh Kosong");
					return;
				}
				else{
					var id_cabang 	= $('#id_cabang').val();
					var tanggal 	= $('#tanggal').val();
					var tanggal_to 	= $('#tanggal_to').val();

					alertify.confirm(
						'Confirmation', 
						'Copy Absensi Driver dari tanggal '+tanggal+' ke tanggal '+tanggal_to, 
						function(){
							var url = '<?=base_url()?>absensi_driver/ax_copy_absensi_driver';
							var data = {
								id_cabang	: id_cabang,
								tanggal_from : tanggal,
								tanggal_to : tanggal_to,
							};
							$.ajax({
								url: url,
								method: 'POST',
								data: data,
								statusCode: {
									500: function() {
										alertify.alert("Perhatian","Data Tidak Berhasil di Setting");
									}
								}
							}).done(function(data, textStatus, jqXHR) {
								var data = JSON.parse(data);
								absenTable.ajax.reload();
								$('#copyDataModal').modal('hide');
								alertify.success('Absensi Driver Berhasil di Copy ke Tanggal '+data.tanggal_to);
							});
						},
						function(){ }
						);
				}
			});

		</script>
	</body>
	</html>
