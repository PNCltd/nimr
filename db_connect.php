<?php 
//$conn=  mysqli_connect('localhost','pncitser_user','pncitser_password','pncitser_ptmfb');

$conn= new mysqli('localhost','root','','nimr')or die("Could not connect to mysql".mysqli_error($con));
?>