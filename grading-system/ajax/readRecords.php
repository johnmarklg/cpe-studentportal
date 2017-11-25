<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th><center>No.</center></th>
							<th><center>Lastname</center></th>
							<th><center>Firstname</center></th>
							<th><center>Middlename</center></th>
							<th><center>Prelim</center></th>
							<th><center>Midterm</center></th>
							<th><center>Pre-Final</center></th>
							<th><center>Final</center></th>
							<th><center>Final Grade</center></th>
							<th colspan=2><center>Actions</center></th>
						</tr>';

	$query = "SELECT * FROM students";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td><center>'.$number.'</td>
				<td><center>'.$row['Lastname'].'</center></td>
				<td><center>'.$row['Firstname'].'</center></td>
				<td><center>'.$row['MI'].'</center></td>
				<td><center>'.$row['first'].'</center></td>
				<td><center>'.$row['second'].'</center></td>
				<td><center>'.$row['third'].'</center></td>
				<td><center>'.$row['fourth'].'</center></td>
				<td><center>'.$row['Final'].'</center></td>
				<td>
					<center>
						<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
						<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete&nbsp;</button>
					</center>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="11">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>