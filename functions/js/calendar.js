		$('.table-add').click(function () {
			var $clone = $(this).closest('table').find('tr.hide').clone(true).removeClass('hide').toggle();
			$(this).closest('table').append($clone);
		});
		
		//delete event/holiday/suspension
		$('.table-remove').click(function () {
			var r = confirm("Do you want to delete this event/holiday?");
			if (r == true) {
				$(this).parents('tr').detach();
			} else {}
		});

		$('.input-group.date').datetimepicker({format: "YYYY-MM-DD HH:mm:00"});
	
		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
	
		$("#saveEvent").click(function(){
			var $eventname = $('#eventName').val();
			var $eventinfo = $('#eventInfo').val();
			var $eventlocation = $('#eventLoc').val();
			var $startdate = $('#startDate').val();
			var $enddate = $('#endDate').val();
			var $eventData = '[{"Start Date":"' + $startdate + '","End Date":"' + $enddate +
			'","Event Name":"' + $eventname + '","Event Location":"' + $eventlocation + '","Event Info":"' + $eventinfo + '"}]';
			//alert($eventData);
			
			$.ajax({
				type: "POST",
				url: "../php/updateEvents.php",
				data: {events: $eventData},
				cache: false,
				success: function(result){
					//alert("Successfully updated database!");
					location.reload(true); 
				}
			});
			
			return false;
		});

		$("#saveHoliday").click(function(){
			var $eventname = $('#eventName').val();
			var $eventinfo = $('#eventInfo').val();
			var $eventlocation = $('#eventLoc').val();
			var $startdate = $('#startDate').val();
			var $enddate = $('#endDate').val();
			var $eventData = '[{"Start Date":"' + $startdate + '","End Date":"' + $enddate +
			'","Event Name":"' + $eventname + '","Event Location":"' + $eventlocation + '","Event Info":"' + $eventinfo + '"}]';
			//alert($eventData);
			
			$.ajax({
				type: "POST",
				url: "../php/updateHolidays.php",
				data: {events: $eventData},
				cache: false,
				success: function(result){
					//alert("Successfully updated database!");
					location.reload(true); 
				}
			});
			
			return false;
		});

		$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev, next',
						center: 'title',
						right: 'month,listWeek'
					},
					navLinks: true, // can click day/week names to navigate views
					eventLimit: true, // allow "more" link when too many events
					
					events: "/functions/events.php",
					
					eventRender: function (event, element) {
						element.attr('href', 'javascript:void(0);');
						element.click(function() {
							$("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
							$("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
							$("#eventInfo").html(event.description);
							$("#eventName").html(event.title);
							$("#eventLoc").html(event.location);
							$('#modal1').modal('show');
						});
					}

			});
			});

		$('.event-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $eventinfo = '[{"id":"' + $id + '"}]';
			$.ajax({
				type: "POST",
					url: "/php/removeEvent.php",
					data: {eventinfo: $eventinfo},
					cache: false,
					success: function(result){
						//alert("Successfully removed student entry!");
					}
				});
			$(this).parents('tr').detach();			
		} else {}
		});
		$('.holiday-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $holidayinfo = '[{"id":"' + $id + '"}]';
			$.ajax({
				type: "POST",
					url: "/php/removeHoliday.php",
					data: {holidayinfo: $holidayinfo},
					cache: false,
					success: function(result){
						//alert("Successfully removed student entry!");
					}
				});
			$(this).parents('tr').detach();			
		} else {}
		});