<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Jadwal tersedia</h3>
		</div>
	<!-- /widget-header -->
		<div class="widget-content" >
				<div id='calendar'>
              </div>
		</div>
</div>
<script src="<?php echo base_url();?>desaintutor/js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url();?>desaintutor/js/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>desaintutor/js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>desaintutor/js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>desaintutor/js/full-calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>desaintutor/js/base.js"></script>
<script>
		$(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
		  <?php
			foreach($mengajar as $data){
		  ?>
            {
              title: '<?php echo $data->NAMA_LENGKAP;?>,<?php echo $data->NAMA_PELATIHAN;?>, <?php echo $data->JAM_MENGAJAR;?>',
              start: new Date(y, '<?php echo $data->BULAN_MENGAJAR;?>'-1, <?php echo $data->TANGGAL_MENGAJAR;?>)
            },
			<?php
				}
			?>
           /* {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }*/
          ]
        });
      });
		function goBack()
		{
			window.history.back()
		}
</script>