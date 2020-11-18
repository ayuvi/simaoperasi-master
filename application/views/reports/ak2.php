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
				<h1>Reports - BUKTI KAS KELUAR</h1>
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
												<option value="1">AK REGULER</option>
												<option value="2">AK PER TRAYEK</option>
												<option value="3">AK LAMPIRAN</option>
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
													<!-- <?php if($session_level==1 || $session_level==10){?>
													<option value="0">-- All --</option>
													<?php } ?> -->

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

										<div class="form-group" id="div_segment">
											<label class="control-label col-md-2">Segment</label>
											<div class="col-md-9">
												<select class="form-control select2" style="width: 100%;" id="id_segment">
													<option value="0">-- All --</option>
													<?php foreach ($combobox_segment->result() as $rowmenu) { ?>
													<option value="<?= $rowmenu->id_segment?>"><?= $rowmenu->nm_segment?></option>
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
										<div class="form-group" id="div_pengeluaran">
											<label class="control-label col-md-2">Pengeluaran</label>
											<div class="col-md-9">
												<select data-placeholder="-- Pilih Pengeluaran --" class="form-control select2" style="width: 100%;" id="pengeluaran">
													<option value="">-- Pilih Pengeluaran --</option>
													<?php 
													$arr=1;
													foreach ($combobox_komponen_pengeluaran->result() as $rowmenu) { ?>
													<option value="<?= $rowmenu->id_komponen?>"><?=$arr.". ".$rowmenu->nm_komponen?></option>
													<?php $arr+=1; } ?>
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
										<div class="form-group" id="div_kontrol">
											<label class="control-label col-md-2">Kontrol</label>
											<div class="col-md-9">
												<input type="text" class="form-control pull-right" id="kontrol" name="kontrol">
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
									<br>
									<br>
									<center>
										<div class="form-group">
											<code>*kontrol : untuk melihat transaksi berdasarkan periode. kosongkan jika tidak di gunakan</code>
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
		function set_display() {
			var x = $('#display').val();
			if (x==1) {
				document.getElementById('div_panel').style.display = 'block';
				document.getElementById('div_bu').style.display = 'block';
				document.getElementById('div_segment').style.display = 'block';
				document.getElementById('div_pengeluaran').style.display = 'block';
				document.getElementById('div_tanggal').style.display = 'block';
				document.getElementById('div_trayek').style.display = 'none';
				document.getElementById('div_kontrol').style.display = 'none';

			} else if (x==2) {
				document.getElementById('div_panel').style.display = 'block';
				document.getElementById('div_bu').style.display = 'block';
				document.getElementById('div_segment').style.display = 'block';
				document.getElementById('div_trayek').style.display = 'block';
				document.getElementById('div_pengeluaran').style.display = 'block';
				document.getElementById('div_tanggal').style.display = 'block';
				document.getElementById('div_kontrol').style.display = 'none';
			}else if (x==3) {
				document.getElementById('div_panel').style.display = 'block';
				document.getElementById('div_bu').style.display = 'block';
				document.getElementById('div_segment').style.display = 'block';
				document.getElementById('div_trayek').style.display = 'block';
				document.getElementById('div_pengeluaran').style.display = 'none';
				document.getElementById('div_tanggal').style.display = 'block';
				document.getElementById('div_kontrol').style.display = 'block';
			}
		}

		$(document).ready(function() {

			trayeklist();

			document.getElementById('div_panel').style.display = 'none';

			$( "#tanggal").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
			$( "#kontrol").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});

			$( "#tanggal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
			$( "#kontrol" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
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

		function trayeklist(){
			$.ajax({
				type: "POST", 
				url: "<?= base_url() ?>reports/ax_get_trayek_ak1_dan_ak2", 
				data: {id_bu : $("#id_bu").val(), id_segment : $("#id_segment").val()}, 
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
			var x 			= $('#display').val();
			var url 		= "<?=site_url("reports/prints")?>";

			var id_bu 		= $('#id_bu').val();
			var id_segment 	= $('#id_segment').val();
			var kd_trayek 	= $('#kd_trayek').val();
			var pengeluaran = $('#pengeluaran').val();
			var tanggal 	= $('#tanggal').val();
			var	kontrol 	= x=="3" ? $('#kontrol').val() : tanggal;
			var format 		= $('#jenis_print').val();

			if(x==0){
				alertify.alert("Warning", "Pilih Reports");
			}else if(x==1){

				if($('#id_segment').val() == '0')
				{
					alertify.alert("Warning", "Segment Belum di Pilih.");
				}else if($('#pengeluaran').val() == '')
				{
					alertify.alert("Warning", "Pengeluaran Belum di Pilih.");
				}else if($('#tanggal').val() == '')
				{
					alertify.alert("Warning", "Tanggal Belum di Isi.");
				}else{
					var REQ = "?id_segment="+id_segment+"&id_bu="+id_bu+"&kd_trayek="+kd_trayek+"&pengeluaran="+pengeluaran+"&tanggal="+tanggal+"&kontrol="+kontrol+"&combo="+x+"&format="+format+"&uk=F4-L"+"&name=ak2_new";
					open(url+REQ);
				}

			}else if(x==2){

				if($('#id_segment').val() == '0')
				{
					alertify.alert("Warning", "Segment Belum di Pilih.");
				}else if($('#pengeluaran').val() == '')
				{
					alertify.alert("Warning", "Pengeluaran Belum di Pilih.");
				}else if($('#tanggal').val() == '')
				{
					alertify.alert("Warning", "Tanggal Belum di Isi.");
				}else{
					var REQ = "?id_segment="+id_segment+"&id_bu="+id_bu+"&kd_trayek="+kd_trayek+"&pengeluaran="+pengeluaran+"&tanggal="+tanggal+"&kontrol="+kontrol+"&combo="+x+"&format="+format+"&uk=F4-L"+"&name=ak2_new";
					open(url+REQ);
				}

			}else if(x==3){
				if($('#id_segment').val() == '0')
				{
					alertify.alert("Warning", "Segment Belum di Pilih.");
				}else if($('#tanggal').val() == '')
				{
					alertify.alert("Warning", "Tanggal Belum di Isi.");
				}else{
					var REQ = "?id_segment="+id_segment+"&id_bu="+id_bu+"&kd_trayek="+kd_trayek+"&pengeluaran="+pengeluaran+"&tanggal="+tanggal+"&kontrol="+kontrol+"&combo="+x+"&format="+format+"&uk=F4-L"+"&name=ak2_new";
					open(url+REQ);
				}

			}
		}
	</script>

</body>
</html>
