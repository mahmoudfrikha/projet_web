 <?php

session_start();



 try
    {
      $servername = "localhost";
      $DBusername = "root";
      $DBpassword = "";
	    $db = new PDO("mysql:host=$servername;port=3308;dbname=yessine", $DBusername, $DBpassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully"; 

    }
      catch(Exception $e)
    {
       echo "Connection failed: " . $e->getMessage();
    }
if (isset($_GET['delete']))
{
  $id = $_GET['delete'];
  $sql = "DELETE FROM event WHERE event_id=$id";
  $result= $db->prepare($sql);
  $result->execute(); 
  $sql = "DELETE FROM event_category WHERE event_id=$id";
  $result= $db->prepare($sql);
  $result->execute(); 
  $sql = "DELETE FROM event_product WHERE event_id=$id";
  $result= $db->prepare($sql);
  $result->execute(); 

  $_SESSION["message"] = "Event has been deleted";
  $_SESSION['msg_type'] = "danger";
  header("location: edit_form.php?msg=Event has been deleted");
}





    ?>