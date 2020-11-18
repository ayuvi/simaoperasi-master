<?php
    class Model_sim extends CI_Model
    {
        public function getAllsim($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_sim a");
            $session = $this->session->userdata('login');
            $this->db->where("(a.nm_sim  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_sim($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_sim) as recordsFiltered ");
			$this->db->from("ref_sim");
			$this->db->where("active IN (0, 1) ");
			$this->db->like("nm_sim ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_sim) as recordsTotal ");
			$this->db->from("ref_sim");
			$this->db->where("active IN (0, 1) ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_sim($data)
        {
            $this->db->insert('ref_sim', $data);
			return $this->db->insert_id();
        }

        public function delete_sim($data)
        {
            $this->db->where('id_sim', $data['id_sim']);
            $this->db->delete('ref_sim');
			return $data['id_sim'];
        }
		
        public function update_sim($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_sim', $data['id_sim']);
			$this->db->where("active IN (0, 1) ");
            $this->db->update('ref_sim', $data);
			return $data['id_sim'];
        }
		
		public function get_sim_by_id($id_sim)
		{
			if(empty($id_sim))
			{
				return array();
			}
			else
			{
				$this->db->from("ref_sim a");
				$this->db->where('a.id_sim', $id_sim);
				$this->db->where("a.active IN (0, 1) ");
				return $this->db->get()->row_array();
			}
		}

    }
