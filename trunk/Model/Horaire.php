<?php
class Model_Horaire implements Model
{
	// Attribut:
	private $heureDebut;
	private $heureFin;
	private $Date;
	
	
	
	/**
	 * Constructeur d'un utilisateur
	 * @param
	 */
	public function __construct ($heureDebut=null, $heureFin, $Date) {
		$this->heureDebut=$heureDebut;
		$this->heureFin=$heureFin;
		$this->Date=$Date;
		
	}
	//getters
	 public function getHeureDebut(){
	 	return $this->heureDebut;
	 }
	 public function getHeureFin(){
	 	return $this->heureFin;
	 }
	 public function getDate(){
	 	return $this->Date;
	 }
	 //setters
	 public function setHeureDebut($var){
	 	 $this->heureDebut=$var;
	 }
	 public function setHeureFin($var){
	 	$this->heureFin=$var;
	 }
	 public function setDate($var){
	 	$this->Date=$var;
	 }
	 
	 
	
	public function save() {
		$res = App_Mysql::getInstance()->query("SELECT heureDebut,heureFin,Date FROM horaire WHERE heureDebut='".App_Mysql::getInstance()->quote($this->heureDebut."' AND heureFin='".App_Mysql::getInstance()->quote($this->heureFin)."'AND date='".App_Mysql::getInstance()->quote($this->Date)."'"));
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			//Do nothing
		}
		else{
			if($this->heureDebut!=null && $this->heureFin!=null && $this->Date!=null){
				$res = App_Mysql::getInstance()->query("INSERT INTO horaire (heureDebut,heureFin,Date) VALUES('".App_Mysql::getInstance()->quote($this->heureDebut)."','".App_Mysql::getInstance()->quote($this->heureFin)."','".App_Mysql::getInstance()->quote($this->Date)."')");
			}
		}
	}
	
	// return null si aucun user n'a cet id sinon une instance de la classe User
	public static function load($numeroSalle,$nomBatiment) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT heureDebut,heureFin,Date FROM horaire WHERE heureDebut='".App_Mysql::getInstance()->quote($this->heureDebut."' AND heureFin='".App_Mysql::getInstance()->quote($this->heureFin)."'AND date='".App_Mysql::getInstance()->quote($this->Date)."'"));
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new Model_Horaire($tuple["heureDebut"],$tuple["heureFin"],$tuple["Date"]);
		}
		return $ret;
	}
	
	
}
?>