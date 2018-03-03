	$('#title1').keyup(function() {
		var content = $('#title1').val();
		$('#title1a').html(content);
	});
	$('#title2').keyup(function() {
		var content = $('#title2').val();
		$('#title2a').html(content);
	});
	$('#text1').keyup(function() {
		var content = $('#text1').val();
		$('#text1a').html(content);
	});
	$('#text2').keyup(function() {
		var content = $('#text2').val();
		$('#text2a').html(content);
	});

	$('#btnSave1').click(function() {
		var $ref8a = $('#title1').val();
		var $ref8b = $('#text1').val();
		var $sel = '1';
		$.ajax({
			type: "POST",
				url: "/php/updateHM.php",
				data: {title: $ref8a, text: $ref8b, sel: $sel},
				cache: false,
				success: function(result){
					//alert(result);
					alert('Successfully updated this section!');
					location.reload();
				}
		});
	});
	$('#btnSave2').click(function() {
		var $ref9a = $('#title2').val();
		var $ref9b = $('#text2').val();
		var $sel = '2';
		$.ajax({
			type: "POST",
				url: "/php/updateHM.php",
				data: {title: $ref9a, text: $ref9b, sel: $sel},
				cache: false,
				success: function(result){
					//alert(result);
					alert('Successfully updated this section!');
					location.reload();
				}
		});
	});


	$( document ).ready(function() {
			$('li', '#tabs').filter(function() {
				return !! $(this).find('a[href="hymnmarch.php"]').length;
			  })
			  .addClass('active');
	});