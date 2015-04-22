<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Upload extends CI_Controller{
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
			$id_user = $this->session->userdata('ID_USER');
			
			$data['cekupload'] = $this->mread->check_upload_file($id_user);
			$data['page'] = "upload_file";
			$this->load->view('tutor/container', $data);
		}
		function simpan(){
			if($this->mupdate->upload_file_pendukung() == FALSE){
				$this->session->set_flashdata('upload_error','Upload gagal. Silahkan ulangi lagi');
				redirect('tutor/upload');
			}else{
				$this->mupdate->upload_file_pendukung();
				$this->session->set_flashdata('upload_sukses','Upload Berhasil');
				redirect('tutor/upload');
			}
		}
		function onclickup($id){
			$data['hasil'] = $this->mread->iduser($id);
			$data['page'] = "v_update_upload";
			$this->load->view('tutor/container', $data);
		}
		function update($id){
			$this->mupdate->upload_file($id);
			redirect('tutor/upload');
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