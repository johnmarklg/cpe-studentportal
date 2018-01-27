			  <?php	
			  function showStudentRecords($studnum) {			

				require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
			  
					//STUDENT INFO
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-primary\"><div class=\"panel-heading\">Student Info</div><div class=\"panel-body\"><div class=\"table-responsive\">
								<table id=\"studentinfo\" class=\"table\">
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
												echo "<td>" . $row['surname'] . "</td>
														  <td>" . $row['firstname'] . "</td>
														  <td>" . $row['middlename'] . "</td>
														  <td>" . $row['studnum'] . "</td>";
											}
									
									echo '</tr></tbody></table></div>
									<div class="table-responsive">
										<table id="studentdata" class="table table-bordered">
											<thead>
												<tr>
													<th><i>Personal Data</i></th>
													<th>Note: Follow the specified format for Birthdate.</th>
												</tr>
											</thead>
											<tbody>
												<tr>
												  <th>Residential Address</th>
													<td id="address" >' . $row['Address'] . '</td>
												</tr>
												<tr>
													<th>Contact Number</th>
													<td id="contactnum" >'  . $row['ContactNo'] . '</td>
												</tr>
												<tr>
												  <th>Date of Birth (YYYY-MM-DD)</th>
													<td id="birthdate" >' . $row['DateOfBirth'] . '</td>
												</tr>
												<tr>
												  <th>Place of Birth</th>
													<td id="birthplace" >' . $row['PlaceOfBirth'] . '</td>
												</tr>
												<tr>
													<th>Citizenship</th>
													<td id="citizenship" >' . $row['Citizenship'] . '</td>
												</tr>
												<tr>
													<th>Status</th>
													<td id="status" >'  . $row['Status'] . '</td>
												</tr>
												<tr>
													<th>Gender</th>
													<td id="gender" >'  . $row['Gender'] . '</td>
												</tr>
												<tr>
													<th>Father\'s Name</th>
													<td id="fathername" >'  . $row['Father'] . '</td>
												</tr>
												<tr>
													<th>Father\'s Occupation</th>
													<td id="fatheroccupation" >'  . $row['FatherOccupation'] . '</td>
												</tr>
												<tr>
													<th>Mother\'s Name</th>
													<td id="mothername" >'  . $row['Mother'] . '</td>
												</tr>
												<tr>
													<th>Mother\'s Occupation</th>
													<td id="motheroccupation" >'  . $row['MotherOccupation'] . '</td>
												</tr>
												<tr>
													<th>School Name - Elementary</th>
													<td id="elementary" >'  . $row['Elementary'] . '</td>
												</tr>
												<tr>
													<th>Address - Elementary</th>
													<td id="elemaddress" >' . $row['ElemAddress'] . '</td>
												</tr>
												<tr>
													<th>Year Graduated - Elementary</th>
													<td id="elemgrad" >'  . $row['ElemGraduate'] . '</td>
												</tr>
												<tr>
													<th>School Name - Secondary</th>
													<td id="secondary" >'  . $row['Secondary'] . '</td>
												</tr>
												<tr>
													<th>Address - Secondary</th>
													<td id="secaddress" >'  . $row['SecAddress'] . '</td>
												</tr>
												<tr>
													<th>Year Graduated - Secondary</th>
													<td id="secgrad" >'  . $row['SecGraduate'] . '</td>
												</tr>
											</tbody>
										</table>
									</div></div></div>';
								  
								  
					echo '<div class="panel panel-default">
								<div class="panel-heading" style="text-align: center;" id="myTabs">	
									<ul class="nav nav-pills nav-justified">
										<li class="active">
										<a  href="#1" data-toggle="tab">First Year</a>
										</li>
										<li><a href="#2" data-toggle="tab">Second Year</a>
										</li>
										<li><a href="#3" data-toggle="tab">Third Year</a>
										</li>
										<li><a href="#4" data-toggle="tab">Fourth Year</a>
										</li>
										<li><a href="#5" data-toggle="tab">Fifth Year</a>
										</li>
										<li><a  id="tabAll" href="#0" data-toggle="tab">Show All</a>
										</li>
									</ul>
								</div>
							</div>';
							
					//REMAKE Student Grades
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable AS (SELECT * FROM `grades` LEFT JOIN subjects ON subjects.subjectid = grades.courseid WHERE grades.studnum = :studnum)");
					$stmt -> bindParam(':studnum', $studnum);
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					//1ST YEAR
					$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 1 AND defaultsemester = 1");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="active tab-pane" id="1"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 1st Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades1-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div>';
					
					$stmt = $conn->prepare("SELECT * from temptable WHERE  defaultyear = 1 AND defaultsemester = 2");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 1st Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades1-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div></div>';
					
					//2ND YEAR
					$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 2 AND defaultsemester = 1");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="active tab-pane" id="2"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 2nd Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades2-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div>';
					
					$stmt = $conn->prepare("SELECT * from temptable WHERE  defaultyear = 2 AND defaultsemester = 2");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 2nd Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades2-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div></div>';
					
					//3RD YEAR
					$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 3 AND defaultsemester = 1");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="active tab-pane" id="3"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 3rd Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades3-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div>';
					
					$stmt = $conn->prepare("SELECT * from temptable WHERE  defaultyear = 3 AND defaultsemester = 2");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 3rd Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades3-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div></div>';
					
					//4TH YEAR
					$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 4 AND defaultsemester = 1");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="active tab-pane" id="4"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 4th Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades4-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div>';
					
					$stmt = $conn->prepare("SELECT * from temptable WHERE  defaultyear = 4 AND defaultsemester = 2");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 4th Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades4-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div>';
					
					$stmt = $conn->prepare("SELECT * from temptable WHERE  defaultyear = 4 AND defaultsemester = 3");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 4th Year - Mid Year/Summer</div>
					<div class="panel-body"><div class="table-responsive"><table id="gradesmid" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div></div>';
					
					//5TH YEAR
					$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 5 AND defaultsemester = 1");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="active tab-pane" id="5"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 5th Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades5-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div>';
					
					$stmt = $conn->prepare("SELECT * from temptable WHERE  defaultyear = 5 AND defaultsemester = 2");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 5th Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades5-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div  style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['code'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['coursetitle'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['units'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['prerequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['corequisite'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;">' . $row['year'] . '</div></td>';
						echo '<td><div style="font-size: 0px" style="width: 100%; height: 100%;">' . $row['courseid'] . '</div></td>';
						echo '</tr>';
					}
					echo '</tbody></table></div></div></div></div></div></div>';
					
					echo '</div><!--/tabcontent-->';
			  }
?>