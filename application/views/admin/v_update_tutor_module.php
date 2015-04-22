                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Tambah Modul Tutor
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update Module Tutor</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									foreach ($value_tutor as $data){
										$val = $data->ID_MODULE;
										$attributes = array('class' => 'form-horizontal',
											'role' =>'form');
										echo form_open_multipart('admin/tutmodule/update/'.$val,$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Kategori Pelatihan</label>
                                  <div class="col-lg-9">
                                    <select name="select_pelatihan" class="select_pelatihan">
											<?php
												foreach($pelatihan_tutor as $data2){
												?><option value="<?php echo $data2->ID_PELATIHAN?>"><?php
													echo $data2->NAMA_PELATIHAN;
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
                                    <input type="text" class="form-control" placeholder="Masukkan judul modul" name="judul_module" value="<?php echo $data->JUDUL_MODULE;?>">
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Nama File</label>
                                  <div class="col-lg-9">
                                    <div style="margin-top:8px;"><a class="module" href="<?php echo base_url();?>file/modul/tutor/<?php echo $data->NAMA_MODULE;?>"><?php echo $data->NAMA_MODULE;?></a></div>
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
                                    
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                  </div>
                                </div>
                               <?php 
							   
								echo form_close();
								}?>
                                 </div>
                              </div>
                           </div>
							
							   </div>
							</div>		
						 </div>
                  </div>