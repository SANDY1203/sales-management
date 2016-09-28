<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
		$product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
		$product_start_price = $_POST['product_start_price'];
        $product_end_price = $_POST['product_end_price'];
        $category = $_POST['category'];
		

    // Updaste User details
    $query = "UPDATE proserv SET product_name = '$product_name', product_description = '$product_description', product_start_price = '$product_start_price', product_end_price = '$product_end_price', category='$category' WHERE id = 'id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}