<div class="modal fade" id="modalPertelaan" tabindex="" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<div class="modal-body">
				<div class="box box-primary box-solid">
					<div class="box-header with-border">
						<h6 class="box-title" id="editModalPertelaan">Tambah Detail Pertelaan</h6>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body no-padding">
						<div class="modal-body">
							<form id="formEditPnp">
								<input type="hidden" name="id_setoran_penumpang_pertelaan" id="id_setoran_penumpang_pertelaan">

								<input type="hidden" name="id_setoran_pnp_prt" id="id_setoran_pnp_prt">
								<input type="hidden" name="id_setoran_detail_prt" id="id_setoran_detail_prt">
								<input type="hidden" name="id_setoran_prt" id="id_setoran_prt">
								<input type="hidden" name="jumlah_prt" id="jumlah_prt">
								<input type="hidden" name="harga_prt" id="harga_prt">
								<div class="row">
									<div class="form-group col-lg-6">
										<label>Asal - Tujuan</label>
										<select class="form-control select2" style="width: 100%;" id="kd_trayek_pertelaan" name="kd_trayek_pertelaan">
											<option value="0">-- Trayek --</option>
										</select>
									</div>
									<div class="form-group col-lg-3">
										<label>Harga</label>
										<input type="number" id="harga_pertelaan" name="harga_pertelaan" class="form-control" placeholder="Harga Satuan">
									</div>
									<div class="form-group col-lg-3">
										<label>Jumlah Penumpang</label>
										<input type="number" id="jum_pertelaan" name="jum_pertelaan" class="form-control" placeholder="Jumlah Penumpang">
									</div>

								</div>
								
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-success" id='btnSavePertelaan'><i class='fa fa-save'></i> Simpan</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="setoranPertelaan">
						<thead>
							<tr>
								<th width="70px">#</th>
								<th>#</th>
								<th>Asal - Tujuan</th>
								<th>Harga</th>
								<th>Penumpang</th>
								<th>Total</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var setoranPertelaan = $('#setoranPertelaan').DataTable({
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
						url: "<?= base_url()?>setoran/ax_data_setoran_detail_pnp_pertelaan/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_setoran_pnp": $("#id_setoran_pnp_prt").val()
							});
						}
					},
					columns: 
					[
					{ data: "id_setoran_pnp_prt", render: function(data, type, full, meta){
						var str = '';
						str += '<div class="btn-group">';
						str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
						str += '<ul class="dropdown-menu">';
						str += '<li><a onclick="EditDataPertelaan(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
						var kd = "Foto('"+data+"')";
						str += '<li><a onclick="hapusPertelaan(' + data + ')"><i class="fa fa-trash"></i> Hapus</a></li>';
						str += '</ul>';
						str += '</div>';
						
						return str;
					}},
					{ data: "id_setoran_pnp_prt" },
					{ data: "kd_trayek" },
					{ data: "harga", render: $.fn.dataTable.render.number( ',', '.',0 ) },
					{ data: "jumlah", render: $.fn.dataTable.render.number( ',', '.',0 ) },
					{ data: "total", render: $.fn.dataTable.render.number( ',', '.',0 ) }
					]
				});

	$('#kd_trayek_pertelaan').select2({
		'placeholder': "Trayek",
		'allowClear': true
	});
	
	function pertelaanPng(id_setoran_pnp) {
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
			$('#editModalPertelaan').html('Tambah Detail Pertelaan <b>'+data['kd_trayek']+'</b>');

			$('#id_setoran_pnp_prt').val(data['id_setoran_pnp']);
			$('#id_setoran_detail_prt').val(data['id_setoran_detail']);
			$('#id_setoran_prt').val(data['id_setoran']);

			$('#jumlah_prt').val(data['jumlah']);
			$('#harga_prt').val(data['harga']);

			$('#select2-kd_trayek_pertelaan-container').html('--Trayek--');
			$('#id_setoran_penumpang_pertelaan').val('');
			$('#modalPertelaan').modal('show');

			setoranPertelaan.ajax.reload();
			setTimeout(function(){ setoranPertelaan.columns.adjust().draw(); }, 1000);
		});
	}

	function EditDataPertelaan(id_setoran_pnp_prt) {
		var url = '<?=base_url()?>setoran/ax_get_data_by_id_setoran_pnp_pertelaan';
		var data = {
			id: id_setoran_pnp_prt
		};
		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			$('#id_setoran_penumpang_pertelaan').val(data['id_setoran_pnp_prt']);
			$('#kd_trayek_pertelaan').val(data['kd_trayek']).trigger('change');
			$('#jum_pertelaan').val(data['jumlah']);
			$('#harga_pertelaan').val(data['harga']);
		});
	}

	function hapusPertelaan(id_setoran_pnp_prt){
		alertify.confirm(
			'Konfirmasi', 
			'Apa anda yakin akan menghapus data ini?', 
			function(){
				var url = '<?=base_url()?>setoran/ax_unset_data_setoran_pertelaan';
				var data = {
					id_setoran_pnp_prt: id_setoran_pnp_prt
				};
				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {

					var data = JSON.parse(data);
					if(data['status'] == "1"){
						alertify.success("Data Terhapus.");
						setoranPertelaan.ajax.reload();
					}else{
						alertify.error("Data Gagal Terhapus.");
						setoranPertelaan.ajax.reload();
					}
				});
			},
			function(){ }
			);
	}

	$('#btnSavePertelaan').on('click', function () {
		if($('#kd_trayek_pertelaan').val() == '0'){
			alertify.alert("Warning", "Trayek Belum di Isi.");
		}else if($('#jum_pertelaan').val() == ''){
			alertify.alert("Warning", "Jumlah Belum di Isi.");
		}else if($('#harga_pertelaan').val() == ''){
			alertify.alert("Warning", "Harga Belum di Isi.");
		}else {

			if($('#id_setoran_penumpang_pertelaan').val() == ''){
				var url = '<?=base_url()?>setoran/ax_set_data_pertelaan';
			}else{
				var url = '<?=base_url()?>setoran/ax_set_data_pertelaan_update';
			}

			var data = {
				id_setoran_pnp_prt 	: $('#id_setoran_penumpang_pertelaan').val(),
				id_setoran_pnp 		: $('#id_setoran_pnp_prt').val(),
				id_setoran_detail 	: $('#id_setoran_detail_prt').val(),
				id_setoran 			: $('#id_setoran_prt').val(),
				jumlah 				: $('#jumlah_prt').val(),
				total 				: ($('#jumlah_prt').val())*($('#harga_prt').val()),

				kd_trayek 			: $('#kd_trayek_pertelaan').val(),
				harga 				: $('#harga_pertelaan').val(),
				jum 				: $('#jum_pertelaan').val(),
				id_bu 				: $('#id_bu_filter').val()
			};
			$.ajax({
				url: url,
				method:"POST",
				data: data,
				dataType: "JSON",
				success:function(data)
				{
					if(data.status==true)
					{
						alertify.success("Data Disimpan.");
						setoranPertelaan.ajax.reload();
						$('#select2-kd_trayek_pertelaan-container').html('--Trayek--');
						$('#kd_trayek_pertelaan').val('').trigger('change');
						$('#id_setoran_penumpang_pertelaan').val('');
						$('#jum_pertelaan').val('');
						$('#harga_pertelaan').val('');

					}else if(data.status=="melebihisisa"){
						alertify.alert("Warning", "Input data penumpang tidak boleh melebihi : "+data.jumlah);
						alertify.error("Data Gagal Disimpan");
					}else{
						alertify.error("Data Gagal Disimpan.");

					}
				}
			});
			setInterval(function(){
			}, 5000);
		}
	});
