<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$jsonstuddata = json_decode($_POST['studdata'], true);
	$jsongrades = json_decode($_POST['studgrades'], true); 
	$studnum = $jsonstudinfo[0]['Student Number'];
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
						$stmt = $conn->prepare("INSERT INTO `grades` (`studnum`, `courseid`, `1st`, `2nd`, `3rd`, `code`) VALUES
						(:studnum, 1, '', '', '', 'CHEM 10'),
						(:studnum, 2, '', '', '', 'ENGL 1'),
						(:studnum, 3, '', '', '', 'FIL 1'),
						(:studnum, 4, '', '', '', 'MATH  12'),
						(:studnum, 5, '', '', '', 'MATH 15'),
						(:studnum, 6, '', '', '', 'NSTP 1'),
						(:studnum, 7, '', '', '', 'PE 1'),
						(:studnum, 8, '', '', '', 'CPE 100'),
						(:studnum, 9, '', '', '', 'DRAW 11'),
						(:studnum, 10, '', '', '', 'ENGL 2'),
						(:studnum, 11, '', '', '', 'FIL 2'),
						(:studnum, 12, '', '', '', 'MATH 13'),
						(:studnum, 13, '', '', '', 'MATH 18'),
						(:studnum, 14, '', '', '', 'MATH 27'),
						(:studnum, 15, '', '', '', 'NSTP 2'),
						(:studnum, 16, '', '', '', 'PE 2'),
						(:studnum, 17, '', '', '', 'COMP 11'),
						(:studnum, 18, '', '', '', 'CPE 130'),
						(:studnum, 19, '', '', '', 'ECON 1'),
						(:studnum, 20, '', '', '', 'ENGL 5'),
						(:studnum, 21, '', '', '', 'MATH 28'),
						(:studnum, 22, '', '', '', 'PE 3'),
						(:studnum, 23, '', '', '', 'PHY 31'),
						(:studnum, 24, '', '', '', 'CPE 111'),
						(:studnum, 25, '', '', '', 'MATH 29'),
						(:studnum, 26, '', '', '', 'MATH 60'),
						(:studnum, 27, '', '', '', 'PE 4'),
						(:studnum, 28, '', '', '', 'PHILO 3'),
						(:studnum, 29, '', '', '', 'PHY 32'),
						(:studnum, 30, '', '', '', 'SOCIO 1'),
						(:studnum, 31, '', '', '', 'CPE 131'),
						(:studnum, 32, '', '', '', 'DRAW 21'),
						(:studnum, 33, '', '', '', 'ECE 132'),
						(:studnum, 34, '', '', '', 'EE 101'),
						(:studnum, 35, '', '', '', 'IE 101'),
						(:studnum, 36, '', '', '', 'MATH 40'),
						(:studnum, 37, '', '', '', 'MECH 101'),
						(:studnum, 38, '', '', '', 'CPE 101'),
						(:studnum, 39, '', '', '', 'CPE 121'),
						(:studnum, 40, '', '', '', 'CPE 132E'),
						(:studnum, 41, '', '', '', 'ECE 134'),
						(:studnum, 42, '', '', '', 'EE 103'),
						(:studnum, 43, '', '', '', 'MECH 102'),
						(:studnum, 44, '', '', '', 'MECH 103'),
						(:studnum, 45, '', '', '', 'CPE 103'),
						(:studnum, 46, '', '', '', 'CPE 103'),
						(:studnum, 47, '', '', '', 'CPE 172'),
						(:studnum, 48, '', '', '', 'ECE 140'),
						(:studnum, 49, '', '', '', 'ES 101'),
						(:studnum, 50, '', '', '', 'IE 102'),
						(:studnum, 51, '', '', '', 'IE 103'),
						(:studnum, 52, '', '', '', 'CPE 114'),
						(:studnum, 53, '', '', '', 'CPE 134'),
						(:studnum, 54, '', '', '', 'CPE 136'),
						(:studnum, 55, '', '', '', 'CPE 150'),
						(:studnum, 56, '', '', '', 'ELECT 1'),
						(:studnum, 57, '', '', '', 'PSYCH 1'),
						(:studnum, 58, '', '', '', 'CPE 194'),
						(:studnum, 59, '', '', '', 'CPE 112'),
						(:studnum, 60, '', '', '', 'CPE 113'),
						(:studnum, 61, '', '', '', 'CPE 151'),
						(:studnum, 62, '', '', '', 'CPE 190'),
						(:studnum, 63, '', '', '', 'ELECT 2'),
						(:studnum, 64, '', '', '', 'HUM 1'),
						(:studnum, 65, '', '', '', 'LIT 1'),
						(:studnum, 66, '', '', '', 'CPE 145'),
						(:studnum, 67, '', '', '', 'CPE 192'),
						(:studnum, 68, '', '', '', 'CPE 197'),
						(:studnum, 69, '', '', '', 'CPE 199'),
						(:studnum, 70, '', '', '', 'ELECT 3'),
						(:studnum, 71, '', '', '', 'ENTREP 1'),
						(:studnum, 72, '', '', '', 'PI 1'),
						(:studnum, 73, '', '', '', 'POL SCI 1');");
						$stmt -> bindParam(':studnum', $studnum);	
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
						$stmt = $conn->prepare("INSERT INTO `grades` (`studnum`, `courseid`, `1st`, `2nd`, `3rd`, `code`) VALUES
						(:studnum, 1, '', '', '', 'CHEM 10'),
						(:studnum, 2, '', '', '', 'ENGL 1'),
						(:studnum, 3, '', '', '', 'FIL 1'),
						(:studnum, 4, '', '', '', 'MATH  12'),
						(:studnum, 5, '', '', '', 'MATH 15'),
						(:studnum, 6, '', '', '', 'NSTP 1'),
						(:studnum, 7, '', '', '', 'PE 1'),
						(:studnum, 8, '', '', '', 'CPE 100'),
						(:studnum, 9, '', '', '', 'DRAW 11'),
						(:studnum, 10, '', '', '', 'ENGL 2'),
						(:studnum, 11, '', '', '', 'FIL 2'),
						(:studnum, 12, '', '', '', 'MATH 13'),
						(:studnum, 13, '', '', '', 'MATH 18'),
						(:studnum, 14, '', '', '', 'MATH 27'),
						(:studnum, 15, '', '', '', 'NSTP 2'),
						(:studnum, 16, '', '', '', 'PE 2'),
						(:studnum, 17, '', '', '', 'COMP 11'),
						(:studnum, 18, '', '', '', 'CPE 130'),
						(:studnum, 19, '', '', '', 'ECON 1'),
						(:studnum, 20, '', '', '', 'ENGL 5'),
						(:studnum, 21, '', '', '', 'MATH 28'),
						(:studnum, 22, '', '', '', 'PE 3'),
						(:studnum, 23, '', '', '', 'PHY 31'),
						(:studnum, 24, '', '', '', 'CPE 111'),
						(:studnum, 25, '', '', '', 'MATH 29'),
						(:studnum, 26, '', '', '', 'MATH 60'),
						(:studnum, 27, '', '', '', 'PE 4'),
						(:studnum, 28, '', '', '', 'PHILO 3'),
						(:studnum, 29, '', '', '', 'PHY 32'),
						(:studnum, 30, '', '', '', 'SOCIO 1'),
						(:studnum, 31, '', '', '', 'CPE 131'),
						(:studnum, 32, '', '', '', 'DRAW 21'),
						(:studnum, 33, '', '', '', 'ECE 132'),
						(:studnum, 34, '', '', '', 'EE 101'),
						(:studnum, 35, '', '', '', 'IE 101'),
						(:studnum, 36, '', '', '', 'MATH 40'),
						(:studnum, 37, '', '', '', 'MECH 101'),
						(:studnum, 38, '', '', '', 'CPE 101'),
						(:studnum, 39, '', '', '', 'CPE 121'),
						(:studnum, 40, '', '', '', 'CPE 132E'),
						(:studnum, 41, '', '', '', 'ECE 134'),
						(:studnum, 42, '', '', '', 'EE 103'),
						(:studnum, 43, '', '', '', 'MECH 102'),
						(:studnum, 44, '', '', '', 'MECH 103'),
						(:studnum, 45, '', '', '', 'CPE 103'),
						(:studnum, 46, '', '', '', 'CPE 103'),
						(:studnum, 47, '', '', '', 'CPE 172'),
						(:studnum, 48, '', '', '', 'ECE 140'),
						(:studnum, 49, '', '', '', 'ES 101'),
						(:studnum, 50, '', '', '', 'IE 102'),
						(:studnum, 51, '', '', '', 'IE 103'),
						(:studnum, 52, '', '', '', 'CPE 114'),
						(:studnum, 53, '', '', '', 'CPE 134'),
						(:studnum, 54, '', '', '', 'CPE 136'),
						(:studnum, 55, '', '', '', 'CPE 150'),
						(:studnum, 56, '', '', '', 'ELECT 1'),
						(:studnum, 57, '', '', '', 'PSYCH 1'),
						(:studnum, 58, '', '', '', 'CPE 194'),
						(:studnum, 59, '', '', '', 'CPE 112'),
						(:studnum, 60, '', '', '', 'CPE 113'),
						(:studnum, 61, '', '', '', 'CPE 151'),
						(:studnum, 62, '', '', '', 'CPE 190'),
						(:studnum, 63, '', '', '', 'ELECT 2'),
						(:studnum, 64, '', '', '', 'HUM 1'),
						(:studnum, 65, '', '', '', 'LIT 1'),
						(:studnum, 66, '', '', '', 'CPE 145'),
						(:studnum, 67, '', '', '', 'CPE 192'),
						(:studnum, 68, '', '', '', 'CPE 197'),
						(:studnum, 69, '', '', '', 'CPE 199'),
						(:studnum, 70, '', '', '', 'ELECT 3'),
						(:studnum, 71, '', '', '', 'ENTREP 1'),
						(:studnum, 72, '', '', '', 'PI 1'),
						(:studnum, 73, '', '', '', 'POL SCI 1');");
						$stmt -> bindParam(':studnum', $studnum);	
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
					$stmt = $conn->prepare("UPDATE `grades` SET 1st = :first, 2nd = :second, 3rd = :third WHERE courseid = :id AND studnum = :studnum");
					$stmt -> bindParam(':first', $value['1st']);
					$stmt -> bindParam(':second', $value['2nd']);
					$stmt -> bindParam(':third', $value['3rd']);
					$stmt -> bindParam(':id', $value['id']);
					$stmt -> bindParam(':studnum', $studnum);
					$stmt->execute();
		}
		
		$conn = null;
	} else {
		echo "<script>alert('Error! No Student Number assigned.');</script>";
	}
		
		print $studnum;
?>