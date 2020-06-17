<?PHP
include "../core/ProduitC.php";

$ProduitC=new ProduitC();
if (isset($_POST["produitID"])){
	$ProduitC->supprimerProduit($_POST["produitID"]);
	//header("Refresh:0");
		header('Location: afficherProduit.php');

}
?>