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
                            <a href="changepass.php"><i class="fa fa-fw fa-lock"></i> Change Password</a>
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
                        <a href="geninfo.php"><i class="fa fa-fw fa-university"></i> General Information</a>
                    </li>
                    <li>
                        <a href="about.php"><i class="fa fa-fw fa-info-circle"></i> About CpE Student Portal</a>
                    </li>
					<li class="active">
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
                                <i class="fa fa-lock"></i> Change Password
                            </li>
                        </ol>
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> Your current session will close upon changing your password.
						</div>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-success">
							<div class="panel-heading">
								<i class="fa fa-fw fa-unlock-alt"></i> Change Password
							</div>
							<div class="panel-body">
								<input id="studnum" type="hidden" class="form-control" value="<?php echo ($_SESSION['name'][4]);?>" autocomplete="off" aria-describedby="basic-addon0">
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Current Password</span>
								  <input id="oldpass" type="password" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon1">
								  <input id="oldpasschk" type="hidden" class="form-control" value="<?php echo ($_SESSION['name'][5]);?>" autocomplete="off" aria-describedby="basic-addon1">
								</div>
								<hr/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon2">New Password</span>
								  <input id="newpass" type="password" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon2">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon2">Re-type New Password</span>
								  <input id="checkpass" type="password" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon3">
								</div>
								<br/>
								<form method="post">
									<button type="button" id="buttonChangePassStudent" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-save"></i> Save Changes</button>
								</form>
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
		
		<script src="/functions/js/changepass.js"></script>
	
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
