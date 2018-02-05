<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
if(($_SESSION['name'][0]=='Limited')||($_SESSION['name'][0]=='Administrator')||($_SESSION['name'][0]=='Administrator (Elevated)')) {
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
</head>

<body>

    <div id="wrapper">

        <?php user_nav(); ?>

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
                                <i class="fa fa-user"></i> Student Profile
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> This is the where you can update your personal datasheet. Changes must be approved by a faculty before being applied.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><br/>
							You can only request an update one at a time. If there is a current pending update, you must wait for approval before sending another request.
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showProfile.php');
						echo showStudentRecords($_SESSION['name'][4]);
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script src="/assets/js/jquery.tabletojson.min.js"></script>
	
		<script>
			$('#tabAll').click(function(){
				$('#tabAll').addClass('active');  
				$('.tab-pane').each(function(i,t){
					$('#myTabs li').removeClass('active'); 
					$(this).addClass('active');  
				});
			});
			var $studentInfo_cache = $('#studentinfo').tableToJSON();
			var $studentData_cache = JSON.parse('[{"Gender":"' + $('#gender').text() + '","Status":"' + $('#status').text() +
			'","Citizenship":"' + $('#citizenship').text() + '","DateOfBirth":"' + $('#birthdate').text() + '","PlaceOfBirth":"' + $('#birthplace').text() 
			+ '","ContactNo":"' + $('#contactnum').text() + '","Address":"' + $('#address').text() 
			+ '","Father":"' + $('#fathername').text() + '","FatherOccupation":"' + $('#fatheroccupation').text() + '","Mother":"' + $('#mothername').text() 
			+ '","MotherOccupation":"' + $('#motheroccupation').text() + '","Elementary":"' + $('#elementary').text() + '","ElemAddress":"' + $('#elemaddress').text() 
			+ '","ElemGraduate":"' + $('#elemgrad').text() + '","Secondary":"' + $('#secondary').text() + '","SecAddress":"' + $('#secaddress').text() 
			+ '","SecGraduate":"' + $('#secgrad').text() + '"}]');
			$studentData_cache = $.extend(true, $studentInfo_cache, $studentData_cache);
				
			$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="profile.php"]').length;
				  })
				  .addClass('active');
			});
			
			function removeDuplicates(json_all) {
				var arr = [],
					collection = [];
				
				$.each(json_all, function (index, value) {
					if ($.inArray(value.id, arr) == -1) {
						arr.push(value.id);
						collection.push(value);
					}
				});
				return collection;
			}
			
			$("#updateStudentProfile").click(function(){
			if ($('#studnum').text()=='') {
				alert('Error. Student Number cannot be blank.');
			} else {
			var $studentInfo= $('#studentinfo').tableToJSON();  
			var $studentData = JSON.parse('[{"Gender":"' + $('#gender').text() + '","Status":"' + $('#status').text() +
			'","Citizenship":"' + $('#citizenship').text() + '","DateOfBirth":"' + $('#birthdate').text() + '","PlaceOfBirth":"' + $('#birthplace').text() 
			+ '","ContactNo":"' + $('#contactnum').text() + '","Address":"' + $('#address').text() 
			+ '","Father":"' + $('#fathername').text() + '","FatherOccupation":"' + $('#fatheroccupation').text() + '","Mother":"' + $('#mothername').text() 
			+ '","MotherOccupation":"' + $('#motheroccupation').text() + '","Elementary":"' + $('#elementary').text() + '","ElemAddress":"' + $('#elemaddress').text() 
			+ '","ElemGraduate":"' + $('#elemgrad').text() + '","Secondary":"' + $('#secondary').text() + '","SecAddress":"' + $('#secaddress').text() 
			+ '","SecGraduate":"' + $('#secgrad').text() + '"}]');
			
			$studentData = $.extend(true, $studentInfo, $studentData);
			console.log($studentData);
			if((JSON.stringify($studentData)) != (JSON.stringify($studentData_cache))) {
					//alert('Updated');
					$.ajax({
						type: "POST",
							url: "/php/updateStudentProfile.php",
							data: {studprofile: JSON.stringify($studentData), oldstudnum: '<?php echo $_SESSION['name'][4]?>'},
							cache: false,
							success: function(result){
								alert(result);
								//url.split('?')[0] ;
								//window.location.href('/admin/records.php');
								location.reload();
							}
						});
			} else {
					alert('No changes. Cancelling.');
			}
			return false;
			}
		});
		</script>
		
    </div>
    <!-- /#wrapper -->
</body>

</html>
