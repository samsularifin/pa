<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Profile extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('tutor/mread');
			$this->load->model('tutor/minsert');
			$this->load->model('tutor/mupdate');
			$this->load->model('tutor/mdelete');
		}
		function index(){
			$data['profile'] = $this->mread->profile_tutor();
			$data['page'] = "profile";
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
			$data['user'] = $this->mread->iduser($id);
			$data['page'] = "v_update_profile";
			$this->load->view('tutor/container', $data);
		}
		function update($id){
			$this->mupdate->profile($id);
			redirect('tutor/profile/');
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
	}
?>