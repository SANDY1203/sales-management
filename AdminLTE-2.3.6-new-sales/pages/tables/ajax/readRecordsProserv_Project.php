<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>ID</th>
					  <th>Product Name</th>
                      <th>Project Contractor Name</th>
                      <th>Project Price</th>
					  <th>Project Team</th>
					  <th>Project Status</th>
					  <th>Category Proserv Project</th>
							<th>Actions</th>
							
						</tr>';

	$query = "SELECT * FROM proserv_project";

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
				<td>'. $row['id'] . '</td>';
				$username = $row['proserv_id'];
				
				$query12 = "SELECT * FROM proserv WHERE id = '$username'";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
				
				
				
			$data .=	'<td>'. $row12['product_name'] . '</td>';
				}
	}
	else{
		$data .=	'<td></td>';
	}
				
				$username = $row['project_contractor_id'];
				
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
				 
				 
			
				 $data .= '<td>'. $row['project_status'] . '</td>
				 <td>'. $row['category_proserv_project'] . '</td>
                
				<td>
				<button onclick="ViewProserv_Project('.$row['id'].')" class="btn btn-info">View</button>
					<button onclick="GetProserv_ProjectDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				
					<button onclick="DeleteProserv_Project('.$row['id'].')" class="btn btn-danger">Delete</button>
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