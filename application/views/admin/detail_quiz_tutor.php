                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-file"></i> Quiz Member
								</div>
								<div class="addplus">
									<?php
										foreach($id_pelatihan as $data){
									?>
									<a href="<?php echo base_url();?>admin/quizmember/onclickadd/<?php echo $data->ID_PELATIHAN;?>"><i class="icon-plus"></i>Tambah Quiz</a>
									
								</div>
								<?php
									if(count($detail)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>JUDUL TEST</th>
										  <th>JUMLAH SOAL</th>
										  <th>ACTION</th>
										  <th>BUAT SOAL</th>
										   <th>VIEW SOAL</th>
										    <th>EDIT SOAL</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($detail as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->JUDUL_QUIZ;?></td>
										  <td><?php echo $data->JUMLAH_SOAL;?> Soal</td>
										  
										  <td>
											<a href="<?php echo base_url();?>admin/quizmember/onclickup?id_quiz=<?php echo $data->ID_QUIZ;?>&id_pelatihan=<?php echo $data->ID_PELATIHAN;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button></a>
											
											<a href="<?php echo base_url();?>admin/quizmember/delete?id_quiz=<?php echo $data->ID_QUIZ;?>&id_pelatihan=<?php echo $data->ID_PELATIHAN;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
											</td>
											<?php
												if($data->STATUS_SOAL == 1){
											?>
											<td><p class="published2">Soal sudah dibuat</p></td>
											<?php
												}else{
												
	
											?>
											<td><a href="<?php echo base_url();?>admin/quizmember/buat_soal?id_quiz=<?php echo $data->ID_QUIZ;?>&jumlah_soal=<?php echo $data->JUMLAH_SOAL;?>">Buat Soal</a>
											</td>
											<?php
												}
											?>
											<td>
											<?php
												if($data->STATUS_SOAL == 0){
											?><p class="published2">Soal belum ada</p>
												<?php
													}else{
													?>
											<a href="<?php echo base_url();?>admin/quizmember/soal/<?php echo $data->ID_QUIZ;?>">Lihat Soal</a>
												<?php
												}
											?>
											</td>
											<td>
												<?php
												if($data->STATUS_SOAL == 0){
											?><p class="published2">Soal belum ada</p>
												<?php
													}else{
														?><a href="<?php echo base_url();?>admin/quizmember/edit_soal/<?php echo $data->ID_QUIZ;?>">Edit Soal</a>
													<?php
												}
												?>
											</td>
										</tr>
										<?php
											}
										?>
									  </tbody>
									</table>
									
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
											}
								?>
							   </div>
							</div>		
						 </div>
                  </div>