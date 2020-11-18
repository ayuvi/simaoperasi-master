<?php
    class Model_lmb extends CI_Model
    {
       public function getAlllmb($show=null, $start=null, $cari=null, $cabang, $pool, $armada, $trayek , $dt)
        {
            $this->db->select("a.*,  b.nm_bu,c.nm_pool");
            $this->db->from("tr_lmb a");
            $this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
            $this->db->join("ref_pool c", "a.id_pool = c.id_pool","left");
			$session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("(a.kd_armada LIKE '%".$cari."%' or  a.nm_driver LIKE '%".$cari."%') ");
			$this->db->where("(a.id_bu = '".$cabang."') ");
			$this->db->where("(a.id_pool = '".$pool."') ");
			$this->db->where("(a.tgl_lmb = '".$dt."') ");
            if($armada <> "kosong"){
				$this->db->where("(a.id_armada = '".$armada."') ");
			}
			if($trayek <> "kosong"){
				$this->db->where("(a.id_trayek = '".$trayek."') ");
			} 
			
			
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_lmb($search = null, $cabang, $pool, $dt)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(a.id_lmb) as recordsFiltered ");
			$this->db->from("tr_lmb a");
			$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
            $this->db->join("ref_pool c", "a.id_pool = c.id_pool","left");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where("(a.kd_armada LIKE '%".$search."%' or  b.nm_bu LIKE '%".$search."%') ");
            $this->db->where("(a.id_bu = '".$cabang."') ");
            $this->db->where("(a.id_pool = '".$pool."') ");
            $this->db->where("(a.tgl_lmb = '".$dt."') ");
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(a.id_lmb) as recordsTotal ");
			$this->db->from("tr_lmb a");
			$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
			$this->db->where("(a.id_bu = '".$cabang."') ");
            $this->db->where("(a.id_pool = '".$pool."') ");
            $this->db->where("(a.tgl_lmb = '".$dt."') ");
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}


		public function getAlllmbaccess($show=null, $start=null, $cari=null, $id_lmb)
        {
            $this->db->select("a.*, b.nm_komponen");
            $this->db->from("tr_lmb_access a");
            $this->db->join("ref_komponen b", "a.id_komponen = b.id_komponen", "left");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('a.id_lmb', $id_lmb);
            $this->db->where("(b.nm_komponen  LIKE '%".$cari."%' ) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function getAlllmbteknik($show=null, $start=null, $cari=null, $id_lmb)
        {
            $this->db->select("a.*, b.nm_komponen_teknik");
            $this->db->from("tr_lmb_teknik a");
            $this->db->join("ref_komponen_teknik b", "a.id_komponen_teknik = b.id_komponen_teknik", "left");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('a.id_lmb', $id_lmb);
            $this->db->where("(b.nm_komponen_teknik  LIKE '%".$cari."%' ) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function insert_lmb($data)
        {
            $this->db->insert('tr_lmb', $data);
			return $this->db->insert_id();
        }

        public function insert_lmb_access($data)
        {
            $this->db->insert('tr_lmb_access', $data);
            return $this->db->insert_id();
        }
		
		public function insert_lmb_teknik($data)
        {
            $this->db->insert('tr_lmb_teknik', $data);
            return $this->db->insert_id();
        }

       
        public function delete_lmb($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_lmb', $data['id_lmb']);
            $this->db->update('tr_lmb', array('active' => '2'));
			return $data['id_lmb'];
        }

        public function delete_lmb_access($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_lmb_access', $data['id_lmb_access']);
            $this->db->delete('tr_lmb_access');
            return $data['id_lmb_access'];
        }
		
		public function delete_lmb_teknik($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_lmb_teknik', $data['id_lmb_teknik']);
            $this->db->delete('tr_lmb_teknik');
            return $data['id_lmb_teknik'];
        }
		
        public function update_lmb($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_lmb', $data['id_lmb']);
			$this->db->where("active != '2' ");
            $this->db->update('tr_lmb', $data);
			return $data['id_lmb'];
        }

        public function update_lmb_access($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_lmb_access', $data['id_lmb_access']);
            $this->db->update('tr_lmb_access', $data);
            return $data['id_lmb_access'];
        }
		
		public function update_lmb_teknik($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_lmb_teknik', $data['id_lmb_teknik']);
            $this->db->update('tr_lmb_teknik', $data);
            return $data['id_lmb_teknik'];
        }

        
		
		public function get_lmb_by_id($id_lmb)
		{
			if(empty($id_lmb))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->select("a.id_lmb,  a.nm_lmb, a.active, a.id_bu, b.nm_bu, a.kd_lmb");
				$this->db->from("tr_lmb a");
            	$this->db->join("ref_bu b", "a.id_bu = b.id_bu","left");
				$this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_lmb', $id_lmb);
				$this->db->where("a.active != '2' ");
				return $this->db->get()->row_array();
			}
		}

		public function get_lmb_access_by_id($id_lmb_access)
        {
            if(empty($id_lmb_access))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->select("a.*, b.nm_komponen");
                $this->db->from("tr_lmb_access a");
                $this->db->join("ref_komponen b", "a.id_komponen = b.id_komponen", "left");
                $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
                $this->db->where('a.id_lmb_access', $id_lmb_access);
                return $this->db->get()->row_array();
            }
        }
		
		public function get_lmb_teknik_by_id($id_lmb_teknik)
        {
            if(empty($id_lmb_teknik))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->select("a.*, b.nm_komponen_teknik");
                $this->db->from("tr_lmb_teknik a");
                $this->db->join("ref_komponen_teknik b", "a.id_komponen_teknik = b.id_komponen_teknik", "left");
                $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
                $this->db->where('a.id_lmb_teknik', $id_lmb_teknik);
                return $this->db->get()->row_array();
            }
        }

		

		// public function bu_combobox()
  //       {
  //           $this->db->from("ref_bu");
  //           $session = $this->session->userdata('login');
  //           $this->db->where('id_perusahaan', $session['id_perusahaan']);
  //           $this->db->where('active', 1);
  //           return $this->db->get();
  //       }

        public function bu_combobox()
        {
            $session = $this->session->userdata('login');
            $this->db->from("ref_bu_access b");
            $this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
            $this->db->where('b.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('b.id_user', $session['id_user']);
            $this->db->where('b.active', 1);
            
            return $this->db->get();
        }

        public function combobox_user()
        {
            $this->db->from("ref_user");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

        public function combobox_armada()
        {
            $this->db->from("ref_armada");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

        public function combobox_trayek()
        {
            $this->db->from("ref_trayek");
            $this->db->where("kd_trayek <> '' ");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

        public function combobox_komponen()
        {
            $this->db->from("ref_komponen");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }
		
		 public function combobox_komponen_teknik()
        {
            $this->db->from("ref_komponen_teknik");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

		public function get_cabang()
		{
			$query = $this->db->query("SELECT * FROM ref_bu ORDER BY id_bu ASC");
			$dropdowns = $query->result();
			if(! $dropdowns){
				$finaldropdown[''] = " - Pilih - ";
				return $finaldropdown;
			}
			else{
				foreach ($dropdowns as $dropdown){
					$dropdownlist[$dropdown->id_bu] = $dropdown->nm_bu;
				}
				$finaldropdown = $dropdownlist;
				$finaldropdown[''] = " - Pilih - ";
				return $finaldropdown;
			}
		}
		
		public function get_chain_pool($id='')
		{
			$query = $this->db->query("SELECT * FROM ref_pool WHERE id_bu = '$id' ");
			return $data = $query->result();
		}
		
		public function get_chain_armada($id='')
		{
			$query = $this->db->query("SELECT * FROM ref_armada WHERE id_bu = '$id' ");
			return $data = $query->result();
		}
		
		public function get_chain_trayek($id='')
		{
			$query = $this->db->query("SELECT * FROM ref_trayek WHERE id_bu = '$id' ");
			return $data = $query->result();
		}
		
		public function getAlllmbrit($show=null, $start=null, $cari=null, $id_lmb)
        {
            $this->db->select("a.id_rit, a.rit, a.pnp, a.kd_trayek, a.harga, a.total, a.note, b.nm_driver, DATE_FORMAT(a.cdate,'%d-%m-%Y') cdate ");
            $this->db->from("tr_rit a");
            $this->db->join("tr_lmb b", "a.id_lmb = b.id_lmb", "left");
            $session = $this->session->userdata('login');
            $this->db->where('b.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('a.id_lmb', $id_lmb);
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function insert_lmb_rit($data)
        {
            $this->db->insert('tr_rit', $data);
            return $this->db->insert_id();
        }
		
		public function update_lmb_rit($data)
        {
			$session = $this->session->userdata('login');
            $this->db->where('id_rit', $data['id_rit']);
            $this->db->update('tr_rit', $data);
            return $this->db->affected_rows();
        }
		
		public function get_lmb_rit_by_id($id_rit)
        {
            if(empty($id_rit))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->select("id_lmb, id_rit, type_rit, rit, pnp, kd_trayek, pnp, note, manual");
                $this->db->from("tr_rit");
                $this->db->where("id_rit", $id_rit);
                return $this->db->get()->row_array();
            }
        }
		
		public function delete_lmb_rit($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_rit', $data['id_rit']);
            $this->db->delete('tr_rit');
            return $data['id_rit'];
        }
		
    }
