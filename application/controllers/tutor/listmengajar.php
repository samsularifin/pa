<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Listmengajar extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('tutor/mread');
			$this->load->model('tutor/minsert');
			$this->load->model('tutor/mupdate');
			$this->load->model('tutor/mdelete');
			$this->load->model('tutor/paging');
		}
		function index(){
			$config = array();
			$config["base_url"] = base_url() . "tutor/listmengajar/index/";
			$config["total_rows"] = $this->paging->listmengajar_count($this->session->userdata('ID_USER'));
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;
			
			$config['full_tag_open'] = '<div><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div><!--pagination-->';
			$config['next_link'] = FALSE;
			$config['prev_link'] = FALSE;

			$config['cur_tag_open'] = '<li class="active"><a href=""style="color:#ffffff; background-color:#269fb2;">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['anchor_class'] = 'class="follow_link"';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
			
			$data["listmeng"] = $this->paging->listmengajar_fetch($config["per_page"], $page+1);
			$data["links"] = $this->pagination->create_links();
		
			$data['page'] = "list_mengajar";
			$this->load->view('tutor/container', $data);
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
			$data['pelatihan'] = $this->mread->listpelatihan();
			$data['hasil'] = $this->mread->idmengajar($id);
			$data['page'] = "v_update_mengajar";
			$this->load->view('tutor/container', $data);
		}
		function update($id){
			$this->mupdate->registrasi_mengajar($id);
			redirect('tutor/listmengajar');
		}
		function delete($id){
			$this->mdelete->listmengajar($id);
			redirect('tutor/listmengajar');
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