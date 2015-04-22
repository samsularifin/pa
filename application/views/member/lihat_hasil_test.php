
<script src="<?php echo base_url();?>media/js/jquery.js"></script>
<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Hasil Test</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
		<div style="margin:20px 20px 50px 20px">
		<?php
			if(count($lihathasil)>0){
				
			
			?>
			 <table class="display" id="tableku">
                <thead>
                  <tr style="height:40px">
                    <th>Jumlah Soal</th>
					<th> Jawaban Benar</th>
					<th> Jawaban Salah</th>
					 <th style="font-size:15px"> Nilai</th>
					  <th style="font-size:15px">Tanggal Test</th>
                  </tr>
                </thead>
				<?php
					foreach($lihathasil as $data){
						$tanggal[] = $data->TANGGAL_TEST;
						$nilaia[] = (int)$data->NILAI_AKHIR;
						
					
				?>
                <tbody>
				
                  <tr style="height:60px">
                    <td style="text-align:center"><?php echo $data->JUMLAH_SOAL;?></td>
					 <td style="text-align:center"><?php echo $data->JUMLAH_BENAR;?></td>
					 <td style="text-align:center"><?php echo $data->JUMLAH_SALAH;?></td>
					 <td style="font-size:15px;font-weight:bold; text-align:center"><?php 
						if($data->NILAI_AKHIR <=50){
							echo '<div style="color:red">'.$data->NILAI_AKHIR.'</div>';
						}else{
							echo '<div style="color:blue">'.$data->NILAI_AKHIR.'</div>';
						}?></td>
					<td style="text-align:center"><?php echo $data->TANGGAL_TEST;?></td>
                  </tr>
                </tbody>
				<?php
					}
				?>
              </table>
			  <?php
				}else{
					echo '
						<div class="row-fluid">
							<div class="span11 alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>Data Kosong
							</div>
						</div>';?>
					<?php
				}
			  ?>
			  </div>
			  <div style="margin-left:20px">
				<?php
					//echo $links;
				?>
				</div>
				 <div id="chart"></div>
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
			text: 'Hasil Test ',
			x: -20
		},
		subtitle: {
			text: 'RUMAH BAHASA SURABAYA',
			x: -20
		},
		xAxis: {
			categories:  <?php echo json_encode($tanggal);?>
		},
		yAxis: {
			title: {
				text: 'Index hasil test'
			}
		},
		series: [{
			name: 'Nilai test',
			data:  <?php echo json_encode($nilaia);?>
		}],
		exporting: { enabled: false }
	});
}); 
</script>
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