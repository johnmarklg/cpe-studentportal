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

//if(isset($_GET['studnum'])){ $studnum = $_GET['studnum']; } else { $studnum='';}
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
                                <i class="fa fa-user"></i> Activity Log
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-info-circle"></i> Select the administrator from the dropdown then click [<i class="fa fa-search"></i>] to load the latest activities.
						  <br/>Alternatively, you may access it directly through the Administrators page under [<i class="fa fa-terminal"></i> Elevated Admin].
						</div>
					</div>
				</div>

				
				<!-- Search -->
				<div class="row">
					<div class="col-lg-12">
					<form method="post">
						<div class="input-group">
								
								<select class="form-control" name="refid" id="refid">
								<option value="0">Select Account...</option>
									<?php
								require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

											$conn = getDB('cpe-studentportal');
											$stmt = $conn->prepare("SELECT id, name from administrators WHERE id != 1");
											$stmt->execute();
											
											foreach(($stmt->fetchAll()) as $row) { 
											echo '<option value="' . $row['id'] . '">' . $row['name']. '</option>';
											}
								?>
								</select>
								<!--<input type="text" id="refid" name="refid" value="" class="form-control" placeholder="Search by Student Number"></input>-->
								<span class="input-group-btn">
									<button id="search-table" name="search-table" class="btn btn-default"><i class="fa fa-search"></i></button>
								</span>
						</div>
					</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<!-- /.row -->
				<hr/>
				<div class="row">
					<div class="col-lg-12">
						<?php
							require($_SERVER["DOCUMENT_ROOT"] . '/php/showActivity.php');
							echo showAdminActivity();
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
			  <small hidden id="adminid"><?php echo ($_SESSION['name'][2]); ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script>
			$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="activity.php"]').length;
				  })
				  .addClass('active');
			});
		</script>
		
    </div>
    <!-- /#wrapper -->
</body>

</html>