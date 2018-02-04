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
														<th>ID</th>
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
													$stmt = $conn->prepare("SELECT * from administrators WHERE id<>'1'");
													$stmt->execute();
													
													foreach(($stmt->fetchAll()) as $row) { 
															echo '<tr>
																<td class="id">' . $row['id'] . '</td>
																<td>' . $row['name'] . '</td>
																<td>' . $row['username'] . '</td>
																<td class="passwd"><i name="' . md5($row['password']) . '" id="' . $row['password'] . '">' . md5($row['password']) . '</i></td>
																<td>' . $row['email'] . '</td>';
																echo '<td><div class="form-group permissions">
																  <select class="form-control" onclick="permissions_cache=this.value;" >';
																echo '<option value="Administrator" '; if($row['position']=="Administrator") { echo 'selected>'; } else { echo '>'; } echo 'Administrator</option>';
																echo '<option value="Administrator (Elevated)" '; if($row['position']=="Administrator (Elevated)") { echo 'selected>'; } else { echo '>'; } echo 'Administrator (Elevated)</option>';
																echo '<option value="Limited" '; if($row['position']=="Limited") { echo 'selected>'; } else { echo '>'; } echo 'Limited</option>';
																echo '</select></div></td>
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
	 $('select', '.permissions').on('change', function() {
		if (!confirm('Are you sure you want to change this administrator\'s permissions?')) {
            $(this).val(permissions_cache);
            return false;
        } else {
			var $newpos = this.value;
			//alert( newpos );
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $adminid = $('#adminid').text();
			//alert ($adminid);
			var $data = '[{"ID":"' + $id + '","Level":"' + $newpos + '"}]';
			//alert($data);		
				$.ajax({
					type: "POST",
					url: "/php/updateAdminPermissions.php",
					data: {admininfo: $data},
					cache: false,
					success: function(result){
						if($adminid===$id) {
								alert("This account's permissions have been modified. Please relogin.");
								window.location.replace('logout.php');
						}
						//alert("Successfully removed student entry!");
						//location.reload(); 			
					}
				});			
		}
	})
	$('i', '.passwd').on('dblclick', function() {
		/*if (!confirm('Are you sure you want to show the password?')) {
            return false;
        } else {
			var $pass = this.id;
			$(this).text($pass);
			//alert($pass);
		}*/
		var $pass = $(this).text();
		var $encry = $(this).attr('id');
		var $decry = $(this).attr('name');
		if (!confirm('Are you sure you want to toggle the password?')) {
            return false;
        } else {
			if ($pass === $decry) {
					$(this).text($encry);
			} else {
				$(this).text($decry);
			}
		}
		//alert($decry);
	})
	 </script>
</body>
</html>
