<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Quisioner extends CI_Controller{
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
		function member(){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "quisionermember";
			$this->load->view('admin/container', $data);
		}
		function tutor(){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "quisionertutor";
			$this->load->view('admin/container', $data);
		}
		function getView($id){
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['detail_quisioner'] = $this->mread->detail_quisioner($id);
			$this->load->view('admin/detail_quisioner', $data);
		}
		function getViewTutor($id){
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['detail_quisioner'] = $this->mread->detail_quisioner_tutor($id);
			$this->load->view('admin/detail_quisioner_tutor', $data);
		}
		function onclickadd_member($id){
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['page'] = "v_insert_quisioner_member";
			$this->load->view('admin/container', $data);
		}
		function insert_quisioner_member($id){
			$this->minsert->quisioner_member($id);
			redirect('admin/quisioner/member/');
		}
		function onclickup_quisioner_member(){
			$id_quisioner = $this->input->get('id_quisioner');
			$id_pelatihan = $this->input->get('id_pelatihan');
			
			$data['id_pel'] = $this->mread->id_pelatihan($id_pelatihan);
			$data['hasil'] = $this->mread->id_quisioner($id_quisioner);
			$data['page'] = "v_update_quisioner";
			$this->load->view('admin/container', $data);
			
		}
		function onclickup_quisioner_tutor(){
			$id_quisioner = $this->input->get('id_quisioner');
			$id_pelatihan = $this->input->get('id_pelatihan');
			
			$data['id_pel'] = $this->mread->id_pelatihan($id_pelatihan);
			$data['hasil'] = $this->mread->id_quisioner($id_quisioner);
			$data['page'] = "v_update_quisioner_tutor";
			$this->load->view('admin/container', $data);
			
		}
		function onclickadd_tutor($id){
			$data['id_pelatihan'] = $this->mread->id_pelatihan($id);
			$data['page'] = "v_insert_quisioner_tutor";
			$this->load->view('admin/container', $data);
		}
		function insert_quisioner_tutor($id){
			$this->minsert->quisioner_tutor($id);
			redirect('admin/quisioner/tutor/');
		}
		function soal($id){
			$data['soal_quisioner'] = $this->mread->soal_quisioner($id);
			//$data['jawaban_quiz_tutor'] = $this->mread->jawaban_quiz_tutor($id);
			$data['page'] = "soal_quisioner_member";
			$this->load->view('admin/container', $data);
		}
		function soal_tutor($id){
			$data['soal_quisioner'] = $this->mread->soal_quisioner_tutor($id);
			//$data['jawaban_quiz_tutor'] = $this->mread->jawaban_quiz_tutor($id);
			$data['page'] = "soal_quisioner_tutor";
			$this->load->view('admin/container', $data);
		}
		function buat_soal(){
			$data['jumlah_soal'] = $this->input->get('jumlah_soal');
			$data['ambil_id'] = $this->input->get('id_quisioner');
			$data['page'] = "v_insert_soal_quisioner";
			$this->load->view('admin/container', $data);
		}
		function buat_soal_quisioner_tutor(){
			$data['jumlah_soal'] = $this->input->get('jumlah_soal');
			$data['ambil_id'] = $this->input->get('id_quisioner');
			$data['page'] = "v_insert_soal_quisioner_tutor";
			$this->load->view('admin/container', $data);
		}
		function insert_soal($id){
			$this->minsert->pertanyaan_quisioner_member($id);
				
			$this->session->set_flashdata('insert_quisioner','insert Pertanyaan Quisioner berhasil.');
			redirect('admin/quisioner/member/');
			
		}
		function insert_soal_tutor($id){
			$this->minsert->pertanyaan_quisioner_tutor($id);
				
			$this->session->set_flashdata('insert_quisioner','insert Pertanyaan Quisioner berhasil.');
			redirect('admin/quisioner/tutor/');
			
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
			$id_quiz = $this->input->get('id_quisioner');
			$id_pelatihan = $this->input->get('id_pelatihan');
			
			$this->mupdate->quioner_member($id_quiz);
			redirect('admin/quisioner/member/');
		}
		function update_tutor(){
			$id_quiz = $this->input->get('id_quisioner');
			$id_pelatihan = $this->input->get('id_pelatihan');
			
			$this->mupdate->quioner_tutor($id_quiz);
			redirect('admin/quisioner/tutor/');
		}
		function delete_quisioner_member(){
			$id_quisioner = $this->input->get('id_quisioner');
			$id_pela = $this->input->get('id_pelatihan');
			
			$this->mdelete->delete_quisioner_member($id_quisioner);
			redirect('admin/quisioner/member/');
		}
		function delete_quisioner_tutor(){
			$id_quisioner = $this->input->get('id_quisioner');
			$id_pela = $this->input->get('id_pelatihan');
			
			$this->mdelete->delete_quisioner_tutor($id_quisioner);
			redirect('admin/quisioner/tutor/');
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