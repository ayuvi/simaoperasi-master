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
				<h1>Reports - AP6</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

							</div>

							<div class="panel-body" id="div_bulan">
								<form id="form" class="form-horizontal">
									<input type="hidden" id="id_data" name="id_data">

									<div class="form-group">
										<label class="control-label col-md-2">Bulan</label>
										<div class="col-md-9">
											<select data-placeholder="Pilih Bulan" name="bulan" id="bulan" class="form-control select2">
												<option value="0">~ Pilih Bulan</option>
												<option value="1" >1. Januari</option>
												<option value="2" >2. Februari</option>
												<option value="3" >3. Maret</option>
												<option value="4" >4. April</option>
												<option value="5" >5. Mei</option>
												<option value="6" >6. Juni</option>
												<option value="7" >7. Juli</option>
												<option value="8" >8. Agustus</option>
												<option value="9" >9. September</option>
												<option value="10" >10. Oktober</option>
												<option value="11" >11. Nopember</option>
												<option value="12" >12. Desember</option>
											</select>
										</div>
									</div>
									<div class="form-body">
										<div class="form-group">
											<label class="control-label col-md-2">Segment</label>
											<div class="col-md-9">
												<select class="form-control select2" style="width: 100%;" id="id_segment">
													<option value="">-- Segment --</option>
													<?php foreach ($combobox_segment->result() as $rowmenu) { ?>
														<option value="<?= $rowmenu->id_segment?>"><?= $rowmenu->nm_segment?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Tanggal Cetak</label>
											<div class="col-md-9">
												<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</form>
								<hr>
								<div class="form-body">
									<center>
										<div class="form-group">
											<div class="col-md-3">
											</div>
											<div class="col-md-3">
												<select data-placeholder="Pilih Jenis Print" name="jenis_print" id="jenis_print" class="form-control">
													<option value="html" >1. HTML</option>
													<option value="pdf" >2. PDF</option>
													<option value="excell" >3. Excell</option>
												</select>
											</div>
											<div class="col-md-3">
												<button type="button" class="btn btn-success" onclick="printCetak()"><i class="fa fa-print"></i> Cetak</button>
											</div>
										</div>
									</center>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?= $this->load->view('basic_js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			var date = (new Date().getMonth())+1;
			$('#bulan').val(date).trigger('change');

			$('#tanggal').datepicker({
				autoclose: true,
				format: "yyyy-mm-dd",
				todayHighlight: true,
				todayBtn: true,
				todayHighlight: true,  
			});
			$( "#tanggal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
		});

		$('#id_segment').select2({
			'placeholder': "-- Segment --",
			'allowClear': true
		});

		$('#bulan').select2({
			'placeholder': "-- Bulan --",
			'allowClear': true
		}).on("change", function (e) {
			var select_bulan = $("#bulan").val();
			var tgl = $("#tanggal").val();
			var tahun = tgl.substr(0, 4);
			var bulan = tgl.substr(5, 2);
			var hari = tgl.substr(8, 2);
			var tgl_change = tahun+'-'+select_bulan+'-'+hari;
			$("#tanggal").val(tgl_change);
		});

		function printCetak() {
			var url 		= "<?=site_url("reports/prints")?>";
			var id_segment 	= $('#id_segment').val();
			var bulan 		= $('#bulan').val();
			var tanggal 	= $('#tanggal').val();
			var format 		= $('#jenis_print').val();

			if(bulan == '0')
			{
				alertify.alert("Warning", "Bulan Belum di Pilih.");
			}else if(id_segment == '')
			{
				alertify.alert("Warning", "Segment Belum di Pilih.");
			}else if(tanggal == '')
			{
				alertify.alert("Warning", "Tanggal Belum di Isi.");
			}else{

				var REQ = "?bulan="+bulan+"&id_segment="+id_segment+"&tanggal="+tanggal+"&format="+format+"&uk=F4-L"+"&name=ap6";
				open(url+REQ);
			}
		}
	</script>

</body>
</html>
