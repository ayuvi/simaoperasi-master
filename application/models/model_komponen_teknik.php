<?php
    class Model_komponen_teknik extends CI_Model
    {
        public function getAllkomponen_teknik($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_komponen_teknik a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_komponen_teknik  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_komponen_teknik($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_komponen_teknik) as recordsFiltered ");
			$this->db->from("ref_komponen_teknik");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_komponen_teknik ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_komponen_teknik) as recordsTotal ");
			$this->db->from("ref_komponen_teknik");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_komponen_teknik($data)
        {
            $this->db->insert('ref_komponen_teknik', $data);
			return $this->db->insert_id();
        }

        public function delete_komponen_teknik($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_komponen_teknik', $data['id_komponen_teknik']);
            $this->db->update('ref_komponen_teknik', array('active' => '2'));
			return $data['id_komponen_teknik'];
        }
		
        public function update_komponen_teknik($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_komponen_teknik', $data['id_komponen_teknik']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_komponen_teknik', $data);
			return $data['id_komponen_teknik'];
        }
		
		public function get_komponen_teknik_by_id($id_komponen_teknik)
		{
			if(empty($id_komponen_teknik))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_komponen_teknik a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_komponen_teknik', $id_komponen_teknik);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		

    }
