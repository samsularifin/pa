<!DOCTYPE html>
<html>
	<?php
		$this->load->view('head');
		
	?>
	<body class="tubuh">
		<?php
			$this->load->view('nav_top');
			$this->load->view('header');
		?>
		<div class="main-content">
            <div class="container">
				<?php
					$this->load->view('slider');
				?>
                <div class="row show-grid">
                    <div class="span12">
<!-- BREADCRUMBS -->
                        <div id="breadcrumb">
                        
                        </div>
                    </div>
                    <div class="span12">
                        <div class="row show-grid clear-both">
							<?php
								$this->load->view('leftmenu');
								if($this->uri->segment(1) == 'beranda' || $this->uri->segment(1) == ''){	
									$this->load->view('mainpage');
								}else if($this->uri->segment(1) == 'member' || $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'tutor'){
									redirect('login');
								}else{
									$this->load->view($page);
								}
							?>	
						</div>
					</div>
				</div>
				<hr/>
				<?php
					//$this->load->view('client');
				?>
			</div>
		</div>
		<?php
			$this->load->view('footer');
			$this->load->view('script');
		?>
	</body>
</html>