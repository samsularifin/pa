<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infaq_masuk extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_infaqmasuk','m_donatur','m_kategoriinfaqmasuk'));
		$this->load->helper('nominal_helper');
		$this->load->library(array('form_validation','mailer'));
	}
	
	public function index(){
		
		$this->cek_session();
		
		/*Pagination*/
		$totalrows = $this->db->get('infaq_masuk');
		$page_config = array(
			'per_page' => 10,
			'uri_segment' => 4,
			'total_rows' => $totalrows->num_rows(),
			'base_url' => base_url().'administrator/infaq_masuk/index/',
			'first_tag_open' => '<li>',
			'last_tag_open' => '<li>',
			'next_tag_open' => '<li>',
			'prev_tag_open' => '<li>',
			'num_tag_open' => '<li>',
        	'first_tag_close' => '</li>',
			'last_tag_close' => '</li>', 
			'next_tag_close' => '</li>',
			'prev_tag_close' => '</li>',
			'num_tag_close' => '</li>',
         	'cur_tag_open' => '<li><span><b>',
        	'cur_tag_close' => '</b></span></li>'
		);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($page_config);
		
		$data = array(
			'no' => $this->uri->segment(4),	
			'links' => $this->pagination->create_links(),
			'session' => $this->session->userdata('login'),
			'content' => $this->m_infaqmasuk->PaginationInfaqMasuk($page_config['per_page'],$page)->result(),
			'title' => 'Infaq Yang Masuk',
			'tes' => '',
			'tes2' => ''

		);
		$this->load->view('backend/infaq/infaq_masuk',$data);
	}
	
	public function tambah_infaq_masuk(){
		$this->cek_session();
		$data_sess = $this->session->userdata('login');
		$data = array(
			'session' => $this->session->userdata('login'),
			'username' => $data_sess['username'],
			'id_infaq_masuk' => '',
			'donatur' => $this->m_donatur->GetDonatur('where program_donatur = "infaq yatim" ')->result_array(),
			'kategori' => $this->m_kategoriinfaqmasuk->GetKategoriInfaqMasuk()->result_array(),
			'tanggal_infaq' => '',
			'jumlah_infaq' => '',
			'status' => 'baru',
			'title' => 'Infaq Masuk'
		);
		$this->load->view('backend/infaq/editorInfaqMasuk',$data);
	}
	
	public function simpan_infaq_masuk(){
		$this->cek_session();
		
		if($_POST){
			$data_sess = $this->session->userdata('login');
			$donatur = $_POST['donatur'];
			$kategori = $_POST['kategori'];
			$jml = $_POST['jumlah_infaq'];
			$tanggal = $_POST['tanggal_infaq'];
			$id_infaq_masuk = $_POST['id_infaq_masuk'];
			$status_simpan = $_POST['status_simpan'];
			
			date_default_timezone_set("Asia/Jakarta");
			
			if($status_simpan == "baru")
			{
				$this->form_validation->set_message('required', '%s Harus Diisi.');
				$this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
				$this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
				$this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
				$this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
				$this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
				
				$this->form_validation->set_rules('jumlah_infaq', 'Jumlah Infaq','trim|required|numeric');

				if ($this->form_validation->run() === FALSE)
				{
					$data_sess = $this->session->userdata('login');
					$data = array(
						'session' => $this->session->userdata('login'),
						'username' => $data_sess['username'],
						'id_infaq_masuk' => '',
						'donatur' => $this->m_donatur->GetDonatur('where program_donatur = "infaq yatim" ')->result_array(),
						'kategori' => $this->m_kategoriinfaqmasuk->GetKategoriInfaqMasuk()->result_array(),
						'tanggal_infaq' => '',
						'jumlah_infaq' => '',
						'status' => 'baru',
						'title' => 'Infaq Masuk'
					);
					$this->load->view('backend/infaq/editorInfaqMasuk',$data);				
				}
				else
				{
					// Mengirim Pesan Email//
					$mail = new PHPMailer();

			        $mail->IsSMTP();  // telling the class to use SMTP
			        $mail->Mailer = "smtp";
			        $mail->Host = "smtp.gmail.com";
			        $mail->Port = 465;
			        $mail->SMTPSecure = 'ssl';   
			        $mail->SMTPAuth = true; // turn on SMTP authentication
			        $mail->Username = "saptabagus14@gmail.com"; // SMTP username
			        $mail->Password = "12345Abc"; // SMTP password 
			        $mail->SMTPDebug = 1;

			        $mail->From = "saptabagus14@gmail.com";
			        $mail->FromName   = "Sapta";
			        
			        $infodonatur = $this->m_donatur->GetDonatur("where id_donatur = $donatur ")->result();
			        
			        foreach ($infodonatur as $id) {
			        	$mail->AddAddress("$id->email1","$id->nama_donatur");  
			         	$mail->AddAddress("$id->email2","$id->nama_donatur"); 
						
						$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
				        $mail->Subject  = "Notif Donasi Infaq Masuk Kategori Infaq Yatim";
				        $mail->Body     = "Terima Kasih banyak atas sumbangan donasi anda Rp ".$jml." Pada Tanggal ".$tanggal ;
				        $mail->WordWrap = 50;
				        $mail->Send();
			        }
			       	// Mengirim Pesan Email//

					//mengirim pesan dalam web//
			        $data = array(
								'nama_pesan' => "Notif Donasi Infaq Masuk Kategori Infaq Yatim",
								'isi_pesan' => "Terima Kasih banyak atas sumbangan donasi anda Rp ".$jml." Pada Tanggal ".$tanggal ,
								'tanggal_pesan' => date("Y-m-d H:i:s"),
								'id_donatur' => $donatur,
								'status' => 0,
								'id_admin' => $data_sess['idadmin'],
								'tampil' => 0
								);
					$this->m_sipd->InsertData('pesan_donatur',$data);
					//mengirim pesan dalam web//

					$data = array(
								'id_donatur' => $donatur,
								'tanggal_infaq' => $tanggal,
								'jumlah_infaq' => $jml,
								'id_kategori_infaq_masuk' => $kategori
								);
					$result = $this->m_sipd->InsertData('infaq_masuk',$data);

					if($result == 1){
						$this->m_infaqmasuk->GetInfaqMasuk('order by id_infaq_masuk')->result_array();
						$this->session->set_flashdata('message', 'Data Berita Berhasil Ditambah');
						redirect('administrator/infaq_masuk');
					}else{
						$this->session->set_flashdata('message', 'Data Berita Belum Berhasil Ditambah');
						redirect('administrator/infaq_masuk');
					}
				}

			}
			else
			{
				$this->form_validation->set_message('required', '%s Harus Diisi.');
				$this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
				$this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
				$this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
				$this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
				$this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
				
				$this->form_validation->set_rules('jumlah_infaq', 'Jumlah Infaq','trim|required|numeric');

				if ($this->form_validation->run() === FALSE)
				{
					$data_sess = $this->session->userdata('login');
					$data = array(
						'session' => $this->session->userdata('login'),
						'username' => $data_sess['username'],
						'id_infaq_masuk' => '',
						'donatur' => $this->m_donatur->GetDonatur('where program_donatur = "infaq yatim" ')->result_array(),
						'kategori' => $this->m_kategoriinfaqmasuk->GetKategoriInfaqMasuk()->result_array(),
						'tanggal_infaq' => '',
						'jumlah_infaq' => '',		
						'status' => 'lama',
						'title' => 'Edit Infaq Masuk'
					);
					$this->load->view('backend/infaq/editorInfaqMasuk',$data);			
				}
				else
				{
					$data = array(
						'id_donatur' => $donatur,
						'tanggal_infaq' => $tanggal,
						'jumlah_infaq' => $jml,
						'id_kategori_infaq_masuk' => $kategori
					);
					$result = $this->m_sipd->UpdateData('infaq_masuk',$data,array('id_infaq_masuk' => $id_infaq_masuk));
					if($result == 1){
						$this->session->set_flashdata('message', 'Update Data Berita Berhasil');
						redirect('administrator/infaq_masuk');
					}else{
						$this->session->set_flashdata('message', 'Update Data Berita Belum Berhasil');
						redirect('administrator/infaq_masuk');
					}
				}
				
			}
		}else{
			$this->load->view('backend/pagenotfound',array('title' => 'page not found'));
		}
	}
	
	public function delete_infaq_masuk($kode = 0){
		$this->cek_session();
		$result = $this->m_sipd->DeleteData('infaq_masuk',array('id_infaq_masuk' => $kode));
		if($result == 1){
			$this->session->set_flashdata('message', 'Data Berita Berhasil Dihapus');
			redirect('administrator/infaq_masuk');
		}else{
			$this->session->set_flashdata('message', 'Data Berita Belum Berhasil Dihapus');
			redirect('administrator/infaq_masuk');
		}
	}	
	
	public function edit_infaq_masuk($kode = 0){
		$this->cek_session();
		$data_sess = $this->session->userdata('login');
		$data_content = $this->m_infaqmasuk->GetInfaqMasuk("where id_infaq_masuk = '$kode'")->result_array();
		
		/*donatur to array*/
		$donatur_p = $this->m_infaqmasuk->GetDonaturonInfaqMasuk("where id_infaq_masuk = '$kode'")->row();
		/*end label to array*/
		
		/*kategori to array*/
		$kategori_p = $this->m_infaqmasuk->GetKategoriInfaqMasukonInfaqMasuk("where id_infaq_masuk = '$kode'")->row();
		/*end label to array*/

		$data = array(
			'session' => $this->session->userdata('login'),
			'username' => $data_sess['username'],
			'id_infaq_masuk' => $data_content[0]['id_infaq_masuk'],
			'donatur' => $this->m_donatur->GetDonatur('where program_donatur = "infaq yatim" ')->result_array(),
			'label_donatur' => $donatur_p,
			'kategori' => $this->m_kategoriinfaqmasuk->GetKategoriInfaqMasuk()->result_array(),
			'label_kategori' => $kategori_p,
			'tanggal_infaq' => $data_content[0]['tanggal_infaq'],
			'jumlah_infaq' => $data_content[0]['jumlah_infaq'],		
			'status' => 'lama',
			'title' => 'Edit Berita'
		);
		$this->load->view('backend/infaq/editorInfaqMasuk',$data);
	}

	public function filter_infaq_masuk(){
		$this->cek_session();
		
		/*Pagination*/
		$totalrows = $this->db->get('infaq_masuk');
		$page_config = array(
			'per_page' => 10,
			'uri_segment' => 4,
			'total_rows' => $totalrows->num_rows(),
			'base_url' => base_url().'administrator/infaq_masuk/index/',
			'first_tag_open' => '<li>',
			'last_tag_open' => '<li>',
			'next_tag_open' => '<li>',
			'prev_tag_open' => '<li>',
			'num_tag_open' => '<li>',
        	'first_tag_close' => '</li>',
			'last_tag_close' => '</li>', 
			'next_tag_close' => '</li>',
			'prev_tag_close' => '</li>',
			'num_tag_close' => '</li>',
         	'cur_tag_open' => '<li><span><b>',
        	'cur_tag_close' => '</b></span></li>'
		);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($page_config);
		
		if($_POST){
			$bln = $_POST['bulan'];
			$thn = $_POST['tahun'];
			
			$star = ''.$thn.'-'.$bln.'-16';
			$finish = ''.$thn.'-'.$bln.'-15';
			$tgl_start = date('Y-m-d',strtotime($star.'-1 month'));
			$tgl_end = date('Y-m-d',strtotime($finish));
			
			$data = array(
			'no' => $this->uri->segment(4),	
			'links' => $this->pagination->create_links(),
			'session' => $this->session->userdata('login'),
			'content' => $this->m_infaqmasuk->PaginationFilterInfaqMasuk($page_config['per_page'],$page,$tgl_start,$tgl_end)->result(),
			'title' => 'Infaq Yang Masuk '.$bln,
			'tes' => $bln,
			'tes2' => $thn
			);
			
			$this->load->view('backend/infaq/infaq_masuk',$data);	
		}else{
			redirect('administrator/infaq_masuk');
		}
	}

	public function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'webadmin/login');
			exit(0);
		}
	}
}
