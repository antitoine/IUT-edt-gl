<?php

class Controller_Modifier implements Controller
{
    public function indexAction()
    {
        $user = App_Session::verifierSession();
        if (!is_null($user) && $user->getType() == 2) {
            $var = array(
                "admin" => true
            );
            if (!empty(App_Request::getParam("add_cours"))) {
                $this->ajoutCours($var);
            } else if (!empty(App_Request::getParam("search_cours"))) {
                $this->modificationCours($var);
            } else {
                $view = new App_View('modifier_cours.php');
                $view->render($var);
            }
        } else {
            header ('Location: '.App_Request::getUrl());
        }
    }

    public function ajoutCours()
    {

    }

    public function modifierCours()
    {

    }
}
