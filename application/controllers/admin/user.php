<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
		}
		function index(){
			redirect('admin/index/','refresh');
		}
		function member(){
			$data['pelatihan'] = $this->mread->pelatihan();
			//if($this->input->post('nama_pelatihan') != NULL)
			$id_pelatihan = $this->input->post('nama_pelatihan');
			$tanggal = $this->input->post('tanggal_pelatihan');
			
			if($tanggal != ''){
				$getTanggal = $this->convdate($tanggal);
				//echo '<script type="text/javascript">alert("'.$getTanggal.'")</script>';
			}else{
				$getTanggal = $tanggal;
			}
			
			$waktu = $this->input->post('waktu_pel');
			
			if($this->input->post('tanggal_pelatihan') != NULL)	
				
			$data['member'] = $this->mread->baca_member($id_pelatihan, $tanggal, $waktu);
			$data['page'] = "list_member";
			$this->load->view('admin/container', $data);
		}
		function tutor(){
			$data['pelatihan'] = $this->mread->listpelatihan();	
			//$data['tutor'] = $this->mread->baca_tutor();
			$data['page'] = "list_tutor";
			$this->load->view('admin/container', $data);
		}
		function viewtutor($id){
			$data['data_tutor'] = $this->mread->baca_tutor($id);
			$this->load->view('admin/daftar_tutor', $data);
		}
		function admin(){
			$data['admin'] = $this->mread->baca_admin();
			$data['page'] = "daftar_admin";
			$this->load->view('admin/container', $data);
		}
		function adminadd(){
			$data['error']= false;
			$data['page'] = "v_insert_admin";
			$this->load->view('admin/container', $data);
		}
		function admin_insert(){
			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','trim|required');
			$this->form_validation->set_rules('tempat','Tempat Lahir','trim|required');
			$this->form_validation->set_rules('alamat','Alamat','trim|required');
			$this->form_validation->set_rules('username','Username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required|alpha|');
			$this->form_validation->set_rules('ulangi','Ulangi Password','trim|alpha|required|matches[password]');
			
			if($this->form_validation->run() == true){
					$this->minsert->admin_insert();
					redirect('admin/user/admin/');
			}else{
				$data['error'] = true;
				$data['page'] = "v_insert_admin";
				$this->load->view('admin/container',$data);
			}
		}
		function admin_clickup($id){
			$data['getid'] = $this->mread->iduser($id);
			$data['page'] = "v_update_admin";
			$this->load->view('admin/container', $data);
		}
		function admin_update($id){
			$this->mupdate->admin_user($id);
			redirect('admin/user/admin/');
		}
		function admin_delete($id){
			$this->mdelete->admin_user($id);
			redirect('admin/user/admin/');
		}
		function onclickadd(){
			$data['page'] = "v_insert_user";
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
			$data['page'] = "detail_user_reg";
			$this->load->view('admin/container', $data);
		}
		function confirm($id){
			$this->mupdate->confirm_user($id);
			redirect('admin/reguser/','refresh');
		}
		function convdate($date){ 
			$d = explode('-',$date);
			$day = $d[0];
			switch($d[1]){ 
				case '01': $bulan = 'JAN';
				break;
				case '02': $bulan = 'FEB';
				break;
				case '03': $bulan = 'MAR';
				break;
				case '04': $bulan = 'APR'; 
				break;
				case '05': $bulan = 'MAY';
				break;
				case '06': $bulan = 'JUN'; 
				break;
				case '07': $bulan = 'JUL';
				break;
				case '08': $bulan = 'AUG';
				break;
				case '09': $bulan = 'SEP';
				break;
				case '10': $bulan 	= 'OCT';
				break;
				case '11': $bulan = 'NOV';
				break;
				case '12': $bulan = 'DEC';
				break;
			} 
			$tahun = substr($d[2], 2,2); 
			return $day."-".$bulan."-".$tahun; 
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