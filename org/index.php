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
						<div class="panel panel-primary">
							<div class="panel-heading">
							Add Invoice
							</div>
							<div class="panel-body">
								<div class="alert alert-info" role="alert">
								  <i class="fa fa-info-circle"></i> Input <strong>0</strong> as amount charged if the transaction charges will vary.
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								</div>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Transaction Name</span>
								  <input id="name" type="text" class="form-control" value="" aria-describedby="basic-addon1">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon2">Amount to be Charged</span>
								  <input id="amount" type="text" class="form-control" value="" aria-describedby="basic-addon2">
								</div>
								<br/>
								<form method="post">
									<button type="button" id="buttonSave" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-credit-card"></i> Add New Charge</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-group">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<a data-toggle="collapse" href="#collapsePanel" style="color: #000;"><i class="fa fa-close"></i> Click here to remove an invoice/account from the database.</a>
								</div>
								<div id="collapsePanel" class="panel-collapse collapse">
									<div class="panel-body">
										<?php
											require($_SERVER["DOCUMENT_ROOT"] . '/php/showPaymentTable.php');
											echo showPaymentTable();
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr/>
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
	<script src="/functions/js/accounting.js"></script>
	
	
</body>

</html>
