<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Registrasi Mengajar</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
			<p/>
			<?php
					foreach($hasil as $value){
			?>
			<form action="<?php echo base_url();?>member/listpelatihan/update/<?php echo $value->ID_REGISTRASI;?>" class="form-horizontal" method="POST" style="margin-left:20px">
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
                                            <label class="control-label" for="firstname">Pilih tanggal pelatihan</label>
                                            <div class="controls">
												<div id="datetimepicker4" class="input-append">
													<input data-format="dd-MM-yyyy" type="text" name="tanggal_pelatihan" value="<?php echo $value->TANGGAL_PELATIHAN."-".$value->BULAN_PELATIHAN."-".$value->TAHUN_PELATIHAN;?>"required></input>
													<span class="add-on">
													  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
													  </i>
													</span>
												 </div>
                                            </div>
                                        </div>
										<div class="control-group">											
											<label class="control-label">Waktu Pengajaran</label>
											
                                            
                                            <div class="controls">
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="09:00-10:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="09:00-10:00"> 09:00-10:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="10:00-11:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="10:00-11:00"> 10:00-11:00
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="11:00-12:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="11:00-12:00"> 11:00-12:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="13:00-14:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="13:00-14:00"> 13:00-14:00
												</label>
											
                                          </div>		<!-- /controls -->	
											<div class="controls">
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="14:00-15:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="14:00-15:00"> 14:00-15:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="15:00-16:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="15:00-16:00"> 15:00-16:00
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="16:00-17:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="16:00-17:00"> 16:00-17:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="17:00-18:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="17:00-18:00"> 17:00-18:00
												</label>
											
                                          </div>
										  <div class="controls">
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="18:00-19:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="18:00-19:00"> 18:00-19:00
												</label>
												
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="19:00-20:00"){
													echo "checked='checked'";
												  }?> name="waktu" value="19:00-20:00"> 19:00-20:00
												</label>
												<label class="radio inline">
												  <input type="radio" <?php if($value->WAKTU_PELATIHAN =="20:00-21:00"){
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
											<button type="submit" class="btn btn-primary" style="background:#62a8d9">Update</button> 
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