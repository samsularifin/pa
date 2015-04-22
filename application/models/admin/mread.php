<?php	
class Mread extends CI_Model{
		function profile_admin(){
			$id_user = $this->session->userdata('ID_USER');
			
			$this->db->select('*');
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
		function check_kuota_pel($pelatihan){
		   
		   $this->db->select('ID_PELATIHAN');
		   $this->db->from('KUOTA_PELATIHAN');
		   $this->db->where('ID_PELATIHAN', $pelatihan);

			$query = $this->db->get();
			if($query->num_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		function kuotapelatihan(){
			$this->db->select('KUOTA_PELATIHAN.ID_KUOTA_PELATIHAN, KUOTA_PELATIHAN.ID_PELATIHAN, KUOTA_PELATIHAN.JUMLAH_KUOTA, PELATIHAN.NAMA_PELATIHAN');
			
		   $this->db->from('KUOTA_PELATIHAN');
		   $this->db->join('PELATIHAN','KUOTA_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
		   $this->db->order_by('KUOTA_PELATIHAN.ID_PELATIHAN', 'ASC');

			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function idkuota($id){
			$this->db->select('*');
			
		   $this->db->from('KUOTA_PELATIHAN');
		   $this->db->where('ID_KUOTA_PELATIHAN',$id);

			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
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
		function baca_absensi($tanggal){
		
			$pecahTanggal = $this->ambil_bulan($tanggal);
			
			$this->db->select('REGISTRASI_PELATIHAN.ID_PELATIHAN,REGISTRASI_PELATIHAN.ID_USER, REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN, REGISTRASI_PELATIHAN.BULAN_PELATIHAN, REGISTRASI_PELATIHAN.TAHUN_PELATIHAN, TBL_USER.ID_USER, TBL_USER.NAMA_LENGKAP, PELATIHAN.NAMA_PELATIHAN');
			
		   $this->db->from('REGISTRASI_PELATIHAN');
		   $this->db->where('REGISTRASI_PELATIHAN.BULAN_PELATIHAN',$pecahTanggal);
		   $this->db->join('TBL_USER','REGISTRASI_PELATIHAN.ID_USER = TBL_USER.ID_USER');
		   $this->db->join('PELATIHAN','REGISTRASI_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
		   
		  // $this->db->limit(1);

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
		function baca_user($id){
		   $this->db->select('*');
		   $this->db->from('TBL_USER');
		   $this->db->where('ID_USER',$id);
		  // $this->db->limit(1);

			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function grafik_tutor($tanggal){
			$getBulan = $this->pecah_bulan($tanggal);
			$getTahun = $this->pecah_tahun($tanggal);
			
			$ambil = $this->db->query("SELECT COUNT(R.ID_PELATIHAN) AS TOTAL, P.NAMA_PELATIHAN, R.ID_PELATIHAN FROM PELATIHAN P, REGISTRASI_MENGAJAR R WHERE P.ID_PELATIHAN = R.ID_PELATIHAN AND R.BULAN_MENGAJAR = $getBulan AND R.TAHUN_MENGAJAR = $getTahun GROUP BY R.ID_PELATIHAN, P.NAMA_PELATIHAN");
			
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		} 
		function grafik_member($tanggal){
			$getBulan = $this->pecah_bulan($tanggal);
			$getTahun = $this->pecah_tahun($tanggal);
			
			$ambil = $this->db->query("SELECT COUNT(R.ID_PELATIHAN) AS TOTAL, P.NAMA_PELATIHAN, R.ID_PELATIHAN FROM PELATIHAN P, REGISTRASI_PELATIHAN R WHERE P.ID_PELATIHAN = R.ID_PELATIHAN AND BULAN_PELATIHAN='$getBulan' AND TAHUN_PELATIHAN='$getTahun' GROUP BY R.ID_PELATIHAN, P.NAMA_PELATIHAN");
			
			if($ambil->num_rows() > 0){
				foreach($ambil->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_jadwal($id_pelatihan, $tanggal){
		
			$ambil_bulan = $this->pecah_bulan($tanggal);
			$ambil_tahun = $this->pecah_tahun($tanggal);
			
		   $ambil = $this->db->query("SELECT R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.HARI_MENGAJAR, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, R.STATUS_MENGAJAR, R.VALIDASI, P.NAMA_PELATIHAN, U.NAMA_LENGKAP
			FROM REGISTRASI_MENGAJAR R, PELATIHAN P, TBL_USER U
			WHERE
			R.ID_USER = U.ID_USER
			AND
			R.ID_PELATIHAN = P.ID_PELATIHAN
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
		function mengajar(){
			$query = $this->db->query("SELECT R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.STATUS_MENGAJAR, R.VALIDASI, R.TANGGAL_MENGAJAR, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, U.NAMA_LENGKAP, ROWNUM AS RN
				FROM REGISTRASI_MENGAJAR R, TBL_USER U
				WHERE
				R.ROWID IN (SELECT MAX(ROWID) FROM REGISTRASI_MENGAJAR RR GROUP BY RR.ID_PELATIHAN, RR.ID_USER, RR.TANGGAL_MENGAJAR, RR.BULAN_MENGAJAR, RR.TAHUN_MENGAJAR)
				AND
				R.ID_USER = U.ID_USER
				AND
				R.STATUS_MENGAJAR = 1
				AND
				R.VALIDASI = 0
				ORDER BY R.ID_REGISTRASI_MENGAJAR DESC");
				
				
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
		function listklinik(){
			$this->db->select('ID_PELATIHAN,NAMA_PELATIHAN, DESKRIPSI');
			$this->db->from('PELATIHAN');
			$this->db->where('STATUS = 1');
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
			$this->db->select('ID_PELATIHAN,NAMA_PELATIHAN, DESKRIPSI');
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
		function idmengajar($id){
			$this->db->select('ID_REGISTRASI_MENGAJAR,ID_USER, JAM_MENGAJAR, ID_PELATIHAN, TANGGAL_MENGAJAR, STATUS_MENGAJAR, VALIDASI, BULAN_MENGAJAR, TAHUN_MENGAJAR');
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
		function modul_member(){
			$this->db->select('M.ID_MODULE, M.NAMA_MODULE, M.ID_PELATIHAN, M.JUDUL_MODULE, P.NAMA_PELATIHAN, M.ID_KATEGORI_USER');
			$this->db->from('MODULE_PELATIHAN M, PELATIHAN P');
			$this->db->where('M.ID_PELATIHAN = P.ID_PELATIHAN');
			$this->db->where('M.ID_KATEGORI_USER = 1');
			$this->db->order_by('M.ID_PELATIHAN','ASC');
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function idberita($id){
			$this->db->select('*');
			$this->db->from('BERITA');
			$this->db->where('ID_BERITA', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function idgallery($id){
			$this->db->select('*');
			$this->db->from('GALLERY');
			$this->db->where('ID_GALLERY', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function idkomentar($id){
			$this->db->select('KOMENTAR.ID_KOMENTAR, KOMENTAR.NAMA_KOMENTAR, KOMENTAR.EMAIL_KOMENTAR, KOMENTAR.ID_BERITA, KOMENTAR.ISI_KOMENTAR, KOMENTAR.STATUS, KOMENTAR.TANGGAL_KOMENTAR, BERITA.JUDUL');
			$this->db->from('KOMENTAR');
			$this->db->where('KOMENTAR.ID_KOMENTAR ', $id);
			$this->db->join('BERITA','KOMENTAR.ID_BERITA = BERITA.ID_BERITA');
			
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
			$this->db->from('PELATIHAN_FRONT');
			
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
		function idslider($id){
			$this->db->select('*');
			$this->db->from('SLIDER');
			$this->db->where('ID_SLIDER', $id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function reg_user(){
		/*	$this->db->select('*');
			$this->db->from('TBL_USER');
			$this->db->where('VALIDASI = 0');
			$this->db->where('ID_KATEGORI_USER = 1 OR ID_KATEGORI_USER = 2'); */
			$query = $this->db->query("SELECT ID_USER, USERNAME, PASSWORD, ID_KATEGORI_USER,  NAMA_LENGKAP, TEMPAT_LAHIR, TANGGAL_LAHIR, ALAMAT, NOTEL, AGAMA,STATUS_PEKERJAAN, VALIDASI, TANGGAL_REGISTRASI_USER, FOTO FROM TBL_USER
			WHERE VALIDASI = 0
			AND (ID_KATEGORI_USER='1' OR ID_KATEGORI_USER='2') ORDER BY ID_USER DESC");
			//$this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function ureg($id){
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
		function baca_member($id_pelatihan, $tanggal, $waktu){
			
			$getTanggal = $this->ambil_tanggal($tanggal);
			$getBulan = $this->ambil_bulan($tanggal);
			$getTahun = $this->ambil_tahun($tanggal);
			
			$this->db->select('TBL_USER.ID_USER, TBL_USER.USERNAME, TBL_USER.PASSWORD, TBL_USER.ID_KATEGORI_USER, TBL_USER.NAMA_LENGKAP, TBL_USER.TEMPAT_LAHIR, TBL_USER.TANGGAL_LAHIR, TBL_USER.ALAMAT, TBL_USER.NOTEL, TBL_USER.AGAMA, TBL_USER.STATUS_PEKERJAAN, TBL_USER.VALIDASI, TBL_USER.FOTO, TBL_USER.JENIS_KELAMIN, TBL_USER.EDUKASI, TBL_USER.NMOR_IDENTITAS, REGISTRASI_PELATIHAN.ID_REGISTRASI,
			REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN,REGISTRASI_PELATIHAN.BULAN_PELATIHAN, REGISTRASI_PELATIHAN.TAHUN_PELATIHAN, REGISTRASI_PELATIHAN.WAKTU_PELATIHAN, REGISTRASI_PELATIHAN.ID_PELATIHAN, REGISTRASI_PELATIHAN.ID_USER,REGISTRASI_PELATIHAN.CETAK');
			
			//$tanggal =  "to_date($tanggal ,'MM-DD-YYYY')";
			//$tanggal = $this->db->set('TANGGAL_PELATIHAN_REG',"to_date('$tanggal','dd-mm-yyyy')", false);
			
			
			$this->db->from('TBL_USER');
			$this->db->where('TBL_USER.VALIDASI = 1');
			$this->db->where('TBL_USER.ID_KATEGORI_USER = 1');
			$this->db->join('REGISTRASI_PELATIHAN','TBL_USER.ID_USER = REGISTRASI_PELATIHAN.ID_USER');
			$this->db->like('REGISTRASI_PELATIHAN.ID_PELATIHAN',$id_pelatihan);
			$this->db->like('REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN',$getTanggal);
			$this->db->like('REGISTRASI_PELATIHAN.BULAN_PELATIHAN',$getBulan);
			$this->db->like('REGISTRASI_PELATIHAN.TAHUN_PELATIHAN',$getTahun);
			$this->db->like('REGISTRASI_PELATIHAN.WAKTU_PELATIHAN',$waktu);
			$this->db->order_by('TBL_USER.ID_USER','DESC');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_tutor($id_pelatihan){
			/*$this->db->select('TBL_USER.ID_USER, TBL_USER.USERNAME, TBL_USER.PASSWORD, TBL_USER.ID_KATEGORI_USER, TBL_USER.NAMA_LENGKAP, TBL_USER.TEMPAT_LAHIR, TBL_USER.TANGGAL_LAHIR, TBL_USER.ALAMAT, TBL_USER.NOTEL, TBL_USER.AGAMA, TBL_USER.STATUS_PEKERJAAN, TBL_USER.VALIDASI, TBL_USER.FOTO, TBL_USER.JENIS_KELAMIN, TBL_USER.EDUKASI, TBL_USER.NMOR_IDENTITAS,REGISTRASI_MENGAJAR.ID_REGISTRASI_MENGAJAR, REGISTRASI_MENGAJAR.ID_USER, REGISTRASI_MENGAJAR.HARI_MENGAJAR, REGISTRASI_MENGAJAR.JAM_MENGAJAR, REGISTRASI_MENGAJAR.ID_PELATIHAN');
			//$this->db->select_max('TBL_USER.ID_USER');
			//$this->db->distinct('TBL_USER.ID_USER');
			$this->db->from('TBL_USER');
			$this->db->where('TBL_USER.VALIDASI = 1');
			$this->db->where('TBL_USER.ID_KATEGORI_USER = 2');
			$this->db->where('REGISTRASI_MENGAJAR.ID_PELATIHAN = '.$id_pelatihan);
			$this->db->join('REGISTRASI_MENGAJAR','TBL_USER.ID_USER = REGISTRASI_MENGAJAR.ID_USER');
			
			
			$this->db->group_by('REGISTRASI_MENGAJAR.ID_USER'); */
			//$this->db->order_by('TOTAL','DESC');
			
			/*$this->db->group_by('TBL_USER.ID_USER, TBL_USER.USERNAME, TBL_USER.PASSWORD, TBL_USER.ID_KATEGORI_USER, TBL_USER.NAMA_LENGKAP, TBL_USER.TEMPAT_LAHIR, TBL_USER.TANGGAL_LAHIR, TBL_USER.ALAMAT, TBL_USER.NOTEL, TBL_USER.AGAMA, TBL_USER.STATUS_PEKERJAAN, TBL_USER.VALIDASI, TBL_USER.FOTO, TBL_USER.JENIS_KELAMIN, TBL_USER.EDUKASI, TBL_USER.NMOR_IDENTITAS,REGISTRASI_MENGAJAR.ID_REGISTRASI_MENGAJAR, REGISTRASI_MENGAJAR.ID_USER, REGISTRASI_MENGAJAR.HARI_MENGAJAR, REGISTRASI_MENGAJAR.JAM_MENGAJAR, REGISTRASI_MENGAJAR.ID_PELATIHAN');*/
			
			//$this->db->group_by('TBL_USER.ID_USER');
			
			$query = $this->db->query("SELECT TBL_USER.ID_USER, TBL_USER.USERNAME, TBL_USER.PASSWORD, TBL_USER.ID_KATEGORI_USER, TBL_USER.NAMA_LENGKAP, TBL_USER.TEMPAT_LAHIR, TBL_USER.TANGGAL_LAHIR, TBL_USER.ALAMAT, TBL_USER.NOTEL, TBL_USER.AGAMA, TBL_USER.STATUS_PEKERJAAN, TBL_USER.VALIDASI, TBL_USER.FOTO, TBL_USER.JENIS_KELAMIN, TBL_USER.EDUKASI, TBL_USER.NMOR_IDENTITAS,REGISTRASI_MENGAJAR.ID_REGISTRASI_MENGAJAR, REGISTRASI_MENGAJAR.ID_USER, REGISTRASI_MENGAJAR.HARI_MENGAJAR, REGISTRASI_MENGAJAR.JAM_MENGAJAR, REGISTRASI_MENGAJAR.ID_PELATIHAN FROM TBL_USER, REGISTRASI_MENGAJAR WHERE REGISTRASI_MENGAJAR.ROWID IN (SELECT MAX(ROWID) FROM REGISTRASI_MENGAJAR GROUP BY REGISTRASI_MENGAJAR.ID_PELATIHAN, REGISTRASI_MENGAJAR.ID_USER) AND TBL_USER.VALIDASI = 1 AND TBL_USER.ID_KATEGORI_USER = 2 AND REGISTRASI_MENGAJAR.ID_PELATIHAN = '$id_pelatihan' AND TBL_USER.ID_USER = REGISTRASI_MENGAJAR.ID_USER
			AND REGISTRASI_MENGAJAR.VALIDASI=1");
			//$this->db->group_by('');
			
		//	$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
			
		}
		function baca_admin(){
			$query = $this->db->query("SELECT ID_USER, USERNAME, PASSWORD, ID_KATEGORI_USER, NAMA_LENGKAP, TEMPAT_LAHIR, TANGGAL_LAHIR, ALAMAT, NOTEL, AGAMA, STATUS_PEKERJAAN, VALIDASI, FOTO,JENIS_KELAMIN,EDUKASI,NMOR_IDENTITAS FROM TBL_USER
			WHERE VALIDASI = 1
			AND ID_KATEGORI_USER=3");
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function daftar_quiz_tutor($id){
			$this->db->select('QUIZ.ID_QUIZ, QUIZ.JUDUL_QUIZ, QUIZ.WAKTU_QUIZ, QUIZ.JUMLAH_SOAL, QUIZ.KETERANGAN, QUIZ.ID_KATEGORI_USER, QUIZ.ID_PELATIHAN, QUIZ.STATUS_SOAL');
			
			$this->db->from('QUIZ');
			$this->db->where('QUIZ.ID_KATEGORI_USER = 1');
			$this->db->join('KATEGORI_USER','QUIZ.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			$this->db->where('QUIZ.ID_PELATIHAN',$id);
			$this->db->join('PELATIHAN','QUIZ.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('QUIZ.ID_QUIZ','DESC');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function jawaban_quiz_tutor($id){
			$this->db->select('SOAL_QUIZ.ID_SOAL_QUIZ, SOAL_QUIZ.ID_QUIZ, SOAL_QUIZ.ISI_SOAL, SOAL_QUIZ.ID_KATEGORI_USER, KATEGORI_USER.ID_KATEGORI_USER, QUIZ.ID_QUIZ, JAWABAN_QUIZ.ID_JAWABAN_QUIZ, JAWABAN_QUIZ.ID_SOAL_QUIZ, JAWABAN_QUIZ.ISI_JAWABAN, JAWABAN_QUIZ.STATUS_JAWABAN');
			$this->db->from('SOAL_QUIZ');
			$this->db->where('SOAL_QUIZ.ID_QUIZ',$id);
			$this->db->join('QUIZ','SOAL_QUIZ.ID_QUIZ = QUIZ.ID_QUIZ');
			$this->db->where('SOAL_QUIZ.ID_KATEGORI_USER = 2');
			$this->db->join('KATEGORI_USER','SOAL_QUIZ.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			$this->db->where('SOAL_QUIZ.ID_SOAL_QUIZ = 1');
			$this->db->join('JAWABAN_QUIZ',' SOAL_QUIZ.ID_SOAL_QUIZ = JAWABAN_QUIZ.ID_SOAL_QUIZ');
			
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
		function soal_quisioner_tutor($id){
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
		function id_pelatihan($id){
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
		function id_quiz($id){
			$this->db->select('*');
			$this->db->from('QUIZ');
			$this->db->where('ID_QUIZ', $id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function detail_quisioner($id){
			$this->db->select('QUISIONER.ID_QUISIONER, QUISIONER.NAMA_QUISIONER, QUISIONER.KETERANGAN,QUISIONER.ID_KATEGORI_USER, QUISIONER.ID_PELATIHAN, QUISIONER.JUMLAH_SOAL_QUISIONER, QUISIONER.STATUS_QUISIONER');
			$this->db->from('QUISIONER');
			$this->db->where('QUISIONER.ID_PELATIHAN', $id);
			$this->db->where('QUISIONER.ID_KATEGORI_USER = 1');
			$this->db->join('PELATIHAN','QUISIONER.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function detail_quisioner_tutor($id){
			$this->db->select('QUISIONER.ID_QUISIONER, QUISIONER.NAMA_QUISIONER, QUISIONER.KETERANGAN,QUISIONER.ID_KATEGORI_USER, QUISIONER.ID_PELATIHAN, QUISIONER.JUMLAH_SOAL_QUISIONER, QUISIONER.STATUS_QUISIONER');
			$this->db->from('QUISIONER');
			$this->db->where('QUISIONER.ID_PELATIHAN', $id);
			$this->db->where('QUISIONER.ID_KATEGORI_USER = 2');
			$this->db->join('PELATIHAN','QUISIONER.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function hasil_test_member($id_pelatihan, $tanggal){
			$this->db->select('ID_HASIL_TEST, ID_PELATIHAN, ID_QUIZ, JUMLAH_SOAL, JUMLAH_SOAL, JUMLAH_BENAR, JUMLAH_SALAH, NILAI_AKHIR, ID_USER, TANGGAL_TEST');
			$this->db->from('HASIL_TEST_QUIZ');
			$this->db->like('ID_PELATIHAN',$id_pelatihan);
			$this->db->like('TANGGAL_TEST',$tanggal);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function id_quisioner($id){
			$this->db->select('*');
			$this->db->from('QUISIONER');
			$this->db->where('ID_QUISIONER', $id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function detail_report_quisioner_member($id){
			$this->db->select('HASIL_JAWABAN_QUISIONER.ID_HASIL_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_SOAL_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER,HASIL_JAWABAN_QUISIONER.TANGGAL_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_USER, HASIL_JAWABAN_QUISIONER.ID_PELATIHAN, HASIL_JAWABAN_QUISIONER.ID_QUISIONER');
			$this->db->from('HASIL_JAWABAN_QUISIONER');
			$this->db->where('HASIL_JAWABAN_QUISIONER.ID_PELATIHAN', $id);
			$this->db->where('HASIL_JAWABAN_QUISIONER.ID_KATEGORI_USER = 1');
			$this->db->join('PELATIHAN','HASIL_JAWABAN_QUISIONER.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_jumlah_soal_quisioner($id){
			$this->db->select('HASIL_JAWABAN_QUISIONER.ID_HASIL_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_SOAL_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.TANGGAL_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_USER, HASIL_JAWABAN_QUISIONER.ID_PELATIHAN, HASIL_JAWABAN_QUISIONER.ID_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_KATEGORI_USER');

			$this->db->from('HASIL_JAWABAN_QUISIONER');
			$this->db->where('HASIL_JAWABAN_QUISIONER.ID_PELATIHAN', $id);
			$this->db->join('PELATIHAN','HASIL_JAWABAN_QUISIONER.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			
			return $this->db->count_all_results();
		}
		function soal_quisioner_aja($id){
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
		function soal_quisioner_tutor_aja($id){
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
		function daftar_quisioner_member($id){
			$this->db->select('QUISIONER.ID_QUISIONER, QUISIONER.NAMA_QUISIONER, QUISIONER.KETERANGAN, QUISIONER.ID_KATEGORI_USER, QUISIONER.ID_PELATIHAN, QUISIONER.STATUS_QUISIONER, QUISIONER.JUMLAH_SOAL_QUISIONER');
			
			$this->db->from('QUISIONER');
			$this->db->where('QUISIONER.ID_KATEGORI_USER = 1');
			$this->db->join('KATEGORI_USER','QUISIONER.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			$this->db->where('QUISIONER.ID_PELATIHAN',$id);
			$this->db->join('PELATIHAN','QUISIONER.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('QUISIONER.ID_QUISIONER','DESC');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function daftar_quisioner_tutor($id){
			$this->db->select('QUISIONER.ID_QUISIONER, QUISIONER.NAMA_QUISIONER, QUISIONER.KETERANGAN, QUISIONER.ID_KATEGORI_USER, QUISIONER.ID_PELATIHAN, QUISIONER.STATUS_QUISIONER, QUISIONER.JUMLAH_SOAL_QUISIONER');
			
			$this->db->from('QUISIONER');
			$this->db->where('QUISIONER.ID_KATEGORI_USER = 2');
			$this->db->join('KATEGORI_USER','QUISIONER.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			$this->db->where('QUISIONER.ID_PELATIHAN',$id);
			$this->db->join('PELATIHAN','QUISIONER.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('QUISIONER.ID_QUISIONER','DESC');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function chart_member($id){
			$query = $this->db->query("SELECT COUNT(R.ID_PELATIHAN) AS TOTAL, U.ID_USER, U.NAMA_LENGKAP, P.ID_PELATIHAN, P.NAMA_PELATIHAN, P.STATUS, R.ID_PELATIHAN, R.ID_USER
			FROM TBL_USER U, PELATIHAN P, REGISTRASI_PELATIHAN R
			WHERE
			U.ID_USER=$id
			AND U.ID_USER = R.ID_USER
			AND P.STATUS = 0
			AND P.ID_PELATIHAN = R.ID_PELATIHAN
			GROUP BY R.ID_USER, U.ID_USER, U.NAMA_LENGKAP, P.ID_PELATIHAN, P.NAMA_PELATIHAN, P.STATUS, R.ID_PELATIHAN, R.ID_USER
			ORDER BY R.ID_USER
			");
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function chart_tutor($id){
			$query = $this->db->query("SELECT COUNT(R.ID_PELATIHAN) AS TOTAL, U.ID_USER, U.NAMA_LENGKAP, P.ID_PELATIHAN, P.NAMA_PELATIHAN, P.STATUS, R.ID_PELATIHAN, R.ID_USER
			FROM TBL_USER U, PELATIHAN P, REGISTRASI_MENGAJAR R
			WHERE
			U.ID_USER=$id
			AND U.ID_USER = R.ID_USER
			AND P.STATUS = 0
			AND R.STATUS_MENGAJAR = 1
			AND P.ID_PELATIHAN = R.ID_PELATIHAN
			AND R.VALIDASI = 1
			GROUP BY R.ID_USER, U.ID_USER, U.NAMA_LENGKAP, P.ID_PELATIHAN, P.NAMA_PELATIHAN, P.STATUS, R.ID_PELATIHAN, R.ID_USER
			ORDER BY R.ID_USER
			");
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function ambil_detail_mengajar($id){
			$id_pelatihan = $this->input->get('id_pel');
			$tangg_pel = $this->input->get('tanggal_men');
			$id_reg_meng = $this->input->get('id_reg_meng');
			
			$this->db->select('U.ID_USER, U.USERNAME, U.PASSWORD, U.ID_KATEGORI_USER,  U.NAMA_LENGKAP, U.TEMPAT_LAHIR, U.TANGGAL_LAHIR, U.ALAMAT, U.NOTEL, U.AGAMA,U.STATUS_PEKERJAAN, U.VALIDASI, U.FOTO, U.JENIS_KELAMIN, U.EMAIL, U.EDUKASI, U.UPLOAD_FILE');
			
			$this->db->from('TBL_USER U');
			/*$this->db->join('REGISTRASI_MENGAJAR R','U.ID_USER = R.ID_USER');*/
			$this->db->where('U.ID_USER', $id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function bulan_pelatihan(){
			$this->db->select('ID_BULAN, ANGKA_BULAN, NAMA_BULAN');
			$this->db->from('TABEL_BULAN');
			$this->db->group_by('ID_BULAN, ANGKA_BULAN, NAMA_BULAN');
			$this->db->order_by('ID_BULAN', 'ASC');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}
		}
		function grafik_year_member(){
			
		}
	}
?>