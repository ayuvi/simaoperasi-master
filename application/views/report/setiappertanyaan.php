<!DOCTYPE html>
<html>

  <head>
    <?= $this->load->view('head'); ?>

  </head>
	<style>
	#container {
  min-width: 310px;
  max-width: 800px;
  height: 400px;
  margin: 0 auto
}
	</style>

  <body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">

    <div class="wrapper">

      <?= $this->load->view('nav'); ?>
      <?= $this->load->view('menu_groups'); ?>
      <? $session = $this->session->userdata('login'); ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Laporan Survei Berdasarkan Setiap Pertanyaan
          </h1>
        </section>

        <section class="invoice">
          <div class="row">
		  <form action="<?= base_url()?>report/index" method="post">
          <!--<div class="form-group col-lg-3">
              <label>Awal</label>
              <input type="text" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="yyyy-mm-dd" value="<?= date('yyyy-mm-dd')?>">
          </div>

          <div class="form-group col-lg-3">
              <label>Akhir</label>
              <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control" placeholder="yyyy-mm-dd" value="<?= date('yyyy-mm-dd')?>">
          </div>-->
		  
		  <div class="form-group col-lg-8">
			<label>Pertanyaan</label>
			<select class="form-control select2 " style="width: 100%;" id="id_cek" name="id_cek">
				<option value="0">--pertanyaan--</option>
				<?php
				foreach ($pertanyaan_combobox->result() as $rowmenu) {
				?>
				<option value="<?= $rowmenu->id_cek?>"  ><?= $rowmenu->nm_cek?></option>
				<?php
				}
				?>
			</select>
  		</div>
			
			<div class="form-group col-lg-2">
			<label>&nbsp;</label>
			<button type="submit" class="btn btn-primary form-control" id="btnSave">Proses</button>
			</div>
		  
          </div>
          
		  <div class="row">
			<div class="col-lg-12 col-xs-12"><br>
				<center><div id="report" style="min-width: 310px; height: 400px; max-width: 1000px; margin: 0 auto"></div></center>
			</div>
		  </form>
		</section>
	  </div>
			<?= $this->load->view('basic_js'); ?>

      <script type='text/javascript'>
       /*  $('#id_bu_filter, #id_segment_filter').select2({
            'allowClear': true
          }).on("change", function (e) {
            // buTable.ajax.reload(); 
            ViewData();
          }); */

          $( "#tgl_awal, #tgl_akhir" ).on("change", function (e) {
            //buTable.ajax.reload(); 
            // ViewData();
          });

          /* function ViewData(){
              var url = '<?=base_url()?>home/get_data_dashboard';
              var data = {
                id_bu: $('#id_bu_filter').val(),
                id_segment: $('#id_segment_filter').val(),
                tgl_awal: $('#tgl_awal').val(),
                tgl_akhir: $('#tgl_akhir').val(),
              };
                  
              $.ajax({
                url: url,
                method: 'POST',
                data: data
              }).done(function(data, textStatus, jqXHR) {
                var data = JSON.parse(data);
                $('#cso').html(data['cso']);
                $('#csgo').html(data['csgo']);
                $('#crit').html(data['crit']);
                $('#ckm').html(data['ckm']);
                $('#cpnp').html(data['cpnp']);
                $('#cpengeluaran').html(data['cbiaya']);
                $('#cpenghasilan').html(data['cpendapatan']);
                $('#claba').html(data['claba']);
                charts (data['chart'])
          });
          } */

          $(document).ready(function() {
        
            $( "#tgl_awal, #tgl_akhir" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "yy-mm-dd"
            });

          // ViewData();
          
		  }); 
        $("#tgl_awal, #tgl_akhir").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});

       /* function charts (datacate){
        // Set up the chart
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'report',
                    type: 'bar',
                    margin: 75,
                   
                },
                title: {  
                    text: 'Persentase SGO dan SGO'
                },
                subtitle: {
                    text: 'Report'
                },
                xAxis: {
                  /// data BU
                    categories: datacate
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                
                series: [{"name":"Persentase","data":[5.7879,6.6286,6.1724,5.3125,7.1481,6.1333,4.5769]}]
                
            });            
        } */	
	
// Build the chart

	
      
        $(function () {
        // Set up the chart
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'report',
                    plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
                   
                },
                title: {  
                    text: 'Laporan Grafik Berdasarkan Setiap Pertanyaan'
                },
                subtitle: {
                    text: '<?php echo $status;?>'
                },
                plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f}%</b>',
						},
						showInLegend: true
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					pointFormat: '<b>{point.name}</b>: {point.percentage:.1f}%</b> Total = <b>{point.y:,.0f} Orang</b>'
				},

                legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: -20,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
                
                 series: [{
					name: 'Report',
					colorByPoint: true,
					data: [{
						name: 'Sangat Tidak Setuju',
						y: <?php echo $satu;?>,
						// sliced: true,
						selected: true
					}, {
						name: 'Tidak Setuju',
						y: <?php echo $dua;?>,
						selected: true
					}, {
						name: 'Kurang Setuju',
						y: <?php echo $tiga;?>,
						selected: true
					}, {
						name: 'Setuju',
						y: <?php echo $empat;?>,
						selected: true
					}, {
						name: 'Sangat Setuju',
						y: <?php echo $lima;?>,
						selected: true
					}]
				}]
                
            });

           
        });
    </script>
	</body>
</html>
