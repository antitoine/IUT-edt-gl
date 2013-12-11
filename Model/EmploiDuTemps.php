<?php
class Model_EmploiDuTemps
{
    private $listCours;
    private $dateDebut;
    private $dateFin;

    /**
    * Constructeur d'un emploi du temps
    * @param $arrayC array of all cours
    * @param $dd string date de début de la liste des cours
    * @param $df string date de fin de la liste des cours
    */
    private function __construct ($arrayC = null, $dd = null, $df = null) {
        $this->listCours = $arrayC;
        $this->dateDebut = $dd;
        $this->dateFin = $df;
    }


    /**
     * Permet d'avoir l'emploi du temps d'un utilisateur pour la semaine courante
     * @param string $id_user
     * @return NULL|Model_EmploiDuTemps (null si la tableau est vide ou si l'ID user est introuvable)
     */
    public static function searchByUser($id_user) {
        $user = Model_User::load($id_user);
        if (is_null($user)) {
            return null;
        } else if ($user->getType() == 0) {
            $user = Model_Etudiant::load($id_user);
            $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Groupe = '".App_Mysql::getInstance()->quote($user->getIdGrp())."' AND Date >= CURDATE() AND Date < DATE_ADD(CURDATE(), INTERVAL 5 DAY) ORDER BY Date ASC");
        } else {
            $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Date >= CURDATE() AND Date < DATE_ADD(CURDATE(), INTERVAL 5 DAY) AND idProf = '".App_Mysql::getInstance()->quote($user->getId())."' ORDER BY Date ASC");
        }
        /** @var $array_cours Array de tous les cours */
        $array_cours = array();
        $i = 0;
        while ($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $array_cours[0][$i] = new Model_Cours($tuple['idCours'],$tuple['idProf'],$tuple['nomMatiere'],$tuple['Groupe'],$tuple['numeroSalle'],$tuple['nomBat'],$tuple['heureDebut'],$tuple['heureFin'],$tuple['Date'],$tuple['descriptionCours']);
            $i++;
        }
        if (count($array_cours)==0) {
            return null;
        }
        return $array_cours;
    }

    /**
     * Permet d'avoir l'emploi du temps d'un groupe de TD
     * @param string $grp
     * @return NULL|Model_EmploiDuTemps (null si la tableau est vide ou si le groupe est introuvable)
     */
    public static function searchByGroupTD($grp) {
        if (is_null($grp)) {
            return null;
        } else {
            $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Groupe = '".App_Mysql::getInstance()->quote($grp)."' AND Date >= CURDATE() AND Date < DATE_ADD(CURDATE(), INTERVAL 5 DAY) ORDER BY Date ASC");
        }
        /** @var $array_cours Array de tous les cours */
        $array_cours = array();
        $array_cours[0] = array();
        $i=0;
        while ($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $array_cours[0][$i] = new Model_Cours($tuple['idCours'],$tuple['idProf'],$tuple['nomMatiere'],$tuple['Groupe'],$tuple['numeroSalle'],$tuple['nomBat'],$tuple['heureDebut'],$tuple['heureFin'],$tuple['Date'],$tuple['descriptionCours']);
            $i++;
        }
        if (count($array_cours[0])==0) {
            return null;
        }
        return $array_cours;
    }

    /**
     * Permet d'avoir l'emploi du temps d'une personne
     * @param string $nom
     * @param string $prenom
     * @return NULL|Model_EmploiDuTemps (null si la tableau est vide ou si le nom/prenom est introuvable)
     */
    public static function searchByNomPrenom($nom,$prenom) {
        if (is_null($nom) || is_null($prenom)) {
            return null;
        }
        $tabUser = Model_User::loadByNomPrenom($nom,$prenom);
        if (is_null($tabUser)) {
            return null;
        }
        for($i=0;$i<count($tabUser);$i++){
        	$tabEdT[$i]=Model_EmploiDuTemps::searchByUser($tabUser[$i]->getId());
        }
        return $tabEdT;
    }

    /**
     * Permet d'avoir l'emploi du temps d'une salle d'un batiment
     * @param string $bat
     * @param string $salle
     * @return NULL|Model_EmploiDuTemps (null si la tableau est vide ou si le batiment/salle est introuvable)
     */
    public static function searchByBatimentSalle($bat,$salle) {
        if (is_null($bat) || is_null($salle)) {
            return null;
        }
        $lieu = Model_Salle::loadByNumSalleNomBat($salle,$bat);
        if (is_null($lieu)) {
            return null;
        }
        else {
            $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Date >= CURDATE() AND Date < DATE_ADD(CURDATE(), INTERVAL 5 DAY) AND nomBat = '".App_Mysql::getInstance()->quote($lieu->getNomBat())."' AND numeroSalle = '".App_Mysql::getInstance()->quote($lieu->getNumeroSalle())."' ORDER BY Date ASC");
        }
        /** @var $array_cours Array de tous les cours */
        $i = 0;
        while ($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $array_cours[0][$i] = new Model_Cours($tuple['idCours'],$tuple['idProf'],$tuple['nomMatiere'],$tuple['Groupe'],$tuple['numeroSalle'],$tuple['nomBat'],$tuple['heureDebut'],$tuple['heureFin'],$tuple['Date'],$tuple['descriptionCours']);
            $i++;
        }
        if (count($array_cours)==0) {
            return null;
        }
        return $array_cours;
    }
}
