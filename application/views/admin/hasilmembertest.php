                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Test Member
								</div>
								<div class="addplus">
									<a>Hasil Test Member</a>
								</div>
								<?php
									if(count($pelatihan)>0){
								?>
								<div class="awidget-body">
								<form class="form-horizontal" role="form" style="margin-left:20px" method="POST" action="<?php echo base_url();?>admin/report/testmember/">
									<div class="form-group">
									  <label class="col-lg-2 control-label">Pilih Pelatihan</label>
									  <div class="col-lg-7">
										<select class="form-control" name="pelatihan" id="pelatihan" >
										<option value="0">Silahkan Pilih Pelatihan</option>
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
									  <label class="col-lg-2 control-label">Tanggal Test</label>
									  <div class="col-lg-7">
										   <div id="datetimepicker1" class="input-append">
											 <input data-format="dd-MM-yyyy" class="picker"  name="tanggal_pelatihan" required>
											 <span class="add-on">
											   &nbsp;<i data-time-icon="icon-time" data-date-icon="icon-calendar">
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
								</form>
								<hr/>
								
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
							</div><br/>	
								<?php
						if(isset($_POST['submit'])){
							?><div class="col-md-12">
							   <div class="awidget">
								<?php
									if(count($tampilkan)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                                    <table class="table table-striped">
									  <thead>
										<tr>
										  <th>No</th>
										  <th>Nama Peserta</th>
										  <th>Nama Quiz</th>
										  <th>Jumlah Soal</th>
										  <th>Jumlah Benar</th>
										  <th>Jumlah Salah</th>
										  <th>Nilai</th>
										  <th>Detail User</th>
										</tr>
									  </thead>
									  <tbody>
									  <?php
											$a = 0;
											foreach($tampilkan as $data){
											$a++;
										?>
										<tr>
										  <td><?php echo $a;?></td>
										  <td><?php 
										  
										  $id_user = $data->ID_USER;
										  $id_quiz = $data->ID_QUIZ;
										  
											$this->db->select('*');
											$this->db->from('TBL_USER');
											$this->db->where('ID_USER',$id_user);
										
											$query = $this->db->get();
												foreach($query->result() as $data2){
													$nama = $data2->NAMA_LENGKAP;
												}echo $nama;
										  ?>
										  </td>
										   <td><?php 
										   $this->db->select('*');
											$this->db->from('QUIZ');
											$this->db->where('ID_QUIZ', $id_quiz);
										
											$query = $this->db->get();
												foreach($query->result() as $data3){
													$quiz = $data3->JUDUL_QUIZ;
												}echo $quiz;
												
										   ?></td>
										   
										  <td><?php echo $data->JUMLAH_SOAL;?></td>
										  <td><?php echo $data->JUMLAH_BENAR;?></td>
										  <td><?php echo $data->JUMLAH_SALAH;?></td>
										  <td><?php echo $data->NILAI_AKHIR;?></td>
										  <td><a href="<?php echo base_url();?>admin/reguser/detail/<?php echo $data->ID_USER;?>" target="_blank"><button type="button" class="btn btn-success btn-xs">Detail User</button></a></td>
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
						 </div>
                  </div>
<script>
	function goBack(){
		window.history.back();
	}
</script>
				  
					
				  
