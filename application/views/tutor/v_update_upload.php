<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Registrasi Pelatihan</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
			
		<br/>
		
			
			<?php
				foreach($hasil as $data){
				$id_user = $this->session->userdata('ID_USER');
				
				$attributes = array('class' => 'form-horizontal'
				);
					echo form_open_multipart('tutor/upload/update/'.$id_user,$attributes);
			?>
									<fieldset>
												<img src="<?php echo base_url();?>file/upload/<?php echo $data->UPLOAD_FILE;?>" style="width:800px; height:1000px; margin-bottom:40px">
                                           
										<div class="control-group">
                                            <label class="control-label" for="firstname">Edit File</label>
                                            <div class="controls">
												<input type="file" name="nama_file"></input>
												<p style="color:red">*Notes : File format berupa gambar / scan file</p>
                                            </div>
											
                                        </div> <br /><br />
										<input type="hidden" name="ambil_id_user" value="<?php echo $id_user;?>">
										
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" style="background:#269fb2">Update</button> 
											<button type="button" onclick="goBack()"class="btn">Kembali</button>
										</div> <!-- /form-actions -->
									</fieldset>
							<?php echo form_close();
							}?>
	
		</div>
</div>
<script>
	function goBack(){
		window.history.back();
	}
</script>