<!DOCTYPE html>
<html>
	<head>
		<?= $this->load->view('head'); ?>
	</head>
	
	<style>
.blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
</style>
	
	<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">
		<div class="wrapper">
			<?= $this->load->view('nav'); ?>
			<?= $this->load->view('menu_groups'); ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>Halaman Pengisian Survei Kepuasan Pegawai 2018</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-body">
								<input type="hidden" id="id_survei" name="id_survei" value='<?= $id_survei?>' />					
								<div class="form-group col-lg-3">
									<label>Nama Pegawai</label>
									<input type="text" id="nm_responden" name="nm_responden" class="form-control" placeholder="Nama Pegawai">
								</div>
								<div class="form-group col-lg-3">
									<label>NIP/NIB/No Pegawai Kontrak</label>
									<input type="text" id="nip_responden" name="nip_responden" class="form-control" placeholder="NIP/NIB/No Pegawai Kontrak">
								</div>
								<div class="form-group col-lg-3">
									<label>Password</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="Password">
								</div>
								<div class="form-group col-lg-3">
								<label>Tugas / Posisi</label>
								<select class="form-control select2 " style="width: 100%;" id="id_posisi" name="id_posisi">
								<option value="0">--Posisi--</option>
									<?php
										foreach ($posisi_combobox->result() as $rowmenu) {
										?>
										<option value="<?= $rowmenu->id_posisi?>"  ><?= $rowmenu->nm_posisi?></option>
										<?php
										}
										?>
								</select>
								</div>
								<div class="form-group col-lg-3">
								<label>Cabang</label>
								<select class="form-control select2 " style="width: 100%;" id="id_bu" name="id_bu">
										<option value="0">--Cabang--</option>
										<?php
										foreach ($bu_combobox->result() as $rowmenu) {
										?>
										<option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
										<?php
										}
										?>
								</select>
								</div>
								<div class="form-group col-lg-3">
									<label>Tempat Lahir</label>
									<input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
								</div>
								<div class="form-group col-lg-3">
									<label>Tanggal Lahir</label>
									<input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="dd-mm-yyyy" placeholder="Tanggal Lahir">
								</div>
								<div class="form-group col-lg-3">
									<label>Tanggal Masuk DAMRI</label>
									<input type="text" id="tgl_masuk" name="tgl_masuk" class="form-control" placeholder="dd-mm-yyyy" placeholder="Tanggal Masuk">
								</div>
								<div class="form-group col-lg-3">
								<label>Pendidikan</label>
								<select class="form-control select2 " style="width: 100%;" id="id_pendidikan" name="id_pendidikan">
										<option value="0">--Pendidikan--</option>
										<?php
										foreach ($pendidikan_combobox->result() as $rowmenu) {
										?>
										<option value="<?= $rowmenu->id_pendidikan?>"  ><?= $rowmenu->nm_pendidikan?></option>
										<?php
										}
										?>
								</select>
								</div>
								<div class="form-group col-lg-3">
									<label>Status Pegawai</label>
									<select class="form-control" id="status_pegawai" name="status_pegawai">
										<option value="Kontrak" >Kontrak</option>
										<option value="Capeg" >Calon Pegawai</option>
										<option value="Pegawai" >Pegawai</option>
									</select>
								</div>
								<div class="form-group col-lg-3">
								<label>Golongan</label>
								<select class="form-control select2 " style="width: 100%;" id="id_golongan" name="id_golongan">
										<option value="0">--Golongan--</option>
										<?php
										foreach ($golongan_combobox->result() as $rowmenu) {
										?>
										<option value="<?= $rowmenu->id_golongan?>"  ><?= $rowmenu->nm_golongan?></option>
										<?php
										}
										?>
								</select>
								</div>
								<div class="form-group col-lg-3">
									<label>Jenis Kelamin</label>
									<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
										<option value="1" >Pria</option>
										<option value="2" >Wanita</option>
									</select>
								</div>
								<div class="form-group col-lg-12">
								<!--<p style="color:red;">*silahkan kosongi isian NIP Pegawai jika belum ada</p>-->
									<button type="button" class="btn btn-info" onClick="history.go(-1);">Kembali</button>
									<button type="button" class="btn btn-primary" id='btnSave'>Isi Survei</button>
									<button type="button" class="btn btn-warning" id='btnLanjut' >Lanjutkan Isi Survei</button>
								</div>
								
								<div class="form-group col-lg-12">
								<p style="color:red;"><b>*) Note: Apabila pertama kali mengisi survei ini, untuk mengisi survei klik tombol <button type="button" class="btn btn-primary" id=''>Isi Survei</button></b></p>
								<p style="color:red;"><b>*) Note: Kolom password diisi sesuai dengan keinginan Anda dan digunakan untuk melanjutkan isi survei.</b></p>
								<p style="color:red;"><b>*) Note: Apabila sebelumnya sudah mengisi survei tapi belum selesai dan ingin melanjutkan, cukup mengisi kolom NIP dan Password saja lalu klik tombol <button type="button" class="btn btn-warning" id='' >Lanjutkan Isi Survei</button></b></p>
								<center class="blink"><p style="color:#1574ea; font-size:28px"><b>SURVEI INI DIJAGA KERAHASIAANNYA.</b></p></center>
								<center class="blink"><p style="color:#1574ea; font-size:28px"><b>SEMUA JAWABAN BENAR TIDAK ADA YANG SALAH.</b></p></center>
								<center class="blink"><p style="color:#1574ea; font-size:28px"><b>OLEH KARENA ITU, JAWABLAH SEMUA PERTANYAAN DENGAN JUJUR.</b></p></center>
								</div>
								
								</div>
							</div>					
							</div>
								
								<!--<div class="dataTable_wrapper">	
										<table class="table table-striped table-bordered table-hover" id="cekTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>Pertanyaan</th>
												</tr>
											</thead>
										</table>
									</div>-->
								
						</div>
					</div>
					</div>
				</section>
		</div>
		<?= $this->load->view('basic_js'); ?>
		<script type='text/javascript'>

			var cekTable = $('#cekTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				// "aLengthMenu": [100],
				ajax: 
				{
					url: "<?=base_url()?>survei/ax_data_survei_isi_nilai/<?= $id_survei?>",
					type: 'POST'
				},
				columns: 
				[
					{
						data: "id_survei", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewData(' + full['id_cek'] + ','+ data +')"><i class="fa fa-pencil"></i> Skors</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					/* { data: "critical", render: function(data, type, full, meta){
							if(data == 1)
								return '<span class="label label-danger">Critical</span>';
							else return '<span class="label label-success">Not Critical</span>';
						}
					}, */

					{ data: "nm_cek" },
					// { data: "nm_nilai_cek", class:".hidden-xs-down" },
					// { data: "skors" },
					/* { data: "status", render: function(data, type, full, meta){
							if(data == 1)
								return "Active";
							else return "Not Active";
						}
					} */
				],
				drawCallback: function () {
			    	var api = this.api();
			      	var jsondata = api.ajax.json();
			      	deposit = jsondata['total'];
			      	header = jsondata['header'];
			      	critical = jsondata['critical'];
					

			      	if(critical['critical'] == null || critical['critical'] == 0){
			      	stat = 0;	
			      	info = "warning";
			      	}else{
			      	stat = critical['critical'];
			      	info = "danger";	
			      	}
			      	// $("#critical").html('<h4><strong>Total Critical : <span class="label label-'+ info+'">'+stat+'</span></strong></h4>');
			      	// $("#deposit").html('<h4><strong>Total Skors : '+deposit['skors']+'</strong></h4>');
			      	// $("#plat").html('<h4><strong>Plat : '+header['no_plat']+'</strong></h4>');
			      	// $("#driver").html('<h4><strong>Driver : '+header['nm_driver']+'</strong></h4>');
					
	            	
			    }
			});
			
			$('#btnSave').on('click', function () {
				if($('#id_survei').val() == '')
				{
					alertify.alert("Warning", "Please fill ID.");
				} else if($('#nm_responden').val() == '')
				{
					alertify.alert("Warning", "Nama Pegawai tidak boleh kosong.");
				} else if($('#nip_responden').val() == '')
				{
					alertify.alert("Warning", "NIP Pegawai tidak boleh kosong.");
				} else if($('#id_posisi').val() == '0')
				{
					alertify.alert("Warning", "Posisi tidak boleh kosong.");
				} else if($('#id_bu').val() == '0')
				{
					alertify.alert("Warning", "Cabang tidak boleh kosong.");
				} else if($('#tempat_lahir').val() == '')
				{
					alertify.alert("Warning", "Tempat Lahir tidak boleh kosong.");
				} else if($('#tgl_lahir').val() == '')
				{
					alertify.alert("Warning", "Tanggal Lahir tidak boleh kosong.");
				} else if($('#tgl_masuk').val() == '')
				{
					alertify.alert("Warning", "Tanggal Masuk DAMRI tidak boleh kosong.");
				} else if($('#id_pendidikan').val() == '0')
				{
					alertify.alert("Warning", "Pendidikan tidak boleh kosong.");
				} else if($('#status_pegawai').val() == '0')
				{
					alertify.alert("Warning", "Status Pegawai tidak boleh kosong.");
				} else if($('#id_golongan').val() == '0')
				{
					alertify.alert("Warning", "Golongan tidak boleh kosong.");
				} else if($('#jenis_kelamin').val() == '')
				{
					alertify.alert("Warning", "Jenis Kelamin tidak boleh kosong.");
				} else if($('#password').val() == '')
				{
					alertify.alert("Warning", "Password tidak boleh kosong.");
				}
				else
				{	
					var url = '<?=base_url()?>survei/cekNomor';
					var data = {
					id_bu: $('#id_bu').val(),
					nip_responden: $('#nip_responden').val(),
					};
						  
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.alert('Notifikasi',"NIP/NIB/No Urut Pegawai Kontrak Tersebut Pada Cabang ini Sudah Mengisi Survei.");
							// $('#nip_responden.frm').trigger("reset");
							$("#nip_responden").val("");
						}else{
							var url = '<?=base_url()?>survei/ax_set_isi_survei';
							var data = {
								// id_nilai_cek: $('#id_nilai_cek').val(),
								id_survei		: $('#id_survei').val(),
								nm_responden	: $('#nm_responden').val(),
								nip_responden	: $('#nip_responden').val(),
								password		: $('#password').val(),
								id_posisi		: $('#id_posisi').val(),
								id_bu			: $('#id_bu').val(),
								tempat_lahir	: $('#tempat_lahir').val(),
								tgl_lahir		: $('#tgl_lahir').val(),
								tgl_masuk		: $('#tgl_masuk').val(),
								id_pendidikan	: $('#id_pendidikan').val(),
								status_pegawai	: $('#status_pegawai').val(),
								id_golongan		: $('#id_golongan').val(),
								jenis_kelamin	: $('#jenis_kelamin').val(),
							};
									
							$.ajax({
								url: url,
								method: 'POST',
								data: data
							}).done(function(data, textStatus, jqXHR) {
								var data = JSON.parse(data);
								if(data['status'] == "success")
								{
									alertify.success("Data Survei Terimpan.");
									$('#addModal').modal('hide');
									cekTable.ajax.reload();
									window.location.href = '<?=base_url()?>survei/menilai';
								}
							});
						  // alertify.success("Uraian Tersimpan.");
						}
					});
				}
			});

			$('#btnLanjut').on('click', function () {
				if($('#id_survei').val() == '')
				{
					alertify.alert("Warning", "Please fill ID.");
				}
					else if($('#nip_responden').val() == '')
				{
					alertify.alert("Warning", "NIK tidak boleh kosong.");
				} 
					else if($('#password').val() == '')
				{
					alertify.alert("Warning", "Password tidak boleh kosong.");
				}
				else
				{	
					var url = '<?=base_url()?>survei/cekSurvei';
					var data = {
					id_survei: $('#id_survei').val(),
					nip_responden: $('#nip_responden').val(),
					password: $('#password').val(),
					};
						  
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "success")
						{
							alertify.alert('Notifikasi',"NIP/NIB/No Urut Pegawai Kontrak Tersebut ditemukan");
							window.location.href='<?= base_url()?>survei/indexnilai';
							
						}else{
							alertify.alert('Notifikasi',"NIP/NIB/No Urut Pegawai Kontrak Tersebut Tidak ditemukan");
						}
					});
				}
			});

			function ViewData(id_cek, id_survei_detail)
			{
				
					var url = '<?=base_url()?>survei/ax_get_cek_by_id';
					var data = {
						id_cek: id_cek

					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$("#select2-id_nilai_cek-container").html("<option value=''>--Pilih Nilai--</option>");
						$("select#id_nilai_cek").html(data);
						$('#id_survei_detail').val(id_survei_detail),
						
						$('#addModal').modal('show');

					});
				
			}
			
			$(document).ready(function() {
			
			/* $(document).ready(function() {
				$( " .datepicker" ).datepicker({
				  dateformat: "yy-mm-dd",
				  changeMonth: true,
				  changeYear: true,
				  autoclose: true,
				  yearRange: '1946:2019'
				}); */
        
            $( "#tgl_lahir, #tgl_masuk" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "dd-mm-yy",
			  yearRange: '1946:2019'
            });

          // ViewData();
          }); 
		  
			$("#tgl_lahir, #tgl_masuk").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});

			$( "#tgl_lahir, #tgl_masuk" ).on("change", function (e) {
            // buTable.ajax.reload(); 
            // ViewData();
          });
		  
		  $(document).on('submit', '#form-survei', function(e){
				var data = $(this).serialize();
				$.ajax({
				  method: 'POST',
				  url: '<?php echo base_url('survei/update'); ?>',
				  data: data
				})
				.done(function(data) {
				  var out = jQuery.parseJSON(data);
				  if (out.status == 'form') {
					 alertify.error("Data Gagal Tersimpan.");
				  } else {
					 alertify.success("Data Berhasil Tersimpan.");
				  }
				})
				
				e.preventDefault();
			  });
		
		function cekNIP(){
		var url = '<?=base_url()?>survei/cekNIP';
          var data = {
            // id_vendor: $('#id_vendor').val(),
            nip_responden: $('#nip_responden').val(),
          };
              
          $.ajax({
            url: url,
            method: 'POST',
            data: data
          }).done(function(data, textStatus, jqXHR) {
            var data = JSON.parse(data);
            if(data['status'] == "success")
            {
				alertify.alert('Notifikasi',"NIP Pegawai Tersebut Sudah Mengisi Survei.");
				// $('#nip_responden.frm').trigger("reset");
				$("#nip_responden").val("");
            }else{
              // alertify.success("Uraian Tersimpan.");
            }
          });
		}
			
			</script>
	</body>
</html>
