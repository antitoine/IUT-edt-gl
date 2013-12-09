<?php

class Controller_Consultation implements Controller
{
	public function indexAction()
	{
		$user = App_Session::verifierSession();
		if (!is_null($user)) {
			$this->consultationRecherche();
		} else {
			header ('Location: '.App_Request::getUrl());
		}
	}
	
	/**
	* le user demande la page & et il est connecté
	*/
	public function consultationRecherche()
	{
        if (!empty(App_Request::getParam("envoi"))) {
            $listCours = null;
            if (!empty(trim(App_Request::getParam("id_user")))) {
                $id_user = trim(App_Request::getParam("id_user"));
                $listCours = Model_EmploiDuTemps::searchByUser($id_user);
            } else if (!empty(trim(App_Request::getParam("nom"))) && !empty(trim(App_Request::getParam("prenom")))) {
                $nom = trim(App_Request::getParam("nom"));
                $prenom = trim(App_Request::getParam("prenom"));
                $listCours = Model_EmploiDuTemps::searchByNomPrenom($nom,$prenom);
            } else if (!empty(trim(App_Request::getParam("grptd")))) {
                $grptd = trim(App_Request::getParam("grptd"));
                $listCours = Model_EmploiDuTemps::searchByGroupTD($grptd);
            } else if (!empty(trim(App_Request::getParam("bat"))) && !empty(trim(App_Request::getParam("salle")))) {
                $bat = trim(App_Request::getParam("bat"));
                $salle = trim(App_Request::getParam("salle"));
                $listCours = Model_EmploiDuTemps::searchByBatimentSalle($bat,$salle);
            }
            if(!is_null($listCours)){
                $var = array(
                    "listCours" => $listCours
                );
                $view = new App_View('affichageEdt.php');
                $view->render($var);
            } else {
                $view = new App_View('consultation_recherche.php');
                $view->render(null);
            }
        } else {
			$view = new App_View('consultation_recherche.php');
			$view->render(null);
		}
	}
}
