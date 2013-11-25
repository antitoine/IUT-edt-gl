<?php

class App_Mysql
{
    protected static $_instance = null;
    private $hostname = "";
    private $login = "";
    private $passwd ="";
    private $base ="";
    private $connect = null;

    public function getConnect()
    {
        return $this->connect;
    }

    private function __construct()
    {
        $this->connect = mysql_connect($this->hostname,$this->login,$this->passwd) or die ("erreur de connexion");
        mysql_select_db($this->base,$this->connect) or die ("erreur de connexion base");
        mysql_query("SET NAMES UTF8");
    }

    public function __destruct()
    {
        mysql_close();
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function quote($str)
    {
        return mysql_real_escape_string($str);
    }

    public function getLastID ()
    {
        return mysql_insert_id();
    }

    public static function query($str) {
        $req = mysql_query($str);
        if (!$req) {
            die("Impossible d'exécuter la requête ($req) dans la base : " . mysql_error());
        }
        return $req;
    }
}
