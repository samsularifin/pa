
      <!-- Scroll to top -->
      <span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 
      
		<!-- Javascript files -->
		<!-- jQuery -->
	
	  <script src="<?php echo base_url();?>desainadmin/js/jquery.js"></script>
		<!-- Bootstrap JS -->
			<script type="text/javascript" src="<?php echo base_url('/assets/jquery-1.7.2.min.js'); ?>"></script>
		<script src="<?php echo base_url();?>desainmember/js/jquery-1.8.3.min.js"></script>
	
		<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/exporting.js'); ?>"></script>
	
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/themes/sand-signika.js'); ?>"></script>
	
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
		<script src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		

   <!-- Javascript for graph -->
   <script type="text/javascript">
				$(document).ready(function() {
				var date = new Date();
				date.setDate(date.getDate());
	
				  $("#isi_jadwal").cleditor({
					width:        585, // width not including margins, borders or padding
					height:       420
				  });
				  $('#datetimepicker3').datetimepicker({
					  pickTime: false,
					 
					  format: "MM-yyyy",
						viewMode: "months", 
						minViewMode: "months"
					});
				  $('#datetimepicker4').datetimepicker({
					pickTime: false
				});
				  
			});   
	
	</script>

  <!-- <script type="text/javascript">
 

   $(function () {

       /* Bar Chart starts */

       var d1 = [];
       for (var i = 0; i <= 35; i += 1)
           d1.push([i, parseInt(Math.random() * 30)]);

       var d2 = [];
       for (var i = 0; i <= 35; i += 1)
           d2.push([i, parseInt(Math.random() * 30)]);


       var stack = 0, bars = true, lines = false, steps = false;
	   
       
       function plotWithOptions() {
           $.plot($("#home-chart"), [ d1, d2 ], {
               series: {
                   stack: stack,
                   lines: { show: lines, fill: true, steps: steps },
                   bars: { show: bars, barWidth: 0.8 }
               },
               grid: {
                   borderWidth: 0, hoverable: true, color: "#777"
               },
               colors: ["#16cbe6", "#0fa6bc"],
               bars: {
                     show: true,
                     lineWidth: 0,
                     fill: true,
                     fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
               }
           });
       }

       plotWithOptions();
       
       $(".stackControls input").click(function (e) {
           e.preventDefault();
           stack = $(this).val() == "With stacking" ? true : null;
           plotWithOptions();
       });
       $(".graphControls input").click(function (e) {
           e.preventDefault();
           bars = $(this).val().indexOf("Bars") != -1;
           lines = $(this).val().indexOf("Lines") != -1;
           steps = $(this).val().indexOf("steps") != -1;
           plotWithOptions();
       });

       /* Bar chart ends */

   });



   </script> -->