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
                        <a href="records.php"><i class="fa fa-fw fa-table"></i> My Grades</a>
                    </li>
                    <li>
                        <a href="hymnmarch.php"><i class="fa fa-fw fa-music"></i> MMSU Hymn and March</a>
                    </li>
					<li class="active">
                        <a href="mvgo.php"><i class="fa fa-fw fa-university"></i> Mission/Vision/Goals</a>
                    </li>
                    <li>
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
                                <i class="fa fa-university"></i> Mission/Vision/Goals
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
							<div class="panel-heading" style="text-align: center;" id="exTab2">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#1" data-toggle="tab"><i class="fa fa-fw fa-eye"></i> Mission and Vision</a>
									</li>
									<li><a href="#2" data-toggle="tab"><i class="fa fa-fw fa-university"></i> University Core Values</a>
									</li>
									<li><a href="#3" data-toggle="tab"><i class="fa fa-fw fa-dot-circle-o"></i> Goals and Objectives</a>
									</li>
								</ul>
							</div>

								<div class="panel-body tab-content ">
									<div class="tab-pane active" id="1">
										<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">VISION</span></span></p>
										<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">A world-class university dedicated to the development of virtuous human resources and innovations for inclusive growth.</span></span></p>
										<hr/>
										<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">MISSION</span></span></p>
										<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">To develop globally competitive professionals and industry-ready graduates via various modalities and generate new knowledge and technologies for the improvement of the quality of life.</span></span></p>
									</div>
									<div class="tab-pane" id="2">
										<ol>
											<li style="text-align: justify;"><span style="color:#555555;"><span style="font-size:16px;">Excellence</span></span></li>
											<li style="text-align: justify;"><span style="color:#555555;"><span style="font-size:16px;">Integrity</span></span></li>
											<li style="text-align: justify;"><span style="color:#555555;"><span style="font-size:16px;">Service to God and Nation</span></span></li>
										</ol>
									</div>
									<div class="tab-pane" id="3">
										<ol style="text-align: justify;">
											<li style="text-align: justify;"><span style="color:#555555;"><span style="font-size:14px;">Offer a wide range of academic programs at the certificate, associate, baccalaureate, masters and doctorate levels;</span></span></li>
											<li style="text-align: justify;"><span style="color:#555555;"><span style="font-size:14px;">Maintain a broad range of research programs both in the basic and applied sciences, especially in the arts, agriculture, agribusiness, agroforestry, fisheries, teacher education, rural sociology, management, and technology which will generate knowledge and provide a basis for solutions to the development needs of the province and region;</span></span></li>
											<li style="text-align: justify;"><span style="color:#555555;"><span style="font-size:14px;">Provide off-campus instructional&nbsp; continuing education and extension services to meet the needs&nbsp; of residents of the province and the region within the context of the regional and national non-formal education; and</span></span></li>
											<li style="text-align: justify;"><span style="color:#555555;"><span style="font-size:14px;">Serve as the locus for the regional cooperative and development center for public and private colleges and universities in the Ilocos region.</span></span></li>
										</ol>
									</div>
								</div>
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
