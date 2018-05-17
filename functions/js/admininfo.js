		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="profile.php"]').length;
		  })
		  .addClass('active');
		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="/org/profile.php"]').length;
		  })
		  .addClass('active');
		
		$('#buttonSaveInfo').click(function() {
			var $username = $('#username').val();
			var $password = $('#password').val();
			var $email = $('#position').val();
			var $name = $('#fullname').val();
			var $userid = $('#userid').text();
			var $permission = $('#permission').val();
			//alert($permission);
			var $userInfo = '[{"Name":"' + $name + '","Password":"' + $password +
			'","Position":"' + $email + '","Username":"' + $username + '","ID":"' + $userid + '"}]';
			if(confirm('Are you sure you want to save changes to your profile?')) {
				$.ajax({
					type: "POST",
					url: "/php/saveInfo.php",
					data: {infodata: $userInfo, permission: $permission},
					cache: false,
					success: function(result){
						//alert(result);
						alert("Successfully updated personal details!");
						location.reload(true);
						//window.location.replace('logout.php');
					}
				});
				return false;
			}
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