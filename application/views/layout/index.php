<!DOCTYPE html>
<html>
	<head>
		<?= $this->load->view('head'); ?>
		<style type="text/css">
			
			
			.kursi{
				padding: 7px 8px;
			    font-size: 12px;
			    line-height: 1.5;
			    border-radius: 3px;
			} 
			.modal {
			  overflow-y:auto;
			}

			@media (min-width: 900px){

			.kursi{
				padding: 7px 15px;
			    font-size: 12px;
			    line-height: 1.5;
			    border-radius: 3px;
			}  

			}
		</style>
	</head>
	<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">
		<div class="wrapper">
			<?= $this->load->view('nav'); ?>
			<?= $this->load->view('menu_groups'); ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>Layout Armada</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add Layout
									</button>
									<div class="modal fade" id="addModal"  role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabel">Form Add Layout</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_layout" name="id_layout" value='' />

													<div class="form-group">
														<label>Name</label>
														<input type="text" id="nm_layout" name="nm_layout" class="form-control" placeholder="Name">
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
									<!-- Modal Layout -->
									
									<div class="modal fade" id="addModallayout" role="dialog"  aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabelLayout">Layout Armada</h4>
												</div>
												<div class="modal-body">
													
													<div class="row text-center">
													<!-- <div class="ml-2 "> -->
													<div class="col-md-5" id="kursi"></div>
													<div class="col-md-7 ">
													<button class="btn btn-primary pull-right" onclick='ViewLayoutDetail(0)'>
														<i class='fa fa-plus'></i> Layout
													</button>
													<br>
													<hr>
													
													<div class="dataTable_wrapper">
														<table class="table table-striped table-bordered table-hover" id="layoutTable">
															<thead>
																<tr>
																	<th>#</th>
																	<th>A</th>
																	<th>B</th>
																	<th>C</th>
																	<th>D</th>
																	<th>E</th>
																	<th>F</th>
																</tr>
															</thead>
														</table>
													</div>

													
													
													</div>
													<!-- </div> -->
												</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<!-- Modal Layout -->
									<div class="modal fade" id="addModallayoutdetail" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" onclick="$('#addModallayoutdetail').modal('hide')" aria-hidden="true">&times;</button>
																	<h4 class="Form-add-bu" id="addModalLabelDetail">Form Add Layout Detail</h4>
																</div>
																<div class="modal-body">
																	<input type="hidden" id="id_layout_detail" name="id_layout_detail" value='0' />
																<div class="row">

																	<div class="form-group col-xs-4">
																		<label>A</label>
																		<input type="text" id="a" name="a" class="form-control" placeholder="A">
																	</div>
																	<div class="form-group col-xs-4">
																		<label>B</label>
																		<input type="text" id="b" name="b" class="form-control" placeholder="B">
																	</div>
																	<div class="form-group col-xs-4">
																		<label>C</label>
																		<input type="text" id="c" name="c" class="form-control" placeholder="C">
																	</div>
																	<div class="form-group col-xs-4">
																		<label>D</label>
																		<input type="text" id="d" name="d" class="form-control" placeholder="D">
																	</div>
																	<div class="form-group col-xs-4">
																		<label>E</label>
																		<input type="text" id="e" name="e" class="form-control" placeholder="E">
																	</div>
																	<div class="form-group col-xs-4">
																		<label>F</label>
																		<input type="text" id="f" name="f" class="form-control" placeholder="F">
																	</div>
																</div>
																	
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" onclick="$('#addModallayoutdetail').modal('hide')" >Close</button>
																	<button type="button" class="btn btn-primary" id='btnSavedetail'>Save</button>
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
													<th>Layout</th>
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
					url: "<?= base_url()?>layout/ax_data_layout/",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_layout", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							str += '<li><a onclick="ViewLayout(' + data + ')"><i class="fa fa-map"></i> Layout</a></li>';
							str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					
					{ data: "id_layout" },
					{ data: "nm_layout" },
					
					{ data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					}
				]
			});

			var layoutTable = $('#layoutTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: 
				{
					url: "<?= base_url()?>layout/ax_data_layout_detail/",
					type: 'POST',
					data: function ( d ) {
			         return $.extend({}, d, { 
			         	
			         	"id_layout": $("#id_layout").val()

			         });
			     	}
				},
				columns: 
				[
							{
								data: "id_layout_detail", render: function(data, type, full, meta){
									var str = '';
									str += '<div class="btn-group">';
									str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>';
									str += '<ul class="dropdown-menu">';
									str += '<li><a onclick="ViewLayoutDetail(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
									str += '<li><a onClick="DeleteDatadetail(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
									str += '</ul>';
									str += '</div>';
									return str;
								}
							},
							
							{ data: "a" },
							{ data: "b" },
							{ data: "c" },
							{ data: "d" },
							{ data: "e" },
							{ data: "f" },
							
							
						],
						
				"drawCallback": function( settings ) {
			        var api = this.api();
			        var jsondata = api.ajax.json();
			        id_layout = jsondata['id_layout'];

			        var url = '<?=base_url()?>layout/ax_get_data_by_layout';
					var data = {
						id_layout: id_layout
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#kursi').html(data['layout']);
					});
			 
			        
			    }
			});
			
			$('#btnSave').on('click', function () {
				if($('#nm_layout').val() == '')
				{
					alertify.alert("Warning", "Please fill layout.");
				}
				else
				{
					var url = '<?=base_url()?>layout/ax_set_data';
					var data = {
						id_layout: $('#id_layout').val(),
						id_kota: $('#id_kota').val(),
						nm_layout: $('#nm_layout').val(),
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
							alertify.success("layout data saved.");
							$('#addModal').modal('hide');
							buTable.ajax.reload();
						}
					});
				}
			});

			$('#btnSavedetail').on('click', function () {
				if($('#id_layout_detail').val() == '')
				{
					alertify.alert("Warning", "Please fill layout.");
				}
				else
				{
					var url = '<?=base_url()?>layout/ax_set_data_detail';
					var data = {
						id_layout_detail: $('#id_layout_detail').val(),
						id_layout: $('#id_layout').val(),
						a: $('#a').val(),
						b: $('#b').val(),
						c: $('#c').val(),
						d: $('#d').val(),
						e: $('#e').val(),
						f: $('#f').val(),
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.success("layout data saved.");
							$('#addModallayoutdetail').modal('hide');
							$('#addModallayout').modal('handleUpdate');
							// layoutTable.ajax.reload();
							ViewLayout(id_layout)
						}
					});
				}
			});
			
			function ViewData(id_layout)
			{
				if(id_layout == 0)
				{
					$('#addModalLabel').html('Add layout');
					$('#id_layout').val('');
					$('#nm_layout').val('');
					$('#select2-id_kota-container').html('---Kota--');
					$('#id_kota').val('0');
					$('#active').val('1');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>layout/ax_get_data_by_id';
					var data = {
						id_layout: id_layout
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit layout');
						$('#id_layout').val(data['id_layout']);
						$('#nm_layout').val(data['nm_layout']);
						$('#select2-id_kota-container').html(data['nm_kota']);
						$('#id_kota').val(data['id_kota']);
						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}

			function ViewLayout(id_layout)
			{
				$('#id_layout').val(id_layout);
				$('#addModallayout').modal('show');
				setTimeout(function(){  layoutTable.ajax.reload(); }, 1000);
					
			}


			function ViewLayoutDetail(id_layout_detail)
			{
				
				if(id_layout_detail == 0)
				{
					
					$('#id_layout_detail').val(0);
					$('#a').val('');
					$('#b').val('');
					$('#c').val('');
					$('#d').val('');
					$('#e').val('');
					$('#f').val('');
					$('#addModallayoutdetail').modal('show');

				}
				else
				{
					var url = '<?=base_url()?>layout/ax_get_data_by_layout_detail';
					var data = {
						id_layout_detail: id_layout_detail
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabelDetail').html('Edit Layout Detail');
						$('#id_layout_detail').val(data['id_layout_detail']);
						$('#a').val(data['a']);
						$('#b').val(data['b']);
						$('#c').val(data['c']);
						$('#d').val(data['d']);
						$('#e').val(data['e']);
						$('#f').val(data['f']);
						$('#addModallayoutdetail').modal('show');
					});
				}
			}
			
			function DeleteData(id_layout)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>layout/ax_unset_data';
						var data = {
							id_layout: id_layout
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							buTable.ajax.reload();
							alertify.error('layout data deleted.');

						});
					},
					function(){ }
				);
			}

			function DeleteDatadetail(id_layout_detail)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>layout/ax_unset_detail';
						var data = {
							id_layout_detail: id_layout_detail
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							layoutTable.ajax.reload();
							alertify.error('Layout data deleted.');
						});
					},
					function(){ }
				);
			}
		</script>
	</body>
</html>
