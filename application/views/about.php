
<!-- BEGIN ARTICLE CONTENT AREA -->

                            <div class="span8 main-column three-columns-central">
                                <article >
								<?php
									foreach($about as $data){
									
								?>
                                    <h2 style="color:#2773ae"><?php echo $data->JUDUL_ABOUT;?></h2> 
<hr/>									
									<?php echo $data->ISI_ABOUT;?>                                                           
                                </article>
								<?php
									}
								?>
                            </div>