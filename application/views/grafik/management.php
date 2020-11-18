<!DOCTYPE html>
<html>

<head>
  <?= $this->load->view('head'); ?>

</head>


<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">

  <div class="wrapper">

    <?= $this->load->view('nav'); ?>
    <?= $this->load->view('menu_groups'); ?>
    <?php $session = $this->session->userdata('login'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Report <?= $nm_bu ?>
        </h1>
      </section>

      <section class="invoice">
        <div class="row">
          <form action="<?= base_url()?>home/management" method="post">
            <div class="form-group col-lg-4">
              <label>Cabang</label>
              <select class="form-control" style="width: 100%;" id="id_bu" name="id_bu">
                <?php if($session_level == 1 || $session_level == 10) { ?>
                <option value="0"  >--ALL--</option>
                <?php } ?>
                <?php foreach ($combobox_bu->result() as $rowmenu) { ?>
                <option value="<?= $rowmenu->id_bu?>"  ><?= $rowmenu->nm_bu?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-lg-2">
              <label>Awal</label>
              <input type="text" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="yyyy-mm-dd" value="<?= $tgl_awal?>">
              <input type="hidden" name="st" id="st" value="1">
            </div>

            <div class="form-group col-lg-2">
              <label>Akhir</label>
              <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control" placeholder="yyyy-mm-dd" value="<?= $tgl_akhir?>">
            </div>

            <div class="form-group col-lg-2">
              <label>Format</label>
              <select class="form-control" style="width: 100%;" id="ep" name="ep">
                <option value="1"  >Graph</option>
                <!-- <option value="2"  >Excel</option> -->
              </select>
            </div>
            <div class="form-group col-lg-2">
              <label>Options</label>
              <button type="submit" class="btn btn-primary form-control" id='btnSave'>Search</button>
            </div>
          </form>
        </div>

        <div class="row">
          <!-- <hr> -->
          <div class="col-md-12">
           <div id="report" style="position: relative;"></div>
         </div>
         <hr>
         <div class="col-md-12">
           <div id="report1" style="position: relative;"></div>
         </div>
         <div class="col-md-12">
           <div id="report2" style="position: relative;"></div>
         </div>
         <div class="col-md-12">
           <div id="report3" style="position: relative;"></div>
         </div>
       </div>
     </section>
   </div>
   <?= $this->load->view('basic_js'); ?>

   <script type='text/javascript'>
    $('#id_bu').val('<?= $id_bu ?>');


    $(document).ready(function() {

      $( "#tgl_awal, #tgl_akhir" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
      });


    }); 
    $("#tgl_awal, #tgl_akhir").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});

  </script>





  <script type='text/javascript'>
    $(function () {
        // Set up the chart
        var chart = new Highcharts.Chart({
          chart: {
            renderTo: 'report',
            type: 'line',
            margin: 75,

          },
          title: {  
            text: 'SGO & SO'
          },
          subtitle: {
            text: 'Report'
          },
          xAxis: {
            categories: [ <?php foreach ($sgo->result() as $rows) { ?> '<?= $rows->tanggal?>',<?php } ?>]
          },
          plotOptions: {
            column: {
              depth: 25
            }
          },

          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -20,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
          },

          series: [
          {
            name: 'SGO',
            data: [<?php foreach ($sgo->result() as $rows) { ?> <?=$rows->sgo?>,<?php } ?>]

          },
          {
            name: 'SO',
            data: [<?php foreach ($sgo->result() as $rows) { ?> <?= $rows->so?>,<?php } ?>]

          },

          ]

        });


      });
    </script>

    <script type='text/javascript'>

      $(function () {
        // Set up the chart
        var chart = new Highcharts.Chart({
          chart: {
            renderTo: 'report1',
            type: 'line',
            margin: 75,

          },
          title: {  
            text: 'Surplus Operasi'
          },
          subtitle: {
            text: 'Report'
          },
          xAxis: {
            categories: [ <?php foreach ($sgo->result() as $rows) { ?> '<?= $rows->tanggal?>',<?php } ?>]
          },
          plotOptions: {
            column: {
              depth: 25
            }
          },

          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -20,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
          },

          series: [
          {
            name: 'Pendapatan',
            data: [<?php foreach ($sgo->result() as $rows) { ?> <?= $rows->pendapatan?>,<?php } ?>]

          },
          {
            name: 'Biaya Operasional',
            data: [<?php foreach ($sgo->result() as $rows) { ?> <?= $rows->biaya ?> ,<?php } ?>]

          },

          ]

        });


      });
    </script>
    <script type='text/javascript'>

      $(function () {
        // Set up the chart
        var chart = new Highcharts.Chart({
          chart: {
            renderTo: 'report2',
            type: 'line',
            margin: 75,

          },
          title: {  
            text: 'RIT'
          },
          subtitle: {
            text: 'Report'
          },
          xAxis: {
            categories: [ <?php foreach ($sgo->result() as $rows) { ?> '<?= $rows->tanggal?>',<?php } ?>]
          },
          plotOptions: {
            column: {
              depth: 25
            }
          },

          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -20,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
          },

          series: [
          {
            name: 'RIT',
            data: [<?php foreach ($sgo->result() as $rows) { ?> <?= $rows->rit?>,<?php } ?>]

          },

          ]

        });


      });
    </script>
    <script type='text/javascript'>


      $(function () {
        // Set up the chart
        var chart = new Highcharts.Chart({
          chart: {
            renderTo: 'report3',
            type: 'line',

            margin: 75,

          },
          title: {  
            text: 'Penumpang'
          },
          subtitle: {
            text: 'Report'
          },
          xAxis: {
            categories: [ <?php foreach ($sgo->result() as $rows) {?>'<?= $rows->tanggal?>',<?php } ?>]
          },
          plotOptions: {
            column: {
              depth: 25
            },
            series: {
              lineWidth: 2
            }
          },

          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -20,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
          },

          series: [

          {
            name: 'PNP',
            data: [<?php foreach ($sgo->result() as $rows) { ?><?= $rows->pnp ?> ,<?php } ?>]

          },

          ]
                
              });
      });
    </script>








  </div>
</body>
</html>