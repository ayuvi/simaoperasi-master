<!DOCTYPE html>
<html>
<head>
	<?= $this->load->view('head'); ?>
</head>
<style>
	.margin-bottom {
		margin-bottom:-30px;
	}
</style>

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
				<h1>Setoran</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php //if($this->session->userdata('login')['id_level'] == 1 || $this->session->userdata('login')['id_level'] == 6){ ?>
								<button class="btn btn-info" onclick='ViewData(0)'>
									<i class='fa fa-save'></i> Tambah Setoran
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
											<input type="text" class="form-control pull-right" id="tgl_filter" name="tgl_filter" placeholder="Tanggal" value="<?=tgl_hari_ini()?>">
										</div>
									</div>
										<!-- <div class="form-group col-lg-2">
											<p style="line-height: 15px">.</p>
											<button style="margin-left: 55px;" type="button" class="btn btn-primary" onclick='printLaporan()'><i class="fa fa-print"></i> Print AK13</button>
										</div> -->

								<!-- <div class="form-group col-lg-2">
									<p style="line-height: 15px">.</p>
									<div class="btn-group">
										<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i>  Print <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a onclick="print_pdf()"><i class="fa fa-print"></i> PDF</a></li>
											<li><a onclick="print_excell()"><i class="fa fa-print"></i> Excell</a></li>
										</ul>
									</div>
								</div> -->
							</div>


							<div class="nav-tabs-custom">

								<ul class="nav nav-tabs">
									<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">List Setoran</a></li>
									<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Pilih Jadwal</a></li>
									<li class=" disabled"><a href="#tab_6" class="disabled" aria-expanded="false">Detail Setoran</a></li>
									<li class=" disabled"><a href="#tab_5" class="disabled" aria-expanded="false">Form</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<div class="dataTable_wrapper">
											<table class="table table-striped table-bordered table-hover" id="setoranTable">
												<thead>
													<tr>
														<th width="180px">#</th>
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

									<!-- 	<div class="row">
											<div class="col-md-3">
												<div class="box box-default collapsed-box">
													<div class="box-header with-border">
														<h3 class="box-title">Expandable</h3>
														<div class="box-tools pull-right">
															<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
															</button>
														</div>
													</div>
													<div class="box-body">
														The body of the box
													</div>
												</div>
											</div>
										</div> -->

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
														<input type="hidden" id="id_setoran_detail" name="id_setoran_detail" value='0' /> 
														<input type="hidden" id="id_setoran_header" name="id_setoran_header" class="form-control" placeholder="Kode Armada" readonly="true">
														<input type="hidden" id="armada_detail" name="armada_detail" class="form-control" placeholder="Kode Armada" readonly="true">
														<div class="row">
															<div class="form-group col-lg-12">
																<label>Cari Data</label>
																<select class="form-control select2 " style="width: 100%;" id="id_jadwal" name="id_jadwal">
																	<option value="0">-- Data Bis --</option>
																</select>
															</div>
															<div class="form-group col-lg-3">
																<label>Armada</label>
																<input type="text" id="kd_armada" name="kd_armada" class="form-control" placeholder="Armada" readonly="true">
															</div>
															<div class="form-group col-lg-3">
																<label>Layanan</label>
																<input type="hidden" id="id_layanan" name="id_layanan" class="form-control" placeholder="Layanan" readonly="true">
																<input type="text" id="nm_layanan" name="nm_layanan" class="form-control" placeholder="Layanan" readonly="true">
															</div>
															<div class="form-group col-lg-3">
																<label>Driver 1</label>
																<input type="hidden" id="driver1" name="driver1" class="form-control" placeholder="driver" readonly="true">
																<input type="text" id="nm_pegawai1" name="nm_pegawai1" class="form-control" placeholder="Driver 1" readonly="true">
															</div>
															<div class="form-group col-lg-3">
																<label>Driver 2</label>
																<input type="hidden" id="driver2" name="driver2" class="form-control" placeholder="driver" readonly="true">
																<input type="text" id="nm_pegawai2" name="nm_pegawai2" class="form-control" placeholder="Driver 2" readonly="true">
															</div>

															<div class="form-group col-lg-6">
																<label>Trayek</label>
																<input type="hidden" id="kd_trayek" name="kd_trayek" class="form-control" placeholder="driver" readonly="true">
																<input type="text" id="nm_trayek" name="nm_trayek" class="form-control" placeholder="Nama Trayek" readonly="true">
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

											<div class="modal-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="setoranTableDetail">
														<thead>
															<tr>
																<th width="150px">#</th>
																<th>ID</th>
																<th>Tanggal</th>
																<th>Armada</th>
																<th>Segmen</th>
																<th>Layanan</th>
																<th>Trayek</th>
															</tr>
														</thead>
													</table>
												</div>
											</div>
										</div>
									</div><!-- /.tab-pane -->
									<div class="tab-pane" id="tab_5">
										<div class="modal-content">
											<div class="box box-primary box-solid">
												<div class="box-header with-border">
													<h6 class="box-title" id="addModalLabel">Tambah Setoran</h6>
													<div class="box-tools pull-right">
														<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
													</div>
												</div>
												<div class="box-body">
													<div class="modal-body">
														<input type="hidden" id="id_setoran" name="id_setoran" value='0' />
														<div class="row">
															<div class="form-group col-lg-12">
																<label>Armada</label>
																<select class="form-control select2 " style="width: 100%;" id="armada" name="armada">
																	<option value="0">--Armada--</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
												<button type="button" class="btn btn-success" id='btnSaveHeader'>Simpan</button>
											</div> 
										</div>
									</div><!-- /.tab-pane -->
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
													<h6 class="box-title">Tambah Detail Penumpang</h6>
													<div class="box-tools pull-right">
														<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
													</div>
												</div>
												<div class="box-body no-padding">
													<form action="#" id="formDetailPng" role="form">
														<div class="modal-body">
															<input type="hidden" id="id_setoran_detail_pnp_" class="form-control" name="id_setoran_detail_pnp_" value='0' /> 
															<input type="hidden" id="id_setoran_detail_pnp" class="form-control" name="id_setoran_detail_pnp" readonly="true" placeholder="id_setoran_detail"/> 
															<input type="hidden" id="id_setoran_header_pnp" name="id_setoran_header_pnp" class="form-control" placeholder="id_setoran" readonly="true">
															<input type="hidden" id="armada_detail_pnp" name="armada_detail_pnp" class="form-control" placeholder="Kode Armada" readonly="true">
															<input type="hidden" id="tgl_pnp" name="tgl_pnp" class="form-control" placeholder="Kode Armada" readonly="true">
															<input type="hidden" id="id_jadwal_pnp" name="id_jadwal_pnp" class="form-control" placeholder="Kode Armada" readonly="true">
															<input type="hidden" id="id_trayek_pnp" name="id_trayek_pnp" class="form-control" placeholder="ID Trayek" readonly="true">
															<input type="hidden" id="id_layanan_pnp" name="id_layanan_pnp" class="form-control" placeholder="ID Layanan" readonly="true">
															<div class="row">
																<div class="row" style="background-color:LightGray;margin-left: 3px;margin-right: 3px;">
																	<div style="margin: 10px 10px 10px 10px">
																		<label class="control-label col-md-2">UDJ Bagasi</label>
																		<div class="col-md-10">
																			<input type="checkbox" data-toggle="toggle" data-size="normal" id="status_udj_bagasi" name="status_udj_bagasi" data-onstyle="success">
																			<p id="ket_status_udj_bagasi"></p>
																		</div>
																	</div>
																</div>

																<div class="form-group col-lg-8">
																	<label>Asal - Tujuan</label>
																	<select class="form-control select2" style="width: 100%;" id="kd_trayek_pnp" name="kd_trayek_pnp">
																		<option value="0">-- Trayek --</option>
																	</select>
																</div>
																<div class="form-group col-lg-4">
																	<label>Harga</label>
																	<input type="hidden" class="form-control"  data-decimals="0" min="0" id="mata_uang_pnp" name="mata_uang_pnp" placeholder="Mata Uang Pnp">
																	<input type="hidden" class="form-control"  data-decimals="0" min="0" id="km_trayek_detail_pnp" name="km_trayek_detail_pnp" placeholder="Mata Uang Pnp">
																	<input type="number" class="form-control"  data-decimals="0" min="0" id="harga_pnp" name="harga_pnp" placeholder="Harga Satuan">
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
																		<option value="6">Kantor Pemasaran</option>

																	</select>
																</div>
																<div class="form-group col-lg-4">
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
																<div class="form-group col-lg-4">
																	<label>Jumlah Penumpang</label>
																	<input type="number" id="jumlah_pnp" name="jumlah_pnp" class="form-control" placeholder="Jumlah Penumpang">
																</div>
															<!-- <div class="form-group col-lg-2">
																<label>Pendapatan Bagasi</label>
																<input type="number" class="form-control"  data-decimals="0" min="0" id="bagasi_pnp" name="bagasi_pnp" placeholder="Pendapatan Bagasi" value="0">
															</div> -->
														</div>
														<div class="row">
														</div>
														
														<div class="row">
															<div class="col-md-12">
																<label>Pendapatan Bagasi</label>
																<div class="row kolibagasi">
																	<div class="box-body">
																		<div class="form-group col-md-3" >
																			<input class="form-control margin-bottom" type='number' id="koli1" placeholder="Jumlah (Koli)">
																		</div>
																		<div class="form-group col-md-3" >
																			<input class="form-control margin-bottom" type='number' id="harga_koli1" placeholder="Harga (Per Koli)">
																		</div>
																		<div id="btnattachment">
																			<input type="button" class="btn btn-success " id="addkolibagasi" value="+" />
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn bg-purple btn-default" onClick='closeTabDetail()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
															<button type="button" class="btn btn-success" id='btnSaveDetailPng'><i class='fa fa-save'></i> Simpan</button>
														</div>
													</form>

													<div class="modal-footer">
														<button type="button" class="btn btn-info pull-left" onClick='getDataLmb()' id="button_lmb"><i class="fa fa-cloud-download"></i> Ambil Data LMB</button>
														<button type="button" class="btn btn-info pull-left" onClick='getDataTicket()'><i class="fa fa-cloud-download"></i> Ambil Data E-ticket</button>

														<button type="button" class="btn btn-warning pull-left" onClick='tampilGetData()'><i class="fa fa-cloud-download"></i> Tampil Semua Data</button>
													</div>

													<div class="modal-body">
														<div class="dataTable_wrapper">
															<table class="table table-striped table-bordered table-hover" id="setoranTableDetailPng">
																<thead>
																	<tr>
																		<th width="150px">#</th>
																		<th>Asal - Tujuan</th>
																		<th>RIT</th>
																		<th>Penumpang</th>
																		<th>Mata Uang</th>
																		<th>Harga</th>
																		<th>Pend.Bagasi</th>
																		<th>Total</th>
																		<th>Jns Penjualan</th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th></th>
																		<th colspan="2" id="tfoot_jum_pnp" align="center"></th>
																		<th id="tfoot_pnp"></th>
																		<th></th>
																		<th></th>
																		<th id="tfoot_bagasi_pnp"></th>
																		<th id="tfoot_total_pnp"></th>
																		<th></th>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Detail Penumpang -->



									<!-- Detail Pendapatan -->
									<div class="modal-content">
										<div class="box box-primary box-solid">
											<div class="box-header with-border">
												<h6 class="box-title">Tambah Detail Pendapatan</h6>
												<div class="box-tools pull-right">
													<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
												</div>
											</div>
											<div class="box-body no-padding">
												<div class="modal-body">
													<input type="hidden" id="id_setoran_detail_pend_" name="id_setoran_detail_pend_" value='0' /> 
													<input type="hidden" id="id_setoran_detail_pend" name="id_setoran_detail_pend" readonly="true"/> 
													<input type="hidden" id="id_setoran_header_pend" name="id_setoran_header_pend" class="form-control" placeholder="Kode Armada" readonly="true">
													<input type="hidden" id="armada_detail_pend" name="armada_detail_pend" class="form-control" placeholder="Kode Armada" readonly="true">
													<input type="hidden" id="tgl_pend" name="tgl_pend" class="form-control" placeholder="Kode Armada" readonly="true">
													<div class="row">

														<div class="form-group col-lg-4">
															<label>Jenis Pendapatan</label>
															<select class="form-control select2" style="width: 100%;" id="id_jenis_pend" name="id_jenis_pend" onchange="on_off_pendapatan()">
																<option value="0">-- Jenis --</option>
															</select>
														</div>

														<div class="form-group col-lg-4" id="div_pendapatan_jumlah">
															<label>Jumlah</label>
															<input type="number" id="jumlah_pend" name="jumlah_pend" class="form-control" placeholder="Jumlah">
														</div>
														<div class="form-group col-lg-4" id="div_pendapatan_harga">
															<label>Harga</label>
															<input type="number" class="form-control"  data-decimals="0" min="0" id="harga_pend" name="harga_pend" placeholder="Harga Satuan">
														</div>

														<div class="form-group col-lg-4" id="div_pendapatan_km_tempuh">
															<label>KM Tempuh</label>
															<input type="number" id="km_tempuh_pend" name="km_tempuh_pend" class="form-control" placeholder="KM Tempuh">
														</div>
														<div class="form-group col-lg-4" id="div_pendapatan_rp_km">
															<label>Rp/KM</label>
															<input type="number" class="form-control"  data-decimals="0" min="0" id="rp_km_pend" name="rp_km_pend" placeholder="Rp/KM">
														</div>



													</div>
													<div class="modal-footer">
														<button type="button" class="btn bg-purple btn-default" onClick='closeTabDetail()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
														<button type="button" class="btn btn-success" id='btnSaveDetailPend'>Simpan</button>
													</div>

													<div class="modal-body">
														<div class="dataTable_wrapper">
															<table class="table table-striped table-bordered table-hover" id="setoranTableDetailPend">
																<thead>
																	<tr>
																		<th>#</th>
																		<th>Jenis</th>
																		<th>Jumlah</th>
																		<th>Harga</th>
																		<th>Total</th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th></th>
																		<th></th>
																		<th></th>
																		<th id="tfoot_jum_pend" align="center"></th>
																		<th id="tfoot_total_pend"></th>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Detail Pendapatan -->



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
													<input type="hidden" id="id_setoran_detail_beban_" name="id_setoran_detail_beban_" value='0' /> 
													<input type="hidden" id="id_setoran_detail_beban" name="id_setoran_detail_beban" readonly="true"/> 
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
															<!-- <input type="number" id="jumlah_beban" name="jumlah_beban" class="form-control" placeholder="Jumlah"> -->
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
																<tfoot>
																	<tr>
																		<th></th>
																		<th></th>
																		<th></th>
																		<th id="tfoot_jum_beban" align="center"></th>
																		<th id="tfoot_total_beban"></th>
																	</tr>
																</tfoot>
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


