<?php
class Model_GroupeTD implements Mode
{

    //Attribut;
    private $idGrp;
    private $nomFiliere;
    private $numero_annee;
    private $niveauEtude;
    
    /**
	* Constructeur d'un utilisateur 
	* @param 
	*/
    public function __construct ($idGrp=null,$nomFiliere=null,$numero_annee=null,$niveauEtude=null){
        $this->idGrp=$idGrp;
        $this->nomFiliere=$nomFiliere;
        $this->numero_annee=$numero_annee;
        $this->niveauEtude=$niveauEtude;
    }
    
    //Getter;
    
    public function getIdGrp(){
    	return $this->idGrp;
    }
    public function getNomFiliere(){ 
    	return $this->nomFiliere;
    }
    
    public function getNumero_annee(){
    	return $this->numero_annee;
    }

    public function getNiveauEtude(){
    	return $this->niveauEtude;
    }
    
    //Setter;
 
    public function setIdGrp($var){
    	$this->idGrp=$var;
    }
    public function setNomFiliere($var){
    	$this->nomFiliere=$var;
    }
    public function setNumero_annee($var){
    	$this->numero_annee=$var;
    }
    public function setNiveauEtude($var){
    	$this->niveauEtude=$var;
    }
    
    public function save() {
    	$res = App_Mysql::getInstance()->query("SELECT idGrp FROM GroupeTD WHERE idGrp='".App_Mysql::getInstance()->quote($this->idGrp)."'");
    	if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
    		$res = App_Mysql::getInstance()->query("UPDATE GroupeTD SET nomFiliere='".mysql_real_escape_string($this->nomFiliere)."', numero_annee='".mysql_real_escape_string($this->numero_annee)."', niveauEtude='".$this->niveauEtude."' WHERE idGrp='".$this->idGrp."';");
    	}
    	else{
    		if($this->id!=null && $this->email!=null && $this->nom!=null && $this->prenom!=null && $this->mdp!=null && $this->type!=null){
    			$res = App_Mysql::getInstance()->query("INSERT INTO Personne (idGrp,nomFiliere,numero_annee,niveauEtude) VALUES('".App_Mysql::getInstance()->quote($this->idGrp)."','".App_Mysql::getInstance()->quote($this->nomFiliere)."','".App_Mysql::getInstance()->quote($this->numero_annee)."','".App_Mysql::getInstance()->quote($this->niveauEtude).")");
    		}
    	}
    }
    
   
    
}