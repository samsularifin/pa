<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Jadwal extends CI_Controller{
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
			$data['mengajar'] = $this->mread->mengajar();
			$data['page'] = "cek_jadwal";
			$this->load->view('tutor/container', $data);
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