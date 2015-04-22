<html>
<head>
<!-- Title here -->
		<title>Admin - Rumah Bahasa</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<link href="<?php echo base_url();?>desainadmin/css/bootstrap.min.css" rel="stylesheet">

      <!-- Animate css -->
      <link href="<?php echo base_url();?>desainadmin/css/animate.min.css" rel="stylesheet">
      <!-- Gritter -->
      <link href="<?php echo base_url();?>desainadmin/css/jquery.gritter.css" rel="stylesheet">
      <!-- Calendar -->
      <link href="<?php echo base_url();?>desainadmin/css/fullcalendar.css" rel="stylesheet">
      <!-- Bootstrap toggable -->
      <link href="<?php echo base_url();?>desainadmin/css/bootstrap-switch.css" rel="stylesheet">
      <!-- Date and Time picker -->
      <link href="<?php echo base_url();?>desainadmin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
      <!-- Star rating -->
      <link href="<?php echo base_url();?>desainadmin/css/rateit.css" rel="stylesheet">
      <!-- Star rating -->
      <link href="<?php echo base_url();?>desainadmin/css/jquery.cleditor.css" rel="stylesheet">
      <!-- jQuery UI -->
      <link href="<?php echo base_url();?>desainadmin/css/jquery-ui.css" rel="stylesheet">
      <!-- prettyPhoto -->
      <link href="<?php echo base_url();?>desainadmin/css/prettyPhoto.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="<?php echo base_url();?>desainadmin/css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="<?php echo base_url();?>desainadmin/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url();?>desainadmin/css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url();?>desainmember/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
</head>		
<body>
      <!-- Logo & Navigation starts -->
      
      <div class="header">
         <div class="container" style="margin-top:-2px;">
            <div class="row">
               <div class="col-md-3">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="index.html">Admin Rumah Bahasa</a></h1>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="row">
                    <div class="col-lg-10">
                      <!--<div class="input-group form">
                           <input type="text" class="form-control" placeholder="Something...">
                           <span class="input-group-btn">
                             <button class="btn btn-info" type="button">Search</button>
                           </span>
                      </div> -->
                    </div>
                  </div>
               </div> 
               <div class="col-md-6">
                  <div class="navbar navbar-inverse" role="banner">
                      <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                          <span>Menu</span>
                        </button>
                      </div>
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('NAMA_LENGKAP');?> <span class="label label-primary">2</span><b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              <li><a href="<?php echo base_url();?>admin/profile">Profile</a></li>
                              <li><a href="<?php echo base_url();?>admin/index/logout/">Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>

<!-- pemisah navbar -->

<div class="subnavbar">
	<div class="subnavbar-inner">
		<div class="container">
			<ul>
				<li>
					<a href="<?php echo base_url();?>admin/index/">
						<i class="icon-home"></i><span>Home</span>
					</a>	    				
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/berita/">
						<i class="icon-info-sign"></i><span>Berita</span>
					</a>	    				
				</li>
				<li class="dropdown">
					
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-tasks" ></i><span style="margin-left:10px">Konten<b class="caret"></b></span></a> 
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li>
								<a href="<?php echo base_url();?>admin/fabout">
									<span>About</span>
								</a>	    				
							</li>
							<li>
								<a href="<?php echo base_url();?>admin/fpelatihan">
									<span>Pelatihan</span>
								</a>    				
							</li>
							<li>
								<a href="<?php echo base_url();?>admin/fjadwal">
									<span>Jadwal</span>
								</a>	    				
							</li>
						</ul>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/gallery/">
						<i class="icon-camera"></i><span>Gallery</span>
					</a>	    				
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/slider/">
						<i class="icon-picture"></i><span>Slider</span>
					</a>    				
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/komentar/">
						<i class="icon-comment"></i><span>Komentar</span>
					</a>	    				
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/reguser/">
						<i class="icon-user"></i><span>User Registration</span>
					</a>  
				</li>
				
			</ul>
		</div> <!-- /container -->
		
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
      <!-- Logo & Navigation ends -->


<!-- pemisah sub navbar -->

	 <div class="page-content blocky">
         <div class="container">
			<div class="sidebar-dropdown"><a href="#">MENU</a></div>
			
