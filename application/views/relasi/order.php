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
				<h1>DELIVERY ORDER</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add DO
								</button>
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Delivery Order</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_order" name="id_order" value='' />
												<input type="hidden" id="id_rate" name="id_rate" value='<?=$data_rate['id_rate'];?>' />

												<div class="form-group">
													<label>Tipe Armada</label>
													<select class="form-control select2" style="width: 100%;" name="tipe_armada" id="tipe_armada" required="required">
														<option value="0"> -- Tipe Armada -- </option>
														<?php foreach ($combobox_tipe_armada->result() as $rowmenu) { ?>
														<option value="<?= $rowmenu->id_tipe_armada?>"><?= $rowmenu->nm_tipe_armada?></option>
														<?php } ?>
													</select>
												</div>

												<div class="form-group">
													<label>Rate</label>
													<input type="text" id="rate" name="rate" class="form-control" placeholder="Rate" value="<?=$data_rate['rate'];?>" readonly="readonly">
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
								<div class="row">
									<div class="col-lg-12">
										<div class="col-lg-6">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th style="color: blue"><b>RELASI</b></th>
														<th style="color: blue"><b>: <?=$data_rate['nm_relasi'];?></b></th>
													</tr>
													<tr>
														<th style="color: blue"><b>PROJECT</b></th>
														<th style="color: blue"><b>: <?=$data_rate['nm_project'];?></b></th>
													</tr>
												</thead>
											</table>
										</div>

										<div class="col-lg-6">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th style="color: blue"><b>TANGGAL</b></th>
														<th style="color: blue"><b>: <?=date("Y-m-d");?></b></th>
													</tr>
													<tr>
														<th style="color: blue"><b>ASAL - TUJUAN</b></th>
														<th style="color: blue"><b>: <?=$data_rate['asal']." - ".$data_rate['tujuan'];?></b></th>
													</tr>
												</thead>
											</table>
										</div>

									</div>
								</div>
								<div class="form-group">
									<center><h3><font color="blue">Delivery Order</font></h3></center>
								</div>
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="buTable">
										<thead>
											<tr>
												<th>Options</th>
												<th>#</th>
												<th>Armada</th>
												<th>Rate</th>
												<th>Status</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th></th>
												<th></th>
												<th id="tfoot_jum" align="center"></th>
												<th id="tfoot_total"></th>
												<th></th>
											</tr>
										</tfoot>
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
				url: "<?= base_url()?>order/ax_data_order/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_rate": $("#id_rate").val()
					});
				}
			},
			columns: 
			[
			{
				data: "id_order", render: function(data, type, full, meta){
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

			{ data: "id_order" },
			{ data: "nm_tipe_armada" },
			{ data: "rate" },

			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		],

		"drawCallback": function(settings) {
			var api = this.api();
			var jsondata = api.ajax.json();
			total = jsondata['total'];
			$('#tfoot_jum').html('<b>JUMLAH</b>');
			$('#tfoot_total').html('<b>Rp. '+formatNumber(total)+'</b>');
		}
	});

		$('#btnSave').on('click', function () {
			if($('#tipe_armada').val() == '0')
			{
				alertify.alert("Warning", "Please fill Armada.");
			}else if($('#rate').val() == '')
			{
				alertify.alert("Warning", "Please fill Rate.");
			}
			else
			{
				var url = '<?=base_url()?>order/ax_set_data';
				var data = {
					id_order: $('#id_order').val(),
					id_rate: $('#id_rate').val(),
					tipe_armada: $('#tipe_armada').val(),
					rate: $('#rate').val(),
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

		function ViewData(id_order)
		{
			if(id_order == 0)
			{
				$('#addModalLabel').html('Add Delivery Order');
				$('#id_order').val('');
				$('#tipe_armada').val('0').trigger('change');
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>order/ax_get_data_by_id';
				var data = {
					id_order: id_order
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Segment');
					$('#id_order').val(data['id_order']);
					$('#tipe_armada').val(data['tipe_armada']).trigger('change');
					$('#rate').val(data['rate']);
					$('#active').val(data['active']);
					$('#addModal').modal('show');
				});
			}
		}

		function DeleteData(id_order)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>order/ax_unset_data';
					var data = {
						id_order: id_order
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

		function formatNumber(num) {
			return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
		}
	</script>
</body>
</html>
