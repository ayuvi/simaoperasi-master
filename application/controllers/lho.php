<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class lho extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lho");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_lho->combobox_bu();
                $this->load->view('lho/index', $data);
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->lho(1) != null) {
                $url = $this->uri->lho(1);
                $url = $url.' '.$this->uri->lho(2);
                $url = $url.' '.$this->uri->lho(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    

    public function ax_data_lho()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);

                $id_cabang = $this->input->post('id_cabang');
                $kd_trayek = $this->input->post('kd_trayek');
                $tanggal = $this->input->post('tanggal');

                $data = $this->model_lho->getAlllho($length, $start, $cari['value'],$id_cabang,$kd_trayek,$tanggal)->result_array();
                $count = $this->model_lho->get_count_lho($cari['value'],$id_cabang,$kd_trayek,$tanggal);

                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
            } else {
                echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
            }
        } else {
            if ($this->uri->lho(1) != null) {
                $url = $this->uri->lho(1);
                $url = $url.' '.$this->uri->lho(2);
                $url = $url.' '.$this->uri->lho(3);
                redirect('welcome/relogin/?url='.$url.'', 'refresh');
            } else {
                redirect('welcome/relogin', 'refresh');
            }
        }
    }

    public function ax_set_data()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_lho = $this->input->post('id_lho');
                $kd_lho = $this->input->post('kd_lho');
                $nm_lho = $this->input->post('nm_lho');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');
                $data = array(
                    'id_lho' => $id_lho,
                    'kd_lho' => $kd_lho,
                    'nm_lho' => $nm_lho,
                    'active' => $active,
                    'id_perusahaan' => $session['id_perusahaan']
                );

                if(empty($id_lho))
                   $data['id_lho'] = $this->model_lho->insert_lho($data);
               else
                   $data['id_lho'] = $this->model_lho->update_lho($data);

               echo json_encode(array('status' => 'success', 'data' => $data));

           } else {
            echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
        }
    } else {
        if ($this->uri->lho(1) != null) {
            $url = $this->uri->lho(1);
            $url = $url.' '.$this->uri->lho(2);
            $url = $url.' '.$this->uri->lho(3);
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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_lho = $this->input->post('id_lho');

                $data = array('id_lho' => $id_lho);

                if(!empty($id_lho))
                   $data['id_lho'] = $this->model_lho->delete_lho($data);

               echo json_encode(array('status' => 'success', 'data' => $data));

           } else {
            echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
        }
    } else {
        if ($this->uri->lho(1) != null) {
            $url = $this->uri->lho(1);
            $url = $url.' '.$this->uri->lho(2);
            $url = $url.' '.$this->uri->lho(3);
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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_lho = $this->input->post('id_lho');

              if(empty($id_lho))
               $data = array();
           else
               $data = $this->model_lho->get_lho_by_id($id_lho);

           echo json_encode($data);

       } else {
        echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";
    }
} else {
    if ($this->uri->lho(1) != null) {
        $url = $this->uri->lho(1);
        $url = $url.' '.$this->uri->lho(2);
        $url = $url.' '.$this->uri->lho(3);
        redirect('welcome/relogin/?url='.$url.'', 'refresh');
    } else {
        redirect('welcome/relogin', 'refresh');
    }
}
}

public function ax_get_trayek(){
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_lho->list_trayek($id_cabang);
                $html = "<option value='0'>--All Trayek--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal."</option>"; 
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

    function laporan_lho($id_cabang,$kd_trayek,$tanggal,$format) {

        // $data_cabang=$this->model_lho->getAlllho($id_cabang,$kd_trayek,$tanggal);
        $general_manager= $this->model_lho->general_manager($id_cabang);
        $asmen_pelayan_jasa= $this->model_lho->asmen_pelayan_jasa($id_cabang);
        $data_cabang=$this->model_lho->get_cabang($id_cabang);

        $cRet ='';
        $cRet .= "
        <table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <tr>
        <td colspan=\"6\" align=\"center\" style=\"font-size:18px;\">
        <b>LAPORAN REALISASI OPERASI PERUM DAMRI KANTOR CABANG ".strtoupper($data_cabang->nm_bu)."</b>
        </td>
        </tr><br />
        </table>
        <br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <td align=\"left\" style=\"font-size:14px;\">
        <b>Tanggal    : ".tgl_indo($tanggal)."</b>
        </td>
        </table>
        <table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
        <thead>
        <tr>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">No</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Trayek</td>
        <td colspan=\"4\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Keterangan</td>
        </tr>
        <tr>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">RIT</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Penumpang</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Harga</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Total</td>
        </tr>
        </thead>";
        $sql = $this->model_lho->print_laporan_lho($id_cabang,$kd_trayek,$tanggal);
        $no = 0;
        $total_all_penumpang=0;
        $total_all_pendapatan=0;
        foreach ($sql->result() as $row){
            $total_all_penumpang += $row->penumpang;
            $total_all_pendapatan += $row->total_pendapatan;
            $no = $no+1;

            $cRet .="
            <tbody>
            <tr>
            <td style=\"font-size:12px;text-align:center;\">$no</td>
            <td style=\"font-size:12px;text-align:left;\">$row->nm_point_awal</td>
            <td style=\"font-size:12px;text-align:center;\">$row->jumlah_rit</td>
            <td style=\"font-size:12px;text-align:center;\">".number_format($row->penumpang,0,",",".")."</td>
            <td style=\"font-size:12px;text-align:center;\">".number_format($row->harga,0,",",".")."</td>
            <td style=\"font-size:12px;text-align:right;\">".number_format($row->total_pendapatan,0,",",".")."</td>
            </tbody>";
        } $no++;
        $cRet.="<tfoot>
        <tr>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:center;\"><b>TOTAL</b></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:center;\">".number_format($total_all_penumpang,0,",",".")."</td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\">Rp. ".number_format($total_all_pendapatan,0,",",".")."</td>
        </tfoot>
        </table>

        <br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <tr>
        <td width=\"33%\" align=\"center\" style=\"font-size:14px;\">
        <b>Menyetujui</b><br />
        <b>General Manager</b><br /><br />
        <b>".strtoupper($general_manager)."</b>
        </td>
        <td width=\"33%\" align=\"center\" style=\"font-size:14px;\">
        <b>Mengetahui</b><br />
        <b>Manager Usaha</b><br /><br />
        <b>(....................................)</b>
        </td>
        <td width=\"33%\" align=\"center\" style=\"font-size:14px;\">
        <b>".$data_cabang->kota.", ".tgl_indo(date('Y-m-d'))."</b><br />
        <b>Asmen Pelayanan Jasa</b><br /><br />
        <b>".strtoupper($asmen_pelayan_jasa)."</b>
        </td>
        </tr>
        </table><br/>
        ";

        if($format==0){
            echo $cRet;
        // }elseif ($format == 1) {
        //   $this->_mpdf('',$cRet,10,10,10,'L');
        }else{
          $data['prev']= $cRet;
          header("Cache-Control: no-cache, no-store, must-revalidate");
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename= LHO_".$data_cabang->nm_bu."(".bulan($tanggal).").xls");
          $this->load->view('report/excel', $data);
      }
  }

}
