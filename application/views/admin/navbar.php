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