<?php
    class Model_komponen extends CI_Model
    {
        public function getAllkomponen($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_komponen a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_komponen  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            $this->db->order_by('CASE WHEN a.type_komponen="PLUS" THEN 1 ELSE 2 END');
            $this->db->order_by('a.id_komponen','ASC');
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_komponen($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_komponen) as recordsFiltered ");
			$this->db->from("ref_komponen");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_komponen ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_komponen) as recordsTotal ");
			$this->db->from("ref_komponen");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_komponen($data)
        {
            $this->db->insert('ref_komponen', $data);
			return $this->db->insert_id();
        }

        public function delete_komponen($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_komponen', $data['id_komponen']);
            $this->db->update('ref_komponen', array('active' => '2'));
			return $data['id_komponen'];
        }
		
        public function update_komponen($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_komponen', $data['id_komponen']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_komponen', $data);
			return $data['id_komponen'];
        }
		
		public function get_komponen_by_id($id_komponen)
		{
			if(empty($id_komponen))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_komponen a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_komponen', $id_komponen);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		

    }
