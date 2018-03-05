		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
		
		$bool = false;
		$(".surname, .firstname, .middlename, .passcode").dblclick(function () {
			var $status = $(this).attr('contenteditable');
			if($bool==false) {
				if($status == 'false') {
					$cache_val = $(this).text();
					//alert($cache_val);
					$bool = true;
					$(this).attr('contenteditable', true);
					$(this).css({"border-color": "#b0d0ed", "border-width":"3px", "border-style":"solid"});
					//#C1E0FF
				} else {
					$bool = false;
					$(this).attr('contenteditable', false);
					$(this).css({"border":"none"})
				}
			} else {
				if ($status== 'true') {
					//save and false editable again
					$bool = false;
					if(($(this).text()) === $cache_val) {} else {
						if(confirm('Do you really want to update this entry?')) {
							//save and update
							var $row = $(this).closest("tr");    // Find the row
							var $studnum = $row.find(".studnum").text(); // Find the text
							var $header = $(this).closest('table').find('th').eq($(this).index()).text();
							var $update = $(this).text();
							if ($header === 'Surname') {
								var $colname = 'surname';
							} else if ($header === 'First Name') {
								var $colname = 'firstname';
							} else if ($header === 'Middle Name') {
								var $colname = 'middlename';
							} else {
								var $colname = 'passcode';
							}
							$.ajax({
								type: "POST",
								url: "/php/updateBasicProfile.php",
								data: {studnum: $studnum, colname: $colname, update: $update},
								cache: false, 
								success: function(result){
									//alert(result);
									console.log('Update Successful.')
								}
							});
						} else {
							$(this).text($cache_val);
						}
					}					
					$(this).attr('contenteditable', false);
					$(this).css({"border":"none"})
				}
			}
		});

		$('.table-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $studnum = $row.find(".studnum").text(); // Find the text
			var $adminid = $("#adminid").text();
			var $studinfo = '[{"studnum":"' + $studnum + '"}]';
			//alert($studinfo);
			$.ajax({
				type: "POST",
					url: "/php/removeStudent.php",
					data: {studinfo: $studinfo, adminid: $adminid},
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