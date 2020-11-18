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
			<?php
			if($this->session->flashdata('msg')==TRUE):
				echo '<div class="alert alert-success" role="alert">';
				echo $this->session->flashdata('msg');
				echo '</div>';
			endif;
			?>
			<section class="content-header">
				<h1>RKAP</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

								<button class="btn btn-primary" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add Data
								</button>


							</div>
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">List Data</a></li>
									<li class="disabled"><a href="#tab_2" >Input</a></li>
								</ul>
								<form action="#" id="form" role="form">
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">
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
													<table class="table table-striped table-bordered table-hover" id="rkapTable">
														<thead>
															<tr>
																<th width="150px">Options</th>
																<th>Tahun</th>
																<th>Segmen</th>
																<th>Nama Akun</th>
																<th>RKAP Tahun sebelumnya</th>
																<th>Realiasai Tahun sebelumnya</th>
																<th>Eksisting</th>
																<th>Koreksi</th>
																<th>Investasi</th>
																<th>RKAP</th>
																<th>Nilai</th>
																<th>Januari</th>
																<th>Februari</th>
																<th>Maret</th>
																<th>April</th>
																<th>Mei</th>
																<th>Juni</th>
																<th>Juli</th>
																<th>Agustus</th>
																<th>September</th>
																<th>Oktober</th>
																<th>Nopember</th>
																<th>Desember</th>
															</tr>
														</thead>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab_2">
											
											<div class="modal-content">
												<div class="modal-header">

													<h4 class="Form-add-bu" id="addModalLabel">Form Add RKAP</h4>
												</div>
												<div class="modal-body">

													<div class="row">
														<div class="form-group col-lg-6">
															<label>Tahun</label>
															<input type="hidden" id="id_rkap" name="id_rkap" class="form-control" readonly>
															<input type="text" id="tahun" name="tahun" class="form-control justnumber" placeholder="Tahun">
														</div>

														<div class="form-group col-lg-6">
															<label>Segment</label>
															<select class="form-control select2" style="width: 100%;" id="id_segment" name="id_segment">
																<option value="0">--Segment--</option>
																<?php
																foreach ($combobox_segment->result() as $rowmenu) {
																	?>
																	<option value="<?= $rowmenu->id_segment?>"  ><?= $rowmenu->nm_segment?></option>
																	a					<?php
																}
																?>
															</select>
														</div>

														<div class="form-group col-lg-6">
															<label>COA</label>
															<select class="form-control select2 " style="width: 100%;" id="id_coa" name="id_coa">
																<option value="0">--COA--</option>
																<?php
																foreach ($combobox_akun->result() as $rowmenu) {
																	?>
																	<option value="<?= $rowmenu->id_coa?>"><?= $rowmenu->id_coa?>  - <?= $rowmenu->nm_coa?></option>
																	<?php
																}
																?>
															</select>
														</div>

														<div class="form-group col-lg-6">
															<label>Satuan </label>
															<input type="text" id="satuan" name="satuan" class="form-control justnumber" placeholder="Satuan" readonly>
														</div>

														<div class="form-group col-lg-6">
															<label>RKAP <span id="tahunlalu_rkap"></span></label>
															<input type="text" id="rkapmintahun" name="rkapmintahun" class="form-control justnumber" placeholder="RKAP">
														</div>

														<div class="form-group col-lg-6">
															<label>Realisasi <span id="tahunlalu_real"></span></label>
															<input type="text" id="realisasimintahun" name="realisasimintahun" class="form-control justnumber" placeholder="Realisasi">
														</div>

														<div class="form-group col-lg-6">
															<label>Eksisting <span id="tahun_eksisting"></span></label>
															<input type="text" id="eksistingtahun" name="eksistingtahun" class="form-control justnumber" placeholder="Eksisting">
														</div>

														<div class="form-group col-lg-6">
															<label>Koreksi <span id="tahun_koreksi"></span></label>
															<input type="text" id="koreksitahun" name="koreksitahun" class="form-control justnumber" placeholder="Koreksi">
														</div>

														<div class="form-group col-lg-6">
															<label>Investasi <span id="tahun_investasi"></span></label>
															<input type="text" id="investasitahun" name="investasitahun" class="form-control justnumber" placeholder="Investasi">
														</div>

														<div class="form-group col-lg-6">
															<label>RKAP <span id="tahun_rkap"></span></label>
															<input type="text" id="rkaptahun" name="rkaptahun" class="form-control justnumber" placeholder="RKAP">
														</div>
														<div class="form-group col-lg-6">
															<label>Januari <span id="januari"></span></label>
															<input type="text" id="jan" name="jan" class="form-control" placeholder="Januari">
														</div>
														<div class="form-group col-lg-6">
															<label>Februari <span id="februari"></span></label>
															<input type="text" id="feb" name="feb" class="form-control" placeholder="Februari">
														</div>
														<div class="form-group col-lg-6">
															<label>Maret <span id="maret"></span></label>
															<input type="text" id="mar" name="mar" class="form-control" placeholder="Maret">
														</div>
														<div class="form-group col-lg-6">
															<label>April <span id="april"></span></label>
															<input type="text" id="apr" name="apr" class="form-control" placeholder="April">
														</div>
														<div class="form-group col-lg-6">
															<label>Mei <span id="meii"></span></label>
															<input type="text" id="mei" name="mei" class="form-control" placeholder="Mei">
														</div>
														<div class="form-group col-lg-6">
															<label>Juni <span id="juni"></span></label>
															<input type="text" id="jun" name="jun" class="form-control" placeholder="Juni">
														</div>
														<div class="form-group col-lg-6">
															<label>Juli <span id="juli"></span></label>
															<input type="text" id="jul" name="jul" class="form-control" placeholder="Juli">
														</div>
														<div class="form-group col-lg-6">
															<label>Agustus <span id="agustus"></span></label>
															<input type="text" id="aug" name="aug" class="form-control" placeholder="Agustus">
														</div>
														<div class="form-group col-lg-6">
															<label>September <span id="september"></span></label>
															<input type="text" id="sep" name="sep" class="form-control" placeholder="September">
														</div>
														<div class="form-group col-lg-6">
															<label>Oktober <span id="oktober"></span></label>
															<input type="text" id="okt" name="okt" class="form-control" placeholder="Oktober">
														</div>
														<div class="form-group col-lg-6">
															<label>Nopember <span id="november"></span></label>
															<input type="text" id="nov" name="nov" class="form-control" placeholder="Nopember">
														</div>
														<div class="form-group col-lg-6">
															<label>Desember <span id="desember"></span></label>
															<input type="text" id="des" name="des" class="form-control" placeholder="Desember">
														</div>
														<div class="form-group col-lg-6">
															<label>Nilai</label>
															<input type="text" id="nilai" name="nilai" class="form-control" placeholder="Nilai pada bulan yang dipilih">
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
	<style>
	.ui-datepicker-calendar { display: none; }
