<HTML>
<head>
   <link rel="stylesheet" href="/bs/css/bootstrap.min.css" >

</head>
<body>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php 
include "../entities/Produit.php";
include "../core/ProduitC.php";

if (isset($_GET['query'])) {
	$query = $_GET['query'];
	$filteredProducts = ProduitC::rechercher($query);
}
else {
	$filteredProducts = null;

}?>


	<form action="rechercherProduit.php" method="get">
		Nom du produit <input type="text" name="query"> <button type="submit" class="btn btn-secondary"> Rechercher </button></form>
<head>
  <script>
         function functionConfirm(msg, myYes, myNo) {
            var confirmBox = $("#confirm");
            confirmBox.find(".message").text(msg);
            confirmBox.find(".yes,.no").unbind().click(function() {
               confirmBox.hide();
            });
            confirmBox.find(".yes").click(myYes);
            confirmBox.find(".no").click(myNo);
            confirmBox.show();
         }

         function isValidForm() {
         	if (deleteconfirm == false)
         		return (false)
         	else
         		return(true);

         }
      </script>

     <style>
         #confirm {
            display: none;
            background-color: #91FF00;
            border: 1px solid #aaa;
            position: fixed;
            width: 250px;
            left: 50%;
            margin-left: -100px;
            padding: 6px 8px 8px;
            box-sizing: border-box;
            text-align: center;
         }
         #confirm button {
            background-color: #48E5DA;
            display: inline-block;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 5px;
            text-align: center;
            width: 80px;
            cursor: pointer;
         }
         #confirm .message {
            text-align: left;
         }
      </style>
  </head>

<body>

<div id="confirm">
         <div class="message"></div>
         <button class="yes">Yes</button>
         <button class="no">No</button>
      </div>


	<table class="table table-hover">
	<tr>
	<td>ID</td>
	<td>Nom produit</td>
	<td>Type produit</td>
	<td>Prix produit</td>
	<td>Catégorie</td>
	</tr>

	<?PHP
	if ($filteredProducts != null)
		foreach($filteredProducts as $row){
	?>

	<tr>
	<td><?PHP echo $row['produitID']; ?></td>
	<td><?PHP echo $row['nomProduit']; ?></td>
	<td><?PHP echo $row['typeProduit']; ?></td>
	<td><?PHP echo $row['prixProduit']; ?></td>
	<td><?PHP echo $row['nomCategorie']; ?></td>
	<td>

		<form method="POST" action="supprimerProduit.php" onsubmit="return isValidForm()" >
	<input type="submit" class="btn btn-outline-danger" name="supprimer" value="supprimer" onclick='deleteconfirm = confirm("Cliquer sur OK pour confirmer, sinon sur annuler pour Annuler!"); return deleteconfirm'>
	<input type="hidden" value="<?PHP echo $row['produitID']; ?>" name="produitID">
	</form>
	</td>
	<td><a class="btn btn-primary" role="button" href="modifierProduit.php?produitID=<?PHP echo $row['produitID']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>
</body>
