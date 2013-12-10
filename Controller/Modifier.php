<?php

class Controller_Modifier implements Controller
{
    public function indexAction() // Controller par defaut -> Permet la connexion
    {
        $user = App_Session::verifierSession();
        if (is_null($user) && $user->getType() > 0) {
            if (!empty(trim(App_Request::getParam("add_cours")))) {
                $this->ajoutCours();
            } else if (!empty(trim(App_Request::getParam("search_cours")))) {
                $this->modificationCours();
            } else {
                $view = new App_View('modifier_cours.php');
                $view->render(null);
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
