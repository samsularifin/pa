<?php 
	class Mdelete extends CI_Model{
		function kuota_pelatihan($id){
			$this->db->delete('KUOTA_PELATIHAN', array('ID_KUOTA_PELATIHAN' => $id));
		}
		function pelatihan($id){
			$this->db->delete('PELATIHAN', array('ID_PELATIHAN' => $id));
		}
		function admin_user($id){
			$this->db->delete('TBL_USER', array('ID_USER' => $id));
		}
		function jadwal_mengajar($id){
			$this->db->delete('REGISTRASI_MENGAJAR', array('ID_REGISTRASI_MENGAJAR' => $id));
		}
		function member_module($id){
			$select = "SELECT NAMA_MODULE FROM MODULE_PELATIHAN WHERE ID_MODULE = ".$id;
			$query = $this->db->query($select);
			/*$val = $query->result_array();
			unlink($val['nama_gambar_slider']); */
			foreach ($query->result_array() as $row)
			{
				   	$unlink = unlink('./file/modul/member/'.$row['NAMA_MODULE']);
					if($unlink)
					{
						$sql = "DELETE MODULE_PELATIHAN where ID_MODULE =".$id;
						$this->db->query($sql);
					} 
			}
		}
		function tutor_module($id){
			$select = "SELECT NAMA_MODULE FROM MODULE_PELATIHAN WHERE ID_MODULE = ".$id;
			$query = $this->db->query($select);
			/*$val = $query->result_array();
			unlink($val['nama_gambar_slider']); */
			foreach ($query->result_array() as $row)
			{
				   	$unlink = unlink('./file/modul/tutor/'.$row['NAMA_MODULE']);
					if($unlink)
					{
						$sql = "DELETE MODULE_PELATIHAN where ID_MODULE =".$id;
						$this->db->query($sql);
					} 
			}
		}
		function berita_front($id){
			$select = "SELECT GAMBAR FROM BERITA WHERE ID_BERITA = ".$id;
			$query = $this->db->query($select);
			/*$val = $query->result_array();
			unlink($val['nama_gambar_slider']); */
			foreach ($query->result_array() as $row)
			{
				   //	$unlink = unlink('./file/gambar/berita/'.$row['GAMBAR']);
					//if($unlink)
					//{
						$sql = "DELETE FROM BERITA where ID_BERITA =".$id;
						$this->db->query($sql);
				//	} 
			}
		}
		function gallery_front($id){
			$select = "SELECT NAMA_GALLERY FROM GALLERY WHERE ID_GALLERY = ".$id;
			$query = $this->db->query($select);
			/*$val = $query->result_array();
			unlink($val['nama_gambar_slider']); */
			foreach ($query->result_array() as $row)
			{
				   	$unlink = unlink('./file/gambar/gallery/'.$row['NAMA_GALLERY']);
					if($unlink)
					{
						$sql = "DELETE GALLERY where ID_GALLERY =".$id;
						$this->db->query($sql);
					} 
			}
		}
		function komentar_front($id){
			$this->db->delete('KOMENTAR', array('ID_KOMENTAR' => $id));
		}
		function slider_front($id){
			$select = "SELECT NAMA_SLIDER FROM SLIDER WHERE ID_SLIDER = ".$id;
			$query = $this->db->query($select);
			/*$val = $query->result_array();
			unlink($val['nama_gambar_slider']); */
			foreach ($query->result_array() as $row)
			{
				   	$unlink = unlink('./file/gambar/slider/'.$row['NAMA_SLIDER']);
					if($unlink)
					{
						$sql = "DELETE SLIDER where ID_SLIDER =".$id;
						$this->db->query($sql);
					} 
			}
		}
		function quiz_tutor($id){
			$this->db->delete('QUIZ', array('ID_QUIZ' => $id));
		}
		function delete_quisioner_member($id){
			$this->db->delete('QUISIONER', array('ID_QUISIONER' => $id));
		}
		function delete_quisioner_tutor($id){
			$this->db->delete('QUISIONER', array('ID_QUISIONER' => $id));
		}
	}
?>