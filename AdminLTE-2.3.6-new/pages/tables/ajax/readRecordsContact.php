<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>ID</th>
					  <th>Name</th>
                      <th>Position</th>
                      <th>Number-1</th>
					  <th>Number-2</th>
					  <th>Email-1</th>
					  <th>Email-2</th>
					  <th>Company Allocation</th>
							<th>Actions</th>
							
						</tr>';

	$query = "SELECT * FROM contact";

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
			     				 <td>'. $row['contact_name'] . '</td>
				 <td>'. $row['contact_position'] . '</td>
				 <td>'. $row['contact_number_one'] . '</td>
				 <td>'. $row['contact_number_two'] . '</td>
				 <td>'. $row['contact_email_one'] . '</td>
                <td>'. $row['contact_email_two'] . '</td>';
				
				$username = $row['contact_company_allo'];
				
				$query12 = "SELECT * FROM company WHERE company_id = '$username'";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
				
				
				
			$data .=	'<td>'. $row12['company_name'] . '</td>';
				}
	}
	else{
		$data .=	'<td></td>';
	}
				
				
				
				
				$data .= '<td>
				<button onclick="ViewContact('.$row['id'].')" class="btn btn-info">View</button>
					<button onclick="GetContactDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				
					<button onclick="DeleteContact('.$row['id'].')" class="btn btn-danger">Delete</button>
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