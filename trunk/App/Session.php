<?php

class App_Session
{
    public static function start()
    {
        session_start();
    }

    public static function destroy($why = null)
    {
        session_destroy();
        if (!is_null($why)) {
            header ('Location: '.str_replace('&amp;' ,'&',App_Request::getUrl('index','index',array("session"=>$why))));
        } else {
            header ('Location: '.App_Request::getUrl());
        }
    }

    public static function verifierSession()  {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            return Model_User::load($_SESSION['id']);
        } else {
            return null;
        }
    }
}