
<!-- BEGIN ARTICLE CONTENT AREA -->

<div class="span8 main-column three-columns-central">
	<article >
	<?php
		foreach($ambil_id as $data){
		
	?>
		<h2 style="color:#2773ae"><?php echo $data->NAMA_PELATIHAN;?></h2> 
<hr/>									
		<?php echo $data->DESKRIPSI;?>                                                           
	</article>
	<?php
		}
	?>
</div>