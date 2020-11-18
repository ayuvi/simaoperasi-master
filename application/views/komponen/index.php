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
					<h1>Komponen</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add Komponen
									</button>
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabel">Form Add Komponen</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_komponen" name="id_komponen" value='' />

													<div class="form-group">
														<label>Name</label>
														<input type="text" id="nm_komponen" name="nm_komponen" class="form-control" placeholder="Name">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
													</div>

													<div class="form-group">
														<label>Type</label>
														<select class="form-control" id="type_komponen" name="type_komponen">
															<option value="PLUS" >PLUS</option>
															<option value="MINUS" >MINUS</option>
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
										<table class="table table-striped table-bordered table-hover" id="buTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>#</th>
													<th>Komponen</th>
													<th>Ket</th>
													<th>Type</th>
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
					url: "<?= base_url()?>komponen/ax_data_komponen/",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_komponen", render: function(data, type, full, meta){
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
					
					{ data: "id_komponen" },
					{ data: "nm_komponen" },
					{ data: "keterangan" },
					{ data: "type_komponen" },
					
					{ data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					}
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#nm_komponen').val() == '')
				{
					alertify.alert("Warning", "Please fill Nama Komponen.");
				}else if($('#keterangan').val() == ''){
					alertify.alert("Warning", "Please fill Keterangan.");
				}
				else
				{
					var url = '<?=base_url()?>komponen/ax_set_data';
					var data = {
						id_komponen: $('#id_komponen').val(),
						id_kota: $('#id_kota').val(),
						nm_komponen: $('#nm_komponen').val(),
						keterangan: $('#keterangan').val(),
						type_komponen: $('#type_komponen').val(),
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
							alertify.success("komponen data saved.");
							$('#addModal').modal('hide');
							buTable.ajax.reload();
						}
					});
				}
			});
			
			function ViewData(id_komponen)
			{
				if(id_komponen == 0)
				{
					$('#addModalLabel').html('Add Komponen');
					$('#id_komponen').val('');
					$('#nm_komponen').val('');
					$('#keterangan').val('');
					$('#select2-id_kota-container').html('---Kota--');
					$('#id_kota').val('0');
					$('#active').val('1');
					$('#type_komponen').val('PLUS');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>komponen/ax_get_data_by_id';
					var data = {
						id_komponen: id_komponen
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit komponen');
						$('#id_komponen').val(data['id_komponen']);
						$('#nm_komponen').val(data['nm_komponen']);
						$('#keterangan').val(data['keterangan']);
						$('#select2-id_kota-container').html(data['nm_kota']);
						$('#id_kota').val(data['id_kota']);
						$('#active').val(data['active']);
						$('#type_komponen').val(data['type_komponen']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_komponen)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>komponen/ax_unset_data';
						var data = {
							id_komponen: id_komponen
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							buTable.ajax.reload();
							alertify.error('komponen data deleted.');
						});
					},
					function(){ }
				);
			}
		</script>
	</body>
</html>
