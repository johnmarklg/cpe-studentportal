	$('#tabAll').click(function(){
		$('#tabAll').addClass('active');  
		$('.tab-pane').each(function(i,t){
			$('#myTabs li').removeClass('active'); 
			$(this).addClass('active');  
		});
	});
	var $studentInfo_cache = $('#studentinfo').tableToJSON();
	var $studentData_cache = JSON.parse('[{"Gender":"' + $('#gender').text() + '","Status":"' + $('#status').text() +
	'","Citizenship":"' + $('#citizenship').text() + '","DateOfBirth":"' + $('#birthdate').text() + '","PlaceOfBirth":"' + $('#birthplace').text() 
	+ '","ContactNo":"' + $('#contactnum').text() + '","Address":"' + $('#address').text() 
	+ '","Father":"' + $('#fathername').text() + '","FatherOccupation":"' + $('#fatheroccupation').text() + '","Mother":"' + $('#mothername').text() 
	+ '","MotherOccupation":"' + $('#motheroccupation').text() + '","Elementary":"' + $('#elementary').text() + '","ElemAddress":"' + $('#elemaddress').text() 
	+ '","ElemGraduate":"' + $('#elemgrad').text() + '","Secondary":"' + $('#secondary').text() + '","SecAddress":"' + $('#secaddress').text() 
	+ '","SecGraduate":"' + $('#secgrad').text() + '"}]');
	$studentData_cache = $.extend(true, $studentInfo_cache, $studentData_cache);
		
	$( document ).ready(function() {
		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="profile.php"]').length;
		  })
		  .addClass('active');
	});

	function removeDuplicates(json_all) {
		var arr = [],
			collection = [];
		
		$.each(json_all, function (index, value) {
			if ($.inArray(value.id, arr) == -1) {
				arr.push(value.id);
				collection.push(value);
			}
		});
		return collection;
	}

	$("#updateStudentProfile").click(function(){
		if ($('#studnum').text()=='') {
			alert('Error. Student Number cannot be blank.');
		} else {
			var $studentInfo= $('#studentinfo').tableToJSON();  
			var $studentData = JSON.parse('[{"Gender":"' + $('#gender').text() + '","Status":"' + $('#status').text() +
			'","Citizenship":"' + $('#citizenship').text() + '","DateOfBirth":"' + $('#birthdate').text() + '","PlaceOfBirth":"' + $('#birthplace').text() 
			+ '","ContactNo":"' + $('#contactnum').text() + '","Address":"' + $('#address').text() 
			+ '","Father":"' + $('#fathername').text() + '","FatherOccupation":"' + $('#fatheroccupation').text() + '","Mother":"' + $('#mothername').text() 
			+ '","MotherOccupation":"' + $('#motheroccupation').text() + '","Elementary":"' + $('#elementary').text() + '","ElemAddress":"' + $('#elemaddress').text() 
			+ '","ElemGraduate":"' + $('#elemgrad').text() + '","Secondary":"' + $('#secondary').text() + '","SecAddress":"' + $('#secaddress').text() 
			+ '","SecGraduate":"' + $('#secgrad').text() + '"}]');
			var $oldstudnum = $(this).val();
			$studentData = $.extend(true, $studentInfo, $studentData);
			console.log($studentData);
			if((JSON.stringify($studentData)) != (JSON.stringify($studentData_cache))) {
						if(confirm('Are you sure you want to update your student\'s profile?')) {
							$.ajax({
								type: "POST",
								url: "/php/updateStudentProfile.php",
								data: {studprofile: JSON.stringify($studentData), oldstudnum: $oldstudnum},
								cache: false,
								success: function(result){
									alert(result);
									location.reload();
								}
							});
						}
			} else {
					alert('No changes. Cancelling.');
			}
			return false;
		}
	});