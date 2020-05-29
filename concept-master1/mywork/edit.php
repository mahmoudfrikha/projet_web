<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="\concept-master1\mywork\create.css">
    <title> Edit Event</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
     
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>
<?php
        
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
    
      
       
       
         
         if (isset($_POST['update']))
      {
        $id = $_GET['edit'];
        echo $id;
         $nom_event=$_POST['event_name'];
         $date_debut=$_POST['begin'];    
         $date_fin=$_POST['finish'];
         $remise=$_POST['remise'];
         $date_debut = date("Y-m-d H:i:s",strtotime($date_debut));
         $date_fin = date("Y-m-d H:i:s",strtotime($date_fin));
        echo $nom_event;
        echo $date_debut;
       
        $result = $db->prepare("UPDATE event SET nom_event= '$nom_event', remise = '$remise', date_debut = '$date_debut', date_fin ='$date_fin' WHERE event_id ='$id'");
                 $result->execute();
       header('location: edit_form.php');
        }




        ?>
<body>
                    
     <div class="bg-modal" style="padding-top: 15%;">
                <div class="modal-content" style="padding-top: 20px;height: 350px;">
                    <div class="row justify-content-center">
                    

                    <form action="" method="POST">
                        <div class="form-group">
                            
                            <input type="text" name="event_name" placeholder="event name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="datetime-local" name="begin" placeholder="Event beginning" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="datetime-local" name="finish" placeholder="Event ending" class="form-control">
                        </div>
                        <!--<div class="form-group">
                       <select name="option" class="browser-default custom-select">
  <option selected>choose one option</option>
  <option value="category">category of food</option>
  <option value="meal">meal</option>
  
</select>
</div>
        
<div class="form-group">
                            <input type="text" name="choice" placeholder="name or type of the meal" class="form-control">
                        </div> 
                   -->

  

                        <div class="form-group">
                            <p>Discount: </p>

                        <div class="box" style="top: 170px; right: 55px;">
                            <center><div id="value"></div></center>
                        </div>
                        <div class="container" style="top: 120px;
                         left: 40%; padding-bottom: 10px;">
                            <input type="range" name="remise" min="0" max="100" class="slider" id="slider">
                        </div>
                          </br></br>
                         <div class="form-group"> 
  
                        
                          
                            <button type="submit" name="update"   class="btn btn-primary">Update event</button>
                        </div>
<script type="text/javascript">
    var slider=document.getElementById("slider");
    var val=document.getElementById("value");
    val.innerHTML=slider.value;
    slider.oninput=function(){
        val.innerHTML=this.value;
    }
</script>

</div>                       




 
                </div>
  
                </div>

            </div>
        </form>
    </div>
</div>

 </div>