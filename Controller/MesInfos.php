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
	
	public function modifier()
	{
		if (!empty(App_Request::getParam("envoi"))) {
			$user_id= trim(App_Request::getParam("user_id"));// recupere l'id de l'utilisateur courant
			$user= Model_User::load($user_id);//cree une instance d'un utilisatur
			if($user->getType()==0){
				$user=Model_Etudiant::load($user_id);
			}
			if (!empty(trim(App_Request::getParam("mdp_Modif")))) {
				$mdp = trim(App_Request::getParam("mdp_Modif"));// recupere le nouveau mdp
				$user->setMdp($mdp);
				$var["mdp"]=$mdp;
			}
			
			if(!empty(trim(App_Request::getParam("email_Modif")))){
				$email = trim(App_Request::getParam("email_Modif"));// recupere le nouveau email
				$syntaxe="#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#";
				if(preg_match($syntaxe,$email)){
					$user->setEmail($email);
					$var["email"]=$email;
				}
			}
			$user->save();// modifie dans la base de donnée ^^
			$var["user"]=$user;
			$view = new App_View('mesinfos.php');
			$view->render($var);
			
		}	
			
}
			
