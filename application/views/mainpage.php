
<!-- BEGIN ARTICLE CONTENT AREA -->

                            <div class="span8 main-column three-columns-central">
								<?php
							if(count($berita)>0){
								
									foreach ($berita as $data){
									
								?>
								<div class="post-item-panel">
                                        <ul>
                                            <li class="date"><p><i class="icon-calendar"></i><?php echo $data->TANGGAL;?></p></li>
                                            <li><p><i class="icon-user"></i>Oleh <?php echo $data->NAMA_KATEGORI_USER;?></p></li>
                                        </ul>
                                    </div>
								<div class="post-item" style="margin-bottom:45px">
									<hr/>
                                    <h2 style="margin-top:20px; margin-bottom:20px; color:#2773ae;"><?php echo $data->JUDUL;?></h2>
									<hr/>
                                    <img alt="" src="<?php echo base_url();?>file/gambar/berita/<?php echo $data->GAMBAR;?>" style="float:left; width:200px;  border: 1px solid #DDDDDD; margin-right:20px;"/>
                                    <p class="post-description" style="text-align:justify"><?php echo  character_limiter($data->ISI_BERITA,220);?></p><br />
                                    <ul class="pager">
                                            <li class="previous"><a href="<?php echo base_url();?>detail/index/<?php echo $data->ID_BERITA;?>/">Baca Selengkapnya</a></li>
                                        </ul>
										<hr/>
                                </div>
								<?php
									}
									echo $links;
									
							}else{
								echo '
										<div class="row-fluid">
											<div class="span12 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Berita Kosong
											</div>
										</div>';
											}
							?>
                            </div>
		