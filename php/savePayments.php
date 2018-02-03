<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstatement = json_decode($_POST['jsonstatement'], true);
	$studentid = $_POST['studnum'];
	
	/*//get the column names and save them to an array
	$arraycol = array();
	$row = $jsonpaytable[0];
	foreach ($row as $key => $value) {	
		array_push($arraycol, $key);
	}*/
	
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsonstatement as $key => $value) {	
			/*$stmt = $conn->prepare("INSERT INTO `transactions` (studnum, paymentid, amountpaid, datepaid) VALUES (:studnum, :paymentid, :amountpaid, now())");
			$stmt -> bindParam(':amountpaid', $value['Amount Paid']);
			$stmt -> bindParam(':studnum', $studentid);
			$stmt -> bindParam(':paymentid', $value['Transaction ID']);
			$stmt->execute();*/
			$stmt = $conn->prepare("SELECT id FROM transactions WHERE studnum=:studnum AND paymentid=:paymentid");
			$stmt -> bindParam(':studnum', $studentid);
			$stmt -> bindParam(':paymentid', $value['Transaction ID']);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
				if (!($result)) {
					$stmt = $conn->prepare("INSERT INTO transactions (studnum, paymentid, amountpaid) VALUES (:studnum, :paymentid, :amountpaid)");
					$stmt -> bindParam(':amountpaid', $value['Amount Paid']);
					$stmt -> bindParam(':studnum', $studentid);
					$stmt -> bindParam(':paymentid', $value['Transaction ID']);
					$stmt->execute();
				} else {
					$stmt = $conn->prepare("UPDATE transactions SET amountpaid=:amountpaid WHERE studnum=:studnum AND paymentid=:paymentid");
					$stmt -> bindParam(':amountpaid', $value['Amount Paid']);
					$stmt -> bindParam(':studnum', $studentid);
					$stmt -> bindParam(':paymentid', $value['Transaction ID']);
					$stmt->execute();
				}
	}	

	$conn = null;	
	//print_r($arraycol);
	return $err;
?>