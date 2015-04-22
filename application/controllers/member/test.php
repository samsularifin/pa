<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Test extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('member/mread');
			$this->load->model('member/minsert');
			$this->load->model('member/mupdate');
			$this->load->model('member/mdelete');
		}
		function index(){
			$data['pelatihan'] = $this->mread->testlistpelatihan();
			$data['page'] = "test";
			$this->load->view('member/container', $data);
		}
		function tampilkan($id){
			$id_user = $this->session->userdata('ID_USER');
			$id_pelatihan = $this->uri->segment(4);
			$data['cekambilpelatihan'] = $this->mread->check_ambil_pelatihan($id_user, $id_pelatihan);
			
			$data['getidpelatihan'] = $id_pelatihan;
			$data['test'] = $this->mread->baca_test($id_pelatihan);
			$this->load->view('member/ambil_test', $data);
		}
		function ambil_test($id){
			$data['ambil_soal'] = $this->mread->soal_quiz_aja($id);
			$data['data_quiz'] = $this->mread->data_quiz($id);
			$data['page'] = "mulai_soal";
			$this->load->view('member/container', $data);
		}
		function submit(){
			//$data['hasiltest'] = $this->mread->hasiltest();
			
			$jawaban = $this->input->post('jawaban');
			$soal = $this->input->post('idsoal');
			//soaal
			$benar = 0;
			$salah = 0;
			$jumsoal = count($soal);

			
				
					//foreach ($jawaban as $key => $value) {
			//for($i=0; $i<count($soal); $i++){
			foreach($soal as $value){
				if(isset($jawaban[$value])){
					$data = array();
							//$jumsoal++;
							if($jawaban[$value] == 1)
								$benar++;
							else if($jawaban[$value] == 0)
								$salah++;
				}else{
						$salah++;
				}
				
			}
			$this->minsert->hasil_test_member($jumsoal,$benar, $salah);
			
			$data['hasiltest'] = $benar;
			$data['salah'] = $salah;
			$data['jumlahsoal'] = $jumsoal;
			
			$data['page'] = "hasil_test";
			$this->load->view('member/container', $data);
		}
		function lihat_hasil(){
		//	$id_pel = $this->input->post('ambil_id_pel');
			$id_pel = $this->input->get('id_pelatihan');
			$id_quiz = $this->input->get('id_quiz');
			$id_user = $this->session->userdata('ID_USER');
			
			$data['lihathasil'] = $this->mread->lihat_hasil_test($id_user, $id_pel, $id_quiz);
			$data['page'] = "lihat_hasil_test";
			$this->load->view('member/container',$data);
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