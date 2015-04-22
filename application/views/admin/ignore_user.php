                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-user"></i> Ignor User
								</div>
								<div class="addplus">
									<p style="color:#16cbe6" href="<?php echo base_url();?>admin/tutmodule/onclickadd">Ignore User</p>
								</div>
								<?php
									if(count($ruser)>0){
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
										  <th>Kategori</th>
										  <th>Foto</th>
										  <th>Preview</th>
										  <th cols="2" style="text-align:center">Status</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($ruser as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_LENGKAP;?></td>
										  <td><?php echo $data->ALAMAT;?></td>
										  <td><?php if($data->ID_KATEGORI_USER == 1){
											echo 'Member';
										  }else if($data->ID_KATEGORI_USER == 2){
											echo 'Instruktur';
										  }?></td>
										  <td>
										  <?php
											if($data->FOTO == NULL){
											?>
												<img  style="width:75px; height:80px"src="<?php echo base_url();?>file/gambar/user/nophoto.jpg"/>
											<?php
											}else{
										  ?><img  style="width:75px; height:80px"src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>"/>
										  <?php
											}
										  ?>
										  </td>
											<td>
											<a href="<?php echo base_url();?>admin/reguser/detail/<?php echo $data->ID_USER;?>" target="_blank"><button type="button" class="btn btn-xs btn-success">Lihat Detail</button></a>
											</td>
											<?php
											if($data->VALIDASI == 0){
										  ?>
										  <td><a href="<?php echo base_url();?>admin/reguser/confirm/<?php echo $data->ID_USER;?>"><button type="button" class="btn btn-xs btn-warning" onclick="return confirm('Konfirmasi user ini ?')">Stand By</button></a>
										 
										  </td>
										  <?php
											}else if ($data->VALIDASI == 1){
												?><td><p class="published">Confirmed</p></td><?php
											}
										  ?>
										  <td>
											<?php
												if($data->VALIDASI==2){
													?>
													<p style="background:red;padding:7px;color:#fff">Ignored</p>
												<?php
												}else{
											?>
											 <a href="<?php echo base_url();?>admin/reguser/ignore/<?php echo $data->ID_USER;?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Konfirmasi user ini ?')">Ignore</button></a>
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
							  <div style="margin-left:10px">
							  <?php
								print $links;
							  ?>
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