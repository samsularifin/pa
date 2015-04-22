                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-user"></i> Registrasi Mengajar
								</div>
								<div class="addplus">
									<p style="color:#16cbe6" href="<?php echo base_url();?>admin/tutmodule/onclickadd">Registrasi Mengajar</p>
								</div>
								<?php
									if(count($mengajar)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>Nama Lengkap</th>
										  <th>Nama Pelatihan</th>
										  <th>Tanggal</th>
										  <th>Jam</th>
										  <th>Preview</th>
										  <th>Status</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($mengajar as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_LENGKAP;?></td>
										  <td><?php
												$nama = $this->db->query("SELECT NAMA_PELATIHAN FROM pelatihan where ID_Pelatihan =".$data->ID_PELATIHAN);
												
												foreach($nama->result() as $data2){
													echo $data2->NAMA_PELATIHAN;
													}
												?>
												</td>
										  <td><?php echo $data->TANGGAL_MENGAJAR."-".$data->BULAN_MENGAJAR."-".$data->TAHUN_MENGAJAR;?></td>
										  <td><?php
												$nama = $this->db->query("SELECT JAM_MENGAJAR FROM REGISTRASI_MENGAJAR where STATUS_MENGAJAR =1 AND VALIDASI = 0 AND ID_USER =".$data->ID_USER."AND ID_PELATIHAN =".$data->ID_PELATIHAN."AND TANGGAL_MENGAJAR =".$data->TANGGAL_MENGAJAR);
												
												foreach($nama->result() as $data3){
													echo $data3->JAM_MENGAJAR." ";
													}
												?>
										  </td>
											<td>
											<a href="<?php echo base_url();?>admin/mengajar/detail/<?php echo $data->ID_USER;?>" target="_blank"><button type="button" class="btn btn-xs btn-success">Lihat Detail</button></a>
											</td>
											
										  <td><a href="<?php echo base_url();?>admin/mengajar/confirm?id_user=<?php echo $data->ID_USER;?>&tanggal_men=<?php echo $data->TANGGAL_MENGAJAR.'-'.$data->BULAN_MENGAJAR.'-'.$data->TAHUN_MENGAJAR;?>&id_pel=<?php echo $data->ID_PELATIHAN;?>"><button type="button" class="btn btn-xs btn-warning" onclick="return confirm('Konfirmasi user ini ?')">Stand By</button></a></td>
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
								//echo $links;
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