<?php
    class Model_setting extends CI_Model
    {
        public function getAllsetting($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_setting a");
            $session = $this->session->userdata('login');
            $this->db->where("(a.nama  LIKE '%".$cari."%' ) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
        
        public function get_count_setting($search = null)
        {
            $count = array();
            $session = $this->session->userdata('login');
            
            $this->db->select(" COUNT(id_setting) as recordsFiltered ");
            $this->db->from("ref_setting");
            $this->db->like("nama ", $search);
            $count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
            
            $this->db->select(" COUNT(id_setting) as recordsTotal ");
            $this->db->from("ref_setting");
            $count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
            
            return $count;
        }
        
        public function insert_setting($data)
        {
            $this->db->insert('ref_setting', $data);
            return $this->db->insert_id();
        }

        public function delete_setting($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_setting', $data['id_setting']);
            $this->db->delete('ref_setting');
            return $data['id_setting'];
        }
        
        public function update_setting($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_setting', $data['id_setting']);
            $this->db->update('ref_setting', $data);
            return $data['id_setting'];
        }
        
        public function get_setting_by_id($id_setting)
        {
            if(empty($id_setting))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->from("ref_setting a");
                $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
                $this->db->where('a.id_setting', $id_setting);
                return $this->db->get()->row_array();
            }
        }

    }
