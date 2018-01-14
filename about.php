<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Portal</title>

    <link rel="icon" href="/assets/images/mmsu-logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/bootstrap/css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
    <!-- jQuery -->
    <script src="/assets/bootstrap/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- PACE -->
	<script src="/assets/pace/pace.min.js"></script>
	<link rel="stylesheet" href="/assets/pace/pace-theme-flash.css">
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img style="max-width:100%;max-height:100%;" src="/assets/images/cpe-portal-white.png"/></a>
            </div>
			<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1] . ', ' . $_SESSION["name"][2] . ' ' . $_SESSION["name"][3]?> <b class="caret"></b></a>
					<div class="dropdown-backdrop"></div>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-lock"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> Academic Calendar</a>
                    </li>
					<li>
                        <a href="prospectus.php"><i class="fa fa-fw fa-list"></i> Prospectus</a>
                    </li>
                    <li>
                        <a href="timetables.php"><i class="fa fa-fw fa-book"></i> Subject Timetables</a>
                    </li>
                    <li>
                        <a href="hymnmarch.php"><i class="fa fa-fw fa-music"></i> MMSU Hymn and March</a>
                    </li>
					<li>
                        <a href="mvgo.php"><i class="fa fa-fw fa-university"></i> Mission/Vision/Goals</a>
                    </li>
                    <li class="active">
                        <a href="about.php"><i class="fa fa-fw fa-info-circle"></i> About CpE Student Portal</a>
                    </li>
					<li>
                        <a href="changepass.php"><i class="fa fa-fw fa-lock"></i> Change Password</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

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
		
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
