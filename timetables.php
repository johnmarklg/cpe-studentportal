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
?>	
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
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-info-circle"></i> View current subjects and schedules for the current semester for your year level.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-warning" role="alert">
						  <i class="fa fa-warning"></i> There may be issues if your Student Number does not match your current year level. Inform a faculty member in this case.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>

				
				<div class="row">
					<div class="col-lg-12">
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showSchedules.php');
						echo showSchedules();
						?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> This timetable is best viewed on a larger screen. Please refer to the table above instead if it does not display correctly on your device.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">			
							<div class="panel-body ">
								<div style="padding: 0;" class="panel-body">
									<div id="timetable"></div>
								</div>
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
		
    </div>
    <!-- /#wrapper -->
	
	
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	
	<script src="/assets/jquery-scheduler/js/jquery.schedule.min.js"></script>
	<link href="/assets/jquery-scheduler/css/jquery.schedule.min.css" rel="stylesheet">
	<script>
		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
		$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="timetables.php"]').length;
				  })
				  .addClass('active');
		});
	</script>
	<?php 
		$conn = getDB('cpe-studentportal');	
		
		$myyear = mb_substr($_SESSION["name"][4], 0, 2);
		$actualyear = date('y') - $myyear;
			
			echo '<script>
				$(document).ready(function () {
					$("#timetable").jqs({
						mode: "read",
						hour: 12,
						days: [
							  "MON",
							  "TUE",
							  "WED",
							  "THU",
							  "FRI",
							  "SAT",
							  "SUN"
						  ],
						data: [{
								day: 0,
								periods: [';

			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.mon = 1");
			$stmt -> bindParam(':year', $actualyear);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"}';
				} else {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"},';
				}
			}
			//tuesday
			echo ']},{
				day: 1,
				periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.tue = 1");
			$stmt -> bindParam(':year', $actualyear);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"}';
				} else {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"},';
				}
			}
			//wednesday
			echo ']},{
				day: 2,
				periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.wed = 1");
			$stmt -> bindParam(':year', $actualyear);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"}';
				} else {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"},';
				}
			}
			//thursday
			echo ']},{
				day: 3,
				periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.thu = 1");
			$stmt -> bindParam(':year', $actualyear);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"}';
				} else {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"},';
				}
			}
			//friday
			echo ']},{
				day: 4,
				periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.fri = 1");
			$stmt -> bindParam(':year', $actualyear);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"}';
				} else {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"},';
				}
			}
			//saturday
			echo ']},{
				day: 5,
				periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.sat = 1");
			$stmt -> bindParam(':year', $actualyear);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"}';
				} else {
				echo '{start: "' . $row['starttime'] . '",
						end: "' . $row['endtime'] . '",
						title: "' . $row['coursecode'] . '",
						textColor: "#fff"},';
				}
			}
			echo ']}]
				});
			});
			</script>';
		
		$conn = null;
	?>
</body>

</html>
