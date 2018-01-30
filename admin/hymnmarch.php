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
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1] . ' - ' . $_SESSION["name"][0]?> <b class="caret"></b></a>
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
                        <a href="announcements.php"><i class="fa fa-fw fa-bullhorn"></i> Announcements</a>
                    </li>
                    <li>
                        <a href="timetables.php"><i class="fa fa-fw fa-book"></i> Subject Timetables</a>
                    </li>
                    <li>
                        <a href="students.php"><i class="fa fa-fw fa-graduation-cap"></i> Student List</a>
                    </li>
                    <li>
                        <a href="records.php"><i class="fa fa-fw fa-table"></i> Student Records</a>
                    </li>
                    <li>
                        <a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> School Calendar</a>
                    </li>
					<li class="active">
                        <a href="hymnmarch.php"><i class="fa fa-fw fa-music"></i> MMSU Hymn and March</a>
                    </li>
					<li>
                        <a href="mvgo.php"><i class="fa fa-fw fa-university"></i> Mission/Vision/Goals</a>
                    </li>
                    <li>
                        <a href="about.php"><i class="fa fa-fw fa-info-circle"></i> About CpE Student Portal</a>
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
                                <i class="fa fa-music"></i> MMSU Hymn and March
                            </li>
                        </ol>
						<!--<div class="alert alert-success" role="alert">
						  You are currently signed in as <a href=""><?php echo $_SESSION["name"][1]?></a>
						</div>-->
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;">
								<audio controls preload="metadata" style=" width: 100%;">
									<source src="/assets/mp3/march.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
							</div>
							<div class="panel-body">
								<p style="text-align: center;"><span style="color:#0c4b05;"><span style="font-size: large;">MMSU March</span></span></p>
								<hr/>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Dear Mariano Marcos State University</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We now sing of thy real glory</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We adore thee and love thee truly</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Where&#39;er we shall chance to roam</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Thy sons and daughters will ever love thee</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Are to thee loyal and true</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Always Alma Mater dear,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Where&#39;er we go, we&#39;ll think of thee.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">&nbsp;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Thou hast been always longing</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For the welfare of thy children</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">And to them, thou hast devoted</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Thy attention and best care</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We soon shall be repaying</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For the cares and kindness true</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We will ever Alma Mater</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Give the best in us for thee.</span></span></p>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;">
								<audio controls preload="metadata" style=" width: 100%;">
									<source src="/assets/mp3/hymn.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
							</div>
							<div class="panel-body">
								<p style="text-align: center;"><span style="color:#0c4b05;"><span style="font-size: large;">MMSU Hymn</span></span></p>
								<hr/>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">MMSU dear</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Alma Mater beloved</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To you we promise our never ending love;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Though fate may bring us</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To other lands afar,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Our hearts and thoughts will always be</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">With you wherever we are.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">&nbsp;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Hold high the green and gold</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Waving with pride and hope;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Inspiring us to rise</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To reach the greatest heights.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">With your kind guiding hand,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We know we&#39;ll never fail</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To reap success and give the best</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For you and our Fatherland.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">(Repeat)</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">&nbsp;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To reap success and give the best</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For you and our Fatherland,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">MMSU...</span></span></p>
							</div>
						</div>
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
		
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
