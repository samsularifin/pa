                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Update Slider
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update slider Front End</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									foreach ($hasil as $data){
										$val = $data->ID_SLIDER;
											$attributes = array('class' => 'form-horizontal',
											'id' =>'myForm',
											'role' =>'form');
											echo form_open_multipart('admin/slider/update/'.$val,$attributes);
								?>
								<br/>
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Text Slider</label>
								  <input type="hidden" name="myOrderString" id="myOrderString">
                                  <div class="col-lg-9">
									<?php 
										$data2 = array('name' =>'text_slider',
										'id' =>'text_slider',
										'class' =>'cleditor',
										'value' => $data->JUDUL_SLIDER_SATU);
					
										echo form_textarea($data2);
									?>
                                  </div>
                                </div> 
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Gambar Slider</label>
                                  <div class="col-lg-9">
                                    <img style="width:550px; height:250px" src="<?php echo base_url();?>/file/gambar/slider/<?php echo $data->NAMA_SLIDER;?>"/>
                                  </div>
                                </div>
								<br/>
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Upload Gambar</label>
                                  <div class="col-lg-9">
                                    <input type="file" class="modul" name="nama_slider">
									<div style="color:red">*Note : Kosongkan upload gambar jika gambar tidak ingin diupdate. </div>
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
