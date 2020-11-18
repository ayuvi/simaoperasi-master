<?php
    class Model_rekanan extends CI_Model
    {
        public function getAllrekanan($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_rekanan a");
            $session = $this->session->userdata('login');
            $this->db->where("(a.nm_rekanan  LIKE '%".$cari."%' OR a.alamat  LIKE '%".$cari."%' OR a.kontak_person  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_rekanan($cari = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_rekanan) as recordsFiltered ");
			$this->db->from("ref_rekanan");
			$this->db->where("active != '2' ");
			$this->db->where("(nm_rekanan  LIKE '%".$cari."%' OR alamat  LIKE '%".$cari."%' OR kontak_person  LIKE '%".$cari."%' ) ");
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_rekanan) as recordsTotal ");
			$this->db->from("ref_rekanan");
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_rekanan($data)
        {
            $this->db->insert('ref_rekanan', $data);
			return $this->db->insert_id();
        }

        public function delete_rekanan($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_rekanan', $data['id_rekanan']);
            $this->db->delete('ref_rekanan');
            // $this->db->update('ref_rekanan', array('active' => '2'));
			return $data['id_rekanan'];
        }
		
        public function update_rekanan($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_rekanan', $data['id_rekanan']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_rekanan', $data);
			return $data['id_rekanan'];
        }
		
		public function get_rekanan_by_id($id_rekanan)
		{
			if(empty($id_rekanan))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_rekanan a");
				$this->db->where('a.id_rekanan', $id_rekanan);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		

    }
