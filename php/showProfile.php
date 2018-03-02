			  <?php	
			  function showStudentRecords($studnum) {			

				require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
			  
					//STUDENT PROLFIE
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-primary\"><div class=\"panel-heading\">Student Profile</div><div class=\"panel-body\"><div class=\"table-responsive\">
								<table id=\"studentinfo\" class=\"table table-bordered\">
								  <thead>
									<tr>
									  <th>Surname</th>
									  <th>First Name</th>
									  <th>Middle Name</th>
									  <th>Student Number</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>";

											$conn = getDB('cpe-studentportal');
											$stmt = $conn->prepare("SELECT * FROM students WHERE `studnum` = :studnum");
											$stmt -> bindParam(':studnum', $studnum);
											$stmt->execute();

											$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

								foreach(($stmt->fetchAll()) as $row) { 
									echo '<td contentEditable>' . $row['surname'] . '</td>
											  <td contentEditable>' . $row['firstname'] . '</td>
											  <td contentEditable>' . $row['middlename'] . '</td>
											  <td style="background-color: #eee;" id="studnum">' . $row['studnum'] . '</td>';
											
									
									echo '</tr></tbody></table></div>
									<div class="table-responsive">
										<table id="studentdata" class="table table-bordered">
											<thead>
												<tr>
													<th><i>Personal Info</i></th>
													<th>Note: Follow the specified format for Birthdate.</th>
												</tr>
											</thead>
											<tbody>
												<tr>
												  <th>Residential Address</th>
													<td contentEditable id="address" >' . $row['Address'] . '</td>
												</tr>
												<tr>
													<th>Contact Number</th>
													<td contentEditable id="contactnum" >'  . $row['ContactNo'] . '</td>
												</tr>
												<tr>
												  <th>Date of Birth (YYYY-MM-DD)</th>
													<td contentEditable id="birthdate" >' . $row['DateOfBirth'] . '</td>
												</tr>
												<tr>
												  <th>Place of Birth</th>
													<td contentEditable id="birthplace" >' . $row['PlaceOfBirth'] . '</td>
												</tr>
												<tr>
													<th>Citizenship</th>
													<td contentEditable id="citizenship" >' . $row['Citizenship'] . '</td>
												</tr>
												<tr>
													<th>Status</th>
													<td contentEditable id="status" >'  . $row['Status'] . '</td>
												</tr>
												<tr>
													<th>Gender</th>
													<td contentEditable id="gender" >'  . $row['Gender'] . '</td>
												</tr>
												<tr>
													<th>Father\'s Name</th>
													<td contentEditable id="fathername" >'  . $row['Father'] . '</td>
												</tr>
												<tr>
													<th>Father\'s Occupation</th>
													<td contentEditable id="fatheroccupation" >'  . $row['FatherOccupation'] . '</td>
												</tr>
												<tr>
													<th>Mother\'s Name</th>
													<td contentEditable id="mothername" >'  . $row['Mother'] . '</td>
												</tr>
												<tr>
													<th>Mother\'s Occupation</th>
													<td contentEditable id="motheroccupation" >'  . $row['MotherOccupation'] . '</td>
												</tr>
												<tr>
													<th>School Name - Elementary</th>
													<td contentEditable id="elementary" >'  . $row['Elementary'] . '</td>
												</tr>
												<tr>
													<th>Address - Elementary</th>
													<td contentEditable id="elemaddress" >' . $row['ElemAddress'] . '</td>
												</tr>
												<tr>
													<th>Year Graduated - Elementary</th>
													<td contentEditable id="elemgrad" >'  . $row['ElemGraduate'] . '</td>
												</tr>
												<tr>
													<th>School Name - Secondary</th>
													<td contentEditable id="secondary" >'  . $row['Secondary'] . '</td>
												</tr>
												<tr>
													<th>Address - Secondary</th>
													<td contentEditable id="secaddress" >'  . $row['SecAddress'] . '</td>
												</tr>
												<tr>
													<th>Year Graduated - Secondary</th>
													<td contentEditable id="secgrad" >'  . $row['SecGraduate'] . '</td>
												</tr>
											</tbody>
										</table>
									</div></div>';
								}
										
									echo '<div class="panel-footer"><button id="updateStudentProfile" class="btn btn-primary btn-block"><i class="fa fa-fw fa-save"></i> Save Changes</button></div></div>';
			  }
?>