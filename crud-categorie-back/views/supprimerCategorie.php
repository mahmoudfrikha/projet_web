<?PHP
include "../core/CategorieC.php";

$CategorieC=new CategorieC();
if (isset($_POST["categorieID"])){
	$CategorieC->supprimerCategorie($_POST["categorieID"]);
	header('Location: afficherCategorie.php');
}

?>