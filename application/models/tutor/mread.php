<?php	
class Mread extends CI_Model{
		function mengajar(){
			$this->db->select('R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.HARI_MENGAJAR, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.STATUS_MENGAJAR, R.VALIDASI, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, P.NAMA_PELATIHAN, U.NAMA_LENGKAP');
			$this->db->from('REGISTRASI_MENGAJAR R');
			$this->db->join('TBL_USER U','R.ID_USER = U.ID_USER');
			$this->db->join('PELATIHAN P','R.ID_PELATIHAN = P.ID_PELATIHAN');
			$this->db->where('R.VALIDASI', 1);
			$this->db->order_by('R.JAM_MENGAJAR', 'DESC');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function check_upload_file($id){
			$this->db->select('UPLOAD_FILE');
			$this->db->from('TBL_USER');
			$this->db->where('ID_USER', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function modul_tutor(){
			$this->db->select('M.ID_MODULE, M.NAMA_MODULE, M.ID_PELATIHAN, M.JUDUL_MODULE, P.NAMA_PELATIHAN, M.ID_KATEGORI_USER');
			$this->db->from('MODULE_PELATIHAN M, PELATIHAN P');
			$this->db->where('M.ID_PELATIHAN = P.ID_PELATIHAN');
			$this->db->where('M.ID_KATEGORI_USER = 2');
			$this->db->order_by('M.ID_PELATIHAN','ASC');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function check_ambil_quisioner($id_user, $id_pelatihan){
			$this->db->select('HASIL_JAWABAN_QUISIONER.ID_HASIL_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_PELATIHAN, HASIL_JAWABAN_QUISIONER.ID_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_USER, TBL_USER.ID_USER, PELATIHAN.ID_PELATIHAN');
			$this->db->from('HASIL_JAWABAN_QUISIONER');
			$this->db->where('HASIL_JAWABAN_QUISIONER.ID_PELATIHAN',$id_pelatihan);
			$this->db->where('HASIL_JAWABAN_QUISIONER.ID_USER',$id_user );
			$this->db->join('TBL_USER','HASIL_JAWABAN_QUISIONER.ID_USER = TBL_USER.ID_USER');
			$this->db->join('PELATIHAN','HASIL_JAWABAN_QUISIONER.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_kategori_quisioner($id){
			$this->db->select('QUISIONER.ID_QUISIONER, QUISIONER.NAMA_QUISIONER, QUISIONER.KETERANGAN, QUISIONER.ID_KATEGORI_USER, QUISIONER.ID_PELATIHAN, QUISIONER.JUMLAH_SOAL_QUISIONER');
			$this->db->from('QUISIONER');
			$this->db->where('QUISIONER.ID_PELATIHAN',$id);
			$this->db->where('QUISIONER.ID_KATEGORI_USER = 2');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function soal_quisioner($id){
			$this->db->select('SOAL_QUISIONER.ID_SOAL_QUISIONER, SOAL_QUISIONER.ID_QUISIONER, SOAL_QUISIONER.ISI_SOAL_QUISIONER, SOAL_QUISIONER.ID_KATEGORI_USER');
			$this->db->from('SOAL_QUISIONER');
			$this->db->where('SOAL_QUISIONER.ID_QUISIONER',$id);
			$this->db->join('QUISIONER','SOAL_QUISIONER.ID_QUISIONER = QUISIONER.ID_QUISIONER');
			$this->db->where('SOAL_QUISIONER.ID_KATEGORI_USER = 2');
			$this->db->join('KATEGORI_USER','SOAL_QUISIONER.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function data_quisioner($id){
			$this->db->select('*');
			$this->db->from('QUISIONER');
			$this->db->where('ID_QUISIONER',$id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function modul_member(){
			$this->db->select('M.ID_MODULE, M.NAMA_MODULE, M.ID_PELATIHAN, M.JUDUL_MODULE, P.NAMA_PELATIHAN, M.ID_KATEGORI_USER, U.ID_KATEGORI_USER');
			$this->db->from('MODULE_PELATIHAN M, PELATIHAN P, TBL_USER U');
			$this->db->where('M.ID_PELATIHAN = P.ID_PELATIHAN');
			$this->db->where('M.ID_KATEGORI_USER = 1');
			$this->db->where('M.ID_KATEGORI_USER = U.ID_KATEGORI_USER');
			$this->db->order_by('M.ID_PELATIHAN','ASC');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function idpelatihan($id){
			$this->db->select('ID_PELATIHAN,NAMA_PELATIHAN');
			$this->db->from('PELATIHAN');
			$this->db->where('ID_PELATIHAN', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_module($id){
			$this->db->select('*');
			$this->db->from('MODULE_PELATIHAN');
			$this->db->where('ID_PELATIHAN', $id);
			$this->db->where('ID_KATEGORI_USER = 2');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function testlistpelatihan(){
			//$id_user = $this->session->userdata('ID_USER');
			
			$query = $this->db->query("select P.ID_PELATIHAN, P.NAMA_PELATIHAN
				FROM 
				PELATIHAN P, REGISTRASI_MENGAJAR R
				WHERE
				P.ID_PELATIHAN = R.ID_PELATIHAN
				AND
				R.ID_USER = ".$this->session->userdata('ID_USER')."
				AND
				R.VALIDASI = 1
				GROUP BY p.id_pelatihan, P.NAMA_PELATIHAN");
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function identitas($id){
			$this->db->select('*');
			$this->db->from('TBL_USER');
			$this->db->where('ID_USER', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function id_pelatihan_diambil($id){
			$this->db->select('ID_PELATIHAN, NAMA_PELATIHAN');
			$this->db->from('PELATIHAN');
			$this->db->where('ID_PELATIHAN', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function pelatihan(){
			$this->db->select('ID_PELATIHAN,NAMA_PELATIHAN');
			$this->db->from('PELATIHAN');
			$this->db->where('STATUS = 0');
			$this->db->order_by('ID_PELATIHAN','ASC');
			
		   $ambil = $this->db->get();
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function profile_tutor(){
			$id_user = $this->session->userdata('ID_USER');
			
			$this->db->select('TBL_USER.ID_USER, TBL_USER.USERNAME, TBL_USER.PASSWORD, TBL_USER.ID_KATEGORI_USER, TBL_USER.NAMA_LENGKAP, TBL_USER.TEMPAT_LAHIR, TBL_USER.TANGGAL_LAHIR, TBL_USER.ALAMAT, TBL_USER.NOTEL, TBL_USER.AGAMA, TBL_USER.STATUS_PEKERJAAN, TBL_USER.VALIDASI, TBL_USER.FOTO, TBL_USER.EMAIL, TBL_USER.JENIS_KELAMIN, TBL_USER.EDUKASI, TBL_USER.NMOR_IDENTITAS');
			$this->db->from('TBL_USER');
			$this->db->where('TBL_USER.ID_USER',$id_user);
			//$this->db->join('REGISTRASI_PELATIHAN','TBL_USER.ID_USER = REGISTRASI_PELATIHAN.ID_USER');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function iduser($id){
			$this->db->select('*');
			$this->db->from('TBL_USER');
			$this->db->where('ID_USER', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function idmengajar($id){
			$this->db->select('*');
			$this->db->from('REGISTRASI_MENGAJAR');
			$this->db->where('ID_REGISTRASI_MENGAJAR', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function listpelatihan(){
			$this->db->select('ID_PELATIHAN,NAMA_PELATIHAN, DESKRIPSI');
			$this->db->from('PELATIHAN');
			$this->db->where('STATUS = 0');
			$this->db->order_by('ID_PELATIHAN','ASC');
			
		   $ambil = $this->db->get();
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function check_jadwal_sama(){
			$id_user = $this->session->userdata('ID_USER');
			$tanggal = $this->input->post('tanggal_pelatihan');
			
			$ambil_tanggal = $this->pecah_tanggal($tanggal);
			$ambil_bulan = $this->pecah_bulan($tanggal);
			$ambil_tahun = $this->pecah_tahun($tanggal);
			$waktu = $this->input->post('waktu');
			$id_pelatihan = $this->input->post('pelatihan');
			
		
			$this->db->select('R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, R.JAM_MENGAJAR');
			$this->db->from('REGISTRASI_MENGAJAR R');
				for($i=0;$i<count($waktu); $i++){
					$this->db->like('R.JAM_MENGAJAR',$waktu[$i]);
					$this->db->where('R.ID_PELATIHAN', $id_pelatihan);
					$this->db->where('R.TANGGAL_MENGAJAR', $ambil_tanggal);
					$this->db->where('R.BULAN_MENGAJAR', $ambil_bulan);
					$this->db->where('R.TAHUN_MENGAJAR', $ambil_tahun);
					
			
					$ambil = $this->db->get();
					
					if($ambil->num_rows() > 0){
				return FALSE;
			}else{
				return TRUE;
			}
				}
		}
		function convdate($date){ 
			$d = explode('-',$date);
			$day = $d[0];
			switch($d[1]){ 
				case '01': $bulan = 'JAN';
				break;
				case '02': $bulan = 'FEB';
				break;
				case '03': $bulan = 'MAR';
				break;
				case '04': $bulan = 'APR'; 
				break;
				case '05': $bulan = 'MAY';
				break;
				case '06': $bulan = 'JUN'; 
				break;
				case '07': $bulan = 'JUL';
				break;
				case '08': $bulan = 'AUG';
				break;
				case '09': $bulan = 'SEP';
				break;
				case '10': $bulan 	= 'OCT';
				break;
				case '11': $bulan = 'NOV';
				break;
				case '12': $bulan = 'DEC';
				break;
			} 
			$tahun = substr($d[2], 2,2); 
			return $day."-".$bulan."-".$tahun; 
		}
		function pecah_tanggal($date){
			$d = explode('-',$date);
			$day = $d[0];
			return $day;
		}
		function pecah_bulan($date)
		{
			$d = explode('-',$date);
			$month = $d[1];
			
			return $month;
		}
		function pecah_tahun($date){
			$d = explode('-',$date);
			$year = $d[2];
			
			return $year;
		}
	}
?>