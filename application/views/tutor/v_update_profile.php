<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Update Data User</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content" >
			<?php
				foreach($user as $data){
							?>
			<hr/>
			<form class="form-horizontal" style="margin-left:40px" action="<?php echo base_url();?>tutor/profile/update/<?php echo $data->ID_USER;?>" enctype="multipart/form-data" method="POST">
				<div class="fields">
						<fieldset>
							
							<div class="control-group">											
								<label class="control-label" for="firstname">NAMA LENGKAP</label>
								<div class="controls">
									<input type="text" name="nama_lengkap" class="span4" value="<?php echo $data->NAMA_LENGKAP;?>"/>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">			
								<label class="control-label" for="firstname">TEMPAT DAN TANGGAL LAHIR</label>
								<div class="controls">
									<input type="text" name="tempat_lahir" class="span2" value="<?php echo $data->TEMPAT_LAHIR;?>"/>
									<select name="tanggal" style="width:50px;margin-left:10px">
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
									<select style="width:90px" name="bulan">
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
																
									echo form_dropdown('tahun', $option3,'','style="width:80px"');
													
									?>
								</div>
                                    
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">ALAMAT DOMISILI</label>
								<div class="controls">
									
									<?php 
										$data2 = array('name' =>'alamat',
										'rows' =>'3',
										'placeholder' =>'Alamat Lengkap',
										'class' =>'span4',
										'value' => $data->ALAMAT);
					
										echo form_textarea($data2);
									?>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">JENIS KELAMIN</label>
								<div class="controls">
									 <select name="jenis_kelamin" style="width:370px;">
										<option value="laki-laki">LAKI-LAKI</option>
										<option value="perempuan">PEREMPUAN</option>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">TELEPON</label>
								<div class="controls">
									<input type="text" name="telfon" class="span4" value="<?php echo $data->NOTEL;?>"/>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">EMAIL</label>
								<div class="controls">
									<input type="text" name="email" class="span4" value="<?php echo $data->EMAIL;?>"/>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">STATUS PEKERJAAN</label>
								<div class="controls">
									 <select name="pekerjaan" style="width:370px;">
													<option value="Pelajar">PELAJAR</option>
													<option value="Mahasiswa">MAHASISWA</option>
													<option value="Pekerja">PEKERJA</option>
													<option value="Swasta">SWASTA</option>
												</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">INSTANSI / UNIVERSITAS / SEKOLAH</label>
								<div class="controls">
									 <select name="edukasi" style="width:370px;">
													<option value="Instansi">INSTANSI</option>
													<option value="Universitas / Institut UPT dan Budaya ITS">UNIVERSITAS / INSTITUT UPT BAHASA DAN BUDAYA ITS</option>
													<option value="Sekolah">SEKOLAH</option>
												</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">FOTO</label>
								<div class="controls">
									<?php
										if($data->FOTO == NULL){
											?>
											<img style="width:300px; height:280px" src="<?php echo base_url();?>/file/gambar/user/nophoto.jpg"/>
										<?php
										}else{
									?>
                                    <img style="width:220px; height:250px" src="<?php echo base_url();?>/file/gambar/user/<?php echo $data->FOTO;?>"/>
									<?php
										}
									?>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							<div class="control-group">	
								<label class="control-label" for="firstname">Update Foto</label>
								<div class="controls">
									<input type="file" class="modul" name="nama_foto"/>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->
							
							
						<hr/>
						<?php
							}
						?>
						
						<?php echo br(2);?>
							
						</fieldset>
									
							</div>
							<div class="form-actions">
											<button type="submit" class="btn btn-primary" style="background:#269fb2">Update</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->

								</form>

		</div>
</div>
</div>
</div>