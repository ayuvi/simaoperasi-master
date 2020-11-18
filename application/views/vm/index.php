<!DOCTYPE html>
<html>
  <head>
    <?= $this->load->view('head'); ?>
    <style type="text/css">
      
      .input-hide{
           display: block;
            width: 0%;
            height: 0;
            padding: 0px 0px;
      }

       .transparent-input{
       background-color:transparent !important;
       border:none !important;
    }
    .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(<?= base_url()?>assets/img/loading.gif) 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }
      
    </style>
    <div class="loader"></div>

  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav" onload="startTime();">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="#" class="navbar-brand"><b>E</b>Assignment</a> 
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>

            </div>

           
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <input type="text" class="form-control " id="kode1" placeholder="Kode">
              <input type="text" class="form-control input-hide" id="id_pool" placeholder="Pool" value='<?php echo($id_pool) ?>'>
            </div>
        
           <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                    <button type="button" class="btn bg-aqua   btn-flat waves-effect" id='refresh'> <i class="fa fa-refresh"></i> Refresh</button> 
                 </li>
                </ul>
              </div>



          </div><!-- /.container-fluid -->
        </nav>




      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header text-center">
            <h1>
              PERUM DAMRI CABANG <?php echo strtoupper($nm_cabang) ?><br>
              POOL <?php echo strtoupper($nm_pool) ?>
            </h1>
            <h1 id='txt'> </h1>
            </section>
          <!-- Main content -->
          <section class="content-header text-center">
            <div class="callout callout-info">
               <div class="box-header">
                <h3 class="box-title" >Tap Tanda Pengenal Anda Untuk Memulai Transaksi</h3>
                </div>
            </div>
          </section><!-- /.content -->

          

          <section class="content-header text-center" >
            <div class="row">
               <div class="col-md-12">
                <input type="text" class="form-control " id="kode" placeholder="No Kartu">
                <input type="text" class="form-control " id="kodex" placeholder="No Kartu">
                </div>
            </div>
          </section><!-- /.content -->
            <section class="invoice" id="panel">
              <div class="row"  id="dataDriver" >
              </div>
            </section>



          <section class="content-header" >
          <div class="row">
           <div class="col-md-12">
            <div class="modal fade" id="addModalcetak" tabindex="" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="addModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn btn-success" id="btnPrint" >Cetak</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                      </div>
                      <div class="modal-body" >
                      <div class="row">
                        <div id="printThis" class="printMe">
                        </div>
                      </div>
                      </div>
                
                    </div>
                  </div>
                </div>
              <div class="row"  id="dataLmb" >
              </div>
           </div>
         </div>


        

        </section>

        

        </div><!-- /.container -->

           


      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
          </div>
          <strong>Copyright &copy; Perum <a href="http://damri.co.id">DAMRI</a>.</strong> 
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <?= $this->load->view('basic_js'); ?>
    <script type="text/javascript">
      $(document).ready(function(){
          $(this).find('#kode').focus();
           $("#panel").hide();
          
      });

     $(document).ready(function(){
      
        $(document).on('click', '#btnCetak', function(){
          $.ajax({
          type: "POST", 
          url: "<?= base_url() ?>vm/cetakLmb", 
          data: {
            kode  : $('#kodelmb1').val(),
            kode1  : $('#kodelmb2').val(),
            }, 
          dataType: "json",
          beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
          },
          success: function(response){ 
          $("#printThis").html(response.data).show();
          $('#addModalcetak').modal('show');
          //$('#addModalresult').modal('hide');
          },
          error: function (xhr, ajaxOptions, thrownError) { 
          alert(thrownError); 
          }
        });


        });

      });



     $(document).ready(function(){
        $(document).on('click', '#refresh', function(){
         window.location.reload();
        });
      });

      $("#kode").change(function(){
        
        $('#kodex').val($('#kode').val());
        relo();
        $('#kode').val('');
        $('#kode').focus();
        

            
      });

      function fokus(){
        setTimeout(function(){ $('#kode').focus();  }, 500);

      }

      function relo(){
        var kode = $("#kodex").val()
        $.ajax({
            type: "POST", 
            url: "<?= base_url() ?>vm/dataDriver", 
            data: {
              kode  : kode,
              }, 
            dataType: "json",
            beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
            },
            success: function(response){ 
            $("#dataDriver").html(response.data).show();
            $("#panel").show();
            $("#dataLmb").html(response.data).hide();
            
            
            $('#kode1').val(kode);
            detailLmb();
            // $(this).find('#kode').focus();
            //$('#addModalimage').modal('show');
            },
            error: function (xhr, ajaxOptions, thrownError) { 
            alert(thrownError); 
            }
          });
      }

       function detailLmb(){
        
        $.ajax({
            type: "POST", 
            url: "<?= base_url() ?>vm/getdataLmb", 
            data: {
              kode  : $('#kodelmb1').val(),
              kode1  : $('#kodelmb2').val(),
              }, 
            dataType: "json",
            beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
            },
            success: function(response){ 
            
            $("#dataLmb").html(response.data).show();
            // $('#kode').val('');
            // $(this).find('#kode').focus();
            $("#panel").show();
            $('#addModalimage').modal('show');
            $('#kode').focus();
            
            },
            error: function (xhr, ajaxOptions, thrownError) { 
             
            alert(thrownError);
            
            }
          });
      }


      function createLmb(id_jadwal){
        
        alertify.confirm(
          'Konfirmasi', 
          'Apa anda yakin akan membuat LMB?', 
          function(){
              var url = '<?=base_url()?>vm/createLmb';
              var data = {
                kode     : id_jadwal,
              };
                  
              $.ajax({
                url: url,
                method: 'POST',
                data: data
              }).done(function(data, textStatus, jqXHR) {
                var data = JSON.parse(data);
                if(data['status'] == "1"){
                
                 // reloadData();
                 detailLmb();
                
                $('#kode').val($('#kodex').val());
                
                alertify.alert("Sukses", "LMB Telah berhasil dibuat! Selamat Bekerja",  function(){
    alertify.message('OK');window.location.reload();});
                 

                
                // relo()
                // $('#kode').val('');
                
                // $('#kode').val('');
                
                 // $(this).find('#kode').focus();
                }else {
                  // alertify.error("Error!");
                   // $('#kode').focus();
                 // relo();
                 
                }
              });
          },
          function(){ }
        );

      }


      

      function reloadData(){
        
        kode  = $('#kode1').val();
        $.ajax({
            type: "POST", 
            url: "<?= base_url() ?>vm/dataDriver", 
            data: {
              kode  : $('#kode1').val(),
              }, 
            dataType: "json",
            beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
            },
            success: function(response){
             
            $("#dataDriver").html(response.data).show();
            // $('#kode').val('');
            $('#kode1').val(kode);
            $(this).find('#kode').focus();
            $("#panel").show();
            detailLmb($('#kodelmb').val());
            $("#dataLmb").html(response.data).hide();
            $('#kode').focus();
            
            },
            error: function (xhr, ajaxOptions, thrownError) {
             
            alert(thrownError); 
            $('#kode').focus();
            
            }
          });
      }



      function checkOut(id_lmb){
        
        alertify.confirm(
          'Konfirmasi', 
          'Apa anda yakin akan menutup LMB?', 
          function(){
              var url = '<?=base_url()?>vm/checkOut';
              var data = {
                kode     : id_lmb,
                id_pool  : $('#id_pool').val(),
              };
                  
              $.ajax({
                url: url,
                method: 'POST',
                data: data
              }).done(function(data, textStatus, jqXHR) {
                var data = JSON.parse(data);
                if(data['status'] == "1"){
                   
                  alertify.alert("Sukses", "LMB Telah ditutup. Terima kasih...",  function(){
                  alertify.message('OK');window.location.reload();});
                  $('#kode').val($('#kodex').val());
                 
                }else {
                  
                  alertify.error("Error!");
                   $('#kode').focus();
                   
                    window.location.reload();
                }
              });
          },
          function(){ }
        );
      }


      function startTime(){
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
        fokus()
      }

      function checkTime(i){
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
      }




      jQuery.fn.extend({
        printElem: function() {
          var cloned = this.clone();
        var printSection = $('#printSection');
        if (printSection.length == 0) {
          printSection = $('<div id="printSection"></div>')
          $('body').append(printSection);
        }
        printSection.append(cloned);
        var toggleBody = $('body *:visible');
        toggleBody.hide();
        $('#printSection, #printSection *').show();
        window.print();
        printSection.remove();
        toggleBody.show();
        }
      });

      $(document).ready(function(){
        $(document).on('click', '#btnPrint', function(){
        $('.printMe').printElem();
        });
      });

      

    </script>


  </body>
</html>
