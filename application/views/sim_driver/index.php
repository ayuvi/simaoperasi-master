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
				<h1>SIM DRIVER</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add SIM DRIVER
								</button>
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add SIM DRIVER</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_sim_driver" name="id_sim_driver" value='' />

												<div class="form-group">
													<label>Name</label>
													<input type="text" id="nm_sim_driver" name="nm_sim_driver" class="form-control" placeholder="Name">
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
								<div class="form-group">
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
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="buTable">
										<thead>
											<tr>
												<th>Options</th>
												<th>#</th>
												<th>SIM DRIVER</th>
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
				url: "<?= base_url()?>sim_driver/ax_data_sim_driver/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, {
						"id_bu": $("#id_bu_filter").val()
					}); }
			},
			columns: 
			[
			{
				data: "id_sim_driver", render: function(data, type, full, meta){
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

			{ data: "id_sim_driver" },
			{ data: "nm_sim_driver" },

			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		]
	});

		$('#btnSave').on('click', function () {
			if($('#nm_sim_driver').val() == '')
			{
				alertify.alert("Warning", "Please fill SIM Name.");
			}
			else
			{
				var url = '<?=base_url()?>sim_driver/ax_set_data';
				var data = {
					id_sim_driver: $('#id_sim_driver').val(),
					nm_sim_driver: $('#nm_sim_driver').val(),
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

		function ViewData(id_sim_driver)
		{
			if(id_sim_driver == 0)
			{
				$('#addModalLabel').html('Add SIM DRIVER');
				$('#id_sim_driver').val('');
				$('#nm_sim_driver').val('');
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>sim_driver/ax_get_data_by_id';
				var data = {
					id_sim_driver: id_sim_driver
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit SIM DRIVER');
					$('#id_sim_driver').val(data['id_sim_driver']);
					$('#nm_sim_driver').val(data['nm_sim_driver']);
					$('#select2-id_kota-container').html(data['nm_kota']);
					$('#active').val(data['active']);
					$('#addModal').modal('show');
				});
			}
		}

		function DeleteData(id_sim_driver)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>sim_driver/ax_unset_data';
					var data = {
						id_sim_driver: id_sim_driver
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
	</script>
</body>
</html>
