	$('#account-add').click(function() {
		var $name = $('#name').val();
		var $adminid = $('#adminid').text();
		var $username = $('#username').val();
		var $password = $('#password').val();
		var $email = $('#email').val();
		var $permissionlevel = $('#sel1').val();
		//alert($name + $username + $password + $email + $permissionlevel);
		$.ajax({
			type: "POST",
				url: "/php/addAdmin.php",
				data: {name: $name, username: $username, password: $password, email: $email, permission: $permissionlevel, adminid: $adminid},
				cache: false,
				success: function(result){
					alert("Successfully registered administrator account!");
					location.reload();
				}
			});
	});

	$('.account-remove').click(function () {
		if(confirm('Do you want to really remove this account from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $adminid = $('#adminid').text();
			var $id = $row.find(".id").text(); // Find the text
			//alert($id);
			$.ajax({
				type: "POST",
					url: "/php/removeAdmin.php",
					data: {id: $id, adminid: $adminid},
					cache: false,
					success: function(result){
						alert("Successfully removed administrator account!");
						location.reload(); 			
					}
				});
		} else {}
		});
		
	$( document ).ready(function() {
			$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="administrators.php"]').length;
					  })
			.addClass('active');
	 });
	 
	 $('select', '.permissions').on('change', function() {
		if (!confirm('Are you sure you want to change this administrator\'s permissions?')) {
			$(this).val(permissions_cache);
			return false;
		} else {
			var $newpos = this.value;
			//alert( newpos );
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $adminid = $('#adminid').text();
			//alert ($adminid);
			var $data = '[{"ID":"' + $id + '","Level":"' + $newpos + '"}]';
			//alert($data);		
				$.ajax({
					type: "POST",
					url: "/php/updateAdminPermissions.php",
					data: {admininfo: $data, adminid: $adminid},
					cache: false,
					success: function(result){
						if($adminid===$id) {
								alert("This account's permissions have been modified. Please relogin.");
								window.location.replace('logout.php');
						}
					}
				});			
		}
	})
	$('i', '.passwd').on('dblclick', function() {
		/*if (!confirm('Are you sure you want to show the password?')) {
			return false;
		} else {
			var $pass = this.id;
			$(this).text($pass);
			//alert($pass);
		}*/
		var $pass = $(this).text();
		var $encry = $(this).attr('id');
		var $decry = $(this).attr('name');
		if (!confirm('Are you sure you want to toggle the password?')) {
			return false;
		} else {
			if ($pass === $decry) {
					$(this).text($encry);
			} else {
				$(this).text($decry);
			}
		}
		//alert($decry);
	})