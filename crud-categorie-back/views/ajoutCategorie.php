<?PHP
include "../entities/Categorie.php";
include "../core/CategorieC.php"; 
//if (isset($_POST['nomCategorie']) && isset($_POST['type']))
	if (isset($_POST['ajouter']))

{
	$t=$_POST['type'];

$Categorie=new Categorie(0,$_POST['nomCategorie'],$t);


$CategorieC=new CategorieC(); 
$CategorieC->ajouterCategorie($Categorie);
echo "test 1"; 
header('Location: afficherCategorie.php');	

}
else
{
	echo "vérifier les champs";
}
?>