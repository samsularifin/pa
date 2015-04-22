                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-user"></i> Profile User
								</div>
								  <div class="awidget-body">
                              <div class="row">
							  <?php
								foreach($hasil as $data){
									if($data->ID_KATEGORI_USER == 2){
							  ?>
                                 <div class="col-md-3 col-sm-3" >
									
									<?php
										if($data->FOTO == NULL){?>
											<a href="#"><img src="<?php echo base_url();?>file/gambar/user/nophoto.jpg" class="img-thumbnail img-circle img-responsive" alt="" /></a>
											<?php
										}else{
									?>
                                    <a href="#"><img src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>" class="img-thumbnail img-circle img-responsive" alt="" /></a>
									<?php
										}
									?>
                                 </div>
                                 <div class="col-md-9 col-sm-9">
                                    <table class="table">
                                    
                                       <tr>
                                          <td><strong>Nama</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NAMA_LENGKAP;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tempat Lahir</strong></td>	
                                          <td>:</td>
                                          <td><?php echo $data->TEMPAT_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tanggal Lahir</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->TANGGAL_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Alamat</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->ALAMAT;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>No Telepon</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NOTEL;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Email</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->EMAIL;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Jenis Kelamin</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->JENIS_KELAMIN;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Status / Pekerjaan</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->STATUS_PEKERJAAN;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Instansi /Universitas/ Sekolah </strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->EDUKASI;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Kategori User</strong></td>
                                          <td>:</td>
                                          <td><?php 
										  $ktegori = "";
										  if($data->ID_KATEGORI_USER == 1){
											$kategori = "Member";
										  }else if($data->ID_KATEGORI_USER == 2){
											$kategori = "Tutor";
										  }else if($data->ID_KATEGORI_USER == 3){
											$kategori = "Admin";
										  }
										  echo $kategori?></td>
                                       </tr>
                                    </table>
                                 </div>
								 <?php
									}else{
										?>
											<div class="col-md-3 col-sm-3">
									<?php
										if($data->FOTO == NULL){?>
											<a href="#"><img src="<?php echo base_url();?>file/gambar/user/nophoto.jpg" class="img-thumbnail img-circle img-responsive" alt="" /></a>
											<?php
										}else{
									?>
                                    <a href="#"><img src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>" class="img-thumbnail img-circle img-responsive" alt="" /></a>
									<?php
										}
									?>
                                 </div>
                                 <div class="col-md-9 col-sm-9">
                                    <table class="table">
										<tr>
                                          <td><strong>Nama</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NAMA_LENGKAP;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tempat Lahir</strong></td>	
                                          <td>:</td>
                                          <td><?php echo $data->TEMPAT_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tanggal Lahir</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->TANGGAL_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Alamat</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->ALAMAT;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Kategori User</strong></td>
                                          <td>:</td>
                                          <td><?php 
										  $ktegori = "";
										  if($data->ID_KATEGORI_USER == 1){
											$kategori = "Member";
										  }else if($data->ID_KATEGORI_USER == 2){
											$kategori = "Tutor";
										  }else if($data->ID_KATEGORI_USER == 3){
											$kategori = "Admin";
										  }
										  echo $kategori?></td>
                                       </tr><br/>
									  
                                    </table> <br/>
                                 </div>
										<?php
									}
								 }
								 ?>
								 
                              </div>
                           </div>
							   </div>
							</div>		
						 </div>
                  </div>