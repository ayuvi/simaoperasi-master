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
								<!-- <button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add Segment
								</button> -->
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Segment</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_komponen_akses" name="id_komponen_akses" value='' />

												<div class="form-group">
													<label>Nama Komponen</label>
													<input type="text" id="nm_komponen" name="nm_komponen" class="form-control" placeholder="Nama Komponen" readonly="readonly">
												</div>

												<div class="form-group">
													<label>Harga</label>
													<input type="number" id="harga" name="harga" class="form-control" placeholder="Harga">
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
								<div class="form-group">
									<label>Cabang</label>
									<select class="form-control select2 " style="width: 100%;" id="id_bu_filter" name="id_bu_filter">
										<?php
										foreach ($combobox_bu->result() as $rowmenu) {
										?>
										<option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
										<?php
									}
									?>
								</select>
							</div>
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="buTable">
									<thead>
										<tr>
											<th>Options</th>
											<th>#</th>
											<th>Nama</th>
											<th>Ket</th>
											<th>Harga</th>
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
			url: "<?= base_url()?>komponen_akses/ax_data_komponen_akses_bu/",
			type: 'POST',
			data: function ( d ) {
				return $.extend({}, d, { 
					"id_bu": $("#id_bu_filter").val()
				});
			}
		},
		columns: 
		[
		{
			data: "id_komponen_akses", render: function(data, type, full, meta){
				var str = '';
				str += '<div class="btn-group">';
				str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
				str += '<ul class="dropdown-menu">';
				str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
				str += '</ul>';
				str += '</div>';
				return str;
			}
		},
		{
			data: "id_komponen_akses",
			render: function(data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
		},
		{ data: "nm_komponen" },
		{ data: "keterangan" },
		{ data: "harga", render: $.fn.dataTable.render.number( '.', ',',2 ) },
		{ data: "type_komponen" },
		{ data: "active", render: function(data, type, full, meta){
			if(data == 1)
				return "<span class='label label-success'>Active</span>";
			else return "<span class='label label-warning'>Not Active</span>";
		}
	}
	]
});

	$('#btnSave').on('click', function () {
		if($('#nm_segment').val() == '')
		{
			alertify.alert("Warning", "Please fill Segment Name.");
		}
		else
		{
			var url = '<?=base_url()?>komponen_akses/ax_set_data_komponen_akses_bu';
			var data = {
				id_komponen_akses: $('#id_komponen_akses').val(),
				harga: $('#harga').val()
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

	function ViewData(id_komponen_akses)
	{
		
		var url = '<?=base_url()?>komponen_akses/ax_get_data_by_id_komponen_akses_bu';
		var data = {
			id_komponen_akses: id_komponen_akses
		};

		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			$('#addModalLabel').html('Edit Komponen');
			$('#id_komponen_akses').val(data['id_komponen_akses']);
			$('#nm_komponen').val(data['nm_komponen']);
			$('#harga').val(parseInt(data['harga']));
			$('#addModal').modal('show');
		});
	}

	$('#id_bu_filter').select2({
		'allowClear': true
	}).on("change", function (e) {
		buTable.ajax.reload();
	});
</script>
</body>
</html>
