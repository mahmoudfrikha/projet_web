
<?PHP
include "../../crud-categorie-back/core/CategorieC.php";
class Produit{
	
	private $produitID;
	private $nomProduit;
	private $typeProduit;
	private $prixProduit;
	private $categoryID;

	function __construct($nomProduit,$typeProduit,$prixProduit, $categoryID){
		$this->nomProduit=$nomProduit;
		$this->typeProduit=$typeProduit;
		$this->prixProduit=$prixProduit;
		$this->categoryID = $categoryID;
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
	
	function getCategory(){
		return $this->categoryID;
	}

	function setCategory($categoryID){
		$this->categoryID=$categoryID;
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