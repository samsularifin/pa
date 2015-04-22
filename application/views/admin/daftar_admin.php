                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-user"></i> Admin
								</div>
								<div class="addplus">
									<a href="<?php echo base_url();?>admin/user/adminadd/"><i class="icon-plus"></i>Tambah Admin</a>
								</div>
								<?php
									if(count($admin)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>Nama Lengkap</th>
										  <th>Alamat</th>
										  <th>Foto</th>
										  <th>Username</th>
										  <th>Preview</th>
										   <th>Action</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($admin as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_LENGKAP;?></td>
										  <td><?php echo $data->ALAMAT;?></td>
										  <td>
										  <?php
											if($data->FOTO == NULL){
												?>
												<img  style="width:75px; height:80px"src="<?php echo base_url();?>file/gambar/user/nophoto.jpg"/></td>
											<?php
											}else{?>
											<img  style="width:75px; height:80px"src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>"/></td>
											<?php
											}
										  ?>
										  <td><?php echo $data->USERNAME;?></td>
										  <td>
											<a href="<?php echo base_url();?>admin/reguser/admin_detail/<?php echo $data->ID_USER;?>" target="_blank"><button type="button" class="btn btn-xs btn-success">Detail</button></a>
											</td>
											 <td>
											<a href="<?php echo base_url();?>admin/user/admin_clickup/<?php echo $data->ID_USER;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
										  
											<a href="<?php echo base_url();?>admin/user/admin_delete/<?php echo $data->ID_USER;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
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