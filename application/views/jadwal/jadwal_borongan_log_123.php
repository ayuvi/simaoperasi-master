<!DOCTYPE html>
<html>
<head>
	<?= $this->load->view('head'); ?>
	<link rel="stylesheet" href="<?= base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
	<style type="text/css">
		.bggreen{
			background-color: #1bff0059;
		}
	</style>
</head>
<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">
	<div class="wrapper">
		<?= $this->load->view('nav'); ?>
		<?= $this->load->view('menu_groups'); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Jadwal Borongan Logistik</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="form-group col-md-4">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-home"></i>
							</div>
							<select class="form-control select2" style="width: 100%;" id="id_cabang">
								<!-- <option value="">-- Cabang --</option> -->
								<?php foreach ($combobox_cabang->result() as $rowmenu) { ?>
								<option value="<?= $rowmenu->id_bu?>"><?= $rowmenu->nm_bu?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group col-md-3">
						<select class="form-control select2" style="width: 100%;" id="id_pool">
							<option value="0"> -- Pool -- </option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<select class="form-control select2" style="width: 100%;" id="kd_segmen">
							<option value="0"> -- Segmen -- </option>
							<?php foreach ($combobox_segmen->result() as $rowmenu) { ?>
							<option value="<?= $rowmenu->kd_segment?>"><?= $rowmenu->nm_segment?></option>
							<?php } ?>
						</select>
					</div>
					<div class="nav-tabs-custom" style="cursor: move;">
						<ul class="nav nav-tabs pull-right ui-sortable-handle">
							<li class="active"><a href="#jadwal-nondefault" data-toggle="tab" aria-expanded="true">Harian</a></li>
							<li class="pull-left header"></li>
						</ul>
						
						<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>

									<div class="modal-body">
										<div class="box box-primary box-solid">
											<div class="box-header with-border">
												<h6 class="box-title" id="editModalPertelaan">Identitas Penyewa</h6>
												<div class="box-tools pull-right">
													<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
												</div>
											</div>
											<div class="box-body no-padding">
												<div class="modal-body">
													<input type="hidden" id="unik_select" name="unik_select" value=''/>
													<input type="hidden" id="id_jadwal" name="id_jadwal" value='0' />

													<div class="form-group col-md-12">
														<label>Jenis Penjadwalan</label>
														<select id="jenis_penjadwalan" name="jenis_penjadwalan" class="form-control select2" style="width: 100%" onchange="select_jenis_penjadwalan()">
															<option value="0"> -- Pilih Penjadwalan --</option>
															<option value="1">UMUM</option>
															<option value="2">RELASI</option>
														</select>
													</div>

													<div class="row" id="jenis_umum">
														<div class="form-group col-md-6">
															<label>Nama</label>
															<input type="text" class="form-control" id="nama" placeholder="Nama">
														</div>
														<div class="form-group col-md-6">
															<label>Kontak Person (HP)</label>
															<input type="text" class="form-control" id="kontak_person" placeholder="Kontak Person (HP)">
														</div>
														<div class="form-group col-md-12">
															<label>No. KTP/SIM</label>
															<input type="text" class="form-control" id="no_ktp" placeholder="No. KTP/SIM">
														</div>
														<div class="form-group col-md-12">
															<label>Alamat</label>
															<input type="text" class="form-control" id="alamat" placeholder="Alamat">
														</div>
													</div>

													<div class="row" id="jenis_relasi">
														<div class="form-group col-md-6">
															<label>Nama PT</label>
															<input type="text" class="form-control" id="nama" placeholder="Nama">
														</div>
														<div class="form-group col-md-6">
															<label>Kontak Person (HP)</label>
															<input type="text" class="form-control" id="kontak_person" placeholder="Kontak Person (HP)">
														</div>
														<div class="form-group col-md-12">
															<label>No. KTP/SIM</label>
															<input type="text" class="form-control" id="no_ktp" placeholder="No. KTP/SIM">
														</div>
														<div class="form-group col-md-12">
															<label>Alamat</label>
															<input type="text" class="form-control" id="alamat" placeholder="Alamat">
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>

									<div class="modal-body">
										<div class="box box-primary box-solid">
											<div class="box-header with-border">
												<h6 class="box-title" id="editModalPertelaan">Detail Jadwal Borongan</h6>
												<div class="box-tools pull-right">
													<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
												</div>
											</div>
											<div class="box-body no-padding">
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12"><p><font color="blue"><b>Kelengkapan Informasi</b></font></p></div>
														<div class="form-group col-md-4">
															<label>Asal</label>
															<input type="text" class="form-control" id="asal" placeholder="Asal">
														</div>
														<div class="form-group col-md-4">
															<label>Tujuan</label>
															<input type="text" class="form-control" id="tujuan" placeholder="Tujuan">
														</div>
														<div class="form-group col-lg-4">
															<label>Armada</label>
															<select class="form-control select2" style="width: 100%;" id="armada">
																<option value="0">--Armada--</option>	
															</select>
														</div>
														<div class="form-group col-lg-4">
															<label>Driver 1</label>
															<select class="form-control select2" style="width: 100%;" id="driver">
																<option value="0">--Driver--</option>
															</select>
														</div>

														<div class="form-group col-lg-4">
															<label>Driver 2</label>
															<select class="form-control select2" style="width: 100%;" id="driver2">
																<option value="0">--Driver--</option>		
															</select>
														</div>

														<div class="form-group col-lg-4">
															<label>Target RIT</label>
															<input type="number" class="form-control" id="target" placeholder="Target RIT">
														</div>
														<div class="form-group bootstrap-timepicker col-lg-4">
															<label>Jam Awal</label>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-clock-o"></i>
																</div>
																<input type="text" class="form-control" id="jam" placeholder="Jam Awal">
															</div>
														</div>
														<div class="form-group bootstrap-timepicker col-lg-4">
															<label>Jam Akhir</label>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-clock-o"></i>
																</div>
																<input type="text" class="form-control" id="jam1" placeholder="Jam Akhir">
															</div>
														</div>
														<div class="form-group col-lg-4">
															<label>Jumlah Penumpang (Orang)</label>
															<input type="number" class="form-control" id="jum_penumpang" placeholder="Jumlah Penumpang">
														</div>
														<div class="form-group col-lg-4">
															<label>Keperluan</label>
															<input type="text" class="form-control" id="keperluan" placeholder="Keperluan">
														</div>
														<div class="form-group col-lg-4">
															<label>Panjang Perjalanan (Km)</label>
															<input type="number" class="form-control" id="km_tempuh" placeholder="KM Tempuh">
														</div>
														<div class="form-group col-lg-4">
															<label>Durasi Sewa (Hari)</label>
															<input type="number" class="form-control" id="durasi_sewa" placeholder="Lama Pemakaian">
														</div>
														<div class="col-md-12"><p><font color="blue"><b>Kesiapan Armada</b></font></p></div>
														<div class="form-group col-lg-4">
															<label>Lokasi Pemberangkatan</label>
															<input type="text" class="form-control" id="lokasi_pemb" placeholder="Lokasi Pemberangkatan">
														</div>
														<div class="form-group col-lg-4">
															<label>Hari Pemberangkatan</label>
															<input disabled="disabled" type="text" class="form-control" id="hari_pemb" placeholder="Hari Pemberangkatan">
														</div>
														<div class="form-group bootstrap-timepicker col-lg-4">
															<label>Jam Pemberangkatan</label>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-clock-o"></i>
																</div>
																<input type="text" class="form-control" id="jam_pemb" placeholder="Jam Pemberangkatan">
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-success" id='btnSave'><i class='fa fa-save'></i> Simpan</button>
												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>


						
						<div class="tab-content no-padding">
							<div class="tab-pane " id="jadwal-default" >
							</div>
							<div class="tab-pane active" id="jadwal-nondefault" >
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<div class="panel-heading">
												<div class="col-md-3" >
													<button class="btn btn-primary" onclick='ViewDetail(0,2)'>
														<i class='fa fa-plus'></i> Tambah Jadwal Borongan
													</button>
												</div>
												<div class="col-md-9">
													<div class="form-group col-md-3">
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</div>
															<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
														</div>
													</div>
													<div class="col-md-6">
														<button class="btn btn-info" onclick='CopyData()'>
															<i class='fa fa-copy'></i> Copy Jadwal Borongan ke Tanggal
														</button>
														<a type="button" class="btn btn-danger" title="Hapus semua data by tanggal" onClick="deleteAllJadwal()"><i class="fa fa-trash"></i> </a>
													</div>
												</div>

											</div>
											<div class="panel-body">
												<hr>
												<table class="table table-striped table-bordered table-hover" id="tbljadwalnondefault">
													<thead>
														<tr>
															<th class="opsi" style="width: 1%">Options</th>
															<th style="width: 15%">Print</th>
															<th class="opsi intro" style="width: 1%">ID</th>
															<th class="opsi intro" style="width: 3%">Bis</th>
															<th style="width: 1%">Segmen</th>
															<th>Trayek</th>
															<th>Driver 1</th>
															<th>Driver 2</th>
															<th>SPSAB</th>
															<th>UPP</th>
															<th>Bayar</th>
														</tr>
													</thead>
												</table>
											</div>
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
						<h4 class="Form-add-bu" id="barangModalLabel">Copy Jadwal Borongan ke Tanggal lain</h4>
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

<div class="row" >
	<div class="col-lg-12">
		<div class="modal fade" id="setPembayaranModal" tabindex="-1" role="dialog" aria-labelledby="copyModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="Form-add-bu" id="barangModalLabel"><font color="blue"><b>Skema Pembayaran</b></font></h4>
					</div>
					<div class="modal-body">
						<div class="form-group col-md-12">
							<div style="margin: 10px 10px 10px 10px">
								<row>
									<input type="hidden" id="id_jadwal_skema" name="id_jadwal_skema"> 
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">UPP</label>
										<div class="col-md-10">
											<input type="number" id="upp" name="upp" class="form-control" placeholder="UPP" data-decimals="0" min="0" onchange="sum_upp()">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">Status</label>
										<div class="col-md-2">
											<input type="checkbox" onchange="setting_sewa(0)" data-toggle="toggle" data-size="normal" id="status_lunas" name="status_lunas" data-onstyle="success">
											<p id="ket_status_lunas"></p>
										</div>
										<div class="col-md-8" id="div_bayar">
											<input type="number" class="form-control" id="bayar" placeholder="DP/Uang Muka" data-decimals="0" min="0" onchange="sum_upp()" value="0">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">Kekurangan Pembayaran</label>
										<div class="col-md-10">
											<input type="number" id="surplus" name="surplus" class="form-control" placeholder="Kekurangan Pembayaran" data-decimals="0" min="0" disabled="disabled">
										</div>
									</div>
									<div class="form-group col-md-12">
									</div>
									<!-- <div class="form-group col-md-12">
										<small><label class="control-label col-md-2"><font color="red">PPH 2% dari UPP</font></label></small>
										<div class="col-md-10">
											<input type="number" id="ppn_10" name="ppn_10" class="form-control" placeholder="PPH 2%" data-decimals="0" min="0" disabled="disabled">
										</div>
									</div> -->
								</row>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id='btnSaveUPP'>Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->load->view('basic_js'); ?>
<script src="<?= base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
	function setting_sewa(nt){
		if (document.getElementById('status_lunas').checked) 
		{
			$("#ket_status_lunas").html('<b><font color="blue">LUNAS</font></b>');
			document.getElementById('div_bayar').style.display = 'none';
		} else {
			$("#ket_status_lunas").html('<b><font color="red">DP</font></b>');
			document.getElementById('div_bayar').style.display = 'block';
		}
		sum_upp();
	}

	function setPembayaran(id_jadwal,upp,bayar){
		var url = '<?=base_url()?>jadwal_borongan_log/ax_get_data_by_id_jadwal';
		var data = {
			id_jadwal: id_jadwal
		};

		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			$('#id_jadwal_skema').val(data['id_jadwal']);
			$('#upp').val(parseInt(data['upp']));
			$('#bayar').val(parseInt(data['bayar']));
			$('#surplus').val(parseInt(data['upp']-data['bayar']));
			$('#ppn_10').val(parseInt(data['upp'])*0.02);

			if(data['upp']==data['bayar']){
				$("#status_lunas").bootstrapToggle('on');
				$("#ket_status_lunas").html('<b><font color="green">LUNAS</font></b>');
				document.getElementById('div_bayar').style.display = 'none';
			}else if(data['upp']>data['bayar']){
				$("#status_lunas").bootstrapToggle('off');
				$("#ket_status_lunas").html('<b><font color="red">DP</font></b>');
				document.getElementById('div_bayar').style.display = 'block';
			}

			$('#setPembayaranModal').modal('show');
		});
	}

	function sum_upp() {
		var upp = $('#upp').val();
		var bayar = $('#bayar').val();
		surplus = upp-bayar;
		if (document.getElementById('status_lunas').checked) 
		{
			$('#surplus').val('0');
			$('#bayar').val(upp);
			$('#ppn_10').val(upp*0.02);
		}else{
			$('#ppn_10').val(upp*0.02);
			$('#surplus').val(surplus);
		}
	}

	$('#btnSaveUPP').on('click', function () {
		if($('#upp').val()=='0'){
			alertify.alert("Perhatian","UPP Tidak Boleh Kosong");
			return;
		}
		else{
			var url = '<?=base_url()?>jadwal_borongan_log/ax_set_data_upp';
			var data = {
				id_jadwal		: $('#id_jadwal_skema').val(),
				upp				: $('#upp').val(),
				bayar			: $('#bayar').val()
			};
			$.ajax({
				url: url,
				method: 'POST',
				data: data,
				statusCode: {
					500: function() {
						alertify.alert("Warning","Data Armada / Driver Duplicate");
					}
				}
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				if(data['status'] == "success"){
					alertify.success("jadwal data Tersimpan.");
					$('#id_jadwal').val('0');
					$('#setPembayaranModal').modal('hide');
					tbljadwalnondefault.ajax.reload();
				}else if(data['status'] == "gagal"){
					alertify.alert("Peringatan!",""+data['keterangan']+"");
					$('#id_jadwal').val('0');
				}
			});
		}
	});

	$("#upp").inputSpinner();
	$("#bayar").inputSpinner();
	$("#surplus").inputSpinner();
	$("#ppn_10").inputSpinner();

	var tbljadwalnondefault = $('#tbljadwalnondefault').DataTable({
		responsive 	: true,
		ordering 	: false,
		scrollX 	: true,
		processing 	: true,
		serverSide 	: true,
		ajax: 
		{
			url: "<?= base_url()?>jadwal_borongan_log/ax_data_jadwal_hr/",
			type: 'POST',
			data: function ( d ) {
				return $.extend({}, d, { 	
					"cabang"	: $("#id_cabang").val(),
					"kd_segmen"	: $("#kd_segmen").val(),
					"id_pool"	: $("#id_pool").val(),
					"tanggal"	: $("#tanggal").val(),
				});
			}
		},
		columns: 
		[
		{
			class: "opsi", data: "id_jadwal", render: function(data, type, full, meta){
				var id = "'"+data+"',2";
				var idd = "'"+data+"'";
				var armada = "'"+full['armada']+"'";
				var bayar = parseInt(full['bayar']);
				var bayar_upp = parseInt(full['upp']);
				var status_lmb = full['status'];
				var id5 = "'"+data+"','"+full['upp']+"','"+full['bayar']+"'";
				var str = '';
				str += '<div class="btn-group divOnTop">';
				str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
				str += '<ul class="dropdown-menu">';
				str += '<li><a onclick="ViewDetail(' + id + ')"><i class="fa fa-pencil"></i> Edit </a></li>';

				str += '<li><a onclick="setPembayaran(' + id5 + ')"><i class="fa fa-money"></i> Pembayaran</a></li>';

				if(bayar == bayar_upp){
					if (status_lmb==0) {
						str += '<li><a onclick="setRitasearmada(' + idd + ')"><i class="fa fa-group"></i> Absen</a></li>';
					}
				}

				str += '<li><a onclick="DeleteData(' + idd + ')"><i class="fa fa-trash"></i> Hapus</a></li>';
				str += '</ul>';
				str += '</div>';
				return str;
			}
		},
		{ data: "id_jadwal", render: function(data, type, full, meta){
			var str = '';
			var id2 = "'"+full['id_jadwal']+"','"+full['tanggal']+"','"+full['armada']+"','"+full['kd_segmen']+"','"+full['asal']+"','"+full['tujuan']+"'";
			str += '<div class="btn-group">';

			var bayar = parseInt(full['bayar']);
			var status = full['status'];
			if (bayar !=0 && status !=0) {
				str += '<a type="button" class="btn btn-sm btn-warning" title="SP-SAB" onclick="spsab(' + data + ')"><i class="fa fa-print"></i> </a>';
				str += '<a type="button" class="btn btn-sm btn-warning" title="AP/1 Borongan" onclick="ap1_borongan(' + data + ')"><i class="fa fa-print"></i> </a>';
			}

			str += '</div>';
			return str;
		}},
		{ data: "id_jadwal" },
		{ data: "armada" },
		{ data: "kd_segmen" },
		{ class: "intro", data: "asal_tujuan" },
		{ class: "intro",  data: "nm_driver" },
		{ class: "intro",  data: "nm_driver2" },
		{ class: "intro",data: "status", render: function(data, type, full, meta){
			if(data == 0)
				return '<span class="label label-warning">Belum Absen</span>';
			else return '<span class="label label-success">Absen '+data+'</span>';
		}},
		{ data: "upp", render: $.fn.dataTable.render.number( '.', ',',0 ) },
		{ data: "bayar", render: $.fn.dataTable.render.number( '.', ',',0 ) }
		]

	});

	function ViewDetail(unik,hr){
		if($('#id_cabang').val() == ''){
			alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");

		}
		else if($('#id_pool').val() == '0'){
			alertify.alert("Perhatian","Pool Tidak Boleh Kosong");
		}
		else if($('#kd_segmen').val() == '0'){
			alertify.alert("Perhatian","Segmen Tidak Boleh Kosong");
		}
		else{
			ViewData(unik);

			if(unik == 0){
				$('#addModalLabel').html('Tambah Jadwal Borongan');
				$('#id_jadwal').val('0');
				$('#nama').val('');
				$('#kontak_person').val('');
				$('#alamat').val('');
				$('#no_ktp').val('');
				$('#asal').val('');
				$('#tujuan').val('');
				$('#unik_select').val(hr);
				$('#select2-armada-container').html('--Armada--');
				$('#select2-driver-container').html('--Driver--');
				$('#select2-driver2-container').html('--Driver--');
				$('#armada').val('');
				$('#driver').val('');
				$('#driver2').val('');
				$('#target').val('');
				$('#jam').val('');
				$('#jam1').val('');
				$('#jum_penumpang').val('');
				$('#keperluan').val('');
				$('#km_tempuh').val('');
				$('#durasi_sewa').val('');
				$('#lokasi_pemb').val('');
				$('#jam_pemb').val('');

				var hari = get_hari($('#tanggal').val());
				$('#hari_pemb').val(hari);

				$('#jenis_umum').hide();
				$('#jenis_relasi').hide();


			}else{
				var url = '<?=base_url()?>jadwal_borongan_log/ax_get_data_by_id_detail';
				if($('#unik_select').val() == 1){
					var tgl = '1901-01-01';	
				}else{
					var tgl = $('#tanggal').val();		
				}
				var data = {
					id_jadwal: unik,
					tanggal: tgl,
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Jadwal Borongan');
					$('#id_jadwal').val(data['id_jadwal']);
					$('#nama').val(data['nama']);
					$('#kontak_person').val(data['kontak_person']);
					$('#alamat').val(data['alamat']);
					$('#no_ktp').val(data['no_ktp']);
					$('#asal').val(data['asal']);
					$('#tujuan').val(data['tujuan']);
					$('#unik_select').val(hr);
					$('#select2-armada-container').html(data['armada']);
					$('#select2-driver-container').html(data['nm_driver']);
					$('#select2-driver2-container').html(data['nm_driver2']);
					$('#armada').val(data['armada']);
					$('#driver').val(data['driver1']);
					$('#driver2').val(data['driver2']);
					$('#target').val(data['target']);
					$('#jam').val(data['jam']);
					$('#jam1').val(data['jam1']);
					$('#jum_penumpang').val(data['jum_penumpang']);
					$('#keperluan').val(data['keperluan']);
					$('#km_tempuh').val(data['km_tempuh']);
					$('#durasi_sewa').val(data['durasi_sewa']);
					$('#lokasi_pemb').val(data['lokasi_pemb']);
					$('#jam_pemb').val(data['jam_pemb']);

					var hari = get_hari(data['tanggal']);
					$('#hari_pemb').val(hari);
				});
			}
		}
	}

	function select_jenis_penjadwalan() {
		var select = $('#jenis_penjadwalan').val();
		if (select==0) {
			$('#jenis_umum').hide();
			$('#jenis_relasi').hide();
		}else if(select==1){
			$('#jenis_umum').show();
			$('#jenis_relasi').hide();
		}else{
			$('#jenis_umum').hide();
			$('#jenis_relasi').show();
		}
	}

	function get_hari(tgl) {
		var d = new Date(tgl);
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
		return hari;
	}

	function DeleteData(id_jadwal){
		alertify.confirm(
			'Confirmation', 
			'Are you sure you want to delete this data?', 
			function(){
				var url = '<?=base_url()?>jadwal_borongan_log/ax_unset_data';
				var data = {
					id_jadwal: id_jadwal
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					tbljadwalnondefault.ajax.reload();
					alertify.error('jadwal data terhapus.');
				});
			},
			function(){ }
			);
	}

	function ViewData(unik){
		$('#addModal').modal('show');
	}

	$('#btnSave').on('click', function () {
		if($('#nama').val()==''){
			alertify.alert("Perhatian","Nama Tidak Boleh Kosong");
			return;
		}else if($('#kontak_person').val()==''){
			alertify.alert("Perhatian","Kontak Person Tidak Boleh Kosong");
			return;
		}else if($('#alamat').val()==''){
			alertify.alert("Perhatian","Alamat Tidak Boleh Kosong");
			return;
		}else if($('#no_ktp').val()==''){
			alertify.alert("Perhatian","Nomor KTP/SIM Tidak Boleh Kosong");
			return;
		}else if($('#asal').val()==''){
			alertify.alert("Perhatian","Asal Tidak Boleh Kosong");
			return;
		}else if($('#tujuan').val()==''){
			alertify.alert("Perhatian","Tujuan Tidak Boleh Kosong");
			return;
		}else if($('#armada').val()==null){
			alertify.alert("Perhatian","Armada Tidak Boleh Kosong");
			return;
		}else if($('#driver').val()==null){
			alertify.alert("Perhatian","Driver Tidak Boleh Kosong");
			return;
		}else if($('#target').val()==''){
			alertify.alert("Perhatian","Target Tidak Boleh Kosong");
			return;
		}else if($('#jam').val()==''){
			alertify.alert("Perhatian","Jam Awal Tidak Boleh Kosong");
			return;
		}else if($('#jam1').val()==''){
			alertify.alert("Perhatian","Jam Akhir Tidak Boleh Kosong");
			return;
		}else if($('#jum_penumpang').val()==''){
			alertify.alert("Perhatian","Jumlah Penumpang Tidak Boleh Kosong");
			return;
		}else if($('#keperluan').val()==''){
			alertify.alert("Perhatian","Keperluan Tidak Boleh Kosong");
			return;
		}else if($('#km_tempuh').val()==''){
			alertify.alert("Perhatian","Panjang Perjalanan Tidak Boleh Kosong");
			return;
		}else if($('#durasi_sewa').val()==''){
			alertify.alert("Perhatian","Durasi Sewa Tidak Boleh Kosong");
			return;
		}else if($('#lokasi_pemb').val()==''){
			alertify.alert("Perhatian","Lokasi Pemberangkatan Tidak Boleh Kosong");
			return;
		}else if($('#jam_pemb').val()==''){
			alertify.alert("Perhatian","Jam Pemberangkatan Tidak Boleh Kosong");
			return;
		}else{
			var url = '<?=base_url()?>jadwal_borongan_log/ax_set_data_default';
			var tgl = $('#tanggal').val();		
			var data = {
				id_jadwal		: $('#id_jadwal').val(),
				id_cabang		: $('#id_cabang').val(),
				id_pool			: $('#id_pool').val(),
				armada			: $('#armada').val(),
				kd_segmen		: $('#kd_segmen').val(),
				asal			: $('#asal').val(),
				tujuan			: $('#tujuan').val(),
				driver			: $('#driver').val(),
				driver2			: $('#driver2').val(),
				jam				: $('#jam').val(),
				jam1			: $('#jam1').val(),
				target			: $('#target').val(),
				tanggal			: tgl,

				nama			: $('#nama').val(),
				kontak_person	: $('#kontak_person').val(),
				alamat			: $('#alamat').val(),
				no_ktp			: $('#no_ktp').val(),
				jum_penumpang	: $('#jum_penumpang').val(),
				keperluan		: $('#keperluan').val(),
				km_tempuh		: $('#km_tempuh').val(),
				durasi_sewa		: $('#durasi_sewa').val(),
				lokasi_pemb		: $('#lokasi_pemb').val(),
				jam_pemb		: $('#jam_pemb').val()
			};
			$.ajax({
				url: url,
				method: 'POST',
				data: data,
				statusCode: {
					500: function() {
						alertify.alert("Warning","Data Jadwal Borongan (Armada) Duplicate");
					}
				}
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				if(data['status'] == "success"){
					alertify.success("jadwal data Tersimpan.");
					$('#id_jadwal').val('0');
					$('#addModal').modal('hide');
					tbljadwalnondefault.ajax.reload();
				}else if(data['status'] == "gagal"){
					alertify.alert("Peringatan!",""+data['keterangan']+"");
					$('#id_jadwal').val('0');
				}
			});
		}
	});

	function setRitasearmada(armada){
		if($('#kd_segmen').val() == 0){
			alertify.alert("Perhatian","Segmen Tidak Boleh Kosong");

		}
		else if($('#id_cabang').val() == 0){
			alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
		}
		else{
			alertify.confirm(
				'Confirmation', 
				'Atur Absensi Default?', 
				function(){
					var url = '<?=base_url()?>jadwal_borongan_log/setRitasearmada';
					var data = {
						id_jadwal	: armada
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data,
						statusCode: {
							500: function() {
								alertify.alert("Warning","Data Tidak Berhasil di Setting");
							}
						}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						tbljadwalnondefault.ajax.reload();
						alertify.success('Pengaturan Absensi Berhasil.');
					});
				},
				function(){ }
				);
		}
	}

	function checkoutabsen(id_lmb){
		if(id_lmb == 0){
			alertify.alert("Perhatian","LMB Tidak Boleh Kosong");
		}else{
			alertify.confirm(
				'Confirmation', 
				'CheckOut Absensi?', 
				function(){
					var url = '<?=base_url()?>jadwal_borongan_log/checkoutabsen';
					var data = {
						id_lmb	: id_lmb,
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data,
						statusCode: {
							500: function() {
								alertify.alert("Warning","Data Tidak Berhasil di Setting");
							}
						}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						tbljadwalnondefault.ajax.reload();
						alertify.success('CheckOut Absensi Berhasil.');
					});
				},
				function(){ }
				);
		}
	}

	$('#id_cabang').select2({
		'placeholder': "Cabang",
		'allowClear': true
	}).on("change", function (e) {
		tbljadwalnondefault.ajax.reload();
		poollist();
		driverlist();
		armadalist(); 
	});

	$('#id_pool').select2({
		'placeholder': "Cabang",
		'allowClear': true
	}).on("change", function (e) {
		tbljadwalnondefault.ajax.reload();
	});

	$('#kd_segmen').select2({
		'placeholder': "Cabang",
		'allowClear': true
	}).on("change", function (e) {
		tbljadwalnondefault.ajax.reload();
	});

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
		tbljadwalnondefault.ajax.reload();
	});	

	//Timepicker
	$(".timepicker").timepicker({
		showInputs: false
	});

	function poollist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal_borongan_log/ax_get_pool", 
			data: {id_cabang : $("#id_cabang").val()}, 
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 

				$("#id_pool").html(response.data_pool).show();
				$('#select2-id_pool-container').html('--Pool--');
				$('#id_pool').val('0');

			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}

	function driverlist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal_borongan_log/ax_get_driver", 
			data: {id_cabang : $("#id_cabang").val()}, 
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 

				$("#driver").html(response.data_driver).show();
				$('#select2-driver-container').html('--Driver--');
				$('#driver').val('0');

				$("#driver2").html(response.data_driver).show();
				$('#select2-driver2-container').html('--Driver--');
				$('#driver2').val('0');

			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}


	function armadalist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal_borongan_log/ax_get_armada", 
			data: {id_cabang : $("#id_cabang").val()}, 
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 

				$("#armada").html(response.data_armada).show();
				$('#select2-armada-container').html('--Armada--');
				$('#armada').val('0');
			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}

	function deleteAllJadwal(){
		if($('#id_cabang').val() == ''){
			alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
		}
		else if($('#id_pool').val() == '0'){
			alertify.alert("Perhatian","Pool Tidak Boleh Kosong");
		}
		else if($('#kd_segmen').val() == '0'){
			alertify.alert("Perhatian","Segment Tidak Boleh Kosong");
		}
		else if($('#tanggal').val() == ''){
			alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
		}
		else{
			var id_bu 		= $('#id_cabang').val();
			var id_pool 	= $('#id_pool').val();
			var kd_segmen 	= $('#kd_segmen').val();
			var tanggal 	= $('#tanggal').val();
			alertify.confirm(
				'Konfirmasi', 
				'Apa anda yakin akan menghapus semua data pada tanggal '+tanggal+' ?', 
				function(){
					var url = '<?=base_url()?>jadwal_borongan_log/ax_unset_data_all_jadwal';
					var data = {
						id_bu: id_bu,
						id_pool: id_pool,
						kd_segmen: kd_segmen,
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
							tbljadwalnondefault.ajax.reload();
						}else{
							alertify.error("Data Gagal Terhapus.");
							tbljadwalnondefault.ajax.reload();
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
		else if($('#id_pool').val() == 0){
			alertify.alert("Perhatian","Pool Tidak Boleh Kosong");
		}
		else if($('#kd_segmen').val() == 0){
			alertify.alert("Perhatian","Segment Tidak Boleh Kosong");
		}
		else if($('#tanggal').val() == 0){
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
			var kd_segmen 	= $('#kd_segmen').val();
			var id_cabang 	= $('#id_cabang').val();
			var id_pool 	= $('#id_pool').val();
			var tanggal 	= $('#tanggal').val();
			var tanggal_to 	= $('#tanggal_to').val();

			alertify.confirm(
				'Confirmation', 
				'Copy Jadwal Borongan dari tanggal '+tanggal+' ke tanggal '+tanggal_to, 
				function(){
					var url = '<?=base_url()?>jadwal_borongan_log/ax_copy_jadwal';
					var data = {
						kd_segmen	: kd_segmen,
						id_cabang	: id_cabang,
						id_pool		: id_pool,
						tanggal_from : tanggal,
						tanggal_to : tanggal_to,
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data,
						statusCode: {
							500: function() {
								alertify.alert("Warning","Data Tidak Berhasil di Setting");
							}
						}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						tbljadwalnondefault.ajax.reload();
						$('#copyDataModal').modal('hide');
						alertify.success('Jadwal Borongan Berhasil di Copy ke Tanggal '+data.tanggal_to);
					});
				},
				function(){ }
				);
		}
	});

	function spsab(id_jadwal){
		var url 		= "<?=site_url("reports/prints")?>";
		var REQ = "?id_jadwal="+id_jadwal+"&format=pdf"+"&uk=A4-P"+"&name=spsab";
		open(url+REQ);
	}
	function ap1_borongan(id_jadwal){
		var url 		= "<?=site_url("reports/prints")?>";
		var REQ = "?id_jadwal="+id_jadwal+"&format=html"+"&uk=A4-P"+"&name=ap1_bor";
		open(url+REQ);
	}

	$(document).ready(function() {

		poollist();

		$("#jam").timepicker({
			showInputs: false,
			showMeridian: false,
		});
		$("#jam1").timepicker({
			showInputs: false,
			showMeridian: false,
		});
		$("#jam_pemb").timepicker({
			showInputs: false,
			showMeridian: false,
		});
	});
</script>
</body>
</html>