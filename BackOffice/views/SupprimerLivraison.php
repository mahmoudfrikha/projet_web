
<?php
include "../core/livraisonC.php";
include "../views/nabil0/BackOffice/views/push";

$livc=new livraisonC();
if(isset($_GET['id'])){
    $livc->supprimerlivraison($_GET['id']);








    ?>






<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="push.min.js"></script>
<script src="serviceWorker.min.js"></script>


    <script>
        document.location.replace("livraison.html") ;




        Push.create("Livraison Supprimer !", {
		body: "Sucées",
		icon: 'https://previews.123rf.com/images/coolvectorstock/coolvectorstock1808/coolvectorstock180802556/106911764-blood-sample-vector-icon-isolated-on-transparent-background-blood-sample-logo-concept.jpg',
		timeout: 4000,
		onClick: function () {
			window.focus();
			this.close();
		}
	});



    </script>
    <?php
}
?>