                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Update Pelatihan
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update pelatihan</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
								foreach ($hasil as $data){
									$val = $data->ID_PELATIHAN;
									
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/pelatihan/update/'.$val,$attributes);
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Nama Pelatihan</label>
                                  <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="masukkan nama pelatihan" name="nama_pelatihan" value="<?php echo $data->NAMA_PELATIHAN;?>">
                                  </div>
                                </div> 
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Deskripsi Pelatihan</label>
                                  <div class="col-lg-9">
                                    <?php 
										$data2 = array('name' =>'deskripsi_pelatihan',
										'id' =>'isi_jadwal',
										'style' =>'height:420px',
										'class' =>'cleditor',
										'value' => $data->DESKRIPSI);
					
										echo form_textarea($data2);
									?>
                                  </div>
                                </div> 								
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                    <button type="button" class="btn btn-warning" onclick="goBack()">Kembali</button>
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
				  <script>
						function goBack()
						{
							window.history.back()
						}
				  </script>