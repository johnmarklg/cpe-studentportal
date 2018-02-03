<?php	
	function showSoA($studnum) {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		
		$conn = getDB('cpe-studentportal');	
		//get whole data
		$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable AS (SELECT studnum, surname, firstname, middlename, yearstarted FROM students WHERE studnum=:studnum)");
		$stmt -> bindParam(':studnum', $studnum);
		$stmt->execute();
		
		//Student Info
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-primary\">
		<div class=\"panel-heading\" style=\"text-align: center;\">Statement of Accounts</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tableinfo\" class=\"table\">";
		$stmt = $conn->prepare("SELECT studnum,surname,firstname,middlename, yearstarted from temptable");
		$tableheader = false;
		$stmt->execute();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				if (date('m') > 7) {
					$fifthyear = date('y') - 4; 
				} else { //if second semester
					$fifthyear = date('y') - 5;
				}
				
				$yearlevel = $fifthyear - $row['yearstarted'] + 5;
				echo '<tr><th>Student Number</th><th>Surname</th><th>First Name</th><th>Middle Name (or M.I.)</th><th>Year Level</th></tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $key=>$value) {
				if ($key=='yearstarted'){
					echo "<td>{$yearlevel}</td>";
				} else {
					echo "<td>{$value}</td>";
				}
			}
			echo "</tr>";
		}
		echo '</table></div>
		<hr/>
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table id="tablesettled" class="table">
						<thead>
							<tr>
								<th>Invoice Title</th>
								<th>Amount Paid</th>
							<tr>
						<tbody>
							<tr>
								<td>okay</td>
								<td>1234</td>
							<tr>
						</tbody>
					</table>
				</div>
			</div>
		</div></div></div></div></div></div>';
		
		
		$conn = null;
		echo '</div>';
	}
?>