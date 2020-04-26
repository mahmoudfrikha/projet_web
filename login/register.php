<?php
session_start();
if (isset($_POST['signupbut']))
{
 	try
 {
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
	$db = new PDO("mysql:host=$servername;port=3308;dbname=project", $DBusername, $DBpassword);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 

 }
catch(Exception $e)
 {
       echo "Connection failed: " . $e->getMessage();
 }
 $username = $_POST["username"];
 $password = $_POST["password"];
 // if(!empty($_POST['password2']))
 $password2 = $_POST['password2'];
 $email = /*mysql_real_escape_string*/($_POST['email']);
 $phone_number = $_POST['phone'];
 $home_adress = $_POST['home']; 
 
 	
 	try
 {
 	$result = $db->prepare('SELECT * FROM users where email = :email');
 	$result->bindParam(':email',$email);
 	$result->execute();
  $nbmail= $result->rowCount();
	$result1 = $db->prepare('SELECT * FROM users where username = :username');
  $result1->bindParam(':username',$username);
  $result1->execute();
  $nbuser = $result1->rowCount();
  if ( $nbmail == 0)
   {
   		if ($password == $password2)
    {
        if ( $nbuser == 0)
        {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, username, password, phone_number, home_adress)VALUES ('$email', '$username', '$password', '$phone_number', '$home_adress')";
        $db->exec($sql);
        header("location: index.php");
   	     }
        else { header("location: signup.php?msg=username already used"); exit; 
     }         
   	}
   	else { header("location: signup.php?msg=passwords do not match"); exit;}
    
   }
   else { header("location: signup.php?msg=email already used"); exit; 
     }
 }

  catch (PDOException $e)
 {
 print_r($e->getMessage());
 }
 echo $_SESSION['message'];
}
?>