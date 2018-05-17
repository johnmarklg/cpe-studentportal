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
<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>-->
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
						  <!--<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								Main Control
							</div>
							<div class="panel-body">
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
									<div class="btn-group" role="group">
										<button type="button" id="mainShutdown" class="btn btn-default btn-danger"><i class="fa fa-fw fa-power-off"></i> SHUTDOWN</button>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								This button will shut down the whole system. Please execute this before using the switch to avoid SD card corruption.
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a data-toggle="collapse" href="#collapsePanel">Click Here to Control the Individual Modules</a>
						</div>
						<div id="collapsePanel" class="panel-body panel-collapse collapse">
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
							<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-primary">
											<div class="panel-heading">
												Digital Bulletin
											</div>
											<div class="panel-body">
												<div class="btn-group btn-group-justified" role="group" aria-label="...">
													<div class="btn-group" role="group">
														<button type="button" id="bulletinShutdown" class="powerbutton btn btn-default btn-danger"><i class="fa fa-fw fa-power-off"></i> Shutdown</button>
													</div>
													<div class="btn-group" role="group">
														<button type="button" id="bulletinRestart" class="powerbutton btn btn-default btn-warning "><i class="fa fa-refresh"></i> Restart</button>
													</div>
												</div>
											</div>
										</div>
									</div><!-- /.col-lg-12 -->
								</div><!-- /.row -->
							<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-primary">
											<div class="panel-heading">
												Digital Bulletin (TV)
											</div>
											<div class="panel-body">
												<div class="btn-group btn-group-justified" role="group" aria-label="...">
													<div class="btn-group" role="group">
														<button type="button" id="tvPower" class="powerbutton btn btn-default btn-danger"><i class="fa fa-fw fa-power-off"></i> Turn ON/OFF</button>
													</div>
												</div>									
											</div>
										</div>
									</div><!-- /.col-lg-12 -->
								</div><!-- /.row -->
						</div>
						<div class="panel-footer">
							You can individually control the Raspberry Pis and the Display (TV) using these buttons.
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
		
		<script>
			$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="power.php"]').length;
				  })
				  .addClass('active');
			});
			
			$('#mainShutdown').click(function() {
				$preconfirm = "Warning! When shutting down the whole system, anyone connected to the Student Portal will be disconnected. The Digital Bulletin and the TV will also be shut down."
				$confirm = "Are you sure you want to shutdown the system?"
				$response = "Shutting down the Student Portal with Digital Bulletin. Please wait 10 seconds before plugging out. You may close this web page anytime."
				
				alert($preconfirm);
				if (confirm($confirm)) {
					alert($response);
					$.ajax({
						type: "POST",
						url: "/php/mainShutdown.php",
						//data: {command: $command},
						cache: false,
						success: function(result){
						}
					});
				}
			});

			$('.powerbutton').click(function() {
				var $button = this.id; 
				var $command = '';
				var $response = '';
				switch($button) {
					case 'portalShutdown':
						$command = "sudo shutdown -h now";
						$preconfirm = "Warning! Shutting down the Student Portal while others are connected will disconnect them from the system. If the Bulletin is still on, it will also stop working altogether."
						$confirm = "Are you sure you want to shutdown the Student Portal?"
						$response = "Shutting down Student Portal. Please wait 10 seconds before plugging out. You may close this web page anytime."
						break;
					case 'portalRestart':
						$command = "sudo shutdown -r now";
						$preconfirm = "Warning! Restarting the Student Portal while others are connected will disconnect them from the system. If the Bulletin is still on, it will also stop working until restarted."
						$confirm = "Are you sure you want to restart the Student Portal?"
						$response = "Restarting Student Portal..."
						break;
					case 'bulletinShutdown':
						$command = "ssh pi@192.168.137.1 sudo shutdown -h now";
						$preconfirm = "Warning! When shutting down the Digital Bulletin, you cannot turn it on again without a full system shutdown and restart. Please consider carefully."
						$confirm = "Are you sure you want to shutdown the Digital Bulletin?"
						$response = "Shutting down the Digital Bulletin. Please wait 10 seconds before plugging out."
						break;
					case 'bulletinRestart':
						$command = "ssh pi@192.168.137.1 sudo shutdown -r now";
						$preconfirm = "Warning! Restarting the Digital Bulletin while the TV is still ON may turn off the TV upon restart. Please consider turning off the TV first, or you may turn it on through the button below (Toggle Power)."
						$confirm = "Are you sure you want to restart the Digital Bulletin?"
						$response = "Restarting Digital Bulletin..."
						break;
					case 'tvPower':
						$command = "ssh pi@192.168.137.1 irsend SEND_ONCE CPE KEY_POWER";
						$preconfirm = "This will toggle the power of the television display."
						$confirm = "Are you sure you want to turn on/off the TV display?"
						$response = "Toggling Digital Bulletin Display (TV) Power..."
						break;
					default:
						alert('Error. Incorrect ID');
				}
				//alert($command);
				//alert($preconfirm);
				if (confirm($preconfirm + ' ' + $confirm)) {
					alert($response);
					$.ajax({
						type: "POST",
						url: "/php/piControl.php",
						data: {command: $command},
						cache: false,
						success: function(result){
						}
					});
				}
			});
		</script>
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
