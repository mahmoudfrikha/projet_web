<?php
  

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

 

if (isset($_POST['submit']))
{
 try
 {
	$db = new PDO('mysql:host = localhost;dbname = project ;charset = utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

 }
catch(Exception $e)
 {
        die('Erreur : '.$e->getMessage());
 }
 $username = $_POST["username"];
 $password = $_POST["password"]; 
 try
 {
 $result = $db->prepare('SELECT * FROM login where username = :username');
 $result->bindParam(':username',$username);
 $result->execute();
  // sql, binding, etc
  $stmt->execute();  

 }
  catch (PDOException $e)
 {
 print_r($e->getMessage());
 }
 if ($result->rowCount == 1)
 {
	$data = $result->fetchAll();
 
  if (password_verify($password,$data['password']))
 	{ 

  		$_SESSION['username'] = $username;
  		$_SESSION['id'] = $data['id'];
    	header('location:home.php');
 	}
 	else
  	{
 	echo $password; 
 	echo $data['password']; 
 	echo password_verify($password,$data['password']);
  	}
 }
 else 
 {
 echo $password; 
 echo $data['password']; 
 echo password_verify($password,$data['password']);
 }
}
?>