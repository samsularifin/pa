<!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="<?php echo base_url();?>desainfront/js/jquery.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>desainfront/js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>desainfront/js/jquery.easy-ticker.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>desainfront/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>desainfront/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>desainfront/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>desainfront/js/jquery.isotope.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>desainfront/js/jquery.fancybox.pack.js?v=2.1.0"></script>
        <script type="text/javascript" src="<?php echo base_url();?>desainfront/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>desainfront/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>desainfront/js/revolution.custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>desainfront/js/mail_validation.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>desainfront/js/custom.js"></script>
<script>
$(function(){
	$('.demo1').easyTicker({
		direction: 'up',
		interval: 2000,
		easing: 'swing'
	});
	$("#datetimepicker4").datepicker( {
		format: "mm-yyyy",
		viewMode: "months", 
		minViewMode: "months"
	});
	$('a#btn').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true" src="'+url+'"></iframe>');
	});
	
	$('[data-toggle="modal"]').click(function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		if (url.indexOf('#') == 0) {
		$(url).modal('open');
		}else {
			$.get(url, function(data) {
			$('<div class="modal hide fade">' + data + '</div>').modal();
			}).success(function() { $('input:text:visible:first').focus(); });
		}
	});
	});
</script>