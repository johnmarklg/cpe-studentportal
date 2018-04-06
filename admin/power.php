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
                                <i class="fa fa-power-off"></i> Power
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
							<i class="fa fa-fw fa-info-circle"></i> You can shutdown or restart the Raspberry Pi for the Bulletin and Portal in this page.
						  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
					
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								Student Portal
							</div>
							<div class="panel-body">
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
									<div class="btn-group" role="group">
										<button type="button" id="portalShutdown" class="powerbutton btn btn-default btn-danger"><i class="fa fa-fw fa-power-off"></i> Shutdown</button>
									</div>
									<div class="btn-group" role="group">
										<button type="button" id="portalRestart" class="powerbutton btn btn-default btn-warning"><i class="fa fa-refresh"></i> Restart</button>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr/>
				<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									Digital Bulletin
								</div>
								<div class="panel-body">
									<div class="btn-group btn-group-justified" role="group" aria-label="...">
										<div class="btn-group" role="group">
											<button type="button" id="bulletinShutdown" class="powerbutton btn btn-default btn-danger"><i class="fa fa-fw fa-power-off"></i> Shutdown</button>
										</div>
										<div class="btn-group" role="group">
											<button type="button" id="bulletinRestart" class="powerbutton btn btn-default btn-warning"><i class="fa fa-refresh"></i> Restart</button>
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script>
			$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="officers.php"]').length;
				  })
				  .addClass('active');
			});

			$('.powerbutton').click(function() {
				var $button = this.id; 
				var $command = '';
				var $response = '';
				switch($button) {
					case 'portalShutdown':
						$command = "sudo shutdown -h now";
						$response = "Shutting down Student Portal. Please wait 10 seconds before plugging out."
						break;
					case 'portalRestart':
						$command = "sudo shutdown -r now";
						$response = "Restarting Student Portal..."
						break;
					case 'bulletinShutdown':
						$command = "ssh pi@192.168.7.2 sudo shutdown -h now";
						$response = "Shutting down the Digital Bulletin. Please wait 10 seconds before plugging out."
						break;
					case 'bulletinRestart':
						$command = "ssh pi@192.168.7.2 sudo shutdown -r now";
						$response = "Restarting Digital Bulletin..."
						break;
					default:
						alert('Error. Incorrect ID');
				}
				//alert($command);
				$.ajax({
					type: "POST",
						url: "/php/piControl.php",
						data: {command: $command},
						cache: false,
						success: function(result){
							alert($response);
						}
				});
			});
		</script>
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
