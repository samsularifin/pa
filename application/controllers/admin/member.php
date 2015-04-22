<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Member extends CI_Controller{
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
			$config["base_url"] = base_url() . "admin/reguser/index";
			$config["total_rows"] = $this->paging->reguser_record_count();
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
			
			
			$data["ruser"] = $this->paging->reguser_fetch($config["per_page"], $page+1);
			$data["links"] = $this->pagination->create_links();
			$data["page"] = "registrasi_user";
		
			$this->load->view('admin/container', $data);
		
		
			/*$data['ruser'] = $this->mread->reg_user();
			$data['page'] = "registrasi_user";
			$this->load->view('admin/container', $data); */
		}
		function sertifikat($id){
			$this->mupdate->confirm_sertifikat($id);
			redirect('admin/user/member','refresh');
		}
		function onclickadd(){
			$data['page'] = "v_insert_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$this->minsert->pelatihan();
			redirect('admin/pelatihan');
		}
		function onclickup($id){
			$data['hasil'] = $this->mread->idpelatihan($id);
			$data['page'] = "v_update_pelatihan";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->pelatihan($id);
			redirect('admin/pelatihan');
		}
		function delete($id){
			$this->mdelete->pelatihan($id);
			redirect('admin/pelatihan');
		}
		function detail($id){
			$data['hasil'] = $this->mread->ureg($id);
			$data['chart'] = $this->mread->chart_member($id);
			$data['page'] = "detail_member";
			$this->load->view('admin/container', $data);
		}
		function admin_detail($id){
			$data['hasil'] = $this->mread->ureg($id);
			$data['page'] = "detail_user_admin";
			$this->load->view('admin/container', $data);
		}
		function confirm($id){
			$this->mupdate->confirm_user($id);
			redirect('admin/reguser/','refresh');
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