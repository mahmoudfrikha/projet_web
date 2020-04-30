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
if (!isset($_GET["vkey"]))
{
	exit("Can't find page");
}
$vkey = $_GET["vkey"];
try{
 		$result = $db->prepare('SELECT * FROM users where verified = 0 AND vkey = :vkey');
 		$result->bindParam(':vkey',$vkey);

 		$result->execute();

		if ($result->rowCount() == 0)
		{ 
 			exit("Can't find page");
		}
		else if ($result->rowCount() == 1)
		{
			 $sql = "UPDATE users SET verified = 1  WHERE vkey = :vkey";
       $result2= $db->prepare($sql);
        $result2->bindParam(':vkey',$vkey);
        $result2->execute(); 
        echo "email verified";
        header('location: index.php');
		}
	}
	catch (PDOException $e)
 {
 print_r($e->getMessage());
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>email verification</title>
 </head>
 <body>
 <h1 style="text-align: center;">Email verified</h1>
 </body>
 </html>