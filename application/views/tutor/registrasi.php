<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Registrasi Mengajar</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
			<?php
			if($this->session->flashdata('pesan') != ''){
							echo '
							  <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('pesan').'
							  </div>
							';
						}
			?>
			<form action="<?php echo base_url();?>tutor/registrasi/simpan/" class="form-horizontal" method="POST" style="margin-left:20px">
									<fieldset>
								
										<div class="control-group">
                                            <label class="control-label" for="firstname">Pengajaran Bahasa</label>
                                            <div class="controls">
												<select name="edukasii" style="width:380px;">
													<?php
														foreach($pelatihan as $data){
													?>
													<option value="<?php echo $data->ID_PELATIHAN;?>"><?php echo $data->NAMA_PELATIHAN;?></option>
													<?php
														}
													?>
												</select>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label" for="firstname">Pilih Jumlah hari mengajar dalam satu minggu</label>
                                            <div class="controls">
												<select name="edukasi" id="jum_hari" style="width:380px;" onchange="changeFunc();">
													<option value="0">Pilih Jumlah Hari</option>
													<option value="1">1 hari</option>
													<option value="2">2 hari</option>
													<option value="3">3 hari</option>
													<option value="4">4 hari</option>
													<option value="5">5 hari</option>
												</select>
                                            </div>
                                        </div>
										<div id="tampilkan"></div>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" style="background:#269fb2">Simpan</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>

		</div>
</div>

<script type="text/javascript">
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari 
	xmlhttp=new XMLHttpRequest();
 } 
else {
// code for IE6, IE5 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }

	function changeFunc() {
		var temp = 1;
		
		var selectBox = document.getElementById("jum_hari");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		
		xmlhttp.open("POST","<?php echo base_url();?>tutor/registrasi/tampilkan/"+selectedValue,false);		
		xmlhttp.send(null); 
		
		if(xmlhttp.responseText=="") { 
			document.getElementById("tampilkan").innerHTML = ""; 
		} 
		else { 
			document.getElementById("tampilkan").innerHTML = xmlhttp.responseText; 
		}
		
			/*for(var i=0; i < selectedValue; i++){
				var dv = document.getElementByClassName("perulangan");
				dv.style.display = 'block';
				/*if(temp == 0){
						dv.style.display = 'block';
				}else{
					
						dv.style.display = 'none';
				}*/
				//alert(selectedValue)
			//}
			//return false;
   }
</script>