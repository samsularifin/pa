<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instruktur extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->model('mread');
			$this->load->model('paging');
	}
	public function index()
	{
		$config = array();
		$config["base_url"] = base_url() . "instruktur/index/";
		$config["total_rows"] = $this->paging->instruktur_recourd_count();
		$config["per_page"] = 5;
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
		$data["instruktur"] = $this->paging->baca_instruktur($config["per_page"]+$page, $page+1);
		$data["berita_left"] = $this->mread->baca_berita_left();
		$data["links"] = $this->pagination->create_links();
		$data['page'] = "tutor";
		$this->load->view('container', $data);
		
		
		/*$data['instruktur'] = $this->mread->baca_instruktur();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["berita_left"] = $this->paging->berita_fetch(6, $page+1);
		$data["slider"] = $this->mread->slider();
		
		$data['page'] = "tutor";
		$this->load->view('container', $data);*/
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */