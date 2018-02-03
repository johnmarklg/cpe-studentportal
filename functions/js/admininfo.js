		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="index.php"]').length;
		  })
		  .addClass('active');
					  
					  
		autosize($('textarea'));
		
		$('#buttonSave').click(function() {
			var $username = $('#username').val();
			var $password = $('#password').val();
			var $email = $('#email').val();
			var $name = $('#fullname').val();
			var $userid = $('#userid').text();
			var $userInfo = '[{"Name":"' + $name + '","Password":"' + $password +
			'","Email":"' + $email + '","Username":"' + $username + '","ID":"' + $userid + '"}]';
			//alert($userInfo);
			$.ajax({
				type: "POST",
					url: "/php/saveInfo.php",
					data: {infodata: $userInfo},
					cache: false,
					success: function(result){
						alert("Successfully updated personal details! Please relogin.");
						//location.reload();
						window.location.replace('logout.php');
					}
				});
				return false;
		});