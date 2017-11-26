			  <?php	
			  function listGrades() {
				  
					require('php/databaseConnectionTimetable.php');
					
					
					if(isset($_REQUEST["search-table"]))
					{
						if($_REQUEST["stud-num"]=="") {
								$studnum = "00-0000";
						}
						else {
						$studnum = ($_REQUEST["stud-num"]);
						}
					}
					else {
						$studnum = "00-0000";
					}
					
					if ($result = mysqli_query($con, "SHOW TABLES LIKE '". $studnum . "'")) {
						//if it doesn't exist
						if($result->num_rows == 0) {
							$studnum = "00-0000";
						}
					}
					
					$result = mysqli_query($con,"SELECT * FROM `students`");
					echo "<div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
								<div class=\"android-screens mdl-grid centeritems\">
								<div class=\"mdl-layout-spacer\"></div>
									<form method=\"post\">
										<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
											<input class=\"mdl-textfield__input search\" type=\"text\" id=\"filter-table\">
											<label class=\"mdl-textfield__label\" for=\"filter-table\">Filter Student Table</label>
										</div>
									</form>
								<div class=\"mdl-layout-spacer\"></div>
							   </div>
								<div class=\"mdl-layout-spacer\"></div>
								<table id=\"studentinfo\" class=\"mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp\">
								  <thead>
									<tr>
									<th style=\"font-size: 0px\"class=\"mdl-data-table__cell--non-numeric\">Old Student Number</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"Surname\">Surname</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"FirstName\">First Name</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"MiddleName\">Middle Name</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"StudentNumber\">Student Number</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"CFATScore\">CFAT Score</th>
									  <th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"material-icons\">add_circle_outline</i></th>
									  <th style=\"font-size: 0px\"class=\"mdl-data-table__cell--non-numeric\">ID</th>
									</tr>
								  </thead>
								  <tbody class=\"list\">";
									
									
									while($row = mysqli_fetch_array($result)) {
										echo "<tr><td contentEditable style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\" id=\"id\">" . $row['studnum'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric Surname\" id=\"surname\">" . $row['surname'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric FirstName\" id=\"firstname\">" . $row['firstname'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric MiddleName\" id=\"middlename\">" . $row['middlename'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric StudentNumber\" id=\"studnum\">" . $row['studnum'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric CFATScore\" id=\"cfat\">" . $row['cfatscore'] . "</td>
									  <td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"material-icons\">remove_circle_outline</i></td>
									  <td contentEditable style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\" id=\"id\">" . $row['id'] . "</td></tr>	";
									}
									echo "
								  </tbody>
								</table>
								<div class=\"mdl-layout-spacer\"></div>
								</div>";

					
					echo "<script>
							var options = {
										valueNames: ['Surname', 'FirstName', 'MiddleName', 'StudentNumber', 'CFATScore']
								};
							var studentTable = new List('students-table', options);

							</script>";
					mysqli_close($con);
			  }
?>