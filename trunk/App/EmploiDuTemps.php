<?php
class App_EmploiDuTemps
{
    private $listCours;
    private $dateDebut;
    private $dateFin;

    /**
    * Constructeur d'un emploi du temps
    * @param $arrayC array of all cours
    * @param $dd date de début de la liste des cours
    * @param $df date de fin de la liste des cours
    */
    private function __construct ($arrayC = null, $dd = null, $df = null) {
        $this->listCours = $arrayC;
        $this->dateDebut = $dd;
        $this->dateFin = $df;
    }

    /**
     * Permet d'avoir l'emploi du temps d'un utilisateur pour la semaine courante
     * @param string $id_user
     * @return NULL|EmploiDuTemps (null si la tableau est vide ou si l'ID user n'est pas trouvable)
     */
    public static function searchByUser($id_user) {
        $user = Model_User::load($id_user);
        if (is_null($user)) {
            return null;
        }
        $res = App_Mysql::getInstance()->query("SELECT * FROM cours WHERE Date >= NOW() AND Date < DATE_ADD(NOW(), INTERVAL 5 DAY) ORDER BY Date ASC");
        /** @var $array_cours Array de tous les cours */
        $array_cours = array();
        $i = 0;
        while ($tuple = App_Mysql::getInstance()->fetchArray($res)) {
            $array_cours[$i] = new Model_Cours($tuple['idCours'],$tuple['descriptionCours'],$tuple['numeroSalle'],$tuple['nomBat'],$tuple['nomMatiere'],$tuple['heureDebut'],$tuple['heureFin'],$tuple['Date'],$tuple['Groupe'],$tuple['idProf']);
            $i++;
        }
        if (count($array_cours)==0) {
            return null;
        }
        return $array_cours;
    }
}
