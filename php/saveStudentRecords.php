<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$jsonstuddata = json_decode($_POST['studdata'], true);
	$jsongrades = json_decode($_POST['studgrades'], true); 
	$studnum = $jsonstudinfo[0]['Student Number'];
	$updatedby = $_POST['adminid'];
	$oldstudnum = $jsonstudinfo[0]['Old Student Number'];
	
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
					//establish connection
					$conn = getDB('cpe-studentportal');
					//update records
					$stmt = $conn->prepare("UPDATE students SET surname = :surname, firstname = :firstname, middlename = :middlename , studnum = :studnum, passcode = :passcode, yearstarted = :yearstarted WHERE studnum = :oldstudnum");
					$stmt -> bindParam(':surname', $value['Surname']);
					$stmt -> bindParam(':firstname', $value['First Name']);
					$stmt -> bindParam(':middlename', $value['Middle Name']);
					$stmt -> bindParam(':studnum', $value['Student Number']);
					$stmt -> bindParam(':passcode', $passcode);
					$stmt -> bindParam(':yearstarted', $yearstarted);
					$stmt -> bindParam(':oldstudnum', $oldstudnum);
					$stmt->execute();
					//update student number in grades table, ignore if same
					$stmt = $conn->prepare("UPDATE grades SET studnum = :studnum WHERE studnum = :oldstudnum");
					$stmt -> bindParam(':studnum', $value['Student Number']);
					$stmt -> bindParam(':oldstudnum', $oldstudnum);
					$stmt->execute();
					
					$stmt = $conn->prepare("SELECT * FROM grades WHERE studnum = :studnum");
					$stmt -> bindParam(':studnum', $studnum);
					$stmt->execute();
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					//check if entry/record exists, if not
					if(!$result) {
						//create grades records
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
					}
					
					
					//close connection
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
		}
		$conn = getDB('cpe-studentportal');
					
		//update personal datasheet
		foreach ($jsonstuddata as $key => $value) {
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
		}
			
		//update grades
		foreach ($jsongrades as $key => $value) {
					$stmt = $conn->prepare("UPDATE `grades` SET 1st = :first, 2nd = :second, 3rd = :third, updatedby=:updatedby WHERE courseid = :id AND studnum = :studnum");
					$stmt -> bindParam(':first', $value['1st']);
					$stmt -> bindParam(':second', $value['2nd']);
					$stmt -> bindParam(':third', $value['3rd']);
					$stmt -> bindParam(':id', $value['id']);
					$stmt -> bindParam(':studnum', $studnum);
					$stmt -> bindParam(':updatedby', $updatedby);
					$stmt->execute();
		}
		
		$conn = null;
	} else {
		echo "<script>alert('Error! No Student Number assigned.');</script>";
	}
		
		print $studnum;
?>