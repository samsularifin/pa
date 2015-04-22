<?php
	if(count($test)>0){
	$GLOBALS['status'] = "";
?>
		<table class="table table-striped" style="width:600px;margin-left:60px; margin-top:20px">
						<thead>
						  <tr style="border-top:1px solid #d6d6d6;">
							<th>Judul Quiz</th>
							<th>Jumlah Soal</th>
							<th>Keterangan</th>
							<th>Test</th>
							<th>Status Test</th>
						  </tr>
						</thead>
						<tbody>
						<?php
							foreach($test as $data){
						?>
						
						  <tr>
							<td style="padding-left:20px"><?php echo $data->JUDUL_QUIZ;?></td>
							<td><?php echo $data->JUMLAH_SOAL;?> Soal</td>
							<td><?php echo $data->KETERANGAN;?></td>
							
							
							<input type="hidden" name="ambil_id_quiz_nya" value="<?php echo $data->ID_QUIZ;?>"></input>
							
							<td>
							<?php
								if(count($cekambilpelatihan) > 0){
									foreach($cekambilpelatihan as $data2){
									$id_quiz = $data2->ID_QUIZ;
									$id_pel = $data2->ID_PELATIHAN;
									
									
									$this->db->select('HASIL_TEST_QUIZ.ID_HASIL_TEST, HASIL_TEST_QUIZ.ID_QUIZ');
									$this->db->from('HASIL_TEST_QUIZ');
									$this->db->where('HASIL_TEST_QUIZ.ID_QUIZ', $data2->ID_QUIZ);
									
									$query = $this->db->get();
										foreach($query->result() as $data3){
											$ambil_id_quiz = $data3->ID_QUIZ;
										}
										if($ambil_id_quiz == $data->ID_QUIZ){
										$GLOBALS['status'] = 1;
									?>
									<!--<a href="<?php echo base_url();?>member/test/lihat_hasil/<?php echo $data2->ID_HASIL_TEST;?>">Lihat Hasil</a>-->
									
								<?php
									}
								}
									}
								?>
								<a href="<?php echo base_url();?>member/test/ambil_test/<?php echo $data->ID_QUIZ;?>" onclick="return confirm('Ambil Test pelatihan ini	?')">Ambil Test</a>
							</td>
							
							<td><?php if(count($cekambilpelatihan) > 0 &&  $GLOBALS['status'] == 1){
									?>
								<a href="<?php echo base_url();?>member/test/lihat_hasil?id_pelatihan=<?php echo $data2->ID_PELATIHAN;?>&id_quiz=<?php echo $data->ID_QUIZ;?>">Lihat Hasil</div>
								<?php
							}else{
								echo '<div style="color:#4F8A10">Belum ambil test</div>';
							}?></td>
						  </tr>
						<?php
							}
						?>
						</tbody>
			</table>
<?php
	}else if($getidpelatihan == 0){
		echo '
			<div class="row-fluid">
				<div class="span11 alert alert-error"  style="width:600px;margin-left:60px; margin-top:20px">
				<button type="button" class="close" data-dismiss="alert">&times;</button>Silahkan pilih pelatihan
				</div>
			</div>';
	}else{
		echo '
										<div class="row-fluid">
											<div class="span11 alert alert-error"  style="width:600px;margin-left:60px; margin-top:20px">
											<button type="button" class="close" data-dismiss="alert">&times;</button>Test belum ada. 
											</div>
										</div>';
	}
?>