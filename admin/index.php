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
                                <i class="fa fa-th"></i> Bulletin Management
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
						  This is where you can <i>manage</i> the contents of the <strong>Digital Bulletin</strong>.
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
									<a  href="#1" data-toggle="tab"><i class="fa fa-paperclip"></i> News and Information</a>
									</li>
									<li><a href="#2" data-toggle="tab"><i class="fa fa-film"></i> Multimedia</a>
									</li>
									<li><a href="#3" data-toggle="tab"><i class="fa fa-group"></i> Faculty and Officers</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="active tab-pane" id="1">
									<div class="panel-body">
										<?php
										$stmt = $conn->prepare("SELECT * from `posts` WHERE `status` = 'Approved' ORDER BY datetime DESC");
										$stmt->execute();
										//approved already
										foreach(($stmt->fetchAll()) as $row) { 
											$time = strtotime($row['datetime']);
											echo '<div class="panel panel-info">';
											echo '<div class="panel-heading">' . '<a data-toggle="collapse" href="#collapsePanel' . $row['id'] . '"><strong>' . $row['poster'] . '</strong></a> @ <i>' . relativeTime($time) . '</i>';
											echo '<select id="' . $row['id'] .'" name="'. $row['datetime'] .'" class="showhide close" aria-label="close" style="font-size: 2.5vh;" onclick="showhide_cache=this.value;">';
											if ($row['showbulletin']=='1') { 
												echo '<option value="1" selected>Show</option> 
												<option value="0">Hidden</option>'; 
											} else {
												echo '<option value="1">Show</option> 
												<option value="0" selected>Hidden</option>';
											}
											echo '</select>';
											//echo '<a href="" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
											if($row['file'] == '') {
												echo '</div><div id="collapsePanel'.$row['id'].'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-12">';
											} else {
												echo '</div><div id="collapsePanel'.$row['id'].'" class="panel-collapse collapse"><div class="panel-body"><div class="col-lg-2">' .
												'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
												. '</div><div class="col-lg-10">';
											}
											echo '<strong>' . $row['posttitle'] . '</strong>';
											echo '<hr/>' . $row['post'];
											echo '</div></div></div></div>';
										}				
										?>
										<!--This is where stuff like news and announcements will be placed.-->
									</div>
									<!--<div class="panel-footer">
										<button class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Update News and Information</button>
									</div>-->
								</div>
								<div class="tab-pane" id="2">
									<div class="panel-body">
										This is where you can manage the gallery and video playback.
									</div>
									<div class="panel-footer">
										<button class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Update Multimedia</button>
									</div>
								</div>
								<div class="tab-pane" id="3">
									<div class="panel-body">
										This is where you can edit the photos and names of the current officers and faculty members.
									</div>
									<div class="panel-footer">
										<button class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Update Faculty and Officers</button>
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
	
	<script>
	$( document ).ready(function() {
			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
			$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="index.php"]').length;
					  })
			.addClass('active');
     });
	 
	 $('select').on('change', function() {
		if (!confirm('Are you sure you want to change this post\'s visibility on the bulletin?')) {
            $(this).val(showhide_cache);
            return false;
        } else {
			var $newBool = this.value;
			var $id = this.id;
			var $datetime = $(this).attr("name");
			//alert($datetime);
			var $data = '[{"ID":"' + $id + '","showBool":"' + $newBool + '","timestamp":"' + $datetime + '"}]';
			//alert($data);		
			$.ajax({
				type: "POST",
				url: "/php/updatePostVisibility.php",
				data: {admininfo: $data},
				cache: false,
				success: function(result){
					alert("Successfully changed post visibility!");
					//location.reload();
				}
			});
		}
	})
	 </script>
</body>
</html>
