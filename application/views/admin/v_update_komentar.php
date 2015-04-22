                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Update Komentar
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update komentar front end</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									foreach ($hasil as $data){
										$val = $data->ID_KOMENTAR;
											$attributes = array('class' => 'form-horizontal',
											'role' =>'form');
											echo form_open('admin/komentar/update/'.$val,$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Nama Komentator</label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Masukkan judul berita" name="nama_komentator" value="<?php echo $data->NAMA_KOMENTAR;?>">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Email Komentator</label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Masukkan judul berita" name="email_komentator" value="<?php echo $data->EMAIL_KOMENTAR;?>">
                                  </div>
                                </div>								
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Isi Komentar</label>
                                  <div class="col-lg-9">
									
									<?php 
										$data2 = array('name' =>'isi_komentar',
										'id' =>'textarea',
										'placeholder' =>'Masukkan text',
										'class' =>'cleditor',
										'value' => $data->ISI_KOMENTAR);
					
										echo form_textarea($data2);
									?>
                                  </div>
                                </div> 
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Status Komentar</label>
                                  <div class="col-lg-9">
									<select name="status_komentar" id="status_komentar">
										<?php
											$check = $data->STATUS;
											
											$value = "Publish Komentar";
											$status = 1;
											$value2 = "Unpublish Komentar";
											$status2 = 0;
											
											if($check == 0){
												
										?>
											<option value="<?php echo $status;?>"><?php echo $value;?></option>
											<option value="<?php echo $status2;?>" selected><?php echo $value2; ?></option>
										<?php
											}else if($check == 1){
												?>
											<option value="<?php echo $status;?>" selected><?php echo $value;?></option>
											<option value="<?php echo $status2;?>"><?php echo $value2; ?> </option>
											<?php
											}
										?>
									</select>
                                  </div>
                                </div>		
								
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Update data</button>
                                    <button type="reset" class="btn btn-warning" onclick="goBack()">Back</button>
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
                  </div>
				  <script>
						function goBack()
						{
							window.history.back()
						}
				  </script>