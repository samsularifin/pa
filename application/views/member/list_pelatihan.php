
<script src="<?php echo base_url();?>media/js/jquery.js"></script>
<script src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Daftar Pelatihan yang anda ikuti</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
		<div style="margin:20px 20px 50px 20px">
		<?php
			if(count($listpel)>0){
			?>
			 <table class="display" id="tableku">
                <thead>
                  <tr style="height:40px">
                    <th> Nama Pelatihan yang dikuti</th>
                    <th> Tanggal pelatihan</th>
                    <th class="td-actions"> Waktu Pelatihan</th>
					 <th class="td-actions"> Action</th>
					  <th> Cetak Sertifikat</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					foreach($listpel as $data){
					$idr = $data->ID_REGISTRASI;
					
					$this->db->select('REGISTRASI_PELATIHAN.CETAK');
					$this->db->from('REGISTRASI_PELATIHAN');
					$this->db->where('REGISTRASI_PELATIHAN.ID_REGISTRASI', $idr);
			
					$query = $this->db->get();
			
					if($query->num_rows() > 0){
						if($query->row()->CETAK == 1){
							$GLOBALS['status'] = 1;
						}else{
							$GLOBALS['status'] = 0;
						}
					}
				?>
                  <tr style="height:60px">
                    <td style="padding-left:20px"> <?php echo $data->NAMA_PELATIHAN;?></td>
                    <td> <?php 
					$tanggal = $data->TANGGAL_PELATIHAN."-".$data->BULAN_PELATIHAN."-".$data->TAHUN_PELATIHAN;
					
					//if($tanggal < date('d-m-y')){
						//		echo '<div style="background:red;color:#fff;padding:2px 4px 2px 4px;">Date Passed</div>';
							//}else{
								echo $data->TANGGAL_PELATIHAN."-".$data->BULAN_PELATIHAN."-".$data->TAHUN_PELATIHAN;
					//}
					?></td>
					<td> <?php echo $data->WAKTU_PELATIHAN;?></td>
					 <td style="text-align:center">
					 <?php
					 if($tanggal < date('d-m-y')){
								echo '<div style="background:red;color:#fff;padding:2px 4px 2px 4px;">Date Passed</div>';
							}else{?>
					<!-- <a href="<?php echo base_url();?>member/listpelatihan/onclickup/<?php echo $data->ID_REGISTRASI;?>" class="btn btn-small btn-success"><i class="btn-icon-only  icon-pencil"> </i></a> -->
					 <a href="<?php echo base_url();?>member/listpelatihan/delete/<?php echo $data->ID_REGISTRASI;?>" class="btn btn-danger btn-small" onclick="return confirm('Anda Yakin Menghapus Data Ini ?')"><i class="btn-icon-only icon-remove"> </i></a>
					 <?php
						}
					 ?>
					 </td>
					 <td style="text-align:center">
					 <?php 
					$tanggal = $data->TANGGAL_PELATIHAN."-".$data->BULAN_PELATIHAN."-".$data->TAHUN_PELATIHAN;
					
					if($tanggal > date('d-m-y')){
								echo '<div style="background:red;color:#fff;padding:5px;">Pelatihan Belum dimulai</div>';
							}
							
							else{
								if($GLOBALS['status'] == 0 || $GLOBALS['status'] == NULL){
									echo '<div style="background:#ff8000;color:#fff;padding:5px;">Menunggu Approval</div>';
								}else if($GLOBALS['status'] == 1){
									?>
											 <a style="background:green; padding:5px; color:#fff;" href="<?php echo base_url();?>member/sertifikat/index/<?php echo $data->ID_REGISTRASI;?>" target="_blank">Cetak Sertifikat</a></td>
								<?php
								}
								
					}
					?>
					 
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
							<button type="button" class="close" data-dismiss="alert">&times;</button>Anda belum mengikuti pelatihan apapun
							</div>
						</div>';?>
						<div class="form-actions">
						<a href="<?php echo base_url();?>member/registrasi/"><button class="btn btn-primary" style="margin-right:20px">Daftar Sekarang</button></a>
						<button class="btn" onclick="goBack()">Kembali</button>
						</div>
					
					<?php
				}
			  ?>
			  </div>
			  <div style="margin-left:20px">
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