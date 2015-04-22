<?php 
	class Mupdate extends CI_Model{
		function pelatihan($id){
			$nama = $this->input->post('nama_pelatihan');

			$data = array(
				'NAMA_PELATIHAN' => $nama
			);			
			$this->db->where('ID_PELATIHAN', $id);
			$this->db->update('PELATIHAN', $data);
	
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
		function profile($id){
			$no_id = $this->input->post('no_identitas');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tanggal = $this->input->post('tanggal');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$ambil = $tanggal.'-'.$bulan.'-'.$tahun;
			
			$tanggal_lahir = $this->convdate($ambil);
			
			$alamat = $this->input->post('alamat');
			$kelamin = $this->input->post('jenis_kelamin');
			$telfon = $this->input->post('telfon');
			$email = $this->input->post('email');
			$pekerjaan = $this->input->post('pekerjaan');
		//	$instansi = $this->input->post('edukasi');
			
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
								'NMOR_IDENTITAS' => $no_id,
								'NAMA_LENGKAP' => $nama_lengkap,
								'TEMPAT_LAHIR' =>$tempat_lahir,
								'TANGGAL_LAHIR' =>$tanggal_lahir,
								'ALAMAT' =>$alamat,
								'JENIS_KELAMIN' =>$kelamin,
								'NOTEL' =>$telfon,
								'EMAIL' =>$email,
								'STATUS_PEKERJAAN' =>$pekerjaan,
							//	'EDUKASI' =>$instansi,
								'FOTO' =>$fileName
								);
								
							$this->db->where('ID_USER', $id);
							$this->db->update('TBL_USER', $data);
						}else{
							echo "There was an error uploading the file, please try again!";
				}
			}else{
				 $data = array(
					'NMOR_IDENTITAS' => $no_id,
					'NAMA_LENGKAP' => $nama_lengkap,
					'TEMPAT_LAHIR' =>$tempat_lahir,
					'TANGGAL_LAHIR' =>$tanggal_lahir,
					'ALAMAT' =>$alamat,
					'JENIS_KELAMIN' =>$kelamin,
					'NOTEL' =>$telfon,
					'EMAIL' =>$email,
					'STATUS_PEKERJAAN' =>$pekerjaan
				//	'EDUKASI' =>$instansi
					
					);
								
				$this->db->where('ID_USER', $id);
				$this->db->update('TBL_USER', $data);
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
		function registrasi_pelatihan($id){
			$id_pelatihan = $this->input->post('id_pelatihan');
			$tanggal_pelatihan = $this->input->post('tanggal_pelatihan');
			
			$getTanggal = $this->ambil_tanggal($tanggal_pelatihan);
			$getBulan = $this->ambil_bulan($tanggal_pelatihan);
			$getTahun = $this->ambil_tahun($tanggal_pelatihan);
			
			//$pecah = $this->convdate($tanggal_pelatihan);
			$waktu = $this->input->post('waktu');
			
			$data = array(
					'ID_PELATIHAN' => $id_pelatihan,
					'TANGGAL_PELATIHAN' =>$getTanggal,
					'BULAN_PELATIHAN' =>$getBulan,
					'TAHUN_PELATIHAN' =>$getTahun,
					'WAKTU_PELATIHAN' => $waktu
					);
							
				$this->db->where('ID_REGISTRASI', $id);
				$this->db->update('REGISTRASI_PELATIHAN', $data);
		}
		function ambil_bulan($date)
		{
			$d = explode('-',$date);
			$month = $d[1];
			
			return $month;
		}
		function ambil_tahun($date){
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
	}
?>