</script>


<!-- EDIT PENDAPATAN -->
<script type="text/javascript">
	function editPend(id_setoran_pend){
		var url = '<?=base_url()?>setoran/ax_get_data_by_id_setoran_pend';
		var data = {
			id: id_setoran_pend
		};
		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			$('#editPendModalLabel').html('Edit Detail Pendapatan');

			$('#id_setoran_pend_edit').val(data['id_setoran_pend']);
			$('#jumlah_edit_pend').val(parseInt(data['jumlah']));
			$('#harga_edit_pend').val(parseInt(data['harga']));
			$('#editPendModal').modal('show');
		});
	}

	function btnSaveEditPend() {
		if($('#jumlah_edit_pend').val() == ''){
			alertify.alert("Warning", "Jumlah Belum di Isi.");
		}else if($('#harga_edit_pend').val() == ''){
			alertify.alert("Warning", "Harga Belum di Isi.");
		}else{
			var url = '<?=base_url()?>setoran/ax_set_data_update_pend';
			var formData = new FormData($('#formEditPend')[0]);
			$.ajax({
				url : url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data)
				{
					if(data.status==true)
					{
						alertify.success("Data Terupdate.");
						$('#editPendModal').modal('hide');
						setoranTableDetailPend.ajax.reload();
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
				}
			});
		}
	}

