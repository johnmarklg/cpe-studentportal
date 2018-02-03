<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
if(($_SESSION['name'][0]=='Limited')||($_SESSION['name'][0]=='Administrator')||($_SESSION['name'][0]=='Administrator (Elevated)')) {
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

        <?php user_nav(); ?>
		
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
                                <i class="fa fa-lock"></i> Change Password
                            </li>
                        </ol>
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> Your current session will close upon changing your password.
						</div>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-success">
							<div class="panel-heading">
								<i class="fa fa-fw fa-unlock-alt"></i> Change Password
							</div>
							<div class="panel-body">
								<input id="studnum" type="hidden" class="form-control" value="<?php echo ($_SESSION['name'][4]);?>" autocomplete="off" aria-describedby="basic-addon0">
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Current Password</span>
								  <input id="oldpass" type="password" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon1">
								  <input id="oldpasschk" type="hidden" class="form-control" value="<?php echo ($_SESSION['name'][5]);?>" autocomplete="off" aria-describedby="basic-addon1">
								</div>
								<hr/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon2">New Password</span>
								  <input id="newpass" type="password" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon2">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon2">Re-type New Password</span>
								  <input id="checkpass" type="password" class="form-control" value="" autocomplete="off" aria-describedby="basic-addon3">
								</div>
								<br/>
								<form method="post">
									<button type="button" id="buttonChangePassStudent" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-save"></i> Save Changes</button>
								</form>
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script src="/functions/js/changepass.js"></script>
	
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
