<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Registrasi Mengajar</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
			<h3 class="center">SURAT PERNYATAAN
				KESEDIAAN <br/>SEBAGAI TENAGA VOLUNTEER UNTUK PENGAJAR RUMAH BAHASA
			</h3><?php echo br(1);?>
<hr/>
			<form action="<?php echo base_url();?>tutor/registrasi/simpan/" method="POST" class="form-horizontal">
				<div class="fields">
						<fieldset>
							<?php
								foreach($identitas as $data){
							?>
							<div class="control-group">											
								<label class="control-label" for="firstname">Nama</label>
								<div class="controls">
									<div class="isii"><?php echo $data->NAMA_LENGKAP;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">			
								<label class="control-label" for="firstname">Tempat & Tanggal Lahir</label>
								<div class="controls">
									<div class="isii"><?php echo $data->TEMPAT_LAHIR.', '.$data->TANGGAL_LAHIR;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">Alamat Domisili</label>
								<div class="controls">
									<div class="isii"><?php echo $data->ALAMAT;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">Nomor Telepon</label>
								<div class="controls">
									<div class="isii"><?php echo $data->NOTEL;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">Alamat Email</label>
								<div class="controls">
									<div class="isii"><?php echo $data->EMAIL;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">Status Pekerjaan</label>
								<div class="controls">
									<div class="isii"><?php echo $data->STATUS_PEKERJAAN;?></div>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">
								<label class="control-label" for="firstname">Pengajaran Bahasa</label>
								<div class="controls">
									<div class="isii"><?php
										foreach($pelatihan as $da){
											//echo $this->input->post('edukasi');
											echo $da->NAMA_PELATIHAN;
											?>
											<input type="hidden" name="getIdPel" value="<?php echo $da->ID_PELATIHAN;?>"><?php
											}
										?></div>
								</div> <!-- /controls -->	
							</div>
							
							<div class="control-group">								
								<label class="control-label" for="lastname">Hari Mengajar</label>
								   <div class="controls">
									<div class="isii">
									<?php 
										if($this->input->post('hari') == NULL){
											echo '
										<div class="row-fluid">
											<div class="span11 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Anda belum memilih hari pengajaran 
											</div>
										</div>';
										}else{
										foreach($this->input->post('hari') as $key => $value){
											//echo $value ;
											$getVar[] = $value;
											//$getval = explode(',',$this->input->post('hari'));
											//echo $getval;
											?>
											<input type="hidden" name="getHari[]" value="<?php echo $value;?>">
											<?php
											}
											echo implode(", ", $getVar);
											
										}
										

										
									/*}*/
									?></div>
								
								</div>							
							</div> <!-- /control-group -->
							<div class="control-group">		
								<label class="control-label">Waktu Pengajaran</label>
									<div class="controls">
										<div class="isii">
									<?php 
										if($this->input->post('waktu') == NULL){
											echo '
										<div class="row-fluid">
											<div class="span11 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Waktu kosong 
											</div>
										</div>';
										}else{
											foreach($this->input->post('waktu') as $key => $value){
												$getVal[] =  $value;
												
												
												//$getval = explode(',',$this->input->post('waktu'));
												//echo $getval;
												?>
													<input type="hidden" name="getWaktu[]" value="<?php echo $value;?>">
												<?php
												}
												echo implode(', ',$getVal);
											/*}*/
										}?>
										</div>
								  </div>	
							</div> <!-- /control-group -->
							
						<hr/>
						<?php
							}
						?>
						<div class="pernyataan">Menyatakan kesediaan saya untuk berpartisipasi dan/atau mengajar secara sukarela di Rumah Bahasa dalam rangka ikut serta meningkatkan kemampuan berbahasa inggris/mandarin* bagi masyarakat kota surabaya. <br/><br/>
						Sehubungan dengan hal tersebut saya dengan keinginan pribadi akan melaksanakan jadwal kegiatan yang telah disepakati  dengan penuh tanggung jawab. 
						<?php echo br(2);?>
						<div class="tanggal_p">SURABAYA,  <?php echo date('d-m-y');?></div>
						</div>
						<?php echo br(2);?>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" style="background:#269fb2">Simpan</button> 
								<button class="btn">Back</button>
							</div> <!-- /form-actions --> 
						</fieldset>
									
							</div>

								</form>

		</div>
</div>