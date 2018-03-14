			  <?php	
			  function showStudentRecords($studnum) {			

				require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
					//get search result if it's clicked
					if(isset($_REQUEST["search-table"]))
					{
						//if blank, set to 00-0000
						if($_REQUEST["refid"]=="") {
								$studnum = "00-0000";
						} else {
						//set searched value to variable
						$studnum = ($_REQUEST["refid"]);
						echo '<form><button type="button" id="saveStudentRecords" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button></form>';
						}
					} else {
						//else, if studnum in URL
						if(isset($_GET['studnum'])){ 
							$studnum = $_GET['studnum'];
							echo '<form><button type="button" id="saveStudentRecords" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button></form>';
						} else { 
							//if not set to 00-0000
							$studnum='00-0000';
						}
					}
					$conn = getDB('cpe-studentportal');
					
					//check if record exists
					$stmt = $conn->prepare("SELECT * FROM students WHERE studnum = :studnum");
					$stmt -> bindParam(':studnum', $studnum);
					$stmt->execute();
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					
					//check if entry/record exists, if not
					if (!($result)) {
						$studnum = '00-0000';
					} else {
						$currid = $result['CurriculumID'];
					}
					$conn =null;
					
					$conn = getDB('cpe-studentportal');
										
						
					//STUDENT INFO
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-primary\"><div class=\"panel-heading\">Student Info</div><div class=\"panel-body\">
								<div class=\"table-responsive\">
									<div class=\"alert alert-info\" role=\"alert\">
									  <i class=\"fa fa-info-circle\"></i> Leaving the Passcode and Year Level empty will automatically generate values for them.
									</div>";
					echo '<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Curriculum</span>
								<div class="form-group curriculum">
								  <select class="form-control" id="curriculum" onclick="curr_cache=this.value;">';
									
										require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
										$stmt = $conn->prepare("SELECT COALESCE(students.studnum, 0), 
										curriculum.*,
										students.CurriculumID as currid
										FROM `students`
										LEFT JOIN curriculum
										ON students.studnum=:studnum
										WHERE students.studnum=:studnum");
										$stmt -> bindParam(':studnum', $studnum);
										$stmt->execute();
										
										foreach(($stmt->fetchAll()) as $row) { 
												if(($row['id']) === ($row['currid'])) {
													echo '<option selected ';
												} else {
													echo '<option ';
												}
												echo 'value="' . $row['id'] . '">' . $row['name'] . '</option>';
										}
										
								  echo '</select>
								</div>
							</div><br/>';		
					echo '<table id="studentinfo" class="table"><thead><tr><th style="font-size: 0px">Old Student Number</th><th>Surname</th><th>First Name</th>
							<th>Middle Name</th><th>Student Number</th><th>Passcode</th><th>Year Level</th></tr></thead><tbody><tr>';

											$stmt = $conn->prepare("SELECT students.*, curriculum.name as currname FROM students LEFT JOIN curriculum ON students.CurriculumID = curriculum.id WHERE `studnum` = :studnum");
											$stmt -> bindParam(':studnum', $studnum);
											$stmt->execute();

											//if first semester
											if (date('m') > 7) {
												$fifthyear = date('y') - 4; 
											} else { //if second semester
												$fifthyear = date('y') - 5;
											}
											

											foreach(($stmt->fetchAll()) as $row) { 
												if($studnum=="00-0000") {
													$yearlevel = "";
													$printstudnum = "";
												} else {
													$yearlevel = $fifthyear - $row['yearstarted'] + 5;
													$printstudnum = $row['studnum'];
												}
												echo '<td style="font-size: 0px" id="oldstudnum">' . $row['studnum'] . '</td>
														  <td id="surname" contentEditable>' . $row['surname'] . '</td>
														  <td id="firstname" contentEditable>' . $row['firstname'] . '</td>
														  <td id="middlename" contentEditable>' . $row['middlename'] . '</td>
														  <td contentEditable id="studnum">' . $printstudnum . '</td>
														  <td contentEditable>' . $row['passcode'] . '</td>
														  <td  contentEditable>' . $yearlevel . '</td>';
														  
									echo '</tr></tbody></table></div></div>
									<div class="panel-footer">
										<form action="/functions/generateprospectus.php" method="post" enctype="multipart/form-data">
										<input type="hidden" name="studnum" id="studnum" value="'. $row['studnum'] . '"></input>
										<input type="hidden" name="currid" id="currid" value="'. $row['CurriculumID'] . '"></input>
										<input type="hidden" name="surname" id="surname" value="'. $row['surname'] . '"></input>
										<input type="hidden" name="firstname" id="firstname" value="'. $row['firstname'] . '"></input>
										<input type="hidden" name="middlename" id="middlename" value="'. $row['middlename'] . '"></input>
										<input type="hidden" name="currname" id="currname" value="'. $row['currname'] . '"></input>
										<input type="submit" value="Prospectus" class="btn btn-primary btn-block"></input>
										</form>
										<hr style="margin: 5px;"/>
										<a class="btn btn-primary btn-block" href="#studdata" data-toggle="collapse"><i class="fa fa-fw fa-file"></i> Student Profile</a>  										  
									</div></div>';
									
									echo '<div id="studdata" class="collapse table-responsive">
										<table id="studentdata" class="table table-bordered">
											<thead>
												<tr>
													<th>Personal Datasheet</th>
													<th>Note: Follow the specified format for Birthdate.</th>
												</tr>
											</thead>
											<tbody>
												<tr>
												  <th>Residential Address</th>
													<td id="address" contentEditable>' . $row['Address'] . '</td>
												</tr>
												<tr>
													<th>Contact Number</th>
													<td id="contactnum" contentEditable>'  . $row['ContactNo'] . '</td>
												</tr>
												<tr>
												  <th>Date of Birth (YYYY-MM-DD)</th>
													<td id="birthdate" contentEditable>' . $row['DateOfBirth'] . '</td>
												</tr>
												<tr>
												  <th>Place of Birth</th>
													<td id="birthplace" contentEditable>' . $row['PlaceOfBirth'] . '</td>
												</tr>
												<tr>
													<th>Citizenship</th>
													<td id="citizenship" contentEditable>' . $row['Citizenship'] . '</td>
												</tr>
												<tr>
													<th>Status</th>
													<td id="status" contentEditable>'  . $row['Status'] . '</td>
												</tr>
												<tr>
													<th>Gender</th>
													<td id="gender" contentEditable>'  . $row['Gender'] . '</td>
												</tr>
												<tr>
													<th>Father\'s Name</th>
													<td id="fathername" contentEditable>'  . $row['Father'] . '</td>
												</tr>
												<tr>
													<th>Father\'s Occupation</th>
													<td id="fatheroccupation" contentEditable>'  . $row['FatherOccupation'] . '</td>
												</tr>
												<tr>
													<th>Mother\'s Name</th>
													<td id="mothername" contentEditable>'  . $row['Mother'] . '</td>
												</tr>
												<tr>
													<th>Mother\'s Occupation</th>
													<td id="motheroccupation" contentEditable>'  . $row['MotherOccupation'] . '</td>
												</tr>
												<tr>
													<th>School Name - Elementary</th>
													<td id="elementary" contentEditable>'  . $row['Elementary'] . '</td>
												</tr>
												<tr>
													<th>Address - Elementary</th>
													<td id="elemaddress" contentEditable>' . $row['ElemAddress'] . '</td>
												</tr>
												<tr>
													<th>Year Graduated - Elementary</th>
													<td id="elemgrad" contentEditable>'  . $row['ElemGraduate'] . '</td>
												</tr>
												<tr>
													<th>School Name - Secondary</th>
													<td id="secondary" contentEditable>'  . $row['Secondary'] . '</td>
												</tr>
												<tr>
													<th>Address - Secondary</th>
													<td id="secaddress" contentEditable>'  . $row['SecAddress'] . '</td>
												</tr>
												<tr>
													<th>Year Graduated - Secondary</th>
													<td id="secgrad" contentEditable>'  . $row['SecGraduate'] . '</td>
												</tr>
											</tbody>
										</table>
									</div>';
									}
									$conn = null;
			if($studnum<>'00-0000') {	
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
					echo '<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> You may click the <strong>Course Code</strong> for each subject to view change history.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>';
					echo '<div class="tab-content">';	
					
					
					$conn = getDB('cpe-studentportal');
					
					$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable AS (SELECT subjects.*, 
					COALESCE(grades.courseid, subjects.subjectid) as courseid,
					COALESCE(grades.studnum, :studnum) as studnum,
					COALESCE(grades.1st, '') as `1st`,
					COALESCE(grades.2nd, '') as `2nd`,
					COALESCE(grades.3rd, '') as `3rd`
					FROM `subjects`
					LEFT JOIN `grades`
					ON subjects.subjectid = grades.courseid
					AND grades.studnum=:studnum
					WHERE subjects.curriculumID=:currid
					ORDER BY subjects.subjectid ASC)");
					$stmt -> bindParam(':studnum', $studnum);
					$stmt -> bindParam(':currid', $currid);
					$stmt->execute();
					
					//1ST YEAR
					$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 1 AND defaultsemester = 1");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					
					echo '<div class="active tab-pane" id="1"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 1st Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades1-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 1st Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades1-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="tab-pane" id="2"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 2nd Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades2-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 2nd Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades2-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="tab-pane" id="3"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 3rd Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades3-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 3rd Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades3-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="tab-pane" id="4"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 4th Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades4-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 4th Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades4-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
				
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 4th Year - Mid Year/Summer</div>
					<div class="panel-body"><div class="table-responsive"><table id="gradesmid" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="tab-pane" id="5"><div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 5th Year - 1st Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades5-1" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-success"><div class="panel-heading">Grades Transcript: 5th Year - 2nd Semester</div>
					<div class="panel-body"><div class="table-responsive"><table id="grades5-2" class="table"><thead><tr><th>1st</th><th>2nd</th><th>3rd</th><th>Code</th><th>Course Title</th>
					<th>Units</th><th>Pre-Requisites</th><th>Co-Requisites</th><th>Year</th><th style="font-size: 0px">id</th></tr></thead><tbody>';
					foreach(($stmt->fetchAll()) as $row) { 
						echo '<tr>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['1st'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['2nd'] . '</div></td>';
						echo '<td><div contentEditable style="width: 100%; height: 100%;">' . $row['3rd'] . '</div></td>';
						echo '<td><div style="width: 100%; height: 100%;"><a href="/admin/history.php?studnum=' . $studnum . '&courseid=' . $row['courseid'] . '"">' . $row['coursecode'] . '</a></div></td>';
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
					
				$conn = null;
				
			}
	}
?>