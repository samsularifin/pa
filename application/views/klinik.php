
<!-- BEGIN ARTICLE CONTENT AREA -->

                            <div class="span8 main-column three-columns-central">
                                <article >
								
									<?php
										/*
									?>
									
                                    <h2><?php echo $data->JUDUL_PELATIHAN_FRONT;?></h2>                                                         
									<hr/>
								
                                   <?php
										echo $data->ISI_PELATIHAN_FRONT;
									} */
								   ?>
								  <div class="row show-grid">
									<ul>
									<div class="list-group" >
        <a href="" class="list-group-item active">
          <h4 class="list-group-item-heading">DAFTAR KLINIK KONSULTASI</h4>
          
        </a>
					<?php
						foreach($klinik as $data){
						?>
							<a href="<?php echo base_url();?>pelatihan/modal_klinik/<?php echo $data->ID_PELATIHAN;?>" class="list-group-item" data-toggle="modal" data-target="#myModal<?php echo $data->ID_PELATIHAN;?>" id="btn" style="border:1px dotted #428bca">
							  <h4 class="list-group-item-heading" style="color:#2773ae;margin-bottom:10px"><?php echo $data->NAMA_PELATIHAN;?></h4><hr />
							  <p class="list-group-item-text" style="font-size:13px"><?php echo  character_limiter($data->DESKRIPSI,150);?></p>
							</a>
							<?php echo br(2);?>
									
								<?php
									}
									
								?>	
 </div>
									</ul>
								</div>
								<!--<ul id="branch">
									  <li>
										<span class="vein top-right"></span>
										<span class="vein bottom-left"></span>
										<a href="">Lorem</a>
									  </li>
									  <li>
										<span class="vein top-right"></span>
										<span class="vein bottom-left"></span>
										<a href="">Ipsum</a>
									  </li>
									</ul> -->
                                </article>
								
                            </div>
	
<?php
		foreach($klinik as $data2){
		?>

	<div class="modal hide fade" id="myModal<?php echo $data2->ID_PELATIHAN;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
		  <div class="modal-header">
			<h3 id="myModalLabel">PROGRMA KLINIK RUMAH BAHASA SURABAYA</h3>
		  </div>
		<div class="modal-body">
		</div>
		<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php
	}
?>
