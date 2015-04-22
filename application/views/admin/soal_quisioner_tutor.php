                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Soal Quisioner
								</div>
								<div class="addplus">
									<a>Daftar Pertanyaan Quisioner Tutor</a>
								</div>
								<?php
									if(count($soal_quisioner)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 
								 <div class="lebar">
								 <ol style="margin-left:10px">
								 <?php
									foreach($soal_quisioner as $data){
										$id_soal = $data->ID_SOAL_QUISIONER;
										$id_quisioner = $data->ID_QUISIONER;
										?>
								 <li>
									<?php
										echo $data->ISI_SOAL_QUISIONER;
										
										//foreach($jawaban_quiz_tutor as $data2){
										$this->db->select('SOAL_QUISIONER.ID_SOAL_QUISIONER, SOAL_QUISIONER.ID_QUISIONER, SOAL_QUISIONER.ISI_SOAL_QUISIONER, SOAL_QUISIONER.ID_KATEGORI_USER, KATEGORI_USER.ID_KATEGORI_USER, QUISIONER.ID_QUISIONER, JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER, JAWABAN_QUISIONER.ID_SOAL_QUISIONER, JAWABAN_QUISIONER.ISI_JAWABAN_QUISIONER');
										$this->db->from('SOAL_QUISIONER');
										$this->db->where('SOAL_QUISIONER.ID_QUISIONER',$id_quisioner);
										$this->db->join('QUISIONER','SOAL_QUISIONER.ID_QUISIONER = QUISIONER.ID_QUISIONER');
										$this->db->where('SOAL_QUISIONER.ID_KATEGORI_USER = 2');
										$this->db->join('KATEGORI_USER','SOAL_QUISIONER.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
										$this->db->where('SOAL_QUISIONER.ID_SOAL_QUISIONER',$id_soal);
										$this->db->join('JAWABAN_QUISIONER',' SOAL_QUISIONER.ID_SOAL_QUISIONER = JAWABAN_QUISIONER.ID_SOAL_QUISIONER');
										$this->db->order_by('JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER','ASC');

										$query = $this->db->get();
											foreach($query->result() as $data2){
									?>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="<?php echo $data2->ID_SOAL_QUISIONER;?>" id="<?php echo $data2->ID_SOAL_QUISIONER;?>">
										<?php
										
											echo $data2->ISI_JAWABAN_QUISIONER;
										
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
										</div>';
											}
								?>
							   </div>
							</div>		
						 </div>
                  </div>