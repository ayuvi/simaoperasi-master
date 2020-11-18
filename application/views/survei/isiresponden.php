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
					<h1>Halaman Pengisian Survei Kepuasan Pegawai 2018</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
									<div id="deposit" class="col-lg-3"></div>
									</div>
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-survei" id="addModalLabel">Form Nilai Survei</h4>
												</div>
												<div class="modal-body">
													<!--<input type="hidden" id="id_survei" name="id_survei" value='<?= $id_survei?>' />-->
													<input type="hidden" id="id_survei_detail" name="id_survei_detail" value='' />
													<input type="hidden" id="id_session" name="id_session" value='<?= $id_session?>' />
													

													<div class="form-group">
														<label>Nilai</label>
														<select class="form-control select2" style="width: 100%;" id="id_nilai_cek" name="id_nilai_cek">
														
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
													<th>No</th>
													<th>Pertanyaan Survei</th>
													<th class="hidden-xs-down not-visible">Penilaian</th>
													<th>Sangat Tidak Setuju</th>
													<th>Tidak Setuju</th>
													<th>Kurang Setuju</th>
													<th>Setuju</th>
													<th>Sangat Setuju</th>
												</tr>
											</thead>
										</table>
									</div>
									<div class="box-footer">
										<div class="col-sm-6">
											<button type="button" onClick="submitData('<?= $id_session?>')" class="btn btn-info pull-right" style="margin : 4px;">Selesai</button>
										</div>
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
				"searching" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				"pageLength": 50,
				"bPaginate" : false,
				// "aLengthMenu": [100],
				ajax: 
				{
					url: "<?=base_url()?>survei/ax_data_survei_isi_nilai_responden/<?= $id_session?>",
					type: 'POST'
				},
				columns: 
				[
					/* {
						data: "id_survei_detail", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<a onclick="ViewData(' + full['id_cek'] + ','+ data +')"><button type="button" class="btn btn-default dropdown-toggle fa fa-pencil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  Isi Skor</button></a>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewData(' + full['id_cek'] + ','+ data +')"><i class="fa fa-pencil"></i> Skors</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					}, */
					/* { data: "critical", render: function(data, type, full, meta){
							if(data == 1)
								return '<span class="label label-danger">Critical</span>';
							else return '<span class="label label-success">Not Critical</span>';
						}
					}, */
					
					{ data: "id_cek" },

					{ data: "nm_cek" },
					// { data: "nm_nilai_cek", class:".hidden-xs-down" },
					{ data: "nm_skors" },
					{ data: "id_survei_detail", render: function(data, type, full, meta){
						if(full['skors'] == 1 ){var cek = 'checked';}else{ var cek = '';}
							return '<center><input type="radio" name="radio('+ data +')" id="radio('+ data +')" value="1" '+cek+' onclick="ViewData(' + full['id_cek'] + ','+ data +','+ 1 +')"/></center>';
						}
					},
					{ data: "id_survei_detail", render: function(data, type, full, meta){
						if(full['skors'] == 2 ){var cek = 'checked';}else{ var cek = '';}
							return '<center><input type="radio" name="radio('+ data +')" id="radio('+ data +')" value="2" '+cek+' onclick="ViewData(' + full['id_cek'] + ','+ data +','+ 2 +')"/></center>';
						}
					},
					{ data: "id_survei_detail", render: function(data, type, full, meta){
						if(full['skors'] == 3 ){var cek = 'checked';}else{ var cek = '';}
							return '<center><input type="radio" name="radio('+ data +')" id="radio('+ data +')" value="3" '+cek+' onclick="ViewData(' + full['id_cek'] + ','+ data +','+ 3 +')"/></center>';
						}
					},
					{ data: "id_survei_detail", render: function(data, type, full, meta){
						if(full['skors'] == 4 ){var cek = 'checked';}else{ var cek = '';}
							return '<center><input type="radio" name="radio('+ data +')" id="radio('+ data +')" value="4" '+cek+' onclick="ViewData(' + full['id_cek'] + ','+ data +','+ 4 +')"/></center>';
						}
					},
					{ data: "id_survei_detail", render: function(data, type, full, meta){
						if(full['skors'] == 5 ){var cek = 'checked';}else{ var cek = '';}
							return '<center><input type="radio" name="radio('+ data +')" id="radio('+ data +')" value="5" '+cek+' onclick="ViewData(' + full['id_cek'] + ','+ data +','+ 5 +')"/></center>';
						}
					},
					/* { data: "status", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					} */
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#id_nilai_cek').val() == '')
				{
					alertify.alert("Warning", "Please fill Nilai.");
				}else if($('#id_survei_detail').val() == '')
				{
					alertify.alert("Warning", "Please fill ID.");
				} 
				else
				{
					var url = '<?=base_url()?>survei/ax_set_data_isi_nilai';
					var data = {
						id_nilai_cek: $('#id_nilai_cek').val(),
						id_survei_detail: $('#id_survei_detail').val(),
						id_session: $('#id_session').val(),
						
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
							// cekTable.ajax.reload();
						}
					});
				}
			});

			function ViewData(id_cek, id_survei_detail, nilai)
			{
					// alert(nilai);
					/* var url = '<?=base_url()?>survei/ax_get_cek_by_id';
					var data = {
						id_cek: id_cek,
						skors: nilai

					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$("#select2-id_nilai_cek-container").html("<option value=''>--Pilih Nilai--</option>");
						$("select#id_nilai_cek").html(data);
						$('#id_survei_detail').val(id_survei_detail),
						
						$('#addModal').modal('show');

					}); */
					var url = '<?=base_url()?>survei/ax_set_data_isi_nilai';
					var data = {
						id_cek: id_cek,
						id_survei_detail: id_survei_detail,
						skors: nilai
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							// alertify.success("Nilai data saved.");
							// $('#addModal').modal('hide');
							cekTable.ajax.reload();
						}
					});
				
			}

			$("#id_nilai_cek").select2({
			    tags: true,
			    dropdownParent: $("#addModal")
			});
			
			function submitData(id_session){
				//alert(id_session);
				// var id_nilai_cek 		= $('#id_nilai_cek').val();
				
				alertify.confirm("Pastikan semua pertanyaan survei terjawab, Submit data Survei SDM?",
				function(){
						
				var url = '<?=base_url()?>survei/cek_isi_survei';
					var data = {
						id_session: id_session
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						// alert(data['count']);
						if(data['status'] == 'success')
						{
							alertify.success('Ok');
							alertify.alert("Terimakasih Sudah Mengisi Survei dari SDM Perum DAMRI.", function(data){window.location.href = '<?=base_url()?>welcome/logout'});
							  
						} else{
							alertify.alert(data['status']);
						}
					});
				});
				}
			
			$(document).ready(function(){
				setTimeout(function(){
				cekTable.ajax.reload();	
				},1000);
				
			});
			</script>
	</body>
</html>
