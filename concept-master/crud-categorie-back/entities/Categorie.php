<?PHP
class Categorie{
	private $categorieID;
	private $nomCategorie;
	private $type;
	function __construct($nomCategorie,$type){
		$this->nomCategorie=$nomCategorie;
		$this->type=$type;
	}
	
	function getcategorieID(){
		return $this->categorieID;
	}
	function getnomCategorie(){
		return $this->nomCategorie;
	}
	function gettype(){
		return $this->type;
	}
	

	function setcategorieID($categorieID){
		$this->categorieID=$categorieID;
	}
	function setnomCategorie($nomCategorie){
		$this->nomCategorie;
	}
	function settype($type){
		$this->type=$type;
	}
	
}

?>