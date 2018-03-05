<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
	$orgid = $_POST['orgid'];	
		
	foreach ($jsoninfodata as $key => $value) {	
			$colName = $value['colname'];
			
			$conn = getDB('cpe-studentportal');
			
			$stmt = $conn->prepare("DELETE FROM payments where id=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();
			$stmt = $conn->prepare("DELETE FROM transactions WHERE paymentid=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();
			
			$stmt = $conn->prepare("INSERT INTO `activitylog` 
			(userid, action, timestamp) 
			VALUES (:userid, 18, now())");
			$stmt -> bindParam(':userid', $orgid);
			$stmt->execute(); 
			
			/*$stmt = $conn->prepare("ALTER TABLE `invoices`
			DROP COLUMN `$colName`");
			$stmt->execute();*/
			$conn = null;	
	}
	
?>