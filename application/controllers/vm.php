<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class vm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model("model_vm");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index(){
      $id = $this->uri->segment(3);
      $data['id_pool']      = $id;
      $data['nm_pool']      = $this->model_vm->datapool($id);
      $data['nm_cabang']    = $this->model_vm->datacabang($id);
      $this->load->view('vm/index',$data);
    }

    public function dataDriver(){
        $isi ="";
        $kode = $this->input->post('kode');
        $data = $this->model_vm->get_driver($kode);
        if($data=='0'){
             $isi .= "
                <section class='content-header text-center'>
                    <h1>DATA TIDAK DITEMUKAN</h1>
                </section>
                ";
        }else{
           $nama        =  $data->row("nm_driver");
           $id_driver  =  $data->row("id_driver");
           $data2 = $this->model_vm->getJadwal($id_driver);

           $isi .= "<section class='content-header text-center'>
                            <h1>Selamat Datang ".$nama." </h1>
                            <br>
                    </section>";

            if($data2=='0'){
                     $isi .= "<section class='content-header text-center'>
                            <h2>Anda Belum Mendapatkan Jadwal</h2>
                    </section>";
            }else{
              foreach ($data2->result() as $row) {
                $nm_trayek = $row->nm_trayek;
                $armada = $row->armada;
                $jenis = $row->jns;
                if ($jenis =='1'){
                    $back='bg-red';
                    $isi .="<div class='row'>
                    <div class='col-md-12 center'>
                    <div class='col-md-4 col-sm-6 col-xs-12' onClick=detailLmb('$row->id_lmb')>
                          <div class='info-box $back'>
                            <span class='info-box-icon'><i class='fa fa-bus'></i></span>
                            <div class='info-box-content'>
                              <span class='info-box-text font-weight-bold'>Kode Bis: $armada</span>
                              <span class='info-box-number'>$nm_trayek</span>
                              <input type='text' class='form-control  input-hide' id='kodelmb1' placeholder='Kode' value='$row->id_lmb'>
                            </div>
                          </div>
                    </div>
                    <div class='col-md-4 col-sm-6 col-xs-12' onClick=checkOut('$row->id_lmb')>
                          <div class='info-box $back'>
                          <span class='info-box-icon'><i class='fa fa-power-off'></i></span>
                            <div class='info-box-content'>
                              <span class='info-box-number'>CHECK OUT</span>
                            </div>
                          </div>
                    </div>
                    </div>
                    </div>";  
               }else {
                    $back='bg-green';
                    $isi .="<div class='row'>
                    <div class='col-md-12 center'>
                    <div class='col-md-4 col-sm-6 col-xs-12' onClick=createLmb('$row->id_jadwal')>
                          <div class='info-box $back'>
                            <span class='info-box-icon'><i class='fa fa-bus'></i></span>
                            <div class='info-box-content'>
                              <span class='info-box-text font-weight-bold'>Kode Bis: $armada</span>
                              <span class='info-box-number'>$nm_trayek</span>
                              <input type='text' class='form-control  input-hide' id='kodelmb2' placeholder='Kode' value='0'>
                            </div>
                          </div>
                    </div>
                    <div class='col-md-4 col-sm-6 col-xs-12' onClick=createLmb('$row->id_jadwal')>
                          <div class='info-box $back'>
                          <span class='info-box-icon'><i class='fa  fa-youtube-play'></i></span>
                           <div class='info-box-content'>
                              <span class='info-box-number'>CHECK IN <br>$row->tanggal</span>
                            </div>
                          </div>
                    </div>

                    </div>
                    </div>";  
               }
                }
            }
        }
        $callback = array('data'=>$isi);
        echo json_encode($callback);
    }

     public function getdataLmb(){
        $isi ="";
        $kode = $this->input->post('kode');
        $kode1 = $this->input->post('kode1');
        $data = $this->model_vm->getdataLmb($kode,$kode1);
        $tot  = $this->model_vm->gettotalLmb($kode,$kode1);
       // echo json_encode($tot);
        $totPnp     =  $tot->row("pnp");
        $totTotal     =  $tot->row("total");
        $isi .= "<div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Detail LMB : #".$kode."</h3></br>
                  <div class='row'>
                      <div class='col-md-6'>
                       <h3 class='box-title'>Penumpang : $totPnp </h3> </br>
                      </div>
                      <div class='col-md-6'>
                      <!-- <button type='button' class='btn bg-navy  btn-flat waves-effect' id='btnCetak'> <i class='fa fa-print'></i> Cetak LMB</button> -->
                      </div>
                  </div>
                 
                  <h3 class='box-title'>Total : ".number_format($totTotal)."</h3>
                </div>
                <div class='box-body no-padding'>
                  <table class='table table-striped'>
                    <tbody><tr>
                      <th style='width: 10px'>Rit</th>
                      <th>Trayek</th>
                      <th>Tipe</th>
                      <th>Penumpang</th>
                      <th>Harga</th>
                      <th>Total</th>
                    </tr>";
        $no = 0;
        foreach ($data->result() as $row) {
         $rit = $row->rit;
         $pnp = $row->pnp;   
         $kd_trayek = $row->kd_trayek;   
         $type = $row->type_rit;   
         $harga = $row->harga;   
         $total = $row->total;   
        $no = $no+1;
        if($type=='1'){
           $isi    .="<tr bgcolor='#c2ffdd'>
                      <td>$rit</td>
                      <td>$kd_trayek</td>
                      <td>Reguler</td>
                      <td>$pnp</td>
                      <td>".number_format($harga)."</td>
                      <td>".number_format($total)."</td>
                    </tr>
                    ";
            
        }else if($type=='2'){
           $isi    .="<tr>
                      <td>$rit</td>
                      <td>$kd_trayek</td>
                      <td>Tambahan</td>
                      <td>$pnp</td>
                      <td>".number_format($harga)."</td>
                      <td>".number_format($total)."</td>
                    </tr>
                    ";
        }else{
           $isi    .="<tr>
                      <td>$rit</td>
                      <td>$kd_trayek</td>
                      <td>Gratis</td>
                      <td>$pnp</td>
                      <td>".number_format($harga)."</td>
                      <td>".number_format($total)."</td>
                    </tr>
                    ";
        }
       
      }
            $isi    .="</tbody></table>
                </div>
              </div>";
        $callback = array('data'=>$isi);
        echo json_encode($callback);

    }

   public function createLmb(){
        $id_jadwal  = $this->input->post('kode');
        $data       = $this->model_vm->createLmb($id_jadwal);
        echo json_encode(array('status' => $data));
    }

    public function checkOut(){
        $id_lmb  = $this->input->post('kode');
        $id_pool  = $this->input->post('id_pool');
        $data    = $this->model_vm->checkOut($id_lmb,$id_pool);
        echo json_encode(array('status' => $data));
    }

    public function cetakLmb(){
            $id_lmb1 = $this->input->post('kode');
            $id_lmb2 = $this->input->post('kode1');
            $isi = "";
            $qry = "SELECT * FROM tr_rit WHERE id_lmb IN ('$id_lmb1','$id_lmb2') AND type_rit !='3'";
            $isi   .= "<table  width='100%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='0' >   
                        <tr>
                            <td align='center' valign='center'> 
                            <span style='font-size:21px;font-weight:bold;valign:center'> D A M R I</span>
                            </td>
                        </tr>
                    </table>
                    <table  width='90%' cellspacing='0' cellpadding='0' style='font-family:verdana;' border='1' align='center'>
                    <tr>
                    <td align='center' valign='center' bgcolor='#c9c9c9'>RIT</td>
                    <td align='center' valign='center' bgcolor='#c9c9c9'>TRAYEK</td>
                    <td align='center' valign='center' bgcolor='#c9c9c9'>PNP</td>
                    <td align='center' valign='center' bgcolor='#c9c9c9'>Harga</td>
                    <td align='center' valign='center' bgcolor='#c9c9c9'>Total</td>
                    <tr>";
             $sql_kursi = $this->db->query($qry);
             $data_kursi = $sql_kursi->result_array();
             $tot = $totpnp = $totharga =0;
             foreach($data_kursi as $data){
             extract($data);
             $tot=$tot+$total;
             $totpnp=$totpnp+$pnp;
             $totharga=$totharga+$harga;
                $isi    .="
                     <tr>
                    <td align='center'>".$rit."</td>
                    <td align='center'>".$kd_trayek."</td>
                    <td align='center'>".$pnp."</td>
                    <td align='right'>".number_format($harga)."</td>
                    <td align='right'>".number_format($total)."</td>
                    <tr>
                ";
               }
            $isi    .="
                    <tr>
                        <td bgcolor='#c9c9c9' colspan='2'></td>
                        <td bgcolor='#c9c9c9' align='center'>".$totpnp."</td>
                        <td bgcolor='#c9c9c9' align='right'></td>
                        <td bgcolor='#c9c9c9' align='right'>".number_format($tot)."</td>
                    <tr>
                </table>
                ";
           
            $callback = array('data'=>$isi);
            echo json_encode($callback);
    }




    
}
