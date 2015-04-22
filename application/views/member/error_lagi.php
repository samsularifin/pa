<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Error Registration</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
		<br/>
		<?php
			//check di sini teru
		?>
			<div class="alert">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Error!</strong> Kuota peserta pada waktu yang anda pilih sudah penuh. Silahkan memilih tanggal lain.
            </div>
				<div class="form-actions">
						<button class="btn" onclick="goBack()">Kembali</button>
					</div> <!-- /form-actions -->
		<br/><br/>
		</div>
</div>
<script>
						function goBack()
						{
							window.history.back()
						}
				  </script>