<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>ID</th>
					  <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
					  <th>Password</th>
					  <th>Role</th>
							<th>Actions</th>
							
						</tr>';

	$query = "SELECT * FROM users";

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
				<td>'. $row['id'] . '</td>
			     <td>'. $row['first_name'] . '</td>
				 <td>'. $row['last_name'] . '</td>
                <td>'. $row['email'] . '</td>
                <td>'. $row['password'] . '</td>
				<td>'. $row['role'] . '</td>
				<td>
					<button onclick="ViewUser('.$row['id'].')" class="btn btn-info">View</button>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>