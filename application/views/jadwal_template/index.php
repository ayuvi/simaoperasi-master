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
					<h1>Template Jadwal</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add jadwal_template
									</button>
									<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-jadwal_template" id="addModalLabel">Form Add jadwal_template</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_jadwal_template" name="id_jadwal_template" value='' />
													<div class="form-group">
														<label>BU</label>
														<select class="form-control select2" style="width: 100%;" id="id_bu" name="id_bu">
														<option value="0">--BU--</option>
														<?php
															foreach ($bu_combobox->result() as $rowmenu) {
														?>
															<option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
														<?php
															}
														?>
														</select>
													</div>
													<div class="form-group">
														<label>Driver</label>
														<select class="form-control select2" style="width: 100%;" id="id_pegawai" name="id_pegawai">
														</select>
													</div>

													<div class="form-group">
														<label>Armada</label>
														<select class="form-control select2" style="width: 100%;" id="kd_armada" name="kd_armada">
														</select>
													</div>

													<div class="form-group">
														<label>Trayek</label>
														<select class="form-control select2" style="width: 100%;" id="kd_trayek" name="kd_trayek">
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
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="jadwal_templateTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>KD jadwal_template</th>
													<th>jadwal_template Name</th>
													<th>BU</th>
													
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
			var jadwal_templateTable = $('#jadwal_templateTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: 
				{
					url: "<?= base_url()?>jadwal_template/ax_data_jadwal_template/",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_jadwal_template", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a href="<?= base_url()?>jadwal_template/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
							str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					{ data: "kd_jadwal_template" },
					{ data: "nm_jadwal_template" },
					{ data: "nm_bu" },
					
					
					{ data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					}
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#nm_jadwal_template').val() == '')
				{
					alertify.alert("Warning", "Please fill Province Name.");
				}

				else
				{
					var url = '<?=base_url()?>jadwal_template/ax_set_data';
					var data = {
						id_jadwal_template: $('#id_jadwal_template').val(),
						id_bu: $('#id_bu').val(),
						nm_jadwal_template: $('#nm_jadwal_template').val(),
						kd_jadwal_template: $('#kd_jadwal_template').val(),
						
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
							alertify.success("jadwal_template data saved.");
							$('#addModal').modal('hide');
							jadwal_templateTable.ajax.reload();
						}
					});
				}
			});
			
			function ViewData(id_jadwal_template)
			{
				if(id_jadwal_template == 0)
				{
					$('#addModalLabel').html('Add jadwal_template');
					$('#id_jadwal_template').val('');
					$('#id_bu').val('0');
					$('#select2-id_jadwal_template-container').html("--jadwal_template--");
					$('#select2-id_bu-container').html("--BU--");
					$('#nm_jadwal_template').val('');
					$('#kd_jadwal_template').val('');
					
					$('#active').val('1');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>jadwal_template/ax_get_data_by_id';
					var data = {
						id_jadwal_template: id_jadwal_template
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit jadwal_template');
						$('#id_jadwal_template').val(data['id_jadwal_template']);
						$('#select2-id_jadwal_template-container').html(data['nm_jadwal_template']);
						$('#select2-id_bu-container').html(data['nm_bu']);
						$('#id_bu').val(data['id_bu']);
						$('#nm_jadwal_template').val(data['nm_jadwal_template']);
						$('#kd_jadwal_template').val(data['kd_jadwal_template']);
						
						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_jadwal_template)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>jadwal_template/ax_unset_data';
						var data = {
							id_jadwal_template: id_jadwal_template
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							jadwal_templateTable.ajax.reload();
							alertify.error('jadwal_template data deleted.');
						});
					},
					function(){ }
				);
			}
			</script>
	</body>
</html>
