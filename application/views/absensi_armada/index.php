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
				<h1>Absensi Armada</h1> 
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="modal fade" id="absensiArmadaModal" tabindex="-1" role="dialog" aria-labelledby="absensiArmadaModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Absensi Armada</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" name="kd_armada" id="kd_armada">
												<input type="hidden" name="status" id="status">
												<div class="form-group">
													<label>Keterangan</label>
													<textarea id="keterangan" name="keterangan" rows="4" cols="50" class="form-control"></textarea>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id='btnSaveAbsensiArmada'>Absen</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="form-group col-md-4">
										<label>Cabang</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-home"></i>
											</div>
											<select class="form-control select2" style="width: 100%;" id="id_cabang" name="id_cabang">
												<!-- <option value="">-- Cabang --</option> -->
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
									<div class="form-group col-md-2">
										<label>Segment</label>
										<select class="form-control select2" style="width: 100%;" id="id_segment">
											<option value="0">-- All Segment --</option>
											<?php foreach ($combobox_segment->result() as $rowmenu) { ?>
											<option value="<?= $rowmenu->id_segment?>"><?= $rowmenu->nm_segment?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label>Tanggal</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Pilih tanggal" value="<?=date('Y-m-d');?>" autocomplete="off"/>
										</div>
									</div>
									<div class="form-group col-md-4">
										<p style="height: 15px"></p>
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
									<div class="col-md-5">
										<small><b>Keterangan</b>
											<ul>
												<li>HTP/HTM : Hari Tunggu Penumpang/Hari Tunggu Muatan</li>
												<li>HTSK : Hari Tuggu Surat Kendaraan</li>
												<li>HJ : Hari Jalan</li>
											</ul></small>
										</div>
										<div class="col-md-7">
											<p style="height: 15px"></p>
											<code>* Syarat Armada bisa dijadwalkan yaitu Armada diabsensikan dengan status HTM/HTP</code>
										</div>
									</div>
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="absenTable">
											<thead>
												<tr>
													<th width="150px">Options</th>
													<th>KD Armada</th>
													<th>No.Polisi</th>
													<th>Segment</th>
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
				ajax: 
				{
					url: "<?= base_url()?>absensi_armada/ax_data_absensi_armada/",
					type: 'POST',
					data: function ( d ) {
						return $.extend({}, d, { 

							"id_bu": $("#id_cabang").val(),
							"tanggal": $("#tanggal").val(),
							"id_segment": $("#id_segment").val(),

						});
					}
				},
				columns: 
				[
				{
					data: "kd_armada", render: function(data, type, full, meta){
						var id1 = "'"+data+"'";
						var str = '';
						str += '<div class="btn-group">';
						str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
						str += '<ul class="dropdown-menu">';
						str += '<li><a onClick="absen(' + id1 + ','+ 1 +')"><i class="fa fa-check-square-o"></i> HTM/HTP</a></li>';
						str += '<li><a onClick="absen(' + id1 + ','+ 3 +')"><i class="fa fa-check-circle"></i> HTSK</a></li>'; 
						str += '</ul>';
						str += '</div>';
						return str;
					}
				},

				{ class:'intro', data: "kd_armada" },
				{ class:'intro', data: "plat_armada" },
				{ class:'intro', data: "nm_segment" },
				{ class:'intro', data: "tgl_absensi" },
				{ class: "intro",data: "status", render: function(data, type, full, meta){
					if(data == 1){
						return 'HTM/HTP';
					}else if(data == 2){
						return 'HJ';
					}else if(data == 3){
						return 'HTSK';
					}else{
						return '';
					}
				}},
				{ class:'intro', data: "keterangan" },
				{ class:'intro', data: "cnm_user" },
				{ class:'intro', data: "date_create" },
				]
			});

			$('#btnSaveAbsensiArmada').on('click', function () {
				var id_cabang 	= $("#id_cabang").val();
				var tanggal 	= $("#tanggal").val();
				var keterangan 	= $("#keterangan").val();
				var kd_armada 	= $("#kd_armada").val();
				var status 		= $("#status").val();

				if($('#id_cabang').val() == '' || $('#id_cabang').val() == '0'){
					alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
				}else if($('#tanggal').val() == 0){
					alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
				}else{
					var url = '<?=base_url()?>absensi_armada/ax_set_data';
					var data = {
						id_cabang	: id_cabang,
						tanggal		: tanggal,
						keterangan	: keterangan,
						kd_armada	: kd_armada,
						status		: status
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data,
						statusCode: {
							500: function() {
								alertify.alert("Warning","Data Duplicate");
							}}
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							if(data['status'] == "success")
							{
								alertify.success("Data Disimpan.");
								absenTable.ajax.reload();
								$('#absensiArmadaModal').modal('hide');
							}else{
								alertify.alert("Data Gagal Disimpan.");
							}
						});
					}
				});

			function absen(kd_armada,status)
			{
				var id_cabang 	= $("#id_cabang").val();
				var tanggal 	= $("#tanggal").val();

				if($('#id_cabang').val() == '' || $('#id_cabang').val() == '0'){
					alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
				}else if($('#tanggal').val() == 0){
					alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
				}else{
					$('#absensiArmadaModal').modal('show');
					$("#kd_armada").val(kd_armada);
					$("#status").val(status);
				}
			}

			function print_pdf() {
				var url 		= "<?=site_url("reports/prints")?>";
				var id_cabang 	= $("#id_cabang").val();
				var tanggal 	= $("#tanggal").val();
				var format 		= 0;

				if (tanggal != '' && id_cabang != '') {
					var bulan = tanggal.substr(5,2);
					var tahun = tanggal.substr(0,4);
					var REQ = "?bulan="+bulan+"&tahun="+tahun+"&tanggal="+tanggal+"&id_cabang="+id_cabang+"&format=html"+"&uk=F4-P"+"&name=absensi_armada";
					open(url+REQ);
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
					window.open("<?=site_url()?>absensi_armada/laporan_absen_pengemudi/"+id_cabang+"/"+bulan+"/"+tahun+"/"+format);
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

			$('#id_segment').select2({
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
					var id_segment 	= $('#id_segment').val();
					var tanggal 	= $('#tanggal').val();
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus semua data pada tanggal '+tanggal+' ?', 
						function(){
							var url = '<?=base_url()?>absensi_armada/ax_unset_data_all_absent';
							var data = {
								id_bu: id_bu,
								id_segment: id_segment,
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
					var tanggal 	= $('#tanggal').val();
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
					var id_segment 	= $('#id_segment').val();
					var tanggal 	= $('#tanggal').val();
					var tanggal_to 	= $('#tanggal_to').val();

					alertify.confirm(
						'Confirmation', 
						'Copy Absensi Armada dari tanggal '+tanggal+' ke tanggal '+tanggal_to, 
						function(){
							var url = '<?=base_url()?>absensi_armada/ax_copy_absensi_armada';
							var data = {
								id_cabang	: id_cabang,
								id_segment	: id_segment,
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
								alertify.success('Absensi Armada Berhasil di Copy ke Tanggal '+data.tanggal_to);
							});
						},
						function(){ }
						);
				}
			});
		</script>
	</body>
	</html>
