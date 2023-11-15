<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM issue_log where id = '".$_GET['id']."'")->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_issue.php';
?>