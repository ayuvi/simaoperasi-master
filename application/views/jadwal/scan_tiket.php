<div class="row" >
	<div class="col-lg-12">
		<div class="modal fade" id="ScanTiketModal" tabindex="-1" role="dialog" aria-labelledby="ScanTiketModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center><h4 class="Form-add-bu" id="barangModalLabel" style="color:blue;font-size:40px;"><b>SCAN TIKET</b></h4></center>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id_rit_scan" id="id_rit_scan">
						<div class="form-group">
							<!-- <label>KODE TIKET</label> -->
							<input style="font-size: 30px;" type="text" id="kode_tiket" name="kode_tiket" class="form-control" placeholder="KODE TIKET" onchange="btnSaveScanTiket()">
						</div>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tblscantiket">
							<thead>
								<tr>
									<th>Action</th>
									<th>No</th>
									<th>Kode Tiket</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn btn-primary" id='btnSaveScanTiket'>Save</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	var tblscantiket = $('#tblscantiket').DataTable({
		responsive 	: true,
		ordering 	: false,
		scrollX 	: true,
		processing 	: true,
		serverSide 	: true,
		ajax: 
		{
			url: "<?= base_url()?>jadwal/ax_data_scan_tiket/",
			type: 'POST',
			data: function ( d ) {
				return $.extend({}, d, { 	
					"id_rit"	: $("#id_rit_scan").val(),
				});
			}
		},
		columns: 
		[
		{
			class: "opsi", data: "id_scan", render: function(data, type, full, meta){
				var str = '';
				str += '<button class="btn btn-danger btn.flat" onclick="hapusScanTiket(' + data + ')"><i class="fa fa-trash"></i></button>';
				return str;
			}
		},
		{
			data: "id_scan",
			render: function(data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
		},
		{ data: "kode_tiket" }
		]
	});

	function SetScanTiket(id_rit) {
		$('#id_rit_scan').val(id_rit);
		$('#kode_tiket').val('');
		$('#ScanTiketModal').modal('show');
		tblscantiket.ajax.reload();
		setTimeout(function(){ tblscantiket.columns.adjust().draw(); }, 1000);
	}

	function btnSaveScanTiket() {
		if($('#kode_tiket').val() == '')
		{
			alertify.alert("Warning", "Please fill Kode Tiket.");
		}
		else
		{
			var url = '<?=base_url()?>jadwal/ax_set_data_scan_tiket';
			var data = {
				id_rit: $('#id_rit_scan').val(),
				kode_tiket: $('#kode_tiket').val()
			};

			$.ajax({
				url: url,
				method: 'POST',
				data: data
			}).done(function(data, textStatus, jqXHR) {
				var data = JSON.parse(data);
				if(data['status'] == "success")
				{
					alertify.success("Data Saved.");
					$('#kode_tiket').val('');
					tblscantiket.ajax.reload();
				}else{
					alertify.error("Data Sudah ada.");
					$('#kode_tiket').val('');
				}
			});
		}
	}

	function hapusScanTiket(id_scan) {
		alertify.confirm(
			'Confirmation', 
			'Are you sure you want to delete this data?', 
			function(){
				var url = '<?=base_url()?>jadwal/ax_unset_data_scan_tiket';
				var data = {
					id_scan: id_scan
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					tblscantiket.ajax.reload();
					alertify.error('Data deleted.');
				});
			},
			function(){ }
			);
	}
</script>