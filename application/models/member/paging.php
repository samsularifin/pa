<?php
	class Paging extends CI_Model{
	
		public function __construct(){
			parent::__construct();
		}
		//Seputar tanah haram
		
		function listpelatihan_count($id){
			//$this->db->query("select count('*') from REGISTRASI_PELATIHAN where ID_USER = .$id");
			$query = $this->db->where('ID_USER', $id)->get('REGISTRASI_PELATIHAN');
			return $query->num_rows();
		}
		function listpelatihan_fetch($limit, $start){
			$this->db->select('REGISTRASI_PELATIHAN.ID_REGISTRASI,REGISTRASI_PELATIHAN.ID_USER, REGISTRASI_PELATIHAN.ID_PELATIHAN, REGISTRASI_PELATIHAN.TANGGAL_PELATIHAN, REGISTRASI_PELATIHAN.BULAN_PELATIHAN, REGISTRASI_PELATIHAN.TAHUN_PELATIHAN, REGISTRASI_PELATIHAN.WAKTU_PELATIHAN, PELATIHAN.NAMA_PELATIHAN');
			$this->db->from('REGISTRASI_PELATIHAN');
			$this->db->where('REGISTRASI_PELATIHAN.ID_USER', $this->session->userdata('ID_USER'));
			$this->db->join('PELATIHAN','REGISTRASI_PELATIHAN.ID_PELATIHAN = PELATIHAN.ID_PELATIHAN');
			$this->db->order_by('ID_REGISTRASI','DESC');
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