
<!-- BEGIN ARTICLE CONTENT AREA -->

                            <div class="span8 main-column three-columns-central">
                                <article style="text-align:justify">
								<?php
									foreach($jadwal_front as $data){
								?>
                                    <h2><?php echo $data->JUDUL_JADWAL_FRONT;?></h2>
									<hr/>
									<p>
										<?php echo $data->ISI_JADWAL_FRONT;?>
                                    </p>
									<?php
										}
									?>
                                </article>
                            </div>