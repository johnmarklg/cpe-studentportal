<?php 
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
	
		$conn = getDB('cpe-studentportal');	
		
		//year
		$x = $_POST['year'];
		//section
		$y = $_POST['section'];
		
		$result = '';
		//{mode: "read",hour: 12, days: ["MON","TUE","WED","THU","FRI","SAT","SUN"], periodTextColor: "#fff",periodDuration: 30,data: 
			$result .= '[{day: 0, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.section=:section AND schedules.mon = 1 ORDER BY TIME(schedules.starttime) ASC");
			$stmt -> bindParam(':year', $x);
			$stmt -> bindParam(':section', $y);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				if($row == $lastrow) {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			$result .= ']},{day: 1, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.section=:section AND schedules.tue = 1");
			$stmt -> bindParam(':year', $x);
			$stmt -> bindParam(':section', $y);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			$result .= ']},{day: 2, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.section=:section AND schedules.wed = 1");
			$stmt -> bindParam(':year', $x);
			$stmt -> bindParam(':section', $y);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			$result .= ']},{day: 3, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.section=:section AND schedules.thu = 1");
			$stmt -> bindParam(':year', $x);
			$stmt -> bindParam(':section', $y);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			$result .= ']},{day: 4, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.section=:section AND schedules.fri = 1");
			$stmt -> bindParam(':year', $x);
			$stmt -> bindParam(':section', $y);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			//saturday
			$result .= ']},{day: 5, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.section=:section AND schedules.sat = 1");
			$stmt -> bindParam(':year', $x);
			$stmt -> bindParam(':section', $y);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				$result .= '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			$result .= ']}]';
//}
		$conn = null;
		
		echo $result;
	?>