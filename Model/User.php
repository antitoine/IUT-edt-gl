<?php
class Model_User implements Model
{
	// Attribut:
	private $id;
	private $email;
	private $nom;
	private $prenom;
	private $mdp; // crypté
	private $type; // int, 0=étudiant, 1=prof, 2=admin
	private $idGrp;
	
	/**
	* Constructeur d'un utilisateur 
	* @param 
	*/
	public function __construct ($id=null,$email=null,$nom=null,$prenom=null,$mdp=null,$type=null,$idGrp=null) {
		$this->id=$id;
		$this->email=$email;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->mdp=$mdp;
		$this->type=$type;
		$this->idGrp=$idGrp;
	}
	

	public function save() {
		$res = App_Mysql::getInstance()->query("SELECT id FROM Personne WHERE identifiant='".App_Mysql::getInstance()->quote($this->id)."';";
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$res = App_Mysql::getInstance()->query("UPDATE Personne SET email='".mysql_real_escape_string($this->email)."', nom='".mysql_real_escape_string($this->nom)."', prenom='".$this->prenom."', mdp='".mysql_real_escape_string($this->mdp)."', droit='".mysql_real_escape_string($this->type)."', idGrp='".mysql_real_escape_string($this->idGrp)."' WHERE identifiant='".$this->id."';");
		}
		else{
			if($this->id!=null && $this->email!=null && $this->nom!=null && $this->prenom!=null && $this->mdp!=null && $this->type!=null){
				$res = App_Mysql::getInstance()->query("INSERT INTO Personne (identifiant,nom,prenom,mdp,email,droit) VALUES('".App_Mysql::getInstance()->quote($this->id)."','".App_Mysql::getInstance()->quote($this->nom)."','".App_Mysql::getInstance()->quote($this->prenom)."','".App_Mysql::getInstance()->quote($this->mdp)."','".App_Mysql::getInstance()->quote($this->email)."','".App_Mysql::getInstance()->quote($this->type).");");
			}
		}
	}
	
	// return null si aucun user n'a cet id sinon une instance de la classe User
	public static function load($id) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT * FROM Personne WHERE identifiant='".App_Mysql::getInstance()->quote($id)."';";
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new User($tuple["identifiant"],$tuple["email"],$tuple["nom"],$tuple["prenom"],$tuple["mdp"],$tuple["droit"],$tuple["idGrp"]);
		}
		return $ret;
	}
	
	// return true s'il exite $id et que son mdp est $mdp
	public static function verifierAuthentification($id,$mdp){
		$ret=false;
		$res = App_Mysql::getInstance()->query("SELECT identifiant FROM Personne WHERE identifiant='".App_Mysql::getInstance()->quote($id)."' AND mdp='".App_Mysql::getInstance()->quote($mdp)."';";
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=true;
		}
		return $ret;
	}
}
