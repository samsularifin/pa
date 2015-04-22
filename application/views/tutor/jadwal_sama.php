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
			 <div class="alert alert-error">
                                    <h2 style="font-size:15px">Pendaftaran gagal</h2>
                                    <p>Jadwal yang anda pilih sudah ada di database. Silahkan memilih Waktu dan tanggal lain.</p>
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