<?php
class Controller_Modifications implements Controller
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
	
	public function modificationMotDePasse()
	{
		if (!empty(App_Request::getParam("envoi"))) {
			if (!empty(trim(App_Request::getParam("mdp_Modif")))) { // si le champs n'est pas vide
				$mdp = trim(App_Request::getParam("mdp_Modif"));// recupere le nouveau mdp
				$user_id= trim(App_Request::getParam("user_id"));// recupere l'id de l'utilisateur courant
				$user= ModelUser::load($user_id);//cree une instance d'un utilisatur
				$user->setMdp($mdp);// change le mot de passe dans user
				$user->save();// modifie dans la base de donnée ^^
			}
		}	
		$view = new App_View('mesinfos.php');
		$view->render(null);
	}
	
	
	public function modificationEmail()
	{
		$email = trim(App_Request::getParam("email_Modif"));// recupere le nouveau email
		$syntaxe="#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#";
		if (!empty(App_Request::getParam("envoi")) && strpreg_match($Syntaxe,$email) ) {
			if (!empty(trim(App_Request::getParam("email_Modif")))) { // si le champs n'est pas vide
								$user_id= trim(App_Request::getParam("user_id"));// recupere l'id de l'utilisateur courant
				$user= ModelUser::load($user_id);//cree une instance d'un utilisatur
				$user->setEmail($mdp);// change le mot de passe dans user
				$user->save();// modifie dans la base de donnée ^^
			}
		}
		$view = new App_View('mesinfos.php');
		$view->render(null);
	}
}
?>