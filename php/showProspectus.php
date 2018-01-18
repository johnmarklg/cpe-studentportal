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
										$conn = null;
									
									echo "</tr>
								  </tbody></table></div></div></div>";
					
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
					
					echo '<div class="tab-content">';	
					//STUDENT GRADES 1-1
					echo '<div class="active tab-pane" id="1">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 1st Year - 1st Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades1-1\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id < 8");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					
					//STUDENT GRADES 1-2
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 1st Year - 2nd Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades1-2\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 7 AND subjects.id < 17");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					echo '</div>';
					
					//STUDENT GRADES 2-1
					echo '<div class="tab-pane" id="2">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 2nd Year - 1st Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades2-1\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 16 AND subjects.id < 24");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					
					//STUDENT GRADES 2-2
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 2nd Year - 2nd Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades2-2\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 23 AND subjects.id < 31");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					echo '</div>';

					//STUDENT GRADES 3-1
					echo '<div class="tab-pane" id="3">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 3rd Year - 1st Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades3-1\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 30 AND subjects.id < 38");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";

					//STUDENT GRADES 3-2
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 3rd Year - 2nd Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades3-2\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 37 AND subjects.id < 45");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					echo '</div>';
					
					//STUDENT GRADES 4-1
					echo '<div class="tab-pane" id="4">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 4th Year - 1st Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades4-1\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 44 AND subjects.id < 52");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";

					//STUDENT GRADES 4-2
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 4th Year - 2nd Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades4-2\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 51 AND subjects.id < 58");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";

					//STUDENT GRADES 4th Year SUMMER
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 4th Year - Summer/Short Term</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id = 58");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					echo '</div>';
					
					//STUDENT GRADES 5-1
					echo '<div class="tab-pane" id="5">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 5th Year - 1st Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades5-1\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 58 AND subjects.id < 66");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					
					//STUDENT GRADES 5-2
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\"><div class=\"panel-heading\">Grades Transcript: 5th Year - 2nd Semester</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"grades5-2\" class=\"table\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th>Code</th>
										<th>Course Title</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Co-Requisites</th>
										<th>Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					$conn = getDB('cpe-studentrecords');
					$stmt = $conn->prepare("SELECT * FROM `$studnum` LEFT JOIN subjects ON subjects.id = `$studnum`.courseid WHERE subjects.id > 65");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['1st'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['2nd'] . "</div></td>";
						echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['3rd'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
						echo "<td><div style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
						echo "<td><div style=\"font-size: 0px\" style=\"width: 100%; height: 100%;\">" . $row['courseid'] . "</div></td>";
						echo "</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div></div></div>";
			  }
?>