</script>

<div class="modal fade" id="editPendModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="Form-add-bu" id="editPendModalLabel">Form Add</h4>
			</div>
			<div class="modal-body">
				<form id="formEditPend">
					<input type="hidden" id="id_setoran_pend_edit" name="id_setoran_pend_edit" value='' />

					<div class="form-group">
						<label>Jumlah</label>
						<input type="number" id="jumlah_edit_pend" name="jumlah_edit_pend" class="form-control" placeholder="Jumlah">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="number" id="harga_edit_pend" name="harga_edit_pend" class="form-control" placeholder="Harga">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="btnSaveEditPend()">Save</button>
			</div>
		</div>
	</div>
</div>



<!-- EDIT BEBAN -->
<script type="text/javascript">
	function editBeban(id_setoran_beban){
		var url = '<?=base_url()?>setoran/ax_get_data_by_id_setoran_beban';
		var data = {
			id: id_setoran_beban
		};
		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(data, textStatus, jqXHR) {
			var data = JSON.parse(data);
			$('#editBebanModalLabel').html('Edit Detail Beban');
			$('#id_setoran_beban_edit').val(data['id_setoran_beban']);
			$('#id_jenis_beban_edit').val(data['id_jenis']);

			on_off_beban_model_2(data['id_jenis']);

			var arr = ["22", "23", "24"];
			if(arr.includes(data['id_jenis'])){
				$('#jumlah_beban_edit').val(data['jumlah']);
				$('#harga_beban_edit').val(parseInt(data['harga']));
				$('#status_jenis_beban_edit').val(data['status_jenis_beban']);
			}else if(data['id_jenis']==7){
				$('#jumlah_bbm_beban_edit').val(data['jumlah']);
				$('#harga_bbm_beban_edit').val(parseInt(data['harga']));
				$('#total_bbm_beban_edit').val(data['total']);
			}else{
				$('#jumlah_beban_edit').val(data['jumlah']);
				$('#harga_beban_edit').val(parseInt(data['harga']));
			}

			$('#editBebanModal').modal('show');
		});
	}

	function on_off_beban_model_2(id_jenis) {
		var data = ["22", "23", "24"];
		var id_jenis_beban = id_jenis;
		if(data.includes(id_jenis_beban)){
			document.getElementById('div_jumlah_beban_edit').style.display = 'block';
			document.getElementById('div_harga_beban_edit').style.display = 'block';
			document.getElementById('div_status_jenis_beban_edit').style.display = 'block';

			document.getElementById('div_total_bbm_beban_edit').style.display = 'none';
			document.getElementById('div_harga_bbm_beban_edit').style.display = 'none';
			document.getElementById('div_jumlah_bbm_beban_edit').style.display = 'none';
		}else if(id_jenis_beban==7){
			document.getElementById('div_jumlah_beban_edit').style.display = 'none';
			document.getElementById('div_harga_beban_edit').style.display = 'none';
			document.getElementById('div_status_jenis_beban_edit').style.display = 'none';

			document.getElementById('div_total_bbm_beban_edit').style.display = 'block';
			document.getElementById('div_harga_bbm_beban_edit').style.display = 'block';
			document.getElementById('div_jumlah_bbm_beban_edit').style.display = 'block';
			$("#status_jenis_beban_edit").val('1');
			$("#total_bbm_beban_edit").val('');
			$("#harga_bbm_beban_edit").val('');
			$("#jumlah_bbm_beban_edit").val('');
		}else{
			document.getElementById('div_jumlah_beban_edit').style.display = 'block';
			document.getElementById('div_harga_beban_edit').style.display = 'block';
			document.getElementById('div_status_jenis_beban_edit').style.display = 'none';

			document.getElementById('div_total_bbm_beban_edit').style.display = 'none';
			document.getElementById('div_harga_bbm_beban_edit').style.display = 'none';
			document.getElementById('div_jumlah_bbm_beban_edit').style.display = 'none';
			$("#status_jenis_beban_edit").val('1');
		}
	}
	function sum_total_bbm_edit() {
		var total_bbm_beban = $("#total_bbm_beban_edit").val();
		var harga_bbm_beban = $("#harga_bbm_beban_edit").val();
		total_all = total_bbm_beban/harga_bbm_beban;
		$("#jumlah_bbm_beban_edit").val(total_all.toFixed(2));
	}

	function btnSaveEditBeban() {
		if($('#jumlah_beban_edit').val() == ''){
			alertify.alert("Warning", "Jumlah Belum di Isi.");
		}else if($('#harga_beban_edit').val() == ''){
			alertify.alert("Warning", "Harga Belum di Isi.");
		}else{
			var url = '<?=base_url()?>setoran/ax_set_data_update_beban';
			var formData = new FormData($('#formEditBeban')[0]);
			$.ajax({
				url : url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data)
				{
					if(data.status==true)
					{
						alertify.success("Data Terupdate.");
						$('#editBebanModal').modal('hide');
						setoranTableDetailBeban.ajax.reload();
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
				}
			});
		}
	}

