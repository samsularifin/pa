                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Soal Quiz
								</div>
								<div class="addplus">
									<a>Daftar Soal Quiz</a>
								</div>
								<?php
									if(count($soal_quiz_tutor)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 
								 <div class="lebar">
								 <ol style="margin-left:10px">
								 <?php
									foreach($soal_quiz_tutor as $data){
										$id_soal = $data->ID_SOAL_QUIZ;
										$id_quiz = $data->ID_QUIZ;
										?>
								 <li>
									<?php
										echo $data->ISI_SOAL;
										
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
											foreach($query->result() as $data2){
									?>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="<?php echo $data2->ID_SOAL_QUIZ;?>" id="<?php echo $data2->ID_SOAL_QUIZ;?>" value="option1"
										<?php if($data2->STATUS_JAWABAN == 1) { echo "checked='checked'"; } ?>>
										
										<?php
										
											echo $data2->ISI_JAWABAN;
										
										?>
                                      </label>
                                    </div>
									</li>
									
									<?php
										}echo br(1);
									}
								 ?>
								
								</ol>
                                  </div>
                              </div>
                           </div>
						   <?php
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