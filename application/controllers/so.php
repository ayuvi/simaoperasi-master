<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class so extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_so");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_relasi'] = $this->model_so->combobox_relasi();
                $data['combobox_tipe_armada'] = $this->model_so->combobox_tipe_armada();
                $data['combobox_project'] = $this->model_so->combobox_project();
                $data['combobox_kota'] = $this->model_so->combobox_kota();
                $data['combobox_bu'] = $this->model_so->combobox_bu();
                $data['combobox_rekanan'] = $this->model_so->combobox_rekanan();
                $this->load->view('relasi/so', $data);
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

    

    public function ax_data_so()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_so->getAllso($length, $start, $cari['value'])->result_array();
                $count = $this->model_so->get_count_so($cari['value']);

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

    public function ax_data_do_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_so = $this->input->post('id_so');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_so->getAlldo($length, $start, $cari['value'],$id_so)->result_array();
                $count = $this->model_so->get_count_do($cari['value'],$id_so);

                $count_all = $this->db->query("SELECT COALESCE(SUM(rate),0) as tot from ref_do where id_so='$id_so'");
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

    public function ax_data_do_pilih_armada()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_so->getAlldo_pilih_armada($length, $start, $cari['value'])->result_array();
                $count = $this->model_so->get_count_do_pilih_armada($cari['value']);

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
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_so          = $this->input->post('id_so');
                $id_relasi      = $this->input->post('id_relasi');
                $id_project     = $this->input->post('id_project');
                $id_rate        = $this->input->post('id_rate');
                $tanggal        = $this->input->post('tanggal');
                $session        = $this->session->userdata('login');
                $data = array(
                    'id_so'         => $id_so,
                    'id_relasi'     => $id_relasi,
                    'id_project'    => $id_project,
                    'id_rate'       => $id_rate,
                    'tanggal'       => $tanggal,
                    'cuser'         => $session['id_user']
                    );

                if(empty($id_so))
                   $data['id_so'] = $this->model_so->insert_so($data);
               else
                   $data['id_so'] = $this->model_so->update_so($data);

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

public function ax_set_data_do()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_do          = $this->input->post('id_do');
                $id_so          = $this->input->post('id_so');
                $tipe_armada    = $this->input->post('tipe_armada');
                $rate           = $this->input->post('rate');
                $session        = $this->session->userdata('login');
                $data = array(
                    'id_do'         => $id_do,
                    'id_so'         => $id_so,
                    'tipe_armada'   => $tipe_armada,
                    'rate'          => $rate,
                    'cuser'         => $session['id_user']
                    );

                if(empty($id_do))
                    $data['id_do'] = $this->model_so->insert_do($data);
                else
                    $data['id_do'] = $this->model_so->update_do($data);

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

    public function ax_set_data_do_pilih_armada()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_do       = $this->input->post('id_do');
                $jenis       = $this->input->post('jenis');
                $id_rekanan  = $this->input->post('id_rekanan');
                $armada      = $this->input->post('armada');
                $plat_armada = $this->input->post('plat_armada');
                $session        = $this->session->userdata('login');

                $data = array(
                    'id_do'         => $id_do,
                    'jenis'         => $jenis,
                    'id_rekanan'    => $id_rekanan,
                    'armada'        => $armada,
                    'cuser'         => $session['id_user']
                    );

                $data2 = array(
                    'id_do'         => $id_do,
                    'jenis'         => $jenis,
                    'id_rekanan'    => $id_rekanan,
                    'plat_armada'   => $plat_armada,
                    'cuser'         => $session['id_user']
                    );

                if($jenis==1){
                    $data['id_do'] = $this->model_so->insert_do_pilih_armada($data);
                }else{
                    $data['id_do'] = $this->model_so->insert_do_pilih_armada($data2);
                }
                // if(empty($id_do)){
                // }else{
                //     $data['id_do'] = $this->model_so->update_do_pilih($data);
                // }

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

    public function ax_unset_data()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_so = $this->input->post('id_so');

                $data = array('id_so' => $id_so);

                if(!empty($id_so))
                   $data['id_so'] = $this->model_so->delete_so($data);

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

    public function ax_unset_data_pilih_armada()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_do_pilih = $this->input->post('id_do_pilih');

                $data = array('id_do_pilih' => $id_do_pilih);

                if(!empty($id_do_pilih))
                   $data['id_do_pilih'] = $this->model_so->delete_do_pilih_armada($data);

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
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_so = $this->input->post('id_so');

              if(empty($id_so))
               $data = array();
           else
               $data = $this->model_so->get_so_by_id($id_so);

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


public function ax_unset_data_do()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_do = $this->input->post('id_do');

                $data = array('id_do' => $id_do);

                if(!empty($id_do))
                    $data['id_do'] = $this->model_so->delete_do($data);

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
    
    public function ax_get_data_by_id_do()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_project = $this->input->post('id_project');

                if(empty($id_project))
                    $data = array();
                else
                    $data = $this->model_so->get_project_by_id($id_project);

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

    public function ax_get_project()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_relasi = $this->input->post('id_relasi');
                $data = $this->model_so->combobox_project_($id_relasi);
                $html = "<option value='' disabled selected>--Project--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->id_project."'>".$row->nm_project."</option>"; 
                }
                
                $callback = array('data_project'=>$html);
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

    public function ax_get_rate()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_relasi = $this->input->post('id_relasi');
                $id_project = $this->input->post('id_project');
                $data = $this->model_so->combobox_rate($id_relasi,$id_project);
                $html = "<option value='' disabled selected>--Rate--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->id_rate."'>".$row->asal."-".$row->tujuan." (".number_format($row->rate,0,',','.').")</option>"; 
                }
                
                $callback = array('data_rate'=>$html);
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
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_relasi = $this->input->post('id_relasi');
                $id_project = $this->input->post('id_project');
                $id_asal = $this->input->post('id_asal');
                $id_tujuan = $this->input->post('id_tujuan');
                $data = $this->model_so->combobox_armada($id_relasi,$id_project,$id_asal,$id_tujuan);
                $html = "<option value='0'>--Armada--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->tipe_armada."'>".$row->nm_tipe_armada."</option>"; 
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

    public function ax_get_armada_damri()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S23";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $id_bu = $this->input->post('id_bu');                
                $data = $this->model_so->combobox_armada_damri($id_bu);
                $html = "<option value='0'>--Armada--</option>";
                foreach ($data->result() as $row) {
                    $html .= "<option value='".$row->kd_armada."'>".$row->kd_armada." - (".$row->plat_armada.")</option>"; 
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

    function ax_get_harga_rate(){
        $id_relasi = $this->input->post('id_relasi');
        $id_project = $this->input->post('id_project');
        $id_asal = $this->input->post('id_asal');
        $id_tujuan = $this->input->post('id_tujuan');
        $tipe_armada = $this->input->post('tipe_armada');
        $data = $this->model_so->combobox_harga_rate($id_relasi,$id_project,$id_asal,$id_tujuan,$tipe_armada);
        echo json_encode($data);
    }


}
