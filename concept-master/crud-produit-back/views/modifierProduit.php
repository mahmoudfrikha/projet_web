<HTML>
<head>

	<head>	
		<link rel="stylesheet" href="/bs/css/bootstrap.min.css" >
	</head>
	<body>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<?PHP
		//include "../../crud-categorie-back/core/CategorieC.php"; 
		include "../entities/Produit.php";
		include "../core/ProduitC.php";
		$categories = new CategorieC();
		$bdd = new PDO('mysql:host=localhost;port=3308;dbname=atelier_3', 'root', 'root');
		$sql = 'SELECT nomCategorie FROM categorie';
		foreach ($bdd->query($sql) as $row) {
		}	



		if (isset($_GET['produitID'])){


			$ProduitC=new ProduitC();
			
			$result=$ProduitC->recupererProduit($_GET['produitID']);
			
			foreach($result as $row){
				$produitID=$row['produitID'];
				$nomProduit=$row['nomProduit'];
				$typeProduit=$row['typeProduit'];
				$prixProduit=$row['prixProduit'];
				$categoryID =$row['categorie_id'];

				//echo $produitID. $nomProduit. $typeProduit. $prixProduit. $categoryID;
				?>

				<form method="POST">
					<table class="table table-hover">
						<legend>Modifier produit</legend>
						<tr>
							<td>nom Produit</td>
							<td><input type="text" name="nomProduit" value="<?PHP echo $nomProduit ?>"></td>
						</tr>
						<tr>
							<td>type Produit</td>
							<td><input type="text" name="typeProduit" value="<?PHP echo $typeProduit ?>"></td>
						</tr>
						<tr>
							<td>prix Produit</td>
							<td><input type="number" name="prixProduit" value="<?PHP echo $prixProduit ?>"></td>
						</tr>
						<tr>
							<td>Catégorie</td>
							<td>

								<select name="category"> 
						<option>
							<?php $sth = $bdd->prepare("SELECT nomCategorie, categorieID FROM categorie");
							$sth->execute();
							while ($row = $sth->fetch()){
								echo '<option value="'.$row["categorieID"].'"';
								if ($row["categorieID"] == $categoryID) 
									echo ' selected'; 
								echo ' >'.$row["nomCategorie"].'</option>';
							}
							?>  </option>
						</select>
								

								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="modifier" value="modifier"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="hidden" name="produitID_ini" value="<?PHP echo $_GET['produitID'];?>"></td>
							</tr>
						</table>
					</form>
					<?PHP
				}
			}
			if (isset($_POST['modifier'])){
				$cid = $_POST['category'];
				
				$Produit=new produit($_POST['nomProduit'],$_POST['typeProduit'],$_POST['prixProduit'], $categoryID);
				$Produit->setproduitID ($produitID);

				$ProduitC->modifierProduit($Produit);
				//header('Location: afficherProduit.php');
			}
			?>
		</body>
	</HTMl>