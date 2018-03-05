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
                                <i class="fa fa-bullhorn"></i> Announcements
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
							<i class="fa fa-fw fa-info-circle"></i> Update students on recent events and important announcements.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form action="/php/postAnnouncement.php" method="post" enctype="multipart/form-data">
							<input type="text" id="postTitle" name="postTitle" class="form-control" placeholder="Post Title"></input><br/>
							<textarea type="text" id="postText"  name="postText" name="postText" class="form-control" placeholder="Post announcements..." cols="40" rows="3"></textarea>	
							<br/>
							<div class="input-group btn-block" role="group" aria-label="...">
								<div class="input-group image-preview">
									<span class="input-group-btn block">
										<!-- image-preview-clear button -->
										<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
											<span><i class="fa fa-times"></i></span> Clear
										</button>
										<!-- image-preview-input -->
										<div class="btn btn-default image-preview-input">
											<span><i class="fa fa-upload"></i></span>
											<span class="image-preview-input-title">Add Image...</span>
											<input type="file" class="btn btn-info" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
										</div>
									</span>
									<input type="text" id="fileURL" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
								</div><!-- /input-group image-preview [TO HERE]--> 
								<br/>
								<input type="submit" class="btn btn-success btn-block" value="Post Announcement" name="submit">
							</div>
							<input type="hidden" id="posterID" value="<?php echo $_SESSION['name'][2] ?>" name="posterID" class="form-control"></input>
							<input type="hidden" id="poster" value="<?php echo $_SESSION['name'][1] ?>" name="poster" class="form-control"></input>
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr/>
				<div class="row">
					<div class="col-lg-12">				
						<?php	
							require($_SERVER["DOCUMENT_ROOT"] . '/php/showAnnouncements.php');
							echo showAnnouncements($_SESSION['name'][2]);
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
			  <small id="posterID" hidden><?php echo ($_SESSION['name'][2]);?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
    </div>
    <!-- /#wrapper -->
	<script src="/functions/js/announcements.js"></script>
	
</body>
</html>
