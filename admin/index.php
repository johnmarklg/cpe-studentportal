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

require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/timefxn.php");
$conn = getDB('cpe-studentportal');													
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
		get_header();
		announcement_extra();
	?>	
	<style>
		.post-remove:hover {
		  color: #f00;
		  cursor: pointer;
		}
		.image-preview-input {
			position: relative;
			overflow: hidden;
			margin: 0px;    
			color: #333;
			background-color: #fff;
			border-color: #ccc;    
		}
		.image-preview-input input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		.image-preview-input-title {
			margin-left:2px;
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
                                <i class="fa fa-map-marker"></i> Website Guide
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->	
				<div class="row">
					<div class="col-lg-12">
						<h4>ABOUT CpE Student Portal Administrator</h4>
						<p>CpE Student Portal is for Computer Engineering students Mariano Marcos State University - College of Engineering, that serves as a personal assistant in carrying out academic-related tasks.</p>
						<p>Administrators can manage students' personal details, schedules, current grades, accountabilities, curriculum checklist, and more. In addition, they can also post announcements and set
						events and activities in the calendar that can be viewed by students. Finally, administrators can also update and manage the digital bulletin.</p>
						<hr/>
						<h4>FEATURES AVAILABLE FOR ADMINISTRATORS</h4>
						<p><i><strong><?php echo $_SESSION["name"][1]?></a></strong></i>: </p>
						<ul>
							<li><i><a href="profile.php">Update Profile: </a></i> You can view/update your personal profile in the database.</li>
							<li><i><a href="logout.php">Sign Out: </a></i> You can end your current session and quit the Student Portal Administrator.</li>
						</ul>
						<p><i><strong>Bulletin Settings</strong></i>: </p>
						<ul>
							<li><i><a href="gallery.php">Gallery: </a></i> You can upload and/or delete images to be shown in the Digital Bulletin</li>
							<li><i><a href="videos.php">Videos: </a></i> You can upload and/or remove videos to be shown in the Digital Bulletin</li>
							<li><i><a href="officers.php">Officers: </a></i> You can view and/or update student officers and their photos to be displayed in the bulletin.</li>
							<li><i><a href="power.php">Pi Control: </a></i> You can shutdown or restart the Digital Bulletin as well as the Student Portal.</li>
						</ul>
						<p><i><strong>Events and Announcements</strong></i>: </p>
						<ul>
							<li><i><a href="announcements.php">Announcements: </a></i>You can post announcements, approve/reject other administrators' announcements, and view all approved announcements.</li>
							<li><i><a href="calendar.php">Academic Calendar: </a></i> You can view, add, or remove events and holidays to be listed in the calendar.</li>
						</ul>
						<?php
							if($_SESSION['name'][0]=='Administrator (Elevated)') {
								echo '<p><i><strong>Elevated Administrator</strong></i>: </p>
								<ul>
									<li><i><a href="administrators.php">Administrators: </a></i>You can add and/or remove administrators, change their permission level, and view their activity logs.</li>
									<li><i><a href="curriculum.php">Curricula: </a></i> You can view, add, remove or update existing curricula for students.</li>
								</ul>
								<p><i><strong>Info Text</strong></i>: </p>
								<ul>
									<li><i><a href="geninfo.php">General Information: </a></i> You can view and/or update General Information such as the Mission, Vision, Goals and the Rights and Responsibilites of Students.</li>
									<li><i><a href="about.php">About Portal: </a></i> You can view and/or update the About Section of the Students\' side of the Portal.</li>
									<li><i><a href="hymnmarch.php">Hymn and March: </a></i> You can view and/or edit the lyrics of the University Hymn/March</li>
								</ul>';						
							}
						?>
						<p><i><strong>Students</strong></i>: </p>
						<ul>
							<li><i><a href="profile.php">Profile Requests: </a></i> You can view, approve or reject student profile update requests.</li>
							<li><i><a href="students.php">Student Records: </a></i> You can view the list, update, and add student information to the database. In addition, you can also view their activity logs.</li>
							<li><i><a href="handouts.php">Handouts: </a></i> You can upload or remove handouts with passwords for students to view/download.</li>
							<li><i><a href="timetables.php">Class Scheduler: </a></i> You can view, add, update, or remove class schedules to be shown to students.</li>
						</ul>
					</div>
					<!--<div class="col-lg-6">
						Another thing
					</div>-->
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
	
		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © CpE Student Portal <?php echo date('Y') ?></small>
			  <small id="posterID" hidden><?php echo ($_SESSION['name'][2]);?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
    </div>
    <!-- /#wrapper -->
</body>
</html>
