	$( document ).ready(function() {
		/* Basic Gallery */
		$( '.swipebox' ).swipebox();
		$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="index.php"]').length;
				  })
		.addClass('active');
	});

	$('.remove-office').click(function () {
	if(confirm('Do you want to remove this entry from the database?')) {
		var $row = $(this).closest("tr");    // Find the row
		var $id = $row.find(".id").text(); // Find the text
		$.ajax({
			type: "POST",
				url: "/php/removeOfficer.php",
				data: {id: $id},
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
	if (!confirm('Are you sure you want to change this post\'s visibility on the bulletin?')) {
		$(this).val(showhide_cache);
		return false;
	} else {
		var $newBool = this.value;
		var $id = this.id;
		var $datetime = $(this).attr("name");
		//alert($datetime);
		var $data = '[{"ID":"' + $id + '","showBool":"' + $newBool + '","timestamp":"' + $datetime + '"}]';
		//alert($data);		
		$.ajax({
			type: "POST",
			url: "/php/updatePostVisibility.php",
			data: {admininfo: $data},
			cache: false,
			success: function(result){
				alert("Successfully changed post visibility!");
				//location.reload();
			}
		});
	}
	})