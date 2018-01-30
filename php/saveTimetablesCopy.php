<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpaytable = json_decode($_POST['tablestudnum'], true);
	$conn = getDB('cpe-studentrecords');
			
			
	foreach ($jsonpaytable as $key => $value) {
			$tableName = $value['Student Number'];
			if($tableName<>'00-0000'){
			$stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS `$tableName` LIKE `00-0000`");
			$stmt->execute();
			$stmt = $conn->prepare("INSERT INTO `$tableName` (1st, 2nd, 3rd, code) SELECT 1st, 2nd, 3rd, code FROM `00-0000`");
			$stmt->execute();
			}
	}	

	$conn = null;	
	//print_r($arraycol);
	return false;
?>