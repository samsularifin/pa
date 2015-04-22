<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Membmodule extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
		}
		function index(){
			$data['module_member'] = $this->mread->modul_member();
			$data['page'] = "module_member";
			$this->load->view('admin/container', $data);
		}
		function onclickadd(){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['page'] = "v_insert_member_module";
			$this->load->view('admin/container', $data);
		}
		function add(){
			$this->minsert->member_module();
			redirect('admin/membmodule');
			
				/*$config['upload_path'] = './file/modul/tutor/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml';
				$config['max_size']	= '0';
				$config['overwrite'] = TRUE;
				*/
				/*$this->config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."file/modul/tutor/",
                  'upload_url'      => base_url()."file/modul/tutor/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf|doc|xml",
                  'overwrite'       => TRUE,
                  'max_size'        => "0",
                  'max_height'      => "768",
                  'max_width'       => "1024"  
                );
				$this->load->library('upload', $this->config); 
				$config['upload_path'] = '.file/';
				$config['allowed_types'] = 'gif|jpg|png|pdf|doc|xml';
				$config['max_size']	= '10000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);
				if($this->upload->do_upload())
				{
					echo "file upload success";
				}
				else
				{
					echo "file upload failed";
				}
				
				/*$this->load->library('upload', $config);
				
				if($this->upload->do_upload())
				{	$upload_data = $this->upload->data();
					$nama_file =  $upload_data['file_name'];
					
					$this->minsert->tutor_module($nama_file);
					redirect('admin/tutmodule');
				} */
			
		}
		function onclickup($id){
			$data['pelatihan'] = $this->mread->pelatihan();
			$data['value'] = $this->mread->idmodule($id);
			$data['page'] = "v_update_member_module";
			$this->load->view('admin/container', $data);
		}
		function update($id){
			$this->mupdate->module_member($id);
			redirect('admin/membmodule');
		}
		function delete($id){
			$this->mdelete->member_module($id);
			redirect('admin/membmodule');
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