<div class="modal fade" id="printLaporan" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="Form-add-bu" id="addModalLabel">Print Laporan AK 13</h4>
			</div>
			<form action="<?=base_url('setoran/printLaporan');?>" method="POST" id="formLaporan">
				<div class="modal-body">
					<div class="row">
						<input type="hidden" class="form-control" name="id_cabang_print" id="id_cabang_print">
						<input type="hidden" class="form-control" name="tanggal_print" id="tanggal_print">
						<div class="form-group col-lg-6">
							<label>Segment</label>
							<select class="form-control select2" style="width: 100%;" name="segment_print" id="segment_print" required="required">
								<option value="" disabled selected> -- Segmen -- </option>
								<?php foreach ($combobox_segmen->result() as $rowmenu) { ?>
								<option value="<?= $rowmenu->id_segment?>"><?= $rowmenu->nm_segment?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group col-lg-6">
							<label>Armada</label>
							<select class="form-control select2" style="width: 100%;" name="armada_print" id="armada_print" required="required">
								<option value="" disabled selected>--Armada--</option>	
							</select>
						</div>

						<div class="col-sm-12" align="right">
							<hr>
							<div class="form-group form-float">
								<button type="button" class="btn btn-default m-t-15 waves-effect" data-dismiss="modal">Close</button>
								<button class="btn btn-success m-t-15 waves-effect" formtarget="_blank" type="submit" name="print_data_laporan" value="2"><i class="fa fa-print"></i> Print Excell</button>
								<button class="btn btn-warning m-t-15 waves-effect" formtarget="_blank" type="submit" name="print_data_laporan" value="0"><i class="fa fa-print"></i> Print PDF</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row" >
	<div class="col-lg-12">
		<div class="modal fade" id="modalGetData" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<div class="form-inline">
							<h4 id="addModalLabel"><b>List Detail Penumpang dari E-Ticketing</b></h4>
						</div>
						<input type="hidden" id="id_setoran_detail_mod" name="id_setoran_detail_mod" class="form-control">
						<input type="hidden" id="id_setoran_mod" name="id_setoran_mod" class="form-control">
						<input type="hidden" id="armada_mod" name="armada_mod" class="form-control">
						<input type="hidden" id="tanggal_mod" name="tanggal_mod" class="form-control">
						<input type="hidden" id="id_jadwal_mod" name="id_jadwal_mod" class="form-control">
					</div>
					<div class="modal-body">
						<div class="dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="table-eticket">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Armada</th>
										<th>KD Trayek</th>
										<th>Penumpang</th>
										<th>Harga</th>
										<th>Total</th>
										<th>Jenis</th>
									</tr>
								</thead>
								<tbody id="tdiv_eticket">
									
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal-header">
						<div class="form-inline">
							<h4 id="addModalLabel"><b>List Detail Penumpang dari LMB Online</b></h4>
						</div>
					</div>
					<div class="modal-body">
						<div class="dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="dataGetTable">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Armada</th>
										<th>Kode Trayek</th>
										<th>RIT</th>
										<th>Jumlah Penumpang</th>
										<th>Harga</th>
										<th>Total</th>
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

<div class="modal fade" id="editPngModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="Form-add-bu" id="editPngModalLabel">Form Add</h4>
			</div>
			<div class="modal-body">
				<form id="formEditPnp">
					<input type="hidden" id="id_setoran_pnp_edit" name="id_setoran_pnp_edit" value='' />
					<div class="form-group">
						<label>Asal - Tujuan</label>
						<select class="form-control select2" style="width: 100%;" id="kd_trayek_edit_pnp" name="kd_trayek_edit_pnp">
							<option value="0">-- Trayek --</option>
						</select>
					</div>
					<div class="form-group">
						<label>RIT</label>
						<select class="form-control" style="width: 100%;" id="rit_edit_pnp" name="rit_edit_pnp">
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

					<div class="form-group">
						<label>Penumpang</label>
						<input type="number" id="jumlah_edit_pnp" name="jumlah_edit_pnp" class="form-control" placeholder="Jumlah Penumpang">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="number" id="harga_edit_pnp" name="harga_edit_pnp" class="form-control" placeholder="Harga">
					</div>
					<div class="form-group">
						<label>Pendapatan Bagasi</label>
						<input type="number" id="bagasi_edit_pnp" name="bagasi_edit_pnp" class="form-control" placeholder="Pendapatan Bagasi" value="0">
					</div>
					<div class="form-group">
						<label>Jenis Penjualan</label>
						<select class="form-control select2" style="width: 100%;" id="jenis_penjualan_edit_pnp" name="jenis_penjualan_edit_pnp">
							<option value="0">-- Jenis Penjualan --</option>
							<option value="1">Damri Apps</option>
							<option value="2">OTA (Online Travel Agent)</option>
							<option value="3">Agen</option>
							<option value="4">Loket</option>
							<option value="5">Awak Bus</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id='btnSaveEditPnp'>Save</button>
			</div>
		</div>
	</div>
</div>


<?= $this->load->view('basic_js'); ?>
<script type='text/javascript'>
	$("#jumlah_beban").inputSpinner();
	$("#harga_pnp").inputSpinner();
	$("#bagasi_pnp").inputSpinner();

	$("#harga_pend").inputSpinner();
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

	function on_off_pendapatan() {
		var id_jenis_pend = $("#id_jenis_pend").val();
		if(id_jenis_pend==6){
			document.getElementById('div_pendapatan_jumlah').style.display = 'none';
			document.getElementById('div_pendapatan_harga').style.display = 'none';
			document.getElementById('div_pendapatan_km_tempuh').style.display = 'block';
			document.getElementById('div_pendapatan_rp_km').style.display = 'block';
			$("#km_tempuh_pend").val('');
		}else if(id_jenis_pend==28){
			document.getElementById('div_pendapatan_jumlah').style.display = 'block';
			document.getElementById('div_pendapatan_harga').style.display = 'block';
			document.getElementById('div_pendapatan_km_tempuh').style.display = 'none';
			document.getElementById('div_pendapatan_rp_km').style.display = 'none';
			$("#jumlah_pend").val('');
			$("#harga_pend").val('');
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
						url: "<?= base_url()?>setoran/ax_data_setoran/",
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
						var id2 = "'"+full['id_setoran']+"','"+full['tgl_setoran']+"','"+full['armada']+"','"+full['id_bu']+"','"+full['id_pool']+"','"+full['active']+"'";

						var str = '<div class="btn-group">';
						str += '<a type="button" title="Detail Jadwal" class="btn btn-sm btn-info" onclick="tambahDetail(' + id + ')"><i class="fa fa-list"></i> </a>';						

						if(full['active']==1){
							str += '<a type="button" class="btn btn-sm btn-danger" title="Delete Data" onClick="hapusHeader(' + data + ')"><i class="fa fa-trash"></i> </a>';

							str += '<a type="button" title="Print AK13" class="btn btn-sm bg-olive" onclick="printAK13(' + id2 + ')"><i class="fa fa-print"></i> </a>';	
							str += '<a type="button" title="Print Slip Setoran" class="btn btn-sm bg-olive" onclick="printSlip(' + id2 + ')"><i class="fa fa-print"></i> </a>';	

							str += '<a type="button" class="btn btn-sm btn-warning" onClick="changeActive(' + data + ','+full['active']+')" title="Close Setoran"><i class="fa fa-sign-out"></i> </a>';
						}else{
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


	var setoranTableDetail = $('#setoranTableDetail').DataTable({
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
						url: "<?= base_url()?>setoran/ax_data_setoran_detail/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_setoran": $("#id_setoran_header").val()
							});
						}
					},
					columns: 
					[
					{ data: "id_setoran_detail", render: function(data, type, full, meta){
						var id1 = "'"+full['id_setoran_detail']+"','"+full['armada']+"'";
						var id2 = "'"+full['id_setoran_detail']+"','"+full['id_setoran']+"','"+full['armada']+"','"+full['tanggal']+"','"+full['id_bu']+"'";
						var id3 = "'"+full['id_setoran_detail']+"','"+full['id_bu']+"','"+full['armada']+"'";
						// var id4 = "'"+full['id_setoran_detail']+"','"+full['id_setoran']+"','"+full['armada']+"','"+full['tanggal']+"','"+full['id_bu']+"','"+full['id_jadwal']+"','"+full['status_udj']+"','"+full['status_udj_bagasi']+"'"+"','"+full['kd_trayek']+"'";
						var id4 = "'"+full['id_setoran_detail']+"','"+full['id_setoran']+"','"+full['armada']+"','"+full['tanggal']+"','"+full['id_bu']+"','"+full['id_jadwal']+"','"+full['status_udj']+"','"+full['status_udj_bagasi']+"','"+full['kd_trayek']+"','"+full['id_trayek']+"','"+full['id_layanan']+"'";
						var id5 = "'"+full['id_setoran_detail']+"','"+full['id_setoran']+"','"+full['armada']+"','"+full['tgl_setoran']+"','"+full['kd_segmen']+"','"+full['kd_trayek']+"'";

						var str = '';
						str += '<div class="btn-group">';

						str += '<a type="button" class="btn btn-sm btn-primary" title="Detail Setoran" onclick="tambahPng(' + id4 + ')"><i class="fa fa-group"></i> </a>';
						str += '<a type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="hapusDetail(' + id3 + ')"><i class="fa fa-trash"></i> </a>';
						// str += '<a type="button" class="btn btn-sm btn-warning" title="Print Slip Laporan" onclick="printDetail(' + id5 + ')"><i class="fa fa-print"></i> </a>';


						str += '</div>';
						return str;
					}},
					{ data: "id_setoran_detail" },
					{ data: "tanggal" },
					{ data: "armada" },
					{ data: "kd_segmen" },
					{ data: "nm_layanan" },
					{ data: "kd_trayek" },
					
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
						url: "<?= base_url()?>setoran/ax_data_setoran_detail_pnp/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_setoran": $("#id_setoran_header_pnp").val(),
								"id_setoran_detail": $("#id_setoran_detail_pnp").val()
							});
						}
					},
					columns: 
					[
					{ data: "id_setoran_pnp", render: function(data, type, full, meta){
						var str = '';
						str += '<div class="btn-group">';
						// str += '<a type="button" class="btn btn-sm btn-info" title="Detail Pertelaan" onclick="pertelaanPng(' + data + ')"><i class="fa fa-list-alt"></i> </a>';
						// str += '<a type="button" class="btn btn-sm btn-primary" title="Edit" onclick="editPng(' + data + ')"><i class="fa fa-pencil"></i> </a>';
						str += '<a type="button" class="btn btn-sm btn-danger" title="Delete" onclick="hapusPng(' + data + ')"><i class="fa fa-trash"></i> </a>';
						str += '</div>';
						return str;
					}},
					{ data: "kd_trayek" },
					{ data: "rit" },
					{ data: "jumlah", render: $.fn.dataTable.render.number( '.', ',',0 ) },
					{ data: "mata_uang" },
					{ data: "harga", render: $.fn.dataTable.render.number( '.', ',',0 ) },
					{ data: "bagasi_pnp", render: $.fn.dataTable.render.number( '.', ',',0 ) },
					{ data: "total", render: function(data, type, full, meta){
						return angka(parseInt(data).toFixed(0));
					} },
					{ data: "jenis_penjualan_pnp", render: function(data, type, full, meta){
						if(data==1){
							return 'Damri Apps';
						}else if(data==2){
							return 'OTA';
						}else if(data==3){
							return 'Agen';
						}else if(data==4){
							return 'Loket';
						}else if(data==5){
							return 'Awak Bus';
						}else if(data==6){
							return 'Kantor Pemasaran';
						}else{
							return '';
						}
					} },
					
					],

					"drawCallback": function(settings) {
						var api = this.api();
						var jsondata = api.ajax.json();
						penumpang = jsondata['penumpang'];
						bagasi = jsondata['bagasi'];
						total = jsondata['total'];
						$('#tfoot_jum_pnp').html('<b>JUMLAH</b>');
						$('#tfoot_pnp').html('<b>'+formatNumber(penumpang)+'</b>');
						$('#tfoot_bagasi_pnp').html('<b>Rp. '+formatNumber(bagasi)+'</b>');
						$('#tfoot_total_pnp').html('<b>Rp. '+formatNumber(total)+'</b>');
					}

				});

	var setoranTableDetailPend = $('#setoranTableDetailPend').DataTable({
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
						url: "<?= base_url()?>setoran/ax_data_setoran_detail_pend/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_setoran": $("#id_setoran_header_pend").val(),
								"id_setoran_detail": $("#id_setoran_detail_pend").val()
							});
						}
					},
					columns: 
					[
					{ data: "id_setoran_pend", render: function(data, type, full, meta){
						var str = '';
						str += '<a type="button" class="btn btn-sm btn-primary" title="Edit" onclick="editPend(' + data + ')"><i class="fa fa-pencil"></i> </a>';
						str += '<button class="btn btn-danger btn-sm btn.flat" onclick="hapusPend(' + data + ')"><i class="fa fa-trash"></i></button>';
						return str;
					}},
					{ data: "keterangan" },
					{ data: "jumlah", render: $.fn.dataTable.render.number( '.', ',',0 ) },
					{ data: "harga", render: $.fn.dataTable.render.number( '.', ',',0 ) },
					{ data: "harga", render: function(data, type, full, meta){
						return angka(parseInt(data*full['jumlah']).toFixed(0));
					} },
					
					],

					"drawCallback": function(settings) {
						var api = this.api();
						var jsondata = api.ajax.json();
						total = jsondata['total'];
						$('#tfoot_jum_pend').html('<b>JUMLAH</b>');
						$('#tfoot_total_pend').html('<b>Rp. '+formatNumber(total)+'</b>');
					}
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
						url: "<?= base_url()?>setoran/ax_data_setoran_detail_beban/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_setoran": $("#id_setoran_header_beban").val(),
								"id_setoran_detail": $("#id_setoran_detail_beban").val()
							});
						}
					},
					columns: 
					[
					{ data: "id_setoran_beban", render: function(data, type, full, meta){
						var str = '';
						str += '<a type="button" class="btn btn-sm btn-primary" title="Edit" onclick="editBeban(' + data + ')"><i class="fa fa-pencil"></i> </a>';
						str += '<button class="btn btn-danger btn-sm btn.flat" onclick="hapusBeban(' + data + ')"><i class="fa fa-trash"></i></button>';
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
					],

					"drawCallback": function(settings) {
						var api = this.api();
						var jsondata = api.ajax.json();
						total = jsondata['total'];
						$('#tfoot_jum_beban').html('<b>JUMLAH</b>');
						$('#tfoot_total_beban').html('<b>Rp. '+formatNumber(total)+'</b>');
					}
				});


	$('#btnSaveHeader').on('click', function () {
		if($('#armada').val() == null){
			alertify.alert("Warning", "Armada Belum di Isi.");
		}else if($('#id_bu_filter').val() == '0'){
			alertify.alert("Warning", "Cabang Belum di Pilih.");
		}else if($('#tgl_filter').val() == ''){
			alertify.alert("Warning", "Tanggal Belum di Isi.");
		}else if($('#id_pool').val() == ''){
			alertify.alert("Warning", "Pool Belum di Pilih.");
		}else {
			var url = '<?=base_url()?>setoran/ax_set_data_header';
			var data = {
				id_setoran: $('#id_setoran').val(),
				armada: $('#armada').val(),
				tanggal: $('#tgl_filter').val(),
				id_bu: $('#id_bu_filter').val(),
				id_pool: $('#id_pool').val(),

			};
			$.ajax({
				url: url,
				method: 'POST',
				data: data,
				statusCode: {
					500: function() {
						alertify.alert("Warning","Data Duplicate");
					}
				}
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				if(data['status'] == "1")
				{
					alertify.success("Data setoran Disimpan.");
					$('.nav-tabs a[href="#tab_1"]').tab('show');
					setoranTable.ajax.reload();
					setoranTable.columns.adjust().draw();
					armadalist();							
				}else{
					alertify.error("Data setoran Gagal Disimpan.");
							//$('#addModal').modal('hide');
							setoranTable.ajax.reload();
						}
					});
		}
	});

	$('#btnSaveDetail').on('click', function () {
		if($('#id_jadwal').val() == '0'){
			alertify.alert("Warning", "Cari data Belum di Isi.");
		}else {
			var url = '<?=base_url()?>setoran/ax_set_data_detail';
			var id_bu = $('#id_bu_filter').val();
			var kd_armada = $('#armada_detail').val();
			var data = {
				id_setoran_header: $('#id_setoran_header').val(),
				id_setoran_detail: $('#id_setoran_detail').val(),
				id_jadwal: $('#id_jadwal').val(),
				armada: $('#armada_detail').val(),
				tanggal: $('#tgl_keberangkatan').val(),
				kd_segmen: $('#kd_segmen').val(),
				kd_trayek: $('#kd_trayek').val(),
				driver1: $('#driver1').val(),
				driver2: $('#driver2').val(),
				id_layanan: $('#id_layanan').val(),
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
							//$('#addModal').modal('hide');
							$('#id_jadwal').val(null).trigger('change');
							combo_jadwal(id_bu,kd_armada);
							$('#select2-id_jadwal-container').html("-- Data Bis --");
							setoranTableDetail.ajax.reload();
						}else{
							alertify.error("Data setoran Gagal Disimpan.");
							//$('#addModal').modal('hide');
							setoranTableDetail.ajax.reload();
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
			alertify.alert("Warning", "Jumlah Belum di Isi");
		}else {
			
			dataArr = $("#kd_trayek_pnp").val().split("~");

			var url = '<?=base_url()?>setoran/ax_set_data_detail_pnp';
			var data_save = [{}];

			// var data_save = {
			// 	id_setoran_detail_pnp: $('#id_setoran_detail_pnp_').val(),
			// 	id_setoran_header: $('#id_setoran_header_pnp').val(),
			// 	id_setoran_detail: $('#id_setoran_detail_pnp').val(),
			// 	armada: $('#armada_detail_pnp').val(),
			// 	tanggal: $('#tgl_pnp').val(),
			// 	kd_trayek: dataArr[0],
			// 	jumlah_pnp: $('#jumlah_pnp').val(),
			// 	rit_pnp: $('#rit_pnp').val(),
			// 	harga_pnp: $('#harga_pnp').val(),
			// 	bagasi_pnp: $('#bagasi_pnp').val(),
			// 	jenis_penjualan_pnp: $('#jenis_penjualan_pnp').val(),
			// 	mata_uang: $('#mata_uang_pnp').val(),
			// 	km_trayek: $('#km_trayek_detail_pnp').val(),
			// };

			// var data_save = $('#formDetailPng').serializeArray();

			totkoli = new Array();
			for (let indexkoli = 1; indexkoli <= counteratt; indexkoli++) {

				var tampkoli = [
				$("#koli"+indexkoli).val(),
				]
				totkoli.push(tampkoli);
			}

			tothgkoli = new Array();
			for (let indexhgkoli = 1; indexhgkoli <= counteratt; indexhgkoli++) {

				var tamphgkoli = [
				$("#harga_koli"+indexhgkoli).val(),
				]
				tothgkoli.push(tamphgkoli);
			}

			data_save.push({ name: "id_setoran_detail_pnp", value: $('#id_setoran_detail_pnp_').val() });
			data_save.push({ name: "id_setoran_header", value: $('#id_setoran_header_pnp').val() });
			data_save.push({ name: "id_setoran_detail", value: $('#id_setoran_detail_pnp').val() });
			data_save.push({ name: "armada", value: $('#armada_detail_pnp').val() });
			data_save.push({ name: "tanggal", value: $('#tgl_pnp').val() });
			data_save.push({ name: "kd_trayek", value: dataArr[0] });
			data_save.push({ name: "jumlah_pnp", value: $('#jumlah_pnp').val() });
			data_save.push({ name: "rit_pnp", value: $('#rit_pnp').val() });
			data_save.push({ name: "harga_pnp", value: $('#harga_pnp').val() });
			data_save.push({ name: "bagasi_pnp", value: $('#bagasi_pnp').val() });
			data_save.push({ name: "jenis_penjualan_pnp", value: $('#jenis_penjualan_pnp').val() });
			data_save.push({ name: "mata_uang", value: $('#mata_uang_pnp').val() });
			data_save.push({ name: "km_trayek", value: $('#km_trayek_detail_pnp').val() });


			data_save.push({ name: "jmlkoli", value: counteratt });
			data_save.push({ name: "koli", value: totkoli });
			data_save.push({ name: "harga_koli", value: tothgkoli });

			$.ajax({
				url: url,
				method: 'POST',
				data: data_save,
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
						// tamphgkoli.empty();

						for (let indexkoli = 1; indexkoli <= counteratt; indexkoli++) {
							var tampkoli = [
							$("#koli"+indexkoli).val(""),
							]
						}
						for (let indexhgkoli = 1; indexhgkoli <= counteratt; indexhgkoli++) {
							var tamphgkoli = [
							$("#harga_koli"+indexhgkoli).val(""),
							]
						}

					}else{
						alertify.error("Data setoran Gagal Disimpan.");
						setoranTableDetailPng.ajax.reload();
					}
				});
			}
		});

