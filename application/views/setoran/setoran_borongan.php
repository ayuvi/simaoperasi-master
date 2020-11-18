<!DOCTYPE html>
<html>
<head>
	<?= $this->load->view('head'); ?>
</head>

<body class="sidebar-mini sidebar-collapse wysihtml5-supported <?= $this->config->item('color')?>">
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
				<h1>Setoran Borongan</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php //if($this->session->userdata('login')['id_level'] == 1 || $this->session->userdata('login')['id_level'] == 6){ ?>
								<button class="btn btn-info" onclick='ViewData(0)'>
									<i class='fa fa-save'></i> Tambah Setoran Borongan
								</button>
								<?php //}?>
								<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
									</div>
								</div>
							</div>
							<div class="panel-body">

								<div class="row">
									<div class="form-group col-lg-4">
										<label>Cabang</label>
										<select class="form-control select2 " style="width: 100%;" id="id_bu_filter" name="id_bu_filter">
											<!-- <option value="0">--Cabang--</option> -->
											<?php
											foreach ($combobox_bu->result() as $rowmenu) {
												?>
												<option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
												<?php
											}
											?>
										</select>
									</div>
									<div class="form-group col-md-3">
										<label>Pool</label>
										<select class="form-control select2" style="width: 100%;" id="id_pool">
											<option value="0"> -- Pool -- </option>

										</select>
									</div>
									<div class="form-group col-lg-3">
										<label>Status</label>
										<select class="form-control" style="width: 100%;" id="active" name="active">
											<option value="1">Open</option>
											<option value="2">Close</option>

										</select>
									</div>
									<div class="form-group col-lg-2">
										<label>Tanggal</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="tgl_filter" name="tgl_filter" placeholder="Tanggal" value="<?= date('Y-m-d')?>">
										</div>
									</div>
								</div>

								<div class="nav-tabs-custom">

									<ul class="nav nav-tabs">
										<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">List Setoran Borongan</a></li>
										<li class=" disabled"><a href="#tab_6" class="disabled" aria-expanded="false">Detail Setoran Borongan</a></li>
										<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Pilih Jadwal</a></li>
									</ul>
									<div class="tab-content">

										<div class="tab-pane active" id="tab_1">
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="setoranTable">
													<thead>
														<tr>
															<th width="150px">#</th>
															<th>ID</th>
															<th>Pool</th>
															<th>Tanggal Setoran</th>
															<th>Armada</th>
															<th>Pendapatan</th>
															<th>Biaya</th>
															<th>Surplus</th>
														</tr>
													</thead>
												</table>
											</div>
										</div><!-- /.tab-pane -->

										<div class="tab-pane" id="tab_2">
											<div class="modal-content">
												<div class="box box-primary box-solid">
													<div class="box-header with-border">
														<h6 class="box-title">Pilih Jadwal</h6>
														<div class="box-tools pull-right">
															<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
														</div>
													</div>
													<div class="box-body">
														<div class="modal-body">
															<input type="hidden" id="id_setoran_header" name="id_setoran_header" class="form-control" placeholder="Kode Armada" readonly="true">
															<input type="hidden" id="armada_detail" name="armada_detail" class="form-control" placeholder="Kode Armada" readonly="true">
															<div class="row">
																<div class="form-group col-lg-12">
																	<label>Armada</label>
																	<select class="form-control select2 " style="width: 100%;" id="armada" name="armada">
																		<option value="0">-- Armada --</option>
																	</select>
																</div>
																<div class="form-group col-lg-12">
																	<label>Cari Data</label>
																	<select class="form-control select2 " style="width: 100%;" id="id_jadwal" name="id_jadwal">
																		<option value="0">-- Data Bis --</option>
																	</select>
																</div>
																<div class="form-group col-lg-4">
																	<label>Armada</label>
																	<input type="text" id="kd_armada" name="kd_armada" class="form-control" placeholder="Armada" readonly="true">
																</div>
																<div class="form-group col-lg-4">
																	<label>Driver 1</label>
																	<input type="hidden" id="driver1" name="driver1" class="form-control" placeholder="driver" readonly="true">
																	<input type="text" id="nm_pegawai1" name="nm_pegawai1" class="form-control" placeholder="Driver 1" readonly="true">
																</div>
																<div class="form-group col-lg-4">
																	<label>Driver 2</label>
																	<input type="hidden" id="driver2" name="driver2" class="form-control" placeholder="driver" readonly="true">
																	<input type="text" id="nm_pegawai2" name="nm_pegawai2" class="form-control" placeholder="Driver 2" readonly="true">
																</div>

																<div class="form-group col-lg-6">
																	<label>Trayek</label>
																	<input type="hidden" id="asal" name="asal" class="form-control" placeholder="asal" readonly="true">
																	<input type="hidden" id="tujuan" name="tujuan" class="form-control" placeholder="tujuan" readonly="true">

																	<input type="text" id="asal_tujuan" name="asal_tujuan" class="form-control" placeholder="Nama Trayek" readonly="true">
																</div>
																<div class="form-group col-lg-3">
																	<label>Keberangkatan</label>
																	<input type="text" id="tgl_keberangkatan" name="tgl_keberangkatan" class="form-control" placeholder="Tanggal Keberangkatan" readonly="true">
																</div>

																<div class="form-group col-lg-3">
																	<label>Segmen</label>
																	<input type="text" id="kd_segmen" name="kd_segmen" class="form-control" placeholder="Segmen" readonly="true">
																</div>

															</div>
														</div>
													</div>
												</div>

												<div class="modal-footer">
													<button type="button" class="btn bg-purple btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
													<button type="button" class="btn btn-success" id='btnSaveDetail'>Simpan</button>
												</div>

											</div>
										</div><!-- /.tab-pane -->

										<!-- /.tab-pane -->
										<div class="tab-pane" id="tab_6">
											<div class="row">
												<div class="col-lg-12">
													<button type="button" class="btn bg-purple btn-default pull-right" onClick='closeTabDetail()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>	
												</div>
												<p style="height: 30px"></p>
											</div>
											<!-- Detail Penumpang -->
											<div class="modal-content">
												<div class="box box-primary box-solid">
													<div class="box-header with-border">
														<h6 class="box-title">Detail Pendapatan Borongan</h6>
														<div class="box-tools pull-right">
															<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
														</div>
													</div>
													<div class="box-body no-padding">
														<div class="modal-body">

															<!-- <div class="row">
																<div class="row" style="background-color:LightGray;margin-left: 3px;margin-right: 3px;">
																	<div style="margin: 10px 10px 10px 10px">
																		<label class="control-label col-md-2">UDJ Bagasi</label>
																		<div class="col-md-10">
																			<input type="checkbox" data-toggle="toggle" data-size="normal" id="status_udj_bagasi" name="status_udj_bagasi" data-onstyle="success">
																			<p id="ket_status_udj_bagasi"></p>
																		</div>
																	</div>
																</div>
															</div> -->

															<!-- <input type="hidden" id="id_setoran_detail_pnp_" class="form-control" name="id_setoran_detail_pnp_" value='0' /> 
															<input type="hidden" id="id_setoran_detail_pnp" class="form-control" name="id_setoran_detail_pnp" readonly="true" placeholder="id_setoran_detail"/> 
															<input type="hidden" id="id_setoran_header_pnp" name="id_setoran_header_pnp" class="form-control" placeholder="id_setoran" readonly="true">
															<input type="hidden" id="armada_detail_pnp" name="armada_detail_pnp" class="form-control" placeholder="Kode Armada" readonly="true">
															<input type="hidden" id="tgl_pnp" name="tgl_pnp" class="form-control" placeholder="Kode Armada" readonly="true"> -->
															<input type="hidden" id="id_jadwal_pnp" name="id_jadwal_pnp" class="form-control" placeholder="Kode Armada" readonly="true">
															<!-- <div class="row">

																<div class="form-group col-lg-8">
																	<label>Asal - Tujuan</label>
																	<select class="form-control select2" style="width: 100%;" id="kd_trayek_pnp" name="kd_trayek_pnp">
																		<option value="0">-- Trayek --</option>
																	</select>
																</div>
																<div class="form-group col-lg-4">
																	<label>Harga</label>
																	<input type="number" id="harga_pnp" name="harga_pnp" class="form-control" placeholder="Harga Satuan">
																</div>

															</div>
															<div class="row">
																<div class="form-group col-lg-4">
																	<label>Jenis Penjualan</label>
																	<select class="form-control select2" style="width: 100%;" id="jenis_penjualan_pnp" name="jenis_penjualan_pnp">
																		<option value="0">-- Jenis Penjualan --</option>
																		<option value="1">Damri Apps</option>
																		<option value="2">OTA (Online Travel Agent)</option>
																		<option value="3">Agen</option>
																		<option value="4">Loket</option>
																		<option value="5">Awak Bus</option>

																	</select>
																</div>
																<div class="form-group col-lg-2">
																	<label>RIT</label>
																	<select class="form-control" style="width: 100%;" id="rit_pnp" name="armada">
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																		<option value="6">6</option>
																		<option value="7">7</option>
																		<option value="8">8</option>
																		<option value="9">9</option>
																		<option value="10">10</option>
																		<option value="11">11</option>
																		<option value="12">12</option>
																		<option value="13">13</option>
																		<option value="14">14</option>
																		<option value="15">15</option>

																	</select>
																</div>
																<div class="form-group col-lg-3">
																	<label>Jumlah Penumpang</label>
																	<input type="number" id="jumlah_pnp" name="jumlah_pnp" class="form-control" placeholder="Jumlah Penumpang">
																</div>
																<div class="form-group col-lg-3">
																	<label>Pendapatan Bagasi</label>
																	<input type="number" id="bagasi_pnp" name="bagasi_pnp" class="form-control" placeholder="Pendapatan Bagasi" value="0">
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-info pull-left" onClick='getDataTicket()'><i class="fa fa-cloud-download"></i> Ambil Data E-ticket</button>

																<button type="button" class="btn btn-warning pull-left" onClick='tampilGetData()'><i class="fa fa-cloud-download"></i> Tampil Semua Data</button>

																<button type="button" class="btn bg-purple btn-default" onClick='closeTabDetail()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
																<button type="button" class="btn btn-success" id='btnSaveDetailPng'><i class='fa fa-save'></i> Simpan</button>
															</div> -->

															<div class="modal-body">
																<div class="dataTable_wrapper">
																	<table class="table table-striped table-bordered table-hover" id="setoranTableDetailPng">
																		<thead>
																			<tr>
																				<th>Nama</th>
																				<th>CP</th>
																				<th>Asal - Tujuan</th>
																				<th>Penumpang</th>
																				<th>Harga</th>
																			</tr>
																		</thead>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Detail Penumpang -->


											<!-- Detail Beban -->
											<div class="modal-content">
												<div class="box box-primary box-solid">
													<div class="box-header with-border">
														<h6 class="box-title">Tambah Detail Beban</h6>
														<div class="box-tools pull-right">
															<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
														</div>
													</div>
													<div class="box-body no-padding">
														<div class="modal-body">
															<input type="hidden" id="id_setoran_beban" name="id_setoran_beban" value='0' /> 
															<input type="hidden" id="id_setoran_header_beban" name="id_setoran_header_beban" class="form-control" placeholder="Kode Armada" readonly="true">
															<input type="hidden" id="armada_detail_beban" name="armada_detail_beban" class="form-control" placeholder="Kode Armada" readonly="true">
															<input type="hidden" id="tgl_beban" name="tgl_beban" class="form-control" placeholder="Kode Armada" readonly="true">
															<div class="row" style="background-color:LightGray;margin-left: 3px;margin-right: 3px;">
																<div style="margin: 10px 10px 10px 10px">
																	<label class="control-label col-md-2">UDJ Pengemudi</label>
																	<div class="col-md-10">
																		<input type="checkbox" data-toggle="toggle" data-size="normal" id="status_udj" name="status_udj" data-onstyle="success">
																		<p id="ket_status_udj"></p>
																	</div>
																</div>
															</div>
															<div class="row">
																<small class="col-md-12"><b><font color="red">* Jika tidak ada UDJ Pengemudi..Pilih Uang Makan</font></b></small>
															</div>

															<div class="row">
																<div class="form-group col-lg-3">
																	<label>Jenis Beban</label>
																	<select class="form-control select2" style="width: 100%;" id="id_jenis_beban" name="id_jenis_beban" onchange="on_off_beban()">
																		<option value="0">-- Jenis --</option>
																	</select>
																</div>
																<div class="form-group col-lg-3" id="div_jumlah_beban">
																	<label>Jumlah</label>
																	<input type="number" class="form-control"  data-decimals="2" min="0" id="jumlah_beban" name="jumlah_beban" value='' placeholder="Jumlah" />
																	<small><font color="blue">* Untuk decimal gunakan tanda koma(,)</font></small>
																</div>
																<div class="form-group col-lg-3" id="div_harga_beban">
																	<label>Harga</label>
																	<input type="number" class="form-control" data-decimals="0" min="0" id="harga_beban" name="harga_beban" placeholder="Harga Satuan">
																</div>
																<div class="form-group col-lg-3" id="div_status_jenis_beban">
																	<label>Status beban (biaya titipan)</label>
																	<select class="form-control" style="width: 100%;" id="status_jenis_beban" name="status_jenis_beban">
																		<option value="1">ON</option>
																		<option value="0">OFF</option>
																	</select>
																	<small><font color="blue">* Jika status beban biaya titipan <b>(ON)</b> maka UDJ dikurangi biaya titipan</font></small>
																</div>

																<!-- BBM -->
																<div class="form-group col-lg-3" id="div_total_bbm_beban">
																	<label>Harga Total Konsumsi BBM (Rp)</label>
																	<input type="number" class="form-control" data-decimals="0" min="0" id="total_bbm_beban" name="total_bbm_beban" placeholder="Harga Total Konsumsi BBM (Rp)" onblur="sum_total_bbm()">
																</div>
																<div class="form-group col-lg-3" id="div_harga_bbm_beban">
																	<label>Harga BBM per liter (Rp)</label>
																	<input type="number" class="form-control" data-decimals="0" min="0" id="harga_bbm_beban" name="harga_bbm_beban" placeholder="Harga BBM per liter (Rp)" onblur="sum_total_bbm()">
																</div>
																<div class="form-group col-lg-3" id="div_jumlah_bbm_beban">
																	<label>Jumlah BBM (Liter)</label>
																	<input type="number" class="form-control"  data-decimals="2" min="0" id="jumlah_bbm_beban" name="jumlah_bbm_beban" value='' placeholder="Jumlah (Liter)" readonly="readonly" />
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn bg-purple btn-default" onClick='closeTabDetail()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
																<button type="button" class="btn btn-success" id='btnSaveDetailBeban'>Simpan</button>
															</div>
															<div class="modal-body">
																<div class="dataTable_wrapper">
																	<table class="table table-striped table-bordered table-hover" id="setoranTableDetailBeban">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Jenis</th>
																				<th>Jumlah</th>
																				<th>Harga</th>
																				<th>Total</th>
																				<th>Status</th>
																			</tr>
																		</thead>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Detail Beban -->

										</div><!-- /.tab-pane -->


									</div><!-- /.tab-content -->
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
		$("#jumlah_beban").inputSpinner();
		$("#harga_pnp").inputSpinner();
		$("#bagasi_pnp").inputSpinner();
		$("#harga_beban").inputSpinner();

		function on_off_beban() {
			var data = ["22", "23", "24"];
			var id_jenis_beban = $("#id_jenis_beban").val();
			if(data.includes(id_jenis_beban)){
				document.getElementById('div_jumlah_beban').style.display = 'block';
				document.getElementById('div_harga_beban').style.display = 'block';
				document.getElementById('div_status_jenis_beban').style.display = 'block';

				document.getElementById('div_total_bbm_beban').style.display = 'none';
				document.getElementById('div_harga_bbm_beban').style.display = 'none';
				document.getElementById('div_jumlah_bbm_beban').style.display = 'none';
			}else if(id_jenis_beban==7){
				document.getElementById('div_jumlah_beban').style.display = 'none';
				document.getElementById('div_harga_beban').style.display = 'none';
				document.getElementById('div_status_jenis_beban').style.display = 'none';

				document.getElementById('div_total_bbm_beban').style.display = 'block';
				document.getElementById('div_harga_bbm_beban').style.display = 'block';
				document.getElementById('div_jumlah_bbm_beban').style.display = 'block';
				$("#status_jenis_beban").val('1');
				$("#total_bbm_beban").val('');
				$("#harga_bbm_beban").val('');
				$("#jumlah_bbm_beban").val('');
			}else{
				document.getElementById('div_jumlah_beban').style.display = 'block';
				document.getElementById('div_harga_beban').style.display = 'block';
				document.getElementById('div_status_jenis_beban').style.display = 'none';

				document.getElementById('div_total_bbm_beban').style.display = 'none';
				document.getElementById('div_harga_bbm_beban').style.display = 'none';
				document.getElementById('div_jumlah_bbm_beban').style.display = 'none';
				$("#status_jenis_beban").val('1');
			}
		}

		function sum_total_bbm() {
			var total_bbm_beban = $("#total_bbm_beban").val();
			var harga_bbm_beban = $("#harga_bbm_beban").val();
			total_all = total_bbm_beban/harga_bbm_beban;
			$("#jumlah_bbm_beban").val(total_all.toFixed(2));
		}

		var setoranTable = $('#setoranTable').DataTable({
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
						url: "<?= base_url()?>setoran_borongan/ax_data_setoran/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_bu": $("#id_bu_filter").val(),
								"id_pool": $("#id_pool").val(),
								"tanggal": $("#tgl_filter").val(),
								"active": $("#active").val(),

							});
						}
					},
					columns: 
					[
					{ data: "id_setoran", render: function(data, type, full, meta){
						var id = "'"+full['id_setoran']+"','"+full['armada']+"','"+full['id_bu']+"'";
						var id2 = "'"+full['id_setoran']+"','"+full['tgl_setoran']+"','"+full['armada']+"','"+full['id_bu']+"','"+full['id_jadwal']+"','"+full['active']+"'";
						var id4 = "'"+full['id_setoran']+"','"+full['armada']+"','"+full['tanggal']+"','"+full['id_bu']+"','"+full['id_jadwal']+"','"+full['status_udj']+"','"+full['status_udj_bagasi']+"'";

						var str = '<div class="btn-group">';
						str += '<a type="button" title="Detail Jadwal" class="btn btn-sm btn-info" onclick="tambahPng(' + id4 + ')"><i class="fa fa-list"></i> </a>';					

						if(full['active']==1){
							str += '<a type="button" class="btn btn-sm btn-danger" title="Delete Data" onClick="hapusHeader(' + data + ')"><i class="fa fa-trash"></i> </a>';

							str += '<a type="button" title="Print AK13" class="btn btn-sm bg-olive" onclick="printAK13(' + id2 + ')"><i class="fa fa-print"></i> </a>';	
							str += '<a type="button" title="Print Slip Setoran" class="btn btn-sm bg-olive" onclick="printSlip(' + id2 + ')"><i class="fa fa-print"></i> </a>';	

							str += '<a type="button" class="btn btn-sm btn-warning" onClick="changeActive(' + data + ','+full['active']+')" title="Close Setoran"><i class="fa fa-sign-out"></i> </a>';
						}else{
							str += '<a type="button" class="btn btn-sm btn-danger" title="Delete Data" onClick="hapusHeader(' + data + ')"><i class="fa fa-trash"></i> </a>';
							str += '<a type="button" title="Print AK13" class="btn btn-sm bg-olive" onclick="printAK13(' + id2 + ')"><i class="fa fa-print"></i> </a>';	
							str += '<a type="button" title="Print Slip Setoran" class="btn btn-sm bg-olive" onclick="printSlip(' + id2 + ')"><i class="fa fa-print"></i> </a>';	
							str += '<a type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> </a>';
						}
						

						str += '</div>';
						return str;
					}},
					{ class: "intro", data: "id_setoran" },
					{ class: "intro", data: "nm_pool" },
					{ data: "tgl_setoran" },
					{ data: "armada" },
					{ data: "total_pend", render: $.fn.dataTable.render.number( '.', ',',2 ) },
					{ data: "total_biaya", render: $.fn.dataTable.render.number( '.', ',',2 ) },
					{ data: "total_pend", render: function(data, type, full, meta){
						return angka(parseInt(data-full['total_biaya']).toFixed(2));
					} },
					]
				});

		var setoranTableDetailPng = $('#setoranTableDetailPng').DataTable({
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
						url: "<?= base_url()?>setoran_borongan/ax_data_setoran_detail_pnp/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_jadwal": $("#id_jadwal_pnp").val()
							});
						}
					},
					columns: 
					[
					{ data: "nama" },
					{ data: "kontak_person" },
					{ data: "asal_tujuan" },
					{ data: "jum_penumpang", render: $.fn.dataTable.render.number( '.', ',',0 ) },
					{ data: "upp", render: $.fn.dataTable.render.number( '.', ',',0 ) }
					]
				});

		var setoranTableDetailBeban = $('#setoranTableDetailBeban').DataTable({
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
						url: "<?= base_url()?>setoran_borongan/ax_data_setoran_detail_beban/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_setoran": $("#id_setoran_header_beban").val()
							});
						}
					},
					columns: 
					[
					{ data: "id_setoran_beban", render: function(data, type, full, meta){
						var str = '';
						str += '<button class="btn btn-danger btn.flat" onclick="hapusBeban(' + data + ')"><i class="fa fa-trash"></i></button>';
						return str;
					}},
					{ data: "nm_komponen" },
					{ data: "jumlah", render: $.fn.dataTable.render.number( '.', ',',2 ) },
					{ data: "harga", render: $.fn.dataTable.render.number( '.', ',',0 ) },
					{ data: "total", render: $.fn.dataTable.render.number( '.', ',',2 ) },
					{ data: "status_jenis_beban", render: function(data, type, full, meta){
						if(data==0){
							return 'OFF';
						}else{
							return 'ON';
						}
					} },
					]
				});

		$('#btnSaveDetail').on('click', function () {
			if($('#id_jadwal').val() == '0'){
				alertify.alert("Warning", "Cari data Belum di Isi.");
			}else {
				var url = '<?=base_url()?>setoran_borongan/ax_set_data_detail';
				var id_bu = $('#id_bu_filter').val();
				var kd_armada = $('#armada').val();
				var data = {
					id_setoran_header: $('#id_setoran_header').val(),
					tgl_setoran: $('#tgl_filter').val(),
					id_bu: $('#id_bu_filter').val(),
					id_pool: $('#id_pool').val(),
					id_jadwal: $('#id_jadwal').val(),
					armada: $('#armada').val()
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Duplicate");
						}}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "1")
						{
							alertify.success("Data setoran Disimpan.");
							$('#id_jadwal').val(null).trigger('change');
							$('.nav-tabs a[href="#tab_1"]').tab('show');
							setoranTable.ajax.reload();
							setoranTable.columns.adjust().draw();
							armadalist();
						}else{
							alertify.error("Data setoran Gagal Disimpan.");
						}
					});
				}
			});

		$('#btnSaveDetailPng').on('click', function () {
			if($('#kd_trayek_pnp').val() == '0'){
				alertify.alert("Warning", "Asal - Tujuan Belum di Pilih.");
			}else if($('#harga_pnp').val() == ''){
				alertify.alert("Warning", "Harga Belum di Isi.");
			}else if($('#jenis_penjualan_pnp').val() == '0'){
				alertify.alert("Warning", "Jenis Penjualan Belum di Pilih.");
			}else if($('#jumlah_pnp').val() == ''){
				alertify.alert("Warning", "Jumlah Belum di Isi.");
			}else {
				var url = '<?=base_url()?>setoran_borongan/ax_set_data_detail_pnp';
				var data = {
					id_setoran_detail_pnp: $('#id_setoran_detail_pnp_').val(),
					id_setoran_header: $('#id_setoran_header_pnp').val(),
					id_setoran_detail: $('#id_setoran_detail_pnp').val(),
					armada: $('#armada_detail_pnp').val(),
					tanggal: $('#tgl_pnp').val(),
					kd_trayek: $('#kd_trayek_pnp').val(),
					jumlah_pnp: $('#jumlah_pnp').val(),
					rit_pnp: $('#rit_pnp').val(),
					harga_pnp: $('#harga_pnp').val(),
					bagasi_pnp: $('#bagasi_pnp').val(),
					jenis_penjualan_pnp: $('#jenis_penjualan_pnp').val()
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Duplicate");
						}}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status'] == "1"){
							alertify.success("Data setoran Disimpan.");
							setoranTableDetailPng.ajax.reload();
							$('#select2-kd_trayek_pnp-container').html('--Trayek--');
							$('#kd_trayek_pnp').val('');
							$('#jumlah_pnp').val('');
							$('#harga_pnp').val('');
							$('#bagasi_pnp').val('');
						}else{
							alertify.error("Data setoran Gagal Disimpan.");
							setoranTableDetailPng.ajax.reload();
						}
					});
				}
			});

		$('#btnSaveDetailBeban').on('click', function () {
			if($('#id_jenis_beban').val() == '0'){
				alertify.alert("Warning", "Jenis Beban Belum di Isi.");
			}else {
				var url = '<?=base_url()?>setoran_borongan/ax_set_data_detail_beban';

				var jenis = $('#id_jenis_beban').val();

				if(jenis==7){
					var data = {
						id_setoran_beban: $('#id_setoran_beban').val(),
						id_setoran_header: $('#id_setoran_header_beban').val(),
						armada: $('#armada_detail_beban').val(),
						tanggal: $('#tgl_beban').val(),
						id_jenis: $('#id_jenis_beban').val(),
						jumlah_beban: $('#jumlah_bbm_beban').val(),
						harga_beban: $('#harga_bbm_beban').val(),
						total_beban: $('#total_bbm_beban').val(),
						status_jenis_beban: $('#status_jenis_beban').val()
					};
				}else{
					var data = {
						id_setoran_beban: $('#id_setoran_beban').val(),
						id_setoran_header: $('#id_setoran_header_beban').val(),
						armada: $('#armada_detail_beban').val(),
						tanggal: $('#tgl_beban').val(),
						id_jenis: $('#id_jenis_beban').val(),
						jumlah_beban: $('#jumlah_beban').val(),
						harga_beban: $('#harga_beban').val(),
						status_jenis_beban: $('#status_jenis_beban').val()
					};
				}
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "1")
					{
						alertify.success("Data setoran Disimpan.");
						setoranTableDetailBeban.ajax.reload();
						$('#select2-id_jenis_beban-container').html('--Jenis--');
						$('#id_jenis_beban').val('');
						$('#jumlah_beban').val('');
						$('#harga_beban').val('');
						$('#total_bbm_beban').val('');
						$('#harga_bbm_beban').val('');
						$('#jumlah_bbm_beban').val('');
					}else{
						alertify.error("Data setoran Gagal Disimpan.");
						setoranTableDetailBeban.ajax.reload();
					}
				});
			}
		});

		$('#btnSaveEditPnp').on('click', function () {
			if($('#rit_edit_pnp').val()=='' || $('#rit_edit_pnp').val()=='0' || $('#rit_edit_pnp').val() == null){
				alertify.alert("Perhatian","RIT Tidak Boleh Kosong");
				return;
			}else if($('#jenis_penjualan_edit_pnp').val()=='' || $('#jenis_penjualan_edit_pnp').val()=='0' || $('#jenis_penjualan_edit_pnp').val() == null){
				alertify.alert("Perhatian","Jenis Penjualan Tidak Boleh Kosong");
				return;
			}
			else{
				var url = '<?=base_url()?>setoran_borongan/ax_set_data_update_png';
				var formData = new FormData($('#formEditPnp')[0]);
				$.ajax({
					url : url,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					dataType: "JSON",
					success: function(data)
					{
						if(data.status)
						{
							alertify.success("Data Terupdate.");
							$('#editPngModal').modal('hide');
							setoranTableDetailPng.ajax.reload();
						}
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error adding / update data');
					}
				});

			}
		});

		function ViewData(id_setoran){
			if(id_setoran == 0){
				$('#select2-armada-container').html("--Armada--");
				$('#armada').val(0);
				$('#id_setoran_header').val(0);

				if($('#id_bu_filter').val()!='0' && $('#id_pool').val()!='0' && $('#tgl_filter').val()!=''){
					$('#addModalLabel').html('Form Tambah Setoran');
					$('.nav-tabs a[href="#tab_2"]').tab('show');
				}else{
					alertify.alert("Warning", "Pilih Cabang, Pilih Pool dan Isi tanggal terlebih dahulu");
				}
			}
		}

		function tambahPng(id_setoran,armada,tanggal,id_bu,id_jadwal,status_udj,status_udj_bagasi){
					// combo_trayek_pnp(id_bu);
					// $('#select2-kd_trayek_pnp-container').html('');
					// $('#id_setoran_detail_pnp').val(id_setoran_detail);
					// $('#id_setoran_header_pnp').val(id_setoran);
					// $('#armada_detail_pnp').val(kd_armada);
					// $('#tgl_pnp').val(tanggal);
					// $('#kd_trayek').val('');
					// $('#jumlah_pnp').val('');
					// $('#harga_pnp').val('');
					// $('#select2-kd_trayek_pnp-container').html("--Trayek--");
					$('#id_jadwal_pnp').val(id_jadwal);
					setoranTableDetailPng.ajax.reload();
					$('.nav-tabs a[href="#tab_6"]').tab('show');
					setoranTableDetailPng.columns.adjust().draw();

					//Beban
					document.getElementById('div_status_jenis_beban').style.display = 'none';
					document.getElementById('div_total_bbm_beban').style.display = 'none';
					document.getElementById('div_harga_bbm_beban').style.display = 'none';
					document.getElementById('div_jumlah_bbm_beban').style.display = 'none';
					combo_jenis_beban(id_bu);
					$('#select2-id_jenis_beban-container').html('');
					$('#id_setoran_header_beban').val(id_setoran);
					$('#armada_detail_beban').val(armada);
					$('#tgl_beban').val(tanggal);
					$('#id_jenis_beban').val('');
					$('#jumlah_beban').val('');
					$('#harga_beban').val('');
					setoranTableDetailBeban.ajax.reload();
					$('.nav-tabs a[href="#tab_6"]').tab('show');
					setoranTableDetailBeban.columns.adjust().draw();

					if(status_udj==1){
						$("#status_udj").bootstrapToggle('on');
						$("#ket_status_udj").html('<b><font color="blue">UDJ Pengemudi sebesar 10%</font></b>');
					}else{
						$("#status_udj").bootstrapToggle('off');
						$("#ket_status_udj").html('<b><font color="red">UDJ Pengemudi tidak aktif</font></b>');
					}

					if(status_udj_bagasi==1){
						$("#status_udj_bagasi").bootstrapToggle('on');
						$("#ket_status_udj_bagasi").html('<b><font color="blue">UDJ Bagasi sebesar 10%</font></b>');
					}else{
						$("#status_udj_bagasi").bootstrapToggle('off');
						$("#ket_status_udj_bagasi").html('<b><font color="red">UDJ Bagasi tidak aktif</font></b>');
					}

				}

				function hapusHeader(id_setoran){
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus data ini?', 
						function(){
							var url = '<?=base_url()?>setoran_borongan/ax_unset_data_setoran_header';
							var data = {
								id_setoran: id_setoran
							};
							$.ajax({
								url: url,
								method: 'POST',
								data: data
							}).done(function(data, textStatus, jqXHR) {

								var data = JSON.parse(data);
								if(data['status'] == "1"){
									alertify.success("Data Terhapus.");
									setoranTable.ajax.reload();
								}else{
									alertify.error("Data Gagal Terhapus.");
									setoranTable.ajax.reload();
								}
							});
						},
						function(){ }
						);
				}

				function hapusPng(id_setoran_pnp){
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus data ini?', 
						function(){
							var url = '<?=base_url()?>setoran_borongan/ax_unset_data_setoran_pnp';
							var data = {
								id_setoran_pnp: id_setoran_pnp
							};
							$.ajax({
								url: url,
								method: 'POST',
								data: data
							}).done(function(data, textStatus, jqXHR) {

								var data = JSON.parse(data);
								if(data['status'] == "1"){
									alertify.success("Data Terhapus.");
									setoranTableDetailPng.ajax.reload();
								}else{
									alertify.error("Data Gagal Terhapus.");
									setoranTableDetailPng.ajax.reload();
								}
							});
						},
						function(){ }
						);
				}

				function hapusBeban(id_setoran_beban){
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus data ini?', 
						function(){
							var url = '<?=base_url()?>setoran_borongan/ax_unset_data_setoran_beban';
							var data = {
								id_setoran_beban: id_setoran_beban
							};
							$.ajax({
								url: url,
								method: 'POST',
								data: data
							}).done(function(data, textStatus, jqXHR) {

								var data = JSON.parse(data);
								if(data['status'] == "1"){
									alertify.success("Data Terhapus.");
									setoranTableDetailBeban.ajax.reload();
								}else{
									alertify.error("Data Gagal Terhapus.");
									setoranTableDetailBeban.ajax.reload();
								}
							});
						},
						function(){ }
						);
				}

			/// attachment
			function closeTab(){
				$('.nav-tabs a[href="#tab_1"]').tab('show');
				setoranTable.columns.adjust().draw();
			}
			
			function closeTabDetail(){
				$('.nav-tabs a[href="#tab_1"]').tab('show');
				setoranTable.columns.adjust().draw();
			}

			$('#id_bu_filter').select2({
				'allowClear': true
			}).on("change", function (e) {
				setoranTable.ajax.reload();
				poollist();
				armadalist();
			});

			$('#armada').select2({
				'allowClear': true
			}).on("change", function (e) {
				combo_jadwal();
			});

			$('#id_pool').select2({
				'allowClear': true
			}).on("change", function (e) {
				setoranTable.ajax.reload();
			});

			$( "#tgl_berangkat").datepicker({
				minDate: 0,
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
			
			$( "#tgl_filter").datepicker({
				// minDate: 0,
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
			
			$( "#tgl_filter" ).on("change", function (e) {
				setoranTable.ajax.reload();
			});

			$( "#active" ).on("change", function (e) {
				setoranTable.ajax.reload(); 
			});

			$('#kd_trayek_pnp').select2({
				'placeholder': "Trayek",
				'allowClear': true
			}).on("change", function (e) {
				harga_trayek_pnp();
			});
			$('#id_jenis_beban').select2({
				'placeholder': "Jenis Beban",
				'allowClear': true
			}).on("change", function (e) {
				harga_beban_();
			});

			$('#id_jadwal').on("change", function (e) {
				$.ajax({
					type : "POST",
					dataType : "json",
					data : ({id_jadwal:$('#id_jadwal').val()}),
					url : '<?=base_url()?>setoran_borongan/ax_get_jadwal_rinci',
					success : function(data){
						$.each(data,function(a,b){
							$('#kd_armada').val(b["armada"]);
							$('#driver1').val(b["driver1"]);
							$('#nm_pegawai1').val(b["nm_pegawai1"]);
							$('#driver2').val(b["driver2"]);
							$('#nm_pegawai2').val(b["nm_pegawai2"]);
							$('#asal').val(b["asal"]);
							$('#tujuan').val(b["tujuan"]);
							$('#asal_tujuan').val(b["asal"]+" - "+b["tujuan"]);
							$('#tgl_keberangkatan').val(b["tanggal"]);
							$('#kd_segmen').val(b["kd_segmen"]);
						});
					}
				});
			});
			
			function combo_jadwal(){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran_borongan/ax_get_jadwal", 
					data: {
						id_bu 	: $("#id_bu_filter").val(),
						armada 	: $("#armada").val(), 
					},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 
						$("#id_jadwal").html(response.data_jadwal).show();
						//$('#id_jadwal').val(armada);
						
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}
			
			function combo_trayek_pnp(id_bu){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran_borongan/ax_get_trayek", 
					data: {
						id_bu	: id_bu
					},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 
						$("#kd_trayek_pnp").html(response.data_trayek).show();
						// $("#kd_trayek_pertelaan").html(response.data_trayek).show();
						//$('#id_jadwal').val(armada);
						
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}

			function harga_trayek_pnp(){

				var url = '<?=base_url()?>setoran_borongan/ax_get_trayek_harga';
				var data = {
					kd_trayek	: $('#kd_trayek_pnp').val(), 
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#harga_pnp').val(data['harga']);
				});

			}
			function harga_beban_(){

				var url = '<?=base_url()?>setoran_borongan/ax_get_harga_beban';
				var data = {
					id_jenis_beban	: $('#id_jenis_beban').val(), 
					id_bu	: $('#id_bu_filter').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#harga_beban').val(parseInt(data['harga']));
					$('#harga_bbm_beban').val(parseInt(data['harga']));
				});

			}
			
			function combo_jenis_beban(id_bu){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran_borongan/ax_get_jenis_beban", 
					data: { id_bu	: id_bu 
					},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 
						$("#id_jenis_beban").html(response.data_jenis).show();
						$('#id_jenis_beban').val(0);
						$('#select2-id_jenis_beban-container').html("-- Jenis --");
						
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}

			function printAK13(id_setoran,tgl_setoran,armada,id_bu,id_jadwal){
				var url 		= "<?=site_url("reports/prints")?>";
				var REQ = "?id_setoran="+id_setoran+"&tgl_setoran="+tgl_setoran+"&armada="+armada+"&id_bu="+id_bu+"&id_jadwal="+id_jadwal+"&format=html"+"&uk=A4-P"+"&name=ak13_bor";
				open(url+REQ);
			}
			function printSlip(id_setoran,tgl_setoran,armada,id_bu,id_jadwal){
				var url 		= "<?=site_url("reports/prints")?>";
				var REQ = "?id_setoran="+id_setoran+"&tgl_setoran="+tgl_setoran+"&armada="+armada+"&id_bu="+id_bu+"&id_jadwal="+id_jadwal+"&format=pdf"+"&uk=slip-setoran"+"&name=slip_setoran1_bor";
				// var REQ = "?id_setoran="+id_setoran+"&tgl_setoran="+tgl_setoran+"&armada="+armada+"&id_bu="+id_bu+"&id_jadwal="+id_jadwal+"&format=html"+"&uk=A4-P"+"&name=slip_setoran1_bor";
				open(url+REQ);
			}

			function poollist(){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran_borongan/ax_get_pool", 
					data: {id_cabang : $("#id_bu_filter").val()}, 
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 

						$("#id_pool").html(response.data_pool).show();
						$('#select2-id_pool-container').html('--Pool--');
						$('#id_pool').val('0');

					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}

			function armadalist(){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran_borongan/ax_get_armada", 
					data: {id_cabang : $("#id_bu_filter").val(),tanggal :$("#tgl_filter").val(),id_pool :$("#id_pool").val()},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 
						$("#armada").html(response.data_armada).show();
						$('#select2-armada-container').html('--Armada--');
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}

			function changeActive(id, active){
				alertify.confirm(
					'Confirmation', 
					'Apakah anda yakin ingin Close Setoran?', 
					function(){
						var url = '<?=base_url()?>setoran_borongan/ax_change_active';
						var data = {
							id_setoran: id,
							active : active
						};
						$.ajax({
							url: url,
							method: 'POST',
							data: data,
							statusCode: {
								500: function() {
									alertify.alert("Warning","Data Tidak Berhasil di Setting");
								}
							}
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);

							if(data['status']==true)
							{
								alertify.success("Data Berhasil Checkout");
								setoranTable.ajax.reload();
							}else{
								alertify.alert("Warning","Data Penumpang dan Biaya tidak Boleh Kosong");
							}
							// alertify.success('CheckOut Setoran Berhasil.');
						});
					},
					function(){ }
					);

			}

			$('#status_udj').on("change", function (e) {
				var url = '<?=base_url()?>setoran_borongan/ax_change_status_udj';
				var data = {
					id_setoran: $('#id_setoran_header_beban').val(),
					status_udj : document.getElementById("status_udj").checked
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Tidak Berhasil di Setting");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);

					if(data['status']==true)
					{
						if (data['change']=='1') {
							$('#ket_status_udj').html("<b><font color='blue'>UDJ Pengemudi sebesar 10%</font></b>");
						}else{
							$('#ket_status_udj').html("<b><font color='red'>UDJ Pengemudi tidak aktif</font></b>");
						}
					}else{
						alertify.alert("Warning","Data Penumpang dan Biaya tidak Boleh Kosong");
					}
				});

			});

			$('#status_udj_bagasi').on("change", function (e) {
				var url = '<?=base_url()?>setoran_borongan/ax_change_status_udj_bagasi';
				var data = {
					id_setoran: $('#id_setoran_header_beban').val(),
					status_udj_bagasi : document.getElementById("status_udj_bagasi").checked
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Tidak Berhasil di Setting");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);

					if(data['status']==true)
					{
						if (data['change']=='1') {
							$('#ket_status_udj_bagasi').html("<b><font color='blue'>UDJ Bagasi sebesar 10%</font></b>");
						}else{
							$('#ket_status_udj_bagasi').html("<b><font color='red'>UDJ Bagasi tidak aktif</font></b>");
						}
					}else{
						alertify.alert("Warning","Data Penumpang dan Biaya tidak Boleh Kosong");
					}
				});

			});


			$(function() {
				jQuery.fn.exists = function(){return this.length>0;}
				poollist();
				armadalist();
			});

		</script>
	</body>
	</html>
