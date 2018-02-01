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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Portal</title>

	<link rel="icon" href="/assets/images/mmsu-logo.png">
     <!-- Bootstrap Core CSS -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/bootstrap/css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
    <!-- jQuery -->
    <script src="/assets/bootstrap/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- PACE -->
	<script src="/assets/pace/pace.min.js"></script>
	<!-- Autosize -->
	<script src="/assets/js/autosize.min.js"></script>
	<link rel="stylesheet" href="/assets/pace/pace-theme-flash.css">

	
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

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img style="max-width:100%;max-height:100%;" src="/assets/images/cpe-portal-white.png"/></a>
            </div>
			<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1] . ' - ' . $_SESSION["name"][0]?> <b class="caret"></b></a>
					<div class="dropdown-backdrop"></div>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-lock"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li class="active">
                        <a href="accounting.php"><i class="fa fa-fw fa-money"></i> Accounting</a>
                    </li>
					<li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

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
								<div class="alert alert-danger" role="alert">
								  <i class="fa fa-exclamation-triangle"></i> Please refrain from using numbers and symbols (e.g. !@#$%^&*()-=+/) to avoid database errors.
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								</div>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Invoice Name</span>
								  <input id="name" type="text" class="form-control" value="" aria-describedby="basic-addon1">
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
		
		<form>
			<button type="button" id="saveAccounting" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button>
		</form>	
		
    </div>
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	
	<script>
		$('#tabAll').click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
		});
	</script>
	<script>
		$('.invoice-remove').click(function () {
		if(confirm('Do you want to remove this entry from the database?')) {
			var $row = $(this).closest("tr");    // Find the row
			var $id = $row.find(".id").text(); // Find the text
			var $tablename = $row.find(".tablename").text(); // Find the text
			var $invoiceinfo = '[{"id":"' + $id + '","tablename":"' + $tablename + '"}]';
			alert($invoiceinfo);
			$.ajax({
				type: "POST",
					url: "/php/removePayment.php",
					data: {infodata: $invoiceinfo},
					cache: false,
					success: function(result){
						//alert("Successfully removed student entry!");
						location.reload(); 			
					}
				});
			//$(this).parents('tr').detach();			
		} else {}
		});
	</script>

	<script>
		$('#buttonSave').click(function() {
			var $name = $('#name').val();
			$aname = $name.replace(/\s/g,'');
			$aname = $aname.toLowerCase();
			var $amount = $('#amount').val();
			var $payinfo = '[{"Name":"' + $name + '","tableName":"' + $aname + '"}]';
			alert($payinfo);
			$.ajax({
				type: "POST",
					url: "/php/addPayment.php",
					data: {infodata: $payinfo},
					cache: false,
					success: function(result){
						//alert("Successfully updated personal details! Please relogin.");
						location.reload();
						//window.location.replace('logout.php');
					}
				});
				return false;
		});
	</script>
	<script>
		$("#saveAccounting").click(function(){
			$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
			var payTable1 = $('#tablefirst').tableToJSON({
				ignoreColumns: [1,2,3,4]
			});
			var payTable2 = $('#tablesecond').tableToJSON({
				ignoreColumns: [1,2,3,4]
			});
			var payTable3 = $('#tablethird').tableToJSON({
				ignoreColumns: [1,2,3,4]
			});
			var payTable4 = $('#tablefourth').tableToJSON({
				ignoreColumns: [1,2,3,4]
			});
			var payTable5 = $('#tablefifth').tableToJSON({
				ignoreColumns: [1,2,3,4]
			});
			
			var finaltable = payTable1.concat(payTable2);
			var finaltable = finaltable.concat(payTable3);
			var finaltable = finaltable.concat(payTable4);
			var finaltable = finaltable.concat(payTable5);
			//timeTable5 = JSON.stringify(timeTable5);
			alert(JSON.stringify(finaltable));
			
			$.ajax({
				type: "POST",
				url: "/php/savePayments.php",
				data: {paytable: JSON.stringify(finaltable)},
				cache: false,
				success: function(result){
					//alert(result);
					location.reload(); 			
				}
			});
		});
	</script>
</body>

</html>
