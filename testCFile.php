<?php

// Get the user id
$subhead = $_REQUEST['subhead'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "nimr");

if ($subhead !== "") {
	
	// Get corresponding first name and
	// last name for that user id	

	// $query = mysqli_query($con, "SELECT first_name, last_name FROM userdata WHERE user_id='$subhead'");
	$query = mysqli_query($con, "SELECT  appropriation, totalAllocated, balance  FROM transactions_tbl where subhead = '$subhead' ORDER by date_added DESC LIMIT 1");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$appropriation = $row["appropriation"];

	// Get the first name
	$totalAllocated = $row["totalAllocated"];
	$balance = $row["balance"];
}

// Store it in a array
$result = array("$appropriation", "$totalAllocated", "$balance");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
