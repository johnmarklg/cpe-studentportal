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
                                <i class="fa fa-history"></i> History
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
								<i class="fa fa-fw fa-history"></i>Record Changes History</a>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Surname</th>
												<th>First Name</th>
												<th>Middle Name</th>
												<th>Student Number</th>
											</tr>
										</thead>
										<tbody>
											<tr>
											<?php
												$studnum = $_GET['studnum'];
												$courseid = $_GET['courseid'];
												
												require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
												
												$conn = getDB('cpe-studentportal');	
					
												$stmt = $conn->prepare("SELECT studnum, surname, firstname, middlename from `students` WHERE studnum = :studnum");
												$stmt -> bindParam(':studnum', $studnum);
												$stmt->execute();
												
												foreach(($stmt->fetchAll()) as $row) { 
													echo '<td>' . $row['surname'] . '</td>';
													echo '<td>' . $row['firstname'] . '</td>';
													echo '<td>' . $row['middlename'] . '</td>';
													echo '<td>' . $row['studnum'] . '</td>';
												}
											?>
											</tr>
										</tbody>
									</table>
								</div>
								<hr/><div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Course Code</th>
												<th>1st</th>
												<th>2nd</th>
												<th>3rd</th>
												<th>Action Taken</th>
												<th>Administrator</th>
												<th>Timestamp</th>
											</tr>
										</thead>
										<tbody>
												<?php
													$stmt = $conn->prepare("SELECT gradesaudit.adminid, gradesaudit.1st, gradesaudit.2nd, gradesaudit.3rd, gradesaudit.logtime, gradesaudit.action, administrators.name, subjects.coursecode
														FROM `grades` 
														LEFT JOIN `gradesaudit`
														ON `gradesaudit`.`recordid` = `grades`.`id`
														LEFT JOIN `administrators`
														ON `gradesaudit`.`adminid` = `administrators`.id
														LEFT JOIN `subjects`
														ON `subjects`.`subjectid` = `grades`.`courseid`
														WHERE studnum=:studnum and courseid=:courseid
														ORDER BY gradesaudit.logtime ASC");
													$stmt -> bindParam(':studnum', $studnum);
													$stmt -> bindParam(':courseid', $courseid);
													$stmt->execute();
													
													foreach(($stmt->fetchAll()) as $row) { 
														echo '<tr><td>' . $row['coursecode'] . '</td>';
														echo '<td>' . $row['1st'] . '</td>';
														echo '<td>' . $row['2nd'] . '</td>';
														echo '<td>' . $row['3rd'] . '</td>';
														echo '<td><i>' . $row['action'] . '</i></td>';
														echo '<td>' . $row['name'] . '</td>';
														echo '<td>' . $row['logtime'] . '</td></tr>';
													}
												?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel-footer">
								<a href="records.php?studnum=<?php echo $studnum?>"><button class="btn btn-block btn-primary">Go Back to Student Records</button></a>
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
		
		<script>
			$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="records.php"]').length;
					  })
					  .addClass('active');
			});
		</script>
	
		
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
