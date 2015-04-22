<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Jadwal extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('member/mread');
			$this->load->model('member/minsert');
			$this->load->model('member/mupdate');
			$this->load->model('member/mdelete');
		}
		function index(){
			$data['pelatihan'] = $this->mread->pelatihanaja();
			$data['page'] = "available_jadwal";
			$this->load->view('member/container', $data);
		}
		function daftar(){
			$tanggal = $this->input->post('tanggal_pelatihan');
			$checkreg = $this->mread->checkreg($tanggal);
			
			if($checkreg == TRUE){
				$this->minsert->registrasi_pelatihan();
				$this->session->set_flashdata('pesan','Pendaftaran berhasil. Silahkan lihat di List Pelatihan Anda');
				redirect('member/registrasi');
			}else{
				redirect('member/registrasi/error/');
			}
		}
		function error(){
			$data['page'] = "error";
			$this->load->view('member/container', $data);
		}
		function check(){
			$data['check'] = $this->mread->check_jadwal();
			//$data['check_tetap'] = $this->mread->check_jadwal_tetap();
			
			$data['page'] = "check_jadwal";
			$this->load->view("member/container", $data);
		}
		function ambil($id){
			
			$this->db->select('ID_REGISTRASI_MENGAJAR, ID_PELATIHAN, TANGGAL_MENGAJAR, BULAN_MENGAJAR, TAHUN_MENGAJAR,JAM_MENGAJAR ');
			$this->db->from('REGISTRASI_MENGAJAR');
			$this->db->where('ID_REGISTRASI_MENGAJAR',$id);

			$query = $this->db->get();
				foreach($query->result() as $data2){
					$GLOBALS['id_pelatihan'] = $data2->ID_PELATIHAN;
					$GLOBALS['tanggal_mengajar'] = $data2->TANGGAL_MENGAJAR;
					$GLOBALS['bulan_mengajar'] = $data2->BULAN_MENGAJAR;
					$GLOBALS['tahun_mengajar'] = $data2->TAHUN_MENGAJAR;
					$GLOBALS['jam_mengajar'] = $data2->JAM_MENGAJAR;
				}
			
			$this->minsert->new_registrasi_pelatihan($GLOBALS['id_pelatihan'], $GLOBALS['tanggal_mengajar'], $GLOBALS['bulan_mengajar'], $GLOBALS['tahun_mengajar'], $GLOBALS['jam_mengajar']);
			
			redirect('member/listpelatihan/');
		}
		function is_logged_in(){
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true){
				$this->session->set_flashdata('msg', 'Akses dilarang. Anda tidak diidzinkan mengakses halaman ini. Atau session habis. Silahkan login !');
				redirect(base_url().'login');	
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

	}
?>