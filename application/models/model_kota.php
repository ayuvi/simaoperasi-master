<?php
    class Model_kota extends CI_Model
    {
		
		
        public function getAllkota($show=null, $start=null, $cari=null, $id_prov)
        {
            
            $this->db->select("a.*, b.nama nama_prov");
            $this->db->from("ref_kota a");
            $this->db->join("ref_prov b", "a.id_prov = b.id_prov","left");
            if($id_prov !=0){$this->db->where('a.id_prov', $id_prov);}
            $this->db->where("(a.nama  LIKE '%".$cari."%' ) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_kota($search = null, $id_prov)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_kota) as recordsFiltered ");
			$this->db->from("ref_kota");
			if($id_prov !=0){$this->db->where('id_prov', $id_prov);}
			$this->db->like("nama ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_kota) as recordsTotal ");
			$this->db->from("ref_kota");
			if($id_prov !=0){$this->db->where('id_prov', $id_prov);}
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function insert_kota($data)
        {
            $this->db->insert('ref_kota', $data);
			return $this->db->insert_id();
        }

        public function delete_kota($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $data['id_kota']);
            $this->db->update('ref_kota', array('active' => '2'));
			return $data['id_kota'];
        }
		
        public function update_kota($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $data['id_kota']);
			$this->db->where("active != '2' ");
            $this->db->update('ref_kota', $data);
			return $data['id_kota'];
        }

        
		
		public function get_kota_by_id($id_kota)
		{
			if(empty($id_kota))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->select("a.*, b.nm_bu");
				$this->db->from("ref_kota a");
				$this->db->join("ref_bu b","a.id_bu = b.id_bu","LEFT");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_kota', $id_kota);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		public function getAllkotafoto($show=null, $start=null, $cari=null, $id_kota=null)
        {
            
            $this->db->select("a.*");
            $this->db->from("ref_kota_foto a");
            // $this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $id_kota);
            // $this->db->where('a.id_bu', $id_bu);
            // $this->db->where("(a.kd_kota  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active",1);
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_kotafoto($search = null, $id_kota=null)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(id_kota_foto) as recordsFiltered ");
			$this->db->from("ref_kota_foto");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $id_kota);
			$this->db->where("active = '1' ");
			// $this->db->like("kd_kota ", $search);
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(id_kota_foto) as recordsTotal ");
			$this->db->from("ref_kota_foto");
			$this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $id_kota);
            // $this->db->where('id_bu', $id_bu);
			$this->db->where("active = '1' ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}

		public function insert_kota_foto($data)
        {
            $this->db->insert('ref_kota_foto', $data);
			return $this->db->insert_id();
        }

        public function get_foto_by_id($id_kota_foto)
		{
			if(empty($id_kota_foto))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->select("a.*");
				$this->db->from("ref_kota_foto a");
				$this->db->where('a.id_kota_foto', $id_kota_foto);
				return $this->db->get()->row_array();
			}
		}

		public function delete_foto($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota_foto', $data['id_kota_foto']);
            $this->db->delete('ref_kota_foto');
			return $data['id_kota_foto'];
        }

        public function getAllkotastnk($show=null, $start=null, $cari=null, $id_kota=null)
        {
            
            $this->db->select("a.*");
            $this->db->from("ref_kota_stnk a");
            // $this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $id_kota);
            // $this->db->where('a.id_bu', $id_bu);
            // $this->db->where("(a.kd_kota  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active",1);
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
        
        public function get_count_kotastnk($search = null, $id_kota=null)
        {
            $count = array();
            $session = $this->session->userdata('login');
            
            $this->db->select(" COUNT(id_kota_stnk) as recordsFiltered ");
            $this->db->from("ref_kota_stnk");
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $id_kota);
            $this->db->where("active = '1' ");
            // $this->db->like("kd_kota ", $search);
            $count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
            
            $this->db->select(" COUNT(id_kota_stnk) as recordsTotal ");
            $this->db->from("ref_kota_stnk");
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota', $id_kota);
            // $this->db->where('id_bu', $id_bu);
            $this->db->where("active = '1' ");
            $count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
            
            return $count;
        }

        public function insert_kota_stnk($data)
        {
            $this->db->insert('ref_kota_stnk', $data);
            return $this->db->insert_id();
        }

        public function get_stnk_by_id($id_kota_stnk)
        {
            if(empty($id_kota_stnk))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->select("a.*");
                $this->db->from("ref_kota_stnk a");
                $this->db->where('a.id_kota_stnk', $id_kota_stnk);
                return $this->db->get()->row_array();
            }
        }

        public function delete_stnk($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_kota_stnk', $data['id_kota_stnk']);
            $this->db->delete('ref_kota_stnk');
            return $data['id_kota_stnk'];
        }

		public function combobox_prov()
        {
            $this->db->from("ref_prov b");
            return $this->db->get();
        }

  
    }
