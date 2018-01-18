<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$studnum = $jsonstudinfo[0]['Student Number'];
		
	foreach ($jsonstudinfo as $key => $value) {	
			$passcode = md5($value['Student Number']);
			$passcode = substr($passcode, 2, 8);
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, passcode, yearstarted) VALUES (:studnum, :surname, :firstname, :middlename, :passcode, :yearstarted)");
			$stmt -> bindParam(':studnum', $value['Student Number']);	
			$stmt -> bindParam(':surname', $value['Surname']);
			$stmt -> bindParam(':firstname', $value['First Name']);
			$stmt -> bindParam(':middlename', $value['Middle Name']);
			$stmt -> bindParam(':passcode', $passcode);
			$startyear = mb_substr($value['Student Number'], 0, 2);
			$stmt -> bindParam(':yearstarted', $startyear);
			$stmt->execute();	
			$conn = null;	
			
			$conn = getDB('cpe-studentrecords');
			$stmt = $conn->prepare("CREATE TABLE `$studnum` LIKE `00-0000`");
			$stmt->execute();
			$stmt = $conn->prepare("INSERT `$studnum` SELECT * FROM `00-0000`");
			$stmt->execute();
			$conn = null;	
	}
	
?>