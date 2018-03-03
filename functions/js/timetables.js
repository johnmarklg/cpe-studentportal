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
		
		$(function () {
			$('#starttime').datetimepicker({
				format: 'LT'
			});
			$('#endtime').datetimepicker({
				format: 'LT'
			});
		});
		
		
		$("#buttonAdd").click(function() {
			var $section = $("#section").val();
			var $subjectid = $("#code").val();
			var $subjectsection = $("#subjectsection").val();
			var $starttime = $("#starttime").val();
			var $endtime = $("#endtime").val();
			//var $days = $("#days").val();
			if ($('input.mon').is(':checked')) { var $mon = 1;} else { var $mon = 0;}
			if ($('input.tue').is(':checked')) { var $tue = 1;} else { var $tue = 0;}
			if ($('input.wed').is(':checked')) { var $wed = 1;} else { var $wed = 0;}
			if ($('input.thu').is(':checked')) { var $thu = 1;} else { var $thu = 0;}
			if ($('input.fri').is(':checked')) { var $fri = 1;} else { var $fri = 0;}
			if ($('input.sat').is(':checked')) { var $sat = 1;} else { var $sat = 0;}
			//var checkedValue = $('.daycheck:checked').val();
			var $building = $("#building").val();
			var $roomnumber = $("#roomnumber").val();
			var $instructor = $("#instructor").val();
			//var $units = $("#units").val();
			//var $year = $("#year").val();
			var $subjinfo = '[{"Section":"' + $section +
			'","SubjectID":"' + $subjectid + '","Subject Section":"' + $subjectsection +
			'","Start Time":"' + $starttime + '","End Time":"' + $endtime + '","Building":"' + $building + '","Room Number":"' + $roomnumber +
			'","Monday":"' + $mon + '","Tuesday":"' + $tue + '","Wednesday":"' + $wed
			+ '","Thursday":"' + $thu + '","Friday":"' + $fri + '","Saturday":"' + $sat +
			'","Instructor":"' + $instructor + '"}]';
			
			alert($subjinfo);
			
			if($section==""||$subjectid==""||$subjectsection==""||$starttime==""||$endtime==""||($mon==""&&$tue==""&&$wed==""&&$thu==""&&$fri==""&&$sat=="")||$building==""||$roomnumber==""||$instructor=="") {
				alert('Error! Please fill all the necessary fields.');
			} else {
				//alert('okay');
				$.ajax({
				type: "POST",
					url: "/php/addSchedule.php",
					data: {subjinfo: $subjinfo},
					cache: false,
					success: function(result){
						alert("Successfully added a new schedule!");
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