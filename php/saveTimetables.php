<?php	
	//require('databaseConnectionTimetable.php');
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsontimetable1 = json_decode($_POST['tablefirst'], true);
	$jsontimetable2 = json_decode($_POST['tablesecond'], true);
	$jsontimetable3 = json_decode($_POST['tablethird'], true);
	$jsontimetable4 = json_decode($_POST['tablefourth'], true);
	$jsontimetable5 = json_decode($_POST['tablefifth'], true);
	
	$conn = getDB('cpe-studentportal');
	$stmt = $conn->prepare("TRUNCATE `schedules`");
	$stmt->execute();
	$conn = null;
	
	//then insert current table data in order to overwrite all changes
	foreach ($jsontimetable1 as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO `schedules` (year, section, code, subjectsection, starttime, endtime, days, building, roomnumber, instructor)
		VALUES (1, :section, :code, :subjectsection, :starttime, :endtime, :days, :building, :roomnumber, :instructor)");
		$stmt -> bindParam(':section', $value['Section']);
		$stmt -> bindParam(':code', $value['Code']);
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
	
	foreach ($jsontimetable2 as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO `schedules` (year, section, code, subjectsection, starttime, endtime, days, building, roomnumber, instructor)
		VALUES (2, :section, :code, :subjectsection, :starttime, :endtime, :days, :building, :roomnumber, :instructor)");
		$stmt -> bindParam(':section', $value['Section']);
		$stmt -> bindParam(':code', $value['Code']);
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
	
	foreach ($jsontimetable3 as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO `schedules` (year, section, code, subjectsection, starttime, endtime, days, building, roomnumber, instructor)
		VALUES (3, :section, :code, :subjectsection, :starttime, :endtime, :days, :building, :roomnumber, :instructor)");
		$stmt -> bindParam(':section', $value['Section']);
		$stmt -> bindParam(':code', $value['Code']);
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
	
	foreach ($jsontimetable4 as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO `schedules` (year, section, code, subjectsection, starttime, endtime, days, building, roomnumber, instructor)
		VALUES (4, :section, :code, :subjectsection, :starttime, :endtime, :days, :building, :roomnumber, :instructor)");
		$stmt -> bindParam(':section', $value['Section']);
		$stmt -> bindParam(':code', $value['Code']);
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
	
	foreach ($jsontimetable5 as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO `schedules` (year, section, code, subjectsection, starttime, endtime, days, building, roomnumber, instructor)
		VALUES (5, :section, :code, :subjectsection, :starttime, :endtime, :days, :building, :roomnumber, :instructor)");
		$stmt -> bindParam(':section', $value['Section']);
		$stmt -> bindParam(':code', $value['Code']);
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