</style>
<?= $this->load->view('basic_js'); ?>
<script type='text/javascript'>
	var rkapTable = $('#rkapTable').DataTable({
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
						url: "<?= base_url()?>rkap/ax_data_rkap/",
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
						data: "id_rkap", render: function(data, type, full, meta){
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
					{ class:'intro', data: "nm_coa" },
					{ class:'intro', data: "rkapmintahun" },
					{ class:'intro', data: "realisasimintahun" },
					{ class:'intro', data: "eksistingtahun" },
					{ class:'intro', data: "koreksitahun" },
					{ class:'intro', data: "investasitahun" },
					{ class:'intro', data: "rkaptahun" },
					{ class:'intro', data: "nilai" },
					{ class:'intro', data: "jan" },
					{ class:'intro', data: "feb" },
					{ class:'intro', data: "mar" },
					{ class:'intro', data: "apr" },
					{ class:'intro', data: "mei" },
					{ class:'intro', data: "jun" },
					{ class:'intro', data: "jul" },
					{ class:'intro', data: "aug" },
					{ class:'intro', data: "sep" },
					{ class:'intro', data: "okt" },
					{ class:'intro', data: "nov" },
					{ class:'intro', data: "des" }



					]
				});


	$('#btnSave').on('click', function () {
		var idbu = $("#id_bu_filter").val();
		if($('#tahun').val() == 0)
		{
			alertify.alert("Warning", "Data Tahun Belum di isi.");
			return false;
		}
		if($('#realisasimintahun').val() == '')
		{
			alertify.alert("Warning", "Data Realisasi lalu Belum di isi.");
			return false;
		}
		if($('#rkapmintahun').val() == '')
		{
			alertify.alert("Warning", "Data RKAP lalu Belum di isi.");
			return false;
		}
		if($('#eksistingtahun').val() == '')
		{
			alertify.alert("Warning", "Data Eksisting Belum di isi.");
			return false;
		}
		if($('#investasitahun').val() == '')
		{
			alertify.alert("Warning", "Data Investasi Belum di isi.");
			return false;
		}
		if($('#koreksitahun').val() == '')
		{
			alertify.alert("Warning", "Data Koreksi Belum di isi.");
			return false;
		}
		if($('#rkaptahun').val() == '')
		{
			alertify.alert("Warning", "Data RKAP Belum di isi.");
			return false;
		}
		if($('[name="id_segment"]').val() == 0)
		{
			alertify.alert("Warning", "Segment Belum di Pilih");
			return false;
		}
		if($('#id_coa').val() == null)
		{
			alertify.alert("Warning", "Nama Coa Belum di Pilih");
			return false;
		}

		var url = '<?=base_url()?>rkap/ax_set_data';
		var data_save = $('#form').serialize();

		$.ajax({
			url: url,
			method: 'POST',
			data: data_save,
			statusCode: {
				500: function() {
					alertify.alert("Warning","Data Tidak tersimpan");
				}}
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				if(data['status'] == "success")
				{
					alertify.success("Data Disimpan.");
					$('.nav-tabs a[href="#tab_1"]').tab('show');
					rkapTable.ajax.reload();
				}else{
					alertify.alert("Data Gagal Disimpan.");
				}
			});

		});

	function kembali(){
		$('.nav-tabs a[href="#tab_1"]').tab('show');
		rkapTable.ajax.reload();
	}

	function ViewData(id_rkap)
	{
		var id_cabang = $("#id_bu_filter").val();
		if(id_rkap == 0)
		{
			$('#addModalLabel').html('Form Add Data');
			$("#id_segment").val('').trigger('change');
			$("#id_coa").val('').trigger('change');
			$('#tahun').val(0);
			$('#id_segment').val(0);
			$('#rkapmintahun').val(0);
			$('#realisasimintahun').val(0);
			$('#eksistingtahun').val(0);
			$('#koreksitahun').val(0);
			$('#investasitahun').val(0);
			$('#rkaptahun').val(0);
			$('#nilai').val(0);
			$('#jan').val(0);
			$('#feb').val(0);
			$('#mar').val(0);
			$('#apr').val(0);
			$('#mei').val(0);
			$('#jun').val(0);
			$('#jul').val(0);
			$('#aug').val(0);
			$('#sep').val(0);
			$('#okt').val(0);
			$('#nov').val(0);
			$('#des').val(0);
			$('#select2-id_segment-container').html('--Segment--');
			$('#select2-id_coa-container').html('--COA--');
			$('.nav-tabs a[href="#tab_2"]').tab('show');
		}
		else
		{
			var url = '<?=base_url()?>rkap/ax_get_data_by_id';
			var data = {
				id_rkap: id_rkap
			};

			$.ajax({
				url: url,
				method: 'POST',
				data: data
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				$('#addModalLabel').html('Form Edit Data');
				$("#id_segment").val(data['id_segment']).trigger('change');
				$("#id_coa").val(data['id_coa']).trigger('change');
				$('#id_rkap').val(data['id_rkap']);
				$('#tahun').val(data['tahun']);
				$('#id_segment').val(data['id_segment']);
				$('#rkapmintahun').val(data['rkapmintahun']);
				$('#realisasimintahun').val(data['realisasimintahun']);
				$('#eksistingtahun').val(data['eksistingtahun']);
				$('#koreksitahun').val(data['koreksitahun']);
				$('#investasitahun').val(data['investasitahun']);
				$('#rkaptahun').val(data['rkaptahun']);
				$('#nilai').val(data['nilai']);

				$('#jan').val(data['jan']);
				$('#feb').val(data['feb']);
				$('#mar').val(data['mar']);
				$('#apr').val(data['apr']);
				$('#mei').val(data['mei']);
				$('#jun').val(data['jun']);
				$('#jul').val(data['jul']);
				$('#aug').val(data['aug']);
				$('#sep').val(data['sep']);
				$('#okt').val(data['okt']);
				$('#nov').val(data['nov']);
				$('#des').val(data['des']);
				$('.nav-tabs a[href="#tab_2"]').tab('show');
			});
		}
	}



	function DeleteData(id_rkap)
	{
		alertify.confirm(
			'Confirmation', 
			'Are you sure you want to delete this data?', 
			function(){
				var url = '<?=base_url()?>rkap/ax_unset_data';
				var data = {
					id_rkap: id_rkap
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					rkapTable.ajax.reload();
					alertify.error('Data Dihapus.');
				});
			},
			function(){ }
			);
	}



	$(document).ready(function() {


		$('#tahun').datepicker({
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'yy',
			onClose: function(dateText, inst) { 
				var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
				$(this).datepicker('setDate', new Date(year, 1));
				document.getElementById("tahun_eksisting").innerHTML = year;
				document.getElementById("tahun_investasi").innerHTML = year;
				document.getElementById("tahun_koreksi").innerHTML = year;
				document.getElementById("tahun_rkap").innerHTML = year;
				document.getElementById("tahunlalu_real").innerHTML = year - 1;
				document.getElementById("tahunlalu_rkap").innerHTML = year - 1;

			}
		});
		$("#tahun").focus(function () {
			$(".ui-datepicker-month").hide();
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
		rkapTable.ajax.reload();
	});

	$("#id_coa").on("change", function(){
		var v = $(this).val();
		var baseUrl = '<?=base_url()?>rkap/ax_get_satuan/'+v;
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			success: function(datas){
				$.map(datas, function (obj) {
					$("#satuan").val(obj.satuan);

				});
			},
			error: function (xhr, ajaxOptions, thrownError) {
						//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator ");
					}
				});
	});

</script>
</body>
</html>
