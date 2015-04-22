<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Report extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
		}
		function index(){
			$this->load->view('error404');
		}
		function testmember(){
			$data['pelatihan'] = $this->mread->pelatihan();
			
			$id_pelatihan = $this->input->post('pelatihan');
			$tanggal = $this->input->post('tanggal_pelatihan');
			if($tanggal != ''){
				$getTanggal = $this->convdate($tanggal);
				//echo '<script type="text/javascript">alert("'.$getTanggal.'")</script>';
			}else{
				$getTanggal = $tanggal;
			}
			if($this->input->post('tanggal_pelatihan') != NULL)
			$data['tampilkan'] = $this->mread->hasil_test_member($id_pelatihan, $getTanggal);
			$data['page'] = "hasilmembertest";
			$this->load->view('admin/container', $data);
		}
		function quisioner_member(){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "report_quisioner_member";
			$this->load->view("admin/container", $data);
		
		}
		function quisioner_tutor(){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "report_quisioner_tutor";
			$this->load->view("admin/container", $data);
		
		}
		function view_member_awal($id){
			$data['detail'] = $this->mread->daftar_quisioner_member($id);
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['page'] = "detail_quisioner_member_awal";
			$this->load->view('admin/container', $data);
		}
		function view_tutor_awal($id){
			$data['detail'] = $this->mread->daftar_quisioner_tutor($id);
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['page'] = "detail_quisioner_tutor_awal";
			$this->load->view('admin/container', $data);
		}
		function quisioner_member_View(){
			/*$data['jumlah_soal'] = $this->mread->baca_jumlah_soal_quisioner($id_pelatihan);
			$data['detail_report'] = $this->mread->detail_report_quisioner_member($id_pelatihan);*/
			$id_pelatihan = $this->input->get('id_pelatihan');
			$id_quisioner = $this->input->get('id_quisioner');
			
			/*$data['jumlah_soal'] = $this->mread->baca_jumlah_soal_quisioner($id_pelatihan);
			$data['detail_report'] = $this->mread->detail_report_quisioner_member($id_pelatihan);*/
			
			$data['soal_quisioner_member'] = $this->mread->soal_quisioner_aja($id_quisioner);
			$data['page'] = "new_report_member_quisioner";
			$this->load->view('admin/container', $data);
		}
		function quisioner_tutor_View(){
			$id_pelatihan = $this->input->get('id_pelatihan');
			$id_quisioner = $this->input->get('id_quisioner');
			
			$data['soal_quisioner_member'] = $this->mread->soal_quisioner_tutor_aja($id_quisioner);
			$data['page'] = "new_report_tutor_quisioner";
			$this->load->view('admin/container', $data);
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
		function is_logged_in(){
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true){
				$this->session->set_flashdata('msg', 'Akses dilarang. Anda tidak diidzinkan mengakses halaman ini. Atau session habis. Silahkan login !');
				redirect(base_url().'login');	
			}
		}
	}
?>