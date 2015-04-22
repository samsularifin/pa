                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Jadwal Front
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update Jadwal Front End</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                              <?php
									foreach ($jadwal as $data){
										$val = $data->ID_JADWAL_FRONT;
											$attributes = array('class' => 'form-horizontal',
											'role' =>'form');
											echo form_open('admin/fjadwal/update/'.$val,$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Judul About</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Masukkan judul pelatihan" name="judul_jadwal" value="<?php echo $data->JUDUL_JADWAL_FRONT;?>">
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Isi Konten</label>
                                  <div class="col-lg-9">
									
									<?php 
										$data2 = array('name' =>'isi_jadwal',
										'id' =>'isi_jadwal',
										'value' => $data->ISI_JADWAL_FRONT);
					
										echo form_textarea($data2);
									?>
                                  </div>
                                </div> 
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Update data</button>
                                    <button type="reset" class="btn btn-warning" onclick="goBack()">Cancel</button>
                                  </div>
                                </div>
                               <?php 
								echo form_close();
								}
								?>
                              </div>
                           </div>
							
							   </div>
							</div>		
						 </div>
                  </div>
				  
				   <script>
				   
						function goBack()
						{
							window.history.back()
						}
				  </script>