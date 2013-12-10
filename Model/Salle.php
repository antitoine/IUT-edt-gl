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
	public function __construct ($numeroSalle=null,$nomBat=null,$capacite=null,$specifications=null) {
		$this->numeroSalle=$numeroSalle;
		$this->nomBat=$nomBat;
		$this->capacite=$capacite;
		$this->specifications=$specifications;
	}
	 public function getNumeroSalle(){
	 	return $this->numeroSalle;
	 }
	 public function getNomBat(){
	 	return $this->nomBat;
	 }
	 public function getCapacite(){
	 	return $this->capacite;
	 }
	 public function getSpecification(){
	 	return $this->specifications;
	 }
	 //setter
	 public function setNumeroSalle($var){
	 	 $this->numeroSalle=$var;
	 }
	 public function setNomBatiment($var){
	 	 $this->nomBat=$var;
	 }
	 public function setCapacite($var){
	 	 $this->capacite=$var;
	 }
	 public function setSpecification($var){
	 	 $this->specifications=$var;
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
	public static function loadByNumSalleNomBat($numeroSalle,$nomBatiment) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT numeroSalle,nomBat,capacite,specifications FROM Salle WHERE numeroSalle='".App_Mysql::getInstance()->quote($numeroSalle)."' AND nomBat='".App_Mysql::getInstance()->quote($nomBatiment)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new Model_Salle($tuple["numeroSalle"],$tuple["nomBat"],$tuple["capacite"],$tuple["specifications"]);
		}
		return $ret;
	}
	
	public static function load($id) {
		$ret=null;
		//TODO
		return $ret;
	}
}
?>