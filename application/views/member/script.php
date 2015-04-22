
<!-- Placed at the end of the document so the pages load faster -->
<!--<script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> -->
	  <script src="<?php echo base_url();?>desainadmin/js/jquery.js"></script>
		<!-- Bootstrap JS -->
	
<script src="<?php echo base_url();?>desainmember/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/exporting.js'); ?>"></script>
	
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/themes/sand-signika.js'); ?>"></script>
<script src="<?php echo base_url();?>desainmember/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url();?>desainmember/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>desainmember/js/jquery.mtz.monthpicker.js"></script>
<script src="<?php echo base_url();?>desainmember/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>desainmember/js/base.js"></script>
<script src="<?php echo base_url();?>desainmember/js/guidely/guidely.min.js"></script>
<script src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>

<script>

$(function () {
	var date = new Date();
	date.setDate(date.getDate());
	
	$('#datetimepicker4').datetimepicker({
      pickTime: false,
	  startDate: date
		/*viewMode: "months", 
		minViewMode: "months"*/
    });
	$('#datetimepicker3').datetimepicker({
      pickTime: false,
	  startDate: date,
	  format: "MM-yyyy",
	    viewMode: "months", 
	    minViewMode: "months"
    });
	
	$('#datetimepicker3').on('changeDate', function (ev) {
    //close when viewMode='0' (days)
		if(ev.viewMode === 'days'){
			$('#datetimepicker3').datepicker('hide');
		}
	})
	options = {
    pattern: 'yyyy-mm', // Default is 'mm/yyyy' and separator char is not mandatory
    selectedYear: 2014,
    startYear: 2008,
    finalYear: 2016,
    monthNames: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
};
$('#custom_widget').monthpicker(options);

	guidely.add ({
		attachTo: '#target-1'
		, anchor: 'top-left'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.add ({
		attachTo: '#target-2'
		, anchor: 'top-right'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.add ({
		attachTo: '#target-3'
		, anchor: 'middle-middle'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.add ({
		attachTo: '#target-4'
		, anchor: 'top-right'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.init ({ welcome: true, startTrigger: false });


});

</script>