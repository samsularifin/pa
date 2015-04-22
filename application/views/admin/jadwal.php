                  <script src="<?php echo base_url();?>media/js/jquery.js"></script>
<script src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
				  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-calendar"></i> Jadwal Pelatihan
								</div>
								<div class="addplus">
									<a>Jadwal Pelatihan</a>
									<?php
									if($this->session->flashdata('update_jadwal') != ''){
													echo '
													  <div class="alert alert-success">
														<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('update_jadwal').'
													  </div>
													';
												}
									?>
								</div>
							<?php 
									$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'method'=>'POST');
									echo form_open('admin/jadwal/index/',$attributes);
									?>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Pelatihan</label>
                                  <div class="col-lg-6">
                                    <select class="form-control" name="nama_pelatihan">
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
                                  <label class="col-lg-3 control-label">Pilih Bulan</label>
                                  <div class="col-lg-6">
                                    <div id="datetimepicker3" class="input-append">
													<input data-date-format="mm-yyyy" type="text" class="picker" name="tanggal_pelatihan" required></input>
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
                                    <button type="submit" class="btn btn-info" name="submit">Tampilkan</button>
                                    <button type="button" onclick="goBack()" class="btn btn-warning">Back</button>
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
									if(count($jadwal)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped" id="tableku">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>Nama Lengkap</th>
										  <th>Tanggal Mengajar</th>
										  <th>Jam</th>
										  <th>Status</th>
										  <th>Action</th>
										 <!-- <th>Action</th> -->
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($jadwal as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php echo $data->NAMA_LENGKAP;?></td>
										  <td><?php echo $data->TANGGAL_MENGAJAR."-".$data->BULAN_MENGAJAR."-".$data->TAHUN_MENGAJAR;?></td>
										  <td><?php echo $data->JAM_MENGAJAR;?></td>
										  <td><?php 
											if($data->VALIDASI == 1){
													echo '<div style="color:#fff; background:green;padding:7px">confirmed</div>';
											}else{
												echo '<div style="color:#fff; background:#f0ad4e;padding:5px">Stand By</div>';
											}
											?></td>
											<td>
											<a href="<?php echo base_url();?>admin/jadwal/onclickup/<?php echo $data->ID_REGISTRASI_MENGAJAR;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
										  
											<a href="<?php echo base_url();?>admin/jadwal/delete/<?php echo $data->ID_REGISTRASI_MENGAJAR;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
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
											<button type="button" class="close" data-dismiss="alert">&times;</button>Data nya Kosong
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
<script type="text/javascript">
		 $(document).ready(function() {
			$('#tableku').dataTable({
				ordering:true,
				paging:false,
				searching: false,
				"bInfo" : false
				
			});
		} );
						function goBack()
						{
							window.history.back()
						}
</script>