<?php

ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR);

function __autoload($class)
{
    if (!file_exists(str_replace('_', '/', $class).'.php')) {
        throw new Exception();
    } else {
        include str_replace('_', '/', $class).'.php';
    }
}

/**
 * Interface pour les Model
 */
interface Model
{
    /**
     * Insertion dans la base de donnée de l'instance
     */
    public function save();
    /**
     * Chargement à partir de la base de donnée
     * @param $id Identifiant de la ligne à charger
     */
    public function load($id);
}

/**
 * Interface pour les Controller
 */
interface Controller
{
    /**
     * Action par défaut en cas d'appel du controller sans action
     */
    public function indexAction();
}

class App
{
    public static function start($controller = 'index', $action = 'index')
    {
        App_Session::start();
        try {
            $controller = 'Controller_'.ucwords($controller);
            $controller = new $controller();
        
            $action = $action.'Action';
            if (!method_exists($controller,$action)) {
                throw new Exception();
            } else {
                $controller->$action();
            }
        } catch (Exception $e) {
            echo $e; // Pour le debug à retirer pour la prod
            $view = new App_View('view_error_404.php'); // en cas de controller ou d'action inconnu ou encore un possible soulevement d'une exception dans une action
            $view->render(null);
        }
    }
}