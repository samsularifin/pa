								<?php
								
									for($i=0;$i<$id;$i++){
								?>
								<div class="perulangan" style="display:block;">	
									<div class="control-group">								
											<label class="control-label" for="lastname">Pilih Hari Ke <?php echo $i; ?></label>
											   <div class="controls">
												<label class="radio inline">
												  <input type="radio" checked='checked' name="hari[<?php echo $i;?>]" value="Senin"> Senin
												</label>
												
												<label class="radio inline">
												  <input type="radio" name="hari[<?php echo $i;?>]" value="Selasa"> Selasa
												</label>
												<label class="radio inline">
												  <input type="radio" name="hari[<?php echo $i;?>]" value="Rabu"> Rabu
												</label>
												
												<label class="radio inline">
												  <input type="radio" name="hari[<?php echo $i;?>]" value="Kamis"> Kamis
												</label>
												<label class="radio inline">
												  <input type="radio" name="hari[<?php echo $i;?>]" value="Jumat"> Jumat
												</label>
											
											</div>							
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label">Waktu Pengajaran</label>
											
                                            
                                            <div class="controls">
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="09:00-10:00"> 09:00-10:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="10:00-11:00"> 10:00-11:00
												</label>
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="11:00-12:00"> 11:00-12:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="13:00-14:00"> 13:00-14:00
												</label>
											
                                          </div>		<!-- /controls -->	
											<div class="controls">
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="14:00-15:00"> 14:00-15:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="15:00-16:00"> 15:00-16:00
												</label>
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="16:00-17:00"> 16:00-17:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="17:00-18:00"> 17:00-18:00
												</label>
											
                                          </div>
										  <div class="controls">
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="18:00-19:00"> 18:00-19:00
												</label>
												
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="19:00-20:00"> 19:00-20:00
												</label>
												<label class="checkbox inline">
												  <input type="checkbox" name="waktu[<?php echo $i;?>][]" value="20:00-21:00"> 20:00-21:00
												</label>
                                          </div>
										  
										</div> <!-- /control-group -->
											
										 <br />
										
									</div>
									<?php
									}
									
									?>