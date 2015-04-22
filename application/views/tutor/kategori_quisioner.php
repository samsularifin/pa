<div class="widget">
	
		<div class="widget-header"> <i class="icon-bookmark"></i>
					  <h3>Quisioner Member</h3>
					</div>
					<!-- /widget-header -->
						<div class="widget-content">
				<?php
					if(count($kategori_quisioner)>0){
						$GLOBALS['status'] = "";
					?>
				<table class="table table-striped" style="width:780px;margin:15px 20px 40px 20px;">
                <thead>
                  <tr style="border-top:1px solid #d6d6d6;">
                    <th style="padding-left:20px">No</th>
					<th>Nama Quisioner</th>
                    <th>Keterangan</th>
					<th>Action</th>
					<th>Status</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$i=0;
					foreach($kategori_quisioner as $data){
						$i++;
				?>
                  <tr>
                    <td style="padding-left:20px"><?php echo $i;?></td>
					<td><?php echo $data->NAMA_QUISIONER;?></td>
                    <td><?php echo $data->KETERANGAN;?></td>
					<td>
						<?php if(count($cekambilquisioner) > 0){
							echo "<div style='background:green; color:#fff;padding:5px'>Quisioner sudah diisi</div>";
							}else{
						?>
							<a href="<?php echo base_url();?>tutor/quisioner/isi_quisioner/<?php echo $data->ID_QUISIONER;?>">Isi Quisioner</a></td>
							<?php
								}
							?>
					<td>
						<?php if(count($cekambilquisioner) > 0){
								echo '<div style="color:#D8000C; text-decoration: blink;">Sudah isi quisioner</div>';
							}else{
								echo '<div style="color:#4F8A10">Belum ambil quisioner</div>';
							}?>
					</td>
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
						<div class="span12 alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>Data Quisioner Kosong
						</div>
					</div>
					<div class="form-actions"> 
						<button class="btn" onclick="goBack()">Kembali</button>
						</div> ';
						}
			  ?>
		</div>
</div>
<script type="text/javascript">
	function goBack(){
		window.history.back();
	}
</script>