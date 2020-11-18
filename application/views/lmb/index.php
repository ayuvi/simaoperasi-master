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
					<h1>LMB</h1>
				</section>
				<section class="invoice">
					<div class="row">
					
					
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<button class="btn btn-primary" onclick='ViewData(0)'>
										<i class='fa fa-plus'></i> Add LMB
									</button>
									<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="Form-add-lmb" id="addModalLabel">Form Add lmb</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" id="id_lmb" name="id_lmb" value='' />
													<div class="form-group">
														<label>Cabang</label>
														<select class="form-control select2" style="width: 100%;" id="id_bu" name="id_bu">
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

													<div class="form-group">
														<label>Armada</label>
														<select class="form-control select2" style="width: 100%;" id="id_armada" name="id_armada">
														<option value="0">--Armada--</option>
														<?php
															foreach ($armada_combobox->result() as $rowmenu) {
														?>
															<option value="<?= $rowmenu->id_armada?>"  ><?= $rowmenu->kd_armada?></option>
														<?php
															}
														?>
														</select>
													</div>

													<div class="form-group">
														<label>Trayek</label>
														<select class="form-control select2" style="width: 100%;" id="id_trayek" name="id_trayek">
														<option value="0">--Trayek--</option>
														<?php
															foreach ($trayek_combobox->result() as $rowmenu) {
														?>
															<option value="<?= $rowmenu->id_trayek?>"  ><?= $rowmenu->nm_point_awal?> - <?= $rowmenu->nm_point_akhir?></option>
														<?php
															}
														?>
														</select>
													</div>
													
													<div class="form-group">
														<label>KD lmb</label>
														<input type="text" id="kd_lmb" name="kd_lmb" class="form-control" placeholder="kd_lmb">
													</div>	

													<div class="form-group">
														<label>lmb Name</label>
														<input type="text" id="nm_lmb" name="nm_lmb" class="form-control" placeholder="lmb Name">
													</div>

													

													
													

													<div class="form-group">
														<label>Active</label>
														<select class="form-control" id="active" name="active">
															<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
															<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
														</select>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary" id='btnSave'>Save</button>
												</div>
											</div>
										</div>
									</div>


									<div class="modal fade" id="addModalcetak" tabindex="" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addModalLabel" aria-hidden="true">
					                  <div class="modal-dialog">
					                    <div class="modal-content">
					                      <div class="modal-header">
					                        <button type="button" class="btn btn-success" id="btnPrint" >Cetak</button>
					                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					                      </div>
					                      <div class="modal-body" >
					                      <div class="row">
					                        <div id="printThis" class="printMe">
					                        </div>
					                      </div>
					                      </div>
					                
					                    </div>
					                  </div>
					                </div>



								</div>
								<div class="panel-body">
									
						<div class="form-group col-lg-4">
							<label>Cabang</label>
							<select class="form-control select2" style="width: 100%;" id="cabang" name="cabang">
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
						<div class="form-group col-lg-4">
							<label>Pool</label>
							
								<?php
									$atribut_pool = 'id="pool" class="form-control select2"';
									echo form_dropdown('pool', $pool, '', $atribut_pool);
								?>
							
						</div>
					
					<div>
						<div class="form-group col-lg-4">
							<label>Armada</label>
								<?php
									$atribut_armada = 'id="armada" class="form-control select2"';
									echo form_dropdown('armada', $armada, '', $atribut_armada);
								?>
						</div>
						<div class="form-group col-lg-4">
							<label >Trayek</label>
								<?php
									$atribut_trayek = 'id="trayek" class="form-control select2"';
									echo form_dropdown('trayek', $trayek, '', $atribut_trayek);
								?>
						</div>
					
						<div class="form-group col-lg-4">
							<label >Tanggal</label>
							
							<input type="text" class="form-control" id="cdate" name="cdate" value="<?= date('Y-m-d')?>">
							
						</div>

						<div class="form-group col-lg-4">
							<label >Cetak</label><br />
							<button class="btn btn-primary" onclick=''>
								<i class='fa fa-print'></i> Laporan LMB
							</button>
						</div>
						
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="lmbTable">
											<thead>
												<tr>
													<th>Options</th>
													<th>#</th>
													<th>Cabang</th>
													<th>Pool</th>
													<th>Armada</th>
													<th>Driver</th>
													<th>Trayek</th>
													<th>Rit</th>
													<th>Cdate</th>
													<th>Status</th>
												</tr>
											</thead>
										</table>
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
		cabangfilter = 'kosong';
		armadafilter = 'kosong';
		poolfilter = 'kosong';
		trayekfilter = 'kosong';
		dt = 'kosong';
		
			var lmbTable = $('#lmbTable').DataTable({
				"ordering" : false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: 
				{
					url: "<?= base_url()?>lmb/ax_data_lmb/",
					type: 'POST',
					data: function ( d ) {
					 return $.extend({}, d, { 	
						"cabang"	: $("#id_cabang").val(),
						"kd_segmen"	: $("#kd_segmen").val(),
						"id_pool"	: $("#id_pool").val(),
					 });
					}
				},
				columns: 
				[
					{
						data: "id_lmb", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a href="<?= base_url()?>lmb/access/'+data+'"><i class="fa fa-money"></i> Beban</a></li>';
							str += '<li><a href="<?= base_url()?>lmb/teknik/'+data+'"><i class="fa fa-wrench"></i> Teknik</a></li>';
							str += '<li><a href="<?= base_url()?>lmb/rit/'+data+'"><i class="fa fa-exchange"></i> Tambah Rit</a></li>';
							str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							str += '<li><a onclick="cetak(' + data + ')"><i class="fa fa-print"></i> Cetak</a></li>';
							str += '<li><a onclick="cetakdetkomponen(' + data + ')"><i class="fa fa-print"></i> Cetak Detail Komponen</a></li>';
							str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					{ data: "id_lmb" },
					{ data: "nm_bu" },
					{ data: "nm_pool" },
					{ data: "kd_armada" },
					{ data: "nm_driver" },
					{ data: "kd_trayek" },
					{ data: "rit" },
					{ data: "cdate" },
					{ class: "intro",data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return '<span class="label label-success">Open</span>';
							else return '<span class="label label-danger">Closed</span>';
						}
					}
				]
			});
			
			$('#btnSave').on('click', function () {
				if($('#nm_lmb').val() == '')
				{
					alertify.alert("Warning", "Please fill Province Name.");
				}

				else
				{
					var url = '<?=base_url()?>lmb/ax_set_data';
					var data = {
						id_lmb: $('#id_lmb').val(),
						id_bu: $('#id_bu').val(),
						nm_lmb: $('#nm_lmb').val(),
						kd_lmb: $('#kd_lmb').val(),
						
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
							alertify.success("LMB data saved.");
							$('#addModal').modal('hide');
							lmbTable.ajax.reload();
						}
					});
				}
			});
			
			function ViewData(id_lmb)
			{
				if(id_lmb == 0)
				{
					$('#addModalLabel').html('Add LMB');
					$('#id_lmb').val('');
					$('#id_bu').val('0');
					$('#select2-id_lmb-container').html("--lmb--");
					$('#select2-id_bu-container').html("--BU--");
					$('#nm_lmb').val('');
					$('#kd_lmb').val('');
					
					$('#active').val('1');
					$('#addModal').modal('show');
				}
				else
				{
					var url = '<?=base_url()?>lmb/ax_get_data_by_id';
					var data = {
						id_lmb: id_lmb
					};
							
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabel').html('Edit LMB');
						$('#id_lmb').val(data['id_lmb']);
						$('#select2-id_lmb-container').html(data['nm_lmb']);
						$('#select2-id_bu-container').html(data['nm_bu']);
						$('#id_bu').val(data['id_bu']);
						$('#nm_lmb').val(data['nm_lmb']);
						$('#kd_lmb').val(data['kd_lmb']);
						
						$('#active').val(data['active']);
						$('#addModal').modal('show');
					});
				}
			}
			
			function DeleteData(id_lmb){
				alertify.confirm(
					'Confirmation', 
					'Are you sure you want to delete this data?', 
					function(){
						var url = '<?=base_url()?>lmb/ax_unset_data';
						var data = {
							id_lmb: id_lmb
						};
								
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							lmbTable.ajax.reload();
							alertify.error('LMB data deleted.');
						});
					},
					function(){ }
				);
			}


			function cetak(id_lmb){
				 $.ajax({
		          type: "POST", 
		          url: "<?= base_url() ?>lmb/cetakLmb", 
		          data: {
		            kode  	: id_lmb,
		            }, 
		          dataType: "json",
		          beforeSend: function(e) {
		          if(e && e.overrideMimeType) {
		            e.overrideMimeType("application/json;charset=UTF-8");
		          }
		          },
		          success: function(response){ 
		          $("#printThis").html(response.data).show();
		          $('#addModalcetak').modal('show');
		          //$('#addModalresult').modal('hide');
		          },
		          error: function (xhr, ajaxOptions, thrownError) { 
		          alert(thrownError); 
		          }
		        });
			}
			
			function cetakdetkomponen(id_lmb){
				 $.ajax({
		          type: "POST", 
		          url: "<?= base_url() ?>lmb/cetakdetkomponenLmb", 
		          data: {
		            kode  	: id_lmb,
		            }, 
		          dataType: "json",
		          beforeSend: function(e) {
		          if(e && e.overrideMimeType) {
		            e.overrideMimeType("application/json;charset=UTF-8");
		          }
		          },
		          success: function(response){ 
		          $("#printThis").html(response.data).show();
		          $('#addModalcetak').modal('show');
		          //$('#addModalresult').modal('hide');
		          },
		          error: function (xhr, ajaxOptions, thrownError) { 
		          alert(thrownError); 
		          }
		        });
			}
			
			function removeOptions(selectbox){
				var i;
				for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
				{
					selectbox.remove(i);
				}
			}




		jQuery.fn.extend({
        printElem: function() {
          var cloned = this.clone();
        var printSection = $('#printSection');
        if (printSection.length == 0) {
          printSection = $('<div id="printSection"></div>')
          $('body').append(printSection);
        }
        printSection.append(cloned);
        var toggleBody = $('body *:visible');
        toggleBody.hide();
        $('#printSection, #printSection *').show();
        window.print();
        printSection.remove();
        toggleBody.show();
        }
      });

		$(document).ready(function(){
			$(document).on('click', '#btnPrint', function(){
				$('.printMe').printElem();
			});
			
			$("#cabang").on("change", function(){
				cabangfilter = $(this).val();
				var baseUrl = '<?= base_url(); ?>lmb/get_chain_pool/'+cabangfilter;
				var baseUrlarmada = '<?= base_url(); ?>lmb/get_chain_armada/'+cabangfilter;
				var baseUrltrayek = '<?= base_url(); ?>lmb/get_chain_trayek/'+cabangfilter;
				removeOptions(document.getElementById("pool"));
				removeOptions(document.getElementById("armada"));
				removeOptions(document.getElementById("trayek"));
				var pool = ["--Pilih--"];
				var armada = ["--Pilih--"];
				var trayek = ["--Pilih--"];
				$.ajax({
					url: baseUrl,
					dataType: 'json',
					success: function(datas){
						$.map(datas, function (obj) {
							pool.push({
							   'id': obj.id_pool,
							   'text': obj.nm_pool
							});
							return pool;
							
						});
						$("#pool").select2({
							placeholder: "Pilih",
							data: pool
						});
					}
				});
				
				$.ajax({
					url: baseUrlarmada,
					dataType: 'json',
					success: function(datas){
						$.map(datas, function (obj) {
							armada.push({
							   'id': obj.id_armada,
							   'text': obj.kd_armada
							});
							return armada;
							
						});
						$("#armada").select2({
							placeholder: "Pilih",
							data: armada
						});
					}
				});
				
				$.ajax({
					url: baseUrltrayek,
					dataType: 'json',
					success: function(datas){
						$.map(datas, function (obj) {
							trayek.push({
							   'id': obj.id_trayek,
							   'text': obj.kd_trayek
							});
							return trayek;
							
						});
						$("#trayek").select2({
							placeholder: "Pilih",
							data: trayek
						});
					}
				});
				
				var lmbTable = $('#lmbTable').DataTable({
					"ordering" : false,
					"scrollX": true,
					"processing": true,
					"serverSide": true,
					"destroy": true,
					ajax: 
					{
						url: "<?= base_url()?>lmb/ax_data_lmb/"+cabangfilter,
						type: 'POST'
					},
					columns: 
					[
						{
							data: "id_lmb", render: function(data, type, full, meta){
								var str = '';
								str += '<div class="btn-group">';
								str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
								str += '<ul class="dropdown-menu">';
								str += '<li><a href="<?= base_url()?>lmb/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/teknik/'+data+'"><i class="fa fa-users"></i> Teknik</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/rit/'+data+'"><i class="fa fa-users"></i> Tambah Rit</a></li>';
								str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
								str += '<li><a onclick="cetak(' + data + ')"><i class="fa fa-print"></i> Cetak</a></li>';
								str += '<li><a onclick="cetakdetkomponen(' + data + ')"><i class="fa fa-print"></i> Cetak Detail Komponen</a></li>';
								str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
								str += '</ul>';
								str += '</div>';
								return str;
							}
						},
						{ data: "id_lmb" },
						{ data: "nm_bu" },
						{ data: "nm_pool" },
						{ data: "kd_armada" },
						{ data: "nm_driver" },
						{ data: "kd_trayek" },
						{ data: "rit" },
						{ data: "cdate" },
						{ data: "active", render: function(data, type, full, meta){
								if(data == 1)
									return "Active";
								else return "Not Active";
							}
						}
					]
				});

				
			});
			
			$("#pool").on("change", function(){
				poolfilter = $(this).val();
				var baseUrl = '<?php echo base_url(); ?>lmb/ax_data_lmb/'+cabangfilter+'/'+poolfilter+'/'+armadafilter+'/'+trayekfilter+'/'+dt;
				var lmbTable = $('#lmbTable').DataTable({
					"ordering" : false,
					"scrollX": true,
					"processing": true,
					"serverSide": true,
					"destroy": true,
					ajax: 
					{
						url: baseUrl,
						type: 'POST'
					},
					columns: 
					[
						{
							data: "id_lmb", render: function(data, type, full, meta){
								var str = '';
								str += '<div class="btn-group">';
								str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
								str += '<ul class="dropdown-menu">';
								str += '<li><a href="<?= base_url()?>lmb/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/teknik/'+data+'"><i class="fa fa-users"></i> Teknik</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/rit/'+data+'"><i class="fa fa-users"></i> Tambah Rit</a></li>';
								str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
								str += '<li><a onclick="cetak(' + data + ')"><i class="fa fa-print"></i> Cetak</a></li>';
								str += '<li><a onclick="cetakdetkomponen(' + data + ')"><i class="fa fa-print"></i> Cetak Detail Komponen</a></li>';
								str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
								str += '</ul>';
								str += '</div>';
								return str;
							}
						},
						{ data: "id_lmb" },
						{ data: "nm_bu" },
						{ data: "nm_pool" },
						{ data: "kd_armada" },
						{ data: "nm_driver" },
						{ data: "kd_trayek" },
						{ data: "rit" },
						{ data: "cdate" },
						{ class: "intro",data: "active", render: function(data, type, full, meta){
							if(data == 1)
								return '<span class="label label-success">Open</span>';
							else return '<span class="label label-danger">Closed</span>';
							}
						}
					]
				});
			
			});
			
			$("#armada").on("change", function(){
				armadafilter = $(this).val();
				var baseUrl = '<?php echo base_url(); ?>lmb/ax_data_lmb/'+cabangfilter+'/'+poolfilter+'/'+armadafilter+'/'+trayekfilter+'/'+dt;
				var lmbTable = $('#lmbTable').DataTable({
					"ordering" : false,
					"scrollX": true,
					"processing": true,
					"serverSide": true,
					"destroy": true,
					ajax: 
					{
						url: baseUrl,
						type: 'POST'
					},
					columns: 
					[
						{
							data: "id_lmb", render: function(data, type, full, meta){
								var str = '';
								str += '<div class="btn-group">';
								str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
								str += '<ul class="dropdown-menu">';
								str += '<li><a href="<?= base_url()?>lmb/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/teknik/'+data+'"><i class="fa fa-users"></i> Teknik</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/rit/'+data+'"><i class="fa fa-users"></i> Tambah Rit</a></li>';
								str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
								str += '<li><a onclick="cetak(' + data + ')"><i class="fa fa-print"></i> Cetak</a></li>';
								str += '<li><a onclick="cetakdetkomponen(' + data + ')"><i class="fa fa-print"></i> Cetak Detail Komponen</a></li>';
								str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
								str += '</ul>';
								str += '</div>';
								return str;
							}
						},
						{ data: "id_lmb" },
						{ data: "nm_bu" },
						{ data: "nm_pool" },
						{ data: "kd_armada" },
						{ data: "nm_driver" },
						{ data: "kd_trayek" },
						{ data: "rit" },
						{ data: "cdate" },
						{ data: "active", render: function(data, type, full, meta){
								if(data == 1)
									return "Active";
								else return "Not Active";
							}
						}
					]
				});
			
			});
			
			$("#trayek").on("change", function(){
				trayekfilter = $(this).val();
				var baseUrl = '<?php echo base_url(); ?>lmb/ax_data_lmb/'+cabangfilter+'/'+poolfilter+'/'+armadafilter+'/'+trayekfilter+'/'+dt;
				var lmbTable = $('#lmbTable').DataTable({
					"ordering" : false,
					"scrollX": true,
					"processing": true,
					"serverSide": true,
					"destroy": true,
					ajax: 
					{
						url: baseUrl,
						type: 'POST'
					},
					columns: 
					[
						{
							data: "id_lmb", render: function(data, type, full, meta){
								var str = '';
								str += '<div class="btn-group">';
								str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
								str += '<ul class="dropdown-menu">';
								str += '<li><a href="<?= base_url()?>lmb/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/teknik/'+data+'"><i class="fa fa-users"></i> Teknik</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/rit/'+data+'"><i class="fa fa-users"></i> Tambah Rit</a></li>';
								str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
								str += '<li><a onclick="cetak(' + data + ')"><i class="fa fa-print"></i> Cetak</a></li>';
								str += '<li><a onclick="cetakdetkomponen(' + data + ')"><i class="fa fa-print"></i> Cetak Detail Komponen</a></li>';
								str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
								str += '</ul>';
								str += '</div>';
								return str;
							}
						},
						{ data: "id_lmb" },
						{ data: "nm_bu" },
						{ data: "nm_pool" },
						{ data: "kd_armada" },
						{ data: "nm_driver" },
						{ data: "kd_trayek" },
						{ data: "rit" },
						{ data: "cdate" },
						{ data: "active", render: function(data, type, full, meta){
								if(data == 1)
									return "Active";
								else return "Not Active";
							}
						}
					]
				});
			
			});
			
			$( "#cdate").datepicker({
	              changeMonth: true,
	              changeYear: true,
	              dateFormat: "yy-mm-dd"
	        });
			
			$("#cdate").on("change", function(){
				dt = $(this).val();
				var baseUrl = '<?php echo base_url(); ?>lmb/ax_data_lmb/'+cabangfilter+'/'+poolfilter+'/'+armadafilter+'/'+trayekfilter+'/'+dt;
				var lmbTable = $('#lmbTable').DataTable({
					"ordering" : false,
					"scrollX": true,
					"processing": true,
					"serverSide": true,
					"destroy": true,
					ajax: 
					{
						url: baseUrl,
						type: 'POST'
					},
					columns: 
					[
						{
							data: "id_lmb", render: function(data, type, full, meta){
								var str = '';
								str += '<div class="btn-group">';
								str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
								str += '<ul class="dropdown-menu">';
								str += '<li><a href="<?= base_url()?>lmb/access/'+data+'"><i class="fa fa-users"></i> Access</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/teknik/'+data+'"><i class="fa fa-users"></i> Teknik</a></li>';
								str += '<li><a href="<?= base_url()?>lmb/rit/'+data+'"><i class="fa fa-users"></i> Tambah Rit</a></li>';
								str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
								str += '<li><a onclick="cetak(' + data + ')"><i class="fa fa-print"></i> Cetak</a></li>';
								str += '<li><a onclick="cetakdetkomponen(' + data + ')"><i class="fa fa-print"></i> Cetak Detail Komponen</a></li>';
								str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
								str += '</ul>';
								str += '</div>';
								return str;
							}
						},
						{ data: "id_lmb" },
						{ data: "nm_bu" },
						{ data: "nm_pool" },
						{ data: "kd_armada" },
						{ data: "nm_driver" },
						{ data: "kd_trayek" },
						{ data: "rit" },
						{ data: "cdate" },
						{ data: "active", render: function(data, type, full, meta){
								if(data == 1)
									return "Active";
								else return "Not Active";
							}
						}
					]
				});
			});	
			
		});


			</script>
	</body>
</html>
