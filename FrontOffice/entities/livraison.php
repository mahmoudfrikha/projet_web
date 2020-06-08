<?PHP
class livraison{
	private $id;
	private $adresse;
	private $date;
	private $id_livreur;
	private $id_client;
	private $id_commande;
	private $telephone1;
	private $telephone2;
  


    public function __construct($adresse, $id_client, $id_commande, $telephone1, $telephone2 )
    {
        $this->adresse = $adresse;
        $this->id_client = $id_client;
        $this->id_commande = $id_commande;
        $this->telephone1 = $telephone1;
        $this->telephone2 = $telephone2;
       
     }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getAdresse()
    {
        return $this->adresse;
    }


    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function setDate($date)
    {
        $this->date = $date;
    }


    public function getIdLivreur()
    {
        return $this->id_livreur;
    }


    public function setIdLivreur($id_livreur)
    {
        $this->id_livreur = $id_livreur;
    }


    public function getIdClient()
    {
        return $this->id_client;
    }


    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }


    public function getIdCommande()
    {
        return $this->id_commande;
    }


    public function setIdCommande($id_commande)
    {
        $this->id_commande = $id_commande;
    }


    public function getTelephone1()
    {
        return $this->telephone1;
    }


    public function setTelephone1($telephone1)
    {
        $this->telephone1 = $telephone1;
    }


    public function getTelephone2()
    {
        return $this->telephone2;
    }


    public function setTelephone2($telephone2)
    {
        $this->telephone2 = $telephone2;
    }


   

}

?>