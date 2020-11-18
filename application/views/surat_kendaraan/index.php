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
				<h1>Surat Kendaraan</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add Surat Kendaraan
								</button>
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Surat Kendaraan</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_surat_kendaraan" name="id_surat_kendaraan" value='' />


												<div class="form-group">
													<label>Kode</label>
													<input type="text" id="kd_surat_kendaraan" name="kd_surat_kendaraan" class="form-control" placeholder="Kode">
												</div>

												<div class="form-group">
													<label>Name</label>
													<input type="text" id="nm_surat_kendaraan" name="nm_surat_kendaraan" class="form-control" placeholder="Name">
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
							</div>
							<div class="panel-body">
								<div class="row"> 
									<div class="form-group col-lg-5">
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
								<div class="form-group col-md-5">
									<label>Segment</label>
									<select class="form-control select2" style="width: 100%;" id="kd_segmen">
										<option value="0"> -- Segmen -- </option>
										<?php foreach ($combobox_segmen->result() as $rowmenu) { ?>
										<option value="<?= $rowmenu->kd_segment?>"><?= $rowmenu->nm_segment?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-lg-2">
									<p style="line-height: 15px">.</p>
									<button type="button" class="btn btn-primary" onclick='printLaporan()'><i class="fa fa-print"></i> Print AK13</button>
								</div>
							</div>
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="buTable">
									<thead>
										<tr>
											<th>Options</th>
											<th>#</th>
											<th>Kode</th>
											<th>Surat Kendaraan</th>
											<th>Status</th>
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
<?= $this->load->view('basic_js'); ?>
<script type='text/javascript'>
	var buTable = $('#buTable').DataTable({
		"ordering" : false,
		"scrollX": true,
		"processing": true,
		"serverSide": true,
		ajax: 
		{
			url: "<?= base_url()?>surat_kendaraan/ax_data_surat_kendaraan/",
			type: 'POST'
		},
		columns: 
		[
		{
			data: "id_surat_kendaraan", render: function(data, type, full, meta){
				var str = '';
				str += '<div class="btn-group">';
				str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
				str += '<ul class="dropdown-menu">';
				str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
				str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
				str += '</ul>';
				str += '</div>';
				return str;
			}
		},

		{ data: "id_surat_kendaraan" },
		{ data: "kd_surat_kendaraan" },
		{ data: "nm_surat_kendaraan" },

		{ data: "active", render: function(data, type, full, meta){
			if(data == 1)
				return "Active";
			else return "Not Active";
		}
	}
	]
});

	$('#btnSave').on('click', function () {
		if($('#nm_surat_kendaraan').val() == '')
		{
			alertify.alert("Warning", "Please fill surat_kendaraan Name.");
		}
		else
		{
			var url = '<?=base_url()?>surat_kendaraan/ax_set_data';
			var data = {
				id_surat_kendaraan: $('#id_surat_kendaraan').val(),
				kd_surat_kendaraan: $('#kd_surat_kendaraan').val(),
				nm_surat_kendaraan: $('#nm_surat_kendaraan').val(),

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
					buTable.ajax.reload();
				}
			});
		}
	});

	$('#id_bu_filter').select2({
		'placeholder': "Cabang",
		'allowClear': true
	}).on("change", function (e) {
		buTable.ajax.reload();
		armadalist();
	});

	function ViewData(id_surat_kendaraan)
	{
		if(id_surat_kendaraan == 0)
		{
			$('#addModalLabel').html('Add Surat Kendaraan');
			$('#id_surat_kendaraan').val('');
			$('#kd_surat_kendaraan').val('');
			$('#nm_surat_kendaraan').val('');
			$('#active').val('1');
			$('#addModal').modal('show');
		}
		else
		{
			var url = '<?=base_url()?>surat_kendaraan/ax_get_data_by_id';
			var data = {
				id_surat_kendaraan: id_surat_kendaraan
			};

			$.ajax({
				url: url,
				method: 'POST',
				data: data
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				$('#addModalLabel').html('Edit Surat Kendaraan');
				$('#id_surat_kendaraan').val(data['id_surat_kendaraan']);
				$('#kd_surat_kendaraan').val(data['kd_surat_kendaraan']);
				$('#nm_surat_kendaraan').val(data['nm_surat_kendaraan']);
				$('#select2-id_kota-container').html(data['nm_kota']);
				$('#id_kota').val(data['id_kota']);
				$('#active').val(data['active']);
				$('#addModal').modal('show');
			});
		}
	}

	function DeleteData(id_surat_kendaraan)
	{
		alertify.confirm(
			'Confirmation', 
			'Are you sure you want to delete this data?', 
			function(){
				var url = '<?=base_url()?>surat_kendaraan/ax_unset_data';
				var data = {
					id_surat_kendaraan: id_surat_kendaraan
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

	function armadalist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal/ax_get_armada", 
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
</script>
</body>
</html>
