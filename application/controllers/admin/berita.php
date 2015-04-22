<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Berita extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
			$this->load->model('admin/paging');
		}
		function index(){
			$config = array();
			$config["base_url"] = base_url() . "admin/berita/index";
			$config["total_rows"] = $this->paging->berita_record_count();
			$config["per_page"] = 5;
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
			
			
			$data["berita"] = $this->paging->berita_fetch($config["per_page"], $page+1);
			$data["links"] = $this->pagination->create_links();
			$data["page"] = "berita";
		
			$this->load->view('admin/container', $data);
		}
		function onclickadd(){
			$data['page'] = "v_insert_berita";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$this->minsert->berita_front();
			redirect('admin/berita');
		}
		function onclickup($id){
			$data['hasil'] = $this->mread->idberita($id);
			$data['page'] = "v_update_berita";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->berita_front($id);
			redirect('admin/berita');
		}
		function delete($id){
			$this->mdelete->berita_front($id);
			redirect('admin/berita');
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