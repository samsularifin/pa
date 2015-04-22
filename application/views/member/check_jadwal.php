<script src="<?php echo base_url();?>media/js/jquery.js"></script>
<script src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
					  <h3>Halaman Check Jadwal</h3>
					</div>
					
					<!-- /widget-header -->
						<div class="widget-content">
						<?php
						if(count($check)>0){
								?>
				<br/>
				<table class="display" style="width:780px;margin:-10px 20px 40px 20px;" id="tableku">
                <thead>
                  <tr style="border-top:1px solid #d6d6d6;">
                    <th style="padding-left:20px">Nama Instruktur</th>
					<th>Tanggal Pelatihan</th>
                    <th>Jam</th>
					<th>Ambil Pelatihan</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					foreach($check as $data){
					
						$id_pel = $data->ID_PELATIHAN;
						$tanggal = $data->TANGGAL_MENGAJAR;
						$bulan = $data->BULAN_MENGAJAR;
						$tahun = $data->TAHUN_MENGAJAR;
						$waktu = $data->JAM_MENGAJAR;
						
						$date = $tanggal."-".$bulan."-".$tahun;
						//$convdate = $this->convdate($date);
						$CI =& get_instance();
						$convdate = $CI->convdate($date);
						
				?>
                  <tr style="text-align:center">
                    <td style="padding-left:20px"><?php echo $data->NAMA_LENGKAP;?></td>
					<td><?php echo $data->TANGGAL_MENGAJAR."-".$data->BULAN_MENGAJAR."-".$data->TAHUN_MENGAJAR;?></td>
                    <td><?php echo $data->JAM_MENGAJAR;?></td>
					 <td>
					 <?php
						$this->db->select("ID_USER, ID_PELATIHAN, TANGGAL_PELATIHAN, BULAN_PELATIHAN, TAHUN_PELATIHAN, WAKTU_PELATIHAN");
						$this->db->from("REGISTRASI_PELATIHAN");
						$this->db->where("ID_PELATIHAN", $id_pel);
						$this->db->where("TANGGAL_PELATIHAN", $tanggal);
						$this->db->where("BULAN_PELATIHAN", $bulan);
						$this->db->where("TAHUN_PELATIHAN", $tahun);
						$this->db->where("WAKTU_PELATIHAN", $waktu);
						$this->db->where("ID_USER", $this->session->userdata('ID_USER'));
						
						$query = $this->db->get();
						if($query->num_rows() > 0){
						echo '<div style="background:green; padding:5px;color:#fff">Sudah Ambil Pelatihan</div>';
							
						}else{
							$tanggal = $data->TANGGAL_MENGAJAR."-".$data->BULAN_MENGAJAR."-".$data->TAHUN_MENGAJAR;
							
							 if($tanggal < date('d-m-y')){
								echo '<div style="background:red;color:#fff;padding:4px;">Date Passed</div>';
							}else{?>

					 <a href="<?php echo base_url();?>member/jadwal/ambil/<?php echo $data->ID_REGISTRASI_MENGAJAR;?>" onclick="return confirm('Ikuti pelatihan ini ?')">Ikuti Pelatihan</a>
					 <?php
						}
						?>
					 </td>
					 <?php
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
								echo '<br/>
										<div class="row-fluid" style="margin-left:25px; margin-right:30px">
											<div class="span10	 alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Jadwal kosong
											</div>
										</div>';
											}
																			
								?>
		</div>
		
		
		<!-- tetap -->
		
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
