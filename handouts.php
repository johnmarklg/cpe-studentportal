-<?php
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
	calendar_extra();
?>	
	<!--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">-->
    <link rel="stylesheet" href="/assets/jquery-scheduler/jquery.schedule.css">
    
	<style>
			#saveTimetables {
			  position: fixed;
			  display: block;
			  right: 0;
			  bottom: 0;
			  margin-right: 40px;
			  margin-bottom: 40px;
			  z-index: 900;
			}
			  .table-remove:hover {
			  color: #f00;
			  text-decoration: underline;
			  cursor: pointer;
			}
			.table-add:hover {
			  cursor: pointer;
			  color: #0b0;
			}
	</style>

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
                                <i class="fa fa-download"></i> Handouts
                            </li>
                        </ol>	 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> Select from the list of administrators to display files for download uploaded by corresponding faculty.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php 
									    require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
										$conn = getDB('cpe-studentportal');	
									
										echo '<select id="tableselect" class="form-control"><option value="0">Select Administrator/Faculty</option>';
										
										$stmt = $conn->prepare("SELECT `id`, `name` FROM `administrators` WHERE `id` <> 1 AND `permission` <> 'Limited'");
										$stmt->execute();
										
										foreach($stmt->fetchAll() as $row) { 
											echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
										}
										
									echo '</select>';
									
									$conn = null;
								?>
							</div>
							<div class="panel-body">
								<div id="downloadtable" class="table-responsive"></div>
							</div>
						</div>
					</div>
				</div>
				
				
				<script>
					$('#tableselect').on('change', function() {
						var $tableid = this.value;
						//alert($tableid);
						if (confirm('Are you sure you want to view this administrator\'s files?')) {
							$.ajax({
								type: "POST",
								url: "/php/getDownloadTable.php",
								data: {tableid: $tableid},
								cache: false,
								success: function(result){
									//console.log(result);
									$('#downloadtable').html(result);
								}
							});
						}
					});
					$('body').on('click', '.downloadbtn', function() {
						var $id = this.id;
						var $row = $(this).closest("tr");    // Find the row
						var $pass = $row.find(".passphrase").val(); // Find the value
						if(!$pass) {
							alert('Please enter a password to be able to view/download this file.');
						} else {
							if (confirm('Are you sure you want to try downloading this file?')) {
								$.ajax({
									type: "POST",
									url: "/php/getFileLink.php",
									data: {pass: $pass, id: $id},
									cache: false,
									success: function(result){
										if(result == 'Error! Incorrect Passphrase!') {
											alert(result);
										} else {
											window.location.assign(result);
										}
										//window.open(result);
									}
								});
							}
						}
					});
				</script>
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
    </div>
    <!-- /#wrapper -->
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	<script>
		$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="handouts.php"]').length;
					  })
					  .addClass('active');
		});
	</script>
</body>

</html>