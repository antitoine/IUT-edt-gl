<?php
class Controller_Mesinfos implements Controller
{
	public function indexAction()
	{
		$user = App_Session::verifierSession();
		if (!is_null($user)) {
            $var["user"] = $user;
			$this->modifier($var);
		} else {
			header ('Location: '.App_Request::getUrl());
		}
	}
	
	public function modifier($var)
	{
		if (!empty(App_Request::getParam("envoi"))) {
			$user_id= $var["user"]->getId();
			$user= Model_User::load($user_id);//cree une instance d'un utilisatur
			if($user->getType()==0){
				$user=Model_Etudiant::load($user_id);
			}
			if (!empty(trim(App_Request::getParam('mdp')))) {
				$mdp = trim(App_Request::getParam('mdp'));// recupere le nouveau mdp
				$user->setMdp($mdp);
				$var["mdp"]=$mdp;
			}
			
			if(!empty(trim(App_Request::getParam('email')))){
				$email = trim(App_Request::getParam('email'));// recupere le nouveau email
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
		} else {
            $view = new App_View('mesinfos.php');
            $view->render($var);
        }
    }
}
			
