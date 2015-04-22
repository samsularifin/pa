<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Pelatihan extends CI_Controller{
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
			$data['page'] = "daftarpelatihan";
			$this->load->view('admin/container', $data);
		}
		function klinik(){
			$data['klinik'] = $this->mread->listklinik();
			$data['page'] = "daftarklinik";
			$this->load->view('admin/container', $data);
		}
		function onclickadd(){
			$data['page'] = "v_insert_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function clickaddklinik(){
			$data['page'] = "v_insert_klinik";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$this->minsert->pelatihan();
			redirect('admin/pelatihan');
		}
		function klinikadd(){
			$this->minsert->klinik();
			redirect('admin/pelatihan/klinik/');
		}
		function onclickup($id){
			$data['hasil'] = $this->mread->idpelatihan($id);
			$data['page'] = "v_update_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function klinikclickup($id){
			$data['hasil'] = $this->mread->idpelatihan($id);
			$data['page'] = "v_update_klinik";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->pelatihan($id);
			redirect('admin/pelatihan');
		}
		function klinikupdate($id){
			$this->mupdate->klinik($id);
			redirect('admin/pelatihan/klinik/');
		}
		function delete($id){
			$this->mdelete->pelatihan($id);
			redirect('admin/pelatihan');
		}
		function klinikdelete($id){
			$this->mdelete->pelatihan($id);
			redirect('admin/pelatihan/klinik/');
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