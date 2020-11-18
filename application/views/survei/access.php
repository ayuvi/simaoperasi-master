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
					<h1>Survei Access</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<surveitton class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add Survei Access
									</surveitton>
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<surveitton type="surveitton" class="close" data-dismiss="modal" aria-hidden="true">&times;</surveitton>
													<h4 class="Form-add-survei" id="addModalLabel">Form Add Survei</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_survei" name="id_survei" value='<?= $id_survei?>' />
													<input type="hidden" id="id_survei_access" name="id_survei_access" value='0' />
													
													<div class="form-group">
														<label>User</label>
														<select class="form-control select2" style="width: 100%;" id="id_user" name="id_user">
														<option value="0">--User--</option>
														<?php
															foreach ($combobox_user->result() as $rowmenu) {
														?>
															<option value="<?= $rowmenu->id_user?>"  ><?= $rowmenu->nm_user?></option>
														<?php
															}
														?>
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
													<surveitton type="surveitton" class="btn btn-default" data-dismiss="modal">Close</surveitton>
													<surveitton type="surveitton" class="btn btn-primary" id='btnSave'>Save</surveitton>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="surveiTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>User</th>
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
			var surveiTable = $('#surveiTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: 
				{
					url: "<?= base_url() ?>survei/ax_data_survei_access/<?= $id_survei?>",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_survei_access", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<surveitton type="surveitton" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></surveitton>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							
							str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					
					
					{ data: "nm_user" },
					
					{ data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					}
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#id_user').val() == 0)
				{
					alertify.alert("Warning", "Please Choose User.");
				}
				
				else
				{
					var url = '<?=base_url()?>survei/ax_set_data_access';
					var data = {
						id_survei: $('#id_survei').val(),
						id_survei_access: $('#id_survei_access').val(),
						id_user: $('#id_user').val(),
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
							alertify.success("Access data saved.");
							$('#addModal').modal('hide');
							surveiTable.ajax.reload();
						}
					});
				}
			});
			
			function ViewData(id_survei_access)
			{
				if(id_survei_access == 0)
				{
					$('#addModalLabel').html('Add Access');
					$('#select2-id_user-container').html('---User--');
					$('#active').val('1');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>survei/ax_get_data_access_by_id';
					var data = {
						id_survei_access: id_survei_access
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit Vehicle');
						$('#id_survei').val(data['id_survei']);
						$('#id_survei_access').val(data['id_survei_access']);
						$('#select2-id_user-container').html(data['nm_user']);
						$('#id_user').val(data['id_user']);
						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_survei_access)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>survei/ax_unset_data_access';
						var data = {
							id_survei_access: id_survei_access
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							surveiTable.ajax.reload();
							alertify.error('Access data deleted.');
						});
					},
					function(){ }
				);
			}
			
			$("#id_user").select2({ dropdownParent: "#addModal" });
		</script>
	</body>
</html>
