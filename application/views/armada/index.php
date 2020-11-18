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
					<h1>Armada</h1>
				</section>
				<section class="invoice">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<?php //if($this->session->userdata('login')['id_level'] == 1 || $this->session->userdata('login')['id_level'] == 6){ ?>
										<button class="btn btn-primary" onclick='ViewData(0)'>
											<i class='fa fa-plus'></i> Add Armada
										</button>
									<?php //}?>
									<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-bu" id="addModalLabel">Form Add Armada</h4>
												</div>
												<div class="modal-body">
													<!-- <input type="hidden" id="id_armada" name="id_armada" value='0' /> -->
													<div class="row">

													<div class="form-group col-lg-6">
														<label>Cabang</label>
														<select class="form-control select2 " style="width: 100%;" id="id_bu" name="id_bu">
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

													<div class="form-group col-lg-6">
														<label>Kode Armada</label>
														<input type="text" id="kd_armada" name="kd_armada" class="form-control" placeholder="Kode Armda">
													</div>

													<div class="form-group col-lg-6">
														<label>No. Rangka</label>
														<input type="text" id="rangka_armada" name="rangka_armada" class="form-control" placeholder="Rangka">
													</div>

													<div class="form-group col-lg-6">
														<label>No. Mesin</label>
														<input type="text" id="mesin_armada" name="mesin_armada" class="form-control" placeholder="Mesin">
													</div>

													<div class="form-group col-lg-6">
														<label>Plat</label>
														<input type="text" id="plat_armada" name="plat_armada" class="form-control" placeholder="Plat">
													</div>

													<div class="form-group col-lg-6">
														<label>Tahun Pembuatan</label>
														<input type="text" id="tahun_armada" name="tahun_armada" class="form-control" placeholder="Tahun">
													</div>

													<div class="form-group col-lg-6">
														<label>Type</label>
														<input type="text" id="tipe_armada" name="tipe_armada" class="form-control" placeholder="Type">
													</div>

													<div class="form-group col-lg-6">
														<label>Silinder</label>
														<input type="text" id="silinder_armada" name="silinder_armada" class="form-control" placeholder="Silinder">
													</div>

													<div class="form-group col-lg-6">
														<label>Seat</label>
														<input type="text" id="seat_armada" name="seat_armada" class="form-control" placeholder="Seat">
													</div>

													<div class="form-group col-lg-6">
														<label>Layout</label>
														<select class="form-control select2 " style="width: 100%;" id="id_layout" name="id_layout">
																<option value="0">--Layout--</option>
																<?php
																foreach ($combobox_layout->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_layout?>"  ><?= $rowmenu->nm_layout?></option>
																<?php
																}
																?>
														</select>
													</div>

													<div class="form-group col-lg-6">
														<label>Segment</label>
														<select class="form-control select2 " style="width: 100%;" id="id_segment" name="id_segment">
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

													<div class="form-group col-lg-6">
														<label>Merek</label>
														<select class="form-control select2 " style="width: 100%;" id="id_merek" name="id_merek">
																<option value="0">--Merek--</option>
																<?php
																foreach ($combobox_merek->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_merek?>"  ><?= $rowmenu->nm_merek?></option>
																<?php
																}
																?>
														</select>
													</div>

													<div class="form-group col-lg-6">
														<label>Layanan</label>
														<select class="form-control select2 " style="width: 100%;" id="id_layanan" name="id_layanan">
																<option value="0">--Layanan--</option>
																<?php
																foreach ($combobox_layanan->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_layanan?>"  ><?= $rowmenu->nm_layanan?></option>
																<?php
																}
																?>
														</select>
													</div>

													<div class="form-group col-lg-6">
														<label>Ukuran</label>
														<select class="form-control select2 " style="width: 100%;" id="id_ukuran" name="id_ukuran">
																<option value="0">--Ukuran--</option>
																<?php
																foreach ($combobox_ukuran->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_ukuran?>"  ><?= $rowmenu->nm_ukuran?></option>
																<?php
																}
																?>
														</select>
													</div>

													<div class="form-group col-lg-6">
														<label>Warna</label>
														<select class="form-control select2 " style="width: 100%;" id="id_warna" name="id_warna">
																<option value="0">--Warna--</option>
																<?php
																foreach ($combobox_warna->result() as $rowmenu) {
																?>
																<option value="<?= $rowmenu->id_warna?>"  ><?= $rowmenu->nm_warna?></option>
																<?php
																}
																?>
														</select>
													</div>

													<div class="form-group col-lg-6">
														<label>Status</label>
														<select class="form-control " style="width: 100%;" id="status_armada" name="status_armada">
																<option value="DAMRI">DAMRI</option>
																<option value="KSO">KSO</option>
														</select>
													</div>

													
													
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
										<table class="table table-striped table-bordered table-hover" id="armadaTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>#</th>
													<th>Cabang</th>
													<th>Kode</th>
													<th>Rangka</th>
													<th>Mesin</th>
													<th>Plat</th>
													<th>Tahun</th>
													<th>Merek</th>
													<th>Type</th>
													<th>Warna</th>
													<th>Silinder</th>
													<th>Ukuran</th>
													<th>Seat</th>
													<th>Layout</th>
													<th>Segment</th>
													<th>Layanan</th>
													<th>Status</th>
													<th>CUser</th>
													<th>CDate</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- FOTO ARMADA -->
					<div class="row" >
						<div class="col-lg-12">
									<div class="modal fade" id="addModalfotoarmada" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="form-add" id="addModalLabel">Form List Foto Armada</h4>
													

												</div>
												<div class="modal-body">
													<div class="row">
													<form id="submit">
													<input type="hidden" id="id_armada_foto" name="id_armada_foto" class="form-control">
													<input type="hidden" id="id_armada" name="id_armada" class="form-control">
														<div class="form-group col-lg-3">
																
																<label>Sisi</label>
																<select class="form-control" id="nm_armada_foto" name="nm_armada_foto">
																	<option value="DEPAN KANAN" >DEPAN KANAN</option>
																	<option value="DEPAN KIRI" >DEPAN KIRI</option>
																	<option value="BELAKANG" >BELAKANG</option>
																	<option value="DALAM" >DALAM</option>
																</select>
														</div>
														<div class="form-group col-lg-6">
																<label>Nama Attachment</label>
												               	<input type="file" name="file" id="file_attachment" accept=".jpeg,.jpeg" class="form-control">
												               	<p class="help-block">Upload Foto Armada. Format File: Jpg.  Size Max: 150KB   </p>
												        </div>
												        <div class="form-group col-lg-3">
												        <label>_</label>
												        <button type="submit" class="form-control btn btn-success" id=''>Save</button>
												    	</div>
												    </form>

													</div>

													<div class="dataTable_wrapper">
														<table class="table table-striped table-bordered table-hover" id="attachmentTable">
															<thead>
																<tr>
																	<th>Aksi</th>
																	<th>#</th>
																	<th>Sisi</th>
																	<th>Foto Armada</th>
																</tr>
															</thead>
														</table>
													</div>
												</div>
												<div class="modal-footer">
													
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
						</div>
					</div>


					<!-- FOTO STNK -->
					<div class="row" >
						<div class="col-lg-12">
									<div class="modal fade" id="addModalfotostnk" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="form-add" id="addModalLabel">Form List Foto STNK</h4>
													

												</div>
												<div class="modal-body">
													<div class="row">
													<form id="submit_stnk">
													<input type="hidden" id="id_armada_stnk" name="id_armada_stnk" class="form-control">
													<input type="hidden" id="id_armadastnk" name="id_armadastnk" class="form-control">
														<div class="form-group col-lg-3">
																
																<label>Tanggal EXP</label>
																<input type="text" id="tgl_exp_stnk" name="tgl_exp_stnk" class="form-control" placeholder="yyyy-mm-dd">
														</div>
														<div class="form-group col-lg-2">
														<label>Masa</label>
														<select class="form-control " style="width: 100%;" id="masa" name="masa">
																<option value="1">1</option>
																<option value="5">5</option>
														</select>
													</div>
														<div class="form-group col-lg-4">
																<label>Nama Attachment</label>
												               	<input type="file" name="file" id="file_attachment_stnk" accept=".jpeg,.jpeg" class="form-control">
												               	<p class="help-block">Upload Foto Armada. Format File: Jpg.  Size Max: 150KB   </p>
												        </div>
												        <div class="form-group col-lg-3">
												        <label>_</label>
												        <button type="submit" class="form-control btn btn-success" id=''>Save</button>
												    	</div>
												    </form>

													</div>

													<div class="dataTable_wrapper">
														<table class="table table-striped table-bordered table-hover" id="stnkTable">
															<thead>
																<tr>
																	<th>Aksi</th>
																	<th>#</th>
																	<th>Tanggal Kadaluarsa</th>
																	<th>Masa</th>
																	<th>Foto STNK</th>
																</tr>
															</thead>
														</table>
													</div>
												</div>
												<div class="modal-footer">
													
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
		<script type='text/javascript'>
			var armadaTable = $('#armadaTable').DataTable({
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
					url: "<?= base_url()?>armada/ax_data_armada/",
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
						data: "id_armada", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							var kd = "Foto('"+data+"')";
							str += '<li><a onclick="'+ kd +'"><i class="fa fa-truck"></i> Foto Armada</a></li>';
							str += '<li><a onclick="Stnk(' + data + ')"><i class="fa fa-truck"></i> Foto STNK</a></li>';
							str += '<li><a onclick="keur(' + data + ')"><i class="fa fa-truck"></i> Foto Keur</a></li>';
							str += '<li><a onclick="ijin(' + data + ')"><i class="fa fa-truck"></i> Foto Ijin Trayek</a></li>';
							str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
						
							return str;
						}
					},
					
					{ class:'intro', data: "id_armada" },
					{ class:'intro', data: "nm_bu" },
					{ class:'intro', data: "kd_armada" },
					{ class:'intro', data: "rangka_armada" },
					{ class:'intro', data: "mesin_armada" },
					{ class:'intro', data: "plat_armada" },
					{ class:'intro', data: "tahun_armada" },
					{ class:'intro', data: "nm_merek" },
					{ class:'intro', data: "tipe_armada" },
					{ class:'intro', data: "nm_warna" },
					{ class:'intro', data: "silinder_armada" },
					{ class:'intro', data: "nm_ukuran" },
					{ class:'intro', data: "seat_armada" },
					{ class:'intro', data: "nm_layout" },
					{ class:'intro', data: "nm_segment" },
					{ class:'intro', data: "nm_layanan" },
					{ class:'intro', data: "status_armada" },
					{ class:'intro', data: "cuser" },
					{ class:'intro', data: "cdate" },
					
				]
			});

				
			
			$('#btnSave').on('click', function () {
				if($('#kd_armada').val() == '')
				{
					alertify.alert("Warning", "ID Armada Belum di Isi.");
				}
				else
				{
					var url = '<?=base_url()?>armada/ax_set_data';
					var data = {
						id_armada: $('#id_armada').val(),
						kd_armada: $('#kd_armada').val(),
						rangka_armada: $('#rangka_armada').val(),
						plat_armada: $('#plat_armada').val(),
						mesin_armada: $('#mesin_armada').val(),
						tahun_armada: $('#tahun_armada').val(),
						tipe_armada: $('#tipe_armada').val(),
						id_merek: $('#id_merek').val(),
						tipe_armada: $('#tipe_armada').val(),
						silinder_armada: $('#silinder_armada').val(),
						id_ukuran: $('#id_ukuran').val(),
						id_segment: $('#id_segment').val(),
						id_layanan: $('#id_layanan').val(),
						seat_armada: $('#seat_armada').val(),
						id_layout: $('#id_layout').val(),
						id_warna: $('#id_warna').val(),
						status_armada: $('#status_armada').val(),
						id_bu: $('#id_bu').val(),
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
							alertify.success("Data Armada Disimpan.");
							$('#addModal').modal('hide');
							armadaTable.ajax.reload();
						}
					});
				}
			});


			
			
			function ViewData(id_armada)
			{
				if(id_armada == 0)
				{
						$('#addModalLabel').html('Form Add Armada');
						$('#select2-id_bu-container').html('--Cabang--');
						$('#select2-id_segment-container').html('--Segment--');
						$('#select2-id_layanan-container').html('--Layanan--');
						$('#select2-id_ukuran-container').html('--Ukuran--');
						$('#select2-id_warna-container').html('--Warna--');
						$('#select2-id_merek-container').html('--Merek--');
						$('#select2-id_layout-container').html('--Layout--');
						$('#id_bu').val(0);
						$('#id_segment').val(0);
						$('#id_layanan').val(0);
						$('#id_ukuran').val(0);
						$('#id_warna').val(0);
						$('#id_merek').val(0);
						$('#id_layout').val(0);
						$('#id_armada').val(0);
						$('#kd_armada').val('');
						$('#rangka_armada').val('');
						$('#plat_armada').val('');
						$('#mesin_armada').val('');
						$('#tahun_armada').val('');
						$('#merek_armada').val('');
						$('#tipe_armada').val('');
						$('#silinder_armada').val('');
						$('#ukuran_armada').val('');
						$('#seat_armada').val('');
						$('#segment_armada').val('');
						$('#status_armada').val('DAMRI');
						$('#active').val(1);
						$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>armada/ax_get_data_by_id';
					var data = {
						id_armada: id_armada
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Form Edit Armada');
						$('#select2-id_bu-container').html(data['nm_bu']);
						$('#select2-id_segment-container').html(data['nm_segment']);
						$('#select2-id_layanan-container').html(data['nm_layanan']);
						$('#select2-id_ukuran-container').html(data['nm_ukuran']);
						$('#select2-id_warna-container').html(data['nm_warna']);
						$('#select2-id_merek-container').html(data['nm_merek']);
						$('#select2-id_layout-container').html(data['nm_layout']);
						$('#id_bu').val(data['id_bu']);
						$('#id_segment').val(data['id_segment']);
						$('#id_ukuran').val(data['id_ukuran']);
						$('#id_layanan').val(data['id_layanan']);
						$('#id_warna').val(data['id_warna']);
						$('#id_merek').val(data['id_merek']);
						$('#id_layout').val(data['id_layout']);
						$('#id_armada').val(data['id_armada']);
						$('#kd_armada').val(data['kd_armada']);
						$('#rangka_armada').val(data['rangka_armada']);
						$('#plat_armada').val(data['plat_armada']);
						$('#mesin_armada').val(data['mesin_armada']);
						$('#tahun_armada').val(data['tahun_armada']);
						$('#merek_armada').val(data['merek_armada']);
						$('#tipe_armada').val(data['tipe_armada']);
						$('#silinder_armada').val(data['silinder_armada']);
						$('#ukuran_armada').val(data['ukuran_armada']);
						$('#seat_armada').val(data['seat_armada']);
						$('#segment_armada').val(data['segment_armada']);
						$('#status_armada').val(data['status_armada']);
						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}

			
			
			function DeleteData(id_armada)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>armada/ax_unset_data';
						var data = {
							id_armada: id_armada
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							armadaTable.ajax.reload();
							alertify.error('Data Armada Dihapus.');
						});
					},
					function(){ }
				);
			}

			
			var attachmentTable = $('#attachmentTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: 
				{
					url: "<?= base_url()?>armada/ax_data_foto/",
					type: 'POST',
					data: function ( d ) {
			         return $.extend({}, d, { 
			         	
			         	"id_armada": $("#id_armada").val(),

			         });
			     	}
				},
				columns: 
				[
					{
						data: "id_armada_foto", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							var kd = "Foto('"+full['kd_armada']+"')";
							// str += '<li><a onclick="'+kd+'"><i class="fa fa-pencil"></i> Edit</a></li>';
							str += '<li><a onClick="DeleteFoto(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					
					{ class:'intro', data: "id_armada_foto" },
					{ data: "nm_armada_foto" },
					// { data: "attachment" },
					{ data: "attachment", render: function(data, type, full, meta)
						{
						var url = "<?= base_url()?>"+"uploads/armada/foto/"+data;
						var op =  "window.open('"+url+"', '_blank');";
						return '<img width="200" height="100" class="attachment-img" onclick="'+op+'" src="'+url+'" alt="No Image">';

						}

					},
					
					
					
					
				],
			});



			/// attachment
			$('#submit').submit(function(e){
            e.preventDefault(); 
           
			if($('#nm_attachment').val() == '')
			{
				alertify.alert("Warning", "Please fill Name.");
			}
			else if($('#file_attachment').val() == ''){
				alertify.alert("Warning", "Please choose Attachment.");
			}
			else
			{
                 $.ajax({
                     url:'<?php echo base_url();?>armada/ax_upload_data_foto',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                   //    success: function(data){
                   //        alert("Attachment Uploaded.");
                   // }
                 // });
             }).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							attachmentTable.ajax.reload();
							// $('#addModalattach').modal('hide');
							alertify.success('Attachment Uploaded.');
						});
         	}
            });

            function DeleteFoto(id_armada_foto)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>armada/ax_unset_foto';
						var data = {
							id_armada_foto: id_armada_foto
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							if(data['status'] == "success")
							{
								attachmentTable.ajax.reload();
								alertify.error('Foto Armada Dihapus.');
							}
						});
					},
					function(){ }
				);
			}

			var stnkTable = $('#stnkTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: 
				{
					url: "<?= base_url()?>armada/ax_data_stnk/",
					type: 'POST',
					data: function ( d ) {
			         return $.extend({}, d, { 
			         	
			         	"id_armada": $("#id_armadastnk").val(),

			         });
			     	}
				},
				columns: 
				[
					{
						data: "id_armada_stnk", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							var kd = "Foto('"+full['kd_armada']+"')";
							// str += '<li><a onclick="'+kd+'"><i class="fa fa-pencil"></i> Edit</a></li>';
							str += '<li><a onClick="DeleteStnk(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					
					{ class:'intro', data: "id_armada_stnk" },
					{ data: "tgl_exp_stnk" },
					{ data: "masa" },
					{ data: "attachment", render: function(data, type, full, meta)
						{
						var url = "<?= base_url()?>"+"uploads/armada/stnk/"+data;
						var op =  "window.open('"+url+"', '_blank');";
						return '<img width="200" height="100" class="attachment-img" onclick="'+op+'" src="'+url+'" alt="No Image">';

						}

					},
					
					
					
					
				],
			});



			/// attachment
			$('#submit_stnk').submit(function(e){
            e.preventDefault(); 
           
			if($('#tgl_exp_stnk').val() == '')
			{
				alertify.alert("Warning", "Please fill Expired Date.");
			}
			else if($('#file_attachment_stnk').val() == ''){
				alertify.alert("Warning", "Please choose Attachment.");
			}
			else
			{
                 $.ajax({
                     url:'<?php echo base_url();?>armada/ax_upload_data_stnk',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                   //    success: function(data){
                   //        alert("Attachment Uploaded.");
                   // }
                 // });
             }).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							stnkTable.ajax.reload();
							// $('#addModalattach').modal('hide');
							alertify.success('Attachment Uploaded.');
						});
         	}
            });

            function DeleteStnk(id_armada_stnk)
			{
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>armada/ax_unset_stnk';
						var data = {
							id_armada_stnk: id_armada_stnk
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							if(data['status'] == "success")
							{
								stnkTable.ajax.reload();
								alertify.error('STNK Armada Dihapus.');
							}
						});
					},
					function(){ }
				);
			}


			

			$(document).ready(function() {
				
				
				$( "#tgl_pp_pegawai" ).datepicker({
				  changeMonth: true,
				  changeYear: true,
				  dateFormat: "yy-mm-dd",
				  yearRange: '1946:2019'
				});
				$("#tgl_pp_pegawai").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});

				$("#tahun_armada, #seat_armada").keydown(function (e) {
									
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
				armadaTable.ajax.reload();
			});


			function Foto(id_armada)
			{
				$('#addModalfotoarmada').modal('show');
				$('#id_armada').val(id_armada);
				attachmentTable.ajax.reload();
				
				setTimeout(function(){ attachmentTable.columns.adjust().draw(); }, 1000);
			}

			function Stnk(id_armada)
			{
				$('#addModalfotostnk').modal('show');
				$('#id_armadastnk').val(id_armada);
				stnkTable.ajax.reload();
				
				setTimeout(function(){ stnkTable.columns.adjust().draw(); }, 1000);
			}

			$( "#tgl_exp_stnk").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});

			$( "#tgl_exp_stnk" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});

			
			
			
		</script>
	</body>
</html>
