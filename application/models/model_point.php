<?php
    class Model_point extends CI_Model
    {
        public function getAllpoint($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_point a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_point  LIKE '%".$cari."%' OR a.kd_point  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_point($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_point) as recordsFiltered ");
			$this->db->from("ref_point");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_point ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_point) as recordsTotal ");
			$this->db->from("ref_point");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_point($data)
        {
            $this->db->insert('ref_point', $data);
			return $this->db->insert_id();
        }

        public function delete_point($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_point', $data['id_point']);
            $this->db->delete('ref_point');
            // $this->db->update('ref_point', array('active' => '2'));
			return $data['id_point'];
        }
		
        public function update_point($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_point', $data['id_point']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_point', $data);
			return $data['id_point'];
        }
		
		public function get_point_by_id($id_point)
		{
			if(empty($id_point))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_point a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_point', $id_point);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		

    }
