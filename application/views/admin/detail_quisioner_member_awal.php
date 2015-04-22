                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Quisioner Member
								</div>
								<div class="addplus">
									<?php
										foreach($id_pelatihan as $data){
									?>
									<p style="color:#16cbe6"> Quisioner Member </p>
									
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
										  <th>NAMA QUISIONER REPORT</th>
										  <th>JUMLAH SOAL</th>
										   <th>VIEW QUISIONER</th>
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
										  <td><?php echo $data->NAMA_QUISIONER;?></td>
										  <td><?php echo $data->JUMLAH_SOAL_QUISIONER;?> Soal</td>
										 
											<td><a href="<?php echo base_url();?>admin/report/quisioner_member_View?id_pelatihan=<?php echo $data->ID_PELATIHAN;?>&id_quisioner=<?php echo $data->ID_QUISIONER;?>">Lihat Hasil Quisioner</a></td>
										</tr>
										<?php
											}
										?>
									  </tbody>
									</table>
									<?php echo br(1);?>
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