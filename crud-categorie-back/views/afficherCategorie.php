<?PHP
include "../core/CategorieC.php";
$Categorie1C=new CategorieC();
$listeCategorie=$Categorie1C->afficherCategories();
 
?>
<head>
	<link rel="stylesheet" href="/bs/css/bootstrap.min.css" >

</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<table class="table table-hover">
<tr>
<td>categorie ID</td>
<td>nom Categorie</td>
<td>type Categorie</td>
<td>supprimer</td>
<td>modifier</td>


</tr>

<?PHP
foreach($listeCategorie as $row){
	?>
	<tr>
	<td><?PHP echo $row['categorieID']; ?></td>
	<td><?PHP echo $row['nomCategorie']; ?></td>
	<td><?PHP echo $row['type']; ?></td>
	<td><form method="POST" action="supprimerCategorie.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['categorieID']; ?>" name="categorieID">
	</form>
	</td>
	<td><a href="modifierCategorie.php?categorieID=<?PHP echo $row['categorieID']; ?>">
	Modifier</a></td>
	
		</tr>
	<?PHP
}
?>
</table>


