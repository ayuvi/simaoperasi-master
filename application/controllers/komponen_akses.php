<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class komponen_akses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_komponen_akses");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S19";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_komponen_akses->combobox_bu();
                if($session['id_level']==5){
                    $this->load->view('komponen/komponen_akses_bu', $data);
                }else{
                    $this->load->view('komponen/komponen_akses', $data);
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

    public function datatable(){
        $fetch_data = $this->model_komponen_akses->make_datatables();
        $data = array();
        $nmr = 0;
        foreach($fetch_data as $row)
        {
            $nmr+=1;
            $sub_array = array();
            $sub_array[] = '
            <button class="btn btn-sm btn-info btn.flat" title="View Data" onclick="ViewData('."'".$row->id_bu."'".')"><i class="fa fa-list"></i></button>
            ';
            $sub_array[] = $nmr;
            $sub_array[] = $row->nm_bu;
            $sub_array[] = $this->model_komponen_akses->get_bu_komponen($row->id_bu);
            
            $data[] = $sub_array;
        }
        $output = array(
            "draw"            =>  intval($_POST["draw"]),
            "recordsTotal"    =>  $nmr,
            "recordsFiltered" =>  $this->model_komponen_akses->get_filtered_data(),
            "data"            =>  $data
        );
        echo json_encode($output);
    }

    public function ax_data_komponen_akses()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S19";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $id_bu = $this->input->post('id_bu');
                $cari = $this->input->post('search', true);
                $data = $this->model_komponen_akses->getKomponenAkses($length, $start, $cari['value'],$id_bu)->result_array();
                $count = $this->model_komponen_akses->get_count_KomponenAkses($cari['value'],$id_bu);

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

    public function ax_data_cabang()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S19";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_komponen_akses->getcabang($length, $start, $cari['value'])->result_array();
                $count = $this->model_komponen_akses->get_count_cabang($cari['value']);

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

    public function ax_get_data_by_id()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S19";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');

                if(empty($id_bu))
                    $data = array();
                else
                    $data = $this->model_komponen_akses->get_bu_by_id($id_bu);

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


    public function ax_change_active()
    {
        $id = $this->input->post('id_komponen_akses');
        $active = $this->input->post('active');

        $change_active;
        if ($active==1) {
            $change_active = 0;
        }else if ($active==0) {
            $change_active = 1;
        }
        $data = array(
            'active' => $change_active
        );
        $this->model_komponen_akses->change_active(array('id_komponen_akses' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ax_data_komponen_akses_bu()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S19";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_komponen_akses->getAllkomponen_akses($length, $start, $cari['value'], $id_bu)->result_array();
                $count = $this->model_komponen_akses->get_count_komponen_akses($cari['value'], $id_bu);

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

    public function ax_set_data_komponen_akses_bu()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S19";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_komponen_akses = $this->input->post('id_komponen_akses');
                $harga = $this->input->post('harga');
                $session = $this->session->userdata('login');
                $data = array(
                    'id_komponen_akses' => $id_komponen_akses,
                    'harga' => $harga
                );

                $data['id_komponen_akses'] = $this->model_komponen_akses->update_komponen_akses($data);

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

    public function ax_get_data_by_id_komponen_akses_bu()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S19";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_komponen_akses = $this->input->post('id_komponen_akses');

                if(empty($id_komponen_akses))
                    $data = array();
                else
                    $data = $this->model_komponen_akses->get_komponen_akses_by_id($id_komponen_akses);

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
