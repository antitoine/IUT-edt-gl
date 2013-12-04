<?php

class Controller_Consultation implements Controller
{
	public function indexAction() // Controller par defaut -> Permet la connexion
	{
		$user = App_Session::verifierSession();
		if (!is_null($user)) {
			$this->consultationRecherche();
		} else {
			$view = new App_View('index.php');
			$view->render(null);
		}
	}
	
	/**
	* le user demande la page & et il est connecté
	*/
	public function consultationRecherche()
	{
		if(!empty(trim(App_Request::getParam("submit")))){
			if(!empty(trim(App_Request::getParam("id_user")))){
				$edt = App_EmploiDuTemps::searchByUser(App_Request::getParam("id_user"));
				if(!is_null($edt)){
					$var = array(
						"edt" => $edt
						);
					$view = new App_View('affichageEdt.php');
					$view->render($var);
				}
				else{
					$view = new App_View('consultation_recherche.php');
					$view->render(null);
				}
			}
		}
		else{
			$view = new App_View('consultation_recherche.php');
			$view->render(null);
		}
	}
}
