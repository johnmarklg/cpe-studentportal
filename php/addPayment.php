<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
		
	foreach ($jsoninfodata as $key => $value) {	
			$colName = $value['Name'];
			//$columnName = $value['Name'] . ' - ' . $value['Amount'];
			$conn = getDB('cpe-studentportal');
			
			$stmt = $conn->prepare("INSERT INTO `payments` (name, amount, created) VALUES (:name, :amount, now())");
			$stmt -> bindParam(':name', $value['Name']);
			$stmt -> bindParam(':amount', $value['Amount']);
			//$stmt -> bindParam(':columnname', $value['columnName']);
			$stmt->execute();	
			/*$stmt = $conn->prepare("ALTER TABLE `invoices` 
			ADD `$colName` float DEFAULT null");
			$stmt->execute();*/
			$conn = null;	
	}
	
?>