<?php

class Database
{
    
    private static $dbName = 'db_promobit';
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $dbPass = '';
  
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitida!');
    }
    
    public static function connect()
    {
        if(null == self::$cont)
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName.";charset=utf8", self::$dbUser, self::$dbPass); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function disconnect()
    {
        self::$cont = null;
    }
}

?>