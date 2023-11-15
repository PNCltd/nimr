<?PHP 
include('db_connect.php');
		//$email = $conn->query("SELECT email FROM users2 where staff_id = '".$staff_id."'");
		$email = $conn->query("SELECT email FROM users2 where staff_id = 'CH12'");

$row = mysqli_fetch_array($email);
echo $row['email'];
?>