<!DOCTYPE html>
<html lang="en">
	<?php
		$this->load->view('tutor/head');
	?>
	<body>
		<?php
			$this->load->view('tutor/navbar');
			$this->load->view('tutor/subnavbar');
			$this->load->view('tutor/leftbar');
		?>
		<div class="main">
			<div class="main-inner">
				 <div class="container">
					<div class="mainpage">	
						<div class="span8">
						
						<?php

							if($this->uri->segment(2) == 'index' || $this->uri->segment(1) == ''){
								$this->load->view('tutor/mainpage');
							}else{
								$this->load->view('tutor/'.$page);
							}
						?>
						
						</div> <!-- /span8 -->
					</div> 
				</div> <!-- /container -->
			</div> <!-- /main-inner -->
			
		</div> <!-- /main -->
		<?php
			$this->load->view('tutor/extra');
			$this->load->view('tutor/footer');
			$this->load->view('tutor/script');
		?>
	</body>
</html>