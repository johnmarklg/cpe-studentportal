<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
	if(($_SESSION['name'][0]<>'Limited')) {
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

        <?php org_nav(); ?>

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
                                <i class="fa fa-users"></i> Officers
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
							<div class="panel-heading" id="myTabs">	
								Officers
							</div>
									<div class="panel-body">
										<div class="panel panel-info">
											<div class="panel-heading">
												<i class="fa fa-fw fa-plus-circle"></i>Add Organizational Officer
											</div>
											<form action="/php/addOfficer.php" method="post" enctype="multipart/form-data">
												<div class="panel-body">
													<div class="input-group">
													  <span class="input-group-addon" id="basic-addon2">Position Name</span>
													  <input name="officename" id="officename" type="text" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon2">
													</div><br/>
													<div class="input-group">
													  <span class="input-group-addon" id="basic-addon2">Student Number</span>
													  <input name="officer" id="officer" type="text" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon2">
													</div><br/>
													<div class="input-group">
													  <span class="input-group-addon" id="basic-addon2">Photo</span>
													  <input name="fileToUpload" id="fileToUpload" type="file" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon2">
													</div>	
												</div>
												<div class="panel-footer">
													<input name="adminid" id="adminid" type="hidden" value="<?php echo ($_SESSION['name'][2]);?>">
													<input type="submit" name="submit" id="add-office" class="btn btn-default btn-success btn-block"></input>
												</div>
											</form>
										</div>
										<br/>
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th style="font-size: 0px;">ID</th>
														<th>Student Number</th>
														<th>Name</th>
														<th>Position</th>
														<th>Contact Number</th>
														<th>Photo</th>
														<th></th><th></th>
													</tr>
												</thead>
												<tbody>
													<?php
														$stmt = $conn->prepare("SELECT officers.*, students.surname, students.firstname, students.middlename, students.ContactNo from `officers` 
														LEFT JOIN students
														ON officers.studnum = students.studnum
														ORDER BY id ASC");
														$stmt->execute();
														foreach(($stmt->fetchAll()) as $row) { 
															echo '<tr><td class="id" style="font-size: 0px;">' . $row['id'] . '</td>
															<td class="studnum">' . $row['studnum'] . '</td>
															<td>' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . '</td>
															<td>' . $row['office'] . '</td>
															<td>' . $row['ContactNo'] . '</td>
															<td><a href="/uploads/officers/' . $row['photolink'] . '" class="swipebox"><img src="/uploads/officers/' . $row['photolink'] . '" style="height: 20vh; width: 20vh%;"/></a></td>
															<!--<td><form action="/php/changeOfficerPhoto.php" method="post" enctype="multipart/form-data">
																	<input type="file" class="btn btn-info" name="fileToUpload2" id="fileToUpload2"></input></td>
																	<input type="hidden" value="' . $row['studnum'] . '" name="refid" id="refid" ></input>
															<td>
															<input type="submit" value="Replace Photo" class="btn btn-info replace-photo"></input></form>
															</td>-->
															<td>
															<button class="btn btn-danger remove-office"><i class="fa fa-times"></i> Delete</button>
															</td></tr>';
														}				
													?>
												</tbody>
											</table>
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
