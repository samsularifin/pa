
<!-- BEGIN ARTICLE CONTENT AREA -->

	<div class="span8 main-column three-columns-central">
				   <div class="portfolio-grid-1 main-block">
		             <ul id="gallery" class="thumbnails">
						<?php foreach($hasil as $data){
							
						?>
                        <!--<li class="span3 small hp-wrapper item" style="margin-bottom:60px">
						
                            <a href="<?php echo base_url();?>file/gambar/gallery/<?php echo $data->NAMA_GALLERY;?>" rel="group" class="top-link thumbnail">
								<img alt="" src="<?php echo base_url();?>file/gambar/gallery/gal_hover.png" class="hover-shade" />
								
								<img alt="" style="width: 250px; height: 160px;" src="<?php echo base_url();?>file/gambar/gallery/<?php echo $data->NAMA_GALLERY;?>" />
								
							</a>
							
                        </li>-->
						<li class="span4 small hp-wrapper web print">                        
                            <a class="fancybox" href="<?php echo base_url();?>file/gambar/gallery/<?php echo $data->NAMA_GALLERY;?>"><img alt="" src="<?php echo base_url();?>desainfront/img/220_arrow_hover.png" class="hover-shade" style="width:300px" />
                            </a>
                            <a href="#" class="top-link"><img alt="" style="width: 280px; height: 200px;" src="<?php echo base_url();?>file/gambar/gallery/<?php echo $data->NAMA_GALLERY;?>" /></a>
                            <div class="bottom-block">
                                <a href="#">Gallery Rumah Bahasa</a>
                                <?php $id_pel = $data->ID_PELATIHAN;
								if($id_pel == NULL){
									echo '<p>Gallery Umum</p>';
								}else{
								$this->db->select("ID_PELATIHAN, NAMA_PELATIHAN");
								$this->db->from("PELATIHAN");
								$this->db->where("ID_PELATIHAN",$id_pel);
								$query = $this->db->get();
									foreach($query->result() as $data2){
										?><P>Pelatihan <?php echo $data2->NAMA_PELATIHAN;?></p>
										<?php
										}
									}
									?>
                            </div>                                
                        </li>
						<?php
							
							}
						?>
                        
                    </ul>
					</div>
					<?php
						echo $links;
				?>
				
	</div>