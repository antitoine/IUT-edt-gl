<?php
class Model_Etudiant extends Model_User implements Model
{
	// Attribut:
	protected $idGrp;

    /**
     * Constructeur d'un etud
     * @param int $id
     * @param String $email
     * @param String $nom
     * @param String $prenom
     * @param String $mdp
     * @param int $type
     * @param id $idGrp
     */
	public function __construct ($id=null,$email=null,$nom=null,$prenom=null,$mdp=null,$type=null,$idGrp=null) {
		parent::__construct($id,$email,$nom,$prenom,$mdp,$type);
		$this->idGrp=$idGrp;
	}
	
	/**
	* Sauvegarde ou update d'untuple dans la base de données
	*/
	public function save() {
        parent::save();
		$res = App_Mysql::getInstance()->query("SELECT * FROM Etudiant WHERE idEtud='".App_Mysql::getInstance()->quote($this->id)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			App_Mysql::getInstance()->query("UPDATE Etudiant SET idGroupe='".mysql_real_escape_string($this->idGrp)."' WHERE idEtud='".$this->id."';");
		}
		else{
			if($this->idGrp!=null){
				App_Mysql::getInstance()->query("INSERT INTO Etudiant (idEtud,idGroupe) VALUES('".App_Mysql::getInstance()->quote($this->id)."','".App_Mysql::getInstance()->quote($this->idGrp)."')");
			}
		}
	}

	/**
	* return null si aucun user n'a cet id sinon une instance de la classe User
	*/
	public static function load($id) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT p.identifiant AS identifiant, p.email AS email, p.nom AS nom, p.prenom AS prenom, p.mdp AS mdp, p.droit AS droit, e.idGroupe AS idGroup FROM Personne p, Etudiant e WHERE p.identifiant='".App_Mysql::getInstance()->quote($id)."' AND e.idEtud='".App_Mysql::getInstance()->quote($id)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new Model_Etudiant($tuple["identifiant"],$tuple["email"],$tuple["nom"],$tuple["prenom"],$tuple["mdp"],$tuple["droit"],$tuple["idGroup"]);
		}
		return $ret;
	}

    public static function remove($id) {
        App_Mysql::getInstance()->query("DELETE FROM Etudiant WHERE idEtud='".App_Mysql::getInstance()->quote($id)."'");
    }

	//getter & setter
	public function getIdGrp(){ return $this->idGrp; }
	public function setIdGrp($s){ $this->idGrp=$s; }
}
