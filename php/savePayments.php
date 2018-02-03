<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpaytable = json_decode($_POST['paytable'], true);
	
	//get the column names and save them to an array
	$arraycol = array();
	$row = $jsonpaytable[0];
	foreach ($row as $key => $value) {	
		array_push($arraycol, $key);
	}
	
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsonpaytable as $key => $value) {	
		foreach ($arraycol as $col) {
			$stmt = $conn->prepare("UPDATE `invoices` SET `$col`=:value WHERE studnum=:studnum");
			$stmt -> bindParam(':value', $value[$col]);
			$stmt -> bindParam(':studnum', $value['studnum']);
			$stmt->execute();				
		}
	}	

	$conn = null;	
	//print_r($arraycol);
	return false;
?>