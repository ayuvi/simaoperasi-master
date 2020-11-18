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
				<h1>Rekanan</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add Rekanan
								</button>
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Rekanan</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_rekanan" name="id_rekanan" value='' />

												<div class="form-group">
													<label>Nama</label>
													<input type="text" id="nm_rekanan" name="nm_rekanan" class="form-control" placeholder="Nama Rekanan">
												</div>
												
												<div class="form-group">
													<label>Alamat Rekanan</label>
													<input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Relasi">
												</div>
												<div class="form-group">
													<label>NPWP</label>
													<input type="text" id="npwp" name="npwp" class="form-control" placeholder="NPWP">
												</div>
												<div class="form-group">
													<label>Kontak Person (HP)</label>
													<input type="text" id="kontak_person" name="kontak_person" class="form-control" placeholder="Kontak Person (HP)">
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
												<th>Nama</th>
												<th>Alamat</th>
												<th>NPWP</th>
												<th>Telp/HP</th>
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
				url: "<?= base_url()?>rekanan/ax_data_rekanan/",
				type: 'POST'
			},
			columns: 
			[
			{
				data: "id_rekanan", render: function(data, type, full, meta){
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

			{ data: "id_rekanan" },
			{ data: "nm_rekanan" },
			{ data: "alamat" },
			{ data: "npwp" },
			{ data: "kontak_person" },
			{ data: "active", render: function(data, type, full, meta){
				if(data == 1)
					return "Active";
				else return "Not Active";
			}
		}
		]
	});

		$('#btnSave').on('click', function () {
			if($('#nm_rekanan').val() == '')
			{
				alertify.alert("Warning", "Please fill Nama Rekanan.");
			}else if($('#alamat').val() == '')
			{
				alertify.alert("Warning", "Please fill Nama Rekanan.");
			}
			else
			{
				var url = '<?=base_url()?>rekanan/ax_set_data';
				var data = {
					id_rekanan 	: $('#id_rekanan').val(),
					nm_rekanan 	: $('#nm_rekanan').val(),
					alamat 		: $('#alamat').val(),
					npwp 		: $('#npwp').val(),
					kontak_person: $('#kontak_person').val(),
					active 		: $('#active').val()
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Kode rekanan Duplicate/ Ganti Kode rekanan");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("rekanan data saved.");
						$('#addModal').modal('hide');
						buTable.ajax.reload();
					}
				});
			}
		});

		function ViewData(id_rekanan)
		{
			if(id_rekanan == 0)
			{
				$('#addModalLabel').html('Add Rekanan');
				$('#id_rekanan').val('');
				$('#nm_rekanan').val('');
				$('#alamat').val('');
				$('#npwp').val('');
				$('#kontak_person').val('');
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>rekanan/ax_get_data_by_id';
				var data = {
					id_rekanan: id_rekanan
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit Rekanan');
					$('#id_rekanan').val(data['id_rekanan']);
					$('#nm_rekanan').val(data['nm_rekanan']);
					$('#alamat').val(data['alamat']);
					$('#npwp').val(data['npwp']);
					$('#kontak_person').val(data['kontak_person']);
					$('#active').val(data['active']);
					$('#addModal').modal('show');
				});
			}
		}
		
		function DeleteData(id_rekanan)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>rekanan/ax_unset_data';
					var data = {
						id_rekanan: id_rekanan
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						buTable.ajax.reload();
						alertify.error('rekanan data deleted.');
					});
				},
				function(){ }
				);
		}
	</script>
</body>
</html>
