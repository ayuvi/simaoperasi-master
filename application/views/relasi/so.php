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
				<h1>Siap Order</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

								<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Siap Order</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_so" name="id_so" value='' />

												<div class="form-group">
													<label>Relasi</label>
													<select class="form-control select2" style="width: 100%;" name="relasi" id="relasi" required="required">
														<option value="0"> -- Relasi -- </option>
														<?php foreach ($combobox_relasi->result() as $rowmenu) { ?>
														<option value="<?= $rowmenu->id_relasi?>"><?= $rowmenu->nm_relasi?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<label>Project</label>
													<select class="form-control select2" style="width: 100%;" name="project" id="project" required="required">
														<option value="0"> -- Project -- </option>
													</select>
												</div>
												<div class="form-group">
													<label>Rate</label>
													<select class="form-control select2" style="width: 100%;" name="rate" id="rate" required="required">
														<option value="0"> -- Rate -- </option>
													</select>
												</div>
												
												<div class="form-group">
													<label>Tanggal</label>
													<input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" value="<?=date('Y-m-d')?>">
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id='btnSave'>Save</button>
											</div>
										</div>
									</div>
								</div>


								<div class="modal fade" id="addModalDetail" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabelDetail">Form Add DO</h4>
											</div>
											<div class="modal-body">
												

												<div class="form-group">
													<label>Name</label>
													<input type="text" id="nm_project" name="nm_project" class="form-control" placeholder="Name">
												</div>

												<div class="form-group">
													<label>Active</label>
													<select class="form-control" id="active_project" name="active_project">
														<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
														<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
													</select>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id='btnSaveProject'>Save</button>
											</div>
										</div>
									</div>
								</div>

							</div>

							<div class="panel-body">
								<div class="nav-tabs-custom">

									<ul class="nav nav-tabs">
										<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">Data SO</a></li>
										<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Data Delivery Order</a></li>
										<li class=" disabled"><a href="#tab_3" class="disabled" aria-expanded="false">Data Pilih Armada</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">
											<div class="row">
												<div class="col-lg-10">
												</div>
												<div class="col-lg-2">
													<div class="form-group col-lg-12 pull-right">
														<button class="btn btn-primary" onclick='ViewData(0)'>
															<i class='fa fa-plus'></i> Add SO
														</button>
													</div>
												</div>
											</div>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="buTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>Relasi</th>
															<th>Project</th>
															<th>Tanggal</th>
															<th>Asal</th>
															<th>Tujuan</th>
															<th>KM Tempuh</th>
														</tr>
													</thead>
												</table>
											</div>

										</div>


										<div class="tab-pane" id="tab_2">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<center><p id="detail_keterangan_do"></p></center>
													</div>

												</div>
											</div>

											<div class="row">
												<div class="modal-content">
													<div class="box box-primary box-solid">
														<div class="box-header with-border">
															<h6 class="box-title" id="addModalLabel">Tambah Delivery Order</h6>
															<div class="box-tools pull-right">
																<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
															</div>
														</div>
														<div class="box-body">
															<div class="modal-body">
																<div class="row">
																	<input type="hidden" id="id_detail_id_so" name="id_detail_id_so" value='' />

																	<input type="hidden" id="id_detail_id_relasi" name="id_detail_id_relasi" value='' />
																	<input type="hidden" id="id_detail_id_project" name="id_detail_id_project" value='' />
																	<input type="hidden" id="id_detail_id_asal" name="id_detail_id_asal" value='' />
																	<input type="hidden" id="id_detail_id_tujuan" name="id_detail_id_tujuan" value='' />

																	<input type="hidden" id="id_do" name="id_do" value='' />
																	<div class="form-group col-lg-6">
																		<label>Armada</label>
																		<select class="form-control select2 " style="width: 100%;" id="tipe_armada" name="tipe_armada">
																			<option value="0">--Armada--</option>
																		</select>
																	</div>
																	<div class="form-group col-lg-6">
																		<label>Rate</label>
																		<input type="number" id="rate_do" name="rate_do" class="form-control" placeholder="Rate" readonly="readonly">
																	</div>
																</div>
															</div>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn bg-purple btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
															<button type="button" class="btn btn-success" id='btnSaveDO'>Simpan</button>
														</div> 
													</div>
												</div>	
											</div>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="detailTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>Armada</th>
															<th>Rate</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th></th>
															<th></th>
															<th id="tfoot_jum" align="center"></th>
															<th id="tfoot_total_rate"></th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>


										<div class="tab-pane" id="tab_3">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<center><p id="detail_keterangan_armada"></p></center>
													</div>

												</div>
											</div>

											<div class="row">
												<div class="modal-content">
													<div class="box box-primary box-solid">
														<div class="box-header with-border">
															<h6 class="box-title" id="addModalLabel">Pilih Armada yang akan digunakan</h6>
															<div class="box-tools pull-right">
																<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
															</div>
														</div>
														<div class="box-body">
															<div class="modal-body">
																<div class="row">
																	<input type="hidden" id="id_do_armada" name="id_do_armada" value='' />

																	<div class="form-group col-lg-12">
																		<label>Pilih Armada</label>
																		<select class="form-control select2 " style="width: 100%;" id="pilih_armada" name="pilih_armada" onchange="on_off_armada()">
																			<option value="0">-- Pilih Armada --</option>
																			<option value="1"> Perusahaan (DAMRI)</option>
																			<option value="2"> Pihak Ke 3 (Vendor)</option>
																		</select>
																	</div>

																	<div class="form-group col-lg-6" id="pilih_1">
																		<label>Cabang</label>
																		<select class="form-control select2 " style="width: 100%;" id="id_bu" name="id_bu">
																			<?php
																			foreach ($combobox_bu->result() as $rowmenu) {
																				?>
																				<option value="<?= $rowmenu->id_bu?>"><?= $rowmenu->nm_bu?></option>
																				<?php
																			}
																			?>
																		</select>
																	</div>

																	<div class="form-group col-lg-6" id="pilih_2">
																		<label>Armada</label>
																		<select class="form-control select2" style="width: 100%;" id="armada">
																			<option value="0">--Armada--</option>	
																		</select>
																	</div>

																	<div class="form-group col-lg-6" id="pilih_3">
																		<label>Rekanan</label>
																		<select class="form-control select2 " style="width: 100%;" id="id_rekanan" name="id_rekanan">
																			<option value="0">--Pilih Rekanan--</option>
																			<?php
																			foreach ($combobox_rekanan->result() as $rowmenu) {
																				?>
																				<option value="<?= $rowmenu->id_rekanan?>"><?= $rowmenu->nm_rekanan?></option>
																				<?php
																			}
																			?>
																		</select>
																	</div>

																	<div class="form-group col-lg-6" id="pilih_4">
																		<label>Plat Armada</label>
																		<input type="text" id="plat_armada" name="plat_armada" class="form-control" placeholder="Plat Armada">
																	</div>

																</div>
															</div>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn bg-purple btn-default" onClick='closeTab2()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
															<button type="button" class="btn btn-success" id='btnSaveArmada'>Simpan</button>
														</div> 
													</div>
												</div>	
											</div>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="pilihArmadaTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>Jenis</th>
															<th>Rekanan</th>
															<th>Armada</th>
															<th>Plat</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th></th>
															<th></th>
															<th></th>
															<th></th>
															<th></th>
															<th></th>
														</tr>
													</tfoot>
												</table>
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
	<?= $this->load->view('basic_js'); ?>
	<script type='text/javascript'>
		var buTable = $('#buTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>so/ax_data_so/",
				type: 'POST'
			},
			columns: 
			[
			{
				data: "id_so", render: function(data, type, full, meta){
					var id1 = "'"+data+"','"+full['nm_relasi']+"','"+full['nm_project']+"','"+full['asal']+"','"+full['tujuan']+"','"+full['id_relasi']+"','"+full['id_project']+"','"+full['id_asal']+"','"+full['id_tujuan']+"'";
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="DetailData(' + id1 + ')"><i class="fa fa-list"></i> Delivery Order</a></li>';
					str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_so" },
			{ data: "nm_relasi" },
			{ data: "nm_project" },
			{ data: "tanggal" },
			{ data: "asal" },
			{ data: "tujuan" },
			{ data: "km_tempuh", render: $.fn.dataTable.render.number( ',', '.',0 ) },
			]
		});

		var detailTable = $('#detailTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>so/ax_data_do_detail/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_so": $("#id_detail_id_so").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_do", render: function(data, type, full, meta){
					var str = '';
					str += '<div class="btn-group">';
					str += '<a type="button" class="btn btn-sm btn-primary" onclick="pilihArmada(' + data + ')"><i class="fa fa-truck"></i> </a>';
					str += '<button class="btn btn-danger btn-sm btn.flat" onclick="DeleteDataDetail(' + data + ')"><i class="fa fa-trash"></i></button>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_do" },
			{ data: "nm_tipe_armada" },
			{ data: "rate", render: $.fn.dataTable.render.number( ',', '.',0 ) },
			]
			,

			"drawCallback": function(settings) {
				var api = this.api();
				var jsondata = api.ajax.json();
				total = jsondata['total'];
				$('#tfoot_jum').html('<b>JUMLAH</b>');
				$('#tfoot_total_rate').html('<b>Rp. '+formatNumber(total)+'</b>');
			}
		});

		var pilihArmadaTable = $('#pilihArmadaTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>so/ax_data_do_pilih_armada/",
				type: 'POST'
			},
			columns: 
			[
			{
				data: "id_do_pilih", render: function(data, type, full, meta){
					var str = '';
					str += '<div class="btn-group">';
					// str += '<a type="button" class="btn btn-sm btn-primary" onclick="pilihArmada(' + data + ')"><i class="fa fa-truck"></i> </a>';
					str += '<button class="btn btn-danger btn-sm btn.flat" onclick="DeletePilihArmada(' + data + ')"><i class="fa fa-trash"></i></button>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_do_pilih" },
			{ data: "jenis", render: function(data, type, full, meta){
				if(data == 1)
					return "Perusahaan (DAMRI)";
				else return "Pihak ke3 (Vendor)";
			}},
			{ data: "nm_rekanan" },
			{ data: "armada" },
			{ data: "plat_armada" },
			]
		});

		$('#btnSave').on('click', function () {
			if($('#relasi').val() == '0')
			{
				alertify.alert("Warning", "Please fill Relasi.");
			}else if($('#project').val() == '0')
			{
				alertify.alert("Warning", "Please fill Project.");
			}else if($('#rate').val() == '0')
			{
				alertify.alert("Warning", "Please fill Asal.");
			}else if($('#tanggal').val() == '')
			{
				alertify.alert("Warning", "Please fill Tanggal.");
			}
			else
			{
				var url = '<?=base_url()?>so/ax_set_data';
				var data = {
					id_so 		: $('#id_so').val(),
					id_relasi 	: $('#relasi').val(),
					id_project 	: $('#project').val(),
					id_rate 	: $('#rate').val(),
					tanggal 	: $('#tanggal').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Data Saved.");
						$('#addModal').modal('hide');
						buTable.ajax.reload();
					}
				});
			}
		});

		$('#btnSaveDO').on('click', function () {
			if($('#tipe_armada').val() == '0')
			{
				alertify.alert("Warning", "Please fill Armada.");
			}
			else
			{
				var url = '<?=base_url()?>so/ax_set_data_do';
				var data = {
					id_do 		: $('#id_do').val(),
					id_so 		: $('#id_detail_id_so').val(),
					tipe_armada : $('#tipe_armada').val(),
					rate 		: $('#rate_do').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Data Saved.");
						$('#id_do').val("");
						$('#tipe_armada').val('0').trigger('change');
						$('#rate_do').val("");
						detailTable.ajax.reload();
					}
				});
			}
		});

		$('#btnSaveArmada').on('click', function () {
			if($('#pilih_armada').val() == '0')
			{
				alertify.alert("Warning", "Silahkan Pilih Armada.");
			}
			else
			{
				var url = '<?=base_url()?>so/ax_set_data_do_pilih_armada';
				var data = {
					id_do 			: $('#id_do_armada').val(),
					jenis 			: $('#pilih_armada').val(),
					id_rekanan 		: $('#id_rekanan').val(),
					armada 			: $('#armada').val(),
					plat_armada 	: $('#plat_armada').val()
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Data Saved.");
						$('#pilih_armada').val('0').trigger('change');
						$('#id_rekanan').val('0').trigger('change');
						$('#armada').val("");
						$('#plat_armada').val("");
						pilihArmadaTable.ajax.reload();
					}
				});
			}
		});

		function ViewData(id_so)
		{
			if(id_so == 0)
			{
				$('#addModalLabel').html('Add Siap Order');
				$('#id_so').val('');
				$('#relasi').val('0').trigger('change');
				$('#project').val('0').trigger('change');
				$('#rate').val('0').trigger('change');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>so/ax_get_data_by_id';
				var data = {
					id_so: id_so
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Siap Order');
					$('#id_so').val(id_so);
					$('#relasi').val(data['id_relasi']).trigger('change');
					$('#project').val(data['id_project']).trigger('change');
					$('#rate').val(data['id_rate']).trigger('change');
					$('#tanggal').val(data['tanggal']);
					$('#addModal').modal('show');
					projectlist();
					ratelist();
				});
			}
		}

		function ViewDataDetail(id_project)
		{
			if(id_project == 0)
			{
				$('#addModalLabelDetail').html('Add Project');
				$('#id_project').val('');
				$('#nm_project').val('');
				$('#active_project').val('1');
				$('#addModalDetail').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>relasi/ax_get_data_by_id_project';
				var data = {
					id_project: id_project
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabelDetail').html('Edit Project');
					$('#id_relasi_project').val(data['id_relasi']);
					$('#id_project').val(data['id_project']);
					$('#nm_project').val(data['nm_project']);
					$('#active_project').val(data['active']);
					$('#addModalDetail').modal('show');
				});
			}
		}

		function DeleteData(id_so)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>so/ax_unset_data';
					var data = {
						id_so: id_so
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						buTable.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function DeleteDataDetail(id_do)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>so/ax_unset_data_do';
					var data = {
						id_do: id_do
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						detailTable.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function DeletePilihArmada(id_do_pilih)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>so/ax_unset_data_pilih_armada';
					var data = {
						id_do_pilih: id_do_pilih
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						pilihArmadaTable.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function DetailData(id_so,nm_relasi,nm_project,asal,tujuan,id_relasi,id_project,id_asal,id_tujuan){
			$('#detail_keterangan_do').html('<h4><font color="blue"><b>'+nm_relasi+'-'+nm_project+' ('+asal+' - '+tujuan+')</b></font></h4>');
			$('#id_detail_id_so').val(id_so);
			$('#id_detail_id_relasi').val(id_relasi);
			$('#id_detail_id_project').val(id_project);
			$('#id_detail_id_asal').val(id_asal);
			$('#id_detail_id_tujuan').val(id_tujuan);
			$('.nav-tabs a[href="#tab_2"]').tab('show');
			armadalist();
			detailTable.columns.adjust().draw();
		}

		function pilihArmada(id_do) {
			$('#id_do_armada').val(id_do);
			$('#pilih_1').hide();
			$('#pilih_2').hide();
			$('#pilih_3').hide();
			$('#pilih_4').hide();
			armadalist_damri();
			$('.nav-tabs a[href="#tab_3"]').tab('show');
			pilihArmadaTable.columns.adjust().draw();
		}

		function on_off_armada(){
			var pilih_armada = $('#pilih_armada').val();
			if(pilih_armada==0){
				$('#pilih_1').hide();
				$('#pilih_2').hide();
				$('#pilih_3').hide();
				$('#pilih_4').hide();
			}else if(pilih_armada==1){
				$('#pilih_1').show();
				$('#pilih_2').show();
				$('#pilih_3').hide();
				$('#pilih_4').hide();
			}else{
				$('#pilih_1').hide();
				$('#pilih_2').hide();
				$('#pilih_3').show();
				$('#pilih_4').show();
			}
		}

		function closeTab(){
			$('.nav-tabs a[href="#tab_1"]').tab('show');
			buTable.ajax.reload();
			setTimeout(function(){ buTable.columns.adjust().draw(); }, 1000);
		}
		function closeTab2(){
			$('.nav-tabs a[href="#tab_2"]').tab('show');
			detailTable.ajax.reload();
			setTimeout(function(){ detailTable.columns.adjust().draw(); }, 1000);
		}

		$('#relasi').select2({
			'allowClear': true
		}).on("change", function (e) {
			projectlist();
		});

		$('#project').select2({
			'allowClear': true
		}).on("change", function (e) {
			ratelist();
		});

		$( "#tanggal").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd"
		});

		$('#id_bu').select2({
			'allowClear': true
		}).on("change", function (e) {
			armadalist_damri();
		});

		function projectlist(){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>so/ax_get_project", 
				data: {id_relasi : $("#relasi").val()},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 

					$("#project").html(response.data_project).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { 
					alert(thrownError); 
				}
			});
		}

		function ratelist(){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>so/ax_get_rate", 
				data: {id_relasi : $("#relasi").val(),id_project : $("#project").val()},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 

					$("#rate").html(response.data_rate).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { 
					alert(thrownError); 
				}
			});
		}

		function armadalist(){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>so/ax_get_armada", 
				data: {
					id_relasi : $("#id_detail_id_relasi").val(),
					id_project : $("#id_detail_id_project").val(),
					id_asal : $("#id_detail_id_asal").val(),
					id_tujuan : $("#id_detail_id_tujuan").val(),
				},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){
					$("#tipe_armada").html(response.data_armada).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { 
					alert(thrownError); 
				}
			});
		}

		function armadalist_damri(){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>so/ax_get_armada_damri", 
				data: {id_bu : $("#id_bu").val()}, 
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

		$('#tipe_armada').select2({
			'allowClear': true
		}).on("change", function (e) {

			var url = '<?=base_url()?>so/ax_get_harga_rate';
			var data = {
				id_relasi : $("#id_detail_id_relasi").val(),
				id_project : $("#id_detail_id_project").val(),
				id_asal : $("#id_detail_id_asal").val(),
				id_tujuan : $("#id_detail_id_tujuan").val(),
				tipe_armada : $("#tipe_armada").val(),
			};

			$.ajax({
				url: url,
				method: 'POST',
				data: data
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				$('#rate_do').val(data['rate']);
			});

		});

		function formatNumber(num) {
			return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
		}

	</script>
</body>
</html>
