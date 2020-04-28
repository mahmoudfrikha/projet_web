<?php
try
 {
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
	$db = new PDO("mysql:host=$servername;port=3308;dbname=project", $DBusername, $DBpassword);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully"; 

 }
catch(Exception $e)
 {
       echo "Connection failed: " . $e->getMessage();
 }
if (!isset($_GET["code"]))
{
	exit("Can't find page");
}
$passwordresetstring = $_GET["code"];
try{
 		$result = $db->prepare('SELECT * FROM users where passwordresetstring = :passwordresetstring');
 		$result->bindParam(':passwordresetstring',$passwordresetstring);

 		$result->execute();

		if ($result->rowCount() == 0)
		{ 
 			exit("Can't find page");
		}
	}
	catch (PDOException $e)
 {
 print_r($e->getMessage());
 }

	if (isset($_POST["updatepass"]) AND $result->rowCount() == 1)
{
        try
	  {

 		$password1 = $_POST["password1"];
 		$password2 = $_POST["password2"];
 		if ($password1 == $password2)
 	  	{
  		$password =password_hash($password1, PASSWORD_DEFAULT);
  			$data = $result->fetch(PDO::FETCH_ASSOC);
  			//print_r($data);
   			$email = $data['email'];
   			$username = $data['username'];
 			$sql = "UPDATE users SET password='$password', passwordresetstring='' WHERE username = :username AND email = :email ";
       		$result= $db->prepare($sql);
        	$result->bindParam(':username',$username);
 			$result->bindParam(':email',$email);
        	$result->execute(); 
			
			exit("Password updated");
 		    
 		}
	}
catch (PDOException $e)
 {
 print_r($e->getMessage());
 }
}	


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<title>reset password</title>
</head>
<body>
<form class="box" method="POST">
	<h1>Write your new password</h1>
	<input type="password" name="password1" placeholder="New pasword" required>
	<input type="password" name="password2" placeholder="Confirm new pasword" required>
	<input type="submit" name="updatepass" value="Update password">
</form>
</body>
</html>