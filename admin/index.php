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
                                <i class="fa fa-bullhorn"></i> Announcements
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> This is where you can <i>manage</i> which posts/announcements will be shown on the <strong>Digital Bulletin</strong>.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
							Shown Announcements
							</div><div class="panel-body">
								<?php
									if($_SESSION['name'][0]=='Administrator (Elevated)') {$stmt = $conn->prepare("SELECT posts.*, administrators.name as poster from `posts` 
									LEFT JOIN administrators
									ON administrators.id = posts.posterid
									WHERE `status` = 'Approved' ORDER BY datetime DESC"); } else {
									$stmt = $conn->prepare("SELECT posts.*, administrators.name as poster from `posts` 
									LEFT JOIN administrators
									ON administrators.id = posts.posterid
									WHERE `status` = 'Approved' AND showbulletin != 2 ORDER BY datetime DESC");	
									}
									$stmt->execute();
										//approved already
										foreach(($stmt->fetchAll()) as $row) { 
											$time = strtotime($row['datetime']);
											echo '<div class="panel panel-default">';
											echo '<div class="panel-heading">' . '<a data-toggle="collapse" href="#collapsePanel' . $row['id'] . '"><strong>' . $row['poster'] . '</strong></a> @ <i>' . relativeTime($time) . '</i>';
											if (($row['filetype'] == 'gif')||($row['filetype'] == 'jpg')||($row['filetype'] == 'png')||($row['filetype'] == 'webp')) {
												echo '</div><div id="collapsePanel'.$row['id'].'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-2">' .
												'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
												. '</div><div class="col-lg-10"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
											} else if ($row['file'] == ''){
												echo '</div><div id="collapsePanel'.$row['id'].'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
											} else {
												echo '</div><div id="collapsePanel'.$row['id'].'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '<hr/>
												<a href="/uploads/' . $row['file'] . '" title="' . $row['posttitle'] . '">Click here to view/download attachment</a></div>';
											}
											echo '</div></div>';
											echo '<div class="panel-footer">';
											echo '<select id="' . $row['id'] .'" name="'. $row['datetime'] .'" class="showhide form-control" aria-label="close" style="font-size: 2.5vh; color: #4f4f4f" onclick="showhide_cache=this.value;">';
											if ($row['showbulletin']=='1') { 
												echo '<option value="1" selected>Shown</option> 
												<option value="0">Hide</option>
												<option value="2">Dismiss</option>'; 
											} else if ($row['showbulletin']=='0') {
												echo '<option value="1">Show</option> 
												<option value="0" selected>Hidden</option>
												<option value="2">Dismiss</option>';
											} else {
												echo '<option value="1">Undismiss, Show</option> 
												<option value="0">Undismiss, Hide</option>
												<option value="2" selected>Dismissed</option>';
											}
											echo '</select>';
											echo '</div></div>';
										}				
								?>
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
</body>
</html>
