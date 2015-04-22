<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Index extends CI_Controller{
		function __construct(){
			parent::__construct();	
			$this->is_logged_in();
			$this->load->model('mread');
		}
		function index(){
			$this->load->view('tutor/container');
		}
		function logout(){
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('is_logged_in');
			$this->session->unset_userdata('sebagai');
			redirect('login','refresh'); 
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