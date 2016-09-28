<?php 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table id="example1" class="table table-bordered table-striped">
						<tr>
							<th>ID</th>
					  <th>Project Name</th>
                      <th>Project Desc</th>
                      <th>Project Company Name</th>
					  <th>Project Price</th>
					  <th>Project Team</th>
					  <th>Project Status</th>
					  <th>User Name</th>
							<th>Actions</th>
					
						</tr>';

	$query = "SELECT * FROM projects";

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
			     <td>'. $row['project_name'] . '</td>
				 <td>'. $row['project_desc'] . '</td>';
				 
				 $username = $row['project_company_id'];
				
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
				 
				 
				 
				 
				 $data .= '<td>'. $row['project_price'] . '</td>';
				 
				 
				 $username = $row['project_team'];
				
				$query12 = "SELECT * FROM team WHERE team_id = '$username'";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
				
				
				
			$data .=	'<td>'. $row12['team_name'] . '</td>';
				}
	}
	else{
		$data .=	'<td></td>';
	}
				 
				 
				 
				$data .= ' <td>'. $row['project_status'] . '</td>';
				 
               $username = $row['user_id'];
				
				$query12 = "SELECT * FROM users WHERE id = '$username'";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
				
				
				
			$data .=	'<td>'. $row12['first_name'] . '</td>';
				}
	}
	else{
		$data .=	'<td></td>';
	}
				
		$data .= '		<td>
				<button onclick="ViewProject('.$row['id'].')" class="btn btn-info">View</button>
					<button onclick="GetProjectDetails('.$row['id'].')" class="btn btn-warning">Update</button>
			
					<button onclick="DeleteProject('.$row['id'].')" class="btn btn-danger">Delete</button>
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