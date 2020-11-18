<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class setoran_borongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_setoran_borongan");
        $this->load->model("model_menu");
        $this->load->model("model_jadwal");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
    
    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_setoran_borongan->combobox_bu();
                $data['combobox_segmen']    = $this->model_jadwal->combobox_segmen();
                
                $this->load->view('setoran/setoran_borongan', $data);
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
            $menu_kd_menu_details = "U06";  //custom by database
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
                $data = $this->model_setoran_borongan->getAllsetoran($length, $start, $cari['value'], $id_bu,$id_pool,$tanggal, $active)->result_array();
                $count = $this->model_setoran_borongan->get_count_setoran($cari['value'], $id_bu,$id_pool,$tanggal, $active);
                
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_jadwal = $this->input->post('id_jadwal');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran_borongan->getAllsetoran_detail_pnp($length, $start, $cari['value'], $id_jadwal)->result_array();
                $count = $this->model_setoran_borongan->get_count_setoran_detail_pnp($cari['value'], $id_jadwal);
                
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

    function ax_data_setoran_detail_pnp_pertelaan()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_pnp = $this->input->post('id_setoran_pnp');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran_borongan->getAllsetoran_detail_pnp_pertelaan($length, $start, $cari['value'], $id_setoran_pnp)->result_array();
                $count = $this->model_setoran_borongan->get_count_setoran_detail_pnp_pertelaan($cari['value'], $id_setoran_pnp);
                
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
    
    function ax_data_setoran_detail_beban()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_setoran_borongan->getAllsetoran_detail_beban($length, $start, $cari['value'], $id_setoran)->result_array();
                $count = $this->model_setoran_borongan->get_count_setoran_detail_beban($cari['value'], $id_setoran);
                
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
    
    public function ax_set_data_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran_header');
                $tgl_setoran = $this->input->post('tgl_setoran');
                $id_bu = $this->input->post('id_bu');
                $id_pool = $this->input->post('id_pool');
                $id_jadwal = $this->input->post('id_jadwal');

                $session = $this->session->userdata('login');
                $data = array(
                    'id_setoran' => $id_setoran,
                    'id_bu'     => $id_bu,
                    'id_pool'   => $id_pool,
                    'tgl_setoran' => $tgl_setoran,
                    'id_jadwal' => $id_jadwal,
                    'id_user'   => $session['id_user'],
                    );
                
                if($id_setoran == 0){
                    $status = $this->model_setoran_borongan->insert_setoran_detail($data);
                }
                else{
                    $status = $this->model_setoran_borongan->update_setoran_detail($data);
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
            $menu_kd_menu_details = "U06";  //custom by database
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
                
                $session = $this->session->userdata('login');
                $data = array(
                    'id_setoran_pnp' => $id_setoran_detail_pnp,
                    'id_setoran' => $id_setoran,
                    'id_setoran_detail' => $id_setoran_detail,
                    'tanggal'   => $tanggal,
                    'armada'    => $armada,
                    'kd_trayek' => $kd_trayek,
                    'jumlah'    => $jumlah,
                    'harga'     => $harga,
                    'rit'       => $rit,
                    'bagasi_pnp'=> $bagasi_pnp,
                    'jenis_penjualan_pnp'       => $jenis_penjualan_pnp,
                    'id_user'   => $session['id_user'],
                    );
                
                if($id_setoran_detail_pnp == 0){
                    $status = $this->model_setoran_borongan->insert_setoran_detail_pnp($data);
                }
                else{
                    $status = $this->model_setoran_borongan->update_setoran_detail_pnp($data);
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
    
    public function ax_set_data_detail_pend()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U06";  //custom by database
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
                
                if($id_setoran_detail_pend == 0){
                    $status = $this->model_setoran_borongan->insert_setoran_detail_pend($data);
                }
                else{
                    $status = $this->model_setoran_borongan->update_setoran_detail_pend($data);
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran_beban        = $this->input->post('id_setoran_beban');
                $id_setoran              = $this->input->post('id_setoran_header');
                
                $armada                  = $this->input->post('armada');
                $tanggal                 = $this->input->post('tanggal');
                $id_jenis                = $this->input->post('id_jenis');
                $jumlah                  = $this->input->post('jumlah_beban');
                $harga                   = $this->input->post('harga_beban');
                $status_jenis_beban      = $this->input->post('status_jenis_beban');
                
                $session = $this->session->userdata('login');

                if($id_jenis==7){
                    $data = array(
                        'id_setoran_beban' => $id_setoran_beban,
                        'id_setoran' => $id_setoran,
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
                        'id_setoran_beban' => $id_setoran_beban,
                        'id_setoran' => $id_setoran,
                        'tanggal'   => $tanggal,
                        'armada'    => $armada,
                        'id_jenis'  => $id_jenis,
                        'jumlah'    => $jumlah,
                        'harga'     => $harga,
                        'status_jenis_beban' => $status_jenis_beban,
                        'id_user'   => $session['id_user'],
                        );
                }
                
                if($id_setoran_beban == 0){
                    $status = $this->model_setoran_borongan->insert_setoran_detail_beban($data);
                }
                else{
                    $status = $this->model_setoran_borongan->update_setoran_detail_beban($data);
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
                    $status = $this->model_setoran_borongan->delete_setoran_pnp($data);
                
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran = $this->input->post('id_setoran');
                if(!empty($id_setoran))
                    $status = $this->model_setoran_borongan->delete_setoran_header($id_setoran);
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_setoran_pnp = $this->input->post('id_setoran_pnp');
                if(!empty($id_setoran_pnp))
                    $status = $this->model_setoran_borongan->delete_setoran_pnp($id_setoran_pnp);
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if(!empty($access['id_menu_details'])){
                $id_setoran_beban = $this->input->post('id_setoran_beban');
                if(!empty($id_setoran_beban))
                    $status = $this->model_setoran_borongan->delete_setoran_beban($id_setoran_beban);
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
            $menu_kd_menu_details = "U06";  //custom by database
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran = $this->input->post('id_setoran');
                
                if(empty($id_setoran))
                    $data = array();
                else
                    $data = $this->model_setoran_borongan->get_setoran_by_id($id_setoran);
                
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
        $data = $this->model_setoran_borongan->listJadwal($id_bu,$armada);
        $html = "<option value='0'>--Data Bus--</option>";
        foreach ($data->result() as $row) {
            $html .= "<option value='".$row->id_jadwal."'>".$row->tanggal." | ".$row->nm_trayek." | ".$row->kd_segmen."</option>"; 
        }
        $callback = array('data_jadwal'=>$html);
        echo json_encode($callback);
    }
    
    function ax_get_jadwal_rinci(){
        $id_jadwal = $this->input->post("id_jadwal");
        $data = $this->model_setoran_borongan->getjadwalrinci($id_jadwal)->result_array();
        echo json_encode($data);
    }
    
    function ax_get_trayek(){
        $id_bu = $this->input->post('id_bu');
        $data = $this->model_setoran_borongan->listTrayek($id_bu);
        $html = "<option value='0'>--Trayek--</option>";
        foreach ($data->result() as $row) {
            $html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal." - ".$row->nm_point_akhir."</option>"; 
        }
        $callback = array('data_trayek'=>$html);
        echo json_encode($callback);
    }
    function ax_get_point_trayek(){
        $id_bu = $this->input->post('id_bu');
        $data = $this->model_setoran_borongan->listPointTrayek($id_bu);
        $html = "<option value='0'>--Trayek--</option>";
        foreach ($data->result() as $row) {
            $html .= "<option value='".$row->point."'>".$row->point."</option>"; 
        }
        $callback = array('data_trayek'=>$html);
        echo json_encode($callback);
    }
    
    function ax_get_trayek_harga(){
        $kd_trayek = $this->input->post('kd_trayek');
        $data = $this->model_setoran_borongan->hargaTrayek($kd_trayek);
        echo json_encode($data);
    }
    function ax_get_harga_beban(){
        $id_jenis_beban = $this->input->post('id_jenis_beban');
        $id_bu = $this->input->post('id_bu');
        $data = $this->model_setoran_borongan->hargaBeban($id_jenis_beban,$id_bu);
        echo json_encode($data);
    }
    
    function ax_get_jenis_pend(){
        $id_bu = $this->input->post('id_bu');
        $data = $this->model_setoran_borongan->listJenisPend($id_bu);
        $html = "<option value='0'>--Jenis--</option>";
        foreach ($data->result() as $row) {
            $html .= "<option value='".$row->id_komponen."'>".$row->keterangan."</option>"; 
        }
        $callback = array('data_jenis'=>$html);
        echo json_encode($callback);
    }
    
    function ax_get_jenis_beban(){
        $id_bu = $this->input->post('id_bu');
        $data = $this->model_setoran_borongan->listJenisBeban($id_bu);
        $html = "<option value='0'>--Jenis--</option>";
        foreach ($data->result() as $row) {
            $html .= "<option value='".$row->id_komponen."'>".$row->nm_komponen."</option>"; 
        }
        $callback = array('data_jenis'=>$html);
        echo json_encode($callback);
    }
    
    function ax_get_bu(){
        $id_bu = $this->input->post("id_bu");
        $data = $this->model_setoran_borongan->getidbu($id_bu)->result_array();
        echo json_encode($data);
    }
    
    public function ax_change_active()
    {
        $id = $this->input->post('id_setoran');
        $active = $this->input->post('active');
        
        // $penumpang = $this->model_setoran_borongan->sum_penumpang($id)->penumpang;
        // $beban = $this->model_setoran_borongan->sum_beban($id)->beban;
        
        // if($penumpang != null && $beban != null){
            $change_active;
            if ($active==1) {
                $change_active = 2;
            }else if ($active==2) {
                $change_active = 1;
            }
            $data = array(
                'active' => $change_active
                );
            $this->model_setoran_borongan->change_active(array('id_setoran' => $id), $data);
            
            echo json_encode(array("status" => TRUE));
        // }else{
        //     echo json_encode(array("status" => FALSE));
        // }
        
    }

    public function ax_change_status_udj()
    {
        $id_setoran  = $this->input->post('id_setoran');
        $status_udj  = $this->input->post('status_udj');

        $change_status;
        if($status_udj=='true'){
            $change_status=1;
        }else{
            $change_status=0;
        }

        $data = array(
            'status_udj' => $change_status
            );

        $this->db->update('ref_setoran_borongan', $data, array('id_setoran' => $id_setoran));
        echo json_encode(array("status" => TRUE, "change"=>$change_status));
    }

    public function ax_change_status_udj_bagasi()
    {
        $id_setoran  = $this->input->post('id_setoran');
        $status_udj_bagasi  = $this->input->post('status_udj_bagasi');

        $change_status;
        if($status_udj_bagasi=='true'){
            $change_status=1;
        }else{
            $change_status=0;
        }

        $data = array(
            'status_udj_bagasi' => $change_status
            );

        $this->db->update('ref_setoran_borongan', $data, array('id_setoran' => $id_setoran));
        echo json_encode(array("status" => TRUE, "change"=>$change_status));
    }

    public function ax_get_armada()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_cabang = $this->input->post('id_cabang');
                $tanggal = $this->input->post('tanggal');
                $id_pool = $this->input->post('id_pool');
                $data = $this->model_setoran_borongan->combobox_armada_($id_cabang);
                $html = "<option value='' disabled selected>--Armada--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_armada."'>".$row->kd_armada."</option>"; 
                }
                
                
                $data1 = $this->model_setoran_borongan->combobox_armada_jadwal($id_cabang, $tanggal, $id_pool);
                $html1 = "<option value='' disabled selected>--Armada--</option>";
                foreach ($data1->result() as $row1) {
                    $html1 .= "<option value='".$row1->kd_armada."'>".$row1->kd_armada."</option>"; 
                }
                $callback = array('data_armada'=>$html,'data_jadwal'=>$html1);
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_setoran_borongan->list_pool($id_cabang);
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

    public function ax_get_data_lmb()
    {
        $id_jadwal         = $this->input->post('id_jadwal');
        $id_setoran        = $this->input->post('id_setoran');
        $id_setoran_detail = $this->input->post('id_setoran_detail');
        // echo json_encode(array($id_jadwal,$id_setoran,$id_setoran_detail));
        // exit();
        
        $status = $this->model_setoran_borongan->insertSetoranLmb($id_jadwal,$id_setoran,$id_setoran_detail);
        echo json_encode(array('status' => $status));
    }
    
    public function ax_get_data_by_id_setoran_pnp()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id = $this->input->post('id');
                
                if(empty($id))
                    $data = array();
                else
                    $data = $this->model_setoran_borongan->get_jadwal_by_id_setoran_pnp($id);
                
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
            $menu_kd_menu_details = "U06";
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_setoran_pnp     = $this->input->post('id_setoran_pnp_edit');
                $rit                = $this->input->post('rit_edit_pnp');
                $jumlah             = $this->input->post('jumlah_edit_pnp');
                $bagasi_pnp         = $this->input->post('bagasi_edit_pnp');
                $jenis_penjualan_pnp = $this->input->post('jenis_penjualan_edit_pnp');
                $session      = $this->session->userdata('login');                                        
                
                $data = array(
                    'rit'                   => $rit,
                    'jumlah'                => $jumlah,
                    'bagasi_pnp'            => $bagasi_pnp,
                    'jenis_penjualan_pnp'   => $jenis_penjualan_pnp
                    );
                
                $this->model_setoran_borongan->update_setoran_detail_pnp(array('id_setoran_pnp' => $id_setoran_pnp), $data);
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
            $menu_kd_menu_details = "U06";  //custom by database
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

                $jumlah_pnp_now = $this->model_setoran_borongan->cek_jumlah_pnp($id_setoran_pnp);
                $jumlah_total_now = $this->model_setoran_borongan->cek_jumlah_total($id_setoran_pnp);

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
            $menu_kd_menu_details = "U06";  //custom by database
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

                $jumlah_pnp_now = $this->model_setoran_borongan->cek_jumlah_pnp($id_setoran_pnp);
                $jumlah_total_now = $this->model_setoran_borongan->cek_jumlah_total($id_setoran_pnp);

                $data_pertelaan = $this->model_setoran_borongan->get_data_by_id_setoran_pnp_pertelaan($id_setoran_pnp_prt);
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
            $menu_kd_menu_details = "U06";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id = $this->input->post('id');
                
                if(empty($id))
                    $data = array();
                else
                    $data = $this->model_setoran_borongan->get_data_by_id_setoran_pnp_pertelaan($id);
                
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
