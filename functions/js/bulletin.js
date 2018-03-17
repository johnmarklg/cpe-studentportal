	$( document ).ready(function() {
		/* Basic Gallery */
		$( '.swipebox' ).swipebox();
		$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="index.php"]').length;
				  })
		.addClass('active');
		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="/org/officers.php"]').length;
		  })
		  .addClass('active');
	});

	$('.remove-office').click(function () {
	if(confirm('Do you want to remove this entry from the database?')) {
		var $row = $(this).closest("tr");    // Find the row
		var $adminid = $('#adminid').val();
		var $id = $row.find(".id").text(); // Find the text
		var $studnum = $row.find(".studnum").text(); // Find the text
		$.ajax({
			type: "POST",
				url: "/php/removeOfficer.php",
				data: {id: $id, adminid: $adminid, studnum: $studnum},
				cache: false,
				success: function(result){
					//alert(result);
					alert("Successfully removed officer record!");
					location.reload(); 			
				}
			});
	} else {}
	});

	$('.showhide').on('change', function() {
	if(($(this).val())!=2) { var $prompt = 'Are you sure you want to change this post\'s visibility on the bulletin?' } else { var $prompt = 'Are you sure you want to dismiss this post? This will remove the post from the show or hide list. This action may be reversed with elevated permissions.'}
	if (!confirm($prompt)) {
		$(this).val(showhide_cache);
		return false;
	} else {
		var $newBool = this.value;
		var $id = this.id;
		var $adminid = $('#posterID').text();
		var $datetime = $(this).attr("name");
		//alert($datetime);
		var $data = '[{"ID":"' + $id + '","showBool":"' + $newBool + '","timestamp":"' + $datetime + '"}]';
		//alert($data);		
		$.ajax({
			type: "POST",
			url: "/php/updatePostVisibility.php",
			data: {admininfo: $data, adminid: $adminid},
			cache: false,
			success: function(result){
				//alert(result);
				alert("Successfully changed post visibility!");
				location.reload();
			}
		});
	}
	})