                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Update Berita
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update berita front end</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									foreach ($hasil as $data){
										$val = $data->ID_BERITA;
											$attributes = array('class' => 'form-horizontal',
											'role' =>'form');
											echo form_open_multipart('admin/berita/update/'.$val,$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Judul Berita</label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Masukkan judul berita" name="judul_berita" value="<?php echo $data->JUDUL;?>">
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Isi Berita</label>
                                  <div class="col-lg-9">
									
									<?php 
										$data2 = array('name' =>'isi_berita',
										'id' =>'isi_jadwal',
										'placeholder' =>'Masukkan text',
										'value' => $data->ISI_BERITA);
					
										echo form_textarea($data2);
									?>
                                  </div>
								 
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Gambar Berita</label>
                                  <div class="col-lg-9">
                                    <img style="width:300px; height:200px" src="<?php echo base_url();?>/file/gambar/berita/<?php echo $data->GAMBAR;?>"/>
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Upload Gambar</label>
                                  <div class="col-lg-9">
                                    <input type="file" class="modul" name="nama_gambar">
                                  </div>
                                </div> 
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Update data</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
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