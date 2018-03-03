	autosize($('textarea'));
	$('.swipebox').swipebox();
		
	$( document ).ready(function() {
		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="announcements.php"]').length;
		  })
		.addClass('active');
	});

	$('.btnComment').click(function() {
	var $parentid = $(this).attr('id');   
	var $commenttext = $(('#comment' + $parentid)).val().replace(/\n/g, "<br />");   
	var $commenterid = $(".post").attr('name');   
	var $postid = $(".post").attr('id');   
	var $commentinfo = '[{"parentID":"' + $parentid + '","commentText":"' + $commenttext  + '","commenterID":"' + $commenterid  + '","postID":"' + $postid+ '"}]';
	//alert($commentinfo);
	if($commenttext === '' || $commenttext === ' ' ) {
		alert('Error. Please input comment first.');
	} else {
	$.ajax({
			type: "POST",
				url: "/php/postComment.php",
				data: {commentinfo: $commentinfo},
				cache: false,
				success: function(result){
					//alert(result);
					location.reload();
				}
			});
	}
	});