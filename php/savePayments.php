<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	//$jsontimetable1 = json_decode($_POST['tablefirst'], true);
	//$jsontimetable2 = json_decode($_POST['tablesecond'], true);
	//$jsontimetable3 = json_decode($_POST['tablethird'], true);
	//$jsontimetable4 = json_decode($_POST['tablefourth'], true);
	//$jsontimetable5 = json_decode($_POST['tablefifth'], true);
	$jsonpaytable = json_decode($_POST['paytable'], true);
	
	//get the column names and save them to an array
	$arraycol = array();
	$row = $jsonpaytable[0];
	foreach ($row as $key => $value) {	
		array_push($arraycol, $key);
		//echo $key . ', ';
	}
	
	$conn = getDB('cpe-studentportal');
			
	//fifth year
	foreach ($jsonpaytable as $key => $value) {	
		foreach ($arraycol as $col) {
			$stmt = $conn->prepare("UPDATE students SET $col=:value WHERE id=:id");
			$stmt -> bindParam(':value', $value[$col]);
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();				
		}
	}	

	$conn = null;	
	//print_r($arraycol);
	return false;
?>