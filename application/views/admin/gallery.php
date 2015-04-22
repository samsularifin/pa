                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Gallery
								</div>
								<div class="addplus">
									<a href="<?php echo base_url();?>admin/gallery/onclickadd"><i class="icon-plus"></i>Tambah Gallery</a>
								</div>
								<?php
									if(count($gallery)>0){
								?>
								  <div class="awidget-body">
                              <div class="row">
                                 <div class="lebar">
                             <div class="img-portfolio">
								 <div id="portfolio">  
									<?php
										foreach($gallery as $data){
									?>
									<div class="element" style="margin-right:44px; margin-left:10px">
										<a href="<?php echo base_url();?>file/gambar/gallery/<?php echo $data->NAMA_GALLERY;?>" class="prettyphoto">
											<img src="<?php echo base_url();?>file/gambar/gallery/<?php echo $data->NAMA_GALLERY;?>" alt=""/>
										</a>
										 <div class="form-actions">
										<!--<button type="submit" class="btn btn-primary">send messages</button>
										<button class="btn">Cancel</button> -->
										
										<a href="<?php echo base_url();?>admin/gallery/onclickup/<?php echo $data->ID_GALLERY;?>"><button class="btn btn-xs btn-warning"><i class="icon-pencil"></i> </button>
										  
											<a href="<?php echo base_url();?>admin/gallery/delete/<?php echo $data->ID_GALLERY;?>" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button></a>
										
										<?php 
											/*
											$data = array('name' =>'edit',
															'value' =>'Edit',
															'class' =>'btn btn-info',
															'style' =>'');
											echo form_submit($data);
											$data2 = array('name' =>'delete',
															'value' =>'Delete',
															'class'	=>'btn btn-danger',
															'style' =>'float:right',
															'onclick' =>"return confirm('Anda Yakin Menghapus Data Ini ?')");
											echo form_submit($data2); */
										?>
									  </div>
									</div>
									<?php
										}
									?>
								 </div>
								</div>
                                 </div>
                              </div>
							  <br/>
							   <div style="margin-left:10px">
							  <?php
								print $links;
							  ?>
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
								
						