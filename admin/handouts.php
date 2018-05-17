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
                                <i class="fa fa-file"></i> Handouts
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
							<i class="fa fa-fw fa-info-circle"></i> Provide students with softcopy handouts and/or other forms accessible to download with a password.
						  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
						</div>
						<div class="alert alert-info" role="alert">
							<i class="fa fa-fw fa-info-circle"></i> Maximum of 10 characters for password.
						  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a>New Handout/Form </a><span id="titlecount" class="badge">0/30</span>			
							</div>
							<div class="panel-body">
								<form action="/php/uploadHandout.php" onsubmit="return validate()" method="post" enctype="multipart/form-data">
									<input maxlength="30" type="text"  onkeyup="countChar(this)" id="filetitle" name="filetitle" class="form-control" placeholder="Set File Description"></input><br/>
									<input maxlength="10" type="text" id="passphrase" name="passphrase" class="form-control" placeholder="Set Password"></input><br/>
									<script>
										function countChar(val) {
											var len = val.value.length;
											$('#titlecount').html(len + '/30');
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
										<div id="handoutwarning" hidden class="alert alert-danger" role="alert">
											<i class="fa fa-fw fa-warning"></i> There's a maximum of 5 files available at a time, please delete old files first before uploading new ones.
											<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
										</div>
										<input id="handoutpost" type="submit" class="btn btn-success btn-block" value="Upload File" name="submit">
									</div>
									<input type="hidden" id="permission" value="<?php echo $_SESSION['name'][0] ?>" name="permission" class="form-control"></input>
									<input type="hidden" id="posterID" value="<?php echo $_SESSION['name'][2] ?>" name="posterID" class="form-control"></input>
								</form>
								<script>
									$.ajax({
										type: "POST",
										url: "/php/getFileCount.php",
										data: {selector: <?php echo $_SESSION['name'][2]; ?>},
										cache: false,
										success: function(result){
											var $num = parseInt(result);
											if($num >= 5) {
												$('#handoutpost').prop('disabled', true);
												$('#handoutwarning').show();
											}
										}
									});
																				
									function validate() {
										$title = $('#filetitle').val();
										$pass = $('#passphrase').val();
										$file = $('#fileToUpload').val();
										if(($title== '')||($file== '')||($pass== '')||($title== null)||($pass == null)||($file== null)) {
											alert('Please fill all the required fields!');
											return false;
										} else {
											if(!confirm('Are you sure you want to upload this file/handout?')) {
												return false;
											}
										}
									}
								</script>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr/>
				<?php
				require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
				$conn = getDB('cpe-studentportal');
		
				$stmti = $conn->prepare("SELECT COUNT(*) FROM files as uploadedcount WHERE uploaderid = :uploaderid");
				$stmti -> bindParam(':uploaderid', $_SESSION['name'][2], PDO::PARAM_INT);
				$stmti->execute();
				$uploadedcount = $stmti->fetchColumn(); 
				
				$stmt = $conn->prepare("SELECT * FROM `files` 
				WHERE uploaderid = :uploaderid ORDER BY datetime DESC");
				$stmt -> bindParam(':uploaderid', $_SESSION['name'][2], PDO::PARAM_INT);
				$stmt->execute();
				$counter = 0;
				foreach(($stmt->fetchAll()) as $row) { 
					$fileid[$counter] = $row['id'];
					$fileinfo[$counter] = $row['fileinfo'];
					$filepath[$counter] = $row['filepath'];
					$passphrase[$counter] = $row['passphrase'];
					$filesize[$counter] = $row['filesize'];
					$datetime[$counter] = $row['datetime'];
					$counter+=1;
				}
				?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a>Uploaded Files/Handouts</a> <span id="uploadedcount" class="badge"><?php echo $uploadedcount; ?></span>
							</div>
							<div class="panel-body table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="font-size: 0;"></th>
											<th>File Info</th>
											<th>Passphrase</th>
											<th>File Size</th>
											<th>Timestamp</th>
											<th></th>
										</tr>
									</thead>
									<tbody class="list">
										<?php
										for ($x=0; $x<$counter;$x++) {
											echo '<tr>
												<td class="fileid" style="font-size: 0;">' . $fileid[$x] . '</td>
												<td>' . $fileinfo[$x] . '</td>
												<td>' . $passphrase[$x] . '</td>
												<td>' . $filesize[$x] . '</td>
												<td>' . $datetime[$x] . '</td>
												<td><a class="btn btn-success btn-block" href="/uploads/handouts/' . $filepath[$x] . '">Download</a><button class="btn btn-danger btn-block deleteFile">Delete</button></td>
											</tr>';
										}
										?>
										<script>
											$('.deleteFile').on('click', function() {
												var $row = $(this).closest("tr");    // Find the row
												var $id = $row.find(".fileid").text(); // Find the text
												//alert($id);
												if(confirm('Are you sure you want to delete this handout?')) {
													$.ajax({
														type: "POST",
														url: "/php/deleteHandout.php",
														data: {id: $id, adminid: <?php echo $_SESSION['name'][2]; ?>},
														cache: false,
														success: function(result){
															alert(result);
															location.reload();
														}
													});
												}
											});
										</script>
										<!--<tr>
											<td>Sample File</td>
											<td>Sample Passphrase</td>
											<td>1024MB</td>
											<td><a class="btn btn-success btn-block" href="#">Download</a></td>
										</tr>-->
									</tbody>
								</table>
							</div>
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
							return !! $(this).find('a[href="handouts.php"]').length;
				  })
				.addClass('active');
		  });
	  
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
					//$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
				}        
				reader.readAsDataURL(file);
			});  
		});
	</script>
</body>
</html>
