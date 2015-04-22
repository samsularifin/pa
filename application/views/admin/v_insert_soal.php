                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Tambah Soal Tes Member
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Input Soal Member</p>
								</div>
							
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/quizmember/insert_soal/'.$ambil_id,$attributes);
									for($i=0;$i<$jumlah_soal;$i++){
								?>
                              
                                 <strong>SOAL <?php echo $i+1;?>
								 <div class="form-group">
                                  <label class="col-lg-2 control-label">Tulis Pertanyaan</label>
                                  <div class="col-lg-9">
                                    <textarea class="cleditor" name="soal[<?php echo $i;?>]" required></textarea>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Masukkan Jawaban</label>
                                  <div class="col-lg-9">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="jawaban[<?php echo $i;?>]" id="optionsRadios1" value="1">
                                        Jawaban A
										
                                      </label><input type="text" class="form-control" name="inputA[<?php echo $i;?>]" required>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="jawaban[<?php echo $i;?>]" id="optionsRadios2" value="2">
                                        Jawaban B
                                      </label><input type="text" class="form-control" name="inputB[<?php echo $i;?>]" required>
                                    </div>
									<div class="radio">
                                      <label>
                                        <input type="radio" name="jawaban[<?php echo $i;?>]" id="optionsRadios1" value="3">
                                        Jawaban C
										
                                      </label><input type="text" class="form-control" name="inputC[<?php echo $i;?>]" required>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="jawaban[<?php echo $i;?>]" id="optionsRadios2" value="4">
                                        Jawaban D
                                      </label><input type="text" class="form-control" name="inputD[<?php echo $i;?>]" required>
                                    </div>
                                  </div>
                                </div>
								<hr/>
								
								<?php
								}
								?>
                               <div class="pemisah"></div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-info" style="margin:20px">Insert</button>
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