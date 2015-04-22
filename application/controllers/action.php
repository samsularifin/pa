<?php
	class Action extends CI_Controller{
		function __construct(){
			parent::__construct();	
			$this->load->model('mread');
			$this->load->model('minsert');
		}
		function komentar_berita(){
			$data = $this->minsert->komentar_berita();
			
			if($data == true){
				print "<script type=\"text/javascript\">alert('Komentar berhasil');
					window.location.href ='../beranda';
				</script>";
				
			}else{
				print "<script type=\"text/javascript\">alert('Komentar gagal dikirim. Silahkan ulangi lagi');</script>";
			}
		}
	}
?>