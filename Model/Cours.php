<?php

class Model_Cours implements Model
{
    // Attribut:
    private $idCours;
    private $descrip;
    private $numSalle;
    private $nomBat;
    private $nomMatiere;
    private $heureDeb;
    private $heureFin;
    private $date;
    private $grp;
    private $idProf;
	
	/**
	 * 	  
	 * @param int $idCours
	 * @param int $idProf
	 * @param String $nomMatiere
	 * @param String $grp
	 * @param int $numSalle
	 * @param String $nomBat
	 * @param Time $heureDeb
	 * @param Time $heureFin
	 * @param Date $date
	 * @param String $descrip
	 */
    public function __construct( $idCours=null,$idProf= null,$nomMatiere= null,$grp= null,$numSalle= null,$nomBat= null, $heureDeb= null,$heureFin= null,$date= null,$descrip = null){
            $this->idCours =$idCours;
            $this->descrip =$descrip;
            $this->numSalle =$numSalle;
            $this->nomBat =$nomBat;
            $this->nomMatiere =$nomMatiere;
            $this->heureDeb =$heureDeb;
            $this->heureFin =$heureFin;
            $this->date =$date;
            $this->grp =$grp;
            $this->idProf = $idProf;
    }
    // getter
    public function getIdCours(){ return $this->idCours;}
    public function getDescription(){return $this->descrip;}
    public function getnumSalle(){return $this->numSalle;}
    public function getBatiment(){return $this->nomBat;}
    public function getMatiere(){return $this->nomMatiere;}
    public function getHeureDebut(){return $this->heureDeb;}
    public function getHeureFin(){return $this->heureFin;}
    public function getDate(){return $this->date;}
    public function getGroupe(){return $this->grp;}
    public function getProfesseur(){return $this->idProf;}
    //setter
    public function setDescription($var){$this->descrip=$var;}
    public function setnumSalle($var){ $this->numSalle=$var;}
    public function setBatiment($var){ $this->nomBat=$var;}
    public function setMatiere($var){ $this->nomMatiere=$var;}
    public function setHeureDebut($var){ $this->heureDeb=$var;}
    public function setHeureFin($var){ $this->heureFin=$var;}
    public function setDate($var){ $this->date=$var;}
    public function setGroupe($var){$this->grp=$var;}
    public function setProfesseur($var){ $this->idProf=$var;}

    /**
     * Sauvegarde ou mise à jour d'un tuple dans la base de données
     */
    public function save() {
        $res = App_Mysql::getInstance()->query("SELECT idCours FROM cours WHERE idCours='".App_Mysql::getInstance()->quote($this->idCours)."'");
        if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $res = App_Mysql::getInstance()->query("UPDATE cours  SET descriptionCours='".App_Mysql::getInstance()->quote($this->descrip)."', numeroSalle='".App_Mysql::getInstance()->quote($this->numSalle)."', nomBat='".App_Mysql::getInstance()->quote($this->nomBat)."', nomMatiere='".App_Mysql::getInstance()->quote($this->nomMatiere)."', heureDebut='".App_Mysql::getInstance()->quote($this->heureDeb)."', heureFin='".App_Mysql::getInstance()->quote($this->heureFin)."', Date='".App_Mysql::getInstance()->quote($this->date)."', Groupe='".App_Mysql::getInstance()->quote($this->grp)."', idProf='".App_Mysql::getInstance()->quote($this->idProf)."' WHERE idCours='".App_Mysql::getInstance()->quote($this->idCours)."';");
        } else{
            if($this->numSalle!=null && $this->nomBat!=null && $this->nomMatiere!=null && $this->heureDeb!=null && $this->heureFin!=null && $this->date!=null && $this->grp!=null && $this->idProf!=null){
                $res = App_Mysql::getInstance()->query("INSERT INTO cours (idCours,descriptionCours,numeroSalle,nomBat,nomMatiere,heureDebut,heureFin,Date,Groupe,idProf) VALUES('".App_Mysql::getInstance()->quote($this->idCours)."','".App_Mysql::getInstance()->quote($this->descrip)."','".App_Mysql::getInstance()->quote($this->numSalle)."','".App_Mysql::getInstance()->quote($this->nomBat)."','".App_Mysql::getInstance()->quote($this->nomMatiere)."','".App_Mysql::getInstance()->quote($this->heureDeb)."','".App_Mysql::getInstance()->quote($this->heureFin)."','".App_Mysql::getInstance()->quote($this->date)."','".App_Mysql::getInstance()->quote($this->grp)."','".App_Mysql::getInstance()->quote($this->idProf)."')");
            }
        }
    }
	/**
	 * @param int $id
	 * @return Ambigous <NULL, Model_Cours>
	 * retourne: l'instance de cours identifié par $id dans la base de données si elle existe, sinn retourne  null 
	 */
    public static function load($id) {
        $ret=null;
        $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE idCours='".App_Mysql::getInstance()->quote($id)."'");
        if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $ret=new Model_Cours($tuple["idCours"],$tuple["idProf"],$tuple["nomMatiere"],$tuple["Groupe"],$tuple["numeroSalle"],$tuple["nomBat"],$tuple["heureDebut"],$tuple["heureFin"],$tuple["Date"],$tuple["descriptionCours"]);
        }
        return $ret;
    }

    public static function remove($id) {
        App_Mysql::getInstance()->query("DELETE FROM cours WHERE idCours='".App_Mysql::getInstance()->quote($id)."'");
    }

	/**
	 * Retourne un tableau de toutes les instances de cours qui sont dans la base de données
	 */
    public static function loadAll() {
        $ret=null;
        $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Date >= NOW() ORDER BY Date DESC");
        $i=0;
        while($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $ret[$i]=new Model_Cours($tuple["idCours"],$tuple["idProf"],$tuple["nomMatiere"],$tuple["Groupe"],$tuple["numeroSalle"],$tuple["nomBat"],$tuple["heureDebut"],$tuple["heureFin"],$tuple["Date"],$tuple["descriptionCours"]);
            $i++;
        }
        return $ret;
    }

    /**
     * Retourne un tableau de toutes les instances de cours qui sont dans la base de données
     */
    public static function loadAllWhithoutLimit() {
        $ret=null;
        $res = App_Mysql::getInstance()->query("SELECT * FROM cours ORDER BY Date DESC");
        $i=0;
        while($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $ret[$i]=new Model_Cours($tuple["idCours"],$tuple["idProf"],$tuple["nomMatiere"],$tuple["Groupe"],$tuple["numeroSalle"],$tuple["nomBat"],$tuple["heureDebut"],$tuple["heureFin"],$tuple["Date"],$tuple["descriptionCours"]);
            $i++;
        }
        return $ret;
    }

	/**
	 * 
	 * @param int $idProf
	 * @return Ambigous <NULL, Model_Cours>
	 * Retourne le tableau de tout les tuples ayants un identifiant proseeur qui correspond à $idprof
	 */
    public static function loadAllByIdProf($idProf) {
        $ret=null;
        $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE idProf= '".App_Mysql::getInstance()->quote($idProf)."'");
        $i=0;
        while($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $ret[$i]=new Model_Cours($tuple["idCours"],$tuple["idProf"],$tuple["nomMatiere"],$tuple["Groupe"],$tuple["numeroSalle"],$tuple["nomBat"],$tuple["heureDebut"],$tuple["heureFin"],$tuple["Date"],$tuple["descriptionCours"]);
            $i++;
        }
        return $ret;
    }
}
?>