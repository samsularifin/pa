<?php
	class Minsert extends CI_Model{
		function pelatihan(){
			$nama = $this->input->post('nama_pelatihan');
			$deskripsi = $this->input->post('deskripsi_pelatihan');
			
			$data = array(
				'NAMA_PELATIHAN' => $nama,
				'DESKRIPSI' => $deskripsi,
				'STATUS' => 0
			);
			$this->db->insert('PELATIHAN',$data);
			
		}
		function kuota_pelatihan(){
			$pelatihan = $this->input->post('pelatihan');
			$kuota = $this->input->post('kuota_pelatihan');
			
			$data = array(
				'ID_PELATIHAN' => $pelatihan,
				'JUMLAH_KUOTA' => $kuota
			);
			$this->db->insert('KUOTA_PELATIHAN',$data);
		}
		function klinik(){
			$nama = $this->input->post('nama_klinik');
			$deskripsi = $this->input->post('deskripsi_klinik');
			
			$data = array(
				'NAMA_PELATIHAN' => $nama,
				'DESKRIPSI' => $deskripsi,
				'STATUS' => 1
			);
			$this->db->insert('PELATIHAN',$data);
		}
		function admin_insert(){
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
								
							$this->db->insert('TBL_USER', $data);
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
								
					$this->db->insert('TBL_USER', $data);
			}
		}
		function tutor_module(){
			$id_pelatihan = $this->input->post('select_pelatihan');
			$judul_module = $this->input->post('judul_module');
			
			/*$this->config =  array(
                 // 'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/file/modul/tutor/",
                  'upload_path'      => "./file/modul/tutor/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf|doc|xml",
                  'overwrite'       => TRUE,
                  'max_size'        => "0",
                  'max_height'      => "0",
                  'max_width'       => "0"  
                );
				 */
			/*	$config['upload_path'] = './file/modul/tutor/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml';
				$config['max_size']	= '100';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				
				$this->load->library('upload', $config);
				
				//$this->load->library('upload', $this->config);
			
			if($this->upload->do_upload())
				{	$upload_data = $this->upload->data();
					$nama_file =  $upload_data['file_name'];
					
					$data = array('NAMA_MODULE' => $nama_file,
								'ID_PELATIHAN' => $id_pelatihan,
								'JUDUL_MODULE' =>$judul_module,
								'KATEGORI' =>2
								);
								
					$this->db->insert('MODULE_PELATIHAN', $data);
				}
			else
				{
					return $this->upload->display_errors();
				}*/
			
			
			$fileData = pathinfo(basename($_FILES['nama_module']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/modul/tutor/'. $fileName;
			
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
								
							$this->db->insert('MODULE_PELATIHAN', $data);
						}else{
							echo "There was an error uploading the file, please try again!";
				} 
			
			
		}
		function member_module(){
			$id_pelatihan = $this->input->post('select_pelatihan');
			$judul_module = $this->input->post('judul_module');
			
			$fileData = pathinfo(basename($_FILES['nama_module']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/modul/member/'. $fileName;
			
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
								
							$this->db->insert('MODULE_PELATIHAN', $data);
						}else{
							echo "There was an error uploading the file, please try again!";
				} 
			
			
		}
		function berita_front(){
			$judul_berita = $this->input->post('judul_berita');
			$isi_berita = $this->input->post('isi_berita');
			
			$fileData = pathinfo(basename($_FILES['nama_gambar']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/gambar/berita/'. $fileName;
			
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
								'ISI_BERITA' =>$isi_berita,
								'GAMBAR' =>$fileName,
								'ID_KATEGORI_USER' =>3
								);
								
							$this->db->insert('BERITA', $data);
						}else{
							$this->session->set_flashdata('size','Insert berita gagal. Ukuran gambar terlalu besar.');
				} 
		}
		function gallery_front(){
			$id_pelatihan = $this->input->post('pelatihan');
			
			$fileData = pathinfo(basename($_FILES['nama_gambar']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/gambar/gallery/'. $fileName;
			
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
								'ID_KATEGORI_USER' =>3,
								'ID_PELATIHAN' => $id_pelatihan
								);
								
							$this->db->insert('GALLERY', $data);
						}else{
							echo "There was an error uploading the file, please try again!";
				}
		}
		function slider_front(){
		
			$text_slider = $this->input->post('text_slider');
			
			$fileData = pathinfo(basename($_FILES['nama_slider']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/gambar/slider/'. $fileName;
			
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
								
							$this->db->insert('SLIDER', $data);
						}else{
							echo "There was an error uploading the file, please try again!";
				}
		}
		function quiz_pelatihan($id){
			$judul_quiz = $this->input->post('judul_test');
			$waktu = $this->input->post('waktu');
			$jumlah_soal = $this->input->post('jumlah_soal');
			$keterangan = $this->input->post('keterangan');
			
			$data = array(
				'JUDUL_QUIZ' => $judul_quiz,
				'WAKTU_QUIZ' => $waktu,
				'JUMLAH_SOAL' => $jumlah_soal,
				'KETERANGAN' => $keterangan,
				'ID_KATEGORI_USER' => 1,
				'ID_PELATIHAN' => $id
			);
			
			$this->db->insert('QUIZ',$data);
		}
		function soal_member($id){
			$id_quiz = $id;
			
			$this->db->select_max('ID_SOAL_QUIZ');
			$ids = $this->db->get('SOAL_QUIZ')->row();
			$getLastId = $ids->ID_SOAL_QUIZ;
			
			$soal_quiz = $this->input->post('soal');
			$jawaban_benar = $this->input->post('jawaban');
			
			$pilihanA = $this->input->post('inputA');
			$pilihanB = $this->input->post('inputB');
			$pilihanC = $this->input->post('inputC');
			$pilihanD = $this->input->post('inputD');
			
			$idA = $getLastId;
			$idB = $getLastId;
			$idC = $getLastId;
			$idD = $getLastId;
			$data = array();
			foreach ($soal_quiz as $key => $value) {
				$getLastId ++;
				
				$data[] = array(
					'ID_SOAL_QUIZ' =>$getLastId,
					'ID_QUIZ' => $id_quiz,
					'ISI_SOAL' => $soal_quiz[$key],
					'ID_KATEGORI_USER' => 1
				);
			};
			$this->db->insert_batch('SOAL_QUIZ', $data);
			$this->db->query("UPDATE QUIZ SET STATUS_SOAL=1 WHERE ID_QUIZ = $id_quiz");
			
			$data2 = array();
				foreach ($pilihanA as $key2 => $value) {
					if($jawaban_benar[$key2] == 1){
						$status = 1;
					}else{
						$status = 0;
					}
					$idA++;
					$data2[] = array( 'ID_SOAL_QUIZ' =>$idA,
								'ISI_JAWABAN' =>$pilihanA[$key2],
								'STATUS_JAWABAN' =>$status,
					);
				};
			$this->db->insert_batch('JAWABAN_QUIZ', $data2); 
			
			$data3 = array();
			foreach ($pilihanB as $key3 => $value) {
				if($jawaban_benar[$key3] == 2){
						$status = 1;
					}else{
						$status = 0;
				}
					
				$idB++;
				$data3[] = array( 'ID_SOAL_QUIZ' =>$idB,
							'ISI_JAWABAN' =>$pilihanB[$key3],
							'STATUS_JAWABAN' =>$status,
				);
			};
			$this->db->insert_batch('JAWABAN_QUIZ', $data3);
			
			$data4 = array();
			foreach ($pilihanC as $key4 => $value) {
				if($jawaban_benar[$key4] == 3){
						$status = 1;
					}else{
						$status = 0;
				}
				
				$idC++;
				$data4[] = array( 'ID_SOAL_QUIZ' =>$idC,
							'ISI_JAWABAN' =>$pilihanC[$key4],
							'STATUS_JAWABAN' =>$status,
				);
			};
			$this->db->insert_batch('JAWABAN_QUIZ', $data4);
			
			$data5 = array();
			foreach ($pilihanD as $key5 => $value) {
				if($jawaban_benar[$key5] == 4){
						$status = 1;
					}else{
						$status = 0;
				}
				$idD++;
				$data5[] = array( 'ID_SOAL_QUIZ' =>$idD,
							'ISI_JAWABAN' =>$pilihanD[$key5],
							'STATUS_JAWABAN' =>$status,
				);
			};
			$this->db->insert_batch('JAWABAN_QUIZ', $data5); 
			//$this->db->get();
			
			//$id_soal_quiz = 51;
			
			/*$data2 = array();
			foreach ($pilihanA as $key2 => $value) {	
				$data2[] = array( 'ID_SOAL_QUIZ' =>$id_soal_quiz,
							'ISI_JAWABAN' =>$pilihanA[$key2],
							'ISI_JAWABAN' =>$pilihanB[$key2],
							'ISI_JAWABAN' =>$pilihanC[$key2],
							'ISI_JAWABAN' =>$pilihanD[$key2],
							'STATUS_JAWABAN' =>$jawaban_benar[$key2],
				);
			};
			foreach ($pilihanA as $key2 => $value) {	
				$data2[] = array( 'ID_SOAL_QUIZ' =>$id_soal_quiz,
							'ISI_JAWABAN' =>$pilihanA[$key2],
							'ISI_JAWABAN' =>$pilihanB[$key2],
							'ISI_JAWABAN' =>$pilihanC[$key2],
							'ISI_JAWABAN' =>$pilihanD[$key2],
							'STATUS_JAWABAN' =>$jawaban_benar[$key2],
				);
			};
			$this->db->insert_batch('JAWABAN_QUIZ', $data2); */
		}
		function pertanyaan_quisioner_member($id){
			$id_quisioner = $id;
			
			$this->db->select_max('ID_SOAL_QUISIONER');
			$ids = $this->db->get('SOAL_QUISIONER')->row();
			$getLastId = $ids->ID_SOAL_QUISIONER;
			
			$soal_quisioner = $this->input->post('soal');
			
			$pilihanA = $this->input->post('inputA');
			$pilihanB = $this->input->post('inputB');
			$pilihanC = $this->input->post('inputC');
			$pilihanD = $this->input->post('inputD');
			
			$idA = $getLastId;
			$idB = $getLastId;
			$idC = $getLastId;
			$idD = $getLastId;
			$data = array();
			foreach ($soal_quisioner as $key => $value) {
				$getLastId ++;
				
				$data[] = array(
					'ID_SOAL_QUISIONER' =>$getLastId,
					'ID_QUISIONER' => $id_quisioner,
					'ISI_SOAL_QUISIONER' => $soal_quisioner[$key],
					'ID_KATEGORI_USER' => 1
				);
			};
			$this->db->insert_batch('SOAL_QUISIONER', $data);
			$this->db->query("UPDATE QUISIONER SET STATUS_QUISIONER=1 WHERE ID_QUISIONER = $id_quisioner");
			
			$data2 = array();
				foreach ($pilihanA as $key2 => $value) {
					$idA++;
					$data2[] = array( 'ID_SOAL_QUISIONER' =>$idA,
								'ISI_JAWABAN_QUISIONER' =>$pilihanA[$key2],
					);
				};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data2); 
			
			$data3 = array();
			foreach ($pilihanB as $key3 => $value) {	
				$idB++;
				$data3[] = array( 'ID_SOAL_QUISIONER' =>$idB,
							'ISI_JAWABAN_QUISIONER' =>$pilihanB[$key3],
				);
			};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data3);
			
			$data4 = array();
			foreach ($pilihanC as $key4 => $value) {
				$idC++;
				$data4[] = array( 'ID_SOAL_QUISIONER' =>$idC,
							'ISI_JAWABAN_QUISIONER' =>$pilihanC[$key4],
				);
			};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data4);
			
			$data5 = array();
			foreach ($pilihanD as $key5 => $value) {
				$idD++;
				$data5[] = array( 'ID_SOAL_QUISIONER' =>$idD,
							'ISI_JAWABAN_QUISIONER' =>$pilihanD[$key5],
				);
			};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data5);
		}
		function pertanyaan_quisioner_tutor($id){
			$id_quisioner = $id;
			
			$this->db->select_max('ID_SOAL_QUISIONER');
			$ids = $this->db->get('SOAL_QUISIONER')->row();
			$getLastId = $ids->ID_SOAL_QUISIONER;
			
			$soal_quisioner = $this->input->post('soal');
			
			$pilihanA = $this->input->post('inputA');
			$pilihanB = $this->input->post('inputB');
			$pilihanC = $this->input->post('inputC');
			$pilihanD = $this->input->post('inputD');
			
			$idA = $getLastId;
			$idB = $getLastId;
			$idC = $getLastId;
			$idD = $getLastId;
			$data = array();
			foreach ($soal_quisioner as $key => $value) {
				$getLastId ++;
				
				$data[] = array(
					'ID_SOAL_QUISIONER' =>$getLastId,
					'ID_QUISIONER' => $id_quisioner,
					'ISI_SOAL_QUISIONER' => $soal_quisioner[$key],
					'ID_KATEGORI_USER' => 2
				);
			};
			$this->db->insert_batch('SOAL_QUISIONER', $data);
			$this->db->query("UPDATE QUISIONER SET STATUS_QUISIONER=1 WHERE ID_QUISIONER = $id_quisioner");
			
			$data2 = array();
				foreach ($pilihanA as $key2 => $value) {
					$idA++;
					$data2[] = array( 'ID_SOAL_QUISIONER' =>$idA,
								'ISI_JAWABAN_QUISIONER' =>$pilihanA[$key2],
					);
				};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data2); 
			
			$data3 = array();
			foreach ($pilihanB as $key3 => $value) {	
				$idB++;
				$data3[] = array( 'ID_SOAL_QUISIONER' =>$idB,
							'ISI_JAWABAN_QUISIONER' =>$pilihanB[$key3],
				);
			};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data3);
			
			$data4 = array();
			foreach ($pilihanC as $key4 => $value) {
				$idC++;
				$data4[] = array( 'ID_SOAL_QUISIONER' =>$idC,
							'ISI_JAWABAN_QUISIONER' =>$pilihanC[$key4],
				);
			};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data4);
			
			$data5 = array();
			foreach ($pilihanD as $key5 => $value) {
				$idD++;
				$data5[] = array( 'ID_SOAL_QUISIONER' =>$idD,
							'ISI_JAWABAN_QUISIONER' =>$pilihanD[$key5],
				);
			};
			$this->db->insert_batch('JAWABAN_QUISIONER', $data5);
		}
		function quisioner_member($id){
			$nama_quisioner = $this->input->post('nama_quisioner');
			$keterangan = $this->input->post('keterangan');
			$jumlah_soal = $this->input->post('jumlah_soal_quisioner');
		
			$data = array(
				'NAMA_QUISIONER' => $nama_quisioner,
				'KETERANGAN' => $keterangan,
				'ID_KATEGORI_USER' => 1,
				'ID_PELATIHAN' => $id,
				'JUMLAH_SOAL_QUISIONER' => $jumlah_soal
			);
			
			$this->db->insert('QUISIONER',$data);
		}
		function quisioner_tutor($id){
			$nama_quisioner = $this->input->post('nama_quisioner');
			$keterangan = $this->input->post('keterangan');
			$jumlah_soal = $this->input->post('jumlah_soal_quisioner');
		
			$data = array(
				'NAMA_QUISIONER' => $nama_quisioner,
				'KETERANGAN' => $keterangan,
				'ID_KATEGORI_USER' => 2,
				'ID_PELATIHAN' => $id,
				'JUMLAH_SOAL_QUISIONER' => $jumlah_soal
			);
			
			$this->db->insert('QUISIONER',$data);
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
		private function getNextId() {
			$this->db->select($this->getTableName()."_SEQUENCE.NEXTVAL AS NEXTID", FALSE);
			$this->db->from("dual");
			$query = $this->db->get();
			$row = $query->row();
				return $row->NEXTID;
				
			//http://stackoverflow.com/questions/16790026/codeigniter-oracle-get-insert-id
} 
		
	}
?>