<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Pre Test Online Member</h3>
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
		<br/>
		<?php
			//check di sini teru
			if(count($pelatihan) > 0){
		?>
			<form action="" class="form-horizontal" method="POST">
									<fieldset>
								
										<div class="control-group">
                                            <label class="control-label" for="firstname">Pilih Pelatihan</label>
                                            <div class="controls">
												<select name="pelatihan" id="pelatihan" onchange="changeFunc();" style="width:380px;">
													<option value="0">Pilih Pelatihan</option>
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
											<div id="tampilkan"></div> 
                                        </div>

										<?php echo br(2);?>
										
									</fieldset>
								</form>
						<?php
							}else{
								echo '
							  <div class="alert alert-error" style="margin:20px">
								<button type="button" class="close" data-dismiss="alert">&times;</button>Anda belum mengambil pelatihan apapun. Silahkan registrasi terlebih dahulu!
							  </div><br/><br/>
							';
							}
						?>

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
		
		var selectBox = document.getElementById("pelatihan");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		
		xmlhttp.open("POST","<?php echo base_url();?>member/test/tampilkan/"+selectedValue,false);		
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