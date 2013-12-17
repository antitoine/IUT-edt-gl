<?php

class Controller_Consultation implements Controller
{
	public function indexAction()
	{
		$user = App_Session::verifierSession();
		if (!is_null($user)) {
            $var = array(
                "admin" => $user->getType() >0
            );
			$this->consultationRecherche($var);
		} else {
			header ('Location: '.App_Request::getUrl());
		}
	}
	
	/**
	* le user demande la page & et il est connecté
	*/
	public function consultationRecherche($var)
	{
        $listGroup = Model_GroupeTD::loadAll();
        if (!is_null($listGroup)) {
            $var["listGroup"] = $listGroup;
        }
        $listSalle = Model_Salle::loadAll();
        if (!is_null($listSalle)) {
            $var["listSalle"] = $listSalle;
        }
        $envoi = App_Request::getParam("envoi");
        if (!empty($envoi)) {
            $listCours = null;
            $id_user = trim(App_Request::getParam("id_user"));
            $nom = trim(App_Request::getParam("nom"));
            $prenom = trim(App_Request::getParam("prenom"));
            $grptd = trim(App_Request::getParam("grptd"));
            $salle = App_Request::getParam("salle");
            if (!empty($id_user)) {
                $listCours = Model_EmploiDuTemps::searchByUser($id_user);
            } else if (!empty($nom) && !empty($prenom)) {
                $listCours = Model_EmploiDuTemps::searchByNomPrenom($nom,$prenom);
            } else if (!empty($grptd)) {
                $listCours = Model_EmploiDuTemps::searchByGroupTD($grptd);
            } else if (!empty($salle)) {
                $salle = $var["listSalle"]["numeroSalle"][App_Request::getParam("salle")];
                $bat = $var["listSalle"]["nomBat"][App_Request::getParam("salle")];
                $listCours = Model_EmploiDuTemps::searchByBatimentSalle($bat,$salle);
            }
            if(!is_null($listCours)){
                $var["listCours"] = $listCours;
                $view = new App_View('affichageEdt.php');
                $view->render($var);
            } else {
                $view = new App_View('consultation_recherche.php');
                $view->render($var);
            }
        } else {
			$view = new App_View('consultation_recherche.php');
			$view->render($var);
		}
	}
}
