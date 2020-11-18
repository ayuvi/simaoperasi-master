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
				<h1>Asuransi</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Asuransi</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_asuransi" name="id_asuransi" value='' />

												<div class="form-group">
													<label>Nomor Polis</label>
													<input type="text" id="no_polis" name="no_polis" class="form-control" placeholder="Nomor Polis">
												</div>
												<div class="form-group">
													<label>Tanggal</label>
													<input type="text" id="tgl_expired" name="tgl_expired" class="form-control" placeholder="Tanggal Expired" value="<?php echo date('Y-m-d');?>">
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

								<div class="modal fade" id="addModalDetail" tabindex="" role="dialog" aria-labelledby="addModalLabelDetail" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabelDetail">Form Add Asuransi</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_asuransi_header" name="id_asuransi_header" value='' />
												<input type="hidden" id="id_asuransi_detail" name="id_asuransi_detail" value='' />
												<div class="form-group">
													<label>Armada</label>
													<select class="form-control select2" style="width: 100%;" id="kd_armada" name="kd_armada">
														<option value="0">--Armada--</option>
														<?php
														foreach ($combo_armada->result() as $rowmenu) {
															?>
															<option value="<?= $rowmenu->kd_armada?>"  ><?= $rowmenu->kd_armada?></option>
															<?php
														}
														?>
													</select>
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
										<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">List Asuransi</a></li>
										<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Asuransi Detail</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">
											
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-primary" onclick='ViewData(0)'>
														<i class='fa fa-plus'></i> Add Asuransi
													</button>
													<div class="btn-group">
														<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i> Print <span class="caret"></span></button>
														<ul class="dropdown-menu">
															<li><a onclick="print_laporan(1)"><i class="fa fa-print"></i> PDF</a></li>
															<li><a onclick="print_laporan(2)"><i class="fa fa-print"></i> Excell</a></li>
														</ul>
													</div>
												</div>
											</div>
											<br>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="asuransiTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>No.Polis</th>
															<th>Tgl Expired</th>
															<th>Status Exp</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>
										<div class="tab-pane" id="tab_2">
											<div class="row">
												<div class="col-lg-12">
													<button class="btn btn-primary" onclick='ViewDataDetail(0)'>
														<i class='fa fa-plus'></i> Add Asuransi Detail
													</button>
													<button type="button" class="btn bg-purple btn-default pull-right" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>	
												</div>
											</div>
											<br>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="asuransiDetail">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>Kd Armada</th>
															<th>Plat Polisi</th>
															<th>Status</th>
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


	<div class="row" >
		<div class="col-lg-12">
			<div class="modal fade" id="modalDocuments" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<div class="form-inline">
								<h4 id="addModalLabel">List Documents</h4>
								<button class="btn btn-primary btn-sm" onclick="addDocuments()"><i class='fa fa-plus'></i> Tambah Documents</button>
							</div>
							<input type="hidden" id="id_asuransi_header_documents" name="id_asuransi_header_documents" class="form-control">
						</div>
						<div class="modal-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataDocumentsTable">
									<thead>
										<tr>
											<th>Action</th>
											<th>#</th>
											<th>Documents</th>
											<th>File</th>
											<th>Active</th>
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

	<div class="modal fade" id="addDocumentsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="Form-add-bu" id="addDocumentsModalLabel">Form Add</h4>
				</div>
				<div class="modal-body">
					<form id="formAddDocuments">
						<input type="hidden" id="id_asuransi_header_documents_add" name="id_asuransi_header_documents_add" value='' />
						<input type="hidden" id="id_asuransi_documents" name="id_asuransi_documents" value='' />
						<div class="form-group">
							<label>Nama Documents</label>
							<input type="text" id="nm_documents" name="nm_documents" class="form-control" placeholder="Nama Documents">
						</div>
						<div class="form-group">
							<label>File</label>
							<input type="file" id="file" name="file" class="form-control" placeholder="Pilih File">
						</div>
						<div class="form-group">
							<label>Active</label>
							<select class="form-control" id="active_documents" name="active_documents">
								<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
								<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
							</select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id='btnSaveAddDocuments'>Save</button>
				</div>
			</div>
		</div>
	</div>
	<?= $this->load->view('basic_js'); ?>
	<script type='text/javascript'>
		var save_method;
		var base_url = '<?php echo base_url();?>';

		var asuransiTable = $('#asuransiTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>asuransi/ax_data_asuransi/",
				type: 'POST'
			},
			columns: 
			[
			{
				data: "id_asuransi", render: function(data, type, full, meta){
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="DetailData(' + data + ')"><i class="fa fa-list"></i> Detail</a></li>';
					str += '<li><a onclick="Documents(' + data + ')"><i class="fa fa-file"></i> Documents</a></li>';
					str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_asuransi" },
			{ data: "no_polis" },
			{ data: "tgl_expired" },
			{ class: "intro",data: "status_expired", render: function(data, type, full, meta){
				if(data == 1)
					return '<span class="label label-success">Active</span>';
				else return '<span class="label label-warning">Expired</span>';
			}
		}
		]
	});

		var asuransiDetail = $('#asuransiDetail').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>asuransi/ax_data_asuransi_detail/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_asuransi": $("#id_asuransi_header").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_asuransi_detail", render: function(data, type, full, meta){
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

			{ data: "id_asuransi_detail" },
			{ data: "kd_armada" },
			{ data: "plat_armada" },

			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		]
	});

		var dataDocumentsTable = $('#dataDocumentsTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>asuransi/ax_data_asuransi_documents/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_asuransi": $("#id_asuransi_header_documents").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_asuransi_documents", render: function(data, type, full, meta){
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="EditDataDocuments(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteDataDocuments(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_asuransi_documents" },
			{ data: "nm_documents" },
			{
				data: "file", render: function(data, type, full, meta){
					if(data != null){
						var str = '<a href="'+base_url+'uploads/asuransi/'+data+'" target="_blank">'+data+'</a>';
					}else{
						var str ='';
					}
					return str;
				}
			},

			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		]
	});

		$('#btnSave').on('click', function () {
			if($('#no_polis').val() == '')
			{
				alertify.alert("Warning", "Please fill asuransi Name.");
			}else if($('#tgl_expired').val() == '')
			{
				alertify.alert("Warning", "Isi Tanggal");
			}
			else
			{
				var url = '<?=base_url()?>asuransi/ax_set_data';
				var data = {
					id_asuransi: $('#id_asuransi').val(),
					no_polis: $('#no_polis').val(),
					tgl_expired: $('#tgl_expired').val(),
					active: $('#active').val()
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
						asuransiTable.ajax.reload();
					}
				});
			}
		});

		$('#btnSaveDetail').on('click', function () {
			if($('#kd_armada').val() == '0')
			{
				alertify.alert("Warning", "Pilih Armada");
			}else
			{
				var url = '<?=base_url()?>asuransi/ax_set_data_detail';
				var data = {
					id_asuransi_detail: $('#id_asuransi_detail').val(),
					id_asuransi: $('#id_asuransi_header').val(),
					kd_armada: $('#kd_armada').val(),
					active: $('#active_detail').val()
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
						asuransiDetail.ajax.reload();
					}
				});
			}
		});

		function ViewData(id_asuransi)
		{
			if(id_asuransi == 0)
			{
				$('#addModalLabel').html('Add asuransi');
				$('#id_asuransi').val('');
				$('#no_polis').val('');
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>asuransi/ax_get_data_by_id';
				var data = {
					id_asuransi: id_asuransi
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Asuransi');
					$('#id_asuransi').val(data['id_asuransi']);
					$('#no_polis').val(data['no_polis']);
					$('#tgl_expired').val(data['tgl_expired']);
					$('#active').val(data['active']);
					$('#addModal').modal('show');
				});
			}
		}

		function ViewDataDetail(id_asuransi_detail)
		{
			if(id_asuransi_detail == 0)
			{
				$('#addModalLabelDetail').html('Add Asuransi Detail');
				$('#id_asuransi_detail').val('');
				$('#kd_armada').val('').trigger('change');
				$('#active_detail').val('1');
				$('#addModalDetail').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>asuransi/ax_get_data_by_id_detail';
				var data = {
					id_asuransi_detail: id_asuransi_detail
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabelDetail').html('Edit Asuransi');
					$('#id_asuransi_detail').val(data['id_asuransi_detail']);
					$('#id_asuransi_header').val(data['id_asuransi']);
					$('#kd_armada').val(data['kd_armada']).trigger('change');
					$('#active_detail').val(data['active']);
					$('#addModalDetail').modal('show');
				});
			}
		}

		function DeleteData(id_asuransi)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>asuransi/ax_unset_data';
					var data = {
						id_asuransi: id_asuransi
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						asuransiTable.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function DeleteDataDetail(id_asuransi_detail)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>asuransi/ax_unset_data_detail';
					var data = {
						id_asuransi_detail: id_asuransi_detail
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						asuransiDetail.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function DetailData(id_asuransi){
			$('#id_asuransi_header').val(id_asuransi);
			$('.nav-tabs a[href="#tab_2"]').tab('show');
			asuransiDetail.ajax.reload();
			asuransiDetail.columns.adjust().draw();
		}

		$( "#tgl_expired").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd"
		});

		function closeTab(){
			$('.nav-tabs a[href="#tab_1"]').tab('show');
			asuransiTable.columns.adjust().draw();
		}

		function Documents(id_asuransi){
			$('#modalDocuments').modal('show');
			$('#id_asuransi_header_documents').val(id_asuransi);
			dataDocumentsTable.ajax.reload();
			setTimeout(function(){ dataDocumentsTable.columns.adjust().draw(); }, 1000);
		}

		function addDocuments(){
			save_method = 'add';
			$('#formAddDocuments')[0].reset();
			$('#id_asuransi_header_documents_add').val($('#id_asuransi_header_documents').val());
			$('#addDocumentsModal').modal('show');
			$('#addDocumentsModalLabel').text('Tambah Data Documents');
		}

		function DeleteDataDocuments(id_asuransi_documents)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>asuransi_documents/ax_unset_data';
					var data = {
						id_asuransi_documents: id_asuransi_documents
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						dataDocumentsTable.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function EditDataDocuments(id_asuransi_documents)
		{
			save_method = 'update';
			$('#formAddDocuments')[0].reset();
			$.ajax({
				url : "<?php echo site_url('asuransi_documents/ax_get_data_by_id')?>",
				type: "POST",
				data :{id_asuransi_documents: id_asuransi_documents},
				dataType: "JSON",
				success: function(data)
				{
					$('#addDocumentsModalLabel').html('Edit Asuransi Documents');
					$('#id_asuransi_documents').val(id_asuransi_documents);
					$('#id_asuransi_header_documents_add').val(data['id_asuransi']);
					$('#nm_documents').val(data['nm_documents']);
				// $('#file').val(data['file']);
				$('#active_documents').val(data['active']);
				$('#addDocumentsModal').modal('show');
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
		}

		$('#btnSaveAddDocuments').on('click', function ()
		{
			var url;
			if(save_method == 'add') {
				url = "<?php echo site_url('asuransi_documents/ax_set_data')?>";
			} else {
				url = "<?php echo site_url('asuransi_documents/ax_set_data_update')?>";
			}

			if($('#nm_documents').val() == '')
			{
				alertify.alert("Warning", "Isi Nama Document");
			}
			else
			{
				var formData = new FormData($('#formAddDocuments')[0]);
				$.ajax({
					url : url,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					dataType: "JSON",
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Duplicate");
						}
					},
					success: function(data)
					{

						if(data.status == true){
							alertify.success("Data Saved.");
							$('#addDocumentsModal').modal('hide');
							dataDocumentsTable.ajax.reload();
						}else{
							alertify.error(data.message);
							alertify.alert("Warning", data.message);
						}

					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alertify.alert("Warning", "Error Add data --> Pastikan File type [Gambar, PDF, PPT, Doc, Excell] dan Max.size 1 MB");

					}
				});
			}
		});

		$('#kd_armada').select2({
			'placeholder': "--Armada--",
			'allowClear': true
		});

		function print_laporan(format) {
			var url   = "<?= base_url() ?>asuransi_documents/print_laporan/";
			window.open(url+"?format="+format, '_blank');
			window.focus();
		}
	</script>
</body>
</html>
