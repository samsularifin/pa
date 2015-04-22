<?php
	class Minsert extends CI_Model{
		function pelatihan(){
			$nama = $this->input->post('nama_pelatihan');
			
			$data = array(
				'NAMA_PELATIHAN' => $nama
			);
			$this->db->insert('PELATIHAN',$data);
			
		}
		function quisioner(){
			$id_user = $this->session->userdata('ID_USER');
			$id_pelatihan = $this->input->post('ambil_id_pelatihan');
			$id_quisioner = $this->input->post('ambil_id_quiz');
			$soal = $this->input->post('idsoal');
			$jawaban = $this->input->post('jawaban');
			
			foreach($soal as $data){
				$data = array(
						//'id_pelatihan' => $id_pelatihan[$idx],
						'ID_USER' => $id_user,
						'ID_SOAL_QUISIONER' => $data,
						'ID_JAWABAN_QUISIONER' => $jawaban[$data],
						'ID_PELATIHAN' => $id_pelatihan,
						'ID_QUISIONER' => $id_quisioner,
						'ID_KATEGORI_USER' => 2
					);
					$this->db->insert('HASIL_JAWABAN_QUISIONER', $data);
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
		function simpan_mengajar(){
			$id_user = $this->session->userdata('ID_USER');
			/*foreach($this->input->post('getHari') as $key => $value){
				$hari[] = $value;
			}
			
			//$getHari = explode(',',$hari);
			
			
			foreach($this->input->post('getWaktu') as $key => $value2){
				$jam[]= $value2;
				//$getJam = implode(',',$this->input->post('getWaktu'));
			}
			//$jam[] = $getJam;
			//$getJam = explode(',',$jam);
			//$hari = $this->input->post('getHari');
			//$jam = $this->input->post('getWaktu');
			$status = 0;
			
			$data = array(
				'ID_USER' => $id_user,
				'HARI_MENGAJAR' => $hari[$key],
				'JAM_MENGAJAR' => $jam[$key],
				'STATUS' => $status,
			);
			$this->db->insert_batch('REGITRASI_MENGAJAR',$data); */
			$hari = $this->input->post('hari');
			$waktu = $this->input->post('waktu');
			
			$id_pelatihan = $this->input->post('edukasii');
			
			//$data = array();
			for($i=0;$i<count($hari); $i++){
				for($x=0;$x<count($waktu[$i]); $x++){
					$data = array(
						//'id_pelatihan' => $id_pelatihan[$idx],
						'ID_USER' => $id_user,
						'HARI_MENGAJAR' => $hari[$i],
						'JAM_MENGAJAR' => $waktu[$i][$x],
						'ID_PELATIHAN'=> $id_pelatihan,
						'STATUS_MENGAJAR' =>0
					);
					$this->db->insert('REGISTRASI_MENGAJAR', $data);
				}
			}
			/*$data = array();
			foreach ($hari as $hkeys => $valn) {
			//$getHari[$hkeys] = $valn;
			//$hariVal = $hari[$hkeys];
				foreach ($waktu as $key => $value) {
					$data[] = array(
						//'id_pelatihan' => $id_pelatihan[$idx],
						'ID_USER' => $id_user,
						'HARI_MENGAJAR' => $hari[$hkeys],
						'JAM_MENGAJAR' => $waktu[$key],
						'ID_PELATIHAN'=> $id_pelatihan
					);
				}
			}*/
			
		}
		function simpan_mengajar_non(){
			$id_user = $this->session->userdata('ID_USER');
			$tanggal = $this->input->post('tanggal_pelatihan');
			
			$ambil_tanggal = $this->pecah_tanggal($tanggal);
			$ambil_bulan = $this->pecah_bulan($tanggal);
			$ambil_tahun = $this->pecah_tahun($tanggal);
			
			$waktu = $this->input->post('waktu');
			$id_pelatihan = $this->input->post('pelatihan');
			
			for($x=0;$x<count($waktu); $x++){
				/*	$data = array(
						//'id_pelatihan' => $id_pelatihan[$idx],
						'ID_USER' => $id_user,
						'TANGGAL_MENGAJAR' => $convtanggal,
						'JAM_MENGAJAR' => $waktu[$x],
						'ID_PELATIHAN'=> $id_pelatihan,
						'STATUS_MENGAJAR' =>1
					);
					
					$this->db->insert('REGISTRASI_MENGAJAR', $data); */
					$this->db->set('ID_USER', $id_user);
					$this->db->set('ID_PELATIHAN', $id_pelatihan);
					//$this->db->set('TANGGAL_MENGAJAR',"to_date('$tanggal','dd-mm-yyyy')", false);
					$this->db->set('TANGGAL_MENGAJAR', $ambil_tanggal);
					$this->db->set('BULAN_MENGAJAR', $ambil_bulan);
					$this->db->set('TAHUN_MENGAJAR', $ambil_tahun);
					$this->db->set('JAM_MENGAJAR', $waktu[$x]);
					$this->db->set('STATUS_MENGAJAR',1);
					$this->db->insert('REGISTRASI_MENGAJAR');
				}
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
	}
?>