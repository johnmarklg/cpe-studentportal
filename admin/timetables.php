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
	<style>
			#saveTimetables {
			  position: fixed;
			  display: block;
			  right: 0;
			  bottom: 0;
			  margin-right: 40px;
			  margin-bottom: 40px;
			  z-index: 900;
			}
			  .table-remove:hover {
			  color: #f00;
			  cursor: pointer;
			}
			.table-add:hover {
			  cursor: pointer;
			  color: #0b0;
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
                    <li class="active">
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
                                <i class="fa fa-book"></i> Timetables
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  Update available course subjects per year level on every semester.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>

				
				<div class="row">
					<div class="col-lg-12">
					<div class="row"><div class="col-lg-12"><div class="panel-group"><div class="panel panel-info">
						<div class="panel-heading"><a data-toggle="collapse" href="#collapsePanel"><i class="fa fa-plus-circle"></i> Click here to insert a new class schedule to the list of open subjects.</a></div>
						<div id="collapsePanel" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Year</span>
								<input id="year" type="text" class="form-control formTextbox"  placeholder="ex. 1" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Section</span>
								<input id="section" type="text" class="form-control formTextbox"  placeholder="ex. A" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Course Code</span>
								<input id="code" type="text" class="form-control formTextbox"  placeholder="ex. Something 101" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Units</span>
								<input id="units" type="text" class="form-control formTextbox"  placeholder="ex. 3.0" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Subject Section</span>
								<input id="subjectsection" type="text" class="form-control formTextbox" placeholder="ex. 1A" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Start Time</span>
								<input id="starttime" type="text" class="form-control formTextbox"  placeholder="ex. 9:00" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">End Time</span>
								<input id="endtime" type="text" class="form-control formTextbox"  placeholder="ex. 10:00" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Days</span>
								<input id="days" type="text" class="form-control formTextbox"  placeholder="ex. MWF" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Building</span>
								<input id="building" type="text" class="form-control formTextbox"  placeholder="ex. COE" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Room Number</span>
								<input id="roomnumber" type="text" class="form-control formTextbox"  placeholder="ex. 220" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Instructor</span>
								<input id="instructor" type="text" class="form-control formTextbox"  placeholder="ex. Engr. Tim McCay" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<button type="button" id="buttonAdd" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-calendar"></i>Insert New Schedule</button>
							<script>
							//short script for enter to click button
							$(document).ready(function(){
								$('.formTextbox').keypress(function(e){
								  if(e.keyCode==13)
								  $('#buttonAdd').click();
								});
							});
							</script>
						</div></div></div></div></div></div><hr/>
						
						<div class="row">
									<div class="col-lg-12">
										<div class="alert alert-info" role="alert">
										  List of all currently open and available subjects will be placed here.
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="alert alert-warning" role="alert">
										  Caution: Deleting records in the respective tables will permanently remove the entry in the database.
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										</div>
									</div>
								</div>
								
						<div class="panel panel-default">
									<div class="panel-heading" style="text-align: center;" id="myTabs">	
										<ul class="nav nav-pills nav-justified">
											<li class="active">
											<a  href="#1" data-toggle="tab">First Year</a>
											</li>
											<li><a href="#2" data-toggle="tab">Second Year</a>
											</li>
											<li><a href="#3" data-toggle="tab">Third Year</a>
											</li>
											<li><a href="#4" data-toggle="tab">Fourth Year</a>
											</li>
											<li><a href="#5" data-toggle="tab">Fifth Year</a>
											</li>
											<li><a  id="tabAll" href="#0" data-toggle="tab">Show All</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-content">
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showTimetables.php');
						echo showTimetables();
						?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		<!--<form>
				<button type="button" id="saveTimetables" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button>
		</form>	
-->
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
	<script src="/functions/js/timetables.js"></script>
		
</body>

</html>
