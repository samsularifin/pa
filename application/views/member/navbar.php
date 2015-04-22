<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Member Rumah Bahasa				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<!--<i class="icon-cog"></i>
							<strong>Account</strong> 
							<b class="caret"></b>-->
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Settings</a></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>						
					</li>
			
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							<strong><?php echo $this->session->userdata('NAMA_LENGKAP');?></strong>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>member/profile/">Profile</a></li>
							<li><a href="<?php echo base_url();?>member/index/logout/">Logout</a></li>
						</ul>						
					</li>
				</ul>
			
			<!--	<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search">
				</form>-->
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->