<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
	if(($_SESSION['name'][0]<>'Administrator') && ($_SESSION['name'][0]<>'Administrator (Elevated)')) {
		header("location: logout.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
	get_header();
?>	
	<style>
			.table-remove:hover {
				color: #f00;
				text-decoration: underline;
				cursor: pointer;
			}
	</style>
</head>

<body>

    <div id="wrapper">

        <?php admin_nav(); ?>

        <div id="page-wrapper">

            <div class="container-fluid">
				<br/>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
					   <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-terminal"></i>  <a href="index.php">Student Portal</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Approve Profile Updates
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-warning" role="alert">
						 <i class="fa fa-fw fa-warning"></i> Caution: Approving record updates will permanently change the entry in the database.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">		
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showProfileReq.php');
						echo showProfileReq();
						?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © CpE Student Portal <?php echo date('Y') ?></small>
			  <small hidden id="adminid"><?php echo ($_SESSION['name'][2]); ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	<script>
		$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="profilereq.php"]').length;
				  })
				  .addClass('active');
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
			alert($profileData);
			var $adminid = $('#adminid').text();
			//alert($adminid);
			$.ajax({
				type: "POST",
					url: "/php/approveProfileChange.php",
					data: {profiledata: $profileData, adminid: $adminid, requestid: $requestid},
					cache: false,
					success: function(result){
						alert(result);
						location.reload();
					}
				});
			});
	</script>
</body>
</html>
