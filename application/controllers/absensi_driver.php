<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class absensi_driver extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_absensi_driver");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_absensi_driver->combobox_bu();
                $data['combobox_segment'] = $this->model_absensi_driver->combobox_segment();
                $data['combobox_armada'] = $this->model_absensi_driver->combobox_armada();
                $data['combobox_trayek'] = $this->model_absensi_driver->combobox_trayek();
                
                $this->load->view('absensi_driver/index', $data);
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

    

    public function ax_data_absensi_driver()
    {

        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $tanggal = $this->input->post('tanggal');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_absensi_driver->getAllabsensi_driver($length, $start, $cari['value'], $id_bu, $tanggal)->result_array();
                $count = $this->model_absensi_driver->get_count_absensi_driver($cari['value'], $id_bu, $tanggal);

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

    public function ax_set_data()
    {

      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {



               $session = $this->session->userdata('login');
               $id_pegawai = $this->input->post('id_pegawai');
               $status = $this->input->post('status');

               if($status=='ijin'){
                $new_status = 'I';
            }elseif($status=='sakit'){
                $new_status = 'S';
            }elseif($status=='cuti'){
                $new_status = 'C';
            }elseif($status=='siapdinas'){
                $new_status = 'SD';
            }elseif($status=='dinas'){
                $new_status = 'D';
            }elseif($status=='libur'){
                $new_status = 'L';
            }

            $data = array(

                'id_pegawai' => $this->input->post('id_pegawai'),
                'id_bu' => $this->input->post('id_cabang'),
                'status' => $new_status,
                'tgl_absensi' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan'),
                'cuser' => $session['id_user'],
            );


            $query = $this->model_absensi_driver->insert_absensi_driver($data);

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
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_pegawai = $this->input->post('id_pegawai');

                $data = array('id_pegawai' => $id_pegawai);

                if(!empty($id_pegawai))
                   $data['id_pegawai'] = $this->model_absensi_driver->delete_absensi_driver($data);

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
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_pegawai = $this->input->post('id_pegawai');
              $id_bu = $this->input->post('id_bu');

              if(empty($id_pegawai))
               $data = array();
           else
               $data = $this->model_absensi_driver->get_absensi_driver_by_id($id_pegawai,$id_bu);

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
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_absensi_driver->list_trayek($id_cabang);
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
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_absensi_driver->list_armada($id_cabang);
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

    public function ax_copy_absensi_driver()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username   = $session['username'];
                $id_cabang  = $this->input->post('id_cabang');
                $tanggal_from  = $this->input->post('tanggal_from');
                $tanggal_to    = $this->input->post('tanggal_to');

                $data = array(
                    'id_cabang' => $id_cabang,
                    'tanggal'   => $tanggal_from,
                    'tanggal_to' => $tanggal_to,
                );

                $status = $this->model_absensi_driver->copyAbsensiDriver($id_cabang,$tanggal_from,$tanggal_to);
                echo json_encode(array('status' => 'success', 'tanggal_to' => $tanggal_to));

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

    public function ax_unset_data_all_absent()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U03";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $tanggal = $this->input->post('tanggal');
                
                $status = $this->db->delete('tr_absensi_driver', array('tgl_absensi' => $tanggal,'id_bu' => $id_bu));
                echo json_encode(array('status' => $status));

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

    function laporan_absen_pengemudi($id_cabang,$bulan,$tahun,$format) {
        $session = $this->session->userdata('login');
        $pejabat_2 = $this->model_absensi_driver->get_pejabat("nm_pegawai","hris.ref_pegawai","id_posisi",4,$id_cabang);
        $pejabat_3 = $this->model_absensi_driver->get_pejabat("nm_pegawai","hris.ref_pegawai","id_posisi",5,$id_cabang);
        $nama_cabang = $this->model_absensi_driver->get_info("UPPER(nm_bu)","ref_bu","id_bu",$id_cabang);

        $general_manager   = $this->model_absensi_driver->general_manager($id_cabang);
        $manager_usaha     = $this->model_absensi_driver->manager_usaha($id_cabang);

        $data_cabang=$this->model_absensi_driver->get_cabang($id_cabang);
        $cRet ='';
        $cRet .= "
        <table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <tr>
        <td align=\"center\" style=\"font-size:18px;\">
        <b>ABSENSI PENGEMUDI</b><br/>
        <b>CABANG : $nama_cabang</b>
        </td>
        </tr><br />
        </table>
        <br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <td align=\"left\" style=\"font-size:14px;\">
        <b>Bulan    : ".bulan($bulan)." $tahun</b>
        </td>
        </table>
        <table style=\"border-collapse:collapse;\" border=\"1\" width=\"100%\">
        <thead>
        <tr>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">No</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Nama</td>
        <td colspan=\"31\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Tanggal</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Total</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Masuk</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Libur</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Izin</td>
        <td rowspan=\"2\" style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">Keterangan</td>
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
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">25</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">26</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">27</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">28</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">29</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">30</td>
        <td style=\"font-size:12px;text-align:center;background-color:#d5d5e3;\">31</td>
        </tr>
        </thead>";
        $sql = $this->model_absensi_driver->absensi_pengemudi($id_cabang,$bulan,$tahun);
        $no = 0;
        $total_masuk = $total_libur = $total_izin = 0;
        foreach ($sql as $row){
            $no = $no+1;

            $cRet .="
            <tbody>
            <tr>
            <td style=\"font-size:12px;text-align:center;\">$no</td>
            <td style=\"font-size:12px;text-align:center;\">$row->nm_pegawai</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl1</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl2</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl3</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl4</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl5</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl6</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl7</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl8</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl9</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl10</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl11</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl12</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl13</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl14</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl15</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl16</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl17</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl18</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl19</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl20</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl21</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl22</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl23</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl24</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl25</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl26</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl27</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl28</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl29</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl30</td>
            <td style=\"font-size:12px;text-align:center;\">$row->tgl31</td>
            <td style=\"font-size:12px;text-align:center;\">$row->total_hari</td>
            <td style=\"font-size:12px;text-align:center;\">$row->masuk</td>
            <td style=\"font-size:12px;text-align:center;\">$row->libur</td>
            <td style=\"font-size:12px;text-align:center;\">$row->izin</td>
            <td style=\"font-size:12px;text-align:center;\"></td>
            </tbody>";
        $total_masuk += $row->masuk;
        $total_libur += $row->libur;
        $total_izin += $row->izin;
        } $no++;
        $cRet.="<tfoot>
        <tr>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:center;\"><b>TOTAL</b></td>
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
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        <td style=\"font-size:12px;text-align:center;\"><b>$total_masuk</b></td>
        <td style=\"font-size:12px;text-align:center;\"><b>$total_libur</b></td>
        <td style=\"font-size:12px;text-align:center;\"><b>$total_izin</b></td>
        <td style=\"font-size:12px;text-align:right;\"></td>
        </tfoot>
        </table>
        <div style=\"height:5px;\"></div>
        <table style=\"border-collapse:collapse;\" width=\"50%\" align=\"left\" border=\"0\">
        <tr><td width=\"20%\" style=\"font-size:10px;\"><small>Keterangan</small></td></tr>
        <tr><td style=\"font-size:10px;\"><small>
        <ul>
        <li>I : Ijin</li>
        <li>S : Sakit</li>
        <li>C : Cuti</li>
        <li>D : Dinas</li>
        <li>SD : Siap Dinas</li>
        <li>L : Libur</li>
        </ul>
        </small></td></tr>
        </table>

        <br /><table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\">
        <tr>
        <td width=\"33%\" align=\"center\" style=\"font-size:14px;\">
        <b>Menyetujui</b><br />
        <b>General Manager</b><br /><br /><br /><br />
        <b><u>".strtoupper($general_manager['nm_pegawai'])."</u></b><br />
        NIK. ".$general_manager['nik_pegawai']."
        </td>
        <td width=\"33%\" align=\"center\" style=\"font-size:14px;\">
        <b>Mengetahui</b><br />
        <b>".$manager_usaha['posisi']."</b><br /><br /><br /><br />
        <b><u>".strtoupper($manager_usaha['nm_pegawai'])."</u></b><br />
        NIK. ".$manager_usaha['nik_pegawai']."
        </td>
        <td width=\"33%\" align=\"center\" style=\"font-size:14px;\">
        <b>".$data_cabang->kota.", ".tgl_indo(date('Y-m-d'))."</b><br />
        <b>Pembuat Daftar</b><br /><br /><br /><br />
        <b><u>".strtoupper($session['nm_user'])."</u></b><br />
        NIK. ".$session['username']."
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
          header("Content-Disposition: attachment; filename= Absensi_Driver_(".bulan($bulan)." ".$tahun.").xls");
          $this->load->view('report/excel', $data);
      }
  }

}
