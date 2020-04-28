<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="icons/fontawesome-free-5.13.0-web/css/all.css">
</head>
<body>
	<form action="db.php" method="post">
	<div class="bg"></div>
	<div class="login-box">
		<h1>Login</h1>
		<div class="textbox">
<i class="fas fa-user"></i>
			<input type="text" placeholder="Username" name="username" value="" required>
</div>
<div class="textbox">
<i class="fas fa-lock"></i>
			<input type="password" placeholder="Password" name="password" value="" required>
</div>
<input class="butt" type="submit" name="submit" value="Sign in" required>
<a href="resetpassword/resetform.php">Forgot passsword ? </a> <br/>
<a href="signup.php">Sign up ?</a>
</div>
</form>
</body>
</html>	
