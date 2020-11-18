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
          <div class="form-group col-lg-3">
            <label>Cabang</label>
            <select class="form-control select2" style="width: 100%;" id="id_bu_filter" name="id_bu_filter">
              <option value="16"  >--Koridor 1 & 8--</option>
            </select>
          </div>

          <div class="form-group col-lg-2">
            <label>Segment</label>
            <select class="form-control select2" style="width: 100%;" id="id_segment_filter" name="id_segment_filter">
              <option value="0"  >--ALL--</option>
              <?php foreach ($combobox_segmen->result() as $rowmenu) { ?>
              <option value="<?= $rowmenu->id_segment?>"  ><?= $rowmenu->nm_segment?></option>
              <?php } ?>
            </select>
          </div>
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

          <div class="form-group col-lg-3">
            <p style="height: 15px"></p>
            <div class="btn-group">
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i> Print <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a onclick="print_html()" id="print_pdf" value="0"><i class="fa fa-print"></i> HTML</a></li>
                <li><a onclick="print_pdf()" id="print_pdf" value="0"><i class="fa fa-print"></i> PDF</a></li>
                <li><a onclick="print_excell()" id="print_excell" value="2"><i class="fa fa-print"></i> Excell</a></li>
              </ul>
            </div>


            <div class="btn-group">
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i> Report All <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a onclick="print_all_html()" value="0"><i class="fa fa-print"></i> HTML</a></li>
                <li><a onclick="print_all_pdf()" value="0"><i class="fa fa-print"></i> PDF</a></li>
                <li><a onclick="print_all_excell()" value="2"><i class="fa fa-print"></i> Excell</a></li>
              </ul>
            </div>

            <!-- <button type="button" class="btn btn-success" onclick="print_all()"><i class="fa fa-print"></i> Report All</button> -->

          </div>

       <!--    <div class="form-group col-lg-1">
            <p style="height: 15px"></p>
            <button type="button" class="btn btn-success" onclick="printCetak()"><i class="fa fa-print"></i> Cetak</button>
          </div> -->

        </div>

        <div class="row">
          <hr>
          <div class="col-lg-12 col-xs-12">
           <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h4 id="csgo">0</h4>
                <p>SGO</p>
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
                <h4 id="cso">0</h4>
                <p>SO</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 id="chj">0</h4>
                <p>Hari Jalan</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4 id="crit">0</h4>
                <p>RIT</p>
              </div>
              <div class="icon">
                <i class="fa fa-random"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h4 id="ckm">0</h4>
                <p>KM</p>
              </div>
              <div class="icon">
                <i class="fa fa-dashboard"></i>
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
                <p>Biaya Operasional</p>
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
                <p>Surplus Operasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-bar-chart"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>




        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="chjb">0</h4>
              <p>Hari Jalan / BUS</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="crb">0</h4>
              <p>RIT / BUS</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="ckr">0</h4>
              <p>KM / RIT</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="cpr">0</h4>
              <p>PNP / RIT</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="cur">0</h4>
              <p>UPP / RIT</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="cup">0</h4>
              <p>UPP / PNP</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="cpk">0</h4>
              <p>PNP-KM</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="cupk">0</h4>
              <p>UPP / PNP-KM</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="ct">0</h4>
              <p>TON</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="ctk">0</h4>
              <p>TON / KM</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h4 id="clf">0</h4>
              <p>LOAD FACTOR(%)</p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div>


    </section>

    <section class="content-header">
      <h1>DATA JADWAL ARMADA DAN INPUT SETORAN</h1>
    </section>

    <section class="invoice">
      <div class="row">
        <div class="col-lg-2">
          <div class="form-group">
            <label>Divre</label>
            <select class="form-control select2 " style="width: 100%;" id="divre_filter" name="divre_filter">
              <option value="0">--All--</option>
              <option value="1">Divre 1</option>
              <option value="2">Divre 2</option>
              <option value="3">Divre 3</option>
              <option value="4">Divre 4</option>
            </select>
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="text" name="tgl_filter_awal" id="tgl_filter_awal" class="form-control" placeholder="yyyy-mm-dd" value='<?= $tgl_akhir?>'>
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="text" name="tgl_filter_akhir" id="tgl_filter_akhir" class="form-control" placeholder="yyyy-mm-dd" value='<?= $tgl_akhir?>'>
          </div>
        </div>

        <div class="col-lg-2">
          <label>Pilihan</label>
          <select class="form-control select2" style="width: 100%;" id="pil_print" name="pil_print">
            <option value="1">Jadwal Armada</option>
            <option value="2">Setoran</option>
          </select>
        </div>

        <div class="col-lg-2">
          <label>Jenis Print</label>
          <select class="form-control select2" style="width: 100%;" id="jns_print" name="jns_print">
            <option value="html" >1. HTML</option>
            <option value="pdf" >2. PDF</option>
            <option value="excell" >3. Excell</option>
          </select>
        </div>

        <div class="col-lg-2">
          <p style="height: 15px"></p>
          <button type="button" class="btn btn-success" onclick="printCetak()"><i class="fa fa-print"></i> Cetak</button>
        </div>




        <div class="col-lg-12" style="height: 20px">
        </div>

        <div class="col-lg-12">
          <div class="col-lg-6">
           <div class="box box-success">
            <h4 class="box-title">Sudah Input</h4>
            <div class="box-body">
              <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="InputSetoranTable">
                  <thead>
                    <tr>
                      <th rowspan="2" style="vertical-align : middle;text-align:center;">No.</th>
                      <th rowspan="2" style="vertical-align : middle;text-align:center;">Divre</th>
                      <th rowspan="2" style="vertical-align : middle;text-align:center;">Cabang</th>
                      <th rowspan="2" style="vertical-align : middle;text-align:center;">HTM</th>
                      <th rowspan="2" style="vertical-align : middle;text-align:center;">HJ</th>
                      <th colspan="2" style="text-align:center;">SETOR</th>
                    </tr>
                    <tr>
                      <th>open</th>
                      <th>close</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="box box-success">
            <h4 class="box-title">Belum Input</h4>
            <div class="box-body">
              <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="notInputSetoranTable" align="center">
                  <thead>
                    <tr>
                      <th>No. </th>
                      <th>Divre</th>
                      <th>Cabang</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
