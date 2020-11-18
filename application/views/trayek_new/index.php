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
				<h1>Trayek</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

								<div class="modal fade" id="addModal"  tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Trayek</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_trayek" name="id_trayek" value='' />
												<div class="form-group">
													<label>Segment</label>
													<select class="form-control select2 " style="width: 100%;" id="id_segment" name="id_segment">
														<option value="0">--Segment--</option>
														<?php
														foreach ($combobox_segment->result() as $rowmenu) {
															?>
															<option value="<?= $rowmenu->id_segment?>"  ><?= $rowmenu->kd_segment?></option>
															<?php
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<label>Point Awal</label>
													<select class="form-control select2 " style="width: 100%;" id="id_point_awal" name="id_point_awal">
														<option value="0">--Awal--</option>
														<?php
														foreach ($combobox_point->result() as $rowmenu) {
															?>
															<option value="<?= $rowmenu->id_point?>"  ><?= $rowmenu->nm_point?></option>
															<?php
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<label>Point Akhir</label>
													<select class="form-control select2 " style="width: 100%;" id="id_point_akhir" name="id_point_akhir">
														<option value="0">--Akhir--</option>
														<?php
														foreach ($combobox_point->result() as $rowmenu) {
															?>
															<option value="<?= $rowmenu->id_point?>"  ><?= $rowmenu->nm_point?></option>
															<?php
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<label>Harga</label>
													<input type="number" class="form-control"  data-decimals="2" min="0" id="harga" name="harga" value='' placeholder="Harga" />
												</div>

												<div class="form-group">
													<label>KM Trayek</label>
													<input type="number" class="form-control"  data-decimals="2" min="0" id="km_trayek" name="km_trayek" value='' placeholder="KM Trayek" />
												</div>

												<div class="form-group">
													<label>KM Empty</label>
													<input type="number" class="form-control"  data-decimals="2" min="0" id="km_empty" name="km_empty" value='' placeholder="KM Empty" />
												</div>

												<div class="form-group">
													<label>Note Trayek</label>
													<input type="text" id="note_trayek" name="note_trayek" class="form-control" value='' placeholder="Note Trayek" />
												</div>
												<div class="form-group">
													<label>Asuransi (Rp)</label>
													<input type="text" id="rp_asuransi" name="rp_asuransi" class="form-control" value='' placeholder="Asuransi (Rp/Penumpang)" value="0" />
												</div>
												<div class="form-group">
													<label>Pend.Usaha Lainnya(Rp/KM)</label>
													<input type="text" id="rp_km" name="rp_km" class="form-control" value='' placeholder="(Rp/KM)" value="0" />
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


								<div class="modal fade" id="addModalDetail"  tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabelDetail">Form Add Trayek in Trayek</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_trayek_detail" name="id_trayek_detail" value='' />
												<input type="hidden" id="id_trayek_det" name="id_trayek_det" value='' />

												<div class="form-group">
													<label>Point Awal</label>
													<select class="form-control select2 " style="width: 100%;" id="id_point_awal_detail" name="id_point_awal_detail">
														<option value="0">--Awal--</option>
														<?php
														foreach ($combobox_point->result() as $rowmenu) {
															?>
															<option value="<?= $rowmenu->id_point?>"  ><?= $rowmenu->nm_point?></option>
															<?php
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<label>Point Akhir</label>
													<select class="form-control select2 " style="width: 100%;" id="id_point_akhir_detail" name="id_point_akhir_detail">
														<option value="0">--Akhir--</option>
														<?php
														foreach ($combobox_point->result() as $rowmenu) {
															?>
															<option value="<?= $rowmenu->id_point?>"  ><?= $rowmenu->nm_point?></option>
															<?php
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<label>Harga</label>
													<input type="number" class="form-control"  data-decimals="2" min="0" id="harga_detail" name="harga_detail" value='' placeholder="Harga" />
												</div>

												<div class="form-group">
													<label>KM Trayek</label>
													<input type="number" class="form-control"  data-decimals="2" min="0" id="km_trayek_detail" name="km_trayek_detail" value='' placeholder="KM Trayek" />
												</div>

												<div class="form-group">
													<label>KM Empty</label>
													<input type="number" class="form-control"  data-decimals="2" min="0" id="km_empty_detail" name="km_empty_detail" value='' placeholder="KM Empty" />
												</div>

												<div class="form-group">
													<label>Active</label>
													<select class="form-control" id="active_detail" name="active_detail">
														<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
														<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
													</select>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id='btnSaveDetail'>Save</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="panel-body">
								<div class="nav-tabs-custom">

									<ul class="nav nav-tabs">
										<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">Data Trayek</a></li>
										<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Data Trayek in Trayek</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">

											<div class="row">
												<div class="col-lg-12">
													<div class="form-group col-lg-10">
														<label>Cabang</label>
														<select class="form-control select2 " style="width: 100%;" id="id_bu_filter" name="id_bu_filter">
															<?php
															foreach ($combobox_bu->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
																<?php
															}
															?>
														</select>
													</div>
													<div class="form-group col-lg-2">
														<p style="height: 15px">.</p>
														<button class="btn btn-primary" onclick='ViewData(0)'>
															<i class='fa fa-plus'></i> Add Trayek
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
															<th>Cabang</th>
															<th>Segment</th>
															<th>Kode</th>
															<th>Nm Trayek</th>
															<th>KM</th>
															<th>KM Empty</th>
															<th>Asuransi</th>
															<th>Rp/Km</th>
															<th>Status</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>


										<div class="tab-pane" id="tab_2">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group pull-right">
														<button type="button" class="btn bg-purple btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
														<button class="btn btn-primary" onclick='ViewDataDetail(0)'>
															<i class='fa fa-plus'></i> Add Trayek
														</button>
													</div>
												</div>
											</div>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="detailTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>KD trayek</th>
															<th>KM trayek</th>
															<th>KM empty</th>
															<th>Harga</th>
															<th>Point Awal</th>
															<th>Point Akhir</th>
															<th>Active</th>
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
				url: "<?= base_url()?>trayek_new/ax_data_trayek/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_bu": $("#id_bu_filter").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_trayek", render: function(data, type, full, meta){
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a href="<?= base_url()?>trayek/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
					str += '<li><a onclick="DetailData(' + data + ')"><i class="fa fa-list"></i> Trayek in trayek</a></li>';
					str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_trayek" },
			{ data: "nm_bu" },
			{ data: "kd_segment" },
			{ data: "kd_trayek" },
			{ data: "nm_trayek" },
			{ data: "km_trayek", render: $.fn.dataTable.render.number( '.', ',',2 ) },
			{ data: "km_empty", render: $.fn.dataTable.render.number( '.', ',',2 ) },
			{ data: "rp_asuransi" },
			{ data: "rp_km" },
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
				url: "<?= base_url()?>trayek_new/ax_data_trayek_detail/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_trayek": $("#id_trayek_detail").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_trayek_det", render: function(data, type, full, meta){
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="ViewDataDetail(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteDataDetail(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_trayek_det" },
			{ data: "kd_trayek" },
			{ data: "km_trayek", render: $.fn.dataTable.render.number( '.', ',',2 ) },
			{ data: "km_empty", render: $.fn.dataTable.render.number( '.', ',',2 ) },
			{ data: "harga", render: $.fn.dataTable.render.number( '.', ',',2 ) },
			{ data: "nm_point_awal" },
			{ data: "nm_point_akhir" },
			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		]
	});

		$('#btnSave').on('click', function () {
			if($('#id_point_awal').val() == '0')
			{
				alertify.alert("Warning", "Please fill trayek Name.");
			}
			else
			{
				var url = '<?=base_url()?>trayek_new/ax_set_data';
				var data = {
					id_trayek: $('#id_trayek').val(),
					id_bu: $('#id_bu_filter').val(),
					harga: $('#harga').val(),
					id_segment: $('#id_segment').val(),
					id_point_awal: $('#id_point_awal').val(),
					id_point_akhir: $('#id_point_akhir').val(),
					nm_trayek: $('#nm_trayek').val(),
					km_trayek: $('#km_trayek').val(),
					km_empty: $('#km_empty').val(),
					note_trayek: $('#note_trayek').val(),
					rp_asuransi: $('#rp_asuransi').val(),
					rp_km: $('#rp_km').val(),
					active: $('#active').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","KD Trayek tidak boleh sama/sudah ada di database sistem.");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Trayek data saved.");
						$('#addModal').modal('hide');
						buTable.ajax.reload();
					}
				});

			}
		});

		$('#btnSaveDetail').on('click', function () {
			if($('#id_point_awal_detail').val() == '0')
			{
				alertify.alert("Warning", "Please fill Awal.");
			}else if($('#id_point_akhir_detail').val() == '0')
			{
				alertify.alert("Warning", "Please fill Akhir.");
			}else if($('#harga_detail').val() == '')
			{
				alertify.alert("Warning", "Please fill Harga.");
			}else if($('#km_trayek_detail').val() == '')
			{
				alertify.alert("Warning", "Please fill KM Trayek.");
			}else if($('#km_empty_detail').val() == '')
			{
				alertify.alert("Warning", "Please fill KM Empty.");
			}
			else
			{
				var url = '<?=base_url()?>trayek_new/ax_set_data_detail';
				var data = {
					id_trayek_det: $('#id_trayek_det').val(),
					id_trayek: $('#id_trayek_detail').val(),
					id_point_awal: $('#id_point_awal_detail').val(),
					id_point_akhir: $('#id_point_akhir_detail').val(),
					km_trayek: $('#km_trayek_detail').val(),
					km_empty: $('#km_empty_detail').val(),
					harga: $('#harga_detail').val(),
					active: $('#active_detail').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","KD Trayek tidak boleh sama/sudah ada di database sistem.");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Trayek data saved.");
						$('#addModalDetail').modal('hide');
						detailTable.ajax.reload();
					}
				});

			}
		});

		$('#id_bu_filter').select2({
			'allowClear': true
		}).on("change", function (e) {
			buTable.ajax.reload();
		});
		$("#km_trayek").inputSpinner();
		$("#km_empty").inputSpinner();
		$("#harga").inputSpinner();

		function ViewData(id_trayek)
		{
			if(id_trayek == 0)
			{
				$('#addModalLabel').html('Add Trayek');
				$('#id_trayek').val('');
				$('#select2-id_bu-container').html('--Cabang--');
				$('#select2-id_segment-container').html('--Segment--');
				$('#select2-id_point_awal-container').html('--Awal--');
				$('#select2-id_point_akhir-container').html('--Akhir--');
				$('#id_bu').val('0');
				$('#id_segment').val('0');
				$('#id_point_awal').val('0');
				$('#id_point_akhir').val('0');
				$('#note_trayek').val('');
				$('#km_trayek').val('');
				$('#km_empty').val('');
				$('#harga').val('');
				$('#rp_asuransi').val('');
				$('#rp_km').val('');
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>trayek_new/ax_get_data_by_id';
				var data = {
					id_trayek: id_trayek
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Trayek');
					$('#id_trayek').val(data['id_trayek']);
					$('#select2-id_segment-container').html(data['kd_segment']);
					$('#select2-id_bu-container').html(data['nm_bu']);
					$('#select2-id_point_awal-container').html(data['nm_point_awal']);
					$('#select2-id_point_akhir-container').html(data['nm_point_akhir']);
					// $('#id_bu').val(data['id_bu']);
					$('#id_segment').val(data['id_segment']);
					$('#id_point_awal').val(data['id_point_awal']);
					$('#id_point_akhir').val(data['id_point_akhir']);
					$('#note_trayek').val(data['note_trayek']);
					$('#km_trayek').val(data['km_trayek']);
					$('#km_empty').val(data['km_empty']);
					$('#harga').val(data['harga']);
					$('#rp_asuransi').val(data['rp_asuransi']);
					$('#rp_km').val(data['rp_km']);
					$('#active').val(data['active']);
					$('#addModal').modal('show');
				});
			}
		}

		function ViewDataDetail(id_trayek_det)
		{
			if(id_trayek_det == 0)
			{
				$('#addModalLabelDetail').html('Add Trayek in trayek');
				$('#id_trayek_det').val('');
				$('#select2-id_point_awal_detail-container').html('--Awal--');
				$('#select2-id_point_akhir_detail-container').html('--Akhir--');
				$('#id_point_awal_detail').val('0').trigger('change');
				$('#id_point_akhir_detail').val('0').trigger('change');

				$('#harga_detail').val('');
				$('#km_trayek_detail').val('');
				$('#km_empty_detail').val('');
				$('#active_detail').val('1');
				$('#addModalDetail').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>trayek_new/ax_get_data_by_id_detail';
				var data = {
					id_trayek_det: id_trayek_det
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);

					$('#addModalLabelDetail').html('Edit Trayek');
					$('#id_trayek_det').val(data['id_trayek_det']);
					$('#select2-id_point_awal_detail-container').html(data['id_point_awal']);
					$('#select2-id_point_akhir_detail-container').html(data['id_point_akhir']);

					$('#id_point_awal_detail').val(data['id_point_awal']).trigger('change');
					$('#id_point_akhir_detail').val(data['id_point_akhir']).trigger('change');
					
					$('#harga_detail').val(data['harga']);
					$('#km_trayek_detail').val(data['km_trayek']);
					$('#km_empty_detail').val(data['km_empty']);
					$('#active').val(data['active']);
					$('#addModalDetail').modal('show');
				});
			}
		}

		function DeleteData(id_trayek)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>trayek_new/ax_unset_data';
					var data = {
						id_trayek: id_trayek
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						buTable.ajax.reload();
						alertify.error('Trayek data deleted.');
					});
				},
				function(){ }
				);
		}

		function DeleteDataDetail(id_trayek_det)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>trayek_new/ax_unset_data_detail';
					var data = {
						id_trayek_det: id_trayek_det
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						detailTable.ajax.reload();
						alertify.error('Trayek data deleted.');
					});
				},
				function(){ }
				);
		}

		function closeTab(){
			$('.nav-tabs a[href="#tab_1"]').tab('show');
			buTable.columns.adjust().draw();
		}

		function DetailData(id_trayek){
			$('#id_trayek_detail').val(id_trayek);
			$('.nav-tabs a[href="#tab_2"]').tab('show');
			detailTable.columns.adjust().draw();
		}


	</script>
</body>
</html>
