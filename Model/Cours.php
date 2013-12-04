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
                $this->odProf = $idProf;
        }
        // getter
        public function getIdCours(){ return $this->idCours;}
        public function getDescription(){return $this->descrip;}
        public function getnunSalle(){return $this->numSalle;}
        public function getBatiment(){return $this->nomBat;}
        public function getMatiere(){return $this->nomMatiere;}
        public function getHeureDebut(){return $this->heureDeb;}
        public function getHeureFin(){return $this->heureFin;}
        public function getDate(){return $this->date;}
        public function getGroupe(){return $this->grp;}
        public function getProfesseur(){return $this->idProf;}
        //setter
        public function setDescription($var){$this->descrip=$var;}
        public function setnunSalle($var){ $this->numSalle=$var;}
        public function setBatiment($var){ $this->nomBat=$var;}
        public function setMatiere($var){ $this->nomMatiere=$var;}
        public function setHeureDebut($var){ $this->heureDeb=$var;}
        public function setHeureFin($var){ $this->heureFin=$var;}
        public function setDate($var){ $this->date=$var;}
        public function setGroupe($var){$this->grp=$var;}
        public function setProfesseur($var){ $this->idProf=$var;}
        
        /**
         * Sauvegarde ou update
         */
        public function save() {
        	$res = App_Mysql::getInstance()->query("SELECT idCours FROM cours WHERE idCours='".App_Mysql::getInstance()->quote($this->idCours)."'");
        	if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
        		$res = App_Mysql::getInstance()->query("UPDATE cours  SET descriptionCours='".mysql_real_escape_string($this->descrip)."', numeroSalle='".mysql_real_escape_string($this->numSalle)."', nomBat='".mysql_real_escape_string($this->nomBat)."', nomMatiere='".mysql_real_escape_string($this->nomMatiere)."', heureDebut='".mysql_real_escape_string($this->heureDeb)."', heureFin='".mysql_real_escape_string($this->heureFin)."', Date='".mysql_real_escape_string($this->date)."', Groupe='".mysql_real_escape_string($this->grp)."', idProf='".mysql_real_escape_string($this->idProf)."' WHERE idCours='".$this->idCours."';");
        	}
        	else{
        		if($this->idCours!=null && $this->descrip!=null && $this->numSalle!=null && $this->nomBat!=null && $this->nomMatiere!=null && $this->heureDeb!=null && $this->heureFin!=null && $this->date!=null && $this->grp!=null && $this->idProf!=null){
        			$res = App_Mysql::getInstance()->query("INSERT INTO cours (idCours,descriptionCours,numeroSalle,nomBat,nomMatiere,heureDebut,heureFin,Date,Groupe,idProf) VALUES('".App_Mysql::getInstance()->quote($this->idCours)."','".App_Mysql::getInstance()->quote($this->descrip)."','".App_Mysql::getInstance()->quote($this->numSalle)."','".App_Mysql::getInstance()->quote($this->nomBat)."','".App_Mysql::getInstance()->quote($this->nomMatiere)."','".App_Mysql::getInstance()->quote($this->heureDeb)."','".App_Mysql::getInstance()->quote($this->heureFin)."','".App_Mysql::getInstance()->quote($this->date)."','".App_Mysql::getInstance()->quote($this->grp)."','".App_Mysql::getInstance()->quote($this->idProf).")");
        		}
        	}
        }
         
        public static function load($id) {
        	$ret=null;
        	$res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE idCours='".App_Mysql::getInstance()->quote($idCours)."'");
        	if($tuple = App_Mysql::getInstance()->fetchArray($res)) {
        		$ret=new Model_Cours($tuple["idCours"],$tuple["description"],$tuple["numeroSalle"],$tuple["nomBatiment"],$tuple["nomMatiere"],$tuple["heureDebut"],$tuple["heureFin"],$tuple["Date"],$tuple["Groupe"],$tuple["idProfesseur"]);
        	}
        	return $ret;
        }
}
?>