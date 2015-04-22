<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Jadwal extends CI_Controller{
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
			$id_pelatihan = $this->input->post('nama_pelatihan');
			$tanggal = $this->input->post('tanggal_pelatihan');
			
			if($this->input->post('tanggal_pelatihan') != NULL)	
				
			$data['jadwal'] = $this->mread->baca_jadwal($id_pelatihan, $tanggal);
			$data['page'] = "jadwal";
			$this->load->view('admin/container', $data);
		}
		function onclickup($id){
			$data['pelatihan'] = $this->mread->listpelatihan();
			$data['hasil'] = $this->mread->idmengajar($id);
			$data['page'] = "v_update_jadwal";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->jadwal_mengajar($id);
			$this->session->set_flashdata('update_jadwal','Update jadwal berhasil');
			redirect('admin/jadwal/index/');
		}
		function delete($id){
			$this->mdelete->jadwal_mengajar($id);
			$this->session->set_flashdata('delete_jadwal','Delete jadwal berhasil');
			redirect('admin/jadwal/index/');
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
		function is_logged_in(){
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true){
				$this->session->set_flashdata('msg', 'Akses dilarang. Anda tidak diidzinkan mengakses halaman ini. Atau session habis. Silahkan login !');
				redirect(base_url().'login');	
			}
		}
	}
?>