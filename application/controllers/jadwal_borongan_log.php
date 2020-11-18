<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class jadwal_borongan_log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_jadwal_borongan_log","model_jadwal_borongan");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
     if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $id_cabang = $session['id_bu'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_cabang']    = $this->model_jadwal_borongan->combobox_cabang($id_cabang);
                $data['combobox_asal']      = $this->model_jadwal_borongan->combobox_lokasi();
                $data['combobox_tujuan']    = $this->model_jadwal_borongan->combobox_lokasi();
                $data['combobox_segmen']    = $this->model_jadwal_borongan->combobox_segmen();
                $this->load->view('jadwal/jadwal_borongan_log', $data);
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

    public function apps()
    {
        $this->load->view('jadwal/jadwal');
    }

    public function ax_data_jadwal_default()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $id_cabang = $session['id_bu'];
                $data['session_level'] = $session['id_level'];
                $id_cabang = $this->input->post('cabang');
                $id_pool = $this->input->post('id_pool');
                $kd_segmen = $this->input->post('kd_segmen');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_jadwal_borongan->getAlljadwaldefault($length, $start, $cari['value'],$id_cabang, $kd_segmen, $id_pool)->result_array();
                $count = $this->model_jadwal_borongan->get_count_jadwaldefault($cari['value'],$id_cabang, $kd_segmen, $id_pool);
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

    public function ax_data_relasi()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_jadwal_borongan->getAllrelasi($length, $start, $cari['value'])->result_array();
                $count = $this->model_jadwal_borongan->get_count_relasi($cari['value']);

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

    public function ax_data_sewa()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_jadwal_borongan = $this->input->post('id_jadwal_borongan');
                $upp                = $this->input->post('upp');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_jadwal_borongan->getAllsewa($length, $start, $cari['value'],$id_jadwal_borongan)->result_array();
                $count = $this->model_jadwal_borongan->get_count_sewa($cari['value'],$id_jadwal_borongan);

                $sum_bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as bayar from ms_sewa_borongan where id_jadwal_borongan='$id_jadwal_borongan'")->row("bayar");
                $balance = $upp-$sum_bayar;

                echo json_encode(array('recordsTotal' => $count['recordsTotal'], 'recordsFiltered' => $count['recordsFiltered'], 'draw' => $draw, 'search' => $cari['value'], 'data' => $data,'sum_bayar' => $sum_bayar,'balance' => $balance,));
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

    public function ax_data_jadwal_hr()
    {
       if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
             $data['id_user'] = $session['id_user'];
             $data['nm_user'] = $session['nm_user'];
             $id_cabang = $session['id_bu'];
             $data['session_level'] = $session['id_level'];
             $tanggal = $this->input->post('tanggal');
             $id_cabang = $this->input->post('cabang');
             $id_pool = $this->input->post('id_pool');
             $kd_segmen = $this->input->post('kd_segmen');

             $start = $this->input->post('start');
             $draw = $this->input->post('draw');
             $length = $this->input->post('length');
             $cari = $this->input->post('search', true);
             $data = $this->model_jadwal_borongan->getAlljadwalhr($length, $start, $cari['value'], $tanggal, $id_cabang, $kd_segmen, $id_pool)->result_array();
             $count = $this->model_jadwal_borongan->get_count_jadwalhr($cari['value'], $tanggal, $id_cabang, $kd_segmen, $id_pool);

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

public function ax_data_rit()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $id_lmb = $this->input->post('id_lmb');
                $cari = $this->input->post('search', true);
                $data = $this->model_jadwal_borongan->getritjadwal($length, $start, $cari['value'],$id_lmb)->result_array();
                $count = $this->model_jadwal_borongan->get_count_ritjadwal($cari['value'],$id_lmb);

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

    public function ax_set_data_default(){
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_jadwal          = $this->input->post('id_jadwal');
                $id_pool            = $this->input->post('id_pool');
                $id_cabang          = $this->input->post('id_cabang');
                $armada             = $this->input->post('armada');
                $driver1            = $this->input->post('driver');
                $driver2            = $this->input->post('driver2');
                $kd_segmen          = $this->input->post('kd_segmen');
                $asal               = $this->input->post('asal');
                $tujuan             = $this->input->post('tujuan');
                $jam                = $this->input->post('jam');
                $jam1               = $this->input->post('jam1');
                $target             = $this->input->post('target');
                $tanggal             = $this->input->post('tanggal');
                $session            = $this->session->userdata('login');                                        

                $data = array(
                    'id_jadwal'     => $id_jadwal,
                    'id_pool'       => $id_pool,
                    'armada'        => $armada,
                    'id_cabang'     => $id_cabang,
                    'kd_segmen'     => $kd_segmen,
                    'asal'          => $asal,   
                    'tujuan'        => $tujuan, 
                    'driver1'       => $driver1, 
                    'driver2'       => $driver2, 
                    'jam'           => $jam, 
                    'jam1'          => $jam1, 
                    'target'        => $target, 
                    'tanggal'       => $tanggal,    
                    'username'      => $session['username'],

                    'nama'          => $this->input->post('nama'),
                    'kontak_person' => $this->input->post('kontak_person'),
                    'alamat'        => $this->input->post('alamat'),
                    'no_ktp'        => $this->input->post('no_ktp'),
                    'jum_penumpang' => $this->input->post('jum_penumpang'),
                    'keperluan'     => $this->input->post('keperluan'),
                    'km_tempuh' => $this->input->post('km_tempuh'),
                    'durasi_sewa'   =>$this->input->post('durasi_sewa'), 
                    'lokasi_pemb'   => $this->input->post('lokasi_pemb'), 
                    'jam_pemb'      => $this->input->post('jam_pemb'),
                    'upp'           => $this->input->post('upp'), 
                    'tipe_armada'   => $this->input->post('tipe_armada')
                    );

                $data_sewa = array(
                    'id_jadwal'     => $id_jadwal,
                    'tanggal'       => date('Y-m-d')
                    );

                $absensi_driver = $this->model_jadwal_borongan->count_absensi_driver($driver1,$id_cabang,$tanggal);
                $absensi_armada = $this->model_jadwal_borongan->count_absensi_armada($armada,$id_cabang,$tanggal);
                
                if ($absensi_driver['count']>0 && $absensi_armada['count']>0) {
                    if(empty($id_jadwal)){
                       $data['id_jadwal'] = $this->model_jadwal_borongan->insert_jadwal($data,$data_sewa);
                   }else{
                       $data['id_jadwal'] = $this->model_jadwal_borongan->update_jadwal($data);
                   }
                   echo json_encode(array('status' => 'success', 'data' => $data));
               }else if ($absensi_driver['count']>0 && $absensi_driver['count']==0) {
                echo json_encode(array("status" => "gagal","keterangan"=>"Pastikan Armada ".$armada." absent dengan status (HTM/HTP atau HJ) dan Driver absent dengan status (Dinas atau Siap Dinas)"));
            }else if ($absensi_driver['count']==0 && $absensi_driver['count']>0) {
                echo json_encode(array("status" => "gagal","keterangan"=>"Pastikan Armada ".$armada." absent dengan status (HTM/HTP atau HJ) dan Driver absent dengan status (Dinas atau Siap Dinas)"));
            }else{
                echo json_encode(array("status" => "gagal","keterangan"=>"Pastikan Armada ".$armada." absent dengan status (HTM/HTP atau HJ) dan Driver absent dengan status (Dinas atau Siap Dinas)"));
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

public function ax_set_data_upp(){
  if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_jadwal  = $this->input->post('id_jadwal');
                $upp        = $this->input->post('upp');
                $bayar      = $this->input->post('bayar');
                $session    = $this->session->userdata('login');                                        

                $data = array(
                    'id_jadwal'=> $id_jadwal,
                    'upp'      => $upp,
                    'bayar'    => $bayar
                    );
                $ppn_dan_jumlah = ($upp*0.10)+($upp*0.25);
                if ($bayar<$ppn_dan_jumlah) {
                    echo json_encode(array("status" => "gagal","keterangan"=>"Pembayaran minimal (25% dari UPP ditambah PPN 10% dari UPP) .. minimal pembayaran adalah Rp. ".$ppn_dan_jumlah));
                }else{
                    $data['id_jadwal'] = $this->model_jadwal_borongan->update_jadwal($data);
                    echo json_encode(array("status" => "success"));
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

    public function ax_set_data_sewa(){
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_jadwal_borongan = $this->input->post('id_jadwal_borongan');
                $tanggal            = $this->input->post('tanggal');
                $bayar              = $this->input->post('bayar');
                $upp                = $this->input->post('upp');
                $session            = $this->session->userdata('login');                                        

                $data = array(
                    'id_jadwal_borongan'=> $id_jadwal_borongan,
                    'tanggal'           => $tanggal,
                    'bayar'             => $bayar
                    );

                $sum_bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as bayar from ms_sewa_borongan where id_jadwal_borongan='$id_jadwal_borongan'")->row("bayar");
                $maks_bayar = $upp-$sum_bayar;

                if(($sum_bayar+$bayar)<=$upp){
                    $this->db->insert('ms_sewa_borongan', $data);
                    echo json_encode(array("status" => "success"));
                }else{
                    echo json_encode(array("status" => "gagal","keterangan"=>"Pembayaran Melebihi Total Invoice. Maksimal Pembayaran Rp. ".$maks_bayar.""));
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

    public function ax_set_data_add_rit(){
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
        $menu_kd_menu_details = "S21";
        $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if (!empty($access['id_menu_details'])) {
            $session      = $this->session->userdata('login');                                      

            $data = array(
                'id_lmb'   => $this->input->post('id_lmb_rit_add'),
                'tgl_lmb'  => $this->input->post('tanggal_add'),
                'type_rit' => $this->input->post('type_rit_add'),
                'rit'      => $this->input->post('rit_pnp_add'),
                'kd_trayek'=> $this->input->post('kd_trayek_pnp'),
                'kd_armada'=> $this->input->post('armada_add'),

                'pnp'      => $this->input->post('jumlah_pnp_add'),
                'cuser'    => $session['id_user'],
                'id_bu'    => $this->input->post('id_cabang_add'),
                'active'   => 1,

                );

            $this->model_jadwal_borongan->insert_rit($data);
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

public function ax_set_data_update_rit(){
  if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
    $menu_kd_menu_details = "S21";
    $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
    if (!empty($access['id_menu_details'])) {

        $id_rit       = $this->input->post('id_rit');
        $pnp          = $this->input->post('jumlah_pnp');
        $rit          = $this->input->post('rit_pnp');
        $session      = $this->session->userdata('login');                                        

        $data = array(
            'pnp'   => $pnp,
            'rit'   => $rit,
            'manual'=> 0
            );

        $this->model_jadwal_borongan->update_rit(array('id_rit' => $id_rit), $data);
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

public function ax_unset_data()
{
  if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_jadwal = $this->input->post('id_jadwal');

                $data = array('id_jadwal' => $id_jadwal);

                if(!empty($id_jadwal))
                   $data['id_jadwal'] = $this->model_jadwal_borongan->delete_jadwal($data);

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

public function ax_unset_data_rit()
{
  if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_rit = $this->input->post('id_rit');

                $data = array('id_rit' => $id_rit);

                if(!empty($id_rit))
                    $data['id_rit'] = $this->model_jadwal_borongan->delete_rit($data);

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

    public function aturBus()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

               $username   = $session['username'];
               $tanggal    = $this->input->post('tanggal');
               $id_cabang     = $this->input->post('cabang');

               $data = array('tanggal' => $tanggal);

               if(!empty($tanggal))
                   $data['tanggal'] = $this->model_jadwal_borongan->aturBus($tanggal,$id_cabang,$username);

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

public function setRitase()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username    = $session['username'];
                $tanggal    = $this->input->post('tanggal');
                $id_cabang  = $this->input->post('cabang');
                $kd_segmen  = $this->input->post('kd_segmen');

                $data = array('tanggal' => $tanggal);

                if(!empty($tanggal))
                    $data['tanggal'] = $this->model_jadwal_borongan->setRitase($tanggal,$id_cabang,$username);

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

    public function setRitasearmada()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username    = $session['username'];
                $id_jadwal    = $this->input->post('id_jadwal');

                // echo json_encode($id_jadwal);
                // exit();

                $data = array(
                    'status'          => 1
                    );
                if(!empty($id_jadwal)){
                    $data['tanggal'] =  $this->model_jadwal_borongan->setRitasearmada(array('id_jadwal' => $id_jadwal), $data);
                }

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

    public function checkoutabsen()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username    = $session['username'];
                $id_lmb    = $this->input->post('id_lmb');

                $data = array('active' => 2, 'id_lmb' => $id_lmb);

                if(!empty($id_lmb))
                    $data['id_lmb'] = $this->model_jadwal_borongan->update_lmb($data);

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

    public function ax_get_data_by_id_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $unik = $this->input->post('id_jadwal');
              $tanggal = $this->input->post('tanggal');

              if(empty($unik))
               $data = array();
           else
               $data = $this->model_jadwal_borongan->get_jadwal_by_id_detail($unik,$tanggal);

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

public function ax_get_data_by_id_jadwal()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_jadwal = $this->input->post('id_jadwal');
              if(empty($id_jadwal))
               $data = array();
           else
               $data = $this->model_jadwal_borongan->get_jadwal_by_id_jadwal($id_jadwal);

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

public function ax_get_data_by_id_detail_rit()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id = $this->input->post('id');

                if(empty($id))
                    $data = array();
                else
                    $data = $this->model_jadwal_borongan->get_jadwal_by_id_detail_rit($id);

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

    public function ax_get_pool()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_jadwal_borongan->list_pool($id_cabang);
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


    public function ax_get_driver()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $tgl_absensi = $this->input->post('tgl_absensi');
                $data = $this->model_jadwal_borongan->combobox_pengemudi($id_cabang,$tgl_absensi);
                $html = "<option value='0'>--Driver--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->id_pegawai."'>".$row->nm_pegawai." ( ".$row->nik_pegawai." )</option>"; 
                }
                $callback = array('data_driver'=>$html);
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


    public function ax_get_armada()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $tgl_absensi = $this->input->post('tgl_absensi');
                $data = $this->model_jadwal_borongan->combobox_armada($id_cabang,$tgl_absensi);
                $html = "<option value='0'>--Armada--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_armada."'>".$row->kd_armada." - (".$row->nm_segment.")</option>"; 
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

    public function ax_copy_jadwal()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username   = $session['username'];
                $kd_segmen  = $this->input->post('kd_segmen');
                $id_cabang  = $this->input->post('id_cabang');
                $id_pool    = $this->input->post('id_pool');
                $tanggal_from  = $this->input->post('tanggal_from');
                $tanggal_to    = $this->input->post('tanggal_to');

                $data = array(
                    'kd_segmen' => $kd_segmen,
                    'id_cabang' => $id_cabang,
                    'id_pool'   => $id_pool,
                    'tanggal'   => $tanggal_from,
                    'tanggal_to' => $tanggal_to,
                    );

                $status = $this->model_jadwal_borongan->copyJadwal($id_cabang,$id_pool,$kd_segmen,$tanggal_from,$tanggal_to);
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


    public function ax_unset_data_all_jadwal()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S21";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $id_pool = $this->input->post('id_pool');
                $kd_segmen = $this->input->post('kd_segmen');
                $tanggal = $this->input->post('tanggal');
                
                $status = $this->db->delete('ms_jadwal_borongan', array('tanggal' => $tanggal,'id_cabang' => $id_bu,'id_pool' => $id_pool,'kd_segmen' => $kd_segmen));
                
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

    function ax_get_relasi(){
        $id_relasi = $this->input->post("id_relasi");
        $data = $this->model_jadwal_borongan->get_relasi($id_relasi)->result_array();
        echo json_encode($data);
    }


}
