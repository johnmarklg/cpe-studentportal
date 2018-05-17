	$( document ).ready(function() {
			$('li', '#tabs').filter(function() {
				return !! $(this).find('a[href="profilereq.php"]').length;
			  })
			  .addClass('active');
	});
	
	$('.deleteReq').click(function() {
		if(confirm('Are you sure you want to deny this request?')) {
			var $requestid = $(this).attr('id'); 
			var $adminid = $('#adminid').text();	
			var $studnum = $('#cachestudnum' + $requestid).text();  	
			//alert($requestid + $adminid + $studnum);
			$.ajax({
				type: "POST",
					url: "/php/denyProfileChange.php",
					data: {adminid: $adminid, requestid: $requestid, studnum: $studnum},
					cache: false,
					success: function(result){
						alert(result);
						location.reload();
					}
				});
		}
	});
		
		
	$('.btnApproveChange').click(function() {
		var $requestid = $(this).attr('id');   
		var $requesterid = $(this).attr('name');   
		//alert($requestid + ' ' + $requesterid);
		var $studnum = $('#cachestudnum' + $requestid).text();   
		if ($('#surname' + $requestid).text() != '') {
			var $surname = $('#surname' + $requestid).text();   
		} else {
			var $surname = $('#cachesurname' + $requestid).text();   
		}
		if ($('#firstname' + $requestid).text() != '') {
			var $firstname= $('#firstname' + $requestid).text();   
		} else {
			var $firstname= $('#cachefirstname' + $requestid).text();   
		}
		if ($('#middlename' + $requestid).text() != '') {
			var $middlename= $('#middlename' + $requestid).text();   
		} else {
			var $middlename= $('#cachemiddlename' + $requestid).text();   
		}
		if ($('#Gender' + $requestid).text() != '') {
			var $Gender = $('#Gender' + $requestid).text();   
		} else {
			var $Gender = $('#cacheGender' + $requestid).text();   
		}
		if ($('#Status' + $requestid).text() != '') {
			var $Status = $('#Status' + $requestid).text();   
		} else {
			var $Status = $('#cacheStatus' + $requestid).text();   
		}
		if ($('#Citizenship' + $requestid).text() != '') {
			var $Citizenship = $('#Citizenship' + $requestid).text();   
		} else {
			var $Citizenship = $('#cacheCitizenship' + $requestid).text();   
		}
		if ($('#DateOfBirth' + $requestid).text() != '') {
			var $DateOfBirth = $('#DateOfBirth' + $requestid).text();   
		} else {
			var $DateOfBirth = $('#cacheDateOfBirth' + $requestid).text();   
		}
		if ($('#PlaceOfBirth' + $requestid).text() != '') {
			var $PlaceOfBirth = $('#PlaceOfBirth' + $requestid).text();   
		} else {
			var $PlaceOfBirth = $('#cachePlaceOfBirth' + $requestid).text();   
		}
		if ($('#ContactNo' + $requestid).text() != '') {
			var $ContactNo = $('#ContactNo' + $requestid).text();   
		} else {
			var $ContactNo = $('#cacheContactNo' + $requestid).text();   
		}
		if ($('#Address' + $requestid).text() != '') {
			var $Address = $('#Address' + $requestid).text();   
		} else {
			var $Address = $('#cacheAddress' + $requestid).text();   
		}
		if ($('#Father' + $requestid).text() != '') {
			var $Father = $('#Father' + $requestid).text();   
		} else {
			var $Father = $('#cacheFather' + $requestid).text();   
		}
		if ($('#FatherOccupation' + $requestid).text() != '') {
			var $FatherOccupation = $('#FatherOccupation' + $requestid).text();   
		} else {
			var $FatherOccupation = $('#cacheFatherOccupation' + $requestid).text();   
		}
		if ($('#Mother' + $requestid).text() != '') {
			var $Mother = $('#Mother' + $requestid).text();   
		} else {
			var $Mother = $('#cacheMother' + $requestid).text();   
		}
		if ($('#MotherOccupation' + $requestid).text() != '') {
			var $MotherOccupation = $('#MotherOccupation' + $requestid).text();   
		} else {
			var $MotherOccupation = $('#cacheMotherOccupation' + $requestid).text();   
		}
		if ($('#Elementary' + $requestid).text() != '') {
			var $Elementary = $('#Elementary' + $requestid).text();   
		} else {
			var $Elementary = $('#cacheElementary' + $requestid).text();   
		}
		if ($('#ElemAddress' + $requestid).text() != '') {
			var $ElemAddress = $('#ElemAddress' + $requestid).text();   
		} else {
			var $ElemAddress = $('#cacheElemAddress' + $requestid).text();   
		}
		if ($('#ElemGraduate' + $requestid).text() != '') {
			var $ElemGraduate = $('#ElemGraduate' + $requestid).text();   
		} else {
			var $ElemGraduate = $('#cacheElemGraduate' + $requestid).text();   
		}
		if ($('#Secondary' + $requestid).text() != '') {
			var $Secondary = $('#Secondary' + $requestid).text();   
		} else {
			var $Secondary = $('#cacheSecondary' + $requestid).text();   
		}
		if ($('#SecAddress' + $requestid).text() != '') {
			var $SecAddress = $('#SecAddress' + $requestid).text();   
		} else {
			var $SecAddress = $('#cacheSecAddress' + $requestid).text();   
		}
		if ($('#SecGraduate' + $requestid).text() != '') {
			var $SecGraduate = $('#SecGraduate' + $requestid).text();   
		} else {
			var $SecGraduate = $('#cacheSecGraduate' + $requestid).text();   
		}
		var $profileData = '[{"surname":"' + $surname + '","firstname":"' + $firstname + '","middlename":"' + $middlename + '","Status":"' + $Status + '","Gender":"' + $Gender +
		'","Citizenship":"' + $Citizenship + '","DateOfBirth":"' + $DateOfBirth + '","PlaceOfBirth":"' + $PlaceOfBirth 
		+ '","ContactNo":"' + $ContactNo + '","Address":"' + $Address 
		+ '","Father":"' + $Father + '","FatherOccupation":"' + $FatherOccupation + '","Mother":"' + $Mother 
		+ '","MotherOccupation":"' + $MotherOccupation + '","Elementary":"' + $Elementary + '","ElemAddress":"' + $ElemAddress 
		+ '","ElemGraduate":"' + $ElemGraduate + '","Secondary":"' + $Secondary + '","SecAddress":"' + $SecAddress 
		+ '","SecGraduate":"' + $SecGraduate + '","studnum":"' + $studnum +'"}]';
		//alert($profileData);
		var $adminid = $('#adminid').text();
		//alert($adminid);
		var r = confirm("Caution: Approving record updates will permanently change the entry in the database. Are you sure you want to approve this profile update?");
		if (r == true) {
			$.ajax({
				type: "POST",
				url: "/php/approveProfileChange.php",
				data: {profiledata: $profileData, adminid: $adminid, requestid: $requestid},
				cache: false,
				success: function(result){
					alert('Successfully updated student\'s personal profile.');
					location.reload();
				}
			});
		}
		});