<?php

class Controller_Index implements Controller
{
    public function indexAction()
    {
        $var = array();
        $view = new App_View('Accueil.php');
        $view->render($var);
    }
}