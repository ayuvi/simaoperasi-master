<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_order");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {
                $data['id_rate'] = $this->input->get("id_rate");

                $this->db->from("ref_rate a");
                $this->db->where('a.id_rate', $data['id_rate']);
                $row_arr = $this->db->get()->row_array();

                $data['id_user'] = $session['id_user'];
                $data['data_rate'] = $row_arr;
                $data['nm_user'] = $session['nm_user'];
                $data['session_level'] = $session['id_level'];
                $data['combobox_tipe_armada'] = $this->model_order->combobox_tipe_armada();
                $this->load->view('relasi/order', $data);
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

    

    public function ax_data_order()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_rate = $this->input->post('id_rate');
                $start = $this->input->post('start');
                $draw = $this->input->post('draw');
                $length = $this->input->post('length');
                $cari = $this->input->post('search', true);
                $data = $this->model_order->getAllorder($length, $start, $cari['value'],$id_rate)->result_array();
                $count = $this->model_order->get_count_order($cari['value'],$id_rate);

                $count_all = $this->db->query("SELECT COALESCE(SUM(rate),0) as tot from ref_order where id_rate=".$id_rate);

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

    public function ax_set_data()
    {
      if ($this->session->userdata('login')) {
        $session = $this->session->userdata('login');
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_order = $this->input->post('id_order');
                $id_rate = $this->input->post('id_rate');
                $tipe_armada = $this->input->post('tipe_armada');
                $rate = $this->input->post('rate');
                $active = $this->input->post('active');
                $session = $this->session->userdata('login');
                $data = array(
                    'id_order' => $id_order,
                    'id_rate' => $id_rate,
                    'tipe_armada' => $tipe_armada,
                    'rate' => $rate,
                    'active' => $active
                    );

                if(empty($id_order))
                 $data['id_order'] = $this->model_order->insert_order($data);
             else
                 $data['id_order'] = $this->model_order->update_order($data);

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
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $id_order = $this->input->post('id_order');

                $data = array('id_order' => $id_order);

                if(!empty($id_order))
                 $data['id_order'] = $this->model_order->delete_order($data);

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
            $menu_kd_menu_details = "S09";  //custom by database
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

              $id_order = $this->input->post('id_order');

              if(empty($id_order))
                 $data = array();
             else
                 $data = $this->model_order->get_order_by_id($id_order);

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
