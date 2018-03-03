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
?>	
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
                                <i class="fa fa-info-circle"></i> About CpE Student Portal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<?php
						
							require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");		
									
									$conn = getDB('cpe-studentportal');	
		
									$stmt = $conn->prepare("SELECT * FROM `infotext` WHERE referenceid = 1");
									$stmt->execute();
									
									foreach(($stmt->fetchAll()) as $row) { 
										$title = $row['title'];
										$text = $row['text'];
										echo '<div class="panel panel-info"><div class="panel-heading">';
										echo '<input type="text" id="aboutTitle" value="' . $row['title'] . '" class="form-control">';
										echo '</div>
										<div class="panel-body">';
											echo '<textarea type="text" id="aboutText" name="aboutText" name="aboutText" class="form-control" placeholder="Add something about the Portal..." cols="40" rows="5">'. $row['text'] . '</textarea>';
										echo '</div>';
										echo '<div class="panel-footer"><button id="btnSaveAbout" class="btn btn-success btn-block">Save Changes</button></div></div>';
									}
						?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr/>
				<div class="alert alert-info" role="alert">
					  <i class="fa fa-fw fa-info-circle"></i> This is a preview of how the about sections looks to the user. It will update as you edit the text field.
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" id="previewTitle">
								<?php echo $title; ?>
							</div>
							<div class="panel-body" id="previewText">
								<?php echo $text; ?>
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script src="/functions/js/about.js"></script>
	
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
