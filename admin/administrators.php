<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
	if(($_SESSION['name'][0]<>'Administrator (Elevated)')) {
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
	<style>
			.table-remove:hover {
				color: #f00;
				text-decoration: underline;
				cursor: pointer;
			}
			.account-remove:hover {
				color: #f00;
				text-decoration: underline;
				cursor: pointer;
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
                                <i class="fa fa-group"></i> Administrators
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="row"><div class="col-lg-12"><div class="panel-group"><div class="panel panel-info">
						<div class="panel-heading"><a data-toggle="collapse" href="#collapsePanel"><i class="fa fa-plus-circle"></i> Click here to add a new <strong>Administrator</strong> account.</a></div>
						<div id="collapsePanel" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Name</span>
								<input id="name" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Username</span>
								<input id="username" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Password</span>
								<input id="password" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Position</span>
								<input id="position" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Permission Level</span>
								<div class="form-group">
								  <select class="form-control" id="sel1">
									<option>Administrator</option>
									<option>Administrator (Elevated)</option>
									<option>Limited</option>
								  </select>
								</div>
							</div>
							<br/>
							<button type="button" id="account-add" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-user"></i>Add New Administrator</button>
						</div></div></div></div></div></div>
				<div class="row">
					<div class="col-lg-12">
							<div class="panel-group">
								<div class="panel panel-warning">
									<div class="panel-heading"><a style="color: #fff;" data-toggle="collapse" href="#collapsePanel2"><i class="fa fa-minus-circle"></i> Click here to remove an <strong>Administrator</strong> account.</a>
									</div>
									<div id="collapsePanel2" class="panel-collapse collapse">
										<div class="panel-body">
											<?php
											require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

											$conn = getDB('cpe-studentportal');
											$stmt = $conn->prepare("SELECT * from administrators WHERE id != :id AND id != 1");
											$stmt -> bindParam(':id', $_SESSION['name'][2]);
											$stmt->execute();
											
											echo '<div class="table-responsive"><table id="curricula" class="table table-bordered">
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th>Permissions</th>
													<th style="font-size: 0;">Delete</th>
												</tr>
											</thead>
											<tbody>';
											
											foreach(($stmt->fetchAll()) as $row) { 
												echo '<tr>
												<td class="id">' . $row['id'] . '</td>
												<td class="name">' . $row['name'] . '</td>
												<td class="permissionlevel">' . $row['permission'] . '</td>
												<td><span class="account-remove"><i class="fa fa-fw fa-minus-circle"></i> Delete</span></td>
												</tr>';
											}
											echo '</tbody></table></div>';
											?>
										</div>
									</div>
								</div>
							</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
						<hr style="margin-top: 0px;"/>
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-warning" role="alert">
								  <i class="fa fa-fw fa-warning"></i> Caution: Please exercise restaint and responsibility on managing permission levels.
								  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										List of Administrators
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th>ID</th>
														<th>Name</th>
														<th>Username</th>
														<!--<th>Password</th>-->
														<th>Position</th>
														<th>Activity Log</th>
														<th>Permission Level</th>
														<th style="font-size: 0;"></th>
													</tr>
												</thead>
												<tbody>
												<?php
													$stmt = $conn->prepare("SELECT * from administrators WHERE id<>'1'");
													$stmt->execute();
													
													foreach(($stmt->fetchAll()) as $row) { 
															echo '<tr>
																<td class="id">' . $row['id'] . '</td>
																<td id="' . $row['id'] .'">' . $row['name'] . '</td>
																<td>' . $row['username'] . '</td>';
																//<!--<td class="passwd"><i name="' . md5($row['password']) . '" id="' . $row['password'] . '">' . md5($row['password']) . '</i></td>-->
																echo '<td>' . $row['position'] . '</td>';
																echo '<td><form action="/admin/activity-admin.php" method="get" enctype="multipart/form-data">
																<input type="hidden" name="refid" id="refid" value="'. $row['id'] . '"></input>
																<input type="submit" value="Activity Log" class="btn btn-primary"></input>
																</form></td>';
																echo '<td><div class="form-group permissions">
																  <select class="form-control" onclick="permissions_cache=this.value;" >';
																echo '<option value="Administrator" '; if($row['permission']=="Administrator") { echo 'selected>'; } else { echo '>'; } echo 'Administrator</option>';
																echo '<option value="Administrator (Elevated)" '; if($row['permission']=="Administrator (Elevated)") { echo 'selected>'; } else { echo '>'; } echo 'Administrator (Elevated)</option>';
																echo '<option value="Limited" '; if($row['permission']=="Limited") { echo 'selected>'; } else { echo '>'; } echo 'Limited</option>';
																echo '</select></div></td>
															</tr>';
													}
													$conn=null;
												?>
												</tbody>
											</table>
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
			  <small hidden id="adminid"><?php echo ($_SESSION['name'][2]); ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	<script src="/functions/js/administrators.js"></script>
</body>
</html>
