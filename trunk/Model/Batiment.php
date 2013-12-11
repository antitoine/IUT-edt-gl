<?php
class Model_Batiment implements Model
{
	// Attribut :
	private $nom;
	private $adresse;
	
	/**
	 * Constructeur d'un batiment
	 * @param String $nom 
	 * @param String $adresse
	 */
	public function __construct ($nom=null,$adresse=null) {
		$this->nom=$nom; 
		$this->adresse=$adresse;
	}
	
	/**
	 * creer un Batiment ou met à jour les données dans la base de données
	 */
	public function save() {
		$res = App_Mysql::getInstance()->query("SELECT nom FROM Batiment WHERE nom='".App_Mysql::getInstance()->quote($this->nom)."';");
		if(App_Mysql::getInstance()->fetchArray($res)) {
			$res = App_Mysql::getInstance()->query("UPDATE Batiment SET adresse='".mysql_real_escape_string($this->adresse)."' WHERE nom='".$this->nom."';");
		}
		else{
			if($this->nom!=null && $this->adresse!=null){
				$res = App_Mysql::getInstance()->query("INSERT INTO Batiment (nom,adresse) VALUES('".App_Mysql::getInstance()->quote($this->nom)."','".App_Mysql::getInstance()->quote($this->adresse)."';");
			}
		}
	}
	
	/**
	 *  fonction qui recupere les données d'un batiment avec le nom du Batiment a partir de la base de données
	 *  return null si aucun batiment n'a ce nom sinon une instance de la classe Batiment
	 *  @param String $nom du batiment
	 *  @return $ret une instance Batiment 
	 */
	public static function load($nom) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT * FROM Batiment WHERE nom='".App_Mysql::getInstance()->quote($nom)."';");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new Batiment($tuple["nom"],$tuple["adresse"]);
		}
		return $ret;
	}
	
	/**
	 * GETTER 
	 */
	public function getNom(){ return $this->nom; }
	public function getAdresse(){ return $this->adresse; }
	
	/**
	 * SETTER
	 * @param String $s
	 */
	public function setType($s){ $this->nom=$s; }
	public function setIdGrp($s){ $this->adresse=$s; }
	
}
