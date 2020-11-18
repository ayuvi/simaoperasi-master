<?php
    class Model_warna extends CI_Model
    {
        public function getAllwarna($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_warna, a.nm_warna, a.active");
            $this->db->from("ref_warna a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_warna  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_warna($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_warna) as recordsFiltered ");
			$this->db->from("ref_warna");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_warna ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_warna) as recordsTotal ");
			$this->db->from("ref_warna");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_warna($data)
        {
            $this->db->insert('ref_warna', $data);
			return $this->db->insert_id();
        }

        public function delete_warna($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_warna', $data['id_warna']);
            $this->db->update('ref_warna', array('active' => '2'));
			return $data['id_warna'];
        }
		
        public function update_warna($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_warna', $data['id_warna']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_warna', $data);
			return $data['id_warna'];
        }
		
		public function get_warna_by_id($id_warna)
		{
			if(empty($id_warna))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_warna a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_warna', $id_warna);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		

    }
