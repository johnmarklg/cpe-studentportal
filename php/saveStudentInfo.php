<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$studnum = $jsonstudinfo[0]['Student Number'];
	$oldstudnum = $jsonstudinfo[0]['Old Student Number'];
	
	$conn = getDB('cpe-studentportal');
	$stmt = $conn->prepare("SELECT * from students WHERE studnum = :studnum");
	$stmt -> bindParam(':studnum', $value['Student Number']);
	$stmt->execute();
	
	$result = $stmt->fetch(PDO::FETCH_ASSOC); 
	
	$if(!$result) {
		die('Does not exist.');
	}

	$conn = null;
				

	if($studnum != "00-0000") {
		if($oldstudnum != "00-0000") {
			
			foreach ($jsonstudinfo as $key => $value) {
					if($value['Passcode']=="") {
						$passcode = md5($value['Student Number']);
						$passcode = substr($passcode, 2, 8);
					} else {
						$passcode = $value['Passcode'];
					}
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("UPDATE students SET surname = :surname, firstname = :firstname, middlename = :middlename, studnum = :studnum, passcode = :passcode, yearstarted = :yearstarted WHERE id = :id");
					$stmt -> bindParam(':surname', $value['Surname']);
					$stmt -> bindParam(':firstname', $value['First Name']);
					$stmt -> bindParam(':middlename', $value['Middle Name']);
					$stmt -> bindParam(':studnum', $value['Student Number']);
					$stmt -> bindParam(':passcode', $passcode);
					//$stmt -> bindParam(':yearstarted', $value['Year Started']);
					$startyear = mb_substr($value['Student Number'], 0, 2);
					//$yearlevel = $fifthyear - $row['yearstarted'] + 5;
					$stmt -> bindParam(':yearstarted', $startyear);
					$stmt -> bindParam(':id', $value['ID']);
					$stmt->execute();
					$conn = null;

					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("ALTER TABLE `$oldstudnum` RENAME `$studnum`;");
					
					$stmt->execute();
					$conn = null;
			}	
		} 
		else //if new entry
		{
				foreach ($jsonstudinfo as $key => $value) {
						if($value['Passcode']=="") {
							$passcode = md5($value['Student Number']);
							$passcode = substr($passcode, 2, 8);
						} else {
							$passcode = $value['Passcode'];
						}						
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
		}
	} else {
		echo "<script>alert('Error! No Student Number assigned.');</script>";
	}
		
		print $studnum;
?>