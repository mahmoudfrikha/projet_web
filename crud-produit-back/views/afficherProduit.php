<HTML>
<head>
	<link rel="stylesheet" href="/bs/css/bootstrap.min.css" >

</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<?PHP
include "../core/ProduitC.php";


if (isset($_GET['sort'])) {
	$query = $_GET['sort'];
	
	$Produit1C=new ProduitC();

	$listeProduit=$Produit1C->afficherProduitsTri($query);
}
else {
	
	$Produit1C=new ProduitC();
	$listeProduit=$Produit1C->afficherProduits();
}

?>
<table class="table table-hover">
<tr>
<td><a href="afficherProduit.php?sort=produitID">ID</a></td>
<td><a href="afficherProduit.php?sort=nomProduit">Nom produit</a></td>
<td><a href="afficherProduit.php?sort=typeProduit">type produit</a></td>
<td><a href="afficherProduit.php?sort=prixProduit">Prix</a></td>
<td>Catégorie</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeProduit as $row){
	?>
	<tr>
	<td><?PHP echo $row['produitID']; ?></td>
	<td><?PHP echo $row['nomProduit']; ?></td>
	<td><?PHP echo $row['typeProduit']; ?></td>
	<td><?PHP echo $row['prixProduit']; ?></td>
	<td><?PHP echo $row['nomCategorie']; ?></td>
	<td><form method="POST" action="supprimerProduit.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['produitID']; ?>" name="produitID">
	    

	</form>

	</td>
	<td><a href="modifierProduit.php?produitID=<?PHP echo $row['produitID']; ?>">
	Modifier</a></td>
	</tr>

	<?PHP
}
?>
</table>

	