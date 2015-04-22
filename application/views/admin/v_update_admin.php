                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								<div class="judul">
									<i class="icon-user"></i> Update Admin
								</div>
								<div class="addplus">
									<p style="color:#16cbe6">Update Admin</p>
								</div>
								<h4 style="margin-left:20px">Informasi Personal</h4>
									<hr/>
								<?php
									foreach($getid as $data){
								?>
								<form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/user/admin_update/<?php echo $data->ID_USER;?>" method="POST" enctype="multipart/form-data">
								
								
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Nama Lengkap</label>
                                  <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" value="<?php echo $data->NAMA_LENGKAP;?>">
									
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Tempat & Tanggal Lahir</label>
                                  <div class="col-lg-3">
                                    <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" value="<?php echo $data->TEMPAT_LAHIR;?>">
									
                                  </div>
								  <div class="col-lg-2" style="width:90px;margin-right:-18px">
                                    <select class="form-control" name="tanggal">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
									  <option value="3">3</option>
                                      <option value="4">4</option>
									  <option value="5">5</option>
                                      <option value="6">6</option>
									  <option value="7">7</option>
                                      <option value="8">8</option>
									  <option value="9">9</option>
                                      <option value="10">10</option>
									  <option value="11">11</option>
                                      <option value="12">12</option>
									  <option value="13">13</option>
                                      <option value="14">14</option>
									  <option value="15">15</option>
                                      <option value="16">16</option>
									  <option value="17">17</option>
                                      <option value="18">18</option>
									  <option value="19">19</option>
                                      <option value="20">20</option>
									  <option value="21">21</option>
                                      <option value="22">22</option>
									  <option value="23">23</option>
                                      <option value="24">24</option>
									  <option value="25">25</option>
                                      <option value="26">26</option>
									  <option value="27">27</option>
                                      <option value="28">28</option>
									  <option value="29">29</option>
                                      <option value="30">30</option>
									  <option value="31">31</option>
                                      
                                    </select>
                                  </div>
								  <div class="col-lg-2" style="width:160px;margin-right:-18px">
                                    <select class="form-control" name="bulan">
                                      <option value="01">Januari</option>
                                      <option value="02">Februari</option>
                                      <option value="03">Maret</option>
                                      <option value="04">April</option>
									  <option value="05">Mei</option>
                                      <option value="06">Juni</option>
									  <option value="07">Juli</option>
                                      <option value="08">Agustus</option>
									  <option value="09">September</option>
                                      <option value="10">Oktober</option>
									  <option value="11">November</option>
                                      <option value="12">Desember</option>
                                    </select>
                                  </div>
								  <div class="col-lg-2" style="width:120px;">
                                    <!--<select class="form-control">
                                      <option>1998</option>
                                      <option>1999</option>
									  <option>1998</option>
                                      <option>1999</option>
									  <option>1998</option>
                                      <option>1999</option>
									  <option>1998</option>
                                      <option>1999</option>
									  <option>1998</option>
                                      <option>1999</option>
									  <option>1998</option>
                                      <option>1999</option>
									  <option>1998</option>
                                      <option>1999</option>
									  <option>1998</option>
                                      <option>1999</option>
                                      
                                    </select> -->
									<?php
										$option3 = array(
												'2000' =>'2000',
												'1999' =>'1999',
												'1998' =>'1998',
												
												'1997' =>'1997',
												'1996' =>'1996',
												'1995' =>'1995',
												'1994' =>'1994',
												'1993' =>'1993',
												'1992' =>'1992',
												'1991' =>'1991',
												'1990' =>'1990',
												'1989' =>'1989',
												'1988' =>'1988',
												'1987' =>'1987',
												'1986' =>'1986',
												'1985' =>'1985',
												'1984' =>'1984',
												'1983' =>'1983',
												'1982' =>'1982',
												'1981' =>'1981',
												'1980' =>'1980',
												'1979' =>'1979',
												'1978' =>'1978',
												'1977' =>'1977',
												'1976' =>'1976',
												'1975' =>'1975',
												'1974' =>'1974',
												'1973' =>'1973',
												'1972' =>'1972',
												'1971' =>'1971',
												'1970' =>'1970',
												'1969' =>'1969',
												'1968' =>'1968',
												'1967' =>'1967',
												);
																
									echo form_dropdown('tahun', $option3,'','class="form-control"');
													
									?>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-lg-3 control-label">Alamat</label>
                                  <div class="col-lg-6">
									<?php 
										$data2 = array('name' =>'alamat',
										'rows' =>'3',
										'placeholder' =>'Alamat Lengkap',
										'class' =>'form-control',
										'value' => $data->ALAMAT);
					
										echo form_textarea($data2);
									?>
									
                                  </div>
                                </div> 
								 <div class="form-group">
                                  <label class="col-lg-3 control-label">Foto User</label>
                                  <div class="col-lg-9">
									<?php
										if($data->FOTO == NULL){
											?>
											<img style="width:300px; height:280px" src="<?php echo base_url();?>/file/gambar/user/nophoto.jpg"/>
										<?php
										}else{
									?>
                                    <img style="width:300px; height:280px" src="<?php echo base_url();?>/file/gambar/user/<?php echo $data->FOTO;?>"/>
									<?php
										}
									?>
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Update Foto</label>
                                  <div class="col-lg-9">
                                    <input type="file" class="modul" name="nama_foto">
                                  </div>
                                </div> 
                                <hr/>
										<h4 style="margin-left:20px">User Sistem</h4>
										<hr/>
										<div class="form-group">
											<label class="col-lg-3 control-label">Username</label>
												<div class="col-lg-6">
													<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data->USERNAME;?>">
													
												</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">Password</label>
												<div class="col-lg-6">
													<input type="password" class="form-control" placeholder="Password" name="password">
													
												</div>
										</div>
										<br/>
                                        <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-10">
                                    
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-warning" onclick="goBack()">Back</button>
                                  </div>
                                </div>
                              </form>
									<?php
										}
									?>
                                        
							   </div>
							 </div>
					</div>
                  </div>
		<script>
			function goBack(){
				window.history.back();
			}
		</script>