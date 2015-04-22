<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Reguser extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('admin/mread');
			$this->load->model('admin/minsert');
			$this->load->model('admin/mupdate');
			$this->load->model('admin/mdelete');
			$this->load->model('admin/paging');
			$this->load->library('form_validation','mailer');
		}
		function index(){
			$config = array();
			$config["base_url"] = base_url() . "admin/reguser/index";
			$config["total_rows"] = $this->paging->reguser_record_count();
			$config["per_page"] = 3;
			$config["uri_segment"] = 4;
			
			$config['full_tag_open'] = '<div><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div><!--pagination-->';
			$config['next_link'] = FALSE;
			$config['prev_link'] = FALSE;

			$config['cur_tag_open'] = '<li class="active"><a href=""style="color:#ffffff; background-color:#16cbe6;">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['anchor_class'] = 'class="follow_link"';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
			
			$data["ruser"] = $this->paging->reguser_fetch($config["per_page"], $page+1);
			$data["links"] = $this->pagination->create_links();
			$data["page"] = "registrasi_user";
		
			$this->load->view('admin/container', $data);
		
		
			/*$data['ruser'] = $this->mread->reg_user();
			$data['page'] = "registrasi_user";
			$this->load->view('admin/container', $data); */
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
		function admin_detail($id){
			$data['hasil'] = $this->mread->ureg($id);
			$data['page'] = "detail_user_admin";
			$this->load->view('admin/container', $data);
		}
		function confirm($id){
			$this->db->select('*');
		   $this->db->from('TBL_USER');
		   $this->db->where('ID_USER',$id);

/*
			$query = $this->db->get();
			foreach($query->result() as $data){
				$GLOBALS['getuser'] = $data->NAMA_LENGKAP;
				$GLOBALS['getemail'] = $data->EMAIL;
			}
			$mail = new PHPMailer();

			$mail->IsSMTP();  // telling the class to use SMTP
			$mail->Mailer = "smtp";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->SMTPSecure = 'ssl';   
			$mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->Username = "mildahusnul@gmail.com"; // SMTP username
			$mail->Password = "ayankalmi"; // SMTP password 
			$mail->SMTPDebug = 1;

			$mail->From = "mildahusnul@gmail.com";
			$mail->FromName   = "Admin Rumah Bahasa";
			$mail->Priority = 1; 
		
			$mail->AddAddress($GLOBALS['getemail'], $GLOBALS['getuser']);  
			//$mail->AddAddress("$id->email2","$id->nama_donatur"); 
			$mail->IsHTML(true); 
			$mail->Subject  = "Notifikasi Konfirmasi Pendaftaran Rumah Bahasa";
			$mail->Body     = "Terima Kasih atas partisipasi anda bergabung di Rumah Bahasa Surabaya. Kami sudah mengkonfirmasi pendaftaran anda. Silahkan login sistem menggunakan username dan password yang telah didaftarkan. ";
			$mail->WordWrap = 50;
			$mail->Send();
			*/
			// Mengirim Pesan Email//
			$this->mupdate->confirm_user($id);
			redirect('admin/reguser/','refresh');
			
			 /*$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'santosbagas9@gmail.com', // change it to yours
			  'smtp_pass' => 'ayankalmi', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);

				$message = 'halo';
				$this->load->library('email', $config);
				  $this->email->set_newline("\r\n");
				  $this->email->from('santosbagas9@gmail.com'); // change it to yours
				  $this->email->to('samsularifinghozali@gmail.com');// change it to yours
				  $this->email->subject('Resume from JobsBuddy for your Job posting');
				  $this->email->message($message);
				  if($this->email->send())
				 {
				  echo 'Email sent.';
				 }
				 else
				{
				 show_error($this->email->print_debugger());
				}
			/*$this->load->library('email');

			$this->email->from('mildahusnul@gmail.com', 'Your Name');
			$this->email->to('samsularifinghozali@gmail.com');
			

			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');

			$this->email->send();

			echo $this->email->print_debugger();*/

			// Mengirim Pesan Email//
			
		}
		function ignore($id){
			$this->db->select('*');
		   $this->db->from('TBL_USER');
		   $this->db->where('ID_USER',$id);
		  // $this->db->limit(1);

			$query = $this->db->get();
			foreach($query->result() as $data){
				$GLOBALS['getuser'] = $data->NAMA_LENGKAP;
				$GLOBALS['getemail'] = $data->EMAIL;
			}
			$mail = new PHPMailer();

			$mail->IsSMTP();  // telling the class to use SMTP
			$mail->Mailer = "smtp";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->SMTPSecure = 'ssl';   
			$mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->Username = "mildahusnul@gmail.com"; // SMTP username
			$mail->Password = "ayankalmi"; // SMTP password 
			$mail->SMTPDebug = 1;

			$mail->From = "mildahusnul@gmail.com";
			$mail->FromName   = "Admin Rumah Bahasa";
			$mail->Priority = 1; 
		
			$mail->AddAddress($GLOBALS['getemail'], $GLOBALS['getuser']);  
			//$mail->AddAddress("$id->email2","$id->nama_donatur"); 
			$mail->IsHTML(true); 
			$mail->Subject  = "Notifikasi Ignore Pendaftaran Rumah Bahasa";
			$mail->Body     = "Terima kasih anda mau berpartisipasi untuk bergabung di Rumah Bahasa Surabaya. Namun mohon maaf karena beberapa hal, kami tidak bisa mengkonfirmasi pendaftaran anda. <br/><br/>Terimakasih ";
			$mail->WordWrap = 50;
			$mail->Send();
			
			// Mengirim Pesan Email//
			$this->mupdate->ignore_user($id);
			redirect('admin/reguser/','refresh');
		}
		function daftar_ignore(){
			$config = array();
			$config["base_url"] = base_url() . "admin/reguser/daftar_ignore/";
			$config["total_rows"] = $this->paging->daftar_ignore_record_count();
			$config["per_page"] = 3;
			$config["uri_segment"] = 4;
			
			$config['full_tag_open'] = '<div><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div><!--pagination-->';
			$config['next_link'] = FALSE;
			$config['prev_link'] = FALSE;

			$config['cur_tag_open'] = '<li class="active"><a href=""style="color:#ffffff; background-color:#16cbe6;">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['anchor_class'] = 'class="follow_link"';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
			
			$data["ruser"] = $this->paging->fetch_ignore($config["per_page"], $page+1);
			$data["links"] = $this->pagination->create_links();
			$data["page"] = "ignore_user";
		
			$this->load->view('admin/container', $data);
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