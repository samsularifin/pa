<?php 
	class Mdelete extends CI_Model{
		function pelatihan($id){
			$this->db->delete('PELATIHAN', array('ID_PELATIHAN' => $id));
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
		function listpelatihan($id){
			$this->db->delete('REGISTRASI_PELATIHAN', array('ID_REGISTRASI' => $id));
		}
	}
?>