$('#btnSaveDetailPend').on('click', function () {
	if($('#id_jenis_pend').val() == '0'){
		alertify.alert("Warning", "Jenis Pendapatan Belum di Isi.");
		// }else if($('#jumlah_pend').val() == ''){
		// 	alertify.alert("Warning", "Jumlah Belum di Isi.");
		// }else if($('#harga_pend').val() == ''){
		// 	alertify.alert("Warning", "Harga Belum di Isi.");
	}else {
		var url = '<?=base_url()?>setoran/ax_set_data_detail_pend';

		var id_jenis = $('#id_jenis_pend').val();

		if(id_jenis==6){
			var data = {
				id_setoran_detail_pend: $('#id_setoran_detail_pend_').val(),
				id_setoran_header: $('#id_setoran_header_pend').val(),
				id_setoran_detail: $('#id_setoran_detail_pend').val(),
				armada: $('#armada_detail_pend').val(),
				tanggal: $('#tgl_pend').val(),
				id_jenis: $('#id_jenis_pend').val(),
				jumlah_pend: $('#km_tempuh_pend').val(),
				harga_pend: $('#rp_km_pend').val(),
			};
		}else{
			var data = {
				id_setoran_detail_pend: $('#id_setoran_detail_pend_').val(),
				id_setoran_header: $('#id_setoran_header_pend').val(),
				id_setoran_detail: $('#id_setoran_detail_pend').val(),
				armada: $('#armada_detail_pend').val(),
				tanggal: $('#tgl_pend').val(),
				id_jenis: $('#id_jenis_pend').val(),
				jumlah_pend: $('#jumlah_pend').val(),
				harga_pend: $('#harga_pend').val(),
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
				setoranTableDetailPend.ajax.reload();
				$('#select2-id_jenis_pend-container').html('--Jenis--');
				$('#id_jenis_pend').val('');
				$('#jumlah_pend').val('');
				$('#harga_pend').val('');
				$('#km_tempuh_pend').val('');
				$('#rp_km_pend').val('');
			}else{
				alertify.error("Data setoran Gagal Disimpan.");
							//$('#addModal').modal('hide');
							setoranTableDetailPend.ajax.reload();
						}
					});
	}
});

