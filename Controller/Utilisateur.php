<?php

class Controller_Utilisateur implements Controller
{
    public function indexAction()
    {
        $user = App_Session::verifierSession();
        if (!is_null($user)) {
            $var["user"] = $user;
            $var["prof"] = $user->getType() >= 1;
            $var["admin"] = $user->getType() >= 2;
            $this->modifierUser($var);
        } else {
            header ('Location: '.App_Request::getUrl());
        }
    }

    public function modifierUser($var)
    {
        $send = App_Request::getParam("send");
        if (!empty($send)) {
            $view = new App_View('utilisateur.php');
            $view->render($var);
        } else {
            $view = new App_View('utilisateur.php');
            $view->render($var);
        }
    }
}