	$( document ).ready(function() {
		$('li', '#tabs').filter(function() {
			return !! $(this).find('a[href="about.php"]').length;
		  })
		  .addClass('active');
	});

	$('#aboutText').keyup(function() {
		var content = $('#aboutText').val();
		$('#previewText').html(content);
	});

	$('#aboutTitle').keyup(function() {
		var content = $('#aboutTitle').val();
		$('#previewTitle').html(content);
	});

	$('#btnSaveAbout').click(function() {
		var $aboutTitle = $('#aboutTitle').val(); 
		var $aboutText = $('#aboutText').val();
		if(confirm('Are you sure you want to save changes to this section?')) {
			$.ajax({
				type: "POST",
				url: "/php/updateAbout.php",
				data: {title: $aboutTitle, text: $aboutText},
				cache: false,
				success: function(result){
					alert('Successfully updated the About Section!');
					location.reload();
				}
			});
		}
	});