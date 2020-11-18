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
					<h1>Penilaian</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
									<div id="deposit" class="col-lg-3"></div>
									<div id="critical" class="col-lg-3"></div>
									</div>
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-survei" id="addModalLabel">Form Tambah survei</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_survei_detail" name="id_survei_detail" value='' />
													

													<div class="form-group">
														<label>Active</label>
														<select class="form-control" id="status" name="status">
															<option value="1"  >Active</option>
															<option value="0"  >Not Active</option>
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
										
										<table class="table table-striped table-bordered table-hover" id="cekTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>Penilaian</th>
													
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

			var cekTable = $('#cekTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				// "aLengthMenu": [100],
				ajax: 
				{
					url: "<?=base_url()?>survei/ax_data_survei_nilai/<?= $id_survei?>",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_survei_detail", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewData('+ data +')"><i class="fa fa-pencil"></i> Set</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},

					{ data: "nm_cek" },
				
					{ data: "status", render: function(data, type, full, meta){
							if(data != 1)
								return '<span class="label label-danger">Not Active</span>';
							else return '<span class="label label-success">Active</span>';
						}
					},
				],
				
			});
			
			$('#btnSave').on('click', function () {
				if($('#id_survei_detail').val() == '')
				{
					alertify.alert("Warning", "Please fill ID.");
				}
				else
				{
					var url = '<?=base_url()?>survei/ax_set_data_nilai';
					var data = {
						
						id_survei_detail: $('#id_survei_detail').val(),
						status: $('#status').val(),
						
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.success("Nilai data saved.");
							$('#addModal').modal('hide');
							cekTable.ajax.reload();
						}
					});
				}
			});

			function ViewData(id_survei_detail)
			{
				
					var url = '<?=base_url()?>survei/ax_get_detail_id';
					var data = {
						id_survei_detail: id_survei_detail

					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						
						$('#id_survei_detail').val(id_survei_detail),
						$('#status').val(data['status']),
						
						$('#addModal').modal('show');

					});
				
			}

			$("#id_nilai_cek").select2({
			    tags: true,
			    dropdownParent: $("#addModal")
			});
			
			
			</script>
	</body>
</html>
