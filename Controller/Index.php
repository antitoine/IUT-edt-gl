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
            if (!empty(trim(App_Request::getParam("identifiant")))) {
                $identifiant = trim(App_Request::getParam("identifiant"));
                if (Model_User::VerifierPseudo($identifiant)) {
                    $mdp = md5(trim(App_Request::getParam("mdp")));
                    $user = Model_User::VerifierAuth($identifiant,$mdp);
                    if (empty(trim(App_Request::getParam("mdp")))) {
                        $var = array(
                            "identifiant" => $identifiant,
                            "non_verifie" => false,
                            "comb_prob" => false,
                            "identifiant_prob" => false,
                            "mdp_prob" => true
                        );
                        $view = new App_View('connexion.php');
                        $view->render($var);
                    } else if (is_null($user)) {
                        $var = array(
                            "identifiant" => $identifiant,
                            "non_verifie" => false,
                            "comb_prob" => true,
                            "identifiant_prob" => false,
                            "mdp_prob" => false
                        );
                        $view = new App_View('connexion.php');
                        $view->render($var);
                    } else if (!$user->getVerifier()) {
                        $var = array(
                            "identifiant" => $identifiant,
                            "non_verifie" => true,
                            "comb_prob" => false,
                            "identifiant_prob" => false,
                            "mdp_prob" => false
                        );
                        $view = new App_View('connexion.php');
                        $view->render($var);
                    } else {
                        $var = array(
                            "user" => $user
                        );
                        $_SESSION['id'] = $user->getId();
                        $this->moncompteAction();
                    }
                } else {
                    $var = array(
                        "identifiant" => "",
                        "non_verifie" => false,
                        "comb_prob" => false,
                        "identifiant_prob" => true,
                        "mdp_prob" => false
                    );
                    $view = new App_View('connexion.php');
                    $view->render($var);
                }
            } else {
                $var = array(
                    "identifiant" => "",
                    "non_verifie" => false,
                    "comb_prob" => false,
                    "identifiant_prob" => false,
                    "mdp_prob" => false
                );
                $view = new App_View('connexion.php');
                $view->render($var);
            }
        } else {
            $this->moncompteAction();
        }
    }
}