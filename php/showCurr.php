<?php	
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		$currid = $_POST['currid'];
		$currname = $_POST['currname'];
			
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT subjects.*, curriculum.name from subjects LEFT JOIN curriculum ON curriculum.id=subjects.curriculumID WHERE curriculumID=:currid ORDER BY subjectid ASC, defaultyear ASC, defaultsemester ASC");
		$stmt -> bindParam(':currid', $currid);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		echo '<div class="row currdiv"><div class="col-lg-12"><div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center;">' . $currname . '</div><div class="panel-body"><div class="table-responsive">
		<table id="currtable" class="table table-bordered">
		<thead>
		<tr>
		<th>Subject ID</th>
		<th>Year</th>
		<th>Semester</th>
		<th>Course Code</th>
		<th>Course Title</th>
		<th>Units</th>
		<th>Pre-Requisite</th>
		<th>Co-Requisite</th>
		<th>Year Requirement</th>
		<th><button class="entry-add btn btn-primary"><i class="fa fa-fw fa-plus"></i> Add</button></th>
		<th style="font-size:0;"></th>
		</tr>
		</thead>
		<tbody>';

		
		foreach(($stmt->fetchAll()) as $row) { 
			echo '<tr id="'. $row['subjectid']. '">
			<td class="subjectid">' . $row['subjectid'] . '</td>
			<td class="defaultyear" contentEditable>' . $row['defaultyear'] . '</td>
			<td class="defaultsemester" contentEditable>' . $row['defaultsemester'] . '</td>
			<td class="coursecode" contentEditable>' . $row['coursecode'] . '</td>
			<td class="coursetitle" contentEditable>' . $row['coursetitle'] . '</td>
			<td class="units" contentEditable>' . $row['units'] . '</td>
			<td class="prerequisite" contentEditable>' . $row['prerequisite'] . '</td>
			<td class="corequisite" contentEditable>' . $row['corequisite'] . '</td>
			<td class="year" contentEditable>' . $row['year'] . '</td>
			<td><button class="entry-update btn btn-primary"><span><i class="fa fa-fw fa-edit"></i> Update</span></button></td>
			<td><button class="entry-remove btn btn-danger"><span><i class="fa fa-fw fa-remove"></i> Delete</span></button></td></tr>';
		}
		$conn = null;

		echo '<tr class="hide" style="display:none;">
		<td class="subjectid"></td>
		<td class="defaultyear" contentEditable></td>
		<td class="defaultsemester" contentEditable></td>
		<td class="coursecode" contentEditable></td>
		<td class="coursetitle" contentEditable ></td>
		<td class="units" contentEditable ></td>
		<td class="prerequisite" contentEditable ></td>
		<td class="corequisite" contentEditable ></td>
		<td class="year" contentEditable ></td>
		<td><button class="entry-update btn btn-primary"><span><i class="fa fa-fw fa-save"></i> Save</span></button></td>
		<td><button class="entry-remove btn btn-danger"><span><i class="fa fa-fw fa-remove"></i> Delete</span></button></td></tr>
		</tbody></table></div></div></div></div>';
		
		print $currid;
?>