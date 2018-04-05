<?php 
		$conn = getDB('cpe-studentportal');	
		
		for ($x = 1; $x <= 5; $x++) {
			$stmt = $conn->prepare("SELECT DISTINCT section FROM `schedules`
			LEFT JOIN subjects
			ON subjects.subjectid = schedules.subjectid
			WHERE subjects.defaultyear = :year");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			
			$sections = array();
			foreach($stmt->fetchAll() as $row) { 
				array_push($sections, $row['section']);
			}
			
			foreach($sections as $key=>$section) {
				echo $section;
			}
			
			echo '
			<script>
			$(document).ready(function () {
			var $timetable3 = $("#timetable' . $x . '").jqs({mode: "read",hour: 12, days: ["MON","TUE","WED","THU","FRI","SAT","SUN"], periodTextColor: "#fff",periodDuration: 30,
			data: [{day: 0, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.mon = 1 ORDER BY TIME(schedules.starttime) ASC");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 1, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.tue = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 2, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.wed = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 3, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.thu = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']},
			{day: 4, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.fri = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			//saturday
			echo ']},
			{day: 5, periods: [';
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
				LEFT JOIN `subjects`
				ON schedules.subjectid = subjects.subjectid
				WHERE subjects.defaultyear=:year AND schedules.sat = 1");
			$stmt -> bindParam(':year', $x);
			$stmt->execute();
			$arrayres = $stmt->fetchAll();
			$lastrow = end($arrayres);
			foreach(($arrayres) as $row) { 
				//last row
				if($row == $lastrow) {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"}';
				} else {
				echo '{start: "' . $row['starttime'] . '", end: "' . $row['endtime'] . '", title: "' . $row['coursecode'] . '"},';
				}
			}
			echo ']}]});
			});
			</script>';
		}
		$conn = null;
	?>