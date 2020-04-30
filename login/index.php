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
 <div class="extention">
<a href="resetpassword/resetform.php" style="color: #daebc7;
    text-align: left;
    text-shadow: -1px 1px 12px black;">Forgot passsword ? </a> <br/>
<a href="signup.php" style="color: #daebc7;
    text-align: left;
    text-shadow: -1px 1px 12px black;">Sign up ?</a>
</div>
           
            <p style="color: red;"><?php if(isset($_GET['msg'])){ echo $_GET['msg']; sleep(5); echo "";} ?></p>
        
</div>
</form>
</body>
</html>	
