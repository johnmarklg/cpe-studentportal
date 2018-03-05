<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
	if(($_SESSION['name'][0]<>'Administrator') && ($_SESSION['name'][0]<>'Administrator (Elevated)') && ($_SESSION['name'][0]<>'Limited')) {
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
                                <i class="fa fa-file"></i> Show Post
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
								<?php
									$postID = $_GET['postID'];
									$adminid = $_SESSION['name'][2];
									
									require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
									require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/timefxn.php");

									
									$conn = getDB('cpe-studentportal');	
		
									$stmt = $conn->prepare("SELECT * FROM `posts` WHERE id = :id");
									$stmt -> bindParam(':id', $postID);
									$stmt->execute();
									
									foreach(($stmt->fetchAll()) as $row) { 
										$time = strtotime($row['datetime']);
										echo '<div id="' . $postID . '" name="' . $adminid . '" class="panel panel-primary post"><div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
										if($row['file'] == '') {
											echo '</div><div class="panel-body"><div class="col-lg-12">';
										} else {
											echo '</div><div class="panel-body"><div class="col-lg-2">' .
											'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
											. '</div><div class="col-lg-10">';
										}
										echo '<strong>' . $row['posttitle'] . '</strong>';
										echo '<hr/>' . $row['post'];
										echo '</div></div>
										<div class="panel-footer">
										<textarea type="text" id="comment0"  name="comment" class="form-control" placeholder="Leave a comment." cols="40" rows="1"></textarea>
										<button id="0" class="btnComment btn btn-success btn-block" type="button">Submit</button>
										</div></div>';
									}
									
									$stmt = $conn->prepare("SELECT comments.*, students.surname, students.firstname, students.middlename, administrators.name, administrators.position
										FROM `comments` 
										LEFT JOIN `students`
										ON students.studnum = comments.commenterid
										LEFT JOIN `administrators`
										ON administrators.id = comments.commenterid
										WHERE postid=:id ORDER BY path");
									$stmt -> bindParam(':id', $postID);
									$stmt->execute();
									
									$oldpath=0;
									//initialize value
									foreach(($stmt->fetchAll()) as $row) { 
										$time = strtotime($row['datetime']);
										$patharr = explode('.', $row['path']);
										$pathsize = sizeof($patharr);
										$diff = $oldpath - $pathsize;
										if($diff==0) {
											echo '</div></div>';
										} else if ($diff>0) {
											echo str_repeat('</div></div>', $diff + 1);
										}
										if($pathsize<7) {
											echo '<div class="panel panel-info" style="border-width: 0 0 0 1px; margin-bottom: 0.6em;"><div class="panel-heading">';
											if($row['name'] == NULL) {
												echo '<strong>' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename']. '</strong> @<i> ' . $row['datetime'] . '</i>';
											} else {
												echo '<strong>' . $row['name'] . ' - <i>'. $row['position'] . ' </strong>@ ' . $row['datetime'] . '</i>';	
											}
											echo '</div>
											<div class="panel-body" style="padding: 10px; padding-right: 3px; padding-bottom: 1em;">' . $row['comment']; 
											if($pathsize!=6) {
											echo '<hr style="margin-top: 10px; margin-bottom: 10px;"/>
											<div class="input-group">
												<textarea type="text" id="comment' . $row['commentid'] . '"  name="comment" class="form-control" placeholder="Comment here..." cols="40" rows="1"></textarea>
												<span class="input-group-btn"><button id="' . $row['commentid']. '" class="btnComment btn btn-default" type="button">Submit</button></span>
											</div><hr style="margin-top: 10px; margin-bottom: 10px;"/>';
											}
										}
											$oldpath = $pathsize;
										//}
									}
								?>
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
		
		<script src="/functions/js/post.js"></script>
	
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
