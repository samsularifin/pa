                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-eye-open"></i> Soal Quiz
								</div>
								<div class="addplus">
									<a>Update Soal Quiz</a>
								</div>
								<?php
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/quizmember/update_soal/',$attributes);
									
									if(count($soal_quiz_tutor)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 
								 <div class="lebar">
								 <ul style="margin-left:10px; list-style-type: none;">
								 <?php
									$GLOBALS['i'] = 0;
									
									foreach($soal_quiz_tutor as $data){
										
										$id_soal = $data->ID_SOAL_QUIZ;
										$id_quiz = $data->ID_QUIZ;
										?>
								 <hr/>
								 <strong >SOAL <?php echo $GLOBALS['i']+1;?></strong>
								 <hr/>
								 <li >
									
								<textarea class="cleditor" name="soal[<?php echo $GLOBALS['i'];?>]"><?php echo $data->ISI_SOAL;?></textarea>
								
								<input type="hidden" name="id_soal[<?php echo $GLOBALS['i'];?>]" value="<?php echo $data->ID_SOAL_QUIZ;?>"></input>
										<?php
										//echo $data->ISI_SOAL;
										
										//foreach($jawaban_quiz_tutor as $data2){
										$this->db->select('SOAL_QUIZ.ID_SOAL_QUIZ, SOAL_QUIZ.ID_QUIZ, SOAL_QUIZ.ISI_SOAL, SOAL_QUIZ.ID_KATEGORI_USER, KATEGORI_USER.ID_KATEGORI_USER, QUIZ.ID_QUIZ, JAWABAN_QUIZ.ID_JAWABAN_QUIZ, JAWABAN_QUIZ.ID_SOAL_QUIZ, JAWABAN_QUIZ.ISI_JAWABAN, JAWABAN_QUIZ.STATUS_JAWABAN');
										$this->db->from('SOAL_QUIZ');
										$this->db->where('SOAL_QUIZ.ID_QUIZ',$id_quiz);
										$this->db->join('QUIZ','SOAL_QUIZ.ID_QUIZ = QUIZ.ID_QUIZ');
										$this->db->where('SOAL_QUIZ.ID_KATEGORI_USER = 1');
										$this->db->join('KATEGORI_USER','SOAL_QUIZ.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
										$this->db->where('SOAL_QUIZ.ID_SOAL_QUIZ',$id_soal);
										$this->db->join('JAWABAN_QUIZ',' SOAL_QUIZ.ID_SOAL_QUIZ = JAWABAN_QUIZ.ID_SOAL_QUIZ');
										$this->db->order_by('JAWABAN_QUIZ.ID_JAWABAN_QUIZ','ASC');

										$query = $this->db->get();
										$GLOBALS['x'] = 0;
											foreach($query->result() as $data2){
											
									?>
									<input type="hidden" name="id_jawaban[<?php echo $GLOBALS['i'];?>][<?php echo $GLOBALS['x'];?>]" value="<?php echo $data2->ID_JAWABAN_QUIZ;?>"></input>
                                   
									<div class="form-group">
                                  <div class="col-lg-9">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="jawaban[<?php echo $GLOBALS['i'];?>]" 
										value="<?php echo $GLOBALS['x'];?>"
										<?php if($data2->STATUS_JAWABAN == 1) { echo "checked='checked'"; } ?>
										>
                                      </label><input type="text" class="form-control" name="jawabantext[<?php echo $GLOBALS['i'];?>][<?php echo $GLOBALS['x'];?>]" value="<?php echo $data2->ISI_JAWABAN;?>">
                                    </div>
                                  </div>
                                </div>
									</li>
									
									
									<?php
									$GLOBALS['x']++;
										}echo br(1);
										$GLOBALS['i']++;
									}
								 ?>
                                
								
								<button type="submit" class="btn btn-info" style="margin:20px 20px 20px 0px">Update</button>
								<button type="reset" class="btn btn-warning">Reset</button>
                                  
								</ul>
								
                                  </div>
								 
                              </div>
							  
                           </div>
						   <?php
							echo form_close();
							
							}else{
								echo '
										<div class="row-fluid">
											<div class="span12 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Data Kosong
											</div>
										</div><br/><br/>';
											}
								?>
							   </div>
							</div>		
						 </div>
                  </div>