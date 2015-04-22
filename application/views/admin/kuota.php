                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
							   
								 <div class="judul">
									<i class="icon-qrcode"></i> Kuota Pelatihan
								</div>
								<div class="addplus">
									<a href="<?php echo base_url();?>admin/kuota/onclickadd"><i class="icon-plus"></i>Tambah Kuota Pelatihan </a>
								</div>
								<?php
									if($this->session->flashdata('gakada') != ''){
									echo '
									  <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('gakada').'
									  </div>
									';
								}
								if($this->session->flashdata('ada') != ''){
									echo '
									  <div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('ada').'
									  </div>
									';
								}
							  ?>
							<?php
									if(count($kuota)>0){
								?>
							<div class="awidget-body">
							
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>NAMA PELATIHAN</th>
										  <th>JUMLAH KUOTA</th>
										  <th>ACTION</th>
										</tr>
									  </thead>
									  <tbody>
										<?php
											$a = 0;
											foreach($kuota as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_PELATIHAN;?></td>
										  <td><?php echo $data->JUMLAH_KUOTA;?></td>
										  <td>
											<a href="<?php echo base_url();?>admin/kuota/onclickup/<?php echo $data->ID_KUOTA_PELATIHAN;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button></a>
										  
											<a href="<?php echo base_url();?>admin/kuota/delete/<?php echo $data->ID_KUOTA_PELATIHAN;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
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