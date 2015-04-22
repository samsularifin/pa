                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Quisioner Tutor
								</div>
								<div class="addplus">
									<p style="color:#16cbe6"></i>Hasil Report Quisioner Tutor </p>
								</div>
								<?php
									if(count($soal_quisioner_member)>0){
								?>
						<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
								 
								 
								 <!--Mulai Statisik -->
								 <?php
									foreach($soal_quisioner_member as $data){
										$id_soal = $data->ID_SOAL_QUISIONER;
										$id_quisioner = $data->ID_QUISIONER;
										?>
								  <div class="col-md-4">
                                   
                                    <div class="awidget">
                                       <div class="awidget-head">
                                          <h3><?php echo $data->ISI_SOAL_QUISIONER;?></h3>
                                       </div>
									   <?php
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
												?>
                                       <div class="awidget-body no-table-bor">
                                          <table class="table">
											<?php
												foreach($query->result() as $data2){
													$id_jawaban = $data2->ID_JAWABAN_QUISIONER;
													
													$vars = $this->db->query("SELECT J.ISI_JAWABAN_QUISIONER, COUNT(*) as CA
													FROM HASIL_JAWABAN_QUISIONER H, jawaban_quisioner J
													WHERE H.ID_JAWABAN_QUISIONER = $id_jawaban
													AND h.id_soal_quisioner = $id_soal
													AND h.id_jawaban_quisioner = j.id_jawaban_quisioner
													AND h.id_soal_quisioner = j.id_soal_quisioner
													GROUP BY J.isi_jawaban_quisioner");
													$var = $vars->row();
													
													if(COUNT($var) == 0)
														$cnt = 0;
													else
														$cnt = $var->CA;
													
												/*	$this->db->select('HASIL_JAWABAN_QUISIONER.ID_HASIL_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_SOAL_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.TANGGAL_JAWABAN_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_USER, HASIL_JAWABAN_QUISIONER.ID_PELATIHAN, HASIL_JAWABAN_QUISIONER.ID_QUISIONER, HASIL_JAWABAN_QUISIONER.ID_KATEGORI_USER');

													$this->db->from('HASIL_JAWABAN_QUISIONER');
													$this->db->where('HASIL_JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER',$id_jawaban_quisioner);
													$this->db->where('HASIL_JAWABAN_QUISIONER.ID_SOAL_QUISIONER',$id_soal_quisioner);

													return $this->db->count_all_results(); */
												?>
                                            <tr>
                                              <td><?php echo $data2->ISI_JAWABAN_QUISIONER;?></td>
                                              <td><?php echo $cnt;?></td>
                                            </tr> 
                                            <?php
												
												}
										?>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
								 <?php
									}
								 ?>
                                   <!-- End-->
                             </div>
								
								</div>
							</div>
							<?php
							}else{
								echo '
										<div class="row-fluid">
											<div class="span12 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Data aaaKosong
											</div>
										</div>';
											}
																			
								?>
						</div>
								
							   </div>
							</div>		
						 </div>
                  </div>