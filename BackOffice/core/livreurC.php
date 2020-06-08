<?PHP
//telephone,email,code_postal
include ("../config.php");
include ("livraisonC.php");

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
		$sql="INSERT INTO livreur (cin,nom,prenom,adresse,ville,telephone,email) VALUES (:cin,:nom,:prenom,:adresse,:ville,:telephone)";
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
	    $livrais=new livraisonC();
	    $livrais->choisirlivraison_livreur($cin);
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

    function afficherlivreurdiponibles(){
        $sql="SELECT * FROM livreur WHERE status='disponible'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
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
    function envoyermail($email,$texte){

    	require 'PHPMailer-master/PHPMailerAutoload.php';
        	$mail = new PHPMailer();
        	$mail->IsSmtp();
        	$mail->SMTPAuth = true;
        	$mail->Debugoutput='html';
        	$mail->Host = "smtp.gmail.com";
        	$mail->Port =  587;
        	$mail->isHTML(true);
        	$mail->Username = "tunisgottalent@gmail.com";
        	$mail->Password = "t20202020";
        	$mail->setFrom("tunisgottalent@gmail.com");
        	$mail->Subject = "Benna!";
        	$mail->Body= $texte;
        	$mail->AltBody ="";
        	$mail->AddAddress($email); //
        	$mail->SMTPOptions = array(
            	'ssl' => array(
                	'verify_peer' => false,
                	'verify_peer_name' => false,
                	'allow_self_signed' => true
            	)
        	);


        	if (!$mail->send())
        	{
            	echo "Mailer Error: " . $mail->ErrorInfo;
        	}
    }



}

?>