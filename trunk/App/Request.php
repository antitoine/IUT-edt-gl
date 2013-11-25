<?php

class App_Request
{
    public static function getParam($key, $default = '')
    {
        $value = $default;
        if (isset($_REQUEST[$key])) {
            $value = $_REQUEST[$key];
        }
        return $value;
    }
    
    public function getUrl($controller = 'index', $action = 'index', $params = array())
    {
        return "index.php?controller=$controller&amp;action=$action&amp;".http_build_query($params, '', '&amp;');
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