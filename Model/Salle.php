<?php
class Model_Salle implements Model
{
	// Attribut:
	private $numeroSalle;
	private $nomBat;
	private $capacite;
	private $specifications;
	
	
	/**
	 * Constructeur d'un utilisateur
	 * @param
	 */
	public function __construct ($numeroSalle=null,$nomBat=null,$capacite=null,$specification=null) {
		$this->numeroSalle=$numeroSalle;
		$this->nomBat=$nomBat;
		$this->capacite=$capacite;
		$this->specifications=$specifications;
		
	}
	 public function getNumeroSalle(){
	 	return $this->numeroSalle;
	 }
	 public function getNomBatiment(){
	 	return $this->nomBat;
	 }
	 public function getCapacite(){
	 	return $this->capacite;
	 }
	 public function getSpecification(){
	 	return $this->specifications;
	 }
	 
	
	public function save() {
		$res = App_Mysql::getInstance()->query("SELECT numeroSalle,nomBat FROM Salle WHERE numeroSalle='".App_Mysql::getInstance()->quote($this->numeroSalle)."' AND nomBat='".App_Mysql::getInstance()->quote($this->nomBat)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$res = App_Mysql::getInstance()->query("UPDATE Salle SET capacite='".mysql_real_escape_string($this->capacite)."', specifications='".mysql_real_escape_string($this->specifications)."' WHERE numeroSalle='".$this->numeroSalle."'AND nomBat='".$this->nomBat."';");
		}
		else{
			if($this->numeroSalle!=null && $this->nomBat!=null && $this->capacite!=null && $this->specifications!=null){
				$res = App_Mysql::getInstance()->query("INSERT INTO Salle (numeroSalle,nomBat,capacite,specifications) VALUES('".App_Mysql::getInstance()->quote($this->numeroSalle)."','".App_Mysql::getInstance()->quote($this->nomBat)."','".App_Mysql::getInstance()->quote($this->capacite)."','".App_Mysql::getInstance()->quote($this->specifications)."')");
			}
		}
	}
	
	// return null si aucun user n'a cet id sinon une instance de la classe User
	public static function load($id) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT numeroSalle,nomBat FROM Salle WHERE numeroSalle='".App_Mysql::getInstance()->quote($this->numeroSalle)."' AND nomBat='".App_Mysql::getInstance()->quote($this->nomBat)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new Model_User($tuple["numeroSalle"],$tuple["nomBatiment"],$tuple["Capacite"],$tuple["Specifications"]);
		}
		return $ret;
	}
	
	
}
?>