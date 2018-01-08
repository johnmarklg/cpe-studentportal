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
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1]?> <b class="caret"></b></a>
					<div class="dropdown-backdrop"></div>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-fw fa-gear"></i> Settings</a>
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
						</div>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  Update students on recent events and important announcements.
						</div>
					</div>
				</div>

				<style>
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
				<script>
				$(document).on('click', '#close-preview', function(){ 
					$('.image-preview').popover('hide');
					// Hover befor close the preview
					$('.image-preview').hover(
						function () {
						   $('.image-preview').popover('show');
						}, 
						 function () {
						   $('.image-preview').popover('hide');
						}
					);    
				});

				$(function() {
					// Create the close button
					var closebtn = $('<button/>', {
						type:"button",
						text: 'x',
						id: 'close-preview',
						style: 'font-size: initial;',
					});
					closebtn.attr("class","close pull-right");
					// Set the popover default content
					$('.image-preview').popover({
						trigger:'manual',
						html:true,
						title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
						content: "There's no image",
						placement:'bottom'
					});
					// Clear event
					$('.image-preview-clear').click(function(){
						$('.image-preview').attr("data-content","").popover('hide');
						$('.image-preview-filename').val("");
						$('.image-preview-clear').hide();
						$('.image-preview-input input:file').val("");
						$(".image-preview-input-title").text("Browse"); 
					}); 
					// Create the preview image
					$(".image-preview-input input:file").change(function (){     
						var img = $('<img/>', {
							id: 'dynamic',
							width:250,
							height:200
						});      
						var file = this.files[0];
						var reader = new FileReader();
						// Set preview image into the popover data-content
						reader.onload = function (e) {
							$(".image-preview-input-title").text("Change");
							$(".image-preview-clear").show();
							$(".image-preview-filename").val(file.name);            
							img.attr('src', e.target.result);
							$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
						}        
						reader.readAsDataURL(file);
					});  
				});
				</script>
				
				<div class="row">
					<div class="col-lg-12">
						<form  action="/functions/upload.php" method="post" enctype="multipart/form-data">
							<textarea type="text" id="postText" name="postText" class="form-control" placeholder="Post announcements..." cols="40" rows="3"></textarea>								
							<div class="input-group image-preview">
								<span class="input-group-btn">
									<!-- image-preview-clear button -->
									<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
										<span><i class="fa fa-times"></i></span> Clear
									</button>
									<!-- image-preview-input -->
									<div class="btn btn-default image-preview-input">
										<span><i class="fa fa-upload"></i></span>
										<span class="image-preview-input-title">Add Image...</span>
										<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
									</div>
								</span>
								<input type="text" id="fileURL" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
								</script>
							</div><!-- /input-group image-preview [TO HERE]--> 
							<div class="btn-group btn-group-justified" role="group" aria-label="...">
							  <div class="btn-group" role="group">
								<button type="button" id="buttonPost" class="btn btn-default btn-success"><i class="fa fa-fw fa-bullhorn"></i> Post</button>
							  </div>
							  <div class="btn-group" role="group">
								<button type="button" id="buttonClear" class="btn btn-default btn-danger"><i class="fa fa-fw fa-remove"></i>Clear Text</button>
							  </div>
							</div>
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
		autosize($('textarea'));
		
		$('#buttonClear').click(function() {
			$('#postText, textarea').val('');
		});
		
		$('.post-remove').click(function () {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $date = $row.find(".date").text(); // Find the text
			var $time = $row.find(".time").text(); // Find the text
			var $post = $row.find(".post").text(); // Find the text
			var $fileurl = $row.find(".fileurl").text(); // Find the text
			var $postinfo = '[{"id":"' + $id + '","date":"' + $date + '","time":"' + $time +
			'","post":"' + $post + '","fileurl":"' + $fileurl + '"}]';
			//alert($postinfo);
			if(confirm('Do you want to remove this entry from the database?')) {
				$.ajax({
					type: "POST",
						url: "/php/deleteAnnouncement.php",
						data: {postData: $postinfo},
						cache: false,
						success: function(result){
							//deleted
							$row.remove();
						}
					});
			} else {}
		});
		
		$("#buttonPost").click(function(){
			//set actual text value
			var $post = $('#postText, textarea').val();
			if($post!="") {
			//get current date and time;
				var $currentdate = new Date(); 
				var $date = $currentdate.getDate() + "/"
					+ ($currentdate.getMonth()+1)  + "/" 
					+ $currentdate.getFullYear();
				var $time = $currentdate.getHours() + ":"  
					+ $currentdate.getMinutes(); /*+ ":" 
					+ $currentdate.getSeconds();*/
				var $poster = $('#posterName').text();
				var $posterid = $('#posterID').text();
				var $fileurl = $('#fileURL').val();
				var $postdata = '[{"Date":"' + $date + '","Time":"' + $time +
				'","Post":"' + $post + '","Poster":"' + $poster +'","PosterID":"' + $posterid +'","FileURL":"' + $fileurl + '"}]';
				
				$.ajax({
				type: "POST",
					url: "/php/postAnnouncement.php",
					data: {postData: $postdata},
					cache: false,
					success: function(result){
						location.reload();  
						//alert(String(result));
					}
				});
				return false;
			} else {
				alert("Error. Please input an actual post.");
			}
		});
	</script>
</body>
</html>
