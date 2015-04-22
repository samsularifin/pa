<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Hasil Test</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
		<div style="margin:20px 20px 50px 20px">
		<?php
			//if(count($hasiltest)>0){
			$akhir = (100/$jumlahsoal)* $hasiltest;
			?>
			 <table class="table table-striped table-bordered">
                <thead>
                  <tr style="height:40px">
                    <th>Jumlah Soal</th>
					<th> Jawaban Benar</th>
					<th> Jawaban Salah</th>
					 <th class="td-actions"> Nilai</th>
                  </tr>
                </thead>
                <tbody>
				
                  <tr style="height:60px">
                    <td style="padding-left:20px"><?php echo $jumlahsoal;?></td>
                    <td><?php echo $hasiltest;?></td>
					 <td><?php echo $salah;?></td>
					  <td><?php echo $akhir;?></td>
                  </tr>
                  
                
                </tbody>
              </table>
			  <?php
				/*}else{
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
				}*/
			  ?>
			  </div>
			  <div style="margin-left:20px">
				<?php
					//echo $links;
				?>
				</div>
		</div>
		
</div>
<script>
						function goBack()
						{
							window.history.back()
						}
				  </script>