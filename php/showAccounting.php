<?php	
	function showAccounting() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//if first semester
		if (date('m') > 7) {
			$fifthyear = date('y') - 4; 
		} else { //if second semester
			$fifthyear = date('y') - 5;
		}
		
		echo '<div class="alert alert-info" role="alert">
		  <i class="fa fa-info-circle"></i> Input the amount paid in the respective table entries. Conversely, input 0 if not the student hadn\'t paid yet.
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div><div class="alert alert-warning" role="alert">
		  <i class="fa fa-exclamation-circle"></i> Saving changes in the database may take a few minutes. Please be more patient to avoid future problems.
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>';
		
		$tableheader = false;
		$conn = getDB('cpe-studentportal');	
		$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable AS (SELECT students.surname, students.firstname, students.middlename, invoices.* 
			FROM invoices
			LEFT JOIN students ON students.studnum = invoices.studnum
			WHERE students.studnum = invoices.studnum)");
		$stmt->execute();
		$stmt = $conn->prepare("ALTER TABLE temptable
			DROP COLUMN id, 
			DROP COLUMN timestamp;");
		$stmt->execute();
		
		echo '<div class="tab-content">';
		//5TH YEAR
		$stmt = $conn->prepare("SELECT * from temptable WHERE SUBSTRING(studnum,1,2) <= :fifthyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':fifthyear', $fifthyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="5">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fifth Year (<= ". $fifthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">";
		

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					echo "<th>{$key}</th>";
				}
				echo '</tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $key=>$value) {
				if ($key<>'id'&&$key<>'studnum'&&$key<>'surname'&&$key<>'firstname'&&$key<>'middlename'){
					echo "<td contentEditable>{$value}</td>";
				} else {
					echo "<td>{$value}</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table></div></div></div></div></div></div>";

		//4TH YEAR
		$fourthyear = $fifthyear + 1;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from temptable WHERE SUBSTRING(studnum,1,2) = :fourthyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':fourthyear', $fourthyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="4">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fourth Year (= ". $fourthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefourth\" class=\"table\">";

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					echo "<th>{$key}</th>";
				}
				echo '</tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $key=>$value) {
				if ($key<>'id'&&$key<>'studnum'&&$key<>'surname'&&$key<>'firstname'&&$key<>'middlename'){
					echo "<td contentEditable>{$value}</td>";
				} else {
					echo "<td>{$value}</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table></div></div></div></div></div></div>";
		
		//3RD YEAR
		$thirdyear = $fifthyear + 2;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from temptable WHERE SUBSTRING(studnum,1,2) = :thirdyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':thirdyear', $thirdyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="3">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Third Year (= ". $thirdyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablethird\" class=\"table\">";

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					echo "<th>{$key}</th>";
				}
				echo '</tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $key=>$value) {
				if ($key<>'id'&&$key<>'studnum'&&$key<>'surname'&&$key<>'firstname'&&$key<>'middlename'){
					echo "<td contentEditable>{$value}</td>";
				} else {
					echo "<td>{$value}</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table></div></div></div></div></div></div>";
		
		//2ND YEAR
		$secondyear = $fifthyear + 3;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from temptable WHERE SUBSTRING(studnum,1,2) = :secondyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':secondyear', $secondyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="2">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Second Year (= ". $secondyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablesecond\" class=\"table\">";

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					echo "<th>{$key}</th>";
				}
				echo '</tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $key=>$value) {
				if ($key<>'id'&&$key<>'studnum'&&$key<>'surname'&&$key<>'firstname'&&$key<>'middlename'){
					echo "<td contentEditable>{$value}</td>";
				} else {
					echo "<td>{$value}</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table></div></div></div></div></div></div>";
		
		//1st YEAR
		$firstyear = $fifthyear + 4;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from temptable WHERE SUBSTRING(studnum,1,2) = :firstyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':firstyear', $firstyear);
		$stmt->execute();

		echo '<div class="tab-pane active" id="1">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">First Year (= ". $firstyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefirst\" class=\"table\">";

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					echo "<th>{$key}</th>";
				}
				echo '</tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $key=>$value) {
				if ($key<>'id'&&$key<>'studnum'&&$key<>'surname'&&$key<>'firstname'&&$key<>'middlename'){
					echo "<td contentEditable>{$value}</td>";
				} else {
					echo "<td>{$value}</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table></div></div></div></div></div></div>";

		
		$conn = null;
		echo '</div>';
	}
?>