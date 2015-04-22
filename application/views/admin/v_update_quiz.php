                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Update Quiz
								</div>
								<div class="addplus">
									
									<p style="color:#16cbe6;">Update Quiz Tutor</p>
								</div>
							<?php
								foreach($id_pel as $data2){
									foreach($hasil as $data){
							?>
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$id_quiz = $data->ID_QUIZ;
									$id_pelatihan = $data2->ID_PELATIHAN;
								
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/quizmember/update?id_quiz='.$id_quiz.'&id_pelat='.$id_pelatihan, $attributes);
									
									?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Judul Test</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan judul test" name="judul_test" value="<?php echo $data->JUDUL_QUIZ;?>">
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Waktu Test (dalam menit)</label>
                                  <div class="col-lg-6">
                                    <?php
											
											//Tanggal
											$option = array('1' =>'1 Menit',
															'2' =>'2 Menit',
															'3' =>'3 Menit',
															'4' =>'4 Menit',
															'5' =>'5 Menit',
															'6' =>'6 Menit',
															'7' =>'7 Menit',
															'8' =>'8 Menit',
															'9' =>'9 Menit',
															'10' =>'10 Menit',
															'11' =>'11 Menit',
															'12' =>'12 Menit',
															'13' =>'13 Menit',
															'14' =>'14 Menit',
															'15' =>'15 Menit'
															);
																
													echo form_dropdown('waktu', $option,'','class="form-control"');
												?>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Jumlah Soal</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan jumlah soal" name="jumlah_soal" value="<?php echo $data->JUMLAH_SOAL;?>">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Keterangan (Optional)</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan keterangan" name="keterangan" value="<?php echo $data->KETERANGAN;?>">
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
								echo form_close();?>
                                 </div>
                              </div>
                           </div>
							<?php
								}
								}
								?>
							   </div>
							</div>		
						 </div>
                  </div>