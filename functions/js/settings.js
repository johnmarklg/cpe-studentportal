		$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="/org/settings.php"]').length;
				  })
				  .addClass('active');
		});
			
		$('.invoice-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $orgid = $('#orgid').val();
			var $colname = $row.find(".name").text(); // Find the text
			var $invoiceinfo = '[{"id":"' + $id + '","colname":"' + $colname + '"}]';
			//alert($invoiceinfo);
			$.ajax({
				type: "POST",
					url: "/php/removePayment.php",
					data: {infodata: $invoiceinfo, orgid: $orgid},
					cache: false,
					success: function(result){
						alert("Successfully removed entry!");
						location.reload(); 			
					}
				});
			//$(this).parents('tr').detach();			
		} else {}
		});
		
		/*$('#buttonChangePassOrg').click(function() {
		var $id = $('#orgid').val();;
		var $verifyoldpass = $('#oldpasschk').val();;
		var $oldpass = $('#oldpass').val();
		var $newpass = $('#newpass').val();
		var $checkpass = $('#checkpass').val();
		if($oldpass==""||$newpass==""||$checkpass=="") {
			alert("Please fill all the necessary fields.");
		} else {
			if($newpass != $checkpass) {
				alert("Your new password doesn't match.");
			} else {
				if($oldpass != $verifyoldpass) {
					alert("Password is incorrect. Try again");
				} else {
				var $userInfo = '[{"id":"' + $id + '","oldpass":"' + $oldpass + '","newpass":"' + $newpass + '"}]';
				//alert($userInfo);
				$.ajax({
				type: "POST",
					url: "/php/changePassOrg.php",
					data: {infodata: $userInfo},
					cache: false,
					success: function(result){
						alert("Successfully updated password! Please relogin.");
						window.location.replace('/org/logout.php');
						//location.reload();
					}
				});
				}
			}
		}
		//alert($userInfo);
			return false;
	});*/
	
		$('#buttonSave').click(function() {
			var $name = $('#name').val();
			var $orgid = $('#orgid').val();
			var $amount = $('#amount').val();
			$colname = $name.replace(/\s/g,'');
			$colname = $colname.toLowerCase();
			var $payinfo = '[{"Name":"' + $name + '","columnName":"' + $colname + '","Amount":"' + $amount + '"}]';
			//alert($payinfo);
			if($amount==='' || $name==='') {
				alert('Please fill all the necessary fields!');
			} else {
			$.ajax({
				type: "POST",
					url: "/php/addPayment.php",
					data: {infodata: $payinfo, orgid: $orgid},
					cache: false,
					success: function(result){
						//alert("Successfully updated personal details! Please relogin.");
						location.reload();
						//window.location.replace('logout.php');
					}
				});
			}
		});