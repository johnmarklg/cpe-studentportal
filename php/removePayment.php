<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
	$orgid = $_POST['orgid'];	
		
	foreach ($jsoninfodata as $key => $value) {	
			$colName = $value['colname'];
			
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("SELECT name from payments where id=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();
			$colname = $stmt->fetchColumn(); 
				
			$stmt = $conn->prepare("DELETE FROM payments where id=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();
			$stmt = $conn->prepare("DELETE FROM transactions WHERE paymentid=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();
			
			$stmt = $conn->prepare("INSERT INTO `activitylog` 
			(userid, action, target, timestamp) 
			VALUES (:userid, 18, :target, now())");
			$stmt -> bindParam(':userid', $orgid);
			$stmt -> bindParam(':target', $colname);
			$stmt->execute(); 
			
			/*$stmt = $conn->prepare("ALTER TABLE `invoices`
			DROP COLUMN `$colName`");
			$stmt->execute();*/
			$conn = null;	
	}
	
?>