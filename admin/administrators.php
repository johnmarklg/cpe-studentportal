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
								<span class="input-group-addon" id="basic-addon1">Email Address</span>
								<input id="email" type="text" class="form-control formTextbox" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<button type="button" id="buttonAdd" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-user"></i>Add New Administrator</button>
						</div></div></div></div></div></div><hr/>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-warning" role="alert">
								  <i class="fa fa-fw fa-warning"></i> Caution: Deleting records in the respective tables will permanently remove the entry in the database.
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
														<th>Name</th>
														<th>Username</th>
														<th>Password</th>
														<th>Email</th>
														<th>Permission Level</th>
														<th style="font-size: 0;"></th>
													</tr>
												</thead>
												<tbody>
												<?php
													require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
													$conn = getDB('cpe-studentportal');
													$stmt = $conn->prepare("SELECT * from administrators");
													$stmt->execute();
													
													foreach(($stmt->fetchAll()) as $row) { 
															echo '<tr>
																<td>' . $row['name'] . '</td>
																<td>' . $row['username'] . '</td>
																<td><i>' . md5($row['password']) . '</i></td>
																<td>' . $row['email'] . '</td>
																<td>' . $row['position'] . '</td>
															</tr>';
													}
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
	<script>
	$( document ).ready(function() {
			$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="administrators.php"]').length;
					  })
			.addClass('active');
     });
	 </script>
</body>
</html>
