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
                                <i class="fa fa-terminal"></i>  <a href="/org/index.php">Student Portal</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-credit-card"></i> Statement of Accounts
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading" style="text-align: center;">
								Statement Summary
							</div>
							<div class="panel-body">
								<?php
									$studnum = $_SESSION['name'][4];
									
									require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
									
									$conn = getDB('cpe-studentportal');	
		
									$stmt = $conn->prepare("SELECT studnum, surname, firstname, middlename from `students` WHERE studnum = :studnum");
									$stmt -> bindParam(':studnum', $studnum);
									$stmt->execute();
								?>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Surname</th>
													<th>First Name</th>
													<th>Middle Name</th>
													<th>Student ID</th>
												</tr>
											</thead>
											<tbody>
											<tr>
											<?php
												foreach(($stmt->fetchAll()) as $row) { 
													echo '<td>' . $row['surname'] . '</td>';
													echo '<td>' . $row['firstname'] . '</td>';
													echo '<td>' . $row['middlename'] . '</td>';
													echo '<td>' . $row['studnum'] . '</td>';
												}
											?>
											</tr>
											</tbody>
										</table>
									</div>
									<hr/>
									<div class="table-responsive">
										<table id="statement" class="table table-bordered">
											<thead>
												<tr>
													<!--<th>Transaction Date</th>-->
													<th>ID</th>
													<th>Description</th>
													<th>Charges</th>
													<th>Amount Paid</th>
													<th>Balance</th>
													<th>Date Paid</th>
												</tr>
											</thead>
											<tbody>											
											<?php
												$stmt = $conn->prepare("SELECT transactions.id,
													payments.id as paymentid, payments.name,
													payments.amount as charge,
													COALESCE(transactions.studnum, 0) AS studnum,
													COALESCE(transactions.amountpaid, 0) AS amountpaid,
													transactions.datepaid
													FROM `payments`
													LEFT JOIN transactions
													ON transactions.studnum = :studnum AND transactions.paymentid = payments.id");
												$stmt -> bindParam(':studnum', $studnum);
												$stmt->execute();
												foreach(($stmt->fetchAll()) as $row) { 
													echo '<tr><td>' . $row['paymentid'] . '</td>';
													echo '<td>' . $row['name'] . '</td>';
													echo '<td>₱ ' . $row['charge'] . '</td>';
													echo '<td>₱ ' . $row['amountpaid'] . '</td>';
													if($row['charge']=='0') {
														echo '<td></td>';
													} else {
														echo '<td>₱ ' . ($row['charge'] - $row['amountpaid']) . '</td>';
													}
													echo '<td>' . $row['datepaid'] . '</td></tr>';
												}
												$conn=null;
											?>
											</tbody>
										</table>
									</div>
							</div>
							<div class="panel-footer">
								<?php
								echo '<a class="btn btn-success btn-block" href="/functions/generatereceipt.php?studnum=' . $studnum . '"><i class="fa fa-print"></i> Print E-Receipt</a>';
								?>
								<!--<button id="printReceipt" name="printReceipt" class="btn btn-info btn-block"><i class="fa fa-fw fa-print"></i> Print Electronic Receipt</button>-->
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
					return !! $(this).find('a[href="soa.php"]').length;
				  })
				  .addClass('active');
		});
		</script>
		
    </div>
</body>

</html>
