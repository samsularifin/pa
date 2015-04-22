                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-user"></i> Profile User
								</div>
								  <div class="awidget-body">
                              <div class="row">
							  <?php
								foreach($hasil as $data){
									if($data->ID_KATEGORI_USER == 2){
							  ?>
                                 <div class="col-md-3 col-sm-3">
									<?php
										if($data->FOTO == NULL){?>
											<a href="#"><img src="<?php echo base_url();?>file/gambar/user/nophoto.jpg" class="img-thumbnail img-circle img-responsive" alt="" /></a>
											<?php
										}else{
									?>
                                    <a href="#"><img src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>" class="img-thumbnail img-circle img-responsive" alt="" /></a>
									<?php
										}
									?>
                                 </div>
                                 <div class="col-md-9 col-sm-9">
                                    <table class="table">
                                    
                                       <tr>
                                          <td><strong>Nama</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NAMA_LENGKAP;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tempat Lahir</strong></td>	
                                          <td>:</td>
                                          <td><?php echo $data->TEMPAT_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tanggal Lahir</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->TANGGAL_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Alamat</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->ALAMAT;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>No Telepon</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NOTEL;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Email</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->EMAIL;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Jenis Kelamin</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->JENIS_KELAMIN;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Status / Pekerjaan</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->STATUS_PEKERJAAN;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Instansi /Universitas/ Sekolah </strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->EDUKASI;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Kategori User</strong></td>
                                          <td>:</td>
                                          <td><?php 
										  $ktegori = "";
										  if($data->ID_KATEGORI_USER == 1){
											$kategori = "Member";
										  }else if($data->ID_KATEGORI_USER == 2){
											$kategori = "Tutor";
										  }else if($data->ID_KATEGORI_USER == 3){
											$kategori = "Admin";
										  }
										  echo $kategori?></td>
                                       </tr>
                                    </table>
                                 </div>
								 <?php
									}else{
										?>
											<div class="col-md-3 col-sm-3">
									<?php
										if($data->FOTO == NULL){?>
											<a href="#"><img src="<?php echo base_url();?>file/gambar/user/nophoto.jpg" class="img-thumbnail img-circle img-responsive" alt="" /></a>
											<?php
										}else{
									?>
                                    <a href="#"><img src="<?php echo base_url();?>file/gambar/user/<?php echo $data->FOTO;?>" class="img-thumbnail img-circle img-responsive" alt="" /></a>
									<?php
										}
									?>
                                 </div>
                                 <div class="col-md-9 col-sm-9">
                                    <table class="table">
										<tr>
                                          <td><strong>No Identitas</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NMOR_IDENTITAS;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Nama</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NAMA_LENGKAP;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tempat Lahir</strong></td>	
                                          <td>:</td>
                                          <td><?php echo $data->TEMPAT_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Tanggal Lahir</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->TANGGAL_LAHIR;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>Alamat</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->ALAMAT;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Agama</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->AGAMA;?></td>
                                       </tr>
                                       <tr>
                                          <td><strong>No Telepon</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->NOTEL;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Email</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->EMAIL;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Jenis Kelamin</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->JENIS_KELAMIN;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Status / Pekerjaan</strong></td>
                                          <td>:</td>
                                          <td><?php echo $data->STATUS_PEKERJAAN;?></td>
                                       </tr>
									   <tr>
                                          <td><strong>Kategori User</strong></td>
                                          <td>:</td>
                                          <td><?php 
										  $ktegori = "";
										  if($data->ID_KATEGORI_USER == 1){
											$kategori = "Member";
										  }else if($data->ID_KATEGORI_USER == 2){
											$kategori = "Tutor";
										  }else if($data->ID_KATEGORI_USER == 3){
											$kategori = "Admin";
										  }
										  echo $kategori?></td>
                                       </tr>
                                    </table>
                                 </div>
										<?php
									}
								 }
								 ?>
								
                              </div>
                           </div>
						   <hr/>
						   <?php
							foreach($chart as $data){
								$count[] =  (int)$data->TOTAL;
								$nama_pelatihan[] = $data->NAMA_PELATIHAN;
							}
						   ?>
						   
						    <div id="chart"></div>
							   </div>
							</div>		
						 </div>
                  </div>
				  
<script type="text/javascript" src="<?php echo base_url('/assets/jquery-1.7.2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/exporting.js'); ?>"></script>

				  <script type="text/javascript">
jQuery(function(){
	new Highcharts.Chart({
		chart: {
			renderTo: 'chart',
			type: 'line',
		},
		title: {
			text: 'Chart Pendaftaran',
			x: -20
		},
		subtitle: {
			text: 'RUMAH BAHASA SURABAYA',
			x: -20
		},
		xAxis: {
			categories: <?php echo json_encode($nama_pelatihan);?>
		},
		yAxis: {
			title: {
				text: 'Jumlah Pendaftaran'
			}
		},
		series: [{
			name: 'Jumlah ikut pelatihan',
			data: <?php echo json_encode($count); ?>
		}],
		exporting: { enabled: false }
	});
}); 
</script>
