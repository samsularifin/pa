<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	 function __construct(){
			parent::__construct();
			$this->load->model('mread');
			$this->load->model('minsert');
			$this->load->model('paging');
	}
	public function index()
	{
		redirect('beranda');
	}
	function tutor()
	{
		$data["slider"] = $this->mread->slider();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["berita_left"] = $this->paging->berita_fetch(5, $page+1);
		$data['page'] = "tutor_register";
		$this->load->view('container', $data);
	}
	function member(){
		$data["slider"] = $this->mread->slider();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["berita_left"] = $this->paging->berita_fetch(5, $page+1);
		$data['page'] = "member_reg";
		$this->load->view('container', $data);
	}
	function inserttutor(){
		$this->minsert->pendaftaran_tutor();
		redirect('login');
	}
	
	function insertmember(){
		$this->minsert->pendaftaran_member();
		redirect('login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */