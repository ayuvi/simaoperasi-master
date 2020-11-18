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
				<h1>Laporan Harian Operasional (LHO)</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<!-- <button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add LHO
								</button> -->
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add LHO</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_lho" name="id_lho" value='' />


												<div class="form-group">
													<label>Kode</label>
													<input type="text" id="kd_lho" name="kd_lho" class="form-control" placeholder="Kode">
												</div>

												<div class="form-group">
													<label>Name</label>
													<input type="text" id="nm_lho" name="nm_lho" class="form-control" placeholder="Name">
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
									<div class="form-group col-lg-3">
										<label>Cabang</label>
										<select class="form-control select2 " style="width: 100%;" id="id_cabang" name="id_cabang">
											<option value="0">--Cabang--</option>
											<?php
											foreach ($combobox_bu->result() as $rowmenu) {
												?>
												<option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
												<?php
											}
											?>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Trayek</label>
										<select class="form-control select2" style="width: 100%;" id="kd_trayek">
											<option value="0"> -- Trayek -- </option>

										</select>
									</div>
									<div class="form-group col-lg-3">
										<label>Tanggal</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
										</div>
									</div>
									<div class="form-group col-lg-1">
										<p style="line-height: 15px">.</p>
										<div class="btn-group">
											<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i>  Print <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a onclick="print_pdf()" id="print_pdf" value="0"><i class="fa fa-print"></i> PDF</a></li>
												<li><a onclick="print_excell()" id="print_excell" value="2"><i class="fa fa-print"></i> Excell</a></li>
											</ul>
										</div>
									</div>
								</div>
							</br>
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="buTable">
									<thead>
										<tr>
											<th>Trayek</th>
											<th>RIT</th>
											<th>Penumpang</th>
											<th>Harga</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
									<tfoot>
										<tr>
											<th>TOTAL</th>
											<th></th>
											<th></th>
											<th></th>
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
			url: "<?= base_url()?>lho/ax_data_lho/",
			type: 'POST',
			data: function ( d ) {
				return $.extend({}, d, { 	
					"id_cabang"	: $("#id_cabang").val(),
					"kd_trayek"	: $("#kd_trayek").val(),
					"tanggal"	: $("#tanggal").val()
				});
			}
		},

		columns: 
		[	
		{ data: "nm_point_awal" },
		{ data: "jumlah_rit" },
		{ data: "penumpang", render: $.fn.dataTable.render.number( ',', '.',0 ) },
		{ data: "harga", render: $.fn.dataTable.render.number( ',', '.',0 ) },
		{ data: "total_pendapatan", render: $.fn.dataTable.render.number( ',', '.',0 ) }

		],
		
		"footerCallback": function ( row, data, start, end, display ) {
			var api = this.api(), data;
			var intVal = function ( i ) {
				return typeof i === 'string' ?
				i.replace(/[\$,]/g, '')*1 :
				typeof i === 'number' ?
				i : 0;
			};

			var penumpang = api
			.column( 2 )
			.data()
			.reduce( function (a, b) {
				return intVal(a) + intVal(b);
			}, 0 );
			var total = api
			.column( 4 )
			.data()
			.reduce( function (a, b) {
				return intVal(a) + intVal(b);
			}, 0 );

            // Update footer by showing the total with the reference of the column index 
            $( api.column( 2 ).footer() ).html('<font color="blue">'+formatNumber(penumpang)+'</font>');
            $( api.column( 4 ).footer() ).html('<font color="blue">Rp. '+formatNumber(total)+'</font>');
        }
    });

	$('#btnSave').on('click', function () {
		if($('#nm_lho').val() == '')
		{
			alertify.alert("Warning", "Please fill LHO Name.");
		}
		else
		{
			var url = '<?=base_url()?>lho/ax_set_data';
			var data = {
				id_lho: $('#id_lho').val(),
				kd_lho: $('#kd_lho').val(),
				nm_lho: $('#nm_lho').val(),

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

	function ViewData(id_lho)
	{
		if(id_lho == 0)
		{
			$('#addModalLabel').html('Add LHO');
			$('#id_lho').val('');
			$('#kd_lho').val('');
			$('#nm_lho').val('');
			$('#active').val('1');
			$('#addModal').modal('show');
		}
		else
		{
			var url = '<?=base_url()?>lho/ax_get_data_by_id';
			var data = {
				id_lho: id_lho
			};

			$.ajax({
				url: url,
				method: 'POST',
				data: data
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				$('#addModalLabel').html('Edit lho');
				$('#id_lho').val(data['id_lho']);
				$('#kd_lho').val(data['kd_lho']);
				$('#nm_lho').val(data['nm_lho']);
				$('#select2-id_kota-container').html(data['nm_kota']);
				$('#id_kota').val(data['id_kota']);
				$('#active').val(data['active']);
				$('#addModal').modal('show');
			});
		}
	}

	function DeleteData(id_lho)
	{
		alertify.confirm(
			'Confirmation', 
			'Are you sure you want to delete this data?', 
			function(){
				var url = '<?=base_url()?>lho/ax_unset_data';
				var data = {
					id_lho: id_lho
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

	function combo_trayek(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>lho/ax_get_trayek", 
			data: {
				id_cabang : $('#id_cabang').val(),
			},
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				$("#kd_trayek").html(response.data_trayek).show();
				$('#select2-kd_trayek-container').html('--Trayek--');
				$('#kd_trayek').val('0');
			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}

	$('#id_cabang').select2({
		'placeholder': "Cabang",
		'allowClear': true
	}).on("change", function (e) {
		buTable.ajax.reload();
		combo_trayek();
	});

	$('#kd_trayek').select2({
		'placeholder': "Trayek",
		'allowClear': true
	}).on("change", function (e) {
		buTable.ajax.reload();
	});

	$( "#tanggal").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "yy-mm-dd"
	});

	$( "#tanggal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
	$( "#tanggal" ).on("change", function (e) {
		buTable.ajax.reload();
	});

	function formatNumber(num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
	}

	function print_pdf() {
		var id_cabang = $("#id_cabang").val();
		var kd_trayek = $("#kd_trayek").val();
		var tanggal = $("#tanggal").val();
		var format = 0;
		if (id_cabang != '0' && tanggal != '') {
			window.open("<?=site_url()?>lho/laporan_lho/"+id_cabang+"/"+kd_trayek+"/"+tanggal+"/"+format);
		}else{
			alertify.alert("Warning","Silahkan pilih cabang dan trayer serta isi tanggal terlebih dahulu");
		}
	}

	function print_excell() {
		var id_cabang = $("#id_cabang").val();
		var kd_trayek = $("#kd_trayek").val();
		var tanggal = $("#tanggal").val();
		var format = 2;
		if (id_cabang != '0' && tanggal != '') {
			window.open("<?=site_url()?>lho/laporan_lho/"+id_cabang+"/"+kd_trayek+"/"+tanggal+"/"+format);
		}else{
			alertify.alert("Warning","Silahkan pilih cabang dan trayer serta isi tanggal terlebih dahulu");
		}
	}

</script>
</body>
</html>
