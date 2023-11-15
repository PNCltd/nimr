<?php 
session_start();
include('db_connect.php');

$message = $_POST['message'];
$user_id = $_POST['user_id'];
$convo_id = $_SESSION['pv_id'];
$time = time();

$save = $conn->query("INSERT INTO messages (convo_id, user_id, message, time) VALUES('$convo_id', '$user_id', '$message', '$time')");


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>