                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Komentar
								</div>
								<div class="addplus">
									<p style="color:#16cbe6">Daftar komentar berita
								</div>
								<?php
									if(count($komentar) > 0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped table-bordered">
									  <thead>
										<tr>
										  <th>Nama Komentator</th>
										  <th>Tanggal</th>
										  <th>Isi Komentar</th>
										  <th>Judul Berita</th>
										 <!-- <th>Status Komentar</th> -->
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											
											foreach($komentar as $data){
											
										?>
										<tr>
										  <td><?php echo $data->NAMA_KOMENTAR;?></td>
										  <td><?php echo $data->TANGGAL_KOMENTAR;?></td>
										  <td><?php echo  character_limiter($data->ISI_KOMENTAR,15);?></td>
										  <td><?php echo character_limiter($data->JUDUL,10);?></td>
										  <!--
										  <?php
											//if($data->STATUS == 0){
										  ?>
										 <!-- <td><a href="<?php echo base_url();?>admin/komentar/published/<?php echo $data->ID_KOMENTAR;?>"><button type="button" style="margin-left:10px;height:30px;" class="btn btn-warning" onclick="return confirm('Publish Komentar ini ?')">Publish</button></a></td>
										  <?php
											//}else if ($data->STATUS == 1){
											//	?><td><p class="published">Published</p></td><?php
											//}
										  ?>-->
										  <td>
											<a href="<?php echo base_url();?>admin/komentar/onclickup/<?php echo $data->ID_KOMENTAR;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
										  
											<a href="<?php echo base_url();?>admin/komentar/delete/<?php echo $data->ID_KOMENTAR;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
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