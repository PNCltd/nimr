<?php
ob_start();


	include('db_connect.php');
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function check_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
		$realpass = check_input($_POST['password']);
	$password=md5(check_input($_POST['password']));
	$cpassword=md5(check_input($_POST['cpassword']));

	if ($password != $cpassword) {
		$staff_id = $_SESSION['staff_id'] ;
		$code = $_SESSION['code'];
  		$_SESSION['sign_msg'] = "Password Mismatch";
  		header("location:reset.php?staff_id=$staff_id&code=$code");
	}

	else{
		$code = "";
mysqli_query($conn,"update users2 set code = '".$code."' where email ='".$_SESSION['email']."'") or die('Error '.mysqli_error());

		mysqli_query($conn,"update users2 set password = '".$password."' where email ='".$_SESSION['email']."'") or die('Error '.mysqli_error());
			
	
			
			

		//sending email verification
		$to = $_SESSION['email'];
			$subject = "Password Reset Successful";
			$message = "
				<html>
				<head>
				<title>Password Reset Successful</title>
				</head>
				<body>
				<h2>Thank you for contacting us.</h2>
				<h3>Password reset successful.</h3>
				<h4>Please do keep the password safe to avoid frequent resetting.</h4>

				<p>Password: ".$realpass."</p>
				
				</body>
				</html>
				";
			//<a href='http://www.gwdaf.org/activate?uid=$uid&code=$code'>Activate My Account
			//dont forget to include content-type on header if your sending html
		//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"BC: ochaijohnben@gmail.com";

	mail($to,$subject,$message,$headers);
//			

		$_SESSION['sign_msg'] = "Password Reset Successful. A mail is also sent to you for it.";
  		header('location:forget_password.php');

  		}
	}
	
?>