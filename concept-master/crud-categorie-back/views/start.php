<?PHP
include "../entities/Categorie.php";
include "../core/CategorieC.php";

$Categorie=new Categorie(75757575,'Pizza','Diner');
$CategorieC=new CategorieC();
$CategorieC->afficherCategorie($Categorie);
echo "****************";
echo "<br>";
echo "stockID:".$Categorie->getcategorieID();
echo "<br>";
echo "quantiteStock:".$Categorie->getnomCategorie();
echo "<br>";
echo "typeStock:".$Categorie->gettype();
echo "<br>";


?>