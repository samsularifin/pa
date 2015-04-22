<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Grafik extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
		}
		function index(){
			$data['pelatihan'] = $this->mread->listpelatihan();
			$id_pelatihan = $this->input->post('nama_pelatihan');
			$tanggal = $this->input->post('tanggal_pelatihan');
			
			if($this->input->post('tanggal_pelatihan') != NULL)	
				
			$data['jadwal'] = $this->mread->baca_jadwal($id_pelatihan, $tanggal);
			$data['page'] = "jadwal";
			$this->load->view('admin/container', $data);
		}
		function member(){
			$tanggal = $this->input->post('tanggal_pelatihan');
			
			if($this->input->post('tanggal_pelatihan') != NULL)	
			$data['pelatihan'] = $this->mread->listpelatihan();
		//	$data['grafik_member'] = $this->mread->grafik_member($tanggal);
			$data['page'] = "grafik_member";
			$this->load->view('admin/container', $data);
		}
		function tutor(){
			$tanggal = $this->input->post('tanggal_pelatihan');
			
			if($this->input->post('tanggal_pelatihan') != NULL)	
			$data['pelatihan'] = $this->mread->listpelatihan();
			//$data['grafik_tutor'] = $this->mread->grafik_tutor($tanggal);
			$data['page'] = "grafik_tutor";
			$this->load->view('admin/container', $data);
		}
		function year_member(){
			$data['bulan'] = $this->mread->bulan_pelatihan();
			$data['page'] = "grafik_member_year";
			$this->load->view('admin/container', $data);
		}
		function year_tutor(){
			$data['bulan'] = $this->mread->bulan_pelatihan();
			$data['page'] = "grafik_tutor_year";
			$this->load->view('admin/container', $data);
		}
		function is_logged_in(){
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true){
				$this->session->set_flashdata('msg', 'Akses dilarang. Anda tidak diidzinkan mengakses halaman ini. Atau session habis. Silahkan login !');
				redirect(base_url().'login');	
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
	}
?>