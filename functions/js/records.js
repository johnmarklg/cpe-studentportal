		$('.table').arrowTable({
			enabledKeys: ['left', 'right', 'up', 'down'],
			listenTarget: 'div',
			focusTarget: 'div'
		});
		
		$('select', '.curriculum').on('change', function() {
			if (!confirm('Are you sure you want to change this student\'s curriculum?')) {
				$(this).val(curr_cache);
				return false;
			} else {
				var $newpos = this.value;
				//alert( newpos );
				var $currid = $("#curriculum").val();
				var $studnum = $('#oldstudnum').text();
				//alert($studnum + $currid);
				$.ajax({
					type: "POST",
					url: "/php/updateCurr.php",
					data: {studnum: $studnum, currid: $currid},
					cache: false,
					success: function(result){
						alert("Successfully changed student curriculum! Reloading page.");
						location.reload(); 			
					}
				});			
			}
		})
		
		$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="records.php"]').length;
					  })
					  .addClass('active');
			});
		
		/*$(document).ready(function(){*/
		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
		
		$("#saveStudentRecords").click(function(){
			if($('#studnum').text()==''||$('#surname').text()==''||$('#firstname').text()=='') {
				alert('Please fill the necessary fields.');
			} else {
			var $adminid = $("#adminid").text();
			var $currid = $("#curriculum").val();
			var tableGrades11 = $('#grades1-1').tableToJSON();
			var tableGrades12 = $('#grades1-2').tableToJSON();
			var tableGrades21 = $('#grades2-1').tableToJSON();
			var tableGrades22 = $('#grades2-2').tableToJSON();
			var tableGrades31 = $('#grades3-1').tableToJSON();
			var tableGrades32 = $('#grades3-2').tableToJSON();
			var tableGrades41 = $('#grades4-1').tableToJSON();
			var tableGrades42 = $('#grades4-2').tableToJSON();
			var tableGradesMid = $('#gradesmid').tableToJSON();
			var tableGrades51 = $('#grades5-1').tableToJSON();
			var tableGrades52 = $('#grades5-2').tableToJSON();
			var tableGrades = [].concat(tableGrades11, tableGrades12, tableGrades21, tableGrades22, tableGrades31, tableGrades32, tableGrades41, tableGrades42, tableGradesMid, tableGrades51, tableGrades52);
			var tableStudInfo= $('#studentinfo').tableToJSON();  
			var $address = $('#address').text();
			var $studentData = '[{"Gender":"' + $('#gender').text() + '","Status":"' + $('#status').text() +
			'","Citizenship":"' + $('#citizenship').text() + '","DateOfBirth":"' + $('#birthdate').text() + '","PlaceOfBirth":"' + $('#birthplace').text() 
			+ '","ContactNo":"' + $('#contactnum').text() + '","Address":"' + $('#address').text() 
			+ '","Father":"' + $('#fathername').text() + '","FatherOccupation":"' + $('#fatheroccupation').text() + '","Mother":"' + $('#mothername').text() 
			+ '","MotherOccupation":"' + $('#motheroccupation').text() + '","Elementary":"' + $('#elementary').text() + '","ElemAddress":"' + $('#elemaddress').text() 
			+ '","ElemGraduate":"' + $('#elemgrad').text() + '","Secondary":"' + $('#secondary').text() + '","SecAddress":"' + $('#secaddress').text() 
			+ '","SecGraduate":"' + $('#secgrad').text() + '"}]';
			
			//alert($currid);
			//alert(JSON.stringify(tableGrades));
			$.ajax({
			type: "POST",
				url: "/php/saveStudentRecords.php",
				data: {studgrades: JSON.stringify(tableGrades), studinfo: JSON.stringify(tableStudInfo), studdata: $studentData, adminid: $adminid, currid: $currid},
				cache: false,
				success: function(result){
					alert("Successfully updated student record!");
					location.reload();
				}
			});
			return false;
			}
		});