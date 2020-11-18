<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_jadwal");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
     if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['id_bu_session'] = $session['id_bu'];
                $id_cabang = $session['id_bu'];
                $data['session_level'] = $session['id_level'];
                //$data['combobox_divisi']  = $this->model_jadwal->combobox_divisi();
                $data['combobox_cabang']    = $this->model_jadwal->combobox_cabang($id_cabang);
                // $data['combobox_armada'] = $this->model_jadwal->combobox_armada($id_cabang);
                $data['combobox_asal']      = $this->model_jadwal->combobox_lokasi();
                $data['combobox_tujuan']    = $this->model_jadwal->combobox_lokasi();
                $data['combobox_segmen']    = $this->model_jadwal->combobox_segmen();
                // $data['combobox_pengemudi'] = $this->model_jadwal->combobox_pengemudi($id_cabang);
                //$data['combobox_format']  = $this->model_jadwal->combobox_format();
                // $data['session_level'] = $session['id_level'];
                $this->load->view('jadwal/index', $data);
                $this->load->view('jadwal/scan_tiket', array('session_level' => $session['id_level']));
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
            $menu_kd_menu_details = "S14";  //custom by database
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
                $data = $this->model_jadwal->getAlljadwaldefault($length, $start, $cari['value'],$id_cabang, $kd_segmen, $id_pool)->result_array();
                $count = $this->model_jadwal->get_count_jadwaldefault($cari['value'],$id_cabang, $kd_segmen, $id_pool);
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

    public function ax_data_jadwal_hr()
    {
       if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
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
             $data = $this->model_jadwal->getAlljadwalhr($length, $start, $cari['value'], $tanggal, $id_cabang, $kd_segmen, $id_pool)->result_array();
             $count = $this->model_jadwal->get_count_jadwalhr($cari['value'], $tanggal, $id_cabang, $kd_segmen, $id_pool);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $id_lmb = $this->input->post('id_lmb');
                $cari = $this->input->post('search', true);
                $data = $this->model_jadwal->getritjadwal($length, $start, $cari['value'],$id_lmb)->result_array();
                $count = $this->model_jadwal->get_count_ritjadwal($cari['value'],$id_lmb);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_jadwal          = $this->input->post('id_jadwal');
                $id_pool            = $this->input->post('id_pool');
                $id_cabang          = $this->input->post('id_cabang');
                $armada             = $this->input->post('armada');
                $driver1            = $this->input->post('driver');
                $driver2            = $this->input->post('driver2');
                $kd_segmen          = $this->input->post('kd_segmen');
                $kd_trayek          = $this->input->post('kd_trayek');
                $asal               = $this->input->post('asal');
                $tujuan             = $this->input->post('tujuan');
                $layanan            = $this->input->post('layanan');
                $persekot           = $this->input->post('persekot')?$this->input->post('persekot'):0;
                $nomor_lmb          = $this->input->post('nomor_lmb');
                // $jam                = $this->input->post('jam');
                // $jam1               = $this->input->post('jam1');
                $target             = $this->input->post('target');
                $tanggal            = $this->input->post('tanggal');
                $session            = $this->session->userdata('login');                                        

                $data = array(
                    'id_jadwal'     => $id_jadwal,
                    'id_pool'       => $id_pool,
                    'armada'        => $armada,
                    'id_cabang'     => $id_cabang,
                    'kd_segmen'     => $kd_segmen,
                    'kd_trayek'     => $kd_trayek,  
                    'asal'          => $asal,   
                    'tujuan'        => $tujuan, 
                    'driver1'       => $driver1, 
                    'driver2'       => $driver2,
                    'layanan'       => $layanan, 
                    // 'jam'           => $jam, 
                    // 'jam1'          => $jam1, 
                    'target'        => $target, 
                    'tanggal'       => $tanggal,
                    'persekot'      => $persekot,
                    'nomor_lmb'     => $nomor_lmb,
                    'username'      => $session['username'],    
                    );
                $absensi_driver = $this->model_jadwal->count_absensi_driver($driver1,$id_cabang,$tanggal);
                $absensi_armada = $this->model_jadwal->count_absensi_armada($armada,$id_cabang,$tanggal);
                
                if ($absensi_driver['count']>0 && $absensi_armada['count']>0) {
                    if(empty($id_jadwal)){
                       $data['id_jadwal'] = $this->model_jadwal->insert_jadwal($data);
                   }else{
                       $data['id_jadwal'] = $this->model_jadwal->update_jadwal($data);
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

public function ax_set_data_add_rit(){
  if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
    $menu_kd_menu_details = "S14";
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

        $this->model_jadwal->insert_rit($data);
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
    $menu_kd_menu_details = "S14";
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

        $this->model_jadwal->update_rit(array('id_rit' => $id_rit), $data);
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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_jadwal = $this->input->post('id_jadwal');

                $data = array('id_jadwal' => $id_jadwal);

                if(!empty($id_jadwal))
                   $data['id_jadwal'] = $this->model_jadwal->delete_jadwal($data);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_rit = $this->input->post('id_rit');

                $data = array('id_rit' => $id_rit);

                if(!empty($id_rit))
                    $data['id_rit'] = $this->model_jadwal->delete_rit($data);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

               $username   = $session['username'];
               $tanggal    = $this->input->post('tanggal');
               $id_cabang     = $this->input->post('cabang');

               $data = array('tanggal' => $tanggal);

               if(!empty($tanggal))
                   $data['tanggal'] = $this->model_jadwal->aturBus($tanggal,$id_cabang,$username);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username    = $session['username'];
                $tanggal    = $this->input->post('tanggal');
                $id_cabang  = $this->input->post('cabang');
                $kd_segmen  = $this->input->post('kd_segmen');

                $data = array('tanggal' => $tanggal);

                if(!empty($tanggal))
                    $data['tanggal'] = $this->model_jadwal->setRitase($tanggal,$id_cabang,$username);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username    = $session['username'];
                $tanggal    = $this->input->post('tanggal');
                $id_cabang  = $this->input->post('cabang');
                $armada  = $this->input->post('kd_armada');
                $driver1  = $this->input->post('driver1');

                $data = array('tanggal' => $tanggal);
                // echo json_encode(array($tanggal,$id_cabang,$armada,$driver1));
                // exit();

                if(!empty($tanggal))
                    $data['tanggal'] = $this->model_jadwal->setRitasearmada($tanggal,$id_cabang,$armada,$driver1);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $username    = $session['username'];
                $id_lmb    = $this->input->post('id_lmb');

                $data = array('active' => 2, 'id_lmb' => $id_lmb);

                if(!empty($id_lmb))
                    $data['id_lmb'] = $this->model_jadwal->update_lmb($data);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $unik = $this->input->post('unik');
              $tanggal = $this->input->post('tanggal');

              if(empty($unik))
               $data = array();
           else
               $data = $this->model_jadwal->get_jadwal_by_id_detail($unik,$tanggal);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id = $this->input->post('id');

                if(empty($id))
                    $data = array();
                else
                    $data = $this->model_jadwal->get_jadwal_by_id_detail_rit($id);

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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_cabang = $this->input->post('id_cabang');
                $kd_segmen = $this->input->post('kd_segmen');
                $data = $this->model_jadwal->list_trayek($id_cabang,$kd_segmen);
                $html = "<option value='0'>--Trayek--</option>";


                if($id_cabang==16){

                    foreach ($data->result() as $row) {
                        $html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal." - ".$row->nm_point_akhir." (".$row->kd_trayek.") - (".$row->kd_sbu.")</option>"; 
                    }

                }else{

                    foreach ($data->result() as $row) {
                        $html .= "<option value='".$row->kd_trayek."'>".$row->nm_point_awal." - ".$row->nm_point_akhir." (".$row->kd_trayek.")</option>"; 
                    }

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


    public function ax_get_pool()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $data = $this->model_jadwal->list_pool($id_cabang);
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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $tgl_absensi = $this->input->post('tgl_absensi');
                $data = $this->model_jadwal->combobox_pengemudi($id_cabang,$tgl_absensi);
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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_cabang = $this->input->post('id_cabang');
                $tgl_absensi = $this->input->post('tgl_absensi');
                $data = $this->model_jadwal->combobox_armada($id_cabang,$tgl_absensi);
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

    public function ax_get_lmb_lewat_hari(){
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $id_bu = $this->input->post('id_bu');
                $kd_segmen = $this->input->post('kd_segmen');
                $kd_armada = $this->input->post('kd_armada');
                $kd_trayek = $this->input->post('kd_trayek');

                $data = $this->model_jadwal->list_lmb_lewat_hari($id_bu,$kd_segmen,$kd_armada,$kd_trayek);
                $html = "<option value='0'>--ID LMB--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->id_lmb."'>".$row->id_lmb." - ".$row->kd_armada." - ".$row->kd_trayek."</option>"; 
                }
                $callback = array('data_lmb'=>$html);
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
            $menu_kd_menu_details = "S14";  //custom by database
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

                $status = $this->model_jadwal->copyJadwal($id_cabang,$id_pool,$kd_segmen,$tanggal_from,$tanggal_to);
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
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $id_pool = $this->input->post('id_pool');
                $kd_segmen = $this->input->post('kd_segmen');
                $tanggal = $this->input->post('tanggal');
                
                $status = $this->db->delete('ms_jadwal', array('tanggal' => $tanggal,'id_cabang' => $id_bu,'id_pool' => $id_pool,'kd_segmen' => $kd_segmen));
                
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


    public function ax_set_data_scan_tiket(){
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_rit     = $this->input->post('id_rit');
                $kode_tiket = $this->input->post('kode_tiket');
                $session    = $this->session->userdata('login');                                        

                $data = array(
                    'id_rit'     => $id_rit,
                    'kode_tiket' => $kode_tiket,
                    'id_user'    => $session['id_user']
                    );
                $count = $this->db->query("SELECT kode_tiket from tr_rit_scan_tiket where id_rit='$id_rit'")->num_rows();

                if($count==0){
                   $data['id_rit'] = $this->db->insert('tr_rit_scan_tiket',$data);
                   echo json_encode(array('status' => 'success', 'data' => $data));
               }else{
                echo json_encode(array('status' => 'gagal', 'data' => 'gagal'));
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

public function ax_data_scan_tiket()
{
   if ($this->session->userdata('login')) {
    $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

             $id_rit = $this->input->post('id_rit');
             $start = $this->input->post('start');
             $draw = $this->input->post('draw');
             $length = $this->input->post('length');
             $cari = $this->input->post('search', true);
             $data = $this->model_jadwal->getAllscan_tiket($length, $start, $cari['value'], $id_rit)->result_array();
             $count = $this->model_jadwal->get_count_scan_tiket($cari['value'], $id_rit);

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

public function ax_unset_data_scan_tiket()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_scan = $this->input->post('id_scan');

                $data = array('id_scan' => $id_scan);

                if(!empty($id_scan))
                    $data['id_scan'] = $this->db->delete('tr_rit_scan_tiket', $data); ;

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

    public function ax_get_persekot()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S14";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                if(empty($id_bu)){
                    $data = array();
                }
                else{
                    $data = $this->model_jadwal->get_persekot($id_bu);
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


}
