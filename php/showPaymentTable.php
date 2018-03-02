<?php	
	function showPaymentTable() {
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$conn = getDB('cpe-studentportal');
	$stmt = $conn->prepare("SELECT * from payments");
	$stmt->execute();
	
	echo '<div class="table-responsive"><table id="transactions" class="table table-bordered">
	<thead>
		<tr>
			<th>Transaction ID</th>
			<th>Transaction Name</th>
			<th>Amount Charged</th>
			<th>Date Added</th>
			<th style="font-size: 0;">Delete</th>
		</tr>
	</thead>
	<tbody>';
	
	foreach(($stmt->fetchAll()) as $row) { 
		echo '<tr>
		<td class="id">' . $row['id'] . '</td>
		<td class="name">' . $row['name'] . '</td>';
		if($row['amount'] != '0') {
			echo '<td class="amount">' . $row['amount'] . '</td>';
		} else {
			echo '<td class="amount">Undefined</td>';
		}
		echo '<td>' . $row['created'] . '</td>
		<td><span class="invoice-remove"><i class="fa fa-fw fa-minus-circle"></i> Delete</span></td>
		</tr>';
	}
	
	echo '</tbody></table></div>';

	$conn = null;
	}
?>