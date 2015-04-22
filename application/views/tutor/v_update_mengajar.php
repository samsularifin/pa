<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Registrasi Mengajar</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
			<?php
			if($this->session->flashdata('pesan') != ''){
							echo '
							  <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('pesan').'
							  </div>
							';
						}
			?><p/>
			<?php
					foreach($hasil as $value){
			?>
			<form action="<?php echo base_url();?>tutor/listmengajar/update/<?php echo $value->ID_REGISTRASI_MENGAJAR;?>" class="form-horizontal" method="POST" style="margin-left:20px">
									<fieldset>
								
										<div class="control-group">
                                            <label class="control-label" for="firstname">Pengajaran Bahasa</label>
                                            <div class="controls">
												<select name="id_pelatihan" style="width:380px;">
													<?php
														foreach($pelatihan as $data){
													?>
													<option value="<?php echo $data->ID_PELATIHAN;?>" 
													<?php
													if($value->ID_PELATIHAN == $data->ID_PELATIHAN){
														echo "selected='selected'";
													}?>
													><?php echo $data->NAMA_PELATIHAN;
													
													?>
													
													</option>
													<?php
														}
													?>
												</select>
                                            </div>
                                        </div>
										
										<div class="control-group">								
											<label class="control-label" for="lastname">Pilih Hari Ke </label>
											   <div class="controls">
												<label class="radio inline">
												  <input type="radio" <?php if($value->HARI_MENGAJAR =="Senin"){
													echo "checked='checked'";
												  }?> name="hari" value="Senin" > Senin
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->HARI_MENGAJAR =="Selasa"){
													echo "checked='checked'";
												  }?>name="hari" value="Selasa"> Selasa
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->HARI_MENGAJAR =="Rabu"){
													echo "checked='checked'";
												  }?> name="hari" value="Rabu"> Rabu
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->HARI_MENGAJAR =="Kamis"){
													echo "checked='checked'";
												  }?> name="hari" value="Kamis"> Kamis
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->HARI_MENGAJAR =="Jumat"){
													echo "checked='checked'";
												  }?> name="hari" value="Jumat"> Jumat
												</label>
											
											</div>							
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label">Waktu Pengajaran</label>
											
                                            
                                            <div class="controls">
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="09:00-10:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="09:00-10:00"> 09:00-10:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="10:00-11:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="10:00-11:00"> 10:00-11:00
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="11:00-12:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="11:00-12:00"> 11:00-12:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="13:00-14:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="13:00-14:00"> 13:00-14:00
												</label>
											
                                          </div>		<!-- /controls -->	
											<div class="controls">
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="14:00-15:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="14:00-15:00"> 14:00-15:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="15:00-16:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="15:00-16:00"> 15:00-16:00
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="16:00-17:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="16:00-17:00"> 16:00-17:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="17:00-18:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="17:00-18:00"> 17:00-18:00
												</label>
											
                                          </div>
										  <div class="controls">
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="18:00-19:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="18:00-19:00"> 18:00-19:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="19:00-20:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="19:00-20:00"> 19:00-20:00
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->JAM_MENGAJAR =="20:00-21:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="20:00-21:00"> 20:00-21:00
												</label>
                                          </div>
										  
										</div> <!-- /control-group -->
										<?php
											}
										?>
										<div id="tampilkan"></div>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" style="background:#269fb2">Update</button> 
											<button class="btn"  type="button" onclick="goBack()">Back</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>

		</div>
</div>
<script>
						function goBack()
						{
							window.history.back()
						}
				  </script>