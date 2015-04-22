<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Kuota extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
		}
		function index(){
			$data['kuota'] = $this->mread->kuotapelatihan();
			$data['page'] = "kuota";
			$this->load->view('admin/container', $data);
		}
		function onclickadd(){
			$data['pelatihan'] = $this->mread->listpelatihan();
			$data['page'] = "v_insert_kuota_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$pelatihan = $this->input->post('pelatihan');
			$check = $this->mread->check_kuota_pel($pelatihan);
			
			if($check == FALSE){
				$this->minsert->kuota_pelatihan();
				
				$this->session->set_flashdata('gakada','Insert kuota berhasil.');
				redirect('admin/kuota');
			}else{
				$this->session->set_flashdata('ada','Insert kuota gagal. Kuota pelatihan sudah ada. Silahkan diupdate');
				
				redirect('admin/kuota');
			}
		}
		function onclickup($id){
			$data['pelatihan'] = $this->mread->listpelatihan();
			$data['hasil'] = $this->mread->idkuota($id);
			$data['page'] = "v_update_kuota_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$pelatihan = $this->input->post('pelatihan');
			//$check = $this->mread->check_kuota_pel($pelatihan);
			
			//if($check == FALSE){
				$this->mupdate->kuota_pelatihan($id);
				$this->session->set_flashdata('gakada','Update kuota berhasil.');
				redirect('admin/kuota');
				
			//	redirect('admin/kuota');
			//}else{
			//	$this->session->set_flashdata('ada','Update kuota gagal. Kuota pelatihan sudah ada.');
				
			//	redirect('admin/kuota');
			//}
		}
		function delete($id){
			$this->mdelete->kuota_pelatihan($id);
			redirect('admin/kuota');
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