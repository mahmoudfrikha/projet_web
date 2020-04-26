<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
    <link rel="stylesheet" href= "signup.css">
    <link rel="stylesheet" href= "/login/icons/fontawesome-free-5.13.0-web/css/all.min.css">
</head>
<body>
	<form action="register.php" method="POST">
<div class ="wrapper">
	<div class="header-area">
	    <h2>Benna</h2>	
		<p>Subscribe to our social profile</p>
	</div>
			<div class= "social-area">
			<i class="fab fa-pinterest"></i>
			<a  href= "https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
			<i class= "fab fa-instagram"></i>
		    </div>
	</div>
	<div class= "form-area">
			<i class = "fa fa-envelope"></i>
			<input type="email" name="email" placeholder="Email" required>
			<i class= "fa fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
            <i class= "fa fa-key"></i>
            <input type="password" name="password" placeholder="Password" required>
            <i class= "fa fa-key"></i>
            <input type="password" name="password2" placeholder="Confirm Password" required>
            <i class= "fa fa-phone"></i>
            <input type="text" name="phone" placeholder="Phone Number" required>
             <i class= "fas fa-home"></i>
            <input type="text" name="home" placeholder="Home Adress" required>
            <input type="submit" name="signupbut" value="Sign up">
            <div class= "message">
           
            <p><?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></p>
        </div>
	</div>
    </form>
</body>
</html>