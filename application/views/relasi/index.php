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
				<h1>Relasi</h1>
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
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Relasi</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_relasi" name="id_relasi" value='' />

												<div class="form-group">
													<label>Nama</label>
													<input type="text" id="nm_relasi" name="nm_relasi" class="form-control" placeholder="Nama">
												</div>
												
												<div class="form-group">
													<label>Alamat Relasi</label>
													<input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Relasi">
												</div>
												<div class="form-group">
													<label>NPWP</label>
													<input type="text" id="npwp" name="npwp" class="form-control" placeholder="NPWP">
												</div>
												<div class="form-group">
													<label>Kontak Person (HP)</label>
													<input type="text" id="kontak_person" name="kontak_person" class="form-control" placeholder="Kontak Person (HP)">
												</div>

												<div class="form-group">
													<label>Active</label>
													<select class="form-control" id="active" name="active">
														<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
														<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
													</select>
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
												<h4 class="Form-add-bu" id="addModalLabelDetail">Form Add Project</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_relasi_project" name="id_relasi_project" value='' />
												<input type="hidden" id="id_project" name="id_project" value='' />

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

								<div class="modal fade" id="addModalRate" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabelRate">Form Add Project</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_project_rate" name="id_project_rate" value='' />
												<input type="hidden" id="id_relasi_rate" name="id_relasi_rate" value='' />
												<input type="hidden" id="id_rate" name="id_rate" value='' />

												<!-- <div class="form-group">
													<label>Asal</label>
													<select class="form-control select2" style="width: 100%;" name="asal" id="asal" required="required">
														<option value="0"> -- Asal -- </option>
														<?php foreach ($combobox_kota->result() as $rowmenu) { ?>
														<option value="<?= $rowmenu->id_kota?>"><?= $rowmenu->nama?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<label>Tujuan</label>
													<select class="form-control select2" style="width: 100%;" name="tujuan" id="tujuan" required="required">
														<option value="0"> -- Tujuan -- </option>
														<?php foreach ($combobox_kota->result() as $rowmenu) { ?>
														<option value="<?= $rowmenu->id_kota?>"><?= $rowmenu->nama?></option>
														<?php } ?>
													</select>
												</div> -->

												<div class="form-group">
													<label>Asal</label>
													<input type="text" id="asal" name="asal" class="form-control" placeholder="Asal">
												</div>
												<div class="form-group">
													<label>Tujuan</label>
													<input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan">
												</div>

												<div class="form-group">
													<label>Tipe Armada</label>
													<select class="form-control select2" style="width: 100%;" name="tipe_armada" id="tipe_armada" required="required">
														<option value="0"> -- Tipe Armada -- </option>
														<?php foreach ($combobox_tipe_armada->result() as $rowmenu) { ?>
														<option value="<?= $rowmenu->id_tipe_armada?>"><?= $rowmenu->nm_tipe_armada?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group has-success">
													<label>Rate</label>
													<input type="number" id="rate" name="rate" class="form-control" placeholder="Rate">
												</div>
												<div class="form-group">
													<label>KM Tempuh (Km)</label>
													<input type="number" id="km_tempuh" name="km_tempuh" class="form-control" placeholder="KM Tempuh (Km)">
												</div>
												

												<div class="form-group">
													<label>Active</label>
													<select class="form-control" id="active_rate" name="active_rate">
														<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
														<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
													</select>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id='btnSaveRate'>Save</button>
											</div>
										</div>
									</div>
								</div>


							</div>

							<div class="panel-body">
								<div class="nav-tabs-custom">

									<ul class="nav nav-tabs">
										<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">Data Relasi</a></li>
										<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Data Project</a></li>
										<li class=" disabled"><a href="#tab_3" class="disabled" aria-expanded="false">Data Rate</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">

											<div class="row">
												<div class="col-lg-10">
												</div>
												<div class="col-lg-2">
													<div class="form-group col-lg-12 pull-right">
														<button class="btn btn-primary" onclick='ViewData(0)'>
															<i class='fa fa-plus'></i> Add Relasi
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
															<th>Nama</th>
															<th>Status</th>
														</tr>
													</thead>
												</table>
											</div>

										</div>


										<div class="tab-pane" id="tab_2">
											<div class="row">
												<div class="col-lg-12">
													<div class="col-lg-8">
														<div class="form-group">
															<center><p id="detail_keterangan_project"></p></center>
														</div>
													</div>
													
													<div class="col-lg-4">
														<div class="form-group pull-right">
															<button type="button" class="btn bg-purple btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
															<button class="btn btn-primary" onclick='ViewDataDetail(0)'>
																<i class='fa fa-plus'></i> Add Project
															</button>
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
															<th>Nama</th>
															<th>Status</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>

										<div class="tab-pane" id="tab_3">
											<div class="row">
												<div class="col-lg-12">
													<div class="col-lg-8">
														<div class="form-group">
															<center><p id="detail_keterangan_rate"></p></center>
														</div>
													</div>
													
													<div class="col-lg-4">
														<div class="form-group pull-right">
															<button type="button" class="btn bg-purple btn-default" onClick='closeTab_to_tab2()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
															<button class="btn btn-primary" onclick='ViewDataDetailRate(0)'>
																<i class='fa fa-plus'></i> Add Rate
															</button>
														</div>
													</div>
												</div>
											</div>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="rateTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>Asal-Tujuan</th>
															<th>Armada</th>
															<th>Rate</th>
															<th>KM</th>
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
				url: "<?= base_url()?>relasi/ax_data_relasi/",
				type: 'POST'
			},
			columns: 
			[
			{
				data: "id_relasi", render: function(data, type, full, meta){
					var id1 = "'"+data+"','"+full['nm_relasi']+"'";
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="DetailData(' + id1 + ')"><i class="fa fa-list"></i> Project</a></li>';
					str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_relasi" },
			{ data: "nm_relasi" },
			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		]
	});

		var detailTable = $('#detailTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>relasi/ax_data_project_detail/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_relasi": $("#id_relasi_project").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_project", render: function(data, type, full, meta){
					var id1 = "'"+data+"','"+full['nm_project']+"','"+full['id_relasi']+"','"+full['nm_relasi']+"'";
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="DetailDataRate(' + id1 + ')"><i class="fa fa-list"></i> Rate</a></li>';
					str += '<li><a onclick="ViewDataDetail(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteDataProject(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_project" },
			{ data: "nm_project" },

			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		]
	});

		var rateTable = $('#rateTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>relasi/ax_data_rate/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_project": $("#id_project_rate").val(),
						"id_relasi": $("#id_relasi_rate").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_rate", render: function(data, type, full, meta){
					var id = "'"+full['id_rate']+"','"+full['nm_relasi']+"','"+full['nm_project']+"','"+full['asal']+"','"+full['tujuan']+"'";
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					// str += '<li><a onclick="Order(' + id + ')"><i class="fa fa-pencil"></i> Order</a></li>';
					str += '<li><a onclick="ViewDataDetailRate(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteDataRate(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_rate" },
			{ data: "asal_tujuan" },
			{ data: "nm_tipe_armada" },
			{ data: "rate", render: $.fn.dataTable.render.number( '.', ',',2 ) },
			{ data: "km_tempuh", render: $.fn.dataTable.render.number( '.', ',',2 ) },
			],

			"drawCallback": function ( settings ) {
				var api = this.api();
				var rows = api.rows( {page:'current'} ).nodes();
				var last = null;

				var jsondata = api.ajax.json();
				api.column(2, {page:'current'} ).data().each( function ( group, i ) {
					if ( last !== group ) {
						$(rows).eq( i ).before(
							'<tr class="group"><td colspan="7"><strong>'+group+'<strong></td></tr>'
							);
						last = group;
					}
				} );

			}

		});

		$('#btnSave').on('click', function () {
			if($('#nm_relasi').val() == '')
			{
				alertify.alert("Warning", "Please fill Nama.");
			}else if($('#alamat').val() == '')
			{
				alertify.alert("Warning", "Please fill Alamat.");
			}
			else
			{
				var url = '<?=base_url()?>relasi/ax_set_data';
				var data = {
					id_relasi 	: $('#id_relasi').val(),
					nm_relasi 	: $('#nm_relasi').val(),
					alamat 		: $('#alamat').val(),
					npwp 		: $('#npwp').val(),
					kontak_person : $('#kontak_person').val(),
					active 		: $('#active').val()
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

		$('#btnSaveProject').on('click', function () {
			if($('#nm_project').val() == '')
			{
				alertify.alert("Warning", "Please fill project Name.");
			}
			else
			{
				var url = '<?=base_url()?>relasi/ax_set_data_project';
				var data = {
					id_relasi: $('#id_relasi_project').val(),
					id_project: $('#id_project').val(),
					nm_project: $('#nm_project').val(),
					active: $('#active_project').val()
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
						$('#addModalDetail').modal('hide');
						detailTable.ajax.reload();
					}
				});
			}
		});

		$('#btnSaveRate').on('click', function () {
			if($('#asal').val() == '0')
			{
				alertify.alert("Warning", "Please fill Asal.");
			}else if($('#tujuan').val() == '0')
			{
				alertify.alert("Warning", "Please fill Tujuan.");
			}else if($('#tipe_armada').val() == '0')
			{
				alertify.alert("Warning", "Please fill Tipe Armada.");
			}else if($('#rate').val() == '')
			{
				alertify.alert("Warning", "Please fill Rate.");
			}else if($('#km_tempuh').val() == '')
			{
				alertify.alert("Warning", "Please fill KM Tempuh.");
			}
			else
			{
				var url = '<?=base_url()?>relasi/ax_set_data_rate';
				var data = {
					id_rate 	: $('#id_rate').val(),
					id_project 	: $('#id_project_rate').val(),
					id_relasi 	: $('#id_relasi_rate').val(),

					asal 		: $('#asal').val(),
					tujuan 		: $('#tujuan').val(),
					tipe_armada : $('#tipe_armada').val(),
					rate 		: $('#rate').val(),
					km_tempuh 	: $('#km_tempuh').val(),

					active 		: $('#active_rate').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Sudah ada di database");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Data Saved.");
						$('#addModalRate').modal('hide');
						rateTable.ajax.reload();
					}
				});
			}
		});

		function ViewData(id_relasi)
		{
			if(id_relasi == 0)
			{
				$('#addModalLabel').html('Add Relasi');
				$('#id_relasi').val('');
				$('#nm_relasi').val('');
				$('#alamat').val('');
				$('#npwp').val('');
				$('#kontak_person').val('');
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>relasi/ax_get_data_by_id';
				var data = {
					id_relasi: id_relasi
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Relasi');
					$('#id_relasi').val(data['id_relasi']);
					$('#nm_relasi').val(data['nm_relasi']);
					
					$('#alamat').val(data['alamat']);
					$('#npwp').val(data['npwp']);
					$('#kontak_person').val(data['kontak_person']);
					$('#active').val(data['active']);
					$('#addModal').modal('show');
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

		function ViewDataDetailRate(id_rate)
		{
			if(id_rate == 0)
			{
				$('#addModalLabelRate').html('Add Rate');
				$('#id_rate').val('');
				// $('#asal').val('0').trigger('change');
				// $('#tujuan').val('0').trigger('change');
				$('#asal').val('');
				$('#tujuan').val('');
				$('#tipe_armada').val('0').trigger('change');
				$('#rate').val('');
				$('#km_tempuh').val('');
				$('#active_rate').val('1');
				$('#addModalRate').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>relasi/ax_get_data_by_id_rate';
				var data = {
					id_rate: id_rate
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabelRate').html('Edit Rate');
					$('#id_rate').val(data['id_rate']);
					// $('#asal').val(data['id_asal']).trigger('change');
					// $('#tujuan').val(data['id_tujuan']).trigger('change');
					$('#asal').val(data['asal']);
					$('#tujuan').val(data['tujuan']);

					$('#tipe_armada').val(data['tipe_armada']).trigger('change');				
					$('#rate').val(data['rate']);
					$('#km_tempuh').val(data['km_tempuh']);
					$('#active_rate').val(data['active']);
					$('#addModalRate').modal('show');
				});
			}
		}

		function DeleteData(id_relasi)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>relasi/ax_unset_data';
					var data = {
						id_relasi: id_relasi
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

		function DeleteDataProject(id_project)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>relasi/ax_unset_data_project';
					var data = {
						id_project: id_project
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

		function DeleteDataRate(id_rate)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>relasi/ax_unset_data_rate';
					var data = {
						id_rate: id_rate
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						rateTable.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function DetailData(id_relasi,nm_relasi){
			$('#detail_keterangan_project').html('<h4><font color="blue"><b>'+nm_relasi+'</b></font></h4>');
			$('#id_relasi_project').val(id_relasi);
			$('.nav-tabs a[href="#tab_2"]').tab('show');
			detailTable.columns.adjust().draw();
		}

		function DetailDataRate(id_project,nm_project,id_relasi,nm_relasi){
			$('#detail_keterangan_rate').html('<h4><font color="blue"><b>'+nm_relasi+' - ('+nm_project+')</b></font></h4>');
			$('#id_project_rate').val(id_project);
			$('#id_relasi_rate').val(id_relasi);
			$('.nav-tabs a[href="#tab_3"]').tab('show');
			rateTable.columns.adjust().draw();
		}

		function closeTab(){
			$('.nav-tabs a[href="#tab_1"]').tab('show');
			buTable.ajax.reload();
			setTimeout(function(){ buTable.columns.adjust().draw(); }, 1000);
		}

		function closeTab_to_tab2(){
			$('.nav-tabs a[href="#tab_2"]').tab('show');
			detailTable.ajax.reload();
			setTimeout(function(){ detailTable.columns.adjust().draw(); }, 1000);
		}

		function Order(id_rate){
			var url = "<?=site_url("order/index")?>";
			var REQ = "?id_rate="+id_rate;
			open(url+REQ);
		}

	</script>
</body>
</html>
