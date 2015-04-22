<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Listpelatihan extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('member/mread');
			$this->load->model('member/minsert');
			$this->load->model('member/mupdate');
			$this->load->model('member/mdelete');
			$this->load->model('member/paging');
		}
		function index(){
			$config = array();
			$config["base_url"] = base_url() . "member/listpelatihan/index/";
			$config["total_rows"] = $this->paging->listpelatihan_count($this->session->userdata('ID_USER'));
			$config["per_page"] = 4;
			$config["uri_segment"] = 4;
			
			$config['full_tag_open'] = '<div><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div><!--pagination-->';
			$config['next_link'] = FALSE;
			$config['prev_link'] = FALSE;

			$config['cur_tag_open'] = '<li class="active"><a href=""style="color:#ffffff; background-color:#62a8d9;">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['anchor_class'] = 'class="follow_link"';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
			
			$data["listpel"] = $this->paging->listpelatihan_fetch($config["per_page"], $page+1);
			$data["links"] = $this->pagination->create_links();
			//$data['check'] = $this->mread->check_approval_sertifikat($id);
			
			$data['page'] = "list_pelatihan";
			$this->load->view('member/container', $data);
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
			$data['pelatihan'] = $this->mread->pelatihanaja();
			$data['hasil'] = $this->mread->idregpelatihan($id);
			$data['page'] = "v_update_pelatihan";
			$this->load->view('member/container', $data);
		}
		function update($id){
			$pelatihan = $this->input->post('id_pelatihan');
			$tanggal_pelatihan = $this->input->post('tanggal_pelatihan');
			$waktu = $this->input->post('waktu');
			
			$checkavailablejadwal = $this->mread->cek_available_jadwal($pelatihan, $tanggal_pelatihan, $waktu);
			
			if($checkavailablejadwal == TRUE){
				$this->mupdate->registrasi_pelatihan($id);
				redirect('member/listpelatihan');
			}else{
				redirect('member/listpelatihan/error_update');
			}
		}
		function error_update(){
			$data["page"] = "error_update";
			$this->load->view('member/container', $data);
		}
		function delete($id){
			$this->mdelete->listpelatihan($id);
			redirect('member/listpelatihan');
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