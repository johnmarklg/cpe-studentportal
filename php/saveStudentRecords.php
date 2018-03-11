<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$jsonstuddata = json_decode($_POST['studdata'], true);
	$jsongrades = json_decode($_POST['studgrades'], true); 
	$studnum = $jsonstudinfo[0]['Student Number'];
	$currid = $_POST['currid'];
	$updatedby = $_POST['adminid'];
	$oldstudnum = $jsonstudinfo[0]['Old Student Number'];
	
	//if first semester
	if (date('m') > 7) {
		$fifthyear = date('y') - 4; 
	} else { //if second semester
		$fifthyear = date('y') - 5;
	}
	
	//establish connection
	$conn = getDB('cpe-studentportal');
	$stmt = $conn->prepare("SELECT studnum FROM students WHERE studnum = :studnum");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);			
	
	if(!$result) {	
		//if studnum was input
		if($studnum != "00-0000") {
			//update opened records
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
						if($oldstudnum != ($value['Student Number'])) {
							//update comments if studnum changed
							$stmt = $conn->prepare("UPDATE comments SET commenterid = :studnum WHERE commenterid = :oldstudnum");
							$stmt -> bindParam(':studnum', $value['Student Number']);
							$stmt -> bindParam(':oldstudnum', $oldstudnum);
							$stmt->execute();
							//update unapproved profile requests
							$stmt = $conn->prepare("UPDATE profilerequest SET studnum = :studnum WHERE studnum = :oldstudnum AND approvalstatus = 0");
							$stmt -> bindParam(':studnum', $value['Student Number']);
							$stmt -> bindParam(':oldstudnum', $oldstudnum);
							$stmt->execute();
						}					
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
						
						//gets all the subjects from the curriculum and checks if the student has a record for all of them
						$stmt = $conn->prepare("SELECT COALESCE(grades.courseid, subjects.subjectid) as courseid,
						COALESCE(grades.studnum, '') as studnum
						FROM `subjects`
						LEFT JOIN `grades`
						ON subjects.subjectid = grades.courseid
						AND grades.studnum=:studnum
						WHERE subjects.curriculumID=:currid
						ORDER BY subjects.subjectid ASC");
						$stmt -> bindParam(':studnum', $studnum);
						$stmt -> bindParam(':currid', $currid);
						$stmt->execute();
						
						foreach(($stmt->fetchAll()) as $row) {
							//for every missing entry, insert a blank entry
							if(($row['studnum'])==='') {
								$stmti = $conn->prepare("INSERT INTO `grades` (`studnum`, `courseid`, `1st`, `2nd`, `3rd`, `lastupdated`, `updatedby`) 
								VALUES (:studnum, :courseid, '', '', '', now(), :updatedby)");
								$stmti -> bindParam(':studnum', $studnum);
								$stmti -> bindParam(':courseid', $row['courseid']);
								$stmti -> bindParam(':updatedby', $updatedby);
								$stmti->execute();
							}
						}
						//close connection
						//$conn = null;
				}
			} 
			else //if create new entry
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
							//$conn = getDB('cpe-studentportal');
							//insert student
							$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, passcode, yearstarted) VALUES (:studnum, :surname, :firstname, :middlename, :passcode, :yearstarted)");
							$stmt -> bindParam(':studnum', $value['Student Number']);	
							$stmt -> bindParam(':surname', $value['Surname']);
							$stmt -> bindParam(':firstname', $value['First Name']);
							$stmt -> bindParam(':middlename', $value['Middle Name']);
							$stmt -> bindParam(':passcode', $passcode);
							$stmt -> bindParam(':yearstarted', $yearstarted);
							$stmt->execute();	
							
							$stmt = $conn->prepare("INSERT INTO `activitylog` 
							(userid, action, target, timestamp) 
							VALUES (:userid, 11, :target, now())");
							$stmt -> bindParam(':userid', $updatedby);
							$stmt -> bindParam(':target', $value['Student Number']);
							$stmt->execute(); 
							
							//gets all the subjects from the curriculum and checks if the student has a record for all of them
							$stmt = $conn->prepare("SELECT COALESCE(grades.courseid, subjects.subjectid) as courseid,
							COALESCE(grades.studnum, '') as studnum
							FROM `subjects`
							LEFT JOIN `grades`
							ON subjects.subjectid = grades.courseid
							AND grades.studnum=:studnum
							WHERE subjects.curriculumID=:currid
							ORDER BY subjects.subjectid ASC");
							$stmt -> bindParam(':studnum', $studnum);
							$stmt -> bindParam(':currid', $currid);
							$stmt->execute();
							
							foreach(($stmt->fetchAll()) as $row) {
								//for every missing entry, insert a blank entry
								if(($row['studnum'])==='') {
									$stmti = $conn->prepare("INSERT INTO `grades` (`studnum`, `courseid`, `1st`, `2nd`, `3rd`, `lastupdated`, `updatedby`) 
									VALUES (:studnum, :courseid, '', '', '', now(), :updatedby)");
									$stmti -> bindParam(':studnum', $studnum);
									$stmti -> bindParam(':courseid', $row['courseid']);
									$stmti -> bindParam(':updatedby', $updatedby);
									$stmti->execute();
								}
							}
							//$conn = null;	
					}
			}
			//$conn = getDB('cpe-studentportal');
						
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
				
				
			$stmt = $conn->prepare("INSERT INTO `activitylog` 
			(userid, action, target, timestamp) 
			VALUES (:userid, 5, :target, now())");
			$stmt -> bindParam(':userid', $updatedby);
			$stmt -> bindParam(':target', $studnum);
			$stmt->execute(); 
			
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
			print 'Successfully added/updated student record!';
			$conn = null;
		} else {}
	} else { print 'Error! Student Number already exists in the database.'; }
?>