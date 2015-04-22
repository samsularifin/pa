<?php 
	class Mupdate extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->library('mailer');
		}
		function soal_member(){
			
			$id_soal = $this->input->post('id_soal');
			$soal_quiz = $this->input->post('soal');
			$jawaban = $this->input->post('jawaban');
			$id_jawaban = $this->input->post('id_jawaban');
			$jawabantext = $this->input->post('jawabantext');
			
			for($s=0; $s<count($id_soal); $s++){
				$data = array(
						'ISI_SOAL' => $soal_quiz[$s]
					);
					$this->db->where('ID_SOAL_QUIZ', $id_soal[$s]);
					$this->db->update('SOAL_QUIZ', $data);
			}
			for($i=0;$i < count($id_soal); $i++){
				for($x=0;$x < count($jawabantext[$i]); $x++){
					//if(isset($jawaban[$i][$x]) && $jawaban[$i][$x] == 1){
					if($x == $jawaban[$i]){
						$status = 1;
					}else{
						$status = 0;
					}
					$data = array(
						'ISI_JAWABAN' => $jawabantext[$i][$x],
						'STATUS_JAWABAN' => $status
					);
					$this->db->where('ID_JAWABAN_QUIZ', $id_jawaban[$i][$x]);
					$this->db->update('JAWABAN_QUIZ', $data);
					
					
				}
			}
		}
		function kuota_pelatihan($id){
			$pelatihan = $this->input->post('pelatihan');
			$kuota = $this->input->post('kuota_pelatihan');

			$data = array(
				'ID_PELATIHAN' => $pelatihan,
				'JUMLAH_KUOTA' => $kuota
			);			
			$this->db->where('ID_KUOTA_PELATIHAN', $id);
			$this->db->update('KUOTA_PELATIHAN', $data);
		}
		function pelatihan($id){
			$nama = $this->input->post('nama_pelatihan');
			$deskripsi = $this->input->post('deskripsi_pelatihan');

			$data = array(
				'NAMA_PELATIHAN' => $nama,
				'DESKRIPSI' => $deskripsi
			);			
			$this->db->where('ID_PELATIHAN', $id);
			$this->db->update('PELATIHAN', $data);
	
		}
		function klinik($id){
			$nama = $this->input->post('nama_klinik');
			$deskripsi = $this->input->post('deskripsi_klinik');

			$data = array(
				'NAMA_PELATIHAN' => $nama,
				'DESKRIPSI' => $deskripsi
			);			
			$this->db->where('ID_PELATIHAN', $id);
			$this->db->update('PELATIHAN', $data);
	
		}
		function jadwal_mengajar($id){
			$id_pel = $this->input->post('nama_pelatihan');
			$tanggal = $this->input->post('tanggal_pelatihan');
			$waktu = $this->input->post('waktu_pel');
			
			$getTanggal = $this->pecah_tanggal($tanggal);
			$getBulan = $this->pecah_bulan($tanggal);
			$getTahun = $this->pecah_tahun($tanggal);
			
			$data = array(
				'ID_PELATIHAN' => $id_pel,
				'TANGGAL_MENGAJAR' =>$getTanggal,
				'BULAN_MENGAJAR' =>$getBulan,
				'TAHUN_MENGAJAR' =>$getTahun,
				'JAM_MENGAJAR' => $waktu
			);			
			$this->db->where('ID_REGISTRASI_MENGAJAR', $id);
			$this->db->update('REGISTRASI_MENGAJAR', $data);
		}
		function module_member($id){
			$id_pelatihan = $this->input->post('select_pelatihan');
			$judul_module = $this->input->post('judul_module');
			
			$nama_gambar = $_FILES['nama_module']['name'];
			
			$fileData = pathinfo(basename($_FILES['nama_module']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/modul/member/'. $fileName;
			
			if(!empty($nama_gambar)){
				$select = "SELECT NAMA_MODULE FROM MODULE_PELATIHAN WHERE ID_MODULE = ".$id;
				$query = $this->db->query($select);
				
				foreach ($query->result_array() as $row)
				{
				   	$unlink = unlink('./file/modul/member/'.$row['NAMA_MODULE']);
					if($unlink)
					{
						while(file_exists($target_path))
						{
								$fileName = uniqid() . '.' . $fileData['extension'];
								$target_path = './file/modul/member/'. $fileName;
								//$dir = './assets/images/';
						}
						if (move_uploaded_file($_FILES['nama_module']['tmp_name'], $target_path))
							{
								$data = array(
								'NAMA_MODULE' => $fileName,
								'ID_PELATIHAN' => $id_pelatihan,
								'JUDUL_MODULE' =>$judul_module,
								'ID_KATEGORI_USER' =>1
								);
							
								$this->db->where('ID_MODULE', $id);
								$this->db->update('MODULE_PELATIHAN', $data);
							}else{
							 echo "There was an error uploading the file, please try again!";
						}
						
					} 
				}
			}else{
				$data = array(
					'ID_PELATIHAN' => $id_pelatihan,
					'JUDUL_MODULE' =>$judul_module,
					'ID_KATEGORI_USER' =>1
					);
							
				$this->db->where('ID_MODULE', $id);
				$this->db->update('MODULE_PELATIHAN', $data);
			}
		}
		function module_tutor($id){
			$id_pelatihan = $this->input->post('select_pelatihan');
			$judul_module = $this->input->post('judul_module');
			
			$nama_gambar = $_FILES['nama_module']['name'];
			
			$fileData = pathinfo(basename($_FILES['nama_module']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/modul/tutor/'. $fileName;
			
			if(!empty($nama_gambar)){
				$select = "SELECT NAMA_MODULE FROM MODULE_PELATIHAN WHERE ID_MODULE = ".$id;
				$query = $this->db->query($select);
				
				foreach ($query->result_array() as $row)
				{
				   	$unlink = unlink('./file/modul/tutor/'.$row['NAMA_MODULE']);
					if($unlink)
					{
						while(file_exists($target_path))
						{
								$fileName = uniqid() . '.' . $fileData['extension'];
								$target_path = './file/modul/tutor/'. $fileName;
								//$dir = './assets/images/';
						}
						if (move_uploaded_file($_FILES['nama_module']['tmp_name'], $target_path))
							{
								$data = array(
								'NAMA_MODULE' => $fileName,
								'ID_PELATIHAN' => $id_pelatihan,
								'JUDUL_MODULE' =>$judul_module,
								'ID_KATEGORI_USER' =>2
								);
							
								$this->db->where('ID_MODULE', $id);
								$this->db->update('MODULE_PELATIHAN', $data);
							}else{
							 echo "There was an error uploading the file, please try again!";
						}
						
					} 
				}
			}else{
				$data = array(
					'ID_PELATIHAN' => $id_pelatihan,
					'JUDUL_MODULE' =>$judul_module,
					'ID_KATEGORI_USER' =>2
					);
							
				$this->db->where('ID_MODULE', $id);
				$this->db->update('MODULE_PELATIHAN', $data);
			}
		}
		function berita_front($id){
			$judul_berita = $this->input->post('judul_berita');
			$isi_berita = $this->input->post('isi_berita');
			
			$nama_gambar = $_FILES['nama_gambar']['name'];
			
			if(!empty($nama_gambar)){
			
				$fileData = pathinfo(basename($_FILES['nama_gambar']['name']));
				$fileName = uniqid() . '.' . $fileData['extension'];
				$target_path = './file/gambar/berita/'. $fileName;
			
				$select = "SELECT GAMBAR FROM BERITA WHERE ID_BERITA = ".$id;
				$query = $this->db->query($select);
				
				
				foreach ($query->result_array() as $row)
				{
				  // 	$unlink = unlink('./file/gambar/berita/'.$row['GAMBAR']);
					//if($unlink)
					//{
						while(file_exists($target_path))
						{
								$fileName = uniqid() . '.' . $fileData['extension'];
								$target_path = './file/gambar/berita/'. $fileName;
								//$dir = './assets/images/';
						}
						if (move_uploaded_file($_FILES['nama_gambar']['tmp_name'], $target_path))
							{
								$data = array(
								'JUDUL' => $judul_berita,
								'ISI_BERITA' => $isi_berita,
								'GAMBAR' =>$fileName
								);
							
								$this->db->where('ID_BERITA', $id);
								$this->db->update('BERITA', $data);
							}else{
							 $this->session->set_flashdata('size','Update berita gagal. Ukuran gambar terlalu besar.');
						}
						
					//} 
				}
			}else{
				$data = array(
						'JUDUL' => $judul_berita,
						'ISI_BERITA' => $isi_berita
						);
					$this->db->where('ID_BERITA', $id);
					$this->db->update('BERITA', $data);
			}
		}
		function gallery_front($id){
			$id_pelatihan = $this->input->post('pelatihan');
			$nama_gambar = $_FILES['nama_gambar']['name'];
			
			if(!empty($nama_gambar)){
			
				$fileData = pathinfo(basename($_FILES['nama_gambar']['name']));
				$fileName = uniqid() . '.' . $fileData['extension'];
				$target_path = './file/gambar/gallery/'. $fileName;
				
				$select = "SELECT NAMA_GALLERY FROM GALLERY WHERE ID_GALLERY = ".$id;
				$query = $this->db->query($select);
				
				foreach ($query->result_array() as $row)
				{
				   	$unlink = unlink('./file/gambar/gallery/'.$row['NAMA_GALLERY']);
					if($unlink)
					{
						while(file_exists($target_path))
						{
								$fileName = uniqid() . '.' . $fileData['extension'];
								$target_path = './file/gambar/gallery/'. $fileName;
								//$dir = './assets/images/';
						}
						if (move_uploaded_file($_FILES['nama_gambar']['tmp_name'], $target_path))
							{
								$data = array(
								'NAMA_GALLERY' =>$fileName,
								'ID_PELATIHAN' =>$id_pelatihan
								);
							
								$this->db->where('ID_GALLERY', $id);
								$this->db->update('GALLERY', $data);
							}else{
							 echo "There was an error uploading the file, please try again!";
						}
						
					} 
				}
			}else{
				$data = array(
							'ID_PELATIHAN' =>$id_pelatihan
						);
							
				$this->db->where('ID_GALLERY', $id);
				$this->db->update('GALLERY', $data);
			}
		}
		function komentar_status($id){
			$data = array(
				'STATUS' => 1
			);			
			$this->db->where('ID_KOMENTAR', $id);
			$this->db->update('KOMENTAR', $data);
		}
		function komentar_front($id){
			$nama_komentator = $this->input->post('nama_komentator');
			$email_komentator = $this->input->post('email_komentator');
			$isi_komentar = $this->input->post('isi_komentar');
			$status = $this->input->post('status_komentar');
			
			$data = array(
				'NAMA_KOMENTAR' => $nama_komentator,
				'EMAIL_KOMENTAR' => $email_komentator,
				'ISI_KOMENTAR' => $isi_komentar,
				'STATUS' => $status
			);			
			$this->db->where('ID_KOMENTAR', $id);
			$this->db->update('KOMENTAR', $data);
		}
		function pelatihan_front($id){
			$judul = $this->input->post('judul_pelatihan_front');
			$isi_content = $this->input->post('isi_pelatihan_front');
			
			$data = array(
				'JUDUL_PELATIHAN_FRONT' => $judul,
				'ISI_PELATIHAN_FRONT' => $isi_content
			);			
			$this->db->where('ID_PELATIHAN_FRONT', $id);
			$this->db->update('PELATIHAN_FRONT', $data);
		}
		function about_front($id){
			$judul = $this->input->post('judul_about');
			$isi_content = $this->input->post('isi_about');
			
			$data = array(
				'JUDUL_ABOUT' => $judul,
				'ISI_ABOUT' => $isi_content
			);			
			$this->db->where('ID_ABOUT', $id);
			$this->db->update('ABOUT', $data);
		}
		function jadwal_front($id)
		{
			$judul = $this->input->post('judul_jadwal');
			$isi_content = $this->input->post('isi_jadwal');
			
			$data = array(
				'JUDUL_JADWAL_FRONT' => $judul,
				'ISI_JADWAL_FRONT' => $isi_content
			);			
			$this->db->where('ID_JADWAL_FRONT', $id);
			$this->db->update('JADWAL_FRONT', $data);
		}
		function slider_front($id){
			$text_slider = $this->input->post('text_slider');
			$nama_slider = $_FILES['nama_slider']['name'];
			
			if(!empty($nama_slider)){
			
				$fileData = pathinfo(basename($_FILES['nama_slider']['name']));
				$fileName = uniqid() . '.' . $fileData['extension'];
				$target_path = './file/gambar/slider/'. $fileName;
				
				$select = "SELECT NAMA_SLIDER FROM SLIDER WHERE ID_SLIDER = ".$id;
				$query = $this->db->query($select);
				
				foreach ($query->result_array() as $row)
				{
				   	$unlink = unlink('./file/gambar/slider/'.$row['NAMA_SLIDER']);
					if($unlink)
					{
						while(file_exists($target_path))
						{
								$fileName = uniqid() . '.' . $fileData['extension'];
								$target_path = './file/gambar/slider/'. $fileName;
								//$dir = './assets/images/';
						}
						if (move_uploaded_file($_FILES['nama_slider']['tmp_name'], $target_path))
							{
								$data = array(
								'JUDUL_SLIDER_SATU' =>$text_slider,
								'NAMA_SLIDER' =>$fileName
								);
							
								$this->db->where('ID_SLIDER', $id);
								$this->db->update('SLIDER', $data);
							}else{
							 echo "There was an error uploading the file, please try again!";
						}
						
					} 
				}
			}else{
				$data = array(
							'JUDUL_SLIDER_SATU' =>$text_slider
					);
							
					$this->db->where('ID_SLIDER', $id);
					$this->db->update('SLIDER', $data);
			}
		}
		function confirm_user($id){
			$data = array(
				'VALIDASI' => 1
			);			
			$this->db->where('ID_USER', $id);
			$this->db->update('TBL_USER', $data);
		}
		function confirm_sertifikat($id){
			$data = array(
				'CETAK' => 1
			);			
			$this->db->where('ID_REGISTRASI', $id);
			$this->db->update('REGISTRASI_PELATIHAN', $data);
		}
		function ignore_user($id){
			$data = array(
				'VALIDASI' => 2
			);			
			$this->db->where('ID_USER', $id);
			$this->db->update('TBL_USER', $data);
		}
		function quiz_tutor($id){
			$judul_quiz = $this->input->post('judul_test');
			$waktu = $this->input->post('waktu');
			$jumlah_soal = $this->input->post('jumlah_soal');
			$keterangan = $this->input->post('keterangan');
			
			
			$data = array(
				'JUDUL_QUIZ' => N.$judul_quiz,
				'WAKTU_QUIZ' => $waktu,
				'JUMLAH_SOAL' => $jumlah_soal,
				'KETERANGAN' => $keterangan
			);
			
			$this->db->where('ID_QUIZ', $id);
			$this->db->update('QUIZ', $data);
		}
		function quioner_member($id){
			$nama_quisioner = $this->input->post('nama_quisioner');
			$jumlah_soal = $this->input->post('jumlah_soal_quisioner');
			$keterangan = $this->input->post('keterangan');
			
			
			$data = array(
				'NAMA_QUISIONER' => $nama_quisioner,
				'JUMLAH_SOAL_QUISIONER' => $jumlah_soal,
				'KETERANGAN' => $keterangan
			);
			
			$this->db->where('ID_QUISIONER', $id);
			$this->db->update('QUISIONER', $data);
		}
		function quioner_tutor($id){
			$nama_quisioner = $this->input->post('nama_quisioner');
			$jumlah_soal = $this->input->post('jumlah_soal_quisioner');
			$keterangan = $this->input->post('keterangan');
			
			
			$data = array(
				'NAMA_QUISIONER' => $nama_quisioner,
				'JUMLAH_SOAL_QUISIONER' => $jumlah_soal,
				'KETERANGAN' => $keterangan
			);
			
			$this->db->where('ID_QUISIONER', $id);
			$this->db->update('QUISIONER', $data);
		}
		function admin_user($id){
			$nama_lengkap = $this->input->post('nama_lengkap');
			$tempat = $this->input->post('tempat');
			$tanggal = $this->input->post('tanggal');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$ambil = $tanggal.'-'.$bulan.'-'.$tahun;
			
			$tanggal_lahir = $this->convdate($ambil);
			
			$alamat = $this->input->post('alamat');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$nama_foto = $_FILES['nama_foto']['name'];
			
			if(!empty($nama_foto)){
			
			$fileData = pathinfo(basename($_FILES['nama_foto']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/gambar/user/'. $fileName;
			
			while(file_exists($target_path))
				{
					$fileName = uniqid() . '.' . $fileData['extension'];
					$target_path = './file/gambar/user/'. $fileName;
				}
					if (move_uploaded_file($_FILES['nama_foto']['tmp_name'], $target_path))
						{
							 $data = array(
							 'ID_KATEGORI_USER' => 3,
								'NAMA_LENGKAP' => $nama_lengkap,
								'TEMPAT_LAHIR' =>$tempat,
								'TANGGAL_LAHIR' =>$tanggal_lahir,
								'ALAMAT' =>$alamat,
								'USERNAME' =>$username,
								'PASSWORD' =>$password,
								'FOTO' =>$fileName,
								'VALIDASI' =>1
								);
								
							$this->db->where('ID_USER', $id);
							$this->db->update('TBL_USER', $data);
						}else{
							echo "There was an error uploading the file, please try again!";
				}
			}else{
				$data = array(
							 'ID_KATEGORI_USER' => 3,
								'NAMA_LENGKAP' => $nama_lengkap,
								'TEMPAT_LAHIR' =>$tempat,
								'TANGGAL_LAHIR' =>$tanggal_lahir,
								'ALAMAT' =>$alamat,
								'USERNAME' =>$username,
								'PASSWORD' =>$password,
								'VALIDASI' =>1
								);
								
					$this->db->where('ID_USER', $id);
					$this->db->update('TBL_USER', $data);
			}
		}
		function confirm_mengajar(){
			$id_user = $this->input->get('id_user');
			$tanggal = $this->input->get('tanggal_men');
			$id_pel = $this->input->get('id_pel');
			
			$getTanggal = $this->pecah_tanggal($tanggal);
			$getBulan = $this->pecah_bulan($tanggal);
			$getTahun = $this->pecah_tahun($tanggal);
			
			$data = array(
				'VALIDASI' => 1
			);			
			$this->db->where('ID_USER', $id_user);
			$this->db->where('TANGGAL_MENGAJAR', $getTanggal);
			$this->db->where('BULAN_MENGAJAR', $getBulan);
			$this->db->where('TAHUN_MENGAJAR', $getTahun);
			$this->db->where('ID_PELATIHAN', $id_pel);
			$this->db->update('REGISTRASI_MENGAJAR', $data);
		}
		function pecah_tanggal($date){
			$d = explode('-',$date);
			$day = $d[0];
			return $day;
		}
		function pecah_bulan($date)
		{
			$d = explode('-',$date);
			$month = $d[1];
			
			return $month;
		}
		function pecah_tahun($date){
			$d = explode('-',$date);
			$year = $d[2];
			
			return $year;
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
		function decodate($date){
			$d = explode('-',$date);
			$day = $d[0];
			switch($d[1]){ 
				case 'JAN': $bulan = '01';
				break;
				case 'FEB': $bulan = '02';
				break;
				case 'MAR': $bulan = '03';
				break;
				case 'APR': $bulan = '04'; 
				break;
				case 'MAY': $bulan = '05';
				break;
				case 'JUN': $bulan = '06'; 
				break;
				case 'JUL': $bulan = '07';
				break;
				case 'AUG': $bulan = '08';
				break;
				case 'SEP': $bulan = '09';
				break;
				case 'OCT': $bulan 	= '10';
				break;
				case 'NOV': $bulan = '11';
				break;
				case 'DEC': $bulan = '12';
				break;
			} 
			$tahun = substr($d[2], 2,2); 
			return $day."-".$bulan."-".$tahun;
		}
	}
?>