<?php
	include ("includes/config.php");
	include ("includes/classes/account.php");
	include ("includes/classes/constants.php");

	$account = new Account($con);
	
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Login Form</title>
</head>
<body>
	<section class="jumbotron">
		<h3>Login Form</h3>
		<form id="loginForm" action="register.php" method="post">
			<div>
				<label for="loginUsername">Username</label>
				<input type="text" name="loginUsername" id="loginUsername" required>
			</div>
			<div>
				<label for="loginPassword">Password</label>
				<input type="text" name="loginPassword" id="loginPassword" required>
			</div>
			<button type="submit" name="loginButton" class="btn btn-lg btn-primary">Log In</button>
		</form>
		
		<h3>Register Form</h3>
		<form id="registerForm" action="register.php" method="post">
			<div>
				<label for="registerUsername">Username</label>
				<input type="text" name="registerUsername" id="registerUsername" value="<?php getInputValue('registerUsername') ?>" require>
			</div>
			<div>
				<label for="registerPassword">Password</label>
				<input type="text" name="registerPassword" id="registerPassword" value="<?php getInputValue('registerPassword') ?>"  require>
			</div>
			<button type="submit" name="registerButton" class="btn btn-lg btn-secondary">Register</button>
		</form>
	</section>
</body>
</html>