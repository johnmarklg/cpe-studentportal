<?php	
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");	
		
			$subjectid = $_POST['subjectid'];
			$subjectid = $_POST['currid'];
			
			$conn = getDB('cpe-studentportal');
			
			$jsonsubject = json_decode($_POST['subjectdata'], true);
	
				foreach ($jsonsubject as $key => $value) {
						//if new entry
						$stmt = $conn->prepare("INSERT INTO subjects (coursecode, coursetitle, units, prerequisite, corequisite, year, defaultyear, defaultsemester, curriculumID) 
						VALUES (:coursecode, :coursetitle, :units, :prerequisite, :corequisite, :year, :defaultyear, :defaultsemester, :curriculumID)");
						$stmt -> bindParam(':coursecode', $value['Course Code']);
						$stmt -> bindParam(':coursetitle', $value['Course Title']);
						$stmt -> bindParam(':units', $value['Units']);
						$stmt -> bindParam(':prerequisite', $value['Pre-Requisite']);
						$stmt -> bindParam(':corequisite', $value['Co-Requisite']);
						$stmt -> bindParam(':year', $value['Year']);
						$stmt -> bindParam(':defaultyear', $value['Default Year']);
						$stmt -> bindParam(':defaultsemester', $value['Default Semester']);
						$stmt -> bindParam(':curriculumID', $currid);
						$stmt->execute();
				}
			$conn = null;
			
		print $subjectid;
?>