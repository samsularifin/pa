<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Slider extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
			$this->load->model('paging');
		}
		function index(){
		    $data["slider"] = $this->mread->slider();
			$data["page"] = "slider";
			$this->load->view('admin/container', $data);
		}
		function onclickadd(){
			$data['page'] = "v_insert_slider";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$this->minsert->slider_front();
			redirect('admin/slider');
		}
		function onclickup($id){
			$data['hasil'] = $this->mread->idslider($id);
			$data['page'] = "v_update_slider";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->slider_front($id);
			redirect('admin/slider');
		}
		function delete($id){
			$this->mdelete->slider_front($id);
			redirect('admin/slider');
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