<?PHP
//telephone,email,code_postal
include ("../config.php");

class livreurC {
/*function afficherlivreur2($livreur){
		echo "cin: ".$livreur->getcin()."<br>";
		echo "nom: ".$livreur->getnom()."<br>";
		echo "prenom: ".$livreur->getprenom()."<br>";
		echo "tarif heure: ".$livreur->getville()."<br>";
		echo "nb heures: ".$livreur->getadresse()."<br>";
	}
	function calculerSalaire($livreur){
		echo $livreur->getadresse() * $livreur->getville();
	}*/
	function ajouterlivreur($livreur){
		$sql="INSERT INTO livreur (cin,nom,prenom,adresse,ville,telephone,email) VALUES (:cin,:nom,:prenom,:adresse,:ville,:telephone,:email)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $cin=$livreur->getcin();
        $nom=$livreur->getnom();
        $prenom=$livreur->getprenom();
        $adresse=$livreur->getadresse();
        $ville=$livreur->getville();
        $telephone=$livreur->gettelephone();
        $email=$livreur->getemail();

		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':telephone',$telephone);
		$req->bindValue(':email',$email);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivreur(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.cin= a.cin";
		$sql="SELECT * FROM livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivreur($cin){
		$sql="DELETE FROM livreur where cin= :cin";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}






















	
	function modifierlivreur($livreur,$cinn){
		$sql="UPDATE livreur SET cin=:cin, nom=:nom,prenom=:prenom,adresse=:adresse,ville=:ville,telephone=:telephone,email=:email WHERE cin=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$cin=$livreur->getcin();
        $nom=$livreur->getnom();
        $prenom=$livreur->getprenom();
        $adresse=$livreur->getadresse();
        $ville=$livreur->getville();
        $telephone=$livreur->gettelephone();
        $email=$livreur->getemail();
		$datas = array(':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':adresse'=>$adresse,':ville'=>$ville, ':telephone'=>$telephone,':email'=>$email);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':telephone',$telephone);
		$req->bindValue(':email',$email);

		


		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivreur($cin){
		$sql="SELECT * from livreur where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

    function rechercherLivreur($rech){
        $sql="SELECT * FROM livreur WHERE ville LIKE '%".$rech."%' OR nom LIKE '%".$rech."%' OR prenom LIKE '%".$rech."%'";
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