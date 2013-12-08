<?php

class App_Request
{
    private static $baseRequestUrl = "/~chaberta/EDT/";
    public static function getParam($key, $default = '')
    {
        $value = $default;
        if (isset($_REQUEST[$key])) {
            $value = $_REQUEST[$key];
        }
        return $value;
    }
    
    public static function getUrl($controller = 'index', $action = 'index', $params = array())
    {
        return "index.php?controller=$controller&amp;action=$action&amp;".http_build_query($params, '', '&amp;');
    }

    public static function isCurrent($controller = 'index', $action = 'index')
    {
        return ($controller == self::getController() && $action == self::getAction());
        /*$pageURL = 'http';
        if ($_SERVER['HTTPS'] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        }
        else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
        return substr($_SERVER["REQUEST_URI"], strlen(self::$baseRequestUrl));*/
    }

    public static function getController()
    {
       return self::getParam('controller', 'index');
    }
    
    public static function getAction()
    {
       return self::getParam('action', 'index');
    }
}