<?php	
class Mread extends CI_Model{

		function user_auth(){
		   $username = $this->input->post('username');
		   $password = $this->input->post('pass');
		   $otoritas = $this->input->post('otoritas');
		   
		  /// $user_valid = $this->db->escape($username);
		   //$pass_valid = $this->db->escape($password);
		   
		   $this->db->select('ID_USER, USERNAME, NAMA_LENGKAP, PASSWORD, ID_KATEGORI_USER, VALIDASI');
		   $this->db->from('TBL_USER');
		   $this->db->where('USERNAME',$username);
		   $this->db->where('PASSWORD',$password);
		   $this->db->where('ID_KATEGORI_USER',$otoritas);
		   $this->db->where('VALIDASI = 1');
		  // $this->db->limit(1);
			/*$sql = "SELECT ID_USER, USERNAME, NAMA_LENGKAP, PASSWORD, ID_KATEGORI_USER, VALIDASI FROM TBL_USER where USERNAME = ? AND PASSWORD = ? AND ID_KATEGORI_USER = ? ";
			$query = $this->db->query($sql, array($this->input->post('username', TRUE), $this->input->post('pass', TRUE), $this->input->post('otoritas', TRUE)));  */
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}	
		}
		function berita($id){
		   $this->db->select('*');
		   $this->db->from('BERITA');
		   $this->db->where('ID_BERITA',$id);
		   
		   $query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function pelatihan(){
		   $this->db->select('*');
		   $this->db->from('PELATIHAN');
		   $this->db->where('ID_PELATIHAN',$id);
		   
		   $query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function pelatihan_id($id){
		   $this->db->select('*');
		   $this->db->from('PELATIHAN');
		   $this->db->where('ID_PELATIHAN',$id);
		   
		   $query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function komentar($id){
			$this->db->select('KOMENTAR.ID_KOMENTAR, KOMENTAR.NAMA_KOMENTAR, KOMENTAR.EMAIL_KOMENTAR, KOMENTAR.ID_BERITA, KOMENTAR.ISI_KOMENTAR, KOMENTAR.STATUS, KOMENTAR.TANGGAL_KOMENTAR');
			$this->db->from('KOMENTAR');
			$this->db->where('KOMENTAR.ID_BERITA', $id);
			//$this->db->where('KOMENTAR.STATUS = 1');
			$this->db->order_by('KOMENTAR.ID_KOMENTAR','DESC');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function komentar_count_all($id){
			$this->db->select('KOMENTAR.ID_KOMENTAR, KOMENTAR.NAMA_KOMENTAR, KOMENTAR.EMAIL_KOMENTAR, KOMENTAR.ID_BERITA, KOMENTAR.ISI_KOMENTAR, KOMENTAR.STATUS, KOMENTAR.TANGGAL_KOMENTAR');
			$this->db->from('KOMENTAR');
			$this->db->where('KOMENTAR.ID_BERITA', $id);
			//$this->db->where('KOMENTAR.STATUS = 1');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function pelatihan_front(){
			$this->db->select('*');
			$this->db->from('PELATIHAN');
			$this->db->order_by('ID_PELATIHAN','ASC');
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function about(){
			$this->db->select('*');
			$this->db->from('ABOUT');
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function jadwal_front(){
			$this->db->select('*');
			$this->db->from('JADWAL_FRONT');
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function slider(){
			$this->db->select('*');
			$this->db->from('SLIDER');
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function getPelatihan(){
			$this->db->select('ID_PELATIHAN,NAMA_PELATIHAN, DESKRIPSI, STATUS');
			$this->db->from('PELATIHAN');
			$this->db->order_by('ID_PELATIHAN','ASC');
			$this->db->where('STATUS = 0');
			
		   $ambil = $this->db->get();
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function getKlinik(){
			$this->db->select('ID_PELATIHAN,NAMA_PELATIHAN, DESKRIPSI, STATUS');
			$this->db->from('PELATIHAN');
			$this->db->order_by('ID_PELATIHAN','ASC');
			$this->db->where('STATUS = 1');
			
		   $ambil = $this->db->get();
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_instruktur(){
			$query = $this->db->query("SELECT TBL_USER.ID_USER, TBL_USER.USERNAME, TBL_USER.PASSWORD, TBL_USER.ID_KATEGORI_USER, TBL_USER.NAMA_LENGKAP, TBL_USER.TEMPAT_LAHIR, TBL_USER.TANGGAL_LAHIR, TBL_USER.ALAMAT, TBL_USER.NOTEL, TBL_USER.AGAMA, TBL_USER.EMAIL, TBL_USER.STATUS_PEKERJAAN, TBL_USER.VALIDASI, TBL_USER.FOTO, TBL_USER.JENIS_KELAMIN, TBL_USER.EDUKASI, TBL_USER.NMOR_IDENTITAS,REGISTRASI_MENGAJAR.ID_REGISTRASI_MENGAJAR, REGISTRASI_MENGAJAR.ID_USER, REGISTRASI_MENGAJAR.HARI_MENGAJAR, REGISTRASI_MENGAJAR.JAM_MENGAJAR, REGISTRASI_MENGAJAR.ID_PELATIHAN FROM TBL_USER, REGISTRASI_MENGAJAR WHERE REGISTRASI_MENGAJAR.ROWID IN (SELECT MAX(ROWID) FROM REGISTRASI_MENGAJAR GROUP BY REGISTRASI_MENGAJAR.ID_PELATIHAN, REGISTRASI_MENGAJAR.ID_USER) AND TBL_USER.VALIDASI = 1 AND TBL_USER.ID_KATEGORI_USER = 2 AND TBL_USER.ID_USER = REGISTRASI_MENGAJAR.ID_USER ORDER BY REGISTRASI_MENGAJAR.ID_REGISTRASI_MENGAJAR DESC ");
			//$this->db->group_by('');
			
		//	$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_berita_left(){
			$this->db->select('BERITA.ID_BERITA, BERITA.TANGGAL, BERITA.JUDUL, BERITA.ISI_BERITA, BERITA.GAMBAR, BERITA.ID_KATEGORI_USER, KATEGORI_USER.NAMA_KATEGORI_USER');
			$this->db->from('BERITA');
			$this->db->join('KATEGORI_USER','BERITA.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			$this->db->order_by('BERITA.ID_BERITA','DESC');
			$this->db->limit(5, 0);
			
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
		}
	}
?>