<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>Team M ID</th>
					  <th>Team M First Name</th>
                      <th>Team M Last Name</th>
                      <th>Team M Position</th>
					  <th>Team M Employement Status</th>
					  <th>Team Name</th>
							<th>Actions</th>
							
							
						</tr>';

	$query = "SELECT * FROM team_members";

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
				<td>'. $row['team_m_id'] . '</td>
			     <td>'. $row['team_m_first_name'] . '</td>
				 <td>'. $row['team_m_last_name'] . '</td>
                <td>'. $row['team_m_position'] . '</td>
                <td>'. $row['team_m_employement_status'] . '</td>';
				
				$username = $row['team_id'];
				
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
				
				
			
				$data .= '<td>
				<button onclick="ViewTeam_Members('.$row['team_m_id'].')" class="btn btn-info">View</button>
					<button onclick="GetTeam_MembersDetails('.$row['team_m_id'].')" class="btn btn-warning">Update</button>
			
					<button onclick="DeleteTeam_Members('.$row['team_m_id'].')" class="btn btn-danger">Delete</button>
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