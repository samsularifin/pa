<div class="widget" >
		<?php
					if($this->session->flashdata('submit_quisioner') != ''){
							echo '
							  <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('submit_quisioner').'
							  </div>
							';
						}
			?>
		<div class="widget-header"> <i class="icon-bookmark"></i>
					  <h3>Halaman Quisioner Member</h3>
					</div>
					<!-- /widget-header -->
				
			<div class="widget-content" style="margin-bottom:150px">
				<?php
					if(count($pelatihan)>0){
				?>
				<table class="table table-striped" style="width:780px;margin:15px 20px 40px 20px;">
                <thead>
                  <tr style="border-top:1px solid #d6d6d6;">
                    <th style="padding-left:20px">No</th>
					<th>Nama Pelatihan</th>
                    <th>Tulis Quisioner</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$i=0;
					foreach($pelatihan as $data){
						$i++;
				?>
                  <tr>
                    <td style="padding-left:20px"><?php echo $i;?></td>
					<td><?php echo $data->NAMA_PELATIHAN;?></td>
                    <td><a href="<?php echo base_url();?>tutor/quisioner/lihat/<?php echo $data->ID_PELATIHAN;?>" >Lihat Quisioner</a></td>
                  </tr>
				<?php
					}
				?>
                </tbody>
              </table>
			  <?php
							}else{
								echo '
							  <div class="alert alert-error" style="margin:20px">
								<button type="button" class="close" data-dismiss="alert">&times;</button>Quisioner kosong
							  </div><br/><br/>
							';
							}
						?>
		</div>
</div>