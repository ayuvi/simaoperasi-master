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
					<h1>Tambahkan Rit</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add RIT
									</button>
									<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabel">Form Add Rit</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_lmb" name="id_lmb" value='<?= @$id_lmb?>' />
													<input type="hidden" id="id_rit" name="id_rit" value='<?= @$id_rit?>' />
													<!-- <div class="form-group">
														<label>Manual / Otomatis</label>
														<select class="form-control select2" style="width: 100%;" id="manual" name="manual">
															
															<option value="0">Manual</option>
														</select>
													</div> -->
													<div class="form-group" id="valtyperit">
														<label>Type Rit</label>
														<select class="form-control" style="width: 100%;" id="type_rit" name="type_rit">
															<option value="0">-- Pilih --</option>
															<option value="1">Reguler</option>
															<option value="2">Trayek lain</option>
															<option value="3">Free</option>
														</select>
													</div>
													<div class="form-group" id="valrit">
														<label>Rit</label>
														<input type="number" class="form-control" data-decimals="2" min="0" id="rit" name="rit" placeholder="Jumlah Rit">
													</div>
													<div class="form-group" id="valtrayek">
														<label>Trayek</label>
														<select class="form-control select2" style="width: 100%;" id="kd_trayek" name="kd_trayek">
														<option value="0">--Trayek--</option>
														<?php
															foreach ($combobox_trayek->result() as $rowmenu) {
														?>
															<option value="<?= $rowmenu->kd_trayek?>"  ><?= $rowmenu->kd_trayek?></option>
														<?php
															}
														?>
														</select>
													</div>
													<div class="form-group">
														<label>Penumpang</label>
														<input type="number" class="form-control" data-decimals="2" min="0" id="penumpang" name="penumpang" placeholder="Jumlah Penumpang">
													</div>
													
													<div class="form-group">
														<label>Note</label><br>
													<textarea id="note" name="note" style="width:100%;"> </textarea>
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
													<th>Rit</th>
													<th>Trayek</th>
													<th>Penumpang</th>
													<th>Harga</th>
													<th>Total</th>
													<th>Note</th>
													<th>Driver</th>
													<th>Waktu</th>
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
		
			$(document).ready(function(){
				$("#valrit").show();
				$("#valtrayek").show();
				// $("#manual").on("change", function(){
				// 	var manual = $(this).val();
				// 	if(manual == 0){
				// 		$("#valrit").show();
				// 		$("#valtrayek").show();
				// 	}else{
				// 		$("#valrit").hide();
				// 		$("#valtrayek").hide();
				// 	}
				// });
				
				$("#type_rit").on("change", function(){
					var typerit = $(this).val();
					if(typerit == 2){
						$("#valtrayek").show();
					}else{
						$("#valtrayek").hide();
					}
				});
			});
		
			var buTable = $('#buTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: 
				{
					url: "<?=base_url()?>lmb/ax_data_lmb_rit/<?= $id_lmb?>",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_rit", render: function(data, type, full, meta){
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
					{ data: "rit" },
					{ data: "kd_trayek" },
					{ data: "pnp" },
					{ data: 'harga', render: $.fn.dataTable.render.number( ',', '.', 2 )},
					{ data: 'total', render: $.fn.dataTable.render.number( ',', '.', 2 )},
					{ data: "note" },
					{ data: "nm_driver" },
					{ data: "cdate" },
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#rit').val() == "" || $('#rit').val() == null || $('#rit').val() == 0){
					alertify.alert("Warning", "Tentukan Ritase.");
				}else{
					var url = '<?=base_url()?>lmb/ax_set_data_rit';
					//MANUAL
					// if($('#manual').val() == 0){
						var data = {
							id_lmb: $('#id_lmb').val(),
							id_rit: $('#id_rit').val(),
							type_rit: $('#type_rit').val(),
							rit: $('#rit').val(),
							kd_trayek: $('#kd_trayek').val(),
							penumpang: $('#penumpang').val(),
							note: $('#note').val(),
							manual: 0,
						};
					// }else{
					// //OTOMATIS
					// 	var data = {
					// 		id_lmb: $('#id_lmb').val(),
					// 		id_rit: $('#id_rit').val(),
					// 		type_rit: $('#type_rit').val(),
					// 		penumpang: $('#penumpang').val(),
					// 		note: $('#note').val(),
					// 		manual: $('#manual').val(),
					// 	};
					// }
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						console.log(data);
						var data = JSON.parse(data);
						if(data['status'] == "success"){
							alertify.success("Rit data saved.");
							$('#addModal').modal('hide');
							buTable.ajax.reload();
						}
					});
				}
			});
			
			function ViewData(id_rit)
			{
				if(id_rit == 0){
					$('#addModalLabel').html('Add Rit');
					$('#id_rit').val('');
					$('#rit').val('0');
					$('#type_rit').val('1');
					$('#penumpang').val('0');
					$('#harga').val('0');
					$('#addModal').modal('show');
					$("#valtrayek").hide();
				}else{
					var url = '<?=base_url()?>lmb/ax_get_data_rit_by_id';
					var data = {
						id_rit: id_rit
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['manual'] == 0){
							$('#addModalLabel').html('Edit Vehicle');
							$('#id_lmb').val(data['id_lmb']);
							$('#id_rit').val(data['id_rit']);
							$("#manual").val(data['manual']).trigger('change');
							$("#type_rit").val(data['type_rit']).trigger('change');
							$('#rit').val(data['rit']);
							$("#kd_trayek").val(data['kd_trayek']).trigger('change');
							$('#penumpang').val(data['pnp']);
							$('#note').val(data['note']);
							$('#addModal').modal('show');
						}else{
							$('#addModalLabel').html('Edit Vehicle');
							$('#id_lmb').val(data['id_lmb']);
							$('#id_rit').val(data['id_rit']);
							$("#manual").val(data['manual']).trigger('change');
							$("#type_rit").val(data['type_rit']).trigger('change');
							$('#penumpang').val(data['pnp']);
							$('#note').val(data['note']);
							$('#addModal').modal('show');
						}
					});
				}
			}
			
			function DeleteData(id_rit)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>lmb/ax_unset_data_rit';
						var data = {
							id_rit: id_rit
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							buTable.ajax.reload();
							alertify.error('Teknik data deleted.');
						});
					},
					function(){ }
				);
			}
		</script>
	</body>
</html>
