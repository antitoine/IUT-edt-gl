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
    public function setNumero_anne($var){
    	$this->numero_annee=$var;
    }
    public function setNiveauEtude($var){
    	$this->niveauEtude=$var;
    }
    

    
        
        
    

}
