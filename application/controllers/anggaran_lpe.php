<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class anggaran_lpe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_anggaran_lpe");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_anggaran_lpe->combobox_bu();
                $data['combobox_segment'] = $this->model_anggaran_lpe->combobox_segment();
                $data['combobox_armada'] = $this->model_anggaran_lpe->combobox_armada();
                $data['combobox_trayek'] = $this->model_anggaran_lpe->combobox_trayek();
                
                $this->load->view('anggaran_lpe/index', $data);
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    

    public function ax_data_anggaran_lpe()
    {

        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $tahun = $this->input->post('tahun');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_anggaran_lpe->getAllanggaran_lpe($length, $start, $cari['value'], $id_bu, $tahun)->result_array();
                $count = $this->model_anggaran_lpe->get_count_anggaran_lpe($cari['value'], $id_bu, $tahun);

                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    function ax_get_armada_rinci(){
        $kd_armada = $this->input->post("kd_armada");
        $data = $this->model_anggaran_lpe->getarmadarinci($kd_armada);
        echo json_encode($data);
    }

    function ax_get_trayek_rinci(){
        $kd_trayek = $this->input->post("kd_trayek");
        $data = $this->model_anggaran_lpe->gettrayekrinci($kd_trayek);
        echo json_encode($data);
    }

    public function ax_set_data()
    {

      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {



             $session = $this->session->userdata('login');
             $id_lpe = $this->input->post('id_lpe');

             $data = array(

                'tahun' => $this->input->post('tahun'),
                'id_bu' => $this->input->post('id_bu_filter'),
                'id_perusahaan' => $session['id_perusahaan'],
                'kd_segment' => $this->input->post('id_segment'),
                'kd_armada' => $this->input->post('id_armada'),
                'kd_trayek' => $this->input->post('id_trayek'),
                'hj' => $this->input->post('hj'),
                'rit' => $this->input->post('rit'),
                'km' => $this->input->post('km'),
                'jml_pnp' => $this->input->post('jml_pnp'),
                'pendapatan' => $this->input->post('pendapatan'),
                'lf' => $this->input->post('lf'),
                'cuser' => $session['id_user'],
            );

             if($this->input->post('id_lpe') == 0){
                 $query = $this->model_anggaran_lpe->insert_anggaran_lpe($data);
             }
             else{
                 $query = $this->model_anggaran_lpe->update_anggaran_lpe($data,$id_lpe);
             }

             if($query){
                echo json_encode(array('status' => 'success', 'data' => $query));
            }else{
                echo json_encode(array('status' => 'fail', 'data' => $query));
            }
        } else {
            echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
        }
    } else {
        if ($this->uri->segment(1) != null) {
            $url = $this->uri->segment(1);
            $url = $url.' '.$this->uri->segment(2);
            $url = $url.' '.$this->uri->segment(3);
            redirect('welcome/relogin/?url='.$url.'', 'refresh');
        } else {
            redirect('welcome/relogin', 'refresh');
        }
    }
}

public function ax_unset_data()
{
  if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_lpe = $this->input->post('id_lpe');

                $data = array('id_lpe' => $id_lpe);

                if(!empty($id_lpe))
                 $data['id_lpe'] = $this->model_anggaran_lpe->delete_anggaran_lpe($data);

             echo json_encode(array('status' => 'success', 'data' => $data));

         } else {
            echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
        }
    } else {
        if ($this->uri->segment(1) != null) {
            $url = $this->uri->segment(1);
            $url = $url.' '.$this->uri->segment(2);
            $url = $url.' '.$this->uri->segment(3);
            redirect('welcome/relogin/?url='.$url.'', 'refresh');
        } else {
            redirect('welcome/relogin', 'refresh');
        }
    }
}



public function ax_get_data_by_id()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_lpe = $this->input->post('id_lpe');

              if(empty($id_lpe))
                 $data = array();
             else
                 $data = $this->model_anggaran_lpe->get_anggaran_lpe_by_id($id_lpe);

             echo json_encode($data);

         } else {
            echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
        }
    } else {
        if ($this->uri->segment(1) != null) {
            $url = $this->uri->segment(1);
            $url = $url.' '.$this->uri->segment(2);
            $url = $url.' '.$this->uri->segment(3);
            redirect('welcome/relogin/?url='.$url.'', 'refresh');
        } else {
            redirect('welcome/relogin', 'refresh');
        }
    }
}

