<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Mengajar extends CI_Controller{
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
			/*$config = array();
			$config["base_url"] = base_url() . "admin/mengajar/index";
			$config["total_rows"] = $this->paging->mengajar_record_count();
			$config["per_page"] = 3;
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
			
			
			$data["mengajar"] = $this->paging->mengajar_fetch($config["per_page"]+$page, $page+1);
			$data["links"] = $this->pagination->create_links();
			$data["page"] = "registrasi_mengajar";
		
			$this->load->view('admin/container', $data);*/
		
		
			/*$data['ruser'] = $this->mread->reg_user(); */
			$data["mengajar"] = $this->mread->mengajar();
			$data['page'] = "registrasi_mengajar";
			$this->load->view('admin/container', $data);
		}
		function detail($id){
			$data['chart'] = $this->mread->chart_tutor($id);
			$data["ambil"] = $this->mread->ambil_detail_mengajar($id);
			$data['page'] = "detail_registrasi_mengajar";
			$this->load->view('admin/container', $data);
		}
		function confirm(){
			$this->mupdate->confirm_mengajar();
			redirect('admin/mengajar/','refresh');
		}
		
		/*function detail($id){
			$data['hasil'] = $this->mread->ureg($id);
			$data['page'] = "detail_user_reg";
			$this->load->view('admin/container', $data);
		}*/
		function admin_detail($id){
			$data['hasil'] = $this->mread->ureg($id);
			$data['page'] = "detail_user_admin";
			$this->load->view('admin/container', $data);
		}
		/*function confirm($id){
			$this->mupdate->confirm_user($id);
			redirect('admin/reguser/','refresh');
		}*/
		function is_logged_in(){
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true){
				$this->session->set_flashdata('msg', 'Akses dilarang. Anda tidak diidzinkan mengakses halaman ini. Atau session habis. Silahkan login !');
				redirect(base_url().'login');	
			}
		}
	}
?>