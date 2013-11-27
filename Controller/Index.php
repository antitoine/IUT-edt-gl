<?php

class Controller_Index implements Controller
{

    public static function verifierSession()  {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            return Model_User::load($_SESSION['id']);
        } else {
            return null;
        }
    }

    public function indexAction() // Controller par defaut -> Permet la connexion
    {
        $user = self::verifierSession();
        if (is_null($user)) {
            if (!empty(trim(App_Request::getParam("identifiant"))) && !empty(trim(App_Request::getParam("mdp")))) {
                $identifiant = trim(App_Request::getParam("identifiant"));
                $mdp_not_crypt = trim(App_Request::getParam("mdp"));
                $mdp = md5($mdp_not_crypt);
                if (!Model_User::VerifierAuthentification($identifiant,$mdp)) {
                    $var = array(
                        "identifiant" => $identifiant,
                        "comb_prob" => true
                    );
                    $view = new App_View('connexion.php');
                    $view->render($var);
                } else {
                    $_SESSION['id'] = $identifiant;
                    $this->moncompteAction();
                }
            } else {
                $var = array(
                    "identifiant" => "",
                    "comb_prob" => false
                );
                $view = new App_View('connexion.php');
                $view->render($var);
            }
        } else {
            $this->moncompteAction();
        }
    }

    public function deconnexionAction($why = null)
    {
        App_Session::destroy($why);
    }

    public function moncompteAction()
    {
        $user = self::verifierSession();
        if (!is_null($user)) {
            $var = array(
                "user" => $user
            );
            $view = new App_View('moncompte.php');
            $view->render($var);
        } else {
            header ('Location: '.App_Request::getUrl());
        }
    }
}