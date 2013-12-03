<?php
class Model_Etudiant extends Model_User implements Model
{
	// Attribut:
	private $idGrp;
	
	/**
	* Constructeur d'un etud
	* @param 
	*/
	public function __construct ($id=null,$email=null,$nom=null,$prenom=null,$mdp=null,$type=null,$idGrp=null) {
		$super($id,$email,$nom,$prenom,$mdp,$type);
		$this->idGrp=$idGrp;
	}
	
	/**
	* Sauvegarde ou update
	*/
	public function save() {
		$super->save();
		$res = App_Mysql::getInstance()->query("SELECT * FROM Etudiant WHERE idEtud='".App_Mysql::getInstance()->quote($this->id)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$res = App_Mysql::getInstance()->query("UPDATE Etudiant SET idGroup='".mysql_real_escape_string($this->idGroup)."' WHERE idEtud='".$this->id."';");
		}
		else{
			if($this->idGrp!=null){
				$res = App_Mysql::getInstance()->query("INSERT INTO Etudiant (idEtud,idGroup) VALUES('".App_Mysql::getInstance()->quote($this->idEtud)."','".App_Mysql::getInstance()->quote($this->idGrp)."')");
			}
		}
	}

	/**
	* return null si aucun user n'a cet id sinon une instance de la classe User
	*/
	public static function load($id) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT * FROM Personne p, Etudiant e WHERE p.identifiant='".App_Mysql::getInstance()->quote($id)."' AND e.idEtud='".App_Mysql::getInstance()->quote($id)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new Model_Etudiant($tuple["p.identifiant"],$tuple["p.email"],$tuple["p.nom"],$tuple["p.prenom"],$tuple["p.mdp"],$tuple["p.droit"],$tuple["e.idGroup"]);
		}
		return $ret;
	}
	
	public function getIdGrp(){ return $this->idGrp; }
	public function setIdGrp($s){ $this->idGrp=$s; }
}
