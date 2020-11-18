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
				<h3><font color="blue"><b>APLIKASI ANGGARAN DAMRI</b></font> Cabang <?php echo $nm_bu;?></h3>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
							</div>
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">List Data</a></li>
								</ul>
								<form action="#" id="form" role="form">
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">
											<div class="panel-body">
												<div class="row">
													<div class="form-group col-md-4">
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
													<div class="form-group col-md-4">
														<label>Segment</label>
														<select class="form-control select2 " style="width: 100%;" id="id_segment_filter" name="id_segment_filter">
															<option value="0">--Segment--</option>
															<?php foreach ($combobox_segment->result() as $rowmenu) { ?>
															<option value="<?= $rowmenu->id_segment?>"><?= $rowmenu->nm_segment?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group col-md-4">
														<label>Sub Segment</label>
														<select class="form-control select2 " style="width: 100%;" id="id_coa_filter" name="id_coa_filter">
															<option value="0">--Sub Segment--</option>
															<?php
															foreach ($combobox_akun->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_coa?>"><?= $rowmenu->id_coa?>  - <?= $rowmenu->nm_coa?></option>
																<?php
															}
															?>
														</select>
													</div>
												</div>
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="rkapTable">
														<thead>
															<tr>
																<th>No</th>
																<th>Tahun</th>
																<th>Segmen</th>
																<th>Akun</th>
																<th>RKAP</th>
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
	var nomor = 0;

	function reset_nomor() {
		nomor = 0;
	}
	var rkapTable = $('#rkapTable').DataTable({
		"bPaginate": false,
		"ordering" : false,
		"scrollX": 	 true,
		// "processing": true,
		// "serverSide": true,
		dom: 'Bfrtip',
		// lengthMenu: [
		// [ 10, 25, 50, 100, 10000 ],
		// [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
		// ],
		buttons: [
		'copy', 'csv', 'excel', 'pdf'
		],

		ajax: 
		{
			url: "<?= base_url()?>rkap_cabang/ax_data_rkap/",
			type: 'POST',
			data: function ( d ) {
				return $.extend({}, d, { 
					"id_segment": $("#id_segment_filter").val(),
					"id_coa": $("#id_coa_filter").val()
				});
			}
		},
		columns: 
		[
		{data: "jan", render: function(data, type, full, meta){
			// var nomor=0;
			return nomor+=1;
		}},
		{ class:'intro', data: "tahun" },
		{ class:'intro', data: "nm_segment" },
		{ class:'intro', data: "nm_coa" },
		{ data: "rkaptahun", render: $.fn.dataTable.render.number( ',', '.',0 ) },
		{data: "jan", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="jan" type="number" name="jan" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="jan" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "feb", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="feb" type="number" name="feb" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="feb" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "mar", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="mar" type="number" name="mar" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="mar" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "apr", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="apr" type="number" name="apr" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="apr" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "mei", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="mei" type="number" name="mei" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="mei" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "jun", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="jun" type="number" name="jun" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="jun" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "jul", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="jul" type="number" name="jul" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="jul" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "aug", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="aug" type="number" name="aug" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="aug" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "sep", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="sep" type="number" name="sep" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="sep" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "okt", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="okt" type="number" name="okt" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="okt" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "novdes", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="novdes" type="number" name="novdes" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="novdes" value="'+data+'" style="width: 125px">';
			return str;
		}},
		{data: "des", render: function(data, type, full, meta){
			var str = '';
			str += '<input id="des" type="number" name="des" class="update_number form-control" data-id="'+full['id_rkap']+'" data-type="des" value="'+data+'" style="width: 125px">';
			return str;
		}}

		]
	});

function update_data(id, column_name, value)
{
	var dataJson = { id:id, column_name:column_name, value:value };

	$.ajax({
		url:"<?php echo base_url('rkap_cabang/update_data'); ?>",
		method:"POST",
		data: dataJson,
		dataType: "JSON",
		success:function(data)
		{
			if(data.status)
			{
				rkapTable.ajax.reload();
				reset_nomor()
			}
		}
	});
	setInterval(function(){
	}, 5000);
}

$(document).on('blur', '.update_number', function(){
	var id = $(this).data("id");
	var column_name = $(this).data("type");
	var value = $(this).val();
	update_data(id, column_name, value);
});

function kembali(){
	$('.nav-tabs a[href="#tab_1"]').tab('show');
	rkapTable.ajax.reload();
}

$(document).ready(function() {


	$('#tahun').datepicker({
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'yy',
		onClose: function(dateText, inst) { 
			var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).datepicker('setDate', new Date(year, 1));
			document.getElementById("tahun_rkap").innerHTML = year;

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
	reset_nomor()
});

$('#id_segment_filter').select2({
	'allowClear': true
}).on("change", function (e) {
	rkapTable.ajax.reload();
	reset_nomor()
});
$('#id_coa_filter').select2({
	'allowClear': true
}).on("change", function (e) {
	rkapTable.ajax.reload();
	reset_nomor()
});

</script>
</body>
</html>
