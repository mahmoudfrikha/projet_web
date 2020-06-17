
<?PHP
include "../entities/Produit.php";
include "../core/ProduitC.php"; 

if (isset($_POST['ajouter']))
{

	$nomProduit = $_POST['nomProduit'];
	$typeProduit=$_POST['typeProduit'];
	$prixProduit=$_POST['prixProduit'];
	$category=$_POST['category'];

	$produit=new Produit($nomProduit,$typeProduit,$prixProduit, $category);

	$produitc=new ProduitC();
	$produitc->ajouterProduit($produit);

	header('Location: afficherProduit.php');	
}
else {
	echo "vérifier les champs";
}
//*/

?>