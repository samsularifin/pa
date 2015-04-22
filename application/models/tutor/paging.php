<?php
	class Paging extends CI_Model{
	
		public function __construct(){
			parent::__construct();
		}
		//Seputar tanah haram
		
		function listmengajar_count($id){
			//$this->db->query("select count('*') from REGISTRASI_PELATIHAN where ID_USER = .$id");
			$this->db->select('REGISTRASI_MENGAJAR.ID_REGISTRASI_MENGAJAR,REGISTRASI_MENGAJAR.TANGGAL_MENGAJAR, REGISTRASI_MENGAJAR.BULAN_MENGAJAR, REGISTRASI_MENGAJAR.TAHUN_MENGAJAR, REGISTRASI_MENGAJAR.ID_USER, REGISTRASI_MENGAJAR.ID_PELATIHAN, REGISTRASI_MENGAJAR.HARI_MENGAJAR, REGISTRASI_MENGAJAR.JAM_MENGAJAR, REGISTRASI_MENGAJAR.STATUS_MENGAJAR, PELATIHAN.NAMA_PELATIHAN');
			$this->db->from('REGISTRASI_MENGAJAR');
			$this->db->where('REGISTRASI_MENGAJAR.ID_USER', $this->session->userdata('ID_USER'));
			//$this->db->where('REGISTRASI_MENGAJAR.VALIDASI', 1);
			$this->db->join('PELATIHAN','REGISTRASI_MENGAJAR.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('ID_REGISTRASI_MENGAJAR','DESC');
			
			$query = $this->db->get();
			return $query->num_rows();
		}
		function listmengajar_fetch($limit, $start){
			$this->db->select('REGISTRASI_MENGAJAR.ID_REGISTRASI_MENGAJAR,REGISTRASI_MENGAJAR.TANGGAL_MENGAJAR, REGISTRASI_MENGAJAR.BULAN_MENGAJAR, REGISTRASI_MENGAJAR.TAHUN_MENGAJAR, REGISTRASI_MENGAJAR.ID_USER, REGISTRASI_MENGAJAR.ID_PELATIHAN, REGISTRASI_MENGAJAR.HARI_MENGAJAR, REGISTRASI_MENGAJAR.JAM_MENGAJAR, REGISTRASI_MENGAJAR.STATUS_MENGAJAR, REGISTRASI_MENGAJAR.VALIDASI, PELATIHAN.NAMA_PELATIHAN');
			$this->db->from('REGISTRASI_MENGAJAR');
			$this->db->where('REGISTRASI_MENGAJAR.ID_USER', $this->session->userdata('ID_USER'));
			//$this->db->where('REGISTRASI_MENGAJAR.VALIDASI', 1);
			$this->db->join('PELATIHAN','REGISTRASI_MENGAJAR.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('ID_REGISTRASI_MENGAJAR','DESC');
			$this->db->limit($limit, $start);
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		
	}
?>