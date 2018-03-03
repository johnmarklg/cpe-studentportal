		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="profile.php"]').length;
		  })
		  .addClass('active');
		
		$('#buttonSaveInfo').click(function() {
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
		
		$( '.swipebox' ).swipebox();	
		
		$('#toggle-pass').click(function() {
			if(($(this).text()) == 'Show') {
				$(this).text('Hide');
				$('#password').attr('type','text');
			} else {
				$(this).text('Show');
				$('#password').attr('type','password');
			}
		});