<HTML>
<head>
	<link rel="stylesheet" href="/bs/css/bootstrap.min.css" >

</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<?php
	include ('D:\projects\wamp64\www\crud-categorie-back\core/CategorieC.php'); 

	$categories = new CategorieC();
	$bdd = new PDO('mysql:host=localhost;port=3308;dbname=atelier_3', 'root', 'root');
	$sql = 'SELECT nomCategorie FROM categorie';
	foreach ($bdd->query($sql) as $row) {
	}

	?>

	<form method="POST" action="ajoutProduit.php">
 
		<table class="table table-hover">
			<legend>Ajouter un produit</legend>
			

			<tbody>

			<tr>
				
					<td>Nom du produit</td>
				
			<div >
				<td>
					<input type="text" name="nomProduit" placeholder="Ex: Spaghetti fruits de mer"  required>
				</td>
			</div>
			</tr>
			
			<tr>
				<td>Type du produit</td>
				<td>
					<input type="text" name="typeProduit" placeholder="Ex: Pates"required>
				</td>
			</tr>


			<tr>
				<td>Prix du produit</td>
				<td>
					<input type="number" name="prixProduit" min="1" required>
				</td>
			</tr>


			<tr>
				<td>Catégorie</td>
				<td>

					<select name="category"> 
						<option>
							<?php $sth = $bdd->prepare("SELECT nomCategorie, categorieID FROM categorie");
							$sth->execute();
							while ($row = $sth->fetch()){
								echo '<option value="'.$row["categorieID"].'">'.$row["nomCategorie"].'</option>';
							}
							?>  </option>
						</select>


					</td>
				</tr>


				<tr>
					<td/>
					<td>
						<input type="submit" name="ajouter" value="ajouter">
					</td>
				</tr>
			</tbody>
			</table>
		</form>
	</body>
</HTMl>
