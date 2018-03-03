<?php	
	function showProfileReq() {			

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		$conn = getDB('cpe-studentportal');		  
		//check for any requests
		$stmt = $conn->prepare("SELECT requestid FROM profilerequest WHERE approvalstatus = 0");
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		//check if any entry/record exists, if not
		if (!($result)) {
			echo '<div class="alert alert-info" role="alert">
			 <i class="fa fa-fw fa-info-circle"></i> There are currently no profile update requests.
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div>';
		} else {
			$stmt = $conn->prepare("SELECT profilerequest.*,
			students.studnum as oldstudnum,
			students.surname as oldsurname,
			students.firstname as oldfirstname,
			students.middlename as oldmiddlename,
			students.Gender as oldGender,
			students.Status as oldStatus,
			students.Citizenship as oldCitizenship,
			students.DateOfBirth as oldDateOfBirth,
			students.PlaceOfBirth as oldPlaceOfBirth,
			students.ContactNo as oldContactNo,
			students.Address as oldAddress,
			students.Father as oldFather,
			students.FatherOccupation as oldFatherOccupation,
			students.Mother as oldMother,
			students.MotherOccupation as oldMotherOccupation,
			students.Elementary as oldElementary,
			students.ElemAddress as oldElemAddress,
			students.ElemGraduate as oldElemGraduate,
			students.Secondary as oldSecondary,
			students.SecAddress as oldSecAddress,
			students.SecGraduate as oldSecGraduate
			FROM profilerequest
			LEFT JOIN students
			ON profilerequest.studnum = students.studnum
			WHERE approvalstatus = 0");
			$stmt->execute();
			foreach(($stmt->fetchAll()) as $row) { 
			echo '<div class="row"><div class="col-lg-12"><div id="'. $row['oldstudnum']. '" class="panel panel-info"><div class="panel-heading"><strong>' . $row['oldstudnum'] . '</strong> - ' . $row['oldsurname'] . ', ' . $row['oldfirstname'] . ' ' . $row['oldmiddlename'] . '</div><div class="panel-body">
						<div hidden id="cache' . $row['oldstudnum'] . '">
							<p id="cachestudnum' . $row['requestid']. '">' . $row['oldstudnum'] . '</p>
							<p id="cachesurname' . $row['requestid']. '">' . $row['oldsurname'] . '</p>
							<p id="cachefirstname' . $row['requestid']. '">' . $row['oldfirstname'] . '</p>
							<p id="cachemiddlename' . $row['requestid']. '">' . $row['oldmiddlename'] . '</p>
							<p id="cacheGender' . $row['requestid']. '">' . $row['oldGender'] . '</p>
							<p id="cacheStatus' . $row['requestid']. '">' . $row['oldStatus'] . '</p>
							<p id="cacheCitizenship' . $row['requestid']. '">' . $row['oldCitizenship'] . '</p>
							<p id="cacheDateOfBirth' . $row['requestid']. '">' . $row['oldDateOfBirth'] . '</p>
							<p id="cachePlaceOfBirth' . $row['requestid']. '">' . $row['oldPlaceOfBirth'] . '</p>
							<p id="cacheContactNo' . $row['requestid']. '">' . $row['oldContactNo'] . '</p>
							<p id="cacheAddress' . $row['requestid']. '">' . $row['oldAddress'] . '</p>
							<p id="cacheFather' . $row['requestid']. '">' . $row['oldFather'] . '</p>
							<p id="cacheFatherOccupation' . $row['requestid']. '">' . $row['oldFatherOccupation'] . '</p>
							<p id="cacheMother' . $row['requestid']. '">' . $row['oldMother'] . '</p>
							<p id="cacheMotherOccupation' . $row['requestid']. '">' . $row['oldMotherOccupation'] . '</p>
							<p id="cacheElementary' . $row['requestid']. '">' . $row['oldElementary'] . '</p>
							<p id="cacheElemAddress' . $row['requestid']. '">' . $row['oldElemAddress'] . '</p>
							<p id="cacheElemGraduate' . $row['requestid']. '">' . $row['oldElemGraduate'] . '</p>
							<p id="cacheSecondary' . $row['requestid']. '">' . $row['oldSecondary'] . '</p>
							<p id="cacheSecAddress' . $row['requestid']. '">' . $row['oldSecAddress'] . '</p>
							<p id="cacheSecGraduate' . $row['requestid']. '">' . $row['oldSecGraduate'] . '</p>
						</div>
						<div class="table-responsive">
						<table id="table' . $row['requestid']. '" class="table table-bordered">
							<thead>
								<tr>
									<th><i>Personal Info</i></th>
									<th>Old Data</th>
									<th>New Data</th>
								</tr>
							</thead>
							<tbody>';
								if ($row['oldstudnum'] != $row['studnum']) {
									echo '<tr>
								  <th>Student Number</th>
									<td  id="oldstudnum' . $row['requestid'] . '" >' . $row['oldstudnum'] . '</td>
									<td  id="studnum' . $row['requestid'] . '" >' . $row['studnum'] . '</td>
								</tr>';
								}
								if ($row['oldsurname'] != $row['surname']) {
									echo '<tr>
								  <th>Surname</th>
									<td  id="oldsurname' . $row['requestid'] . '" >' . $row['oldsurname'] . '</td>
									<td  id="surname' . $row['requestid'] . '" >' . $row['surname'] . '</td>
								</tr>';
								}
								if ($row['oldfirstname'] != $row['firstname']) {
									echo '<tr>
								  <th>First Name</th>
									<td  id="oldfirstname' . $row['requestid'] . '" >' . $row['oldfirstname'] . '</td>
									<td  id="firstname' . $row['requestid'] . '" >' . $row['firstname'] . '</td>
								</tr>';
								}
								if ($row['oldmiddlename'] != $row['middlename']) {
									echo '<tr>
								  <th>Middle Name</th>
									<td  id="oldmiddlename' . $row['requestid'] . '" >' . $row['oldmiddlename'] . '</td>
									<td  id="middlename' . $row['requestid'] . '" >' . $row['middlename'] . '</td>
								</tr>';
								}
								if ($row['oldAddress'] != $row['Address']) {
									echo '<tr>
								  <th>Residential Address</th>
									<td  id="oldAddress' . $row['requestid'] . '" >' . $row['oldAddress'] . '</td>
									<td  id="Address' . $row['requestid'] . '" >' . $row['Address'] . '</td>
								</tr>';
								}
								if ($row['oldContactNo'] != $row['ContactNo']) {
									echo '<tr>
									<th>Contact Number</th>
									<td  id="OldContactNo' . $row['requestid'] . '" >' . $row['oldContactNo'] . '</td>
									<td  id="ContactNo' . $row['requestid'] . '" >' . $row['ContactNo'] . '</td>
								</tr>';
								}
								if ($row['oldDateOfBirth'] != $row['DateOfBirth']) {
									echo '<tr>
								  <th>Date of Birth (YYYY-MM-DD)</th>
									<td  id="oldDateOfBirth' . $row['requestid'] . '" >' . $row['oldDateOfBirth'] . '</td>
									<td  id="DateOfBirth' . $row['requestid'] . '" >' . $row['DateOfBirth'] . '</td>
								</tr>';
								}
								if ($row['oldPlaceOfBirth'] != $row['PlaceOfBirth']) {
									echo '<tr>
								  <th>Place of Birth</th>
									<td  id="oldPlaceOfBirth' . $row['requestid'] . '" >' . $row['oldPlaceOfBirth'] . '</td>
									<td  id="PlaceOfBirth' . $row['requestid'] . '" >' . $row['PlaceOfBirth'] . '</td>
								</tr>';
								}
								if ($row['oldCitizenship'] != $row['Citizenship']) {
									echo '<tr>
									<th>Citizenship</th>
									<td  id="oldCitizenship' . $row['requestid'] . '" >' . $row['oldCitizenship'] . '</td>
									<td  id="Citizenship' . $row['requestid'] . '" >' . $row['Citizenship'] . '</td>
								</tr>';
								}
								if ($row['oldStatus'] != $row['Status']) {
									echo '<tr>
									<th>Status</th>
									<td  id="oldStatus' . $row['requestid'] . '" >' . $row['oldStatus'] . '</td>
									<td  id="Status' . $row['requestid'] . '" >' . $row['Status'] . '</td>
								</tr>';
								}
								if ($row['oldGender'] != $row['Gender']) {
									echo '<tr>
									<th>Gender</th>
									<td  id="oldGender' . $row['requestid'] . '" >' . $row['oldGender'] . '</td>
									<td  id="Gender' . $row['requestid'] . '" >' . $row['Gender'] . '</td>
								</tr>';
								}
								if ($row['oldFather'] != $row['Father']) {
									echo '<tr>
									<th>Father\'s Name</th>
									<td  id="oldFather' . $row['requestid'] . '" >' . $row['oldFather'] . '</td>
									<td  id="Father' . $row['requestid'] . '" >' . $row['Father'] . '</td>
								</tr>';
								}
								if ($row['oldFatherOccupation'] != $row['FatherOccupation']) {
									echo '<tr>
									<th>Father\'s Occupation</th>
									<td  id="oldFatherOccupation' . $row['requestid'] . '" >' . $row['oldFatherOccupation'] . '</td>
									<td  id="FatherOccupation' . $row['requestid'] . '" >' . $row['FatherOccupation'] . '</td>
								</tr>';
								}
								if ($row['oldMother'] != $row['Mother']) {
									echo '<tr>
									<th>Mother\'s Name</th>
									<td  id="oldMother' . $row['requestid'] . '" >' . $row['oldMother'] . '</td>
									<td  id="Mother' . $row['requestid'] . '" >' . $row['Mother'] . '</td>
								</tr>';
								}
								if ($row['oldMotherOccupation'] != $row['MotherOccupation']) {
									echo '<tr>
									<th>Mother\'s Occupation</th>
									<td  id="oldMotherOccupation' . $row['requestid'] . '" >' . $row['oldMotherOccupation'] . '</td>
									<td  id="MotherOccupation' . $row['requestid'] . '" >' . $row['MotherOccupation'] . '</td>
								</tr>';
								}
								if ($row['oldElementary'] != $row['Elementary']) {
									echo '<tr>
									<th>School Name - Elementary</th>
									<td  id="oldElementary' . $row['requestid'] . '" >' . $row['oldElementary'] . '</td>
									<td  id="Elementary' . $row['requestid'] . '" >' . $row['Elementary'] . '</td>
								</tr>';
								}
								if ($row['oldElemAddress'] != $row['ElemAddress']) {
									echo '<tr>
									<th>Address - Elementary</th>
									<td  id="oldElemAddress' . $row['requestid'] . '" >' . $row['oldElemAddress'] . '</td>
									<td  id="ElemAddress' . $row['requestid'] . '" >' . $row['ElemAddress'] . '</td>
								</tr>';
								}
								if ($row['oldElemGraduate'] != $row['ElemGraduate']) {
									echo '<tr>
									<th>Year Graduated - Elementary</th>
									<td  id="oldElemGraduate' . $row['requestid'] . '" >' . $row['oldElemGraduate'] . '</td>
									<td  id="ElemGraduate' . $row['requestid'] . '" >' . $row['ElemGraduate'] . '</td>
								</tr>';
								}
								if ($row['oldSecondary'] != $row['Secondary']) {
									echo '<tr>
									<th>School Name - Secondary</th>
									<td  id="oldSecondary' . $row['requestid'] . '" >' . $row['oldSecondary'] . '</td>
									<td  id="Secondary' . $row['requestid'] . '" >' . $row['Secondary'] . '</td>
								</tr>';
								}
								if ($row['oldSecAddress'] != $row['SecAddress']) {
									echo '<tr>
									<th>Address - Secondary</th>
									<td  id="oldSecAddress' . $row['requestid'] . '" >' . $row['oldSecAddress'] . '</td>
									<td  id="SecAddress' . $row['requestid'] . '" >' . $row['SecAddress'] . '</td>
								</tr>';
								}
								if ($row['oldSecGraduate'] != $row['SecGraduate']) {
									echo '<tr>
									<th>Year Graduated - Secondary</th>
									<td  id="oldSecGraduate' . $row['requestid'] . '" >' . $row['oldSecGraduate'] . '</td>
									<td  id="SecGraduate' . $row['requestid'] . '" >' . $row['SecGraduate'] . '</td>
								</tr>';
								}
							echo '</tbody>
						</table>
					</div></div><div class="panel-footer"><button name="'. $row['oldstudnum']. '" id="'. $row['requestid']. '" class="btnApproveChange btn btn-block btn-success"><i class="fa fa-fw fa-check"></i> Approve Change(s)</button></div></div></div></div>';
				}
			}
		}
?>