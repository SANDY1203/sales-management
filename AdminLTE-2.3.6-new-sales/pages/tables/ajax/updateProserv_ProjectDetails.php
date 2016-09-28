 <?php //include Database connection file
 include("db_connection.php"); 
 // check request
 if(isset($_POST)) { 
 // get values 
 $id = $_POST['id'];
 $proserv_id = $_POST['proserv_id'];
 $project_contractor_id = $_POST['project_contractor_id']; 
 $project_price = $_POST['project_price'];
 $project_team = $_POST['project_team']; 
 $project_status = $_POST['project_status']; 
 $category_proserv_project = $_POST['category_proserv_project']; 
 // Updaste User details 
 $query = "UPDATE proserv_project SET proserv_id = '$proserv_id', project_contractor_id = '$project_contractor_id', project_price = '$project_price', project_team = '$project_team', project_status = '$project_status', category_proserv_project = '$category_proserv_project' WHERE id = '$id'";
 if (!$result = mysql_query($query)) { 
 exit(mysql_error()); } }
 ?>