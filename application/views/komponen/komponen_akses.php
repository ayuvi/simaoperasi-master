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
				<h1>Komponen Akses</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="buTable">
										<thead>
											<tr>
												<th width="50px">Options</th>
												<th>Cabang</th>
												<th>Kota</th>
												<th>Active</th>
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


	<div class="row" >
		<div class="col-lg-12">
			<div class="modal fade" id="modalKomponen" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<div class="form-inline">
								<h4 id="addModalLabel">List</h4>
							</div>
							<input type="hidden" id="id_bu_modal" name="id_bu_modal" class="form-control">
						</div>
						<div class="modal-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataKomponenTable">
									<thead>
										<tr>
											<th>Action</th>
											<th>Nama</th>
											<th>Type</th>
											<th>Active</th>
											<th>Cdate</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?= $this->load->view('basic_js'); ?>
	<script type='text/javascript'>
		var nomor2=0;

		var buTable = $('#buTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>komponen_akses/ax_data_cabang/",
				type: 'POST'				
			},
			columns: 
			[
			{
				data: "id_bu", render: function(data, type, full, meta){
					return str = '<button class="btn btn-sm btn-info btn.flat" title="View Data" onclick="ViewData(' + data + ')"><i class="fa fa-list"></i></button>';
				}
			},
			{ data: "nm_bu" },
			{ data: "kota" },
			{ data: "active", render: function(data, type, full, meta){
				if(data==1){
					return 'Active';
				}else{	
					return 'Not Active';
				}
			} }
			]
		});


		var dataKomponenTable = $('#dataKomponenTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>komponen_akses/ax_data_komponen_akses/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 
						"id_bu": $("#id_bu_modal").val(),
					});
				}
			},
			columns: 
			[
			{
				data: "id_komponen_akses", render: function(data, type, full, meta){

					if(full['active']==1){
						str = '<a type="button" class="btn btn-sm btn-success" onClick="changeActive(' + data + ','+full['active']+')"><i class="fa fa-check"></i> </a>';
					}else{
						str = '<a type="button" class="btn btn-sm btn-warning" onClick="changeActive(' + data + ','+full['active']+')"><i class="fa fa-sign-out"></i> </a>';
					}
					return str;
				}
			},
			{ data: "nm_komponen" },
			{ data: "type_komponen" },
			{ data: "active", render: function(data, type, full, meta){
				if(data==1){
					return 'Active';
				}else{	
					return 'Not Active';
				}
			} },
			{ data: "cdate" }
			]
		});

		function ViewData(id_bu){
			nomor2=0;
			get_nama_bu(id_bu);
			$('#id_bu_modal').val(id_bu);
			$('#modalKomponen').modal('show');
			dataKomponenTable.ajax.reload();
			setTimeout(function(){ dataKomponenTable.columns.adjust().draw(); }, 1000);
		}

		function get_nama_bu(id_bu) {
			$.ajax({
				url: '<?=base_url()?>komponen_akses/ax_get_data_by_id',
				method: 'POST',
				data: {id_bu : id_bu}
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				$('#addModalLabel').html('List Komponen Cabang <font color="blue">'+data['nm_bu']+'</font>');
			});
		}

		function changeActive(id, active){
			alertify.confirm(
				'Confirmation', 
				'Apakah anda yakin ingin ubah status data Ini?', 
				function(){
					var url = '<?=base_url()?>komponen_akses/ax_change_active';
					var data = {
						id_komponen_akses: id,
						active : active
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data,
						statusCode: {
							500: function() {
								alertify.alert("Warning","Data Tidak Berhasil di Setting");
							}
						}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);

						if(data['status']==true)
						{
							alertify.success("Data Berhasil di Ubah Statusnya");
							dataKomponenTable.ajax.reload();
							buTable.ajax.reload();
							nomor2=0;
						}else{
							alertify.alert("Warning","Data Penumpang dan Biaya tidak Boleh Kosong");
						}
					});
				},
				function(){ }
				);
		}
		
	</script>
</body>
</html>
