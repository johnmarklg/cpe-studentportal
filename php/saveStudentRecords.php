<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$jsonstuddata = json_decode($_POST['studdata'], true);
	$jsongrades = json_decode($_POST['studgrades'], true); 
	$studnum = $jsonstudinfo[0]['Student Number'];
	$oldstudnum = $jsonstudinfo[0]['Old Student Number'];
	$ID = $jsonstudinfo[0]['ID'];
	
	//if first semester
	if (date('m') > 7) {
		$fifthyear = date('y') - 4; 
	} else { //if second semester
		$fifthyear = date('y') - 5;
	}
	
	
	if($studnum != "00-0000") {
		if($oldstudnum != "00-0000") {
			//loaded entry
			foreach ($jsonstudinfo as $key => $value) {
					if($value['Passcode']=="") {
						$passcode = md5($value['Student Number']);
						$passcode = substr($passcode, 2, 8);
					} else {
						$passcode = $value['Passcode'];
					}
					if($value['Year Level']=="") {
						$yearstarted = mb_substr($value['Student Number'], 0, 2);
					} else {
						$yearstarted = $fifthyear + 5 - $value['Year Level'];
					}
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("UPDATE students SET surname = :surname, firstname = :firstname, middlename = :middlename , studnum = :studnum, passcode = :passcode, yearstarted = :yearstarted WHERE id = :id");
					$stmt -> bindParam(':surname', $value['Surname']);
					$stmt -> bindParam(':firstname', $value['First Name']);
					$stmt -> bindParam(':middlename', $value['Middle Name']);
					$stmt -> bindParam(':studnum', $value['Student Number']);
					$stmt -> bindParam(':passcode', $passcode);
					$stmt -> bindParam(':yearstarted', $yearstarted);
					$stmt -> bindParam(':id', $value['ID']);
					$stmt->execute();
					$conn = null;

					$conn = getDB('cpe-studentrecords');
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
						if($value['Year Level']=="") {
							$yearstarted = mb_substr($value['Student Number'], 0, 2);
						} else {
							$yearstarted = $fifthyear + 5 - $value['Year Level'];
						}
						$conn = getDB('cpe-studentportal');
						$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, passcode, yearstarted) VALUES (:studnum, :surname, :firstname, :middlename, :passcode, :yearstarted)");
						$stmt -> bindParam(':studnum', $value['Student Number']);	
						$stmt -> bindParam(':surname', $value['Surname']);
						$stmt -> bindParam(':firstname', $value['First Name']);
						$stmt -> bindParam(':middlename', $value['Middle Name']);
						$stmt -> bindParam(':passcode', $passcode);
						$stmt -> bindParam(':yearstarted', $yearstarted);
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
		
		foreach ($jsonstuddata as $key => $value) {
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("UPDATE students SET Address = :Address, ContactNo = :ContactNo, DateOfBirth = :DateOfBirth , PlaceOfBirth = :PlaceOfBirth, Citizenship = :Citizenship, Status = :Status, Gender = :Gender, Father = :Father, FatherOccupation = :FatherOccupation, Mother = :Mother, MotherOccupation = :MotherOccupation, Elementary = :Elementary, ElemAddress = :ElemAddress, ElemGraduate = :ElemGraduate, Secondary = :Secondary, SecAddress = :SecAddress, SecGraduate = :SecGraduate WHERE studnum = :studnum");
					$stmt -> bindParam(':Address', $value['Address']);
					$stmt -> bindParam(':ContactNo', $value['ContactNo']);
					$stmt -> bindParam(':DateOfBirth', $value['DateOfBirth']);
					$stmt -> bindParam(':PlaceOfBirth', $value['PlaceOfBirth']);
					$stmt -> bindParam(':Citizenship', $value['Citizenship']);
					$stmt -> bindParam(':Status', $value['Status']);
					$stmt -> bindParam(':Gender', $value['Gender']);
					$stmt -> bindParam(':Father', $value['Father']);
					$stmt -> bindParam(':FatherOccupation', $value['FatherOccupation']);
					$stmt -> bindParam(':Mother', $value['Mother']);
					$stmt -> bindParam(':MotherOccupation', $value['MotherOccupation']);
					$stmt -> bindParam(':Elementary', $value['Elementary']);
					$stmt -> bindParam(':ElemAddress', $value['ElemAddress']);
					$stmt -> bindParam(':ElemGraduate', $value['ElemGraduate']);
					$stmt -> bindParam(':Secondary', $value['Secondary']);
					$stmt -> bindParam(':SecAddress', $value['SecAddress']);
					$stmt -> bindParam(':SecGraduate', $value['SecGraduate']);
					$stmt -> bindParam(':studnum', $studnum);
					$stmt->execute();
					$conn = null;
		}
			
		foreach ($jsongrades as $key => $value) {
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("UPDATE `$studnum` SET 1st = :first, 2nd = :second, 3rd = :third WHERE `$studnum`.courseid = :id");
					$stmt -> bindParam(':first', $value['1st']);
					$stmt -> bindParam(':second', $value['2nd']);
					$stmt -> bindParam(':third', $value['3rd']);
					$stmt -> bindParam(':id', $value['id']);
					$stmt->execute();
					$conn = null;
		}
		
	} else {
		echo "<script>alert('Error! No Student Number assigned.');</script>";
	}
		
		print $studnum;
?>