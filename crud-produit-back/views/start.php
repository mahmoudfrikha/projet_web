<?PHP
include "../entities/Produit.php";
include "../core/ProduitC.php";

$Produit=new Produit(75757575,'3ejja','diner',50.55);
$ProduitC=new ProduitC();
$ProduitC->afficherProduit($Produit);
echo "****************";
echo "<br>";
echo "produitID:".$Produit->getproduitID();
echo "<br>";
echo "nomProduit:".$Produit->getnomProduit();
echo "<br>";
echo "typeProduit:".$Produit->gettypeProduit();
echo "<br>";
echo "prixProduit:".$Produit->getprixProduit();
echo "<br>";
?>