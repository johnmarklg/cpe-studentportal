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
				
				<?php
					require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("SELECT requestid FROM profilerequest WHERE `studnum` = :studnum AND approvalstatus = 0");
					$stmt -> bindParam(':studnum', $_SESSION['name'][4]);
					$stmt->execute();
					
					$result = $stmt->fetch(); 

					if($result) {
						echo '<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-warning" role="alert">
								  <i class="fa fa-fw fa-warning"></i> You currently have a pending profile update request!
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								</div>
							</div>
						</div>';
					}
					$conn = null;
				?>
				
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
		<script src="/functions/js/profile.js"></script>
	
    </div>
    <!-- /#wrapper -->
</body>

</html>
