<?php
    class Model_jadwal_template extends CI_Model
    {
       public function getAlljadwal_template($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_jadwal_template, a.nm_jadwal_template, a.active, a.id_bu, b.nm_bu, a.kd_jadwal_template");
            $this->db->from("ref_jadwal_template a");
            $this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
			$session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_jadwal_template LIKE '%".$cari."%' or  b.nm_bu LIKE '%".$cari."%') ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_jadwal_template($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(a.id_jadwal_template) as recordsFiltered ");
			$this->db->from("ref_jadwal_template a");
			$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where("a.active != '2' ");
			$this->db->where("(a.nm_jadwal_template LIKE '%".$search."%' or  b.nm_bu LIKE '%".$search."%') ");
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(a.id_jadwal_template) as recordsTotal ");
			$this->db->from("ref_jadwal_template a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}


		public function getAlljadwal_templateaccess($show=null, $start=null, $cari=null, $id_jadwal_template)
        {
            $this->db->select("a.*, b.nm_user");
            $this->db->from("ref_jadwal_template_access a");
            $this->db->join("ref_user b", "a.id_user = b.id_user", "left");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('a.id_jadwal_template', $id_jadwal_template);
            $this->db->where("(b.nm_user  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function insert_jadwal_template($data)
        {
            $this->db->insert('ref_jadwal_template', $data);
			return $this->db->insert_id();
        }

        public function insert_jadwal_template_access($data)
        {
            $this->db->insert('ref_jadwal_template_access', $data);
            return $this->db->insert_id();
        }

       
        public function delete_jadwal_template($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_jadwal_template', $data['id_jadwal_template']);
            $this->db->update('ref_jadwal_template', array('active' => '2'));
			return $data['id_jadwal_template'];
        }

        public function delete_jadwal_template_access($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_jadwal_template_access', $data['id_jadwal_template_access']);
            $this->db->delete('ref_jadwal_template_access');
            return $data['id_jadwal_template_access'];
        }
		
        public function update_jadwal_template($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_jadwal_template', $data['id_jadwal_template']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_jadwal_template', $data);
			return $data['id_jadwal_template'];
        }

        public function update_jadwal_template_access($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_jadwal_template_access', $data['id_jadwal_template_access']);
            $this->db->where("active != '2' ");
            $this->db->update('ref_jadwal_template_access', $data);
            return $data['id_jadwal_template_access'];
        }

        
		
		public function get_jadwal_template_by_id($id_jadwal_template)
		{
			if(empty($id_jadwal_template))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->select("a.id_jadwal_template,  a.nm_jadwal_template, a.active, a.id_bu, b.nm_bu, a.kd_jadwal_template");
				$this->db->from("ref_jadwal_template a");
            	$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_jadwal_template', $id_jadwal_template);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		public function get_jadwal_template_access_by_id($id_jadwal_template_access)
        {
            if(empty($id_jadwal_template_access))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->select("a.*, b.nm_user");
                $this->db->from("ref_jadwal_template_access a");
                $this->db->join("ref_user b", "a.id_user = b.id_user", "left");
                $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
                $this->db->where('a.id_jadwal_template_access', $id_jadwal_template_access);
                $this->db->where("a.active != '2' ");
                return $this->db->get()->row_array();
            }
        }

		

		public function bu_combobox()
        {
            $this->db->from("ref_bu");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

        public function combobox_user()
        {
            $this->db->from("ref_user");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

		
    }