<!-- pemisah 3 -->
	<!--<div class="sidey">
              
                     <div class="side-cont">
                        <ul class="nav">
                            <!-- Main menu -->
							<!--<div class="judul">
								<i class="icon-home"></i> Front End Setting 
							</div>
                            <li><a href="<?php echo base_url();?>admin/berita/"><i class="icon-home"></i>Berita</a></li>
							<li class="has_submenu">
								<a href="#">
									<i class="icon-th"></i>Konten
									<span class="caret pull-right"></span>
								</a>
								<!-- Sub menu -->
                                <!-- <ul>
                                    <li><a href="<?php echo base_url();?>admin/fabout">About</a></li>
                                    <li><a href="<?php echo base_url();?>admin/fpelatihan">Pelatihan</a></li>
									<li><a href="<?php echo base_url();?>admin/fjadwal">Jadwal</a></li>
                                </ul>
							</li>
							<li><a href="<?php echo base_url();?>admin/gallery/">
							<i class="icon-bar-chart"></i>Gallery</a></li>
							 <li>
								<a href="<?php echo base_url();?>admin/slider/">
									<i class="icon-bar-chart"></i>Slider
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>admin/komentar/">
									<i class="icon-file"></i>Komentar
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>admin/reguser/">
									<i class="icon-user"></i>User Registration
								</a>
							</li>
                            
                        </ul>
                     </div>
                  </div> -->
				  
<div class="sidey">
              
                     <div class="side-cont">
                        <ul class="nav">
                            <!-- Main menu -->
							<div class="judul">
								<i class="icon-home"></i> General Setting
							</div>
							<li class="has_submenu">
								<a href="#">
									<i class="icon-user"></i>Daftar User
									<span class="caret pull-right"></span>
								</a>
								<!-- Sub menu -->
                                 <ul>
                                    <li><a href="<?php echo base_url();?>admin/user/member/">Member</a></li>
                                    <li><a href="<?php echo base_url();?>admin/user/tutor/">Tutor</a></li>
									<li><a href="<?php echo base_url();?>admin/user/admin">Admin</a></li>
                                </ul>
							</li>
							<li class="has_submenu">
								<a href="#">
									<i class="icon-list"></i>Daftar Pelatihan
									<span class="caret pull-right"></span>
								</a>
								<!-- Sub menu -->
                                 <ul>
                                    <li><a href="<?php echo base_url();?>admin/pelatihan">Pelatihan</a></li>
                                    <li><a href="<?php echo base_url();?>admin/pelatihan/klinik">Klinik</a></li>
                                </ul>
							</li>
                            <li class="has_submenu">
								<a href="#">
									<i class="icon-file"></i>Module Pelatihan
									<span class="caret pull-right"></span>
								</a>
								<!-- Sub menu -->
                                 <ul>
                                    <li><a href="<?php echo base_url();?>admin/tutmodule">Tutor</a></li>
                                    <li><a href="<?php echo base_url();?>admin/membmodule">Member</a></li>
                                </ul>
							</li>
							 <li class="has_submenu">
								<a href="#">
									<i class="icon-eye-open"></i>Pre Tes
									<span class="caret pull-right"></span>
								</a>
								<!-- Sub menu -->
                                 <ul>
                                    <li><a href="<?php echo base_url();?>admin/quizmember">Member</a></li>
                                </ul>
							</li>
							<li class="has_submenu">
								<a href="#">
									<i class="icon-pencil"></i>Quisioner
									<span class="caret pull-right"></span>
								</a>
								<!-- Sub menu -->
                                 <ul>
                                    <li><a href="<?php echo base_url();?>admin/quisioner/member/">Member</a></li>
									 <li><a href="<?php echo base_url();?>admin/quisioner/tutor/">Tutor</a></li>
                                </ul>
							</li>
						<!--	<li><a href="<?php echo base_url();?>admin/pelatihan"><i class="icon-sitemap"></i>Forum</a></li> -->
                            
                        </ul>
                     </div>
                  </div>
				  
				  
				  <div class="sidey" style="margin-top:300px">
              
                     <div class="side-cont">
                        <ul class="nav">
                            <!-- Main menu -->
							<div class="judul">
								<i class="icon-home"></i> Report
							</div>
                            <li class="has_submenu">
								<a href="#"><i class=" icon-bullhorn"></i>
								<span class="caret pull-right"></span>
								Test Report</a>
								<ul>
                                    <li><a href="<?php echo base_url();?>admin/report/testmember/">Member</a></li>
                                   
                                </ul>
							</li>
							 <li class="has_submenu">
								<a href="#"><i class=" icon-bullhorn"></i>
								<span class="caret pull-right"></span>
								Quisioner Report</a>
								<ul>
                                    <li><a href="<?php echo base_url();?>admin/report/quisioner_member/">Member</a></li>
									  <li><a href="<?php echo base_url();?>admin/report/testmember/">Tutor</a></li>
                                   
                                </ul>
							</li>
                            
                        </ul>
                     </div>
                  </div>
	<!-- pemisah left menu -->
		 <div class="mainy">
			 <div class="row"> 
		 <div class="col-md-12">
					<div class="awidget">
						<div class="judul">
							<i class="icon-home"></i> Quisioner Member
										</div>
				 <div class="addplus">
						<a>Quisioner Member</a>
										</div>
				  <div class="awidget-body">
						<div class="row">

						   <div class="col-md-4">
							 <div id="pie-chart" class="chart-placeholder"></div>
						   </div>
						   <div class="col-md-4">
							 <div id="pie-chart" class="chart-placeholder"></div>
						   </div>
						   <!--<div class="col-md-4">
							 <div id="pie-chart2" class="chart-placeholder"></div>
						   </div>
						   <div class="col-md-4">
							 <div id="pie-chart3" class="chart-placeholder"></div>
						   </div>-->
						 </div>
				  </div>
				  </div>
				</div>
			</div>
		  </div>
		  
		  
			<div class="clearfix"></div>
         </div>
