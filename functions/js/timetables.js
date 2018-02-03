		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
		
		$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="timetables.php"]').length;
					  })
					  .addClass('active');
		});
	$("#buttonAdd").click(function() {
			var $section = $("#section").val();
			var $code = $("#code").val();
			var $subjectsection = $("#subjectsection").val();
			var $starttime = $("#starttime").val();
			var $endtime = $("#endtime").val();
			var $days = $("#days").val();
			var $building = $("#building").val();
			var $roomnumber = $("#roomnumber").val();
			var $instructor = $("#instructor").val();
			var $units = $("#units").val();
			var $year = $("#year").val();
			
			var $subjinfo = '[{"Section":"' + $section +
			'","Code":"' + $code + '","Subject Section":"' + $subjectsection +
			'","Start Time":"' + $starttime + '","End Time":"' + $endtime +
			'","Days":"' + $days + '","Building":"' + $building + '","Room Number":"' + $roomnumber +
			'","Instructor":"' + $instructor + '","Units":"' + $units + '","Year":"' + $year +'"}]';
			
			//alert($subjinfo);
			
			if($section==""||$code==""||$subjectsection==""||$starttime==""||$endtime==""||$days==""||$building==""||$roomnumber==""||$instructor=="") {
				alert('Error! Please fill all the necessary fields.');
			} else {
				//alert('okay');
				$.ajax({
				type: "POST",
					url: "/php/addSchedule.php",
					data: {subjinfo: $subjinfo},
					cache: false,
					success: function(result){
						//alert("Successfully added a new student record!");
						location.reload();  	
					}
				});
			}
		});
		
		$('.table-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $code = $row.find(".code").text(); // Find the text
			var $subjinfo = '[{"id":"' + $id + '","code":"' + $code + '"}]';
			//alert($subjinfo);
			$.ajax({
				type: "POST",
					url: "/php/removeSchedule.php",
					data: {subjinfo: $subjinfo},
					cache: false,
					success: function(result){
						alert("Successfully removed schedule entry!");
						//location.reload(); 			
					}
				});
			$(this).parents('tr').detach();			
		} else {}
		});