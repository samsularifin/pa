
<script src="<?php echo base_url();?>desaintutor/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url();?>desaintutor/js/jquery-1.8.3.min.js"></script>
<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Registrasi Pelatihan</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
		<?php
					if($this->session->flashdata('pesann') != ''){
							echo '
							  <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('pesann').'
							  </div>
							';
						}
			?>
		<br/>
		<?php
			//check di sini teru
		?>
			<form action="<?php echo base_url();?>tutor/registrasin/simpan/" class="form-horizontal" method="POST">
									<fieldset>
								
										<div class="control-group">
                                            <label class="control-label" for="firstname">Pilih Pelatihan</label>
                                            <div class="controls">
												<select name="pelatihan" style="width:380px;">
												<?php
													foreach($pelatihan as $data){
												?>
													<option value="<?php echo $data->ID_PELATIHAN;?>"><?php echo $data->NAMA_PELATIHAN;?></option>
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
													<input data-format="dd-MM-yyyy" type="text" name="tanggal_pelatihan" required></input>
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
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="09:00-10:00"> 09:00-10:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="10:00-11:00"> 10:00-11:00
												</label>
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="11:00-12:00"> 11:00-12:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="13:00-14:00"> 13:00-14:00
												</label>
											
                                          </div>		<!-- /controls -->	
											<div class="controls">
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="14:00-15:00"> 14:00-15:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="15:00-16:00"> 15:00-16:00
												</label>
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="16:00-17:00"> 16:00-17:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="17:00-18:00"> 17:00-18:00
												</label>
											
                                          </div>
										  <div class="controls">
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="18:00-19:00"> 18:00-19:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="19:00-20:00"> 19:00-20:00
												</label>
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[]" value="20:00-21:00"> 20:00-21:00
												</label>
                                          </div>
										  
										</div> <!-- /control-group -->			
										</div> <!-- /control-group -->
										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" style="background:#269fb2">Daftar</button> 
											<button type="button" onclick="goBack()"class="btn">Kembali</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>

		</div>
</div>
<script>
	function goBack(){
		window.history.back();
	}
</script>