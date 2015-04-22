                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Update Gallery
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update gallery front end</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									foreach ($hasil as $data){
										$val = $data->ID_GALLERY;
											$attributes = array('class' => 'form-horizontal',
											'role' =>'form');
											echo form_open_multipart('admin/gallery/update/'.$val,$attributes);
								?>
								<div class="form-group">
									  <label class="col-lg-3 control-label">Pilih Gallery Pelatihan</label>
									  <div class="col-lg-6">
										<select class="form-control" name="pelatihan" id="pelatihan">
										<option value="0">-Silahkan Pilih Pelatihan-</option>
										<?php
											foreach($pelatihan as $data2){
										?>
										  <option value="<?php echo $data2->ID_PELATIHAN;?>"><?php echo $data2->NAMA_PELATIHAN;?></option>
										  
										  <?php
											}
										  ?>
										</select>
									  </div>
								</div>
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Gambar Gallery</label>
                                  <div class="col-lg-9">
                                    <img style="width:300px; height:200px" src="<?php echo base_url();?>/file/gambar/gallery/<?php echo $data->NAMA_GALLERY;?>"/>
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
                                    <button type="button" class="btn btn-warning" onclick="goBack()">Batal</button>
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
