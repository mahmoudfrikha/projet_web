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