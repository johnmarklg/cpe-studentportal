	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(250)
                        .height(250);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
		
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