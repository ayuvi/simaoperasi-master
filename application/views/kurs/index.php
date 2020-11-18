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
					<h1>KURS</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add KURS
									</button>
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabel">Form Add KURS</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_kurs" name="id_kurs" value='' />

													<div class="form-group">
														<label>Tanggal</label>
														<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
													</div>

													<div class="form-group">
														<label>Rupiah Indonesia</label>
														<input type="text" id="rupiah" name="rupiah" class="form-control" placeholder="Rupiah Indonesia (IDR)">
													</div>
													<div class="form-group">
														<label>Ringgit Malaysia</label>
														<input type="text" id="ringgit" name="ringgit" class="form-control" placeholder="Ringgit Malaysia (MYR)">
													</div>
													<div class="form-group">
														<label>Dollar Brunei</label>
														<input type="text" id="dollar" name="dollar" class="form-control" placeholder="Dollar Brunei (BND)">
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
													<th>Tanggal</th>
													<th>Rupiah (IDR)</th>
													<th>Ringgit (MYR)</th>
													<th>Dolar (BND)</th>
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
					url: "<?= base_url()?>kurs/ax_data_kurs/",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_kurs", render: function(data, type, full, meta){
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
					
					{ data: "id_kurs" },
					{ data: "tanggal" },
					{ data: "rupiah" },
					{ data: "ringgit" },
					{ data: "dollar" },
					
					{ data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					}
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#tanggal').val() == '')
				{
					alertify.alert("Warning", "Please fill Tanggal.");
				}else if($('#rupiah').val() == '')
				{
					alertify.alert("Warning", "Please fill Rupiah.");
				}
				else if($('#ringgit').val() == '')
				{
					alertify.alert("Warning", "Please fill Ringgit.");
				}
				else if($('#dollar').val() == '')
				{
					alertify.alert("Warning", "Please fill Dollar.");
				}
				else
				{
					var url = '<?=base_url()?>kurs/ax_set_data';
					var data = {
						id_kurs: $('#id_kurs').val(),
						tanggal: $('#tanggal').val(),
						rupiah: $('#rupiah').val(),
						ringgit: $('#ringgit').val(),
						dollar: $('#dollar').val(),
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
			
			function ViewData(id_kurs)
			{
				if(id_kurs == 0)
				{
					$('#addModalLabel').html('Add KURS');
					$('#id_kurs').val('');
					$('#tanggal').val("<?=date("Y-m-d");?>");
					$('#rupiah').val('');
					$('#ringgit').val('');
					$('#dollar').val('');
					$('#active').val('1');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>kurs/ax_get_data_by_id';
					var data = {
						id_kurs: id_kurs
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit KURS');
						$('#id_kurs').val(data['id_kurs']);
						$('#tanggal').val(data['tanggal']);
						$('#rupiah').val(data['rupiah']);
						$('#ringgit').val(data['ringgit']);
						$('#dollar').val(data['dollar']);

						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_kurs)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>kurs/ax_unset_data';
						var data = {
							id_kurs: id_kurs
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

			$( "#tanggal").datepicker({
				// minDate: 0,
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
		</script>
	</body>
</html>
