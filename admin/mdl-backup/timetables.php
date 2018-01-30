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
		<title>Subject Timetables</title>
		<?php 
			require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
			get_header();
		?>
		<style>
			#updateTimetable {
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
						<a class="mdl-navigation__link mdl-typography--text-uppercase" href="events.php">Calendar</a>
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
				<a class="mdl-navigation__link" href="events.php">Set Calendar</a>
				<a class="mdl-navigation__link" href="records.php">Update Student Records</a>
				<a class="mdl-navigation__link" href="timetables.php">Set Subject Schedules</a>
				<div class="android-drawer-separator"></div>
				<a class="mdl-navigation__link" href="logout.php">Sign Out</a>
			</nav>
		</div>
      <div class="android-content mdl-layout__content">
        <div id="div-timetable" class="android-screen-section mdl-typography--text-center">
		  <div class="android-screens mdl-grid centeritems">
				<div class="mdl-layout-spacer"></div>
					<!-- Basic Chip -->
					<span class="mdl-chip">
							<span class="mdl-chip__text">You are currently logged in as <?php echo $_SESSION["name"][1]?>.</span>
					</span>
					 <!-- Simple Select -->
        		<div class="mdl-layout-spacer"></div>
			</div>
		  <hr/>
          <!--<div class="mdl-typography--display-1-color-contrast">Transcript of Grades</div>-->
			  <?php	
					require($_SERVER["DOCUMENT_ROOT"] . '/php/readTimetable.php');
					echo listTimetable();
				?>
    </div>
    <form>
		<button type="button" id="updateTimetable" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">save</i></button>
    </form>	
</div>
<?php
    get_footer();
?>
	<script>
		$('.table-add').click(function () {
			var $clone = $(this).closest('table').find('tr.hide').clone(true).removeClass('hide').toggle();
			$(this).closest('table').append($clone);
		});
		$('.table-remove').click(function () {
			$(this).parents('tr').detach();
		});
	</script>
	
	<script>
		$("#updateTimetable").click(function(){
			var timeTable1 = $('#tablefirst').tableToJSON();
			var timeTable2 = $('#tablesecond').tableToJSON();
			var timeTable3 = $('#tablethird').tableToJSON();
			var timeTable4 = $('#tablefourth').tableToJSON();
			var timeTable5 = $('#tablefifth').tableToJSON();
			$.ajax({
				type: "POST",
				url: "../php/updateTimetable.php",
				data: {tablefirst: JSON.stringify(timeTable1), tablesecond: JSON.stringify(timeTable2), tablethird: JSON.stringify(timeTable3), tablefourth: JSON.stringify(timeTable4), tablefifth: JSON.stringify(timeTable5)},
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