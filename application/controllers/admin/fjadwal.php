<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Fjadwal extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
		}
		function index(){
			$data['jadwal'] = $this->mread->jadwal_front();
			$data['page'] = "jadwal_front";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->jadwal_front($id);
			redirect('admin/fjadwal');
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