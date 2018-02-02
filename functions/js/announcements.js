			autosize($('textarea'));
		
		$('.btnApprove').click(function() {
			var $id = $(this).attr('id');   
			var $postinfo = '[{"id":"' + $id + '"}]';
			//alert($postinfo);
			if(confirm('Do you want to approve this post for publishing?')) {
				$.ajax({
					type: "POST",
						url: "/php/approvePost.php",
						data: {postData: $postinfo},
						cache: false,
						success: function(result){
							location.reload();
						}
					});
			} else {}
		});
		
		$('.post-remove').click(function () {
			var $id = $(this).attr('id'); 
			var $postinfo = '[{"id":"' + $id + '"}]';
			//alert($postinfo);
			if(confirm('Do you want to remove this entry from the database?')) {
				$.ajax({
					type: "POST",
						url: "/php/deleteAnnouncement.php",
						data: {postData: $postinfo},
						cache: false,
						success: function(result){
							//deleted
							location.reload();
						}
					});
			} else {}
		});
	
	$( document ).ready(function() {
			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
			
      });