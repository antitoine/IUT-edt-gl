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
     * @return NULL|Model_EmploiDuTemps (null si la tableau est vide ou si l'ID user n'est pas trouvable)
     */
    public static function searchByUser($id_user) {
        $user = Model_User::load($id_user);
        if (is_null($user)) {
            return null;
        } else if ($user->getType() == 0) {
            $user = Model_Etudiant::load($id_user);
            $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Groupe = '".App_Mysql::getInstance()->quote($user->getIdGrp())."' AND Date >= CURDATE() AND Date < DATE_ADD(CURDATE(), INTERVAL 5 DAY) ORDER BY Date ASC");
        } else {
            $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Date >= CURDATE() AND Date < DATE_ADD(CURDATE(), INTERVAL 5 DAY) AND idProf = ".App_Mysql::getInstance()->quote($user->getId())." ORDER BY Date ASC");
        }

        /** @var $array_cours Array de tous les cours */
        $array_cours = array();
        $i = 0;
        while ($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $array_cours[$i] = new Model_Cours($tuple['idCours'],$tuple['idProf'],$tuple['nomMatiere'],$tuple['Groupe'],$tuple['numeroSalle'],$tuple['nomBat'],$tuple['heureDebut'],$tuple['heureFin'],$tuple['Date'],$tuple['descriptionCours']);
            $i++;
        }
        if (count($array_cours)==0) {
            return null;
        }
        return $array_cours;
    }
}
