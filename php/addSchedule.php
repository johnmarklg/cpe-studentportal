<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonsubjinfo = json_decode($_POST['subjinfo'], true);
		
	foreach ($jsonsubjinfo as $key => $value) {	
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("INSERT INTO schedules (section, subjectid, subjectsection, starttime, endtime, mon, tue, wed, thu, fri, sat, building, roomnumber, instructor) 
			VALUES (:section, :subjectid, :subjectsection, :starttime, :endtime, :mon, :tue, :wed, :thu, :fri, :sat, :building, :roomnumber, :instructor)");
			$stmt -> bindParam(':section', $value['Section']);
			$stmt -> bindParam(':subjectid', $value['SubjectID']);
			$stmt -> bindParam(':subjectsection', $value['Subject Section']);
			$stmt -> bindParam(':starttime', $value['Start Time']);
			$stmt -> bindParam(':endtime', $value['End Time']);
			$stmt -> bindParam(':mon', $value['Monday']);
			$stmt -> bindParam(':tue', $value['Tuesday']);
			$stmt -> bindParam(':wed', $value['Wednesday']);
			$stmt -> bindParam(':thu', $value['Thursday']);
			$stmt -> bindParam(':fri', $value['Friday']);
			$stmt -> bindParam(':sat', $value['Saturday']);
			$stmt -> bindParam(':building', $value['Building']);
			$stmt -> bindParam(':roomnumber', $value['Room Number']);
			$stmt -> bindParam(':instructor', $value['Instructor']);
			$stmt->execute();	
			$conn = null;	
	}
	
?>