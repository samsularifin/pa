                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-user"></i> Member
								</div>
								<div class="addplus">
									<a>User Member</a>
								</div>
							<?php 
									$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'method'=>'POST');
									echo form_open('admin/user/member/',$attributes);
									?>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Jenis</label>
                                  <div class="col-lg-6">
                                    <select class="form-control" name="nama_pelatihan">
										<option value="">- Semua Jenis -</option>
                                      <?php
										foreach($pelatihan as $data){
											?>
											 <option value="<?php echo $data->ID_PELATIHAN;?>"><?php echo $data->NAMA_PELATIHAN;?></option>
											 <?php
										}
									  ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Tanggal Pelatihan</label>
                                  <div class="col-lg-6">
                                    <div id="datetimepicker4" class="input-append">
													<input data-format="dd-MM-yyyy" type="text" class="picker" name="tanggal_pelatihan" required></input>
													<span class="add-on">
													  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
													  </i>
													</span>
										</div>
                                  </div>
                                </div>

                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Jam Pelatihan</label>
                                  <div class="col-lg-6">
                                    <select class="form-control" id="waktu_pel" name="waktu_pel">
									  <option value="">- Semua Waktu -</option>
                                      <option value="09:00-10:00">09:00-10:00</option>
                                      <option value="10:00-11:00">10:00-11:00</option>
                                      <option value="11:00-12:00">11:00-12:00</option>
                                      <option value="13:00-14:00">13:00-14:00</option>
                                      <option value="14:00-15:00">14:00-15:00</option>
									  <option value="15:00-16:00">15:00-16:00</option>
									  <option value="16:00-17:00">16:00-17:00</option>
									  <option value="17:00-18:00">17:00-18:00</option>
									  <option value="18:00-19:00">18:00-19:00</option>
									  <option value="19:00-20:00">19:00-20:00</option>
									  <option value="20:00-21:00">20:00-21:00</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <hr />
                                    <button type="submit" class="btn btn-info" name="submit">Tampilkan</button>
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
									if(count($member)>0){
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
										  <th>Jenis Kelamin</th>
										  <th>Preview</th>
										 <th>Sertifikat</th> 
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($member as $data){
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
											<td>
											<?php
												if($data->CETAK == 0 || $data->CETAK == NULL){
											?>
											<a href="<?php echo base_url();?>admin/member/sertifikat/<?php echo $data->ID_REGISTRASI;?>"><button type="button" class="btn btn-xs btn-warning" onclick="return confirm('Approve Sertifikat user ini ?')">Stand By</button></a>
											<?php
												}else if($data->CETAK == 1){
													echo '<div style="background:green; padding:5px; color:#fff">Approved</div>';
												}
											?>
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