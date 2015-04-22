                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-file"></i> Absensi Member
								</div>
								<div class="addplus">
									<a>Cetak File Absensi</a>
								</div>
							<?php 
									$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'method'=>'POST');
									echo form_open('admin/absensi/index/',$attributes);
									?>
								
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Bulan Pelatihan</label>
                                  <div class="col-lg-6">
                                    <div id="datetimepicker3" class="input-append">
													<input data-format="dd-MM-yyyy" type="text" class="picker" name="tanggal_pelatihan" required style="width:200px"></input>
													<span class="add-on">
													  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
													  </i>
													</span>
										</div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <hr />
                                    <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                    <button type="submit" class="btn btn-warning">Back</button>
                                  </div>
                                </div>
                              <?php echo form_close();?>
							   </div>
							</div>
			<br/>
							<!-- -->
										   <?php
						if(isset($_POST['submit'])){
							?><div class="col-md-12">
							   <div class="awidget">
								<?php
									if(count($cekdata)>0){
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
										  <th>Preview</th>
										 <!-- <th>Action</th> -->
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($cekdata as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_LENGKAP;?></td>
										  <td><?php echo $data->ALAMAT;?></td>
										  <td><?php echo $data->JENIS_KELAMIN;?></td>
											<td>
											<a href="<?php echo base_url();?>admin/member/detail/<?php echo $data->ID_USER;?>" target="_blank"><button type="button" class="btn btn-success btn-xs">Detail</button></a>
											</td>
											
										<!--  <td><a href="<?php echo base_url();?>admin/komentar/onclickup/<?php echo $data->ID_USER;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
										  
											<a href="<?php echo base_url();?>admin/komentar/delete/<?php echo $data->ID_USER;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a></td> -->
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
				  <?php
						}
					?>
							<!-- end -->
						 </div>
                  </div>