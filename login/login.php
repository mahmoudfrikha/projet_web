<?php
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="file:///D:/Mahmoud/class/2eme%20annee/SEM2/web/projet%20web/mywork/login/icons/fontawesome-free-5.13.0-web/css/all.css">
</head>
<body>
	<form action="home.php" method="post">
	<div class="bg"></div>
	<div class="login-box">
		<h1>Login</h1>
		<div class="textbox">
<i class="fas fa-user"></i>
			<input type="text" placeholder="Username" name="username" value="">
</div>
<div class="textbox">
<i class="fas fa-lock"></i>
			<input type="password" placeholder="Password" name="password" value="">
</div>
<input class="butt" type="submit" name="" value="Sign in">
<a href="#">Forgot passsword ? </a> <br/>
<a href="#">Sign up ?</a>
</div>
</form>
</body>
</html>	
?>