		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});

		$('.table-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $studnum = $row.find(".studnum").text(); // Find the text
			var $studinfo = '[{"studnum":"' + $studnum + '"}]';
			//alert($studinfo);
			$.ajax({
				type: "POST",
					url: "/php/removeStudent.php",
					data: {studinfo: $studinfo},
					cache: false,
					success: function(result){
						//alert("Successfully removed student entry!");
						location.reload(); 			
					}
				});
			$(this).parents('tr').detach();			
		} else {}
		});
		
		$(document).ready(function(){
			/*$('.formTextbox').keypress(function(e){
			  if(e.keyCode==13)
			  $('#buttonAdd').click();
			});*/
			$('li', '#tabs').filter(function() {
				return !! $(this).find('a[href="students.php"]').length;
			  })
			  .addClass('active');
		});
		
		$("#buttonAdd").click(function() {
			var $currid = $("#curriculum").val();
			var $studnum = $("#studnum").val();
			var $adminid = $("#adminid").text();
			var $firstname = $("#firstname").val();
			var $middlename = $("#middlename").val();
			var $surname= $("#surname").val();
			var $cfatscore = $("#cfatscore").val();
			var $passcode = $("#passcode").val();
			var $yearstarted = $studnum.substr(0,2);
			
			var $studinfo = '[{"Student Number":"' + $studnum +
			'","Surname":"' + $surname + '","First Name":"' + $firstname +
			'","Middle Name":"' + $middlename + '","CFAT Score":"' + $cfatscore +
			'","Passcode":"' + $passcode + '","Year Started":"' + $yearstarted + '","Curriculum ID":"' + $currid +'"}]';
			
			//alert($studinfo);
			
			if($studnum=="00-0000"||$studnum=="") {
				alert('Error! Please fill all the necessary fields.');
			} else {
				//alert($studinfo);
				$.ajax({
				type: "POST",
					url: "/php/addStudent.php",
					data: {studinfo: $studinfo, adminid: $adminid},
					cache: false,
					success: function(result){
						//console.log(result);
						alert("Successfully added a new student record!");
						location.reload();  	
					}
				});
			}
		});