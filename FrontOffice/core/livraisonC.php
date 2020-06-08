<?PHP

include ("../config.php");
include ("../entities/livraison.php");

class livraisonC {

	function ajouterlivraison($livraison){
		$sql="INSERT INTO livraison (adresse,id_livreur,id_client,id_commande,telephone1,telephone2) VALUES (:adresse,:id_livreur,:id_client,:id_commande,:telephone1,:telephone2)";
		$db = config::getConnexion();
		try{
			$req=$db->prepare($sql);
			$req->bindValue(':adresse',$livraison->getAdresse());

			$list=$this->LivreurDiponible();
			foreach ($list as $row){
				$req->bindValue(':id_livreur',$row['cin']);
			}

			$req->bindValue(':id_client',$livraison->getIdClient());
			$req->bindValue(':id_commande',$livraison->getIdCommande());
			$req->bindValue(':telephone1',$livraison->getTelephone1());
			$req->bindValue(':telephone2',$livraison->getTelephone2());
			
			$req->execute();

		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}

	}

	function LivreurDiponible(){
		$disponible="disponible";
		$sql="SELECT * FROM livreur where status='$disponible'";
		$db = config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
		

	function afficherlivraison(){
		$sql="SELECT livraison.*,livreur.nom,client.prenom FROM livraison INNER JOIN livreur on livraison.id_livreur=livreur.cin INNER JOIN client on livraison.id_client=client.id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerlivraison($id){
		$sql="DELETE FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierlivraison($livraison,$idd){
		$sql="UPDATE livraison SET adresse=:adresse telephone1=:telephone1 telephone2=:telephone2 WHERE id=:id";
		
		$db = config::getConnexion();
	try{
		$req=$db->prepare($sql);
		$req->bindValue(':adresse',$livraison->getAdresse());
		$req->bindValue(':telephone1',$livraison->getTelephone1());
		$req->bindValue(':telephone2',$livraison->getTelephone2());
		$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

	function recupererlivraison($id){
		$sql="SELECT * from livraison where id='$id'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

	}

	function recupererlivraisons($userid){
		$sql="SELECT * from livraison where id_client='$userid'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

	}



	
	function rechercherlivraisons($delivery_man){
		$sql="SELECT livraison.*,livreur.nom,client.prenom FROM livraison INNER JOIN livreur on livraison.id_livreur=livreur.cin INNER JOIN client on livraison.id_client=client.id WHERE livreur.nom LIKE '%".$delivery_man."%'";
		$db = config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function calculerLivraison($status){
		$sql="SELECT * FROM livraison where status='$status'";
		$db = config::getConnexion();
		try{
			$liste=$db->query($sql);
			$nombre=$liste->rowCount();
			return $nombre;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}


	function ModifStatus($id){
		$sql="UPDATE livraison SET status=:status WHERE id=:id";

		$db = config::getConnexion();
		try{
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);

			$list=$this->recupererlivraison($id);
			foreach ($list as $row){
				if($row['status']=="En cours"){
					$req->bindValue(':status',"Livre");
				}
				else{
					$req->bindValue(':status',"En cours");
				}
			}

			$req->execute();
		}
		catch (Exception $e){
			echo " Erreur ! ".$e->getMessage();
		}

	}

	function verifCommande($id){
		$sql="SELECT * FROM commande where idc='$id'";
		$db = config::getConnexion();
		try{
			$liste=$db->query($sql);
			$nombre=$liste->rowCount();
			if($nombre>0){
				$sql1="SELECT * FROM livraison where id_commande='$id'";
				$liste1=$db->query($sql1);
				$nombre1=$liste1->rowCount();
				if($nombre1>0){
					return 0;
				}
				else
				{
					return 1;
				}
			}
			else{
				return 0;
			}
			
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}

}




?>


