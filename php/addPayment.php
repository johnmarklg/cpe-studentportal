<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
		
	foreach ($jsoninfodata as $key => $value) {	
			$colName = $value['Name'];
			//$columnName = $value['Name'] . ' - ' . $value['Amount'];
			$conn = getDB('cpe-studentportal');
			
			$stmt = $conn->prepare("INSERT INTO `payments` (name) VALUES (:name)");
			$stmt -> bindParam(':name', $value['Name']);
			//$stmt -> bindParam(':amount', $value['Amount']);
			//$stmt -> bindParam(':columnname', $value['columnName']);
			$stmt->execute();	
			$stmt = $conn->prepare("ALTER TABLE students 
			ADD `$colName` float DEFAULT 0");
			$stmt->execute();
			$conn = null;	
	}
	
?>