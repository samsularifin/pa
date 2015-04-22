<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Registrasi Pelatihan</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content">
			<?php
				if($this->session->flashdata('upload_error') != ''){
							echo '
							  <div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('upload_error').'
							  </div>
							';
					}
					if($this->session->flashdata('upload_sukses') != ''){
							echo '
							  <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('upload_sukses').'
							  </div>
							';
					}
			?>
		<br/>
		<?php
			foreach($cekupload as $data){
				if($data->UPLOAD_FILE == NULL){
				
					echo '
								  <div class="alert alert-warning" style="margin:0px 20px 30px 20px">
									<button type="button" class="close" data-dismiss="alert">&times;</button>Anda belum upload file pendukung. Silahkan upload ijazah atau file pendukung lain nya sebagai tolak ukur kemampuan yang anda miliki.
								  </div>
					';
		?>
			
			<?php
				$id_user = $this->session->userdata('ID_USER');
				
				$attributes = array('class' => 'form-horizontal'
				);
					echo form_open_multipart('tutor/upload/simpan/',$attributes);
			?>
									<fieldset>
								
										<div class="control-group">
                                            <label class="control-label" for="firstname">Upload file pendukung</label>
                                            <div class="controls">
												<input type="file" name="nama_file"></input>
												<p style="color:red">*Notes : File format berupa gambar / scan file</p>
                                            </div>
											
                                        </div> <br /><br />
										<input type="hidden" name="ambil_id_user" value="<?php echo $id_user;?>">
										
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" style="background:#269fb2">Upload</button> 
											<button type="button" onclick="goBack()"class="btn">Kembali</button>
										</div> <!-- /form-actions -->
									</fieldset>
							<?php echo form_close();?>
								
			<?php
				}else{
					echo '
						  <div class="alert alert-success" style="margin:10px 0px 50px 0px">
							<button type="button" class="close" data-dismiss="alert">&times;</button>File sudah anda upload.
						  </div>
					';
					?>
					<a href="<?php echo base_url();?>tutor/upload/onclickup/<?php echo $this->session->userdata('ID_USER');?>" class="btn btn-small btn-success" style="float:right; margin-top:7px; background:#269fb2; color:#fff"><i class="btn-icon-only  icon-pencil"> </i></a>
					<img class="file_gambar" src="<?php echo base_url();?>file/upload/<?php echo $data->UPLOAD_FILE;?>"></img>
					
					<?php
				}
			}
		?>
		</div>
</div>
<script>
	function goBack(){
		window.history.back();
	}
</script>