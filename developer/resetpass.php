<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

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
			
			
			$mail = new PHPMailer(true);

try{
	


    // Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
		
    $mail->isSMTP();
    $mail->Host = 'martini.hostns.io';
	    

    $mail->SMTPAuth = true;
	$mail->WordWrap = 50;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'reg@ksmlagosmetro.com.ng'; // YOUR gmail email
    $mail->Password = 'developerpassword'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('reg@ksmlagosmetro.com.ng', 'Punuka Service Desk');
	
	
		 		
        //$mail->addAddress($email, $row['firstname'].' '.$row['othername'].' '.$row['surname']);
	        $mail->addAddress($email, $email);
	        $mail->addAddress($email, $email);

	
		$mail->Body="<html>
				<head>
				<title>Reset Link</title>
				</head>
				<body>
				<h2>Thank you for contacting us.</h2>
				<p>Email: ".$email."</p>
				<p>Please click the link below to activate your account.</p>
				<h4><a href='www.pncitservdesk.com/developer/reset.php?staff_id=$staff_id&code=$code'>Reset my password</h4>
				
				</body>
				</html>
				";
		//$mail->addAddress($to, 'Member');
    $mail->addReplyTo('reg@ksmlagosmetro.com.ng', 'KSM ICT Team'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Password Reset Link";
    //$mail->Body = 'HTML message body. <b>Gmail</b> SMTP email body.';
	//$mail->Body = file_get_contents('mail_body.php');
	
//	$getemail=mysqli_query($conn, "select  * FROM members where phoneno = '070254522115' or phoneno ='22222222222'");
//
//	
//	
//	foreach ($result as $emailrow) {
//    
//	}
    $mail->AltBody = 'Punuka Service Desk.';

    $mail->send();
	if($mail){
				$_SESSION['sign_msg'] = "Password reset link sent to your email \r\n" .$email."\r\nOpen it  to reset.";
  		header('location:forget_password.php');
			}else{
				$_SESSION['sign_msg'] = "Error occured";
  		header('location:forget_password.php');
			}
    
    	} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
	
}
//	 	
//			if(mail){
//				$_SESSION['sign_msg'] = "Password reset link sent to your email \r\n" .$email."\r\nOpen it  to reset.";
//  		header('location:forget_password.php');
//			}else{
//				$_SESSION['sign_msg'] = "Error occured";
//  		header('location:forget_password.php');
//			}

		//$_SESSION['sign_msg'] = "Password reset link sent to your email \r\n" .$email."\r\nOpen it  to reset.";
  		//header('location:forget_password.php');

  		}
	}
	}
?>