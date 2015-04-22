                       <!--     <div class="span3">  
<ul class="nav nav-list">  
<li class="nav-header">List header</li>  
    <li class="active"><a href="#">Home</a></li>  
    <li><a href="#">Library</a></li>  
    <li><a href="#">Applications</a></li>  
    <li class="nav-header">Another list header</li>  
    <li><a href="#">Profile</a></li>  
    <li><a href="#">Settings</a></li>  
    <li class="divider"></li>  
  <li><a href="#">Help</a></li>  
</ul>  
</div> --> 
							<div id="left-sidebar" class="span3 sidebar">
<!-- LEFT-SIDEBAR: SIDEBAR NAVIGATION -->
								
							
                                <div class="side-nav sidebar-block" >
                                    <h2>Link Terkait</h2>
                                    <ul>
                                        <li><a href="http://www.surabaya.go.id/" target="_blank"><i style="padding-right:10px"class="icon-briefcase"></i>Pemkot Surabaya</a></li>
                                           <li><a href="http://dinkominfo.surabaya.go.id/" target="_blank"><i style="padding-right:10px"class="icon-leaf"></i>Dinkominfo Surabaya</a></li>
                                           <li><a href="right_column_about.html"><i style="padding-right:10px" class="icon-eye-open"></i>Sapa Warga Surabaya</a></li>
                                           <li><a href="http:blc.surabaya.go.id"><i style="padding-right:10px"class="icon-leaf"></i>BLC Surabaya</a></li>
                                           <li><a href="http://dispendik.surabaya.go.id/"><i style="padding-right:10px"class="icon-hdd"></i>Dispendik Surabaya</a></li>
                                           <li><a href="faqs.html"><i style="padding-right:10px"class="icon-leaf"></i>FAQs</a></li>
                                    </ul>
                                </div>
								<div class="comments-widget sidebar-block2">
                                    <h2>Berita Terakhir</h2>
									<div class="demo1">
									<?php
									if(count($berita_left)>0){
									?>
                                    <ul>
										<?php
											foreach ($berita_left as $data){
											?>
                                        <li class="clearfix" style="height:60px">
                                            <a href="<?php echo base_url();?>detail/index/<?php echo $data->ID_BERITA;?>/" ><img class="left_image" src="<?php echo base_url();?>file/gambar/berita/<?php echo $data->GAMBAR;?>"/><?php echo $data->JUDUL;?></a>
                                        </li>
										<hr/ style="margin-top:-14px">
                                        <?php
											}
										?>
                                    </ul>
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
								</div>							<hr/>
                                </div>

                            </div>
							
							
