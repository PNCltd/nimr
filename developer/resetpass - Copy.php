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

	$email=check_input($_POST['email']);
	//$password=md5(check_input($_POST['password']));

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$_SESSION['sign_msg'] = "Invalid email format";
  		header('location:forget_password.php');
	}

	else{

		$query=mysqli_query($conn,"select * from users2 where email='$email'");
		if(mysqli_num_rows($query)<1){
			$_SESSION['sign_msg'] = "Email does not exist";
  			header('location:forget_password.php');
		}
		else{
		//depends on how you set your verification code
		$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code=substr(str_shuffle($set), 0, 12);

		mysqli_query($conn,"update users2 set code = '".$code."' where email ='".$email."'") or die('Error '.mysqli_error());
			
			$staffid = $conn->query("SELECT staff_id FROM users2 where email = '".$email."'") or die('Error '.mysqli_error());;
	

$row = mysqli_fetch_array($staffid);
$staff_id = $row['staff_id'];
			
			
		//default value for our verify is 0, means it is unverified

		//sending email verification
		$to = $email;
			$subject = "Password Reset Link";
			$message = "
				<html>
				<head>
				<title>Reset Link</title>
				</head>
				<body>
				<h2>Thank you for contacting us.</h2>
				<p>Email: ".$email."</p>
				<p>Please click the link below to activate your account.</p>
				<h4><a href='localhost/issuelog/reset.php?staff_id=$staff_id&code=$code'>Reset my password</h4>
				
				</body>
				</html>
				";
			//<h4><a href='http://www.ptmfb.pncitservdesk.com/reset.php?staff_id=$staff_id&code=$code'>Activate My Account</h4>
			
			//dont forget to include content-type on header if your sending html
		//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"BC: ochaijohnben@gmail.com";

	mail($to,$subject,$message,$headers);
//			
			if(mail){
				$_SESSION['sign_msg'] = "Password reset link sent to your email \r\n" .$email."\r\nOpen it  to reset.";
  		header('location:forget_password.php');
			}else{
				$_SESSION['sign_msg'] = "Error occured";
  		header('location:forget_password.php');
			}

		//$_SESSION['sign_msg'] = "Password reset link sent to your email \r\n" .$email."\r\nOpen it  to reset.";
  		//header('location:forget_password.php');

  		}
	}
	}
?>