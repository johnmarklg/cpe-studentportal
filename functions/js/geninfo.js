	$('#title1').keyup(function() {
		var content = $('#title1').val();
		$('#1a').html(content);
	});
	$('#title2').keyup(function() {
		var content = $('#title2').val();
		$('#2a').html(content);
	});
	$('#title3').keyup(function() {
		var content = $('#title3').val();
		$('#3a').html(content);
	});
	$('#title4').keyup(function() {
		var content = $('#title4').val();
		$('#4a').html(content);
	});
	$('#title5').keyup(function() {
		var content = $('#title5').val();
		$('#5a').html(content);
	});
	$('#title6').keyup(function() {
		var content = $('#title6').val();
		$('#6a').html(content);
	});

	$('#text1').keyup(function() {
		var content = $('#text1').val();
		$('#1b').html(content);
	});
	$('#text2').keyup(function() {
		var content = $('#text2').val();
		$('#2b').html(content);
	});
	$('#text3').keyup(function() {
		var content = $('#text3').val();
		$('#3b').html(content);
	});
	$('#text4').keyup(function() {
		var content = $('#text4').val();
		$('#4b').html(content);
	});
	$('#text5').keyup(function() {
		var content = $('#text5').val();
		$('#5b').html(content);
	});
	$('#text6').keyup(function() {
		var content = $('#text6').val();
		$('#6b').html(content);
	});

	$('#btnSave1').click(function() {
		var $ref2a = $('#title1').val();
		var $ref3a = $('#title2').val();
		var $ref4a = $('#title3').val();
		var $ref2b = $('#text1').val();
		var $ref3b = $('#text2').val();
		var $ref4b = $('#text3').val();
		var r = confirm("Are you sure you want to save changes to this section?");
		if (r == true) {
			$.ajax({
				type: "POST",
					url: "/php/updateMVGO.php",
					data: {title1: $ref2a, text1: $ref2b, title2: $ref3a, text2: $ref3b, title3: $ref4a, text3: $ref4b},
					cache: false,
					success: function(result){
						//alert(result);
						alert('Successfully updated the MVGO section!');
						location.reload();
					}
			});
		}
	});

	$('#btnSave2').click(function() {
		var $ref5a = $('#title4').val();
		var $ref6a = $('#title5').val();
		var $ref7a = $('#title6').val();
		var $ref5b = $('#text4').val();
		var $ref6b = $('#text5').val();
		var $ref7b = $('#text6').val();
		var r = confirm("Are you sure you want to save changes to this section?");
		if (r == true) {
			$.ajax({
				type: "POST",
					url: "/php/updateSRDC.php",
					data: {title4: $ref5a, text4: $ref5b, title5: $ref6a, text5: $ref6b, title6: $ref7a, text6: $ref7b},
					cache: false,
					success: function(result){
						//alert(result);
						alert('Successfully updated the SRDC section!');
						location.reload();
					}
			});
		}
	});

	$( document ).ready(function() {
			$('li', '#tabs').filter(function() {
				return !! $(this).find('a[href="geninfo.php"]').length;
			  })
			  .addClass('active');
	});