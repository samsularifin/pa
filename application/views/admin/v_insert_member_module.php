                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Tambah Modul Member
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Upload Module Member</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open_multipart('admin/membmodule/add/',$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Kategori Pelatihan</label>
                                  <div class="col-lg-9">
                                    <select name="select_pelatihan" class="select_pelatihan">
											<?php
												foreach($pelatihan as $data){
												?><option value="<?php echo $data->ID_PELATIHAN?>"><?php
													echo $data->NAMA_PELATIHAN;
													?>
													</option>
													<?php
												}
											?>
										
									</select>
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Judul Modul</label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Masukkan judul modul" name="judul_module">
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Upload Module</label>
                                  <div class="col-lg-9">
                                    <input type="file" class="modul" name="nama_module">
                                  </div>
                                </div> 
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                  </div>
                                </div>
                               <?php 
								echo form_close();?>
                                 </div>
                              </div>
                           </div>
							
							   </div>
							</div>		
						 </div>
                  </div>