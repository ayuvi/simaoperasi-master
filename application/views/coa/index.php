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
				<h1>COA</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add COA
								</button>
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_coa" name="id_coa" value='' />


												<div class="form-group">
													<label>Kode</label>
													<input type="text" id="kd_coa" name="kd_coa" class="form-control" placeholder="Kode">
												</div>

												<div class="form-group">
													<label>Name</label>
													<input type="text" id="nm_coa" name="nm_coa" class="form-control" placeholder="Name">
												</div>
												<div class="form-group">
													<label>Kelompok</label>
													<select class="form-control" id="kelompok" name="kelompok">
														<option value="1" <?php echo set_select('myselect', '1', TRUE); ?>>1. Produksi</option>
														<option value="2" <?php echo set_select('myselect', '2'); ?>>2. Pendapatan</option>
														<option value="3" <?php echo set_select('myselect', '3'); ?>>3. Beban</option>
													</select>
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
									<div class="form-group col-md-6">
										<label>Kelompok</label>
										<select class="form-control" style="width: 100%;" id="id_kelompok_filter" name="id_kelompok_filter">
											<option value="null">All</option>
											<option value="1">1. Produksi</option>
											<option value="2">2. Pendapatan</option>
											<option value="3">3. Beban</option>
										</select>
									</div>
								</div>
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="buTable">
										<thead>
											<tr>
												<th>Options</th>
												<th>Kelompok</th>
												<th>Kode</th>
												<th>COA</th>
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
				url: "<?= base_url()?>coa/ax_data_coa/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"kelompok": $("#id_kelompok_filter").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_coa", render: function(data, type, full, meta){
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

			{ data: "kelompok", render: function(data, type, full, meta){
				if(data == 1){
					return "Produksi";
				}else if(data == 2){
					return "Pendapatan";
				}else{
					return "Beban";
				}
			}},
			{ data: "kd_coa" },
			{ data: "nm_coa" },

			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}}
			]
		});

		$('#btnSave').on('click', function () {
			if($('#nm_coa').val() == '')
			{
				alertify.alert("Warning", "Please fill coa Name.");
			}
			else
			{
				var url = '<?=base_url()?>coa/ax_set_data';
				var data = {
					id_coa: $('#id_coa').val(),
					kd_coa: $('#kd_coa').val(),
					nm_coa: $('#nm_coa').val(),
					kelompok: $('#kelompok').val(),
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

		function ViewData(id_coa)
		{
			if(id_coa == 0)
			{
				$('#addModalLabel').html('Add COA');
				$('#id_coa').val('');
				$('#kd_coa').val('');
				$('#nm_coa').val('');
				$('#active').val('1');
				$('#kelompok').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>coa/ax_get_data_by_id';
				var data = {
					id_coa: id_coa
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit coa');
					$('#id_coa').val(data['id_coa']);
					$('#kd_coa').val(data['kd_coa']);
					$('#nm_coa').val(data['nm_coa']);
					$('#select2-id_kota-container').html(data['nm_kota']);
					$('#id_kota').val(data['id_kota']);
					$('#active').val(data['active']);
					$('#kelompok').val(data['kelompok']);
					$('#addModal').modal('show');
				});
			}
		}

		function DeleteData(id_coa)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>coa/ax_unset_data';
					var data = {
						id_coa: id_coa
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

		$('#id_kelompok_filter').on("change", function (e) {
			buTable.ajax.reload();
		});
	</script>
</body>
</html>
