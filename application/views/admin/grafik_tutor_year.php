                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-signal"></i> Grafik Pendaftar
								</div>
								<div class="addplus">
									<a>Grafik Pendaftar Tutor</a>
									
							   </div>
							   <div class="awidget-body">
                             
								 <?php
								 //print_r ($bulan);
								 //exit;
							foreach($bulan as $data){
							
								$angka = $data->ID_BULAN;
								
								//exit;
								$this->db->select('COUNT(*) AS JUMLAH');
								$this->db->from('REGISTRASI_MENGAJAR');
								$this->db->where("BULAN_MENGAJAR = '$angka'");
							
								/*
								$query = $this->db->query("SELECT COUNT(*) AS TOTAL FROM REGISTRASI_PELATIHAN WHERE
								BULAN_PELATIHAN = '$angka'");
								*/
								$row = $this->db->count_all_results();
								
								
								if($row == 0){
									$getambil[] = 0;
								}else{
									$getambil[] = $row;
								}
								
								/*foreach($query->result() as $data2){
									$ambil = $data2->TOTAL;
									
									if($ambil == 0){
										$getambil[] = 0;
									}else{
										$getambil[] = $data2->TOTAL;
									}
								}*/
								
								
								$nama_pelatihan[] = $data->NAMA_BULAN;
								//$getDate[] = $ambil;
								
								}
						   ?>
						   
						    <div id="chart"></div>
							   </div>
							</div>
			<br/>
							<!-- -->
					
							</div>		
						 </div>
                  </div>
				 	<!-- end -->
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
			text: 'Chart Pendaftar Tutor Per tahun',
			x: -20
		},
		subtitle: {
			text: 'RUMAH BAHASA SURABAYA',
			x: -20
		},
		xAxis: {
			categories: <?php echo json_encode($nama_pelatihan); ?>
		},
		yAxis: {
			title: {
				text: 'Jumlah Pendaftaran'
			}
		},
		series: [{
			name: 'Jumlah Pendaftar',
			data: <?php echo json_encode($getambil); ?>
		}],
		exporting: { enabled: false }
	});
}); 
</script>
<script>
	function goBack(){
		window.history.back();
	}
</script>