<?= $this->load->view('basic_js'); ?>
<script type='text/javascript'>

  var InputSetoranTable = $('#InputSetoranTable').DataTable({
    "ordering" : false,
    "scrollX": true,
    "processing": true,
    "serverSide": true,
    ajax: 
    {
      url: "<?= base_url()?>home/ax_data_input_setoran/",
      type: 'POST',
      data: function ( d ) {
       return $.extend({}, d, { 
        "divre"         : $("#divre_filter").val(),
        "tanggal_awal"  : $("#tgl_filter_awal").val(),
        "tanggal_akhir" : $("#tgl_filter_akhir").val(),
      });
     }
   },
   columns: 
   [
   {
    data: "id_bu",
    render: function(data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }
  },
  { class:'intro', data: "id_divre" },
  { class:'intro', data: "nm_bu" },
  { data: "HTM", render: $.fn.dataTable.render.number( ',', '.',0 ) },
  { class:'intro', data: "jadwal" },
  { data: "jadwal", render: function(data, type, full, meta){
    return data-full['setor'];
  } },
  { data: "setor", render: $.fn.dataTable.render.number( ',', '.',0 ) },
  ]
});

  var notInputSetoranTable = $('#notInputSetoranTable').DataTable({
    "ordering" : false,
    "scrollX": true,
    "processing": true,
    "serverSide": true,
    ajax: 
    {
      url: "<?= base_url()?>home/ax_data_not_input_setoran/",
      type: 'POST',
      data: function ( d ) {
       return $.extend({}, d, { 
        "divre"         : $("#divre_filter").val(),
        "tanggal_awal"  : $("#tgl_filter_awal").val(),
        "tanggal_akhir" : $("#tgl_filter_akhir").val(),
      });
     }
   },
   columns: 
   [
   {
    data: "id_bu",
    render: function(data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }
  },
  { class:'intro', data: "id_divre" },
  { class:'intro', data: "nm_bu" }
  ]
});

  $( "#tgl_filter_awal, #tgl_filter_akhir, #divre_filter" ).on("change", function (e) {
    notInputSetoranTable.ajax.reload();
    InputSetoranTable.ajax.reload();
  });

  $( "#tgl_filter_awal,#tgl_filter_akhir").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd"
  });

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
      $('#csgo').html((angka((data['sgo']*1).toFixed(2)) ));
      $('#cso').html((angka((data['so']*1).toFixed(2)) ));
      $('#chj').html((angka((data['hj']*1).toFixed(0)) ));
      $('#crit').html((angka((data['rit']*1).toFixed(0)) ));
      $('#ckm').html((angka((data['km']*1).toFixed(2)) ));
      $('#cpnp').html((angka((data['pnp']*1).toFixed(0) )));
      $('#cpendapatan').html((angka((data['pendapatan']*1).toFixed(2) )));
      $('#cpengeluaran').html((angka((data['pengeluaran']*1).toFixed(2) )));
      $('#claba').html((angka((data['laba']*1).toFixed(2) )));

      $('#chjb').html((angka((data['hj_per_bus']*1).toFixed(2) )));
      $('#crb').html((angka(((data['rit']/data['so'])*1).toFixed(2)) ));
      $('#ckr').html((angka((data['km_per_rit']*1).toFixed(2)) ));
      $('#cpr').html((angka((data['pnp_per_rit']*1).toFixed(2)) ));
      $('#cur').html((angka((data['upp_per_rit']*1).toFixed(2)) ));
      $('#cup').html((angka((data['upp_per_pnp']*1).toFixed(2)) ));
      $('#cpk').html((angka((data['km_per_seat']*1).toFixed(2)) ));
      $('#cupk').html((angka((data['upp_per_km_seat']*1).toFixed(2)) ));
      $('#clf').html((angka((data['load_factor']*100).toFixed(2)) ));
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


  function printCetak() {
    var url           = "<?=site_url("reports/prints")?>";
    var divre         = $("#divre_filter").val();
    var tanggal_awal  = $("#tgl_filter_awal").val();
    var tanggal_akhir = $("#tgl_filter_akhir").val();
    var pilihan       = $('#pil_print').val();
    var format        = $("#jns_print").val();

    var bulan = tanggal_awal.substr(5,2);
    var tahun = tanggal_awal.substr(0,4);

    if(pilihan==1){
      var REQ = "?divre="+divre+"&bulan="+bulan+"&tahun="+tahun+"&format="+format+"&uk=F4-L"+"&name=home_jadwal";
      open(url+REQ);
    }else{
      var REQ = "?divre="+divre+"&bulan="+bulan+"&tahun="+tahun+"&format="+format+"&uk=F4-L"+"&name=home_jadwal_setoran";
      open(url+REQ);
    }
  }


  function print_html() {
    var url   = "<?=site_url("reports/prints")?>";
    var pilih_divre    = $("#id_bu_filter").val();
    var id_segment    = $("#id_segment_filter").val();
    var tanggal_awal  = $("#tgl_awal").val();
    var tanggal_akhir = $("#tgl_akhir").val();

    if (pilih_divre==61) {
      divre =1;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=html"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==62) {
      divre =2;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=html"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==63) {
      divre =3;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=html"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==64) {
      divre =4;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=html"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==0) {
      divre =0;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=html"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else{
      alertify.alert("Warning", "Pilih Divre.");
    }
  }

  function print_excell() {
    var url   = "<?=site_url("reports/prints")?>";
    var pilih_divre    = $("#id_bu_filter").val();
    var id_segment    = $("#id_segment_filter").val();
    var tanggal_awal  = $("#tgl_awal").val();
    var tanggal_akhir = $("#tgl_akhir").val();

    if (pilih_divre==61) {
      divre =1;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=excell"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==62) {
      divre =2;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=excell"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==63) {
      divre =3;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=excell"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==64) {
      divre =4;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=excell"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==0) {
      divre =0;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=excell"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else{
      alertify.alert("Warning", "Pilih Divre.");
    }
  }

  function print_pdf() {
    var url   = "<?=site_url("reports/prints")?>";
    var pilih_divre    = $("#id_bu_filter").val();
    var id_segment    = $("#id_segment_filter").val();
    var tanggal_awal  = $("#tgl_awal").val();
    var tanggal_akhir = $("#tgl_akhir").val();

    if (pilih_divre==61) {
      divre =1;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=pdf"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==62) {
      divre =2;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=pdf"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==63) {
      divre =3;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=pdf"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==64) {
      divre =4;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=pdf"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else if (pilih_divre==0) {
      divre =0;
      var REQ = "?divre="+divre+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=pdf"+"&uk=F4-P"+"&name=home_dashboard";
      open(url+REQ);
    }else{
      alertify.alert("Warning", "Pilih Divre.");
    }
  }



  // function print_all() {
  //   var url           = "<?=site_url("reports/prints")?>";
  //   var id_bu         = $("#id_bu_filter").val();
  //   var id_segment    = $("#id_segment_filter").val();
  //   var tanggal_awal  = $("#tgl_awal").val();
  //   var tanggal_akhir = $("#tgl_akhir").val();

  //   var REQ = "?id_bu="+id_bu+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=html"+"&uk=F4-P"+"&name=home_report_all";
  //   open(url+REQ);

  // }


  function print_all_html() {
    var url           = "<?=site_url("reports/prints")?>";
    var id_bu         = $("#id_bu_filter").val();
    var id_segment    = $("#id_segment_filter").val();
    var tanggal_awal  = $("#tgl_awal").val();
    var tanggal_akhir = $("#tgl_akhir").val();

    var REQ = "?id_bu="+id_bu+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=html"+"&uk=F4-P"+"&name=home_report_all";
    open(url+REQ);

  }

  function print_all_pdf() {
    var url           = "<?=site_url("reports/prints")?>";
    var id_bu         = $("#id_bu_filter").val();
    var id_segment    = $("#id_segment_filter").val();
    var tanggal_awal  = $("#tgl_awal").val();
    var tanggal_akhir = $("#tgl_akhir").val();

    var REQ = "?id_bu="+id_bu+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=pdf"+"&uk=F4-P"+"&name=home_report_all";
    open(url+REQ);

  }

  function print_all_excell() {
    var url           = "<?=site_url("reports/prints")?>";
    var id_bu         = $("#id_bu_filter").val();
    var id_segment    = $("#id_segment_filter").val();
    var tanggal_awal  = $("#tgl_awal").val();
    var tanggal_akhir = $("#tgl_akhir").val();

    var REQ = "?id_bu="+id_bu+"&id_segment="+id_segment+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir+"&format=excell"+"&uk=F4-P"+"&name=home_report_all";
    open(url+REQ);
  }

</script>
</body>
</html>
