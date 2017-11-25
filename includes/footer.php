	<script src="assets/mdl/material.min.js"></script>
	<script src="assets/modal-mdl/material-modal.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
	<script src="assets/jquery.tabletojson.min.js"></script>
	<!--Add to table functionality
	<script>
		$('.table-add').click(function () {
			var $clone = $(this).closest('table').find('tr.hide').clone(true).removeClass('hide').toggle();
			$(this).closest('table').append($clone);
		});
		$('.table-remove').click(function () {
			$(this).parents('tr').detach();
		});
	</script>-->
	<!-- convert current data from table to JSON format for INSERTING-->
	<!--<script>
		$("#view-source").click(function () {
			var table = $('#grades').tableToJSON();
			alert(JSON.stringify(table));  
			//table = JSON.stringify(table);
			//table = $(this).serialize() + "&" + $.param(table);
			//alert(table);
			$.ajax({
			type: "POST",
			url: "../ajax/updateRecords.php",
			data: {mydata: JSON.stringify(table)},
			success: function(table) {
				// return value
				alert('Saving to database...');
			}
			});
		});
	</script>-->
	<script>
	$("#view-source").click(function(){
		var tableGrades = $('#grades').tableToJSON();
		//alert(JSON.stringify(tableGrades));  
		var tableStudInfo= $('#studentinfo').tableToJSON();
		alert(JSON.stringify(tableStudInfo));  
		// Returns successful data submission message when the entered information is stored in database.
		//var dataString = 'first='+ first + '&second='+ second + '&third='+ third + '&courseid='+ courseid;
		// AJAX Code To Submit Form.
		$.ajax({
		type: "POST",
			url: "../ajax/updateRecords.php",
			data: {studgrades: JSON.stringify(tableGrades), studinfo: JSON.stringify(tableStudInfo)},
			cache: false,
			success: function(result){
				alert("Successfully updated database!");
			}
		});
		return false;
	});
	</script>
  </body>
</html>