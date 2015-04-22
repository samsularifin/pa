                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								<div class="judul">
									<i class="icon-user"></i> Insert User
								</div>
								<div class="addplus">
									<p style="color:#16cbe6">User baru</p>
								</div>
									
								<?php
									$attributes = array(
										'id' =>'validForm',
										'class' =>'form-horizontal',
										'style' =>'margin-left:20px');
									echo form_open_multipart('register/insert/',$attributes);
								?>
									<h4 style="margin-left:20px">Informasi Personal</h4>
									<hr/>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">NAMA<sup>*</sup></label>
                                           <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nama" id="inputName" placeholder="Nama Lengkap" />
												<span class="help-inline">Silahkan isi nama lengkap</span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                             <label class="col-lg-3 control-label">TEMPAT DAN TANGGAL LAHIR<sup>*</sup></label>
                                            <div class="col-lg-6">
												 <input type="text" class="form-control" name="tel" id="tempatLahir" placeholder="Tempat Lahir" style="margin-right:10px" />
												
												<?php
												
												//Tanggal
												$option = array('01' =>'1',
																'02' =>'2',
																'03' =>'3',
																'04' =>'4',
																'05' =>'5',
																'06' =>'6',
																'07' =>'7',
																'08' =>'8',
																'09' =>'9',
																'10' =>'10',
																'11' =>'11',
																'12' =>'12',
																'13' =>'13',
																'14' =>'14',
																'15' =>'15',
																'16' =>'16',
																'17' =>'17',
																'18' =>'18',
																'19' =>'19',
																'20' =>'20',
																'21' =>'21',
																'22' =>'22',
																'23' =>'23',
																'24' =>'24',
																'25' =>'25',
																'26' =>'26',
																'27' =>'27',
																'28' =>'28',
																'29' =>'29',
																'30' =>'30',
																'31' =>'31'
																);
																
													echo form_dropdown('tl', $option,'','class="form-control"');
													
													//Bulan
													$option2 = array('JAN' =>'Januari',
																'FEB' =>'Februari',
																'MAR' =>'Maret',
																'APR' =>'April',
																'MEI' =>'Mei',
																'JUN' =>'Juni',
																'JUL' =>'Juli',
																'AUG' =>'Agustus',
																'SEP' =>'September',
																'OCT' =>'Oktober',
																'NOP' =>'November',
																'DEC' =>'Desember'
																);
																
													echo form_dropdown('tb', $option2,'','class="form-control"');
													
													
													$option3 = array('2008' =>'2008',
																'2007' =>'2007',
																'2006' =>'2006',
																'2005' =>'2005',
																'2004' =>'2004',
																'2003' =>'2003',
																'2002' =>'2002',
																'2001' =>'2001',
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
																'1978' =>'1978'
																);
																
													echo form_dropdown('tt', $option3,'','class="form-control"');
													?>
													<span class="help-inline">Silahkan isi tempat lahir</span>
													
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-lg-3 control-label">ALAMAT<sup>*</sup></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" />
                                                <span class="help-inline">Silahkan isi alamat</span>
                                            </div>
                                        </div>
										 <div class="form-group">
                                             <label class="col-lg-3 control-label">No Telepon<sup>*</sup></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="notel" id="notel" placeholder="No Telepon" />
                                                <span class="help-inline">Silahkan masukkan No Telepon dengan benar</span>
                                            </div>
                                        </div>
										<div class="form-group">
                                             <label class="col-lg-3 control-label">Agama<sup>*</sup></label>
                                            <div class="col-lg-6">
                                                <input type="text" name="agama" class="form-control" id="agama" placeholder="Agama" />
                                                <span class="help-inline">Silahkan isi agama</span>
                                            </div>
                                        </div>
										<div class="form-group">
                                             <label class="col-lg-3 control-label">Pekerjaan<sup>*</sup></label>
                                            <div class="col-lg-6">
                                                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" />
                                                <span class="help-inline">Silahkan isi pekerjaan</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="col-lg-3 control-label">Pilih Kategori User<sup>*</sup></label>
                                            <div class="col-lg-6">
												<select name="kategori_user" class="form-control">
													<option value="1">Member</option>
													<option value="2">Tutor</option>
												</select>
                                            </div>
                                        </div>
										<div class="form-group">
                                             <label class="col-lg-3 control-label">Upload Foto<sup>*</sup></label>
                                            <div class="col-lg-6">
												<input type="file" name="foto" style="height:35px">
                                            </div>
                                        </div>
										<hr/>
										<h4 style="margin-left:20px">User Sistem</h4>
										<hr/>
										<div class="form-group">
                                             <label class="col-lg-3 control-label">Username<sup>*</sup></label>
                                            <div class="col-lg-6">
                                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" />
                                                <span class="help-inline">Silahkan isi username</span>
                                            </div>
                                        </div>
										<div class="form-group">
                                             <label class="col-lg-3 control-label">Password<sup>*</sup></label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                                <span class="help-inline">Silahkan isi password</span>
                                            </div>
                                        </div>
										<div class="form-group">
                                             <label class="col-lg-3 control-label">Ulangi Password<sup>*</sup></label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="ulangipassword" id="ulangipassword" placeholder="Ulangi Password" />
                                                <span class="help-inline">Silahkan isi ulangi password</span>
												<span class="help-retype">Password tidak cocok</span>
                                            </div>
                                        </div>
                                        <div class="control-group form-button-offset">
                                            <input type="submit" id="submit" class="btn btn-info" style="margin-top:40px; margin-left:-3px" value="Submit" />
                                        </div>
                                   <?php
									echo form_close();
									?>
							   </div>
							 </div>