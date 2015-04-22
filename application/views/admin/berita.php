                  <div class="mainy">
				  
						 <div class="row">
						 <?php
						if($this->session->flashdata('size') != ''){
											echo '
											  <div class="alert alert-error">
												<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('size').'
											  </div>
											';
										}
							?>
							<div class="col-md-12">
							
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Berita
								</div>
								<div class="addplus">
									<a href="<?php echo base_url();?>admin/berita/onclickadd"><i class="icon-plus"></i>Tambah Berita</a>
								</div>
								<?php
									if(count($berita)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped table-bordered">
									  <thead>
										<tr>
										  <th>Judul Berita</th>
										  <th>Tanggal</th>
										  <th>Isi</th>
										  <th>Gambar</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											
											foreach($berita as $data){
											
										?>
										<tr>
										  <td><?php echo character_limiter($data->JUDUL,20);?></td>
										  <td><?php echo $data->TANGGAL;?></td>
										  <td><?php echo  character_limiter($data->ISI_BERITA,30);?></td>
										  <td><img src="<?php echo base_url();?>file/gambar/berita/<?php echo $data->GAMBAR;?>" style="width:60px;height:38px"></td>
										  <td>
											<a href="<?php echo base_url();?>admin/berita/onclickup/<?php echo $data->ID_BERITA;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
										  
											<a href="<?php echo base_url();?>admin/berita/delete/<?php echo $data->ID_BERITA;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
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