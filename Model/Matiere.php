<?php
class Model_Matiere implements Model
{
	// Attribut:
	private $nomMatiere;

	/**
	 * Constructeur d'un utilisateur
	 * @param
	 */
	public function __construct ($mat=null) {
		$this->nomMatiere=$mat;
		
	}
	//getters
	 public function getNomMatiere(){
	 	return $this->nomMatiere;
	 }
	 //setters
	 public function setNomMatiere($var){
	 	 $this->nomMatiere=$var;
	 }

	public function save() {
		$res = App_Mysql::getInstance()->query("SELECT nomMatiere FROM matiere WHERE nomMatiere='".App_Mysql::getInstance()->quote($this->nomMatiere)."'");
		if(!App_Mysql::getInstance()->fetchArray($res)) {
			if($this->nomMatiere != null){
				$res = App_Mysql::getInstance()->query("INSERT INTO matiere (nomMatiere) VALUES('".App_Mysql::getInstance()->quote($this->nomMatiere)."')");
			}
		}
	}

	public static function load($mat) {
		$ret=null;
		$res = App_Mysql::getInstance()->query("SELECT nomMatiere FROM matiere WHERE nomMatiere='".App_Mysql::getInstance()->quote($mat)."'");
		if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
			$ret=new self($tuple["nomMatiere"]);
		}
		return $ret;
	}

    public static function loadAll() {
        $ret=null;
        $res = App_Mysql::getInstance()->query("SELECT nomMatiere FROM matiere");
        $i=0;
        while($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $ret[$i]= new self($tuple["nomMatiere"]);
            $i++;
        }
        return $ret;
    }
}
?>