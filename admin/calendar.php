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
	calendar_extra();
?>	
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
                    <li class="active">
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
                                <i class="fa fa-calendar"></i> Calendar
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						Update school calendar with list of events and holidays as well as activities.
						  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div class="panel-heading">
								Academic Calendar
							</div>
							<div class="panel-body">
								<div id="calendar"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
					<div class="row"><div class="col-lg-12"><div class="panel panel-default">
					<div class="panel-heading">Add New Event/Holiday</div><div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="input-group date"><span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
							<input id="startDate" type="text" class="form-control" value="" aria-describedby="basic-addon1" placeholder="Start Date"></div>
						</div>
						<div class="col-lg-6">
							<div class="input-group date"><span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i></span>
							<input id="endDate" type="text" class="form-control" value="" aria-describedby="basic-addon2" placeholder="End Date"></div>
						</div>
					</div>
					<br/>
					<div class="input-group"><span class="input-group-addon" id="basic-addon3">Event Name</span>
					<input id="eventName" type="text" class="form-control" value="" aria-describedby="basic-addon3"></div>
					<br/>
					<div class="input-group"><span class="input-group-addon" id="basic-addon4">Event Info</span>
					<textarea id="eventInfo" type="text" class="form-control" value="" aria-describedby="basic-addon4"></textarea></div>
					<br/>
					</div><div class="panel-footer"><div class="btn-group btn-group-justified" role="group" aria-label="...">
							  <div class="btn-group" role="group">
								<button type="button" id="saveEvent" class="btn btn-default btn-info"><i class="fa fa-fw fa-bullhorn"></i> General Event</button>
							  </div>
							  <div class="btn-group" role="group">
								<button type="button" id="saveHoliday" class="btn btn-default btn-success"><i class="fa fa-fw fa-calendar"></i>Holiday</button>
							  </div>
							</div></div></div></div></div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr/><div class="row">
					<div class="col-lg-12">
						<?php
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showCalendar.php');
						echo showCalendar();
						?>
					</div>
				</div>
            </div>
            <!-- /.container-fluid -->

			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 id="eventName" style="text-transform: uppercase" align="center"></h4>
						</div>
						<div class="container">
							<p><span style="font-weight: 600">Start   :   </span> <span id="startTime"></span></p>
							<p><span style="font-weight: 600">End   :   </span> <span id="endTime"></span></p>
							<p><span style="font-weight: 600">Description  :   </span> <span id="eventInfo"></span></p>
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	<script src="/functions/js/calendar.js"></script>
	
</body>

</html>
