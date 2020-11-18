<?php
    class Model_layanan extends CI_Model
    {
        public function getAlllayanan($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_layanan, a.nm_layanan, a.active");
            $this->db->from("ref_layanan a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_layanan  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_layanan($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_layanan) as recordsFiltered ");
			$this->db->from("ref_layanan");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_layanan ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_layanan) as recordsTotal ");
			$this->db->from("ref_layanan");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_layanan($data)
        {
            $this->db->insert('ref_layanan', $data);
			return $this->db->insert_id();
        }

        public function delete_layanan($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_layanan', $data['id_layanan']);
            $this->db->update('ref_layanan', array('active' => '2'));
			return $data['id_layanan'];
        }
		
        public function update_layanan($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_layanan', $data['id_layanan']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_layanan', $data);
			return $data['id_layanan'];
        }
		
		public function get_layanan_by_id($id_layanan)
		{
			if(empty($id_layanan))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_layanan a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_layanan', $id_layanan);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		

    }
