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

if(isset($_GET['studnum'])){ $studnum = $_GET['studnum']; } else { $studnum='';}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
	get_header();
?>	
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
                    <li class="active">
                        <a href="records.php"><i class="fa fa-fw fa-table"></i> Student Records</a>
                    </li>
                    <li>
                        <a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> School Calendar</a>
                    </li>
					<li>
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
                                <i class="fa fa-table"></i> Student Records
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-info-circle"></i> To add a new student entry, you can fill up the empty fields below then press [Enter] or click the <i class="fa fa-fw fa-save"></i> to create.
						  <br/>Make sure that no record is currently loaded or it will be overwritten.
						</div>
					</div>
				</div>

				
				<!-- Search -->
				<div class="row">
					<div class="col-lg-12">
					<form method="post">
						<div class="input-group">
								<input type="text" id="stud-num" name="stud-num" value="<?php echo $studnum ?>" class="form-control" placeholder="Search by Student Number...">
								<span class="input-group-btn">
									<button id="search-table" name="search-table" class="btn btn-default"><i class="fa fa-search"></i></button>
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
						echo showStudentRecords($studnum);
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
			  <small hidden id="adminid"><?php echo ($_SESSION['name'][2]); ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	<script src="/assets/js/arrow-table.min.js"></script>
	<script src="/functions/js/records.js"></script>
</body>

</html>