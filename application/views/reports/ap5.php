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
				<h1>Reports - AP5</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">Select</label>
										<div class="col-md-10">
											<select data-placeholder="Pilih Perusahaan" name="display" id="display" class="form-control" onchange="set_display()">
												<option value="0" disabled selected>- Pilih Reports-</option>
												<option value="1">PERIODE</option>
												<option value="2">BULAN</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="panel-body" id="div_panel">
								<form id="form" class="form-horizontal">
									<div class="form-body">
										<div class="form-group" id="div_bu">
											<label class="control-label col-md-2">Cabang</label>
											<div class="col-md-9">
												<select class="form-control select2 " style="width: 100%;" id="id_bu" name="id_bu">

													<?php if($session_level==1 || $session_level==10){?>
													<option value="0">--All--</option>
													<?php } ?>

													<?php
													foreach ($combobox_bu->result() as $rowmenu) {
														?>
														<option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
														<?php
													}
													?>
												</select>
											</div>
										</div>								
										<div class="form-group" id="div_periode_awal">
											<label class="control-label col-md-2">Periode Awal</label>
											<div class="col-md-9">
												<input type="text" class="form-control pull-right" id="periode_awal" name="periode_awal">
												<span class="help-block"></span>
											</div>
										</div>
										<div class="form-group" id="div_periode_akhir">
											<label class="control-label col-md-2">Periode Akhir</label>
											<div class="col-md-9">
												<input type="text" class="form-control pull-right" id="periode_akhir" name="periode_akhir">
												<span class="help-block"></span>
											</div>
										</div>
										<div class="form-group" id="div_bulan">
											<label class="control-label col-md-2">Bulan</label>
											<div class="col-md-9">
												<select data-placeholder="Pilih Bulan" style="width: 100%;" name="bulan" id="bulan" class="form-control select2">
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
										<div class="form-group" id="div_trayek">
											<label class="control-label col-md-2">Trayek</label>
											<div class="col-md-9">
												<select class="form-control select2" style="width: 100%;" id="kd_trayek">
													<option value="">-- All Trayek --</option>
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
		function set_display() {
			var x = $('#display').val();
			if (x==1) {
				document.getElementById('div_bu').style.display = 'block';
				document.getElementById('div_periode_awal').style.display = 'block';
				document.getElementById('div_periode_akhir').style.display = 'block';
				document.getElementById('div_bulan').style.display = 'none';

				document.getElementById('div_panel').style.display = 'block';
				document.getElementById('div_segment').style.display = 'block';
				document.getElementById('div_trayek').style.display = 'block';
				document.getElementById('div_tanggal').style.display = 'block';

			} else if (x==2) {
				document.getElementById('div_bu').style.display = 'block';
				document.getElementById('div_periode_awal').style.display = 'none';
				document.getElementById('div_periode_akhir').style.display = 'none';
				document.getElementById('div_bulan').style.display = 'block';

				document.getElementById('div_panel').style.display = 'block';
				document.getElementById('div_segment').style.display = 'block';
				document.getElementById('div_trayek').style.display = 'block';
				document.getElementById('div_tanggal').style.display = 'block';
			}
		}

		$(document).ready(function() {

			trayeklist();

			var date = (new Date().getMonth())+1;
			$('#bulan').val(date).trigger('change');
			
			document.getElementById('div_panel').style.display = 'none';

			$( "#tanggal").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});

			$( "#periode_awal").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});

			$( "#periode_akhir").datepicker({
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
		}).on("change", function (e) {
			trayeklist(); 
		});

		$('#id_segment').select2({
			'placeholder': "-- Segment --",
			'allowClear': true
		}).on("change", function (e) {
			trayeklist(); 
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

		function trayeklist(){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>reports/ax_get_trayek", 
				data: {id_bu : $("#id_bu").val(),kd_segment : $("#id_segment").val()}, 
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 

					$("#kd_trayek").html(response.data_trayek).show();
					$('#select2-kd_trayek-container').html('--All Trayek--');
					$('#kd_trayek').val('0');
				},
				error: function (xhr, ajaxOptions, thrownError) { 
					alert(thrownError); 
				}
			});
		}

		function printCetak() {
			var x 					= $('#display').val();
			var url 				= "<?=site_url("reports/prints")?>";

			var id_bu 				= $('#id_bu').val();
			var periode_awal 		= $('#periode_awal').val();
			var periode_akhir 		= $('#periode_akhir').val();
			var bulan 				= $('#bulan').val();
			var id_segment 			= $('#id_segment').val();
			var kd_trayek 			= $('#kd_trayek').val();
			var tanggal 			= $('#tanggal').val();
			var format 				= $('#jenis_print').val();

			if(x==0){
				alertify.alert("Warning", "Pilih Reports");
			}else if(x==1){

				if($('#periode_awal').val() == '')
				{
					alertify.alert("Warning", "Periode Awal Belum di Isi.");
				}else if($('#periode_akhir').val() == '')
				{
					alertify.alert("Warning", "Periode Akhir Belum di Isi.");
				}else if($('#id_segment').val() == '')
				{
					alertify.alert("Warning", "Segment Belum di Pilih.");
				}else if($('#tanggal').val() == '')
				{
					alertify.alert("Warning", "Tanggal Belum di Isi.");
				}else{
					var REQ = "?bulan="+bulan+"&id_bu="+id_bu+"&periode_awal="+periode_awal+"&periode_akhir="+periode_akhir+"&id_segment="+id_segment+"&kd_trayek="+kd_trayek+"&tanggal="+tanggal+"&combo="+x+"&format="+format+"&uk=F4-P"+"&name=ap5";
					open(url+REQ);
				}

			}else if(x==2){

				if($('#bulan').val() == '0')
				{
					alertify.alert("Warning", "Bulan Belum di Pilih.");
				}else if($('#id_segment').val() == '')
				{
					alertify.alert("Warning", "Segment Belum di Pilih.");
				}else if($('#tanggal').val() == '')
				{
					alertify.alert("Warning", "Tanggal Belum di Isi.");
				}else{
					var REQ = "?bulan="+bulan+"&id_bu="+id_bu+"&periode_awal="+periode_awal+"&periode_akhir="+periode_akhir+"&id_segment="+id_segment+"&kd_trayek="+kd_trayek+"&tanggal="+tanggal+"&combo="+x+"&format="+format+"&uk=F4-P"+"&name=ap5";
					open(url+REQ);
				}

			}
		}
	</script>

</body>
</html>
