<?php
	class Minsert extends CI_Model{
		function pelatihan(){
			$nama = $this->input->post('nama_pelatihan');
			
			$data = array(
				'NAMA_PELATIHAN' => $nama
			);
			$this->db->insert('PELATIHAN',$data);
			
		}
		function registrasi_pelatihan(){
			$id_user = $this->session->userdata('ID_USER');
			$pelatihan = $this->input->post('pelatihan');
			$tanggal_pelatihan = $this->input->post('tanggal_pelatihan');
			$waktu = $this->input->post('waktu');
			/*$waktu = (TO_DATE($getwaktu,'dd-mm-yyyy'));
			
			$data = array(
				'ID_USER' => $id_user,
				'ID_PELATIHAN' => $pelatihan,
				'TANGGAL_PELATIHAN_REG' => $tanggal_pelatihan,
				'WAKTU_PELATIHAN' => $waktu,
			); */
			$this->db->set('ID_USER', $id_user);
			$this->db->set('ID_PELATIHAN', $pelatihan);
			$this->db->set('TANGGAL_PELATIHAN_REG',"to_date('$tanggal_pelatihan','dd-mm-yyyy')", false);
			$this->db->set('WAKTU_PELATIHAN', $waktu);
			$this->db->insert('REGISTRASI_PELATIHAN');
		}
		function new_registrasi_pelatihan($id_pel, $tanggal, $bulan, $tahun, $jam){
			$id_user = $this->session->userdata('ID_USER');
			
			$date = $tanggal."-".$bulan."-".$tahun;
			$newdate = $this->convdate($date);
			
			$checkreg = $this->mread->checkreg($bulan, $tanggal, $tahun);
			
			$checklagi = $this->mread->cek_kuota($id_pel, $date, $jam);
			
			if($checkreg == TRUE){
				if($checklagi == FALSE){
						$this->db->set('ID_USER', $id_user);
						$this->db->set('ID_PELATIHAN', $id_pel);
						$this->db->set('TANGGAL_PELATIHAN', $tanggal);
						$this->db->set('BULAN_PELATIHAN', $bulan);
						$this->db->set('TAHUN_PELATIHAN', $tahun);
						$this->db->set('WAKTU_PELATIHAN', $jam);
						$this->db->insert('REGISTRASI_PELATIHAN');
					}else if($checklagi == TRUE){
							redirect('member/registrasi/error_lagi/');
						}
				}else{
					redirect('member/registrasi/error/');
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
		function hasil_test_member($jumsoal, $benar, $salah){
		
			$id_quiz = $this->input->post('ambil_id_quiz');
			$id_user = $this->session->userdata('ID_USER');
			$id_pelatihan = $this->input->post('ambil_id_pelatihan');
			
			$nilai = (100/$jumsoal)* $benar;
			
			$data = array(
					'ID_PELATIHAN' => $id_pelatihan,
					'ID_QUIZ' => $id_quiz,
					'JUMLAH_SOAL' =>$jumsoal,
					'JUMLAH_BENAR' =>$benar,
					'JUMLAH_SALAH' => $salah,
					'NILAI_AKHIR' => $nilai,
					'ID_USER' => $id_user
				);
								
			$this->db->insert('HASIL_TEST_QUIZ', $data);
		}
		function quisioner(){
			$id_user = $this->session->userdata('ID_USER');
			$id_pelatihan = $this->input->post('ambil_id_pelatihan');
			$id_quisioner = $this->input->post('ambil_id_quiz');
			$soal = $this->input->post('idsoal');
			$jawaban = $this->input->post('jawaban');
			
		//	$embooh = $this->input->post('soal_quisioner');
			//var_dump($jawaban);
			//exit();
			
			foreach($soal as $data){
				$data = array(
						//'id_pelatihan' => $id_pelatihan[$idx],
						'ID_USER' => $id_user,
						'ID_SOAL_QUISIONER' => $data,
						'ID_JAWABAN_QUISIONER' => $jawaban[$data],
						'ID_PELATIHAN' => $id_pelatihan,
						'ID_QUISIONER' => $id_quisioner,
						'ID_KATEGORI_USER' => 1
					);
					$this->db->insert('HASIL_JAWABAN_QUISIONER', $data);
			}
		/*	for($i=0;$i<count($soal); $i++){
					$data = array(
						//'id_pelatihan' => $id_pelatihan[$idx],
						'ID_USER' => $id_user,
						'ID_SOAL_QUISIONER' => $soal[$i],
						'ID_JAWABAN_QUISIONER' => $jawaban[$soal[$i]],
						'ID_PELATIHAN' => $id_pelatihan,
						'ID_QUISIONER' => $id_quisioner
					);
					$this->db->insert('HASIL_JAWABAN_QUISIONER', $data);
			}*/
		/*	$data = array();
			foreach ($soal as $key => $value) {
			
				$data[] = array(
						'ID_USER' => $id_user,
						'ID_SOAL_QUISIONER' => $soal[$key],
						'ID_JAWABAN_QUISIONER' => $jawaban[$key],
						'ID_PELATIHAN' => $id_pelatihan,
						'ID_QUISIONER' => $id_quisioner
				);
			};
			$this->db->insert_batch('SOAL_QUISIONER', $data);*/
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
	}
?>