$('#btnSaveDetailBeban').on('click', function () {
	if($('#id_jenis_beban').val() == '0'){
		alertify.alert("Warning", "Jenis Beban Belum di Isi.");
		// }else if($('#jumlah_beban').val() == ''){
		// 	alertify.alert("Warning", "Jumlah Belum di Isi.");
		// }else if($('#harga_beban').val() == ''){
		// 	alertify.alert("Warning", "Harga Belum di Isi.");
	}else {
		var url = '<?=base_url()?>setoran/ax_set_data_detail_beban';

		var jenis = $('#id_jenis_beban').val();

		if(jenis==7){
			var data = {
				id_setoran_detail_beban: $('#id_setoran_detail_beban_').val(),
				id_setoran_header: $('#id_setoran_header_beban').val(),
				id_setoran_detail: $('#id_setoran_detail_beban').val(),
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
				id_setoran_detail_beban: $('#id_setoran_detail_beban_').val(),
				id_setoran_header: $('#id_setoran_header_beban').val(),
				id_setoran_detail: $('#id_setoran_detail_beban').val(),
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
							//$('#addModal').modal('hide');
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
	}else if($('#kd_trayek_edit_pnp').val() == '0'){
		alertify.alert("Warning", "Asal - Tujuan Belum di Pilih.");
	}else if($('#harga_edit_pnp').val() == ''){
		alertify.alert("Warning", "Harga Belum di Isi.");
	}else if($('#jumlah_edit_pnp').val() == ''){
		alertify.alert("Warning", "Jumlah Belum di Isi.");
	}
	else{
		var url = '<?=base_url()?>setoran/ax_set_data_update_png';
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

		if($('#id_bu_filter').val()!='0' && $('#id_pool').val()!='0' && $('#tgl_filter').val()!=''){
			$('#addModalLabel').html('Form Tambah Setoran');
			$('.nav-tabs a[href="#tab_5"]').tab('show');
		}else{
			alertify.alert("Warning", "Pilih Cabang, Pilih Pool dan Isi tanggal terlebih dahulu");
		}

	}else{
		var url = '<?=base_url()?>setoran/ax_get_data_by_id';
		var data = {
			id_setoran: id_setoran
		};

		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			$('#addModalLabel').html('Form Edit setoran');
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
			$('#id_setoran').val(data['id_setoran']);
			$('#kd_setoran').val(data['kd_setoran']);
			$('#rangka_setoran').val(data['rangka_setoran']);
			$('#plat_setoran').val(data['plat_setoran']);
			$('#mesin_setoran').val(data['mesin_setoran']);
			$('#tahun_setoran').val(data['tahun_setoran']);
			$('#merek_setoran').val(data['merek_setoran']);
			$('#tipe_setoran').val(data['tipe_setoran']);
			$('#silinder_setoran').val(data['silinder_setoran']);
			$('#ukuran_setoran').val(data['ukuran_setoran']);
			$('#seat_setoran').val(data['seat_setoran']);
			$('#segment_setoran').val(data['segment_setoran']);
			$('#status_setoran').val(data['status_setoran']);
			$('#active').val(data['active']);
			$('#addModal').modal('show');
		});
	}
}

function tambahDetail(id_setoran,armada,id_bu){
	if(id_setoran == 0){
						//$('#addModalLabel').html('Form Add setoran');
						$('.nav-tabs a[href="#tab_2"]').tab('show');
						combo_jadwal(id_bu,armada);
					}else{
						var url = '<?=base_url()?>setoran/ax_get_data_by_id';
						var data = {
							id_setoran: id_setoran
						};
						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							$('#id_setoran_header').val(id_setoran);
							$('#armada_detail').val(armada);
							$('#id_jadwal').val(0);
							$('#select2-id_jadwal-container').html('--Data Bus--');
							combo_jadwal(id_bu,armada);
							$('.nav-tabs a[href="#tab_2"]').tab('show');
							setoranTableDetail.ajax.reload();
							setoranTableDetail.columns.adjust().draw();
						});
					}
				}

				function tambahPng(id_setoran_detail,id_setoran,kd_armada,tanggal,id_bu,id_jadwal,status_udj,status_udj_bagasi,kd_trayek,id_trayek,id_layanan){
					combo_trayek_pnp(id_bu,id_trayek,id_layanan);
					combo_point_pertelaan(id_bu,id_trayek,id_layanan);
					$('#select2-kd_trayek_pnp-container').html('');
					$('#id_setoran_detail_pnp').val(id_setoran_detail);
					$('#id_setoran_header_pnp').val(id_setoran);
					$('#armada_detail_pnp').val(kd_armada);
					$('#id_jadwal_pnp').val(id_jadwal);
					$('#tgl_pnp').val(tanggal);
					$('#id_trayek_pnp').val(id_trayek);
					$('#id_layanan_pnp').val(id_layanan);
					$('#kd_trayek').val('');
					$('#jumlah_pnp').val('');
					$('#harga_pnp').val('');
					$('#select2-kd_trayek_pnp-container').html("--Trayek--");
					setoranTableDetailPng.ajax.reload();
					$('.nav-tabs a[href="#tab_6"]').tab('show');
					setoranTableDetailPng.columns.adjust().draw();


					//Pendapatan
					combo_jenis_pend(id_bu);
					$('#select2-id_jenis_pend-container').html('');
					$('#id_setoran_detail_pend').val(id_setoran_detail);
					$('#id_setoran_header_pend').val(id_setoran);
					$('#armada_detail_pend').val(kd_armada);
					$('#tgl_pend').val(tanggal);
					$('#id_jenis_pend').val('');
					$('#jumlah_pend').val('');
					$('#harga_pend').val('');
					setoranTableDetailPend.ajax.reload();
					$('.nav-tabs a[href="#tab_3"]').tab('show');
					setoranTableDetailPend.columns.adjust().draw();
					harga_rp_km(kd_trayek);
					document.getElementById('div_pendapatan_jumlah').style.display = 'block';
					document.getElementById('div_pendapatan_harga').style.display = 'block';
					document.getElementById('div_pendapatan_km_tempuh').style.display = 'none';
					document.getElementById('div_pendapatan_rp_km').style.display = 'none';


					//Beban
					document.getElementById('div_status_jenis_beban').style.display = 'none';
					document.getElementById('div_total_bbm_beban').style.display = 'none';
					document.getElementById('div_harga_bbm_beban').style.display = 'none';
					document.getElementById('div_jumlah_bbm_beban').style.display = 'none';
					combo_jenis_beban(id_bu);
					$('#select2-id_jenis_beban-container').html('');
					$('#id_setoran_detail_beban').val(id_setoran_detail);
					$('#id_setoran_header_beban').val(id_setoran);
					$('#armada_detail_beban').val(kd_armada);
					$('#tgl_beban').val(tanggal);
					$('#id_jenis_beban').val('');
					$('#jumlah_beban').val('');
					$('#harga_beban').val('');
					setoranTableDetailBeban.ajax.reload();
					$('.nav-tabs a[href="#tab_4"]').tab('show');
					setoranTableDetailBeban.columns.adjust().draw();

					if(status_udj==1){
						$("#status_udj").bootstrapToggle('on');
						$("#ket_status_udj").html('<b><font color="blue">UDJ Pengemudi sebesar 7%</font></b>');
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

					//buttonLMB
					show_hide_button_lmb();

				}

				function hapusHeader(id_setoran){
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus data ini?', 
						function(){
							var url = '<?=base_url()?>setoran/ax_unset_data_setoran_header';
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
									armadalist();
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
							var url = '<?=base_url()?>setoran/ax_unset_data_setoran_pnp';
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

				function hapusPend(id_setoran_pend){
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

				function hapusBeban(id_setoran_beban){
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus data ini?', 
						function(){
							var url = '<?=base_url()?>setoran/ax_unset_data_setoran_beban';
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

				function hapusDetail(id_setoran_detail, id_bu, kd_armada){
					alertify.confirm(
						'Konfirmasi', 
						'Apa anda yakin akan menghapus data ini?', 
						function(){
							var url = '<?=base_url()?>setoran/ax_unset_data_setoran_detail';
							var data = {
								id_setoran_detail: id_setoran_detail
							};
							$.ajax({
								url: url,
								method: 'POST',
								data: data
							}).done(function(data, textStatus, jqXHR) {

								var data = JSON.parse(data);
								if(data['status'] == "1"){
									alertify.success("Data Terhapus.");
									setoranTableDetail.ajax.reload();
									$('#id_jadwal').val(null).trigger('change');
									combo_jadwal(id_bu,kd_armada);
									$('#select2-id_jadwal-container').html("-- Data Bis --");

								}else{
									alertify.error("Data Gagal Terhapus.");
									setoranTableDetail.ajax.reload();
								}
							});
						},
						function(){ }
						);
				}

				function DeleteData(id_setoran){
					alertify.confirm(
						'Confirmation', 
						'Are you sure you want to delete this data?', 
						function(){
							var url = '<?=base_url()?>setoran/ax_unset_data';
							var data = {
								id_setoran: id_setoran
							};

							$.ajax({
								url: url,
								method: 'POST',
								data: data
							}).done(function(data, textStatus, jqXHR) {
								var data = JSON.parse(data);
								setoranTable.ajax.reload();
								alertify.error('Data setoran Dihapus.');
							});
						},
						function(){ }
						);
				}

				function editPng(id_setoran_pnp){
					var url = '<?=base_url()?>setoran/ax_get_data_by_id_setoran_pnp';
					var data = {
						id: id_setoran_pnp
					};
					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#editPngModalLabel').html('Edit Detail Penumpang <font color="blue"><b>'+data['kd_trayek']+'</b></font>');

						$('#id_setoran_pnp_edit').val(data['id_setoran_pnp']);
						$('#kd_trayek_edit_pnp').val(data['kd_trayek']+'~'+data['mata_uang']).trigger('change');
						$('#rit_edit_pnp').val(data['rit']);
						$('#jumlah_edit_pnp').val(data['jumlah']);
						$('#harga_edit_pnp').val(data['harga']);
						$('#bagasi_edit_pnp').val(data['bagasi_pnp']);
						$('#jenis_penjualan_edit_pnp').val(data['jenis_penjualan_pnp']).trigger('change');
						$('#editPngModal').modal('show');
					});
				}

			/// attachment
			function closeTab(){
				$('.nav-tabs a[href="#tab_1"]').tab('show');
				setoranTable.columns.adjust().draw();
			}
			
			function closeTabDetail(){
				$('.nav-tabs a[href="#tab_2"]').tab('show');
				setoranTableDetail.columns.adjust().draw();
			}

			$('#id_bu_filter').select2({
				'allowClear': true
			}).on("change", function (e) {
				setoranTable.ajax.reload();
				armadalist();
				poollist();
				show_hide_button_lmb();
			});

			$('#id_pool').select2({
				'allowClear': true
			}).on("change", function (e) {
				setoranTable.ajax.reload();
				armadalist();
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
				armadalist();
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

			$('#kd_trayek_edit_pnp').select2({
				'placeholder': "Trayek",
				'allowClear': true
			}).on("change", function (e) {
				harga_trayek_edit_pnp();
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
					url : '<?=base_url()?>setoran/ax_get_jadwal_rinci',
					success : function(data){
						$.each(data,function(a,b){
							$('#kd_trayek').val(b["kd_trayek"]);
							$('#nm_trayek').val(b["nm_trayek"]);
							$('#driver1').val(b["driver1"]);
							$('#nm_pegawai1').val(b["nm_pegawai1"]);
							$('#driver2').val(b["driver2"]);
							$('#nm_pegawai2').val(b["nm_pegawai2"]);
							$('#kd_segmen').val(b["kd_segmen"]);
							$('#nm_segmen').val(b["nm_segmen"]);
							$('#tgl_keberangkatan').val(b["tanggal"]);
							$('#kd_armada').val(b["armada"]);
							$('#id_layanan').val(b["layanan"]);
							$('#nm_layanan').val(b["nm_layanan"]);
						});
					}
				});
			});
			
			function combo_jadwal(id_bu,armada){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran/ax_get_jadwal", 
					data: {
						id_bu 	: id_bu, 
						armada 	: armada, 
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
			
			function combo_trayek_pnp(id_bu,id_trayek,id_layanan){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran/ax_get_trayek", 
					data: {
						id_bu		: id_bu,
						id_trayek	: id_trayek,
						layanan		: id_layanan
					},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 
						$("#kd_trayek_pnp").html(response.data_trayek).show();
						$("#kd_trayek_edit_pnp").html(response.data_trayek).show();
						// $("#kd_trayek_pertelaan").html(response.data_trayek).show();
						//$('#id_jadwal').val(armada);
						
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}

			function combo_point_pertelaan(id_bu,id_trayek){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran/ax_get_point_trayek", 
					data: {
						id_bu	: id_bu,
						id_trayek	: id_trayek,
					},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 
						$("#kd_trayek_pertelaan").html(response.data_trayek).show();
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}

			function harga_trayek_pnp(){
				dataArr = $("#kd_trayek_pnp").val().split("~");

				var url = '<?=base_url()?>setoran/ax_get_trayek_harga';
				var data = {
					id_bu 		: $('#id_bu_filter').val(),
					id_trayek 	: $('#id_trayek_pnp').val(),
					kd_trayek	: dataArr[0],
					layanan		: $('#id_layanan_pnp').val(),
					mata_uang	: dataArr[1]
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#harga_pnp').val(data['harga']);
					$('#km_trayek_detail_pnp').val(data['km_trayek']);
					$('#mata_uang_pnp').val(dataArr[1]);
				});

			}
			function harga_trayek_edit_pnp(){

				dataArr = $("#kd_trayek_edit_pnp").val().split("~");

				var url = '<?=base_url()?>setoran/ax_get_trayek_harga';
				var data = {
					kd_trayek	: dataArr[0], 
					id_bu 		: $('#id_bu_filter').val(),
					id_trayek 	: $('#id_trayek_pnp').val(),
					layanan		: $('#id_layanan_pnp').val(),
					mata_uang 	: dataArr[1]
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#harga_edit_pnp').val(data['harga']);
				});

			}
			function harga_beban_(){

				var url = '<?=base_url()?>setoran/ax_get_harga_beban';
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

			function harga_rp_km(kd_trayek){

				var url = '<?=base_url()?>setoran/ax_get_rp_km';
				var data = {
					kd_trayek	: kd_trayek
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#rp_km_pend').val(parseInt(data['rp_km']));
				});
			}
			
			function combo_jenis_pend(id_bu){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran/ax_get_jenis_pend", 
					data: { id_bu	: id_bu 
					},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 
						$("#id_jenis_pend").html(response.data_jenis).show();
						$('#id_jenis_pend').val(0);
						$('#select2-id_jenis_pend-container').html("-- Jenis --");
						
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}
			
			function combo_jenis_beban(id_bu){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran/ax_get_jenis_beban", 
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

			function print_pdf() {
				id_bu = $("#id_bu_filter").val();
				var tgl = $("#tgl_filter").val();
				if (id_bu != null && tgl != '') {
					window.open("<?=site_url()?>setoran/laporan_ak13/"+id_bu+"/"+tgl);
				}else{
					// alert("Silahkan Pilih Cabang dan Isi tanggal terlebih dahulu");
					alertify.alert("Warning","Silahkan Pilih Cabang dan Isi tanggal terlebih dahulu");
				}
			}

			function printLaporan(){
				id_bu = $("#id_bu_filter").val();
				var tgl = $("#tgl_filter").val();
				if (id_bu != null && tgl != '') {
					$("#tanggal_print").val(tgl);
					$("#id_cabang_print").val(id_bu);
					$('#printLaporan').modal('show');
				}else{
					// alert("Silahkan Pilih Cabang dan Isi tanggal terlebih dahulu");
					alertify.alert("Warning","Silahkan Pilih Cabang dan Isi tanggal terlebih dahulu");
				}
			}

			function printAK13(id_setoran,tgl_setoran,armada,id_bu,id_pool){
				var url 		= "<?=site_url("reports/prints")?>";
				var REQ = "?id_setoran="+id_setoran+"&tgl_setoran="+tgl_setoran+"&armada="+armada+"&id_bu="+id_bu+"&id_pool="+id_pool+"&format=html"+"&uk=A4-P"+"&name=ak13";
				open(url+REQ);
			}
			function printSlip(id_setoran,tgl_setoran,armada,id_bu,id_pool){
				var url 		= "<?=site_url("reports/prints")?>";
				var REQ = "?id_setoran="+id_setoran+"&tgl_setoran="+tgl_setoran+"&armada="+armada+"&id_bu="+id_bu+"&id_pool="+id_pool+"&format=pdf"+"&uk=slip-setoran"+"&name=slip_setoran1";
				open(url+REQ);
			}

			function armadalist(){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran/ax_get_armada", 
					data: {id_cabang : $("#id_bu_filter").val(),tanggal :$("#tgl_filter").val(),id_pool :$("#id_pool").val()},
					dataType: "json",
					beforeSend: function(e) {
						if(e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response){ 

						$("#armada_print").html(response.data_armada).show();
						$("#armada").html(response.data_jadwal).show();
						// $('#select2-armada-container').html('--Armada--');
						// $('#armada_print').val('0');
					},
					error: function (xhr, ajaxOptions, thrownError) { 
						alert(thrownError); 
					}
				});
			}

			function poollist(){
				$.ajax({
					type: "POST", 
					url: "<?= base_url() ?>setoran/ax_get_pool", 
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

			function show_hide_button_lmb()
			{
				var url = "<?= base_url() ?>setoran/ax_get_button_lmb";
				var data = {
					id_bu: $("#id_bu_filter").val()
				};
				$.ajax({
					url : url,
					type: "POST",
					data: data,
					dataType: "JSON",
					success: function(data)
					{
						if (data.status==1) {
							$("#button_lmb").show();
						}else {
							$("#button_lmb").hide();
						}
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error adding/update data');
					}
				});
			}

			function getDataTicket() {
				var url = '<?=base_url()?>setoran/ax_get_data_api_ticket';
				var data = {
					id_setoran_detail: $('#id_setoran_detail_pnp').val(),
					id_setoran: $('#id_setoran_header_pnp').val(),
					armada: $('#armada_detail_pnp').val(),
					tanggal: $('#tgl_pnp').val()
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Data Tidak Ditemukan");
						}}
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if(data['status']){
							alertify.success("Data Berhasil di Import dari E-Ticket");
							setoranTableDetailPng.ajax.reload();
						}else{
							alertify.error("Data setoran Gagal Disimpan.");
							setoranTableDetailPng.ajax.reload();
						}
					});
				}

				function view_data_eticket(tanggal,armada) {
					var str;
					var url = "<?php echo site_url('setoran/datatable_ticket')?>";
					$.ajax({
						url : url,
						type: "POST",
						async: false,
						data: {tanggal:tanggal,armada:armada},
						dataType: "JSON",
						success: function(data)
						{
							str = data.detail;
						},
						error: function (jqXHR, textStatus, errorThrown)
						{
							alert('Error get data!');
						}
					});
					$('#tdiv_eticket').html(str);
				}

				function getDataLmb() {
					var url = '<?=base_url()?>setoran/ax_get_data_lmb';
					var data = {
						id_setoran_detail: $('#id_setoran_detail_pnp').val(),
						id_setoran: $('#id_setoran_header_pnp').val(),
						id_jadwal: $('#id_jadwal_pnp').val()
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
							if(data['status']){
								alertify.success("Data Berhasil di Import dari LMB");
								setoranTableDetailPng.ajax.reload();
							}else{
								alertify.error("Data setoran Gagal Disimpan.");
								setoranTableDetailPng.ajax.reload();
							}
						});
					}

					function tampilGetData(){
						var id_jadwal 			= $('#id_jadwal_pnp').val();
						var id_setoran 			= $('#id_setoran_header_pnp').val();
						var id_setoran_detail 	= $('#id_setoran_detail_pnp').val();
						var tanggal 			= $('#tgl_pnp').val();
						var armada 				= $('#armada_detail_pnp').val();

						$('#modalGetData').modal('show');
						$('#id_jadwal_mod').val(id_jadwal);
						$('#id_setoran_mod').val(id_setoran);
						$('#id_setoran_detail_mod').val(id_setoran_detail);
						$('#tanggal_mod').val(tanggal);
						$('#armada_mod').val(armada);

						view_data_eticket(tanggal,armada);


						dataGetTable.ajax.reload();
						setTimeout(function(){ dataGetTable.columns.adjust().draw(); }, 1000);
						table_tiket.ajax.reload();
					}

					var dataGetTable = $('#dataGetTable').DataTable({
						"ordering" : false,
						"scrollX": true,
						"processing": true,
						"serverSide": true,
						ajax: 
						{
							url: "<?= base_url()?>setoran/ax_data_lmb/",
							type: 'POST',
							data: function ( d ) {
								return $.extend({}, d, { 
									"id_jadwal": $("#id_jadwal_mod").val(),
									"id_setoran": $("#id_setoran_mod").val(),
									"id_setoran_detail": $("#id_setoran_detail_mod").val(),
								});
							}
						},
						columns: 
						[
						{ data: "tgl_lmb" },
						{ data: "kd_armada" },
						{ data: "kd_trayek" },
						{ data: "pnp", render: $.fn.dataTable.render.number( ',', '.',0 ) },
						{ data: "harga", render: $.fn.dataTable.render.number( ',', '.',0 ) },
						{ data: "total", render: $.fn.dataTable.render.number( ',', '.',0 ) },
						{ data: "total", render: $.fn.dataTable.render.number( ',', '.',0 ) }
						]
					});


					function changeActive(id, active){
						alertify.confirm(
							'Confirmation', 
							'Apakah anda yakin ingin Close Setoran?', 
							function(){
								var url = '<?=base_url()?>setoran/ax_change_active';
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

					function printDetail(id_setoran_detail,id_setoran,armada,tgl_setoran,kd_segmen,kd_trayek) {
						var url 	= "<?=site_url("reports/prints")?>";
						var format 	= 'pdf';
						var REQ = "?id_setoran_detail="+id_setoran_detail+"&id_setoran="+id_setoran+"&armada="+armada+"&tgl_setoran="+tgl_setoran+"&kd_segmen="+kd_segmen+"&kd_trayek="+kd_trayek+"&format=pdf"+"&uk=slip-setoran"+"&name=slip_setoran";
						open(url+REQ);
					}

					$('#status_udj').on("change", function (e) {
						var url = '<?=base_url()?>setoran/ax_change_status_udj';
						var data = {
							id_setoran_detail: $('#id_setoran_detail_beban').val(),
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
									$('#ket_status_udj').html("<b><font color='blue'>UDJ Pengemudi sebesar 7%</font></b>");
								}else{
									$('#ket_status_udj').html("<b><font color='red'>UDJ Pengemudi tidak aktif</font></b>");
								}
							}else{
								alertify.alert("Warning","Data Penumpang dan Biaya tidak Boleh Kosong");
							}
						});

					});


					$('#status_udj_bagasi').on("change", function (e) {
						var url = '<?=base_url()?>setoran/ax_change_status_udj_bagasi';
						var data = {
							id_setoran_detail: $('#id_setoran_detail_beban').val(),
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


					var table_tiket;
					$(function() {
						jQuery.fn.exists = function(){return this.length>0;}
						
						poollist();
						show_hide_button_lmb();

						/* Initialize Datatables */
						var table_tiket = $('#table-eticket').dataTable({
							"lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
							"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]
						});

						$('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
					});

					function formatNumber(num) {
						return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
					}
				</script>

				<script type="text/javascript">
					
					counteratt = 1;

					$("#addkolibagasi").on("click", function () {
						counteratt++;
						var newRow = $("<div class='box-body' >");
						var cols = "";
						cols += '';
						cols += "<div class='form-group col-md-3' ><input type='number' class='form-control margin-bottom' id='koli"+counteratt+"' placeholder='Jumlah (Koli)'></div><div class='form-group col-md-3' ><input type='number' id='harga_koli"+counteratt+"' class='form-control' placeholder='Harga (Per Koli)'></div><input type='button' class='btndel btn btn-md btn-danger' value='-' />";
						newRow.append(cols);
						$(".kolibagasi").append(newRow);

						$(".btndel").on("click", function (event) {
							$(this).closest("div").remove();       
							counteratt--;
						});
					});
				</script>
			</body>
			</html>

