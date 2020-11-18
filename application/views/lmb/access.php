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
					<h1>Beban Operasi Kendaraan</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add Beban
									</button>
									<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabel">Form Add Komponen BOK</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_lmb" name="id_lmb" value='<?= $id_lmb?>' />
													<input type="hidden" id="id_lmb_access" name="id_lmb_access" value='0' />
													
													<div class="form-group">
														<label>Komponen BOK</label>
														<select class="form-control select2" style="width: 100%;" id="id_komponen" name="id_komponen">
														<option value="0">--Komponen--</option>
														<?php
															foreach ($combobox_komponen->result() as $rowmenu) {
														?>
															<option value="<?= $rowmenu->id_komponen?>"  ><?= $rowmenu->nm_komponen?></option>
														<?php
															}
														?>
														</select>
													</div>
													
													<div class="form-group">
														<label>Nilai</label>
														<input type="number" class="form-control"  data-decimals="2" min="0" id="nilai" placeholder="Harga">
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
													<th>Komponen Beban</th>
													<th>Nilai</th>
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
					url: "<?=base_url()?>lmb/ax_data_lmb_access/<?= $id_lmb?>",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_lmb_access", render: function(data, type, full, meta){
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
					{ data: "nm_komponen" },
					{ data: 'nilai', render: $.fn.dataTable.render.number( ',', '.', 2 )},
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#id_komponen').val() == 0){
					alertify.alert("Warning", "Komponen BOK Harus diisi.");
				}else{
					var url = '<?=base_url()?>lmb/ax_set_data_access';
					var data = {
						id_lmb: $('#id_lmb').val(),
						id_lmb_access: $('#id_lmb_access').val(),
						id_komponen: $('#id_komponen').val(),
						nilai: $('#nilai').val()
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success"){
							alertify.success("Access data saved.");
							$('#addModal').modal('hide');
							buTable.ajax.reload();
						}
					});
				}
			});
			
			function ViewData(id_lmb_access)
			{
				if(id_lmb_access == 0){
					$('#addModalLabel').html('Add Access');
					$('#select2-id_komponen-container').html('---Komponen--');
					$('#nilai').val('0');
					$('#addModal').modal('show');
				}else{
					var url = '<?=base_url()?>lmb/ax_get_data_access_by_id';
					var data = {
						id_lmb_access: id_lmb_access
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit Vehicle');
						$('#id_lmb').val(data['id_lmb']);
						$('#id_lmb_access').val(data['id_lmb_access']);
						$('#select2-id_komponen-container').html(data['nm_komponen']);
						$('#id_komponen').val(data['id_komponen']);
						$('#nilai').val(data['nilai']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_lmb_access)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>lmb/ax_unset_data_access';
						var data = {
							id_lmb_access: id_lmb_access
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							buTable.ajax.reload();
							alertify.error('Access data deleted.');
						});
					},
					function(){ }
				);
			}
		</script>
	</body>
</html>
