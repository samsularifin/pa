<div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-pencil"></i> Jadwal
								</div>
								<div class="addplus">
									<a>Update Jadwal</a>
								</div>
							<?php 
								foreach($hasil as $data2){
									$id_meng = $data2->ID_REGISTRASI_MENGAJAR;
									
									$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'method'=>'POST');
									echo form_open('admin/jadwal/update/'.$id_meng, $attributes);
									?>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Jenis</label>
                                  <div class="col-lg-6">
                                    <select class="form-control" name="nama_pelatihan">
                                      <?php
										foreach($pelatihan as $data){
											?>
											 <option value="<?php echo $data->ID_PELATIHAN;?>"
											 <?php
													if($data2->ID_PELATIHAN == $data->ID_PELATIHAN){
														echo "selected='selected'";
													}?>
													><?php echo $data->NAMA_PELATIHAN;?>
											 </option>
											 <?php
										}
									  ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Tanggal Pelatihan</label>
                                  <div class="col-lg-6">
                                    <div id="datetimepicker4" class="input-append">
													<input data-format="dd-MM-yyyy" type="text" class="picker" name="tanggal_pelatihan" value="<?php echo $data2->TANGGAL_MENGAJAR."-".$data2->BULAN_MENGAJAR."-".$data2->TAHUN_MENGAJAR;?>" required></input>
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
                                      <option <?php if($data2->JAM_MENGAJAR == "09:00-10:00"){
														echo "selected='selected'";
													}?> value="09:00-10:00">09:00-10:00</option>
                                      <option <?php if($data2->JAM_MENGAJAR == "10:00-11:00"){
														echo "selected='selected'";
													}?> value="10:00-11:00">10:00-11:00</option>
                                      <option <?php if($data2->JAM_MENGAJAR == "11:00-12:00"){
														echo "selected='selected'";
													}?> value="11:00-12:00">11:00-12:00</option>
                                      <option <?php if($data2->JAM_MENGAJAR == "13:00-14:00"){
														echo "selected='selected'";
													}?> value="13:00-14:00">13:00-14:00</option>
                                      <option <?php if($data2->JAM_MENGAJAR == "14:00-15:00"){
														echo "selected='selected'";
													}?> value="14:00-15:00">14:00-15:00</option>
									  <option <?php if($data2->JAM_MENGAJAR == "15:00-16:00"){
														echo "selected='selected'";
													}?> value="15:00-16:00">15:00-16:00</option>
									  <option <?php if($data2->JAM_MENGAJAR == "16:00-17:00"){
														echo "selected='selected'";
													}?> value="16:00-17:00">16:00-17:00</option>
									  <option <?php if($data2->JAM_MENGAJAR == "17:00-18:00"){
														echo "selected='selected'";
													}?> value="17:00-18:00">17:00-18:00</option>
									  <option <?php if($data2->JAM_MENGAJAR == "18:00-19:00"){
														echo "selected='selected'";
													}?> value="18:00-19:00">18:00-19:00</option>
									  <option <?php if($data2->JAM_MENGAJAR == "19:00-20:00"){
														echo "selected='selected'";
													}?> value="19:00-20:00">19:00-20:00</option>
									  <option <?php if($data2->JAM_MENGAJAR == "20:00-21:00"){
														echo "selected='selected'";
													}?> value="20:00-21:00">20:00-21:00</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <hr />
                                    <button type="submit" class="btn btn-info" name="submit">Update</button>
                                    <button type="button" class="btn btn-warning" onclick="goBack()">Back</button>
                                  </div>
                                </div>
                              <?php echo form_close();
							  }?>
							   </div>
							</div>
						</div>
				</div>
<script>
	function goBack(){
		window.history.back();
	}
</script>