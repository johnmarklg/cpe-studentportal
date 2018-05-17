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
							<i class="fa fa-fw fa-info-circle"></i> Update students on recent events and important announcements. Post Titles can have a maximum of <strong>30</strong> characters.
						  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<ul class="nav nav-pills nav-justified">
									<li class="active"><a href="#a2" data-toggle="tab">News Slider <span id="carouselcount" class="badge">0/450</span></a></li>
									<li><a href="#b2" data-toggle="tab">News Ticker <span id="tickercount" class="badge">0/50</a></span></li>
								</ul>								
							</div>
							<div class="panel-body tab-content">
								<div class="active tab-pane" id="a2">
									<form action="/php/postAnnouncement.php" onsubmit="return validateSlider()" method="post" enctype="multipart/form-data">
										<input maxlength="30" type="text" id="postTitle" name="postTitle" class="form-control" placeholder="Post Title"></input><br/>
										<textarea onkeyup="countChar(this)" maxlength="450" type="text" id="postText" name="postText" class="form-control" placeholder="Post announcements..." cols="40" rows="3"></textarea>	
										<script>
											function countChar(val) {
												var len = val.value.length;
												$('#carouselcount').html(len + '/450');
											}
										</script>
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
														<span class="image-preview-input-title">Add Attachment...</span>
														<input type="file" class="btn btn-info" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
													</div>
												</span>
												<input type="text" id="fileURL" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
											</div><!-- /input-group image-preview [TO HERE]--> 
											<br/>
											<div id="slidewarning" hidden class="alert alert-danger" role="alert">
												<i class="fa fa-fw fa-warning"></i> There's a maximum of 10 slider announcements available at a time, please delete old posts first before posting new announcement.
												<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
											</div>
											<input id="postslider" type="submit" class="btn btn-success btn-block" value="Post Announcement" name="submit">
										</div>
										<input type="hidden" id="permission" value="<?php echo $_SESSION['name'][0] ?>" name="permission" class="form-control"></input>
										<input type="hidden" id="posterID" value="<?php echo $_SESSION['name'][2] ?>" name="posterID" class="form-control"></input>
										<input type="hidden" id="poster" value="<?php echo $_SESSION['name'][1] ?>" name="poster" class="form-control"></input>
									</form>
									<script>
										$.ajax({
											type: "POST",
											url: "/php/getPostCount.php",
											data: {selector: '0'},
											cache: false,
											success: function(result){
												var $num = parseInt(result);
												if($num >= 10) {
													$('#postslider').prop('disabled', true);
													$('#slidewarning').show();
												}
											}
										});
										
										$.ajax({
											type: "POST",
											url: "/php/getPostCount.php",
											data: {selector: '1'},
											cache: false,
											success: function(result){
												var $num = parseInt(result);
												if($num >= 10) {
													$('#postticker').prop('disabled', true);
													$('#tickerwarning').show();
												}
											}
										});
											
										function validateSlider() {
											$title = $('#postTitle').val();
											$text = $('#postText').val();
											if(($title== '')||($text== '')||($title== null)||($text == null)) {
												alert('Please fill all the required fields!');
												return false;
											} else {
												if(!confirm('Are you sure you want to post this announcement?')) {
													return false;
												}
											}
										}
										function validateTicker() {
											$title = $('.postticker1').val();
											$text = $('.postticker2').val();
											if(($title== '')||($text== '')||($title== null)||($text == null)) {
												alert('Please fill all the required fields!');
												return false;
											} else {
												if(!confirm('Are you sure you want to post this announcement?')) {
													return false;
												}
											}
										}
									</script>
								</div>
								<div class="tab-pane" id="b2">
									<form action="/php/postAnnouncement2.php" onsubmit="return validateTicker()" method="post" enctype="multipart/form-data">
										<input maxlength="30" type="text" id="postTitle" name="postTitle" class="form-control postticker1" placeholder="Post Title"></input><br/>
										<textarea onkeyup="countChar2(this)" maxlength="50" type="text"  name="postText" name="postText" class="form-control postticker2" placeholder="Post announcements..." cols="40" rows="3"></textarea>	
										<script>
											function countChar2(val) {
												var len = val.value.length;
												$('#tickercount').html(len + '/50');
											}
										</script>
										<br/>
										<div id="tickerwarning" hidden class="alert alert-danger" role="alert">
											<i class="fa fa-fw fa-warning"></i> There's a maximum of 10 ticker announcements available at a time, please delete old posts first before posting new announcement.
											<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
										</div>
										<input id="postticker" type="submit" class="btn btn-success btn-block" value="Post Announcement" name="submit">
										<input type="hidden" id="permission" value="<?php echo $_SESSION['name'][0] ?>" name="permission" class="form-control"></input>
										<input type="hidden" id="posterID" value="<?php echo $_SESSION['name'][2] ?>" name="posterID" class="form-control"></input>
										<input type="hidden" id="poster" value="<?php echo $_SESSION['name'][1] ?>" name="poster" class="form-control"></input>
									</form>
								</div>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr/>
				<div class="row">
					<div class="col-lg-12">				
						<div class="alert alert-info" role="alert">
							<i class="fa fa-fw fa-info-circle"></i> You can filter by announcement type by selecting the Slider or the Ticker button below.
						  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
						</div>
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
