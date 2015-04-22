
		<?php 
			if(count($module)>0){
		?>
					<!-- /widget-header -->
				<table class="table table-striped" style="width:700px;margin:25px 50px 40px 50px;">
                <thead>
                  <tr style="border-top:1px solid #d6d6d6">
                    <th>Judul Modul</th>
					<th>Kategori Pelatihan</th>
                    <th>View / Download</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					foreach($module as $data){
				?>
                  <tr>
                    <td><?php echo $data->JUDUL_MODULE;?></td>
					<td><?php
						foreach($nama_pelatihan as $data2){
							echo $data2->NAMA_PELATIHAN;
						}?></td>
                    <td><a href="<?php echo base_url();?>file/modul/member/<?php echo $data->NAMA_MODULE;?>" target="_blank">View / Module</a></td>
                  </tr>
				<?php
					}
				?>
                </tbody>
              </table>
		<?php
			}else{
				echo '
										<div class="row-fluid">
											<div class="span11 alert alert-error"  style="width:600px;margin-left:60px; margin-top:20px">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Belum ada module. 
											</div>
										</div>';
			}
		?>
