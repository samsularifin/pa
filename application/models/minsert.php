<?php
	class Minsert extends CI_Model{
		function komentar_berita(){
			$nama_komentator = $this->input->post('nama_komentator');
			$email_komentator = $this->input->post('email_komentator');
			$isi_komentar = $this->input->post('isi_komentar');
			$id_berita = $this->input->post('id_berita');
			
			$data = array(
				'NAMA_KOMENTAR' => $nama_komentator,
				'EMAIL_KOMENTAR' => $email_komentator,
				'ISI_KOMENTAR' => $isi_komentar,
				'ID_BERITA' => $id_berita
			);
			
			$this->db->insert('KOMENTAR',$data);
			return true;

		}
		function pendaftaran_tutor(){
			$nama = $this->input->post('nama');
			$tempat_lahir = $this->input->post('tel');
			$tanggal = $this->input->post('tl');
			$bulan = $this->input->post('tb');
			$tahun = $this->input->post('tt');
			$alamat = $this->input->post('alamat');
			$notel = $this->input->post('notel');
			$email = $this->input->post('email');
			$gender = $this->input->post('gender');
			$pekerjaan = $this->input->post('pekerjaan');
			$edukasi = $this->input->post('edukasi');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$ttl = $tanggal."-".$bulan."-".$tahun;
			$foto =  $_FILES['foto']['name'];
			
			if(!empty($foto)){
			$fileData = pathinfo(basename($_FILES['foto']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/gambar/user/'. $fileName;
			
			while(file_exists($target_path))
				{
					$fileName = uniqid() . '.' . $fileData['extension'];
					$target_path = './file/gambar/user/'. $fileName;
					//$dir = './assets/images/';
				}
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_path))
						{
							$data = array(
								'NAMA_LENGKAP' => $nama,
								'TEMPAT_LAHIR' => $tempat_lahir,
								'TANGGAL_LAHIR' => $ttl,
								'ALAMAT' => $alamat,
								'NOTEL' => $notel,
								'EMAIL' => $email,
								'JENIS_KELAMIN' => $gender,
								'STATUS_PEKERJAAN' => $pekerjaan,
								'EDUKASI' => $edukasi,
								'ID_KATEGORI_USER' => 2,
								'USERNAME' => $username,
								'PASSWORD' => $password,
								'FOTO' => $fileName,
								'VALIDASI' => 0
								
							); 
							$this->db->insert('TBL_USER', $data);
						/*	$this->db->set('NAMA_LENGKAP', $nama);
							$this->db->set('TEMPAT_LAHIR', $tempat_lahir);
							$this->db->set('TANGGAL_LAHIR',"to_date('$ttl','dd/mm/yyyy')",false);
							$this->db->set('ALAMAT', $alamat);
							$this->db->set('NOTEL', $notel);
							$this->db->set('AGAMA', $agama);
							$this->db->set('PEKERJAAN', $pekerjaan);
							$this->db->set('ID_KATEGORI_USER', $kategori_user);
							$this->db->set('USERNAME', $username);
							$this->db->set('PASSWORD', $password);
							$this->db->set('FOTO', $fileName);
							$this->db->set('VALIDASI', 0);
							$this->db->set('ID_PELATIHAN', 0);
							$this->db->insert('TBL_USER');*/
						}else{
							echo "There was an error uploading the file, please try again!";
				}
			}else{
				$data = array(
								'NAMA_LENGKAP' => $nama,
								'TEMPAT_LAHIR' => $tempat_lahir,
								'TANGGAL_LAHIR' => $ttl,
								'ALAMAT' => $alamat,
								'NOTEL' => $notel,
								'EMAIL' => $email,
								'JENIS_KELAMIN' => $gender,
								'STATUS_PEKERJAAN' => $pekerjaan,
								'EDUKASI' => $edukasi,
								'ID_KATEGORI_USER' => 2,
								'USERNAME' => $username,
								'PASSWORD' => $password,
								'VALIDASI' => 0
								
							);
								
							$this->db->insert('TBL_USER', $data);
			}
		}
		function pendaftaran_member(){
			$nmor_id = $this->input->post('nomor_id');
			$nama = $this->input->post('nama');
			$tempat_lahir = $this->input->post('tel');
			$tanggal = $this->input->post('tl');
			$bulan = $this->input->post('tb');
			$tahun = $this->input->post('tt');
			$alamat = $this->input->post('alamat');
			$notel = $this->input->post('notel');
			$email = $this->input->post('email');
			$gender = $this->input->post('gender');
			$pekerjaan = $this->input->post('pekerjaan');
			$agama = $this->input->post('agama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$ttl = $tanggal."-".$bulan."-".$tahun;
			$foto =  $_FILES['foto']['name'];
			
			if(!empty($foto)){
			$fileData = pathinfo(basename($_FILES['foto']['name']));
			$fileName = uniqid() . '.' . $fileData['extension'];
			$target_path = './file/gambar/user/'. $fileName;
			
			while(file_exists($target_path))
				{
					$fileName = uniqid() . '.' . $fileData['extension'];
					$target_path = './file/gambar/user/'. $fileName;
					//$dir = './assets/images/';
				}
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_path))
						{
							$data = array(
								'NMOR_IDENTITAS' => $nmor_id,
								'NAMA_LENGKAP' => $nama,
								'TEMPAT_LAHIR' => $tempat_lahir,
								'TANGGAL_LAHIR' => $ttl,
								'ALAMAT' => $alamat,
								'NOTEL' => $notel,
								'EMAIL' => $email,
								'JENIS_KELAMIN' => $gender,
								'STATUS_PEKERJAAN' => $pekerjaan,
								'AGAMA' => $agama,
								'ID_KATEGORI_USER' => 1,
								'USERNAME' => $username,
								'PASSWORD' => $password,
								'FOTO' => $fileName,
								'VALIDASI' => 0
							); 
							$this->db->insert('TBL_USER', $data);
						/*	$this->db->set('NAMA_LENGKAP', $nama);
							$this->db->set('TEMPAT_LAHIR', $tempat_lahir);
							$this->db->set('TANGGAL_LAHIR',"to_date('$ttl','dd/mm/yyyy')",false);
							$this->db->set('ALAMAT', $alamat);
							$this->db->set('NOTEL', $notel);
							$this->db->set('AGAMA', $agama);
							$this->db->set('PEKERJAAN', $pekerjaan);
							$this->db->set('ID_KATEGORI_USER', $kategori_user);
							$this->db->set('USERNAME', $username);
							$this->db->set('PASSWORD', $password);
							$this->db->set('FOTO', $fileName);
							$this->db->set('VALIDASI', 0);
							$this->db->set('ID_PELATIHAN', 0);
							$this->db->insert('TBL_USER');*/
						}else{
							echo "There was an error uploading the file, please try again!";
				}
			}else{
				$data = array(
								'NMOR_IDENTITAS' => $nmor_id,
								'NAMA_LENGKAP' => $nama,
								'TEMPAT_LAHIR' => $tempat_lahir,
								'TANGGAL_LAHIR' => $ttl,
								'ALAMAT' => $alamat,
								'NOTEL' => $notel,
								'EMAIL' => $email,
								'JENIS_KELAMIN' => $gender,
								'STATUS_PEKERJAAN' => $pekerjaan,
								'AGAMA' => $agama,
								'ID_KATEGORI_USER' => 1,
								'USERNAME' => $username,
								'PASSWORD' => $password,
								'VALIDASI' => 0
							); 
							$this->db->insert('TBL_USER', $data);
			}
		}
	}
?>