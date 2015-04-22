<!--<div class="span8 main-column three-columns-central">
       <article >
			<div id="box">
				<a href="http://pmb.eepis-its.edu/pages/16/PMDK-PN" name="PMDK-PN" title="PMDK-PN">
				<div id="boxhomesatu"  >PMDK-PN   
					<div class="des">PMDK Politeknik Negeri se-Indonesia</div>
				</div>
				</a>
				<a href="http://pmb.eepis-its.edu/pages/16/PMDK-PN" name="PMDK-PN" title="PMDK-PN">
				<div id="boxhomesatu"  >PMDK-PN   
					<div class="des">PMDK Politeknik Negeri se-Indonesia</div>
				</div>
				</a>
				<a href="http://pmb.eepis-its.edu/pages/16/PMDK-PN" name="PMDK-PN" title="PMDK-PN">
				<div id="boxhomesatu"  >PMDK-PN   
					<div class="des">PMDK Politeknik Negeri se-Indonesia</div>
				</div>
				</a>
				<a href="http://pmb.eepis-its.edu/pages/16/PMDK-PN" name="PMDK-PN" title="PMDK-PN">
				<div id="boxhomesatu"  >PMDK-PN   
					<div class="des">PMDK Politeknik Negeri se-Indonesia</div>
				</div>
				</a>
			</div>
	</article>
</div> -->
<div class="span8 main-column three-columns-central">
       <article >
	   <h2 style="color:#2773ae">JENIS PELATIHAN </h2> 	<hr/>
	   <?php
		foreach($pelatihan as $data){
	   ?>
<div class="panel panel-primary">
	<div class="panel-heading">
	  <h3 class="panel-title"><?php echo $data->NAMA_PELATIHAN;?></h3>
	</div>
	<br/>
	<div class="panel-body">
		<div class="list-group" style="margin-bottom:-2px">
		<a href="<?php echo base_url();?>pelatihan/modal/<?php echo $data->ID_PELATIHAN;?>" class="list-group-item" data-toggle="modal" data-target="#myModal<?php echo $data->ID_PELATIHAN;?>" id="btn" style="margin:-15px">
			<p class="list-group-item-text">
				<?php echo  character_limiter($data->DESKRIPSI,150);?> <p style="color:#428bca;margin-top:10px">Baca Selengkap nya --</p></p>
			</a>
			
		</div>
	</div>
</div>
<br/>
<?php
	}
?>

  </article>
 </div>
 
  
  <?php
	foreach($pelatihan as $data2){
  ?>
  <div class="modal hide fade" id="myModal<?php echo $data2->ID_PELATIHAN;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
		  <div class="modal-header">
			<h3 id="myModalLabel">PROGRAM PELATIHAN RUMAH BAHASA SURABAYA</h3>
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
