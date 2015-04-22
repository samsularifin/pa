<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Quisioner extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('tutor/mread');
			$this->load->model('tutor/minsert');
			$this->load->model('tutor/mupdate');
			$this->load->model('tutor/mdelete');
		}
		function index(){
			$data['pelatihan'] = $this->mread->testlistpelatihan();
			$data['page'] = "quisioner";
			$this->load->view('tutor/container', $data);
		}
		function lihat($id){
			$id_user = $this->session->userdata('ID_USER');
			$id_pelatihan = $this->uri->segment(4);
			$data['cekambilquisioner'] = $this->mread->check_ambil_quisioner($id_user, $id_pelatihan);
			
			$data['kategori_quisioner'] = $this->mread->baca_kategori_quisioner($id);
			$data['ambil_id_pelatihan'] = $this->mread->idpelatihan($id);
			
			$data['page'] = "kategori_quisioner";
			$this->load->view('tutor/container', $data);
		}
		function isi_quisioner($id){
			$data['ambil_soal'] = $this->mread->soal_quisioner($id);
			$data['data_quiz'] = $this->mread->data_quisioner($id);
			$data['page'] = "mulai_quisioner";
			$this->load->view('tutor/container', $data);
		}
		function ambil($id){
			$id_pelatihan = $this->uri->segment(4);
			$data['getidpelatihan'] = $id_pelatihan;
			$data['test'] = $this->mread->baca_test($id_pelatihan);
			$this->load->view('tutor/ambil_test', $data);
		}
		function submit(){
			$this->minsert->quisioner();
			$this->session->set_flashdata('submit_quisioner','Quisioner berhasil dikirim.');
			redirect('tutor/quisioner/');
		}
		function error(){
			$data['page'] = "error";
			$this->load->view('member/container', $data);
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