<?php
	foreach($ambil_id as $data){
		if($data->ID_PELATIHAN == 5){
			echo  character_limiter($data->DESKRIPSI,300);
			?>
			<a href="<?php echo base_url();?>pelatihan/it_detail/<?php echo $data->ID_PELATIHAN;?>" target="_blank">Read More</a><?php
		}else{
			echo $data->DESKRIPSI;
		}
	}
?>
<hr/>