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
                                <i class="fa fa-list"></i> Prospectus
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> This is the Prospectus page where you can see your current Transcript of Grades.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><br/>
						  For any corrections or updates, please consult the respective faculty.
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showProspectus.php');
						echo showStudentRecords($_SESSION['name'][4]);
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script>
			$('#tabAll').click(function(){
				$('#tabAll').addClass('active');  
				$('.tab-pane').each(function(i,t){
					$('#myTabs li').removeClass('active'); 
					$(this).addClass('active');  
				});
			});
			$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="prospectus.php"]').length;
				  })
				  .addClass('active');
			});
		</script>
		
    </div>
    <!-- /#wrapper -->
</body>

</html>
