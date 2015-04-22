<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Quizmember extends CI_Controller{
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
			$data['page'] = "quizmember";
			$this->load->view('admin/container', $data);
		}
		function view($id){
			$data['detail'] = $this->mread->daftar_quiz_tutor($id);
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['page'] = "detail_quiz_tutor";
			$this->load->view('admin/container', $data);
		}
		function soal($id){
			$data['soal_quiz_tutor'] = $this->mread->soal_quiz_aja($id);
			//$data['jawaban_quiz_tutor'] = $this->mread->jawaban_quiz_tutor($id);
			$data['page'] = "soal_quiz_tutor";
			$this->load->view('admin/container', $data);
		}
		function buat_soal(){
			$data['jumlah_soal'] = $this->input->get('jumlah_soal');
			$data['ambil_id'] = $this->input->get('id_quiz');
			$data['page'] = "v_insert_soal";
			$this->load->view('admin/container', $data);
		}
		function update_soal(){
			$this->mupdate->soal_member();
			redirect('admin/quizmember');
		}
		function edit_soal($id){
			$data['soal_quiz_tutor'] = $this->mread->soal_quiz_aja($id);
			$data['page'] = "v_update_soal_quiz_tutor";
			$this->load->view('admin/container', $data);
		}
		function insert_soal($id){
			$this->minsert->soal_member($id);
			redirect('admin/quizmember/');
		}
		function onclickadd($id){
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['page'] = "v_insert_quiz";
			$this->load->view('admin/container', $data);
		}
		function add($id){
			$this->minsert->quiz_pelatihan($id);
			redirect('admin/quizmember/view/'.$id);
		}
		function onclickup(){
			$id_quiz = $this->input->get('id_quiz');
			$id_pelatihan = $this->input->get('id_pelatihan');
			
			$data['id_pel'] = $this->mread->id_pelatihan($id_pelatihan);
			$data['hasil'] = $this->mread->id_quiz($id_quiz);
			$data['page'] = "v_update_quiz";
			$this->load->view('admin/container', $data);
		}
		function update(){
			$id_quiz = $this->input->get('id_quiz');
			$id_pela = $this->input->get('id_pelat');
			
			$this->mupdate->quiz_tutor($id_quiz);
			redirect('admin/quizmember/view/'.$id_pela);
		}
		function delete(){
			$id_quiz = $this->input->get('id_quiz');
			$id_pela = $this->input->get('id_pelatihan');
			
			$this->mdelete->quiz_tutor($id_quiz);
			redirect('admin/quizmember/view/'.$id_pela);
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