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
				<h1>KOTA</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php //if($this->session->userdata('login')['id_level'] == 1 || $this->session->userdata('login')['id_level'] == 6){ ?>
								<?php //}?>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label>Cabang</label>
									<select class="form-control select2 " style="width: 100%;" id="id_prov_filter" name="id_prov_filter">
									<option value="0"> - All Provinsi</option>
										<?php
										foreach ($combobox_prov->result() as $rowmenu) {
											?>
											<option value="<?= $rowmenu->id_prov?>"  ><?= $rowmenu->nama?></option>
											<?php
										}
										?>
									</select>
								</div>
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="kotaTable">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama</th>
												<th>Provinsi</th>
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
	<script type='text/javascript'>
		var kotaTable = $('#kotaTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>kota/ax_data_kota/",
				type: 'POST',
				data: function ( d ) {
					return $.extend({}, d, { 

						"id_prov": $("#id_prov_filter").val()

					});
				}
			},
			columns: 
			[
			{
				data: "id_kota",
				render: function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ class:'intro', data: "nama" },
			{ class:'intro', data: "nama_prov" },
			]
		});

			$('#id_prov_filter').select2({
				'allowClear': true
			}).on("change", function (e) {
				kotaTable.ajax.reload();
			});

		</script>
	</body>
	</html>
