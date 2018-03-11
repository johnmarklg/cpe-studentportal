<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$updatedby = $_POST['adminid'];
	$studnum = $jsonstudinfo[0]['Student Number'];
	
	//establish connection
	$conn = getDB('cpe-studentportal');			
	
	$stmt = $conn->prepare("SELECT studnum FROM students WHERE studnum = :studnum");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);			
	
	if (!$result) {
		foreach ($jsonstudinfo as $key => $value) {				
				$passcode = md5($value['Student Number']);
				$passcode = substr($passcode, 2, 8);
				
				$yearstarted = mb_substr($value['Student Number'], 0, 2);
				
				//insert student
				$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, passcode, yearstarted, CurriculumID) VALUES (:studnum, :surname, :firstname, :middlename, :passcode, :yearstarted, :currid)");
				$stmt -> bindParam(':studnum', $value['Student Number']);	
				$stmt -> bindParam(':surname', $value['Surname']);
				$stmt -> bindParam(':firstname', $value['First Name']);
				$stmt -> bindParam(':middlename', $value['Middle Name']);
				$stmt -> bindParam(':passcode', $passcode);
				$stmt -> bindParam(':yearstarted', $yearstarted);
				$stmt -> bindParam(':currid', $value['Curriculum ID']);
				$stmt->execute();
				
				//create grades records
				
				$updatedby = $_POST['adminid'];
				
				$stmt = $conn->prepare("SELECT subjectid FROM `subjects` WHERE subjects.curriculumID=:currid");
				$stmt -> bindParam(':currid', $value['Curriculum ID']);
				$stmt->execute();
				
				$concatstmt = "INSERT INTO `grades` (`studnum`, `courseid`, `1st`, `2nd`, `3rd`, `lastupdated`, `updatedby`) VALUES ";
				$result = $stmt->fetchAll();
				foreach($result as $row) {
					$concatstmt .= "('" . $studnum . "', " . $row['subjectid']. ", '', '', '', now(), " . $updatedby . ")";
					if ($row != end($result)) {
						$concatstmt .= ",";
					} else {
						$concatstmt .= ";";
					}
				}
				$stmti = $conn->prepare($concatstmt); 
				$stmti->execute();
				//$stmti -> bindParam(':studnum', $studnum);	
				//$stmti -> bindParam(':subjectid', $id['subjectid'], PDO::PARAM_INT);	
				//$stmti -> bindParam(':updatedby', $updatedby);	
				//print $concatstmt;
				
				$stmt = $conn->prepare("INSERT INTO `activitylog` 
				(userid, action, target, timestamp) 
				VALUES (:userid, 11, :target, now())");
				$stmt -> bindParam(':userid', $updatedby);
				$stmt -> bindParam(':target', $studnum);
				$stmt->execute(); 
				
				print 'Successfully added student record!';
				
				
				//loop through all subject ids involved
				/*foreach(($stmt->fetchAll()) as $id) {
					$stmti = $conn->prepare("INSERT INTO `grades` (`studnum`, `courseid`, `1st`, `2nd`, `3rd`, `lastupdated`, `updatedby`) 
					VALUES (:studnum, :subjectid, '', '', '', now(), :updatedby)");
					$stmti -> bindParam(':studnum', $studnum);	
					$stmti -> bindParam(':subjectid', $id['subjectid'], PDO::PARAM_INT);	
					$stmti -> bindParam(':updatedby', $updatedby);	
					$stmti->execute();
				}*/
				
		}
	} else {
		print 'Error! Student Number is already used!';
	}
	$conn = null;
?>