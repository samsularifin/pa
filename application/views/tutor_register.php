
<!-- BEGIN ARTICLE CONTENT AREA -->

	<div class="span8 main-column three-columns-central">
		<h2 style="color:#2773ae">HALAMAN REGISTRASI PENGAJAR RUMAH BAHASA </h2>
									<hr/>
									<h4 style="color:#2773ae">Informasi Personal</h4>
									<hr/>
								<?php
									$attributes = array(
										'id' =>'validForm');
									echo form_open_multipart('register/inserttutor/',$attributes);
								?>
                                        <div class="control-group">
                                            <label class="control-label" for="inputName">NAMA<sup>*</sup></label>
                                            <div class="controls">
                                                <input type="text" class="span5" name="nama" id="inputName" placeholder="Nama Lengkap" />
												<span class="help-inline">Silahkan isi nama lengkap</span>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="inputEmail">TEMPAT DAN TANGGAL LAHIR<sup>*</sup></label>
                                            <div class="controls">
												 <input type="text" class="input-xsmall" name="tel" id="tempatLahir" placeholder="Tempat Lahir" style="margin-right:10px" />
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
																
													echo form_dropdown('tl', $option,'','class="span1"');
													
													//Bulan
													$option2 = array('JAN' =>'Januari',
																'FEB' =>'Februari',
																'MAR' =>'Maret',
																'APR' =>'April',
																'MAY' =>'Mei',
																'JUN' =>'Juni',
																'JUL' =>'Juli',
																'AUG' =>'Agustus',
																'SEP' =>'September',
																'OCT' =>'Oktober',
																'NOV' =>'November',
																'DEC' =>'Desember'
																);
																
													echo form_dropdown('tb', $option2,'','class="span2"');
													
													
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
																
													echo form_dropdown('tt', $option3,'','class="span2"');
													?>
													<span class="help-inline">Silahkan isi tempat lahir</span>
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="inputEmail">ALAMAT DOMISILI<sup>*</sup></label>
                                            <div class="controls">
                                                <textarea class="span5" name="alamat" id="alamat" placeholder="Alamat" ></textarea>
                                                <span class="help-inline">Silahkan isi alamat</span>
                                            </div>
                                        </div>
										 <div class="control-group">
                                            <label class="control-label" for="inputEmail">TELEPON<sup>*</sup></label>
                                            <div class="controls">
                                                <input type="text" class="span5" name="notel" id="notel" placeholder="No Telepon" />
                                                <span class="help-inline">Silahkan masukkan No Telepon dengan benar</span>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="inputEmail">EMAIL<sup>*</sup></label>
                                            <div class="controls">
                                                <input type="text" name="email" class="span5" id="agama" placeholder="Email" />
                                                <span class="help-inline">Silahkan isi email</span>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="inputEmail">JENIS KELAMIN<sup>*</sup></label>
                                            <div class="controls">
                                                <input type="radio" name="gender" id="gender" value="laki-laki" checked class="span1">Laki-laki
												<input type="radio" name="gender" id="gender" value="perempuan" class="span1">Perempuan
                                                <span class="help-inline">Silahkan isi gender</span>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="inputEmail">STATUS / PEKERJAAN<sup>*</sup></label>
                                            <div class="controls">
                                                <select name="pekerjaan" style="width:380px;">
													<option value="Pelajar">PELAJAR</option>
													<option value="Mahasiswa">MAHASISWA</option>
													<option value="Pekerja">PEKERJA</option>
													<option value="Swasta">SWASTA</option>
													<option value="Lain-lain">LAIN-LAIN</option>
												</select>
                                                <span class="help-inline">Silahkan isi pekerjaan</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="textarea" class="control-label">INSTANSI / UNIVERSITAS / SEKOLAH<sup>*</sup></label>
                                            <div class="controls">
												<select name="edukasi" style="width:380px;">
													<option value="Instansi">INSTANSI</option>
													<option value="Universitas / Institut UPT dan Budaya ITS">UNIVERSITAS / INSTITUT UPT BAHASA DAN BUDAYA ITS</option>
													<option value="Sekolah">SEKOLAH</option>
													<option value="lain-lain">LAIN-LAIN</option>
												</select>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label for="textarea" class="control-label">Upload Foto<sup>*</sup></label>
                                            <div class="controls">
												<input type="file" name="foto">
                                            </div>
                                        </div>
										<hr/>
										<h4 style="color:#2773ae">User Sistem</h4>
										<hr/>
										<div class="control-group">
                                            <label class="control-label" for="inputEmail">Username<sup>*</sup></label>
                                            <div class="controls">
                                                <input type="text" name="username" class="span5" id="username" placeholder="Username" />
                                                <span class="help-inline">Silahkan isi username</span>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="inputEmail">Password<sup>*</sup></label>
                                            <div class="controls">
                                                <input type="password" class="span5" name="password" id="password" placeholder="Password" />
                                                <span class="help-inline">Silahkan isi password</span>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="inputEmail">Ulangi Password<sup>*</sup></label>
                                            <div class="controls">
                                                <input type="password" class="span5" name="ulangipassword" id="ulangipassword" placeholder="Ulangi Password" />
                                                <span class="help-inline">Silahkan isi ulangi password</span>
												<span class="help-retype">Password tidak cocok</span>
                                            </div>
                                        </div>
                                        <div class="control-group form-button-offset">
                                            <input type="submit" id="submit" class="btn btn-info" style="margin-top:40px; margin-left:-3px" value="Daftar" />
                                        </div>
                                   <?php
									echo form_close();
									?>
	</div>