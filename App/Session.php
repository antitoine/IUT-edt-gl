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
}