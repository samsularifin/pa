
<!-- BEGIN ARTICLE CONTENT AREA -->

	<div class="span8 main-column three-columns-central">
					<?php
							foreach($instruktur as $data){
					?>
		                             <div class="row" style="margin:20px; text-align:justify">
							<div class="blockDtl">
							<?php
								if($data->FOTO == NULL){
									?><a href="#"><img class="foto_tutor" style="float:left; margin-right:20px; margin-top:5px;" src="<?php echo base_url();?>file/gambar/user/nophoto.jpg"></a>
									<?php
								}else{
							?>
								<a href="#"><img class="foto_tutor" style="float:left; margin-right:20px; margin-top:5px;" src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>"></a>
								<?php
									}
								?>
							 <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-striped">
									
						              <thead>
						                <tr style="border-top:1px dotted #dcdcdc">
						                  <th>NAMA LENGKAP</th>
						                  <th><?php echo $data->NAMA_LENGKAP;?></th>
						                </tr>
						              </thead>
						              <tbody>
						                <tr>
						                  <td>ALAMAT</td>
						                  <td><?php echo $data->ALAMAT;?></td>
						                  
						                </tr>
						                <tr>
						                  <td>PENDIDIKAN</td>
						                  <td><?php echo $data->EDUKASI;?></td>
						                  
						                </tr>
										
						                <tr>
						                  <td>TUTOR PELATIHAN</td>
						                  <td><?php 
										  $id_pel = $data->ID_PELATIHAN;
										  
										  $this->db->select('ID_PELATIHAN, NAMA_PELATIHAN');
										$this->db->from('PELATIHAN');
										$this->db->where('ID_PELATIHAN',$id_pel);
										
										$query = $this->db->get();
											foreach($query->result() as $data2){
												$nama = $data2->NAMA_PELATIHAN;
											}
											echo $nama;
										  ?>
										  </td>
						                </tr>
										
						              </tbody>
									  
						            </table>
									
                                </div>
								
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
							<div class="border"></div>
						</div>
                        </div>
						
		<?php
										}
									echo $links;
								?>
	</div>