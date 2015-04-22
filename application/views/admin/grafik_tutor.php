                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-signal"></i> Grafik Pendaftar
								</div>
								<div class="addplus">
									<a>Grafik pendaftar member</a>
									<?php
									if($this->session->flashdata('update_jadwal') != ''){
													echo '
													  <div class="alert alert-success">
														<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('update_jadwal').'
													  </div>
													';
												}
									?>
								</div>
							<?php 
									$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'method'=>'POST');
									echo form_open('admin/grafik/tutor/',$attributes);
									?>
								
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Pilih Bulan</label>
                                  <div class="col-lg-6">
                                    <div id="datetimepicker3" class="input-append">
													<input data-date-format="mm-yyyy" type="text" style="width:250px" class="picker" name="tanggal_pelatihan" required></input>
													<span class="add-on">
													  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
													  </i>
													</span>
										</div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <hr />
                                    <button style="margin-right:20px" type="submit" class="btn btn-info" name="submit">Tampilkan</button>
                                    <button type="button" onclick="goBack()" class="btn btn-warning">Back</button>
                                  </div>
                                </div>
                              <?php echo form_close();?>
							   </div>
							</div>
			<br/>
							<!-- -->
										   <?php
						if(isset($_POST['submit'])){
							?><div class="col-md-12">
								<?php
								foreach($pelatihan as $value){
									$nama_pelatihan[] = $value->NAMA_PELATIHAN;
									$id_pel = $value->ID_PELATIHAN;
									
								?>
							   <div class="awidget">
								
								  <div class="awidget-body">
                             
								 <hr/>
								 <?php
								$tanggal = $this->input->post('tanggal_pelatihan');
								 
								$CI =& get_instance();
									//$convdate = $CI->convdate($date);
						
								$getBulan = $CI->pecah_bulan($tanggal);
								$getTahun = $CI->pecah_tahun($tanggal);
								
								$ambil = $this->db->query("SELECT COUNT(R.ID_PELATIHAN) AS TOTAL, P.NAMA_PELATIHAN, R.ID_PELATIHAN FROM PELATIHAN P, REGISTRASI_MENGAJAR R WHERE P.ID_PELATIHAN = R.ID_PELATIHAN AND R.BULAN_MENGAJAR = $getBulan AND R.TAHUN_MENGAJAR = $getTahun GROUP BY R.ID_PELATIHAN, P.NAMA_PELATIHAN");
								
								$this->db->select('COUNT(R.ID_PELATIHAN) AS TOTAL, P.NAMA_PELATIHAN, R.ID_PELATIHAN');
								$this->db->from('PELATIHAN P');
								$this->db->join('REGISTRASI_MENGAJAR R','P.ID_PELATIHAN = R.ID_PELATIHAN');
								$this->db->where("R.ID_PELATIHAN = '$id_pel'");
								$this->db->where("R.BULAN_MENGAJAR = '$getBulan'");
								$this->db->where("R.TAHUN_MENGAJAR = '$getTahun'");
								
									
								$row = $this->db->count_all_results();
								
								if($row == 0){
										$count[] = 0;
									}else{
										$count[] = $row;
								}
			
			
						/*	foreach($grafik_tutor as $data){
								$count[] =  (int)$data->TOTAL;
								$nama_pelatihan[] = $data->NAMA_PELATIHAN;
							}*/
						   ?>
						   
						    <div id="chart"></div>
							   </div>
                              </div>
                           </div>
						   
							   </div>
							</div>		
						 </div>
						 <?php
							}
						 ?>
                  </div>
				  <?php
						}
					?>
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
			text: 'Chart Pendaftar Tutor',
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
			data: <?php echo json_encode($count); ?>
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