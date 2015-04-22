<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelatihan extends CI_Controller {
	 function __construct(){
			parent::__construct();
			$this->load->model('mread');
			$this->load->model('paging');
	}
	public function index()
	{	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["berita_left"] = $this->paging->berita_fetch(5, $page+1);
		$data["slider"] = $this->mread->slider();
		$data['pelatihan'] = $this->mread->getPelatihan();
		$data['page'] = "pelatihan";
		$this->load->view('container', $data);
	}
	function klinik(){
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["berita_left"] = $this->paging->berita_fetch(5, $page+1);
		$data["slider"] = $this->mread->slider();
		$data['klinik'] = $this->mread->getKlinik();
		$data['page'] = "klinik";
		$this->load->view('container', $data);
	}
	function modal($id){
		$data['ambil_id'] = $this->mread->pelatihan_id($id);
		$this->load->view('modal', $data);
	}
	function modal_klinik($id){
		$data['ambil_id'] = $this->mread->pelatihan_id($id);
		$this->load->view('modal_klinik', $data);
	}
	function it_detail($id){
		$data["slider"] = $this->mread->slider();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["berita_left"] = $this->paging->mread->baca_berita_left();
		$data['ambil_id'] = $this->mread->pelatihan_id($id);
		$data["page"] = "it_detail";
		$this->load->view('container', $data);
	}
	
}