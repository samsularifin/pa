<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Rumah Bahasa Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="<?php echo base_url();?>desainmember/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>desainmember/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>desainmember/css/font-awesome.css" rel="stylesheet">
   <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">-->
    
<link href="<?php echo base_url();?>desainmember/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>desainmember/css/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>desainmember/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<!--<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Rumah Bahasa				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li>						
						<a href="signup.html" style="font-size:13px;">
							Belum punya akun member ?
						</a>
						
					</li>
					
					<li class="">						
						<a href="index.html" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		<!--</div> <!-- /container -->
		
	<!--</div> <!-- /navbar-inner -->
	
<!--</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
			<?php
				echo form_open('login/auth/'); 
							
			?>
		<div style="background:#16cbe6; padding:0px">
			<a class="logo" href="<?php echo base_url();?>">
                            <img class="logo_login" alt="logo" title="Rumah Bahasa Dinkominfo" src="<?php echo base_url();?>desainfront/img/login_icon.png" />
                        </a><h3>Rumah Bahasa Login</h3>
						<!--<p>Silahkan login untuk mendapat fasilitas yang lebih lengkap</p> -->
		</div>
			<div class="login-fields">
				<?php
					if($this->session->flashdata('msg') != ''){
							echo '
							  <div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('msg').'
							  </div>
							';
						}
					?>
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="pass" name="pass" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				<div class="field">
						<select class="login username-field" name="otoritas">
							<option value="1">Member</option>
							<option value="2">Tutor</option>
							<option value="3">Admin</option>
						</select>
					<!--<input type="password" id="password" name="password" value="" placeholder="Login Sebagai" class="login username-field"/> -->
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-bottons">
					<button class="button btn btn-success btn-large">Sign In</button>
			</div>
			
		</form>
		
	</div> <!-- /content -->
	<div class="foot">
				<p>&copy; Copyright 2014<p>
	</div>
</div> <!-- /account-container -->


<script src="<?php echo base_url();?>desainmember/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url();?>desainmember/js/bootstrap.js"></script>

<script src="<?php echo base_url();?>desainmember/js/signin.js"></script>

</body>

</html>
