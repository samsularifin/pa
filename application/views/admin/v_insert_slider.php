                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Insert Slider
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Insert new slider Front End</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$attributes = array('class' => 'form-horizontal',
									'role' =>'form');
									echo form_open_multipart('admin/slider/add/',$attributes);
								?>
								<br/>
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Text Slider</label>
                                  <div class="col-lg-9">
                                    <textarea class="cleditor" name="text_slider"></textarea>
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Upload Gambar</label>
                                  <div class="col-lg-9">
                                    <input type="file" class="modul" name="nama_slider">
                                  </div>
                                </div> 
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Insert data</button>
                                    <button type="button" class="btn btn-warning" onclick="goBack()">Batal</button>
                                  </div>
                                </div>
                               
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
