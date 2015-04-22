<?php	
class Mread extends CI_Model{
		function check_approval_sertifikat($id){
			$this->db->select('REGISTRASI_PELATIHAN.CETAK');
			$this->db->from('REGISTRASI_PELATIHAN');
			$this->db->where('REGISTRASI_PELATIHAN.ID_REGISTRASI', $id);
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function cetak_sertifikat($id){
			$this->db->select('REGISTRASI_PELATIHAN.ID_REGISTRASI, REGISTRASI_PELATIHAN.ID_USER, REGISTRASI_PELATIHAN.ID_PELATIHAN, REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN, REGISTRASI_PELATIHAN.WAKTU_PELATIHAN, REGISTRASI_PELATIHAN.BULAN_PELATIHAN, REGISTRASI_PELATIHAN.TAHUN_PELATIHAN, PELATIHAN.NAMA_PELATIHAN, TBL_USER.NAMA_LENGKAP, TBL_USER.NMOR_IDENTITAS');
			$this->db->from('REGISTRASI_PELATIHAN');
			$this->db->where('REGISTRASI_PELATIHAN.ID_REGISTRASI', $id);
			$this->db->where('REGISTRASI_PELATIHAN.ID_USER', $this->session->userdata('ID_USER'));
			$this->db->join('PELATIHAN','REGISTRASI_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->join('TBL_USER','REGISTRASI_PELATIHAN.ID_USER = TBL_USER.ID_USER');
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function user_auth(){
		   $this->db->select('USERNAME, PASSWORD, PRIORITAS');
		   $this->db->from('TBL_USER');
		   $this->db->where('USERNAME',$this->input->post('username'));
		   $this->db->where('PASSWORD',$this->input->post('pass'));
		   $this->db->where('PRIORITAS',$this->input->post('otoritas'));
		  // $this->db->limit(1);

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
			$this->db->order_by('ID_PELATIHAN','ASC');
			
		   $ambil = $this->db->get();
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
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
		function idmodule($id){
			$this->db->select('*');
			$this->db->from('MODULE_PELATIHAN');
			$this->db->where('ID_MODULE', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function modul_tutor(){
			$this->db->select('M.ID_MODULE, M.NAMA_MODULE, M.ID_PELATIHAN, M.JUDUL_MODULE, P.NAMA_PELATIHAN, M.ID_KATEGORI_USER, U.ID_KATEGORI_USER');
			$this->db->from('MODULE_PELATIHAN M, PELATIHAN P');
			$this->db->where('M.ID_PELATIHAN = P.ID_PELATIHAN');
			$this->db->where('M.ID_KATEGORI_USER = U.ID_KATEGORI_USER');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function modul_member(){
		/*	$this->db->select('M.ID_MODULE, M.NAMA_MODULE, M.ID_PELATIHAN, M.JUDUL_MODULE, P.NAMA_PELATIHAN, M.ID_KATEGORI_USER');
			$this->db->from('MODULE_PELATIHAN M, PELATIHAN P');
			$this->db->where('M.ID_PELATIHAN = P.ID_PELATIHAN');
			$this->db->where('M.ID_KATEGORI_USER = 1');
			$this->db->order_by('M.ID_PELATIHAN','ASC');
			$query = $this->db->get();
			*/
			$this->db->select('MODULE_PELATIHAN.ID_MODULE, MODULE_PELATIHAN.NAMA_MODULE, MODULE_PELATIHAN.ID_PELATIHAN, MODULE_PELATIHAN.JUDUL_MODULE, PELATIHAN.NAMA_PELATIHAN, PELATIHAN.ID_PELATIHAN, MODULE_PELATIHAN.ID_KATEGORI_USER, REGISTRASI_PELATIHAN.ID_REGISTRASI, REGISTRASI_PELATIHAN.ID_USER, REGISTRASI_PELATIHAN.ID_PELATIHAN');
			
			$this->db->from('MODULE_PELATIHAN');
			$this->db->where('MODULE_PELATIHAN.ID_KATEGORI_USER = 1');
			$this->db->where('REGISTRASI_PELATIHAN.ID_USER = ', $this->session->userdata('ID_USER'));
			$this->db->join('PELATIHAN','MODULE_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->join('REGISTRASI_PELATIHAN','MODULE_PELATIHAN.ID_PELATIHAN = REGISTRASI_PELATIHAN.ID_PELATIHAN');
			$this->db->where('REGISTRASI_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('MODULE_PELATIHAN.ID_PELATIHAN','ASC');
			$query = $this->db->get(); 
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function checkreg($tanggal, $bulan, $tahun){
			$this->db->select('ID_USER, TANGGAL_PELATIHAN,BULAN_PELATIHAN, TAHUN_PELATIHAN');
			$this->db->from('REGISTRASI_PELATIHAN');
			$this->db->where('ID_USER', $this->session->userdata('ID_USER'));
			$this->db->where('TANGGAL_PELATIHAN',$tanggal);
			$this->db->where('BULAN_PELATIHAN',$bulan);
			$this->db->where('TAHUN_PELATIHAN',$tahun);
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				return FALSE;
			}else{
				return TRUE;
			}
			
		}
		function cek_kuota($id_pelatihan, $tanggal, $waktu){
			$getTanggal = $this->ambil_tanggal($tanggal);
			$getBulan = $this->ambil_bulan($tanggal);
			$getTahun = $this->ambil_tahun($tanggal);
			
			$query = $this->db->query("SELECT COUNT(*) as TOTAL FROM REGISTRASI_PELATIHAN
			WHERE
			ID_PELATIHAN = $id_pelatihan
			AND TANGGAL_PELATIHAN = '$getTanggal'
			AND BULAN_PELATIHAN = '$getBulan'
			AND TAHUN_PELATIHAN = '$getTahun'
			AND WAKTU_PELATIHAN = '$waktu'");
			
			$value = $query->row()->TOTAL;
			
			$query2 = $this->db->query("SELECT JUMLAH_KUOTA
			FROM 
			KUOTA_PELATIHAN
			WHERE
			ID_PELATIHAN = $id_pelatihan");
			
			$value2 = $query2->row()->JUMLAH_KUOTA;
			echo $value2;
			
			if($value >= $value2){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		function cek_available_jadwal($id_pelatihan, $tanggal, $waktu){
			
			$getTanggal = $this->ambil_tanggal($tanggal);
			$getBulan = $this->ambil_bulan($tanggal);
			$getTahun = $this->ambil_tahun($tanggal);
			
			
			$this->db->select('ID_PELATIHAN, TANGGAL_MENGAJAR, BULAN_MENGAJAR, TAHUN_MENGAJAR');
			$this->db->from('REGISTRASI_MENGAJAR');
			$this->db->where('ID_PELATIHAN', $id_pelatihan);
			$this->db->where('TANGGAL_MENGAJAR', $getTanggal);
			$this->db->where('BULAN_MENGAJAR', $getBulan);
			$this->db->where('TAHUN_MENGAJAR', $getTahun);
			$this->db->where('JAM_MENGAJAR', $waktu);
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		function ambil_tanggal($date){
			$d = explode('-',$date);
			$day = $d[0];
			return $day;
		}
		function ambil_bulan($date)
		{
			$d = explode('-',$date);
			$month = $d[1];
			
			return $month;
		}
		function ambil_tahun($date){
			$d = explode('-',$date);
			$year = $d[2];
			
			return $year;
		}
		function listpelatihan(){
			$this->db->select('REGISTRASI_PELATIHAN.ID_REGISTRASI, REGISTRASI_PELATIHAN.ID_USER, REGISTRASI_PELATIHAN.ID_PELATIHAN, REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN_REG, REGISTRASI_PELATIHAN.WAKTU_PELATIHAN, PELATIHAN.NAMA_PELATIHAN');
			$this->db->from('REGISTRASI_PELATIHAN');
			$this->db->where('REGISTRASI_PELATIHAN.ID_USER', $this->session->userdata('ID_USER'));
			$this->db->join('PELATIHAN','REGISTRASI_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN_REG','ASC');
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
			
			$query = $this->db->query("SELECT REGISTRASI_PELATIHAN.ID_REGISTRASI, REGISTRASI_PELATIHAN.ID_USER, REGISTRASI_PELATIHAN.ID_PELATIHAN, REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN, REGISTRASI_PELATIHAN.BULAN_PELATIHAN, REGISTRASI_PELATIHAN.TAHUN_PELATIHAN,REGISTRASI_PELATIHAN.WAKTU_PELATIHAN, PELATIHAN.NAMA_PELATIHAN FROM REGISTRASI_PELATIHAN, PELATIHAN WHERE REGISTRASI_PELATIHAN.ROWID IN (SELECT MAX(ROWID) FROM REGISTRASI_PELATIHAN GROUP BY REGISTRASI_PELATIHAN.ID_USER, REGISTRASI_PELATIHAN.ID_PELATIHAN) AND REGISTRASI_PELATIHAN.ID_USER = ".$this->session->userdata('ID_USER')." AND REGISTRASI_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN");
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function profile_member(){
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
		function query_pelatihan_diikuti(){
			$id_user = $this->session->userdata('ID_USER');
			$this->db->select('REGISTRASI_PELATIHAN.ID_REGISTRASI, REGISTRASI_PELATIHAN.ID_PELATIHAN, REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN, REGISTRASI_PELATIHAN.BULAN_PELATIHAN, REGISTRASI_PELATIHAN.TAHUN_PELATIHAN, REGISTRASI_PELATIHAN.WAKTU_PELATIHAN, PELATIHAN.NAMA_PELATIHAN');
			$this->db->from('REGISTRASI_PELATIHAN');
			$this->db->where('REGISTRASI_PELATIHAN.ID_USER',$id_user);
			$this->db->join('PELATIHAN','REGISTRASI_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
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
		function baca_test($id){
			$this->db->select('*');
			$this->db->from('QUIZ');
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
			$this->db->where('ID_KATEGORI_USER = 1');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function soal_quiz_aja($id){
			$this->db->select('SOAL_QUIZ.ID_SOAL_QUIZ, SOAL_QUIZ.ID_QUIZ, SOAL_QUIZ.ISI_SOAL, SOAL_QUIZ.ID_KATEGORI_USER');
			$this->db->from('SOAL_QUIZ');
			$this->db->where('SOAL_QUIZ.ID_QUIZ',$id);
			$this->db->join('QUIZ','SOAL_QUIZ.ID_QUIZ = QUIZ.ID_QUIZ');
			$this->db->where('SOAL_QUIZ.ID_KATEGORI_USER = 1');
			$this->db->join('KATEGORI_USER','SOAL_QUIZ.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_soal($id){
			$this->db->select('SOAL_QUIZ.ID_SOAL_QUIZ, SOAL_QUIZ.ID_QUIZ, SOAL_QUIZ.ISI_SOAL, SOAL_QUIZ.ID_KATEGORI_USER, KATEGORI_USER.ID_KATEGORI_USER, QUIZ.ID_QUIZ, JAWABAN_QUIZ.ID_JAWABAN_QUIZ, JAWABAN_QUIZ.ID_SOAL_QUIZ, JAWABAN_QUIZ.ISI_JAWABAN, JAWABAN_QUIZ.STATUS_JAWABAN');
			$this->db->from('SOAL_QUIZ');
			$this->db->where('SOAL_QUIZ.ID_QUIZ',$id);
			$this->db->join('QUIZ','SOAL_QUIZ.ID_QUIZ = QUIZ.ID_QUIZ');
			$this->db->where('SOAL_QUIZ.ID_KATEGORI_USER = 1');
			$this->db->join('KATEGORI_USER','SOAL_QUIZ.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			$this->db->where('SOAL_QUIZ.ID_SOAL_QUIZ',$id_soal);
			$this->db->join('JAWABAN_QUIZ',' SOAL_QUIZ.ID_SOAL_QUIZ = JAWABAN_QUIZ.ID_SOAL_QUIZ');
										
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function data_quiz($id){
			$this->db->select('*');
			$this->db->from('QUIZ');
			$this->db->where('ID_QUIZ',$id);
			
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
			$this->db->where('QUISIONER.ID_KATEGORI_USER = 1');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function check_ambil_pelatihan($id_user, $id_pelatihan){
			
			
			$this->db->select('HASIL_TEST_QUIZ.ID_HASIL_TEST, HASIL_TEST_QUIZ.ID_PELATIHAN, HASIL_TEST_QUIZ.ID_QUIZ, HASIL_TEST_QUIZ.ID_USER, TBL_USER.ID_USER, PELATIHAN.ID_PELATIHAN');
			$this->db->from('HASIL_TEST_QUIZ');
			$this->db->where('HASIL_TEST_QUIZ.ID_PELATIHAN',$id_pelatihan);
			$this->db->where('HASIL_TEST_QUIZ.ID_USER',$id_user );
			//$this->db->where('HASIL_TEST_QUIZ.ID_QUIZ',$id_quiz);
			$this->db->join('TBL_USER','HASIL_TEST_QUIZ.ID_USER = TBL_USER.ID_USER');
			$this->db->join('PELATIHAN','HASIL_TEST_QUIZ.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			
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
		function lihat_hasil_test($id_user, $id_pel, $id_quiz){
			$this->db->select('ID_HASIL_TEST, ID_PELATIHAN, ID_QUIZ, JUMLAH_SOAL, JUMLAH_BENAR, JUMLAH_SALAH, NILAI_AKHIR, ID_USER, TANGGAL_TEST');
			$this->db->from('HASIL_TEST_QUIZ');
			$this->db->where('ID_USER', $id_user);
			$this->db->where('ID_PELATIHAN', $id_pel);
			$this->db->where('ID_QUIZ', $id_quiz);
			
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
			$this->db->where('SOAL_QUISIONER.ID_KATEGORI_USER = 1');
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
		function pelatihanaja(){
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
		function idregpelatihan($id){
			$this->db->select('*');
			$this->db->from('REGISTRASI_PELATIHAN');
			$this->db->where('ID_REGISTRASI', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function check_jadwal(){
			$id_pelatihan = $this->input->post('pelatihan');
			$tanggal = $this->input->post('tanggal_pelatihan');
		
			$ambil_bulan = $this->pecah_bulan($tanggal);
			$ambil_tahun = $this->pecah_tahun($tanggal);
			
			
			/*$this->db->select('ID_REGISTRASI_MENGAJAR, ID_USER, HARI_MENGAJAR, JAM_MENGAJAR, ID_PELATIHAN, TANGGAL_MENGAJAR, STATUS_MENGAJAR, VALIDASI');
			$this->db->from('REGISTRASI_MENGAJAR');
			$this->db->where('ID_PELATIHAN', $id_pelatihan);
			$this->db->where('BULAN_MENGAJAR', $ambil_bulan);
			$this->db->where('TAHUN_MENGAJAR', $ambil_tahun);
			
		   $ambil = $this->db->get();*/
		   $ambil = $this->db->query("SELECT R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.HARI_MENGAJAR, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, R.STATUS_MENGAJAR, R.VALIDASI, P.NAMA_PELATIHAN, U.NAMA_LENGKAP
			FROM REGISTRASI_MENGAJAR R, PELATIHAN P, TBL_USER U
			WHERE
			R.ID_USER = U.ID_USER
			AND
			R.ID_PELATIHAN = P.ID_PELATIHAN 
			AND
			R.VALIDASI=1
			AND
			R.ID_PELATIHAN = $id_pelatihan
			AND BULAN_MENGAJAR = $ambil_bulan
			AND TAHUN_MENGAJAR = $ambil_tahun
			AND R.STATUS_MENGAJAR = 1
			ORDER BY TANGGAL_MENGAJAR ASC");
			
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function check_jadwal_tetap(){
			$id_pelatihan = $this->input->post('pelatihan');
			
			$ambil = $this->db->query("SELECT R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.HARI_MENGAJAR, R.HARI_MENGAJAR, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.STATUS_MENGAJAR, R.VALIDASI, P.NAMA_PELATIHAN
			FROM REGISTRASI_MENGAJAR R, PELATIHAN P
			WHERE
			R.ID_PELATIHAN = P.ID_PELATIHAN
			AND R.ID_PELATIHAN = $id_pelatihan
			AND R.STATUS_MENGAJAR = 0
			ORDER BY R.HARI_MENGAJAR ASC
			");
			
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function pecah_bulan($date)
		{
			$d = explode('-',$date);
			$month = $d[0];
			
			return $month;
		}
		function pecah_tahun($date){
			$d = explode('-',$date);
			$year = $d[1];
			
			return $year;
		}
		/*function hasiltest(){
		
			//$getHari[$hkeys] = $valn;
			//$hariVal = $hari[$hkeys];
				$data = array();
				foreach ($waktu as $key => $value) {
					$data[] = array(
						//'id_pelatihan' => $id_pelatihan[$idx],
						'ID_USER' => $id_user,
						'HARI_MENGAJAR' => $hari[$hkeys],
						'JAM_MENGAJAR' => $waktu[$key],
						'ID_PELATIHAN'=> $id_pelatihan
					);
			}
			$jawaban = $this->input->post('jawaban');
			
			//foreach($jawaban as )
		}*/
		
	}
?>