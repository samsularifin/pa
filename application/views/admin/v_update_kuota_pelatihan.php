                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-qrcode"></i> Kuota Pelatihan
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Update kuota pelatihan</p>
								</div>
							<?php
								foreach($hasil as $value){
									$id_kuota = $value->ID_KUOTA_PELATIHAN;
									
							?>
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/kuota/update/'.$id_kuota,$attributes);
								?>
								<div class="form-group">
									  <label class="col-lg-3 control-label">Pilih Pelatihan</label>
									  <div class="col-lg-6">
										<select class="form-control" name="pelatihan" id="pelatihan">
										<?php
											foreach($pelatihan as $data){
										?>
										  <option value="<?php echo $data->ID_PELATIHAN;?>"
										  <?php
													if($value->ID_PELATIHAN == $data->ID_PELATIHAN){
														echo "selected='selected'";
													}?>
													><?php echo $data->NAMA_PELATIHAN;?></option>
										  
										  <?php
											}
										  ?>
										</select>
									  </div>
									</div> 
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Jumlah Kuota</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" value="<?php echo $value->JUMLAH_KUOTA;?>" name="kuota_pelatihan">
                                  </div>
                                </div>							
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-warning" onclick="goBack()">Kembali</button>
                                  </div>
                                </div>
                               <?php 
								echo form_close();?>
                                 </div>
                              </div>
                           </div>
						   <?php
								}
						   ?>
							
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