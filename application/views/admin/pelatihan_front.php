                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Pelatihan Fron
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update pelatihan front end</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                              <?php
									foreach ($pelatihan as $data){
										$val = $data->ID_PELATIHAN_FRONT;
											$attributes = array('class' => 'form-horizontal',
											'role' =>'form');
											echo form_open('admin/fpelatihan/update/'.$val,$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Judul Pelatihan</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Masukkan judul pelatihan" name="judul_pelatihan_front" value="<?php echo $data->JUDUL_PELATIHAN_FRONT;?>">
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Isi Konten</label>
                                  <div class="col-lg-9">
									
									<?php 
										$data2 = array('name' =>'isi_pelatihan_front',
										'id' =>'isi_jadwal',
										'placeholder' =>'Masukkan text',
										'value' => $data->ISI_PELATIHAN_FRONT);
					
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