</script>

<div class="modal fade" id="editBebanModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="Form-add-bu" id="editBebanModalLabel">Form Add</h4>
			</div>
			<div class="modal-body">
				<form id="formEditBeban">
					<input type="hidden" id="id_setoran_beban_edit" name="id_setoran_beban_edit" value='' />
					<input type="hidden" id="id_jenis_beban_edit" name="id_jenis_beban_edit" value='' />

					<div class="form-group" id="div_jumlah_beban_edit">
						<label>Jumlah</label>
						<input type="number" class="form-control"  data-decimals="2" min="0" id="jumlah_beban_edit" name="jumlah_beban_edit" value='' placeholder="Jumlah" />
						<small><font color="blue">* Untuk decimal gunakan tanda koma(,)</font></small>
					</div>
					<div class="form-group" id="div_harga_beban_edit">
						<label>Harga</label>
						<input type="number" class="form-control" data-decimals="0" min="0" id="harga_beban_edit" name="harga_beban_edit" placeholder="Harga Satuan">
					</div>
					<div class="form-group" id="div_status_jenis_beban_edit">
						<label>Status beban (biaya titipan)</label>
						<select class="form-control" style="width: 100%;" id="status_jenis_beban_edit" name="status_jenis_beban_edit">
							<option value="1">ON</option>
							<option value="0">OFF</option>
						</select>
						<small><font color="blue">* Jika status beban biaya titipan <b>(ON)</b> maka UDJ dikurangi biaya titipan</font></small>
					</div>

					<!-- BBM -->
					<div class="form-group" id="div_total_bbm_beban_edit">
						<label>Harga Total Konsumsi BBM (Rp)</label>
						<input type="number" class="form-control" data-decimals="0" min="0" id="total_bbm_beban_edit" name="total_bbm_beban_edit" placeholder="Harga Total Konsumsi BBM (Rp)" onblur="sum_total_bbm_edit()">
					</div>
					<div class="form-group" id="div_harga_bbm_beban_edit">
						<label>Harga BBM per liter (Rp)</label>
						<input type="number" class="form-control" data-decimals="0" min="0" id="harga_bbm_beban_edit" name="harga_bbm_beban_edit" placeholder="Harga BBM per liter (Rp)" onblur="sum_total_bbm_edit()">
					</div>
					<div class="form-group" id="div_jumlah_bbm_beban_edit">
						<label>Jumlah BBM (Liter)</label>
						<input type="number" class="form-control"  data-decimals="2" min="0" id="jumlah_bbm_beban_edit" name="jumlah_bbm_beban_edit" value='' placeholder="Jumlah (Liter)" readonly="readonly" />
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="btnSaveEditBeban()">Save</button>
			</div>
		</div>
	</div>
</div>


