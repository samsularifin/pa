<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {
	function __construct(){
			parent::__construct();
		$this->load->model('mread');
		$this->load->model('paging');
	}
	public function index($id)
	{
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["berita_left"] = $this->paging->berita_fetch(5, $page+1);
		$data["slider"] = $this->mread->slider();
		$data["view"] = $this->mread->berita($id);
		$data["komentar"] = $this->mread->komentar($id);
		$data['komentar_count_all'] = $this->mread->komentar_count_all($id);
		
		$data["page"] = "berita_detail";
		$this->load->view('container', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */