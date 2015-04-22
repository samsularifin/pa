                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Tambah Berita
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Tambah Quiz Tutor</p>
								</div>
							<?php
								foreach($id_pelatihan as $data){
							?>
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$id_pel = $data->ID_PELATIHAN;
								
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/quizmember/add/'.$id_pel,$attributes);
									
									}
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Judul Test</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan judul test" name="judul_test">
                                  </div>
                                </div> 
								 <!--<div class="form-group">
                                  <label class="col-lg-3 control-label">Waktu Test (dalam menit)</label>
                                  <div class="col-lg-6">
                                    <?php
											
											//Tanggal
											$option = array(
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
															'15' =>'15 Menit',
															'16' =>'16 Menit',
															'17' =>'17 Menit',
															'18' =>'18 Menit',
															'19' =>'19 Menit',
															'20' =>'20 Menit',
															'25' =>'25 Menit',
															'30' =>'30 Menit'
															);
																
													echo form_dropdown('waktu', $option,'','class="form-control"');
												?>
                                  </div>
                                </div>-->
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Jumlah Soal</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan jumlah soal" name="jumlah_soal">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Keterangan (Optional)</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan keterangan" name="keterangan">
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