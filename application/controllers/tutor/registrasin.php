<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Registrasin extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('tutor/mread');
			$this->load->model('tutor/minsert');
			$this->load->model('tutor/mupdate');
			$this->load->model('tutor/mdelete');
		}
		function index(){
			//$data['module'] = $this->mread->modul_tutor();
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "registrasin";
			$this->load->view('tutor/container', $data);
		}
		function tampilkan($id){
			$data['id'] = $this->uri->segment(4);
			$this->load->view('tutor/reg_jadwal', $data);
		}
		function lanjut(){
			$id_user = $this->session->userdata('ID_USER');
			$id_pelatihan = $this->input->post('edukasii');
			$data['pelatihan'] = $this->mread->id_pelatihan_diambil($id_pelatihan);
			$data['identitas'] = $this->mread->identitas($id_user);
			//$data['pelatihan'] = 
			$data['page'] = "next";
			$this->load->view('tutor/container', $data);
		}
		function simpan(){
			$check = $this->mread->check_jadwal_sama();
			
			if($check == TRUE){
				$this->minsert->simpan_mengajar_non();
				$this->session->set_flashdata('pesann','Pendaftaran berhasil. Mohon menunggu approval administrator');
				redirect('tutor/registrasin');
			}else if($check == FALSE){
				$this->jadwal_sama();
			}

		}
		function jadwal_sama(){
			$data["page"] = "jadwal_sama";
			$this->load->view('tutor/container', $data);
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