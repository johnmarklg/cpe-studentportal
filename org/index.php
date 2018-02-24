<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
	if($_SESSION['name'][0]<>'Limited') {
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
			#saveAccounting {
			  position: fixed;
			  display: block;
			  right: 0;
			  bottom: 0;
			  margin-right: 40px;
			  margin-bottom: 40px;
			  z-index: 900;
			}
			  .invoice-remove:hover {
			  color: #f00;
			  cursor: pointer;
			}

	</style>
</head>

<body>

    <div id="wrapper">

        <?php org_nav(); ?>
		
        <div id="page-wrapper">

            <div class="container-fluid">
				<br/>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
					   <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-terminal"></i>  <a href="/org/index.php">Student Portal</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-money"></i> Accounting
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align: center;" id="myTabs">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#1" data-toggle="tab">First Year</a>
									</li>
									<li><a href="#2" data-toggle="tab">Second Year</a>
									</li>
									<li><a href="#3" data-toggle="tab">Third Year</a>
									</li>
									<li><a href="#4" data-toggle="tab">Fourth Year</a>
									</li>
									<li><a href="#5" data-toggle="tab">Fifth Year</a>
									</li>
									<li><a  id="tabAll" href="#0" data-toggle="tab">Show All</a>
									</li>
								</ul>
							</div>
						</div>
						<?php	
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showAccounting.php');
						echo showAccounting();
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						
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
			  <small id="userid" hidden><?php echo ($_SESSION['name'][2]);?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<!--<form>
			<button type="button" id="saveAccounting" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button>
		</form>	-->
		
    </div>
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	<script>
		$( document ).ready(function() {
				$('li', '#tabs').filter(function() {
					return !! $(this).find('a[href="/org/index.php"]').length;
				  })
				  .addClass('active');
		});
	
		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
	</script>
</body>

</html>
