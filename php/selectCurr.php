<?php	
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		$currid = $_POST['currid'];
		$currname = $_POST['currname'];
			
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT subjects.*, curriculum.name from subjects LEFT JOIN curriculum ON curriculum.id=subjects.curriculumID WHERE curriculumID=:currid ORDER BY subjectid ASC, defaultyear ASC, defaultsemester ASC");
		$stmt -> bindParam(':currid', $currid);
		$stmt->execute();
		
		$objects = '<select id="code" class="form-control">';
		foreach(($stmt->fetchAll()) as $row) { 
			$objects .= '<object value="'. $row['subjectid']. '">'. $row['coursecode'] . '</object>';
			//$objects .= '{"value":'. $row['subjectid']. '","text":'. $row['coursecode'] . '"}';
		}
		$conn = null;
		$objects .= '</select>';

		print $objects;
?>