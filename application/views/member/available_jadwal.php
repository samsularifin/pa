<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Check available jadwal</h3>
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
			?>
		<br/>
		<?php
			//check di sini teru
		?>
			<form action="<?php echo base_url();?>member/jadwal/check/" class="form-horizontal" method="POST">
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
                                            <label class="control-label" for="firstname">Pilih Bulan</label>
                                            <div class="controls">
												<div id="datetimepicker3" class="input-append">
													<input type="text" 
         data-date-format="mm-yyyy" name="tanggal_pelatihan" required></input>
													<span class="add-on">
													  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
													  </i>
													</span>
												 </div>
                                            </div>
                                        </div>		
										<br/>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" style="background:#62a8d9">Lihat Jadwal</button> 
											<button class="btn" type="button" onclick="goBack()">Kembali</button>
										</div> <!-- /form-actions -->
										</div> <!-- /control-group -->
										 <br />
										
											
										
									</fieldset>
								</form>

		</div>
</div>
<script>
	function goBack(){
		window.history.back();
	}
</script>