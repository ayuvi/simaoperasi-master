<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class asuransi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_asuransi");
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
                $data['combo_armada'] = $this->model_asuransi->combo_armada();
                $this->load->view('asuransi/index', $data);
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

    

    public function ax_data_asuransi()
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
                $data = $this->model_asuransi->getAllasuransi($length, $start, $cari['value'])->result_array();
                $count = $this->model_asuransi->get_count_asuransi($cari['value']);

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

    public function ax_data_asuransi_detail()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_asuransi = $this->input->post('id_asuransi');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_asuransi->getAllasuransiDetail($length, $start, $cari['value'],$id_asuransi)->result_array();
                $count = $this->model_asuransi->get_count_asuransi_detail($cari['value'],$id_asuransi);

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

    public function ax_data_asuransi_documents()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_asuransi = $this->input->post('id_asuransi');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_asuransi->getAllasuransiDocuments($length, $start, $cari['value'],$id_asuransi)->result_array();
                $count = $this->model_asuransi->get_count_asuransi_documents($cari['value'],$id_asuransi);

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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_asuransi = $this->input->post('id_asuransi');
                $no_polis = $this->input->post('no_polis');
                $tgl_expired = $this->input->post('tgl_expired');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');
                $data = array(
                    'id_asuransi' => $id_asuransi,
                    'no_polis' => $no_polis,
                    'tgl_expired' => $tgl_expired,
                    'active' => $active,
                    'id_perusahaan' => $session['id_perusahaan']
                );

                if(empty($id_asuransi))
                   $data['id_asuransi'] = $this->model_asuransi->insert_asuransi($data);
               else
                   $data['id_asuransi'] = $this->model_asuransi->update_asuransi($data);

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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_asuransi_detail = $this->input->post('id_asuransi_detail');
                $id_asuransi = $this->input->post('id_asuransi');
                $kd_armada = $this->input->post('kd_armada');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');
                $data = array(
                    'id_asuransi_detail' => $id_asuransi_detail,
                    'id_asuransi' => $id_asuransi,
                    'kd_armada' => $kd_armada,
                    'active' => $active,
                    'id_perusahaan' => $session['id_perusahaan']
                );

                if(empty($id_asuransi_detail))
                   $data['id_asuransi_detail'] = $this->model_asuransi->insert_asuransi_detail($data);
               else
                   $data['id_asuransi_detail'] = $this->model_asuransi->update_asuransi_detail($data);

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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_asuransi = $this->input->post('id_asuransi');

                $data = array('id_asuransi' => $id_asuransi);

                if(!empty($id_asuransi))
                   $data['id_asuransi'] = $this->model_asuransi->delete_asuransi($data);

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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_asuransi_detail = $this->input->post('id_asuransi_detail');

                $data = array('id_asuransi_detail' => $id_asuransi_detail);

                if(!empty($id_asuransi_detail))
                   $data['id_asuransi_detail'] = $this->model_asuransi->delete_asuransi_detail($data);

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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_asuransi = $this->input->post('id_asuransi');

              if(empty($id_asuransi))
               $data = array();
           else
               $data = $this->model_asuransi->get_asuransi_by_id($id_asuransi);

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
            $menu_kd_menu_details = "U05";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_asuransi_detail = $this->input->post('id_asuransi_detail');

                if(empty($id_asuransi_detail))
                   $data = array();
               else
                $data = $this->model_asuransi->get_asuransi_by_id_detail($id_asuransi_detail);

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
