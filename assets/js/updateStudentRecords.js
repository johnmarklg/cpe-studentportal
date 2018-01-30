$("#updateStudentRecords").click(function(){
	var tableGrades = $('#grades').tableToJSON();
	var tableStudInfo= $('#studentinfo').tableToJSON();
	alert(JSON.stringify(tableGrades));  
	alert(JSON.stringify(tableStudInfo));  
	// Returns successful data submission message when the entered information is stored in database.
	//var dataString = 'first='+ first + '&second='+ second + '&third='+ third + '&courseid='+ courseid;
	// AJAX Code To Submit Form.
	$.ajax({
	type: "POST",
		url: "../php/updateStudentRecords.php",
		data: {studgrades: JSON.stringify(tableGrades), studinfo: JSON.stringify(tableStudInfo)},
		cache: false,
		success: function(result){
			//alert("Successfully updated database!");
		}
	});
	return false;
});