                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Daftar Klinik
								</div>
								<div class="addplus">
									<a href="<?php echo base_url();?>admin/pelatihan/clickaddklinik/"><i class="icon-plus"></i>Add Klinik </a>
								</div>
							<?php
									if(count($klinik)>0){
								?>
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>NAMA PELATIHAN</th>
										  <th>DESKRIPSI</th>
										  <th>ACTION</th>
										</tr>
									  </thead>
									  <tbody>
										<?php
											$a = 0;
											foreach($klinik as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_PELATIHAN;?></td>
										  <td><?php echo character_limiter($data->DESKRIPSI,80);?></td>
										  <td>
											<a href="<?php echo base_url();?>admin/pelatihan/klinikclickup/<?php echo $data->ID_PELATIHAN;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button></a>
										  
											<a href="<?php echo base_url();?>admin/pelatihan/klinikdelete/<?php echo $data->ID_PELATIHAN;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
											</td>
										</tr>
										<?php
											}
										?>
									  </tbody>
									</table>
									<br/>
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
				  