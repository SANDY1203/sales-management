<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $id = $_POST['id'];

    // Get User Details
    $query = "SELECT * FROM proserv_project WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $username = $row['proserv_id'];
			$username1 = $row['project_contractor_id'];
			$username4 = $row['project_team'];
				
				$query12 = "SELECT * FROM proserv WHERE id = '$username'";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
					$response1 = $row+$row12;
				}
	}
	
	$query123 = "SELECT * FROM company WHERE company_id = '$username1'";
				
				if (!$result123 = mysql_query($query123)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result123) > 0)
    {
				
				while($row123 = mysql_fetch_assoc($result123)){
					$response2 = $response1+$row123;
				}
	}
	$query1234 = "SELECT * FROM team WHERE team_id = '$username4'";
				
				if (!$result1234 = mysql_query($query1234)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result1234) > 0)
    {
				
				while($row1234 = mysql_fetch_assoc($result1234)){
					$response = $response2+$row1234;
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