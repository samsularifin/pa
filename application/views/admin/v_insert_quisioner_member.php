                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Tambah Quisioner
								</div>
								<div class="addplus">
									<p style="color:#16cbe6;">Tambah Quisioner Member</p>
								</div>
							<?php
								foreach($id_pelatihan as $data){
							?>
							<div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                              <?php
									$id_pel = $data->ID_PELATIHAN;
								
									$attributes = array('class' => 'form-horizontal',
										'role' =>'form');
									echo form_open('admin/quisioner/insert_quisioner_member/'.$id_pel,$attributes);
									
									}
								?>
                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Nama Quisioner</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan nama quisioner" name="nama_quisioner">
                                  </div>
                                </div>
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Jumlah Pertanyaan </label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan Jumlah Pertanyaan Quisioner" name="jumlah_soal_quisioner">
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Keterangan (Optional)</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan Keterangan Quisioner" name="keterangan">
                                  </div>
                                </div>
								 
                               <div class="pemisah"></div>
							   <hr/>
                                <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                    <button type="button" onclick="goBack()" class="btn btn-warning">Back</button>
                                  </div>
                                </div>
                               <?php 
								echo form_close();?>
                                 </div>
                              </div>
                           </div>
							
							   </div>
							</div>		
						 </div>
                  </div>
<script>
	function goBack(){
		window.history.back();
	}
</script>