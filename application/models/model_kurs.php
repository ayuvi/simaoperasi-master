<?php
    class Model_kurs extends CI_Model
    {
        public function getAllkurs($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.*");
            $this->db->from("ref_kurs a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.tanggal  LIKE '%".$cari."%' OR a.rupiah  LIKE '%".$cari."%' OR a.ringgit  LIKE '%".$cari."%' OR a.dollar LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_kurs($cari = null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_kurs) as recordsFiltered ");
			$this->db->from("ref_kurs");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$this->db->where("(tanggal  LIKE '%".$cari."%' OR rupiah  LIKE '%".$cari."%' OR ringgit  LIKE '%".$cari."%' OR dollar LIKE '%".$cari."%' ) ");
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_kurs) as recordsTotal ");
			$this->db->from("ref_kurs");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
			$this->db->where("active != '2' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_kurs($data)
        {
            $this->db->insert('ref_kurs', $data);
			return $this->db->insert_id();
        }

        public function delete_kurs($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kurs', $data['id_kurs']);
            $this->db->delete('ref_kurs');
			return $data['id_kurs'];
        }
		
        public function update_kurs($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kurs', $data['id_kurs']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_kurs', $data);
			return $data['id_kurs'];
        }
		
		public function get_kurs_by_id($id_kurs)
		{
			if(empty($id_kurs))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->from("ref_kurs a");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_kurs', $id_kurs);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

    }
