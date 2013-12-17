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

    }
}