<?php
    class Model_segment extends CI_Model
    {
        public function getAllsegment($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_segment a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_segment  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_segment($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_segment) as recordsFiltered ");
			$this->db->from("ref_segment");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_segment ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_segment) as recordsTotal ");
			$this->db->from("ref_segment");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_segment($data)
        {
            $this->db->insert('ref_segment', $data);
			return $this->db->insert_id();
        }

        public function delete_segment($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_segment', $data['id_segment']);
            $this->db->update('ref_segment', array('active' => '2'));
			return $data['id_segment'];
        }
		
        public function update_segment($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_segment', $data['id_segment']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_segment', $data);
			return $data['id_segment'];
        }
		
		public function get_segment_by_id($id_segment)
		{
			if(empty($id_segment))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_segment a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_segment', $id_segment);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

    }
