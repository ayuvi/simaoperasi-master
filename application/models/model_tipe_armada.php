<?php
    class Model_tipe_armada extends CI_Model
    {
        public function getAlltipe_armada($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_tipe_armada a");
            $session = $this->session->userdata('login');
            $this->db->where("(a.nm_tipe_armada  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_tipe_armada($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_tipe_armada) as recordsFiltered ");
			$this->db->from("ref_tipe_armada");
			$this->db->where("active != '2' ");
			$this->db->like("nm_tipe_armada ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_tipe_armada) as recordsTotal ");
			$this->db->from("ref_tipe_armada");
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_tipe_armada($data)
        {
            $this->db->insert('ref_tipe_armada', $data);
			return $this->db->insert_id();
        }

        public function delete_tipe_armada($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_tipe_armada', $data['id_tipe_armada']);
            $this->db->update('ref_tipe_armada', array('active' => '2'));
			return $data['id_tipe_armada'];
        }
		
        public function update_tipe_armada($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_tipe_armada', $data['id_tipe_armada']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_tipe_armada', $data);
			return $data['id_tipe_armada'];
        }
		
		public function get_tipe_armada_by_id($id_tipe_armada)
		{
			if(empty($id_tipe_armada))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_tipe_armada a");
				$this->db->where('a.id_tipe_armada', $id_tipe_armada);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

    }
