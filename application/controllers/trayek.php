<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class trayek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_trayek");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_point'] = $this->model_trayek->combobox_point();
                $data['combobox_bu'] = $this->model_trayek->combobox_bu();
                $data['combobox_segment'] = $this->model_trayek->combobox_segment();

                $this->load->view('trayek/index', $data);
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

    public function access($id_trayek)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_user'] = $this->model_trayek->combobox_user();
                $data['id_trayek'] = $id_trayek;
                $this->load->view('trayek/access', $data);
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

    

    public function ax_data_trayek()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_trayek->getAlltrayek($length, $start, $cari['value'],$id_bu)->result_array();
                $count = $this->model_trayek->get_count_trayek($cari['value'],$id_bu);

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

    public function ax_data_trayek_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek = $this->input->post('id_trayek');
                $layanan = $this->input->post('layanan');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_trayek->getAlltrayek_detail($length, $start, $cari['value'],$id_trayek,$layanan)->result_array();
                $count = $this->model_trayek->get_count_trayek_detail($cari['value'],$id_trayek,$layanan);

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

    public function ax_data_trayek_access($id_trayek)
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {


                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_trayek->getAlltrayekaccess($length, $start, $cari['value'], $id_trayek)->result_array();
                $count = $this->model_trayek->getAlltrayekaccess(null, null, $cari['value'], $id_trayek)->num_rows();

                echo json_encode(array('recordsTotal' => $count, 'recordsFiltered' => $count, 'draw' => $draw, 'search' => $cari['value'], 'data' => $data));
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
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek = $this->input->post('id_trayek');
                $id_bu = $this->input->post('id_bu');
                $harga = $this->input->post('harga');
                $id_segment = $this->input->post('id_segment');
                $id_point_awal = $this->input->post('id_point_awal');
                $id_point_akhir = $this->input->post('id_point_akhir');
                $note_trayek = $this->input->post('note_trayek');
                $km_trayek = $this->input->post('km_trayek');
                $km_empty = $this->input->post('km_empty');
                $rp_asuransi = $this->input->post('rp_asuransi')?$this->input->post('rp_asuransi'):0;
                $rp_km = $this->input->post('rp_km');
                $rp_subsidi = $this->input->post('rp_subsidi');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');
                $data = array(
                    'id_trayek' => $id_trayek,
                    'id_bu' => $id_bu,
                    'harga' => $harga?$harga:0,
                    'id_segment' => $id_segment,
                    'id_point_awal' => $id_point_awal,
                    'id_point_akhir' => $id_point_akhir,
                    'note_trayek' => $note_trayek,
                    'km_trayek' => $km_trayek,
                    'km_empty' => $km_empty,
                    'rp_asuransi' => $rp_asuransi,
                    'rp_km' => $rp_km,
                    'rp_subsidi' => $rp_subsidi,
                    'active' => $active,
                    'cuser' => $session['id_user'],
                    'id_perusahaan' => $session['id_perusahaan']
                    );

                if(empty($id_trayek))
                   $data['id_trayek'] = $this->model_trayek->insert_trayek($data);
               else
                   $data['id_trayek'] = $this->model_trayek->update_trayek($data);

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

public function ax_set_data_detail()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek_in = $this->input->post('id_trayek_in');
                $id_trayek = $this->input->post('id_trayek');
                $id_point_awal = $this->input->post('id_point_awal');
                $id_point_akhir = $this->input->post('id_point_akhir');
                $harga = $this->input->post('harga');
                $km_trayek = $this->input->post('km_trayek');
                $mata_uang = $this->input->post('mata_uang');
                $layanan = $this->input->post('layanan');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');

               

                $data = array(
                    'id_trayek_detail' => $id_trayek_in,
                    'id_trayek' => $id_trayek,
                    'id_point_awal' => $id_point_awal,
                    'id_point_akhir' => $id_point_akhir,
                    'harga' => $harga,
                    'km_trayek' => $km_trayek,
                    'mata_uang' => $mata_uang,
                    'layanan' => $layanan,
                    'active' => $active,
                    'cuser' => $session['id_user']
                    );
                //  echo json_encode($data);
                // exit();

                if(empty($id_trayek_in))
                    $data['id_trayek_detail'] = $this->model_trayek->insert_trayek_detail($data);
                else
                    $data['id_trayek_detail'] = $this->model_trayek->update_trayek_detail($data);

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

    public function ax_set_data_access()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek = $this->input->post('id_trayek');
                $id_trayek_access = $this->input->post('id_trayek_access');
                $id_user = $this->input->post('id_user');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');
                $data = array(
                    'id_trayek' => $id_trayek,
                    'id_trayek_access' => $id_trayek_access,
                    'id_user' => $id_user,
                    'active' => $active,
                    'id_perusahaan' => $session['id_perusahaan']
                    );

                if(empty($id_trayek_access))
                    $data['id_trayek_access'] = $this->model_trayek->insert_trayek_access($data);
                else
                    $data['id_trayek_access'] = $this->model_trayek->update_trayek_access($data);

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
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek = $this->input->post('id_trayek');

                $data = array('id_trayek' => $id_trayek);

                if(!empty($id_trayek))
                   $data['id_trayek'] = $this->model_trayek->delete_trayek($data);

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

public function ax_unset_data_detail()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek_in = $this->input->post('id_trayek_in');

                $data = array('id_trayek_detail' => $id_trayek_in);

                if(!empty($id_trayek_in))
                    $data['id_trayek_detail'] = $this->model_trayek->delete_trayek_detail($data);

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

    public function ax_unset_data_access()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek_access = $this->input->post('id_trayek_access');

                $data = array('id_trayek_access' => $id_trayek_access);

                if(!empty($id_trayek_access))
                    $data['id_trayek_access'] = $this->model_trayek->delete_trayek_access($data);

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
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_trayek = $this->input->post('id_trayek');

              if(empty($id_trayek))
               $data = array();
           else
               $data = $this->model_trayek->get_trayek_by_id($id_trayek);

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

public function ax_get_data_by_id_detail()
{
    if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S13";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_trayek_in = $this->input->post('id_trayek_in');

                if(empty($id_trayek_in))
                    $data = array();
                else
                    $data = $this->model_trayek->get_trayek_by_id_detail($id_trayek_in);

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
