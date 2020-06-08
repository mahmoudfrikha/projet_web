<?php
include "../core/livraisonC.php";
$liv=new livraisonC();
if(isset($_GET['id'])){
    $liv->ModifStatus($_GET['id']);
    ?>
    <script>
        document.location.replace("livraison.html") ;
    </script>
    <?php
}
?>