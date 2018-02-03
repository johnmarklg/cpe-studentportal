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
									$studnum = $_GET['studnum'];
									
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
													<th>Transaction ID</th>
													<th>Transaction Description</th>
													<th>Charges</th>
													<th>Amount Paid</th>
												</tr>
											</thead>
											<tbody>											
											<?php
												$stmt = $conn->prepare("SELECT transactions.id,
													payments.id as paymentid, payments.name,
													payments.amount as charge,
													COALESCE(transactions.studnum, 0) AS studnum,
													COALESCE(transactions.amountpaid, 0) AS amountpaid
													FROM `payments`
													LEFT JOIN transactions
													ON transactions.studnum = :studnum AND transactions.paymentid = payments.id");
												$stmt -> bindParam(':studnum', $studnum);
												$stmt->execute();
												foreach(($stmt->fetchAll()) as $row) { 
													echo '<tr><td>' . $row['paymentid'] . '</td>';
													echo '<td>' . $row['name'] . '</td>';
													echo '<td>' . $row['charge'] . '</td>';
													echo '<td contentEditable>' . $row['amountpaid'] . '</td></tr>';
												}
												$conn=null;
											?>
											</tbody>
										</table>
									</div>
							</div>
							<div class="panel-footer">
								<button id="saveStatement" name="saveStatement" class="btn btn-success btn-block">Update Statement</button>
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
			  <small id="userid" hidden><?php echo ($_SESSION['name'][2]);?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	<script>
		$("#saveStatement").click(function(){
			var studentid = '<?php echo $studnum; ?>';
			var statement = $('#statement').tableToJSON({
				ignoreColumns: [1, 2]
			});
			//alert(studentid);
			alert(JSON.stringify(statement));
			$.ajax({
				type: "POST",
				url: "/php/savePayments.php",
				data: {jsonstatement: JSON.stringify(statement), studnum: studentid},
				cache: false,
				success: function(result){
					//alert(result);
					location.reload(); 			
				}
			});
		});
	</script>
	
	<script>
			/*$("#saveAccounting").click(function(){
			/*$('#tabAll').addClass('active');  
			$('.tab-pane').each(function(i,t){
				$('#myTabs li').removeClass('active'); 
				$(this).addClass('active');  
			});
			var payTable1 = $('#tablefirst').tableToJSON({
				ignoreColumns: [0,1,2]
			});
			var payTable2 = $('#tablesecond').tableToJSON({
				ignoreColumns: [0,1,2]
			});
			var payTable3 = $('#tablethird').tableToJSON({
				ignoreColumns: [0,1,2]
			});
			var payTable4 = $('#tablefourth').tableToJSON({
				ignoreColumns: [0,1,2]
			});
			var payTable5 = $('#tablefifth').tableToJSON({
				ignoreColumns: [0,1,2]
			});
			
			var finaltable = payTable1.concat(payTable2);
			finaltable = finaltable.concat(payTable3);
			finaltable = finaltable.concat(payTable4);
			finaltable = finaltable.concat(payTable5);
			(function filter(obj) {
				$.each(obj, function(key, value){
					if (value === "" || value === null){
						var objlocation = finaltable.indexOf(obj);
						//delete finaltable[objlocation];
						finaltable.splice(objlocation);
						//console.log(objlocation);
						//delete obj[key];
					} else if (Object.prototype.toString.call(value) === '[object Object]') {
						filter(value);
					} else if (Array.isArray(value)) {
						value.forEach(function (el) { filter(el); });
					}
				});
			})(finaltable);
			console.log(JSON.stringify(finaltable));
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
		});*/
	</script>
	
</body>

</html>
