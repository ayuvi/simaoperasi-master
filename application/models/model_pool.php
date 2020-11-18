<?php
    class Model_pool extends CI_Model
    {
       public function getAllpool($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_pool, a.nm_pool, a.active, a.id_bu, b.nm_bu, a.kd_pool");
            $this->db->from("ref_pool a");
            $this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
			$session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_pool LIKE '%".$cari."%' or  b.nm_bu LIKE '%".$cari."%') ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_pool($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(a.id_pool) as recordsFiltered ");
			$this->db->from("ref_pool a");
			$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where("a.active != '2' ");
			$this->db->where("(a.nm_pool LIKE '%".$search."%' or  b.nm_bu LIKE '%".$search."%') ");
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(a.id_pool) as recordsTotal ");
			$this->db->from("ref_pool a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}


		public function getAllpoolaccess($show=null, $start=null, $cari=null, $id_pool)
        {
            $this->db->select("a.*, b.nm_user");
            $this->db->from("ref_pool_access a");
            $this->db->join("ref_user b", "a.id_user = b.id_user", "left");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('a.id_pool', $id_pool);
            $this->db->where("(b.nm_user  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function insert_pool($data)
        {
            $this->db->insert('ref_pool', $data);
			return $this->db->insert_id();
        }

        public function insert_pool_access($data)
        {
            $this->db->insert('ref_pool_access', $data);
            return $this->db->insert_id();
        }

       
        public function delete_pool($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_pool', $data['id_pool']);
            $this->db->update('ref_pool', array('active' => '2'));
			return $data['id_pool'];
        }

        public function delete_pool_access($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_pool_access', $data['id_pool_access']);
            $this->db->delete('ref_pool_access');
            return $data['id_pool_access'];
        }
		
        public function update_pool($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_pool', $data['id_pool']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_pool', $data);
			return $data['id_pool'];
        }

        public function update_pool_access($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_pool_access', $data['id_pool_access']);
            $this->db->where("active != '2' ");
            $this->db->update('ref_pool_access', $data);
            return $data['id_pool_access'];
        }

        
		
		public function get_pool_by_id($id_pool)
		{
			if(empty($id_pool))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->select("a.id_pool,  a.nm_pool, a.active, a.id_bu, b.nm_bu, a.kd_pool");
				$this->db->from("ref_pool a");
            	$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_pool', $id_pool);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		public function get_pool_access_by_id($id_pool_access)
        {
            if(empty($id_pool_access))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->select("a.*, b.nm_user");
                $this->db->from("ref_pool_access a");
                $this->db->join("ref_user b", "a.id_user = b.id_user", "left");
                $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
                $this->db->where('a.id_pool_access', $id_pool_access);
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
