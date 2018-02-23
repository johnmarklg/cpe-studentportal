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
						<!--<div class="alert alert-success" role="alert">
						  You are currently signed in as <a href=""><?php echo $_SESSION["name"][1]?></a>
						</div>-->
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
								<?php
									$postID = $_GET['postID'];
									$adminid = $_GET['adminid'];
									
									require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
									require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/timefxn.php");

									
									$conn = getDB('cpe-studentportal');	
		
									$stmt = $conn->prepare("SELECT * FROM `posts` WHERE id = :id");
									$stmt -> bindParam(':id', $postID);
									$stmt->execute();
									
									foreach(($stmt->fetchAll()) as $row) { 
										$time = strtotime($row['datetime']);
										echo '<div class="panel panel-info">';
										echo '<div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
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
										<form action="/php/postComment.php" method="post" enctype="multipart/form-data">
										<textarea type="text" id="postComment"  name="postComment" name="postComment" class="form-control" placeholder="Comment on this post." cols="40" rows="2"></textarea>
										<input type="submit" class="btn btn-success btn-block" value="Submit Comment" name="submit">
										</form>
										</div></div><div><div>';
									}
									
									$stmt = $conn->prepare("SELECT comments.*, students.surname, students.firstname, students.middlename, administrators.name
										FROM `comments` 
										LEFT JOIN `students`
										ON students.studnum = comments.commenterid
										LEFT JOIN `administrators`
										ON administrators.id = comments.commenterid
										WHERE postid=:id ORDER BY path");
									$stmt -> bindParam(':id', $postID);
									$stmt->execute();
									
									foreach(($stmt->fetchAll()) as $row) { 
										$time = strtotime($row['datetime']);
										$patharr = explode('.', $row['path']);
										$pathsize = sizeof($patharr);
										$startbranch = str_repeat("<div class=\"col-lg-1\"></div>", $pathsize - 2);
										//main comment
										if($pathsize < 7) {
												if($pathsize==2) {
													echo '</div><div class="panel panel-info"><div class="panel-body">';
													if($row['name'] == NULL) {
														echo '' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename']. ' @<i> ' . $row['datetime'] . '</i>';
													} else {
														echo '<strong>' . $row['name'] . ' - <i>Faculty </strong>@ ' . $row['datetime'] . '</i>';	
													}
													echo '<br/>' . $row['comment'];
													echo '<hr style="margin-top: 5px; margin-bottom: 5px;"/>' . $startbranch . '<div class="input-group">
														<textarea type="text" id="comment' . $row['commentid'] . '"  name="comment" class="form-control" placeholder="Leave a comment." cols="40" rows="1"></textarea>
														<span class="input-group-btn">
														<button class="btn btn-default" type="button">Submit</button>
													  </span>';
													echo '</div></div>';
												} else {
													echo '<hr/>' . $startbranch;
													if($row['name'] == NULL) {
														echo '' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename']. ' @<i> ' . $row['datetime'] . '</i>';
													} else {
														echo '<strong>' . $row['name'] . ' - <i>Faculty </strong>@ ' . $row['datetime'] . '</i>';	
													}
													echo '<br/>' . $startbranch . $row['comment'];
													echo '<hr style="margin-top: 5px; margin-bottom: 5px;"/>' . $startbranch . '<div class="input-group">
														<textarea type="text" id="comment' . $row['commentid'] . '"  name="comment" class="form-control" placeholder="Leave a comment." cols="40" rows="1"></textarea>
														<span class="input-group-btn">
														<button class="btn btn-default" type="button">Submit</button>
													  </span></div>';
												}
										} else if($pathsize == 7) {
											//last comment of limit
											echo '<hr style="margin-top: 5px; margin-bottom: 5px;"/>' . $startbranch;
												if($row['name'] == NULL) {
													echo '' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename']. ' @<i> ' . $row['datetime'] . '</i>';
												} else {
													echo '<strong>' . $row['name'] . ' - <i>Faculty </strong>@ ' . $row['datetime'] . '</i>';	
												}
												echo '<br/>' . $startbranch . $row['comment'] . '<br/>';													
										}
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
		
		<script>
			$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="announcements.php"]').length;
					  })
					  .addClass('active');
			});
		</script>
	
		
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
