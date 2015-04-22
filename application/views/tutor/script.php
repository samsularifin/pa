<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>desaintutor/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>desaintutor/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>desaintutor/js/base.js"></script>
<script src="<?php echo base_url();?>desaintutor/js/guidely/guidely.min.js"></script>
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