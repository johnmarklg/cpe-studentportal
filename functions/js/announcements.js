		autosize($('textarea'));
		
		$('.btnApprove').click(function() {
			var $id = $(this).attr('id');   
			var $posterid = $(this).val();
			var $approver= $(this).attr('name');   
			var $postinfo = '[{"id":"' + $id + '","posterid":"' + $posterid + '","approver":"' + $approver + '"}]';
			//alert($postinfo);
			if(confirm('Do you want to approve this post for publishing?')) {
				$.ajax({
					type: "POST",
						url: "/php/approvePost.php",
						data: {postData: $postinfo},
						cache: false,
						success: function(result){
							//alert(result);
							//location.reload();
							var $myUrl = 'announcements.php?t=' + new Date().getTime();
							window.location = $myUrl;
						}
					});
			} else {}
		});
		
		$('.post-remove').click(function () {
			var $id = $(this).attr('id'); 
			var $posterid = $(this).attr('value');
			var $deleter= $(this).attr('name');   
			var $postinfo = '[{"id":"' + $id + '","posterid":"' + $posterid + '","deleter":"' + $deleter + '"}]';
			alert($postinfo);
			if(confirm('Do you want to remove this entry from the database?')) {
				$.ajax({
					type: "POST",
						url: "/php/deleteAnnouncement.php",
						data: {postData: $postinfo},
						cache: false,
						success: function(result){
							alert(result);
							//deleted
							location.reload();
						}
					});
			} else {}
		});
	
	$( document ).ready(function() {
			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
			$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="announcements.php"]').length;
			  })
			.addClass('active');
			$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="/org/announcements.php"]').length;
			  })
			.addClass('active');
      });
	  
	$(document).on('click', '#close-preview', function(){ 
		$('.image-preview').popover('hide');
		// Hover befor close the preview
		$('.image-preview').hover(
			function () {
			   $('.image-preview').popover('show');
			}, 
			 function () {
			   $('.image-preview').popover('hide');
			}
		);    
	});

	$(function() {
		// Create the close button
		var closebtn = $('<button/>', {
			type:"button",
			text: 'x',
			id: 'close-preview',
			style: 'font-size: initial;',
		});
		closebtn.attr("class","close pull-right");
		// Set the popover default content
		$('.image-preview').popover({
			trigger:'manual',
			html:true,
			title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
			content: "There's no image",
			placement:'bottom'
		});
		// Clear event
		$('.image-preview-clear').click(function(){
			$('.image-preview').attr("data-content","").popover('hide');
			$('.image-preview-filename').val("");
			$('.image-preview-clear').hide();
			$('.image-preview-input input:file').val("");
			$(".image-preview-input-title").text("Browse"); 
		}); 
		// Create the preview image
		$(".image-preview-input input:file").change(function (){     
			var img = $('<img/>', {
				id: 'dynamic',
				width:250,
				height:200
			});      
			var file = this.files[0];
			var reader = new FileReader();
			// Set preview image into the popover data-content
			reader.onload = function (e) {
				$(".image-preview-input-title").text("Change");
				$(".image-preview-clear").show();
				$(".image-preview-filename").val(file.name);            
				img.attr('src', e.target.result);
				$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
			}        
			reader.readAsDataURL(file);
		});  
	});