</div>  
		 <!-- Footer starts -->
      <footer>
         <div class="container">
         
            <div class="copy text-center">
              &copy; Copyright 2014  - <a href="#">Samsul Arifin | Tugas Akhir Politeknik Elektronika Negeri Surabaya</a>
            </div>
            
         </div>
      </footer>
      <!-- Footer ends --> 
		  
		  <!-- pemisah -->
 
      <!-- Scroll to top -->
      <span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 
      
		<!-- Javascript files -->
		<!-- jQuery -->
	
	  <script src="<?php echo base_url();?>desainadmin/js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="<?php echo base_url();?>desainmember/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url();?>desainmember/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo base_url();?>desainadmin/js/bootstrap.min.js"></script>  
      <!-- jQuery UI -->
      <script src="<?php echo base_url();?>desainadmin/js/jquery-ui-1.10.2.custom.min.js"></script>     
      <!-- jQuery Peity -->
      <script src="<?php echo base_url();?>desainadmin/js/peity.js"></script>  
      <!-- Calendar -->
      <script src="<?php echo base_url();?>desainadmin/js/fullcalendar.min.js"></script>  
      <!-- jQuery Star rating -->
      <script src="<?php echo base_url();?>desainadmin/s/jquery.rateit.min.js"></script>
      <!-- prettyPhoto -->
      <script src="<?php echo base_url();?>desainadmin/js/jquery.prettyPhoto.js"></script>  
      
      <!-- jQuery flot -->
      <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
      <script src="<?php echo base_url();?>desainadmin/js/jquery.flot.js"></script>     
      <script src="<?php echo base_url();?>desainadmin/js/jquery.flot.pie.js"></script>
      <script src="<?php echo base_url();?>desainadmin/js/jquery.flot.stack.js"></script>
      <script src="<?php echo base_url();?>desainadmin/js/jquery.flot.resize.js"></script>
	  
      
      
      
      <!-- Gritter plugin -->
      <script src="<?php echo base_url();?>desainadmin/js/jquery.gritter.min.js"></script> 
      <!-- CLEditor -->
	  <script src="<?php echo base_url();?>desainadmin/js/jquery.cleditor.js"></script>
      <script src="<?php echo base_url();?>desainadmin/js/jquery.cleditor.min.js"></script> 
      <!-- Date and Time picker -->
      <script src="<?php echo base_url();?>desainadmin/js/bootstrap-datetimepicker.min.js"></script>  
      <!-- jQuery Toggable -->
      <script src="<?php echo base_url();?>desainadmin/js/bootstrap-switch.min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="<?php echo base_url();?>desainadmin/js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="<?php echo base_url();?>desainadmin/js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="<?php echo base_url();?>desainadmin/js/custom.js"></script>
       <script type="text/javascript">
	 /* Pie chart starts */

        $(document).ready(function() {

             var data = [];
             var series = <?php echo $jumlah_soal;?>;
             for( var i = 0; i<series; i++)
             {
                 data[i] = { 
					label: "Series"+(i+1), 
					data: Math.floor(Math.random()*10)+1
				}
             }

             $.plot($("#pie-chart"), data,
             {
                 series: {
                     pie: {
                         show: true,
                         radius: 1,
                         label: {
                             show: true,
                             radius: 3/4,
                             formatter: function(label, series){
                                 return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
                             },
                             background: { opacity: 0 }
                         }
                     }
                 },
                 grid: {hoverable: true},
                 legend: {
                     show: false
                 },
                 colors: ["#16cbe6","#16bdd6","#13aec5","#2fbacf","#31c9e0"]
             }); 


         /* Pie chart ends */

         });

</script>
	</body>
</html>
	  