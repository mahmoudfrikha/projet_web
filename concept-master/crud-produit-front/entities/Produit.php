<?PHP
class Produit{
	
	private $produitID;
	private $nomProduit;
	private $typeProduit;
	private $prixProduit;
	function __construct($produitID,$nomProduit,$typeProduit,$prixProduit){
		$this->produitID=$produitID;
		$this->nomProduit=$nomProduit;
		$this->typeProduit=$typeProduit;
		$this->prixProduit=$prixProduit;
	}
	
	function getproduitID(){
		return $this->produitID;
	}
	function getnomProduit(){
		return $this->nomProduit;
	}
	function gettypeProduit(){
		return $this->typeProduit;
	}
	function getprixProduit(){
		return $this->prixProduit;
	}
	

	function setproduitID($produitID){
		$this->produitID=$produitID;
	}
	function setnomProduit($nomProduit){
		$this->nomProduit;
	}
	function settypeProduit($typeProduit){
		$this->typeProduit=$typeProduit;
	}
	function setprixProduit($prixProduit){
		$this->prixProduit=$prixProduit;
	}
	
}

?>