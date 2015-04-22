<?php
	if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('mread');
		}
		function index(){
			$this->load->view('login');
		}
		/*function anti_sql_injection($data){
			$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
			return $filter;
		}*/
		function auth(){
			$username = $this->input->post('username');
			$pass = $this->input->post('pass');
			$otoritas = $this->input->post('otoritas');
			
			/*$reusera = $this->anti_sql_injection($username);
			$repassa = $this->anti_sql_injection($pass);*/
			$reusera =$username;
			$repassa = $pass;
			
			if(empty($username) or empty($pass)){
				$this->session->set_flashdata('msg','Username dan Password tidak boleh kosong');
				redirect('login');
			} else if (!ctype_alnum($reusera) OR !ctype_alnum($repassa))
			{
				$this->session->set_flashdata('msg','Masukkan username dan password dengan benar!');
					redirect('login');
			}
			
			
			$query = $this->mread->user_auth();
			if($query)
			   {
				if($otoritas == 1){
					$sess_array = array();
					 foreach($query as $data)
					 {
					   $sess_array = array(
						'ID_USER' => $data->ID_USER,
						 'USERNAME' => $data->username,
						 'NAMA_LENGKAP' => $data->NAMA_LENGKAP,
						 'sebagai' =>'member',
						 'is_logged_in' =>TRUE
					   );
					   $this->session->set_userdata($sess_array);
					 }
					 redirect(base_url().'member/index/');
				}else if($otoritas == 2){
					$sess_array = array();
					 foreach($query as $data)
					 {
					   $sess_array = array(
						'ID_USER' => $data->ID_USER,
						 'username' => $data->username,
						 'NAMA_LENGKAP' => $data->NAMA_LENGKAP,
						 'sebagai' =>'tutor',
						 'is_logged_in' =>TRUE
					   );
					   $this->session->set_userdata($sess_array);
					 }
					 redirect(base_url().'tutor/index/');
				 }
				 else if($otoritas == 3){
					$sess_array = array();
					 foreach($query as $data)
					 {
					   $sess_array = array(
						 'ID_USER' => $data->ID_USER,
						 'username' => $data->username,
						 'NAMA_LENGKAP' => $data->NAMA_LENGKAP,
						 'sebagai' =>'admin',
						 'is_logged_in' =>TRUE
					   );
					   $this->session->set_userdata($sess_array);
					 }
					 redirect(base_url().'admin/index/');
				 }else{
					$this->session->set_flashdata('msg', 'Autority fucked');
					redirect(base_url().'login');
				 }
			   }
			else{
				$this->session->set_flashdata('msg', 'Username atau password salah. Mohon menunggu approval jika anda sudah melakukan registrasi');
				redirect(base_url().'login');
				}
		//	}
		}
		function logout(){
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('is_logged_in');
			redirect(base_url().'login','refresh'); 
		}
	}
?>