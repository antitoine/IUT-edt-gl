<?php

class Controller_Modifier implements Controller
{
    public function indexAction()
    {
        $user = App_Session::verifierSession();
        if (!is_null($user) && $user->getType() > 0) {
            $var = array(
                "admin" => true,
                "not_prof" => $user->getType() != 1,
                "user" => $user
            );
            $listSalle = Model_Salle::loadAll();
            if (!is_null($listSalle)) {
                $var["listSalle"] = $listSalle;
            }
            if ($var["not_prof"]) {
                $listProf = Model_User::loadAllProf();
                if (!is_null($listProf)) {
                    $var["listProf"] = $listProf;
                }
            }
            $listGroup = Model_GroupeTD::loadAll();
            if (!is_null($listGroup)) {
                $var["listGroup"] = $listGroup;
            }
            if ($var["not_prof"]) {
                $listCours = Model_Cours::loadAll();
                if (!is_null($listCours)) {
                    $var["listCours"] = $listCours;
                }
            } else {
                $listCours = Model_Cours::loadAllByIdProf($user->getId());
                if (!is_null($listCours)) {
                    $var["listCours"] = $listCours;
                }
            }
            if (!empty(App_Request::getParam("add_cours"))) {
                $this->ajoutCours($var);
            } else if (!empty(App_Request::getParam("modifier_cours"))) {
                $this->modificationCours($var);
            } else {
                $view = new App_View('modifier_cours.php');
                $view->render($var);
            }
        } else {
            header ('Location: '.App_Request::getUrl());
        }
    }

    public function ajoutCours($var)
    {

    }

    public function modifierCours($var)
    {

    }
}
