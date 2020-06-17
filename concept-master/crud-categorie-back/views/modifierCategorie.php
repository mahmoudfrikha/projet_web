<HTML>
<head>
	<link rel="stylesheet" href="/bs/css/bootstrap.min.css" >

</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?PHP
include "../entities/Categorie.php";
include "../core/CategorieC.php";
if (isset($_GET['categorieID'])){
	
	$CategorieC=new CategorieC();
    $result=$CategorieC->recupererCategorie($_GET['categorieID']);
	foreach($result as $row){
		$categorieID=$row['categorieID'];
		$nomCategorie=$row['nomCategorie'];
		$typeCategorie=$row['type'];
?>
<form method="POST">
<table class="table table-hover">
<legend>Modifier categorie</legend>

<td>Nom categorie</td>
<td><input type="text" name="nomCategorie" value="<?PHP echo $nomCategorie ?>"></td>
</tr>
<tr>
<td>type categorie</td>
<td><input type="text" name="type" value="<?PHP echo $typeCategorie ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="categorieID_ini" value="<?PHP echo $_GET['categorieID'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$Categorie=new Categorie($_POST['nomCategorie'],$_POST['type']);
					$Categorie->setcategorieID ($categorieID);

	$CategorieC->modifierCategorie($Categorie,$_POST['categorieID_ini']);
	echo $_POST['categorieID_ini'];
	header('Location: afficherCategorie.php');
}
?>
</body>
</HTMl>
 <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->