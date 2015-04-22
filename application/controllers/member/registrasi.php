<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Registrasi extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('member/mread');
			$this->load->model('member/minsert');
			$this->load->model('member/mupdate');
			$this->load->model('member/mdelete');
		}
		function index(){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "registrasi";
			$this->load->view('member/container', $data);
		}
		function daftar(){
			$tanggal = $this->input->post('tanggal_pelatihan');
			$checkreg = $this->mread->checkreg($tanggal);
			
			
			$id_user = $this->session->userdata('ID_USER');
			$pelatihan = $this->input->post('pelatihan');
			$tanggal_pelatihan = $this->input->post('tanggal_pelatihan');
			
			$convtanggal = $this->convdate($tanggal_pelatihan);
			$waktu = $this->input->post('waktu');
			
			$checkavailablejadwal = $this->mread->cek_available_jadwal($pelatihan, $tanggal_pelatihan, $waktu);
			
			$checklagi = $this->mread->cek_kuota($pelatihan, $convtanggal, $waktu);
			if($checkavailablejadwal == TRUE){
						if($checkreg == TRUE){
							if($checklagi == FALSE){
								$this->minsert->registrasi_pelatihan();
								$this->session->set_flashdata('pesan','Pendaftaran berhasil. Silahkan lihat di List Pelatihan Anda');
								redirect('member/registrasi');
							}else{
								redirect('member/registrasi/error_lagi/');
							}
						}else{
							redirect('member/registrasi/error/');
						}
				}else{
					redirect('member/registrasi/dan_error_lagi/');
			}
		}
		function error(){
			$data['page'] = "error";
			$this->load->view('member/container', $data);
		}
		function error_lagi(){
			$data['page'] = "error_lagi";
			$this->load->view('member/container', $data);
		}
		function dan_error_lagi(){
			$data['page'] = "dan_error_lagi";
			$this->load->view('member/container', $data);
		}
		function onclickadd(){
			$data['page'] = "v_insert_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$this->minsert->pelatihan();
			redirect('admin/pelatihan');
		}
		function onclickup($id){
			$data['hasil'] = $this->mread->idpelatihan($id);
			$data['page'] = "v_update_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->pelatihan($id);
			redirect('admin/pelatihan');
		}
		function delete($id){
			$this->mdelete->pelatihan($id);
			redirect('admin/pelatihan');
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