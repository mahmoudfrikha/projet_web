<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (isset($_POST['submit']))
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
 $email = $_POST["email"]; 
 try
 {
 $result = $db->prepare('SELECT * FROM users where username = :username AND email = :email');
 $result->bindParam(':username',$username);
 $result->bindParam(':email',$email);
 $result->execute();
if ($result->rowCount() == 1)
 {
	$data = $result->fetch(PDO::FETCH_ASSOC);
  //print_r($data);
   $username1 = $data['username'];
   $emailto = $data['email'];
   $id = $data['user_id'];
   $str=rand();
   $securitystring = md5($str);

   $sql = "UPDATE users SET passwordresetstring='$securitystring' WHERE username = :username AND email = :email ";
       $result2= $db->prepare($sql);
        $result2->bindParam(':username',$username);
 $result2->bindParam(':email',$email);
        $result2->execute(); 
    
    

   $mail = new PHPMailer(true);

try {
    //Server settings
                          // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'benna.resto@gmail.com';                     // SMTP username
    $mail->Password   = 'Mahmoud27410942';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('benna.resto@gmail.com', 'Benna');
    $mail->addAddress($emailto);     // Add a recipien
                  // Name is optional
    $mail->addReplyTo('no-reply@benna.com', 'no reply');

    // Content
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/newpass.php?code=$securitystring";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'your password reset link';
    $mail->Body    = "<h1>You requested a password reset </h1>
                      click <a href='$url'>this link</a> to create a new password";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("location: http://localhost/projet_web/login/index.php");
echo '<script>alert("A mail has been sent")</script>'; 
exit();
  }
 else 
 {
      header('location:resetform.php');

 }
}
  catch (PDOException $e)
 {
 print_r($e->getMessage());
 }
 
}
?>
