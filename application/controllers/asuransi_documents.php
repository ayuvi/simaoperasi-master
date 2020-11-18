<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class asuransi_documents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_asuransi");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

    public function ax_set_data()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $session = $this->session->userdata('login');
                $data = array(
                    'id_asuransi'     => $this->input->post('id_asuransi_header_documents_add'),
                    'nm_documents'     => $this->input->post('nm_documents'),
                    'active'     => $this->input->post('active_documents'),
                    'id_perusahaan' => $session['id_perusahaan'],
                    'cuser'         => $session['id_user']
                );

                if(!empty($_FILES['file']['name']))
                {
                    $upload = $this->_do_upload();
                    $data['file'] = $upload;
                }

                $insert = $this->model_asuransi->insert_documents($data);
                echo json_encode(array('status' => TRUE, 'data' => $insert));

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

    public function ax_set_data_update()
    {
        if ($this->session->userdata('login')) {
            $session = $this->session->userdata('login');
            $menu_kd_menu_details = "U05";
            $access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
            if (!empty($access['id_menu_details'])) {

                $session = $this->session->userdata('login');
                $data = array(
                    'id_asuransi'     => $this->input->post('id_asuransi_header_documents_add'),
                    'nm_documents'     => $this->input->post('nm_documents'),
                    'active'     => $this->input->post('active_documents'),
                    'id_perusahaan' => $session['id_perusahaan'],
                    'cuser'         => $session['id_user']
                );

                if(!empty($_FILES['file']['name']))
                {
                    $upload = $this->_do_upload();

                    $data_file = $this->model_asuransi->get_barang_by_id_documents($this->input->post('id_asuransi_documents'));
                    if(file_exists('uploads/asuransi/'.$data_file->file) && $data_file->file)
                        unlink('uploads/asuransi/'.$data_file->file);

                    $data['file'] = $upload;
                }

                $update = $this->model_asuransi->update_documents(array('id_asuransi_documents' => $this->input->post('id_asuransi_documents')), $data);

                echo json_encode(array('status' => TRUE, 'data' => $update));

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

                $id_asuransi_documents = $this->input->post('id_asuransi_documents');
                $data = array('id_asuransi_documents' => $id_asuransi_documents);

                //delete file
                $data_file = $this->model_asuransi->get_barang_by_id_documents($id_asuransi_documents);
                if(file_exists('uploads/asuransi/'.$data_file->file) && $data_file->file)
                    unlink('uploads/asuransi/'.$data_file->file);

                if(!empty($id_asuransi_documents))
                    $data['id_asuransi_documents'] = $this->model_asuransi->delete_documents($data);

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

                $id_asuransi_documents = $this->input->post('id_asuransi_documents');

                if(empty($id_asuransi_documents))
                    $data = array();
                else
                    $data = $this->model_asuransi->get_barang_by_id_documents($id_asuransi_documents);

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

    private function _do_upload()
    {
        $config['upload_path']          = 'uploads/asuransi/';
        $config['allowed_types']        = 'jpeg|jpg|png|gif|pdf|docx|doc|pptx|ppt|xlsx|xls';
        $config['encrypt_name']         = TRUE;
        $config['max_size']             = 1000;
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file')) //upload and validate
        {
            $data['message'] = 'Pastikan File type [Gambar, PDF, PPT, Doc, Excell] dan Max.size 1 MB';
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }

        $data = $this->upload->data(); 
        return $data['file_name'];
    }

    public function print_laporan()
    {
        $format = $this->input->get('format');

        $cRet = "<table style=\"border-collapse:collapse;\" width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">";

        $cRet .="
        <tr>
        <td align=\"left\" style=\"font-size:12px; font-family:tahoma;\" width =\"33%\" >PERUSAHAAN UMUM DAMRI<br/>(PERUM DAMRI)<br/></td>
        <td align=\"center\" colspan =\"3\"  style=\"font-size:12px; font-family:tahoma;\" width =\"34%\"></td>
        <td align=\"right\" colspan =\"3\"  style=\"font-size:12px; font-family:tahoma;\" width =\"33%\"></td>
        </tr>
        <tr>
        <td align=\"left\" style=\"font-size:12px; font-family:tahoma;\" width =\"33%\"></td>
        <td align=\"center\" colspan =\"3\"  style=\"font-size:12px; font-family:tahoma;\" width =\"34%\"><u><h3>LAPORAN ASURANSI ARMADA <br/><br/></h3></u></td>
        <td align=\"right\" colspan =\"3\"  style=\"font-size:12px; font-family:tahoma;\" width =\"33%\"></td>
        </tr>           
        </table>";

        $cRet .="

        <table style=\"border-collapse:collapse\" width=\"100%\" align=\"center\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\">
        <thead>        
        <tr>
        <td align=\"center\" width=\"5%\" style=\"font-size:12px; font-family:tahoma;\"><b>NO</b></td>
        <td align=\"center\" width=\"7%\" style=\"font-size:12px; font-family:tahoma;\"><b>ARMADA</b></td>
        <td align=\"center\" width=\"5%\" style=\"font-size:12px; font-family:tahoma;\"><b>PLAT NOMOR</b></td>
        <td align=\"center\" width=\"5%\" style=\"font-size:12px; font-family:tahoma;\"><b>TGL.EXP</b></td>
        <td align=\"center\" width=\"7%\" style=\"font-size:12px; font-family:tahoma;\"><b>KETERANGAN EXP</b></td>
        </tr>
        </thead>"; 
        $nomor=0;
        $data_laporan = $this->model_asuransi->print_laporan();
        foreach ($data_laporan->result() as $row) {
            $cRet .="<tr>
            <td align=\"center\" width=\"5%\" style=\"font-size:12px; font-family:tahoma;\">".($nomor+=1)."</td>
            <td align=\"center\" width=\"7%\" style=\"font-size:12px; font-family:tahoma;\">$row->kd_armada</td>
            <td align=\"center\" width=\"5%\" style=\"font-size:12px; font-family:tahoma;\">$row->plat_armada</td>
            <td align=\"center\" width=\"5%\" style=\"font-size:12px; font-family:tahoma;\">$row->tgl_expired</td>";
            if($row->selisih<0 || $row->selisih==0){
                $cRet .="<td align=\"center\" width=\"7%\" style=\"font-size:12px; font-family:tahoma;\"><font color=\"red\">$row->status_expired</font></td>";
            }else{
                $cRet .="<td align=\"center\" width=\"7%\" style=\"font-size:12px; font-family:tahoma;\">$row->status_expired</td>";
            }

            $cRet .="</tr>";
        }
        $cRet .=" </table>";
        if ($format==1){
            echo $cRet;
        } else {
           $data['prev']= $cRet;
           header("Cache-Control: no-cache, no-store, must-revalidate");
           header("Content-Type: application/vnd.ms-excel");
           header("Content-Disposition: attachment; filename= Asuransi_Armada.xls");
           $this->load->view('report/excel', $data);
       }        
   }
}
