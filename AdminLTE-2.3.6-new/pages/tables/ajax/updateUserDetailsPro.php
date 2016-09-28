<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['first_name']))
{
    // get values
    $id = $_POST['id'];
        $first_name = $_POST['first_name'];
		

    // Updaste User details
    $query = "UPDATE users SET first_name = '$first_name' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
	session_start();
$_SESSION['first_name'] = $_POST['first_name'];
}


if(isset($_POST['last_name']))
{
    // get values
    $id = $_POST['id'];
        $last_name = $_POST['last_name'];
		

    // Updaste User details
    $query = "UPDATE users SET last_name = '$last_name' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
	session_start();
$_SESSION['last_name'] = $_POST['last_name'];
}


if(isset($_POST['email']))
{
    // get values
    $id = $_POST['id'];
        $email = $_POST['email'];
		

    // Updaste User details
    $query = "UPDATE users SET email = '$email' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
	session_start();
$_SESSION['email'] = $_POST['email'];
}

if(isset($_POST['password']))
{
    // get values
    $id = $_POST['id'];
        $password = $_POST['password'];
		

    // Updaste User details
    $query = "UPDATE users SET password = '$password' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
	session_start();
$_SESSION['password'] = $_POST['password'];
}