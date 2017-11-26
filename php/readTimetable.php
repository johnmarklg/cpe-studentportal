			  <?php	
			  function listTimetable() {
				  
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "cpe-timetables";
					
						
						
					//$result = mysqli_query($con,"SELECT * FROM `subjectlist`");
					echo "<div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
								<div class=\"mdl-layout-spacer\"></div>
										<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
											<input class=\"search mdl-textfield__input\" type=\"text\" id=\"filter-table\">
											<label class=\"mdl-textfield__label\" for=\"filter-table\">Filter Year or Section</label>
										</div>
								<div class=\"mdl-layout-spacer\"></div>
							   </div>
								<div class=\"mdl-layout-spacer\"></div>
								<table id=\"timetable\" class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
								  <thead>
									<tr>
									  <th style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">ID</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"year\">Year</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"section\">Section</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">Code</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">Subject Section</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">Start Time</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">End Time</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">Days</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">Building</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">Room Number</th>
									  <th class=\"mdl-data-table__cell--non-numeric\" \">Instructor</th>
									  <th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
									</tr>
								  </thead>
								  <tbody class=\"list\">";
								  
								  try {
										$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
										$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$stmt = $conn->prepare("SELECT * from subjectlist");
										$stmt -> bindParam(':studnum', $studnum);
										$stmt->execute();
										
										// set the resulting array to associative
											$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

										foreach(($stmt->fetchAll()) as $row) { 
											echo "<tr>
								      <td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">" . $row['id'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric year\">" . $row['year'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric section\">" . $row['section'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['code'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['subjectsection'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['starttime'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['endtime'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['days'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['building'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['roomnumber'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['instructor'] . "</td>
									  <td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
										}
									}
									catch(PDOException $e) {
										echo "Error: " . $e->getMessage();
									}
									
									$conn = null;
								
									
									/*while($row = mysqli_fetch_array($result)) {
										echo "<tr>
								      <!--<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['id'] . "</td>-->
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric Year\" >" . $row['year'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric Section\" >" . $row['section'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['code'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['subjectsection'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['starttime'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['endtime'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['days'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['building'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['roomnumber'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['instructor'] . "</td>
									  <td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
									}*/
									echo "<tr class=\"hide\" style=\"display:none;\">
									<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric year\" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric section\" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
									 <td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
									echo "</tbody></table><div class=\"mdl-layout-spacer\"></div></div>";

					echo "<style>
								.table-remove:hover {
								  color: #f00;
								  cursor: pointer;
								}
								.table-add:hover {
								  cursor: pointer;
								  color: #0b0;
								}
							</style>";
					echo "<script>
								var options = {
											valueNames: ['year', 'section']
									};
								var documentTable = new List('timetable', options);
								</script>";
	  }
?>