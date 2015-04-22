<!DOCTYPE html>
<html lang="en">
	<?php
		$this->load->view('admin/head');
	?>
	
	<body>
		<?php
			$this->load->view('admin/navbar');
			$this->load->view('admin/subnavbar');
		?>
	 <div class="page-content blocky">
         <div class="container" style="margin-bottom:160px">
			<div class="sidebar-dropdown"><a href="#">MENU</a></div>
			<?php
				$this->load->view('admin/leftmenu');
					if($this->uri->segment(2) == 'index' || $this->uri->segment(1) == ''){
						$this->load->view('admin/dashbord');
					}else{
						$this->load->view('admin/'.$page);
					}
			?>
			<div class="clearfix"></div>
         </div>
      </div>
	  <?php
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
		?>
	</body>
</html>
	  
			