<?php

class Controller_Consultation implements Controller
{
    public function indexAction() // Controller par defaut -> Permet la connexion
    {
    	$user = App_Session::verifierSession();
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
                    $view = new App_View('consultationRecherche.php');
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
}
