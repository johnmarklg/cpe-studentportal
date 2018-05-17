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
			.table-remove:hover {
				color: #f00;
				text-decoration: underline;
				cursor: pointer;
			}
	</style>
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
                                <i class="fa fa-graduation-cap"></i> Student List
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
					<div class="row"><div class="col-lg-12"><div class="panel-group"><div class="panel panel-info">
						<div class="panel-heading"><a data-toggle="collapse" href="#collapsePanel" style="color: #eee;"><i class="fa fa-plus-circle"></i> Click here to insert a new student record to the list of enrolled students.</a></div>
						<div id="collapsePanel" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Student Number</span>
								<input id="studnum" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Surname</span>
								<input id="surname" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">First Name</span>
								<input id="firstname" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Middle Name</span>
								<input id="middlename" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Curriculum</span>
								<!--<input id="curriculum" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">-->
								<div class="form-group">
								  <select class="form-control" id="curriculum">
									<?php
										require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
										$conn = getDB('cpe-studentportal');
										$stmt = $conn->prepare("SELECT * from curriculum");
										$stmt->execute();
										
										foreach(($stmt->fetchAll()) as $row) { 
												echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
										}
										$conn=null;
									?>
								  </select>
								</div>
							</div>
							<br/>
							<button type="button" id="buttonAdd" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-user"></i>Insert Student Entry</button>
						</div></div></div></div></div></div><hr/>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-info" role="alert">
								  <i class="fa fa-fw fa-info-circle"></i> List of all students enrolled under BS Computer Engineering, categorized by year level.
								  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align: center;" id="myTabs">	
								<ul class="nav nav-pills nav-justified">
									<li class="active"><a  id="tabAll" href="#0" data-toggle="tab">Show All</a>
									</li>
									<li >
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
								</ul>
							</div>
						</div>
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showStudents.php');
						echo showStudents();
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
			  <small hidden id="adminid"><?php echo ($_SESSION['name'][2]); ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	<script src="/functions/js/students.js"></script>
</body>
</html>
