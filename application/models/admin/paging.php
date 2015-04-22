<?php
	class Paging extends CI_Model{
	
		public function __construct(){
			parent::__construct();
		}
		//Seputar tanah haram
		
		function berita_record_count(){
			return $this->db->count_all('BERITA');
		}
		function berita_fetch($limit, $start){
			$this->db->select('BERITA.ID_BERITA, BERITA.TANGGAL, BERITA.JUDUL, BERITA.ISI_BERITA, BERITA.GAMBAR, BERITA.ID_KATEGORI_USER, KATEGORI_USER.NAMA_KATEGORI_USER');
			$this->db->from('BERITA');
			$this->db->join('KATEGORI_USER','BERITA.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
			$this->db->order_by('BERITA.ID_BERITA','DESC');
			$this->db->limit($limit, $start);
			
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		function gallery_record_count(){
			return $this->db->count_all('GALLERY');
		}
		function gallery_fetch($limit, $start){
		   $this->db->select('ID_GALLERY, NAMA_GALLERY, ID_KATEGORI_USER, ID_PELATIHAN');
		   $this->db->from('GALLERY');
		   $this->db->order_by('ID_GALLERY','DESC');
		   $this->db->limit($limit, $start);
		   
		   $query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function komentar_record_count(){
			$this->db->select('KOMENTAR.ID_KOMENTAR, KOMENTAR.NAMA_KOMENTAR, KOMENTAR.EMAIL_KOMENTAR, KOMENTAR.ID_BERITA, KOMENTAR.ISI_KOMENTAR, KOMENTAR.STATUS, KOMENTAR.TANGGAL_KOMENTAR, BERITA.JUDUL');
			$this->db->from('KOMENTAR');
			$this->db->join('BERITA','KOMENTAR.ID_BERITA = BERITA.ID_BERITA');
			$this->db->order_by('KOMENTAR.ID_KOMENTAR','DESC');
			$query = $this->db->get();
			
			return $query->num_rows();
		}
		function komentar_fetch($limit, $start){
			$this->db->select('KOMENTAR.ID_KOMENTAR, KOMENTAR.NAMA_KOMENTAR, KOMENTAR.EMAIL_KOMENTAR, KOMENTAR.ID_BERITA, KOMENTAR.ISI_KOMENTAR, KOMENTAR.STATUS, KOMENTAR.TANGGAL_KOMENTAR, BERITA.JUDUL');
			$this->db->from('KOMENTAR');
			$this->db->join('BERITA','KOMENTAR.ID_BERITA = BERITA.ID_BERITA');
			$this->db->order_by('KOMENTAR.ID_KOMENTAR','DESC');
		    $this->db->limit($limit, $start);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		function reguser_record_count(){
			$query = $this->db->where('VALIDASI = 0')->get('TBL_USER');
			return $query->num_rows();
		}
		function reguser_fetch($limit, $start){
			/*$query = $this->db->query("SELECT ID_USER, USERNAME, PASSWORD, ID_KATEGORI_USER, ID_PELATIHAN, NAMA_LENGKAP, TEMPAT_LAHIR, TANGGAL_LAHIR, ALAMAT, NOTEL, AGAMA,STATUS_PEKERJAAN, VALIDASI, FOTO FROM TBL_USER
			WHERE VALIDASI = 0
			AND (ID_KATEGORI_USER='1' OR ID_KATEGORI_USER='2') ORDER BY ID_USER DESC LIMIT $limit, $start"); */
			//$this->db->get();
			
			$this->db->select('ID_USER, USERNAME, PASSWORD, ID_KATEGORI_USER, NAMA_LENGKAP, TEMPAT_LAHIR, TANGGAL_LAHIR, ALAMAT, NOTEL, AGAMA,STATUS_PEKERJAAN, VALIDASI, FOTO');
			$this->db->from('TBL_USER');
			$this->db->where('VALIDASI = 0');
			$this->db->where('ID_KATEGORI_USER = 1 OR ID_KATEGORI_USER=2');
			$this->db->where('VALIDASI = 0');
			$this->db->order_by('ID_USER','DESC');
		    $this->db->limit($limit, $start);
			$query = $this->db->get(); 
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function mengajar_record_count(){
			$query = $this->db->query("SELECT R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.STATUS_MENGAJAR, R.VALIDASI, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, U.NAMA_LENGKAP, ROWNUM AS RN
				FROM REGISTRASI_MENGAJAR R, TBL_USER U
				WHERE
				R.ROWID IN (SELECT MAX(ROWID) FROM REGISTRASI_MENGAJAR RR GROUP BY RR.ID_PELATIHAN, RR.ID_USER)
				AND
				R.ID_USER = U.ID_USER
				AND
				R.STATUS_MENGAJAR = 1
				AND
				R.VALIDASI = 0
				ORDER BY R.ID_REGISTRASI_MENGAJAR DESC");
			return $query->num_rows();
		}
		function mengajar_fetch($limit, $start){
		/*	$this->db->select('R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.STATUS_MENGAJAR, R.VALIDASI, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, U.NAMA_LENGKAP');
			$this->db->from('REGISTRASI_MENGAJAR R');
			$this->db->join('TBL_USER U','R.ID_USER = U.ID_USER');
			$this->db->where('R.STATUS_MENGAJAR = 1');
			$this->db->where('R.VALIDASI = 0');
		    $this->db->limit($limit, $start);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false; */
			$query = $this->db->query("SELECT * FROM 
				(SELECT R.ID_REGISTRASI_MENGAJAR, R.ID_USER, R.JAM_MENGAJAR, R.ID_PELATIHAN, R.TANGGAL_MENGAJAR, R.STATUS_MENGAJAR, R.VALIDASI, R.BULAN_MENGAJAR, R.TAHUN_MENGAJAR, U.NAMA_LENGKAP, ROWNUM AS RN
				FROM REGISTRASI_MENGAJAR R, TBL_USER U
				WHERE
				R.ROWID IN (SELECT MAX(ROWID) FROM REGISTRASI_MENGAJAR RR GROUP BY RR.ID_PELATIHAN, RR.ID_USER, RR.TANGGAL_MENGAJAR, RR.BULAN_MENGAJAR, RR.TAHUN_MENGAJAR)
				AND
				R.ID_USER = U.ID_USER
				AND
				R.STATUS_MENGAJAR = 1
				AND
				R.VALIDASI = 0
				ORDER BY R.ID_REGISTRASI_MENGAJAR DESC
				) sub
			WHERE sub.RN <= $limit AND sub.RN >=$start");
			
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		function daftar_ignore_record_count(){
			$query = $this->db->where('VALIDASI = 2')->get('TBL_USER');
			return $query->num_rows();
		}
		function fetch_ignore($limit, $start){
			$this->db->select('ID_USER, USERNAME, PASSWORD, ID_KATEGORI_USER, NAMA_LENGKAP, TEMPAT_LAHIR, TANGGAL_LAHIR, ALAMAT, NOTEL, AGAMA,STATUS_PEKERJAAN, VALIDASI, FOTO');
			$this->db->from('TBL_USER');
			$this->db->where('VALIDASI = 2');
			$this->db->where('ID_KATEGORI_USER = 2');
			$this->db->where('VALIDASI = 2');
			$this->db->order_by('ID_USER','DESC');
		    $this->db->limit($limit, $start);
			$query = $this->db->get(); 
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		function baca_member_count(){
			$query = $this->db->where('VALIDASI = 0')->get('TBL_USER');
			return $query->num_rows();
		}
		
	}
?>