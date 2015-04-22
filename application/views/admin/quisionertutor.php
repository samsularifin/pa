                  <div class="mainy">
						 <div class="row">
						 
							<div class="col-md-12">
							   <div class="awidget">
								 <div class="judul">
									<i class="icon-home"></i> Quisioner Tutor
								</div>
								<div class="addplus">
									<a>Quisioner Tutor</a>
								</div>
								<?php
									if(count($pelatihan)>0){
								?>
								<div class="awidget-body">
								<form class="form-horizontal" role="form" style="margin-left:20px">
									<div class="form-group">
									  <label class="col-lg-2 control-label">Pilih Pelatihan</label>
									  <div class="col-lg-7">
										<select class="form-control" name="pelatihan" id="pelatihan" onchange="changeFunc();">
										<option value="0">Silahkan Pilih Pelatihan</option>
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
								</form>
								<hr/>
								
								</div>
								<div class="control-group">
									<div id="tampilkan"></div> 
                                </div>
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
							</div>		
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
		
		xmlhttp.open("POST","<?php echo base_url();?>admin/quisioner/getViewTutor/"+selectedValue,false);		
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