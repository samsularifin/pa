                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Pelatihan
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Insert pelatihan baru </p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/pelatihan/add/',$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Nama pelatihan</label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Masukkan nama pelatihan" name="nama_pelatihan">
                                  </div>
                                </div> 
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Deskripsi Pelatihan</label>
                                  <div class="col-lg-9">
                                    <textarea class="cleditor" name="deskripsi_pelatihan"></textarea>
                                  </div>
                                </div> 								
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                    <button type="button" class="btn btn-warning" onclick="goBack()">Kembali</button>
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
				  <script>
						function goBack()
						{
							window.history.back()
						}
				  </script>