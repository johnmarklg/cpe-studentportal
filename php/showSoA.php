<?php	
	function showSoA($studnum) {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		
		$conn = getDB('cpe-studentportal');	
		$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable AS (SELECT * FROM students WHERE studnum=:studnum)");
		$stmt -> bindParam(':studnum', $studnum);
		$stmt->execute();
		$stmt = $conn->prepare("ALTER TABLE temptable
			DROP COLUMN passcode,
			DROP COLUMN yearstarted,
			DROP COLUMN gender,
			DROP COLUMN status,
			DROP COLUMN citizenship,
			DROP COLUMN dateofbirth,
			DROP COLUMN placeofbirth,
			DROP COLUMN contactnum,
			DROP COLUMN address,
			DROP COLUMN fatheroccupation,
			DROP COLUMN father,
			DROP COLUMN mother,
			DROP COLUMN motheroccupation,
			DROP COLUMN spouse,
			DROP COLUMN spouseoccupation,
			DROP COLUMN houseaddress,
			DROP COLUMN employer,
			DROP COLUMN businessaddress,
			DROP COLUMN telnum,
			DROP COLUMN elementary,
			DROP COLUMN elemaddress,
			DROP COLUMN elemgraduate,
			DROP COLUMN secgraduate,
			DROP COLUMN secondary,
			DROP COLUMN secaddress,
			DROP COLUMN college,
			DROP COLUMN coladdress,
			DROP COLUMN colgraduate;");
		$stmt->execute();
		
		
		echo '<div class="alert alert-info" role="alert">
		  <i class="fa fa-info-circle"></i> Input the amount paid in the respective table entries. Conversely, input 0 if not the student hadn\'t paid yet.
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>';
		
		//student info
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-primary\">
		<div class=\"panel-heading\" style=\"text-align: center;\">Statement of Accounts</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tableinfo\" class=\"table\">";
		$stmt = $conn->prepare("SELECT studnum,surname,firstname,middlename from temptable");
		$tableheader = false;
		$stmt->execute();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr><th>Student Number</th><th>Surname</th><th>First Name</th><th>Middle Name (or M.I.)</th></tr>';
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
		echo '</table></div>
		<hr/>
		<div class="row">
			<div class="col-lg-6">
				<div class="table-responsive">
					<table id="tablesettled" class="table">
						<thead>
							<tr>
								<th>Description</th>
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