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
$Produit1C=new ProduitC();
$listeProduit=$Produit1C->afficherProduits();

//var_dump($listeEmployes->fetchAll());
?>
<table class="table table-hover">
<tr>
<td>produit ID</td>
<td>nom Produit</td>
<td>type Produit</td>
<td>prix Produit</td>
</tr>

<?PHP
foreach($listeProduit as $row){
	?>
	<tr>
	<td><?PHP echo $row['produitID']; ?></td>
	<td><?PHP echo $row['nomProduit']; ?></td>
	<td><?PHP echo $row['typeProduit']; ?></td>
	<td><?PHP echo $row['prixProduit']; ?>
	</tr>
	<?PHP
}
?>
</table>

