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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
    <!-- jQuery -->
    <script src="/assets/bootstrap/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- PACE -->
	<script src="/assets/pace/pace.min.js"></script>
	<!-- Autosize -->
	<script src="/assets/js/autosize.min.js"></script>
	<link rel="stylesheet" href="/assets/pace/pace-theme-flash.css">
	<!--Date Format-->
	<!--<script src="/assets/js/date.format.js"></script>-->
	<!--Moment JS-->
	<!--<script src="/assets/js/moment.min.js"></script>-->
	
	<style>
			.post-remove:hover {
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
                    <li class="active">
                        <a href="announcements.php"><i class="fa fa-fw fa-bullhorn"></i> Announcements</a>
                    </li>
                    <li>
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
                                <i class="fa fa-bullhorn"></i> Announcements
                            </li>
                        </ol>
						<div class="alert alert-success" role="alert">
						  You are currently signed in as <a id="posterName" href=""><?php echo $_SESSION["name"][1]?></a>
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  Update students on recent events and important announcements.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					<form action="/functions/upload.php" method="post" enctype="multipart/form-data">
						<input type="text" id="postTitle" name="postTitle" class="form-control" placeholder="Post Title"></input><br/>
						<textarea type="text" id="postText"  name="postText" name="postText" class="form-control" placeholder="Post announcements..." cols="40" rows="3"></textarea>	
						<br/><div class="input-group" role="group" aria-label="...">
							<input type="file" class="btn btn-info btn-block" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
							<img id="blah" src=""/>
							<input type="submit" class="btn btn-success btn-block" value="Post Announcement" name="submit">
						</div>
						<input type="hidden" id="posterID" value="<?php echo $_SESSION['name'][2] ?>" name="posterID" class="form-control"></input>
						<input type="hidden" id="poster" value="<?php echo $_SESSION['name'][1] ?>" name="poster" class="form-control"></input>
					</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr/>
				<?php	
					require($_SERVER["DOCUMENT_ROOT"] . '/php/showAnnouncements.php');
					echo showAnnouncements();
				?>
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
	<script>
	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(250)
                        .height(250);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
		autosize($('textarea'));
		
		/*$('#buttonClear').click(function() {
			$('#postText, textarea').val('');
		});*/
		
		$('.btnApprove').click(function() {
			var $id = $(this).attr('id');   
			var $postinfo = '[{"id":"' + $id + '"}]';
			//alert($postinfo);
			if(confirm('Do you want to approve this post for publishing?')) {
				$.ajax({
					type: "POST",
						url: "/php/postAnnouncement.php",
						data: {postData: $postinfo},
						cache: false,
						success: function(result){
							location.reload();
						}
					});
			} else {}
		});
		
		$('.post-remove').click(function () {
			var $id = $(this).attr('id'); 
			var $postinfo = '[{"id":"' + $id + '"}]';
			//alert($postinfo);
			if(confirm('Do you want to remove this entry from the database?')) {
				$.ajax({
					type: "POST",
						url: "/php/deleteAnnouncement.php",
						data: {postData: $postinfo},
						cache: false,
						success: function(result){
							//deleted
							location.reload();
						}
					});
			} else {}
		});
	</script>
</body>
</html>
