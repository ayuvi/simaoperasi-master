<?php
    class Model_project extends CI_Model
    {
        public function getAllproject($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_project a");
            $this->db->where("(a.nm_project  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_project($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_project) as recordsFiltered ");
			$this->db->from("ref_project");
			$this->db->where("active != '2' ");
			$this->db->like("nm_project ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_project) as recordsTotal ");
			$this->db->from("ref_project");
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_project($data)
        {
            $this->db->insert('ref_project', $data);
			return $this->db->insert_id();
        }

        public function delete_project($data)
        {
            $this->db->where('id_project', $data['id_project']);
            $this->db->update('ref_project', array('active' => '2'));
			return $data['id_project'];
        }
		
        public function update_project($data)
        {
            $this->db->where('id_project', $data['id_project']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_project', $data);
			return $data['id_project'];
        }
		
		public function get_project_by_id($id_project)
		{
			if(empty($id_project))
			{
				return array();
			}
			else
			{
				$this->db->from("ref_project a");
				$this->db->where('a.id_project', $id_project);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

    }
