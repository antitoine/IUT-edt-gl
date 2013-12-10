<?php
class Controller_Mesinfos implements Controller
{
	public function indexAction()
	{
		$user = App_Session::verifierSession();
		if (!is_null($user)) {
            $var["user"] = $user;
            $var["admin"] = $user->getType() > 0;
			$this->modifier($var);
		} else {
			header ('Location: '.App_Request::getUrl());
		}
	}
	
	public function modifier($var)
	{
		if (!empty(App_Request::getParam("send"))) {
			if (!empty(trim(App_Request::getParam('mdp')))) {
				$mdp = trim(App_Request::getParam('mdp'));
                $var["user"]->setMdp(md5($mdp));
			}
			if(!empty(trim(App_Request::getParam('email')))){
				$email = trim(App_Request::getParam('email'));// recupere le nouveau email
				$syntaxe="#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#";
				if(preg_match($syntaxe,$email)){
                    $var["user"]->setEmail($email);
					$var["email"]=$email;
				}
			}
            $var["user"]->save();
			$view = new App_View('mesinfos.php');
			$view->render($var);
		} else {
            $view = new App_View('mesinfos.php');
            $view->render($var);
        }
    }
}
			
