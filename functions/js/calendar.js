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
			var $adminid = $('#adminid').val();
			//alert($adminid);
			
			$.ajax({
				type: "POST",
				url: "../php/updateEvents.php",
				data: {events: $eventData, adminid: $adminid},
				cache: false,
				success: function(result){
					//alert(result);
					alert("Successfully added event to database!");
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
			var $adminid = $('#adminid').val();
			var $eventData = '[{"Start Date":"' + $startdate + '","End Date":"' + $enddate +
			'","Event Name":"' + $eventname + '","Event Location":"' + $eventlocation + '","Event Info":"' + $eventinfo + '"}]';
			//alert($adminid);
			
			$.ajax({
				type: "POST",
				url: "../php/updateHolidays.php",
				data: {events: $eventData, adminid: $adminid},
				cache: false,
				success: function(result){
					//alert(result);
					alert("Successfully added holiday to database!");
					location.reload(true); 
				}
			});
			
			return false;
		});

		$(document).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="calendar.php"]').length;
				  })
				  .addClass('active');
					  
				$('#calendar').fullCalendar({
					header: {
						left: 'prev, next',
						center: 'title',
						right: 'month,agendaWeek,listWeek'
					},
					themeSystem: 'bootstrap3',
					navLinks: true, // can click day/week names to navigate views
					eventLimit: true, // allow "more" link when too many events
					
					events: "/functions/events.php",
					
					eventRender: function (event, element) {
						element.attr('href', 'javascript:void(0);');
						element.click(function() {
							$("#beginTime").html(moment(event.start).format('MMM Do h:mm A'));
							$("#closeTime").html(moment(event.end).format('MMM Do h:mm A'));
							$("#eventDesc").html(event.description);
							$("#eventTitle").html(event.title);
							$("#eventLocat").html(event.location);
							$('#modal1').modal('show');
						});
					}

			});
			});

		$('.event-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $adminid = $('#adminid').val();
			var $eventinfo = '[{"id":"' + $id + '","adminid":"' + $adminid+'"}]';
			//alert($eventinfo);
			$.ajax({
				type: "POST",
					url: "/php/removeEvent.php",
					data: {eventinfo: $eventinfo},
					cache: false,
					success: function(result){
						//alert(result);
						alert("Successfully removed event from database!");
						location.reload();
					}
				});
			$(this).parents('tr').detach();			
		} else {}
		});
		$('.holiday-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $adminid = $('#adminid').val();
			var $holidayinfo = '[{"id":"' + $id + '","adminid":"' + $adminid+'"}]';
			//alert($holidayinfo);
			$.ajax({
				type: "POST",
					url: "/php/removeHoliday.php",
					data: {holidayinfo: $holidayinfo},
					cache: false,
					success: function(result){
						//alert(result);
						alert("Successfully removed holiday from database!");
						location.reload();
					}
				});
			$(this).parents('tr').detach();			
		} else {}
		});