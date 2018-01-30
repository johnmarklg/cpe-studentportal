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
	
	<style>
			.table-remove:hover {
				color: #f00;
				cursor: pointer;
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
                    <li class="active">
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
                                <i class="fa fa-graduation-cap"></i> Student List
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<!--<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  Insert a new student record to the list of enrolled students.
						</div>
					</div>
				</div>-->

				
				<div class="row">
					<div class="col-lg-12">
					<div class="row"><div class="col-lg-12"><div class="panel-group"><div class="panel panel-info">
						<div class="panel-heading"><a data-toggle="collapse" href="#collapsePanel"><i class="fa fa-plus-circle"></i> Click here to insert a new student record to the list of enrolled students.</a></div>
						<div id="collapsePanel" class="panel-collapse">
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
							<button type="button" id="buttonAdd" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-user"></i>Insert Student Entry</button>
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
										  List of all students enrolled under BS Computer Engineering, categorized by year level.
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	
	<!--<script src="/assets/js/jquery.tabletojson.min.js"></script>-->
	
	<script>
		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
	</script>
	
	<script>
		$("#buttonAdd").click(function() {
			var $studnum = $("#studnum").val();
			var $firstname = $("#firstname").val();
			var $middlename = $("#middlename").val();
			var $surname= $("#surname").val();
			var $cfatscore = $("#cfatscore").val();
			var $passcode = $("#passcode").val();
			var $yearstarted = $studnum.substr(0,2);
			
			var $studinfo = '[{"Student Number":"' + $studnum +
			'","Surname":"' + $surname + '","First Name":"' + $firstname +
			'","Middle Name":"' + $middlename + '","CFAT Score":"' + $cfatscore +
			'","Passcode":"' + $passcode + '","Year Started":"' + $yearstarted +'"}]';
			
			//alert($studinfo);
			
			if($studnum=="00-0000"||$studnum=="") {
				alert('Error! Please fill all the necessary fields.');
			} else {
				//alert($studinfo);
				$.ajax({
				type: "POST",
					url: "/php/addStudent.php",
					data: {studinfo: $studinfo, adminid: '<?php echo ($_SESSION['name'][2]);?>'},
					cache: false,
					success: function(result){
						//alert("Successfully added a new student record!");
						location.reload();  	
					}
				});
			}
		});
	</script>
	
	<script>
		$('.table-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $studnum = $row.find(".studnum").text(); // Find the text
			var $studinfo = '[{"studnum":"' + $studnum + '"}]';
			//alert($studinfo);
			$.ajax({
				type: "POST",
					url: "/php/removeStudent.php",
					data: {studinfo: $studinfo},
					cache: false,
					success: function(result){
						//alert("Successfully removed student entry!");
						//location.reload(); 			
					}
				});
			$(this).parents('tr').detach();			
		} else {}
		});
	</script>
</body>

</html>
