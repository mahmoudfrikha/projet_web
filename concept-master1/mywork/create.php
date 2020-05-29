<?php
//session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['create']))
{ 
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
   $nom_event=$_POST['event_name'];
    $date_debut=$_POST['begin'];    
    $date_fin=$_POST['finish'];
    $option=$_POST['option'];
    $choice=$_POST['choice'];
    $remise=$_POST['remise'];
    $date_debut = date("Y-m-d H:i:s",strtotime($date_debut));
    $date_fin = date("Y-m-d H:i:s",strtotime($date_fin));
     try
   {
        // inserting event
        $sql = "INSERT INTO event (nom_event,remise,date_debut,date_fin)VALUES ('$nom_event','$remise','$date_debut', '$date_fin')";
        $db->exec($sql);
      //Getting the last event_id
        $stmt = $db->prepare('SELECT event_id FROM event WHERE event_id=(SELECT MAX(event_id) FROM event)');
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_ASSOC);
          //print_r($data1);
          $event_id = $data['event_id'];
      // inserting a product or a category
     if ($option == "category" ) 
        {
              //Getting the category_id
              $result = $db->prepare('SELECT * FROM category where nom_category = :choice');
              $result->bindParam(':choice',$choice);
              $result->execute();
              if ($result->rowCount() == 1)
            {
              $data = $result->fetch(PDO::FETCH_ASSOC);
              //print_r($data);
              $category_id = $data['category_id'];
              $sql = "INSERT INTO event_category (event_id,category_id)VALUES ('$event_id','$category_id')";
              $db->exec($sql);
            }
              else 
            {
                $msg = "the name of category should be unique";
            }   
        }
     else if ($option == "meal")
     {
              //Getting the product_id
              $result = $db->prepare('SELECT * FROM product where nom_produit = :choice');
              $result->bindParam(':choice',$choice);
              $result->execute();
              if ($result->rowCount() == 1)
            {
              $data = $result->fetch(PDO::FETCH_ASSOC);
              $produit_id = $data['produit_id'];
              $sql = "INSERT INTO event_product (event_id,product_id)VALUES ('$event_id','$produit_id')";
              $db->exec($sql);
            }
              else {
                $msg = "the name of meal should be unique";
            }   
     }
     header('location: edit_form.php');
    }  

  catch (PDOException $e)
    {
      print_r($e->getMessage());
    } 
}
?>



