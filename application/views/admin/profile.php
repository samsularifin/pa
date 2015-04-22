                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-user"></i> Profile
								</div>
								<?php
									foreach($profile as $data){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="col-md-3 col-sm-3">
                                    <a href="#"><img src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>" class="img-thumbnail img-circle img-responsive" alt="" /></a>
                                 </div>
                                 <div class="col-md-9 col-sm-9">
								 <?php echo br(1);?>
                                    <table class="table">
                                       <tr>
                                          <td><strong>Nama</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NAMA_LENGKAP;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>TTL</strong></td>	
                                          <td>:</td>
                                          <td><?php echo $data->TEMPAT_LAHIR.", ".$data->TANGGAL_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Alamat</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->ALAMAT;?></td>
                                       </tr>
                                       
                                    </table>
									 <?php echo br(3);?>
                                 </div>
                              </div>
                           </div>
						   <?php
							}
						   ?>
							   </div>
							</div>		
						 </div>
                  </div>