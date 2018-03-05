<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonprofiledata = json_decode($_POST['profiledata'], true);
	$adminid = $_POST['adminid'];
	$requestid = $_POST['requestid'];
	$conn = getDB('cpe-studentportal');
		
	foreach ($jsonprofiledata as $key => $value) {	
		//update main table
		$stmt = $conn->prepare("UPDATE `students`
		SET surname=:surname, 
		firstname=:firstname, 
		middlename=:middlename, 
		Gender=:Gender, 
		Status=:Status, 
		Citizenship=:Citizenship, 
		DateOfBirth=:DateOfBirth, 
		PlaceOfBirth=:PlaceOfBirth, 
		ContactNo=:ContactNo, 
		Address=:Address, 
		Father=:Father, 
		FatherOccupation=:FatherOccupation, 
		Mother=:Mother,  
		MotherOccupation=:MotherOccupation, 
		Elementary=:Elementary, 
		ElemAddress=:ElemAddress, 
		ElemGraduate=:ElemGraduate, 
		Secondary=:Secondary, 
		SecAddress=:SecAddress, 
		SecGraduate=:SecGraduate
		WHERE studnum = :studnum");
		$stmt -> bindParam(':surname', $value['surname']);
		$stmt -> bindParam(':firstname', $value['firstname']);
		$stmt -> bindParam(':middlename', $value['middlename']);
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
		$stmt -> bindParam(':studnum', $value['studnum']);
		$stmt->execute();
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 4, :target, now())");
		$stmt -> bindParam(':userid', $adminid);
		$stmt -> bindParam(':target', $value['studnum']);
		$stmt->execute(); 
		
		//update request table
		$stmt = $conn->prepare("UPDATE `profilerequest` SET
		approvalstatus = 1,
		approvedby = :approvedby,
		approvedon = now()
		WHERE requestid = :requestid");
		$stmt -> bindParam(':approvedby', $adminid);
		$stmt -> bindParam(':requestid', $requestid);
		$stmt->execute();
	}
	
		$conn = null;
	
?>