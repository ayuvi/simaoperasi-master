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
				<h1>Jadwal Borongan</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

								
							</div>

							<div class="panel-body">
								<div class="nav-tabs-custom">

									<ul class="nav nav-tabs">
										<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">Data Jadwal Borongan</a></li>
										<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Tambah Data</a></li>
										<li class=" disabled"><a href="#tab_3" class="disabled" aria-expanded="false">Pembayaran</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">

											<div class="row">
												<div class="col-lg-12">
													<div class="form-group col-md-4">
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-home"></i>
															</div>
															<select class="form-control select2" style="width: 100%;" id="id_cabang">
																<?php foreach ($combobox_cabang->result() as $rowmenu) { ?>
																<option value="<?= $rowmenu->id_bu?>"><?= $rowmenu->nm_bu?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="form-group col-md-4">
														<select class="form-control select2" style="width: 100%;" id="id_pool">
															<option value="0"> -- Pool -- </option>
														</select>
													</div>
													<div class="form-group col-md-4">
														<select class="form-control select2" style="width: 100%;" id="kd_segmen">
															<option value="0"> -- Segmen -- </option>
															<?php foreach ($combobox_segmen->result() as $rowmenu) { ?>
															<option value="<?= $rowmenu->kd_segment?>"><?= $rowmenu->nm_segment?></option>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-12">
													<div class="form-group col-md-3">
														<div class="input-group">
															<div class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</div>
															<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
														</div>
													</div>
													<div class="col-md-9">
														<button class="btn btn-primary" onclick='ViewDetail(0,2)'>
															<i class='fa fa-plus'></i> Tambah Jadwal Borongan
														</button>
														<button class="btn btn-info" onclick='CopyData()'>
															<i class='fa fa-copy'></i> Copy Jadwal Borongan ke Tanggal
														</button>
														<a type="button" class="btn btn-danger" title="Hapus semua data by tanggal" onClick="deleteAllJadwal()"><i class="fa fa-trash"></i> </a>
													</div>
												</div>
											</div>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="tbljadwalnondefault">
													<thead>
														<tr>
															<th class="opsi" style="width: 1%">Options</th>
															<th style="width: 25%">Print</th>
															<th class="opsi intro" style="width: 1%">ID</th>
															<th class="opsi intro" style="width: 3%">Bis</th>
															<th style="width: 1%">Segmen</th>
															<th>Trayek</th>
															<th>Driver 1</th>
															<th>Driver 2</th>
															<th>SPSAB</th>
															<th>UPP</th>
															<th>Bayar</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>


										<div class="tab-pane" id="tab_2">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group pull-right">

														<button type="button" class="btn bg-purple btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>

													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">

													<div class="modal-body">
														<div class="box box-primary box-solid">
															<div class="box-header with-border">
																<h6 class="box-title" id="editModalPertelaan">Identitas Penyewa</h6>
																<div class="box-tools pull-right">
																	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
																</div>
															</div>
															<div class="box-body no-padding">
																<div class="modal-body">
																	<input type="hidden" id="unik_select" name="unik_select" value=''/>
																	<input type="hidden" id="id_jadwal" name="id_jadwal" value='0' />

																	<div class="row">
																		<div class="form-group col-md-12">
																			<label>Nama/PT (Relasi)</label>
																			<div class="input-group col-md-12">
																				<input type="text" name="nama" class="form-control" placeholder="Nama/PT (Relasi)" id="nama">
																				<span class="input-group-btn">
																					<button class="btn btn-info" type="button" onclick="cariRelasi()" id="cari_nama"><i class="glyphicon glyphicon-search"></i> Cari Nama/PT (Relasi)</button>
																				</span>
																			</div>

																		</div>
																		<div class="form-group col-md-6">
																			<label>Kontak Person (HP)</label>
																			<input type="text" class="form-control" id="kontak_person" placeholder="Kontak Person (HP)">
																		</div>
																		<div class="form-group col-md-6">
																			<label>NPWP</label>
																			<input type="text" class="form-control" id="no_ktp" placeholder="NPWP">
																		</div>
																		<div class="form-group col-md-12">
																			<label>Alamat</label>
																			<input type="text" class="form-control" id="alamat" placeholder="Alamat">
																		</div>
																		<div class="form-group col-md-12" style="display: none;">
																			<label>Tipe Armada</label>
																			<input type="text" class="form-control" id="nm_tipe_armada" placeholder="Tipe Armada">
																		</div>
																		<div class="form-group col-md-12 has-success">
																			<label>Rate/Sewa (Rupiah)</label>
																			<input type="number" class="form-control" id="rate" placeholder="Rate/Sewa (Rupiah)">
																		</div>
																	</div>

																</div>
															</div>
														</div>
													</div>
													<div class="modal-body">
														<div class="box box-primary box-solid">
															<div class="box-header with-border">
																<h6 class="box-title" id="editModalPertelaan">Detail Jadwal Borongan</h6>
																<div class="box-tools pull-right">
																	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
																</div>
															</div>
															<div class="box-body no-padding">
																<div class="modal-body">
																	<div class="row">
																		<div class="col-md-12"><p><font color="blue"><b>Kelengkapan Informasi</b></font></p></div>
																		<div class="form-group col-md-4">
																			<label>Asal</label>
																			<input type="text" class="form-control" id="asal" placeholder="Asal">
																		</div>
																		<div class="form-group col-md-4">
																			<label>Tujuan</label>
																			<input type="text" class="form-control" id="tujuan" placeholder="Tujuan">
																		</div>
																		<div class="form-group col-lg-4">
																			<label>Armada <span id="tipe_armada_ket"></span></label>
																			<select class="form-control select2" style="width: 100%;" id="armada">
																				<option value="0">--Armada--</option>	
																			</select>
																		</div>
																		<div class="form-group col-lg-4">
																			<label>Driver 1</label>
																			<select class="form-control select2" style="width: 100%;" id="driver">
																				<option value="0">--Driver--</option>
																			</select>
																		</div>

																		<div class="form-group col-lg-4">
																			<label>Driver 2</label>
																			<select class="form-control select2" style="width: 100%;" id="driver2">
																				<option value="0">--Driver--</option>		
																			</select>
																		</div>

																		<!-- <div class="form-group col-lg-4">
																			<label>Target RIT</label>
																			<input type="number" class="form-control" id="target" placeholder="Target RIT">
																		</div> -->
																		<div class="form-group bootstrap-timepicker col-lg-4">
																			<label>Jam Awal</label>
																			<div class="input-group">
																				<div class="input-group-addon">
																					<i class="fa fa-clock-o"></i>
																				</div>
																				<input type="text" class="form-control" id="jam" placeholder="Jam Awal">
																			</div>
																		</div>
																		<div class="form-group bootstrap-timepicker col-lg-4">
																			<label>Jam Akhir</label>
																			<div class="input-group">
																				<div class="input-group-addon">
																					<i class="fa fa-clock-o"></i>
																				</div>
																				<input type="text" class="form-control" id="jam1" placeholder="Jam Akhir">
																			</div>
																		</div>
																		<div class="form-group col-lg-4">
																			<label>Banyak Kendaraan diminta (Unit)</label>
																			<input type="number" class="form-control" id="jum_penumpang" placeholder="Banyak Kendaraan diminta (Unit)">
																		</div>
																		<div class="form-group col-lg-4">
																			<label>Keperluan</label>
																			<input type="text" class="form-control" id="keperluan" placeholder="Keperluan">
																		</div>
																		<div class="form-group col-lg-4">
																			<label>KM Tempuh (Km)</label>
																			<input type="number" class="form-control" id="km_tempuh" placeholder="KM Tempuh (Km)">
																		</div>
																		<div class="form-group col-lg-4">
																			<label>Durasi Sewa (Hari)</label>
																			<input type="number" class="form-control" id="durasi_sewa" placeholder="Lama Pemakaian">
																		</div>
																		<div class="col-md-12"><p><font color="blue"><b>Kesiapan Armada</b></font></p></div>
																		<div class="form-group col-lg-4">
																			<label>Lokasi Pemberangkatan</label>
																			<input type="text" class="form-control" id="lokasi_pemb" placeholder="Lokasi Pemberangkatan">
																		</div>
																		<div class="form-group col-lg-4">
																			<label>Hari Pemberangkatan</label>
																			<input disabled="disabled" type="text" class="form-control" id="hari_pemb" placeholder="Hari Pemberangkatan">
																		</div>
																		<div class="form-group bootstrap-timepicker col-lg-4">
																			<label>Jam Pemberangkatan</label>
																			<div class="input-group">
																				<div class="input-group-addon">
																					<i class="fa fa-clock-o"></i>
																				</div>
																				<input type="text" class="form-control" id="jam_pemb" placeholder="Jam Pemberangkatan">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn bg-purple btn-default pull-left" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
																	<button type="button" class="btn btn-success" id='btnSave'><i class='fa fa-save'></i> Simpan</button>
																</div>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div>

										<div class="tab-pane" id="tab_3">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group pull-right">
														<button type="button" class="btn bg-purple btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Total Invoice</label>
													<div class="col-md-9">
														<h4><font color="blue"><b><p id="keterangan_invoice"></p></b></font></h4>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Metode Pembayaran</label>
													<div class="col-md-9">
														<select class="form-control select2" style="width: 100%;" id="metode_pembayaran">
															<option value="0">-- Pilih Metode Pembayaran--</option>
															<option value="1">Cash</option>
															<option value="2">Credit</option>
														</select>
													</div>
												</div>
											</div>


											<div class="modal-body">
												<div class="box box-primary box-solid">
													<div class="box-header with-border">
														<h6 class="box-title" id="editModalPertelaan">Amount Paid</h6>
														<div class="box-tools pull-right">
															<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
														</div>
													</div>
													<div class="modal-body">
														<div class="row">
															<input type="hidden" id="id_jadwal_borongan" name="id_jadwal_borongan" class="form-control">
															<input type="hidden" id="total_upp" name="total_upp" class="form-control">
															<div class="form-group col-lg-4">
																<label>Tanggal</label>
																<input type="text" id="tanggal_sewa" name="tanggal_sewa" class="form-control" placeholder="yyyy-mm-dd">
															</div>
															<div class="form-group col-lg-4">
																<label>Jumlah Bayar (Rp)</label>
																<input type="number" id="bayar_sewa" name="bayar_sewa" class="form-control" placeholder="Jumlah Bayar (Rp)">
															</div>
															<div class="form-group col-lg-4">
																<label>_</label>
																<button type="button" class="form-control btn btn-success" id='btnSavePembayaran'>Save</button>
															</div>
														</div>

														<div class="dataTable_wrapper">
															<table class="table table-striped table-bordered table-hover" id="dataSewaTable">
																<thead>
																	<tr>
																		<th>Aksi</th>
																		<th>#</th>
																		<th>Tanggal</th>
																		<th>Bayar</th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th colspan="3" style="text-align: center;">Total</th>
																		<th></th>
																	</tr>
																</tfoot>
															</table>
														</div>
														<div class="row">
															<div class="col-md-5">
																<center>
																	<table class="table table-striped table-bordered" border="1" cellpadding="0" cellspacing="0">
																		<tbody>
																			<tr>
																				<td><b>Invoice Total</b></td>
																				<td style="text-align: right;" class="total_invoice" id="total_invoice"></td>
																			</tr>
																			<tr>
																				<td><b>Amount Paid<b></td>
																				<td style="text-align: right;" class="amount_paid" id="amount_paid"></td>
																			</tr>
																			<tr>
																				<td><b>Balance</b></td>
																				<td style="text-align: right;" class="balance" id="balance"></td>
																			</tr>
																		</tbody>
																	</table>
																</center>
															</div>
														</div>

													</div>
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

	<div class="row" >
		<div class="col-lg-12">
			<div class="modal fade" id="copyDataModal" tabindex="-1" role="dialog" aria-labelledby="copyModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="Form-add-bu" id="barangModalLabel">Copy Jadwal Borongan ke Tanggal lain</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Dari Tanggal</label>
								<input type="text" id="tanggal_from" name="tanggal_from" class="form-control" placeholder="Dari Tanggal" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Ke Tanggal</label>
								<input type="text" id="tanggal_to" name="tanggal_to" class="form-control" placeholder="Ke Tanggal" value="<?=date('Y-m-d')?>">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" id='btnCopy'>Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" >
		<div class="col-lg-12">
			<div class="modal fade" id="modalRelasi" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="Form-add-bu" id="relasiModalLabel">Form Data Relasi</h4>
						</div>
						<div class="modal-body">
							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover" id="dataRelasiTable">
									<thead>
										<tr>
											<th>Action</th>
											<th>#</th>
											<th>Nama</th>
											<th>Asal</th>
											<th>Tujuan</th>
											<th>Tipe</th>
											<th>KM Tempuh</th>
											<th>Rate</th>
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

	<?= $this->load->view('basic_js'); ?>
	<script type="text/javascript">
		var tbljadwalnondefault = $('#tbljadwalnondefault').DataTable({
			responsive 	: true,
			ordering 	: false,
			scrollX 	: true,
			processing 	: true,
			serverSide 	: true,
			ajax: 
			{
				url: "<?= base_url()?>jadwal_borongan_log/ax_data_jadwal_hr/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 	
						"cabang"	: $("#id_cabang").val(),
						"kd_segmen"	: $("#kd_segmen").val(),
						"id_pool"	: $("#id_pool").val(),
						"tanggal"	: $("#tanggal").val(),
					});
				}
			},
			columns: 
			[
			{
				class: "opsi", data: "id_jadwal", render: function(data, type, full, meta){
					var id = "'"+data+"',2";
					var idd = "'"+data+"'";
					var armada = "'"+full['armada']+"'";
					var bayar = parseInt(full['bayar']);
					var bayar_upp = parseInt(full['upp']);
					var status_lmb = full['status'];
					var id5 = "'"+data+"','"+bayar_upp+"','"+full['bayar']+"'";
					var str = '';
					str += '<div class="btn-group divOnTop">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="ViewDetail(' + id + ')"><i class="fa fa-pencil"></i> Edit </a></li>';

					str += '<li><a onclick="setPembayaran(' + id5 + ')"><i class="fa fa-money"></i> Pembayaran</a></li>';

					// if(bayar == bayar_upp){
						if (status_lmb==0) {
							str += '<li><a onclick="setRitasearmada(' + idd + ')"><i class="fa fa-group"></i> Absen</a></li>';
						}
					// }

					str += '<li><a onclick="DeleteData(' + idd + ')"><i class="fa fa-trash"></i> Hapus</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},
			{ data: "id_jadwal", render: function(data, type, full, meta){
				var str = '';
				var id2 = "'"+full['id_jadwal']+"','"+full['tanggal']+"','"+full['armada']+"','"+full['kd_segmen']+"','"+full['asal']+"','"+full['tujuan']+"'";
				str += '<div class="btn-group">';
				str += '<a type="button" class="btn btn-sm btn-primary" title="Invoice" onclick="invoice_borongan(' + data + ')"><i class="fa fa-print"></i> </a>';

				var bayar = parseInt(full['bayar']);
				var status = full['status'];
				if (bayar !=0 && status !=0) {
					str += '<a type="button" class="btn btn-sm btn-warning" title="SP-SAB" onclick="spsab(' + data + ')"><i class="fa fa-print"></i> </a>';
					str += '<a type="button" class="btn btn-sm btn-warning" title="AP/1 Borongan" onclick="ap1_borongan(' + data + ')"><i class="fa fa-print"></i> </a>';
				}

				str += '</div>';
				return str;
			}},
			{ data: "id_jadwal" },
			{ data: "armada" },
			{ data: "kd_segmen" },
			{ class: "intro", data: "asal_tujuan" },
			{ class: "intro",  data: "nm_driver" },
			{ class: "intro",  data: "nm_driver2" },
			{ class: "intro",data: "status", render: function(data, type, full, meta){
				if(data == 0)
					return '<span class="label label-warning">Belum Absen</span>';
				else return '<span class="label label-success">Absen '+data+'</span>';
			}},
			{ data: "upp", render: $.fn.dataTable.render.number( '.', ',',0 ) },
			{ data: "bayar", render: $.fn.dataTable.render.number( '.', ',',0 ) }
			]
		});

		var dataRelasiTable = $('#dataRelasiTable').DataTable({
			responsive 	: true,
			ordering 	: false,
			scrollX 	: true,
			processing 	: true,
			serverSide 	: true,
			ajax: 
			{
				url: "<?= base_url()?>jadwal_borongan_log/ax_data_relasi/",
				type: 'POST'
			},
			columns: 
			[
			{
				class: "opsi", data: "id_relasi", render: function(data, type, full, meta){
					var str = '';
					var id_relasi = "'"+full['id_relasi']+"','"+full['nm_relasi']+"'";

					str += '<div class="btn-group">';
					str += '<a type="button" class="btn btn-sm btn-default" onclick="ambilRelasi(' + id_relasi + ')"><i class="fa fa-cloud-download"></i> Ambil</a>';

					str += '</div>';
					return str;
				}
			},
			{ data: "id_relasi" },
			{ data: "nm_relasi" },
			{ data: "asal" },
			{ data: "tujuan" },
			{ data: "nm_tipe_armada" },
			{ data: "km_tempuh", render: $.fn.dataTable.render.number( '.', ',',0 ) },
			{ data: "rate", render: $.fn.dataTable.render.number( '.', ',',0 ) },
			]
		});

		var dataSewaTable = $('#dataSewaTable').DataTable({
			responsive 	: true,
			ordering 	: false,
			// scrollX 	: true,
			processing 	: true,
			serverSide 	: true,
			ajax: 
			{
				url: "<?= base_url()?>jadwal_borongan_log/ax_data_sewa/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 	
						"id_jadwal_borongan"	: $("#id_jadwal_borongan").val(),
						"upp"					: $("#total_upp").val()
					});
				}
			},
			columns: 
			[
			{ data: "id_sewa_borongan", render: function(data, type, full, meta){
				var str = '';
				var str = '<div class="btn-group">';
				str += '<button class="btn btn-info btn-sm btn.flat" onclick="uploadSewa(' + data + ')" title="Upload Bukti Bayar"><i class="fa fa-upload"></i></button>';
				str += '<button class="btn btn-danger btn-sm btn.flat" onclick="hapusSewa(' + data + ')" title="Hapus Data"><i class="fa fa-trash"></i></button>';
				str += '</div>';

				return str;
			}},
			{ data: "id_sewa_borongan", render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}},
			{ data: "tanggal" },
			{ data: "bayar", render: $.fn.dataTable.render.number( '.', ',',0 ) }
			],

			"drawCallback": function(settings) {
				var api = this.api();
				var jsondata = api.ajax.json();
				balance = jsondata['balance'];
				sum_bayar = jsondata['sum_bayar'];
				$('#amount_paid').html('<b>Rp. '+formatNumber(sum_bayar)+'</b>');
				$('#balance').html('<b>Rp. '+formatNumber(balance)+'</b>');
			},

			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;
				var intVal = function ( i ) {
					return typeof i === 'string' ?
					i.replace(/[\$,]/g, '')*1 :
					typeof i === 'number' ?
					i : 0;
				};

				total = api
				.column( 3 )
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );

				pageTotal = api
				.column( 3, { page: 'current'} )
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );

				$( api.column( 3 ).footer() ).html('Rp. '+formatNumber(pageTotal));
			}

		});

		function ViewDetail(unik,hr){
			driverlist();
			armadalist();
			if($('#id_cabang').val() == ''){
				alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");

			}
			else if($('#id_pool').val() == '0'){
				alertify.alert("Perhatian","Pool Tidak Boleh Kosong");
			}
			else if($('#kd_segmen').val() == '0'){
				alertify.alert("Perhatian","Segmen Tidak Boleh Kosong");
			}else{

				if(unik == 0){
					$('#id_jadwal').val('0');
					$('#nama').val('');
					$('#kontak_person').val('');
					$('#alamat').val('');
					$('#no_ktp').val('');
					$('#asal').val('');
					$('#tujuan').val('');
					$('#unik_select').val(hr);
					$('#select2-armada-container').html('--Armada--');
					$('#select2-driver-container').html('--Driver--');
					$('#select2-driver2-container').html('--Driver--');
					$('#armada').val('');
					$('#driver').val('');
					$('#driver2').val('');
					$('#target').val('');
					$('#jam').val('');
					$('#jam1').val('');
					$('#jum_penumpang').val('');
					$('#keperluan').val('');
					$('#km_tempuh').val('');
					$('#durasi_sewa').val('');
					$('#lokasi_pemb').val('');
					$('#jam_pemb').val('');

					var hari = get_hari($('#tanggal').val());
					$('#hari_pemb').val(hari);

					$('#rate').val('');
					$('#nm_tipe_armada').val('');
					$('#tipe_armada_ket').html('');
					$('.nav-tabs a[href="#tab_2"]').tab('show');



				}else{

					$('#nama').val('');
					$('#asal').val('');
					$('#tujuan').val('');
					$('#km_tempuh').val('');
					$('#rate').val('');
					$('#alamat').val('');
					$('#no_ktp').val('');
					$('#kontak_person').val('');
					$('#nm_tipe_armada').val('');
					$('#tipe_armada_ket').html('');

					var url = '<?=base_url()?>jadwal_borongan_log/ax_get_data_by_id_detail';
					if($('#unik_select').val() == 1){
						var tgl = '1901-01-01';	
					}else{
						var tgl = $('#tanggal').val();		
					}
					var data = {
						id_jadwal: unik,
						tanggal: tgl,
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#id_jadwal').val(data['id_jadwal']);
						$('#nama').val(data['nama']);
						$('#kontak_person').val(data['kontak_person']);
						$('#alamat').val(data['alamat']);
						$('#no_ktp').val(data['no_ktp']);
						$('#asal').val(data['asal']);
						$('#tujuan').val(data['tujuan']);
						$('#unik_select').val(hr);

						$('#armada').val(data['armada']).trigger('change');
						$('#driver').val(data['driver1']).trigger('change');
						$('#driver2').val(data['driver2']).trigger('change');
						
						$('#target').val(data['target']);
						$('#jam').val(data['jam']);
						$('#jam1').val(data['jam1']);
						$('#jum_penumpang').val(data['jum_penumpang']);
						$('#keperluan').val(data['keperluan']);
						$('#km_tempuh').val(data['km_tempuh']);
						$('#durasi_sewa').val(data['durasi_sewa']);
						$('#lokasi_pemb').val(data['lokasi_pemb']);
						$('#jam_pemb').val(data['jam_pemb']);

						var hari = get_hari(data['tanggal']);
						$('#hari_pemb').val(hari);

						$('#rate').val(data['upp']);
						$('#nm_tipe_armada').val(data['tipe_armada']);
						$('#tipe_armada_ket').html(data['tipe_armada']);

						$('.nav-tabs a[href="#tab_2"]').tab('show');
					});
				}
			}
		}

		function select_jenis_penjadwalan() {
			var select = $('#jenis_penjadwalan').val();
			if (select==0) {
				$('#jenis_umum').hide();
				$('#jenis_relasi').hide();
			}else if(select==1){
				$('#jenis_umum').show();
				$('#jenis_relasi').hide();
			}else{
				$('#jenis_umum').hide();
				$('#jenis_relasi').show();
			}
		}

		function get_hari(tgl) {
			var d = new Date(tgl);
			var hari = d.getDay();
			switch(hari) {
				case 0: hari = "Minggu"; break;
				case 1: hari = "Senin"; break;
				case 2: hari = "Selasa"; break;
				case 3: hari = "Rabu"; break;
				case 4: hari = "Kamis"; break;
				case 5: hari = "Jum'at"; break;
				case 6: hari = "Sabtu"; break;
			}
			return hari;
		}

		function DeleteData(id_jadwal){
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>jadwal_borongan_log/ax_unset_data';
					var data = {
						id_jadwal: id_jadwal
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						tbljadwalnondefault.ajax.reload();
						alertify.error('jadwal data terhapus.');
					});
				},
				function(){ }
				);
		}

		$('#btnSave').on('click', function () {
			if($('#nama').val()==''){
				alertify.alert("Perhatian","Nama Tidak Boleh Kosong");
				return;
			}else if($('#kontak_person').val()==''){
				alertify.alert("Perhatian","Kontak Person Tidak Boleh Kosong");
				return;
			}else if($('#alamat').val()==''){
				alertify.alert("Perhatian","Alamat Tidak Boleh Kosong");
				return;
			}else if($('#no_ktp').val()==''){
				alertify.alert("Perhatian","Nomor KTP/SIM Tidak Boleh Kosong");
				return;
			}else if($('#rate').val()==''){
				alertify.alert("Perhatian","Rate Tidak Boleh Kosong");
				return;
			}else if($('#asal').val()==''){
				alertify.alert("Perhatian","Asal Tidak Boleh Kosong");
				return;
			}else if($('#tujuan').val()==''){
				alertify.alert("Perhatian","Tujuan Tidak Boleh Kosong");
				return;
			}else if($('#armada').val()==null){
				alertify.alert("Perhatian","Armada Tidak Boleh Kosong");
				return;
			}else if($('#driver').val()==null){
				alertify.alert("Perhatian","Driver Tidak Boleh Kosong");
				return;
			}else if($('#jam').val()==''){
				alertify.alert("Perhatian","Jam Awal Tidak Boleh Kosong");
				return;
			}else if($('#jam1').val()==''){
				alertify.alert("Perhatian","Jam Akhir Tidak Boleh Kosong");
				return;
			}else if($('#jum_penumpang').val()==''){
				alertify.alert("Perhatian","Jumlah Penumpang Tidak Boleh Kosong");
				return;
			}else if($('#keperluan').val()==''){
				alertify.alert("Perhatian","Keperluan Tidak Boleh Kosong");
				return;
			}else if($('#km_tempuh').val()==''){
				alertify.alert("Perhatian","Panjang Perjalanan Tidak Boleh Kosong");
				return;
			}else if($('#durasi_sewa').val()==''){
				alertify.alert("Perhatian","Durasi Sewa Tidak Boleh Kosong");
				return;
			}else if($('#lokasi_pemb').val()==''){
				alertify.alert("Perhatian","Lokasi Pemberangkatan Tidak Boleh Kosong");
				return;
			}else if($('#jam_pemb').val()==''){
				alertify.alert("Perhatian","Jam Pemberangkatan Tidak Boleh Kosong");
				return;
			}else{
				var url = '<?=base_url()?>jadwal_borongan_log/ax_set_data_default';
				var tgl = $('#tanggal').val();		
				var data = {
					id_jadwal		: $('#id_jadwal').val(),
					id_cabang		: $('#id_cabang').val(),
					id_pool			: $('#id_pool').val(),
					armada			: $('#armada').val(),
					kd_segmen		: $('#kd_segmen').val(),
					asal			: $('#asal').val(),
					tujuan			: $('#tujuan').val(),
					driver			: $('#driver').val(),
					driver2			: $('#driver2').val(),
					jam				: $('#jam').val(),
					jam1			: $('#jam1').val(),
					target			: $('#target').val(),
					tanggal			: tgl,

					nama			: $('#nama').val(),
					kontak_person	: $('#kontak_person').val(),
					alamat			: $('#alamat').val(),
					no_ktp			: $('#no_ktp').val(),
					upp				: $('#rate').val(),
					jum_penumpang	: $('#jum_penumpang').val(),
					keperluan		: $('#keperluan').val(),
					km_tempuh		: $('#km_tempuh').val(),
					durasi_sewa		: $('#durasi_sewa').val(),
					lokasi_pemb		: $('#lokasi_pemb').val(),
					jam_pemb		: $('#jam_pemb').val(),
					tipe_armada		: $('#nm_tipe_armada').val(),
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Jadwal Borongan (Armada) Duplicate");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success"){
						alertify.success("jadwal data Tersimpan.");
						$('#id_jadwal').val('0');
						$('.nav-tabs a[href="#tab_1"]').tab('show');
						tbljadwalnondefault.ajax.reload();
					}else if(data['status'] == "gagal"){
						alertify.alert("Peringatan!",""+data['keterangan']+"");
					}
				});
			}
		});

		function setRitasearmada(armada){
			if($('#kd_segmen').val() == 0){
				alertify.alert("Perhatian","Segmen Tidak Boleh Kosong");

			}
			else if($('#id_cabang').val() == 0){
				alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
			}
			else{
				alertify.confirm(
					'Confirmation', 
					'Atur Absensi Default?', 
					function(){
						var url = '<?=base_url()?>jadwal_borongan_log/setRitasearmada';
						var data = {
							id_jadwal	: armada
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
							tbljadwalnondefault.ajax.reload();
							alertify.success('Pengaturan Absensi Berhasil.');
						});
					},
					function(){ }
					);
			}
		}

		function checkoutabsen(id_lmb){
			if(id_lmb == 0){
				alertify.alert("Perhatian","LMB Tidak Boleh Kosong");
			}else{
				alertify.confirm(
					'Confirmation', 
					'CheckOut Absensi?', 
					function(){
						var url = '<?=base_url()?>jadwal_borongan_log/checkoutabsen';
						var data = {
							id_lmb	: id_lmb,
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
							tbljadwalnondefault.ajax.reload();
							alertify.success('CheckOut Absensi Berhasil.');
						});
					},
					function(){ }
					);
			}
		}

		$('#id_cabang').select2({
			'placeholder': "Cabang",
			'allowClear': true
		}).on("change", function (e) {
			tbljadwalnondefault.ajax.reload();
			poollist();
			driverlist();
			armadalist(); 
		});

		$('#id_pool').select2({
			'placeholder': "Cabang",
			'allowClear': true
		}).on("change", function (e) {
			tbljadwalnondefault.ajax.reload();
		});

		$('#kd_segmen').select2({
			'placeholder': "Cabang",
			'allowClear': true
		}).on("change", function (e) {
			tbljadwalnondefault.ajax.reload();
		});

		$( "#tanggal").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd"
		});

		$( "#tanggal_to").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			yearRange: "-100:+20",
			minDate: '0'
		});
		$( "#tanggal_sewa").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd"
		});

		$( "#tanggal" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
		$( "#tanggal_to" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
		$( "#tanggal_sewa" ).inputmask("yyyy-mm-dd",{"placeholder": "yyyy-mm-dd"});
		$( "#tanggal" ).on("change", function (e) {
			tbljadwalnondefault.ajax.reload();
		});	

	//Timepicker
	$(".timepicker").timepicker({
		showInputs: false
	});

	function poollist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal_borongan_log/ax_get_pool", 
			data: {id_cabang : $("#id_cabang").val()}, 
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

	function driverlist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal_borongan_log/ax_get_driver", 
			data: {id_cabang : $("#id_cabang").val(),tgl_absensi : $("#tanggal").val()},
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 

				$("#driver").html(response.data_driver).show();
				$('#select2-driver-container').html('--Driver--');
				$('#driver').val('0');

				$("#driver2").html(response.data_driver).show();
				$('#select2-driver2-container').html('--Driver--');
				$('#driver2').val('0');

			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}


	function armadalist(){
		$.ajax({
			type: "POST", 
			url: "<?= base_url() ?>jadwal_borongan_log/ax_get_armada", 
			data: {id_cabang : $("#id_cabang").val(),tgl_absensi : $("#tanggal").val()}, 
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 

				$("#armada").html(response.data_armada).show();
				$('#select2-armada-container').html('--Armada--');
				$('#armada').val('0');
			},
			error: function (xhr, ajaxOptions, thrownError) { 
				alert(thrownError); 
			}
		});
	}

	function deleteAllJadwal(){
		if($('#id_cabang').val() == ''){
			alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
		}
		else if($('#id_pool').val() == '0'){
			alertify.alert("Perhatian","Pool Tidak Boleh Kosong");
		}
		else if($('#kd_segmen').val() == '0'){
			alertify.alert("Perhatian","Segment Tidak Boleh Kosong");
		}
		else if($('#tanggal').val() == ''){
			alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
		}
		else{
			var id_bu 		= $('#id_cabang').val();
			var id_pool 	= $('#id_pool').val();
			var kd_segmen 	= $('#kd_segmen').val();
			var tanggal 	= $('#tanggal').val();
			alertify.confirm(
				'Konfirmasi', 
				'Apa anda yakin akan menghapus semua data pada tanggal '+tanggal+' ?', 
				function(){
					var url = '<?=base_url()?>jadwal_borongan_log/ax_unset_data_all_jadwal';
					var data = {
						id_bu: id_bu,
						id_pool: id_pool,
						kd_segmen: kd_segmen,
						tanggal: tanggal
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {

						var data = JSON.parse(data);
						if(data['status'] == "1"){
							alertify.success("Data Berhasil Terhapus.");
							tbljadwalnondefault.ajax.reload();
						}else{
							alertify.error("Data Gagal Terhapus.");
							tbljadwalnondefault.ajax.reload();
						}
					});
				},
				function(){ }
				);
		}
	}

	function CopyData() {
		if($('#id_cabang').val() == 0){
			alertify.alert("Perhatian","Cabang Tidak Boleh Kosong");
		}
		else if($('#id_pool').val() == 0){
			alertify.alert("Perhatian","Pool Tidak Boleh Kosong");
		}
		else if($('#kd_segmen').val() == 0){
			alertify.alert("Perhatian","Segment Tidak Boleh Kosong");
		}
		else if($('#tanggal').val() == 0){
			alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
		}
		else{
			var tanggal 	= $('#tanggal').val();
			$('#tanggal_from').val(tanggal);
			$('#copyDataModal').modal('show');
		}
	}

	$('#btnCopy').on('click', function () {
		if($('#tanggal_to').val()==''){
			alertify.alert("Perhatian","Ke Tanggal Tidak Boleh Kosong");
			return;
		}
		else{
			var kd_segmen 	= $('#kd_segmen').val();
			var id_cabang 	= $('#id_cabang').val();
			var id_pool 	= $('#id_pool').val();
			var tanggal 	= $('#tanggal').val();
			var tanggal_to 	= $('#tanggal_to').val();

			alertify.confirm(
				'Confirmation', 
				'Copy Jadwal Borongan dari tanggal '+tanggal+' ke tanggal '+tanggal_to, 
				function(){
					var url = '<?=base_url()?>jadwal_borongan_log/ax_copy_jadwal';
					var data = {
						kd_segmen	: kd_segmen,
						id_cabang	: id_cabang,
						id_pool		: id_pool,
						tanggal_from : tanggal,
						tanggal_to : tanggal_to,
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
						tbljadwalnondefault.ajax.reload();
						$('#copyDataModal').modal('hide');
						alertify.success('Jadwal Borongan Berhasil di Copy ke Tanggal '+data.tanggal_to);
					});
				},
				function(){ }
				);
		}
	});

	function closeTab(){
		$('.nav-tabs a[href="#tab_1"]').tab('show');
		tbljadwalnondefault.columns.adjust().draw();
	}

	function spsab(id_jadwal){
		var url 		= "<?=site_url("reports/prints")?>";
		var REQ = "?id_jadwal="+id_jadwal+"&format=pdf"+"&uk=A4-P"+"&name=spsab";
		open(url+REQ);
	}
	function ap1_borongan(id_jadwal){
		var url 		= "<?=site_url("reports/prints")?>";
		var REQ = "?id_jadwal="+id_jadwal+"&format=html"+"&uk=A4-P"+"&name=ap1_bor";
		open(url+REQ);
	}

	function invoice_borongan(id_jadwal){
		var url 		= "<?=site_url("reports/prints")?>";
		var REQ 		= "?id_jadwal="+id_jadwal+"&format=pdf"+"&uk=A4-P"+"&name=invoice_borongan";
		open(url+REQ);
	}

	function cariRelasi(){
		$('#modalRelasi').modal('show');
		dataRelasiTable.ajax.reload();
		setTimeout(function(){ dataRelasiTable.columns.adjust().draw(); }, 1000);
	}
	function ambilRelasi(id_relasi,nm_relasi) {
		$('#nama').val(nm_relasi);
		$('#modalRelasi').modal('hide');
		tampilDataRelasi(id_relasi);
	}

	function tampilDataRelasi(id_relasi) {
		$('#nama').val('');
		$('#asal').val('');
		$('#tujuan').val('');
		$('#km_tempuh').val('');
		$('#rate').val('');
		$('#alamat').val('');
		$('#no_ktp').val('');
		$('#kontak_person').val('');
		$('#nm_tipe_armada').val('');
		$('#tipe_armada_ket').html('');

		$.ajax({
			type : "POST",
			dataType : "json",
			data : ({id_relasi:id_relasi}),
			url : '<?=base_url()?>jadwal_borongan_log/ax_get_relasi',
			success : function(data){
				$.each(data,function(a,b){
					$('#nama').val(b["nm_relasi"]);
					$('#asal').val(b["asal"]);
					$('#tujuan').val(b["tujuan"]);
					$('#km_tempuh').val(b["km_tempuh"]);
					$('#rate').val(b["rate"]);
					$('#alamat').val(b["alamat"]);
					$('#no_ktp').val(b["npwp"]);
					$('#kontak_person').val(b["kontak_person"]);
					$('#nm_tipe_armada').val(b["nm_tipe_armada"]);
					$('#tipe_armada_ket').html('<font color="blue"><b>'+b["nm_tipe_armada"]+'</b></font>');
				});
			}
		});
	}

	$(document).ready(function() {

		poollist();

		$("#jam").timepicker({
			showInputs: false,
			showMeridian: false,
		});
		$("#jam1").timepicker({
			showInputs: false,
			showMeridian: false,
		});
		$("#jam_pemb").timepicker({
			showInputs: false,
			showMeridian: false,
		});
	});