public function ax_get_trayek(){
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_anggaran_lpe->list_trayek($id_cabang);
                $html = "<option value='0'>--Trayek--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal." - ".$row->nm_point_akhir."</option>"; 
                }
                $callback = array('data_trayek'=>$html);
                echo json_encode($callback);

            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    public function ax_get_armada(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U02";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_anggaran_lpe->list_armada($id_cabang);
                $html = "<option value='0'>--Trayek--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_armada."'>".$row->kd_armada."</option>"; 
                }
                $callback = array('data_armada'=>$html);
                echo json_encode($callback);

            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->segment(1) != null) {
                $url = $this->uri->segment(1);
                $url = $url.' '.$this->uri->segment(2);
                $url = $url.' '.$this->uri->segment(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }


    public function laporan_anggaran_lpe($id_bu,$tahun,$format) {
        $general_manager   = $this->model_anggaran_lpe->general_manager($id_bu);
        $manager_usaha     = $this->model_anggaran_lpe->manager_usaha($id_bu);

        $ref_bu = $this->model_anggaran_lpe->ref_bu($id_bu);
        $cRet ='';
        $cRet .= "
        <table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <tr>
        <td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
        <b>PERUSAHAAN UMUM DAMRI</b><br />
        <b>(PERUM DAMRI)</b><br />
        <b>KANTOR CABANG : ".strtoupper($ref_bu->nm_bu)."<br />
        </td>
        <td width=\"33%\" align=\"center\" style=\"font-size:18px;\">
        <b>LAPORAN HASIL OPERASONAL</b><br />
        <b>TAHUN : ".$tahun."</b><br />

        </td>
        <td width=\"33%\" align=\"right\" style=\"font-size:18px;\">
        <img src=\"".base_url('assets/img/logos.png')."\" alt=\"Perum DAMRI\" height=\"30   \" width=\"150\">
        <br />
        </td>
        </tr>
        </table><br/>
        <table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <tr>
        <td align=\"right\" style=\"font-size:14px;\">
        <b>LP/E</b><br />
        </td>
        </tr>
        </table>
        <table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
        <thead>
        <tr>
        <td colspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">NOMOR</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KODE BUS</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">DAYA MUAT</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">JENIS PLYN</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">TRAYEK YANG DILYN</td>
        <td colspan=\"6\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">R E N C A N A</td>
        <td colspan=\"6\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">R E A L I S A S I</td>
        <td colspan=\"6\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PERSENTASE</td>
        </tr>
        <tr>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">URUT</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">POLISI</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HJ</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-KM</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PENDAPATAN</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HJ</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-KM</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PENDAPATAN</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">HJ</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">KM</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">PNP-KM</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">UPP</td>
        </tr>
        <tr>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">1</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">2</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">3</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">4</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">5</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">6</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">7</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">8</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">9</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">10</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">11</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">12</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">13</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">14</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">15</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">16</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">17</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">18</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">19</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">20</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">21</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">22</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">23</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">24</td>
        </tr>
        </thead>";
        $sql = $this->model_anggaran_lpe->laporan_lpe($id_bu,$tahun);
        $no = 0;
        foreach ($sql->result() as $row){
            $no = $no+1;

            $cRet .="
            <tbody>
            <tr>
            <td style=\"font-size:12px;text-align:center;\">$no</td>
            <td style=\"font-size:12px;text-align:center;\">$row->plat_armada</td>
            <td style=\"font-size:12px;text-align:center;\">$row->kd_armada</td>
            <td style=\"font-size:12px;text-align:center;\">$row->seat_armada</td>
            <td style=\"font-size:12px;text-align:center;\">$row->nm_layanan</td>
            <td style=\"font-size:12px;text-align:center;\">$row->kd_trayek</td>
            <td style=\"font-size:12px;text-align:center;\">$row->hj</td>
            <td style=\"font-size:12px;text-align:center;\">$row->rit</td>
            <td style=\"font-size:12px;text-align:center;\">$row->km</td>
            <td style=\"font-size:12px;text-align:center;\">$row->jml_pnp</td>
            <td style=\"font-size:12px;text-align:center;\">".$row->km*$row->jml_pnp."</td>
            <td style=\"font-size:12px;text-align:center;\">".number_format($row->pendapatan,0,',','.')."</td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            </tbody>";
        } $no++;
        $cRet.="<tfoot>
        <tr>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        </tfoot>
        </table>

        <br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <tr>
        <td width=\"50%\" align=\"left\" style=\"font-size:14px;\">
        <b>MENGETAHUI :</b>
        <b></br>GENERAL MANAGER</b><br /><br /><br /><br /><br />
        <b>".$general_manager['nm_pegawai']."</b></br>".$general_manager['nik_pegawai']."
        </td>
        <td width=\"50%\" align=\"right\" style=\"font-size:14px;\">
        <b>".$ref_bu->kota." , ".tgl_hari_ini()."</b><br />
        <b>MANAGER USAHA</b><br /><br /><br /><br />
        <b>".$manager_usaha['nm_pegawai']."</b></br>".$manager_usaha['nik_pegawai']."
        </td>
        </tr>
        </table><br/>
        ";

        if($format == 0){
            echo $cRet;
        // } else if ($format == 1) {
        //  $this->_mpdf('',$cRet,10,10,10,'L');
        } else {
           $data['prev']= $cRet;
           header("Cache-Control: no-cache, no-store, must-revalidate");
           header("Content-Type: application/vnd.ms-excel");
           header("Content-Disposition: attachment; filename= Anggaran_LPE_".$ref_bu->nm_bu."(".$tahun.").xls");
           $this->load->view('report/excel', $data);
       }
   }

}
