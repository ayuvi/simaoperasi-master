<?php
    class Model_ukuran extends CI_Model
    {
        public function getAllukuran($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_ukuran, a.nm_ukuran, a.active");
            $this->db->from("ref_ukuran a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_ukuran  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_ukuran($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_ukuran) as recordsFiltered ");
			$this->db->from("ref_ukuran");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_ukuran ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_ukuran) as recordsTotal ");
			$this->db->from("ref_ukuran");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_ukuran($data)
        {
            $this->db->insert('ref_ukuran', $data);
			return $this->db->insert_id();
        }

        public function delete_ukuran($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_ukuran', $data['id_ukuran']);
            $this->db->update('ref_ukuran', array('active' => '2'));
			return $data['id_ukuran'];
        }
		
        public function update_ukuran($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_ukuran', $data['id_ukuran']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_ukuran', $data);
			return $data['id_ukuran'];
        }
		
		public function get_ukuran_by_id($id_ukuran)
		{
			if(empty($id_ukuran))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_ukuran a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_ukuran', $id_ukuran);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		

    }
