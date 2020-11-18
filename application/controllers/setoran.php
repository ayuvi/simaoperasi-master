<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class setoran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_setoran");
        $this->load->model("model_menu");
        $this->load->model("model_jadwal");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
    
    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level']      = $session['id_level'];
                $data['combobox_bu']        = $this->model_setoran->combobox_bu();
                $data['combobox_segmen']    = $this->model_jadwal->combobox_segmen();
                
                $this->load->view('setoran/index', $data);
                $this->load->view('setoran/pertelaan', $data);
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


    public function setoran_koridor()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level']      = $session['id_level'];
                $data['combobox_bu']        = $this->model_setoran->combobox_bu();
                $data['combobox_segmen']    = $this->model_jadwal->combobox_segmen();
                
                $this->load->view('setoran/setoran_koridor', $data);
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

    
    public function ax_data_setoran()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $active = $this->input->post('active');
                $id_bu = $this->input->post('id_bu');
                $id_pool = $this->input->post('id_pool');
                $tanggal = $this->input->post('tanggal');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran->getAllsetoran($length, $start, $cari['value'], $id_bu,$id_pool,$tanggal, $active)->result_array();
                $count = $this->model_setoran->get_count_setoran($cari['value'], $id_bu,$id_pool,$tanggal, $active);
                
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
    
    function ax_data_setoran_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran->getAllsetoran_detail($length, $start, $cari['value'], $id_setoran)->result_array();
                $count = $this->model_setoran->get_count_setoran_detail($cari['value'], $id_setoran);
                
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
    
    function ax_data_setoran_detail_pnp()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran');
                $id_setoran_detail = $this->input->post('id_setoran_detail');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran->getAllsetoran_detail_pnp($length, $start, $cari['value'], $id_setoran,$id_setoran_detail)->result_array();
                $count = $this->model_setoran->get_count_setoran_detail_pnp($cari['value'], $id_setoran,$id_setoran_detail);

                $count_all = $this->db->query("SELECT COALESCE(SUM(jumlah),0) as jum,COALESCE(SUM(bagasi_pnp),0) as bagasi,COALESCE(SUM(total),0) as tot from ref_setoran_detail_pnp where id_setoran_detail='$id_setoran_detail'");

                $penumpang = $count_all->row("jum");
                $bagasi = $count_all->row("bagasi");
                $total = $count_all->row("tot");

                
                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data,'penumpang' => $penumpang,'bagasi' => $bagasi,'total' => $total,));
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

    function ax_data_setoran_detail_pnp_pertelaan()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_pnp = $this->input->post('id_setoran_pnp');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran->getAllsetoran_detail_pnp_pertelaan($length, $start, $cari['value'], $id_setoran_pnp)->result_array();
                $count = $this->model_setoran->get_count_setoran_detail_pnp_pertelaan($cari['value'], $id_setoran_pnp);
                
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
    
    
    function ax_data_setoran_detail_pend()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran');
                $id_setoran_detail = $this->input->post('id_setoran_detail');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran->getAllsetoran_detail_pend($length, $start, $cari['value'], $id_setoran,$id_setoran_detail)->result_array();
                $count = $this->model_setoran->get_count_setoran_detail_pend($cari['value'], $id_setoran,$id_setoran_detail);

                $count_all = $this->db->query("SELECT COALESCE(SUM(total),0) as tot from ref_setoran_detail_pend where id_setoran_detail='$id_setoran_detail'");
                $total = $count_all->row("tot");
                
                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data, 'total' => $total));
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
    
    function ax_data_setoran_detail_beban()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran');
                $id_setoran_detail = $this->input->post('id_setoran_detail');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran->getAllsetoran_detail_beban($length, $start, $cari['value'], $id_setoran,$id_setoran_detail)->result_array();
                $count = $this->model_setoran->get_count_setoran_detail_beban($cari['value'], $id_setoran,$id_setoran_detail);

                $count_all = $this->db->query("SELECT COALESCE(SUM(total),0) as tot from ref_setoran_detail_beban where id_setoran_detail='$id_setoran_detail'");
                $total = $count_all->row("tot");
                
                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data, 'total' => $total));
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
    
    
    public function ax_set_data_header()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran = $this->input->post('id_setoran');
                $armada = $this->input->post('armada');
                $tanggal = $this->input->post('tanggal');
                $id_bu = $this->input->post('id_bu');
                $id_pool = $this->input->post('id_pool');
                
                $session = $this->session->userdata('login');
                $data = array(
                    'id_setoran' => $id_setoran,
                    'armada' => $armada,
                    'tgl_setoran' => $tanggal,
                    'id_bu' => $id_bu,
                    'id_pool' => $id_pool,
                    'id_user' => $session['id_user'],
                    );
                
                if($id_setoran == 0){
                    $status = $this->model_setoran->insert_setoran($data);
                }else{
                    $status = $this->model_setoran->update_setoran($data);
                }
                
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
    
    public function ax_set_data_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran_header');
                $id_setoran_detail = $this->input->post('id_setoran_detail');
                $id_jadwal = $this->input->post('id_jadwal');
                $armada = $this->input->post('armada');
                $tanggal = $this->input->post('tanggal');
                $kd_segmen = $this->input->post('kd_segmen');
                $kd_trayek = $this->input->post('kd_trayek');
                $driver1 = $this->input->post('driver1');
                $driver2 = $this->input->post('driver2');
                $id_layanan = $this->input->post('id_layanan');
                
                $session = $this->session->userdata('login');
                $data = array(
                    'id_setoran' => $id_setoran,
                    'id_jadwal' => $id_jadwal,
                    'id_setoran_detail' => $id_setoran_detail,
                    'tanggal'   => $tanggal,
                    'armada'    => $armada,
                    'kd_segmen' => $kd_segmen,
                    'kd_trayek' => $kd_trayek,
                    'driver1'   => $driver1,
                    'driver2'    => $driver2,
                    'id_layanan' => $id_layanan,
                    'id_user'   => $session['id_user'],
                    );
                
                if($id_setoran_detail == 0){

                    $status = $this->model_setoran->insert_setoran_detail($data);
                }
                else{
                    $status = $this->model_setoran->update_setoran_detail($data);
                }
                
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
    
    public function ax_set_data_detail_pnp()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran             = $this->input->post('id_setoran_header');
                $id_setoran_detail      = $this->input->post('id_setoran_detail');
                $id_setoran_detail_pnp  = $this->input->post('id_setoran_detail_pnp');
                $armada                 = $this->input->post('armada');
                $tanggal                = $this->input->post('tanggal');
                $kd_trayek              = $this->input->post('kd_trayek');
                $jumlah                 = $this->input->post('jumlah_pnp');
                $harga                  = $this->input->post('harga_pnp');
                $rit                    = $this->input->post('rit_pnp');
                $bagasi_pnp             = $this->input->post('bagasi_pnp');
                $jenis_penjualan_pnp    = $this->input->post('jenis_penjualan_pnp');
                $mata_uang              = $this->input->post('mata_uang');
                $km_trayek              = $this->input->post('km_trayek');

                $dataArr = explode("-",$this->input->post('kd_trayek'));
                
                $session = $this->session->userdata('login');
                $data = array(
                    'id_setoran_pnp' => $id_setoran_detail_pnp,
                    'id_setoran' => $id_setoran,
                    'id_setoran_detail' => $id_setoran_detail,
                    'tanggal'   => $tanggal,
                    'armada'    => $armada,
                    'kd_trayek' => $kd_trayek,
                    'asal'      => $dataArr[0],
                    'tujuan'    => $dataArr[1],
                    'jumlah'    => $jumlah,
                    'harga'     => $harga,
                    'rit'       => $rit,
                    'bagasi_pnp'=> $bagasi_pnp,
                    'jenis_penjualan_pnp' => $jenis_penjualan_pnp,
                    'mata_uang' => $mata_uang,
                    'km_trayek' => $km_trayek?$km_trayek:0,
                    'id_user'   => $session['id_user'],
                    );

                $data_shuttle = array(
                    'id_setoran_pnp' => $id_setoran_detail_pnp,
                    'id_setoran' => $id_setoran,
                    'id_setoran_detail' => $id_setoran_detail,
                    'tanggal'   => $tanggal,
                    'armada'    => $armada,
                    'kd_trayek' => $kd_trayek,
                    'asal'      => $dataArr[0],
                    'tujuan'    => $dataArr[1],
                    'jumlah'    => $jumlah,
                    'harga'     => 0,
                    'total'     => $harga,
                    'rit'       => $rit,
                    'bagasi_pnp'=> $bagasi_pnp,
                    'jenis_penjualan_pnp' => $jenis_penjualan_pnp,
                    'mata_uang' => $mata_uang,
                    'km_trayek' => $km_trayek?$km_trayek:0,
                    'id_user'   => $session['id_user'],
                    );
                
                if($id_setoran_detail_pnp == 0){
                    if($jenis_penjualan_pnp !=7){
                        $data['id_setoran_pnp'] = $this->model_setoran->insert_setoran_detail_pnp($data);
                    }else{
                        $data['id_setoran_pnp'] = $this->model_setoran->insert_setoran_detail_pnp($data_shuttle);
                    }
                }
                else{
                    $status = $this->model_setoran->update_setoran_detail_pnp($data);
                }

                // $jmlkoli        = $this->input->post('jmlkoli');
                // $koli           = $this->input->post('koli');
                // $harga_koli     = $this->input->post('harga_koli');

                // if(!empty($harga_koli)){
                //     $koliarr = explode(",",$koli);
                //     $harga_koliarr = explode(",",$harga_koli);

                //     $data_koli = array(
                //         'koli'          => $koliarr,
                //         'harga_koli'    => $harga_koliarr
                //         );

                //     $h = -1;
                //     foreach($koliarr as $data_koli) {

                //         $h++;
                //         $datah = array(
                //             'id_setoran_pnp' => $data['id_setoran_pnp'],
                //             'koli'          => $koliarr["$h"]?$koliarr["$h"]:0,
                //             'harga_koli'    => $harga_koliarr["$h"]?$harga_koliarr["$h"]:0,
                //             'cuser' => $session['id_user'],
                //             );
                //         $datah['id_setoran_pnp'] = $this->model_setoran->insert_setoran_detail_pnp_bagasi($datah);

                //     }
                // }

                // echo json_encode(array($jmlkoli,$koli,$harga_koli,$mata_uang,$data));
                // exit();

                echo json_encode(array('status' => 1));
                
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
    
    public function ax_set_data_detail_pend()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran             = $this->input->post('id_setoran_header');
                $id_setoran_detail      = $this->input->post('id_setoran_detail');
                $id_setoran_detail_pend = $this->input->post('id_setoran_detail_pend');
                $armada                 = $this->input->post('armada');
                $tanggal                = $this->input->post('tanggal');
                $id_jenis               = $this->input->post('id_jenis');
                $jumlah                 = $this->input->post('jumlah_pend');
                $harga                  = $this->input->post('harga_pend');
                
                $session = $this->session->userdata('login');

                if($id_jenis==6){
                    $data = array(
                        'id_setoran_pend' => $id_setoran_detail_pend,
                        'id_setoran' => $id_setoran,
                        'id_setoran_detail' => $id_setoran_detail,
                        'tanggal'   => $tanggal,
                        'armada'    => $armada,
                        'id_jenis' => $id_jenis,
                        'jumlah'    => $jumlah,
                        'harga'     => $harga,
                        'total'     => $jumlah*$harga,
                        'id_user'   => $session['id_user'],
                        );
                }else{
                    $data = array(
                        'id_setoran_pend' => $id_setoran_detail_pend,
                        'id_setoran' => $id_setoran,
                        'id_setoran_detail' => $id_setoran_detail,
                        'tanggal'   => $tanggal,
                        'armada'    => $armada,
                        'id_jenis' => $id_jenis,
                        'jumlah'    => $jumlah,
                        'harga'     => $harga,
                        'id_user'   => $session['id_user'],
                        );
                }
                
                if($id_setoran_detail_pend == 0){
                    $status = $this->model_setoran->insert_setoran_detail_pend($data);
                }
                else{
                    $status = $this->model_setoran->update_setoran_detail_pend($data);
                }
                
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
    
    
    public function ax_set_data_detail_beban()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran              = $this->input->post('id_setoran_header');
                $id_setoran_detail       = $this->input->post('id_setoran_detail');
                $id_setoran_detail_beban = $this->input->post('id_setoran_detail_beban');
                $armada                  = $this->input->post('armada');
                $tanggal                 = $this->input->post('tanggal');
                $id_jenis                = $this->input->post('id_jenis');
                $jumlah                  = $this->input->post('jumlah_beban');
                $harga                   = $this->input->post('harga_beban');
                $status_jenis_beban      = $this->input->post('status_jenis_beban');
                
                $session = $this->session->userdata('login');

                if($id_jenis==7){
                    $data = array(
                        'id_setoran_beban' => $id_setoran_detail_beban,
                        'id_setoran' => $id_setoran,
                        'id_setoran_detail' => $id_setoran_detail,
                        'tanggal'   => $tanggal,
                        'armada'    => $armada,
                        'id_jenis'  => $id_jenis,
                        'jumlah'    => $jumlah,
                        'harga'     => $harga,
                        'total'     => $this->input->post('total_beban'),
                        'status_jenis_beban' => $status_jenis_beban,
                        'id_user'   => $session['id_user'],
                        );
                }else{
                    $data = array(
                        'id_setoran_beban' => $id_setoran_detail_beban,
                        'id_setoran' => $id_setoran,
                        'id_setoran_detail' => $id_setoran_detail,
                        'tanggal'   => $tanggal,
                        'armada'    => $armada,
                        'id_jenis'  => $id_jenis,
                        'jumlah'    => $jumlah,
                        'harga'     => $harga,
                        'status_jenis_beban' => $status_jenis_beban,
                        'id_user'   => $session['id_user'],
                        );
                }
                
                if($id_setoran_detail_beban == 0){
                    $status = $this->model_setoran->insert_setoran_detail_beban($data);
                }
                else{
                    $status = $this->model_setoran->update_setoran_detail_beban($data);
                }
                
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
    
    
    public function ax_unset_data()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S10";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran = $this->input->post('id_setoran');
                
                $data = array('id_setoran' => $id_setoran);
                
                if(!empty($id_setoran))
                    $status = $this->model_setoran->delete_setoran_pnp($data);
                
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
    
    public function ax_unset_data_setoran_header()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran');
                if(!empty($id_setoran))
                    $status = $this->model_setoran->delete_setoran_header($id_setoran);
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
    
    public function ax_unset_data_setoran_pnp()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran_pnp = $this->input->post('id_setoran_pnp');
                if(!empty($id_setoran_pnp))
                    $status = $this->model_setoran->delete_setoran_pnp($id_setoran_pnp);
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
    
    
    public function ax_unset_data_setoran_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran_detail = $this->input->post('id_setoran_detail');
                if(!empty($id_setoran_detail))
                    $status = $this->model_setoran->delete_setoran_detail($id_setoran_detail);
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
    
    
    public function ax_unset_data_setoran_pend(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran_pend = $this->input->post('id_setoran_pend');
                
                if(!empty($id_setoran_pend))
                    $status = $this->model_setoran->delete_setoran_pend($id_setoran_pend);
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
    
    public function ax_unset_data_setoran_beban(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if(!empty($access['id_menu_details'])){
                $id_setoran_beban = $this->input->post('id_setoran_beban');
                if(!empty($id_setoran_beban))
                    $status = $this->model_setoran->delete_setoran_beban($id_setoran_beban);
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

    public function ax_unset_data_setoran_pertelaan()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran_pnp_prt = $this->input->post('id_setoran_pnp_prt');
                if(!empty($id_setoran_pnp_prt)){
                    $status = $this->db->delete('ref_setoran_detail_pnp_pertelaan', array('id_setoran_pnp_prt' => $id_setoran_pnp_prt)); 
                }
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
    
    
    public function ax_get_data_by_id()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran = $this->input->post('id_setoran');
                
                if(empty($id_setoran))
                    $data = array();
                else
                    $data = $this->model_setoran->get_setoran_by_id($id_setoran);
                
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
    
    function ax_get_jadwal(){
        $id_bu = $this->input->post('id_bu');
        $armada = $this->input->post('armada');
        $data = $this->model_setoran->listJadwal($id_bu,$armada);

        if($id_bu==16){

            $html = "<option value='0'>--Data Bus--</option>";
            foreach ($data->result() as $row) {
                $html .= "<option value='".$row->id_jadwal."'>".$row->tgl_lmb." | ".$row->nm_trayek." | ".$row->kd_trayek." | ".$row->kd_sbu."</option>"; 
            }

        }else{

            $html = "<option value='0'>--Data Bus--</option>";
            foreach ($data->result() as $row) {
                $html .= "<option value='".$row->id_jadwal."'>".$row->tgl_lmb." | ".$row->nm_trayek." | ".$row->kd_trayek."</option>"; 
            }

        }


        


        $callback = array('data_jadwal'=>$html);
        echo json_encode($callback);
    }
    
    function ax_get_jadwal_rinci(){
        $id_jadwal = $this->input->post("id_jadwal");
        $data = $this->model_setoran->getjadwalrinci($id_jadwal)->result_array();
        echo json_encode($data);
    }
    
    function ax_get_trayek(){
        $id_bu = $this->input->post('id_bu');
        $id_trayek = $this->input->post('id_trayek');
        $layanan = $this->input->post('layanan');
        $kd_segmen = $this->input->post('kd_segmen');

        $kd_segmen_arr = array("PEMADUMODA", "BISKOTA", "AGLOMERASI");
        if (in_array($kd_segmen, $kd_segmen_arr)) {
            $this->db->select("a.*");
            $this->db->from("ref_trayek a");
            $this->db->where('a.id_bu', $id_bu);
            $this->db->where('a.kd_segment', $kd_segmen);
            $data = $this->db->get();

            $html = "<option value='0'>--Trayek--</option>";
            foreach ($data->result() as $row) {
                $html .= "<option value='".$row->kd_trayek."~IDR'>".$row->nm_trayek." (IDR - ".$row->harga.")</option>"; 
            }
            $callback = array('data_trayek'=>$html);
            echo json_encode($callback);

        }else{

         $data = $this->model_setoran->listTrayek($id_bu,$id_trayek,$layanan);
         $html = "<option value='0'>--Trayek--</option>";
         foreach ($data->result() as $row) {
            $html .= "<option value='".$row->kd_trayek."~".$row->mata_uang."'>".$row->nm_point_awal." - ".$row->nm_point_akhir." (".$row->mata_uang." - ".$row->harga.")</option>"; 
        }
        $callback = array('data_trayek'=>$html);
        echo json_encode($callback);

    }
}

    function ax_get_trayek_sbu(){
        $id_bu = $this->input->post('id_bu');
        $id_trayek = $this->input->post('id_trayek');
        $layanan = $this->input->post('layanan');
        $kd_segmen = $this->input->post('kd_segmen');

        $kd_segmen_arr = array("PEMADUMODA", "BISKOTA", "AGLOMERASI");
        if (in_array($kd_segmen, $kd_segmen_arr)) {
            $this->db->select("a.*");
            $this->db->from("ref_trayek a");
            $this->db->where('a.id_bu', $id_bu);
            $this->db->where('a.kd_segment', $kd_segmen);
            $data = $this->db->get();

            $html = "<option value='0'>--Trayek--</option>";
            foreach ($data->result() as $row) {
                $html .= "<option value='".$row->kd_trayek."~IDR'>".$row->nm_trayek." (IDR - ".$row->harga.") - ".$row->kd_sbu."</option>"; 
            }
            $callback = array('data_trayek'=>$html);
            echo json_encode($callback);

        }else{

         $data = $this->model_setoran->listTrayek($id_bu,$id_trayek,$layanan);
         $html = "<option value='0'>--Trayek--</option>";
         foreach ($data->result() as $row) {
            $html .= "<option value='".$row->kd_trayek."~".$row->mata_uang."'>".$row->nm_point_awal." - ".$row->nm_point_akhir." (".$row->mata_uang." - ".$row->harga.")</option>"; 
        }
        $callback = array('data_trayek'=>$html);
        echo json_encode($callback);

    }
}

function ax_get_point_trayek(){
    $id_bu = $this->input->post('id_bu');
    $id_trayek = $this->input->post('id_trayek');
    $data = $this->model_setoran->listPointTrayek($id_bu,$id_trayek);
    $html = "<option value='0'>--Trayek--</option>";
    foreach ($data->result() as $row) {
        $html .= "<option value='".$row->point."'>".$row->point."</option>"; 
    }
    $callback = array('data_trayek'=>$html);
    echo json_encode($callback);
}

function ax_get_trayek_harga(){
    $id_bu     = $this->input->post('id_bu');
    $id_trayek = $this->input->post('id_trayek');
    $kd_trayek = $this->input->post('kd_trayek');
    $layanan   = $this->input->post('layanan');
    $mata_uang = $this->input->post('mata_uang');
    $kd_segmen = $this->input->post('kd_segmen');

    $kd_segmen_arr = array("PEMADUMODA", "BISKOTA", "AGLOMERASI");
    if (in_array($kd_segmen, $kd_segmen_arr)) {
        $this->db->from("ref_trayek a");
        $this->db->where('a.id_bu', $id_bu);
        $this->db->where('a.kd_trayek', $kd_trayek);
        $this->db->where('a.kd_segment', $kd_segmen);
        $data = $this->db->get()->row_array();

    }else{
        $data = $this->model_setoran->hargaTrayek($id_bu,$id_trayek,$kd_trayek,$layanan,$mata_uang);
    }
    echo json_encode($data);
}
function ax_get_harga_beban(){
    $id_jenis_beban = $this->input->post('id_jenis_beban');
    $id_bu = $this->input->post('id_bu');
    $data = $this->model_setoran->hargaBeban($id_jenis_beban,$id_bu);
    echo json_encode($data);
}

function ax_get_jenis_pend(){
    $id_bu = $this->input->post('id_bu');
    $data = $this->model_setoran->listJenisPend($id_bu);
    $html = "<option value='0'>--Jenis--</option>";
    foreach ($data->result() as $row) {
        $html .= "<option value='".$row->id_komponen."'>".$row->keterangan."</option>"; 
    }
    $callback = array('data_jenis'=>$html);
    echo json_encode($callback);
}

function ax_get_jenis_beban(){
    $id_bu = $this->input->post('id_bu');
    $data = $this->model_setoran->listJenisBeban($id_bu);
    $html = "<option value='0'>--Jenis--</option>";
    foreach ($data->result() as $row) {
        $html .= "<option value='".$row->id_komponen."'>".$row->nm_komponen."</option>"; 
    }
    $callback = array('data_jenis'=>$html);
    echo json_encode($callback);
}

function ax_get_bu(){
    $id_bu = $this->input->post("id_bu");
    $data = $this->model_setoran->getidbu($id_bu)->result_array();
    echo json_encode($data);
}

public function ax_change_active()
{
    $id = $this->input->post('id_setoran');
    $active = $this->input->post('active');

    $penumpang = $this->model_setoran->sum_penumpang($id)->penumpang;
    $beban = $this->model_setoran->sum_beban($id)->beban;

        // if($penumpang != null && $beban != null){
        // if($beban != null){
    $change_active;
    if ($active==1) {
        $change_active = 2;
    }else if ($active==2) {
        $change_active = 1;
    }
    $data = array(
        'active' => $change_active
        );
    $this->model_setoran->change_active(array('id_setoran' => $id), $data);

    echo json_encode(array("status" => TRUE));
        // }else{
        //     echo json_encode(array("status" => FALSE));
        // }

}

public function ax_change_status_udj()
{
    $id_setoran_detail  = $this->input->post('id_setoran_detail');
    $status_udj         = $this->input->post('status_udj');

    $change_status;
    if($status_udj=='true'){
        $change_status=1;
    }else{
        $change_status=0;
    }

    $data = array(
        'status_udj' => $change_status
        );

    $this->db->update('ref_setoran_detail', $data, array('id_setoran_detail' => $id_setoran_detail));
    echo json_encode(array("status" => TRUE, "change"=>$change_status));
}

public function ax_change_status_udj_bagasi()
{
    $id_setoran_detail  = $this->input->post('id_setoran_detail');
    $status_udj_bagasi         = $this->input->post('status_udj_bagasi');

    $change_status;
    if($status_udj_bagasi=='true'){
        $change_status=1;
    }else{
        $change_status=0;
    }

    $data = array(
        'status_udj_bagasi' => $change_status
        );

    $this->db->update('ref_setoran_detail', $data, array('id_setoran_detail' => $id_setoran_detail));
    echo json_encode(array("status" => TRUE, "change"=>$change_status));
}

public function ax_get_armada()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_cabang = $this->input->post('id_cabang');
                $tanggal = $this->input->post('tanggal');
                $id_pool = $this->input->post('id_pool');
                $data = $this->model_setoran->combobox_armada_($id_cabang);
                $html = "<option value='' disabled selected>--Armada--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_armada."'>".$row->kd_armada."</option>"; 
                }
                
                
                $data1 = $this->model_setoran->combobox_armada_jadwal($id_cabang, $tanggal, $id_pool);
                $html1 = "<option value='' disabled selected>--Armada--</option>";
                foreach ($data1->result() as $row1) {
                    $html1 .= "<option value='".$row1->kd_armada."'>".$row1->kd_armada."</option>"; 
                }
                $callback = array('data_armada'=>$html, 'data_jadwal'=>$html1);
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
    
    public function ax_get_pool()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_setoran->list_pool($id_cabang);
                $html = "<option value='0'>-- Pool --</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->id_pool."'>".$row->nm_pool."</option>"; 
                }
                $callback = array('data_pool'=>$html);
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

    public function ax_get_button_lmb()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                if(empty($id_bu)){
                    $data = 0;
                }
                else{
                    $data = $this->model_setoran->get_button_lmb($id_bu);
                }

                echo json_encode(array("status" => $data));
                
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
    
    public function ax_get_data_api_ticket_old()
    {
        $session = $this->session->userdata('login');
        $data = array(
            'tanggal'=> '2020-02-01',
            'armada'=> '4937'
            // 'tanggal'=> $this->input->post('tanggal'),
            // 'armada'=> $this->input->post('armada')
            );
        $url = 'newtiket.damri.co.id/apps/operasi/dataPenumpang';
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $responseJson = curl_exec( $ch );
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            foreach (json_decode($responseJson)->data as $row){

                $data_array = array(
                    'id_setoran_detail' => $this->input->post('id_setoran_detail'),
                    'id_setoran'        => $this->input->post('id_setoran'),
                    'rit'               => 1,
                    'tanggal'           => $this->input->post('tanggal'),
                    // 'tanggal'           => '2020-02-01',
                    'armada'            => $row->armada,
                    'kd_trayek'         => $row->trayek,
                    'jumlah'            => $row->jumlah,
                    'harga'             => $row->harga,
                    'jenis_penjualan_pnp'=> 1,
                    'id_user'           => $session['id_user']
                    );
                $data_final [] = $data_array;
            }
            $status = $this->db->insert_batch('ref_setoran_detail_pnp', $data_final);
        }
        echo json_encode(array('status' => $responseJson));
    }
    
    public function ax_get_data_api_ticket()
    {
        $session = $this->session->userdata('login');

        $this->db->select("b.id_cabang,a.id_bu, a.nm_bu");
        $this->db->from("ref_bu a");
        $this->db->join("ref_bu_ticketing b", "b.nm_cabang = a.nm_bu","left");
        $this->db->where('a.id_bu', $this->input->post('id_bu'));
        $this->db->limit(1);
        $query = $this->db->get();
        $id_cabang = $query->num_rows()>=1 ? $query->row("id_cabang") : "0";

        $data = array(
            // 'tanggal'=> '2020-02-01',
            // 'armada'=> '4937'
            'tanggal'=> $this->input->post('tanggal'),
            'armada'=> $this->input->post('armada'),
            'id_cabang'=> $id_cabang
            );
        $url = 'newtiket.damri.co.id/apps/operasi/dataPenumpang';
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $responseJson = curl_exec( $ch );
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $id_setoran_detail = $this->input->post('id_setoran_detail');
            $id_setoran        = $this->input->post('id_setoran');
            $tanggal           = $this->input->post('tanggal');
            foreach (json_decode($responseJson)->data as $row){
                $armada     = $row->armada;
                $trayek     = $row->trayek;
                $jumlah     = $row->jumlah;
                $harga      = $row->harga;
                $pend       = $row->pend;
                
                $jum_apps     = $row->jum_apps;        
                $nilai_apps   = $row->nilai_apps;
                $jum_ota      = $row->jum_ota;
                $nilai_ota    = $row->nilai_ota;
                $jum_agen     = $row->jum_agen;
                $nilai_agen   = $row->nilai_agen;
                $jum_loket    = $row->jum_loket;
                $nilai_loket  = $row->nilai_loket;
                $kd_uang       = $row->kd_uang;
                
                $this->insert_eticket($id_setoran_detail,$id_setoran,$tanggal,$armada,$trayek,$jumlah,$harga,$pend,$jum_apps,$nilai_apps,$jum_ota,$nilai_ota,$jum_agen,$nilai_agen,$jum_loket,$nilai_loket,$kd_uang);
            }
        }
        echo json_encode(array('status' => $responseJson));
    }
    
    public function insert_eticket($id_setoran_detail,$id_setoran,$tanggal,$armada,$trayek,$jumlah,$harga,$pend,$jum_apps,$nilai_apps,$jum_ota,$nilai_ota,$jum_agen,$nilai_agen,$jum_loket,$nilai_loket,$kd_uang)
    {
        $exp_trayek = explode("-",$trayek);
        $asal = $exp_trayek[0];
        $tujuan = $exp_trayek[1];

        $session = $this->session->userdata('login');

        if($jum_apps=='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket=='0'){
            $data_array = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jumlah,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array);
        }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket=='0'){
            $data_array = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array);
        }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket=='0'){
            $data_array = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array);
        }else if($jum_apps=='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket=='0'){
            $data_array = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_agen,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 3,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array);
        }else if($jum_apps=='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket!='0'){
            $data_array = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_loket,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 4,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array);
        }else if($jum_apps!='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket=='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
        }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket=='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_agen,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 3,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
        }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket!='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_loket,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 4,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
        }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen!='0' && $jum_loket=='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_agen,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 3,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
        }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket!='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_loket,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 4,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
        }else if($jum_apps=='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket!='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_agen,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 3,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_loket,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 4,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
        }else if($jum_apps!='0' && $jum_ota!='0' && $jum_agen!='0' && $jum_loket=='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_3 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_agen,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 3,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_3);
        }else if($jum_apps!='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket!='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_3 = array(
               'id_setoran_detail' => $id_setoran_detail,
               'id_setoran'        => $id_setoran,
               'rit'               => 1,
               'tanggal'           => $tanggal,
               'armada'            => $armada,
               'kd_trayek'         => $trayek,
               'jumlah'            => $jum_loket,
               'harga'             => $harga,
               'jenis_penjualan_pnp'=> 4,
               'asal'              => $asal,
               'tujuan'            => $tujuan,
               'mata_uang'         => $kd_uang,
               'id_user'           => $session['id_user']
               );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_3);
        }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen!='0' && $jum_loket!='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
               'id_setoran_detail' => $id_setoran_detail,
               'id_setoran'        => $id_setoran,
               'rit'               => 1,
               'tanggal'           => $tanggal,
               'armada'            => $armada,
               'kd_trayek'         => $trayek,
               'jumlah'            => $jum_agen,
               'harga'             => $harga,
               'jenis_penjualan_pnp'=> 3,
               'asal'              => $asal,
               'tujuan'            => $tujuan,
               'mata_uang'         => $kd_uang,
               'id_user'           => $session['id_user']
               );
            $data_array_3 = array(
               'id_setoran_detail' => $id_setoran_detail,
               'id_setoran'        => $id_setoran,
               'rit'               => 1,
               'tanggal'           => $tanggal,
               'armada'            => $armada,
               'kd_trayek'         => $trayek,
               'jumlah'            => $jum_loket,
               'harga'             => $harga,
               'jenis_penjualan_pnp'=> 4,
               'asal'              => $asal,
               'tujuan'            => $tujuan,
               'mata_uang'         => $kd_uang,
               'id_user'           => $session['id_user']
               );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_3);
        }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket!='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
               'id_setoran_detail' => $id_setoran_detail,
               'id_setoran'        => $id_setoran,
               'rit'               => 1,
               'tanggal'           => $tanggal,
               'armada'            => $armada,
               'kd_trayek'         => $trayek,
               'jumlah'            => $jum_agen,
               'harga'             => $harga,
               'jenis_penjualan_pnp'=> 3,
               'asal'              => $asal,
               'tujuan'            => $tujuan,
               'mata_uang'         => $kd_uang,
               'id_user'           => $session['id_user']
               );
            $data_array_3 = array(
               'id_setoran_detail' => $id_setoran_detail,
               'id_setoran'        => $id_setoran,
               'rit'               => 1,
               'tanggal'           => $tanggal,
               'armada'            => $armada,
               'kd_trayek'         => $trayek,
               'jumlah'            => $jum_loket,
               'harga'             => $harga,
               'jenis_penjualan_pnp'=> 4,
               'asal'              => $asal,
               'tujuan'            => $tujuan,
               'mata_uang'         => $kd_uang,
               'id_user'           => $session['id_user']
               );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_3);

        }else if($jum_apps!='0' && $jum_ota!='0' && $jum_agen!='0' && $jum_loket!='0'){
            $data_array_1 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_apps,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 1,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_2 = array(
                'id_setoran_detail' => $id_setoran_detail,
                'id_setoran'        => $id_setoran,
                'rit'               => 1,
                'tanggal'           => $tanggal,
                'armada'            => $armada,
                'kd_trayek'         => $trayek,
                'jumlah'            => $jum_ota,
                'harga'             => $harga,
                'jenis_penjualan_pnp'=> 2,
                'asal'              => $asal,
                'tujuan'            => $tujuan,
                'mata_uang'         => $kd_uang,
                'id_user'           => $session['id_user']
                );
            $data_array_3 = array(
               'id_setoran_detail' => $id_setoran_detail,
               'id_setoran'        => $id_setoran,
               'rit'               => 1,
               'tanggal'           => $tanggal,
               'armada'            => $armada,
               'kd_trayek'         => $trayek,
               'jumlah'            => $jum_agen,
               'harga'             => $harga,
               'jenis_penjualan_pnp'=> 3,
               'asal'              => $asal,
               'tujuan'            => $tujuan,
               'mata_uang'         => $kd_uang,
               'id_user'           => $session['id_user']
               );
            $data_array_4 = array(
               'id_setoran_detail' => $id_setoran_detail,
               'id_setoran'        => $id_setoran,
               'rit'               => 1,
               'tanggal'           => $tanggal,
               'armada'            => $armada,
               'kd_trayek'         => $trayek,
               'jumlah'            => $jum_loket,
               'harga'             => $harga,
               'jenis_penjualan_pnp'=> 4,
               'asal'              => $asal,
               'tujuan'            => $tujuan,
               'mata_uang'         => $kd_uang,
               'id_user'           => $session['id_user']
               );
            $this->db->insert('ref_setoran_detail_pnp',$data_array_1);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_2);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_3);
            $this->db->insert('ref_setoran_detail_pnp',$data_array_4);
        }else{

        }
        return "sukses";
    }
    
    public function datatable_ticket()
    {
        $session = $this->session->userdata('login');
        $data = array(
            // 'tanggal'=> '2020-02-01',
            // 'armada'=> '4937'
            'tanggal'=> $this->input->post('tanggal'),
            'armada'=> $this->input->post('armada')
            );
        $url = 'newtiket.damri.co.id/apps/operasi/dataPenumpang';
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $responseJson = curl_exec( $ch );
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $cRet ='';
            $tanggal_e_ticket = $this->input->post('tanggal');
            
            foreach (json_decode($responseJson)->data as $row){
                $armada     = $row->armada;
                $trayek     = $row->trayek;
                $jumlah     = $row->jumlah;
                $harga      = $row->harga;
                $pend       = $row->pend;
                
                $jum_apps     = $row->jum_apps;        
                $nilai_apps   = $row->nilai_apps;
                $jum_ota      = $row->jum_ota;
                $nilai_ota    = $row->nilai_ota;
                $jum_agen     = $row->jum_agen;
                $nilai_agen   = $row->nilai_agen;
                $jum_loket    = $row->jum_loket;
                $nilai_loket  = $row->nilai_loket;
                
                if($jum_apps=='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>$harga</td>
                        <td>$jumlah</td>
                        <td align='center'>$pend</td>
                        <td></td>
                    </tr>
                    ";
                }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                }else if($jum_apps=='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                }else if($jum_apps=='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                    
                    //2 select
                }else if($jum_apps!='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen=='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen!='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                }else if($jum_apps=='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                    
                    //3 select
                }else if($jum_apps!='0' && $jum_ota!='0' && $jum_agen!='0' && $jum_loket=='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                }else if($jum_apps!='0' && $jum_ota!='0' && $jum_agen=='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                }else if($jum_apps=='0' && $jum_ota!='0' && $jum_agen!='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                    
                    //4 select
                }else if($jum_apps!='0' && $jum_ota=='0' && $jum_agen!='0' && $jum_loket!='0'){
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_apps,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_apps,0,',','.')."</td>
                        <td>DAMRI Apps</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_ota,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_ota,0,',','.')."</td>
                        <td>OTA</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_agen,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_agen,0,',','.')."</td>
                        <td>Agen</td>
                    </tr>
                    ";
                    $cRet  .="
                    <tr>
                        <td align='center'>$tanggal_e_ticket</td>
                        <td>$armada</td>
                        <td>".ucwords($trayek)."</td>
                        <td align='center'>".number_format($jum_loket,0,',','.')."</td>
                        <td align='center'>".number_format($harga,0,',','.')."</td>
                        <td align='center'>".number_format($nilai_loket,0,',','.')."</td>
                        <td>Loket</td>
                    </tr>
                    ";
                }else{
                    $cRet .="";
                }
            }
            // echo $cRet;
            echo json_encode(array("detail" => $cRet));
            
        }
    }
    
    
    public function ax_get_data_lmb()
    {
        $id_jadwal         = $this->input->post('id_jadwal');
        $id_setoran        = $this->input->post('id_setoran');
        $id_setoran_detail = $this->input->post('id_setoran_detail');
        // echo json_encode(array($id_jadwal,$id_setoran,$id_setoran_detail));
        // exit();
        
        $status = $this->model_setoran->insertSetoranLmb($id_jadwal,$id_setoran,$id_setoran_detail);
        echo json_encode(array('status' => $status));
    }
    
    
    public function ax_data_lmb()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $id_jadwal = $this->input->post('id_jadwal');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran->get_data_lmb($length, $start, $cari['value'],$id_jadwal)->result_array();
                $count = $this->model_setoran->get_count_lmb($cari['value'],$id_jadwal);
                
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
    
    public function ax_get_data_by_id_setoran_pnp()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id = $this->input->post('id');
                if(empty($id))
                    $data = array();
                else
                    $data = $this->model_setoran->get_jadwal_by_id_setoran_pnp($id);
                
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

    public function ax_get_data_by_id_setoran_pend()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id = $this->input->post('id');
                
                if(empty($id)){
                    $data = array();
                }else{
                    $data = $this->model_setoran->get_jadwal_by_id_setoran_pend($id);
                }
                
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

    public function ax_get_data_by_id_setoran_beban()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id = $this->input->post('id');
                
                if(empty($id)){
                    $data = array();
                }else{
                    $data = $this->model_setoran->get_jadwal_by_id_setoran_beban($id);
                }
                
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

    public function ax_get_rp_km()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $id_trayek = $this->input->post('id_trayek');
                
                if(empty($id_trayek)){
                    $data = array();
                }else{
                    $this->db->from("ref_trayek a");
                    $this->db->where('a.id_bu', $id_bu);
                    $this->db->where('a.id_trayek', $id_trayek);
                    $this->db->limit(1);
                    $data = $this->db->get()->row_array();
                }
                
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
    
    
    public function ax_set_data_update_png(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_pnp     = $this->input->post('id_setoran_pnp_edit');
                $rit                = $this->input->post('rit_edit_pnp');
                $jumlah             = $this->input->post('jumlah_edit_pnp');
                $bagasi_pnp         = $this->input->post('bagasi_edit_pnp');
                $jenis_penjualan_pnp = $this->input->post('jenis_penjualan_edit_pnp');
                $session            = $this->session->userdata('login');

                // $dataArr = explode("~",$this->input->post('kd_trayek_edit_pnp')); 
                // $dataArrTrayek = explode("-",$dataArr[0]);
                
                $data = array(
                    // 'kd_trayek'             => $dataArr[0],
                    // 'asal'                  => $dataArrTrayek[0],
                    // 'tujuan'                => $dataArrTrayek[1],
                    'rit'                   => $rit,
                    'jumlah'                => $this->input->post('jumlah_edit_pnp'),
                    'harga'                 => $this->input->post('harga_edit_pnp'),
                    // 'jumlah'                => $jumlah,
                    'bagasi_pnp'            => $bagasi_pnp,
                    'jenis_penjualan_pnp'   => $jenis_penjualan_pnp,
                    // 'mata_uang'             => $dataArr[1]
                    );
                
                $this->model_setoran->update_setoran_detail_pnp(array('id_setoran_pnp' => $id_setoran_pnp), $data);
                echo json_encode(array("status" => TRUE));
                
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

    public function ax_set_data_update_pend(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_pend    = $this->input->post('id_setoran_pend_edit');
                $jumlah             = $this->input->post('jumlah_edit_pend');
                $harga              = $this->input->post('harga_edit_pend');
                $session            = $this->session->userdata('login');                                        
                
                $data = array(
                    'jumlah'    => $jumlah,
                    'harga'     => $harga
                    );
                $this->db->update('ref_setoran_detail_pend', $data, array('id_setoran_pend' => $id_setoran_pend));
                echo json_encode(array("status" => TRUE));
                
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
    public function ax_set_data_update_beban(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_beban    = $this->input->post('id_setoran_beban_edit');
                $id_jenis           = $this->input->post('id_jenis_beban_edit');
                $session            = $this->session->userdata('login');

                $arr = array("22", "23", "24");
                if(in_array($id_jenis, $arr)){
                    $data = array(
                        'jumlah'             => $this->input->post('jumlah_beban_edit'),
                        'harga'              => $this->input->post('harga_beban_edit'),
                        'status_jenis_beban' => $this->input->post('status_jenis_beban_edit')
                        );
                }else if($id_jenis==7){
                    $data = array(
                        'jumlah'             => $this->input->post('jumlah_bbm_beban_edit'),
                        'harga'              => $this->input->post('harga_bbm_beban_edit'),
                        'total'              => $this->input->post('total_bbm_beban_edit')
                        );
                }else{
                    $data = array(
                        'jumlah'             => $this->input->post('jumlah_beban_edit'),
                        'harga'              => $this->input->post('harga_beban_edit')
                        );
                }
                
                $this->db->update('ref_setoran_detail_beban', $data, array('id_setoran_beban' => $id_setoran_beban));
                echo json_encode(array("status" => TRUE));
                
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

    public function ax_set_data_pertelaan()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_pnp = $this->input->post('id_setoran_pnp');
                $id_setoran_detail = $this->input->post('id_setoran_detail');
                $id_setoran = $this->input->post('id_setoran');
                $jumlah     = $this->input->post('jumlah'); //detailPNP
                $total      = $this->input->post('total'); //detailTotalPNP

                $kd_trayek  = $this->input->post('kd_trayek');
                $harga      = $this->input->post('harga');
                $jum        = $this->input->post('jum');

                $jumlah_pnp_now = $this->model_setoran->cek_jumlah_pnp($id_setoran_pnp);
                $jumlah_total_now = $this->model_setoran->cek_jumlah_total($id_setoran_pnp);

                if(($jumlah_pnp_now+$jum)<=$jumlah && ($jumlah_total_now+($jum*$harga))<=$total){
                    $session = $this->session->userdata('login');
                    $data = array(
                        'id_setoran_pnp'    => $id_setoran_pnp,
                        'id_setoran_detail' => $id_setoran_detail,
                        'id_setoran'        => $id_setoran,
                        'kd_trayek'         => $kd_trayek,
                        'jumlah'            => $jum,
                        'harga'             => $harga,
                        'id_user'           => $session['id_user'],
                        'id_bu'             => $this->input->post('id_bu')
                        );
                    $this->db->insert('ref_setoran_detail_pnp_pertelaan',$data);
                    echo json_encode(array('status' => TRUE));
                }else{
                    echo json_encode(array('status' => 'melebihisisa','jumlah' => $jumlah));
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

    public function ax_set_data_pertelaan_update()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_pnp_prt = $this->input->post('id_setoran_pnp_prt');
                $id_setoran_pnp = $this->input->post('id_setoran_pnp');
                $id_setoran_detail = $this->input->post('id_setoran_detail');
                $id_setoran = $this->input->post('id_setoran');
                $jumlah     = $this->input->post('jumlah'); //detailPNP
                $total      = $this->input->post('total'); //detailTotalPNP

                $kd_trayek  = $this->input->post('kd_trayek');
                $harga      = $this->input->post('harga');
                $jum        = $this->input->post('jum');

                $jumlah_pnp_now = $this->model_setoran->cek_jumlah_pnp($id_setoran_pnp);
                $jumlah_total_now = $this->model_setoran->cek_jumlah_total($id_setoran_pnp);

                $data_pertelaan = $this->model_setoran->get_data_by_id_setoran_pnp_pertelaan($id_setoran_pnp_prt);
                $a=$data_pertelaan['jumlah'];
                $b=$data_pertelaan['total'];
                // echo $id_setoran_pnp_prt;
                // exit();

                if((($jumlah_pnp_now-$a)+$jum)<=$jumlah && (($jumlah_total_now-$b)+($jum*$harga))<=$total){
                    $session = $this->session->userdata('login');
                    $data = array(
                        'kd_trayek'         => $kd_trayek,
                        'jumlah'            => $jum,
                        'harga'             => $harga,
                        'id_user'           => $session['id_user'],
                        'id_bu'             => $this->input->post('id_bu')
                        );
                    $this->db->update('ref_setoran_detail_pnp_pertelaan',$data, array('id_setoran_pnp_prt' => $id_setoran_pnp_prt));
                    echo json_encode(array('status' => TRUE));
                }else{
                    echo json_encode(array('status' => 'melebihisisa','jumlah' => $jumlah));
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

    public function ax_get_data_by_id_setoran_pnp_pertelaan()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U01";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id = $this->input->post('id');
                
                if(empty($id))
                    $data = array();
                else
                    $data = $this->model_setoran->get_data_by_id_setoran_pnp_pertelaan($id);
                
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

}
