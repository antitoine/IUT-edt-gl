<?php

class Controller_Utilisateur implements Controller
{
    public function indexAction()
    {
        $user = App_Session::verifierSession();
        if (!is_null($user) && $user->getType() >= 2) {
            $var["user"] = $user;
            $var["prof"] = $user->getType() >= 1;
            $var["admin"] = $user->getType() >= 2;
            $var["listUser"] = Model_User::loadAll();
            $var["listGroup"] = Model_GroupeTD::loadAll();
            $add_user = App_Request::getParam("add_user");
            $remove_user = App_Request::getParam("remove_user");
            $change_user = App_Request::getParam("change_user");
            if (!empty($add_user)) {
                $this->ajoutUser($var);
            } else if (!empty($remove_user)) {
                $this->removeUser($var);
            } else if (!empty($change_user)) {
                $this->changeUser($var);
            } else {
                $view = new App_View('utilisateur.php');
                $view->render($var);
            }
        } else {
            header ('Location: '.App_Request::getUrl());
        }
    }

    public function ajoutUser($var)
    {
        $var["identifiant"] = trim(App_Request::getParam("identifiant"));
        $var["nom"] = trim(App_Request::getParam("nom"));
        $var["prenom"] = trim(App_Request::getParam("prenom"));
        $mdp = trim(App_Request::getParam("mdp"));
        $var["email"] = trim(App_Request::getParam("email"));
        $type = App_Request::getParam("type");
        if ($type != 0 && $type != 1) {
            $var["prob_add"] = true;
            $view = new App_View('utilisateur.php');
            $view->render($var);
        }
        $grptd = App_Request::getParam("grptd");
        if (!empty($var["identifiant"]) && !empty($var["nom"]) && !empty($var["prenom"])
            && !empty($var["email"]) && !empty($mdp) && ($type == 1 || !empty($grptd))) {
            $mdp_crypte = md5($mdp);
            if ($type == 0) {
                $newEtudiant = new Model_Etudiant($var["identifiant"],$var["email"],$var["nom"],$var["prenom"],$mdp_crypte,$type,$grptd);
                $newEtudiant->save();
            } else {
                $newUser = new Model_User($var["identifiant"],$var["email"],$var["nom"],$var["prenom"],$mdp_crypte,$type);
                $newUser->save();
            }
            $view = new App_View('modification_succes.php');
            $view->render($var);
        } else {
            $var["prob_add"] = true;
            $view = new App_View('utilisateur.php');
            $view->render($var);
        }
    }

    public function removeUser($var)
    {
        $utilisateur = App_Request::getParam("utilisateur");
        if (!empty($utilisateur)) {
            if (Model_User::load($utilisateur)->getType() == 0 ) {
                Model_Etudiant::remove($utilisateur);
            }
            Model_User::remove($utilisateur);
            $view = new App_View('modification_succes.php');
            $view->render($var);
        } else {
            $var["prob_remove"] = true;
            $view = new App_View('utilisateur.php');
            $view->render($var);
        }
    }

    public function changeUser($var)
    {
        $change_send = App_Request::getParam("change_send");
        if (!empty($change_send)) {
            $var["identifiant"] = trim(App_Request::getParam("identifiant"));
            $var["nom"] = trim(App_Request::getParam("nom"));
            $var["prenom"] = trim(App_Request::getParam("prenom"));
            $mdp = trim(App_Request::getParam("mdp"));
            $var["email"] = trim(App_Request::getParam("email"));
            $type = App_Request::getParam("type");
            if ($type != 0 && $type != 1) {
                $var["prob_change"] = true;
                $view = new App_View('utilisateur.php');
                $view->render($var);
            }
            $grptd = App_Request::getParam("grptd");
            if (!empty($var["identifiant"]) && !empty($var["nom"]) && !empty($var["prenom"])
                && !empty($var["email"]) && ($type == 1 || !empty($grptd))) {
                if (!empty($mdp)) {
                    $mdp_crypte = md5($mdp);
                } else {
                    $mdp_crypte = null;
                }
                if ($type == 0) {
                    $newEtudiant = new Model_Etudiant($var["identifiant"],$var["email"],$var["nom"],$var["prenom"],$mdp_crypte,$type,$grptd);
                    $newEtudiant->save();
                } else {
                    $newUser = new Model_User($var["identifiant"],$var["email"],$var["nom"],$var["prenom"],$mdp_crypte,$type);
                    $newUser->save();
                }
                $view = new App_View('modification_succes.php');
                $view->render($var);
            } else {
                $var["prob_change"] = true;
                $view = new App_View('utilisateur.php');
                $view->render($var);
            }
        } else {
            $id_user = App_Request::getParam("utilisateur");
            $user = Model_User::load($id_user);

            $var["identifiant"] = $user->getId();
            $var["nom"] = $user->getNom();
            $var["prenom"] = $user->getPrenom();
            $var["email"] = $user->getEmail();
            $var["type"] = $user->getType();
            if ($user->getType() == 0) {
                $user = Model_Etudiant::load($id_user);
                $var["grptd"] = $user->getIdGrp();
            }
            $view = new App_View('utilisateur_modifier.php');
            $view->render($var);
        }
    }
}