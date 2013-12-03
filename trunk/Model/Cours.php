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
        
        public function setCours($var){ $this->idCours=$var;}
        public function setDescription($var){$this->descrip=$var;}
        public function setnunSalle($var){ $this->numSalle=$var;}
        public function setBatiment($var){ $this->nomBat=$var;}
        public function setMatiere($var){ $this->nomMatiere=$var;}
        public function setHeureDebut($var){ $this->heureDeb=$var;}
        public function setHeureFin($var){ $this->heureFin=$var;}
        public function setDate($var){ $this->date=$var;}
        public function setGroupe($var){$this->grp=$var;}
        public function setProfesseur($var){ $this->idProf=$var;}
        
        
}
?>