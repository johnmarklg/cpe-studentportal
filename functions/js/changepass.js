	$('#buttonChangePassStudent').click(function() {
		var $studnum = $('#studnum').val();
		var $verifyoldpass = $('#oldpasschk').val();
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
				var $userInfo = '[{"studnum":"' + $studnum + '","oldpass":"' + $oldpass + '","newpass":"' + $newpass + '"}]';
				//alert($userInfo);
				$.ajax({
				type: "POST",
					url: "/php/changePass.php",
					data: {infodata: $userInfo},
					cache: false,
					success: function(result){
						alert("Successfully updated password! Please relogin.");
						window.location.replace('logout.php');
						//location.reload();
					}
				});
				}
			}
		}
		//alert($userInfo);
			return false;
	});
	
	$('#buttonChangePassOrg').click(function() {
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
	});
	
	$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="changepass.php"]').length;
				  })
				  .addClass('active');
		});