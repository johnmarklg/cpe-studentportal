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
		<!--<meta charset="utf-8">-->
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<meta name="description" content="Welcome to the CpE Student Portal.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>Student Records</title>
		<?php 
			require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
			get_header();
		?>
	</head>
	<body>
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

			<div class="android-header mdl-layout__header mdl-layout__header--waterfall">
				<div class="mdl-layout__header-row">
					<span class="android-title mdl-layout-title">
						<img class="android-logo-image" src="/assets/images/cpe-portal-blue.png">
					</span>
					<!-- Add spacer, to align navigation to the right in desktop -->
					<div class="android-header-spacer mdl-layout-spacer"></div>
					<!-- Navigation -->
					<div class="android-navigation-container">
						<nav class="android-navigation mdl-navigation">
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php">Announcements</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="calendar.php">Calendar</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="records.php">Student Records</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="timetables.php">Timetables</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="logout.php">Sign Out</a>
						</nav>
					</div>
					<span class="android-mobile-title mdl-layout-title">
						<img class="android-logo-image" src="/assets/images/cpe-portal-blue.png">
					</span>
				</div>
			</div>

			<div class="android-drawer mdl-layout__drawer">
				<span class="mdl-layout-title">
					<img class="android-logo-image" src="/assets/images/cpe-portal-white.png">
				</span>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="index.php">Post Announcements</a>
					<a class="mdl-navigation__link" href="calendar.php">Set Calendar</a>
					<a class="mdl-navigation__link" href="grades.php">Update Student Records</a>
					<a class="mdl-navigation__link" href="timetable.php">Create Timetable</a>
					<div class="android-drawer-separator"></div>
					<a class="mdl-navigation__link" href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
				</nav>
			</div>

			<div class="android-content mdl-layout__content">
				<div class="android-screen-section mdl-typography--text-center">
					<div class="android-screens mdl-grid centeritems">
						<div class="mdl-layout-spacer"></div>
						<!-- Basic Chip -->
						<span class="mdl-chip">
						<!--0 for Position, 1 for Name-->
							<span class="mdl-chip__text">You are currently logged in as <?php echo $_SESSION["name"][1]?>.</span>
						</span>
						<div class="mdl-layout-spacer"></div>
					</div>
					<hr/>
					<div class="android-screens mdl-grid centeritems">
						<div class="mdl-layout-spacer"></div>
							<div id='calendar'>
							</div>
						<div class="mdl-layout-spacer"></div>
					</div>
				</div>
			</div>
		</div>
		<?php
			get_footer();
		?>
		
		<script>
			$("#postAnnouncement").click(function(){
				var tableGrades = $('#grades').tableToJSON();
				var tableStudInfo= $('#studentinfo').tableToJSON();  
				$.ajax({
				type: "POST",
					url: "/php/updateStudentRecords.php",
					data: {studgrades: JSON.stringify(tableGrades), studinfo: JSON.stringify(tableStudInfo)},
					cache: false,
					success: function(result){
						//alert("Successfully updated database!");
					}
				});
				return false;
			});
		</script>
	</body>
</html>