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
							<li>
                                <i class="fa fa-gear"></i> Bulletin Settings
                            </li>
                            <li class="active">
                                <i class="fa fa-film"></i> Multimedia
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> This is where you can <i>manage</i> the contents of the <strong>Digital Bulletin</strong>.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;" id="myTabs">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#a" data-toggle="tab"><i class="fa fa-film"></i> Banner Video</a>
									</li>
									<li><a href="#b" data-toggle="tab"><i class="fa fa-photo"></i> Photo Gallery</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="active tab-pane" id="a">
									<div class="panel-body">
										<div class="panel panel-primary">
											<div class="panel-heading">
											Banner Video Management
											</div>
											<div class="panel-body">
												<div class="panel panel-info">
													<div class="panel-heading">
														<a data-toggle="collapse" href="#collapsePanelVid" style="color: white;"><i class="fa fa-fw fa-youtube"></i> Click to Show Current Uploaded Banner Video</a>
													</div>
													<div id="collapsePanelVid" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="alert alert-info" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> You may have to clear your browser cache to be able to see the changes.
														  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														</div>
														<video height="600" preload="none" style="width: 100%;" preload="none" controls no-cache>
														  <source src="/uploads/video/movie.mp4?t=<?php echo date('timestamp');?>" type="video/mp4">
														  <source src="/uploads/video/movie.ogg?t=<?php echo date('timestamp');?>" type="video/ogg">
															Your browser does not support the video tag. Please update your browser!
														</video>
													</div>
													</div>
												</div>
												<hr/>
												<form action="/php/uploadBannerVideo.php" method="post" enctype="multipart/form-data">
														<input name="vidToUpload" id="vidToUpload" type="file" class="btn btn-info btn-block" accept="video/*">
														<input type="submit" name="submit" value="Upload Video" id="upload-video" class="btn btn-default btn-success btn-block"></input>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="b">
									<div class="panel-body">
										<div class="panel panel-primary">
											<div class="panel-heading">
											Photo Gallery Management
											</div>
											<div class="panel-body">
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
			  <small id="posterID" hidden><?php echo ($_SESSION['name'][2]);?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
    </div>
    <!-- /#wrapper -->
	<?php
		$conn = null;
	?>
	<script src="/functions/js/bulletin.js"></script>
	<script>
	
	</script>
</body>
</html>
