<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudprofile = json_decode($_POST['studprofile'], true);
	
	$oldstudnum = $_POST['oldstudnum'];
	
	$conn = getDB('cpe-studentportal');
		
		$stmt = $conn->prepare("SELECT requestid FROM profilerequest WHERE approvalstatus = 0 AND studnum= :studnum");
		$stmt -> bindParam(':studnum', $oldstudnum);
		$stmt->execute(); 
		$result = $stmt->fetch(PDO::FETCH_ASSOC);			
		//check if entry/record exists, meaning there's still a request
		if (!($result)) {
			foreach ($jsonstudprofile as $key => $value) {		
				$stmt = $conn->prepare("INSERT INTO `profilerequest` 
				(`studnum`, `surname`, `firstname`, `middlename`, 
				`Gender`, `Status`, `Citizenship`, `DateOfBirth`, 
				`PlaceOfBirth`, `ContactNo`, `Address`, `Father`, 
				`FatherOccupation`, `Mother`, `MotherOccupation`, `Elementary`, 
				`ElemAddress`, `ElemGraduate`, `Secondary`, `SecAddress`, `SecGraduate`) 
				VALUES (:studnum, :surname, :firstname, :middlename, 
				:Gender, :Status, :Citizenship, :DateOfBirth, :PlaceOfBirth, :ContactNo, 
				:Address, :Father, :FatherOccupation, :Mother, :MotherOccupation, 
				:Elementary, :ElemAddress, :ElemGraduate, :Secondary, :SecAddress, :SecGraduate)");
				$stmt -> bindParam(':studnum', $value['Student Number']);
				$stmt -> bindParam(':surname', $value['Surname']);
				$stmt -> bindParam(':firstname', $value['First Name']);
				$stmt -> bindParam(':middlename', $value['Middle Name']);
				$stmt -> bindParam(':Gender', $value['Gender']);
				$stmt -> bindParam(':Status', $value['Status']);
				$stmt -> bindParam(':Citizenship', $value['Citizenship']);
				$stmt -> bindParam(':DateOfBirth', $value['DateOfBirth']);
				$stmt -> bindParam(':PlaceOfBirth', $value['PlaceOfBirth']);
				$stmt -> bindParam(':ContactNo', $value['ContactNo']);
				$stmt -> bindParam(':Address', $value['Address']);
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
				$stmt->execute(); 
				$stmt = $conn->prepare("INSERT INTO `activitylog` 
				(userid, action, timestamp) 
				VALUES (:userid, 3, now())");
				$stmt -> bindParam(':userid', $value['Student Number']);
				$stmt->execute(); 
				$msg = "Update request successfully sent.";
			}
		} else {
			$msg =  "Error! A request is still on pending.";
		}
			
		//update personal datasheet
		
		$conn = null;
		print $msg;
?>