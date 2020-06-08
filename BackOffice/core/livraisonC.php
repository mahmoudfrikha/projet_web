<?PHP

//include ("../config.php");
include_once "../config.php";

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
		$sql="SELECT * FROM livreur where status=disponible";
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
		$sql="UPDATE livraison SET adresse=:adresse telephone1=:telephone1 telephone2=:telephone2 Email=:Email WHERE id=:id";
		
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



	function calcullivreur($id){
		$sql="SELECT * FROM livraison WHERE id_livreur='$id' and status='En cours'";
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


	function VerifLivreur(){
		$sql="UPDATE livreur SET status=:status WHERE cin=:cin";
		$db = config::getConnexion();
		try{
			$list=$this->afficherlivraison();

			foreach ($list as $row){
			$req=$db->prepare($sql);
			$nombre=$this->calcullivreur($row['id_livreur']);
			/*si le nombre > ou = a 3*/
			if($nombre>2) {
				$req->bindValue(':cin',$row['id_livreur']);
				$req->bindValue(':status',"Non disponible");
			}
			else{
				$req->bindValue(':cin',$row['id_livreur']);
				$req->bindValue(':status',"disponible");
			}
				$req->execute();
			}

		}
		catch (Exception $e){
			echo " Erreur ! ".$e->getMessage();
		}
	}

	function choisirlivreur($livr,$id){
		$sql="UPDATE livraison SET id_livreur=:id_livreur WHERE id=:id";

		$db = config::getConnexion();
		try{
			$req=$db->prepare($sql);
			$req->bindValue(':id_livreur',$livr);
			$req->bindValue(':id',$id);
			$req->execute();

			

		}
		catch (Exception $e){
			echo " Erreur ! ".$e->getMessage();
		}

	}
	



	function choisirlivraison_livreur($id_livreur){
		$sql="UPDATE livraison SET id_livreur=:id_livreur WHERE id_livreur=:id";

		$db = config::getConnexion();
		try{
			$req=$db->prepare($sql);
			$req->bindValue(':id_livreur',0);
			$req->bindValue(':id',$id_livreur);
			$req->execute();
		}
		catch (Exception $e){
			echo " Erreur ! ".$e->getMessage();
		}
	}











}







?>


