
<?php
require_once ('../config.php');
class ProduitC{

	function afficherProduit ($Produit){
		echo "ID: ".$Produit->getproduitID()."<br>";
		echo "nomProduit: ".$Produit->getnomProduit()."<br>";
		echo "typeProduit: ".$Produit->gettypeProduit()."<br>";
		echo "prixProduit: ".$Produit->getprixProduit()."<br>";
	}


	function ajouterProduit($Produit){
		var_dump($Produit);

		$sql="insert into produit (nomProduit,typeProduit,prixProduit, categorie_id) values (:nomProduit,:typeProduit,:prixProduit,:categorie)";
		
		$db = config::getConnexion();
		var_dump($db);

		try{
        $req=$db->prepare($sql);
		
        $nomProduit=$Produit->getnomProduit();
        $typeProduit=$Produit->gettypeProduit(); 
        $prixProduit=$Produit->getprixProduit();
        $x = $Produit->getCategory();
		$req->bindValue(':nomProduit',$nomProduit);
		$req->bindValue(':typeProduit',$typeProduit);
		$req->bindValue(':prixProduit',$prixProduit);
		$req->bindValue(':categorie',$x);
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherProduits(){
		$sql="SElECT produit.produitID,  produit.nomProduit, produit.typeProduit, produit.prixProduit, categorie.nomCategorie From produit, categorie Where produit.categorie_id =categorie.categorieID";
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function afficherProduitsTri($triCriteria){
		$sql="SElECT produit.produitID,  produit.nomProduit, produit.typeProduit, produit.prixProduit, categorie.nomCategorie From produit, categorie Where produit.categorie_id =categorie.categorieID ORDER BY produit." .$triCriteria;
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function supprimerProduit($produitID){
		$sql="DELETE FROM produit where produitID= :produitID";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':produitID',$produitID);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierProduit($Produit){
		$sql="UPDATE produit SET nomProduit=:nomProduit2,typeProduit=:typeProduit2,prixProduit=:prixProduit2, categorie_id=:categoryID2 WHERE produitID=:produitID2";
		
		$db = config::getConnexion();
		try{		
			

	        $req=$db->prepare($sql);
	        
	        
			$produitID=$Produit->getproduitID();
			echo ('$produitID='.$produitID);
	        $nomProduit=$Produit->getnomProduit();
	        $typeProduit=$Produit->gettypeProduit();
	        $prixProduit=$Produit->getprixProduit();
	        $categoryID=$Produit->getCategory();
	        

			$datas = array(':produitID2'=>$produitID, ':nomProduit2'=>$nomProduit,':typeProduit2'=>$typeProduit,':prixProduit2'=>$prixProduit, ':categoryID2'=>$categoryID);
			$req->bindValue(':produitID2',$produitID);
			$req->bindValue(':nomProduit2',$nomProduit);
			$req->bindValue(':typeProduit2',$typeProduit);
			$req->bindValue(':prixProduit2',$prixProduit);
			$req->bindValue(':categoryID2',$categoryID);		
		

            $s=$req->execute();
            echo ($s);
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
		
	}

	function recupererProduit($produitID)
	{
		$sql="SELECT * from produit where produitID=$produitID";
		$db = config::getConnexion();
		try
		{
			$liste=$db->query($sql);
			return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
    	}
	}


	public static function rechercher($nomProduit)
	{
		$conn = config::getConnexion();
		$query = $conn->prepare('SElECT produit.produitID,  produit.nomProduit, produit.typeProduit, produit.prixProduit, categorie.nomCategorie From produit, categorie Where produit.categorie_id =categorie.categorieID And nomProduit LIKE ?');
		$query->execute(array($nomProduit.'%'));
		return $query->fetchAll();
	}
}
?>


