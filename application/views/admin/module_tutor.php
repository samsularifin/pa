                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Module Tutor
								</div>
								<div class="addplus">
									<a href="<?php echo base_url();?>admin/tutmodule/onclickadd"><i class="icon-plus"></i>Add Module Tutor</a>
								</div>
								<?php
									if(count($module)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>Judul Module</th>
										  <th>Kategori Module</th>
										  <th>Preview</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($module as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->JUDUL_MODULE;?></td>
										  <td><?php echo $data->NAMA_PELATIHAN;?></td>
										  <td><a href="<?php echo base_url();?>file/modul/tutor/<?php echo $data->NAMA_MODULE;?>" target="_blank">View Modul</a></td>
										  <td>
											<a href="<?php echo base_url();?>admin/tutmodule/onclickup/<?php echo $data->ID_MODULE;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button></a>
										  
											<a href="<?php echo base_url();?>admin/tutmodule/delete/<?php echo $data->ID_MODULE;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
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