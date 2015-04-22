<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Gallery extends CI_Controller{
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
			$config = array();
			$config["base_url"] = base_url() . "admin/gallery/index";
			$config["total_rows"] = $this->paging->gallery_record_count();
			$config["per_page"] = 6;
			$config["uri_segment"] = 4;
			
			$config['full_tag_open'] = '<div><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div><!--pagination-->';
			$config['next_link'] = FALSE;
			$config['prev_link'] = FALSE;

			$config['cur_tag_open'] = '<li class="active"><a href=""style="color:#ffffff; background-color:#16cbe6;">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['anchor_class'] = 'class="follow_link"';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
			
			$data["gallery"] = $this->paging->gallery_fetch($config["per_page"], $page+1);
			$data["links"] = $this->pagination->create_links();
			$data["page"] = "gallery";
		
			$this->load->view('admin/container', $data);
		}
		function onclickadd(){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "v_insert_gallery";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$this->minsert->gallery_front();
			redirect('admin/gallery');
		}
		function onclickup($id){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['hasil'] = $this->mread->idgallery($id);
			$data['page'] = "v_update_gallery";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->gallery_front($id);
			redirect('admin/gallery');
		}
		function delete($id){
			$this->mdelete->gallery_front($id);
			redirect('admin/gallery');
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