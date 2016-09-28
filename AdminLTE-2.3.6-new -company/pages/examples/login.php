<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$dbusername ="null";
$dbpassword = "null";
$dbtype= "null";
if($username && $password)
{
	$connect = mysql_connect("localhost","root","");
	mysql_select_db("sales management");
	$query = mysql_query("select * from users where email='$username'");
	
	while($log = mysql_fetch_assoc($query))
	{
		$dbusername =$log["email"];
		$dbpassword =$log["password"];
		$dbtype =$log["role"];
		$user_id = $log["id"];
	}
	 
	if($dbusername == $username && $dbpassword == $password && $dbtype == "admin")
	{
		$count++;
		header("Location: ../../index.php");
	}
	elseif($dbusername == $username && $dbpassword == $password && $dbtype == "sales")
	{	$count++;
		header("Location: ../../../AdminLTE-2.3.6-new-sales/index.php?count=".$count);
	}
	elseif($dbusername == $username && $dbpassword == $password && $dbtype == "project_manager")
	{	$count++;
		header("Location: ../../../AdminLTE-2.3.6-new -prom/index.php?user_id=$user_id&count=$count");
	}
	elseif($dbusername == $username && $dbpassword == $password && $dbtype == "company")
	{	$count++;
		header("Location: ../../../AdminLTE-2.3.6-new -company/index.php?user_id=$user_id&count=$count");
	}
	else
	{
		$Message = urlencode("Invelid Username Or Password! plz try again");
header("Location: login_sandy.php?Message=".$Message);
die;
		
	}
}


?>