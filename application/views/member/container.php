<!DOCTYPE html>
<html lang="en">
	<?php
		$this->load->view('member/head');
	?>
	<body>
		<?php
			$this->load->view('member/navbar');
			$this->load->view('member/subnavbar');
			$this->load->view('member/leftbar');
		?>
		<div class="main">
			<div class="main-inner">
				 <div class="container">
					<div class="mainpage">	
						<div class="span8">
						
						<?php

							if($this->uri->segment(2) == 'index' || $this->uri->segment(1) == ''){
								$this->load->view('member/mainpage');
							}else{
								$this->load->view('member/'.$page);
							}
						?>
						
						</div> <!-- /span8 -->
					</div> 
				</div> <!-- /container -->
			</div> <!-- /main-inner -->
			
		</div> <!-- /main -->
		<?php
			$this->load->view('member/extra');
			$this->load->view('member/footer');
			$this->load->view('member/script');
		?>
	</body>
</html>