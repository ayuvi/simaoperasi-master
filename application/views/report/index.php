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
            Laporan
          </h1>
        </section>

        <section class="invoice">
        <div class="row">
        <div class=" form-group col-lg-12 col-xs-12">
            <div class="form-group col-md-12">
            <center>
										<select class="form-control select2" style="width: 100%;" id="divisi" name="divisi">
										<option value="0">-- Pilih Divre --</option>	
										<option value="1">Divre 1</option>	
										<option value="2">Divre 2</option>	
										<option value="3">Divre 3</option>	
										<option value="4">Divre 4</option>	
										<option value="5">Semua Divre</option>	
                    </select>
                    </center>
						</div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-lg-6 col-xs-6">
            <center><div id="segmentasi" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
          </div>
          <div class="col-lg-6 col-xs-6">
            <center><div id="jenis" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
          </div>
          <div class="col-lg-6 col-xs-6">
            <center><div id="merk" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
          </div>
          <div class="col-lg-6 col-xs-6">
            <center><div id="usia" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
          </div> -->

          <div class="col-lg-6 col-xs-6">
            <center><div id="grafik_jenis" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
          </div>
          <div class="col-lg-6 col-xs-6">
						  <table class="table table-striped table-bordered table-hover" id="jenisTable">
                <thead>
                  <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">CABANG</th>
                    <th class="text-center">BUS GANDENG</th>
                    <th class="text-center">BUS BESAR</th>
                    <th class="text-center">BUS MEDIUM</th>
                    <th class="text-center">MICROBUS</th>
                    <th class="text-center">BOX BESAR</th>
                    <th class="text-center">BOX MEDIUM</th>
                    <th class="text-center">BOX MINI</th>
                  </tr>
                </thead>
						  </table>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-xs-6">
              <center><div id="grafik_merek" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
            </div>
          <div class="col-lg-6 col-xs-6">
                <table class="table table-striped table-bordered table-hover" id="merekTable">
                  <thead>
                    <tr>
                      <th class="text-center">NO</th>
                      <th class="text-center">CABANG</th>
                      <th class="text-center">BEIJING</th>
                      <th class="text-center">DAIHATSU</th>
                      <th class="text-center">GOLDEN DRAGON</th>
                      <th class="text-center">HINO</th>
                      <th class="text-center">HYUNDAI</th>
                      <th class="text-center">INOBUZ</th>
                      <th class="text-center">ISUZU</th>
                      <th class="text-center">KINGLONG</th>
                      <th class="text-center">MERCEDES BENZ</th>
                      <th class="text-center">MITSUBISHI</th>
                      <th class="text-center">NISSAN</th>
                      <th class="text-center">TOYOTA</th>
                      <th class="text-center">YUTOONG</th>
                      <th class="text-center">ZHONGTONG</th>
                    </tr>
                  </thead>
                </table>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-xs-6">
              <center><div id="grafik_usia" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
            </div>
          <div class="col-lg-6 col-xs-6">
                <table class="table table-striped table-bordered table-hover" id="usiaTable">
                  <thead>
                    <tr>
                      <th class="text-center">NO</th>
                      <th class="text-center">CABANG</th>
                      <th class="text-center">0sd5TH</th>
                      <th class="text-center">6sd10TH</th>
                      <th class="text-center">11sd15TH</th>
                      <th class="text-center">16sd20TH</th>
                      <th class="text-center">>20TH</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-xs-6">
              <center><div id="grafik_segmentasi" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
            </div>
          <div class="col-lg-6 col-xs-6">
                <table class="table table-striped table-bordered table-hover" id="segmentasiTable">
                  <thead>
                    <tr>
                      <th class="text-center">NO</th>
                      <th class="text-center">CABANG</th>
                      <th class="text-center">ANTARKOTA</th>
                      <th class="text-center">PERINTIS</th>
                      <th class="text-center">PEMADUMODA</th>
                      <th class="text-center">ANEG</th>
                      <th class="text-center">BISAKOTA</th>
                      <th class="text-center">PAKET</th>
                      <th class="text-center">PARIWISATA</th>
                      <th class="text-center">AGLOMERASI</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-xs-12">
              <center><div id="container" style="min-width: auto; height: auto; max-width: auto; margin: 0 auto"></div></center>
            </div>

      </section>

	  </div>
			<?= $this->load->view('basic_js'); ?>

      <script type='text/javascript'>

      $('#divisi').select2({
              'allowClear': true
            }).on("change", function (e) {
              jenisTable.ajax.reload();
              merekTable.ajax.reload();
              usiaTable.ajax.reload();
              segmentasiTable.ajax.reload();
            });

      var jenisTable = $('#jenisTable').DataTable({
            "ordering" : false,
            "scrollX": true,
            "scrollY": "300px",
            "processing": true,
            "serverSide": true,
            "pageLength": 58,

            dom: 'Bfrtip',
            buttons: [
              'csv', 'excel', //'pdf', 'print'
            ],

            ajax: 
            {
              url: "<?= base_url()?>report/ax_data_grafik_jenis/",
              type: 'POST',
              data: function ( d ) {
                return $.extend({}, d, { 
                  "divisi" : $("#divisi").val(),
                    });
                  }
              },
              columns: 
              [
                { data: "id", render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }},
                { data: "cabang" },
                { data: "busgandeng" },
                { data: "busbesar" },
                { data: "busmedium" },
                { data: "microbus" },
                { data: "boxbesar" },
                { data: "boxmedium" },
                { data: "boxmini" },
              ]
      // });
          ,
          "drawCallback": function ( settings ) {
                var api = this.api();
                var jsondata = api.ajax.json();
                cabang = jsondata['cabang'];
                busgandeng = jsondata['busgandeng'];
                busbesar = jsondata['busbesar'];
                busmedium = jsondata['busmedium'];
                microbus = jsondata['microbus'];
                boxbesar = jsondata['boxbesar'];
                boxmedium = jsondata['boxmedium'];
                boxmini = jsondata['boxmini'];
                
                var hchart = new Highcharts.Chart({
                    chart: {
                      renderTo: 'grafik_jenis',
                      type: 'pie',
                      plotBackgroundColor: null,
                      plotBorderWidth: null,
                      plotShadow: false,
                    },
                    title: {
                      text: 'Laporan Grafik Jenis Armada'
                    },
                    plotOptions: {
                      pie: {
                          allowPointSelect: true,
                          cursor: 'pointer',
                          dataLabels: {
                              enabled: true,
                              format: '<b>{point.name}</b>: <br /> {point.y:.0f} Armada'
                          }
                      }
                    },
                    tooltip: {
                      // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                      // pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y:.2f}</b><br/>',
                      valueDecimals: 2
                    },
                    series: [{
                          name: 'Armada',
                          colorByPoint: true,
                          data: [{
                              name: 'Bus Gandeng',
                              y: busgandeng[0],
                          }, {
                              name: 'Bus Besar',
                              y: busbesar[0]
                          }, {
                              name: 'Bus Medium',
                              y: busmedium[0]
                          }, {
                              name: 'Microbus',
                              y: microbus[0]
                          }, {
                              name: 'Box Besar',
                              y: boxbesar[0]
                          }, {
                              name: 'Box Medium',
                              y: boxmedium[0]
                          }, {
                              name: 'Box Mini',
                              y: boxmini[0]
                          }]
                        }]
                    });
                  }
            });
            
        var merekTable = $('#merekTable').DataTable({
            "ordering" : false,
            "scrollX": true,
            "scrollY": "300px",
            "processing": true,
            "serverSide": true,
            "pageLength": 58,

            dom: 'Bfrtip',
            buttons: [
              'csv', 'excel', //'pdf', 'print'
            ],

            ajax: 
            {
              url: "<?= base_url()?>report/ax_data_grafik_merek/",
              type: 'POST',
              data: function ( d ) {
                return $.extend({}, d, { 
                  "divisi" : $("#divisi").val(),
                    });
                  }
              },
              columns: 
              [
                { data: "id", render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }},
                { data: "cabang" },
                { data: "beijing" },
                { data: "daihatsu" },
                { data: "gdragon" },
                { data: "hino" },
                { data: "hyundai" },
                { data: "inobus" },
                { data: "isuzu" },
                { data: "kinglong" },
                { data: "mercy" },
                { data: "mitsubishi" },
                { data: "nissan" },
                { data: "toyota" },
                { data: "yutoong" },
                { data: "zhongtong" },
              ]
      // });
          ,
          "drawCallback": function ( settings ) {
                var api = this.api();
                var jsondata = api.ajax.json();
                cabang = jsondata['cabang'];
                beijing = jsondata['beijing'];
                daihatsu = jsondata['daihatsu'];
                gdragon = jsondata['gdragon'];
                hino = jsondata['hino'];
                hyundai = jsondata['hyundai'];
                inobus = jsondata['inobus'];
                isuzu = jsondata['isuzu'];
                kinglong = jsondata['kinglong'];
                mercy = jsondata['mercy'];
                mitsubishi = jsondata['mitsubishi'];
                nissan = jsondata['nissan'];
                toyota = jsondata['toyota'];
                yutoong = jsondata['yutoong'];
                zhongtong = jsondata['zhongtong'];
                
                var hchart = new Highcharts.Chart({
                    chart: {
                      renderTo: 'grafik_merek',
                      type: 'pie',
                      plotBackgroundColor: null,
                      plotBorderWidth: null,
                      plotShadow: false,
                    },
                    title: {
                      text: 'Laporan Grafik Merek Armada'
                    },
                    plotOptions: {
                      pie: {
                          allowPointSelect: true,
                          cursor: 'pointer',
                          dataLabels: {
                              enabled: true,
                              format: '<b>{point.name}</b>: <br /> {point.y:.0f} Armada'
                          }
                      }
                    },
                    tooltip: {
                      // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                      // pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y:.2f}</b><br/>',
                      valueDecimals: 2
                    },
                    series: [{
                          name: 'Armada',
                          colorByPoint: true,
                          data: [{
                              name: 'Beijing',
                              y: beijing[0],
                          }, {
                              name: 'Daihatsu',
                              y: daihatsu[0]
                          }, {
                              name: 'Golden Dragon',
                              y: gdragon[0]
                          }, {
                              name: 'Hino',
                              y: hino[0]
                          }, {
                              name: 'Hyundai',
                              y: hyundai[0]
                          }, {
                              name: 'Inobus',
                              y: inobus[0]
                          }, {
                              name: 'Isuzu',
                              y: isuzu[0]
                          }, {
                              name: 'Kinglong',
                              y: kinglong[0]
                          }, {
                              name: 'Mercedes Benz',
                              y: mercy[0]
                          }, {
                              name: 'Mitsubishi',
                              y: mitsubishi[0]
                          }, {
                              name: 'Nissan',
                              y: nissan[0]
                          }, {
                              name: 'Toyota',
                              y: toyota[0]
                          }, {
                              name: 'Yutoong',
                              y: yutoong[0]
                          }, {
                              name: 'Zhongtong',
                              y: zhongtong[0]
                          }]
                        }]
                    });
                  }
            });

            var usiaTable = $('#usiaTable').DataTable({
            "ordering" : false,
            "scrollX": true,
            "scrollY": "300px",
            "processing": true,
            "serverSide": true,
            "pageLength": 58,

            dom: 'Bfrtip',
            buttons: [
              'csv', 'excel', //'pdf', 'print'
            ],

            ajax: 
            {
              url: "<?= base_url()?>report/ax_data_grafik_usia/",
              type: 'POST',
              data: function ( d ) {
                return $.extend({}, d, { 
                  "divisi" : $("#divisi").val(),
                    });
                  }
              },
              columns: 
              [
                { data: "id", render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }},
                { data: "cabang" },
                { data: "satu" },
                { data: "dua" },
                { data: "tiga" },
                { data: "empat" },
                { data: "lima" },
              ]
      // });
          ,
          "drawCallback": function ( settings ) {
                var api = this.api();
                var jsondata = api.ajax.json();
                cabang = jsondata['cabang'];
                satu = jsondata['satu'];
                dua = jsondata['dua'];
                tiga = jsondata['tiga'];
                empat = jsondata['empat'];
                lima = jsondata['lima'];
                
                var hchart = new Highcharts.Chart({
                    chart: {
                      renderTo: 'grafik_usia',
                      type: 'pie',
                      plotBackgroundColor: null,
                      plotBorderWidth: null,
                      plotShadow: false,
                      // margin: 75,
                    },
                    title: {
                      text: 'Laporan Grafik Usia Armada'
                    },
                    // subtitle: {
                    //   text: "test"
                    // },
                    // legend: {
                    //   reversed: true
                    // },
                    // xAxis: {
                    //   categories: cabang,
                    //   labels: {
                    //     style: {
                    //       "color":"black",
                    //       "text-overflow": 'ellipsis',
                    //       "line-height": "0.5em",
                    //       "height": "2.5em",
                    //       "white-space":"nowrap",
                    //       "word-wrap": "break-word",
                    //       "hyphens":"auto"
                    //     }
                    //   }
                    // },
                    // yAxis: {
                    //   min: 0,
                    //   title: {
                    //     text: ''
                    //   }
                    // },
                    plotOptions: {
                      pie: {
                          allowPointSelect: true,
                          cursor: 'pointer',
                          dataLabels: {
                              enabled: true,
                              format: '<b>{point.name}</b>: <br /> {point.y:.0f} Armada'
                          }
                      }
                    },
                    // legend: {
                    //   layout: 'vertical',
                    //   align: 'right',
                    //   verticalAlign: 'top',
                    //   x: 10,
                    //   y: 40,
                    //   floating: true,
                    //   borderWidth: 1,
                    //   backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    //   shadow: true
                    // },
                    tooltip: {
                      // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                      // pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y:.2f}</b><br/>',
                      valueDecimals: 2
                    },
                    series: [{
                          name: 'Armada',
                          colorByPoint: true,
                          data: [{
                              name: '1-5 tahun',
                              y: satu[0],
                              // sliced: true,
                              // selected: true
                          }, {
                              name: '6-10 tahun',
                              y: dua[0]
                          }, {
                              name: '11-15 tahun',
                              y: tiga[0]
                          }, {
                              name: '16-20 tahun',
                              y: empat[0]
                          }, {
                              name: '>20 tahun',
                              y: lima[0]
                          }]
                        }]
                    });
                  }
            });

            var segmentasiTable = $('#segmentasiTable').DataTable({
            "ordering" : false,
            "scrollX": true,
            "scrollY": "300px",
            "processing": true,
            "serverSide": true,
            "pageLength": 58,

            dom: 'Bfrtip',
            buttons: [
              'csv', 'excel', //'pdf', 'print'
            ],
            
            ajax: 
            {
              url: "<?= base_url()?>report/ax_data_grafik_segmentasi/",
              type: 'POST',
              data: function ( d ) {
                return $.extend({}, d, { 
                  "divisi" : $("#divisi").val(),
                    });
                  }
              },
              columns: 
              [
                { data: "id", render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }},
                { data: "cabang" },
                { data: "antarkota" },
                { data: "perintis" },
                { data: "pemadumoda" },
                { data: "aneg" },
                { data: "biskota" },
                { data: "paket" },
                { data: "pariwisata" },
                { data: "aglomerasi" },
              ]
      // });
          ,
          "drawCallback": function ( settings ) {
                var api = this.api();
                var jsondata = api.ajax.json();
                cabang = jsondata['cabang'];
                antarkota = jsondata['antarkota'];
                perintis = jsondata['perintis'];
                pemadumoda = jsondata['pemadumoda'];
                aneg = jsondata['aneg'];
                biskota = jsondata['biskota'];
                paket = jsondata['paket'];
                pariwisata = jsondata['pariwisata'];
                aglomerasi = jsondata['aglomerasi'];
                
                var hchart = new Highcharts.Chart({
                    chart: {
                      renderTo: 'grafik_segmentasi',
                      type: 'pie',
                      plotBackgroundColor: null,
                      plotBorderWidth: null,
                      plotShadow: false,
                    },
                    title: {
                      text: 'Laporan Grafik Segmentasi Armada'
                    },
                    plotOptions: {
                      pie: {
                          allowPointSelect: true,
                          cursor: 'pointer',
                          dataLabels: {
                              enabled: true,
                              format: '<b>{point.name}</b>: <br /> {point.y:.0f} Armada'
                          }
                      }
                    },
                    tooltip: {
                      // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                      // pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y:.2f}</b><br/>',
                      valueDecimals: 2
                    },
                    series: [{
                          name: 'Armada',
                          colorByPoint: true,
                          data: [{
                              name: 'Antar Kota',
                              y: antarkota[0],
                          }, {
                              name: 'Perintis',
                              y: perintis[0]
                          }, {
                              name: 'Pemadu Moda',
                              y: pemadumoda[0]
                          }, {
                              name: 'Aneg',
                              y: aneg[0]
                          }, {
                              name: 'Bis Kota',
                              y: biskota[0]
                          }, {
                              name: 'Paket',
                              y: paket[0]
                          }, {
                              name: 'Pariwisata',
                              y: pariwisata[0]
                          }, {
                              name: 'Aglomerasi',
                              y: aglomerasi[0]
                          }]
                        }]
                    });
                  }
            });
       
      //disini
      //     $(document).ready(function() {
        
      //       $( "#tgl_awal, #tgl_akhir" ).datepicker({
      //         changeMonth: true,
      //         changeYear: true,
      //         dateFormat: "yy-mm-dd"
      //       });
			
          
		  // }); 
      //   $("#tgl_awal, #tgl_akhir").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	

      //   $(function () {
			
			// var chartsegment = [];
			// const baseUrl = '<?php echo base_url(); ?>report/get_data_chart_segment';
			// $.ajax({
			// 	url: baseUrl,
			// 	dataType: 'json',
			// 	success: function(datas){
			// 		chartsegment.push(datas);
			// 	}
			// });

      //     var chart = new Highcharts.Chart({
      //         chart: {
      //           renderTo: 'segmentasi',
      //           plotBackgroundColor: null,
			// 		      plotBorderWidth: null,
			// 		      plotShadow: false,
			// 		      type: 'pie',
      //           },
      //           title: {  
      //               text: 'Laporan Grafik Segmentasi Armada'
      //           },
      //           subtitle: {
      //               text: 'Text'
      //           },
      //           plotOptions: {
      //             pie: {
      //               allowPointSelect: true,
      //               cursor: 'pointer',
      //               dataLabels: {
      //               enabled: true,
      //               format: '<b>{point.name}</b>: {point.percentage:.1f}%</b><br /><b>{point.y:,.0f} Armada</b>',
      //             },
      //             showInLegend: false
      //             }
			// 	        },
      //           tooltip: {
      //             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      //             pointFormat: '<b>{point.name}</b>: {point.percentage:.1f}%</b> Total = <b>{point.y:,.0f} Armada</b>'
      //           },

      //           legend: {
      //             layout: 'vertical',
      //             align: 'left',
      //             verticalAlign: 'top',
      //             x: -20,
      //             y: 80,
      //             floating: true,
      //             borderWidth: 1,
      //             backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
      //             shadow: true
      //           },
                
      //            series: [{
      //             name: 'Report',
      //             colorByPoint: true,
      //             data: [
			// 				<?php 
			// 				foreach ($chartsegment as $datasegment) {
			// 					 echo "['" .$datasegment->name . "'," . $datasegment->y ."],\n";
			// 				}
			// 				?>
			// 			],
      //           }]
      //       });
			
			
      //       var chart = new Highcharts.Chart({
      //         chart: {
      //           renderTo: 'jenis',
      //           plotBackgroundColor: null,
			// 		      plotBorderWidth: null,
			// 		      plotShadow: false,
			// 		      type: 'pie'
                   
      //           },
      //           title: {  
      //               text: 'Laporan Grafik Jenis Armada'
      //           },
      //           subtitle: {
      //               text: 'Text'
      //           },
      //           plotOptions: {
      //             pie: {
      //               allowPointSelect: true,
      //               cursor: 'pointer',
      //               dataLabels: {
      //               enabled: true,
      //               format: '<b>{point.name}</b>: {point.percentage:.1f}%</b><br /><b>{point.y:,.0f} Armada',
      //             },
      //             showInLegend: false
      //             }
			// 	        },
      //           tooltip: {
      //             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      //             pointFormat: '<b>{point.name}</b>: {point.percentage:.1f}%</b> Total = <b>{point.y:,.0f} Armada</b>'
      //           },

      //           legend: {
      //             layout: 'vertical',
      //             align: 'left',
      //             verticalAlign: 'top',
      //             x: -20,
      //             y: 80,
      //             floating: true,
      //             borderWidth: 1,
      //             backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
      //             shadow: true
      //           },
                
      //            series: [{
      //             name: 'Report',
      //             colorByPoint: true,
      //             data: [
      //               <?php 
      //               foreach ($chartarmada as $dataarmada) {
      //                 echo "['" .$dataarmada->name . "'," . $dataarmada->y ."],\n";
      //               }
      //               ?>
      //             ],
      //           }]
      //       });

      //       var chart = new Highcharts.Chart({
      //         chart: {
      //           renderTo: 'merk',
      //           plotBackgroundColor: null,
			// 		      plotBorderWidth: null,
			// 		      plotShadow: false,
			// 		      type: 'pie'
                   
      //           },
      //           title: {  
      //               text: 'Laporan Grafik Merk Armada'
      //           },
      //           subtitle: {
      //               text: 'Text'
      //           },
      //           plotOptions: {
      //             pie: {
      //               allowPointSelect: true,
      //               cursor: 'pointer',
      //               dataLabels: {
      //               enabled: true,
      //               format: '<b>{point.name}</b>: {point.percentage:.1f}%</b><br /><b>{point.y:,.0f} Armada',
      //             },
      //             showInLegend: false
      //             }
			// 	        },
      //           tooltip: {
      //             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      //             pointFormat: '<b>{point.name}</b>: {point.percentage:.1f}%</b> Total = <b>{point.y:,.0f} Armada</b>'
      //           },

      //           legend: {
      //             layout: 'vertical',
      //             align: 'left',
      //             verticalAlign: 'top',
      //             x: -20,
      //             y: 80,
      //             floating: true,
      //             borderWidth: 1,
      //             backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
      //             shadow: true
      //           },
                
      //            series: [{
      //             name: 'Report',
      //             colorByPoint: true,
      //             data: [
			// 				<?php 
			// 				foreach ($chartmerk as $datamerk) {
			// 					 echo "['" .$datamerk->name . "'," . $datamerk->y ."],\n";
			// 				}
			// 				?>
			// 			],
      //           }]
      //       });

      //       var chart = new Highcharts.Chart({
      //         chart: {
      //           renderTo: 'usia',
      //           plotBackgroundColor: null,
			// 		      plotBorderWidth: null,
			// 		      plotShadow: false,
			// 		      type: 'pie'
                   
      //           },
      //           title: {  
      //               text: 'Laporan Grafik Usia Armada'
      //           },
      //           subtitle: {
      //               text: 'Text'
      //           },
      //           plotOptions: {
      //             pie: {
      //               allowPointSelect: true,
      //               cursor: 'pointer',
      //               dataLabels: {
      //               enabled: true,
      //               format: '<b>{point.name}</b>: {point.percentage:.1f}%</b><br /><b>{point.y:,.0f} Armada',
      //             },
      //             showInLegend: false
      //             }
			// 	        },
      //           tooltip: {
      //             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      //             pointFormat: '<b>{point.name}</b>: {point.percentage:.1f}%</b> Total = <b>{point.y:,.0f} Armada</b>'
      //           },

      //           legend: {
      //             layout: 'vertical',
      //             align: 'left',
      //             verticalAlign: 'top',
      //             x: -20,
      //             y: 80,
      //             floating: true,
      //             borderWidth: 1,
      //             backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
      //             shadow: true
      //           },
                
      //            series: [{
      //             name: 'Report',
      //             colorByPoint: true,
      //             data: [
			// 				<?php 
			// 				foreach ($chartusia as $datausia) {
			// 					 echo "['" .$datausia->name . "'," . $datausia->y ."],\n";
			// 				}
			// 				?>
			// 			],
      //           }]
      //       });
      //   });
    </script>
	</body>
</html>
