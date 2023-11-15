<!DOCTYPE html>
<html lang="en">
<?php 
	ob_start();
//session_start();
include('./db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | pn consulting IT Service Desk</title>
 	

<?php include('./header.php'); ?>
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
  					<form method="POST" action="resetpass.php">
  						<div class="form-group">
  							<label for="email" class="control-label text-dark">Email</label>
  							<input type="text" id="email" name="email" class="form-control form-control-sm" required>
  						</div>
  						
  						<button class="btn-sm btn-block btn-wave col-md-6 btn-primary" type="submit">Send Reset Link</button><a href="login.php"> Back to Login</a>
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
<script>
	$('#forget_password-form').submit(function(e){
		e.preventDefault()
		$('#forget_password-form button[type="button"]').attr('disabled',true).html('Sending Reset link...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=reset_password',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#forget_password-form button[type="button"]').removeAttr('disabled').html('Forget_password');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#forget_password-form').prepend('<div class="alert alert-success">Mail has been sent to your email.</div>')
					$('#forget_password-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
	$('.number').on('input',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        $(this).val(val)
    })
</script>	
</html>