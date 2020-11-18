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
				<h1>Jadwal Armada</h1>
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
							<!-- <li class=""><a href="#jadwal-default" data-toggle="tab" aria-expanded="false">Default</a></li> -->
							<li class="pull-left header"></li>
						</ul>

						<input type="hidden" id="unik_select" name="unik_select" value=''/>
						<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="Form-add-bu" id="addModalLabel">Form Tambah Jadwal</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<input type="hidden" id="id_jadwal" name="id_jadwal" value='0' />
											<input type="hidden" id="asal" name="asal" value='0' />
											<input type="hidden" id="tujuan" name="tujuan" value='0' />


											<div class="form-group col-lg-6">
												<label>Trayek</label>
												<select class="form-control select2" style="width: 100%;" id="kd_trayek">
												</select>
											</div>

											<div class="form-group col-lg-6">
												<label>Armada</label>
												<select class="form-control select2" style="width: 100%;" id="armada">
													<option value="0">--Armada--</option>	
												</select>
											</div>

											<div class="form-group col-lg-2">
												<label>Layanan</label>
												<select class="form-control select2" id="layanan" name="layanan" style="width: 100%;" >
													<option value="0">Pilih Layanan</option>
													<option value="1">Royal (RYL)</option>
													<option value="2">Eksekutif (EKS)</option>
													<option value="3">Bisnis (BNS)</option>
													<option value="4">Ekonomi (EKN)</option>
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

											<div class="form-group col-lg-2">
												<label>Target RIT</label>
												<input type="text" class="form-control" id="target" placeholder="Target RIT">
											</div>

											<div class="form-group col-lg-6 has-success" id="div_nomor_lmb">
												<label>NOMOR LMB</label>
												<input type="text" class="form-control" id="nomor_lmb" placeholder="NOMOR LMB">
												<small><font color="blue">* Nomor LMB Untuk Bandung</font></small>
											</div>

											<!-- <div class="form-group col-lg-6 has-success">
												<label>ID LMB</label>
												<select class="form-control select2" style="width: 100%;" id="id_lmb_lewat_hari">
													<option value="0">--LMB--</option>	
												</select>
												<small><font color="blue">* Optional : Untuk Jadwal Lewat Hari (Misal. Bus Antarkota)</font></small>
											</div> -->

											<div class="form-group col-lg-6" id="div_persekot">
												<label>Persekot Driver (Rp)</label>
												<input type="number" class="form-control" id="persekot" placeholder="Persekot (Rp)">
												<small><font color="blue">* Optional : Uang yang dibawakan oleh driver (boleh dikosongkan)</font></small>
											</div>


											<!-- <div class="form-group col-lg-3">
												<label>Jam Awal</label>
												<input type="text" class="timepicker form-control" id="jam" placeholder="Jam Awal">
											</div>
											<div class="form-group col-lg-3">
												<label>Jam Akhir</label>
												<input type="text" class="timepicker form-control" id="jam1" placeholder="Jam Akhir">
											</div> -->

											<!-- <div class="bootstrap-timepicker">
												<div class="form-group col-lg-3">
													<label>Time picker:</label>
													<div class="input-group">
														<input type="text" class="form-control timepicker">
														<div class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</div>
													</div>
												</div>
											</div> -->
											<div class="col-sm-12" align="center">
												<code>* Armada/Driver yang muncul di Tambah Jadwal adalah Armada/Driver yang sudah di absensikan di menu absensi Armada/Driver</code>
											</div>

											<div class="col-sm-12" align="right">
												<hr>
												<div class="form-group form-float">
													<button type="button" class="btn btn-default m-t-15 waves-effect" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary m-t-15 waves-effect" id='btnSave'>Save</button>
												</div>

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row" >
							<div class="col-lg-12">
								<div class="modal fade" id="modalRit" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<div class="form-inline">
													<h4 id="addModalLabel">List RIT</h4>
													<button class="btn btn-primary btn-sm" onclick="addRit()" id="button_add_rit"><i class='fa fa-plus'></i> Tambah Rit</button>
												</div>
												<input type="hidden" id="id_lmb_rit" name="id_lmb_rit" class="form-control">
												<input type="hidden" id="armada_rit" name="armada_rit" class="form-control">
												<input type="hidden" id="id_status_lmb_rit" name="id_status_lmb_rit" class="form-control">
											</div>
											<div class="modal-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataRitTable">
														<thead>
															<tr>
																<th>Action</th>
																<th width="100px">Cdate</th>
																<th>ID Lmb</th>
																<th>Asal-Tujuan</th>
																<th>RIT</th>
																<th>Type Rit</th>
																<th>Penumpang</th>
																<th>Harga</th>
																<th>Total</th>
																<th  width="200px">CUser</th>
															</tr>
														</thead>
													</table>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editRitModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="Form-add-bu" id="editModalLabel">Form Add</h4>
									</div>
									<div class="modal-body">
										<form id="formEditRit">
											<input type="hidden" id="id_rit" name="id_rit" value='' />
											<div class="form-group">
												<label>RIT</label>
												<select class="form-control" style="width: 100%;" id="rit_pnp" name="rit_pnp">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>

												</select>
											</div>

											<div class="form-group">
												<label>Penumpang</label>
												<input type="number" id="jumlah_pnp" name="jumlah_pnp" class="form-control" placeholder="Jumlah Penumpang">
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" id='btnSaveRit'>Save</button>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="addRitModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="Form-add-bu" id="addRitModalLabel">Form Add</h4>
									</div>
									<div class="modal-body">
										<form id="formAddRit">
											<input type="hidden" id="id_lmb_rit_add" name="id_lmb_rit_add" value='' />
											<input type="hidden" id="id_cabang_add" name="id_cabang_add" value='' />
											<input type="hidden" id="tanggal_add" name="tanggal_add" value='' />
											<input type="hidden" id="armada_add" name="armada_add" value='' />
											<div class="form-group">
												<label>Trayek</label>
												<select class="form-control select2" style="width: 100%;" id="kd_trayek_pnp" name="kd_trayek_pnp">
													<option value="0">-- Trayek --</option>
												</select>
											</div>
											<div class="form-group">
												<label>RIT</label>
												<select class="form-control select2" style="width: 100%;" id="rit_pnp_add" name="rit_pnp_add">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>

												</select>
											</div>
											<div class="form-group">
												<label>Type RIT</label>
												<select class="form-control" style="width: 100%;" id="type_rit_add" name="type_rit_add">
													<option value="1">Reguler</option>
													<option value="2">Tambahan</option>
													<option value="3">Gratis</option>

												</select>
											</div>

											<div class="form-group">
												<label>Penumpang</label>
												<input type="number" id="jumlah_pnp_add" name="jumlah_pnp_add" class="form-control" placeholder="Jumlah Penumpang">
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" id='btnSaveAddRit'>Save</button>
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
												<div class="col-md-2" >
													<button class="btn btn-primary" onclick='ViewDetail(0,2)'>
														<i class='fa fa-plus'></i> Tambah Jadwal
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
															<i class='fa fa-copy'></i> Copy Jadwal ke Tanggal
														</button>
														<a type="button" class="btn btn-danger" title="Hapus semua data by tanggal" onClick="deleteAllJadwal()" id="btnDeleteAll"><i class="fa fa-trash"></i> </a>
													</div>
												</div>

											</div>
											<div class="panel-body">
												<hr>
												<table class="table table-striped table-bordered table-hover" id="tbljadwalnondefault">
													<thead>
														<tr>
															<th class="opsi" style="width: 1%">Options</th>
															<th class="opsi intro" style="width: 1%">ID</th>
															<th class="opsi intro" style="width: 3%">Bis</th>
															<th style="width: 1%">Segmen</th>
															<th>Trayek</th>
															<th>Driver 1</th>
															<th>Driver 2</th>
															<th>Layanan</th>
															<th>LMB</th>
															<th>Status</th>
															<th>Target RIT</th>
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
						<h4 class="Form-add-bu" id="barangModalLabel">Copy Jadwal ke Tanggal lain</h4>
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
<script src="<?= base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">

	var tbljadwalnondefault = $('#tbljadwalnondefault').DataTable({
		responsive 	: true,
		ordering 	: false,
		scrollX 	: true,
		processing 	: true,
		serverSide 	: true,
		ajax: 
		{
			url: "<?= base_url()?>jadwal/ax_data_jadwal_hr/",
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

				var bu_sess = $("#id_cabang").val();

				var id = "'"+data+"',2";
				var idd = "'"+data+"'";
				var armada = "'"+full['armada']+"'";
				var id_lmb = "'"+full['id_lmb']+"'";
				var status_lmb = full['status_lmb'];
				var armada_driver = "'"+full['armada']+"','"+full['driver1']+"'";
				var str = '';
				str += '<div class="btn-group divOnTop">';
				str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
				str += '<ul class="dropdown-menu">';
				// str += '<li><a onclick="ViewDetail(' + id + ')"><i class="fa fa-pencil"></i> Edit </a></li>';

				if(status_lmb == 0){
					str += '<li><a onclick="ViewDetail(' + id + ')"><i class="fa fa-pencil"></i> Edit </a></li>';
					str += '<li><a onclick="setRitasearmada(' + armada_driver + ')"><i class="fa fa-group"></i> Absen</a></li>';
					str += '<li><a onclick="DeleteData(' + idd + ')"><i class="fa fa-trash"></i> Hapus</a></li>';
					$("#button_add_rit").show();
				}else if(status_lmb == 1){
					str += '<li><a onclick="ViewDetail(' + id + ')"><i class="fa fa-pencil"></i> Edit </a></li>';
					str += '<li><a onclick="checkoutabsen(' + id_lmb + ')"><i class="fa fa-sign-out"></i> CheckOut</a></li>';

					if(bu_sess == 3){
						str += '<li><a onclick="tampilRit(' + id_lmb + ',' + armada + ',' + status_lmb + ')"><i class="fa fa-list"></i> Rit</a></li>';
					}

					str += '<li><a onclick="DeleteData(' + idd + ')"><i class="fa fa-trash"></i> Hapus</a></li>';
					$("#button_add_rit").show();
				}else if(status_lmb == 2){
					str += '<li><a onclick="ViewDetail(' + id + ')"><i class="fa fa-pencil"></i> Edit </a></li>';
					if(bu_sess == 3){
						str += '<li><a onclick="tampilRit(' + id_lmb + ',' + armada + ',' + status_lmb + ')"><i class="fa fa-list"></i> Rit</a></li>';
					}
					str += '<li><a onclick="DeleteData(' + idd + ')"><i class="fa fa-trash"></i> Hapus</a></li>';

					$("#button_add_rit").hide();
				}
				str += '</ul>';
				str += '</div>';
				return str;
			}
		},
		{ data: "id_jadwal" },
		{ data: "armada" },
		{ data: "kd_segmen" },
		{ class: "intro", data: "nm_trayek" },
		{ class: "intro",  data: "nm_driver" },
		{ class: "intro",  data: "nm_driver2" },
		{ class: "intro",  data: "nm_layanan" },
		{ class: "intro",data: "id_lmb", render: function(data, type, full, meta){
			if(data == 0)
				return '<span class="label label-warning">Belum Absen</span>';
			else return '<span class="label label-success">Absen '+data+'</span>';
		}},
		{ class: "intro",data: "status_lmb", render: function(data, type, full, meta){

			var bu_sess = $("#id_cabang").val();
			
			if(data == 1){
				return '<span class="label label-info">Operasi</span> Rit - '+full['rit']+'<br><span class="label label-default">'+full['tgl_lmb']+'</span>' ;
			}else if(data == 2){
				if(bu_sess == 3){
					return '<span class="label label-success">Selesai</span> Rit - '+full['rit']+'<br><span class="label label-info">'+full['tgl_lmb']+'</span>';
				}else{
					return '<span class="label label-success">Selesai</span> Rit - '+full['rit_pnp']+'<br><span class="label label-info">'+full['rit_pnp']+'</span>';
				}
			}else{
				return '';
			}

		}},
		{ class: "intro",data: "target", render: function(data, type, full, meta){
			// return '<center><b><font color="red">'+data+' Rit</font></b></center>';

			var bu_bandung = $("#id_cabang").val();
			//NOMOR LMB BANDUNG
			if(bu_bandung==4 && full['nomor_lmb'] != null){
				return '<center><b><font color="red">'+data+' Rit</font></b></center> <label class="label label-info" data-dismiss="modal" onClick=""><i class=""></i>Nomor LMB : '+full['nomor_lmb']+'</label>';
			}else{
				return '<center><b><font color="red">'+data+' Rit</font></b></center>';
			}

		}}
		]

	});

	function addRit(){
		$('#formAddRit')[0].reset();
		$('#id_lmb_rit_add').val($('#id_lmb_rit').val());
		$('#id_cabang_add').val($('#id_cabang').val());
		$('#tanggal_add').val($('#tanggal').val());
		$('#armada_add').val($('#armada_rit').val());
		$('#addRitModal').modal('show');
		$('#addRitModalLabel').text('Tambah Data Rit');
		combo_trayek($('#id_cabang').val(), $('#kd_segmen').val(), 0, 0);
	}

	function tampilRit(id_lmb,armada,status_lmb){
		if($('#kd_segmen').val() == 0 || $('#id_cabang').val() == 0 || $('#id_pool').val() == 0 ){
			alertify.alert("Perhatian","Cabang, Pool, dan Segmen Tidak Boleh Kosong");
		}else{
			$('#modalRit').modal('show');
			$('#id_lmb_rit').val(id_lmb);
			$('#armada_rit').val(armada);
			$('#id_status_lmb_rit').val(status_lmb);
			dataRitTable.ajax.reload();
			setTimeout(function(){ dataRitTable.columns.adjust().draw(); }, 1000);
		}
	}

	var dataRitTable = $('#dataRitTable').DataTable({
		"ordering" : false,
		"scrollX": true,
		"processing": true,
		"serverSide": true,
		ajax: 
		{
			url: "<?= base_url()?>jadwal/ax_data_rit/",
			type: 'POST',
			data: function ( d ) {
				return $.extend({}, d, { 
					"id_lmb": $("#id_lmb_rit").val(),
				});
			}
		},
		columns: 
		[
		{
			data: "id_rit", render: function(data, type, full, meta){
				var str = '';
				str += '<div class="btn-group">';
				str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
				str += '<ul class="dropdown-menu">';
				var kd = "editRit('"+data+"')";

				var status_lmb = $('#id_status_lmb_rit').val();
				if(status_lmb !=2){
					str += '<li><a onClick="SetScanTiket(' + data + ')"><i class="fa fa-qrcode"></i> Scan Tiket</a></li>';
					str += '<li><a onclick="'+kd+'"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteRit(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
				}else{
					str += '<li><a onClick="SetScanTiket(' + data + ')"><i class="fa fa-qrcode"></i> Scan Tiket</a></li>';
				}
				
				str += '</ul>';
				str += '</div>';
				return str;
			}
		},
		{ data: "cdate" },
		{ data: "id_lmb" },

		{ class: "intro",data: "nm_point_awal", render: function(data, type, full, meta){
			return data+" - "+full["nm_point_akhir"];
		}},
		{ data: "rit" },
		{ class: "intro",data: "type_rit", render: function(data, type, full, meta){
			if(data == 1){
				return '<span class="label label-info">Reguler</span>' ;
			}else if(data == 2){
				return '<span class="label label-warning">Tambahan</span>';
			}else{
				return '<span class="label label-success">Gratis</span>';
			}

		}
	},
	{ data: "pnp", render: $.fn.dataTable.render.number( ',', '.',0 ) },
	{ data: "harga", render: $.fn.dataTable.render.number( ',', '.',0 ) },
	{ data: "total", render: $.fn.dataTable.render.number( ',', '.',0 ) },
	{ data: "nm_pegawai" }
	]
});


	function ViewDetail(unik,hr){
		armadalist();
		driverlist();
		if($('#kd_segmen').val() == 0){
			alertify.alert("Perhatian","Segmen Tidak Boleh Kosong");

		}
		else if($('#id_cabang').val() == 0){
			alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
		}
		else if($('#id_pool').val() == 0){
			alertify.alert("Perhatian","Pool Tidak Boleh Kosong");
		}
		else{
			ViewData(unik);

			if(unik == 0){
				combo_trayek( $('#id_cabang').val(), $('#kd_segmen').val());
				$('#addModalLabel').html('Tambah Jadwal');
				$('#id_jadwal').val('0');
				$('#jns_pelayanan').val('');
				$('#unik_select').val(hr);
				$('#select2-kd_trayek-container').html('--Trayek--');
				$('#select2-armada-container').html('--Armada--');
				$('#select2-driver-container').html('--Driver--');
				$('#select2-driver2-container').html('--Driver--');
				$('#select2-layanan-container').html('--Layanan--');
				$('#driver').val('');
				$('#driver2').val('');
				$('#armada').val('');
				$('#kd_trayek').val('');
				$('#layanan').val('0').trigger('change');
				$('#persekot').val('');
				// $('#layanan').val('1');
				// $('#jam').val('');
				// $('#jam1').val('');
				$('#target').val('');
				$('#addModal').modal('show');
			}else{
				var url = '<?=base_url()?>jadwal/ax_get_data_by_id_detail';
				if($('#unik_select').val() == 1){
					var tgl = '1901-01-01';	
				}else{
					var tgl = $('#tanggal').val();		
				}
				var data = {
					unik: unik,
					tanggal: tgl,
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Jadwal');
					$('#id_jadwal').val(data['id_jadwal']);
					$('#unik_select').val(hr);
					combo_trayek( $('#id_cabang').val(), $('#kd_segmen').val(), data['kd_trayek'], data['nm_trayek']);
					$('#select2-kd_trayek-container').html(data['nm_trayek']);
					$('#select2-armada-container').html(data['armada']);
					$('#select2-driver-container').html(data['nm_driver']);
					$('#select2-driver2-container').html(data['nm_driver2']);
					// $('#select2-layanan-container').html(data['layanan']);
					$('#select2-layanan-container').val(data['layanan']).trigger('change');
					$('#kd_trayek').val(data['kd_trayek']);
					$('#driver').val(data['driver1']);
					$('#driver2').val(data['driver2']);
					$('#armada').val(data['armada']);
					// $('#jam').val(data['jam']);
					// $('#jam1').val(data['jam1']);
					$('#target').val(data['target']);
					$('#addModal').modal('show');

				});
			}
		}
	}

	function DeleteData(id_jadwal){
		alertify.confirm(
			'Confirmation', 
			'Are you sure you want to delete this data?', 
			function(){
				var url = '<?=base_url()?>jadwal/ax_unset_data';
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
		if($('#kd_trayek').val()=='' || $('#kd_trayek').val()=='0' || $('#kd_trayek').val() == null){
			alertify.alert("Perhatian","Trayek Tidak Boleh Kosong");
			return;
		}else if($('#driver').val()=='' || $('#driver').val()=='0' || $('#driver').val() == null){
			alertify.alert("Perhatian","Driver 1 Tidak Boleh Kosong");
			return;
		}else if($('#armada').val()=='' || $('#armada').val()=='0' || $('#armada').val() == null){
			alertify.alert("Perhatian","Kode Bis Tidak Boleh Kosong");
			return;
		}else if($('#layanan').val()=='0'){
			alertify.alert("Perhatian","Pilih Layanan terlebih dahulu");
			return;
		}else if($('#target').val()==''){
			alertify.alert("Perhatian","Target Tidak Boleh Kosong");
			return;
		}
		else{
			var url = '<?=base_url()?>jadwal/ax_set_data_default';
			var tgl = $('#tanggal').val();		
			var data = {
				id_jadwal		: $('#id_jadwal').val(),
				id_cabang		: $('#id_cabang').val(),
				id_pool			: $('#id_pool').val(),
				armada			: $('#armada').val(),
				kd_segmen		: $('#kd_segmen').val(),
				kd_trayek		: $('#kd_trayek').val(),
				asal			: $('#asal').val(),
				tujuan			: $('#tujuan').val(),
				driver			: $('#driver').val(),
				driver2			: $('#driver2').val(),
				layanan			: $('#layanan').val(),
				// jam				: $('#jam').val(),
				// jam1			: $('#jam1').val(),
				target			: $('#target').val(),
				tanggal			: tgl,
				persekot		: $('#persekot').val(),
				nomor_lmb		: $('#nomor_lmb').val()
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
					$('#addModal').modal('hide');
					tbljadwalnondefault.ajax.reload();
				}else if(data['status'] == "gagal"){
					alertify.alert("Peringatan!",""+data['keterangan']+"");
					$('#id_jadwal').val('0');
					$('#addModal').modal('hide');
				}
			});
		}
	});

	function aturBus(){
		if($('#kd_segmen').val() == 0){
			alertify.alert("Perhatian","Segmen Tidak Boleh Kosong");

		}
		else if($('#id_cabang').val() == 0){
			alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
		}
		else{
			alertify.confirm(
				'Confirmation', 
				'Atur Bus Default?', 
				function(){
					var url = '<?=base_url()?>jadwal/aturBus';
					var data = {
						tanggal	: $("#tanggal").val(),
						cabang	: $("#id_cabang").val(),
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						tbljadwalnondefault.ajax.reload();
						alertify.success('Pengaturan Jadwal Berhasil.');
					});
				},
				function(){ }
				);
		}
	}

	function setRitasearmada(armada,driver1){
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
					var url = '<?=base_url()?>jadwal/setRitasearmada';
					var data = {
						tanggal	: $("#tanggal").val(),
						cabang	: $("#id_cabang").val(),
						kd_armada : armada,
						driver1	: driver1
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
					var url = '<?=base_url()?>jadwal/checkoutabsen';
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

	function combo_trayek(id_cabang, kd_segmen, kd_trayek, nm_trayek){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal/ax_get_trayek", 
			data: {
				id_cabang : id_cabang,
				kd_segmen : kd_segmen,
			},
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				$("#kd_trayek_pnp").html(response.data_trayek).show();
				$('#select2-kd_trayek_pnp-container').html('--Trayek--');
				$('#kd_trayek_pnp').val('0');

				$("#kd_trayek").html(response.data_trayek).show();
				$('#select2-kd_trayek-container').html(nm_trayek);
				$('#kd_trayek').val(kd_trayek);
			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}

	function combo_lmb_lewat_hari(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal/ax_get_lmb_lewat_hari", 
			data: {
				id_bu : $('#id_cabang').val(),
				kd_segmen : $('#kd_segmen').val(),
				kd_armada : $('#armada').val(),
				kd_trayek : $('#kd_trayek').val()
			},
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				$("#id_lmb_lewat_hari").html(response.data_lmb).show();
				$('#select2-id_lmb_lewat_hari-container').html('--ID LMB--');
				$('#id_lmb_lewat_hari').val('0');
			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}


	$('#id_cabang').select2({
		'placeholder': "-- Cabang --",
		'allowClear': true
	}).on("change", function (e) {
		tbljadwalnondefault.ajax.reload();
		poollist();
		driverlist();
		armadalist();
		show_hide_persekot();
		combo_lmb_lewat_hari();
		
		if(this.value==4){
			$("#div_nomor_lmb").show();
		}else{
			$("#div_nomor_lmb").hide();
		};

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
		combo_lmb_lewat_hari();
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

	$('#armada').select2({
		'placeholder': "Armada",
		'allowClear': true
	}).on("change", function (e) {
		combo_lmb_lewat_hari();
	});

	$('#kd_trayek').select2({
		'placeholder': "Trayek",
		'allowClear': true
	}).on("change", function (e) {
		combo_lmb_lewat_hari();
	});

	$( "#tanggal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
	$( "#tanggal_to" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
	$( "#tanggal" ).on("change", function (e) {
		tbljadwalnondefault.ajax.reload();
		armadalist();
		driverlist();
		if( $( "#tanggal" ).val() >= '<?= date('Y-m-d')?>'){
			$( "#atur" ).show();
		}else{
			$( "#atur" ).hide();
		}

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

	//Timepicker
	$(".timepicker").timepicker({
		showInputs: false
	});

	function poollist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal/ax_get_pool", 
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
			url: "<?= base_url() ?>jadwal/ax_get_driver", 
			data: {id_cabang : $("#id_cabang").val(),tgl_absensi : $("#tanggal").val()}, 
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
			url: "<?= base_url() ?>jadwal/ax_get_armada", 
			data: {id_cabang : $("#id_cabang").val(),tgl_absensi : $("#tanggal").val()}, 
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

	function editRit(id){
		var url = '<?=base_url()?>jadwal/ax_get_data_by_id_detail_rit';
		var data = {
			id: id
		};
		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			$('#editModalLabel').html('Edit RIT <font color="blue"><b>'+data['kd_trayek']+'</b></font>');
			$('#id_rit').val(id);
			$('#rit_pnp').val(data['rit']);
			$('#jumlah_pnp').val(data['pnp']);
			$('#editRitModal').modal('show');

		});
	}

	$('#btnSaveAddRit').on('click', function () {
		if($('#kd_trayek_pnp').val()==0 || $('#rit_pnp_add').val()==0 || $('#type_rit_add').val() == 0 || $('#jumlah_pnp_add').val()==''){
			alertify.alert("Perhatian","Isi Semua Data. Data Tidak Boleh Kosong");
			return;
		}
		else{
			var url = '<?=base_url()?>jadwal/ax_set_data_add_rit';
			
			var formData = new FormData($('#formAddRit')[0]);
			$.ajax({
				url : url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data)
				{
					if(data.status)
					{
						alertify.success("Data Berhasil di Input");
						$('#addRitModal').modal('hide');
						dataRitTable.ajax.reload();
						tbljadwalnondefault.ajax.reload();
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');

				}
			});

		}
	});

	$('#btnSaveRit').on('click', function () {
		if($('#rit_pnp').val()=='' || $('#rit_pnp').val()=='0' || $('#rit_pnp').val() == null){
			alertify.alert("Perhatian","RIT Tidak Boleh Kosong");
			return;
		}else if($('#jumlah_pnp').val()=='' || $('#jumlah_pnp').val()=='0' || $('#jumlah_pnp').val() == null){
			alertify.alert("Perhatian","Penumpang Tidak Boleh Kosong");
			return;
		}
		else{
			var url = '<?=base_url()?>jadwal/ax_set_data_update_rit';
			var formData = new FormData($('#formEditRit')[0]);
			$.ajax({
				url : url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data)
				{
					if(data.status)
					{
						alertify.success("Data Terupdate.");
						$('#editRitModal').modal('hide');
						dataRitTable.ajax.reload();
						tbljadwalnondefault.ajax.reload();
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
				}
			});

		}
	});

	function DeleteRit(id){
		alertify.confirm(
			'Confirmation', 
			'Are you sure you want to delete this data?', 
			function(){
				var url = '<?=base_url()?>jadwal/ax_unset_data_rit';
				var data = {
					id_rit: id
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					dataRitTable.ajax.reload();
					tbljadwalnondefault.ajax.reload();
					alertify.error('Rit data terhapus.');
				});
			},
			function(){ }
			);
	}

	function deleteAllJadwal(){
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
			var id_bu 		= $('#id_cabang').val();
			var id_pool 	= $('#id_pool').val();
			var kd_segmen 	= $('#kd_segmen').val();
			var tanggal 	= $('#tanggal').val();
			alertify.confirm(
				'Konfirmasi', 
				'Apa anda yakin akan menghapus semua data pada tanggal '+tanggal+' ?', 
				function(){
					var url = '<?=base_url()?>jadwal/ax_unset_data_all_jadwal';
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
				'Copy Jadwal Armada dari tanggal '+tanggal+' ke tanggal '+tanggal_to, 
				function(){
					var url = '<?=base_url()?>jadwal/ax_copy_jadwal';
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
						alertify.success('Jadwal Berhasil di Copy ke Tanggal '+data.tanggal_to);
					});
				},
				function(){ }
				);
		}
	});

	function show_hide_persekot()
	{
		var url = "<?= base_url() ?>jadwal/ax_get_persekot";
		var data = {
			id_bu: $("#id_cabang").val()
		};

		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			if (data['persekot']==1) {
				$("#div_persekot").show();
			}else {
				$("#div_persekot").hide();
			}
		});
	}
</script>

<script type="text/javascript">
	$(function() {
		jQuery.fn.exists = function(){return this.length>0;}
		poollist();
		show_hide_persekot();

		if($("#id_cabang").show()==4){
			$("#div_nomor_lmb").show();
		}else{
			$("#div_nomor_lmb").hide();
		};

	});
</script>
</body>
</html>