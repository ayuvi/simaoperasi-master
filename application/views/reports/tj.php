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
				<h1>Reports - Transjakarta</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

								
							</div>

							<div class="panel-body">
								<form id="form" class="form-horizontal">
									<div class="form-body">
										<div class="form-group" id="div_bu">
											<label class="control-label col-md-2">Cabang</label>
											<div class="col-md-9">
												<select class="form-control select2 " style="width: 100%;" id="id_bu" name="id_bu">
													<option value="16"  >Koridor 1 & 8</option>
												</select>
											</div>
										</div>								
										<div class="form-group" id="div_segment">
											<label class="control-label col-md-2">Segment</label>
											<div class="col-md-9">
												<select class="form-control select2" style="width: 100%;" id="id_segment">
													<option value="0">-- All Segment --</option>
													<?php foreach ($combobox_segment->result() as $rowmenu) { ?>
													<option value="<?= $rowmenu->kd_segment?>"><?= $rowmenu->nm_segment?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group" id="div_armada">
											<label class="control-label col-md-2">Armada</label>
											<div class="col-md-9">
												<select class="form-control select2" style="width: 100%;" id="armada">
													<option value="0">-- All Armada --</option>
													<?php foreach ($combobox_armada_sbu->result() as $rowmenu) { ?>
													<option value="<?= $rowmenu->kd_armada?>"><?= $rowmenu->kd_armada?> (<?= $rowmenu->plat_armada?>)</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group" id="div_tanggal">
											<label class="control-label col-md-2">Tanggal</label>
											<div class="col-md-9">
												<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
												<span class="help-block"></span>
											</div>
										</div>

									</div>
								</form>
								<hr>
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-4">
										</div>
										<center>
											<div class="col-md-2">
												<select data-placeholder="Pilih Jenis Print" name="jenis_print" id="jenis_print" class="form-control">
													<option value="html" >1. HTML</option>
													<option value="pdf" >2. PDF</option>
													<option value="excell" >3. Excell</option>
												</select>
											</div>
										</center>
										<div class="col-md-5">
											<button type="button" class="btn btn-success" onclick="printCetak()"><i class="fa fa-print"></i> Cetak</button>
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
	<script type="text/javascript">

		$(document).ready(function() {

			$( "#tanggal").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});


			$( "#tanggal").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});

			$( "#periode_akhir" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
			$( "#periode_awal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
			$( "#tanggal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
		});

		$('#id_bu').select2({
			'placeholder': "-- Cabang --",
			'allowClear': true
		});

		$('#id_segment').select2({
			'placeholder': "-- Segment --",
			'allowClear': true
		});

		function printCetak() {
			var url 				= "<?=site_url("reports/prints")?>";

			var id_bu 				= $('#id_bu').val();
			var id_segment 			= $('#id_segment').val();
			var armada 				= $('#armada').val();
			var tanggal 			= $('#tanggal').val();
			var format 				= $('#jenis_print').val();

			if($('#id_segment').val() == '0')
			{
				alertify.alert("Warning", "Segment Belum di Pilih.");
			}else if($('#tanggal').val() == '')
			{
				alertify.alert("Warning", "Tanggal Belum di Isi.");
			}else{


				if(format=="excell"){
					var REQ = "?id_bu="+id_bu+"&id_segment="+id_segment+"&armada="+armada+"&tanggal="+tanggal+"&format="+format+"&uk=F4-P"+"&name=tj-excell";
					open(url+REQ);
				}else{
					var REQ = "?id_bu="+id_bu+"&id_segment="+id_segment+"&armada="+armada+"&tanggal="+tanggal+"&format="+format+"&uk=F4-P"+"&name=tj";
					open(url+REQ);
				}


			}
		}
	</script>

</body>
</html>
