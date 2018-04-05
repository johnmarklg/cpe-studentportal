-<?php
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
<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
	get_header();
	calendar_extra();
?>	
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="/assets/jquery-scheduler/jquery.schedule.css">
    
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
			  text-decoration: underline;
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

        <?php user_nav(); ?>

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
						<div class="panel panel-default">
							<div class="panel-body">
								<?php	
								require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
								$conn = getDB('cpe-studentportal');	
									
								//get year
								$stmt = $conn->prepare("SELECT yearstarted FROM `students`
								WHERE studnum = :studnum");
								$stmt -> bindParam(':studnum', $_SESSION['name'][4]);
								$stmt->execute();
								
								foreach($stmt->fetchAll() as $row) { 
									$year = $row['yearstarted'];
								}
								$year = date('y') - $year; 
								
								require($_SERVER["DOCUMENT_ROOT"] . '/php/showTimetables.php');
								echo showTimetable($_SESSION['name'][4], $year);
								?>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> Note: The timetables is best viewed on a larger screen. Please refer to the table above instead if it does not display correctly on your device.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php 
									//$conn = getDB('cpe-studentportal');	
									
									echo '<select id="tableselect" class="form-control"><option value="0">Select Year and Section</option>';
									$counter = 1;
										$stmt = $conn->prepare("SELECT DISTINCT section FROM `schedules`
										LEFT JOIN subjects
										ON subjects.subjectid = schedules.subjectid
										WHERE subjects.defaultyear = :year");
										$stmt -> bindParam(':year', $year);
										$stmt->execute();
										
										$sections = array();
										foreach($stmt->fetchAll() as $row) { 
											array_push($sections, $row['section']);
										}
										
										foreach($sections as $key=>$section) {
											echo '<option value="' . $counter . '">' . $year . $section. '</option>';		
											$counter+=1;
										}
									echo '</select>';
									
									$conn = null;
								?>
							</div>
							<div class="panel-body">
								<div id="timetable"></div>
							</div>
						</div>
					</div>
				</div>
				
				
				<script>
					$('#tableselect').on('change', function() {
						//$('#timetable').empty();
						var $tableid = this.value;
						var $tablename = this.options[this.value].text;
						var $year = $tablename.charAt(0);
						var $section = $tablename.charAt(1);
						if($tableid != 0) {
							//alert($year);
							//alert($section);
							$.ajax({
								type: "POST",
								url: "/php/getTable.php",
								data: {year: $year, section: $section},
								cache: false,
								success: function(result){
									//alert(result);
									$("#timetable").jqs({mode: "read",hour: 12, days: ["MON","TUE","WED","THU","FRI","SAT","SUN"], periodTextColor: "#fff",periodDuration: 30});									
									$("#timetable").jqs('reset');									
									eval("$('#timetable').jqs('import', " + result + ");");
									//console.log(result);
									//location.reload();  	
								}
							});
						}
					});
				</script>
					
							<!--<div class="panel-heading" style="text-align: center;" id="myTabs2">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#1b" data-toggle="tab">First Year</a>
									</li>
									<li><a href="#2b" data-toggle="tab">Second Year</a>
									</li>
									<li><a href="#3b" data-toggle="tab">Third Year</a>
									</li>
									<li><a href="#4b" data-toggle="tab">Fourth Year</a>
									</li>
									<li><a href="#5b" data-toggle="tab">Fifth Year</a>
									</li>
								</ul>
							</div>	-->			
							<!--<div class="panel-body tab-content ">
								<div class="tab-pane active" id="1b">-->
								<!--</div>
								<div class="tab-pane" id="2b">
									<div style="padding: 0;" class="panel-body">
										<div id="timetable2"></div>
									</div>
								</div>
								<div class="tab-pane" id="3b">
									<div style="padding: 0;" class="panel-body">
										<div id="timetable3"></div>
									</div>
								</div>
								<div class="tab-pane" id="4b">
									<div style="padding: 0;" class="panel-body">
										<div id="timetable4"></div>
									</div>
								</div>
								<div class="tab-pane" id="5b">
									<div style="padding: 0;" class="panel-body">
										<div id="timetable5"></div>
									</div>
								</div>-->
							<!--</div>
						</div>
					</div>
				</div>-->
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
	<script src="/functions/js/timetables.js"></script>
	<?php	
			/*echo '
			<script>
			$(document).ready(function () {
			var $timetable3 = $("#timetable' . $x . '").jqs({mode: "read",hour: 12, days: ["MON","TUE","WED","THU","FRI","SAT","SUN"], periodTextColor: "#fff",periodDuration: 30,
			data: [{day: 0, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.mon = 1 ORDER BY TIME(schedules.starttime) ASC");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 1, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.tue = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 2, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.wed = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 3, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.thu = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 4, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.fri = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			//saturday
			echo ']},
			{day: 5, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.sat = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']}]});
			});
			</script>';
		}*/
		$conn = null;
	?>
</body>

</html>