<?php
    class Model_survei extends CI_Model
    {
       public function getAllsurvei($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_survei, a.nm_survei, a.cuser, a.cdate , a.status, b.nm_user");
            $this->db->from("tr_survei a");
            $this->db->join("ref_user b", "a.cuser = b.id_user","left");
			$session = $this->session->userdata('login');
            $this->db->where('a.status !=', 2);
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("( a.nm_survei LIKE '%".$cari."%' or  b.nm_user LIKE '%".$cari."%') ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function getAllisisurvei($show=null, $start=null, $cari=null)
        {
            $this->db->select("a.id_survei, a.nm_survei, a.cuser, a.cdate , a.status, b.nm_user");
            $this->db->from("tr_survei a");
            $this->db->join("ref_user b", "a.cuser = b.id_user","left");
			$session = $this->session->userdata('login');
            $this->db->where('a.status !=', 2);
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where("( a.nm_survei LIKE '%".$cari."%' or  b.nm_user LIKE '%".$cari."%') ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function getAllsurveiaccess($show=null, $start=null, $cari=null, $id_survei)
        {
            $this->db->select("a.id_survei_access, a.id_user, b.nm_user, a.active");
            $this->db->from("tr_survei_access a");
            $this->db->join("ref_user b", "a.id_user = b.id_user", "left");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('a.id_survei', $id_survei);
            $this->db->where("(b.nm_user  LIKE '%".$cari."%' ) ");
            $this->db->where("a.active IN (0, 1) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }

        public function getAllnilai($show=null, $start=null, $cari=null, $id_survei)
        {
            
            $this->db->from("tr_survei_detail a");
            $this->db->join("ref_cek c", "a.id_cek = c.id_cek","left");

            $session = $this->session->userdata('login');
            $this->db->where('a.id_survei', $id_survei);
			
			$this->db->where("(a.nm_cek  LIKE '%".$cari."%' ) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function getAllisinilai($show=null, $start=null, $cari=null, $id_session)
        {
            $this->db->select("a.id_cek, a.id_survei_detail, a.nm_cek, a.skors, a.nm_skors");
            $this->db->from("tr_survei_responden a");
			// $this->db->join("ref_nilai_cek b", "a.id_nilai_cek = b.id_nilai_cek","left");
            // $this->db->join("ref_cek c", "a.id_cek = c.id_cek","left");

            $session = $this->session->userdata('login');
            $this->db->where('a.id_session', $id_session);
			
			$this->db->where("(a.nm_cek  LIKE '%".$cari."%' ) ");
            if ($show == null && $start == null) {
            } else {
                $this->db->limit($show, $start);
            }

            return $this->db->get();
        }
		
		public function get_count_nilai($show=null, $start=null, $cari=null, $id_survei)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(a.id_survei_detail) as recordsFiltered ");
			$this->db->from("tr_survei_detail a");
            $this->db->where('a.id_survei', $id_survei);
			$this->db->where("(a.nm_cek  LIKE '%".$cari."%' ) ");
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(a.id_survei_detail) as recordsTotal ");
			$this->db->from("tr_survei_detail a");
			$this->db->where('a.id_survei', $id_survei);
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}
		
		public function get_count_isi_nilai($show=null, $start=null, $cari=null, $id_session)
		{
			$count = array();
			$session = $this->session->userdata('login');
			
			$this->db->select(" COUNT(a.id_survei_detail) as recordsFiltered ");
			$this->db->from("tr_survei_responden a");
            $this->db->where('a.id_session', $id_session);
			$this->db->where("(a.nm_cek  LIKE '%".$cari."%' ) ");
			$count['recordsFiltered'] = $this->db->get()->row_array()['recordsFiltered'];
			
			$this->db->select(" COUNT(a.id_survei_detail) as recordsTotal ");
			$this->db->from("tr_survei_responden a");
			$this->db->where('a.id_session', $id_session);
			$count['recordsTotal'] = $this->db->get()->row_array()['recordsTotal'];
			
			return $count;
		}

        public function getAlltotalnilai( $id_survei)
        {
            $this->db->select_sum('skors');
            $this->db->from("tr_survei_detail a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_survei', $id_survei);
            return $this->db->get()->row_array();
        }
		
		public function getAlltotalisinilai( $id_session)
        {
            $this->db->select_sum('skors');
            $this->db->from("tr_survei_responden a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_session', $id_session);
            return $this->db->get()->row_array();
        }

        public function getAlltotalcritical( $id_survei)
        {
            $this->db->select_sum('b.critical');
            $this->db->from("tr_survei_detail a");
            $this->db->join("ref_cek b", "a.id_cek = b.id_cek", "left");
            $session = $this->session->userdata('login');
            $this->db->where('b.critical', 1);
            $this->db->where('a.skors', 0);
            $this->db->where('a.id_survei', $id_survei);
            return $this->db->get()->row_array();
        }
		
		public function getAlltotalisicritical( $id_session)
        {
            $this->db->select_sum('b.critical');
            $this->db->from("tr_survei_responden a");
            $this->db->join("ref_cek b", "a.id_cek = b.id_cek", "left");
            $session = $this->session->userdata('login');
            $this->db->where('b.critical', 1);
            $this->db->where('a.skors', 0);
            $this->db->where('a.id_session', $id_session);
            return $this->db->get()->row_array();
        }
		

        public function getnilaicek($id_cek)
        {
            
            $this->db->from("ref_nilai_cek a");
            $session = $this->session->userdata('login');
            $this->db->where('a.id_cek', $id_cek);
           

            return $this->db->get();
        }
		
		
		public function insert_survei($data)
        {
            $this->db->insert('tr_survei', $data);
			return $this->db->insert_id();
        }
		
		public function insert_survei_access($data)
        {
            $this->db->insert('tr_survei_access', $data);
            return $this->db->insert_id();
        }

        public function delete_survei($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_survei', $data['id_survei']);
            $this->db->delete('tr_survei');
			return $data['id_survei'];
        }
		
        public function update_survei($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_survei', $data['id_survei']);
			$this->db->where("status != '2' ");
            $this->db->update('tr_survei', $data);
			return $data['id_survei'];
        }
		
		public function update_survei_access($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_survei_access', $data['id_survei_access']);
            $this->db->where("active != '2' ");
            $this->db->update('ref_survei_access', $data);
            return $data['id_survei_access'];
        }

        public function update_survei_nilai($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_survei_detail', $data['id_survei_detail']);
            $this->db->where("status != '2' ");
            $this->db->update('tr_survei_detail', $data);
            return $data['id_survei_detail'];
        }
		
		public function update_survei_isi_nilai($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('id_survei_detail', $data['id_survei_detail']);
            $this->db->where('id_session', $data['id_session']);
            $this->db->where("status != '2' ");
            $this->db->update('tr_survei_responden', $data);
            return $data['id_session'];
        }
		
		public function insert_data_survei($data)
        {
			$this->db->insert('tr_responden', $data);
			return $this->db->insert_id();
        }

		
		public function get_survei_by_id($id_survei)
		{
			if(empty($id_survei))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->select("a.id_survei,  a.nm_survei, a.cuser, a.cdate , a.status, b.nm_user");
				$this->db->from("tr_survei a");
            	$this->db->join("ref_user b", "a.cuser = b.id_user","left");
	            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_survei', $id_survei);
				$this->db->where("a.status != '2' ");
				return $this->db->get()->row_array();
			}
		}
		
		public function get_isi_survei_by_id($id_sessoin)
		{
			if(empty($id_session))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				$this->db->select("a.id_survei,  a.nm_survei, a.cuser, a.cdate , a.status, b.nm_user");
				$this->db->from("tr_survei a");
            	$this->db->join("ref_user b", "a.cuser = b.id_user","left");
	            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_session', $id_session);
				$this->db->where("a.status != '2' ");
				return $this->db->get()->row_array();
			}
		}
		
		public function get_survei_detail_id($id_survei_detail)
		{
			if(empty($id_survei_detail))
			{
				return array();
			}
			else
			{
				$session = $this->session->userdata('login');
				
				$this->db->from("tr_survei_detail a");
            	
	            $this->db->where('a.id_perusahaan', $session['id_perusahaan']);
				$this->db->where('a.id_survei_detail', $id_survei_detail);
				
				return $this->db->get()->row_array();
			}
		}
		
		public function cek_isi_survei($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_session', $data['id_session']);
            $this->db->where('skors is not null');
			$data = $this->db->count_all_results("tr_survei_responden");
            // $this->db->update('tr_survei_responden', $data);
            // print_r($data);exit();
			return $data;
        }
		
		public function update_header_responden($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_session', $data['id_session']);
            $this->db->update('tr_responden', $data);
            return $this->db->affected_rows();
        }
		
		public function cek_isi_template($data)
        {
            $session = $this->session->userdata('login');
            $this->db->where('id_session', $data['id_session']);
            $data = $this->db->count_all_results("tr_survei_responden");
            // $this->db->update('tr_survei_responden', $data);
            // print_r($data);exit();
			return $data;
        }
		
		public function combobox_user()
        {
            $this->db->from("ref_user");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

        public function combobox_bu()
        {
            $session = $this->session->userdata('login');
            $this->db->from("ref_bu_access b");
            $this->db->join("ref_bu a", "b.id_bu = a.id_bu", "left");
            $this->db->where('b.id_perusahaan', $session['id_perusahaan']);
            $this->db->where('b.id_user', $session['id_user']);
            $this->db->where('b.active', 1);
            
            return $this->db->get();
        }

        public function combobox_kendaraan()
        {
            $this->db->from("ref_kendaraan");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

        public function combobox_driver()
        {
            $this->db->from("ref_driver");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }
		
		public function bu_combobox()
        {
            $this->db->from("ref_bu");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }
		
		public function pertanyaan_combobox()
        {
            $this->db->from("ref_cek");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

		public function posisi_combobox()
        {
            $this->db->from("ref_posisi");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }

		public function pendidikan_combobox()
        {
            $this->db->from("ref_pendidikan");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }
		
		public function golongan_combobox()
        {
            $this->db->from("ref_golongan");
            $session = $this->session->userdata('login');
            $this->db->where('id_perusahaan', $session['id_perusahaan']);
            $this->db->where('active', 1);
            return $this->db->get();
        }
		
		public function cekNIP($nip)
		{
			$sql = "SELECT nip_responden FROM tr_responden WHERE nip_responden = '".$nip."';";
			$data = $this->db->query($sql);
			return $data->row();
		}
		
		public function cekNomor($bu,$nip)
		{
			$sql = "SELECT nip_responden FROM tr_responden WHERE id_bu = '".$bu."' AND nip_responden = '".$nip."' AND status = '1';";
			$data = $this->db->query($sql);
			return $data->row();
		}

        public function cekSurvei($id_survei,$nip,$password)
        {
            // $sql = "SELECT id_session FROM tr_responden WHERE id_survei = '".$id_survei."' AND nip_responden = '".$nip."' AND password = '".$password."';";
            // $data = $this->db->query($sql);
            // return $data->result();

            if(empty($id_survei))
            {
                return array();
            }
            else
            {
                $session = $this->session->userdata('login');
                $this->db->select("a.id_session");
                $this->db->from("tr_responden a");
                $this->db->where('a.id_survei', $id_survei);
                $this->db->where('a.nip_responden', $nip);
                $this->db->where('a.password', $password);
                
                return $this->db->get()->row_array();
            }
        }
		
    }
