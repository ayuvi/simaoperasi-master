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
          Report Pendapatan 
        </h1>
      </section>

      <section class="invoice">
        <div class="row">
          <form action="<?= base_url()?>home/pendapatan" method="post">

            <div class="form-group col-lg-4">
              <label>Awal</label>
              <input type="text" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="yyyy-mm-dd" value="<?= $tgl_awal ?>">
              <input type="hidden" name="st" id="st" value="1">
            </div>

            <div class="form-group col-lg-4">
              <label>Akhir</label>
              <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control" placeholder="yyyy-mm-dd" value="<?= $tgl_akhir ?>">
            </div>


            <div class="form-group col-lg-4">
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
         <div class="col-md-12">
          <?php $upp_all = $this->model_home->get_data_upp_all($tgl_awal, $tgl_akhir) ?>
          <p ><h4 class="text-center">Periode  <strong><?= $tgl_awal ?></strong> s/d  <strong><?= $tgl_akhir ?></strong></h4></p>
          <h4 class="text-center">Total UPP : <strong><?= number_format($upp_all,2) ?></strong> </h4> 
        </div> 

      </div>

      <div class="row">
        <?php foreach ($this->model_home->get_data_divre()->result_array() as $rowd) {?>
        <div class="col-md-3">
          <table class="table table-bordered">
            <tbody><tr>
              <th >DIVRE <?= $rowd['id_divre'] ?></th>
              <th>UPP</th>
            </tr>
            <?php 
            $data_cabang = $this->db->query("SELECT * FROM ref_bu where active=1 and id_bu not between 60 and 65 and id_divre=".$rowd['id_divre']);
            foreach ($data_cabang->result() as $row) {
              $id_cabang = $row->id_bu;
              $nm_cabang = $row->nm_bu;

              $pendapatan = $this->db->query("SELECT SUM(pendapatan) as pendapatan from (
                SELECT
                sum(a.total) pendapatan 
                FROM
                ref_setoran_detail_pnp a
                LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
                LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
                LEFT JOIN ref_bu d ON b.id_bu = d.id_bu 
                WHERE
                b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' and d.id_bu='$id_cabang'
                UNION ALL
                SELECT
                sum(a.total) pendapatan 
                FROM
                ref_setoran_detail_pend a
                LEFT JOIN ref_setoran_detail b ON a.id_setoran_detail = b.id_setoran_detail
                LEFT JOIN ref_segment c ON b.kd_segmen = c.kd_segment 
                LEFT JOIN ref_bu d ON b.id_bu = d.id_bu 
                WHERE
                b.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' and d.id_bu='$id_cabang'
                UNION ALL   
                SELECT
                COALESCE(sum(a.total_pend),0) pendapatan 
                FROM
                ref_setoran_borongan a
                LEFT JOIN ref_bu b ON a.id_bu = b.id_bu
                LEFT JOIN ref_segment c ON a.kd_segmen = c.kd_segment 
                WHERE
                a.tgl_setoran BETWEEN '$tgl_awal' AND '$tgl_akhir' and b.id_bu='$id_cabang'
                )x");
              $upp_cabang = $pendapatan->row_array()['pendapatan'];
              
              ?>
              <tr>
                <td><?= $nm_cabang?></td>
                <td class="text-right"><?= number_format($upp_cabang,2)?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php }  ?>
      </div>



    </section>
  </div>
  <?= $this->load->view('basic_js'); ?>
  <script type='text/javascript'>


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
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            margin: 75,

          },
          title: {  
            text: 'Report UPP Divre'
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b> Total: <b>{point.y:.2f}</b>'
                    //pointFormat: '<b>' + this.point.name + '</b>: ' + this.percentage.toFixed(1) + '% Total: '+Highcharts.numberFormat(this.y, 2, '.')
                  },

                  plotOptions: {
                    pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: {
                        enabled: true,
                            //format: '<b>{point.name}</b>: {point.percentage:.1f} %</b> Total: <b>{point.y:.2f}</b>',
                            style: {
                             color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                           },
                            // connectorColor: 'silver',
							 // style: {
								 // fontSize: '13px',
								 // fontFamily: 'Verdana, sans-serif',
								 // textShadow: '0 0 3px black'
							 // },
							 formatter: function() {
								  //return  Highcharts.numberFormat(this.y, 2, '.');
								  return '<b>' + this.point.name + '</b>: ' + this.percentage.toFixed(1) + '% Total: '+Highcharts.numberFormat(this.y, 2, '.');
               }
             },
             showInLegend: true
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


        series: [{
          name: 'UPP',
          colorByPoint: true,
          data: [
          <?php 

          foreach ($upp->result_array() as $rows) {?>
            {
              name: "<?= $rows['nm_divre']?>",
              y: <?= $rows['pendapatan']?>
            },
            <?php } ?>
            ]
          }]

        });


      });
    </script>

    
  </body>
  </html>
