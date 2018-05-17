	$('#curriculum-add').click(function() {
		var $name = $('#currname').val();
		var $adminid= $('#adminid').val();
		if(confirm('Are you sure you want to add this curriculum?')) {
			$.ajax({
				type: "POST",
				url: "/php/addCurriculum.php",
				data: {name: $name, adminid: $adminid},
				cache: false,
				success: function(result){
					alert("Successfully added curriculum!");
					location.reload();
				}
			});
			return false;
		}
	});

	$('.curriculum-remove').click(function () {
	if(confirm('Are you sure you want to remove this curriculum from the database? Note: This will not delete saved records dependent on this curriculum.')) {
		var $row = $(this).closest("tr");    // Find the row
		var $id = $row.find(".id").text(); // Find the text
		var $colname = $row.find(".name").text(); // Find the text
		var $colinfo = '[{"id":"' + $id + '","colname":"' + $colname + '"}]';
		var $adminid= $('#adminid').val();
		//alert($colinfo);
		$.ajax({
			type: "POST",
				url: "/php/removeCurriculum.php",
				data: {infodata: $colinfo, adminid: $adminid},
				cache: false,
				success: function(result){
					alert("Successfully removed entry!");
					location.reload(); 			
				}
			});
	} else {}
	});


	$subjectid = 0;

	$('select', '.curriculum').on('change', function() {
		if((this.value)!=0) {
			var $currid = this.value;
			var $currname = this.options[this.value].text;
			//alert( newpos );
			//alert($currid + ' ' + $currname);
			$.ajax({
				type: "POST",
				url: "/php/showCurr.php",
				data: {currid: $currid, currname: $currname},
				cache: false,
				success: function(result){
					$('.currdiv').remove();
					$(result).appendTo(".container-fluid");
				}
			});
		}
	})
	$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="curriculum.php"]').length;
				  })
				  .addClass('active');
	});

	$('.container-fluid').on('click', '.entry-add', function () {
		$table = $(this).closest('table');
		var $clone = $table.find('tr.hide').clone(true).removeClass('hide').toggle();
		$table.append($clone);
	});

	$('.container-fluid').on('click', '.entry-remove', function () {
	if(confirm('Are you sure you want to remove this subject from the curriculum?')) {
		var $subjectid = $(this).parents('tr').find('td.subjectid').text();
		//alert($subjectid);
		var $adminid= $('#adminid').val();
		var $subjectdata = $(this).parents('tr').tableToJSON();
		//alert($subjectdata);
		if($subjectid != "") {
			$.ajax({
				type: "POST",
				url: "/php/deleteSubject.php",
				data: {subjectid: $subjectid, adminid: $adminid},
				cache: false,
				success: function(result){
					alert('Subject successfully deleted from the database.');
					location.reload();
				}
			});
		} else {
			$(this).parents('tr').detach();
		}
	}
	});

	$('.container-fluid').on('click', '.entry-update', function () {
		$subjectid = $(this).parents('tr').find('td.subjectid').text();
		$currid = $('#curriculum').find(":selected").val();
		//alert($subjectid + ', ' + $currid);
		$defaultyear = $(this).parents('tr').find('.defaultyear').text();
		$defaultsemester = $(this).parents('tr').find('.defaultsemester').text();
		$coursecode = $(this).parents('tr').find('.coursecode').text();
		$coursetitle = $(this).parents('tr').find('.coursetitle').text();
		$units = $(this).parents('tr').find('.units').text();
		$prerequisite = $(this).parents('tr').find('.prerequisite').text();
		$corequisite = $(this).parents('tr').find('.corequisite').text();
		$year = $(this).parents('tr').find('.year').text();
		$subjectdata = '[{"Default Year":"' + $defaultyear + '","Default Semester":"' + $defaultsemester + '","Course Code":"' + $coursecode + '","Course Title":"' + $coursetitle + '","Units":"' + $units + '","Pre-Requisite":"' + $prerequisite + '","Co-Requisite":"' + $corequisite + '","Year":"' + $year+ '"}]';
		var $adminid= $('#adminid').val();
		if(confirm('Are you sure you want to add/update this subject?')) {
			$.ajax({
				type: "POST",
				url: "/php/updateSubject.php",
				data: {subjectid: $subjectid, currid: $currid, subjectdata: $subjectdata, adminid: $adminid},
				cache: false,
				success: function(result){
					//alert(result);
					alert('Successfully updated from the database.');
					location.reload();
				}
			});
		}
	});