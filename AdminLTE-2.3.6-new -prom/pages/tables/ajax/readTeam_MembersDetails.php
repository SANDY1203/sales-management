<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['team_m_id']) && isset($_POST['team_m_id']) != "")
{
    // get User ID
    $team_m_id = $_POST['team_m_id'];

    // Get User Details
    $query = "SELECT * FROM team_members WHERE team_m_id = '$team_m_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
			$username = $row['team_id'];
				
				$query12 = "SELECT * FROM team WHERE team_id = '$username'";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
            $response = $row+$row12;
        }
    }
		}
	}
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}