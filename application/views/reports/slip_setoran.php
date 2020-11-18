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
				<h1>Reports - Slip Setoran</h1>
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
											<label class="control-label col-md-2">KD Armada</label>
											<div class="col-md-9">
												<select class="form-control select2" style="width: 100%;" id="kd_armada">
													<option value="0">--Armada--</option>	
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Cetak</label>
											<div class="col-md-9">
												<input type="text" class="form-control pull-right" id="tanggal_cetak" name="tanggal_cetak" value="<?= date('Y-m-d')?>">
												<span class="help-block"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-2">Jurusan</label>
											<div class="col-md-9">
												<select class="form-control" style="width: 100%;" id="jurusan">
													<option value="1"> Reguler</option>
													<option value="2"> Pariwisata</option>
												</select>
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
													<option value="html">1. HTML</option>
													<option value="pdf">2. PDF</option>
													<option value="excell">3. Excell</option>
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
			$('#tanggal_cetak').datepicker({
				autoclose: true,
				format: "yyyy-mm-dd",
				todayHighlight: true,
				todayBtn: true,
				todayHighlight: true,  
			});
			$( "#tanggal_cetak" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
		});

		$('#id_segment').select2({
			'placeholder': "-- Segment --",
			'allowClear': true
		}).on("change", function (e) {
			armadalist(); 
		});

		function armadalist(){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>reports/ax_get_armada", 
				data: {id_segment : $("#id_segment").val()}, 
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 

					$("#kd_armada").html(response.data_armada).show();
					$('#select2-kd_armada-container').html('--Armada--');
					$('#kd_armada').val('0');
				},
				error: function (xhr, ajaxOptions, thrownError) { 
					alert(thrownError); 
				}
			});
		}

		function printCetak() {
			var url 		= "<?=site_url("reports/prints")?>";
			var id_segment 	= $('#id_segment').val();

			var REQ = "?id_segment="+id_segment+"&uk=F4-L"+"&name=ap5";
			open(url+REQ);
		}
	</script>

</body>
</html>
