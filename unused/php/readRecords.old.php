			  <?php	
			  function listGrades() {
				  
					require('ajax/db_connection.php');
					
					
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
						if($result->num_rows == 0) {
							$studnum = "00-0000";
						}
					}
					
					$result = mysqli_query($con,"SELECT * FROM students WHERE `studnum` = \"" . $studnum . "\"");
					
					echo "<div class=\"android-screens mdl-grid centeritems\">
								<div class=\"mdl-layout-spacer\"></div>
								<table id=\"studentinfo\" class=\"mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp\">
								  <thead>
									<tr>
									  <th class=\"mdl-data-table__cell--non-numeric\">Surname</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">First Name</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">Middle Name</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">Student Number</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">CFAT Score</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>";
									
									while($row = mysqli_fetch_array($result)) {
								  echo "<td class=\"mdl-data-table__cell--non-numeric\" id=\"surname\">" . $row['surname'] . "</td>
									  <td class=\"mdl-data-table__cell--non-numeric\" id=\"firstname\">" . $row['firstname'] . "</td>
									  <td class=\"mdl-data-table__cell--non-numeric\" id=\"middlename\">" . $row['middlename'] . "</td>
									  <td class=\"mdl-data-table__cell--non-numeric\" id=\"studnum\">" . $row['studnum'] . "</td>
									  <td class=\"mdl-data-table__cell--non-numeric\" id=\"cfatscore\">" . $row['cfatscore'] . "</td>";
									}
									echo "</tr>
								  </tbody>
								</table>
								<div class=\"mdl-layout-spacer\"></div>
								</div>
								
							<hr/>
							  <!--<span class=\"mdl-typography--title-color-contrast\">First Year</span>-->
							  <div class=\"android-screens mdl-grid centeritems\">
							  <div class=\"mdl-layout-spacer\"></div>						
								<table id=\"grades\" class=\"mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp\">
								<thead>
									<tr>
										<th>1st</th>
										<th>2nd</th>
										<th>3rd</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody>";
								  
					
								  
					$result = mysqli_query($con,"SELECT * FROM `" . $studnum . "`");

					while($row = mysqli_fetch_array($result))
					{
					echo "<tr>";
					echo "<td><div class=\"mdl-textfield__input\" contentEditable style=\"width: 100%; height: 100%;\" id=\"first\">" . $row['1st'] . "</div></td>";
					echo "<td><div class=\"mdl-textfield__input\" contentEditable style=\"width: 100%; height: 100%;\" id=\"second\">" . $row['2nd'] . "</div></td>";
					echo "<td><div class=\"mdl-textfield__input\" contentEditable style=\"width: 100%; height: 100%;\" id=\"third\">" . $row['3rd'] . "</div></td>";
					echo "<td><div class=\"mdl-textfield__input\" contentEditable style=\"width: 100%; height: 100%; font-size: 0px;\" id=\"courseid\">" . $row['courseid'] . "</div></td>";
					echo "</tr>";
					//if($row['courseid']==4) {
					//	echo "</tr></table><hr/><";
					//}
					}
					echo "</tbody></table>";

					mysqli_close($con);
			  }
?>