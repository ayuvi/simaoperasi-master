<?php
    class Model_vm extends CI_Model
    {
    	function __construct()
		{
		    parent::__construct();
		    // $this->db2 = $this->load->database('default2',TRUE);
		}



        public function get_driver($rfid){
			if(empty($rfid))
			{
				return array();
			}
			else
			{
				$qry 		= "SELECT a.id_pegawai as id_driver, a.nm_pegawai as nm_driver, a.rfid 
								FROM hris.ref_pegawai a WHERE a.rfid LIKE '%$rfid%'";
				$sql_ 			= $this->db->query($qry);
				$cekUser 		= $sql_->num_rows();
				if($cekUser == 0){
					return "0";
				}else{
					return $sql_;
				}
				
			}
		}

		public function getJadwal($id_driver){
			date_default_timezone_set("Asia/Jakarta");
			if(empty($id_driver))
			{
				return array();
			}
			else
			{
				$qry 			= "SELECT *,kd_armada as armada, kd_trayek nm_trayek,'1' jns FROM tr_lmb WHERE id_driver='$id_driver' AND active='1'";
				$sql_tgl 		= $this->db->query($qry);
				$cekUser 		= $sql_tgl->num_rows();
				if($cekUser == 0){
					$qry 			= "SELECT a.*,'2' jns FROM ms_jadwal a WHERE a.driver1='$id_driver' 
										AND a.tanggal = (select b.tgl_jadwal from tr_jadwal_pool b where b.id_pool = a.id_pool )
										ORDER BY a.tanggal DESC LIMIT 1";
					$sql_def 		= $this->db->query($qry);
					$cekUser 		= $sql_def->num_rows();
						if($cekUser == 0){
							return '0';
					}else{
						return $sql_def;
					}
				}else{
					return $sql_tgl;
				}			
			}
		}

		public function getdataLmb($id_lmb,$id_lmb2){
				$qry 	= "select * FROM tr_rit WHERE id_lmb  IN ('$id_lmb','$id_lmb2') ORDER BY CAST(rit as SIGNED)";
				//echo $qry;
				$sql 	= $this->db->query($qry);
				return $sql;
		}

		public function gettotalLmb($id_lmb,$id_lmb2){
				$qry 	= "select SUM(pnp) pnp, SUM(total) total FROM tr_rit WHERE id_lmb IN ('$id_lmb','$id_lmb2')";
				$sql 	= $this->db->query($qry);
				return $sql;
		}

		public function createLmb($id_jadwal){
			date_default_timezone_set("Asia/Jakarta");
			$tanggal = date("Y-m-d H:i:s");
			if(empty($id_jadwal)){
				return array();
			} else {
				$qry 	= "INSERT INTO tr_lmb(id_jadwal,rit,cuser,active,jam_in) VALUES ($id_jadwal,'0','0','1','$tanggal')";
				$sql 	= $this->db->query($qry);
				if ($this->db->affected_rows() > 0) {
					return '1';
				}else{
					return '0';
				}
				//return $sql;
			}
		}

		public function checkOut($id_lmb,$id_pool){
			date_default_timezone_set("Asia/Jakarta");
			$tanggal = date("Y-m-d H:i:s");
			if(empty($id_lmb)){
				return array();
			} else {
				$qry 	= "UPDATE tr_lmb SET active='2', id_pool='$id_pool',jam_out='$tanggal' WHERE id_lmb='$id_lmb'";
				$sql 	= $this->db->query($qry);
				if ($this->db->affected_rows() > 0) {
					return '1';
				}else{
					return '0';
				}
				//return $sql;
			}
		}

		
		public function datapool($id_pool){
			if(empty($id_pool)){
				return array();
			} else {
				$qry 	= "SELECT a.nm_pool, b.nm_bu 
							FROM ref_pool a
							LEFT JOIN ref_bu b ON a.id_bu=b.id_bu 
							WHERE id_pool='$id_pool'";
				$sql 	= $this->db->query($qry);
				if ($this->db->affected_rows() > 0) {
					return $sql->row("nm_pool");
				}else{
					return 'POOL TIDAK TERIDENTIFIKASI';
				}
				//return $sql;
			}
		}
		
		public function datacabang($id_pool){
				if(empty($id_pool)){
					return array();
				} else {
					$qry 	= "SELECT a.nm_pool, b.nm_bu 
								FROM ref_pool a
								LEFT JOIN ref_bu b ON a.id_bu=b.id_bu 
								WHERE id_pool='$id_pool'";
					$sql 	= $this->db->query($qry);
					if ($this->db->affected_rows() > 0) {
						return $sql->row("nm_bu");
					}else{
						return 'CABANG TIDAK TERIDENTIFIKASI';
					}
					//return $sql;
				}
			}
				

		
		
		
		

		

    }
