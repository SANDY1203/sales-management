<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>ID</th>
					  <th>User Name</th>
                      <th>Ans-1</th>
                      <th>Ans-2</th>
					  <th>Ans-3</th>
					  <th>Ans-4</th>
					  <th>Ans-5</th>
					  <th>Remarks</th>
					  <th>Contact Name</th>
							<th>Actions</th>
							
						</tr>';

	$query = "SELECT * FROM feedback";

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
				
				
			
			$data .= '<td>'. $row['ans_1'] . '</td>
				 <td>'. $row['ans_2'] . '</td>
				 <td>'. $row['ans_3'] . '</td>
				 <td>'. $row['ans_4'] . '</td>
				 <td>'. $row['ans_5'] . '</td>
                <td>'. $row['remarks'] . '</td>';
				
				$username = $row['contact_id'];
				
				$query12 = "SELECT * FROM contact WHERE id = '$username'";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
				
				
				
			$data .=	'<td>'. $row12['contact_name'] . '</td>';
				}
	}
	else{
		$data .=	'<td></td>';
	}
				
				
				$data .= '<td>
				<button onclick="ViewFeedback('.$row['id'].')" class="btn btn-info">View</button>
					<button onclick="GetFeedbackDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				
					<button onclick="DeleteFeedback('.$row['id'].')" class="btn btn-danger">Delete</button>
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