<?PHP
include "../config.php";

class CategorieC {

	function afficherCategorie ($Categorie){
		echo "Categorie ID: ".$Categorie->getcategorieID()."<br>";
		echo "Nom categorie: ".$Categorie->getnomCategorie()."<br>";
		echo "type categorie: ".$Categorie->gettype()."<br>";
		
	}

	function ajouterCategorie($Categorie){
		
        
		$sql="insert into categorie (nomCategorie,type) values (:nomCategorie,:type)";
  $db = config::getConnexion();
		try{
			$req=$db->prepare($sql);
        
		$nomCategorie=$Categorie->getnomCategorie();
        $type=$Categorie->gettype();
		
        
		$req->bindValue(':nomCategorie',$nomCategorie);
		$req->bindValue(':type',$type);
		
        $req->execute();
          
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCategories(){

		$sql="SElECT * From categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function getCategoryNames(){
		echo "Hello 1";
		
		$sql="SElECT 	nomCategorie From categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		while ($data = $liste->fetch())
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

     

	}


	function supprimerCategorie($categorieID){
		$sql="DELETE FROM categorie where categorieID= :categorieID";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':categorieID',$categorieID);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierCategorie($Categorie,$categorieID){
		$sql="UPDATE categorie SET categorieID=:categorieID, nomCategorie=:nomCategorie,type=:type WHERE categorieID=:categorieID";
		
		$db = config::getConnexion();
try{		
	
        $req=$db->prepare($sql);
		$categorieIDD=$Categorie->getcategorieID();
        $nomCategorie=$Categorie->getnomCategorie();
        $type=$Categorie->gettype();
		$datas = array(':categorieIDD'=>$categorieIDD, ':categorieID'=>$categorieID, ':nomCategorie'=>$nomCategorie,':type'=>$type);
		$req->bindValue(':categorieIDD',$categorieIDD);
		$req->bindValue(':categorieID',$categorieID);
		$req->bindValue(':nomCategorie',$nomCategorie);
		$req->bindValue(':type',$type);
		
            $s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
		
	}
	function recupererCategorie($categorieID){
		
		$sql="SELECT * from categorie where categorieID=$categorieID";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherCategorie($type){
		
		$sql="SELECT * from categorie where type=$type";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>