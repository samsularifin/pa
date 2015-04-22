<script src="<?php echo base_url();?>media/js/jquery.js"></script>
<script src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Daftar Pelatihan yang anda ikuti</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content" style="margin-bottom:100px">
		<div style="margin:20px 20px 50px 20px">
		<?php
			if(count($listmeng)>0){
			?>
			 <table class="display" id="tableku">
                <thead>
                  <tr style="height:40px;">
                    <th> Nama Pelatihan yang diajar</th>
                    <th>Tanggal Mengajar</th>
                    <th class="td-actions"> Waktu Mengajar</th>
					 <th class="td-actions"> Action</th>
					 <th>Status</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					foreach($listmeng as $data){
				?>
                  <tr style="height:60px;text-align:center">
                    <td style="padding-left:20px"> <?php echo $data->NAMA_PELATIHAN;?></td>
                    <td>
						<?php
							$tanggal = $data->TANGGAL_MENGAJAR."-". $data->BULAN_MENGAJAR."-". $data->TAHUN_MENGAJAR;
							
							if($tanggal < date('d-m-y')){
								echo '<div style="background:red;color:#fff;padding:7px;">Passed</div>';
							}else{
								echo $data->TANGGAL_MENGAJAR."-". $data->BULAN_MENGAJAR."-". $data->TAHUN_MENGAJAR;
							}
						?>
						
						</td>
					<td> <?php echo $data->JAM_MENGAJAR;?></td>
					 <td class="td-actions">
						<?php
							if($data->VALIDASI == 1){
								echo '<div style="color:#269fb2; background:#269fb2; padding:5px; color:#fff">Cannot Delete</div>';
							}else{ ?>
						 <a href="<?php echo base_url();?>tutor/listmengajar/delete/<?php echo $data->ID_REGISTRASI_MENGAJAR;?>" class="btn btn-danger btn-small" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><i class="btn-icon-only icon-remove"> </i></a>
						 <?php
							}
						 ?>
					 </td>
					 <td><?php
						if($data->VALIDASI == 1){
							echo '<div style="background:green;color:#fff;padding:5px">Confirmed</div>';
						}else{
							echo '<div style="background:#f0ad4e;color:#fff;padding:5px">Stand Bye</div>';
						}
					 ?>
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
							<div class="span11 alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>Anda belum mendaftar untuk mengajar pelatihan. Atau admin belum approval registrasi anda
							</div>
						</div>';?>
						<div class="form-actions">
						<a href="<?php echo base_url();?>tutor/registrasin/"><button class="btn btn-primary" style="margin-right:20px">Daftar Sekarang</button></a>
						<button class="btn" onclick="goBack()">Kembali</button>
						</div>
					
					<?php
				}
			  ?>
			  </div>
			  <div style="margin-left:20px;">
				<?php
					echo $links;
				?>
				</div>
		</div>
		
</div>
<script type="text/javascript">
		 $(document).ready(function() {
			$('#tableku').dataTable({
				ordering:true,
				paging:false,
				searching: false,
				"bInfo" : false
				
			});
		} );
		function goBack()
		{
			window.history.back()
		}
</script>