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
				<h1>Pool</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add Pool
								</button>
								<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-pool" id="addModalLabel">Form Add pool</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_pool" name="id_pool" value='' />
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
													<label>KD Pool</label>
													<input type="text" id="kd_pool" name="kd_pool" class="form-control" placeholder="kd_pool">
												</div>	

												<div class="form-group">
													<label>Pool Name</label>
													<input type="text" id="nm_pool" name="nm_pool" class="form-control" placeholder="pool Name">
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
									<table class="table table-striped table-bordered table-hover" id="poolTable">
										<thead>
											<tr>
												<th>Options</th>
												<th>KD Pool</th>
												<th>Pool Name</th>
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
		var poolTable = $('#poolTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>pool/ax_data_pool/",
				type: 'POST'
			},
			columns: 
			[
			{
				data: "id_pool", render: function(data, type, full, meta){
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a href="<?= base_url()?>pool/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
					str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},
			{ data: "kd_pool" },
			{ data: "nm_pool" },
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
			if($('#nm_pool').val() == '')
			{
				alertify.alert("Warning", "Please fill Province Name.");
			}

			else
			{
				var url = '<?=base_url()?>pool/ax_set_data';
				var data = {
					id_pool: $('#id_pool').val(),
					id_bu: $('#id_bu').val(),
					nm_pool: $('#nm_pool').val(),
					kd_pool: $('#kd_pool').val(),
					
					active: $('#active').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Kode Pool Duplicate/ Ganti Kode Pool");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Pool data saved.");
						$('#addModal').modal('hide');
						poolTable.ajax.reload();
					}
				});

			}
		});
		
		function ViewData(id_pool)
		{
			if(id_pool == 0)
			{
				$('#addModalLabel').html('Add Pool');
				$('#id_pool').val('');
				$('#id_bu').val('0');
				$('#select2-id_pool-container').html("--Pool--");
				$('#select2-id_bu-container').html("--BU--");
				$('#nm_pool').val('');
				$('#kd_pool').val('');
				
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>pool/ax_get_data_by_id';
				var data = {
					id_pool: id_pool
				};
				
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Pool');
					$('#id_pool').val(data['id_pool']);
					$('#select2-id_pool-container').html(data['nm_pool']);
					$('#select2-id_bu-container').html(data['nm_bu']);
					$('#id_bu').val(data['id_bu']);
					$('#nm_pool').val(data['nm_pool']);
					$('#kd_pool').val(data['kd_pool']);
					
					$('#active').val(data['active']);
					$('#addModal').modal('show');
				});
			}
		}
		
		function DeleteData(id_pool)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>pool/ax_unset_data';
					var data = {
						id_pool: id_pool
					};
					
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						poolTable.ajax.reload();
						alertify.error('Pool data deleted.');
					});
				},
				function(){ }
				);
		}
	</script>
</body>
</html>
