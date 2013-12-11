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
            $listMatiere = Model_Matiere::loadAll();
            if (!is_null($listMatiere)) {
                $var["listMatiere"] = $listMatiere;
            }
            if (!empty(App_Request::getParam("add_cours"))) {
                if ($this->ajoutCours($var)) {
                    $view = new App_View('ajout_cours_reussi.php');
                    $view->render($var);
                } else {
                    $var["prob_ajout"] = true;
                    $view = new App_View('modifier_cours.php');
                    $view->render($var);
                }
            } else if (!empty(App_Request::getParam("modifier_cours"))) {
                if (!empty(App_Request::getParam("cours"))) {
                    $cours = $var["listCours"][App_Request::getParam("cours")];
                    $var["idCours"] = $cours->getIdCours();
                    $var["date"] = $cours->getDate();
                    $var["heured"] = $cours->getHeureDebut();
                    $var["heuref"] = $cours->getHeureFin();
                    $var["salle"] = $cours->getBatiment().$cours->getnumSalle();
                    $var["prof"] = $cours->getProfesseur();
                    $var["grptd"] = $cours->getGroupe();
                    $var["matiere"] = $cours->getMatiere();
                    $var["description"] = $cours->getDescription();
                    $view = new App_View('modifier_cours_selection.php');
                    $view->render($var);
                } else {
                    $view = new App_View('modifier_cours.php');
                    $view->render($var);
                }
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
        if (!empty(trim(App_Request::getParam("date")))) {
            $date = trim(App_Request::getParam("date"));
        }
        if (!empty(trim(App_Request::getParam("heured")))) {
            $heured = trim(App_Request::getParam("heured"));
        }
        if (!empty(trim(App_Request::getParam("heuref")))) {
            $heuref = trim(App_Request::getParam("heuref"));
        }
        if (!empty(App_Request::getParam("salle"))) {
            $numSalle = $var["listSalle"]["numeroSalle"][App_Request::getParam("salle")];
            $nomBat = $var["listSalle"]["nomBat"][App_Request::getParam("salle")];
        }
        if ($var["not_prof"] && !empty(App_Request::getParam("prof"))) {
            $idprof = $var["listProf"]["id"][App_Request::getParam("prof")];
        } else if (!$var["not_prof"]) {
            $idprof = $var["user"]->getId();
        }
        if (!empty(App_Request::getParam("grptd"))) {
            $groupe = $var["listGroup"][App_Request::getParam("grptd")];
        }
        if (!empty(App_Request::getParam("matiere"))) {
            $matiere = App_Request::getParam("matiere");
        }
        if (!empty(trim(App_Request::getParam("description")))) {
            $description = trim(App_Request::getParam("description"));
        }
        if (isset($date) && isset($heured) && isset($heuref)
            && isset($numSalle) && isset($nomBat) && isset($idprof)
            && isset($groupe) && isset($matiere)) {
            //$newhorraire = new Model_Horaire($heured,$heuref,$date);
            //$newhorraire->save();
            $newCours = new Model_Cours(null,$idprof,$matiere,$groupe,$numSalle,$nomBat,$heured,$heuref,$date);
            if (isset($description)) {
                $newCours->setDescription($description);
            }
            $newCours->save();
            return true;
        } else {
            return false;
        }
    }

    public function modifierCours($var)
    {
        if (!empty(App_Request::getParam("idCours"))) {
            $idCours = App_Request::getParam("idCours");
        }
        if (!empty(trim(App_Request::getParam("date")))) {
            $date = trim(App_Request::getParam("date"));
        }
        if (!empty(trim(App_Request::getParam("heured")))) {
            $heured = trim(App_Request::getParam("heured"));
        }
        if (!empty(trim(App_Request::getParam("heuref")))) {
            $heuref = trim(App_Request::getParam("heuref"));
        }
        if (!empty(App_Request::getParam("salle"))) {
            $numSalle = $var["listSalle"]["numeroSalle"][App_Request::getParam("salle")];
            $nomBat = $var["listSalle"]["nomBat"][App_Request::getParam("salle")];
        }
        if ($var["not_prof"] && !empty(App_Request::getParam("prof"))) {
            $idprof = $var["listProf"]["id"][App_Request::getParam("prof")];
        } else if (!$var["not_prof"]) {
            $idprof = $var["user"]->getId();
        }
        if (!empty(App_Request::getParam("grptd"))) {
            $groupe = $var["listGroup"][App_Request::getParam("grptd")];
        }
        if (!empty(App_Request::getParam("matiere"))) {
            $matiere = App_Request::getParam("matiere");
        }
        if (!empty(trim(App_Request::getParam("description")))) {
            $description = trim(App_Request::getParam("description"));
        }
        if (isset($idCours) && isset($date) && isset($heured) && isset($heuref)
            && isset($numSalle) && isset($nomBat) && isset($idprof)
            && isset($groupe) && isset($matiere)) {
            $OldCours = Model_Cours::load($idCours);
            if (isset($description)) {
                $OldCours->setDescription($description);
            }
            $OldCours->setDate($date);
            $OldCours->setHeureDebut($heured);
            $OldCours->setHeureFin($heuref);
            $OldCours->setnumSalle($numSalle);
            $OldCours->setBatiment($nomBat);
            $OldCours->setProfesseur($idprof);
            $OldCours->setGroupe($groupe);
            $OldCours->setMatiere($matiere);
            $OldCours->save();
            return true;
        } else {
            return false;
        }
    }

    public function validerAction()
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
            $listMatiere = Model_Matiere::loadAll();
            if (!is_null($listMatiere)) {
                $var["listMatiere"] = $listMatiere;
            }
            if ($this->modifierCours($var)) {
                $view = new App_View('ajout_cours_reussi.php');
                $view->render($var);
            } else {
                $var["prob_modification"] = true;
                $view = new App_View('modifier_cours.php');
                $view->render($var);
            }
        }
    }
}
