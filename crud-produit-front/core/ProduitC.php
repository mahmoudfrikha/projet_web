<?PHP
include "../config.php";


// If I see your code again non formatted maadech nahkiw
// Google how to format code automatically on sublime text
class ProduitC {

	function afficherProduit ($Produit){
		echo "ID: ".$Produit->getproduitID()."<br>";
		echo "nomProduit: ".$Produit->getnomProduit()."<br>";
		echo "typeProduit: ".$Produit->gettypeProduit()."<br>";
		echo "prixProduit: ".$Produit->getprixProduit()."<br>";
	}


	function ajouterProduit($Produit){
		var_dump($Produit);

		$sql="insert into produit (nomProduit,typeProduit,prixProduit) values (:nomProduit,:typeProduit,:prixProduit)";
		
		$db = config::getConnexion();
		var_dump($db);

		try{
        $req=$db->prepare($sql);
		
        $nomProduit=$Produit->getnomProduit();
        $typeProduit=$Produit->gettypeProduit(); // bad method names
        $prixProduit=$Produit->getprixProduit();
		$req->bindValue(':nomProduit',$nomProduit);
		$req->bindValue(':typeProduit',$typeProduit);
		$req->bindValue(':prixProduit',$prixProduit);
		
		// stop using sublime text
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherProduits(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From produit";
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
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierProduit($Produit,$produitID){
		$sql="UPDATE produit SET produitID=:produitID, nomProduit=:nomProduit,typeProduit=:typeProduit,prixProduit=:prixProduit WHERE produitID=:produitID";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
	
        $req=$db->prepare($sql);
		$produitIDD=$Produit->getproduitID();
        $nomProduit=$Produit->getnomProduit();
        $typeProduit=$Produit->gettypeProduit();
        $prixProduit=$Produit->getprixProduit();
		$datas = array(':produit'=>$produitIDD, ':produitID'=>$produitID, ':nomProduit'=>$nomProduit,':typeProduit'=>$typeProduit,':prixProduit'=>$prixProduit);
		$req->bindValue(':stockIDD',$produitIDD);
		$req->bindValue(':produitID',$produitID);
		$req->bindValue(':nomProduit',$nomProduit);
		$req->bindValue(':typeProduit',$typeProduit);
		$req->bindValue(':prixProduit',$prixProduit);		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererProduit($produitID){
		
		$sql="SELECT * from produit where produitID=$produitID";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	/*function rechercherListeStock($typeProduit){
		
		$sql="SELECT * from produit where tarifHoraire=$typeProduit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}

?>