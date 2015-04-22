	<script src="<?php echo base_url();?>desainadmin/js/jquery-1.7.2.min.js">
	</script>
		
<?php
	if(count($ambil_soal)>0){
	//$getTime = "";
					?>
<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Isi Quisioner</h3>
			<!--<input type="button" class="trigger" value="Start" /> -->
			<!--<span id="countdown" class="timer"></span> -->
			<div class="show">
			</div>
			
			
		</div>
		<div class="timer"></div>
		<!--<div class="show"></div> -->
	<!-- /widget-header -->

		<div class="widget-content">
		<?php
			$id_quiz = 0;
		?>
			<form action="<?php echo base_url();?>tutor/quisioner/submit/" method="POST">
			<ol >
						<?php
								$i=0;
								foreach($ambil_soal as $data){
									$i++;
										$id_soal = $data->ID_SOAL_QUISIONER;
										$id_quiz = $data->ID_QUISIONER;
										
										/*QUERY BUAT NGAMBIL ID_PELATIHAN PADA QUIZ */
										$this->db->select('ID_QUISIONER, ID_PELATIHAN');
										$this->db->from('QUISIONER');
										$this->db->where('ID_QUISIONER',$id_quiz);
										$query = $this->db->get();
											foreach($query->result() as $ambilvalue){
												$id_pelatihan = $ambilvalue->ID_PELATIHAN;
			
											}
										/*END QUERY */
										?>
										<input type="hidden" name="ambil_id_quiz" value="<?php echo $id_quiz;?>">
										<input type="hidden" name="ambil_id_pelatihan" value="<?php echo $id_pelatihan;?>">
										
										<?php
									///	$getTime = $data->WAKTU_QUIZ;
										/*foreach($data_quiz as $getTime){
										?>
									<div id="getTime" value="<?php echo $getTime->WAKTU_QUIZ;?>"></div>
										<?php
											}*/
										?>
									<input type="hidden" name="idsoal[<?php echo $data->ID_SOAL_QUISIONER;?>]" value="<?php echo $id_soal;?>"></input>
									
								 <li>
									<?php
										echo $data->ISI_SOAL_QUISIONER;
										
										//foreach($jawaban_quiz_tutor as $data2){
										/* QUERY UNTUK MENGAMBIL JAWABAN SESUAI DENGAN ID_SOAL DI ATAS */
										$this->db->select('SOAL_QUISIONER.ID_SOAL_QUISIONER, SOAL_QUISIONER.ID_QUISIONER, SOAL_QUISIONER.ISI_SOAL_QUISIONER, SOAL_QUISIONER.ID_KATEGORI_USER, KATEGORI_USER.ID_KATEGORI_USER, QUISIONER.ID_QUISIONER, JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER, JAWABAN_QUISIONER.ID_SOAL_QUISIONER, JAWABAN_QUISIONER.ISI_JAWABAN_QUISIONER');
										$this->db->from('SOAL_QUISIONER');
										$this->db->where('SOAL_QUISIONER.ID_QUISIONER',$id_quiz);
										$this->db->join('QUISIONER','SOAL_QUISIONER.ID_QUISIONER = QUISIONER.ID_QUISIONER');
										$this->db->where('SOAL_QUISIONER.ID_KATEGORI_USER = 2');
										$this->db->join('KATEGORI_USER','SOAL_QUISIONER.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
										$this->db->where('SOAL_QUISIONER.ID_SOAL_QUISIONER',$id_soal);
										$this->db->join('JAWABAN_QUISIONER',' SOAL_QUISIONER.ID_SOAL_QUISIONER = JAWABAN_QUISIONER.ID_SOAL_QUISIONER');
										$this->db->order_by('JAWABAN_QUISIONER.ID_JAWABAN_QUISIONER','ASC');
										
										$query = $this->db->get();
											foreach($query->result() as $data2){
										
									?>
                                    <div class="radio" style="margin:15px">
									
                                      <label>
                                        <input type="radio" name="jawaban[<?php echo $data->ID_SOAL_QUISIONER;?>]" value="<?php echo $data2->ID_JAWABAN_QUISIONER;?>">
										
										<?php
										
											echo $data2->ISI_JAWABAN_QUISIONER;
										
										?>
                                      </label>
                                    </div>
									</li>
									<?php
										}
										echo br(1);
									}
								 ?>
								</ol>
							
						<div class="form-actions">
							<button type="submit" class="btn btn-primary" style="background:#269fb2">Submit Quisioner</button>
							</div> <!-- /form-actions -->
						</form>
		</div>
		<br/><br/>
	<?php
		}else{
			echo '
					<div class="row-fluid">
						<div class="span12 alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>Data Kosong
						</div>
					</div>';
						}
	?>
	</div>
