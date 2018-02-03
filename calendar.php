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
	calendar_extra();
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
                                <i class="fa fa-calendar"></i> Academic Calendar
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> This is the academic calendar where all events and holidays for the respective school year will be listed.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								Academic Calendar
							</div>
							<div class="panel-body">
								<div id="calendar"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<?php
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showCalendar.php');
						echo showUserCalendar();
						?>
					</div>
				</div>
			</div>
            <!-- /.container-fluid -->
			
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 id="eventTitle" style="text-transform: uppercase" align="center"></h4>
						</div>
						<div class="container">
							<p><span style="font-weight: 600">Start   :   </span> <span id="beginTime"></span></p>
							<p><span style="font-weight: 600">End   :   </span> <span id="closeTime"></span></p>
							<p><span style="font-weight: 600">Description  :   </span> <span id="eventDesc"></span></p>
							<p><span style="font-weight: 600">Location  :   </span> <span id="eventLocat"></span></p>
						</div>
					</div>
				</div>
			</div>
			
        </div>
        <!-- /#page-wrapper -->
		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © CpE Student Portal <?php echo date('Y') ?></small>
			  <small id="userid" hidden><?php echo ($_SESSION['name'][0]);?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script src="/functions/js/calendar.min.js"></script>
	
    </div>
    <!-- /#wrapper -->
</body>

</html>