</script>

<script type="text/javascript">
	function setPembayaran(id_jadwal,upp,bayar){
		$('#id_jadwal_borongan').val(id_jadwal);
		$('#total_upp').val(upp);
		$('#keterangan_invoice').html(formatNumber(upp));
		$('#total_invoice').html('<b>Rp. '+formatNumber(upp)+'</b>');
		dataSewaTable.ajax.reload();
		setTimeout(function(){ dataSewaTable.columns.adjust().draw(); }, 1000);
		$('.nav-tabs a[href="#tab_3"]').tab('show');
	}

	function formatNumber(num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
	}

	$('#btnSavePembayaran').on('click', function () {
		if($('#tanggal_sewa').val()==''){
			alertify.alert("Perhatian","Tanggal Tidak Boleh Kosong");
			return;
		}else if($('#bayar_sewa').val()==''){
			alertify.alert("Perhatian","Jumlah Bayar Tidak Boleh Kosong");
			return;
		}else{
			var url = '<?=base_url()?>jadwal_borongan_log/ax_set_data_sewa';
			var data = {
				id_jadwal_borongan	: $('#id_jadwal_borongan').val(),
				tanggal				: $('#tanggal_sewa').val(),
				bayar				: $('#bayar_sewa').val(),
				upp					: $('#total_upp').val(),
			};
			$.ajax({
				url: url,
				method: 'POST',
				data: data
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				if(data['status'] == "success"){
					alertify.success("Data Tersimpan.");
					$('#tanggal_sewa').val('');
					$('#bayar_sewa').val('');
					dataSewaTable.ajax.reload();
				}else if(data['status'] == "gagal"){
					alertify.alert("Peringatan!",""+data['keterangan']+"");
				}
			});
		}
	});

	function hapusSewa(id_sewa_borongan){
		alertify.confirm(
			'Konfirmasi', 
			'Apa anda yakin akan menghapus data ini?', 
			function(){
				var url = '<?=base_url()?>setoran/ax_unset_data_setoran_pend';
				var data = {
					id_setoran_pend: id_setoran_pend
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {

					var data = JSON.parse(data);
					if(data['status'] == "1"){
						alertify.success("Data Terhapus.");
						setoranTableDetailPend.ajax.reload();
					}else{
						alertify.error("Data Gagal Terhapus.");
						setoranTableDetailPend.ajax.reload();
					}
				});
			},
			function(){ }
			);
	}
</script>

</body>
</html>
