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
					<h1>Tipe Armada</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add Tipe Armada
									</button>
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabel">Form Add Tipe Armada</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_tipe_armada" name="id_tipe_armada" value='' />

													<div class="form-group">
														<label>Name</label>
														<input type="text" id="nm_tipe_armada" name="nm_tipe_armada" class="form-control" placeholder="Name">
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
					url: "<?= base_url()?>tipe_armada/ax_data_tipe_armada/",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_tipe_armada", render: function(data, type, full, meta){
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
					
					{ data: "id_tipe_armada" },
					{ data: "nm_tipe_armada" },
					
					{ data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					}
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#nm_tipe_armada').val() == '')
				{
					alertify.alert("Warning", "Please fill tipe_armada Name.");
				}
				else
				{
					var url = '<?=base_url()?>tipe_armada/ax_set_data';
					var data = {
						id_tipe_armada: $('#id_tipe_armada').val(),
						nm_tipe_armada: $('#nm_tipe_armada').val(),
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
			
			function ViewData(id_tipe_armada)
			{
				if(id_tipe_armada == 0)
				{
					$('#addModalLabel').html('Add Tipe Armada');
					$('#id_tipe_armada').val('');
					$('#nm_tipe_armada').val('');
					$('#active').val('1');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>tipe_armada/ax_get_data_by_id';
					var data = {
						id_tipe_armada: id_tipe_armada
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit Tipe Armada');
						$('#id_tipe_armada').val(data['id_tipe_armada']);
						$('#nm_tipe_armada').val(data['nm_tipe_armada']);
						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_tipe_armada)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>tipe_armada/ax_unset_data';
						var data = {
							id_tipe_armada: id_tipe_armada
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
