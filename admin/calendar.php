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
                                <i class="fa fa-calendar"></i> Calendar
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
							<i class="fa fa-fw fa-info-circle"></i> Update school calendar with list of events and holidays as well as activities.
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
					<div class="input-group"><span class="input-group-addon" id="basic-addon5">Event Location</span>
					<input id="eventLoc" type="text" class="form-control" value="" aria-describedby="basic-addon5"></div>
					<br/>
					</div><div class="panel-footer"><div class="btn-group btn-group-justified" role="group" aria-label="...">
							  <div class="btn-group" role="group">
								<button type="button" id="saveEvent" class="btn btn-default btn-info"><i class="fa fa-fw fa-bullhorn"></i> General Event</button>
								</div>
							  <div class="btn-group" role="group">
								<button type="button" id="saveHoliday" class="btn btn-default btn-success"><i class="fa fa-fw fa-calendar"></i>Holiday</button>
							  </div>
							  <input id="adminid" value="<?php echo $_SESSION['name'][2] ?>" type="hidden"></input>
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
