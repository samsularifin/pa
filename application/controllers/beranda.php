<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->model('mread');
			$this->load->model('paging');
	}
	public function index()
	{
		$config = array();
		$config["base_url"] = base_url() . "beranda/index";
		$config["total_rows"] = $this->paging->berita_record_count();
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;
		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['next_link'] = FALSE;
		$config['prev_link'] = FALSE;

		$config['cur_tag_open'] = '<li class="active"><a href=""style="color:#ffffff; background-color:#2773ae;">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['anchor_class'] = 'class="follow_link"';
		
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data["slider"] = $this->mread->slider();
		$data["berita"] = $this->paging->berita_fetch($config["per_page"], $page+1);
		$data["berita_left"] = $this->mread->baca_berita_left();
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view('container', $data);
	}
	function view($id){
		$data["view"] = $this->mread->berita($id);
		$data["page"] = "berita_detail";
		$this->load->view('container', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */