<?php
class Controller_Mesinfos implements Controller
{
	public function indexAction()
	{
		$user = App_Session::verifierSession();
		if (!is_null($user)) {
            $var["user"] = $user;
            $var["prof"] = $user->getType() >= 1;
            $var["admin"] = $user->getType() >= 2;
			$this->modifier($var);
		} else {
			header ('Location: '.App_Request::getUrl());
		}
	}
	
	public function modifier($var)
	{
        $send = App_Request::getParam("send");
		if (!empty($send)) {
            $oldmdp = trim(App_Request::getParam('oldmdp'));
            $mdp = trim(App_Request::getParam('mdp'));
            $confmdp = trim(App_Request::getParam('confmdp'));
            $email = trim(App_Request::getParam('email'));
            $confemail = trim(App_Request::getParam('confemail'));
            $syntaxe="#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#";
			if (!empty($mdp) && !empty($oldmdp) && !empty($confmdp)
                && md5($oldmdp) == $var["user"]->getMdp()
                && $mdp == $confmdp) {
                $var["user"]->setMdp(md5($mdp));
                $var["user"]->save();
                $var["modification_succes"] = true;
                $view = new App_View('mesinfos.php');
                $view->render($var);
			} else if(!empty($email) && !empty($confemail) && $email == $confemail && preg_match($syntaxe,$email)){
                $var["user"]->setEmail($email);
                $var["user"]->save();
                $var["modification_succes"] = true;
                $view = new App_View('mesinfos.php');
                $view->render($var);
			} else {
                $var["modification_succes"] = false;
                $view = new App_View('mesinfos.php');
                $view->render($var);
            }
		} else {
            $view = new App_View('mesinfos.php');
            $view->render($var);
        }
    }
}
			
