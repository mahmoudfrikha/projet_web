
<?php
include "../core/livraisonC.php";
include "../views/nabil0/FrontOffice/views/push";

$livc=new livraisonC();
if(isset($_GET['id'])){
    $livc->recupererlivraisons($_GET['id']);








    ?>
