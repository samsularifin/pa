
<!-- BEGIN ARTICLE CONTENT AREA -->

                            <div class="span8 main-column three-columns-central">
                                <article>
									<?php
										$attributes = array('class' => 'form-horizontal', 'id' => 'myform',
										'style'=>'');
										echo form_open('action/komentar_berita',$attributes);
										
										foreach($view as $data){
											echo form_hidden('id_berita', $data->ID_BERITA);
									?>
									
									
									<hr/>
									<div class="post-item-panel">
                                        <ul>
                                            <li class="date"><p><i class="icon-calendar"></i><?php echo $data->TANGGAL;?></p></li>
                                            
                                        </ul>
                                    </div><hr/>
                                    <h2 style="margin-bottom:20px;color:#2773ae;"><?php echo $data->JUDUL;?></h2>
									
									<hr/>
                                    <img alt="" src="<?php echo base_url();?>file/gambar/berita/<?php echo $data->GAMBAR;?>" class="bordered-img" style="float:left; margin-right:25px; width:250px; height:180px"/>
                                    <p style="text-align:justify;"><?php echo $data->ISI_BERITA;?>
										<hr/>
									</P>
									<?php
										}
									?>
                                </article>
								<?php
									if(count($komentar) > 0){
										
								?>
								<div class="listkomentar">
									<?php
										$total = 0;
										foreach($komentar_count_all as $data){
										$total++;
										}
									?>
									<h2>Ada <?php echo $total;?> Komentar pada Artikel ini</h2>
									<hr/>
									<?php 
									foreach($komentar as $data){
										
									?>
									<p><span class="dropcap dropcap-black"><img src="<?php echo base_url();?>desainfront/img/komen.png"/>
									</span>
										<div class="isikomen">
											<a href="mailto:"><h3 style="float:left; margin-right:10px; margin-top:-3px"><?php echo $data->NAMA_KOMENTAR;?> | </h3></a> <p style=""><?php echo $data->TANGGAL_KOMENTAR;?></p>
											<p><?php echo $data->ISI_KOMENTAR;?>
											<hr/>
											</p>
										</div>
										<?php
											}
										?>
								</div>
								<?php
									}else{
										echo '<div class="intro4"> TIDAK ADA KOMENTAR PADA ARTIKEL INI
												</div>';
									}
								?>
								<div class="komentar">
										<hr/>
										<h1>Silahkan kirim Komentar</h1>
										<hr/>
									<div class="mainform">
										<form id="validForm" />
												<div class="control-group">
													<label class="control-label" for="inputName">NAMA<sup>*</sup></label>
													<div class="controls">
														<input type="text" class="span6" id="inputName" placeholder="Name" name="nama_komentator"/>
														<span class="help-inline">Silahkan isi nama anda</span>
													</div>
												</div>                                         
												<div class="control-group">
													<label class="control-label" for="inputEmail">EMAIL<sup>*</sup></label>
													<div class="controls">
														<input type="text" class="span6" id="inputEmail" placeholder="Email" name="email_komentator"/>
														<span class="help-inline">Email yang diinput tidak valid</span>
													</div>
												</div>                                        
												<div class="control-group">
													<label for="textarea" class="control-label">KOMENTAR<sup>*</sup></label>
													<div class="controls">
														<textarea rows="7" class="span7" name="isi_komentar" id="textarea"></textarea>
														<span class="help-inline">Silahkan tulis komentar</span>
													</div>
												</div>
												<div class="control-group">
													<div class="controls">
														<input style="margin-left:0px;" type="submit" class="btn btn-info" value="Kirim komentar" />
													</div>
												</div>
											</form> 
										</div>
								</div>
								<?php
									 echo form_close();
								?>
								
                            </div>