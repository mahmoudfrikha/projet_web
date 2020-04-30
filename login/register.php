<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'resetpassword/PHPMailer/src/Exception.php';
require 'resetpassword/PHPMailer/src/PHPMailer.php';
require 'resetpassword/PHPMailer/src/SMTP.php';
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
          $data = $result->fetch(PDO::FETCH_ASSOC);
        $vkey = md5(time().$username);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, vkey, username, password, phone_number, home_adress)VALUES ('$email','$vkey', '$username', '$password', '$phone_number', '$home_adress')";
        $db->exec($sql);
        // sending email
         $to = $email;
         $mail = new PHPMailer(true);

try {
    $mail->isSMTP();      
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'benna.resto@gmail.com';        
    $mail->Password   = 'Mahmoud27410942';                
    $mail->SMTPSecure = 'ssl';         
     $mail->Port      = 465;              
    $mail->setFrom('benna.resto@gmail.com', 'Benna');
    $mail->addAddress($to);     
    $mail->addReplyTo('no-reply@benna.com', 'no reply');
   $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/verify.php?vkey=$vkey";
    $mail->isHTML(true);                                  
    $mail->Subject = 'email verification';
    $mail->Body    = "<h1>Account verification </h1>
                      click <a href='$url'>this link</a> to verify your account";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
 echo '<script>alert("an email has been sent check your email")</script>' ;
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        //header("location: verify.php");

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
 //echo $_SESSION['message'];
}
?>