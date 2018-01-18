<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonsubjinfo = json_decode($_POST['subjinfo'], true);
		
	foreach ($jsonsubjinfo as $key => $value) {	
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("INSERT INTO schedules (year, section, code, units, subjectsection, starttime, endtime, days, building, roomnumber, instructor) 
			VALUES (:year, :section, :code, :units, :subjectsection, :starttime, :endtime, :days, :building, :roomnumber, :instructor)");
			$stmt -> bindParam(':year', $value['Year']);	
			$stmt -> bindParam(':section', $value['Section']);
			$stmt -> bindParam(':code', $value['Code']);
			$stmt -> bindParam(':units', $value['Units']);
			$stmt -> bindParam(':subjectsection', $value['Subject Section']);
			$stmt -> bindParam(':starttime', $value['Start Time']);
			$stmt -> bindParam(':endtime', $value['End Time']);
			$stmt -> bindParam(':days', $value['Days']);
			$stmt -> bindParam(':building', $value['Building']);
			$stmt -> bindParam(':roomnumber', $value['Room Number']);
			$stmt -> bindParam(':instructor', $value['Instructor']);
			$stmt->execute();	
			$conn = null;	
	}
	
?>