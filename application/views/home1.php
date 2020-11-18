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
          Dashboard
        </h1>
      </section>

      <section class="invoice">
        <div class="row">
          <div class="form-group col-lg-4">
            <label>Cabang</label>
            <select class="form-control select2" style="width: 100%;" id="id_bu_filter" name="id_bu_filter">
              <? if($session['id_level'] == 1) { ?>
              <!-- <option value="0"  >--ALL--</option> -->
              <? } ?>
              <?php foreach ($combobox_bu->result() as $rowmenu) { ?>
              <option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-lg-4">
            <label>Segment</label>
            <select class="form-control select2" style="width: 100%;" id="id_segment_filter" name="id_segment_filter">

              <option value="0"  >--ALL--</option>

              <?php foreach ($combobox_segmen->result() as $rowmenu) { ?>
              <option value="<?= $rowmenu->id_segment?>"  ><?= $rowmenu->nm_segment?></option>
              <?php } ?>
            </select>
          </div>

          <!-- <div class="form-group col-lg-2">
                <label>Type</label>
                    <select class="form-control select2" style="width: 100%;" id="types" name="types">
                    <option value="0"  >AVG</option>
                    <option value="1"  >SUM</option>
                    
                    </select>
                  </div> -->
                  <?php
                  $tgl_awal = date("Y-m-d", strtotime("-7 day")); 
                  $tgl_akhir = date("Y-m-d"); 
                  ?>
                  <div class="form-group col-lg-2">
                    <label>Awal</label>
                    <input type="text" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="yyyy-mm-dd" value='<?= $tgl_awal?>'>
                  </div>

                  <div class="form-group col-lg-2">
                    <label>Akhir</label>
                    <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control" placeholder="yyyy-mm-dd" value="<?=$tgl_akhir?>">
                  </div>
                </div>

                <div class="row">
                  <hr>
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h4 id="chj">0</h4>
                        <p>Hari Jalan / Bus</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-truck"></i>
                      </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h4 id="cpnp">0</h4>
                        <p>PNP</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h4 id="cpendapatan">0</h4>
                        <p>Pendapatan</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-money"></i>
                      </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h4 id="cpengeluaran">0</h4>
                        <p>Pengeluaran</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-credit-card"></i>
                      </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                      <div class="inner">
                        <h4 id="claba">0</h4>
                        <p>Laba / Rugi</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-bar-chart"></i>
                      </div>
                      <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                </div>


              </section>
            </div>
            <?= $this->load->view('basic_js'); ?>
            <script type='text/javascript'>
              $('#id_bu_filter, #id_segment_filter, #types').select2({
                'allowClear': true
              }).on("change", function (e) {
                ViewData();
              });

              $( "#tgl_awal, #tgl_akhir" ).on("change", function (e) {
                ViewData();
              });

              function ViewData(){
                var url = '<?=base_url()?>home/get_data_dashboard';
                var data = {
                  id_bu: $('#id_bu_filter').val(),
                  id_segment: $('#id_segment_filter').val(),
                  tgl_awal: $('#tgl_awal').val(),
                  tgl_akhir: $('#tgl_akhir').val(),
                  types: $('#types').val(),
                };

                $.ajax({
                  url: url,
                  method: 'POST',
                  data: data
                }).done(function(data, textStatus, jqXHR) {
                  var data = JSON.parse(data);
                  $('#chj').html((angka((data['hj']*1).toFixed(0)) ));
                  $('#cpnp').html((angka((data['pnp']*1).toFixed(0) )));
                  $('#cpendapatan').html((angka((data['pendapatan']*1).toFixed(2) )));
                  $('#cpengeluaran').html((angka((data['pengeluaran']*1).toFixed(2) )));
                  $('#claba').html((angka((data['laba']*1).toFixed(2) )));
                  // $('#cpendapatan').html((angka((data['cpendapatan']*1).toFixed(2) )));
                  // $('#ckm').html((angka((data['ckm']*1).toFixed(2) )));
                  // $('#cpnp').html((angka((data['cpnp']*1).toFixed(2) )));
                  // $('#cpengeluaran').html((angka((data['cbiaya']*1).toFixed(2) )));
                  // $('#cpenghasilan').html((angka((data['cpendapatan']*1).toFixed(2) )));

                });
              }

              $(document).ready(function() {
                ViewData();
              });

              setInterval(function(){
                ViewData();
              }, 20000)
              $("#tgl_awal, #tgl_akhir").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
              $( "#tgl_awal, #tgl_akhir").datepicker({
                // minDate: 0,
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
              });

              function angka(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
              }
            </script>
          </body>
          </html>
