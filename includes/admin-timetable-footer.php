	<script src="assets/mdl/material.min.js"></script>
	<script src="assets/modal-mdl/material-modal.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
	<script src="assets/js/jquery.tabletojson.min.js"></script>
	<script src="assets/select-mdl/getmdl-select.min.js"></script>
	
	<script>
		$('.table-add').click(function () {
			var $clone = $(this).closest('table').find('tr.hide').clone(true).removeClass('hide').toggle();
			$(this).closest('table').append($clone);
		});
		$('.table-remove').click(function () {
			$(this).parents('tr').detach();
		});
	</script>
	
	<script>
		$("#updateTimetable").click(function(){
			var timeTable = $('#timetable').tableToJSON();
			//alert(JSON.stringify(timeTable));  
			
			$.ajax({
				type: "POST",
				url: "../php/updateTimetable.php",
				data: {timetable: JSON.stringify(timeTable)},
				cache: false,
				success: function(result){
					//alert("Successfully updated database!");
				}
			});
			
			return false;
		});
	</script>
	
	<!--<script>
		var options = {
					valueNames: ['Year', 'Section']
			};
		var studentTable = new List('students-table', options);
	</script>-->
  </body>
</html>