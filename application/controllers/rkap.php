<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class rkap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_rkap");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U04";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_user'] = $session['id_user'];
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_bu'] = $this->model_rkap->combobox_bu();
                $data['combobox_segment'] = $this->model_rkap->combobox_segment();
                $data['combobox_akun'] = $this->model_rkap->combobox_akun();
                $data['nm_bu'] = $this->model_rkap->get_by_id_bu($session['id_bu'])->nm_bu;
                
                // if($session['id_level']==3 ||$session['id_level']==6){
                //     $this->load->view('rkap/cabang', $data);
                // }else{
                    $this->load->view('rkap/index', $data);
                // }
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

    

    public function ax_data_rkap()
    {

        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U04";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_bu = $this->input->post('id_bu');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_rkap->getAllrkap($length, $start, $cari['value'], $id_bu)->result_array();
                $count = $this->model_rkap->get_count_rkap($cari['value'], $id_bu);

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
            $menu_kd_menu_details = "U04";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {



             $session = $this->session->userdata('login');
             $id_rkap = $this->input->post('id_rkap');

             $data = array(

                'id_bu' => $this->input->post('id_bu_filter'),
                'tahun' => $this->input->post('tahun'),
                'id_segment' => $this->input->post('id_segment'),
                'id_coa' => $this->input->post('id_coa'),
                'satuan' => $this->input->post('satuan'),
                'rkapmintahun' => $this->input->post('rkapmintahun'),
                'realisasimintahun' => $this->input->post('realisasimintahun'),
                'eksistingtahun' => $this->input->post('eksistingtahun'),
                'koreksitahun' => $this->input->post('koreksitahun'),
                'investasitahun' => $this->input->post('investasitahun'),
                'rkaptahun' => $this->input->post('rkaptahun'),
                'nilai' => $this->input->post('nilai'),
                'jan' => $this->input->post('jan'),
                'feb' => $this->input->post('feb'),
                'mar' => $this->input->post('mar'),
                'apr' => $this->input->post('apr'),
                'mei' => $this->input->post('mei'),
                'jun' => $this->input->post('jun'),
                'jul' => $this->input->post('jul'),
                'aug' => $this->input->post('aug'),
                'sep' => $this->input->post('sep'),
                'okt' => $this->input->post('okt'),
                'nov' => $this->input->post('nov'),
                'des' => $this->input->post('des'),
                'active' => 1,
                'cuser' => $session['id_user'],
                
                'id_perusahaan' => $session['id_perusahaan'],
            );

             if($this->input->post('id_rkap') == 0){
                 $query = $this->model_rkap->insert_rkap($data);
             }
             else{
                 $query = $this->model_rkap->update_rkap($data,$id_rkap);
             }

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
            $menu_kd_menu_details = "U04";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_rkap = $this->input->post('id_rkap');

                $data = array('id_rkap' => $id_rkap);

                if(!empty($id_rkap))
                 $data['id_rkap'] = $this->model_rkap->delete_rkap($data);

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
            $menu_kd_menu_details = "U04";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_rkap = $this->input->post('id_rkap');

              if(empty($id_rkap))
                 $data = array();
             else
                 $data = $this->model_rkap->get_rkap_by_id($id_rkap);

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


public function ax_get_satuan($id){
  $data_id = $this->model_rkap->ax_get_satuan($id);
  echo json_encode($data_id);
}

}
