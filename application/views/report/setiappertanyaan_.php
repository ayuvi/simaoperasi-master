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
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
        </section>

        <section class="invoice">
          <div class="row">
            <div class="col-lg-12 col-xs-12">
            <h4>Hasil Survei</h4>
            </div>
			      <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 id="ccheckin"><?php echo $jumlahresponden ?></h3>
                  <p>Jumlah Responden</p>
                </div>
                <div class="icon">
                  <i class="fa fa-child"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3 id="cloading">0</h3>
                  <p>Responden Mengisi Survei</p>
                </div>
                <div class="icon">
                  <i class="fa fa-child"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3 id="cdelivery">0</h3>
                  <p>Hasil Survei</p>
                </div>
                <div class="icon">
                  <i class="fa fa-child"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
			<div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3 id="cdelivery">0</h3>
                  <p>Event Survei</p>
                </div>
                <div class="icon">
                  <i class="fa fa-child"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
			<!--<div class="col-lg-12 col-xs-12">
			<div id="chart-container">FusionCharts XT will load here!</div>
			</div>-->
          </div>
		  
<html>
<head>
<title>My first chart using FusionCharts Suite XT</title>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript">
    FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container',
    width: '750',
    height: '650',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Split of Revenue by Product Categories",
            "subCaption": "Last year",
            "numberPrefix": "$",
            "bgColor": "#ffffff",
            "startingAngle": "310",
            "showLegend": "1",
            "defaultCenterLabel": "Total revenue: $64.08K",
            "centerLabel": "Revenue from $label: $value",
            "centerLabelBold": "1",
            "showTooltip": "0",
            "decimals": "0",
            "theme": "fusion",
			//Enabling chart export
            "exportEnabled": "1",
            //Enabling server-side export
            "exportMode": "server",
			"animateClockwise": "1"
        },
        "data": [{
            "label": "Food",
            "value": "28504"
        }, {
            "label": "Apparels",
            "value": "14633"
        }, {
            "label": "Electronics",
            "value": "10507"
        }, {
            "label": "Household",
            "value": "4910"
        }]
    }
}
);
    fusioncharts.render();
    });

</script>
</head>
<!--<body>
    <div id="chart-container">FusionCharts XT will load here!</div>
</body>-->
</html>
		  
          <!-- <div class="row">
            <div class="col-lg-6">
                    <h4>Vehicle Check In</h4>
                    <table class="table no-margin" id="transporterTable">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Count</th>
                          
                        </tr>
                      </thead>
                    </table>
            </div>
          </div> -->
				</section>
			</div>
			<?= $this->load->view('basic_js'); ?>
      <script type='text/javascript'>
      
    </script>
	</body>
</html>
