<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$updatedby = $_POST['adminid'];
	$studnum = $jsonstudinfo[0]['Student Number'];
	
	foreach ($jsonstudinfo as $key => $value) {				
			$passcode = md5($value['Student Number']);
			$passcode = substr($passcode, 2, 8);
			
			$yearstarted = mb_substr($value['Student Number'], 0, 2);
			
			//establish connection
			$conn = getDB('cpe-studentportal');
			//insert student
			$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, passcode, yearstarted) VALUES (:studnum, :surname, :firstname, :middlename, :passcode, :yearstarted)");
			$stmt -> bindParam(':studnum', $value['Student Number']);	
			$stmt -> bindParam(':surname', $value['Surname']);
			$stmt -> bindParam(':firstname', $value['First Name']);
			$stmt -> bindParam(':middlename', $value['Middle Name']);
			$stmt -> bindParam(':passcode', $passcode);
			$stmt -> bindParam(':yearstarted', $yearstarted);
			$stmt->execute();	
			
			//create grades records
			
			$updatedby = $_POST['adminid'];
			$stmt = $conn->prepare("INSERT INTO `grades` (`studnum`, `courseid`, `1st`, `2nd`, `3rd`, `lastupdated`, `updatedby`) VALUES
			(:studnum, 1, '', '', '', now(), :updatedby),
			(:studnum, 2, '', '', '', now(), :updatedby),
			(:studnum, 3, '', '', '', now(), :updatedby),
			(:studnum, 4, '', '', '', now(), :updatedby),
			(:studnum, 5, '', '', '', now(), :updatedby),
			(:studnum, 6, '', '', '', now(), :updatedby),
			(:studnum, 7, '', '', '', now(), :updatedby),
			(:studnum, 8, '', '', '', now(), :updatedby),
			(:studnum, 9, '', '', '', now(), :updatedby),
			(:studnum, 10, '', '', '', now(), :updatedby),
			(:studnum, 11, '', '', '', now(), :updatedby),
			(:studnum, 12, '', '', '', now(), :updatedby),
			(:studnum, 13, '', '', '', now(), :updatedby),
			(:studnum, 14, '', '', '', now(), :updatedby),
			(:studnum, 15, '', '', '', now(), :updatedby),
			(:studnum, 16, '', '', '', now(), :updatedby),
			(:studnum, 17, '', '', '', now(), :updatedby),
			(:studnum, 18, '', '', '', now(), :updatedby),
			(:studnum, 19, '', '', '', now(), :updatedby),
			(:studnum, 20, '', '', '', now(), :updatedby),
			(:studnum, 21, '', '', '', now(), :updatedby),
			(:studnum, 22, '', '', '', now(), :updatedby),
			(:studnum, 23, '', '', '', now(), :updatedby),
			(:studnum, 24, '', '', '', now(), :updatedby),
			(:studnum, 25, '', '', '', now(), :updatedby),
			(:studnum, 26, '', '', '', now(), :updatedby),
			(:studnum, 27, '', '', '', now(), :updatedby),
			(:studnum, 28, '', '', '', now(), :updatedby),
			(:studnum, 29, '', '', '', now(), :updatedby),
			(:studnum, 30, '', '', '', now(), :updatedby),
			(:studnum, 31, '', '', '', now(), :updatedby),
			(:studnum, 32, '', '', '', now(), :updatedby),
			(:studnum, 33, '', '', '', now(), :updatedby),
			(:studnum, 34, '', '', '', now(), :updatedby),
			(:studnum, 35, '', '', '', now(), :updatedby),
			(:studnum, 36, '', '', '', now(), :updatedby),
			(:studnum, 37, '', '', '', now(), :updatedby),
			(:studnum, 38, '', '', '', now(), :updatedby),
			(:studnum, 39, '', '', '', now(), :updatedby),
			(:studnum, 40, '', '', '', now(), :updatedby),
			(:studnum, 41, '', '', '', now(), :updatedby),
			(:studnum, 42, '', '', '', now(), :updatedby),
			(:studnum, 43, '', '', '', now(), :updatedby),
			(:studnum, 44, '', '', '', now(), :updatedby),
			(:studnum, 45, '', '', '', now(), :updatedby),
			(:studnum, 46, '', '', '', now(), :updatedby),
			(:studnum, 47, '', '', '', now(), :updatedby),
			(:studnum, 48, '', '', '', now(), :updatedby),
			(:studnum, 49, '', '', '', now(), :updatedby),
			(:studnum, 50, '', '', '', now(), :updatedby),
			(:studnum, 51, '', '', '', now(), :updatedby),
			(:studnum, 52, '', '', '', now(), :updatedby),
			(:studnum, 53, '', '', '', now(), :updatedby),
			(:studnum, 54, '', '', '', now(), :updatedby),
			(:studnum, 55, '', '', '', now(), :updatedby),
			(:studnum, 56, '', '', '', now(), :updatedby),
			(:studnum, 57, '', '', '', now(), :updatedby),
			(:studnum, 58, '', '', '', now(), :updatedby),
			(:studnum, 59, '', '', '', now(), :updatedby),
			(:studnum, 60, '', '', '', now(), :updatedby),
			(:studnum, 61, '', '', '', now(), :updatedby),
			(:studnum, 62, '', '', '', now(), :updatedby),
			(:studnum, 63, '', '', '', now(), :updatedby),
			(:studnum, 64, '', '', '', now(), :updatedby),
			(:studnum, 65, '', '', '', now(), :updatedby),
			(:studnum, 66, '', '', '', now(), :updatedby),
			(:studnum, 67, '', '', '', now(), :updatedby),
			(:studnum, 68, '', '', '', now(), :updatedby),
			(:studnum, 69, '', '', '', now(), :updatedby),
			(:studnum, 70, '', '', '', now(), :updatedby),
			(:studnum, 71, '', '', '', now(), :updatedby),
			(:studnum, 72, '', '', '', now(), :updatedby),
			(:studnum, 73, '', '', '', now(), :updatedby);");
			$stmt -> bindParam(':studnum', $studnum);	
			$stmt -> bindParam(':updatedby', $updatedby);	
			$stmt->execute();					

			$conn = null;	
	}
	
?>