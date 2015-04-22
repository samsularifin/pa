<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Profile User</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content" >
		<?php
								foreach($profile as $data){
							?>
			<a href="<?php echo base_url();?>member/profile/onclickup/<?php echo $data->ID_USER;?>" class="btn btn-small btn-success" style="float:right; margin-top:7px;background:#62a8d9; color:#fff"><i class="btn-icon-only  icon-pencil"> </i></a>
			<hr/>
			<form id="edit-profile" class="form-horizontal" style="margin-left:40px">
				<div class="fields">
						<fieldset>
							
							<div class="control-group">											
								<label class="control-label" for="firstname">NO IDENTITAS</label>
								<div class="controls">
									<div class="isii"><?php echo $data->NMOR_IDENTITAS;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">											
								<label class="control-label" for="firstname">NAMA LENGKAP</label>
								<div class="controls">
									<div class="isii"><?php echo $data->NAMA_LENGKAP;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">			
								<label class="control-label" for="firstname">TEMPAT DAN TANGGAL LAHIR</label>
								<div class="controls">
									<div class="isii"><?php echo $data->TEMPAT_LAHIR.', '.$data->TANGGAL_LAHIR;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">ALAMAT DOMISILI</label>
								<div class="controls">
									<div class="isii"><?php echo $data->ALAMAT;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">JENIS KELAMIN</label>
								<div class="controls">
									<div class="isii"><?php echo $data->JENIS_KELAMIN;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">											
								<label class="control-label" for="firstname">AGAMA</label>
								<div class="controls">
									<div class="isii"><?php echo $data->AGAMA;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">TELEPON</label>
								<div class="controls">
									<div class="isii"><?php echo $data->NOTEL;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">EMAIL</label>
								<div class="controls">
									<div class="isii"><?php echo $data->EMAIL;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">STATUS PEKERJAAN</label>
								<div class="controls">
									<div class="isii"><?php echo $data->STATUS_PEKERJAAN;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">FOTO</label>
								<div class="controls">
									<div class="isii"><?php
										if($data->FOTO == NULL){
											?>
											<img style="width:300px; height:280px" src="<?php echo base_url();?>/file/gambar/user/nophoto.jpg"/>
										<?php
										}else{
									?>
                                    <img style="width:220px; height:250px" src="<?php echo base_url();?>/file/gambar/user/<?php echo $data->FOTO;?>"/>
									<?php
										}
									?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group --><br/>
							<div class="control-group">
								<label class="control-label" for="firstname">PELATIHAN YANG DIAMBIL</label>
								<div class="controls">
									<?php
										if(count($pelatihan_diikuti) >0){
											foreach($pelatihan_diikuti as $data){
									?>
									<div class="isii"><?php echo $data->NAMA_PELATIHAN;?></div>
									<?php
										}
										}else{
											echo '
										<div class="row-fluid">
											<div class="span11 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Anda belum mengikuti pelatihan apapun
											</div>
										</div>';
										}
									?>
								</div> 	
							</div>
							
							<div class="control-group">								
								<label class="control-label" for="lastname">TANGGAL PELATIHAN</label>
								   <div class="controls">
								   <?php
										if(count($pelatihan_diikuti) >0){
											foreach($pelatihan_diikuti as $data){
									?>
									<div class="isii">
										<?php 
											echo $data->TANGGAL_PELATIHAN."-".$data->BULAN_PELATIHAN."-".$data->TAHUN_PELATIHAN;
										?>
									</div>
									<?php
											}
										}else{
											echo '
										<div class="row-fluid">
											<div class="span11 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Tanggal pelatihan kosong
											</div>
										</div>';
										}
									?>
								</div>							
							</div> 
							<div class="control-group">		
								<label class="control-label">WAKTU PELATIHAN</label>
									<div class="controls">
									<?php
										if(count($pelatihan_diikuti) >0){
											foreach($pelatihan_diikuti as $data){
									?>
										<div class="isii">
									<?php 
										echo $data->WAKTU_PELATIHAN;
									?>
										</div>
										<?php
												}
											}else{
											echo '
										<div class="row-fluid">
											<div class="span11 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Waktu pelatihan kosong
											</div>
										</div>';
										}
										?>
								  </div>	
							</div> 
							
						<hr/>
						<?php
							}
						?>
						
						<?php echo br(2);?>
							
						</fieldset>
									
							</div>

								</form>

		</div>
</div>