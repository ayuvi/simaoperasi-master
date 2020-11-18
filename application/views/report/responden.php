<!DOCTYPE html>
<html>

  <head>
    <?= $this->load->view('head'); ?>

  </head>


  <body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">

    <div class="wrapper">

      <?= $this->load->view('nav'); ?>
      <?= $this->load->view('menu_groups'); ?>
      <? $session = $this->session->userdata('login'); ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Report Monitoring
          </h1>
        </section>

        <section class="invoice">
          <div class="row">
          <div class="col-lg-12">
          <div class="panel panel-default"> 
          <div class="panel-heading">
          <div class="form-group">
			<label>Cabang</label>
			<select class="form-control select2 " style="width: 100%;" id="id_bu" name="id_bu">
				<option value="0">--Cabang--</option>
				<?php
				foreach ($bu_combobox->result() as $rowmenu) {
				?>
				<option value="<?= $rowmenu->id_bu?>"><?= $rowmenu->nm_bu?></option>
				<?php
				}
				?>
			</select>
  		</div>
          </div>
          <div class="panel-body">
          <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="buTable">
                      <thead>
                        <tr>
                          <th>Nama Pegawai</th>
                          <th>NIP Pegawai</th>
                          <th>Cabang</th>
                          <th>Posisi</th>
                        </tr>
                      </thead>
                    </table>
          </div> 
          </div> 
        </div></div>
          </div>
				</section>
			</div>
			<?= $this->load->view('basic_js'); ?>
      <script type='text/javascript'>
		$('#id_bu').select2({
            'allowClear': true
          }).on("change", function (e) {
            buTable.ajax.reload(); 
            // ViewData();
          });

          var buTable = $('#buTable').DataTable({
            "ordering" : true,
            "bPaginate": false,

            "scrollX": true,
            "processing": true,
            "serverSide": true,
            ajax: 
            {
              url: "<?= base_url()?>report/ax_data_responden/",
              type: 'POST',
              data: function ( d ) {
                   return $.extend({}, d, { 
                    "id_bu": $('#id_bu').val() ,
                   });
               }
            },
            columns: 
            [
              { data: "nm_responden" },
              { data: "nip_responden" },
              { data: "nm_bu" },
              { data: "nm_posisi" },
            ]
          });
        

          /* $( "#id_bu" ).on("change", function (e) {
            buTable.ajax.reload(); 
          }); */

          

          $(document).ready(function() {
        
            $( "#tgl_awal" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "yy-mm-dd"
            });
            buTable.ajax.reload(); 

          }); 
        $("#tgl_awal").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    </script>
	</body>
</html>
