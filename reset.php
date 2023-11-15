<?php
	include('db_connect.php');
	session_start();
	if(isset($_GET['code'])){
	$staff_id=$_GET['staff_id'];
	$code=$_GET['code'];

	$query=mysqli_query($conn,"select * from users2 where staff_id='$staff_id'");
	$row=mysqli_fetch_array($query);
$_SESSION['email'] = $row['email'];
		$_SESSION['staff_id'] = $staff_id;
		$_SESSION['code'] = $code;

	if($row['code']==$code){
		
		// Update Password
		?>
		
		
		<!DOCTYPE html>
<html lang="en">
<?php 
	//ob_start();
//session_start();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | pn consulting IT Service Desk</title>
 	

<?php include('header.php'); ?>
<?php 
if(isset($_SESSION['login_staff_id']))
header("location:index.php?page=home");

?>

</head>
	<style>
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0
	    background: #007bff;
				    /*background: #007bff;*/

	}
	main#main{
		width:100%;
		height: calc(100%);
		display: flex;
	}

</style>

<!--<body class="bg-dark" style="background:url('assets/helpdesk.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">-->
<body class="bg-dark" style="background:url('assets/helpdesk.jpg'); background-repeat: no-repeat; background-size: cover;">
  <main id="main" >
  	
  		<div class="align-self-center w-100">
		<h4 class="text-white text-center"><b>pn consulting IT Service Desk</b></h4>
  		<div id="login-center" align="center">
  			<div class="card col-md-4">
  				<div class="card-body">
  					<form method="POST" action="confirm_reset.php">
  						<div class="form-group">
  							<label for="password" class="control-label text-dark">Enter New Password</label>
  							<input type="password" id="password" name="password" class="form-control form-control-sm" required>
  						</div>
  						<div class="form-group">
  							<label for="cpassword" class="control-label text-dark">Confirm New Password</label>
  							<input type="password" id="cpassword" name="cpassword" class="form-control form-control-sm" required>
  						</div>
  						
  						<button class="btn-sm btn-block btn-wave col-md-6 btn-primary" type="submit">Reset Password</button><a href="login.php"> Back to Login</a>
  					</form>
  					<?php
			session_start();
			if(isset($_SESSION['sign_msg'])){
				?>
				<div style="height: 40px;"></div>
				<div class="alert alert-danger">
					<span><center>
					<?php echo $_SESSION['sign_msg'];
						unset($_SESSION['sign_msg']); 
					?>
					</center></span>
				</div>
				<?php
			}
		?>
  				</div>
  			</div>
  		</div>
  		</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
	
</html>
		
		<?php 
		// end update password
		
		
	}
	else{
		
		//$_SESSION['sign_msg'] = "Password Mismatch";
  		//header("location:reset.php?staff_id=$staff_id&code=$code");
	
		$_SESSION['sign_msg'] = "Something went wrong. Please sign up again.";
  		header('location:forget_password.php');
	}}else{
		//$_SESSION['sign_msg'] = "Password Mismatch";
  		//header("location:reset.php?staff_id='".$_SESSION['staff_id']."'&code='".$_SESSION['code']."'");
	
	//header('location:forget_password.php');
		header('location:index.php');
	}
?>