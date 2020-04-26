<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['submit']))
{
 try
 {
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
	$db = new PDO("mysql:host=$servername;port=3308;dbname=project", $DBusername, $DBpassword);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 

 }
catch(Exception $e)
 {
       echo "Connection failed: " . $e->getMessage();
 }
 $username = $_POST["username"];
 $password = $_POST["password"]; 
 try
 {
 $result = $db->prepare('SELECT * FROM login where username = :username');
 $result->bindParam(':username',$username);
 $result->execute();
if ($result->rowCount() == 1)
 {
	$data = $result->fetch(PDO::FETCH_ASSOC);
  print_r($data);
   $pass=$data['password'];
  if (password_verify($password,$pass))
 	{ 

  		$_SESSION['username'] = $username;
  		$_SESSION['id'] = $data['user_id'];
    	header('location:home.php');
 	}
 	else
  	{
      header('location:index.php');

  	}
 }
 else 
 {
      header('location:index.php');

 }

 }
  catch (PDOException $e)
 {
 print_r($e->getMessage());
 }
 
}
?>