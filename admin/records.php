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
	
	<style>
			#saveStudentRecords {
			  position: fixed;
			  display: block;
			  right: 0;
			  bottom: 0;
			  margin-right: 40px;
			  margin-bottom: 40px;
			  z-index: 900;
			}
	</style>

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
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1]?> <b class="caret"></b></a>
					<div class="dropdown-backdrop"></div>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-fw fa-gear"></i> Settings</a>
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
                    <li class="active">
                        <a href="records.php"><i class="fa fa-fw fa-table"></i> Student Records</a>
                    </li>
                    <li>
                        <a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> School Calendar</a>
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
                                <i class="fa fa-table"></i> Student Records
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  To add a new entry, input blank or missing entry and search before input.
						</div>
					</div>
				</div>

				
				<!-- Search -->
				<div class="row">
					<div class="col-lg-12">
					<form method="post">
						<div class="input-group">
								<input type="text" id="stud-num" name="stud-num" class="form-control" placeholder="Search by Student Number...">
								<span class="input-group-btn">
									<button name="search-table" class="btn btn-default"><i class="fa fa-search"></i></button>
								</span>
						</div>
					</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<!-- /.row -->
				<hr/>
				<div class="row">
					<div class="col-lg-12">
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showStudentRecords.php');
						echo showStudentRecords();
						?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		<form>
				<button type="button" id="saveStudentRecords" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button>
		</form>	

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
	
	
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	
	<script>
		$("#saveStudentRecords").click(function(){
			var tableGrades11 = $('#grades1-1').tableToJSON();
			var tableGrades12 = $('#grades1-2').tableToJSON();
			var tableGrades21 = $('#grades2-1').tableToJSON();
			var tableGrades22 = $('#grades2-2').tableToJSON();
			var tableGrades31 = $('#grades3-1').tableToJSON();
			var tableGrades32 = $('#grades3-2').tableToJSON();
			var tableGrades41 = $('#grades4-1').tableToJSON();
			var tableGrades42 = $('#grades4-2').tableToJSON();
			var tableGrades51 = $('#grades5-1').tableToJSON();
			var tableGrades52 = $('#grades5-2').tableToJSON();
			var tableGrades = [].concat(tableGrades11, tableGrades12, tableGrades21, tableGrades31, tableGrades32, tableGrades41, tableGrades42, tableGrades51, tableGrades52);
			var tableStudInfo= $('#studentinfo').tableToJSON();  
			//alert(JSON.stringify(tableGrades));
			$.ajax({
			type: "POST",
				url: "/php/saveStudentRecords.php",
				data: {studgrades: JSON.stringify(tableGrades), studinfo: JSON.stringify(tableStudInfo)},
				cache: false,
				success: function(result){
					//alert("Successfully updated database!");
					//alert(result);
					$('#oldstudnum').html(result);
				}
			});
			return false;
		});
	</script>
</body>

</html>
