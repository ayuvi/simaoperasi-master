<?php
    class Model_layout extends CI_Model
    {
        public function getAlllayout($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_layout, a.nm_layout, a.active");
            $this->db->from("ref_layout a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.nm_layout  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_layout($search = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_layout) as recordsFiltered ");
			$this->db->from("ref_layout");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->like("nm_layout ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_layout) as recordsTotal ");
			$this->db->from("ref_layout");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}

		public function getAlllayoutdetail($show=null, $start=null, $cari=null, $id_layout)
        {
            $this->db->select("a.*");
            $this->db->from("ref_layout_detail a");
            // $session = $this->session->userdata('login');
            // $this->db->where("(a.nm_layout  LIKE '%".$cari."%' ) ");
            $this->db->where("a.id_layout",$id_layout);
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_layoutdetail($search = null, $id_layout)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_layout_detail) as recordsFiltered ");
			$this->db->from("ref_layout_detail");
			$this->db->where("id_layout",$id_layout);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_layout_detail) as recordsTotal ");
			$this->db->from("ref_layout_detail");
			$this->db->where("id_layout",$id_layout);
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_layout($data)
        {
            $this->db->insert('ref_layout', $data);
			return $this->db->insert_id();
        }

        public function insert_layout_detail($data)
        {
            $this->db->insert('ref_layout_detail', $data);
			return $this->db->insert_id();
        }

        public function update_layout($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_layout', $data['id_layout']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_layout', $data);
			return $data['id_layout'];
        }

        public function update_layout_detail($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_layout_detail', $data['id_layout_detail']);
            $this->db->update('ref_layout_detail', $data);
			return $data['id_layout_detail'];
        }

        public function delete_layout($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_layout', $data['id_layout']);
            $this->db->update('ref_layout', array('active' => '2'));
			return $data['id_layout'];
        }

        public function delete_layout_detail($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_layout_detail', $data['id_layout_detail']);
            $this->db->delete('ref_layout_detail');
			return $data['id_layout_detail'];
        }
		
		public function get_layout_by_id($id_layout)
		{
			if(empty($id_layout))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_layout a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_layout', $id_layout);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		public function get_layout_by_layout_detail($id_layout_detail)
		{
			if(empty($id_layout_detail))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_layout_detail a");
				$this->db->where('a.id_layout_detail', $id_layout_detail);
				return $this->db->get()->row_array();
			}
		}

		public function design_layout($id_layout)
        {
            $session = $this->session->userdata('login');
            $this->db->from("ref_layout_detail a");
            $this->db->where('a.id_layout', $id_layout);
            
            return $this->db->get();
        }

		

    }
