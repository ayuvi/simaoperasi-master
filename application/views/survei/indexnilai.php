<!DOCTYPE html>
<html>
	<head>
		<?= $this->load->view('head'); ?>
	</head>
	
	<style>
.blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
</style>
	
	<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">
		<div class="wrapper">
			<?= $this->load->view('nav'); ?>
			<?= $this->load->view('menu_groups'); ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>Survei</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<!--<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Tambah Template
									</button>-->
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<!--<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-survei" id="addModalLabel">Form Tambah Template</h4>
												</div>-->
												<div class="modal-body">
													<input type="hidden" id="id_survei" name="id_survei" value='' />
													
													<div class="form-group">
														<label>Nama Survei</label>
														<input type="text" id="nm_survei" name="nm_survei" class="form-control" placeholder="Nama Survei">
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
										<table class="table table-striped table-bordered table-hover" id="surveiTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>Status</th>
													<th>Nama Survei</th>
													<th>Tanggal</th>
													
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
					url: "<?=base_url()?>survei/ax_data_survei/",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_survei", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							/* str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">'; */
							str += '<a href="<?= base_url()?>survei/isinilai/'+data+'"><button type="button" class="btn btn-default" style="color:#1574ea;"><b class="blink"> KLIK ISI SURVEI</b></button></a>';
							// str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							// str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							// str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					{ data: "status", render: function(data, type, full, meta){
							if(data == 1)
								{return '<span class="label label-info">Proses</span>';}
							else if(data == 2)
								{return '<span class="label label-sucess">Layak</span>';}
							else if(data == 3)
								{return '<span class="label label-danger">Tidak Layak</span>';}
							
						}
					},
					// { data: "id_survei" },
					{ data: "nm_survei" },
					{ data: "cdate" },
					// { data: "nm_user" },
					
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#id_kendaraan').val() == '0')
				{
					alertify.alert("Warning", "Please fill survei Name.");
				}

				else
				{
					var url = '<?=base_url()?>survei/ax_set_data';
					var data = {
						id_survei: $('#id_survei').val(),
						id_bu: $('#id_bu').val(),
						id_kendaraan: $('#id_kendaraan').val(),
						id_driver: $('#id_driver').val(),
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.success("survei data saved.");
							$('#addModal').modal('hide');
							surveiTable.ajax.reload();
						}
					});
				}
			});
			
			function ViewData(id_survei)
			{
				if(id_survei == 0)
				{
					$('#addModalLabel').html('Add Template');
					$('#id_survei').val('');
					$('#id_jenis').val('0');
					$('#select2-id_jenis-container').html("--Jenis--");
					$('#nm_survei').val('');
					$('#deskripsi').val('');
					$('#penilaian').val('1');
					$('#active').val('1');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>survei/ax_get_data_by_id';
					var data = {
						id_survei: id_survei
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						$('#addModalLabel').html('Edit Template');
						$('#id_survei').val(data['id_survei']);
						$('#select2-id_jenis-container').html(data['nm_jenis']);
						$('#id_jenis').val(data['id_jenis']);
						$('#nm_survei').val(data['nm_survei']);
						$('#deskripsi').val(data['deskripsi']);
						$('#penilaian').val(data['penilaian']);
						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_survei)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>survei/ax_unset_data';
						var data = {
							id_survei: id_survei
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							surveiTable.ajax.reload();
							alertify.error('survei data deleted.');
						});
					},
					function(){ }
				);
			}
			</script>
	</body>
</html>
