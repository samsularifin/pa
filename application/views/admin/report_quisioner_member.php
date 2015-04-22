                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Report Quisioner
								</div>
								<div class="addplus">
									<p style="color:#16cbe6"></i>Report Quisioner Member </p>
								</div>
							<?php
									if(count($pelatihan)>0){
								?>
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped" >
									  <thead>
										<tr>
										  <th>No</th>
										  <th>NAMA PELATIHAN</th>
										  <th>VIEW DETAIL</th>
										</tr>
									  </thead>
									  <tbody>
										<?php
											$a = 0;
											foreach($pelatihan as $data){
											$a++;
										?>
										<tr style="height:42px">
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_PELATIHAN;?></td>
										  <td>
											<a href="<?php echo base_url();?>admin/report/view_member_awal/<?php echo $data->ID_PELATIHAN;?>">Lihat Quisioner</a>
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
								?>
							   </div>
							</div>		
						 </div>
                  </div>