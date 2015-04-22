               		
					 <div style="margin-top:-50px">
								<div style="margin:20px">
									<?php
									if($id_pelatihan == 0){
										echo '
											<div class="row-fluid">
												<div class="span11 alert alert-error"  style="width:750px; margin-top:50px">
												<button type="button" class="close" data-dismiss="alert">&times;</button>Silahkan pilih pelatihan
												</div>
											</div>';
									}else{
										foreach($id_pelatihan as $data){
									?>
									<a href="<?php echo base_url();?>admin/quisioner/onclickadd_tutor/<?php echo $data->ID_PELATIHAN;?>"><i class="icon-plus"></i>Tambah Quiz</a>
									
								</div>
								<?php
								
									if(count($detail_quisioner)>0){
								?>
								
                                    <table class="table table-striped" style="width:650px; margin:0px 30px 50px 30px">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>NAMA QUISIONER</th>
										  <th>KETERANGAN</th>
										  <th>ACTION</th>
										  <th>BUAT QUISIONER</th>
										  <th>VIEW</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($detail_quisioner as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_QUISIONER;?></td>
										  <td><?php echo $data->KETERANGAN;?></td>
										  
										  <td>
											<a href="<?php echo base_url();?>admin/quisioner/onclickup_quisioner_tutor?id_quisioner=<?php echo $data->ID_QUISIONER;?>&id_pelatihan=<?php echo $data->ID_PELATIHAN;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button></a>
											
											<a href="<?php echo base_url();?>admin/quisioner/delete_quisioner_tutor?id_quisioner=<?php echo $data->ID_QUISIONER;?>&id_pelatihan=<?php echo $data->ID_PELATIHAN;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
											</td>
											<?php
												if($data->STATUS_QUISIONER == 1){
											?>
											<td><p class="published2">Quisioner sudah dibuat</p></td>
											<?php
												}else{
												
	
											?>
											<td><a href="<?php echo base_url();?>admin/quisioner/buat_soal_quisioner_tutor?id_quisioner=<?php echo $data->ID_QUISIONER;?>&jumlah_soal=<?php echo $data->JUMLAH_SOAL_QUISIONER;?>">Buat Quisioner</a>
											</td>
											<?php
												}
											?>
											<td><a href="<?php echo base_url();?>admin/quisioner/soal_tutor/<?php echo $data->ID_QUISIONER;?>">Lihat Quisioner</a></td>
										</tr>
										<?php
											}
										?>
									  </tbody>
									</table>
									
                                
						   <?php
							}else{
								echo '
										<div class="row-fluid">
											<div class="span12 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Data Kosong
											</div><br/>
										</div>';
											}
											}
										}
								?>
							   </div>
							</div>		
						</div>
				
						 