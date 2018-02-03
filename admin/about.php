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
                                <i class="fa fa-info-circle"></i> About CpE Student Portal
                            </li>
                        </ol>
						<!--<div class="alert alert-success" role="alert">
						  You are currently signed in as <a href=""><?php echo $_SESSION["name"][1]?></a>
						</div>-->
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								About iCpE Student Portal
							</div>
							<div class="panel-body">
								<h3><strong>OVERVIEW</strong></h3>
								<hr/>
								<h4>ABOUT CpE Student Portal</h4>
								<p>CpE Student Portal is for Computer Engineering students Mariano Marcos State University - College of Engineering, that serves as a personal assistant in carrying out academic-related tasks.</p>
								<p>Students can view their personal details, schedules, current grades, accountabilities, curriculum checklist, and more.</p>
								<hr/>
								<h4>FEATURES AVAILABLE</h4>
								<p>Personal Details: where a student can view his/her personal information.</p>
								<p>Subject Timetables: where a student can view his/her enrolled subjects with their time schedules for the current term.</p>
								<p>Records Transcript: shows the final grades in the previous term of the student.</p>
								<p>School Calendar: where a student can view upcoming events and holidays within the academic year.</p>
								<hr/>
								<h4>PLANNED FEATURES</h4>
								<p>Statement of Accounts: shows if a student still has account balance from the organizational office.</p>
								<hr/>
								<h4>HOW TO REGISTER? OR FORGOT PASSWORD?</h4>
								<p>Proceed to the Computer Engineering Department, 1st Floor, College of Engineering, Mariano Marcos State University and ask a portal administrator (i.e. Department Chair).</p>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								Student Manuals and Official Papers
							</div>
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item"><a href="">Official MMSU Student Handbook</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
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
		
		<script>
			$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="about.php"]').length;
					  })
					  .addClass('active');
			});
		</script>
	
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
