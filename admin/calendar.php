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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- jQuery -->
    <script src="/assets/bootstrap/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- PACE -->
	<script src="/assets/pace/pace.min.js"></script>
	<link rel="stylesheet" href="/assets/pace/pace-theme-flash.css">
	<!--FullCalendar-->
	<!--<link rel="stylesheet" href="/assets/fullcalendar/css/fullcalendar.min.css">
	<script src="/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>-->
	<!--Datepicker-->
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
	<script src="/assets/js/list.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
	<link href="/assets/bootstrap/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
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
                    <li>
                        <a href="records.php"><i class="fa fa-fw fa-table"></i> Student Records</a>
                    </li>
                    <li class="active">
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
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div id="calendar"></div>
							</div>
						</div>
					</div>
				</div>

				
				<div class="row">
					<div class="col-lg-12">
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showCalendar.php');
						echo showCalendar();
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
		
    </div>
    <!-- /#wrapper -->
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	
	<script>
		$('.table-add').click(function () {
			var $clone = $(this).closest('table').find('tr.hide').clone(true).removeClass('hide').toggle();
			$(this).closest('table').append($clone);
		});
		
		//delete event/holiday/suspension
		$('.table-remove').click(function () {
			var r = confirm("Do you want to delete this event/holiday?");
			if (r == true) {
				$(this).parents('tr').detach();
			} else {}
		});
	</script>
	
	<script>
		$('.input-group.date').datepicker({format: "yyyy-mm-dd"}); 
	</script>
	
	<script>
		$("#saveEvent").click(function(){
			var $eventname = $('#eventName').val();
			var $eventinfo = $('#eventInfo').val();
			var $startdate = $('#startDate').val();
			var $enddate = $('#endDate').val();
			var $eventData = '[{"Start Date":"' + $startdate + '","End Date":"' + $enddate +
			'","Event Name":"' + $eventname + '","Event Info":"' + $eventinfo + '"}]';
			alert($eventData);
			
			$.ajax({
				type: "POST",
				url: "../php/updateEvents.php",
				data: {events: $eventData},
				cache: false,
				success: function(result){
					//alert("Successfully updated database!");
					location.reload(true); 
				}
			});
			
			return false;
		});
	</script>
	
	<script>
		$("#saveHoliday").click(function(){
			var $eventname = $('#eventName').val();
			var $eventinfo = $('#eventInfo').val();
			var $startdate = $('#startDate').val();
			var $enddate = $('#endDate').val();
			var $eventData = '[{"Start Date":"' + $startdate + '","End Date":"' + $enddate +
			'","Event Name":"' + $eventname + '","Event Info":"' + $eventinfo + '"}]';
			alert($eventData);
			
			$.ajax({
				type: "POST",
				url: "../php/updateHolidays.php",
				data: {events: $eventData},
				cache: false,
				success: function(result){
					//alert("Successfully updated database!");
					location.reload(true); 
				}
			});
			
			return false;
		});
	</script>
</body>

</html>
