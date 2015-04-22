<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct(){
			parent::__construct();
			$this->load->model('mread');
			$this->load->model('paging');
	}
	public function index()
	{	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["berita_left"] = $this->paging->berita_fetch(6, $page+1);
		$data["slider"] = $this->mread->slider();
		$data['jadwal_front'] = $this->mread->jadwal_front();
		$data['page'] = "jadwal";
		$this->load->view('container', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */