<!DOCTYPE html>
<html>
<head>
	<?= $this->load->view('head'); ?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
</head>

<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">
	<div class="wrapper">
		<?= $this->load->view('nav'); ?>
		<?= $this->load->view('menu_groups'); ?>
		<div class="content-wrapper">
			<?php
			if($this->session->flashdata('msg')==TRUE):
				echo '<div class="alert alert-success" role="alert">';
				echo $this->session->flashdata('msg');
				echo '</div>';
			endif;
			?>
			<section class="content-header">
				<h1>LPE</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php //if($this->session->userdata('login')['id_level'] == 1 || $this->session->userdata('login')['id_level'] == 6){ ?>
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add Data
									</button>
									<?php //}?>

								</div>
								<div class="nav-tabs-custom">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#tab_1" data-toggle="tab">List Data</a></li>
										<li class="disabled" style="display: none;"><a href="#tab_2">Input</a></li>
									</ul>
									<form action="#" id="form" role="form">
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1">
												<div class="panel-body">

													<div class="row">
														<div class="form-group col-md-5">
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
														<div class="form-group col-md-5">
															<label>Tahun</label>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</div>
																<input type="number" class="form-control pull-right" id="tahun_select" name="tahun_select" placeholder="Tahun">
															</div>
														</div>
														<div class="form-group col-md-2">
															<p style="line-height: 15px">.</p>
															<div class="btn-group">
																<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i>  Print <span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li><a onclick="print_pdf()" id="print_pdf" value="0"><i class="fa fa-print"></i> PDF</a></li>
																	<li><a onclick="print_excell()" id="print_pdf" value="2"><i class="fa fa-print"></i> Excell</a></li>
																</ul>
															</div>
														</div>
													</div>
												</br>
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="lpeTable">
														<thead>
															<tr>
																<th width="150px">Options</th>
																<th>Tahun</th>
																<th>Segmen</th>
																<th>Trayek</th>
																<th>Armada</th>
																<th>HJ</th>
																<th>Rit</th>
																<th>Km</th>
																<th>Jml Penumpang</th>
																<th>Pendapatan</th>
																<th>LF%</th>
															</tr>
														</thead>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab_2">

											<div class="modal-content">
												<div class="modal-header">

													<h4 class="Form-add-bu" id="addModalLabel">Form Add Anggaran LPE</h4>
												</div>
												<div class="modal-body">

													<div class="row">
														<div class="col-lg-6">


															<div class="form-group">
																<label>Tahun</label>
																<input type="hidden" id="id_lpe" name="id_lpe" class="form-control" readonly>
																<input type="text" id="tahun" name="tahun" class="form-control justnumber" placeholder="Tahun">
															</div>
															<div class="form-group">
																<label>Segmen</label>
																<select class="form-control select2" style="width: 100%;" id="id_segment" name="id_segment">
																	<option value="0">--Segment--</option>
																	<?php
																	foreach ($combobox_segment->result() as $rowmenu) {
																		?>
																		<option value="<?= $rowmenu->id_segment?>"  ><?= $rowmenu->nm_segment?></option>
																		<?php
																	}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label>Kode Trayek</label>
																<select class="form-control select2 " style="width: 100%;" id="id_trayek" name="id_trayek">
																	<option value="0">--Trayek--</option>
																</select>
																<input type="hidden" name="harga_trayek" id="harga_trayek">
															</div>
															<div class="form-group">
																<label>Kode Armada</label>
																<select class="form-control select2 " style="width: 100%;" id="id_armada" name="id_armada">
																	<option value="0">--Armada--</option>
																	<?php
																	foreach ($combobox_armada->result() as $rowmenu) {
																		?>
																		<option value="<?= $rowmenu->kd_armada?>"  ><?= $rowmenu->kd_armada?></option>
																		<?php
																	}
																	?>
																</select>
																<input type="hidden" name="seat_armada" id="seat_armada">
																<div class="small"><font color="blue" id="seat_show">* Seat : </font></div>
															</div>
															<div class="form-group">
																<label>HJ</label>
																<input type="text" id="hj" name="hj" class="form-control justnumber" placeholder="Hari Jalan">
															</div>

														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label>RIT</label>
																<input type="text" id="rit" name="rit" class="form-control justnumber" placeholder="Rit / Trip" onblur="sumLF()">
															</div>
															<div class="form-group">
																<label>KM Tempuh</label>
																<input type="text" id="km" name="km" class="form-control justnumber" placeholder="Kilometer Tempuh" readonly>
															</div>
															<div class="form-group">
																<label>Jumlah Penumpang</label>
																<input type="text" id="jml_pnp" name="jml_pnp" class="form-control justnumber" placeholder="Jumlah penumpang" onblur="sumLF()">
															</div>
															<div class="form-group">
																<label>Pendapatan</label>
																<input type="text" id="pendapatan" name="pendapatan" class="form-control justnumber" placeholder="Pendapatan">
															</div>
															<div class="form-group">
																<label>LF%</label>
																<input type="text" id="lf" name="lf" class="form-control justnumber" placeholder="Load Factor %" readonly>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" onclick="kembali();">Kembali</button>
												<button type="button" class="btn btn-primary" id='btnSave'>Save</button>
											</div>
										</div>

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
	<script type='text/javascript'>
		var lpeTable = $('#lpeTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,

			dom: 'Bfrtip',
			lengthMenu: [
			[ 10, 25, 50, 100, 10000 ],
			[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
			],
			buttons: [
					'pageLength', 'copy', 'csv', 'excel', //'pdf', 'print'
					],

					ajax: 
					{
						url: "<?= base_url()?>anggaran_lpe/ax_data_anggaran_lpe/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 

								"id_bu": $("#id_bu_filter").val(),
								"tahun": $("#tahun_select").val()

							});
						}
					},
					columns: 
					[
					{
						data: "id_lpe", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<a type="button" class="btn btn-info" onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i></a>';
							str += '<a type="button" class="btn btn-danger" onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i></a>';
							//str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							//str += '<ul class="dropdown-menu">';
							//str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							//str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							//str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					
					{ class:'intro', data: "tahun" },
					{ class:'intro', data: "nm_segment" },
					{ class:'intro', data: "kd_trayek" },
					{ class:'intro', data: "kd_armada" },
					{ data: "hj", render: $.fn.dataTable.render.number( ',', '.',0 ) },
					{ data: "rit", render: $.fn.dataTable.render.number( ',', '.',0 ) },
					{ data: "km", render: $.fn.dataTable.render.number( ',', '.',0 ) },
					{ data: "jml_pnp", render: $.fn.dataTable.render.number( ',', '.',0 ) },
					{ data: "pendapatan", render: $.fn.dataTable.render.number( ',', '.',0 ) },
					{ class:'intro', data: "lf" },
					
					
					
					]
				});


		$('#btnSave').on('click', function () {
			var idbu = $("#id_bu_filter").val();
			if($('#tahun').val() == '0' || $('#id_segment').val() == '0' || $('#id_trayek').val() == '0' || $('#id_armada').val() == '0' || $('#hj').val() == '' || $('#rit').val() == '' || $('#km').val() == '' || $('#jml_pnp').val() == '' || $('#pendapatan').val() == '')
			{
				alertify.alert("Warning", "Isi Semua Data.. ! Data tidak boleh ada yang kosong");
			}
			else
			{
				var url = '<?=base_url()?>anggaran_lpe/ax_set_data';
				var data_save = $('#form').serialize();


				$.ajax({
					url: url,
					method: 'POST',
					data: data_save,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Duplicate");
						}}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.success("Data Disimpan.");
							$('.nav-tabs a[href="#tab_1"]').tab('show');
							lpeTable.ajax.reload();
						}else{
							alertify.alert("Data Gagal Disimpan.");
						}
					});
				}
			});

		$('#id_armada').on("change", function (e) {
			$.ajax({
				type : "POST",
				dataType : "json",
				data : ({kd_armada:$('#id_armada').val()}),
				url : '<?=base_url()?>anggaran_lpe/ax_get_armada_rinci',
				success : function(data){
					$('#seat_armada').val(data["seat_armada"]);
					$('#seat_show').html('* Seat : '+data["seat_armada"]);
					sumLF();
				}
			});
		});
		$('#id_trayek').on("change", function (e) {
			$.ajax({
				type : "POST",
				dataType : "json",
				data : ({kd_trayek:$('#id_trayek').val()}),
				url : '<?=base_url()?>anggaran_lpe/ax_get_trayek_rinci',
				success : function(data){
					$('#harga_trayek').val(data["harga"]);
					if(data["km_trayek"] != null){
						$('#km').val(data["km_trayek"]);
					}else{
						$('#km').val(0);
					}
				}
			});
		});

		function kembali(){
			$('.nav-tabs a[href="#tab_1"]').tab('show');
			lpeTable.ajax.reload();
		}

		function ViewData(id_lpe)
		{
			var id_cabang = $("#id_bu_filter").val();
			if(id_lpe == 0)
			{
				combo_trayek(id_cabang);
				combo_armada(id_cabang);
				$('#addModalLabel').html('Form Add Data');
				$('#select2-id_tahun-container').html('--Tahun--');
				$('#select2-id_segment-container').html('--Segment--');
				$('#select2-id_trayek-container').html('--Trayek--');
				$('#select2-id_armada-container').html('--Armada--');
				$('#tahun').val(0);
				$('#id_segment').val(0);
				$('#id_trayek').val(0);
				$('#id_armada').val(0);
				$('#hj').val(0);
				$('#rit').val(0);
				$('#km').val(0);
				$('#seat_armada').val(0);
				$('#seat_show').html('* Seat : ');
				$('#jml_pnp').val(0);
				$('#pendapatan').val(0);
				$('#lf').val(0);
				$('.nav-tabs a[href="#tab_2"]').tab('show');
			}
			else
			{
				var url = '<?=base_url()?>anggaran_lpe/ax_get_data_by_id';
				var data = {
					id_lpe: id_lpe
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					combo_trayek(id_cabang);
					combo_armada(id_cabang);
					$('#addModalLabel').html('Form Edit Data');
					$('#select2-id_tahun-container').html(data['tahun']);
					$('#select2-id_segment-container').html(data['kd_segment']);
					$('#select2-id_trayek-container').html(data['kd_trayek']);
					$('#select2-id_armada-container').html(data['kd_armada']);
					$('#id_lpe').val(data['id_lpe']);
					$('#tahun').val(data['tahun']);
					$('#id_segment').val(data['kd_segment']).trigger('change');
					$('#id_trayek').val(data['kd_trayek']).trigger('change');
					$('#id_armada').val(data['kd_armada']).trigger('change');
					// $('#id_trayek').val(data['kd_trayek']);
					// $('#id_armada').val(data['kd_armada']);
					$('#hj').val(data['hj']);
					$('#rit').val(data['rit']);
					$('#km').val(data['km']);
					$('#jml_pnp').val(data['jml_pnp']);
					$('#pendapatan').val(data['pendapatan']);
					$('#lf').val(data['lf']);
					$('.nav-tabs a[href="#tab_2"]').tab('show');
				});
			}
		}

		function DeleteData(id_lpe)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>anggaran_lpe/ax_unset_data';
					var data = {
						id_lpe: id_lpe
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						lpeTable.ajax.reload();
						alertify.error('Data Dihapus.');
					});
				},
				function(){ }
				);
		}

		function combo_trayek(id_cabang){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>anggaran_lpe/ax_get_trayek", 
				data: {
					id_cabang : id_cabang,
				},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 
					$("#id_trayek").html(response.data_trayek).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { 
					alert(thrownError); 
				}
			});
		}

		function combo_armada(id_cabang){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>anggaran_lpe/ax_get_armada", 
				data: {
					id_cabang : id_cabang,
				},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 
					$("#id_armada").html(response.data_armada).show();
					$('#select2-id_armada-container').html(kd_armada);
					$('#id_armada').val(kd_trayek);

					$("#id_armada_hr").html(response.data_armada).show();
					$('#select2-id_armada_hr-container').html(kd_armada);
					$('#id_armada_hr').val(kd_armada);

				},
				error: function (xhr, ajaxOptions, thrownError) { 
					alert(thrownError); 
				}
			});
		}

		function sumLF(){
			var jml_pnp = $("#jml_pnp").val();
			var rit = $("#rit").val();
			var seat = $("#seat_armada").val();

			var LF = (jml_pnp/rit/seat)*100/100;
			$("#lf").val(LF.toFixed(2));
		}

	// function pendapatan(){
	// 	var jml_pnp = $("#jml_pnp").val();
	// 	var harga_trayek = $("#harga_trayek").val();
	// 	var pendapatan = jml_pnp*harga_trayek;
	// 	$("#pendapatan").val(pendapatan);
	// }

	function print_pdf() {
		id_bu = $("#id_bu_filter").val();
		var tahun = $("#tahun_select").val();
		var format = 0;
		if (id_bu != '0' && tahun != '') {
			window.open("<?=site_url()?>anggaran_lpe/laporan_anggaran_lpe/"+id_bu+"/"+tahun+"/"+format);
		}else{
			alertify.alert("Warning","Silahkan pilih cabang dan isi tanggal terlebih dahulu");
		}
	}

	function print_excell() {
		id_bu = $("#id_bu_filter").val();
		var tahun = $("#tahun_select").val();
		var format = 2;
		if (id_bu != '0' && tahun != '') {
			window.open("<?=site_url()?>anggaran_lpe/laporan_anggaran_lpe/"+id_bu+"/"+tahun+"/"+format);
		}else{
			alertify.alert("Warning","Silahkan pilih cabang dan isi tanggal terlebih dahulu");
		}
	}

	$(document).ready(function() {

				// $('#tahun').datepicker({
				// 	changeYear: true,
				// 	showButtonPanel: true,
				// 	dateFormat: 'yy',
				// 	onClose: function(dateText, inst) { 
				// 		var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
				// 		$(this).datepicker('setDate', new Date(year, 1));
				// 	}
				// });

				// $("#tahun").focus(function () {
				// 	$(".ui-datepicker-month").hide();
				// });

				$('#tahun').datepicker({
					minViewMode: 'years',
					autoclose: true,
					format: 'yyyy',
					orientation: "bottom auto"
				}); 

				$('#tahun_select').datepicker({
					minViewMode: 'years',
					autoclose: true,
					format: 'yyyy',
					orientation: "bottom auto"
				});  


				$(".justnumber").keydown(function (e) {
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||

						(e.keyCode == 65 && e.ctrlKey === true) ||

						(e.keyCode == 67 && e.ctrlKey === true) ||

						(e.keyCode == 88 && e.ctrlKey === true) ||

						(e.keyCode >= 35 && e.keyCode <= 39)) {

						return;
				}

				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});
				

			});

	$('#id_bu_filter').select2({
		'allowClear': true
	}).on("change", function (e) {
		lpeTable.ajax.reload();
	});

	$( "#tahun_select" ).on("change", function (e) {
		lpeTable.ajax.reload();
	});

</script>
</body>
</html>
